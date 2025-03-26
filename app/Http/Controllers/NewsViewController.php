<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use App\Models\News;

class NewsViewController extends Controller
{
    public function index()
    {
        $news = News::with(['user.student', 'user.teacher', 'user.admin'])->where('trangthai', 'public')->orderBy('updated_at', 'desc')->paginate(14);
        $updated_at = News::orderBy('updated_at', 'desc')->first();
        return view('newsviews.index', compact('news'));
    }

    public function show($matintuc)
    {
        $news = News::with(['user.student', 'user.teacher', 'user.admin'])->paginate(5);
        $newsdetail = News::where('matintuc', $matintuc)->first();
        $updated_at = News::orderBy('updated_at', 'desc')->first();
        return view('newsviews.show', compact('news', 'newsdetail'));
    }
}
