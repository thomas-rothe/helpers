<?php

use App\[Task];
use App\[Subtask];
use Illuminate\Database\Seeder;

class [Task]TableSeeder extends Seeder
{
    public function run()
    {
        factory([Task]::class, 2)
            ->create()
            ->each(function( $[task] ) {
                $[task]
                    ->[subtasks]()
                    ->save(factory([Subtask]::class)
                    ->make());
            });
    }
}
