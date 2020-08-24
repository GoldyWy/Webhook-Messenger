@extends('webview.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <button type="button" class="btn btn-default btn-xs" onclick="javascript:history.go(-1);">
                        <span class="glyphicon glyphicon-chevron-left"></span> Back
                    </button>
                    <h3>{{ $data->title }}</h3>
                    <h6>{{ $data->category->name }}</h6>
                    <img src="{{ $data->thumbnail }}" alt="{{ $data->title }}" class="img-thumbnail" style="width: 100vw;" >
                    {!! $data->full_description !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
