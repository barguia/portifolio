<?php

namespace Database\Seeders;

use App\Models\AclRoute;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;

class AclRouteSeeder extends Seeder
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
            $strRoute = $route->getName();
            if ($strRoute) {
                AclRoute::firstOrCreate([
                    'route' => $strRoute
                ]);
            }
        }

    }
}
