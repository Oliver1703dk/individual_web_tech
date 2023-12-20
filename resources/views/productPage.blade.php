@extends("app")

@section("title", "productPage")

@section("content")
    <div class="flex-1">
        <div class="mb-10"></div>
        <div>
            @auth()
                @if(auth()->user() && auth()->user()->admin)
                    <form method="POST" action={{ route('deleteProduct') }}>
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <label>
                            <button type="submit" class="text-white bg-red-600 hover:bg-red-300 w-fit h-fit p-2 m-1">
                                X - Delete Product
                            </button>
                        </label>
                    </form>
                @endif

            @endauth
        </div>

        <div class="grid grid-cols-2 gap-4 h-fit">
            <div>
                <img class="h-[374px] mx-auto my-auto" id="productImage" src="{{ $product->image }}" alt="Error"/>
                <p class="border-b-2 border-amber-500 mb-4 w-full"></p>
            </div>


            <div>
                <p class="text-xl font-bold">Name: {{ $product->name }}</p>
                <br>
                <p class="text-xl font-bold">Price: {{ $product->price }} kr.</p>
                <br>
                <p class="text-xl font-bold border-b-2 border-amber-500 mb-4 w-full">Qty: {{ $product->quantity }}</p>

                <div class="grid grid-cols-2">
                    <div>
                        <p class="text-xl font-bold">Storage:</p>
                        <p class="text-xl font-bold">CPU:</p>
                        <p class="text-xl font-bold">RAM:</p>
                        <p class="text-xl font-bold">SSD:</p>
                    </div>
                    <div>
                        <p class="text-xl font-bold">{{ $product-> product_info1}}</p>
                        <p class="text-xl font-bold">{{ $product-> product_info2}}</p>
                        <p class="text-xl font-bold">{{ $product-> product_info3}}</p>
                        <p class="text-xl font-bold">{{ $product-> product_info4}}</p>
                    </div>
                </div>

                <div class="h-24 border-t-2 border-b-2 border-amber-500 mb-4 w-full flex items-center justify-center">
                    <form method="POST" action="{{ route('addItem') }}">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="quantity" value="1">
                        <button
                            id="cartButton"
                            class="text-white bg-amber-500 font-medium rounded-3xl hover:bg-amber-300 text-xl font-KronaOne w-48 h-10"
                            onclick="highlightButton()"
                            @if($product->quantity === 0) disabled @endif>
                            {{ $product->quantity === 0 ? 'Out of Stock' : 'Add To Cart' }}
                        </button>
                    </form>

                </div>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <div class="grid grid-cols-1 border-b-2 border-amber-500 mb-4 w-full">
                    <div class="hover:bg-amber-500 transition duration-300 ease-in-out cursor-pointer p-2 text-center">
                        Description
                    </div>
                </div>
                <div>
                    <p class="m-1">
                        {{ $product-> description}}
                    </p>
                </div>
            </div>
            <div>
                <div>
                    <p class="text-xl font-bold">
                        Great Deals of the week:
                    </p>
                </div>
                <div>
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

    <script>
        function highlightButton() {
            var button = document.getElementById('cartButton');

            // Change color to green and text
            button.innerHTML = 'Added to Cart';
            button.style.backgroundColor = '#90EE90'; // Set the background color to light-green

            // Reset color and text after 1 seconds
            setTimeout(function () {
                button.innerHTML = 'Add To Cart';
                button.style.backgroundColor = ''; // Reset the background color
            }, 500);
        }
    </script>
    <script>
        document.getElementById('productImage').addEventListener('click', function () {
            this.classList.toggle('scale-150');
        });
    </script>


@endsection
