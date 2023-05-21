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
        'idModule',
        'idCourse',
    ];

    public function Progres()
    {
        return $this->hasOne(Progres::class, 'idAttachment');
    }

    public function Module()
    {
        return $this->belongsTo(Module::class, 'idModule'); 
    }
}
