@extends('layouts.login')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Start building business stories</h2>
    <div class="row justify-content-center">
        <div class="col-md-3">
            <a href="{{ route('join.role', 'provider') }}" class="btn btn-primary btn-block">
                I'm a provider, looking for projects
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('join.role', 'partner') }}" class="btn btn-outline-primary btn-block">
                I'm a partner, looking for providers
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('join.role', 'marketer') }}" class="btn btn-outline-primary btn-block">
                I'm a marketer, looking for clients
            </a>
        </div>
    </div>
</div>
@endsection
