@extends("app")

@section("title", "checkoutPage")

@section("content")

<form method="POST" action={{route('checkoutPagePost')}}>
    @csrf
<div class="flex flex-wrap mx-auto max-w-screen-xl p-5 h-screen">


    <div class="w-full lg:w-1/2 p-5">
        <span>Customer Information</span>

        <div class="grid grid-cols-2 gap-4 p-5">
            <input type="text" name="firstName" class="border rounded h-10 w-full focus:outline-none p-5" placeholder="First name*">
            <input type="text" name="lastName" class="border rounded h-10 w-full focus:outline-none p-5" placeholder="Last name*">
        </div>
        <div class="grid grid-cols-1 gap-4 p-5">
            <input type="text" name="address" class="border rounded h-10 w-full focus:outline-none p-5" placeholder="Address*">
        </div>
        <div class="grid grid-cols-1 gap-4 p-5">
            <input type="text" name="apartment" class="border rounded h-10 w-full focus:outline-none p-5" placeholder="Apartment (optional)">
        </div>
        <div class="grid grid-cols-2 gap-4 p-5">
            <input type="text" name="zipcode" class="border rounded h-10 w-full focus:outline-none p-5" placeholder="Zipcode*">
            <input type="text" name="city" class="border rounded h-10 w-full focus:outline-none p-5" placeholder="City*">
        </div>
        <div class="grid grid-cols-1 gap-4 p-5">
            <input type="text" name="phone" class="border rounded h-10 w-full focus:outline-none p-5" placeholder="Phone Number*">
        </div>
        <button type="submit" class="mt-4 w-full bg-yellow-500 text-white p-2 rounded hover:bg-yellow-600 transition-colors duration-200">
            Check Out
        </button>
    </div>



    <div class="w-full lg:w-1/2 p-5">
        @php $subtotal = 0; @endphp
        @foreach ($cartItems as $productList)
            @php $subtotal = $subtotal + $productList['product']->price * $productList['quantity']; @endphp
        @endforeach

        <div id="summaryBox" class="max-w-sm lg:mx-0 mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="p-5">
                <h3 class="text-lg font-semibold">Summary</h3>
                <div class="space-y-2 mt-3">
                    <div class="flex justify-between">
                        <span>Subtotal:</span>
                        <span id="subtotalPrice">${{ number_format($subtotal, 2) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Delivery:</span>
                        <span id="deliveryPrice">Free shipping</span>
                    </div>
                    <div class="border-t border-gray-200 pt-2 mt-2">
                        <div class="flex justify-between font-semibold">
                            <span>Total:</span>
                            <span id="totalPrice">${{ number_format($subtotal, 2) }}</span>
                        </div>
                    </div>
                </div>
                <button class="mt-4 w-full bg-yellow-500 text-white p-2 rounded hover:bg-yellow-600 transition-colors duration-200">
                    Discount or gift card
                </button>
            </div>
        </div>
    </div>
</div>
</form>
@endsection
