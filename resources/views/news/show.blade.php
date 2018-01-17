@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>{{$news->title}}</h1>
            <h3>Description:</h3> {{$news->description}}</br>
            <h3>Image Path:</h3> {{$news->image_path}}</br>
        </div>
        <div class="row">
          <a href="{{ route('edit_news_item', ['id' => $news->id]) }}"  class="btn btn-info">
            Edit
          </a>
          
          <form action="{{ route('delete_news_item', $news->id) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            
            <button type="submit" class="btn btn-warning">Delete</button>
          </form>
        </div>
    </div>
@endsection