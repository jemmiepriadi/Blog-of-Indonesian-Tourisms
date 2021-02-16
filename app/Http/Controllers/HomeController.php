<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($id)
    {
        if(Article::where('category_id', $id)->exists()){
            $article = Article::where('category_id', $id)->get();
            if($id == 1){
                return view('home.beach',['bloglist'=>$article]);
            }
            else if($id == 2){
                return view('home.mountain',['bloglist'=>$article]);
            }
            else if($id == 3){
                return view('home.foods',['bloglist'=>$article]);
            }
        }

    }
}
