<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ArticleController extends Controller
{
    public function index(){
        $articles = Article::all();
        return view('article.articles',['articles'=>$articles]);
    }
    public function create(){
        return view('article.create');
    }

    public function store(){
        $validate_data = $this->validate(request(),[
            'title' => "required|min:5|max:20",
            'body' => "required|min:10|max:50"
        ]);
        Article::create([
            'title' => $validate_data['title'],
            'body' => $validate_data['body'],
            'slug' => "test"
        ]);
        return redirect("/admin/articles")
            ->with(['message' => 'Article added successful']);
    }
    public function delete($id){
        Article::findOrFail($id)->delete();
        return redirect("/admin/articles")->with('message','Article deleted successful');
    }
    public function edit($id){
        $article = Article::findOrFail($id);

        return view('article.edit', ['article' => $article]);
    }
    public function update($id){
        $validate_data = $this->validate(request(), [
            'title' => "required|min:5|max:20",
            'body' => "required|min:10|max:500"
        ]);
        Article::findOrFail($id)->update($validate_data);
        return redirect("/admin/articles")->with('message','Article edited successful');
    }
}
