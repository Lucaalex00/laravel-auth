@extends('layouts.admin')

@section('content')
    <header class="py-3 bg-dark text-light">
        <div class="container d-flex align-items-center justify-content-between">
            <h1>Projects</h1>
            <a class="btn btn-primary" href="{{ route('admin.portfolio.create') }}"> New Project </a>
        </div>
    </header>

    <div class="container my-4">
        <div class="table-responsive">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Link</th>
                        <th scope="col">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project)
                        <tr>
                            <td>{{ $project->id }}</td>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->slug }}</td>
                            <td>{{ $project->link }}</td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('admin.portfolio.show', $project) }}">
                                    &RightArrow; View
                                </a>
                                / Modify / Delete
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No projects yet!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $projects->links('pagination::bootstrap-5') }}
    </div>
@endsection
