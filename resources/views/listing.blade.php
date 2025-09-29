@extends('layouts.app')

@section('title', 'Home')

@section('content')

<!-- Main Content -->
<div class="max-w-6xl container mx-auto px-4 pb-12 mt-0">
    <div class="flex flex-col xl:flex-row gap-8">
        
        <!-- Left Content - Car Listings -->
        <div class="xl:w-3/4">
            <div class="mb-6 text-sm font-medium">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Rent a Car With Driver in Dubai</h2>
                <!-- <div class="flex flex-wrap gap-2">
                    <span class="bg-gray-200 text-gray-700 px-4 py-2 rounded-full">Mercedes Benz with Driver</span>
                    <span class="bg-gray-200 text-gray-700 px-4 py-2 rounded-full">Mercedes V class with Driver</span>
                    <span class="bg-gray-200 text-gray-700 px-4 py-2 rounded-full">Mercedes S Class with Driver</span>
                    <span class="bg-gray-200 text-gray-700 px-4 py-2 rounded-full">Rolls Royce with Driver</span>
                    <button class="bg-gray-200 text-gray-700 px-4 py-2 rounded-full font-semibold underline">View more</button>
                </div> -->
            </div>

            <!-- Car Listings -->
            <div class="space-y-6">
                <!-- Nissan Patrol -->
                <div class="bg-white rounded-lg overflow-hidden transition-all duration-300 border md:h-80 transform hover:scale-[101%] transition-all">
                    <div class="flex flex-col md:flex-row h-full image-slider">
                        <!-- Image Slider -->
                        <div class="w-100 md:w-80 flex-shrink-0 image-slider">
                            <div class="slider-container h-full">
                                <div class="slider-wrapper">
                                    <img src="https://images.unsplash.com/photo-1606664515524-ed2f786a0bd6?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Nissan Patrol" class="w-full h-full object-cover">
                                    <img src="https://images.unsplash.com/photo-1605559424843-9e4c228bf1c2?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Nissan Patrol Interior" class="w-full h-full object-cover">
                                    <img src="https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Nissan Patrol Side" class="w-full h-full object-cover">
                                    <img src="https://images.unsplash.com/photo-1568605117036-5fe5e7bab0b7?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Nissan Patrol Back" class="w-full h-full object-cover">
                                </div>
                                <div class="slider-dots">
                                    <div class="slider-dot active"></div>
                                    <div class="slider-dot"></div>
                                    <div class="slider-dot"></div>
                                    <div class="slider-dot"></div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Content -->
                        <div class="flex-1 flex flex-col min-h-0">
                            <!-- Main Content Area -->
                            <div class="flex-1 p-4 md:p-6">
                                <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 h-full">
                                    <!-- Left Column: Title & Details -->
                                    <div class="lg:col-span-2 flex flex-col text-gray-800">
                                        <h3 class="text-lg md:text-xl font-bold  mb-2">Nissan Patrol Titanium 2023</h3>
                                        <div class="flex items-center text-sm mb-3 flex-wrap gap-3">
                                            <span class="font-medium">Full-size SUV</span>
                                            <span class="flex items-center"><i class="fas fa-users mr-1"></i>8</span>
                                            <span class="flex items-center"><i class="fas fa-suitcase mr-1"></i>3</span>
                                        </div>
                                        <div class="space-y-2 text-sm text-gray-700 flex-1 mb-4 lg:mb-0">
                                            <div class="flex items-center"><i class="fas fa-check-circle mr-2"></i>All Inclusive Pricing</div>
                                            <div class="flex items-center"><i class="fas fa-user-tie mr-2"></i>Professional Chauffeur</div>
                                            <div class="flex items-center"><i class="fas fa-shield-check mr-2"></i>No Surge Pricing</div>
                                        </div>
                                    </div>
                                    
                                    <!-- Right Column: Pricing -->
                                    <div class="lg:col-span-1">
                                        <div class="space-y-1">
                                            <div class="rounded-sm p-2">
                                                <div class="text-xl md:text-2xl font-bold primary_text_color">AED 800</div>
                                                <div class="text-sm text-gray-600 font-medium">5-Hour Service</div>
                                            </div>
                                            <div class="rounded-sm p-2">
                                                <div class="text-lg font-bold primary_text_color">AED 1300</div>
                                                <div class="text-sm text-gray-600 font-medium">10-Hour Service</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="action-buttons px-4 md:px-6 py-4">
                                <div class="flex flex-col sm:flex-row justify-between items-stretch sm:items-center space-y-3 sm:space-y-0 sm:space-x-3">
                                    <!-- primary Action Buttons -->
                                    <div class="flex justify-center sm:justify-end space-x-3 py-3 text-lg primary_text_color">
                                        <button class="flex items-center justify-center w-[50px] h-[50px] border primary_border_color rounded-full hover:primary_color hover:text-white transition-all duration-300" onclick="showLocation()" title="Show Location">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </button>
                                        <button class="flex items-center justify-center w-[50px] h-[50px] border primary_border_color rounded-full hover:primary_color hover:text-white transition-all duration-300" onclick="makeCall()" title="Call Now">
                                            <i class="fas fa-phone"></i>
                                        </button>
                                        <button class="flex items-center justify-center w-[50px] h-[50px] border primary_border_color rounded-full hover:primary_color transition-all duration-300 group" onclick="openWhatsApp()" title="WhatsApp">
                                            <i class="fab fa-whatsapp group-hover:text-white transition-colors duration-300"></i>
                                        </button>
                                    </div>

                                    <!-- Primary Action Button -->
                                    <button class="quote-btn quote-btn-mobile primary_color text-white px-6 py-3 rounded-full hover:from-gray-900 hover:to-black transform hover:scale-[101%] transition-all duration-300  text-sm flex-1 sm:flex-none sm:min-w-[120px]" data-car="Nissan Patrol Titanium 2023" onclick="getQuote()">
                                        Get Quote
                                    </button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                <button class="w-full primary_color text-white py-3 rounded-md">
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
    </div>
