<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Newsfeed
            </h2>
            @auth
                @if(auth()->user()->is_admin)
                    <a href="{{ route('newsItem.create') }}"
                       class="bg-green-500 text-white px-4 py-2 rounded shadow hover:bg-green-600"
                       style="background-color: #3B82F6;">
                        ➕ New Post
                    </a>
                @endif
            @endauth
        </div>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto">
        <div class="space-y-6">
            @foreach($newsItem as $item)
                <div class="bg-white p-4 rounded shadow">
                    <h3 class="text-xl font-bold" style="font-weight: bold;">{{ $item->title }}</h3>
                    <p class="mt-2">{{ $item->content }}</p>
                    <p class="text-gray-500 text-sm mt-1">Published on {{ $item->created_at->format('d/m/Y, H:i') }}</p>

                    @if($item->image_path)
                        <img src="{{ asset('storage/' . $item->image_path) }}" alt="Afbeelding" class="mt-4 w-full max-w-md rounded">
                    @endif

                    @auth
                        @if(auth()->user()->is_admin)
                            <div style="margin-top: 1rem; display: flex; gap: 1rem;">
                                <a href="{{ route('newsItem.edit', $item) }}"
                                   style="background-color: #facc15; color: white; padding: 0.5rem 1rem; border-radius: 6px; text-decoration: none; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
                                    ✏️ Edit
                                </a>

                                <form method="POST" action="{{ route('newsItem.delete', $item) }}"
                                      onsubmit="return confirm('Are you sure you want to delete this item?');"
                                      style="margin: 0;">
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

                    <div x-data="{ showComments: false }" class="mt-4">
                        <button @click="showComments = !showComments" class="text-indigo-600 text-sm">
                            <span x-show="!showComments">Show comments</span>
                            <span x-show="showComments">Hide comments</span>
                        </button>

                        <div x-show="showComments" x-transition class="mt-2 space-y-3">
                            @foreach ($item->comments as $comment)
                            <div class="bg-gray-100 p-2 rounded flex justify-between items-start">
                                <div>
                                <a href="{{ route('public.show', ['username' => $comment->user->username]) }}">
                                    <strong>{{ $comment->user->name }}</strong>
                                </a>
                                <span class="text-xs text-gray-600 ml-2">{{ $comment->created_at->diffForHumans() }}</span>
                                <p>{{ $comment->body }}</p>
                            </div>

                            @auth
                                @if(auth()->user()->is_admin)
                                    <form action="{{ route('comments.destroy', $comment) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je deze reactie wil verwijderen?');" class="ml-4 flex-shrink-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800" title="Delete comment" style="background-color: #ef4444; color: white; padding: 0.5rem 1rem; border-radius: 6px; border: none; cursor: pointer; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
                                        🗑️
                                    </button>
                                    </form>
                                @endif
                            @endauth
                        </div>
                    @endforeach
                            @auth
                                <form action="{{ route('comments.store', $item) }}" method="POST" class="mt-2">
                                    @csrf
                                    <textarea name="body" rows="2" class="w-full border p-2 rounded" placeholder="Your comment"></textarea>
                                    <button type="submit" class="bg-indigo-600 text-white mt-2 px-4 py-1 rounded" style="background-color: #3B82F6;">Comment</button>
                                </form>
                            @else
                                <p class="text-sm text-gray-600">Log in to place comments</p>
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>