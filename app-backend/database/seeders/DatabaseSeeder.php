<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AclRouteSeeder::class);
        $this->call(AclProfileSeeder::class);
        $this->call(CtlProcessHierarchySeeder::class);
        $this->call(CtlProcessSeeder::class);
        $this->call(CtlTaskSeeder::class);
        $this->call(CtlTaskStateSeeder::class);

    }
}
