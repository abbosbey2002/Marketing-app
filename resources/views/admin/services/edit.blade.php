@extends('layouts.main')

@section('content')
    <h1>Edit Service</h1>
    <form action="{{ route('services.update', $service->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ $service->name }}" placeholder="Name">
        <input type="number" name="startingPrice" value="{{ $service->startingPrice }}" placeholder="Starting Price">
        <input type="text" name="skills" value="{{ $service->skills }}" placeholder="Skills">
        <textarea name="description" placeholder="Description">{{ $service->description }}</textarea>
        <input type="number" name="category_id" value="{{ $service->category_id }}" placeholder="Category ID">
        <input type="number" name="provider_id" value="{{ $service->provider_id }}" placeholder="Provider ID">
        <button type="submit">Update</button>
    </form>
@endsection
