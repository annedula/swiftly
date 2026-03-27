@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center">

    <div class="card p-5 w-100" style="max-width: 600px;" data-aos="fade-up">
        <h2 class="fw-bold mb-3">{{ $task->title }}</h2>
        <p class="text-muted mb-4">{{ $task->description }}</p>

        <div class="mb-3">
            <p>Status:
                <strong class="{{ $task->is_completed ? 'text-success' : 'text-warning' }}">
                    {{ $task->is_completed ? 'Completed' : 'Pending' }}
                </strong>
            </p>

            <p class="text-muted">Due: {{ $task->due_date }}</p>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-outline-warning w-50">Edit</a>
            <a href="{{ route('tasks.index') }}" class="btn btn-custom w-50">Back</a>
        </div>
    </div>

</div>
@endsection