<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'price',
        'description',
        'thumbnail',
        'idUser',
    ];

    protected $attributes = [
        'thumbnail' => 'images/thumbnail/defaultThumbnail.png',
    ];

    public function Module()
    {
        return $this->hasMany(Module::class, 'idCourse');
    }

    public function Progres()
    {
        return $this->hasMany(Progres::class, 'idCourse');
    }

    public function Transaction()
    {
        return $this->hasMany(Transaction::class, 'idCourse');
    }

}
