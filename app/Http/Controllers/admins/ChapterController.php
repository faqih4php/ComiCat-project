<?php

namespace App\Http\Controllers\admins;

use App\Models\Chapter;
use App\Models\Comic;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Comic $comic = null)
    {
        if ($comic) {
            $chapters = Chapter::with('comic')->where('comic_id', $comic->id)->get();
        } else {
            $chapters = Chapter::with('comic')->get();
        }
        return view('admins.chapters.base', compact('chapters', 'comic'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Comic $comic)
    {
        $comics = Comic::all();
        return view('admins.chapters.create', compact('comic', 'comics'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Comic $comic)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'chapter_number' => 'required|numeric',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:5048',
            'content' => 'nullable|string',
        ], [
            'title.required' => 'Judul chapter harus diisi',
            'chapter_number.required' => 'Nomor chapter harus diisi',
            'chapter_number.numeric' => 'Nomor chapter harus berupa angka',
            'images.*.required' => 'Gambar chapter harus diupload',
            'images.*.image' => 'File harus berupa gambar',
            'images.*.mimes' => 'Gambar harus berformat: jpeg, png, jpg, atau gif',
            'images.*.max' => 'Ukuran gambar maksimal 5MB',
        ]);

        $chapter = new Chapter();
        $chapter->comic_id = $comic->id;
        $chapter->title = $request->title;
        $chapter->chapter_number = $request->chapter_number;
        $chapter->content = $request->content;
        $chapter->save();

        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $path = $image->storeAs('chapters/' . $comic->id . '/' . $chapter->id, $filename, 'public');
                $images[] = $path;
            }
            $chapter->file_path = json_encode($images);
            $chapter->save();
        }

        return redirect()->route('comics.show', ['comic' => $comic->id])
            ->with('success', 'Chapter berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Chapter $chapter)
    {
        $chapter = Chapter::with(['comic'])->find($chapter->id);
        return view('admins.chapters.show', compact('chapter'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chapter $chapter)
    {
        $comics = Comic::all();
        return view('admins.chapters.edit', compact('chapter', 'comics'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chapter $chapter)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'chapter_number' => 'required|numeric',
            'new_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
            'content' => 'nullable|string',
            'existing_images' => 'nullable|array',
        ], [
            'title.required' => 'Judul chapter harus diisi',
            'chapter_number.required' => 'Nomor chapter harus diisi',
            'chapter_number.numeric' => 'Nomor chapter harus berupa angka',
            'new_images.*.image' => 'File harus berupa gambar',
            'new_images.*.mimes' => 'Gambar harus berformat: jpeg, png, jpg, atau gif',
            'new_images.*.max' => 'Ukuran gambar maksimal 5MB',
        ]);

        $chapter->title = $request->title;
        $chapter->chapter_number = $request->chapter_number;
        $chapter->content = $request->content;

        // Handle existing images
        $existingImages = $request->existing_images ?? [];
        
        // Handle new images
        if ($request->hasFile('new_images')) {
            $newImages = [];
            foreach ($request->file('new_images') as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $path = $image->storeAs('chapters/' . $chapter->comic_id . '/' . $chapter->id, $filename, 'public');
                $newImages[] = $path;
            }
            // Combine existing and new images
            $allImages = array_merge($existingImages, $newImages);
        } else {
            $allImages = $existingImages;
        }

        $chapter->file_path = json_encode($allImages);
        $chapter->save();

        return redirect()->route('comics.show', $chapter->comic)
            ->with('success', 'Chapter berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chapter $chapter)
    {
        $comic_id = $chapter->comic_id;
        $chapter->delete();
        return redirect()->route('comics.show', $comic_id)->with('success', 'Chapter berhasil dihapus');
    }
}
