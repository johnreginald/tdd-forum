@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="#">{{ $thread->creator->name }}</a> posted:
                        {{ $thread->title }}
                    </div>

                    <div class="card-body">
                        <div class="body">
                            <p>11
                                {{ $thread->body }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @foreach($thread->replies as $reply)
            @include('threads.reply')
        @endforeach

        @auth()
            <div class="row justify-content-center mt-3">
                <div class="col-md-8">
                    <form action="{{ route('threads.reply', $thread) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <textarea name="body" rows="10" class="form-control"></textarea>
                        </div>
                        <button class="btn btn-primary">Reply</button>
                    </form>
                </div>
            </div>
        @endauth()
    </div>
@endsection