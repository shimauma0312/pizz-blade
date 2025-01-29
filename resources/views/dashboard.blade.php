<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
                <!-- 記事とタイトルを作成するフォームへの繊維ボタン -->
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="dashboard/posts/create/" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">記事を作成する</a>
                </div>
                <!-- 記事一覧 -->
                <div class="p-6 mx-auto ">
                    <h2 class="text-center text-xl font-bold mb-4">記事一覧</h2>
                    <div class="space-y-4"></div>
                        @foreach ($posts as $post)
                            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                <a href="dashboard/posts/show/{{ $post->id }}" class="text-lg font-bold mb-4">{{ $post->title }}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
