@extends('layout.layout')

@section('content')


    <div class="container py-5">

        <div class="card border-0 shadow-sm mx-auto" style="max-width: 750px;">

            <!-- Header -->
            <div class="card-header bg-primary text-white p-3">
                <h4 class="mb-1">
                    <i class="bi bi-plus-circle me-2"></i>
                    Create New Task
                </h4>
                <p class="mb-0 small">Fill in the details to create a new task.</p>
            </div>

            <!-- Form Section -->
            <div class="card-body p-4">

                <form action="{{ route('store.task') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Task Title *</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter task title" maxlength="255"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Description</label>
                        <textarea name="description" class="form-control" rows="4"
                            placeholder="Enter task description"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Priority *</label>
                            <select name="priority" class="form-select" required>
                                <option value="">Select Priority</option>
                                <option value="Low">Low</option>
                                <option value="Medium">Medium</option>
                                <option value="High">High</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Status *</label>
                            <select name="status" class="form-select" required>
                                <option value="">Select Status</option>
                                <option value="Pending">Pending</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Completed">Completed</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Due Date</label>
                        <input type="date" name="due_date" class="form-control">
                    </div>

                    <div class="d-flex justify-content-end gap-2">

                        <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-1"></i>
                            Back
                        </a>



                        <button type="reset" class="btn btn-outline-secondary">
                            Reset
                        </button>

                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-check-circle me-1"></i>
                            Create Task
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>

@endsection