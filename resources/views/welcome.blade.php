@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>GSDH News Manager</h1>
        </div>
        <div class="row">
            <h3>Latest News</h3>
            <div>
                <table class="table">
                    <thead class="thead-inverse">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image Path</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($news_items as $item)
                            <tr>
                                    
                                <th scope="row">{{$item->id}}</th>
                                <td>
                                    <a href="{{ route('show_news_item', ['id' => 
                                                $item->id]) }}">{{$item->title}}
                                    </a>
                                </td>
                                <td>{{$item->description}}</td>
                                <td>{{$item->image_path}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection