@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="flex flex-col md:flex-row gap-4 max-w-6xl mx-auto md:-mt-10">
    <!-- Card 1: Flexible Pick-Up & Drop-Off -->
    <div class="bg-red-50 rounded-2xl p-6 flex-1 relative">
        <div class="absolute top-6 right-6">
            <div class="bg-red-500 rounded-full w-10 h-10 flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </div>
        </div>
        <h3 class="text-gray-800 text-xl font-semibold mb-4 pr-16">Flexible Pick-Up & Drop-Off</h3>
        <p class="text-gray-600 text-sm leading-relaxed">Choose locations and times that suit your schedule. Well-maintained, modern vehicles equipped with the latest features.</p>
    </div>

    <!-- Card 2: Business Travel Solutions -->
    <div class="bg-blue-50 rounded-2xl p-6 flex-1 relative">
        <div class="absolute top-6 right-6">
            <div class="bg-black rounded-full w-10 h-10 flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
            </div>
        </div>
        <h3 class="text-gray-800 text-xl font-semibold mb-4 pr-16">Business Travel Solutions</h3>
        <p class="text-gray-600 text-sm leading-relaxed">Special rates and services for businesses, making travel easier for employee.Streamlined invoicing for business rentals.</p>
    </div>

    <!-- Card 3: Flexible Rental Periods -->
    <div class="bg-red-50 rounded-2xl p-6 flex-1 relative">
        <div class="absolute top-6 right-6">
            <div class="bg-red-500 rounded-full w-10 h-10 flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
        <h3 class="text-gray-800 text-xl font-semibold mb-4 pr-16">Flexible Rental Periods</h3>
        <p class="text-gray-600 text-sm leading-relaxed">Rent by the hour, day, week, or month, depending on your needs. Availability for spontaneous trips or urgent needs.</p>
    </div>
</div>

