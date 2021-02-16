<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {
            $user = Auth::user();
            $id = $user->id;
            $blog = Article::where('user_id', $id)->get();
            return view('user.blog',['bloglist'=>$blog]);
    }
    public function postcreate(Request $request, $id)
    {
        if(User::where('id', $id)->exists()){
            $user = User::find($id);

            $article = new Article();

            $category = new Category();
            $category->name = $request->name;

            $article->title = is_null($request->title) ? $article->title : $request->title;
            $article->description = is_null($request->description) ? $article->description : $request->description;
            $article->image = is_null($request->image) ? $article->image : $request->image;
            if($category->name == 'Beach'){
                $article->category_id = 1;
            }
            else if($category->name == 'Mountain'){
                $article->category_id = 2;
            }
            else if($category->name == 'Foods'){
                $article->category_id = 3;
            }
            $article->user_id = $user->id;
            $article->save();

            return '<script>alert("Insert Successful!");window.location.href="/user/blog/";</script>';

        }
        return '<script>alert("Insert Failed!");window.location.href="/user/blog/";</script>';
    }
    public function delete($id)
    {
        if(Article::where('id', $id)->exists()){
            $article = Article::where('id', $id);
            $article->delete();

            return '<script>alert("Delete Successful!");window.location.href="/user/blog";</script>';
        }
        return '<script>alert("Delete Failed! No Matched Data To Delete!");window.location.href="/user/blog";</script>';
    }
    public function create()
    {
        return view('user.create');
    }
    public function edit($id)
    {
        if(Article::where('id', $id)->exists()){
            $article = Article::find($id);
            return view('user.editblog',['content'=>$article]);
        }
    }
    public function update(Request $request, $id)
    {
        if(Article::where('id', $id)->exists()){
            $article = Article::find($id);

            $category = Category::where('id', $article->category_id)->get();
            $category->name = $request->name;
            $user = User::where('id', $article->user_id)->get();
            $user->id = $article->user_id;

            $article->title = is_null($request->title) ? $article->title : $request->title;
            $article->description = is_null($request->description) ? $article->description : $request->description;
            $article->image = is_null($request->image) ? $article->image : $request->image;
            if($category->name == 'Beach'){
                $article->category_id = 1;
            }
            else if($category->name == 'Mountain'){
                $article->category_id = 2;
            }
            else if($category->name == 'Foods'){
                $article->category_id = 3;
            }
            $article->user_id = $user->id;
            $article->save();

            return '<script>alert("Update Successful!");window.location.href="/user/blog/";</script>';
        }

        return '<script>alert("Update Failed!!");window.location.href="/user/blog/";</script>';
    }
}
