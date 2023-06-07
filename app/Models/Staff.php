<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Staff extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $gender = [
        1 => 'Nam',
        2 => 'Nữ'
    ];

    protected $fillable = [
        'name', 'identityCard', 'image', 'ethnic' , 'dateOfBird', 'gender', 'email', 'phone', 'address', 'idPosition', 'idDepartment', 'salary' , 'password', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    public function position() {
        return $this->hasOne(Position::class, 'id', 'idPosition');
    }

    public function department() {
        return $this->hasOne(Department::class, 'id', 'idDepartment');
    }

    public function allowance()
    {
        return $this->hasMany(Allowance::class, 'idStaff');
    }

    public function punish()
    {
        return $this->hasMany(Punish::class, 'id_staff');
    }

    public function salaryChanges()
    {
        return $this->hasMany(SalaryChange::class, 'id_staff');
    }

}
