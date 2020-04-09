@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('flash-message')
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard
                        <a href="{{route('posts.create')}}" class="btn btn-primary" style="float: right"> New Post</a>
                    </div>
                    <div class="card-body">
                        @forelse ($posts as $post)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="level">
                                        <div class="flex">
                                            <h4>
                                                <a href="{{ route('posts.show', $post->slug) }}">
                                                    <strong>       {{ $post->title }} </strong>
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel-body">
                                    <div class="body">{!! $post->body !!}</div>
                                </div>
                            </div>
                        @empty
                            <p>There are no relevant results at this time.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
