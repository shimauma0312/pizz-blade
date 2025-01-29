<x-app-layout>
    <!-- 記事とタイトルを作成するフォーム -->
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h1 class="text-4xl font-bold mb-4">記事を作成する</h1>
                <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-200">タイトル</label>
                        <input type="text" name="title" id="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600 dark:focus:ring-indigo-900 dark:focus:border-indigo-900 sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="body" class="block text-sm font-medium text-gray-700 dark:text-gray-200">本文</label>
                        <textarea name="body" id="body" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600 dark:focus:ring-indigo-900 dark:focus:border-indigo-900 sm:text-sm" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="eyecatch" class="block text-sm font-medium text-gray-700 dark:text-gray-200">アイキャッチ画像URL</label>
                        <input type="url" name="eyecatch" id="eyecatch" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600 dark:focus:ring-indigo-900 dark:focus:border-indigo-900 sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">作成する</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
