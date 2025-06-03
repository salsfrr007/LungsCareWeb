<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = session('articles', []);
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
        $request->validate([
            'judul' => 'required|string|max:255',
            'link' => 'required|url',
            'author' => 'required|string|max:100',
            'ringkasan' => 'required|string|max:500',
            'tanggal' => 'required|date',
        ]);

        $articles = session('articles', []);
        $id = count($articles) + 1;

        $articles[] = [
            'id' => $id,
            'judul' => $request->judul,
            'link' => $request->link,
            'author' => $request->author,
            'ringkasan' => $request->ringkasan,
            'tanggal' => $request->tanggal, // simpan tanggal
        ];

        session(['articles' => $articles, 'popupImage' => 'success-add.png']);
        return redirect()->route('articles.index');
    }

    public function edit($id)
    {
        $articles = session('articles', []);
        $article = collect($articles)->firstWhere('id', $id);

        if (!$article) {
            return redirect()->route('articles.index')->withErrors('Article not found.');
        }

        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'link' => 'required|url',
            'author' => 'required|string|max:100',
            'ringkasan' => 'required|string|max:500',
            'tanggal' => 'required|date',
        ]);

        $articles = session('articles', []);
        foreach ($articles as &$article) {
            if ($article['id'] == $id) {
                $article['judul'] = $request->judul;
                $article['link'] = $request->link;
                $article['author'] = $request->author;
                $article['ringkasan'] = $request->ringkasan;
                $article['tanggal'] = $request->tanggal; // update tanggal
                break;
            }
        }

        session(['articles' => $articles, 'popupImage' => 'success-edit.png']);
        return redirect()->route('articles.index');
    }

    public function destroy($id)
    {
        $articles = session('articles', []);
        $articles = array_filter($articles, fn ($article) => $article['id'] != $id);
        session(['articles' => array_values($articles), 'popupImage' => 'confirm-delete.png']);
        return redirect()->route('articles.index');
    }
}
