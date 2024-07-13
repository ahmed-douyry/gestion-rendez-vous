<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Impression extends Model
{
    use HasFactory;
    protected $fillable = [
        'userID',
        'versionID',
        'impressions',
        'added_in',
        'modified_in',
    ];
}
