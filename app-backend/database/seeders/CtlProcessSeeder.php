<?php

namespace Database\Seeders;

use App\Models\CtlProcess;
use App\Models\CtlProcessHierarchy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CtlProcessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $processHierarqhyId = CtlProcessHierarchy::where('hierarchy', 'Hierarchy Macro: Life')->first()->id ?? null;
        $macroProcess = CtlProcess::firstOrCreate([
            'process' => 'Human life',
            'ctl_process_hierarchy_id' => $processHierarqhyId
        ]);

        $subProcessHierarqhyId = CtlProcessHierarchy::where('hierarchy', 'Life stages')->first()->id ?? null;
        $subProcess = array('Childhood', 'adolescence', 'adult', 'old age');
        foreach ($subProcess as $process) {
            CtlProcess::firstOrCreate([
                'process' => $process,
                'ctl_process_hierarchy_id' => $subProcessHierarqhyId,
                'ctl_process_id' => $macroProcess->id
            ]);
        }

    }
}
