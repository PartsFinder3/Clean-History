@extends('layouts.app')

@section('title', 'Contact Us | Get Your Car History Clean - Customer Support')
@section('description', 'Get in touch for professional car history clean services. Contact us today for VIN check reports, mileage fraud detection, and vehicle title inquiries.')
@section('canonical', route('contact'))

@section('schema')
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@type": "ContactPage",
    "name": "Contact Car History Clean",
    "url": "{{ route('contact') }}",
    "description": "Get in touch for professional car history clean services.",
    "mainEntity": {
        "@type": "Organization",
        "name": "Car History Clean",
        "telephone": "+1-314-488-8004",
        "email": "mateenali1122@gmail.com",
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+1-314-488-8004",
            "contactType": "customer service",
            "availableLanguage": ["English"],
            "areaServed": ["US", "DE", "PL", "AU"]
        }
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
            "name": "Contact Us",
            "item": "{{ route('contact') }}"
        }
    ]
}
</script>
@endsection

@section('content')
<div class="mx-auto max-w-6xl px-4 py-12 md:px-8 md:py-16">
    <header class="mb-10">
        <h1 class="font-display text-3xl font-bold text-white md:text-4xl">
            Contact Us
        </h1>
        <p class="mt-2 text-zinc-400">
            Have a question or need a quote? Send us a message.
        </p>
    </header>

    <div class="grid gap-12 lg:grid-cols-2">
        <section>
            <h2 class="font-display text-lg font-semibold text-white">
                Get in touch
            </h2>
            <p class="mt-2 text-sm text-zinc-400">
                Fill out the form and we'll get back to you as soon as
                possible.
            </p>
        </section>
        
        <form class="space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium text-zinc-400">Name</label>
                <input id="name" name="name" type="text" required class="mt-1 w-full rounded-xl border border-zinc-700 bg-zinc-900/80 px-4 py-3 text-white placeholder-zinc-500 focus:border-cyan-500 focus:outline-none focus:ring-1 focus:ring-cyan-500" placeholder="Your name">
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-zinc-400">Email</label>
                <input id="email" name="email" type="email" required class="mt-1 w-full rounded-xl border border-zinc-700 bg-zinc-900/80 px-4 py-3 text-white placeholder-zinc-500 focus:border-cyan-500 focus:outline-none focus:ring-1 focus:ring-cyan-500" placeholder="you@example.com">
            </div>
            <div>
                <label for="message" class="block text-sm font-medium text-zinc-400">Message</label>
                <textarea id="message" name="message" rows="4" required class="mt-1 w-full rounded-xl border border-zinc-700 bg-zinc-900/80 px-4 py-3 text-white placeholder-zinc-500 focus:border-cyan-500 focus:outline-none focus:ring-1 focus:ring-cyan-500" placeholder="Your message or VIN inquiry..."></textarea>
            </div>
            <button type="button" onclick="alert('Inquiry received! We will contact you soon.')" class="inline-flex min-h-[44px] items-center justify-center rounded-xl bg-cyan-500 px-6 py-3 text-sm font-semibold text-zinc-950 transition hover:bg-cyan-400 active:bg-cyan-600 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 focus:ring-offset-zinc-950">
                Send message
            </button>
        </form>
    </div>
</div>
@endsection
