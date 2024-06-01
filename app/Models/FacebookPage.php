<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacebookPage extends Model
{
    use HasFactory;

    protected $table = 'facebook_pages';

    protected $fillable = [
        'facebook_Account_id',
        'access_token',
        'category',
        'category_list',
        'name',
        'facebook_id',
        'tasks',
    ];

    protected $casts = [
        'category_list' => 'array',
        'tasks' => 'array',
    ];
}
