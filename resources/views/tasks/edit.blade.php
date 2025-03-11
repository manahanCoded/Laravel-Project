@extends('layouts.app')
@vite('resources/css/app.css')
@section('content')
    <h1>Edit Task</h1>
    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label>Title:</label>
        <input type="text" name="title" value="{{ $task->title }}" required>
        
        <label>Description:</label>
        <textarea name="description">{{ $task->description }}</textarea>

        <label>Completed:</label>
        <input type="checkbox" name="is_completed" {{ $task->is_completed ? 'checked' : '' }}>

        <button type="submit">Update</button>
    </form>
@endsection
