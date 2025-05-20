<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin Panel
        </h2>
    </x-slot>

    <div class="py-6 max-w-5xl mx-auto">
        @if(session('status'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('status') }}
            </div>
        @endif

        <table class="w-full bg-white shadow rounded">
            <thead>
                <tr>
                    <th class="border px-4 py-2">Name</th>
                    <th class="border px-4 py-2">Email</th>
                    <th class="border px-4 py-2">Admin?</th>
                    <th class="border px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr class="text-center">
                        <td class="border px-4 py-2" style="text-align: center; vertical-align: middle;">{{ $user->name }}</td>
                        <td class="border px-4 py-2" style="text-align: center; vertical-align: middle;">{{ $user->email }}</td>
                        <td class="border px-4 py-2" style="text-align: center; vertical-align: middle;">
                            @if($user->is_admin)
                                ✅
                            @else
                                ❌
                            @endif
                        </td>
                        <td class="border px-4 py-2" style="text-align: center; vertical-align: middle;">
                            @if(!$user->is_admin)
                                <form action="{{ route('admin.users.makeAdmin', $user) }}" method="POST" onsubmit="return confirm('Make this user an admin?');">
                                    @csrf
                                    <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">
                                        Make Admin
                                    </button>
                                </form>
                            @else
                                <span class="text-gray-500">Already admin</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>