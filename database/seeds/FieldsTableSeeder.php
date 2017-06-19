<?php

use Illuminate\Database\Seeder;


class FieldsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertField('Price');
        $this->insertField('Brand');
        $this->insertField('Model');

        $this->insertField('Year');
        $this->insertField('MPAA Rating');
        $this->insertField('Directed By');
    }

    public function insertField($title)
    {
        $field = new \App\Modules\Directories\Models\Field();
        $field->title = $title;
        $field->save();
    }
}
