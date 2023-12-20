@extends("app")

@section("title", "index")

@section("content")

    <style>
        #halloweenBanner {
            transform: translateX(-100%);
            transition: transform 1s ease-out;
        }
    </style>

    <div>
        <div class="h-[91px] bg-amber-500" id="halloweenBanner">

            <img class="object-fill h-full w-full"
                 src="https://static.vecteezy.com/system/resources/thumbnails/010/504/213/small/of-halloween-sale-promotion-poster-or-banner-with-halloween-pumpkin-ghost-candlelight-buntings-and-halloween-elements-website-spooky-background-or-banner-halloween-template-vector.jpg">
        </div>
        <div class="h-[460px]">
            <img class="object-fill h-full w-full"
                 src="https://s3-alpha-sig.figma.com/img/413f/1a75/95cc4dcd21037a3b46cf4a98c8d41f3d?Expires=1703462400&Signature=QdwEF797PItII3plkMVC-w9J4Jj-RsFn4AJuvF35kfWyPr-24hiQbeLxTYGGJhlNTNLNzH0be3uz-lw6Di53kAQbe~7fcoX95sqKCYmwfPh6RGYjq0a1QawtRPemT5rkU-~M~lj5RQjzjO5hY1WzBZ4zwrimdJEUlvCgLAeFHF9KHm5qae4g6kvCxtzlccfJbiTCNZB3FP66JEWcSf1JnAsve8cnnD~Gm5jB~b7ZnQTJRWvuuJf0K10jRtOEkkrP~fIlTLYK-ZAt1ClxD~y3vZP0FpngizT61y8cf7eVRXKIaaQd-~Q5wePZGi58RraX0AQvBXL4fRg36nAEez5BxA__&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4"/>
        </div>
        <div class="bg-amber-500">
            <section class="container mx-auto p-4">
                <div class="grid grid-cols-7 gap-4">
                    @php $count = 0; @endphp
                    @foreach ($products as $product)
                        @include("components.productBoxData", [
                            "Product" => $product
                        ])
                        @php $count++; @endphp
                        @if ($count == 7)
                            @break
                        @endif
                    @endforeach
                </div>
            </section>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            document.getElementById('halloweenBanner').style.transform = 'translateX(0%)';
        });
    </script>
@endsection
