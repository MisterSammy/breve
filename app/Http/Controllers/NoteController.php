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
    }

    public function destroy(Note $note)
    {
        //
    }
}
