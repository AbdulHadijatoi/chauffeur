@extends('layouts.app')

@section('title', $services_category->name)

@section('content')

<!-- Hero Section -->
<section class="relative bg-black via-gray-800 text-white px-4 mb-12">
    <div class="absolute inset-0 bg-black/60 z-10"></div>
    <div class="absolute inset-0" style="background-image: url('{{$services_category->image_url}}'); background-size: cover; background-position: center;"></div>
    <div class="max-w-6xl container mx-auto relative z-10 h-100 py-6 md:h-[450px] align-start flex flex-col justify-center">
        <div class="w-100 items-center font-light">
            <h2 class="text-3xl md:text-4xl font-semibold mb-2">
                {{ $services_category->name }}
            </h2>

            <p>{{ $services_category->description }}</p>
        </div>
        
        <!-- Tab Navigation -->
        <div class="flex w-fit md:w-fit text-black text-xs md:text-md rounded-full bg-white p-1 gap-1 mt-4">
            @foreach(get_services_categories() as $category)
                <a href="{{ route('listing', $category['id']) }}" class="h-full px-4 md:px-8 py-2 whitespace-nowrap @if($services_category->id === $category['id']) active-tab @endif">
                    {{ $category['name'] }}
                </a>
            @endforeach
        </div>
        
        <div class="mt-6">
            <!-- <h3 class="text-xl text-white font-semibold mb-4">Hourly Chauffeur Service</h3> -->
            <ul class="space-y-2 text-sm">
                <li class="flex items-center"><i class="fas fa-check-circle mr-2"></i>Premium fleet of chauffeur-driven cars</li>
                <li class="flex items-center"><i class="fas fa-check-circle mr-2"></i>Dedicated transportation for you or your guests</li>
                <li class="flex items-center"><i class="fas fa-check-circle mr-2"></i>Guaranteed vehicle as booked or a free upgrade</li>
                <li class="flex items-center"><i class="fas fa-check-circle mr-2"></i>Perfect for VIPs, executives & families</li>
            </ul>
        </div>
    </div>

    
</section>

