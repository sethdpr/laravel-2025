<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Contact
        </h2>
    </x-slot>

    <div class="py-12" style="background-color: #f9fafb;">
        <div style="max-width: 450px; margin: 0 auto; background: white; padding: 2rem; border-radius: 0.5rem; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
            <h3 style="text-align: center; font-size: 1.25rem; font-weight: 600; color: #1f2937;">Contact Form</h3>

            <form method="POST" action="{{ route('contact.submit') }}">
                @csrf

                {{-- Email --}}
                <div style="margin-bottom: 1rem;">
                    <label for="email" style="display: block; font-weight: 600; color: #374151; margin-bottom: 0.5rem;">Email</label>
                    <input 
                        type="email" 
                        name="email" 
                        id="email"
                        value="{{ old('email', auth()->user()->email ?? '') }}"
                        style="width: 100%; padding: 0.5rem 0.75rem; border: 1px solid #d1d5db; border-radius: 0.375rem;"
                        required
                    >
                    @error('email')
                        <p style="color: red; font-size: 0.875rem;">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Subject --}}
                <div style="margin-bottom: 1rem;">
                    <label for="subject" style="display: block; font-weight: 600; color: #374151; margin-bottom: 0.5rem;">Subject</label>
                    <input 
                        type="text" 
                        name="subject" 
                        id="subject"
                        value="{{ old('subject') }}"
                        style="width: 100%; padding: 0.5rem 0.75rem; border: 1px solid #d1d5db; border-radius: 0.375rem;"
                        required
                    >
                    @error('subject')
                        <p style="color: red; font-size: 0.875rem;">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Message --}}
                <div style="margin-bottom: 1.5rem;">
                    <label for="message" style="display: block; font-weight: 600; color: #374151; margin-bottom: 0.5rem;">Message</label>
                    <textarea 
                        name="message" 
                        id="message" 
                        rows="10"
                        style="width: 100%; padding: 0.5rem 0.75rem; border: 1px solid #d1d5db; border-radius: 0.375rem; resize: none;"
                        required>{{ old('message') }}</textarea>
                    @error('message')
                        <p style="color: red; font-size: 0.875rem;">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit"
                        style="width: 100%; background-color: #3b82f6; color: white; font-weight: 600; padding: 0.5rem 1rem; border: none; border-radius: 0.375rem; cursor: pointer;">
                        Submit Form
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>