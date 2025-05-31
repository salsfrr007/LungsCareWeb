<?php
use App\Models\Articles;

function index()
{
    $articles = Articles::all(); // atau query sesuai kebutuhan
    return view('articles.index', compact('articles'));
}