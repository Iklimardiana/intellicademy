<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    public function hasFile($attribute)
    {
        $file = $this->{$attribute};
        if (!empty($file) && Storage::exists($file)) {
            return true;
        }
        return false;
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
