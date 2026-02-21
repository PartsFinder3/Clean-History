@extends('layouts.app')

@section('title', 'Car History Clean – Check VIN History in USA, Germany, Poland & Australia')
@section('description', 'Check your car history clean report online. Get accurate VIN check reports for vehicles in USA, Germany, Poland, and Australia. Detect accidents, mileage fraud, theft records instantly.')

@section('content')
<section class="relative overflow-hidden border-b border-zinc-800/80 px-4 py-20 md:px-8 md:py-28">
    <div class="absolute inset-0 bg-gradient-to-br from-cyan-950/20 via-transparent to-violet-950/10"></div>
    <div class="relative mx-auto max-w-6xl">
        <h1 class="font-display text-4xl font-bold tracking-tight text-white md:text-5xl lg:text-6xl">
            Professional <span class="gradient-text">Car History</span> Removal
        </h1>
        <p class="mt-6 max-w-2xl text-lg text-zinc-400 md:text-xl">
            Clean title, verified VIN, transparent process. Trusted by dealers
            and owners. Get your vehicle history cleared with confidence.
        </p>
        <div class="mt-10 flex flex-wrap gap-4">
            <a href="{{ route('cars.index') }}" class="inline-flex min-h-[44px] items-center justify-center rounded-xl bg-cyan-500 px-6 py-3 text-sm font-semibold text-zinc-950 transition hover:bg-cyan-400 active:bg-cyan-600 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 focus:ring-offset-zinc-950">
                Browse Cars
            </a>
            <a href="{{ route('contact') }}" class="inline-flex min-h-[44px] items-center justify-center rounded-xl border border-zinc-600 px-6 py-3 text-sm font-semibold text-zinc-300 transition hover:border-cyan-500/50 hover:text-cyan-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 focus:ring-offset-zinc-950">
                Get in Touch
            </a>
        </div>
    </div>
</section>

<section class="mx-auto max-w-6xl px-4 py-16 md:px-8 md:py-24">
    <h2 class="font-display text-2xl font-semibold text-white md:text-3xl">
        Why Choose Us
    </h2>
    <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        <div class="glass-card rounded-2xl p-6">
            <h3 class="font-display text-lg font-semibold text-white">Verified VIN</h3>
            <p class="mt-2 text-sm text-zinc-400">Every vehicle is verified with accurate VIN and documentation.</p>
        </div>
        <div class="glass-card rounded-2xl p-6">
            <h3 class="font-display text-lg font-semibold text-white">Transparent Process</h3>
            <p class="mt-2 text-sm text-zinc-400">Clear steps, no hidden fees. You know exactly what you get.</p>
        </div>
        <div class="glass-card rounded-2xl p-6">
            <h3 class="font-display text-lg font-semibold text-white">Trusted Service</h3>
            <p class="mt-2 text-sm text-zinc-400">Used by dealers and private owners nationwide.</p>
        </div>
    </div>
</section>

<section class="mx-auto max-w-6xl px-4 py-16 md:px-8 md:py-24">
    <div class="flex items-end justify-between">
        <h2 class="font-display text-2xl font-semibold text-white md:text-3xl">
            Featured Cars
        </h2>
        <a href="{{ route('cars.index') }}" class="text-sm font-medium text-cyan-400 hover:text-cyan-300">
            View all
        </a>
    </div>
    
    @if($featuredCars->count() > 0)
        <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($featuredCars as $car)
                @include('partials.car-card', ['car' => $car])
            @endforeach
        </div>
    @else
        <div class="mt-8 rounded-2xl border border-dashed border-zinc-700 bg-zinc-900/50 px-6 py-16 text-center text-zinc-500">
            No cars listed yet.
        </div>
    @endif
</section>

<section class="border-t border-zinc-800/80 bg-zinc-900/30 px-4 py-16 md:px-8 md:py-20">
    <div class="mx-auto max-w-3xl text-center">
        <h2 class="font-display text-2xl font-semibold text-white md:text-3xl">
            Ready to get started?
        </h2>
        <p class="mt-4 text-zinc-400">
            Contact us for a quote or to discuss your vehicle.
        </p>
        <div class="mt-8">
            <a href="{{ route('contact') }}" class="inline-flex min-h-[44px] items-center justify-center rounded-xl bg-cyan-500 px-6 py-3 text-sm font-semibold text-zinc-950 transition hover:bg-cyan-400 active:bg-cyan-600">
                Contact Us
            </a>
        </div>
    </div>
</section>
@endsection
