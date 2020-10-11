@extends('default')

@section('title')
{{ config('app.name','Welcome') }}
@endsection

@section('content')
    <div class="card text-center">
        <div class="card-header">
            Welcome to Test Application for Inseanq!
        </div>
        <div class="card-body">
            <h5 class="card-title">Application based on Laravel 8 and Bootstrap 4</h5>
            <p class="card-text">This is a simple application about groups and students.</p>
        </div>
        <div class="card-footer text-muted">
            Created by Peter Klekot
        </div>
    </div>
@endsection