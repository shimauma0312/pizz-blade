<x-guest-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="text-center">
            <h1 class="text-4xl font-bold mb-4">社内ポータルサイト</h1>
            <p class="text-lg mb-8">ようこそ、社内ポータルサイトへ</p>
            <div class="flex justify-center space-x-4">
                <a href="{{ route('register') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">新規登録</a>
                <a href="{{ route('login') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700">ログイン</a>
            </div>
        </div>
    </div>
</x-guest-layout>
