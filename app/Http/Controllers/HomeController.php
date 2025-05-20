<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\NewsItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
        public function index()
    {
        $newsItem = NewsItem::latest()->get();
        return view('home', compact('newsItem'));
    }

    public function storeNewsItem(Request $request)
    {
        if (!Auth::user() || !Auth::user()->is_admin) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|max:80',
            'content' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('news_images', 'public');
        }

        NewsItem::create($validated);

        return redirect()->route('home')->with('status', 'News item created successfully!');
    }

    public function createNewsItem()
{
    if (!Auth::user() || !Auth::user()->is_admin) {
        abort(403);
    }

    return view('newsItem.create');
}

    
    public function editNewsItem(NewsItem $newsItem)
    {
        if (!Auth::user() || !Auth::user()->is_admin) {
            abort(403);
        }

        return view('newsItem.edit', compact('newsItem'));
    }

    public function updateNewsItem(Request $request, NewsItem $newsItem)
    {
        if (!Auth::user() || !Auth::user()->is_admin) {
            abort(403);
        }

    $validated = $request->validate([
        'title' => 'required|max:80',
        'content' => 'required',
        'image' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('image')) {
        if ($newsItem->image_path) {
            Storage::disk('public')->delete($newsItem->image_path);
        }

        $validated['image_path'] = $request->file('image')->store('news_images', 'public');
    }

    $newsItem->update($validated);

    return redirect()->route('home')->with('status', 'News item updated successfully!');
}

public function deleteNewsItem(NewsItem $newsItem)
{
    if (!Auth::user() || !Auth::user()->is_admin) {
        abort(403);
    }

    if ($newsItem->image_path) {
        Storage::disk('public')->delete($newsItem->image_path);
    }

    $newsItem->delete();

    return redirect()->route('home')->with('status', 'News item deleted successfully!');
}
}