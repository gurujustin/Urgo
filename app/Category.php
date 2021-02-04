<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function hasNewLesson()
    {
        $lessons = Lesson::get();
        foreach ($lessons as $lesson) {
            if ($lesson->isNew() && $lesson->category == $this->id) {
                return true;
            }
        }
        return false;
    }

    public function getPhase()
    {
        return $this->hasOne('App\Phase', 'id', 'phase');
    }
}
