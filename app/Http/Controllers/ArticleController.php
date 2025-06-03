<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get();
        // Ambil sekaligus hapus session popupImage agar popup muncul sekali saja
        $popupImage = session()->pull('popupImage');

        return view('articles.index', compact('articles', 'popupImage'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'link' => 'required|url',
            'author' => 'required|string|max:100',
            'ringkasan' => 'required|string|max:500',
        ]);

        Article::create($validatedData);

        session(['popupImage' => 'success-add.png']);
        return redirect()->route('articles.index');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);

        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'link' => 'required|url',
            'author' => 'required|string|max:100',
            'ringkasan' => 'required|string|max:500',
        ]);

        $article = Article::findOrFail($id);
        $article->update($validatedData);

        session(['popupImage' => 'success-edit.png']);
        return redirect()->route('articles.index');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        session(['popupImage' => 'confirm-delete.png']);
        return redirect()->route('articles.index');
    }
}
