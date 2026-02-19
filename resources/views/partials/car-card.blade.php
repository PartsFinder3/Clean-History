<article class="group overflow-hidden rounded-2xl border border-zinc-800 bg-zinc-900/80 shadow-xl transition hover:border-cyan-500/30 hover:shadow-cyan-500/5">
    <a href="{{ route('cars.show', $car->slug) }}" class="block">
        <div class="relative aspect-[16/10] w-full overflow-hidden bg-zinc-800">
            @if($car->car_image_url)
                <img 
                    src="{{ $car->car_image_url }}" 
                    alt="VIN: {{ $car->vin }}" 
                    class="h-full w-full object-cover"
                    referrerpolicy="no-referrer"
                    onerror="this.src='https://via.placeholder.com/640x400?text=No+Image'"
                >
            @else
                <div class="flex h-full items-center justify-center text-zinc-500">
                    <div class="flex flex-col items-center gap-2">
                        <svg class="h-8 w-8 text-zinc-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span class="text-xs">No image</span>
                    </div>
                </div>
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-zinc-900/90 via-transparent to-transparent opacity-80"></div>
            <div class="absolute bottom-0 left-0 right-0 p-4">
                <h2 class="font-display text-lg font-semibold text-white md:text-xl">
                    {{ $car->car_name }}
                </h2>
                <p class="mt-1 text-sm text-cyan-400">VIN: {{ $car->vin }}</p>
            </div>
        </div>
        <div class="p-4">
            <div class="mb-3 grid grid-cols-2 gap-y-2 text-xs text-zinc-400">
                @if($car->mileage)
                    <div class="flex items-center gap-1">
                        <svg class="h-3 w-3 text-zinc-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        <span>{{ $car->mileage }}</span>
                    </div>
                @endif
                @if($car->location)
                    <div class="flex items-center gap-1">
                        <svg class="h-3 w-3 text-zinc-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>{{ $car->location }}</span>
                    </div>
                @endif
                @if($car->damage)
                    <div class="col-span-2 flex items-center gap-1">
                        <svg class="h-3 w-3 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        <span class="text-red-400">{{ $car->damage }}</span>
                    </div>
                @endif
            </div>
            <p class="line-clamp-2 text-sm text-zinc-400">{{ $car->description ?? '—' }}</p>
            <span class="mt-3 inline-block text-sm font-medium text-cyan-400 transition group-hover:text-cyan-300">
                View details →
            </span>
        </div>
    </a>
</article>
