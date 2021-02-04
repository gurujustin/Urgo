<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Playbook;
use App\PlaybookCategory;
use App\PlaybookLog;
use Config;
use Str;
use Response;
use File;
use Iman\Streamer\VideoStreamer;
use Auth;

class PlaybookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $playbooks = Playbook::get();
        return view('playbook.index', ['playbooks' => $playbooks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = PlaybookCategory::get();
        return view('playbook.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $playbook = Playbook::create($request->all());

        //file
        foreach (['caseimage', 'pdffile'] as $filefield) {
            if ($request->hasFile($filefield)) {
                $newfilename =  time() . Str::random(3)  . '.' . $request[$filefield]->getClientOriginalExtension();
                $request[$filefield]->move(public_path(Config::get('constants.publicdirs.playbook')), $newfilename);
                $playbook[$filefield] = $newfilename;
                $playbook->save();
            }
        }

        return redirect()->route('playbook_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $playbook = Playbook::find($id);     
        $this->setPlaybookVisited($id);

        return view('playbook.show', ['playbook' => $playbook]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $playbook = Playbook::find($id);
        $categories = PlaybookCategory::get();
        return view('playbook.edit', ['playbook' => $playbook, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $playbook = Playbook::where('id', $id)->first();
        $playbook->category = $request->category;
        $playbook->order =   $request->order;
        $playbook->title = $request->title;
        $playbook->save();

        //file
        foreach (['caseimage', 'pdffile'] as $filefield) {
            if ($request[$filefield . "_method"] == 'update' && $request->hasFile($filefield)) {
                $file_path = public_path(Config::get('constants.publicdirs.playbook') . $playbook[$filefield]);
                File::delete($file_path);

                $newfilename =  time() .  Str::random(3) .  '.' . $request[$filefield]->getClientOriginalExtension();
                $request->file($filefield)->move(public_path(Config::get('constants.publicdirs.playbook')), $newfilename);
                $playbook[$filefield] = $newfilename;
                $playbook->save();
            }
        }

        return redirect()->route('playbook_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $playbook = Playbook::where('id', $id)->first();

        //file
        foreach (['caseimage', 'pdffile'] as $filefield) {
            $file_path = public_path(Config::get('constants.publicdirs.playbook') . $playbook[$filefield]);
            File::delete($file_path);
        }

        $playbook->delete();

        return redirect()->route('playbook_index');
    }

    public function overview()
    {
        $playbooks = Playbook::get();
        $categories = PlaybookCategory::get();
        return view('playbook.overview', ['playbooks' => $playbooks, 'categories' => $categories]);
    }

    public function setPlaybookVisited($playbookid)
    {
        if ($record = PlaybookLog::where('user_id', Auth::user()->id)->where('playbook_id', $playbookid)->first()) {
            $record->visited = 1;
            $record->save();
        } else {
            $obj = new PlaybookLog();
            $obj->user_id = Auth::user()->id;
            $obj->playbook_id = $playbookid;
            $obj->visited = 1;
            $obj->save();
        }
    }
}
