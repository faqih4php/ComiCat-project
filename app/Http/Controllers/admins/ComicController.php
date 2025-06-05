<?php

namespace App\Http\Controllers\admins;

use App\Models\Comic;
use App\Models\Type;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::with('type')->get();
        return view('admins.comics.base', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $genres = Genre::all();
        return view('admins.comics.create', compact('types', 'genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'author' => 'required|max:100',
            'type_id' => 'required|exists:types,id',
            'genres' => 'required|array',
            'genres.*' => 'exists:genres,id',
            'image' => 'required|file|mimes:jpg,jpeg,png,gif,svg|max:5048',
            'description' => 'required',
        ], [
            'title.required' => 'Judul harus diisi',
            'author.required' => 'Penulis harus diisi',
            'type_id.required' => 'Tipe harus diisi',
            'genres.required' => 'Genre harus dipilih',
            'genres.array' => 'Format genre tidak valid',
            'genres.*.exists' => 'Genre yang dipilih tidak valid',
            'image.required' => 'Gambar harus diisi',
            'image.file' => 'File tidak valid',
            'image.mimes' => 'Format file harus jpg, jpeg, png, gif, atau svg',
            'image.max' => 'Gambar maksimal 5MB',
            'description.required' => 'Deskripsi harus diisi',
        ]);

        $data = $request->all();
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        $comic = Comic::create($data);
        $comic->genres()->attach($request->genres);

        return redirect()->route('comics.index')->with('success', 'Comic berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comic $comic)
    {
        $comic = Comic::with(['type', 'chapters', 'genres'])->find($comic->id);
        return view('admins.comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comic $comic)
    {
        $types = Type::all();
        $genres = Genre::all();
        return view('admins.comics.edit', compact('comic', 'types', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comic $comic)
    {
        $request->validate([
            'title' => 'required|max:100',
            'author' => 'required|max:100',
            'type_id' => 'required|exists:types,id',
            'genres' => 'nullable|array',
            'genres.*' => 'exists:genres,id',
            'image' => 'nullable|file|mimes:jpg,jpeg,png,gif,svg|max:5048',
            'description' => 'required',
        ], [
            'title.required' => 'Judul harus diisi',
            'author.required' => 'Penulis harus diisi',
            'type_id.required' => 'Tipe harus diisi',
            'genres.array' => 'Format genre tidak valid',
            'genres.*.exists' => 'Genre yang dipilih tidak valid',
            'image.file' => 'File tidak valid',
            'image.mimes' => 'Format file harus jpg, jpeg, png, gif, atau svg',
            'image.max' => 'Gambar maksimal 5MB',
            'description.required' => 'Deskripsi harus diisi',
        ]);

        $data = $request->all();
        
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($comic->image && file_exists(public_path('images/' . $comic->image))) {
                unlink(public_path('images/' . $comic->image));
            }
            
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        $comic->update($data);
        $comic->genres()->sync($request->genres);

        return redirect()->route('comics.index')->with('success', 'Comic berhasil diubah');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('comics.index')->with('success', 'Comic berhasil dihapus');
    }
}
