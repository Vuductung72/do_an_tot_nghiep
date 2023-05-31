<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_staff', 'date' , 'reason', 'status'
    ];

    public function staff()
    {
        return $this->hasOne(Staff::class, 'id', 'id_staff');
    }
}
