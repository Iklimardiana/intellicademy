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
        'sequence',
        'idUser',
        'idCourse',
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
