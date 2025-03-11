@extends('layouts.app')
@vite('resources/css/app.css')
@section('content')
    <h1>{{ $task->title }}</h1>
    <p>{{ $task->description }}</p>
    <p>Status: {{ $task->is_completed ? 'Completed' : 'Pending' }}</p>
    <a href="{{ route('tasks.edit', $task) }}">Edit</a>
    <a href="{{ route('tasks.index') }}">Back</a>
@endsection
