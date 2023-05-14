<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paycheck extends Model
{
    use HasFactory;

    protected $fillable = [
        'idStaff', 'month', 'year', 'total_allowances', 'total_day_working', 'total_salary'
    ];

    public function staff()
    {
        return $this->hasOne(Staff::class, 'id', 'idStaff');
    }

    public function allowance()
    {
        return $this->hasOne(Allowance::class, 'id' , 'id_allowances');
    }
}
