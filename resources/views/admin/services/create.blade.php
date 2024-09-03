@extends('layouts.main')

@section('content')
    <h1>Create Service</h1>
    <form action="{{ route('services.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Name">
        <input type="number" name="startingPrice" placeholder="Starting Price">
        <input type="text" name="skills" placeholder="Skills">
        <textarea name="description" placeholder="Description"></textarea>
        <div class="form-group" style="margin-bottom: 20px;">
            <label for="category_id">Category</label>
            <select class="form-control" id="category_id" name="category_id" required>
                <option value="1">Category</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group" style="margin-bottom: 20px;">
            <label for="provider_id">Provider</label>
            <select class="form-control" id="provider_id" name="provider_id" required>
                <option value="1">Provider</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>     
        <button type="submit">Create</button>
    </form>
@endsection
