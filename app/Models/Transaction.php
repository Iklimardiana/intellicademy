<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'verification',
        'idCourse',
        'idUser',
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'idUser'); 
    }

    public function Course()
    {
        return $this->belongsTo(Course::class, 'idCourse');
    }

    public function Certificate()
    {
        return $this->HasOne(Certificate::class, 'idTransaction');
    }

}
