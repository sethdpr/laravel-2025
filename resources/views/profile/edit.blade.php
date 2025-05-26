<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Profile
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
                <p class="mt-2 text-gray-700">{{ $user->about_me ?? 'User has not written a bio yet.' }}</p>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow">
                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('name', $user->name) }}">
                    </div>
                    
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                        <input type="text" name="username" id="username" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('username', $user->username) }}">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="text" name="email" id="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('email', $user->email) }}">
                    </div>

                    <div>
                        <label for="birthdate" class="block text-sm font-medium text-gray-700">Birthdate</label>
                        <input type="date" name="birthdate" id="birthdate" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('birthdate', $user->birthdate) }}">
                    </div>

                    <div>
                        <label for="about_me" class="block text-sm font-medium text-gray-700">About Me</label>
                        <textarea name="about_me" id="about_me" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" rows="4">{{ old('about_me', $user->about_me) }}</textarea>
                    </div>

                    <div>
                        <label for="profile_picture" class="block text-sm font-medium text-gray-700">Profile Picture</label>
                        @if ($user->profile_picture)
                            <img src="{{ asset('storage/' . $user->profile_picture) }}" class="w-24 h-24 object-cover rounded-full my-2">
                        @endif
                        <input type="file" name="profile_picture" id="profile_picture" class="mt-1 block w-full text-sm text-gray-500">
                    </div>

                    <div>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700" style="background-color: #3B82F6;">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>