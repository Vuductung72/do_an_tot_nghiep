<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Punish extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'id_staff','date', 'money', 'reason'
    ];

    public function staff()
    {
        return $this->hasOne(Staff::class, 'id', 'id_staff');
    }
}
