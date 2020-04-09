@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Posts <a href="{{route('posts.index')}}"
                                                      class="float-right btn btn-secondary">Back</a>
                    </div>

                    <div class="card-body">
                        <h1>{{$post->title}}</h1>
                        <p>{{$post->body}}</p>
                        <div><span class="badge">Posted {{$post->published_at}}</span></div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
