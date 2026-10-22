@extends('layout.layout')

@section('content')

    <!-- Dashboard -->
    <div class="container-fluid px-3 px-md-4 py-4">

        <!-- Header -->
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
            <div>
                <h3 class="fw-bold mb-1">Dashboard</h3>
                <p class="text-secondary mb-0">Manage and track all your tasks.</p>
            </div>

            <a href="{{ route('create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg me-1"></i> Add New Task
            </a>
        </div>

        <!-- Statistics -->

<div class="row g-3 mb-4">

    <!-- Total Tasks -->
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <p class="text-secondary mb-2">Total Tasks</p>
                    <h3 class="fw-bold mb-0">
                        {{ \App\Models\Task::count() }}
                    </h3>
                </div>

                <div class="bg-primary-subtle text-primary rounded-3 p-3 fs-4">
                    <i class="bi bi-list-task"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Tasks -->
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <p class="text-secondary mb-2">Pending</p>
                    <h3 class="fw-bold mb-0">
                        {{ \App\Models\Task::where('status', 'Pending')->count() }}
                    </h3>
                </div>

                <div class="bg-warning-subtle text-warning-emphasis rounded-3 p-3 fs-4">
                    <i class="bi bi-clock-history"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- In Progress Tasks -->
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <p class="text-secondary mb-2">In Progress</p>
                    <h3 class="fw-bold mb-0">
                        {{ \App\Models\Task::where('status', 'In Progress')->count() }}
                    </h3>
                </div>

                <div class="bg-info-subtle text-info-emphasis rounded-3 p-3 fs-4">
                    <i class="bi bi-arrow-repeat"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Completed Tasks -->
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <p class="text-secondary mb-2">Completed</p>
                    <h3 class="fw-bold mb-0">
                        {{ \App\Models\Task::where('status', 'Completed')->count() }}
                    </h3>
                </div>

                <div class="bg-success-subtle text-success rounded-3 p-3 fs-4">
                    <i class="bi bi-check-circle"></i>
                </div>
            </div>
        </div>
    </div>

</div>

        <!-- Task Table -->
        <div class="card border-0 shadow-sm">

            <div class="card-header bg-white border-0 pt-4 px-3 px-md-4">
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                    <h5 class="fw-bold mb-0">All Tasks</h5>


                </div>

                <!-- Search and Filters -->
                <form action="{{ route('home') }}" method="GET" class="row g-2 mt-3 mb-3">
                    <div class="col-12 col-md-4">
                        <div class="input-group">
                            <span class="input-group-text bg-white">
                                <i class="bi bi-search"></i>
                            </span>

                            <input type="search" name="search" class="form-control" placeholder="Search tasks..."
                                value="{{ request('search') }}">
                        </div>
                    </div>

                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-light">
                            <tr>
                                <th class="px-3 px-md-4 py-3">#</th>
                                <th class="py-3">Task Title</th>
                                <th class="py-3">Priority</th>
                                <th class="py-3">Status</th>
                                <th class="py-3">Due Date</th>
                                <th class="py-3">Create Date</th>
                                <th class="py-3">Due Update</th>
                                <th class="py-3 text-center">Actions</th>
                            </tr>
                        </thead>

                        <tbody>


                            @foreach ($task as $data)
                                <tr>
                                      <td class="px-3 px-md-4">{{ $loop->iteration }}</td>
                                    <td>
                                        <span class="fw-semibold"></span>
                                        <div class="text-secondary small">{{ $data->title }}</div>
                                    </td>
                                    <td><span class="badge bg-danger-subtle text-danger">{{ $data->priority }}</span></td>
                                    <td><span class="badge bg-warning-subtle text-warning-emphasis">{{ $data->status }}</span>
                                    </td>
                                    <td>{{ $data->due_date }}</td>
                                    <td>{{ $data->created_at }}</td>
                                    <td>{{ $data->updated_at }}</td>
                                    <td class="text-center">

                                        <a href="{{ route('tasks.edit', $data->id) }}"
                                            class="btn btn-sm btn-outline-primary me-1" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('tasks.destroy', $data->id) }}" method="POST" class="d-inline"
                                            onsubmit="return confirm('Are you sure you want to delete this task?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                        <a href="{{ route('tasks.show', $data->id) }}" class="btn btn-sm btn-outline-info me-1"
                                            title="View">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach



                        </tbody>

                    </table>
                </div>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $task->links('pagination::bootstrap-5') }}
            </div>

        </div>
@endsection