<?php

use Illuminate\Database\Seeder;


class DirectoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $lorem = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam eum magnam molestiae non numquam placeat quod repellat tempore vero voluptas? Adipisci architecto doloribus hic impedit numquam quaerat quod sunt voluptatem.";
    public function run()
    {
        //Insert Types
        $this->insertType('Pages','Easily define your custom info pages for the site. Pages can be linked with the page with the help of menus');
        //$this->insertType('Product Catalog');
        $this->insertType('Blog','Blog with comments, tags, social media and media associations');
        $dir = $this->insertType('Directory','It is a general purpose repository system built on top of ONO framework to easily manage virtually any kind of data e.g. Movies, Mobiles etc');

        //Insert Directories
        $this->insertDirectory('Products Catalog',$dir);
        $this->insertDirectory('Movies',$dir);
        $this->insertDirectory('Music',$dir);

    }

    /**
     * Insert Sample Directories
     * @param $title
     * @param $type
     */
    private function insertDirectory($title,$type)
    {
        $directory = new \App\Modules\Directories\Models\Directory();
        $directory->title = $title;
        $directory->description = $this->lorem;
        $directory->directory_type_id = $type->id;
        $directory->save();
    }

    /**
     * Insert Sample Directory Types
     * @param $title
     * @return DirectoryType
     */
    private function insertType($title,$description = null)
    {
        $directory = new \App\Modules\Directories\Models\DirectoryType();
        if($description==null)
            $directory->description = $this->lorem;
        else $directory->description = $description;

        $directory->title = $title;

        $directory->save();
        return $directory;
    }
}


?>

