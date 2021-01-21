@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Selamat Datang!</h1>
            <p class="lead">Aplikasi Rental Sederhana</p>
            <hr class="my-4">
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="{{ route('barang.index') }}" role="button">Learn more</a>
            </p>
        </div>
    </div>
@endsection
