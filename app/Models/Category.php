<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $guarded = [];

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public static function getCategoryTree($parentId = 0, $level = 0)
    {
        $result = [];

        $categories = Category::where('parent_id', $parentId)->orderBy('created_at', 'desc')->get();

        foreach ($categories as $category) {
            $category->depth = $level;
            $result[] = $category;

            $children = self::getCategoryTree($category->id, $level + 1);
            $result = array_merge($result, $children);
        }

        return $result;
    }
}
