@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">


                @if ($notes->count())
                    @foreach ($notes as $note)
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header">{{ $note->title }}</div>
                            <div class="card-body">{{ $note->body }}</div>
                            <div class="card-footer">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary float-left" data-toggle="modal"
                                        data-target="#editModal{{ $note->id }}">
                                    <i class="fas fa-edit"></i>&nbsp;Edit
                                </button>

                                <form action="{{ route('notes.destroy', $note->id) }}" method="post">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-outline-danger float-right">
                                        <i class="far fa-trash-alt"></i>&nbsp;Delete
                                    </button>
                                    {{ method_field('DELETE') }}
                                </form>

                            </div>
                        </div>
                        <br />
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="editModal{{ $note->id }}" tabindex="-1" role="dialog"
                         aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                        <span class="badge badge-secondary">Editing</span> {{ $note->title }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="/note/{{ $note->id }}/edit" method="post" id="edit-note-{{ $note->id }}">
                                        {{ csrf_field() }}
                                        <input type="text" name="title" id="title-{{ $note->id }}"
                                               class="form-control" maxlength="255" value="{{ $note->title }}">
                                        <textarea rows="10" name="body" id="body-{{ $note->id }}"
                                                  class="form-control" maxlength="50000">{{ $note->body }}</textarea>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary"
                                                onclick="event.preventDefault();
                                                document.getElementById('edit-note-{{ $note->id }}').submit();">
                                            Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                @else
                    <div class="card">
                        <div class="card-header"></div>
                        <div class="card-body">
                            You have no notes yet.
                        </div>
                    </div>
                @endif


        </div>
    </div>
@endsection
