<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    //test1234
    public function __construct(){
        $this->middleware('auth')->except('index','show');
    }

    public function index()
    {
        $articles = Article::with('user')->orderBy('id','desc')->paginate(5);
        return view('articles.index',['articles' => $articles]);
    }

    public function show($id)
    {
        $article = Article::find($id);
        return view('articles.show',['article' => $article]);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $success = $request->validate([
            'title' => 'required',
            'content' => 'required|min:5'
        ]);

        auth()->user()->articles()->create($success);
        return redirect()->route('root')->with('notice',"新增文章成功");

    }

    public function edit($id)
    {
        $article = auth()->user()->articles->find($id);
        return view('articles.edit',['article' => $article]);
    }


    public function update(Request $request, $id)
    {
        $ariticle = auth()->user()->articles->find($id);

        $success = $request->validate([
            'title' => 'required',
            'content' => 'required|min:5'
        ]);

        $ariticle->update($success);
        return redirect()->route('root')->with('notice','文章更新成功');
    }

    public function destroy($id)
    {
        $ariticle = auth()->user()->articles->find($id);
        $ariticle->delete();
        return redirect()->route('root')->with('notice','刪除成功');
    }
}
