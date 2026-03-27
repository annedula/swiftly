@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center">

    <div class="card p-5 w-100" style="max-width: 600px;" data-aos="fade-up">
        <h2 class="fw-bold mb-3">Create Task</h2>
        <p class="text-muted mb-4">Add a new task to your workflow.</p>

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Due Date</label>
                <input type="date" name="due_date" class="form-control">
            </div>

            <button class="btn btn-custom w-100 mt-3">Save Task</button>
        </form>

        <a href="{{ route('tasks.index') }}" class="btn btn-outline-light mt-3">Cancel</a>
    </div>

</div>
@endsection