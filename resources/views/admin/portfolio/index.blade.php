@extends('layouts.admin')

@section('content')
    <header class="py-3 bg-dark text-light">
        <div class="container d-flex align-items-center justify-content-between">
            <h1>Projects</h1>
            <a class="btn btn-primary" href="{{ route('admin.portfolio.create') }}"> New Project </a>
        </div>

        @if (session('message'))
            <div class="alert alert-success w-50 my-3 mx-auto text-center">
                <h4>Project Created Successfully</h4>
            </div>
        @endif
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
                                <a class="btn btn-secondary" href="{{ route('admin.portfolio.edit', $project) }}">
                                    Modify</a>





                                <!-- Modal trigger button -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modal{{ $project->id }}">
                                    Delete
                                </button>

                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade" id="{{ $project->id }}" tabindex="-1" data-bs-backdrop="static"
                                    data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitle{{ $project->id }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitle{{ $project->id }}">
                                                    Delete Post {{ $project->title }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">Are you sure to delete this item ?</div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="button" class="btn btn-primary">

                                                    <form action="{{ route('admin.portfolio.destroy', $project) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-danger">
                                                            Confirm
                                                        </button>

                                                    </form>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
