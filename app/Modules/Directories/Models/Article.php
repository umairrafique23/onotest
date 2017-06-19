<?php

namespace App\Modules\Directories\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Article extends Model
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
    protected $fillable = ['title','summary','description','directory_id'];
    public function categories()
    {
        return $this->belongsToMany(Category::class,'article_category');
    }

}
