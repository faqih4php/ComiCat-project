<?php

namespace App\Http\Controllers\admins;

use App\Models\Comic;
use App\Models\Genre;
use Illuminate\Http\Request;

class ComicGenreController extends Controller
{
    // Menampilkan semua genre yang tersedia
    public function index()
    {
        $genres = Genre::all();
        
        return response()->json([
            'genres' => $genres
        ]);
    }

    // Menampilkan form untuk menambah genre ke komik
    public function create()
    {
        $genres = Genre::all();
        
        return response()->json([
            'genres' => $genres
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Comic $comic)
    {
        $request->validate([
            'genre_id' => 'required|exists:genres,id'
        ]);

        $comic->genres()->attach($request->genre_id);

        return response()->json([
            'message' => 'Genre berhasil ditambahkan ke komik'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comic $comic)
    {
        $genres = $comic->genres;

        return response()->json([
            'comic' => $comic,
            'genres' => $genres
        ]);
    }

    // Menampilkan form untuk mengedit genre komik
    public function edit(Comic $comic)
    {
        $selectedGenres = $comic->genres;
        $allGenres = Genre::all();
        
        return response()->json([
            'comic' => $comic,
            'selected_genres' => $selectedGenres,
            'all_genres' => $allGenres
        ]);
    }

    // Memperbarui genre komik
    public function update(Request $request, Comic $comic)
    {
        $request->validate([
            'genre_ids' => 'required|array',
            'genre_ids.*' => 'exists:genres,id'
        ]);

        $comic->genres()->sync($request->genre_ids);

        return response()->json([
            'message' => 'Genre komik berhasil diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Comic $comic)
    {
        $request->validate([
            'genre_id' => 'required|exists:genres,id'
        ]);

        $comic->genres()->detach($request->genre_id);

        return response()->json([
            'message' => 'Genre berhasil dihapus dari komik'
        ]);
    }

    // Mendapatkan semua genre dari sebuah komik
    public function getGenres(Comic $comic)
    {
        $genres = $comic->genres;

        return response()->json([
            'genres' => $genres
        ]);
    }

    // Mendapatkan semua komik dari sebuah genre
    public function getComics(Genre $genre)
    {
        $comics = $genre->comics;

        return response()->json([
            'comics' => $comics
        ]);
    }
} 