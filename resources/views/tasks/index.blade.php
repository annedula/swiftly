@extends('layouts.app')

@section('content')
<div class="container">

    <!-- Hero Section -->
    <div class="mb-5">
        <h1 class="fw-bold display-5">Stay Organized.</h1>
        <p class="text-muted">Manage your tasks with clarity and focus.</p>

        <a href="{{ route('tasks.create') }}" class="btn btn-custom mt-3">
            + Create Task
        </a>
    </div>

    <!-- Task List -->
    <div class="row g-4">
        @forelse($tasks as $task)
            <div class="col-md-6">
                <div class="card p-4 task-card" data-aos="fade-up">
                    <h5 class="fw-bold mb-2">{{ $task->title }}</h5>
                    <p class="text-muted mb-3">{{ $task->description }}</p>

                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <span class="badge {{ $task->is_completed ? 'bg-success' : 'bg-warning text-dark' }}">
                        {{ $task->is_completed ? 'Completed' : 'Pending' }}
                        </span>

                        <div class="d-flex gap-2">
                            <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-sm btn-outline-light">View</a>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-outline-warning">Edit</a>

                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center text-muted mt-5">
                <h5>No tasks yet</h5>
                <p>Create your first task to get started.</p>
            </div>
        @endforelse
    </div>

</div>
@endsection