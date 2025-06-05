<?php

namespace App\Http\Controllers\admins;

use App\Models\Comment;
use App\Models\User;
use App\Models\Comic;
use App\Models\Chapter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::with('user', 'comic', 'chapter')->get();
        return view('admins.comments.base', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $comics = Comic::all();
        $chapters = Chapter::all();
        return view('admins.comments.create', compact('users', 'comics', 'chapters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'content' => 'required|string',
            'comic_id' => 'required_without:chapter_id|exists:comics,id|nullable',
            'chapter_id' => 'required_without:comic_id|exists:chapters,id|nullable',
        ]);

        $comment = new Comment();
        $comment->user_id = $request->user_id;
        $comment->content = $request->content;

        // Set comic_id or chapter_id based on where the comment is made
        if ($request->filled('comic_id')) {
            $comment->comic_id = $request->comic_id;
        } else {
            $comment->chapter_id = $request->chapter_id;
            // Get comic_id from chapter
            $chapter = Chapter::find($request->chapter_id);
            $comment->comic_id = $chapter->comic_id;
        }

        $comment->save();

        return redirect()->back()
            ->with('success', 'Comment added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        return view('admins.comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        $users = User::all();
        $comics = Comic::all();
        $chapters = Chapter::all();
        return view('admins.comments.edit', compact('comment', 'users', 'comics', 'chapters'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'content' => 'required|string',
            'comic_id' => 'required_without:chapter_id|exists:comics,id|nullable',
            'chapter_id' => 'required_without:comic_id|exists:chapters,id|nullable',
        ]);

        $comment->user_id = $request->user_id;
        $comment->content = $request->content;

        // Update comic_id or chapter_id
        if ($request->filled('comic_id')) {
            $comment->comic_id = $request->comic_id;
            $comment->chapter_id = null;
        } else {
            $comment->chapter_id = $request->chapter_id;
            // Update comic_id from chapter
            $chapter = Chapter::find($request->chapter_id);
            $comment->comic_id = $chapter->comic_id;
        }

        $comment->save();

        return redirect()->route('comments.index')
            ->with('success', 'Comment updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('comments.index')
            ->with('success', 'Comment deleted successfully!');
    }

    /**
     * Get comments for a specific comic
     */
    public function getComicComments(Comic $comic)
    {
        $comments = Comment::where('comic_id', $comic->id)
            ->whereNull('chapter_id')
            ->with('user')
            ->latest()
            ->get();

        return response()->json($comments);
    }

    /**
     * Get comments for a specific chapter
     */
    public function getChapterComments(Chapter $chapter)
    {
        $comments = Comment::where('chapter_id', $chapter->id)
            ->with('user')
            ->latest()
            ->get();

        return response()->json($comments);
    }
}
