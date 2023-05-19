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

    public function Attachment()
    {
        return $this->belongsTo(Attachment::class, 'idAttachment'); 
    }

    public function Module()
    {
        return $this->belongsTo(Module::class, 'idModule'); 
    }

    public function Course()
    {
        return $this->belongsTo(Course::class, 'idCourse'); 
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'idUser'); 
    }
}
