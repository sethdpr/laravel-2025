<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">    
            <h2 class="text-xl font-semibold text-gray-800 leading-tight">FAQ</h2>
            @auth
                @if(auth()->user()->is_admin)
                    <a href="{{ route('faq.create') }}" class="bg-green-500 text-white px-4 py-2 rounded shadow hover:bg-green-600" style="background-color: #3B82F6">➕ New FAQ</a>
                @endif
            @endauth
        </div>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto">
        @foreach($faqs as $faq)
            <div class="mb-4 bg-white p-4 rounded shadow">
                <h3 class="text-xl font-bold" style="font-weight: bold;">{{ $faq->question }}</h3>
                <p class="mt-2">{{ $faq->answer }}</p>
                @auth
                    @if(auth()->user()->is_admin)
                        <div style="margin-top: 1rem; display: flex; gap: 1rem;">
                            <a href="{{ route('faq.edit', $faq) }}"
                               style="background-color: #facc15; color: white; padding: 0.5rem 1rem; border-radius: 6px; text-decoration: none; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
                                ✏️ Bewerken
                            </a>

                            <form action="{{ route('faq.destroy', $faq) }}" method="POST" onsubmit="return confirm('Delete this FAQ?');" style="margin: 0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        style="background-color: #ef4444; color: white; padding: 0.5rem 1rem; border-radius: 6px; border: none; cursor: pointer; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
                                    🗑️ Delete
                                </button>
                            </form>
                        </div>
                    @endif
                @endauth
            </div>
        @endforeach
    </div>
</x-app-layout>