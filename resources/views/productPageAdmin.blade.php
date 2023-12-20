@extends("app")

@section("title", "productPage")

@section("content")
    <div class="flex-1">

        <form method="POST" action={{ route('addProductDB') }}>
            @csrf

            <form class="h-screen"
                  method="POST" action={{ route('addProductDB') }}>
                @csrf

                <div class="grid grid-cols-1 gap-4 justify-items-center h-fit">
                    <div>
                        <div>
                            <p class="text-xl font-bold">Name:</p>
                            <input type="name" name="name" id="name" placeholder="name"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                   required="">
                        </div>

                        <div>
                            <p class="text-xl font-bold">Price: kr.</p>
                            <input type="price" name="price" id="price" placeholder="1234"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                   required="">
                        </div>

                        <div>
                            <p class="text-xl font-bold w-full">Qty:</p>
                            <input type="qty" name="qty" id="qty" placeholder="qty"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                   required="">
                        </div>

                        <div>
                            <p class="text-xl font-bold">storage</p>
                            <input type="storage" name="storage" id="storage" placeholder="storage"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                   required="">
                        </div>

                        <div>
                            <p class="text-xl font-bold">CPU:</p>
                            <input type="CPU" name="CPU" id="CPU" placeholder="CPU"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                   required="">
                        </div>

                        <div>
                            <p class="text-xl font-bold">RAM:</p>
                            <input type="RAM" name="RAM" id="RAM" placeholder="RAM"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                   required="">
                        </div>

                        <div>
                            <p class="text-xl font-bold">SSD:</p>
                            <input type="SSD" name="SSD" id="SSD" placeholder="SSD"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                   required="">
                        </div>

                        <div>
                            <p class="text-xl font-bold">Description:</p>
                            <input type="Desc" name="Desc" id="Desc" placeholder="Desc"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                   required="">
                        </div>

                        <div>
                            <p class="text-xl font-bold">Picture Url:</p>
                            <input name="Image" id="Image" placeholder="URL"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                   required="">
                        </div>

                        <div>
                            <button type="submit"
                                    class="text-white bg-amber-500 font-medium rounded-3xl hover:bg-amber-300 text-5xl font-KronaOne w-fit h-14 m-10">
                                Add To Product Catalog
                            </button>
                        </div>

                    </div>
                </div>
            </form>
        </form>
    </div>


    <script>
        function highlightButton() {
            var button = document.getElementById('cartButton');

            // Change color and text
            button.innerHTML = 'Added to Cart';

            // Reset color and text after 5 seconds
            setTimeout(function () {
                button.innerHTML = 'Add To Cart';
            }, 5000);
        }
    </script>

@endsection
