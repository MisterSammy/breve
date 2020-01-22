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
                                <form action="{{ route('notes.destroy', $note->id) }}" method="post">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    {{ method_field('DELETE') }}
                                </form>
                            </div>
                        </div>
                        <br />
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
