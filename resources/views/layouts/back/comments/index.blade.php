@extends('layouts.master')

@section('content')


@foreach ($comments  as $comment)

{{$comment->posts->}}

@endforeach

@endsection
