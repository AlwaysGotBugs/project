<?php
// app/Http/Controllers/Admin/NewsController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; // For slug generation

class NewsController extends Controller
{
    public function index()
    {
        $newsItems = News::latest()->paginate(10); // Changed variable name to newsItems
        return view('admin.news.index', compact('newsItems')); // Pass newsItems
    }

    public function create()
    {
        // Define types for dropdown
        $types = [
            'news' => 'آخر الأخبار',
            'interview' => 'مقابلات وتقارير',
            'article' => 'مقالات',
        ];
        return view('admin.news.create', compact('types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'type' => 'required|in:news,interview,article', // Validate against allowed types
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Max 2MB
            'is_published' => 'boolean',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news_images', 'public');
        }

        $news = News::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title), // Generate slug from title
            'content' => $request->content,
            'type' => $request->type,
            'image' => $imagePath,
            'is_published' => $request->has('is_published'),
            'published_at' => $request->has('is_published') ? now() : null,
            'user_id' => Auth::id(), // Assign current logged-in user
        ]);

        return redirect()->route('admin.news.index')->with('success', 'News item created successfully!');
    }

    /**
     * Display the specified news item.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\View\View
     */
    public function show(News $news)
    {
        // Laravel's Route Model Binding automatically fetches the News model
        // based on the ID in the URL and injects it into the $news variable.
        // If the news item isn't found, Laravel will automatically return a 404.
        return view('admin.news.show', compact('news'));
    }

    public function edit(News $news)
    {
        $types = [
            'news' => 'آخر الأخبار',
            'interview' => 'مقابلات وتقارير',
            'article' => 'مقالات',
        ];
        return view('admin.news.edit', compact('news', 'types'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'type' => 'required|in:news,interview,article',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_published' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $imagePath = $request->file('image')->store('news_images', 'public');
            $news->image = $imagePath;
        }

        $news->title = $request->title;
        $news->slug = Str::slug($request->title); // Update slug
        $news->content = $request->content;
        $news->type = $request->type;
        $news->is_published = $request->has('is_published');
        // Update published_at only if it's being published now and wasn't before
        if ($request->has('is_published') && is_null($news->published_at)) {
            $news->published_at = now();
        } elseif (!$request->has('is_published')) {
            $news->published_at = null; // Unpublish
        }
        $news->save();

        return redirect()->route('admin.news.index')->with('success', 'News item updated successfully!');
    }

    public function destroy(News $news)
    {
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'News item deleted successfully!');
    }
}