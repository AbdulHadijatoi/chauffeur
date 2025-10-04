@extends('layouts.app')

@section('title', 'Home')

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

<!-- Main Content -->
<div class="max-w-6xl container mx-auto px-4 pb-12 mt-0">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Left Column - Main Content -->
        <div class="lg:col-span-2 space-y-6">

        <!-- Car Images Section -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <!-- Main Image -->
            <div class="relative">
            <img src="https://images.unsplash.com/photo-1603584173870-7f23fdae1b7a?w=800&h=500&fit=crop" alt="Blue Audi" class="w-full h-96 object-cover">
            <button class="absolute bottom-4 right-4 bg-white px-4 py-2 rounded-full text-sm font-medium shadow-lg flex items-center gap-2 hover:bg-gray-50 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                See All
            </button>
            </div>

            <!-- Thumbnail Gallery -->
            <div class="p-4 flex gap-3 overflow-x-auto">
            <img src="https://images.unsplash.com/photo-1603584173870-7f23fdae1b7a?w=150&h=100&fit=crop" class="thumbnail w-24 h-16 rounded-lg object-cover cursor-pointer border-2 border-red-500">
            <img src="https://images.unsplash.com/photo-1614162692292-7ac56d7f1ea8?w=150&h=100&fit=crop" class="thumbnail w-24 h-16 rounded-lg object-cover cursor-pointer border-2 border-transparent hover:border-gray-300">
            <img src="https://images.unsplash.com/photo-1617531653332-bd46c24f2068?w=150&h=100&fit=crop" class="thumbnail w-24 h-16 rounded-lg object-cover cursor-pointer border-2 border-transparent hover:border-gray-300">
            <img src="https://images.unsplash.com/photo-1609521263047-f8f205293f24?w=150&h=100&fit=crop" class="thumbnail w-24 h-16 rounded-lg object-cover cursor-pointer border-2 border-transparent hover:border-gray-300">
            </div>
        </div>

        <!-- Description Section -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-bold text-gray-900">Description</h2>
                <button class="toggle-btn text-gray-500 hover:text-gray-700 transition" data-target="#description-content">
                    <svg class="w-5 h-5 transition-transform duration-300 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                    </svg>
                </button>
            </div>
            <div id="description-content" class="collapse-content open">
                <p class="text-gray-600 leading-relaxed">
                Kicking off on April 1, 2025, the "DreamTour" will take Luna to major cities across North America and Europe, including Los Angeles, New York, Chicago, Toronto, and London. Each concert will showcase her unique blend of pop and ethereal soundscapes, bringing her music to life in a way you've never seen before.
                </p>
                <button class="text-red-500 font-medium mt-3 hover:text-red-600">Show More</button>
            </div>
        </div>

        <!-- Specification Section -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-bold text-gray-900">Specification</h2>
            <button class="text-gray-500 hover:text-gray-700">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                </svg>
            </button>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Specification Items -->
            <template x-for="(spec, index) in [
                {label: 'Transmission', value: 'Auto', icon: 'M13 10V3L4 14h7v7l9-11h-7z'},
                {label: 'Mileage', value: '24 KMS', icon: 'M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z'},
                {label: 'Steering', value: 'Auto', icon: 'M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4'},
                {label: 'Make', value: 'Audi', icon: 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z'},
                {label: 'Model Year', value: '2019', icon: 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z'},
                {label: 'Brake', value: 'ABS', icon: 'M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'},
                {label: 'Body', value: 'Sedan', icon: 'M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z'},
                {label: 'AC', value: 'Air Conditioned', icon: 'M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z'},
                {label: 'Engine (Hp)', value: '3,000', icon: 'M13 10V3L4 14h7v7l9-11h-7z'},
                {label: 'Fuel Type', value: 'Diesel', icon: 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z'},
                {label: 'Doors', value: '4', icon: 'M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z'},
                {label: 'Access', value: 'Remote', icon: 'M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z'}
            ]" :key="index">
            </template>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-bold text-gray-900">FAQ</h2>
            <button class="text-gray-500 hover:text-gray-700">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                </svg>
            </button>
            </div>

            <div class="space-y-4">
            <div class="border-b pb-4">
                <button class="w-full flex items-center justify-between text-left hover:text-red-500 transition">
                <span class="font-semibold text-gray-900">What documents do I need to rent a car?</span>
                <svg class="w-5 h-5 text-gray-400 flex-shrink-0 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
                </button>
            </div>

            <div class="border-b pb-4">
                <button class="w-full flex items-center justify-between text-left hover:text-red-500 transition">
                <span class="font-semibold text-gray-900">Is insurance included in the rental price?</span>
                <svg class="w-5 h-5 text-gray-400 flex-shrink-0 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
                </button>
            </div>

            <div class="border-b pb-4">
                <button class="w-full flex items-center justify-between text-left hover:text-red-500 transition">
                <span class="font-semibold text-gray-900">Can I add additional drivers?</span>
                <svg class="w-5 h-5 text-gray-400 flex-shrink-0 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
                </button>
            </div>

            <div class="pb-4">
                <button class="w-full flex items-center justify-between text-left hover:text-red-500 transition">
                <span class="font-semibold text-gray-900">What is your cancellation policy?</span>
                <svg class="w-5 h-5 text-gray-400 flex-shrink-0 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
                </button>
            </div>
            </div>
        </div>
        </div>

        <!-- Right Column - Sidebar -->
        <div class="space-y-6">
            
            <!-- Why Book With Us -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-xl font-bold text-gray-900 mb-6">Why Book With Us</h2>
                
                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <div class="p-2 bg-blue-50 rounded-lg flex-shrink-0">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">Expertise and Experience</h3>
                            <p class="text-sm text-gray-600">Years of industry knowledge at your service</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <div class="p-2 bg-blue-50 rounded-lg flex-shrink-0">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">Tailored Services</h3>
                            <p class="text-sm text-gray-600">Customized solutions for your needs</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <div class="p-2 bg-blue-50 rounded-lg flex-shrink-0">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">Comprehensive Planning</h3>
                            <p class="text-sm text-gray-600">Every detail carefully organized</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <div class="p-2 bg-blue-50 rounded-lg flex-shrink-0">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">Client Satisfaction</h3>
                            <p class="text-sm text-gray-600">Your happiness is our priority</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <div class="p-2 bg-blue-50 rounded-lg flex-shrink-0">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">24/7 Support</h3>
                            <p class="text-sm text-gray-600">Always here when you need us</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Us for more details -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-xl font-bold text-gray-900 mb-6">Contact Us for more details</h2>
                
                <div class="flex items-start gap-3 mb-6">
                    <img src="https://ui-avatars.com/api/?name=Adrian+Henriques&background=ef4444&color=fff" alt="Adrian Henriques" class="w-12 h-12 rounded-full flex-shrink-0">
                    <div>
                        <h3 class="font-semibold text-gray-900">Adrian Henriques</h3>
                        <p class="text-sm text-gray-500">Member Since • 14 May 2024</p>
                    </div>
                </div>

                <div class="space-y-3">
                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                        <div class="p-2 bg-red-100 rounded-lg flex-shrink-0">
                            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <span class="text-gray-700 text-sm">+1 12345 45548</span>
                    </div>

                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                        <div class="p-2 bg-red-100 rounded-lg flex-shrink-0">
                            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <span class="text-gray-700 text-sm">Info@example.com</span>
                    </div>

                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                        <div class="p-2 bg-red-100 rounded-lg flex-shrink-0">
                            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <span class="text-gray-700 text-sm">4635 Pheasant Ridge Road, USA</span>
                    </div>
                </div>

                <div class="flex gap-3 mt-6">
                    <button class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-3 px-4 rounded-lg flex items-center justify-center gap-2 transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"></path>
                        </svg>
                        Whatsapp
                    </button>
                    <button class="flex-1 bg-red-500 hover:bg-red-600 text-white font-medium py-3 px-4 rounded-lg flex items-center justify-center gap-2 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                        Chat Now
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    document.querySelectorAll('.toggle-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        const targetSelector = btn.getAttribute('data-target');
        const content = document.querySelector(targetSelector);
        const icon = btn.querySelector('svg');

        if (!content) return;

        // Toggle open/close animation
        content.classList.toggle('open');

        // Rotate the arrow
        icon.classList.toggle('rotate-180');
      });
    });
  </script>
@endsection
