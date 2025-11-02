@extends('layouts.app')

@section('title', 'Home')

@section('content')


    <!-- <div class="max-w-6xl container mx-auto relative z-20 py-6 md:py-6 px-6">
    {{-- Breadcrumb --}}
        <nav aria-label="Breadcrumb">
            <ol class="flex items-center space-x-2 text-sm font-light text-gray-300">
                <li class="flex items-center">
                    <a href="{{ url('/') }}" class="hover:text-white transition-colors duration-300 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
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
                        <svg class="w-4 h-4 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>

                        @if($isLast)
                            <span class="text-white font-medium">
                                {{ $title }}
                            </span>
                        @else
                            <a href="{{ url($url) }}" class="hover:text-white transition-colors duration-300">
                                {{ $title }}
                            </a>
                        @endif
                    </li>
                @endforeach
            </ol>
        </nav>        
    </div> -->
<div class="w-full bg-white">
    <div class="w-full max-w-6xl mx-auto p-6">
        <!-- Top Row -->
        <div class="flex items-start justify-between mb-6">
            <div class="flex-1">
                <div class="flex items-center gap-3 mb-4">
                    <h1 class="text-3xl font-bold">{{$service->name}}</h1>
                    <!-- <div class="flex items-center gap-1 bg-yellow-100 px-3 py-1 rounded">
                        <span class="text-lg font-bold text-yellow-700">4.5</span>
                        <span class="text-xs text-gray-600">(500 Reviews)</span>
                    </div> -->
                </div>
                
                <!-- Details Row -->
                <div class="flex items-center gap-6 text-sm text-gray-700 flex-wrap">
                    <div class="flex items-center gap-2 bg-gray-50 px-3 py-1.5 rounded-lg">
                        <i class="fas fa-car text-primary text-xs"></i>
                        <span class="text-xs font-medium text-gray-700">{{ $service->vehicle->name }}</span>
                    </div>
                    <div class="flex items-center gap-2 bg-gray-50 px-3 py-1.5 rounded-lg">
                        <i class="fas fa-users text-primary text-xs"></i>
                        <span class="text-xs font-medium text-gray-700">{{ $service->vehicle->passengers }} Passengers</span>
                    </div>
                    <div class="flex items-center gap-2 bg-gray-50 px-3 py-1.5 rounded-lg">
                        <i class="fas fa-suitcase text-primary text-xs"></i>
                        <span class="text-xs font-medium text-gray-700">{{ $service->vehicle->luggage }} Luggage</span>
                    </div>
                </div>
                <div class="flex items-center gap-6 text-sm text-gray-700 flex-wrap mt-4">
                    <div class="flex items-center gap-2">
                        <div class="w-7 h-7 feature-icon rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-check-circle text-primary text-xs"></i>
                        </div>
                        <span class="text-gray-700 text-sm">All Inclusive Pricing</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-7 h-7 feature-icon rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-user-tie text-primary text-xs"></i>
                        </div>
                        <span class="text-gray-700 text-sm">Professional Chauffeur</span>
                    </div>
                </div>
            </div>
            
            <!-- Right Side - Price and Save -->
            <div class="text-right">
                <!-- <div class="flex items-center gap-2 justify-end">
                    <button class="flex items-center py-2 px-4 border hover:bg-red-50 rounded-full transition">
                        <svg class="w-4 h-4 text-red-500 fill-current" viewBox="0 0 24 24">
                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                        </svg>
                        <span class="text-sm text-gray-600 hover:text-red-600 cursor-pointer ml-1">Save</span>
                    </button>
                </div> -->
               <div class="">
                    <div class="text-xl md:text-2xl font-bold primary_text_color">AED {{$service->serviceType?intval($service->serviceType->price):0}}</div>
                    <div class="text-xs text-gray-600 font-medium">{{$service->serviceType?$service->serviceType->hour_duration:''}}-Hour Service</div>
                </div>
                <div class="">
                    <div class="text-lg font-bold primary_text_color">AED {{$service->serviceType?intval($service->serviceType->additional_price):0}}</div>
                    <div class="text-xs text-gray-600 font-medium">Additional Hour</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="max-w-6xl container mx-auto px-4 pb-12 mt-10">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Left Column - Main Content -->
        <div class="lg:col-span-2 space-y-6">

        <!-- Car Images Section -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <!-- Main Image -->
            <div class="relative">
            <img id="main-image" src="{{ $service->vehicle->images[0]->image_url }}" alt="Blue Audi" class="w-full h-96 object-cover transition-opacity duration-200">
            <button id="see-all-btn" type="button" class="absolute bottom-4 right-4 bg-white px-4 py-2 rounded-full text-sm font-medium shadow-lg flex items-center gap-2 hover:bg-gray-50 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                See All
            </button>
            </div>

            <!-- Thumbnail Gallery -->
            <div class="p-4 flex gap-3 overflow-x-auto">
                @foreach($service->vehicle->images as $image)
                    <img src="{{ $image->image_url }}" data-large="{{ $image->image_url }}" class="thumbnail w-24 h-16 rounded-lg object-cover cursor-pointer border-2 border-yellow-500">
                @endforeach
            </div>

            <!-- Image Modal / Lightbox -->
            <div id="image-modal" class="fixed inset-0 z-50 hidden bg-black/80 flex items-center justify-center" role="dialog" aria-modal="true" aria-hidden="true">
                <button id="modal-close" class="absolute top-6 right-6 text-white bg-black/30 hover:bg-black/50 p-2 rounded-full" aria-label="Close image viewer">✕</button>
                <button id="modal-prev" class="absolute left-6 top-1/2 -translate-y-1/2 text-white bg-black/30 hover:bg-black/50 p-3 rounded-full" aria-label="Previous image">◀</button>
                <div class="max-w-5xl max-h-[80vh] mx-6 flex items-center justify-center">
                    <img id="modal-image" src="" alt="" class="max-w-full max-h-[80vh] object-contain transition-opacity duration-200">
                </div>
                <button id="modal-next" class="absolute right-6 top-1/2 -translate-y-1/2 text-white bg-black/30 hover:bg-black/50 p-3 rounded-full" aria-label="Next image">▶</button>
            </div>
        </div>

        <!-- Description Section -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-bold text-gray-900">Description</h2>
                <button class="toggle-btn text-gray-500 hover:text-gray-700 transition" data-target="#description-content" aria-expanded="true" aria-controls="description-content">
                    <svg class="toggle-icon w-5 h-5 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                    </svg>
                </button>
            </div>
            <div id="description-content" class="collapse-content open" role="region">
                <div id="description-text" class="text-gray-600 leading-relaxed clamped">
                    {{$service->vehicle->description}}
                </div>
                <button class="show-more-btn text-red-500 font-medium mt-3 hover:text-red-600" data-target="#description-text" aria-expanded="false">Show More</button>
            </div>
        </div>

        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-sm p-8">
        <!-- About this activity -->
        <h2 class="text-2xl font-bold text-gray-900 mb-6">About this activity</h2>
            <div class="space-y-5 mb-12">
                <!-- Free cancellation -->
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0">
                        <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-base font-semibold text-gray-900 mb-1">Free cancellation</h3>
                        <p class="text-sm text-gray-600">Cancel up to 24 hours in advance for a full refund</p>
                    </div>
                </div>

                <!-- Reserve now & pay later -->
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0">
                        <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-base font-semibold text-gray-900 mb-1">Reserve now & pay later</h3>
                        <p class="text-sm text-gray-600">Keep your travel plans flexible — book your spot and pay nothing today.</p>
                    </div>
                </div>

                <!-- Duration -->
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0">
                        <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-base font-semibold text-gray-900 mb-1">Duration 10 hours</h3>
                        <p class="text-sm text-gray-600">Check availability to see starting times</p>
                    </div>
                </div>

                <!-- Driver -->
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0">
                        <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-base font-semibold text-gray-900 mb-1">Driver</h3>
                        <p class="text-sm text-gray-600">English</p>
                    </div>
                </div>

                <!-- Pickup included -->
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0">
                        <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-base font-semibold text-gray-900 mb-1">Pickup included</h3>
                        <p class="text-sm text-gray-600">Meet your driver at your hotel in Dubai.</p>
                    </div>
                </div>

                <!-- Private group -->
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0">
                        <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-base font-semibold text-gray-900">Private group</h3>
                    </div>
                </div>
            </div>

            <!-- Highlighted reviews -->
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Highlighted reviews from other travelers</h2>
            
            <div class="grid md:grid-cols-2 gap-6 mb-6" id="reviews-container">
                @foreach ($service->reviews->take(2) as $index => $review)
                    <div class="border border-gray-200 rounded-lg p-6 review-item">
                        {{-- ⭐ Rating --}}
                        <div class="flex items-center gap-1 mb-3">
                            @for ($i = 1; $i <= 5; $i++)
                                <span class="{{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300' }}">★</span>
                            @endfor
                            <span class="ml-1 text-sm font-semibold text-gray-900">{{ $review->rating }}</span>
                        </div>

                        {{-- 👤 User Info --}}
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 rounded-full flex items-center justify-center text-white font-bold
                                {{ ['bg-red-500','bg-blue-500','bg-green-500','bg-yellow-500','bg-purple-500'][rand(0,4)] }}">
                                {{ strtoupper(substr($review->user_name ?? 'U', 0, 1)) }}
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-900">
                                    {{ $review->user_name ?? 'Anonymous User' }}
                                </p>
                                <p class="text-xs text-gray-500">
                                    {{ $review->created_at->format('F d, Y') }} – Verified booking
                                </p>
                            </div>
                        </div>

                        {{-- 💬 Comment --}}
                        <div class="review-comment-container" data-review-id="{{ $review->id }}" data-full-text="{{ $review->comment }}">
                            <p class="review-comment text-sm text-gray-700 leading-relaxed mb-2" id="review-text-{{ $review->id }}">
                                @if (strlen($review->comment) > 220)
                                    <span class="review-text-short">{{ Str::limit($review->comment, 220, '') }}</span><span class="review-ellipsis">...</span>
                                    <span class="review-text-full hidden">{{ $review->comment }}</span>
                                @else
                                    {{ $review->comment }}
                                @endif
                            </p>
                            @if (strlen($review->comment) > 220)
                                <button class="review-read-toggle text-sm font-semibold text-gray-900 underline hover:text-gray-700" data-review-id="{{ $review->id }}">Read more</button>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            @if ($service->reviews->count() > 2)
            <div class="text-right mb-12">
                <button id="see-more-reviews-btn" class="text-sm font-semibold text-gray-900 underline hover:text-gray-700">See more reviews</button>
            </div>
            @endif

            <!-- Highlights -->
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Highlights</h2>
            <ul class="space-y-2 mb-12">
                <li class="flex items-start gap-3">
                    <span class="text-gray-700">•</span>
                    <span class="text-sm text-gray-700">Explore Dubai in luxury with a private car and driver</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-gray-700">•</span>
                    <span class="text-sm text-gray-700">Escape the hassle of taxis or public transportation</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-gray-700">•</span>
                    <span class="text-sm text-gray-700">Ride comfortably in your air-conditioned vehicle</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-gray-700">•</span>
                    <span class="text-sm text-gray-700">Choose the places you'd like to visit in Dubai</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-gray-700">•</span>
                    <span class="text-sm text-gray-700">Enjoy convenient hotel pickup and drop-off</span>
                </li>
            </ul>

            
            <div class="border-t border-gray-200 mb-6"></div>

            <!-- Includes -->
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Includes</h2>
            <ul class="space-y-3">
                <li class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span class="text-sm text-gray-700">Hotel pickup and drop-off</span>
                </li>
                <li class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span class="text-sm text-gray-700">Private transportation</span>
                </li>
                <li class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span class="text-sm text-gray-700">Driver</span>
                </li>
                <li class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span class="text-sm text-gray-700">Air-conditioned vehicle</span>
                </li>
                <li class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span class="text-sm text-gray-700">Bottled water</span>
                </li>
                <li class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                    <span class="text-sm text-gray-700">Guide</span>
                </li>
            </ul>
        </div>

        <!-- FAQ Section -->
            <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-bold text-gray-900">FAQ</h2>
            <button class="toggle-btn text-gray-500 hover:text-gray-700" data-target="#faq-content" aria-expanded="true" aria-controls="faq-content">
                <svg class="toggle-icon w-5 h-5 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                </svg>
            </button>
            </div>

            <div id="faq-content" class="space-y-4 collapse-content open" role="region">
            <div class="border-b pb-4">
                <button class="faq-item w-full flex items-center justify-between text-left hover:text-red-500 transition" data-target="#faq1" aria-expanded="false" aria-controls="faq1">
                <span class="font-semibold text-gray-900">What documents do I need to rent a car?</span>
                <svg class="w-5 h-5 text-gray-400 flex-shrink-0 ml-2 toggle-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
                </button>
                <div id="faq1" class="mt-3 text-gray-600 hidden" role="region">You need a valid driving license, ID/passport, and a credit card for security deposit.</div>
            </div>

            <div class="border-b pb-4">
                <button class="faq-item w-full flex items-center justify-between text-left hover:text-red-500 transition" data-target="#faq2" aria-expanded="false" aria-controls="faq2">
                <span class="font-semibold text-gray-900">Is insurance included in the rental price?</span>
                <svg class="w-5 h-5 text-gray-400 flex-shrink-0 ml-2 toggle-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
                </button>
                <div id="faq2" class="mt-3 text-gray-600 hidden" role="region">Basic insurance is included. Additional coverage is available at a supplementary cost.</div>
            </div>

            <div class="border-b pb-4">
                <button class="faq-item w-full flex items-center justify-between text-left hover:text-red-500 transition" data-target="#faq3" aria-expanded="false" aria-controls="faq3">
                <span class="font-semibold text-gray-900">Can I add additional drivers?</span>
                <svg class="w-5 h-5 text-gray-400 flex-shrink-0 ml-2 toggle-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
                </button>
                <div id="faq3" class="mt-3 text-gray-600 hidden" role="region">Yes, additional drivers can be added if they meet our licensing and age requirements.</div>
            </div>

            <div class="pb-4">
                <button class="faq-item w-full flex items-center justify-between text-left hover:text-red-500 transition" data-target="#faq4" aria-expanded="false" aria-controls="faq4">
                <span class="font-semibold text-gray-900">What is your cancellation policy?</span>
                <svg class="w-5 h-5 text-gray-400 flex-shrink-0 ml-2 toggle-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
                </button>
                <div id="faq4" class="mt-3 text-gray-600 hidden" role="region">Cancellations made 48 hours before pickup are fully refundable. Later cancellations may incur fees.</div>
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
                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                
                <!-- <div class="flex items-start gap-3 mb-6">
                    <img src="https://ui-avatars.com/api/?name=Adrian+Henriques&background=C7A240&color=fff" alt="Adrian Henriques" class="w-12 h-12 rounded-full flex-shrink-0">
                    <div>
                        <h3 class="font-semibold text-gray-900">Adrian Henriques</h3>
                        <p class="text-sm text-gray-500">Member Since • 14 May 2024</p>
                    </div>
                </div> -->

                <div class="space-y-3">
                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                        <div class="p-2 bg-orange-100 rounded-lg flex-shrink-0">
                            <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <span class="text-gray-700 text-sm">{{get_setting('contact_phone')}}</span>
                    </div>

                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                        <div class="p-2 bg-orange-100 rounded-lg flex-shrink-0">
                            <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <span class="text-gray-700 text-sm">{{get_setting('contact_email')}}</span>
                    </div>

                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                        <div class="p-2 bg-orange-100 rounded-lg flex-shrink-0">
                            <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <span class="text-gray-700 text-sm">{{get_setting('address')}}</span>
                    </div>
                </div>

                <div class="flex gap-3 mt-6">
                    <a href="https://wa.me/{{ preg_replace('/\D/', '',trim(get_setting('contact_phone'))) }}" target="_blank" class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-3 px-4 rounded-lg flex items-center justify-center gap-2 transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"></path>
                        </svg>
                        Whatsapp
                    </a>
                    <!-- <button class="flex-1 bg-primary text-white font-medium py-3 px-4 rounded-lg flex items-center justify-center gap-2 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                        Chat Now
                    </button> -->
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Reviews Modal -->
<div id="reviews-modal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex hidden items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-hidden flex flex-col animate-fadeIn">
        <!-- Header -->
        <div class="border-b px-8 py-4 flex justify-between items-center">
            <div>
                <h3 class="text-2xl font-bold mb-1">All Reviews</h3>
                <p class="text-sm text-gray-600">{{ $service->reviews->count() }} review{{ $service->reviews->count() !== 1 ? 's' : '' }}</p>
            </div>
            <button id="close-reviews-modal" class="hover:bg-gray-100 p-2 rounded-lg transition-all">
                <i class="fas fa-times text-xl text-gray-600"></i>
            </button>
        </div>
        
        <!-- Reviews Content -->
        <div class="overflow-y-auto flex-1 px-8 py-6">
            <div class="space-y-6" id="all-reviews-container">
                @foreach ($service->reviews as $review)
                    <div class="border border-gray-200 rounded-lg p-6 review-item-modal">
                        {{-- ⭐ Rating --}}
                        <div class="flex items-center gap-1 mb-3">
                            @for ($i = 1; $i <= 5; $i++)
                                <span class="{{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300' }}">★</span>
                            @endfor
                            <span class="ml-1 text-sm font-semibold text-gray-900">{{ $review->rating }}</span>
                        </div>

                        {{-- 👤 User Info --}}
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 rounded-full flex items-center justify-center text-white font-bold
                                {{ ['bg-red-500','bg-blue-500','bg-green-500','bg-yellow-500','bg-purple-500'][rand(0,4)] }}">
                                {{ strtoupper(substr($review->user_name ?? 'U', 0, 1)) }}
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-900">
                                    {{ $review->user_name ?? 'Anonymous User' }}
                                </p>
                                <p class="text-xs text-gray-500">
                                    {{ $review->created_at->format('F d, Y') }} – Verified booking
                                </p>
                            </div>
                        </div>

                        {{-- 💬 Comment --}}
                        <div class="review-comment-container-modal" data-review-id="modal-{{ $review->id }}" data-full-text="{{ $review->comment }}">
                            <p class="review-comment text-sm text-gray-700 leading-relaxed mb-2" id="review-text-modal-{{ $review->id }}">
                                @if (strlen($review->comment) > 220)
                                    <span class="review-text-short">{{ Str::limit($review->comment, 220, '') }}</span><span class="review-ellipsis">...</span>
                                    <span class="review-text-full hidden">{{ $review->comment }}</span>
                                @else
                                    {{ $review->comment }}
                                @endif
                            </p>
                            @if (strlen($review->comment) > 220)
                                <button class="review-read-toggle-modal text-sm font-semibold text-gray-900 underline hover:text-gray-700" data-review-id="modal-{{ $review->id }}">Read more</button>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Quote Modal -->