<div class="flex flex-col lg:flex-row max-w-6xl mx-auto md:mt-10">
    <div class="lg:w-1/2 mx-auto relative p-4 m-auto">
        <!-- Container for the image grid -->
        <div class="grid grid-cols-2">
            <!-- Top left image -->
            <div class="relative overflow-hidden rounded-[70px] rounded-tl-none rounded-br-none aspect-square">
                <img src="https://images.unsplash.com/photo-1494905998402-395d579af36f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
                    alt="Woman at car dealership" class="w-full h-full object-cover">
            </div>
            
            <!-- Top right image -->
            <div class="relative overflow-hidden rounded-[70px] rounded-tr-none rounded-bl-none aspect-square">
                <img src="https://images.unsplash.com/photo-1449824913935-59a10b8d2000?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
                    alt="Customer handshake" class="w-full h-full object-cover">
            </div>
            
            <!-- Bottom left image -->
            <div class="relative overflow-hidden rounded-[70px] rounded-bl-none rounded-tr-none aspect-square">
                <img src="https://images.unsplash.com/photo-1494905998402-395d579af36f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
                    alt="Luxury car at night" class="w-full h-full object-cover">
            </div>
            
            <!-- Bottom right image -->
            <div class="relative overflow-hidden rounded-[70px] rounded-br-none rounded-tl-none aspect-square">
                <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
                    alt="Happy man driving" class="w-full h-full object-cover">
            </div>
        </div>
        
        <!-- Floating circular badge -->
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-10">
            <div class="bg-red-500 rounded-full w-40 h-40 flex flex-col items-center justify-center text-white shadow-2xl">
                <div class="text-4xl font-bold mb-1">10+</div>
                <div class="text-center text-sm leading-tight">
                    Years of<br>Experience
                </div>
            </div>
        </div>
    </div>


    <!-- Right side - Content -->
    <div class="lg:w-1/2 p-8 lg:p-12 flex flex-col justify-center">
        <!-- Header -->
        <div class="flex items-center mb-6">
            <div class="w-6 h-6 border-2 border-red-500 rounded-sm flex items-center justify-center mr-3">
                <div class="w-2 h-2 bg-red-500 rounded-sm"></div>
            </div>
            <span class="text-red-500 font-medium">Get to know about Us</span>
        </div>

        <!-- Main heading -->
        <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6 leading-tight">
            Provide high-quality vehicles & service to make your journeys seamless & enjoyable.
        </h2>

        <!-- Description -->
        <p class="text-gray-600 mb-8 leading-relaxed">
            We offer a diverse range of vehicles, from compact cars ideal for city driving to spacious SUVs for family trips and luxurious models for special events. All our cars are well-maintained, regularly serviced
        </p>

        <!-- Features list -->
        <div class="space-y-6 mb-8">
            <!-- Convenient Locations -->
            <div class="flex items-start">
                <div class="bg-green-500 rounded-full w-6 h-6 flex items-center justify-center mr-4 mt-1">
                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div>
                    <h4 class="font-semibold text-gray-900 mb-1">Convenient Locations</h4>
                    <p class="text-gray-600 text-sm">Multiple pick-up and drop-off locations to suit your travel plans.</p>
                </div>
            </div>

            <!-- Customer-Centric Service -->
            <div class="flex items-start">
                <div class="bg-orange-500 rounded-full w-6 h-6 flex items-center justify-center mr-4 mt-1">
                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div>
                    <h4 class="font-semibold text-gray-900 mb-1">Customer-Centric Service</h4>
                    <p class="text-gray-600 text-sm">Our team is always ready to assist you with any inquiries or needs.</p>
                </div>
            </div>

            <!-- Safety First -->
            <div class="flex items-start">
                <div class="bg-purple-500 rounded-full w-6 h-6 flex items-center justify-center mr-4 mt-1">
                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div>
                    <h4 class="font-semibold text-gray-900 mb-1">Safety First</h4>
                    <p class="text-gray-600 text-sm">All vehicles undergo thorough cleaning and maintenance to ensure your safety.</p>
                </div>
            </div>
        </div>

        <!-- Bottom section with buttons and reviews -->
        <div class="flex flex-col items-start justify-between">

            <!-- Reviews section -->
            <div class="flex items-center mt-3">
                <!-- Customer avatars -->
                <div class="flex -space-x-2 mr-3">
                    <img src="https://images.unsplash.com/photo-1449824913935-59a10b8d2000?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
                        alt="Customer" class="w-10 h-10 rounded-full border-2 border-white object-cover">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80" 
                        alt="Customer" class="w-10 h-10 rounded-full border-2 border-white object-cover">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80" 
                        alt="Customer" class="w-10 h-10 rounded-full border-2 border-white object-cover">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80" 
                        alt="Customer" class="w-10 h-10 rounded-full border-2 border-white object-cover">
                </div>
                
                <!-- Rating and reviews -->
                <div>
                    <div class="flex items-center mb-1">
                        <div class="flex text-red-500">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        </div>
                        <span class="ml-1 text-sm font-semibold">5.0</span>
                    </div>
                    <p class="text-xs text-gray-600">2K+ Reviews</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="px-4 bg-gray-100 py-6">
    <div class="max-w-6xl mx-auto flex flex-col lg:flex-row items-center justify-between gap-8">
        <!-- Left side text -->
        <div class="lg:w-1/3">
            <h2 class="text-xl md:text-3xl font-medium text-gray-800 leading-relaxed">
                Click to learn more about our sustainability partners
            </h2>
        </div>
        
        <!-- Right side logos -->
        <div class="lg:w-2/3 flex items-center justify-end gap-8 lg:gap-12">
            <!-- South Pole logo -->
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center">
                    <div class="w-6 h-6 bg-white rounded-full relative">
                        <div class="absolute top-1 left-1 w-1 h-1 bg-blue-600 rounded-full"></div>
                        <div class="absolute top-1 right-1 w-1 h-1 bg-blue-600 rounded-full"></div>
                        <div class="absolute bottom-1 left-1/2 transform -translate-x-1/2 w-1 h-1 bg-blue-600 rounded-full"></div>
                    </div>
                </div>
                <span class="text-xl font-medium text-blue-600">south pole</span>
            </div>
            
            <!-- Vertical divider -->
            <div class="hidden lg:block w-px h-12 bg-gray-300"></div>
            
            <!-- Leaders for Climate Action logo -->
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 flex items-center justify-center">
                    <div class="relative">
                        <!-- Circular rings -->
                        <div class="w-8 h-8 border-2 border-gray-800 rounded-full"></div>
                        <div class="absolute top-1 left-1 w-6 h-6 border-2 border-gray-800 rounded-full"></div>
                        <div class="absolute top-2 left-2 w-4 h-4 border-2 border-gray-800 rounded-full"></div>
                    </div>
                </div>
                <div class="text-gray-800">
                    <div class="text-sm font-semibold leading-tight">leaders</div>
                    <div class="text-xs leading-tight">for climate</div>
                    <div class="text-sm font-semibold leading-tight">action</div>
                </div>
            </div>
            
            <!-- Vertical divider -->
            <div class="hidden lg:block w-px h-12 bg-gray-300"></div>
            
            <!-- The Climate Pledge logo -->
            <div class="flex items-center">
                <div class="text-climate-green">
                    <div class="text-lg font-bold tracking-wider mb-0">THE</div>
                    <div class="text-base font-bold tracking-wider mb-0">CLIMATE</div>
                    <div class="text-lg font-bold tracking-wider mb-0">PLEDGE</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="px-4 py-6">
    <div class="max-w-6xl mx-auto">
        <!-- Main heading -->
        <h1 class="text-3xl font-medium text-gray-900 text-center mb-12">City-to-City routes</h1>
        
        <!-- Top cities section -->
        <div class="mb-12">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-medium text-gray-900">Top cities</h2>
                <a href="#" class="text-gray-600 hover:text-gray-900 underline">See all</a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- New York -->
                <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                    <div class="h-32 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1496442226666-8d4d0e62e6e9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
                            alt="New York skyline" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-900 mb-1">Dubai</h3>
                        <p class="text-sm text-gray-500">21 routes to/from this city</p>
                    </div>
                </div>
                
                <!-- London -->
                <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                    <div class="h-32 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1513635269975-59663e0ac1ad?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
                            alt="London skyline" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-900 mb-1">Abu Dhabi</h3>
                        <p class="text-sm text-gray-500">25 routes to/from this city</p>
                    </div>
                </div>
                
                <!-- Paris -->
                <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                    <div class="h-32 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1496442226666-8d4d0e62e6e9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
                            alt="Paris skyline with bridge" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-900 mb-1">Ras Al Khaimah</h3>
                        <p class="text-sm text-gray-500">16 routes to/from this city</p>
                    </div>
                </div>
                
                <!-- Dubai -->
                <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                    <div class="h-32 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
                            alt="Dubai marina skyline" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-900 mb-1">Fujairah</h3>
                        <p class="text-sm text-gray-500">15 routes to/from this city</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Top routes section -->
        <div class="mb-12">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-medium text-gray-900">Top routes</h2>
                <a href="#" class="text-gray-600 hover:text-gray-900 underline">See all</a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Column 1 -->
                <div class="space-y-4">
                    <div class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-center space-x-2 mb-2">
                            <span class="font-semibold text-gray-900">New York</span>
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                            <span class="font-semibold text-gray-900">Philadelphia</span>
                        </div>
                        <p class="text-sm text-gray-500">1h 50m • 59 mi</p>
                    </div>
                    
                    <div class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-center space-x-2 mb-2">
                            <span class="font-semibold text-gray-900">New York</span>
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                            <span class="font-semibold text-gray-900">East Hampton</span>
                        </div>
                        <p class="text-sm text-gray-500">2h 30m • 68 mi</p>
                    </div>
                </div>
                
                <!-- Column 2 -->
                <div class="space-y-4">
                    <div class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-center space-x-2 mb-2">
                            <span class="font-semibold text-gray-900">London</span>
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                            <span class="font-semibold text-gray-900">Oxford</span>
                        </div>
                        <p class="text-sm text-gray-500">1h 45m • 96 km</p>
                    </div>
                    
                    <div class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-center space-x-2 mb-2">
                            <span class="font-semibold text-gray-900">Manchester</span>
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                            <span class="font-semibold text-gray-900">Liverpool</span>
                        </div>
                        <p class="text-sm text-gray-500">1h • 57 km</p>
                    </div>
                </div>
                
                <!-- Column 3 -->
                <div class="space-y-4">
                    <div class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-center space-x-2 mb-2">
                            <span class="font-semibold text-gray-900">Paris</span>
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                            <span class="font-semibold text-gray-900">Reims</span>
                        </div>
                        <p class="text-sm text-gray-500">2h 15m • 145 km</p>
                    </div>
                    
                    <div class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-center space-x-2 mb-2">
                            <span class="font-semibold text-gray-900">Nice</span>
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                            <span class="font-semibold text-gray-900">Saint Tropez</span>
                        </div>
                        <p class="text-sm text-gray-500">1h 40m • 112 km</p>
                    </div>
                </div>
                
                <!-- Column 4 -->
                <div class="space-y-4">
                    <div class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-center space-x-2 mb-2">
                            <span class="font-semibold text-gray-900">Dubai</span>
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                            <span class="font-semibold text-gray-900">Abu Dhabi</span>
                        </div>
                        <p class="text-sm text-gray-500">1h 15m • 136 km</p>
                    </div>
                    
                    <div class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-center space-x-2 mb-2">
                            <span class="font-semibold text-gray-900">Brisbane</span>
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                            <span class="font-semibold text-gray-900">Gold Coast</span>
                        </div>
                        <p class="text-sm text-gray-500">1h • 79 km</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Bottom CTA section -->
        <div class="bg-white rounded-lg p-8 shadow-sm">
            <div class="flex flex-col lg:flex-row items-center justify-between">
                <div class="mb-6 lg:mb-0">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Have a route in mind?</h3>
                    <p class="text-gray-600">Enter your pickup and drop-off locations to see the price.</p>
                </div>
                <button class="bg-gradient-to-r from-red-500 to-orange-500 hover:from-red-600 hover:to-orange-600 font-medium transition-colors text-white px-8 py-3 rounded-lg">
                    Book a City-to-City ride
                </button>
            </div>
        </div>
    </div>
