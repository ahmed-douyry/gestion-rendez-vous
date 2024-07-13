<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novel extends Model
{
    use HasFactory;
    protected $fillable = [
        'statusID',
        'version_name',
        'alt_names',
        'summary',
        'genre',
        'nbr_subscriptions',
        'nbr_views',
        'nbr_votes',
        'recommendation_rate',
        'chapters',
        'authoring_date',
        'last_update',
        'posterURL',
        'thumbnailURL',
        'insperations',
        'related_to',
    ];
}
