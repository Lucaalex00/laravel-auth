@extends('layouts.admin')

@section('content')
    <header class="py-3 bg-dark text-white">
        <div class="container d-flex flex-column align-items-start justify-content-between">
            <h1>Project Details</h1>
            <a class=" p-3 border border-warning rounded-circle text-white text-decoration-none"
                href="{{ route('admin.portfolio.index') }}">
                &leftarrow;</a>
        </div>
        @if (session('message'))
            <div class="alert alert-success w-50 my-3 mx-auto text-center">
                <h4>{{ session('message') }}</h4>
            </div>
        @endif
    </header>
    <div class="container my-4 text-light">
        <h3>Title: {{ $project->title }}</h3>
        <p>Slug: {{ $project->slug }}</p>
        <p>Link: <a class="text-decoration-none text-warning" href="{{ $project->link }}">{{ $project->link }}</a></p>
        <p>Content: {{ $project->content }}</p>
    </div>
@endsection
