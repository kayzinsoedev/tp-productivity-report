<?php

use Illuminate\Database\Seeder;
use App\Postpress\Machine;

class MachineTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $machines = [
            ['name' => 'STITCHER 300 I'],
            ['name' => 'STITCHER 300 II'],
            ['name' => 'STITCHER 335 I'],
            ['name' => 'STITCHER 335 III'],
            ['name' => 'STITCHER PRIMA 390'],
            ['name' => 'STITCHER ST 300'],
            ['name' => 'BINDER C12'],
            ['name' => 'BINDER GATHERING C12'],
            ['name' => 'BINDER DRAW ON COVER C12'],
            ['name' => 'BINDER C18'],
            ['name' => 'BINDER  DRAW ON COVER C18'],
            ['name' => 'FOLDER MBO'],
            ['name' => 'FOLDER STAHL F2'],
            ['name' => 'FOLDER STAHL F3'],
            ['name' => 'FOLDER STAHL F1'],
            ['name' => 'SITMA I OLD'],
            ['name' => 'SITMA II NEW'],
            ['name' => 'SEWING 180'],
        ];

        foreach($machines as $machine){
          Machine::create($machine);
        }

    }
}
