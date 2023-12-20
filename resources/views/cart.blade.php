@extends("app")

@section("title", "cart")

@section("content")

    <div class="grid grid-cols-2 gap-4 bg-amber-500">

        <div>
            <div class="grid grid-cols-2 gap-4 m-10">
                @php $subtotal = 0; @endphp
                @foreach ($cartItems as $productList)
                    @php $subtotal = $subtotal + $productList['product']->price * $productList['quantity']; @endphp
                    @include("components.productBoxCartPage", [
                        "Product" => $productList
                    ])
                @endforeach

            </div>
        </div>

        <!-- Cart Items Section -->
        <div class="m-10">

            <div class="bg-white rounded-lg shadow-md p-6 h-96 grid content-between">
                <h2 class="text-lg font-semibold mb-4">Summary</h2>
                <div class="flex justify-between mb-2">
                    <span>Subtotal</span>
                    <span>${{ number_format($subtotal, 2) }}</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span>Shipping</span>
                    <span>Free Shipping this Month</span>
                </div>
                <hr class="my-2">
                <div class="flex justify-between mb-2">
                    <span class="font-semibold">Total</span>
                    <span class="font-semibold">${{ number_format($subtotal, 2) }}</span>
                </div>
                <form method="GET" action="{{ route('checkoutPage') }}">
                    @csrf
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg mt-4 w-full">Checkout</button>
                </form>
            </div>

            <div>
                <!-- Deals of the Week Section -->
                <div class="mt-10">
                    <div>
                        <p class="text-xl font-bold">
                            Great Deals of the week:
                        </p>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <x-productBoxComponent
                            image="https://www.elgiganten.dk/image/dv_web_D1800010021488136/628230/macbook-air-15-m28256-2023-midnat.jpg"
                            title="Macbook 2023"
                            buttonText="Click for More"
                        />
                        <x-productBoxComponent
                            image="https://teleboxen.dk/media/3675/imac-blaa-front.jpg?anchor=center&mode=crop&width=800&height=800&rnd=132640907580000000"
                            title="Macbook 2023"
                            buttonText="Click for More"
                        />
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
