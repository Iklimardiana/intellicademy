<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $table = 'certificates';
    protected $primaryKey = 'id';

    protected $fillable = [
        'idTransaction',
    ];

    public function Transaction()
    {
        return $this->belongsTo(Transaction::class, 'idTransaction');
    }

}
