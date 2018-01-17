@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Add new news item</h1>
            <form action="/addnews" method="post">
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        Please fix the following errors
                    </div>
                @endif

                {!! csrf_field() !!}
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ old('title') }}">
                    @if($errors->has('title'))
                        <span class="help-block">{{ $errors->first('title') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" placeholder="description">{{ old('description') }}</textarea>
                    @if($errors->has('description'))
                        <span class="help-block">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('image_path') ? ' has-error' : '' }}">
                    <label for="image_path">Image Path</label>
                    <input type="text" class="form-control" id="image_path" name="image_path" placeholder="image_path" value="{{ old('image_path') }}">
                    @if($errors->has('image_path'))
                        <span class="help-block">{{ $errors->first('image_path') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
@endsection