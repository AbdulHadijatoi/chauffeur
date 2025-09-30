{{-- Hero Section with Breadcrumb --}}
    <section class="relative bg-gradient-to-br from-gray-900 via-gray-800 to-black text-white px-4 mb-12">
        <div class="absolute inset-0 bg-black/50 z-10"></div>
        <div class="absolute inset-0 opacity-50" style="background-image: url('https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80'); background-size: cover; background-position: center;"></div>
        
        <div class="max-w-6xl container mx-auto relative z-10 py-8 md:py-16">
            {{-- Breadcrumb --}}
            <nav aria-label="Breadcrumb" class="mb-4">
                <ol class="flex items-center flex-wrap space-x-2 text-sm">
                    <li class="flex items-center">
                        <a href="{{ url('/') }}" class="text-gray-300 hover:text-white transition-colors duration-200">
                            Home
                        </a>
                    </li>

                    @php
                        $segments = request()->segments();
                        $url = '';
                    @endphp

                    @foreach($segments as $index => $segment)
                        @php
                            $url .= '/' . $segment;
                            $isLast = $index === count($segments) - 1;
                            $title = ucwords(str_replace(['-', '_'], ' ', $segment));
                        @endphp

                        <li class="flex items-center">
                            <svg class="w-4 h-4 mx-2 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>

                            @if($isLast)
                                <span class="text-white font-medium">
                                    {{ $title }}
                                </span>
                            @else
                                <a href="{{ url($url) }}" class="text-gray-300 hover:text-white transition-colors duration-200">
                                    {{ $title }}
                                </a>
                            @endif
                        </li>
                    @endforeach
                </ol>
            </nav>

            {{-- Page Heading --}}
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-3">
                Frequently Asked Questions
            </h1>
            
            <p class="text-gray-200 text-lg md:text-xl mb-2">
                Professional Chauffeur Hire Dubai
            </p>
            <p class="text-gray-300 text-sm md:text-base max-w-3xl">
                Find answers to common questions about our premium chauffeur services in Dubai and the surrounding Emirates.
            </p>
        </div>
    </section>