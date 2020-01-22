<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;

class NoteController extends Controller
{

    protected $notes;

    /**
     * Create a new NoteController instance.
     *
     * @void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('notes.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required|max:50000'
        ]);

        $request->user()->notes()->create([
            'title' => $request->get('title'),
            'body' => $request->get('body')
        ]);

        return redirect()->route('notes.index');
    }

    public function edit(Request $request, Note $note)
    {
        $note->update([
            'title' => $request->get('title'),
            'body' => $request->get('body')
        ]);

        return redirect()->route('library.index');
    }

    public function destroy(Request $request, Note $note)
    {
        $this->authorize('destroy', $note);
        $note->delete();

        return redirect()->route('library.index');
    }
}
