<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allowance extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'idStaff', 'money', 'description'
    ];

    public function staff()
    {
        return $this->hasOne(Staff::class, 'id', 'idStaff');
    }
}
