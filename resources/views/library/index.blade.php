@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">My Notes</div>
                    <div class="card-body">
                        @if ($notes->count())
                            <table class="table">
                                <thead>
                                <th>Title</th>
                                <th>Body</th>
                                <th>&nbsp;</th>
                                </thead>
                                <tbody>
                                @foreach ($notes as $note)
                                    <tr>
                                        <td>
                                            {{ $note->title }}
                                        </td>
                                        <td>
                                            {{ $note->body }}
                                        </td>
                                        <td>
                                            <form action="{{ route('notes.destroy', $note->id) }}" method="post">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                {{ method_field('DELETE') }}
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <blockquote class="blockquote">
                                <p class="mb-0">I enjoy the freedom of the blank page.</p>
                                <footer class="blockquote-footer">Irvine Welsh</footer>
                            </blockquote>
                            <hr>
                            <p>You have no notes yet.</p>
                            <hr>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
