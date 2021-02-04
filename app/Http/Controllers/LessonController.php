<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Lesson;
use App\Category;
use App\LessonSetting;
use Config;
use Str;
use Response;
use File;
use Iman\Streamer\VideoStreamer;
use Auth;

class LessonController extends Controller
{
    public function index(Request $request)
    {
        $lessons = Lesson::get();
        return view('lesson.index', ['lessons' => $lessons]);
    }

    public function create(Request $request)
    {
        $categories = Category::get();
        return view('lesson.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $lesson = Lesson::create($request->all());
        //duration
        $lesson->duration = $request->duration_hour * 3600 + $request->duration_minute * 60 + $request->duration_second;
        $lesson->save();

        //timestamp
        $timestamp = [];
        foreach ($request->stampminute as $index => $minute) {
            $second =  $request->stampsecond[$index];
            $description =  $request->stampdescription[$index];
            array_push($timestamp, [$minute * 60 + $second, $description]);
        }

        $lesson->time_stamp = json_encode($timestamp);
        $lesson->save();

        //Resource
        $resources = [];
        foreach ($request->resourcetitle as $index => $title) {
            $link =  $request->resourcelink[$index];
            array_push($resources, [$title, $link]);
        }

        $lesson->resources = json_encode($resources);
        $lesson->save();

        //Download
        $downloads = [];
        foreach ($request->downloaddesciption as $index => $description) {
            if ($request->hasFile('downloadfile.' . $index)) {
                $file =  $request->downloadfile[$index];
                $originfilename = $file->getClientOriginalName();
                $filesize = $file->getSize();
                $newfilename =  time() . Str::random(3) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path(Config::get('constants.publicdirs.lesson')), $newfilename);
                array_push($downloads, [$description, $originfilename, $newfilename, $filesize]);
            }
        }
        $lesson->downloads = json_encode($downloads);
        $lesson->save();

        //file
        foreach (['tile_image', 'tile_video'] as $filefield) {
            if ($request->hasFile($filefield)) {
                $newfilename =  time() . Str::random(3)  . '.' . $request[$filefield]->getClientOriginalExtension();
                $request[$filefield]->move(public_path(Config::get('constants.publicdirs.lesson')), $newfilename);
                $lesson[$filefield] = $newfilename;
                $lesson->save();
            }
        }

        return redirect()->route('lesson_index');
    }

    public function show($id)
    {
        $lesson = Lesson::find($id);
        $this->setVisited($id);
        return view('lesson.show', ['lesson' => $lesson]);
    }

    public function edit($id)
    {
        $lesson = Lesson::find($id);
        $categories = Category::get();
        return view('lesson.edit', ['lesson' => $lesson, 'categories' => $categories]);
    }

    public function update($id, Request $request)
    {

        $lesson = Lesson::where('id', $id)->first();
        $lesson->category = $request->category;
        $lesson->order =   $request->order;
        $lesson->title = $request->title;
        $lesson->description = $request->description;
        $lesson->keytakeaway = $request->keytakeaway;
        $lesson->action = $request->action;
        $lesson->tile_title = $request->tile_title;
        $lesson->tile_description = $request->tile_description;
        $lesson->save();

        //duration
        $lesson->duration = $request->duration_hour * 3600 + $request->duration_minute * 60 + $request->duration_second;
        $lesson->save();

        //timestamp
        $timestamp = [];
        foreach ($request->stampminute as $index => $minute) {
            $second =  $request->stampsecond[$index];
            $description =  $request->stampdescription[$index];
            array_push($timestamp, [$minute * 60 + $second, $description]);
        }

        $lesson->time_stamp = json_encode($timestamp);
        $lesson->save();

        //Resource
        $resources = [];
        foreach ($request->resourcetitle as $index => $title) {
            $link =  $request->resourcelink[$index];
            array_push($resources, [$title, $link]);
        }

        $lesson->resources = json_encode($resources);
        $lesson->save();

        //Download
        if ($request->downloads_method == 'update') {
            foreach (json_decode($lesson->downloads) as $obj) {
                $file_path = public_path(Config::get('constants.publicdirs.lesson') . $obj[2]);
                File::delete($file_path);
            }

            $downloads = [];
            foreach ($request->downloaddesciption as $index => $description) {
                if ($request->hasFile('downloadfile.' . $index)) {
                    $file =  $request->downloadfile[$index];
                    $originfilename = $file->getClientOriginalName();
                    $filesize = $file->getSize();
                    $newfilename =  time() . Str::random(3) . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path(Config::get('constants.publicdirs.lesson')), $newfilename);
                    array_push($downloads, [$description, $originfilename, $newfilename,  $filesize]);
                }
            }
            $lesson->downloads = json_encode($downloads);
            $lesson->save();
        }


