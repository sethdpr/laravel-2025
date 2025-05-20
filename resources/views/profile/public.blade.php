<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Profiel
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto mt-8">
        <div class="bg-white shadow rounded p-6">
            <div class="flex items-center space-x-4">
                @if ($user->profile_picture)
                    <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profielfoto" class="w-24 h-24 rounded-full object-cover">
                @endif
                <div>
                    <h1 class="text-2xl font-bold">{{ $user->username ?? $user->name }}</h1>
                    @if ($user->birthdate)
                        <p class="text-gray-600">🎂 Born on {{ \Carbon\Carbon::parse($user->birthdate)->format('d/m/Y') }}</p>
                    @endif
                </div>
            </div>

            <div class="mt-6">
                <h2 class="text-lg font-semibold">About me</h2>
                <p class="mt-2 text-gray-700">{{ $user->about_me ?? 'No info available.' }}</p>
            </div>
        </div>
    </div>
</x-app-layout>