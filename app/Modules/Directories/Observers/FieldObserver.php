<?php
/**
 * Created by PhpStorm.
 * User: Usman
 * Date: 12/24/2016
 * Time: 5:08 PM
 */

namespace App\Modules\Directories\Observers;



use App\Modules\Directories\Models\Field;
use Illuminate\Support\Facades\Schema;

class FieldObserver
{
    public function creating(Field $field)
    {
        Schema::table('articles',function($table) use ($field){
            $table->string('f-'.$field->slug)->nullable();
        });
    }
}