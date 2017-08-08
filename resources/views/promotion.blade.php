@extends('master')

@section('title', $promotion->title)

@section('main')
    <div class="promotion-container show">
        <div class="promotion-code">
            <h2>Tu código de descuento:</h2>
            <p class="alert alert-info">{{ $promotion->code }}</p>
        </div>
        @include('promotion-display', $promotion)
    </div>

@endsection
