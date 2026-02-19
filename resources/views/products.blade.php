@extends('layouts.app')

@section('title', 'Our Services | Professional Car History Removal - VIN Cleaner')
@section('description', 'Professional car history removal from major auction sites. We delete VIN information from autoAstat, BidCars, BidFax, and more permanently.')

@section('content')
<div class="mx-auto max-w-7xl px-4 py-12 md:px-8 md:py-20">
    <header class="mb-16 text-center">
        <h1 class="font-display text-4xl font-bold tracking-tight text-white md:text-5xl lg:text-6xl">
            Sites to <span class="gradient-text">Clean History</span>
        </h1>
        <p class="mx-auto mt-6 max-w-2xl text-lg text-zinc-400">
            We provide professional removal of vehicle history and VIN data from major auction platforms and search results.
        </p>
    </header>

    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">
        @foreach($products as $product)
            <article class="group relative overflow-hidden rounded-2xl border border-zinc-800 bg-zinc-900/50 p-6 shadow-xl transition-all hover:border-cyan-500/30 hover:bg-zinc-900">
                <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/5 via-transparent to-transparent opacity-0 transition-opacity group-hover:opacity-100"></div>
                
                <div class="relative flex flex-col h-full">
                    <!-- Site Logo Container -->
                    <a href="{{ route('services.show', $product['slug']) }}" class="mb-6 flex aspect-video w-full items-center justify-center rounded-xl bg-zinc-950 p-6 border border-zinc-800 group-hover:border-zinc-700 transition-colors overflow-hidden">
                        <img 
                            src="{{ $product['image'] }}" 
                            alt="{{ $product['name'] }}" 
                            class="max-h-full max-w-full object-contain filter grayscale group-hover:grayscale-0 transition-all duration-500 group-hover:scale-110"
                            onerror="this.src='https://via.placeholder.com/300x150?text={{ urlencode($product['name']) }}'"
                        >
                    </a>

                    <div class="mb-4 flex items-center justify-between">
                        <a href="{{ route('services.show', $product['slug']) }}">
                            <h2 class="font-display text-xl font-bold text-white hover:text-cyan-400 transition-colors">
                                {{ $product['name'] }}
                            </h2>
                        </a>
                        <div class="flex items-center gap-1.5 rounded-full bg-cyan-500/10 px-2.5 py-1 border border-cyan-500/20">
                            <span class="text-[10px] font-bold text-zinc-500 uppercase">From</span>
                            <span class="text-sm font-black text-cyan-400">${{ $product['price'] }}</span>
                        </div>
                    </div>
                    
                    <p class="text-sm leading-relaxed text-zinc-400 mb-8 flex-grow">
                        {{ $product['description'] }}
                    </p>

                    <div class="grid grid-cols-2 gap-3">
                        <a href="{{ route('services.show', $product['slug']) }}" 
                           class="inline-flex items-center justify-center rounded-xl border border-zinc-700 bg-zinc-800/50 px-4 py-3 text-xs font-bold text-white transition-all hover:bg-zinc-800 hover:border-zinc-600"
                        >
                            Details
                        </a>
                        <a href="https://wa.me/3144888004?text={{ urlencode('Hi, I want to delete car history from ' . $product['name'] . '. Please provide details for the $' . $product['price'] . ' service.') }}" 
                           target="_blank"
                           class="inline-flex items-center justify-center gap-1.5 rounded-xl bg-emerald-500 px-4 py-3 text-xs font-bold text-zinc-950 transition-all hover:bg-emerald-400 active:scale-[0.98] shadow-lg hover:shadow-emerald-500/20"
                        >
                            Clean Now
                        </a>
                    </div>
                </div>
            </article>
        @endforeach
    </div>

    <!-- Contact CTA -->
    <div class="mt-20 rounded-3xl border border-zinc-800 bg-zinc-900/30 p-8 md:p-12 text-center overflow-hidden relative">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-from)_0%,_transparent_70%)] from-cyan-500/5 to-transparent"></div>
        <div class="relative">
            <h2 class="text-3xl font-bold text-white md:text-4xl">Need a specific site removed?</h2>
            <p class="mt-4 text-zinc-400">If you don't see the site you're looking for, contact us. We support over 50+ auction platforms.</p>
            <div class="mt-10 flex flex-wrap justify-center gap-4">
                <a href="{{ route('contact') }}" class="rounded-xl bg-cyan-500 px-8 py-3 text-sm font-bold text-zinc-950 transition hover:bg-cyan-400">
                    Contact Support
                </a>
                <a href="https://wa.me/3144888004" target="_blank" class="rounded-xl border border-zinc-700 bg-zinc-900 px-8 py-3 text-sm font-bold text-white transition hover:border-zinc-600">
                    Free Consultation
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
