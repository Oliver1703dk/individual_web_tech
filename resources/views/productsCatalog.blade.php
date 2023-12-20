@extends("app")

@section("title", "productPage")

@section("content")

    <div class="h-screen bg-amber-500">

        <div class="grid grid-cols-4 gap-4">
            @foreach ($products as $product)
                @include("components.productBoxData", [
                    "Product" => $product
                ])
            @endforeach
        </div>

    </div>

@endsection
