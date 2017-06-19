<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = new \App\Modules\Menus\Models\Menu();
        $menu->title = 'Top Menu';
        $menu->save();

        for($i=0;$i<5;$i++){
            $link = new \App\Modules\Menus\Models\Link();
            $link->title = 'Link '+$i;
            $link->url = '/';
            $link->parent_id = 1;
            $link->menu_id = 1;
            $link->save();
        }
    }
}
