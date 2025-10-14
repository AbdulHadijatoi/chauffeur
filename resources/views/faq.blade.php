@extends('layouts.app')

@section('title', 'Frequently Asked Questions - Chauffeur Service Dubai')

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

<div class="max-w-6xl mx-auto px-4 pb-12">
    <!-- Booking & Reservations Section -->
    <div class="mb-12">
        <div class="flex items-center mb-6">
            <div class="w-1 h-8 bg-primary mr-4"></div>
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Booking & Reservations</h2>
        </div>
        
        <!-- FAQ Item 1 -->
        <div class="bg-white border border-gray-200 border-dashed rounded-lg mb-4 shadow-sm">
            <button onclick="toggleFaq(1)" class="w-full px-6 py-5 flex items-start justify-between text-left hover:bg-gray-50 transition-colors rounded-lg">
                <span class="font-semibold text-gray-900 pr-4 text-base md:text-lg">How far in advance is it recommended to book a chauffeur service?</span>
                <span class="toggle-icon text-red-600 text-2xl font-light flex-shrink-0 transition-transform duration-300" id="icon-1">+</span>
            </button>
            <div class="faq-answer overflow-hidden transition-all duration-300 max-h-0" id="answer-1">
                <div class="px-6 pb-5 pt-2">
                    <p class="text-gray-700 leading-relaxed">For optimal availability and to ensure we secure your preferred vehicle class, we recommend booking at least 24 to 48 hours in advance. However, we do accommodate urgent or on-demand requests subject to immediate fleet availability.</p>
                </div>
            </div>
        </div>

        <!-- FAQ Item 2 -->
        <div class="bg-white border border-gray-200 border-dashed rounded-lg mb-4 shadow-sm">
            <button onclick="toggleFaq(2)" class="w-full px-6 py-5 flex items-start justify-between text-left hover:bg-gray-50 transition-colors rounded-lg">
                <span class="font-semibold text-gray-900 pr-4 text-base md:text-lg">What is the process for making a reservation?</span>
                <span class="toggle-icon text-red-600 text-2xl font-light flex-shrink-0 transition-transform duration-300" id="icon-2">+</span>
            </button>
            <div class="faq-answer overflow-hidden transition-all duration-300 max-h-0" id="answer-2">
                <div class="px-6 pb-5 pt-2">
                    <p class="text-gray-700 leading-relaxed">Reservations can be securely made through our official website portal, via email correspondence with our dedicated booking team, or by contacting our 24/7 reservation hotline. All bookings require confirmation and a valid contact number.</p>
                </div>
            </div>
        </div>

        <!-- FAQ Item 3 -->
        <div class="bg-white border border-gray-200 border-dashed rounded-lg mb-4 shadow-sm">
            <button onclick="toggleFaq(3)" class="w-full px-6 py-5 flex items-start justify-between text-left hover:bg-gray-50 transition-colors rounded-lg">
                <span class="font-semibold text-gray-900 pr-4 text-base md:text-lg">Can I request a specific route or make multiple stops during an hourly booking?</span>
                <span class="toggle-icon text-red-600 text-2xl font-light flex-shrink-0 transition-transform duration-300" id="icon-3">+</span>
            </button>
            <div class="faq-answer overflow-hidden transition-all duration-300 max-h-0" id="answer-3">
                <div class="px-6 pb-5 pt-2">
                    <p class="text-gray-700 leading-relaxed">Yes. During the booking process, you can detail your itinerary, including specific stops. For hourly hires, the chauffeur will adhere to the planned route, allowing for flexibility within the booked timeframe.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Fleet & Service Details Section -->
    <div class="mb-12">
        <div class="flex items-center mb-6">
            <div class="w-1 h-8 bg-primary mr-4"></div>
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Fleet & Service Details</h2>
        </div>
        
        <!-- FAQ Item 4 -->
        <div class="bg-white border border-gray-200 border-dashed rounded-lg mb-4 shadow-sm">
            <button onclick="toggleFaq(4)" class="w-full px-6 py-5 flex items-start justify-between text-left hover:bg-gray-50 transition-colors rounded-lg">
                <span class="font-semibold text-gray-900 pr-4 text-base md:text-lg">What types of vehicles are available in your luxury fleet?</span>
                <span class="toggle-icon text-red-600 text-2xl font-light flex-shrink-0 transition-transform duration-300" id="icon-4">+</span>
            </button>
            <div class="faq-answer overflow-hidden transition-all duration-300 max-h-0" id="answer-4">
                <div class="px-6 pb-5 pt-2">
                    <p class="text-gray-700 leading-relaxed">Our fleet comprises modern, meticulously maintained luxury and premium vehicles, including high-end sedans (e.g., Mercedes S-Class, BMW 7 Series), executive SUVs (e.g., Cadillac Escalade, Range Rover), and luxury vans suitable for group transfers.</p>
                </div>
            </div>
        </div>

        <!-- FAQ Item 5 -->
        <div class="bg-white border border-gray-200 border-dashed rounded-lg mb-4 shadow-sm">
            <button onclick="toggleFaq(5)" class="w-full px-6 py-5 flex items-start justify-between text-left hover:bg-gray-50 transition-colors rounded-lg">
                <span class="font-semibold text-gray-900 pr-4 text-base md:text-lg">Do your chauffeurs offer airport meet-and-greet services?</span>
                <span class="toggle-icon text-red-600 text-2xl font-light flex-shrink-0 transition-transform duration-300" id="icon-5">+</span>
            </button>
            <div class="faq-answer overflow-hidden transition-all duration-300 max-h-0" id="answer-5">
                <div class="px-6 pb-5 pt-2">
                    <p class="text-gray-700 leading-relaxed">Absolutely. For all airport transfers (Dubai International - DXB, Al Maktoum - DWC), your assigned professional chauffeur will monitor your flight status and meet you at the designated arrivals area holding a personalized name board, assisting with luggage transfer.</p>
                </div>
            </div>
        </div>

        <!-- FAQ Item 6 -->
        <div class="bg-white border border-gray-200 border-dashed rounded-lg mb-4 shadow-sm">
            <button onclick="toggleFaq(6)" class="w-full px-6 py-5 flex items-start justify-between text-left hover:bg-gray-50 transition-colors rounded-lg">
                <span class="font-semibold text-gray-900 pr-4 text-base md:text-lg">Are your chauffeurs fully licensed and vetted professionals?</span>
                <span class="toggle-icon text-red-600 text-2xl font-light flex-shrink-0 transition-transform duration-300" id="icon-6">+</span>
            </button>
            <div class="faq-answer overflow-hidden transition-all duration-300 max-h-0" id="answer-6">
                <div class="px-6 pb-5 pt-2">
                    <p class="text-gray-700 leading-relaxed">All our chauffeurs are highly experienced, possess valid UAE driving licenses, undergo rigorous background checks, and adhere strictly to Dubai's RTA (Roads and Transport Authority) regulations regarding professional passenger transport.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Pricing & Policies Section -->
    <div class="mb-12">
        <div class="flex items-center mb-6">
            <div class="w-1 h-8 bg-primary mr-4"></div>
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Pricing & Policies</h2>
        </div>
        
        <!-- FAQ Item 7 -->
        <div class="bg-white border border-gray-200 border-dashed rounded-lg mb-4 shadow-sm">
            <button onclick="toggleFaq(7)" class="w-full px-6 py-5 flex items-start justify-between text-left hover:bg-gray-50 transition-colors rounded-lg">
                <span class="font-semibold text-gray-900 pr-4 text-base md:text-lg">Are the quoted rates all-inclusive?</span>
                <span class="toggle-icon text-red-600 text-2xl font-light flex-shrink-0 transition-transform duration-300" id="icon-7">+</span>
            </button>
            <div class="faq-answer overflow-hidden transition-all duration-300 max-h-0" id="answer-7">
                <div class="px-6 pb-5 pt-2">
                    <p class="text-gray-700 leading-relaxed">Our standard quoted rates are inclusive of the vehicle, professional chauffeur service, fuel, and standard tolls within Dubai. Please note that any extraordinary waiting time beyond the grace period, specific entry fees to private venues, or out-of-city border crossing charges may be itemized separately, which will be clearly communicated prior to confirmation.</p>
                </div>
            </div>
        </div>

        <!-- FAQ Item 8 -->
        <div class="bg-white border border-gray-200 border-dashed rounded-lg mb-4 shadow-sm">
            <button onclick="toggleFaq(8)" class="w-full px-6 py-5 flex items-start justify-between text-left hover:bg-gray-50 transition-colors rounded-lg">
                <span class="font-semibold text-gray-900 pr-4 text-base md:text-lg">What is your policy regarding cancellations or amendments?</span>
                <span class="toggle-icon text-red-600 text-2xl font-light flex-shrink-0 transition-transform duration-300" id="icon-8">+</span>
            </button>
            <div class="faq-answer overflow-hidden transition-all duration-300 max-h-0" id="answer-8">
                <div class="px-6 pb-5 pt-2">
                    <p class="text-gray-700 leading-relaxed">We maintain a flexible cancellation policy. Cancellations made more than 4 hours prior to the scheduled pickup time are typically free of charge. Cancellations made within the 4-hour window, or "no-shows," may incur a charge equivalent to one hour of service.</p>
                </div>
            </div>
        </div>

        <!-- FAQ Item 9 -->
        <div class="bg-white border border-gray-200 border-dashed rounded-lg mb-4 shadow-sm">
            <button onclick="toggleFaq(9)" class="w-full px-6 py-5 flex items-start justify-between text-left hover:bg-gray-50 transition-colors rounded-lg">
                <span class="font-semibold text-gray-900 pr-4 text-base md:text-lg">How is waiting time calculated for airport pickups and hourly hires?</span>
                <span class="toggle-icon text-red-600 text-2xl font-light flex-shrink-0 transition-transform duration-300" id="icon-9">+</span>
            </button>
            <div class="faq-answer overflow-hidden transition-all duration-300 max-h-0" id="answer-9">
                <div class="px-6 pb-5 pt-2">
                    <p class="text-gray-700 leading-relaxed">For airport collections, a complimentary waiting time of 60 minutes is provided after the flight officially lands. For hourly hires, the service begins precisely at the confirmed pickup time.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Special Requirements Section -->
    <div class="mb-12">
        <div class="flex items-center mb-6">
            <div class="w-1 h-8 bg-primary mr-4"></div>
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Special Requirements</h2>
        </div>
        
        <!-- FAQ Item 10 -->
        <div class="bg-white border border-gray-200 border-dashed rounded-lg mb-4 shadow-sm">
            <button onclick="toggleFaq(10)" class="w-full px-6 py-5 flex items-start justify-between text-left hover:bg-gray-50 transition-colors rounded-lg">
                <span class="font-semibold text-gray-900 pr-4 text-base md:text-lg">Do you accommodate requirements for child safety seats or specialized accessibility needs?</span>
                <span class="toggle-icon text-red-600 text-2xl font-light flex-shrink-0 transition-transform duration-300" id="icon-10">+</span>
            </button>
            <div class="faq-answer overflow-hidden transition-all duration-300 max-h-0" id="answer-10">
                <div class="px-6 pb-5 pt-2">
                    <p class="text-gray-700 leading-relaxed">Yes, we can arrange for appropriate, certified child safety seats upon request during the booking stage. Please specify your exact requirements when confirming your reservation so we can prepare the vehicle accordingly.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="bg-gradient-to-br from-gray-700 to-gray-800 rounded-2xl p-4 md:p-5 text-center shadow-xl">
        <div class="max-w-2xl mx-auto">

            <h2 class="text-1xl md:text-2xl font-bold text-white mb-2">Still Have Questions?</h2>
            <p class="text-gray-300 mb-4 text-base md:text-sm">Can't find the answer you're looking for? Our dedicated support team is here to help you 24/7.</p>

            <a href="https://wa.me/971523087786" target="_blank" class="inline-flex items-center bg-primary text-white font-semibold px-8 py-2 rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                Contact Us Now
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script>
        function toggleFaq(id) {
            const answer = document.getElementById(`answer-${id}`);
            const icon = document.getElementById(`icon-${id}`);
            
            // Check if currently open
            const isOpen = answer.style.maxHeight && answer.style.maxHeight !== '0px';
            
            if (isOpen) {
                // Close it
                answer.style.maxHeight = '0px';
                icon.textContent = '+';
                icon.style.transform = 'rotate(0deg)';
            } else {
                // Open it
                answer.style.maxHeight = answer.scrollHeight + 'px';
                icon.textContent = '−';
                icon.style.transform = 'rotate(180deg)';
            }
        }

        // Ensure all FAQs are closed on page load
        document.addEventListener('DOMContentLoaded', function() {
            const answers = document.querySelectorAll('.faq-answer');
            answers.forEach(answer => {
                answer.style.maxHeight = '0px';
            });
        });
    </script>
@endpush