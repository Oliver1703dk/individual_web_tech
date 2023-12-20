@extends('layouts.app')

@section('content')
    <h1>Products</h1>

    @foreach ($products as $product)
        <div class="product">
            <h2>{{ $product->name }}</h2>
            <p>Price: ${{ $product->price }}</p>
            <p>Category: {{ $product->category->name }}</p>
        </div>
    @endforeach
@endsection