<!-- Main Content -->
<div class="max-w-6xl container mx-auto px-4 pb-12 mt-0">
    <div class="flex flex-col xl:flex-row gap-8">
        <!-- Right Sidebar - Filters -->
        <div class="xl:w-1/4">
            <div class="sticky top-24 space-y-6 text-sm font-medium">
                <!-- Sort By -->
                <div class="bg-white rounded-lg p-6 border">
                    <h3 class=" mb-4">Sort By</h3>
                    <select class="w-full border rounded-md px-4 py-1">
                        <option>Price: Low to High</option>
                        <option>Price: High to Low</option>
                        <option>Most Popular</option>
                        <option>Newest First</option>
                    </select>

                    <h3 class=" my-4">Location</h3>
                    <select class="w-full border rounded-md px-4 py-1">
                        <option>Dubai</option>
                        <option>Abu Dhabi</option>
                        <option>Sharjah</option>
                        <option>Ajman</option>
                    </select>

                    <h3 class=" my-4">Vehicle Type</h3>
                    <div class="space-y-3">
                        <label class="flex items-center p-1 rounded-sm cursor-pointer">
                            <input type="checkbox" class="mr-3 text-primary focus:ring-primary rounded">
                            <span class="">Luxury Sedan</span>
                        </label>
                        <label class="flex items-center p-1 rounded-sm cursor-pointer">
                            <input type="checkbox" class="mr-3 text-primary focus:ring-primary rounded">
                            <span class="">SUV</span>
                        </label>
                        <label class="flex items-center p-1 rounded-sm cursor-pointer">
                            <input type="checkbox" class="mr-3 text-primary focus:ring-primary rounded">
                            <span class="">Sports Car</span>
                        </label>
                        <label class="flex items-center p-1 rounded-sm cursor-pointer">
                            <input type="checkbox" class="mr-3 text-primary focus:ring-primary rounded">
                            <span class="">Van/Minibus</span>
                        </label>
                    </div>
                </div>

                <!-- Search Button -->
                <button class="w-full bg-primary text-white py-3 rounded-md">
                    SHOW RESULTS
                </button>

                <!-- Info Sections -->
                <div class="space-y-4">
                    <div class="bg-white rounded-lg p-4 border">
                        <div class="flex items-center justify-between">
                            <h4 class="">The Chauffeur Edge</h4>
                            <i class="fas fa-plus"></i>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg p-4 border">
                        <div class="flex items-center justify-between">
                            <h4 class="">Our Premium Fleet</h4>
                            <i class="fas fa-plus"></i>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg p-4 border">
                        <div class="flex items-center justify-between">
                            <h4 class="">Professional Chauffeurs</h4>
                            <i class="fas fa-plus"></i>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg p-4 border">
                        <div class="flex items-center justify-between">
                            <h4 class="">Why Choose Us</h4>
                            <i class="fas fa-plus"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Left Content - Car Listings -->
        <div class="xl:w-3/4">
            <div class="mb-6 text-sm font-medium">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Rent a Car With Driver in Dubai</h2>
            </div>

            <!-- Car Listings -->
            <div class="space-y-6">

                <!-- List Item -->
                @foreach($services_category->services as $service)
                    <div class="bg-white rounded-lg overflow-hidden transition-all duration-300 border">
                        <div class="flex flex-col md:flex-row h-full image-slider">
                            <!-- Image Slider -->
                            <div class="w-100 md:w-60 flex-shrink-0 image-slider max-h-[288px]">
                                <div class="slider-container h-full">
                                    <div class="slider-wrapper">
                                        @foreach($service->vehicle->images as $image)
                                            <img src="{{ $image->image_url }}" alt="{{ $service->vehicle->name }}" class="w-full h-full object-cover">
                                        @endforeach
                                    </div>
                                    <div class="slider-dots">
                                        @foreach($service->vehicle->images as $index => $image)
                                            <div class="slider-dot @if($index === 0) active @endif"></div>
                                        @endforeach
                                    </div>
                                </div>

                                
                            </div>
                            
                            <!-- Content -->
                            <div class="flex-1 flex flex-col min-h-0">
                                <!-- Main Content Area -->
                                <div class="p-4 md:p-6">
                                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 h-full">

                                        <div class="lg:col-span-2 flex flex-col text-gray-800">
                                            <div class="mb-4">
                                                <a href="{{route('service_details',[$service->id, slugify($service->name)])}}" class="text-xl font-medium text-gray-900 mb-1">
                                                    {{ $service->name}}
                                                </a>
                                            </div>    

                                            <div class="flex flex-wrap gap-2 mb-4">
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
                                            <div class="text-sm text-gray-700 flex flex-row md:flex-col flex-1 mb-4 lg:mb-0">
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
                                        
                                        <!-- Right Column: Pricing -->
                                        <div class="lg:col-span-1">
                                            <div class="space-y-1">
                                                <div class="rounded-sm">
                                                    <div class="text-xl md:text-2xl font-bold primary_text_color">AED {{$service->serviceType?$service->serviceType->price:''}}</div>
                                                    <div class="text-xs text-gray-600 font-medium">{{$service->serviceType?$service->serviceType->hour_duration:''}}-Hour Service</div>
                                                </div>
                                                <div class="rounded-sm">
                                                    <div class="text-lg font-bold primary_text_color">AED {{$service->serviceType?$service->serviceType->additional_price:''}}</div>
                                                    <div class="text-xs text-gray-600 font-medium">Additional Hour</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="action-buttons px-4 md:px-6 pb-4">
                                    <div class="flex flex-col sm:flex-row justify-between items-stretch sm:items-center space-y-3 sm:space-y-0 sm:space-x-3">
                                        <!-- primary Action Buttons -->
                                    <div class="flex justify-center gap-2 mt-3 md:mt-0">
                                        <button onclick="showLocation()" class="w-10 h-10 border-2 border-gray-300 rounded-full flex items-center justify-center text-gray-600 hover:border-amber-500 hover:text-amber-500 hover:bg-amber-50 transition-all duration-300" title="Show Location">
                                            <i class="fas fa-map-marker-alt text-sm"></i>
                                        </button>
                                        <button onclick="makeCall()" class="w-10 h-10 border-2 border-gray-300 rounded-full flex items-center justify-center text-gray-600 hover:border-amber-500 hover:text-amber-500 hover:bg-amber-50 transition-all duration-300" title="Call Now">
                                            <i class="fas fa-phone text-sm"></i>
                                        </button>
                                        <a href="https://wa.me/{{ preg_replace('/\D/', '',trim(get_setting('contact_phone'))) }}" target="_blank" class="w-10 h-10 border-2 border-gray-300 rounded-full flex items-center justify-center text-gray-600 hover:border-green-500 hover:text-green-500 hover:bg-green-50 transition-all duration-300" title="WhatsApp">
                                            <i class="fab fa-whatsapp text-sm"></i>
                                        </a>
                                    </div>

                                    <!-- Primary CTA -->
                                    <button data-car="{{$service->name}}" class="quote-btn quote-btn-mobile flex-1 sm:flex-none sm:min-w-[160px] bg-primary text-white font-bold py-2.5 px-6 rounded-full text-sm">
                                        Get Quote Now
                                        <i class="fas fa-arrow-right ml-2"></i>
                                    </button>
                                        
                                    </div>
                                </div>
                            </div>
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

@endsection