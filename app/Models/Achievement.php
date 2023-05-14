<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

    protected $fillable = [
        'idStaff', 'type', 'reason', 'money', 'description'
    ];

    public function staff()
    {
        return $this->hasOne(Staff::class, 'id', 'idStaff');
    }

    public function achievementType()
    {
        return $this->hasOne(AchievementType::class, 'id', 'type');
    }
}
