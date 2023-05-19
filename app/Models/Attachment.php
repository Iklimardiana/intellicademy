<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $table = 'attachment';
    protected $primaryKey = 'id';

    protected $fillable = [
        'link',
        'category',
        'type',
        'idModule',
        'idCourse',
    ];
}
