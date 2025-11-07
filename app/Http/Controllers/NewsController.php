<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the news (landing page).
     */
    public function index()
    {
        // show latest news
        $news = News::with('wartawan')->latest()->paginate(6);

        return view('news.index', compact('news'));
    }

    /**
     * Display the specified news item.
     */
    public function show(News $news)
    {
        $news->load(['wartawan', 'komentar']);

        // latest comments first
        $comments = $news->komentar()->latest()->get();

        return view('news.show', compact('news', 'comments'));
    }

    /**
     * Store a newly created comment for a news item.
     */
    public function storeComment(Request $request, News $news)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:150',
            'isi' => 'required|string|max:1000',
        ]);

        $comment = new Komentar();
        $comment->nama = $data['nama'];
        $comment->isi = $data['isi'];
        $comment->news_id = $news->id;
        $comment->save();

        return redirect()->route('news.show', $news)->with('success', 'Komentar berhasil ditambahkan');
    }
}

