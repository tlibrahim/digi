<?php

use Illuminate\Database\Seeder;
use App\InputNames;

class InputnamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Inputnames::create(['name' => 'Radio Button']);
    	Inputnames::create(['name' => 'Checkbox']);
    	Inputnames::create(['name' => 'Text']);
    	Inputnames::create(['name' => 'Long Text']);
    	Inputnames::create(['name' => 'File']);
    	Inputnames::create(['name' => 'Multiple Files']);
    	Inputnames::create(['name' => 'Number']);
    	Inputnames::create(['name' => 'Date']);
    	Inputnames::create(['name' => 'Date Range']);
    }
}
