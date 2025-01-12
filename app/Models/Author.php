<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $fillable = [
        'userID',
        'nickname',
        'nbr_subscriptions',
        'nbr_novels',
        'nbr_chapters',
        'badges',
        'added_in',
    ];
}
