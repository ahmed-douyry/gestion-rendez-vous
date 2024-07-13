<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    protected $fillable = [
        'statusID',
        'versionID',
        'chapter_order',
        'chapter_name',
        'nbr_views',
        'authoring_date',
        'last_update',
        'anticipated_by',
        'audio_label',
        'audio_URL',
    ];
}
