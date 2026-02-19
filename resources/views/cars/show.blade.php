@extends('layouts.app')

@section('title', $car->car_name . ' | VIN: ' . $car->vin . ' - Car History Clean Report')
@section('description', 'View the full vehicle history report for ' . $car->car_name . ' (VIN: ' . $car->vin . '). Check accidents, auction history, and clean title status online.')

@section('content')
<article class="mx-auto max-w-6xl px-4 py-12 md:px-8 md:py-16">
    <!-- Breadcrumb Navigation -->
    <nav aria-label="Breadcrumb" class="mb-6 text-sm text-zinc-500">
        <ol class="flex items-center gap-1.5">
            <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a></li>
            <li>/</li>
            <li><a href="{{ route('cars.index') }}" class="hover:text-white transition-colors">Cars</a></li>
            <li>/</li>
            <li class="text-cyan-400 font-medium truncate max-w-[200px]">{{ $car->vin }}</li>
        </ol>
    </nav>

    <div class="overflow-hidden rounded-2xl border border-zinc-800 bg-zinc-900/80 shadow-2xl">
        <!-- Hero Image -->
        <div class="relative aspect-[21/9] w-full bg-zinc-800 md:aspect-[3/1]">
            @if($car->car_image_url)
                <img 
                    src="{{ $car->car_image_url }}" 
                    alt="VIN: {{ $car->vin }}" 
                    class="absolute inset-0 h-full w-full object-cover"
                    referrerpolicy="no-referrer"
                    loading="eager"
                >
            @else
                <div class="flex h-full items-center justify-center text-zinc-500">
                    No image available
                </div>
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-zinc-900 via-transparent to-transparent"></div>
        </div>

        <!-- Content -->
        <div class="p-6 md:p-10">
            <h1 class="font-display text-2xl font-bold text-white md:text-4xl">
                {{ $car->car_name }}
            </h1>

            <!-- VIN -->
            <div class="mt-5 inline-flex items-center gap-3 rounded-xl border border-cyan-500/20 bg-cyan-500/5 px-5 py-3">
                <span class="text-xs font-semibold uppercase tracking-wider text-cyan-300">VIN</span>
                <span class="font-mono text-lg font-bold tracking-widest text-cyan-400 md:text-xl select-all">
                    {{ $car->vin }}
                </span>
            </div>

            <!-- Vehicle Details Grid -->
            <dl class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <div class="rounded-xl border border-zinc-800 bg-zinc-950/50 p-4">
                    <dt class="text-xs font-semibold uppercase tracking-wider text-zinc-500">Vehicle</dt>
                    <dd class="mt-1 text-base font-medium text-white">{{ $car->car_name }}</dd>
                </div>
                <div class="rounded-xl border border-zinc-800 bg-zinc-950/50 p-4">
                    <dt class="text-xs font-semibold uppercase tracking-wider text-zinc-500">VIN Number</dt>
                    <dd class="mt-1 font-mono text-base font-medium text-cyan-400 select-all">{{ $car->vin }}</dd>
                </div>
                <div class="rounded-xl border border-zinc-800 bg-zinc-950/50 p-4">
                    <dt class="text-xs font-semibold uppercase tracking-wider text-zinc-500">Status</dt>
                    <dd class="mt-1 text-base font-medium text-emerald-400">✓ Verified</dd>
                </div>
                <!-- Always show Mileage -->
                <div class="rounded-xl border border-zinc-800 bg-zinc-950/50 p-4">
                    <dt class="text-xs font-semibold uppercase tracking-wider text-zinc-500">Mileage</dt>
                    <dd class="mt-1 text-base font-medium text-zinc-300">{{ $car->mileage ?? 'N/A' }}</dd>
                </div>
                <!-- Always show Location -->
                <div class="rounded-xl border border-zinc-800 bg-zinc-950/50 p-4">
                    <dt class="text-xs font-semibold uppercase tracking-wider text-zinc-500">Location</dt>
                    <dd class="mt-1 text-base font-medium text-zinc-300">{{ $car->location ?? 'N/A' }}</dd>
                </div>
                <!-- Always show Damage/Status -->
                <div class="rounded-xl border border-zinc-800 bg-zinc-950/50 p-4">
                    <dt class="text-xs font-semibold uppercase tracking-wider text-zinc-500">Damage</dt>
                    <dd class="mt-1 text-base font-medium text-red-400">{{ $car->damage ?? 'None' }}</dd>
                </div>
            </dl>

            <!-- Description -->
            @if($car->description)
                <section class="mt-8">
                    <h2 class="text-sm font-semibold uppercase tracking-wider text-zinc-500">
                        Vehicle Description
                    </h2>
                    <p class="mt-3 whitespace-pre-wrap leading-relaxed text-zinc-300">
                        {{ $car->description }}
                    </p>
                </section>
            @endif
        </div>
    </div>
</article>
@endsection
