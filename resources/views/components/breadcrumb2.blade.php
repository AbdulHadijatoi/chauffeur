<section class="relative bg-black text-white px-4 mb-12">
    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/60 z-10"></div>
    <!-- Background Image -->
    <div class="absolute inset-0" style="background-image: url('https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80'); background-size: cover; background-position: center;"></div>
    
    @php
        $segments = request()->segments();
        $lastSegment = end($segments);
        $heading = $lastSegment ? ucwords(str_replace(['-', '_'], ' ', $lastSegment)) : 'Home';
    @endphp

    <div class="max-w-6xl container mx-auto relative z-10 py-10 md:py-14 flex flex-col justify-center items-center text-center">
        <!-- Dynamic Heading from last segment -->
        <h1 class="text-3xl md:text-4xl lg:text-5xl font-semibold mb-4 uppercase">
            {{ $heading }}
        </h1>

        <!-- Breadcrumb -->
        <nav aria-label="Breadcrumb">
            <ol class="flex items-center flex-wrap justify-center space-x-2 text-sm">
                <li class="flex items-center">
                    <a href="{{ url('/') }}" class="text-gray-300 hover:text-white transition-colors duration-200">
                        Home
                    </a>
                </li>

                @php $url = ''; @endphp

                @foreach($segments as $index => $segment)
                    @php
                        $url .= '/' . $segment;
                        $isLast = $index === count($segments) - 1;
                        $title = ucwords(str_replace(['-', '_'], ' ', $segment));
                    @endphp

                    <li class="flex items-center">
                        <svg class="w-4 h-4 mx-1 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>

                        @if($isLast)
                            <span class="text-white font-medium">{{ $title }}</span>
                        @else
                            <a href="{{ url($url) }}" class="text-gray-300 hover:text-white transition-colors duration-200">
                                {{ $title }}
                            </a>
                        @endif
                    </li>
                @endforeach
            </ol>
        </nav>
    </div>
</section>
