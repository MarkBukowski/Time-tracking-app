@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @yield('data')
            </div>
        </div>
    </div>
</div>

@endsection
