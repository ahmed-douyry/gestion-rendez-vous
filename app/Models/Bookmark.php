<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;
    protected $fillable = [
        'userID',
        'versionID',
        'chapterID',
        'setted_on',
    ];
}
