<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progres extends Model
{
    protected $table = 'progres';
    protected $primaryKey = 'id';

    protected $fillable = [
        'status',
        'score',
        'idAttachment',
        'idUser',
        'idModule',
        'idCourse',
    ];
}
