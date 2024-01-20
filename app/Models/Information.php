<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;
    protected $table = 'informations';
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'birthday',
        'phone',
        'from',
        'address',
        'age',
        'relation_status',
        'desc',
    ];

    public $timestamps = false;
}
