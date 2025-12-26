<x-layouts.app>

    <p class="text-center mt-10 text-2xl font-semibold">
        Welcome to Laravel 12 with Tailwind CSS 4, Livewire 3, Alpine.js, WireUI, and PowerGrid!
    </p>

    @livewire('counter')
    @livewire('user-table')

    <x-password label="Secret 🙈" value="I love WireUI ❤️" />

</x-layouts.app>
