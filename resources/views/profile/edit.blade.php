<form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
    @csrf
    @method('patch')

    {{-- Username --}}
    <div class="mt-4">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" class="mt-1 block w-full"
               value="{{ old('username', $user->username) }}">
        @error('username')
            <div class="text-red-500 text-sm">{{ $message }}</div>
        @enderror
    </div>

    {{-- Birthday --}}
    <div class="mt-4">
        <label for="birthdate">Birthdate</label>
        <input type="date" name="birthdate" id="birthdate" class="mt-1 block w-full"
               value="{{ old('birthdate', $user->birthdate) }}">
        @error('birthdate')
            <div class="text-red-500 text-sm">{{ $message }}</div>
        @enderror
    </div>

    {{-- About Me --}}
    <div class="mt-4">
        <label for="about_me">About me</label>
        <textarea name="about_me" id="about_me" class="mt-1 block w-full" rows="4">{{ old('about_me', $user->about_me) }}</textarea>
        @error('about_me')
            <div class="text-red-500 text-sm">{{ $message }}</div>
        @enderror
    </div>

    {{-- Profielfoto --}}
    <div class="mt-4">
        <label for="profile_picture">Profile picture</label>
        @if ($user->profile_picture)
            <div class="mb-2">
                <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Huidige profielfoto" class="w-32 h-32 object-cover rounded-full">
            </div>
        @endif
        <input type="file" name="profile_picture" id="profile_picture" class="mt-1 block w-full">
        @error('profile_picture')
            <div class="text-red-500 text-sm">{{ $message }}</div>
        @enderror
    </div>

    {{-- Submit --}}
    <div class="mt-6">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
            Edit profile
        </button>
    </div>
</form>