<x-app-layout>
<x-slot name="header">
    <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Newsfeed
        </h2>
        @auth
            @if(auth()->user()->is_admin)
                <a href="{{ route('newsItem.create') }}" 
                   class="bg-green-500 text-white px-4 py-2 rounded shadow hover:bg-green-600" 
                   style="background-color: #3B82F6 !important;">
                    ➕ New Post
                </a>
            @endif
        @endauth
    </div>
</x-slot>

    <div class="py-6 max-w-4xl mx-auto">

        <div class="space-y-6">
            @foreach($newsItem as $item)
                <div class="bg-white p-4 rounded shadow">
                    <h3 class="text-xl font-bold">{{ $item->title }}</h3>
                    <p class="mt-2">{{ $item->content }}</p>
                    @if($item->image_path)
                        <img src="{{ asset('storage/' . $item->image_path) }}" alt="Afbeelding" class="mt-4 w-full max-w-md rounded">
                    @endif

                @auth
                    @if(auth()->user()->is_admin)
                        <div class="mt-4 flex gap-4">
                            <a href="{{ route('newsItem.edit', $item) }}" class="text-blue-500">✏️ Edit</a>
                            <form method="POST" action="{{ route('newsItem.delete', $item) }}" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                @method('DELETE')
                                    <button type="submit" class="text-red-500">🗑️ Delete</button>
                                </form>
                            </div>
                        @endif
                    @endauth
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
