<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    /* Question Category */
    public static function saveQuestionCategoryData($request){
        $slug = str_replace(str_split('/:*?"<>| '), '-', $request->name);
        QuestionCategory::create([
            'name' => $request->name,
            'slug' => $slug,
            'status' => $request->status,
        ]);
    }
    public static function updateQuestionCategoryData($request){
        $category = QuestionCategory::find($request->id);
        $slug = str_replace(str_split('/:*?"<>| '), '-', $request->name);
        $category->name = $request->name;
        $category->slug = $slug;
        $category->status = $request->status;
        $category->save();
    }
}
