@extends('layouts.app')

@section('title', 'Browse Vehicles | VIN History Check USA, Germany & Australia')
@section('description', 'Explore our inventory of verified vehicles. Check full VIN history, auction records, and mileage reports for cars in USA, Australia, and Europe.')
@section('canonical', route('cars.index'))

@section('schema')
{{-- CollectionPage Schema --}}
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@type": "CollectionPage",
    "name": "Browse Vehicles - Car History Clean",
    "url": "{{ route('cars.index') }}",
    "description": "Explore our inventory of verified vehicles with full VIN history reports.",
    "mainEntity": {
        "@type": "ItemList",
        "numberOfItems": {{ $cars->total() }},
        "itemListElement": [
            @foreach($cars as $index => $car)
            {
                "@type": "ListItem",
                "position": {{ $index + 1 }},
                "url": "{{ route('cars.show', $car->slug) }}",
                "name": "{{ $car->car_name }}"
            }@if(!$loop->last),@endif
            @endforeach
        ]
    }
}
</script>

{{-- BreadcrumbList --}}
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        {
            "@type": "ListItem",
            "position": 1,
            "name": "Home",
            "item": "{{ url('/') }}"
        },
        {
            "@type": "ListItem",
            "position": 2,
            "name": "Cars",
            "item": "{{ route('cars.index') }}"
        }
    ]
}
</script>
@endsection

@section('content')
<div class="mx-auto max-w-7xl px-4 py-12 md:px-8 md:py-16">
    <header class="mb-10">
        <h1 class="font-display text-3xl font-bold text-white md:text-4xl">
            Our Cars
        </h1>
        <div class="mt-2 flex flex-wrap items-center gap-3">
            <p class="text-zinc-400">
                Browse vehicles with verified VIN numbers and full history details.
            </p>
            @if($cars->total() > 0)
                <span class="inline-flex items-center gap-1.5 rounded-full border border-zinc-800 bg-zinc-900/80 px-3 py-1 text-xs font-medium text-zinc-400">
                    <span class="font-bold text-cyan-400">{{ $cars->total() }}</span> vehicles
                    @if($cars->lastPage() > 1)
                        — Page <span class="font-bold text-white">{{ $cars->currentPage() }}</span> of <span class="font-bold text-white">{{ $cars->lastPage() }}</span>
                    @endif
                </span>
            @endif
        </div>
    </header>

    @if($cars->count() > 0)
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach($cars as $car)
                @include('partials.car-card', ['car' => $car])
            @endforeach
        </div>

        <div class="mt-12">
            {{ $cars->links('partials.pagination') }}
        </div>
    @else
        <div class="rounded-2xl border border-dashed border-zinc-700 bg-zinc-900/50 px-6 py-20 text-center text-zinc-500">
            No cars in inventory yet.
        </div>
    @endif
</div>
@endsection
