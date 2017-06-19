<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertCategory('Laptops');
        $this->insertCategory('Desktops');
        $this->insertCategory('TVs');
        $this->insertCategory('Tablets');
        $this->insertCategory('Smart Phones');
        $this->insertCategory('Cameras & Camcorders');
        $this->insertCategory('Monitors');
        $this->insertCategory('Printers');
        $this->insertCategory('keyboard & Mice');
    }

    public function insertCategory($title,$directory_id=1,$parent_id=null)
    {
        $cat = new \App\Modules\Directories\Models\Category();
        $cat->title = $title;
        $cat->description = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias deleniti ea fuga ipsam laudantium magni nam officiis quas quos, tempore. Ad consequatur dicta eaque eius ipsam molestiae sit veniam voluptas.";
        $cat->directory_id = $directory_id;
        $cat->save();
    }
}
?>

