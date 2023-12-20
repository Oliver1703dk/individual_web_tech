@props(['image', 'title', 'buttonText'])

<article class="bg-white shadow-md p-4 rounded-lg flex flex-col items-center h-fit">
    <img src="{{ $image }}" class="mb-4 w-full" style="max-height: 150px;">
    <h2 class="text-lg font-semibold">{{ $title }}</h2>
    <button class="bg-blue-500 text-white py-2 px-4 rounded">{{ $buttonText }}</button>
</article>
