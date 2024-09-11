@extends('layouts.main')

@section('content')
    <h1>{{ $service->name }}</h1>
    <p>Price: {{ $service->startingPrice }}</p>
    <p>Skills: {{ $service->skills }}</p>
    <p>Description: {{ $service->description }}</p>
    <p>Category ID: {{ $service->category_id }}</p>
    <p>Provider ID: {{ $service->provider_id }}</p>
@endsection
