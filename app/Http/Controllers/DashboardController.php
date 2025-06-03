<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalArticles = Article::count();
        $activeUsers = User::count();

        $twoDaysAgo = Carbon::now()->subDays(2);
        $recentArticles = Article::where('created_at', '>=', $twoDaysAgo)
                                ->orderBy('created_at', 'desc')
                                ->get()
                                ->map(function ($article) {
                                    $createdAt = Carbon::parse($article->created_at);
                                    $now = Carbon::now();
                                    if ($createdAt->diffInHours($now) < 24) {
                                        // Display "X hours ago" if less than 1 hour, show "1 hour ago"
                                        $hours = $createdAt->diffInHours($now);
                                        $article->display_time = ($hours == 0 ? 1 : $hours) . ' hours ago';
                                    } else {
                                        $article->display_time = 'a day ago';
                                    }
                                    return $article;
                                });

        return view('dashboard', [
            'totalArticles' => $totalArticles,
            'activeUsers' => $activeUsers,
            'recentArticles' => $recentArticles,
        ]);
    }
} 