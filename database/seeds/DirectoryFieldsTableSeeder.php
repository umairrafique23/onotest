<?php

use Illuminate\Database\Seeder;

class DirectoryFieldsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $this->insertDirectoryField(1,1);
        $this->insertDirectoryField(1,2);
        $this->insertDirectoryField(1,3);
        $this->insertDirectoryField(2,1);
        $this->insertDirectoryField(2,2);
        $this->insertDirectoryField(2,3);
    }

    public function insertDirectoryField($directory_id,$field_id)
    {
        $directoryField = new \App\Modules\Directories\Models\DirectoryField();
        $directoryField->directory_id = $directory_id;
        $directoryField->field_id = $field_id;

        $directoryField->save();
    }
    
}
