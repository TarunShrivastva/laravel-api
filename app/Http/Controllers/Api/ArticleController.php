<?php
namespace App\Http\Controllers\Api;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\Article; 
use Illuminate\Support\Facades\Auth; 
use Validator;

class ArticleController extends Controller 
{
 public $successStatus = 200;
  
 public function articleStore(Request $request) {    
 $validator = Validator::make($request->all(), [ 
              'title' => 'required',
              'description' => 'required',
              'status' => 'required',  
    ]);   
 if ($validator->fails()) {          
       return response()->json(['error'=>$validator->errors()], 401);                        }    
 $input = $request->all();  
 $article = Article::create($input); 
 $success['success'] =  'true';
 return response()->json(['success'=>$success], $this->successStatus); 
}
  
public function getArticles() {
 $article = Article::all();
 return response()->json(['success' => $article], $this->successStatus); 
 }
}
