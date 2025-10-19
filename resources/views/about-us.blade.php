@extends('layouts.app')

@section('title', $title)

@section('content')

<section class="relative bg-gradient-to-br from-gray-900 via-gray-800 to-black text-white px-4 mb-12">
    <div class="absolute inset-0 bg-black/50 z-10"></div>
    <div class="absolute inset-0 opacity-50" style="background-image: url('https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80'); background-size: cover; background-position: center;"></div>
    
    <div class="max-w-6xl container mx-auto relative z-10 py-8 md:py-5">
        {{-- Breadcrumb --}}
        <nav aria-label="Breadcrumb" class="mb-4">
            <ol class="flex items-center flex-wrap text-sm">
                <li class="flex items-center">
                    <a href="{{ url('/') }}" class="text-gray-300 hover:text-white transition-colors duration-200 flex items-center">
                        <i class="fas fa-home"></i>
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
            About Us
        </h1>
    </div>
</section>

<div class="max-w-6xl mx-auto px-4 pb-12">
    <!-- Company Introduction -->
    <section class="container mx-auto px-4 py-16 lg:py-20">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-4xl font-bold text-gray-900 mb-6">Your Trusted Partner in Luxury Transportation</h2>
                    <p class="text-gray-600 leading-relaxed mb-4">
                        Welcome to Dubai's premier chauffeur service. We specialize in providing exceptional transportation experiences that combine luxury, comfort, and professionalism. With years of expertise in the industry, we have established ourselves as the go-to choice for discerning clients who demand nothing but the best.
                    </p>
                    <p class="text-gray-600 leading-relaxed mb-4">
                        Our commitment to excellence drives everything we do. From our meticulously maintained fleet of luxury vehicles to our professionally trained chauffeurs, every aspect of our service is designed to exceed your expectations.
                    </p>
                    <p class="text-gray-600 leading-relaxed">
                        Whether you need airport transfers, corporate transportation, or special event services, we ensure every journey is smooth, comfortable, and memorable.
                    </p>
                </div>
                <div class="relative">
                    <div class="bg-gradient-to-br from-amber-500 to-amber-600 rounded-lg p-8 shadow-2xl transform hover:scale-105 transition duration-300">
                        <i class="fas fa-car-side text-white text-8xl mb-4 opacity-20"></i>
                        <div class="space-y-4">
                            <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-lg p-4">
                                <h3 class="text-white font-bold text-2xl mb-2">10+ Years</h3>
                                <p class="text-white text-sm">Of Excellence</p>
                            </div>
                            <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-lg p-4">
                                <h3 class="text-white font-bold text-2xl mb-2">50+ Vehicles</h3>
                                <p class="text-white text-sm">Luxury Fleet</p>
                            </div>
                            <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-lg p-4">
                                <h3 class="text-white font-bold text-2xl mb-2">10,000+</h3>
                                <p class="text-white text-sm">Satisfied Clients</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision -->
    <section class="bg-gray-50 py-16 lg:py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-white rounded-lg p-8 shadow-lg">
                        <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mb-6">
                            <i class="fas fa-bullseye text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Our Mission</h3>
                        <p class="text-gray-600 leading-relaxed">
                            To provide unparalleled luxury transportation services that redefine comfort and elegance in Dubai. We strive to deliver exceptional experiences through our commitment to safety, punctuality, and customer satisfaction, making every journey memorable for our valued clients.
                        </p>
                    </div>
                    <div class="bg-white rounded-lg p-8 shadow-lg">
                        <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mb-6">
                            <i class="fas fa-eye text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Our Vision</h3>
                        <p class="text-gray-600 leading-relaxed">
                            To be recognized as the leading luxury chauffeur service in the UAE, setting industry standards for excellence, innovation, and customer care. We envision a future where our brand becomes synonymous with sophistication, reliability, and world-class service.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="container mx-auto px-4 py-16 lg:py-20">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Why Choose Us</h2>
                <p class="text-gray-600 text-lg">Experience the difference with our premium chauffeur services</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="text-center p-6 hover:bg-gray-50 rounded-lg transition duration-300">
                    <div class="w-20 h-20 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-shield-alt text-amber-600 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Safety First</h3>
                    <p class="text-gray-600">All our vehicles undergo regular maintenance and safety checks. Our chauffeurs are trained professionals with excellent safety records.</p>
                </div>
                <div class="text-center p-6 hover:bg-gray-50 rounded-lg transition duration-300">
                    <div class="w-20 h-20 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-clock text-amber-600 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Always On Time</h3>
                    <p class="text-gray-600">Punctuality is our priority. We track your flight arrivals and ensure timely pickups for all your transportation needs.</p>
                </div>
                <div class="text-center p-6 hover:bg-gray-50 rounded-lg transition duration-300">
                    <div class="w-20 h-20 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-gem text-amber-600 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Luxury Fleet</h3>
                    <p class="text-gray-600">Choose from our extensive collection of premium vehicles including Mercedes-Benz, BMW, and Rolls-Royce models.</p>
                </div>
                <div class="text-center p-6 hover:bg-gray-50 rounded-lg transition duration-300">
                    <div class="w-20 h-20 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user-tie text-amber-600 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Professional Chauffeurs</h3>
                    <p class="text-gray-600">Our chauffeurs are expertly trained, licensed, and committed to providing discreet and courteous service.</p>
                </div>
                <div class="text-center p-6 hover:bg-gray-50 rounded-lg transition duration-300">
                    <div class="w-20 h-20 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-headset text-amber-600 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">24/7 Support</h3>
                    <p class="text-gray-600">Our customer service team is available round the clock to assist you with bookings and queries.</p>
                </div>
                <div class="text-center p-6 hover:bg-gray-50 rounded-lg transition duration-300">
                    <div class="w-20 h-20 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-tags text-amber-600 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Competitive Pricing</h3>
                    <p class="text-gray-600">Transparent pricing with no hidden fees. Get premium service at competitive rates throughout Dubai and the UAE.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Values -->
    <section class="bg-gradient-to-r from-gray-900 to-gray-800 text-white py-16 lg:py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold mb-4">Our Core Values</h2>
                    <p class="text-gray-300 text-lg">The principles that guide our service excellence</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-lg p-6 text-center">
                        <i class="fas fa-star text-amber-400 text-4xl mb-4"></i>
                        <h3 class="text-xl font-bold mb-2">Excellence</h3>
                        <p class="text-gray-300 text-sm">Commitment to the highest standards in every service</p>
                    </div>
                    <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-lg p-6 text-center">
                        <i class="fas fa-handshake text-amber-400 text-4xl mb-4"></i>
                        <h3 class="text-xl font-bold mb-2">Integrity</h3>
                        <p class="text-gray-300 text-sm">Honest and transparent in all our dealings</p>
                    </div>
                    <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-lg p-6 text-center">
                        <i class="fas fa-heart text-amber-400 text-4xl mb-4"></i>
                        <h3 class="text-xl font-bold mb-2">Customer Focus</h3>
                        <p class="text-gray-300 text-sm">Your satisfaction is our ultimate goal</p>
                    </div>
                    <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-lg p-6 text-center">
                        <i class="fas fa-lightbulb text-amber-400 text-4xl mb-4"></i>
                        <h3 class="text-xl font-bold mb-2">Innovation</h3>
                        <p class="text-gray-300 text-sm">Continuously improving our services</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-primary py-16 mt-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold text-white mb-4">Ready to Experience Luxury?</h2>
            <p class="text-white text-lg mb-8">Book your premium chauffeur service today and travel in style</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="tel:{{get_setting('contact_phone')}}" class="bg-white text-amber-600 px-8 py-4 rounded-lg font-bold text-lg hover:bg-gray-100 transition duration-300 shadow-lg">
                    <i class="fas fa-phone mr-2"></i>Call Us Now
                </a>
                <a href="{{ route('listing',1) }}" class="bg-gray-900 text-white px-8 py-4 rounded-lg font-bold text-lg hover:bg-gray-800 transition duration-300 shadow-lg">
                    <i class="fas fa-calendar-check mr-2"></i>Book Online
                </a>
            </div>
        </div>
    </section>
</div>

@endsection