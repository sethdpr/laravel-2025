<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add new fixture
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('fixtures.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow rounded-lg p-6 space-y-6">
                @csrf

                <div>
                    <label for="competition" class="block font-medium text-gray-700">Competition</label>
                    <input type="text" name="competition" id="competition" value="{{ old('competition') }}" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div>
                    <label for="location" class="block font-medium text-gray-700">Locatie</label>
                    <input type="text" name="location" id="location" value="{{ old('location') }}" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div>
                    <label for="date" class="block font-medium text-gray-700">Date and time</label>
                    <input type="datetime-local" name="date" id="date" value="{{ old('date') }}" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div>
                    <label for="opponent" class="block font-medium text-gray-700">Opponent</label>
                    <input type="text" name="opponent" id="opponent" value="{{ old('opponent') }}" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div>
                    <label for="opponent_logo" class="block font-medium text-gray-700">Logo opponent (required)</label>
                    <input type="file" name="opponent_logo" id="opponent_logo" accept="image/*"
                        class="mt-1 block w-full text-gray-700">
                </div>

                <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Add fixture
                </button>
            </form>
        </div>
    </div>
</x-app-layout>