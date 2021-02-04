<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use Config;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'order',
        'title',
        'description',
        'keytakeaway',
        'action',
        // 'resources',
        // 'downloads',
        // 'video',
        'duration',
        // 'timestamps',
        'tile_title',
        'tile_description',
        // 'tile_image',
        // 'tile_video',
    ];

    public function getCategory()
    {
        return $this->hasOne('App\Category', 'id', 'category');
    }


    public function getFavorite()
    {
        $settingrecord = LessonSetting::where('user_id', Auth::user()->id)->where('lesson_id', $this->id)->first();
        if ($settingrecord) {
            return $settingrecord->favorite ?? 0;
        } else {
            return 0;
        }
    }

    public function getRating()
    {
        $settingrecord = LessonSetting::where('user_id', Auth::user()->id)->where('lesson_id', $this->id)->first();
        if ($settingrecord) {
            return $settingrecord->rating ?? 0;
        } else {
            return 0;
        }
    }

    public function getDurationHour()
    {
        $duration = $this->duration ?? 0;
        return floor($duration / 3600);
    }

    public function getDurationMinute()
    {
        $duration = $this->duration ?? 0;
        return floor(($duration - 3600 * $this->getDurationHour()) / 60);
    }


    public function isNew()
    {
        $ifCreatedAfter = strtotime($this->created_at) > strtotime(Auth::user()->created_at);
        $ifVisited = LessonSetting::where('user_id', Auth::user()->id)->where('lesson_id', $this->id)->where('visited', 1)->count();
        if ($ifCreatedAfter && !$ifVisited) {
            return true;
        } else {
            return false;
        }
    }

    public function getDownLoadTitle($index)
    {
        $downloadarr = json_decode($this->downloads);
        return $downloadarr[$index][0];
    }
    public function getDownLoadSrc($index)
    {
        $downloadarr = json_decode($this->downloads);
        return  asset(Config::get('constants.publicdirs.lesson') . $downloadarr[$index][2]);
    }
    public function getDownLoadlink($index)
    {
        $downloadarr = json_decode($this->downloads);
        return  route('lesson_download', [$downloadarr[$index][2], $downloadarr[$index][1]]);
    }
    public function getDownLoadType($index)
    {
        $downloadarr = json_decode($this->downloads);
        $filename = $downloadarr[$index][1];
        $array = explode(".", $filename);
        end($array);         // move the internal pointer to the end of the array
        $extension = current($array);

        if (in_array($extension, ['jpg', 'JPG', 'png', 'PNG', 'jpeg', 'JPEG'])) {
            return 'image';
        } else if (in_array($extension, ['mp4', 'MP4', 'OGG', 'ogg'])) {
            return 'video';
        } else {
            return 'other';
        }
    }

    public function getDownLoadSize($index)
    {
        $downloadarr = json_decode($this->downloads);
        $size = $downloadarr[$index][3];
        return sprintf("%4.2f MB", $size / 1048576);
    }

    public function getPreviousLessonIDAttribute()
    {
        $id_arr = Lesson::where('category', $this->category)->orderby('order', 'DESC')->pluck('id')->toArray();
        $key = array_search($this->id,  $id_arr);
        if ($key == 0) {
            return -1;
        } else {
            return $id_arr[$key - 1];
        }
    }

    public function getNextLessonIDAttribute()
    {
        $id_arr = Lesson::where('category', $this->category)->orderby('order', 'DESC')->pluck('id')->toArray();
        $key = array_search($this->id,  $id_arr);
        if ($key == count($id_arr) - 1) {
            return -1;
        } else {
            return $id_arr[$key + 1];
        }
    }
}
