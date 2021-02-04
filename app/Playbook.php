<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Playbook extends Model
{
    use HasFactory;
    protected $fillable = [
        'category',
        'title',
        'order',
    ];
    public function getCategory()
    {
        return $this->hasOne('App\PlaybookCategory', 'id', 'category');
    }

    public function isNew()
    {
        $ifCreatedAfter = strtotime($this->created_at) > strtotime(Auth::user()->created_at);
        $ifVisited = PlaybookLog::where('user_id', Auth::user()->id)->where('playbook_id', $this->id)->where('visited', 1)->count();
        if ($ifCreatedAfter && !$ifVisited) {
            return true;
        } else {
            return false;
        }
    }

    public function getCaseimageAttribute($value)
    {
        return asset('/uploads/playbook/' . $value);
    }
   

}
