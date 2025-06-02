<?php

namespace App\Http\Controllers;

use App\Models\News; // Make sure to import the News model
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // This method handles the main news listing page
        $news = News::where('is_published', true)
                     ->latest()
                     ->paginate(10); // Or whatever logic you have for your main news list

        return view('news.index', compact('news'));
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news) // Route Model Binding automatically fetches the News item
    {
        // Ensure the news item is published before showing it on the public side
        if (!$news->is_published && !auth()->check()) { // If not published and user is not logged in
            abort(404); // Or redirect to a different page
        }

        // Eager load the 'user' relationship to prevent N+1 query problem and
        // ensure $news->user is available in the view.
        // If you don't need to check is_published or eager load, you can simplify.
        // For 'show' page, it's often better to fetch with eager loading if related data is needed.
        $news->load('user'); // Load the associated user data

        return view('news.show', compact('news'));
    }

    // You might also have a method for news by type if you are using that route
    public function showByType($type)
    {
        $news = News::where('type', $type)
                     ->where('is_published', true)
                     ->latest()
                     ->paginate(10);

        return view('news.index', compact('news')); // Re-use the main index view for filtered results
    }
}