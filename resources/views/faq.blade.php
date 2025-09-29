@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-3">Frequently Asked Questions (FAQ)</h1>
            <p class="text-gray-700 leading-relaxed">Professional Chauffeur Hire Dubai</p>
            <p class="text-gray-600 text-sm mt-2">This FAQ provides essential information regarding our premium chauffeur services operating within Dubai and the surrounding Emirates.</p>
        </div>

        <!-- Booking & Reservations Section -->
        <div class="mb-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Booking & Reservations</h2>
            
            <!-- FAQ Item 1 -->
            <div class="bg-white border border-gray-200 rounded-lg mb-3">
                <button onclick="toggleFaq(1)" class="w-full px-6 py-5 flex items-center justify-between text-left hover:bg-gray-50 transition-colors">
                    <span class="font-semibold text-gray-900 pr-4">How far in advance is it recommended to book a chauffeur service?</span>
                    <span class="toggle-icon text-red-600 text-2xl flex-shrink-0" id="icon-1">+</span>
                </button>
                <div class="faq-answer px-6 pb-5" id="answer-1">
                    <p class="text-gray-700 leading-relaxed">For optimal availability and to ensure we secure your preferred vehicle class, we recommend booking at least 24 to 48 hours in advance. However, we do accommodate urgent or on-demand requests subject to immediate fleet availability.</p>
                </div>
            </div>

            <!-- FAQ Item 2 -->
            <div class="bg-white border border-gray-200 rounded-lg mb-3">
                <button onclick="toggleFaq(2)" class="w-full px-6 py-5 flex items-center justify-between text-left hover:bg-gray-50 transition-colors">
                    <span class="font-semibold text-gray-900 pr-4">What is the process for making a reservation?</span>
                    <span class="toggle-icon text-red-600 text-2xl flex-shrink-0" id="icon-2">+</span>
                </button>
                <div class="faq-answer px-6 pb-5" id="answer-2">
                    <p class="text-gray-700 leading-relaxed">Reservations can be securely made through our official website portal, via email correspondence with our dedicated booking team, or by contacting our 24/7 reservation hotline. All bookings require confirmation and a valid contact number.</p>
                </div>
            </div>

            <!-- FAQ Item 3 -->
            <div class="bg-white border border-gray-200 rounded-lg mb-3">
                <button onclick="toggleFaq(3)" class="w-full px-6 py-5 flex items-center justify-between text-left hover:bg-gray-50 transition-colors">
                    <span class="font-semibold text-gray-900 pr-4">Can I request a specific route or make multiple stops during an hourly booking?</span>
                    <span class="toggle-icon text-red-600 text-2xl flex-shrink-0" id="icon-3">+</span>
                </button>
                <div class="faq-answer px-6 pb-5" id="answer-3">
                    <p class="text-gray-700 leading-relaxed">Yes. During the booking process, you can detail your itinerary, including specific stops. For hourly hires, the chauffeur will adhere to the planned route, allowing for flexibility within the booked timeframe.</p>
                </div>
            </div>
        </div>

        <!-- Fleet & Service Details Section -->
        <div class="mb-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Fleet & Service Details</h2>
            
            <!-- FAQ Item 4 -->
            <div class="bg-white border border-gray-200 rounded-lg mb-3">
                <button onclick="toggleFaq(4)" class="w-full px-6 py-5 flex items-center justify-between text-left hover:bg-gray-50 transition-colors">
                    <span class="font-semibold text-gray-900 pr-4">What types of vehicles are available in your luxury fleet?</span>
                    <span class="toggle-icon text-red-600 text-2xl flex-shrink-0" id="icon-4">+</span>
                </button>
                <div class="faq-answer px-6 pb-5" id="answer-4">
                    <p class="text-gray-700 leading-relaxed">Our fleet comprises modern, meticulously maintained luxury and premium vehicles, including high-end sedans (e.g., Mercedes S-Class, BMW 7 Series), executive SUVs (e.g., Cadillac Escalade, Range Rover), and luxury vans suitable for group transfers.</p>
                </div>
            </div>

            <!-- FAQ Item 5 -->
            <div class="bg-white border border-gray-200 rounded-lg mb-3">
                <button onclick="toggleFaq(5)" class="w-full px-6 py-5 flex items-center justify-between text-left hover:bg-gray-50 transition-colors">
                    <span class="font-semibold text-gray-900 pr-4">Do your chauffeurs offer airport meet-and-greet services?</span>
                    <span class="toggle-icon text-red-600 text-2xl flex-shrink-0" id="icon-5">+</span>
                </button>
                <div class="faq-answer px-6 pb-5" id="answer-5">
                    <p class="text-gray-700 leading-relaxed">Absolutely. For all airport transfers (Dubai International - DXB, Al Maktoum - DWC), your assigned professional chauffeur will monitor your flight status and meet you at the designated arrivals area holding a personalized name board, assisting with luggage transfer.</p>
                </div>
            </div>

            <!-- FAQ Item 6 -->
            <div class="bg-white border border-gray-200 rounded-lg mb-3">
                <button onclick="toggleFaq(6)" class="w-full px-6 py-5 flex items-center justify-between text-left hover:bg-gray-50 transition-colors">
                    <span class="font-semibold text-gray-900 pr-4">Are your chauffeurs fully licensed and vetted professionals?</span>
                    <span class="toggle-icon text-red-600 text-2xl flex-shrink-0" id="icon-6">+</span>
                </button>
                <div class="faq-answer px-6 pb-5" id="answer-6">
                    <p class="text-gray-700 leading-relaxed">All our chauffeurs are highly experienced, possess valid UAE driving licenses, undergo rigorous background checks, and adhere strictly to Dubai's RTA (Roads and Transport Authority) regulations regarding professional passenger transport.</p>
                </div>
            </div>
        </div>

        <!-- Pricing & Policies Section -->
        <div class="mb-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Pricing & Policies</h2>
            
            <!-- FAQ Item 7 -->
            <div class="bg-white border border-gray-200 rounded-lg mb-3">
                <button onclick="toggleFaq(7)" class="w-full px-6 py-5 flex items-center justify-between text-left hover:bg-gray-50 transition-colors">
                    <span class="font-semibold text-gray-900 pr-4">Are the quoted rates all-inclusive?</span>
                    <span class="toggle-icon text-red-600 text-2xl flex-shrink-0" id="icon-7">+</span>
                </button>
                <div class="faq-answer px-6 pb-5" id="answer-7">
                    <p class="text-gray-700 leading-relaxed">Our standard quoted rates are inclusive of the vehicle, professional chauffeur service, fuel, and standard tolls within Dubai. Please note that any extraordinary waiting time beyond the grace period, specific entry fees to private venues, or out-of-city border crossing charges may be itemized separately, which will be clearly communicated prior to confirmation.</p>
                </div>
            </div>

            <!-- FAQ Item 8 -->
            <div class="bg-white border border-gray-200 rounded-lg mb-3">
                <button onclick="toggleFaq(8)" class="w-full px-6 py-5 flex items-center justify-between text-left hover:bg-gray-50 transition-colors">
                    <span class="font-semibold text-gray-900 pr-4">What is your policy regarding cancellations or amendments?</span>
                    <span class="toggle-icon text-red-600 text-2xl flex-shrink-0" id="icon-8">+</span>
                </button>
                <div class="faq-answer px-6 pb-5" id="answer-8">
                    <p class="text-gray-700 leading-relaxed">We maintain a flexible cancellation policy. Cancellations made more than 4 hours prior to the scheduled pickup time are typically free of charge. Cancellations made within the 4-hour window, or "no-shows," may incur a charge equivalent to one hour of service.</p>
                </div>
            </div>

            <!-- FAQ Item 9 -->
            <div class="bg-white border border-gray-200 rounded-lg mb-3">
                <button onclick="toggleFaq(9)" class="w-full px-6 py-5 flex items-center justify-between text-left hover:bg-gray-50 transition-colors">
                    <span class="font-semibold text-gray-900 pr-4">How is waiting time calculated for airport pickups and hourly hires?</span>
                    <span class="toggle-icon text-red-600 text-2xl flex-shrink-0" id="icon-9">+</span>
                </button>
                <div class="faq-answer px-6 pb-5" id="answer-9">
                    <p class="text-gray-700 leading-relaxed">For airport collections, a complimentary waiting time of 60 minutes is provided after the flight officially lands. For hourly hires, the service begins precisely at the confirmed pickup time.</p>
                </div>
            </div>
        </div>

        <!-- Special Requirements Section -->
        <div class="mb-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Special Requirements</h2>
            
            <!-- FAQ Item 10 -->
            <div class="bg-white border border-gray-200 rounded-lg mb-3">
                <button onclick="toggleFaq(10)" class="w-full px-6 py-5 flex items-center justify-between text-left hover:bg-gray-50 transition-colors">
                    <span class="font-semibold text-gray-900 pr-4">Do you accommodate requirements for child safety seats or specialized accessibility needs?</span>
                    <span class="toggle-icon text-red-600 text-2xl flex-shrink-0" id="icon-10">+</span>
                </button>
                <div class="faq-answer px-6 pb-5" id="answer-10">
                    <p class="text-gray-700 leading-relaxed">Yes, we can arrange for appropriate, certified child safety seats upon request during the booking stage. Please specify your exact requirements when confirming your reservation so we can prepare the vehicle accordingly.</p>
                </div>
            </div>
        </div>

        <!-- Contact Section -->
        <div class="bg-white border border-gray-200 rounded-lg p-8 text-center mt-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Have Any Other Questions?</h2>
            <p class="text-gray-600 mb-6">If you cannot find answer to your question in our FAQ, you can always contact us. We will answer to you shortly!</p>
            <button class="bg-red-600 hover:bg-red-700 text-white font-semibold px-8 py-3 rounded-lg transition-colors inline-flex items-center">
                Contact Us
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        function toggleFaq(id) {
            const answer = document.getElementById(`answer-${id}`);
            const icon = document.getElementById(`icon-${id}`);
            
            answer.classList.toggle('active');
            icon.classList.toggle('rotate');
            
            if (answer.classList.contains('active')) {
                icon.textContent = '−';
            } else {
                icon.textContent = '+';
            }
        }
    </script>
@endpush