@extends('layouts.app')

@section('content')
    <h1>Task List</h1>
    <a href="{{ route('tasks.create') }}">Create Task</a>
    
    @foreach ($tasks as $task)
        <div>
            <h3>{{ $task->title }}</h3>
            <p>{{ $task->description }}</p>
            <p>Status: {{ $task->is_completed ? 'Completed' : 'Pending' }}</p>
            <a href="{{ route('tasks.show', $task) }}">View</a>
            <a href="{{ route('tasks.edit', $task) }}">Edit</a>
            <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>
    @endforeach
@endsection
