<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostImg extends Model
{
    use HasFactory;
    protected $table = 'post_img';
    public $fillable = [
        'post_id',
        'photo'
    ];
}
