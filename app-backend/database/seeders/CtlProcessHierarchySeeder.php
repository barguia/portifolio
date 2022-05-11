<?php

namespace Database\Seeders;

use App\Models\CtlProcessHierarchy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CtlProcessHierarchySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CtlProcessHierarchy::firstOrCreate(['hierarchy' => 'Hierarchy Macro: Life']);
        foreach (['Life stages'] as $process) {
            CtlProcessHierarchy::firstOrCreate([
                'hierarchy' => $process,
            ]);
        }
    }
}
