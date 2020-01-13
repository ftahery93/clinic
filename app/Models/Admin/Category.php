<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App;

class Category extends Model
{

    protected $guarded = ['uploaded_image_removed'];

    protected $table = "categories";
    protected $fillable = ['name'];
    protected $hidden = ['created_at', 'updated_at', 'description', 'image', 'parent_id', 'status'];

    public function getCategories()
    {

        $categories = Category::where('parent_id', 0)->get(); //united

        $categories = $this->addRelation($categories);

        return $categories;

    }

    protected function selectChild($id)
    {
        $categories = Category::where('parent_id', $id)->get();

        $categories = $this->addRelation($categories);

        return $categories;

    }

    protected function addRelation($categories)
    {

        $categories->map(function ($item, $key) {

            $sub = $this->selectChild($item->id);

            return $item = array_add($item, 'subCategory', $sub);

        });

        return $categories;
    }

    public function getNameAttribute()
    {
        return $this->{'name_' . App::getLocale()};
    }

}
