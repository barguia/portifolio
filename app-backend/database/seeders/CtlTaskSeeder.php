<?php

namespace Database\Seeders;

use App\Models\CtlProcess;
use App\Models\CtlTask;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CtlTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $processOfTasks = array(
            'Childhood' => [
                'Born',
                'Learn to listen',
                'Learn to speak',
                'Learn to walk',
                'Learn to play',
                'Start school',
                'Make new friends'
            ],
            'adolescence' => [
                'College school',
                'Make new friends',
                'Graduate',
            ],
            'adult' => [
                'Get a job',
                'Fall a love',
                'Get married',
                'Have a baby',
            ],
            'old age' => [
                'Retired',
                'Learn new hobs'
            ]
        );

        foreach ($processOfTasks as $index => $tasks) {
            $processId = CtlProcess::where('process', $index)->first()->id;
            foreach ($tasks as $task) {
                CtlTask::firstOrCreate([
                    'task' => $task,
                    'ctl_process_id' => $processId
                ]);
            }
        }

    }
}