</div>

<!-- Quote Modal -->
<div id="quote-modal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="p-8">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-3xl font-bold">Request Quote</h3>
                <button id="close-modal" class="text-gray-400 hover:text-gray-600 p-2 rounded-full hover:bg-gray-100 transition-all">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </div>
            
            <form id="quote-form" class="space-y-6">
                <div>
                    <label class="block text-lg font-semibold text-gray-700 mb-3">Selected Vehicle</label>
                    <input type="text" id="selected-car" readonly class="w-full border-2 border-gray-200 rounded-sm px-4 py-3 bg-gray-50 text-gray-700 font-medium">
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-lg font-semibold text-gray-700 mb-3">Full Name *</label>
                        <input type="text" required class="w-full border-2 border-gray-200 rounded-sm px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    </div>
                    
                    <div>
                        <label class="block text-lg font-semibold text-gray-700 mb-3">Phone Number *</label>
                        <input type="tel" required class="w-full border-2 border-gray-200 rounded-sm px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    </div>
                </div>
                
                <div>
                    <label class="block text-lg font-semibold text-gray-700 mb-3">Email Address *</label>
                    <input type="email" required class="w-full border-2 border-gray-200 rounded-sm px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                </div>
                
                <div>
                    <label class="block text-lg font-semibold text-gray-700 mb-3">Service Type *</label>
                    <select required class="w-full border-2 border-gray-200 rounded-sm px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        <option value="">Select Service</option>
                        <option value="5-hour">5-Hour Service</option>
                        <option value="10-hour">10-Hour Service</option>
                        <option value="full-day">Full Day Service</option>
                        <option value="airport-transfer">Airport Transfer</option>
                    </select>
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-lg font-semibold text-gray-700 mb-3">Pickup Date *</label>
                        <input type="date" required class="w-full border-2 border-gray-200 rounded-sm px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-lg font-semibold text-gray-700 mb-3">Pickup Time *</label>
                        <input type="time" required class="w-full border-2 border-gray-200 rounded-sm px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    </div>
                </div>
                
                <div>
                    <label class="block text-lg font-semibold text-gray-700 mb-3">Pickup Location *</label>
                    <input type="text" required placeholder="Enter pickup address" class="w-full border-2 border-gray-200 rounded-sm px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                </div>
                
                <div>
                    <label class="block text-lg font-semibold text-gray-700 mb-3">Drop-off Location</label>
                    <input type="text" placeholder="Enter drop-off address (if applicable)" class="w-full border-2 border-gray-200 rounded-sm px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                </div>
                
                <div>
                    <label class="block text-lg font-semibold text-gray-700 mb-3">Number of Passengers</label>
                    <select class="w-full border-2 border-gray-200 rounded-sm px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        <option value="1">1 Passenger</option>
                        <option value="2">2 Passengers</option>
                        <option value="3">3 Passengers</option>
                        <option value="4">4 Passengers</option>
                        <option value="5">5+ Passengers</option>
                    </select>
                </div>
                
                <div>
                    <label class="block text-lg font-semibold text-gray-700 mb-3">Special Requirements</label>
                    <textarea rows="4" placeholder="Any special requests or requirements..." class="w-full border-2 border-gray-200 rounded-sm px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent resize-none"></textarea>
                </div>
                
                <div class="flex gap-4 pt-6">
                    <button type="button" id="cancel-quote" class="flex-1 border-2 border-gray-300 text-gray-700 py-4 px-6 rounded-sm font-semibold hover:bg-gray-50 transition-all">
                        Cancel
                    </button>
                    <button type="submit" class="flex-1 bg-primary to-primary-dark text-white py-4 px-6 rounded-sm font-semibold hover:from-primary-dark hover:to-primary transform hover:scale-[101%] transition-all ">
                        Send Quote Request
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection