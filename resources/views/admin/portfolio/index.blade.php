@extends('layouts.admin')
@section('content')
    <header class="py-3 bg-dark text-white">
        <div class="container d-flex align-items-center justify-content-between">
            <h1>
                Projects :
            </h1>
            {{--  <a class="btn btn-primary" href="{{ route('admin.posts.create') }}"> New Post</a> --}}
        </div>
    </header>

    <div class="container">

        <div class="table-responsive">
            <table class="table table-light">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Slug</th>
                        <th scope="col">link</th>
                        <th scope="col">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project)
                        {{--  @dd($projects) --}}
                        <tr class="">
                            <td scope="row">{{ $project->id }}</td>
                            <td scope="row">{{ $project->title }}</td>
                            <td scope="row">{{ $project->slug }}</td>
                            <td scope="row">{{ $project->link }}</td>

                            <td>
                                {{-- <a class="btn btn-dark" href="{{ route('admin.projects.show', $project) }}"> --}} &RightArrow;
                                View</a>/Modify/Delete
                            </td>
                        </tr>
                    @empty
                        <h3>No projects yet !</h3>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $projects->links('pagination::bootstrap-5') }}
    @endsection
