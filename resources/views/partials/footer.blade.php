<footer class="border-t border-zinc-800/80 bg-zinc-950">
    <div class="mx-auto max-w-6xl px-4 py-12 md:px-8">
        <div class="flex flex-col gap-8 md:flex-row md:items-center md:justify-between">
            <div>
                <a href="{{ route('home') }}" class="font-display text-lg font-semibold text-white">
                    Car History Remover
                </a>
                <p class="mt-2 max-w-sm text-sm text-zinc-500">
                    Professional car history removal services. Clean title, verified
                    VIN, transparent process.
                </p>
            </div>
            <nav class="flex flex-wrap gap-6">
                <a href="{{ route('home') }}" class="text-sm font-medium text-zinc-400 transition hover:text-cyan-400">Home</a>
                <a href="{{ route('cars.index') }}" class="text-sm font-medium text-zinc-400 transition hover:text-cyan-400">Cars</a>
                <a href="{{ route('products') }}" class="text-sm font-medium text-zinc-400 transition hover:text-cyan-400">Services</a>
                <a href="{{ route('about') }}" class="text-sm font-medium text-zinc-400 transition hover:text-cyan-400">About</a>
                <a href="{{ route('contact') }}" class="text-sm font-medium text-zinc-400 transition hover:text-cyan-400">Contact</a>
            </nav>
        </div>
        <div class="mt-8 border-t border-zinc-800/80 pt-8 text-center text-sm text-zinc-500">
            &copy; {{ date('Y') }} Car History Remover. All rights reserved.
        </div>
    </div>
</footer>
