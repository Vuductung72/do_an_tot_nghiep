<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'idStaff', 'date', 'time_in', 'time_out'
    ];

    public function staff()
    {
        return $this->hasOne(Staff::class, 'id', 'idStaff');
    }
}
