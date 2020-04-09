@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Add post</div>

                    <div class="card-body">
                        @include('flash-message')

                        <form method="POST" action="{{ route('posts.store') }}">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label text-md-right">Title</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                           name="title" value="{{ old('title') }}" required>
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 col-form-label text-md-right">Body</label>

                                <div class="col-md-8">
                                    <textarea id="body" type="text"
                                           class="form-control @error('body') is-invalid @enderror"
                                           name="body" required>{{old('body')}}</textarea>
                                    @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label text-md-right">Publish At</label>

                                <div class="col-md-8">
                                    <input id="publish" type="datetime-local" class="form-control @error('publish') is-invalid @enderror"
                                           name="publish" value="{{old('publish')}}" required>

                                    @error('publish')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-8  offset-md-2">
                                    <button type="submit" class="form-control btn-primary">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
