<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $fillable = [
        'userID',
        'subscription_author',
        'subscription_author_date',
        'subscription_novel',
        'subscription_novel_date',
    ];
}
