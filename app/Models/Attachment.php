<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $table = 'attachments';
    protected $primaryKey = 'id';

    protected $fillable = [
        'assignment',
        'category',
        'type',
        'score',
        'idModule',
        'idCourse',
        'idUser',
    ];

    public function Module()
    {
        return $this->belongsTo(Module::class, 'idModule'); 
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'idUser'); 
    }
}
