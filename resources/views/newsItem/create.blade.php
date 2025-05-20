<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create New Post
        </h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto">
        <form action="{{ route('newsItem.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow">
            @csrf
            <div>
                <label for="title" class="block font-medium">Title</label>
                <input type="text" name="title" class="w-full border rounded p-2 mt-1" required>
            </div>

            <div class="mt-4">
                <label for="content" class="block font-medium">Content</label>
                <textarea name="content" class="w-full border rounded p-2 mt-1" rows="4" required></textarea>
            </div>

            <div class="mt-4">
                <label for="image" class="block font-medium">Image (optional)</label>
                <input type="file" name="image" class="mt-1">
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700" style="background-color: #3B82F6 !important;">📤 Publish</button>
                <a href="{{ route('home') }}" class="ml-4 text-gray-600 hover:underline">⬅ Back</a>
            </div>
        </form>
    </div>
</x-app-layout>