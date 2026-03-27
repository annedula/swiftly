@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center">

    <div class="card p-5 w-100" style="max-width: 600px;" data-aos="fade-up">
        <h2 class="fw-bold mb-3">Edit Task</h2>
        <p class="text-muted mb-4">Update your task details.</p>

        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" value="{{ $task->title }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3">{{ $task->description }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Due Date</label>
                <input type="date" name="due_date" value="{{ $task->due_date }}" class="form-control">
            </div>

            <div class="mb-3 form-check">
            <input type="hidden" name="is_completed" value="0">
            <input type="checkbox" name="is_completed" value="1" {{ $task->is_completed ? 'checked' : '' }}>


            <label for="is_completed" class="form-check-label">
            Mark as Completed
        </label>
        </div>


            <button class="btn btn-custom w-100 mt-3">Update Task</button>
        </form>

        <a href="{{ route('tasks.index') }}" class="btn btn-outline-light mt-3">Cancel</a>
    </div>

</div>
@endsection