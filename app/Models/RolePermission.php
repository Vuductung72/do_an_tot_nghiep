<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    use HasFactory;

    protected $table = 'permission_role';

    protected $primaryKey = ['role_id', 'permission_id'];

    public $incrementing = false;
}
