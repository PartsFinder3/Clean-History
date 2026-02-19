<header class="sticky top-0 z-50 w-full border-b border-zinc-800/80 bg-zinc-950/90 backdrop-blur-md">
    <div class="mx-auto flex h-16 max-w-6xl items-center justify-between px-4 md:px-8">
        <a href="{{ route('home') }}" class="font-display text-xl font-semibold tracking-tight text-white md:text-2xl">
            Car History Remover
        </a>

        <nav class="hidden items-center gap-8 md:flex">
            <a href="{{ route('home') }}" class="text-sm font-medium {{ request()->routeIs('home') ? 'text-cyan-400' : 'text-zinc-400' }} transition hover:text-cyan-400">Home</a>
            <a href="{{ route('cars.index') }}" class="text-sm font-medium {{ request()->routeIs('cars.*') ? 'text-cyan-400' : 'text-zinc-400' }} transition hover:text-cyan-400">Cars</a>
            <a href="{{ route('products') }}" class="text-sm font-medium {{ request()->routeIs('products') ? 'text-cyan-400' : 'text-zinc-400' }} transition hover:text-cyan-400">Services</a>
            <a href="{{ route('about') }}" class="text-sm font-medium {{ request()->routeIs('about') ? 'text-cyan-400' : 'text-zinc-400' }} transition hover:text-cyan-400">About</a>
            <a href="{{ route('contact') }}" class="text-sm font-medium {{ request()->routeIs('contact') ? 'text-cyan-400' : 'text-zinc-400' }} transition hover:text-cyan-400">Contact</a>
            
            @auth
                <a href="{{ route('admin.dashboard') }}" class="text-sm font-medium text-purple-400 transition hover:text-purple-300">Dashboard</a>
                <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-sm font-medium text-red-400 transition hover:text-red-300 ml-4">Logout</button>
                </form>
            @else
                <a href="{{ route('admin.login') }}" class="text-sm font-medium text-zinc-400 transition hover:text-cyan-400">Admin Login</a>
            @endauth
        </nav>

        <button type="button" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" class="flex h-11 w-11 items-center justify-center rounded-lg border border-zinc-700 text-zinc-400 md:hidden">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden border-t border-zinc-800/80 bg-zinc-950/95 px-4 py-4 md:hidden">
        <nav class="flex flex-col gap-1">
            <a href="{{ route('home') }}" class="rounded-lg px-4 py-3 text-base font-medium text-zinc-300 hover:bg-zinc-800/50 hover:text-cyan-400">Home</a>
            <a href="{{ route('cars.index') }}" class="rounded-lg px-4 py-3 text-base font-medium text-zinc-300 hover:bg-zinc-800/50 hover:text-cyan-400">Cars</a>
            <a href="{{ route('products') }}" class="rounded-lg px-4 py-3 text-base font-medium text-zinc-300 hover:bg-zinc-800/50 hover:text-cyan-400">Services</a>
            <a href="{{ route('about') }}" class="rounded-lg px-4 py-3 text-base font-medium text-zinc-300 hover:bg-zinc-800/50 hover:text-cyan-400">About</a>
            <a href="{{ route('contact') }}" class="rounded-lg px-4 py-3 text-base font-medium text-zinc-300 hover:bg-zinc-800/50 hover:text-cyan-400">Contact</a>
            @auth
                <a href="{{ route('admin.dashboard') }}" class="rounded-lg px-4 py-3 text-base font-medium text-purple-400 hover:bg-zinc-800/50">Dashboard</a>
            @else
                <a href="{{ route('admin.login') }}" class="rounded-lg px-4 py-3 text-base font-medium text-zinc-300 hover:bg-zinc-800/50 hover:text-cyan-400">Admin Login</a>
            @endauth
        </nav>
    </div>
</header>
