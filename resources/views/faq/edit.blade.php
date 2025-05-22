<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit FAQ</h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto">
        <form action="{{ route('faq.update', $faq) }}" method="POST" class="bg-white p-6 rounded shadow">
            @csrf
            @method('PUT')

            <div>
                <label for="question" class="block font-bold mb-2">Question</label>
                <input type="text" name="question" value="{{ old('question', $faq->question) }}" class="w-full border rounded p-2" required>
            </div>

            <div class="mt-4">
                <label for="answer" class="block font-bold mb-2">Answer</label>
                <textarea name="answer" rows="5" class="w-full border rounded p-2" required>{{ old('answer', $faq->answer) }}</textarea>
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded" style="background-color: #3B82F6">Save</button>
            </div
        </form>
    </div>
</x-app-layout>