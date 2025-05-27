<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Upcoming fixtures
            </h2>
            @if(auth()->check() && auth()->user()->is_admin)
            <a href="{{ route('fixtures.create') }}" 
               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                Add new fixture
            </a>
            @endif
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            @if($fixtures->isEmpty())
                <p class="text-gray-600">There are no upcoming fixtures at the moment. Stay tuned!</p>
            @else
                <ul class="space-y-4">
                    @foreach($fixtures as $fixture)
                        <li class="bg-white shadow overflow-hidden rounded-lg p-4 flex items-center justify-between space-x-4">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    @if($fixture->opponent_logo)
                                        <img src="{{ asset('storage/' . $fixture->opponent_logo) }}" alt="{{ $fixture->opponent }}" style="max-width: 48px; max-height: 48px; object-fit: contain;">
                                    @else
                                        <div class="h-12 w-12 bg-gray-300 flex items-center justify-center text-gray-600">
                                            Logo
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <p class="font-semibold text-lg">{{ $fixture->competition }}</p>
                                    <p class="text-gray-700">{{ $fixture->location ?? '-' }}</p>
                                    <p>{{ $fixture->opponent }}</p>
                                    <p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($fixture->date)->format('d-m-Y H:i') }}</p>
                                </div>
                            </div>

                            @if(auth()->check() && auth()->user()->is_admin)
                            <form action="{{ route('fixtures.destroy', $fixture) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je deze wedstrijd wilt verwijderen?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 font-semibold" style="background-color: #ef4444; color: white; padding: 0.5rem 1rem; border-radius: 6px; border: none; cursor: pointer; box-shadow: 0 2px 6px rgba(0,0,0,0.1);"">
                                    🗑️
                                </button>
                            </form>
                            @endif
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</x-app-layout>