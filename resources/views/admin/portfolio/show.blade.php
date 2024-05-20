@extends('layouts.admin')

@section('content')
    <header class="py-3 bg-dark text-white">
        <div class="container d-flex align-items-center justify-content-between">
            <h1>Project Details</h1>
        </div>
    </header>
    <div class="container my-4">
        <h3>Title: {{ $project->title }}</h3>
        <p>Slug: {{ $project->slug }}</p>
        <p>Link: <a href="{{ $project->link }}">{{ $project->link }}</a></p>
        <p>Content: {{ $project->content }}</p>
    </div>
@endsection
