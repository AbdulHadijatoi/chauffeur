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
            Help and Support
        </h1>
    </div>
</section>

<div class="max-w-6xl mx-auto px-4 pb-12">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
        <!-- Left Section -->
        <div class="space-y-8">
            <div>
                <h1 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-4">
                    Reach Out to Our Support Team
                </h1>
                <p class="text-lg font-semibold text-gray-900 mb-3">
                    Our team is ready to help. Your satisfaction is our priority
                </p>
                <p class="text-gray-600 leading-relaxed">
                    Got a question, need advice, or looking for help? Our knowledgeable team is here to assist you every step of the way. We're just a message or call away, ready to provide the guidance you need.
                </p>
            </div>

            <!-- Contact Info Cards -->
            <div class="space-y-4">
                <!-- Email -->
                <div class="flex items-start gap-4 p-4 bg-white rounded-lg shadow-sm">
                    <div class="flex-shrink-0 w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-envelope text-gray-600 text-xl"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Email Address</p>
                        <p class="text-gray-900 font-medium">{{get_setting('contact_email')}}</p>
                    </div>
                </div>

                <!-- Phone -->
                <div class="flex items-start gap-4 p-4 bg-white rounded-lg shadow-sm">
                    <div class="flex-shrink-0 w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-phone text-gray-600 text-xl"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Phone Number</p>
                        <p class="text-gray-900 font-medium">{{get_setting('contact_phone')}}</p>
                    </div>
                </div>

                <!-- Location -->
                <div class="flex items-start gap-4 p-4 bg-white rounded-lg shadow-sm">
                    <div class="flex-shrink-0 w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-map-marker-alt text-gray-600 text-xl"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Our Location</p>
                        <p class="text-gray-900 font-medium">{{ get_setting('address')}}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Section - Form -->
        <div class="bg-gray-100 rounded-lg p-8 lg:p-10">
            <h2 class="text-3xl font-bold text-gray-900 mb-2">Get in Touch</h2>
            <p class="text-gray-600 mb-6">How we can help you? Please write down your query</p>

            <div class="space-y-5">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            First Name <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            required
                            class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent outline-none transition"
                        >
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Last Name <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            required
                            class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent outline-none transition"
                        >
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Email <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="email" 
                        required
                        class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent outline-none transition"
                    >
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Phone <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="tel" 
                        required
                        class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent outline-none transition"
                    >
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Message <span class="text-red-500">*</span>
                    </label>
                    <textarea 
                        rows="5" 
                        required
                        class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent outline-none transition resize-none"
                    ></textarea>
                </div>

                <button 
                    type="submit"
                    class="bg-primary text-white font-medium px-8 py-3 rounded-lg"
                >
                    Send Message
                </button>
            </div>
        </div>
        
    </div>
    <!-- Map Section -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden mt-6">
        <div class="relative">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d115808.41833251907!2d55.1712794!3d25.0657002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f4346f4a9e3c5%3A0xa2b3ef2d69e9d30d!2sDubai%2C%20United%20Arab%20Emirates!5e0!3m2!1sen!2sae!4v1739745600000"
                width="100%" 
                height="300" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy">
            </iframe>
        </div>
        <!-- <div class="p-4 bg-cyan-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="font-semibold text-gray-900">Dubai</p>
                    <p class="text-sm text-gray-600">United Arab Emirates</p>
                </div>
                <a href="#" class="text-blue-600 hover:text-blue-700 text-sm font-medium flex items-center gap-1">
                    <i class="fas fa-directions"></i>
                    Directions
                </a>
            </div>
            <a href="#" class="text-blue-600 hover:text-blue-700 text-sm font-medium mt-2 inline-block">
                View larger map
            </a>
        </div> -->
    </div>
</div>

@endsection