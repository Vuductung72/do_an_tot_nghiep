<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class CheckRolePermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('ad.login.index');
        }
        $permissions = Permission::all();
        $roleId = Auth::user('admin')->role->id;
        $role = Role::findOrFail($roleId);
        $permissions = $role->permissions;


        // $currentRouteName =  Route::getCurrentRoute()->getPath();
        $currentRouteName = Route::currentRouteName();
        // dd($currentRouteName);
        // dd($permissions);
        foreach ($permissions as $permission) {
            if($permission->name === $currentRouteName){
                return $next($request);
            }
        }
        return abort(403, 'Bạn không có quyền truy cập!');

    }
}

// user -> role -> n permision (1)

// request -> route name (2)

// kiểm tra 2 có trong 1 => next request
