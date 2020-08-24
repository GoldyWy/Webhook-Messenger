@extends('webview.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3>{{ $category->name }}</h3>
            @if (count($list) > 0)
            @foreach ($list as $item)
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="media">
                        <div class="media-left">
                            <a href="{{ url('/webview/'.$category->id.'/'.$item->id) }}">
                                <img class="media-object" src="{{ $item->thumbnail }}" alt="{{ $item->title }}" style="width: 64px;height: 64px;object-fit: cover;">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">
                                <a href="{{ url('/webview/'.$category->id.'/'.$item->id) }}">{{ $item->title }}</a>
                            </h4>
                            <p>{{ $item->short_description }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    <h5>No data to display.</h5>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
