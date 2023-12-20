<article class="bg-white shadow-md p-4 m-1 rounded-lg">
    <div class="grid grid-rows-3 justify-items-center" style="max-height: 300px;">
        <div>
            <img src="{{ $Product->image }}" style="max-height: 130px;" alt="{{ $Product->name }}">
        </div>
        <div class="mt-8">
            <h2 class="text-lg font-semibold">{{ $Product->name }}</h2>
        </div>
        <div class="mt-10">
            <form method="GET" action="{{ route('productPage') }}">
                @csrf
                <input type="hidden" name="product_id" value="{{ $Product->id }}">
                <button class="dynamicButton bg-blue-500 text-white py-2 px-4 rounded">Click For More</button>
            </form>
        </div>
    </div>
</article>