<div id="quote-modal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex hidden items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-3xl max-h-[90vh] overflow-hidden flex flex-col animate-fadeIn">
            <!-- Header -->
            <div class="border px-8 py-4">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-xl font-bold mb-1">Request a Quote</h3>
                        <p class="text-xs">Fill out the form below and we'll get back to you shortly</p>
                    </div>
                    <button id="close-modal" class="hover:bg-white/10 p-2 rounded-lg transition-all">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
            </div>
            
            <!-- Form Content -->
            <div class="overflow-y-auto flex-1 px-8 py-6">
                <form id="quote-form" class="space-y-5">
                    <!-- Selected Vehicle -->
                    <div class="bg-blue-50 border border-blue-200 rounded-lg px-4 py-2">
                        <label class="block text-sm font-semibold text-gray-700">
                            <i class="fas fa-car text-primary mr-2"></i>Selected Vehicle
                        </label>
                        <input type="text" id="selected-car" readonly value="Mercedes S-Class" 
                            class="w-full border-0 bg-transparent px-0 py-1 text-gray-900 font-semibold focus:outline-none text-lg">
                    </div>
                    
                    <!-- Personal Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Full Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" required placeholder="John Doe"
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Phone Number <span class="text-red-500">*</span>
                            </label>
                            <input type="tel" required placeholder="+1 (555) 000-0000"
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Email Address <span class="text-red-500">*</span>
                        </label>
                        <input type="email" required placeholder="john.doe@example.com"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                    </div>
                    
                    <!-- Service Details -->
                    <div class="pt-2">
                        <h4 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                            <div class="w-1 h-6 bg-primary rounded mr-3"></div>
                            Service Details
                        </h4>
                        
                        <div class="space-y-5">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Service Type <span class="text-red-500">*</span>
                                </label>
                                <select required class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all bg-white">
                                    <option value="">Select a service</option>
                                    <option value="5-hour">5-Hour Service</option>
                                    <option value="10-hour">10-Hour Service</option>
                                    <option value="full-day">Full Day Service</option>
                                    <option value="airport-transfer">Airport Transfer</option>
                                </select>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-5">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Pickup Date <span class="text-red-500">*</span>
                                    </label>
                                    <input type="date" required 
                                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Pickup Time <span class="text-red-500">*</span>
                                    </label>
                                    <input type="time" required 
                                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Pickup Location <span class="text-red-500">*</span>
                                </label>
                                <input type="text" required placeholder="Enter pickup address" 
                                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Drop-off Location
                                </label>
                                <input type="text" placeholder="Enter drop-off address (optional)" 
                                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Number of Passengers
                                </label>
                                <select class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all bg-white">
                                    <option value="1">1 Passenger</option>
                                    <option value="2">2 Passengers</option>
                                    <option value="3">3 Passengers</option>
                                    <option value="4">4 Passengers</option>
                                    <option value="5">5+ Passengers</option>
                                </select>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Special Requirements
                                </label>
                                <textarea rows="3" placeholder="Any special requests or requirements..." 
                                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all resize-none"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            
            <!-- Footer -->
            <div class="bg-gray-50 px-8 py-5 border-t border-gray-200">
                <div class="flex gap-3">
                    <button type="button" id="cancel-quote" 
                        class="flex-1 border-2 border-gray-300 text-gray-700 py-3 px-6 rounded-lg font-semibold hover:bg-gray-100 transition-all">
                        Cancel
                    </button>
                    <button type="submit" form="quote-form"
                        class="flex-1 bg-gradient-to-r from-primary to-primary-dark text-white py-3 px-6 rounded-lg font-semibold">
                        <i class="fas fa-paper-plane mr-2"></i>Send Quote Request
                    </button>
                </div>
            </div>
        </div>
    </div>

