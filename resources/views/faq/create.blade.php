<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">New FAQ</h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto">
        <form method="POST" action="{{ route('faq.store') }}" class="bg-white p-6 rounded shadow">
            @csrf

            <div>
                <label class="block font-medium">Question</label>
                <input type="text" name="question" class="w-full border p-2 rounded mt-1" required>
            </div>

            <div class="mt-4">
                <label class="block font-medium">Answer</label>
                <textarea name="answer" class="w-full border p-2 rounded mt-1" rows="5" required></textarea>
            </div>

            <div class="mt-4">
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded" style="background-color: #3B82F6">Save</button>
            </div>
        </form>
    </div>
</x-app-layout>