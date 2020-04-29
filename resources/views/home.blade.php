@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Halo, {{ Auth::user()->name }}!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
