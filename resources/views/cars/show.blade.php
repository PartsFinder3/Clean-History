@extends('layouts.app')

@section('title', $car->car_name . ' | VIN: ' . $car->vin . ' - Car History Clean Report')
@section('description', 'View the full vehicle history report for ' . $car->car_name . ' (VIN: ' . $car->vin . '). Check accidents, auction history, and clean title status online.')
@section('canonical', route('cars.show', $car->slug))
@section('og_type', 'product')
@section('og_image', $car->car_image_url ?? '')

@section('schema')
{{-- Vehicle Schema --}}
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@type": "Car",
    "name": "{{ $car->car_name }}",
    "url": "{{ route('cars.show', $car->slug) }}",
    "vehicleIdentificationNumber": "{{ $car->vin }}",
    @if($car->car_image_url)
    "image": "{{ $car->car_image_url }}",
    @endif
    @if($car->mileage)
    "mileageFromOdometer": {
        "@type": "QuantitativeValue",
        "value": "{{ $car->mileage }}",
        "unitCode": "SMI"
    },
    @endif
    @if($car->description)
    "description": "{{ addslashes($car->description) }}",
    @endif
    "offers": {
        "@type": "Offer",
        "availability": "https://schema.org/InStock",
        "seller": {
            "@type": "Organization",
            "name": "Car History Clean"
        }
    },
    "brand": {
        "@type": "Brand",
        "name": "{{ explode(' ', $car->car_name)[0] ?? 'Unknown' }}"
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
        },
        {
            "@type": "ListItem",
            "position": 3,
            "name": "{{ $car->car_name }}",
            "item": "{{ route('cars.show', $car->slug) }}"
        }
    ]
}
</script>

{{-- FAQPage Schema --}}
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
        {
            "@type": "Question",
            "name": "What is the VIN of this vehicle?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "The VIN (Vehicle Identification Number) for this {{ $car->car_name }} is {{ $car->vin }}."
            }
        },
        {
            "@type": "Question",
            "name": "Can I clean the history of this car?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Yes, Car History Clean offers professional VIN history removal services. Contact us via WhatsApp to get started with your clean history report."
            }
        }
    ]
}
</script>
@endsection

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

            <!-- Clean History Action -->
            <div class="mt-12 rounded-2xl border border-emerald-500/20 bg-emerald-500/5 p-6 md:p-8">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                    <div>
                        <div class="flex items-center gap-2 mb-2">
                            <span class="px-2 py-0.5 rounded bg-emerald-500/20 text-emerald-400 text-[10px] font-bold uppercase tracking-wider">Premium Service</span>
                            <div class="h-1 w-1 rounded-full bg-emerald-500/30"></div>
                            <span class="text-xs font-bold text-cyan-400">Clean History Guaranteed</span>
                        </div>
                        <h3 class="text-xl font-bold text-white md:text-2xl">Want to clean this vehicle's history?</h3>
                        <p class="mt-2 text-zinc-400 max-w-xl">Get a professional clean history report and removal service for this specific VIN. Quick, verified, and permanent.</p>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row items-center gap-4">
                        <a href="https://wa.me/3144888004?text={{ urlencode('Hi, I want to get a Clean History report for VIN: ' . $car->vin) }}" 
                           target="_blank"
                           class="w-full sm:w-auto flex items-center justify-center gap-3 px-8 py-4 bg-emerald-500 hover:bg-emerald-400 text-zinc-950 font-black rounded-xl transition-all active:scale-95 shadow-xl shadow-emerald-500/20"
                        >
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L0 24l6.335-1.662c1.72.94 3.659 1.437 5.634 1.437h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                            </svg>
                            START CLEAN HISTORY
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>
@endsection
