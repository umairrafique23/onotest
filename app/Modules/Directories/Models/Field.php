<?php

namespace App\Modules\Directories\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Field extends Model
{
    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    protected $fillable = ['title', 'description'];

    public function directories()
    {
        return $this->belongsToMany(Directory::class,'directory_fields');
    }
}
