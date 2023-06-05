<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResetPassword extends Model
{
    protected $table = 'reset_passwords';
    protected $primaryKey = 'id';

    protected $fillable = [
        'email',
        'key',
    ];
}
