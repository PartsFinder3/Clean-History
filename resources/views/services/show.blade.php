@extends('layouts.app')

@section('title', $product['meta_title'])
@section('description', $product['meta_description'])
@section('canonical', route('services.show', $product['slug']))
@section('og_image', $product['image'])

@section('schema')
{{-- Service Schema --}}
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@type": "Service",
    "name": "{{ $product['name'] }} History Removal",
    "url": "{{ route('services.show', $product['slug']) }}",
    "description": "{{ $product['full_description'] }}",
    "image": "{{ $product['image'] }}",
    "provider": {
        "@type": "Organization",
        "name": "Car History Clean",
        "url": "{{ url('/') }}"
    },
    "serviceType": "VIN History Removal",
    "areaServed": {
        "@type": "Country",
        "name": "Worldwide"
    },
    "offers": {
        "@type": "Offer",
        "price": "{{ $product['price'] }}",
        "priceCurrency": "USD",
        "availability": "https://schema.org/InStock",
        "priceValidUntil": "{{ date('Y-12-31') }}",
        "seller": {
            "@type": "Organization",
            "name": "Car History Clean"
        }
    },
    "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "4.8",
        "reviewCount": "500",
        "bestRating": "5",
        "worstRating": "1"
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
            "name": "Services",
            "item": "{{ route('products') }}"
        },
        {
            "@type": "ListItem",
            "position": 3,
            "name": "{{ $product['name'] }}",
            "item": "{{ route('services.show', $product['slug']) }}"
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
            "name": "Is this removal permanent?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Yes. Once we remove the data from {{ $product['name'] }}, it is purged from their database and cannot be recovered by public users."
            }
        },
        {
            "@type": "Question",
            "name": "Will it also disappear from Google?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "After the site source is cleared, Google usually updates its index within a few days, removing the links and images from search results."
            }
        },
        {
            "@type": "Question",
            "name": "How long does the {{ $product['name'] }} removal take?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Our team typically completes {{ $product['name'] }} history removal within 24-72 hours after receiving your VIN."
            }
        },
        {
            "@type": "Question",
            "name": "How much does {{ $product['name'] }} removal cost?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Our {{ $product['name'] }} removal service starts at ${{ $product['price'] }}. Contact us via WhatsApp for a detailed quote."
            }
        }
    ]
}
</script>
@endsection

