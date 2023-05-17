<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $routes = Route::getRoutes();
        foreach ($routes as $route) {
            if ($route->getAction('as') && strpos($route->getAction('as'), 'ad.') === 0 && $route->getName()!= 'ad.login.index' && $route->getName()!= 'ad.login')
            {
                $routeName = $route->getName();
                if (!Permission::where('name', $routeName)->exists()) {
                    Permission::create([
                        'name' => $routeName,
                        'label'=> $routeName,
                    ]);
                }
            }
        }
    }
}
