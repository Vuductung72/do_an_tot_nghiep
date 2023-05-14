<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryChange extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_staff', 'basic_salary', 'old_salary', 'new_salary', 'reason'
    ];


    public function staff()
    {
        return $this->belongsTo(Staff::class, 'id_staff', 'id');
    }
}