        //file
        foreach (['tile_image', 'tile_video'] as $filefield) {
            if ($request[$filefield . "_method"] == 'update' && $request->hasFile($filefield)) {
                $file_path = public_path(Config::get('constants.publicdirs.lesson') . $lesson[$filefield]);
                File::delete($file_path);

                $newfilename =  time() .  Str::random(3) .  '.' . $request[$filefield]->getClientOriginalExtension();
                $request->file($filefield)->move(public_path(Config::get('constants.publicdirs.lesson')), $newfilename);
                $lesson[$filefield] = $newfilename;
                $lesson->save();
            }
        }

        return redirect()->route('lesson_index');
    }

    public function destroy($id)
    {
        $lesson = Lesson::where('id', $id)->first();

        //Download
        foreach (json_decode($lesson->downloads) as $obj) {
            $file_path = public_path(Config::get('constants.publicdirs.lesson') . $obj[2]);
            File::delete($file_path);
        }


        //file
        foreach (['video', 'tile_image', 'tile_video'] as $filefield) {
            $file_path = public_path(Config::get('constants.publicdirs.lesson') . $lesson[$filefield]);
            File::delete($file_path);
        }

        $lesson->delete();

        return redirect()->route('lesson_index');
    }

    public function getDownload($filename = '', $originname = '')
    {

        //PDF file is stored under project/public/download/info.pdf
        $file = public_path() . "/uploads/lesson/$filename";

        // $headers = array(
        //          'Content-Type: application/pdf',
        // );

        return Response::download($file, $originname);
    }


    public function overview($phaseid)
    {
        $lessons = Lesson::orderby('order', 'DESC')->get();
        $categories = Category::where('phase', $phaseid)->get();
        return view('lesson.overview', ['lessons' => $lessons, 'categories' => $categories, 'phaseid' => $phaseid]);
    }

    public function lessonUpload($id)
    {
        $lesson = Lesson::find($id);
        return view('lesson.upload', ['lesson' => $lesson]);
    }

    public function saveUploadFile(Request $request)
    {
        if ($request->hasFile('bigfile')) {
            $lesson = Lesson::find($request->id);

            $originfilepath = public_path(Config::get('constants.publicdirs.lesson') . $lesson->video);
            File::delete($originfilepath);

            $file =  $request->file('bigfile');
            $originfilename = $file->getClientOriginalName();
            $newfilename =  'lesson_' . $request->id . '.' . $file->getClientOriginalExtension();
            $file->move(public_path(Config::get('constants.publicdirs.lesson')), $newfilename);

            $lesson->video = $newfilename;
            $lesson->save();
            echo "success";
        } else {
            echo "no file";
        }
    }

    public function videoStream($id)
    {
        $lesson = Lesson::find($id);
        $path = public_path(Config::get('constants.publicdirs.lesson') . $lesson->video);
        VideoStreamer::streamFile($path);
    }

    public function downfileStream($lessonid, $downid)
    {
        $lesson = Lesson::find($lessonid);
        $downloadarr = json_decode($lesson->downloads);
        $path = public_path(Config::get('constants.publicdirs.lesson') . $downloadarr[$downid][2]);
        VideoStreamer::streamFile($path);
    }

    public function setfavorite(Request $request)
    {
        $lessonid = $request->lessonid;
        $favorite = $request->favorite;
        $newfavorite = 1 - $favorite;

        if ($record = LessonSetting::where('user_id', Auth::user()->id)->where('lesson_id', $lessonid)->first()) {
            $record->favorite = $newfavorite;
            $record->save();
        } else {
            $obj = new LessonSetting();
            $obj->user_id = Auth::user()->id;
            $obj->lesson_id = $lessonid;
            $obj->favorite = $newfavorite;
            $obj->save();
        }

        echo $newfavorite;
    }

    public function setrating(Request $request)
    {
        $lessonid = $request->lessonid;
        $rating = $request->rating;

        if ($record = LessonSetting::where('user_id', Auth::user()->id)->where('lesson_id', $lessonid)->first()) {
            $record->rating = $rating;
            $record->save();
        } else {
            $obj = new LessonSetting();
            $obj->user_id = Auth::user()->id;
            $obj->lesson_id = $lessonid;
            $obj->rating = $rating;
            $obj->save();
        }

        echo $rating;
    }

    public function setVisited($lessonid)
    {
        if ($record = LessonSetting::where('user_id', Auth::user()->id)->where('lesson_id', $lessonid)->first()) {
            $record->visited = 1;
            $record->save();
        } else {
            $obj = new LessonSetting();
            $obj->user_id = Auth::user()->id;
            $obj->lesson_id = $lessonid;
            $obj->visited = 1;
            $obj->save();
        }
    }
}