<script>
    (function () {
        // Smooth collapse/expand using max-height transitions
        function ensureTransition(el) {
            el.style.overflow = 'hidden';
            el.style.transition = 'max-height 300ms ease';
        }

        function openElement(el) {
            if (!el) return;
            ensureTransition(el);
            el.classList.remove('hidden');
            // Force a reflow so the transition runs
            el.style.maxHeight = '0px';
            requestAnimationFrame(() => {
                el.style.maxHeight = el.scrollHeight + 'px';
            });
            el.classList.add('open');
            // after transition, clear max-height so it can grow naturally
            const cleanup = () => {
                el.style.maxHeight = 'none';
                el.removeEventListener('transitionend', cleanup);
            };
            el.addEventListener('transitionend', cleanup);
        }

        function closeElement(el) {
            if (!el) return;
            ensureTransition(el);
            // from current height to 0
            el.style.maxHeight = el.scrollHeight + 'px';
            requestAnimationFrame(() => {
                el.style.maxHeight = '0px';
            });
            el.classList.remove('open');
            el.addEventListener('transitionend', function handler() {
                el.classList.add('hidden');
                el.removeEventListener('transitionend', handler);
            });
        }

        function toggleSection(button, el) {
            if (!el) return;
            const isOpen = el.classList.contains('open');
            if (isOpen) {
                closeElement(el);
                button.setAttribute('aria-expanded', 'false');
            } else {
                openElement(el);
                button.setAttribute('aria-expanded', 'true');
            }
            const icon = button.querySelector('.toggle-icon');
            if (icon) icon.classList.toggle('rotate-180', !isOpen);
        }

        // Wire section toggles
        document.querySelectorAll('.toggle-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const targetSelector = btn.getAttribute('data-target');
                const content = document.querySelector(targetSelector);
                toggleSection(btn, content);
            });
        });

        // FAQ item toggles: treat each FAQ answer as a collapsible
        document.querySelectorAll('.faq-item').forEach(btn => {
            btn.addEventListener('click', () => {
                const targetSelector = btn.getAttribute('data-target');
                const content = document.querySelector(targetSelector);
                if (!content) return;

                const isOpen = content.classList.contains('open');
                if (isOpen) {
                    closeElement(content);
                    btn.setAttribute('aria-expanded', 'false');
                } else {
                    openElement(content);
                    btn.setAttribute('aria-expanded', 'true');
                }

                const icon = btn.querySelector('.toggle-icon');
                if (icon) icon.classList.toggle('rotate-180', !isOpen);
            });
        });

        // Initialization: set up collapse elements
        document.querySelectorAll('.collapse-content').forEach(el => {
            // ensure transition styles
            ensureTransition(el);
            if (el.classList.contains('open')) {
                // open to its full height
                el.classList.remove('hidden');
                el.style.maxHeight = el.scrollHeight + 'px';
                // then clear inline maxHeight after transition
                el.addEventListener('transitionend', function once() {
                    el.style.maxHeight = 'none';
                    el.removeEventListener('transitionend', once);
                });
            } else {
                el.classList.add('hidden');
                el.style.maxHeight = '0px';
            }
        });

        // Description show-more: compute collapsed height (3 lines) and animate
        function getLineHeightPx(el) {
            const cs = getComputedStyle(el);
            let lh = parseFloat(cs.lineHeight);
            if (isNaN(lh)) {
                // fallback to 1.2 * font-size
                lh = parseFloat(cs.fontSize) * 1.2;
            }
            return lh;
        }

        document.querySelectorAll('.show-more-btn').forEach(btn => {
            const target = document.querySelector(btn.getAttribute('data-target'));
            if (!target) return;
            ensureTransition(target);

            const collapsedHeight = Math.round(getLineHeightPx(target) * 3);
            // initialize to collapsed
            target.style.maxHeight = collapsedHeight + 'px';
            target.classList.add('clamped');
            btn.setAttribute('aria-expanded', 'false');

            btn.addEventListener('click', () => {
                const isCollapsed = target.classList.contains('clamped');
                if (isCollapsed) {
                    // expand
                    target.classList.remove('clamped');
                    openElement(target);
                    btn.textContent = 'Show Less';
                    btn.setAttribute('aria-expanded', 'true');
                } else {
                    // collapse back to 3 lines
                    btn.textContent = 'Show More';
                    btn.setAttribute('aria-expanded', 'false');
                    // set explicit maxHeight to current scrollHeight then animate to collapsedHeight
                    target.style.maxHeight = target.scrollHeight + 'px';
                    requestAnimationFrame(() => {
                        target.style.maxHeight = collapsedHeight + 'px';
                    });
                    target.classList.add('clamped');
                    target.classList.remove('open');
                }
            });
        });

        // Thumbnail click -> swap main image with smooth fade
        const mainImage = document.getElementById('main-image');
        if (mainImage) {
            document.querySelectorAll('.thumbnail').forEach(thumb => {
                thumb.addEventListener('click', () => {
                    const large = thumb.getAttribute('data-large') || thumb.src;
                    if (!large) return;

                    // highlight selected thumbnail
                    document.querySelectorAll('.thumbnail').forEach(t => {
                        t.classList.remove('border-red-500');
                        t.classList.add('border-transparent');
                    });
                    thumb.classList.add('border-red-500');

                    // fade out main image, swap src, fade in
                    mainImage.style.transition = 'opacity 150ms ease';
                    mainImage.style.opacity = '0';
                    setTimeout(() => {
                        mainImage.src = large;
                        mainImage.style.opacity = '1';
                    }, 160);
                });
            });
        }

        // Lightbox / modal image viewer
        const modal = document.getElementById('image-modal');
        const modalImage = document.getElementById('modal-image');
        const modalPrev = document.getElementById('modal-prev');
        const modalNext = document.getElementById('modal-next');
        const modalClose = document.getElementById('modal-close');
        const seeAllBtn = document.getElementById('see-all-btn');

        // collect images from thumbnails
        const gallery = Array.from(document.querySelectorAll('.thumbnail')).map(t => t.getAttribute('data-large') || t.src);
        let currentIndex = 0;

        function openModal(index) {
            if (!modal) return;
            currentIndex = (index + gallery.length) % gallery.length;
            modalImage.style.opacity = '0';
            modal.classList.remove('hidden');
            modal.setAttribute('aria-hidden', 'false');
            // small timeout to allow display then load image
            setTimeout(() => {
                modalImage.src = gallery[currentIndex];
                modalImage.onload = () => { modalImage.style.opacity = '1'; };
            }, 50);
        }

        function closeModal() {
            if (!modal) return;
            modal.classList.add('hidden');
            modal.setAttribute('aria-hidden', 'true');
            modalImage.src = '';
        }

        function showNext() { openModal(currentIndex + 1); }
        function showPrev() { openModal(currentIndex - 1); }

        if (seeAllBtn) {
            seeAllBtn.addEventListener('click', () => openModal(0));
        }

        if (modalClose) modalClose.addEventListener('click', closeModal);
        if (modalNext) modalNext.addEventListener('click', showNext);
        if (modalPrev) modalPrev.addEventListener('click', showPrev);

        // click outside image closes
        if (modal) {
            modal.addEventListener('click', (e) => {
                if (e.target === modal) closeModal();
            });
        }

        // keyboard support
        document.addEventListener('keydown', (e) => {
            if (!modal || modal.classList.contains('hidden')) return;
            if (e.key === 'Escape') closeModal();
            if (e.key === 'ArrowRight') showNext();
            if (e.key === 'ArrowLeft') showPrev();
        });

        // Reviews Modal functionality
        const reviewsModal = document.getElementById('reviews-modal');
        const seeMoreReviewsBtn = document.getElementById('see-more-reviews-btn');
        const closeReviewsModal = document.getElementById('close-reviews-modal');

        function openReviewsModal() {
            if (reviewsModal) {
                reviewsModal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }
        }

        function closeReviewsModalFunc() {
            if (reviewsModal) {
                reviewsModal.classList.add('hidden');
                document.body.style.overflow = '';
            }
        }

        if (seeMoreReviewsBtn) {
            seeMoreReviewsBtn.addEventListener('click', openReviewsModal);
        }

        if (closeReviewsModal) {
            closeReviewsModal.addEventListener('click', closeReviewsModalFunc);
        }

        // Close modal when clicking outside
        if (reviewsModal) {
            reviewsModal.addEventListener('click', (e) => {
                if (e.target === reviewsModal) closeReviewsModalFunc();
            });
        }

        // Close modal on Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && reviewsModal && !reviewsModal.classList.contains('hidden')) {
                closeReviewsModalFunc();
            }
        });

        // Read More/Less functionality for main reviews
        document.querySelectorAll('.review-read-toggle').forEach(btn => {
            btn.addEventListener('click', function() {
                const reviewId = this.getAttribute('data-review-id');
                const commentElement = document.getElementById('review-text-' + reviewId);
                if (!commentElement) return;

                const textShort = commentElement.querySelector('.review-text-short');
                const textFull = commentElement.querySelector('.review-text-full');
                const ellipsis = commentElement.querySelector('.review-ellipsis');

                if (textShort && textFull && ellipsis) {
                    const isExpanded = !textFull.classList.contains('hidden');
                    
                    if (isExpanded) {
                        // Collapse
                        textShort.classList.remove('hidden');
                        ellipsis.classList.remove('hidden');
                        textFull.classList.add('hidden');
                        this.textContent = 'Read more';
                    } else {
                        // Expand
                        textShort.classList.add('hidden');
                        ellipsis.classList.add('hidden');
                        textFull.classList.remove('hidden');
                        this.textContent = 'Read less';
                    }
                }
            });
        });

        // Read More/Less functionality for modal reviews
        document.querySelectorAll('.review-read-toggle-modal').forEach(btn => {
            btn.addEventListener('click', function() {
                const reviewId = this.getAttribute('data-review-id');
                const commentElement = document.getElementById('review-text-' + reviewId);
                if (!commentElement) return;

                const textShort = commentElement.querySelector('.review-text-short');
                const textFull = commentElement.querySelector('.review-text-full');
                const ellipsis = commentElement.querySelector('.review-ellipsis');

                if (textShort && textFull && ellipsis) {
                    const isExpanded = !textFull.classList.contains('hidden');
                    
                    if (isExpanded) {
                        // Collapse
                        textShort.classList.remove('hidden');
                        ellipsis.classList.remove('hidden');
                        textFull.classList.add('hidden');
                        this.textContent = 'Read more';
                    } else {
                        // Expand
                        textShort.classList.add('hidden');
                        ellipsis.classList.add('hidden');
                        textFull.classList.remove('hidden');
                        this.textContent = 'Read less';
                    }
                }
            });
        });
    })();
</script>
@endsection
