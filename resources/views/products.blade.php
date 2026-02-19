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
                    <div class="mb-6 flex aspect-video w-full items-center justify-center rounded-xl bg-zinc-950 p-6 border border-zinc-800 group-hover:border-zinc-700 transition-colors">
                        <img 
                            src="{{ $product['image'] }}" 
                            alt="{{ $product['name'] }}" 
                            class="max-h-full max-w-full object-contain filter grayscale group-hover:grayscale-0 transition-all duration-500"
                            onerror="this.src='https://via.placeholder.com/300x150?text={{ urlencode($product['name']) }}'"
                        >
                    </div>

                    <h2 class="font-display text-xl font-bold text-white mb-3">
                        {{ $product['name'] }}
                    </h2>
                    
                    <p class="text-sm leading-relaxed text-zinc-400 mb-8 flex-grow">
                        {{ $product['description'] }}
                    </p>

                    <a href="https://wa.me/3144888004?text={{ urlencode('Hi, I want to delete car history from ' . $product['name']) }}" 
                       target="_blank"
                       class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-zinc-800 px-5 py-3 text-sm font-bold text-white transition-all hover:bg-emerald-500 hover:text-zinc-950 active:scale-[0.98]"
                    >
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L0 24l6.335-1.662c1.72.94 3.659 1.437 5.634 1.437h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                        </svg>
                        Delete Car History
                    </a>
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
