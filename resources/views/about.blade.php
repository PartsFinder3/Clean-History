@extends('layouts.app')

@section('title', 'About Us | Car History Clean - Trusted VIN & Vehicle History Reports')
@section('description', 'Learn about Car History Clean, your trusted partner for accurate vehicle history reports and VIN checks in USA, Germany, Poland, and Australia.')
@section('canonical', route('about'))

@section('schema')
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@type": "AboutPage",
    "name": "About Car History Clean",
    "url": "{{ route('about') }}",
    "description": "Learn about Car History Clean, your trusted partner for accurate vehicle history reports and VIN checks.",
    "mainEntity": {
        "@type": "Organization",
        "name": "Car History Clean",
        "url": "{{ url('/') }}",
        "foundingDate": "2024",
        "description": "Professional car history removal services. Clean title, verified VIN, transparent process.",
        "knowsAbout": ["VIN History Removal", "Car Auction History Cleaning", "Vehicle Privacy Services", "Title Cleaning"]
    }
}
</script>

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
            "name": "About Us",
            "item": "{{ route('about') }}"
        }
    ]
}
</script>
@endsection

@section('content')
<div class="mx-auto max-w-6xl px-4 py-12 md:px-8 md:py-16">
    <header class="mb-12">
        <h1 class="font-display text-3xl font-bold text-white md:text-4xl">
            About Us
        </h1>
        <p class="mt-2 text-zinc-400">
            Trusted car history and title services since day one.
        </p>
    </header>

    <section class="max-w-none">
        <div class="space-y-6 text-zinc-300">
            <p>
                Car History Remover provides professional vehicle history and title
                services. We help dealers and owners with clean titles, verified
                VINs, and a transparent process from start to finish.
            </p>
            <p>
                Every car in our inventory is documented with accurate information.
                We believe in clarity and reliability so you can make informed
                decisions.
            </p>
            <h2 class="font-display text-xl font-semibold text-white">
                Our commitment
            </h2>
            <ul class="list-inside list-disc space-y-2 text-zinc-400">
                <li>Verified VIN on every vehicle</li>
                <li>No hidden fees; clear pricing</li>
                <li>Secure, professional process</li>
                <li>Support when you need it</li>
            </ul>
        </div>
    </section>
</div>
@endsection
