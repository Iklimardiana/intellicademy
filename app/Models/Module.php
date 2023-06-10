<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table = 'modules';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'body',
        'idCourse',
        'sequence',
    ];

    public function Attachment()
    {
        return $this->hasMany(Attachment::class, 'idModule');
    }

    public function Course()
    {
        return $this->belongsTo(Course::class, 'idCourse'); 
    }
}
