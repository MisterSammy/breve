<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $notes = $request->user()->notes()
            ->orderBy('created_at', 'desc')
            ->get();

        return view('notes.index', [
            'notes' => $notes
        ]);
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

    public function destroy(Note $note)
    {
        //
    }
}
