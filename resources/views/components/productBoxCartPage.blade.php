<article class="bg-white shadow-md p-4 rounded-lg flex flex-col items-center h-fit">
    <img src="{{ $Product['product']->image }}" style="max-height: 130px;">
    <h2 class="text-lg font-semibold">{{ $Product['product']->name }}</h2>
    <p>Price: ${{ $Product['product']->price }}</p>
    <div class="grid grid-cols-2 gap-4 mb-3">
    <p>Quantity: {{ $Product['quantity'] }}</p>

        <form method="POST" action={{ route('minusQuantity') }}>
            @csrf
            <input type="hidden" name="product_id" value="{{ $Product['product']->id }}">
            <button type="submit" class="bg-red-500 text-white rounded w-10">-</button>
        </form>
    </div>
    <div>
        <form method="GET" action={{ route('productPage') }}>
            @csrf
            <input type="hidden" name="product_id" value="{{ $Product['product']->id }}">
            <button class="bg-blue-500 text-white py-2 px-4 rounded">Click for More</button>
        </form>
    </div>
</article>




