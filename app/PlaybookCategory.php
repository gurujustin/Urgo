<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaybookCategory extends Model
{
    use HasFactory;

    public function hasNewLesson()
    {
        foreach (Playbook::get() as $playbook) {
            if ($playbook->isNew() && $playbook->category == $this->id) {
                return true;
            }
        }
        return false;
    }
}
