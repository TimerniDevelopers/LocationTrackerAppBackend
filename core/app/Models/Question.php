<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function saveQuestionData($request){
        Question::create([
            'type' => $request->type,
            'name' => $request->name,
            'option1' => $request->option1,
            'option2' => $request->option2,
            'option3' => $request->option3,
            'option4' => $request->option4,
            'status' => $request->status,
        ]);
    }
    public static function updateQuestionData($request){
        $question = Question::find($request->id);
        $question->type = $request->type;
        $question->name = $request->name;
        $question->option1 = $request->option1;
        $question->option2 = $request->option2;
        $question->option3 = $request->option3;
        $question->option4 = $request->option4;
        $question->status = $request->status;
        $question->save();
    }
    public static function deleteQuestionData($request){
        $question = Question::find($request->id);
        if ($question != null){
            $question->delete();
        }
    }
}
