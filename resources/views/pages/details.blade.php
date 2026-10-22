
@extends('layout.layout')

@section('content')

<div class="container py-5">

    <div class="card border-0 shadow-sm mx-auto" style="max-width: 750px;">

        <!-- Header -->
        <div class="card-header bg-primary text-white p-3">
            <h4 class="mb-1">
                <i class="bi bi-eye me-2"></i>
                Task Details
            </h4>
            <p class="mb-0 small">View the details of your task.</p>
        </div>

        <!-- Details Section -->
        <div class="card-body p-4">

            <!-- Task Title -->
            <div class="mb-4">
                <label class="form-label fw-semibold text-secondary">Task Title</label>
                <h5 class="mb-0">{{ $task->title }}</h5>
            </div>

            <hr>

            <!-- Description -->
            <div class="mb-4">
                <label class="form-label fw-semibold text-secondary">Description</label>
                <p class="mb-0">
                    {{ $task->description ?: 'No description provided.' }}
                </p>
            </div>

            <hr>

            <!-- Priority and Status -->
            <div class="row">

                <div class="col-md-6 mb-4">
                    <label class="form-label fw-semibold text-secondary">Priority</label>
                    <div>
                        <span class="badge fs-6
                            @if($task->priority == 'High')
                                bg-danger
                            @elseif($task->priority == 'Medium')
                                bg-warning text-dark
                            @else
                                bg-success
                            @endif">
                            {{ $task->priority }}
                        </span>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label fw-semibold text-secondary">Status</label>
                    <div>
                        <span class="badge fs-6
                            @if($task->status == 'Completed')
                                bg-success
                            @elseif($task->status == 'In Progress')
                                bg-info text-dark
                            @else
                                bg-warning text-dark
                            @endif">
                            {{ $task->status }}
                        </span>
                    </div>
                </div>

            </div>

            <hr>

            <!-- Due Date -->
            <div class="mb-4">
                <label class="form-label fw-semibold text-secondary">Due Date</label>
                <p class="mb-0">
                    <i class="bi bi-calendar-event me-2"></i>
                    {{ $task->due_date ?? 'No Due Date' }}
                </p>
            </div>

            <hr>

            <!-- Created and Updated -->
            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold text-secondary">Created At</label>
                    <p class="mb-0">
                        {{ $task->created_at?->format('d M Y, h:i A') }}
                    </p>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold text-secondary">Last Updated</label>
                    <p class="mb-0">
                        {{ $task->updated_at?->format('d M Y, h:i A') }}
                    </p>
                </div>

            </div>

            <!-- Buttons -->
            <div class="d-flex justify-content-end gap-2 mt-4">

                <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left me-1"></i>
                    Back
                </a>

                <a href="{{ route('tasks.edit', $task->id) }}"
                   class="btn btn-primary">
                    <i class="bi bi-pencil me-1"></i>
                    Edit Task
                </a>

            </div>

        </div>
    </div>

</div>

@endsection