</div>

<div class="px-4 py-6">
    <div class="max-w-6xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <!-- Review 1 -->
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <!-- App Store badge and stars -->
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center space-x-2">
                        <div class="bg-black text-white px-2 py-1 rounded text-xs font-medium flex items-center space-x-1">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"/>
                            </svg>
                            <span>App Store</span>
                        </div>
                    </div>
                </div>
                
                <!-- Stars and title -->
                <div class="mb-4">
                    <div class="flex items-center space-x-1 mb-2">
                        <svg class="w-4 h-4 text-red-600 fill-current" viewBox="0 0 20 20">
                            <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                        </svg>
                        <svg class="w-4 h-4 text-red-600 fill-current" viewBox="0 0 20 20">
                            <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                        </svg>
                        <svg class="w-4 h-4 text-red-600 fill-current" viewBox="0 0 20 20">
                            <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                        </svg>
                        <svg class="w-4 h-4 text-red-600 fill-current" viewBox="0 0 20 20">
                            <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                        </svg>
                        <svg class="w-4 h-4 text-red-600 fill-current" viewBox="0 0 20 20">
                            <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900">"Best car service ever..."</h3>
                </div>
                
                <!-- Review text -->
                <p class="text-gray-600 leading-relaxed text-sm">
                    "Probably the best car service I have experienced ever. Arranged for an airport pick up from LHR to Cambridge and was thoroughly impressed with all aspects of the service."
                </p>
            </div>
            
            <!-- Review 2 -->
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <!-- App Store badge and stars -->
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center space-x-2">
                        <div class="bg-black text-white px-2 py-1 rounded text-xs font-medium flex items-center space-x-1">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"/>
                            </svg>
                            <span>App Store</span>
                        </div>
                    </div>
                </div>
                
                <!-- Stars and title -->
                <div class="mb-4">
                    <div class="flex items-center space-x-1 mb-2">
                        <svg class="w-4 h-4 text-red-600 fill-current" viewBox="0 0 20 20">
                            <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                        </svg>
                        <svg class="w-4 h-4 text-red-600 fill-current" viewBox="0 0 20 20">
                            <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                        </svg>
                        <svg class="w-4 h-4 text-red-600 fill-current" viewBox="0 0 20 20">
                            <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                        </svg>
                        <svg class="w-4 h-4 text-red-600 fill-current" viewBox="0 0 20 20">
                            <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                        </svg>
                        <svg class="w-4 h-4 text-red-600 fill-current" viewBox="0 0 20 20">
                            <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900">"Dubai ↔ Abu Dhabi"</h3>
                </div>
                
                <!-- Review text -->
                <p class="text-gray-600 leading-relaxed text-sm">
                    "Amazing service levels. Prompt, courteous, clean and reliable. Went from Dubai to Abu Dhabi and back. [The car] was perfect - smooth as silk."
                </p>
            </div>
            
            <!-- Review 3 -->
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <!-- App Store badge and stars -->
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center space-x-2">
                        <div class="bg-black text-white px-2 py-1 rounded text-xs font-medium flex items-center space-x-1">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"/>
                            </svg>
                            <span>App Store</span>
                        </div>
                    </div>
                </div>
                
                <!-- Stars and title -->
                <div class="mb-4">
                    <div class="flex items-center space-x-1 mb-2">
                        <svg class="w-4 h-4 text-red-600 fill-current" viewBox="0 0 20 20">
                            <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                        </svg>
                        <svg class="w-4 h-4 text-red-600 fill-current" viewBox="0 0 20 20">
                            <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                        </svg>
                        <svg class="w-4 h-4 text-red-600 fill-current" viewBox="0 0 20 20">
                            <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                        </svg>
                        <svg class="w-4 h-4 text-red-600 fill-current" viewBox="0 0 20 20">
                            <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                        </svg>
                        <svg class="w-4 h-4 text-red-600 fill-current" viewBox="0 0 20 20">
                            <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900">"Icing on the cake"</h3>
                </div>
                
                <!-- Review text -->
                <p class="text-gray-600 leading-relaxed text-sm">
                    "On the day of pick up the driver was on time and waiting at my doorstep. I used them again to pick us up from JFK to take us back home and got the same experience. They get a 5 star rating for me!"
                </p>
            </div>
            
        </div>
    </div>
</div>
@endsection     