<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\NoteRepository;
use App\Note;

class LibraryController extends Controller
{
    protected $notes;

    /**
     * Create a new LibraryController instance.
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
        return view('library.index', [
            'notes' => $this->notes->forUser($request->user())
        ]);
    }
}
