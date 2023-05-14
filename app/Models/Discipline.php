<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    use HasFactory;

    protected $fillable = [
        'idStaff', 'type', 'reason', 'description'
    ];

    public function staff()
    {
        return $this->hasOne(Staff::class, 'id', 'idStaff');
    }

    public function disciplineType()
    {
        return $this->hasOne(DisciplineType::class, 'id', 'type');
    }
}
