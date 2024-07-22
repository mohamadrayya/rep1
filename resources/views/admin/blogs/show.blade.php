@extends('admin.layout')
@section('main')
    <div style="color :red;">Title is :<br>{{ $blog->title }}</div><br><br>
    <div style="color :blue;">Content is :<br>{{ $blog->content }}</div>
@endsection
