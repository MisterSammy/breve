<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\NoteRepository;
use App\Note;

class NoteController extends Controller
{

    protected $notes;

    /**
     * Create a new NoteController instance.
     *
     * @param NoteRepository $notes
     */
    public function __construct(NoteRepository $notes)
    {
        $this->middleware('auth');
        $this->notes = $notes;
    }

    public function index(Request $request)
    {

        return view('notes.index', [
            'notes' => $this->notes->forUser($request->user())
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
