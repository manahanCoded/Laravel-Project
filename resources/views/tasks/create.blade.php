@extends('layouts.app')
@vite('resources/css/app.css')
@section('content')
    <h1>Create Task</h1>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <label>Title:</label>
        <input type="text" name="title" required>
        
        <label>Description:</label>
        <textarea name="description"></textarea>

        <button type="submit">Create</button>
    </form>
@endsection
