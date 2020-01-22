@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">New Note</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('notes.store') }}" method="post" class="form-horizontal needs-validation">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control
                                    {{ $errors->has('title') ? 'is-danger' : '' }}" maxlength="255">
                                    @if ($errors->has('title'))
                                        <p class="help is-danger">{{ $errors->first('title') }}</p>
                                    @endif
                            </div>
                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea rows="10" name="body" id="body" class="form-control
                                    {{ $errors->has('body') ? 'is-danger' : '' }}" maxlength="50000"></textarea>
                                @if ($errors->has('body'))
                                    <p class="help is-danger">{{ $errors->first('body') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-success">Add Note</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <br />
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <blockquote class="blockquote">
                            <p class="mb-0">I enjoy the freedom of the blank page.</p>
                            <footer class="blockquote-footer">Irvine Welsh</footer>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
