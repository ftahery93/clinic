<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $guarded = ['uploaded_image_removed'];

    //protected $Categories;

//    public static function getCategoryTreeForParentId($parent_id = 0) {
    //        $categories = array();
    //        $result = Category::select('id', 'name_en','level','parent_id')->where('parent_id', $parent_id)->get();
    //        foreach ($result as $mainCategory) {
    //            $category = array();
    //            $category['id'] = $mainCategory->id;
    //            $category['name_en'] = $mainCategory->name_en;
    //            $category['parent_id'] = $mainCategory->parent_id;
    //            $category['sub_categories'] = Category::getCategoryTreeForParentId($category['id']);
    //            $categories[$mainCategory->id] = $category;
    //        }
    //       return $categories;
    //
    //    }

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

}
