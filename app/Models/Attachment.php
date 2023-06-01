<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $table = 'attachments';
    protected $primaryKey = 'id';

    protected $fillable = [
        'link',
        'category',
        'type',
        'score',
        'idModule',
        'idCourse',
        'idUser',
    ];

    public function Progres()
    {
        return $this->hasOne(Progres::class, 'idAttachment');
    }

    public function Module()
    {
        return $this->belongsTo(Module::class, 'idModule'); 
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'idUser'); 
    }
}
