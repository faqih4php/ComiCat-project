<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::with('chapter')->get();
        return view('admins.pages.base', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Chapter $chapter)
    {
        return view('admins.pages.create', compact('chapter'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Chapter $chapter)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('images')) {
            $lastPage = $chapter->pages()->max('page_number') ?? 0;

            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('chapters/' . $chapter->comic_id . '/' . $chapter->id, 'public');

                Page::create([
                    'chapter_id' => $chapter->id,
                    'image' => $path,
                    'page_number' => $lastPage + $index + 1
                ]);
            }
        }

        return redirect()->route('chapters.show', $chapter)
            ->with('success', 'Pages added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Chapter $chapter, Page $page)
    {
        return view('admins.pages.show', compact('chapter', 'page'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chapter $chapter, Page $page)
    {
        return view('admins.pages.edit', compact('chapter', 'page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chapter $chapter, Page $page)
    {
        $request->validate([
            'page_number' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // Handle image update if new image is uploaded
        if ($request->hasFile('image')) {
            // Delete old image
            if (Storage::disk('public')->exists($page->image)) {
                Storage::disk('public')->delete($page->image);
            }

            // Store new image
            $path = $request->file('image')->store('chapters/' . $chapter->comic_id . '/' . $chapter->id, 'public');
            $page->image = $path;
        }

        // Update page number if it changed
        if ($page->page_number != $request->page_number) {
            // Reorder other pages
            if ($request->page_number > $page->page_number) {
                $chapter->pages()
                    ->whereBetween('page_number', [$page->page_number + 1, $request->page_number])
                    ->decrement('page_number');
            } else {
                $chapter->pages()
                    ->whereBetween('page_number', [$request->page_number, $page->page_number - 1])
                    ->increment('page_number');
            }

            $page->page_number = $request->page_number;
        }

        $page->save();

        return redirect()->route('chapters.show', $chapter)
            ->with('success', 'Page updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chapter $chapter, Page $page)
    {
        // Delete file from storage
        if (Storage::disk('public')->exists($page->image)) {
            Storage::disk('public')->delete($page->image);
        }

        $page->delete();

        // Reorder remaining pages
        $chapter->pages()
            ->where('page_number', '>', $page->page_number)
            ->orderBy('page_number')
            ->each(function ($item) {
                $item->update(['page_number' => $item->page_number - 1]);
            });

        return redirect()->route('chapters.show', $chapter)
            ->with('success', 'Page deleted successfully');
    }

    /**
     * Update page order.
     */
    public function reorder(Request $request, Chapter $chapter)
    {
        $request->validate([
            'pages' => 'required|array',
            'pages.*' => 'exists:pages,id'
        ]);

        foreach ($request->pages as $index => $pageId) {
            Page::where('id', $pageId)->update(['page_number' => $index + 1]);
        }

        return response()->json(['message' => 'Page order updated successfully']);
    }
}
