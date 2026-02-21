<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    {{-- ===== SEO: Title & Description ===== --}}
    <title>@yield('title', 'Car History Clean – Professional VIN History Check & Removal Services')</title>
    <meta name="description" content="@yield('description', 'Professional car history removal services. Clean title, verified VIN, transparent process. Trusted by dealers & car owners worldwide.')">
    <meta name="google-site-verification" content="google8695422c1bbb2c54" />
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    
    {{-- ===== SEO: Canonical URL ===== --}}
    <link rel="canonical" href="@yield('canonical', url()->current())">
    
    {{-- ===== SEO: Open Graph Meta Tags ===== --}}
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:title" content="@yield('title', 'Car History Clean – Professional VIN History Check & Removal Services')">
    <meta property="og:description" content="@yield('description', 'Professional car history removal services. Clean title, verified VIN, transparent process.')">
    <meta property="og:url" content="@yield('canonical', url()->current())">
    <meta property="og:site_name" content="Car History Clean">
    <meta property="og:locale" content="en_US">
    <meta property="og:image" content="@yield('og_image')">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    
    {{-- ===== SEO: Twitter Card Meta Tags ===== --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'Car History Clean – Professional VIN History Check & Removal Services')">
    <meta name="twitter:description" content="@yield('description', 'Professional car history removal services. Clean title, verified VIN, transparent process.')">
    <meta name="twitter:image" content="@yield('og_image')">
    
    {{-- ===== SEO: Favicon ===== --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon.ico') }}">
    
    {{-- ===== SEO: JSON-LD Structured Data ===== --}}
    @yield('schema')
    
    {{-- ===== SEO: Organization Schema (Global – every page) ===== --}}
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@type": "Organization",
        "name": "Car History Clean",
        "url": "{{ url('/') }}",
        "logo": "{{ asset('favicon.ico') }}",
        "description": "Professional car history removal services. Clean title, verified VIN, transparent process.",
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+1-314-488-8004",
            "contactType": "customer service",
            "availableLanguage": ["English"]
        },
        "sameAs": []
    }
    </script>
    
    {{-- ===== Google Fonts ===== --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    {{-- ===== Tailwind CSS CDN ===== --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        background: '#0a0a0b',
                        foreground: '#fafafa',
                        muted: '#71717a',
                        accent: '#22d3ee',
                        'accent-hover': '#06b6d4',
                        card: '#18181b',
                        'card-border': '#27272a',
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        display: ['Outfit', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    
    <style>
        :root {
            --background: #0a0a0b;
            --foreground: #fafafa;
            --muted: #71717a;
            --accent: #22d3ee;
            --accent-hover: #06b6d4;
            --card: #18181b;
            --card-border: #27272a;
        }

        body {
            background-color: var(--background);
            color: var(--foreground);
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .glass-card {
            background: rgba(24, 24, 27, 0.8);
            border: 1px solid var(--card-border);
            backdrop-filter: blur(12px);
        }

        .gradient-text {
            background: linear-gradient(135deg, #22d3ee 0%, #a78bfa 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #27272a;
            border-radius: 10px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #3f3f46;
        }
    </style>
    @yield('head')
</head>
<body class="min-h-screen antialiased">
    @include('partials.header')
    
    <main class="min-h-[calc(100vh-8rem)]">
        @yield('content')
    </main>
    
    @include('partials.footer')
    
    @yield('scripts')
</body>
</html>