@section('content')
<div class="mx-auto max-w-7xl px-4 py-12 md:px-8 md:py-20">
    <!-- Breadcrumbs -->
    <nav class="mb-12 flex items-center gap-2 text-sm text-zinc-500">
        <a href="{{ route('home') }}" class="hover:text-cyan-400">Home</a>
        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg>
        <a href="{{ route('products') }}" class="hover:text-cyan-400">Services</a>
        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg>
        <span class="text-zinc-300">{{ $product['name'] }}</span>
    </nav>

    <div class="grid gap-16 lg:grid-cols-12">
        <!-- Left: Image and Key Info -->
        <div class="lg:col-span-5">
            <div class="sticky top-28">
                <div class="relative overflow-hidden rounded-3xl border border-zinc-800 bg-zinc-900/50 p-8 shadow-2xl">
                    <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/10 via-transparent to-transparent"></div>
                    
                    <div class="relative flex aspect-video w-full items-center justify-center rounded-2xl bg-zinc-950 p-10 border border-zinc-800 mb-8">
                        <img 
                            src="{{ $product['image'] }}" 
                            alt="{{ $product['name'] }} logo" 
                            class="max-h-full max-w-full object-contain filter"
                            onerror="this.src='https://via.placeholder.com/400x200?text={{ urlencode($product['name']) }}'"
                        >
                    </div>

                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="font-display text-4xl font-bold text-white mb-2">{{ $product['name'] }}</h1>
                            <p class="text-zinc-400 font-medium">Professional Removal</p>
                        </div>
                        <div class="text-right">
                            <span class="text-xs font-bold uppercase tracking-widest text-zinc-500">Starts At</span>
                            <div class="text-3xl font-black text-cyan-400">${{ $product['price'] }}</div>
                        </div>
                    </div>

                    <div class="mt-10 space-y-4">
                        <a href="https://wa.me/3144888004?text={{ urlencode('Hi, I want to delete my car history from ' . $product['name'] . '. Please assist me with the $' . $product['price'] . ' service.') }}" 
                           target="_blank"
                           class="flex w-full items-center justify-center gap-3 rounded-2xl bg-emerald-500 px-8 py-4 text-base font-black text-zinc-950 transition-all hover:bg-emerald-400 active:scale-[0.98] shadow-xl shadow-emerald-500/20"
                        >
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L0 24l6.335-1.662c1.72.94 3.659 1.437 5.634 1.437h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                            </svg>
                            Delete Car History
                        </a>
                        <button class="w-full rounded-2xl border border-zinc-700 bg-zinc-800/50 px-8 py-4 text-sm font-bold text-white transition hover:bg-zinc-800 hover:border-zinc-600">
                            Download Sample Report
                        </button>
                    </div>

                    <div class="mt-8 border-t border-zinc-800 pt-8">
                        <div class="flex items-center gap-4">
                            <div class="flex -space-x-2">
                                <div class="h-8 w-8 rounded-full border-2 border-zinc-900 bg-zinc-800 flex items-center justify-center text-[10px] font-bold">JD</div>
                                <div class="h-8 w-8 rounded-full border-2 border-zinc-900 bg-zinc-800 flex items-center justify-center text-[10px] font-bold text-cyan-400">AJ</div>
                                <div class="h-8 w-8 rounded-full border-2 border-zinc-900 bg-zinc-800 flex items-center justify-center text-[10px] font-bold">MK</div>
                            </div>
                            <span class="text-xs text-zinc-500">Joined by 12,000+ happy car owners</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right: SEO Optimized Content -->
        <div class="lg:col-span-7">
            <div class="prose prose-invert prose-cyan max-w-none">
                <h2 class="text-3xl font-bold text-white mb-6">Mastering Vehicle Privacy: <span class="gradient-text">{{ $product['name'] }}</span> Removal Service</h2>
                
                <p class="text-lg leading-relaxed text-zinc-400 mb-10">
                    {{ $product['full_description'] }}
                </p>

                <h3 class="text-2xl font-bold text-white mb-4">Why Clean Your {{ $product['name'] }} History?</h3>
                <div class="grid gap-6 sm:grid-cols-2 mb-12">
                    <div class="rounded-2xl border border-zinc-800/50 bg-zinc-900/30 p-6">
                        <div class="mb-4 text-cyan-400">
                            <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        </div>
                        <h4 class="text-white font-bold mb-2">Maximum Privacy</h4>
                        <p class="text-sm text-zinc-500">Keep your vehicle purchase details, auction photos, and pricing strictly confidential.</p>
                    </div>
                    <div class="rounded-2xl border border-zinc-800/50 bg-zinc-900/30 p-6">
                        <div class="mb-4 text-purple-400">
                            <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                        </div>
                        <h4 class="text-white font-bold mb-2">Higher Resale Value</h4>
                        <p class="text-sm text-zinc-500">Prevent potential buyers from seeing salvage records or low auction prices from years ago.</p>
                    </div>
                </div>

                <h3 class="text-2xl font-bold text-white mb-4">How Our Process Works</h3>
                <ol class="space-y-8 mb-16">
                    <li class="flex gap-6">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-cyan-500/10 text-cyan-400 font-bold border border-cyan-500/20">1</div>
                        <div>
                            <h4 class="text-white font-bold text-lg">VIN Submission</h4>
                            <p class="text-zinc-500 mt-1">Send us your vehicle's VIN code via WhatsApp or our secure contact form.</p>
                        </div>
                    </li>
                    <li class="flex gap-6">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-cyan-500/10 text-cyan-400 font-bold border border-cyan-500/20">2</div>
                        <div>
                            <h4 class="text-white font-bold text-lg">Deep Analysis</h4>
                            <p class="text-zinc-500 mt-1">We scan {{ $product['name'] }} and 50+ other databases to find every mention of your car.</p>
                        </div>
                    </li>
                    <li class="flex gap-6">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-cyan-500/10 text-cyan-400 font-bold border border-cyan-500/20">3</div>
                        <div>
                            <h4 class="text-white font-bold text-lg">Permanent Deletion</h4>
                            <p class="text-zinc-500 mt-1">Our team removes logs, auction data, and photos. Usually takes 24-72 hours.</p>
                        </div>
                    </li>
                </ol>

                <div class="rounded-3xl bg-zinc-900 p-8 border border-zinc-800">
                    <h3 class="text-white font-bold mb-4">Frequently Asked Questions</h3>
                    <div class="space-y-6">
                        <div>
                            <h5 class="text-white font-semibold text-sm mb-1 uppercase tracking-wider text-cyan-400">Is this removal permanent?</h5>
                            <p class="text-zinc-500 text-sm italic">Yes. Once we remove the data from {{ $product['name'] }}, it is purged from their database and cannot be recovered by public users.</p>
                        </div>
                        <div>
                            <h5 class="text-white font-semibold text-sm mb-1 uppercase tracking-wider text-cyan-400">Will it also disappear from Google?</h5>
                            <p class="text-zinc-500 text-sm italic">After the site source is cleared, Google usually updates its index within a few days, removing the links and images from search results.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
