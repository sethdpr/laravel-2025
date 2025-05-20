<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Newsfeed
        </h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto">
        @auth
            @if(auth()->user()->is_admin)
                <form action="{{ route('newsItem.store') }}" method="POST" enctype="multipart/form-data" class="mb-6 bg-white p-4 rounded shadow">
                    <div>
                        <label for="title" class="block">Title</label>
                        <input type="text" name="title" class="w-full border rounded p-2" required>
                    </div>
                    <div class="mt-4">
                        <label for="content" class="block">Content</label>
                        <textarea name="content" class="w-full border rounded p-2" rows="4" required></textarea>
                    </div>
                    <div class="mt-4">
                        <label for="image" class="block">Image (optional)</label>
                        <input type="file" name="image" class="block mt-1">
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded" style="background-color: #3B82F6 !important;">Publicate</button>
                    </div>
                </form>
            @endif
        @endauth

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
