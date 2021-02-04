<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FBADLib extends Model
{
    use HasFactory;
    public $table = 'fb_store';

    public $fillable  = [
        'title',
        'group',
        'url',
        'logo_img_url',
        'publish_time',
        'description',
        'main_img_or_video',
        'emoji',
        'views',
        'comments',
        'share',
        'ratio',
        'star'
    ];


}
