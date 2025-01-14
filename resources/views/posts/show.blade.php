<x-app-layout>

<div class="container mx-auto px-4 py-8">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <h1 class="text-4xl font-bold mb-4">{{ $postData->title }}</h1>
            <p class="text-lg mb-8">{{ $postData->body }}</p>
            @if($postData->eyecatch)
                <img src="{{ $postData->eyecatch }}" alt="Eyecatch Image" class="mb-4">
            @endif
            <a href="{{ route('dashboard') }}" class="text-blue-500 hover:underline">戻る</a>
        </div>
    </div>
</div>

</x-app-layout>
