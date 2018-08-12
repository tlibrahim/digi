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
    	Inputnames::create(['name' => 'Radio Button' ,'code' => '<input required type="radio" name="input-name">' ,'type' => 'input']);
    	Inputnames::create(['name' => 'Checkbox' ,'code' => '<input required type="checkbox" name="input-name">' ,'type' => 'input']);
    	Inputnames::create(['name' => 'Text' ,'code' => '<input required type="text" class="form-control" name="input-name">' ,'type' => 'input']);
    	Inputnames::create(['name' => 'Long Text' ,'code' => '<textarea required class="form-control" name="input-name" rows="4"></textarea>' ,'type' => 'textarea']);
    	Inputnames::create(['name' => 'File' ,'code' => '<input type="file" name="input-name">' ,'type' => 'file']);
    	Inputnames::create(['name' => 'Multiple Files' ,'code' => '<input type="file" name="input-name[]" multiple>' ,'type' => 'file']);
    	Inputnames::create(['name' => 'Number' ,'code' => '<input required type="number" class="form-control" name="input-name">' ,'type' => 'input']);
    	Inputnames::create(['name' => 'Date' ,'code' => '<input required type="text" class="form-control date" name="input-name">' ,'type' => 'input']);
    	Inputnames::create(['name' => 'Date Range' ,'code' => '<input required type="text" class="form-control date-range" name="input-name">' ,'type' => 'input']);
    }
}
