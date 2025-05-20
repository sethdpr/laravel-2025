<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit news item
        </h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto">
        <form action="{{ route('newsItem.update', $newsItem) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block">Title</label>
                <input type="text" name="title" class="w-full border rounded p-2" value="{{ old('title', $newsItem->title) }}" required>
            </div>

            <div class="mt-4">
                <label for="content" class="block">Content</label>
                <textarea name="content" class="w-full border rounded p-2" rows="4" required>{{ old('content', $newsItem->content) }}</textarea>
            </div>

            <div class="mt-4">
                <label for="image" class="block">New image (optional)</label>
                <input type="file" name="image" class="block mt-1">
                @if($newsItem->image_path)
                    <p class="text-sm mt-2">Current image:</p>
                    <img src="{{ asset('storage/' . $newsItem->image_path) }}" class="mt-2 w-64 rounded">
                @endif
            </div>

            <div class="mt-4">
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded" style="background-color: #3B82F6 !important;">Save</button>
            </div>
        </form>
    </div>
</x-app-layout>
