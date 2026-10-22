
@extends('layout.layout')

@section('content')

<div class="container py-5">

    <div class="card border-0 shadow-sm mx-auto" style="max-width: 750px;">

        <!-- Header -->
        <div class="card-header bg-primary text-white p-3">
            <h4 class="mb-1">
                <i class="bi bi-pencil-square me-2"></i>
                Edit Task
            </h4>
            <p class="mb-0 small">Update the details of your task.</p>
        </div>

        <!-- Form Section -->
        <div class="card-body p-4">

            <form action="{{ route('update.task', $task->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Task Title -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Task Title *</label>
                    <input
                        type="text"
                        name="title"
                        class="form-control"
                        placeholder="Enter task title"
                        maxlength="255"
                        value="{{ old('title', $task->title) }}"
                        required>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Description</label>
                    <textarea
                        name="description"
                        class="form-control"
                        rows="4"
                        placeholder="Enter task description">{{ old('description', $task->description) }}</textarea>
                </div>

                <div class="row">

                    <!-- Priority -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Priority *</label>
                        <select name="priority" class="form-select" required>
                            <option value="">Select Priority</option>

                            <option value="Low" @selected(old('priority', $task->priority) == 'Low')>
                                Low
                            </option>

                            <option value="Medium" @selected(old('priority', $task->priority) == 'Medium')>
                                Medium
                            </option>

                            <option value="High" @selected(old('priority', $task->priority) == 'High')>
                                High
                            </option>
                        </select>
                    </div>

                    <!-- Status -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Status *</label>
                        <select name="status" class="form-select" required>
                            <option value="">Select Status</option>

                            <option value="Pending" @selected(old('status', $task->status) == 'Pending')>
                                Pending
                            </option>

                            <option value="In Progress" @selected(old('status', $task->status) == 'In Progress')>
                                In Progress
                            </option>

                            <option value="Completed" @selected(old('status', $task->status) == 'Completed')>
                                Completed
                            </option>
                        </select>
                    </div>

                </div>

                <!-- Due Date -->
                <div class="mb-4">
                    <label class="form-label fw-semibold">Due Date</label>
                    <input
                        type="date"
                        name="due_date"
                        class="form-control"
                        value="{{ old('due_date', $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('Y-m-d') : '') }}">
                </div>

                <!-- Buttons -->
                <div class="d-flex justify-content-end gap-2">

                    <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                        Cancel
                    </a>

                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-check-circle me-1"></i>
                        Update Task
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>

@endsection
