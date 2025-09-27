<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            primary: '#1e40af',
                            primary: '#f97316',
                            accent: '#059669',
                            dark: '#0f172a',
                            'primary-dark': '#1e3a8a',
                            'primary-dark': '#ea580c'
                        },
                        animation: {
                            'fade-in': 'fadeIn 0.5s ease-in-out',
                            'slide-up': 'slideUp 0.5s ease-out',
                            'pulse-slow': 'pulse 3s ease-in-out infinite'
                        },
                        keyframes: {
                            fadeIn: {
                                '0%': { opacity: '0' },
                                '100%': { opacity: '1' }
                            },
                            slideUp: {
                                '0%': { transform: 'translateY(20px)', opacity: '0' },
                                '100%': { transform: 'translateY(0)', opacity: '1' }
                            }
                        }
                    }
                }
            }
        </script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <style>
            .glass-effect {
                backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(10px);
            }
            .gradient-text {
                background: linear-gradient(45deg, #f97316, #1e40af);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }
            .car-card:hover {
                transform: translateY(-4px);
                box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            }
            
            /* Image Slider Styles */
            .image-slider {
                position: relative;
                overflow: hidden;
            }
            
            .slider-container {
                width: 100%;
                height: 100%;
                overflow: hidden;
                position: relative;
            }
            
            .slider-wrapper {
                display: flex;
                transition: transform 0.3s ease-in-out;
                height: 100%;
            }
            
            .slider-wrapper img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                flex-shrink: 0;
            }
            
            .slider-dots {
                position: absolute;
                bottom: 12px;
                left: 50%;
                transform: translateX(-50%);
                display: flex;
                gap: 6px;
                z-index: 10;
            }
            
            .slider-dot {
                width: 8px;
                height: 8px;
                border-radius: 50%;
                background-color: rgba(255, 255, 255, 0.5);
                cursor: pointer;
                transition: all 0.3s ease;
                border: 1px solid rgba(255, 255, 255, 0.8);
            }
            
            .slider-dot.active {
                background-color: white;
                transform: scale(1.3);
                border-color: white;
            }
            
            .slider-dot:hover {
                background-color: rgba(255, 255, 255, 0.8);
            }
            
            /* Responsive adjustments */
            @media (max-width: 768px) {
                .car-listing-item {
                    height: auto !important;
                }
                
                .car-listing-item.flex {
                    flex-direction: column;
                }
                
                .image-slider {
                    border-radius: 0.75rem 0.75rem 0 0;
                    height: 200px;
                    width: 100%;
                    flex-shrink: 0;
                }
                
                .car-content {
                    padding: 1rem;
                }
                
                .car-details-grid {
                    grid-template-columns: 1fr;
                    gap: 1rem;
                }
                
                .pricing-section {
                    width: 100%;
                    margin-top: 1rem;
                }
                
                .pricing-grid {
                    display: grid;
                    grid-template-columns: 1fr 1fr;
                    gap: 0.75rem;
                }
                
                .action-buttons {
                    justify-content: center;
                    gap: 0.5rem;
                    flex-wrap: wrap;
                    padding: 1rem;
                }
                
                .action-buttons button {
                    min-width: 44px;
                    min-height: 44px;
                }
                
                .quote-btn-mobile {
                    order: -1;
                    width: 100%;
                    margin-bottom: 0.75rem;
                }
            }
        </style>
    </head>
    <body class="font-sans bg-[#fafafa]">
        <!-- Top Bar -->
        <!-- <div class="bg-gradient-to-r from-red-600 to-orange-600 text-white text-gray-700 text-sm h-8 align-middle flex items-center"> -->
        <div class="bg-black text-white text-sm h-8 align-middle flex items-center">
            <div class="container max-w-6xl mx-auto flex justify-between items-center">
                <div class="flex items-center space-x-6">
                    <span class="flex items-center hidden md:flex"><i class="fas fa-clock mr-1 text-white"></i>24/7 Service</span>
                    <span class="items-center"><i class="fas fa-map-marker-alt mr-1 text-white"></i>Dubai, UAE</span>
                    <span class="items-center"><i class="fas fa-phone mr-1 text-white"></i>+971 50 123 4567</span>
                    <span class="flex items-center hidden md:flex"><i class="fas fa-envelope mr-1 text-white"></i>info@chauffeur.com</span>
                </div>
            </div>
        </div>

        <!-- Header -->
        <header class="w-full bg-white text-sm px-4">
            <div class="container max-w-6xl mx-auto">
                <div class="flex items-center justify-between py-3">
                    <!-- Logo -->
                    <div class="flex items-center">
                        <a href="{{url('/')}}" class="rounded-sm font-bold text-md">
                            CHAUFFEUR
                        </a>
                    </div>

                    <!-- Mobile Menu Button -->
                    <button class="lg:hidden p-2 rounded-sm transition-colors" id="mobile-menu-btn">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>

                    <!-- Desktop Navigation -->
                    <nav class="hidden lg:flex items-center space-x-8">
                        <a href="{{url('/')}}" class="flex items-center hover:underline transition-colors py-2">
                            Home
                        </a>

                        <a href="#" class="flex items-center hover:underline transition-colors py-2">
                            About Us
                        </a>


                        <div class="relative group">
                            <a href="#" class="flex items-center hover:underline transition-colors py-2">
                                Services
                            </a>
                            <div class="absolute top-full left-0 bg-white shadow-xl rounded-sm w-64 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 mt-2 z-50 border">
                                <div class="py-3">
                                    <a href="{{url('listing')}}" class="block px-4 py-3 hover:bg-gray-50 transition-colors">Airport Transfer</a>
                                    <a href="{{url('listing')}}" class="block px-4 py-3 hover:bg-gray-50 transition-colors">City to City Ride</a>
                                    <a href="{{url('listing')}}" class="block px-4 py-3 hover:bg-gray-50 transition-colors">Hourly Basis</a>
                                    <a href="{{url('listing')}}" class="block px-4 py-3 hover:bg-gray-50 transition-colors">Chauffeur Services</a>
                                </div>
                            </div>
                        </div>
                        
                        <!-- <div class="relative group">
                            <a href="#" class="flex items-center hover:underline transition-colors py-2">
                                Car Brands <i class="fas fa-chevron-down ml-1 text-xs"></i>
                            </a>
                            <div class="absolute top-full left-0 bg-white shadow-sm rounded-sm w-80 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 mt-2 z-50 border">
                                <div class="grid grid-cols-2 gap-2 p-6">
                                    <a href="#" class="block py-2 hover:underline transition-colors">BMW</a>
                                    <a href="#" class="block py-2 hover:underline transition-colors">Mercedes</a>
                                    <a href="#" class="block py-2 hover:underline transition-colors">Audi</a>
                                    <a href="#" class="block py-2 hover:underline transition-colors">Toyota</a>
                                    <a href="#" class="block py-2 hover:underline transition-colors">Lamborghini</a>
                                    <a href="#" class="block py-2 hover:underline transition-colors">Ferrari</a>
                                </div>
                            </div>
                        </div> -->
                        
                        <a href="#" class="flex items-center hover:underline transition-colors py-2">
                            FAQ
                        </a>

                        <a href="#" class="flex items-center hover:underline transition-colors py-2">
                            Help
                        </a>
                        
                        <!-- <button class="bg-primary text-white px-6 py-3 rounded-sm font-semibold hover:from-primary-dark hover:to-primary transform 101%] transition-all duration-200 ">
                            Login
                        </button> -->
                    </nav>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="max-w-6xl lg:hidden hidden bg-white border-t text-sm font-semibold">
                <div class="px-4 py-4 space-y-2">
                    <a href="{{url('/')}}" class="block py-3 border-b text-gray-700 hover:underline transition-colors">Home</a>
                    <a href="#" class="block py-3 border-b text-gray-700 hover:underline transition-colors">About Us</a>

                    <!-- Services dropdown for mobile -->
                    <div>
                    <span class="block py-3 border-b text-gray-700">Services</span>
                    <div class="pl-4 space-y-2">
                        <a href="{{url('listing')}}" class="block py-2 text-gray-700 hover:underline transition-colors">Airport Transfer</a>
                        <a href="{{url('listing')}}" class="block py-2 text-gray-700 hover:underline transition-colors">City to City Ride</a>
                        <a href="{{url('listing')}}" class="block py-2 text-gray-700 hover:underline transition-colors">Hourly Basis</a>
                        <a href="{{url('listing')}}" class="block py-2 text-gray-700 hover:underline transition-colors">Chauffeur Services</a>
                    </div>
                    </div>

                    <a href="#" class="block py-3 border-b text-gray-700 hover:underline transition-colors">FAQ</a>
                    <a href="#" class="block py-3 border-b text-gray-700 hover:underline transition-colors">Help</a>
                </div>
            </div>
        </header>

        <!-- Hero Section -->
        <section class="relative bg-black via-gray-800 text-white px-4">
            <div class="absolute inset-0 bg-black/60 z-10"></div>
            <div class="absolute inset-0" style="background-image: url('https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80'); background-size: cover; background-position: center;"></div>
            <div class="max-w-6xl container mx-auto relative z-10 h-96 md:h-[400px] align-start flex flex-col justify-center">
                <div class="w-100 items-center font-light">
                    <h2 class="text-3xl md:text-4xl font-semibold mb-2">
                        Chauffeur Service Dubai
                    </h2>
                    
                    <p>From airport transfers to hourly bookings, we ensure a seamless ride every time.</p>
                    <p class="mt-4">Experience punctuality, privacy, and luxury tailored to your needs across the UAE.</p>
                    <h3 class="text-2xl">Redefining Chauffeur</h3>
                </div>
            </div>

        </section>

        <div class="bg-white md:bg-transparent overflow-hidden p-4 md:p-0 max-w-6xl mx-auto relative z-30 md:-translate-y-[100px]">

            <!-- Tab Navigation -->
            <div class="flex md:w-fit w-full text-md rounded-tl-lg rounded-tr-lg">
                <button onclick="switchTab('oneway')" id="tab-oneway" class="tab-btn flex-1 h-full text-white px-4 py-3 whitespace-nowrap transition-all duration-300 rounded-tl-md bg-gradient-to-r from-red-500 to-orange-500 hover:from-red-600 hover:to-orange-600 font-medium transition-colors opacity-90">
                    Hourly Basis
                </button>
                <button onclick="switchTab('airport-transfer')" id="tab-airport-transfer" class="tab-btn flex-1 h-full text-white px-4 py-3 whitespace-nowrap transition-all duration-300 bg-black opacity-90">
                    Airport Transfer
                </button>
                <button onclick="switchTab('point-to-point')" id="tab-point-to-point" class="tab-btn flex-1 h-full text-white px-4 py-3 whitespace-nowrap transition-all duration-300 bg-black opacity-90 rounded-tr-md">
                    Point to Point
                </button>
            </div>

            <!-- Form Content -->
            <div class="p-8 shadow-md bg-white rounded-b-lg">
                <div class="grid grid-cols-1 lg:grid-cols-4 gap-3">
                    
                    <!-- Left Column - Pickup and Stops -->
                    <div class="lg:col-span-1 space-y-4">
                        <!-- Pickup Field -->
                        <div class="relative">
                            <label class="block text-gray-600 font-medium mb-2" id="pickup-label">
                                Pickup
                            </label>
                            <div class="relative">
                                <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <input
                                    type="text"
                                    placeholder="Address, Airport, Hotel"
                                    class="w-full pl-10 pr-10 py-3 border-r border-secondary focus:border-transparent outline-none transition-all"
                                />
                                <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5 cursor-pointer hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Middle Column - Drop Off -->
                    <div id="dropoff-container" class="lg:col-span-2">
                        <label class="block text-gray-600 font-medium mb-2" id="dropoff-label">
                            Drop Off
                        </label>
                        <div class="relative">
                            <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <input
                                type="text"
                                placeholder="Address, Airport, Hotel"
                                id="dropoff-input"
                                class="w-full pl-10 pr-10 py-3 border-r border-secondary focus:border-transparent outline-none transition-all"
                            />
                            <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5 cursor-pointer hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- Right Column - Date -->
                    <div class="lg:col-span-1">
                        <label class="block text-gray-600 font-medium mb-2" id="date-label">
                            Date
                        </label>
                        <div class="relative">
                            <input
                                type="date"
                                value="2025-09-26"
                                id="date-input"
                                class="w-full px-4 py-3 border-none focus:border-transparent outline-none transition-all"
                            />
                        </div>
                        
                        <!-- Return Date (hidden by default) -->
                        <div id="return-date-container" class="mt-4 hidden">
                            <label class="block text-gray-600 font-medium mb-2">
                                Return Date
                            </label>
                            <input
                                type="date"
                                value="2025-09-27"
                                class="w-full px-4 py-3 border-none focus:border-transparent outline-none transition-all"
                            />
                        </div>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row gap-2 align-middle w-full mt-2">
                    <!-- Dynamic Stops Container -->
                    <div id="stops-container" class="flex flex-col md:flex-row align-middle gap-3"></div>

                    <!-- Add Stop Button -->
                    <div class="flex">
                        <button
                            onclick="addStop()"
                            class="flex items-center font-medium transition-colors whitespace-nowrap"
                        >
                            Add Stop
                        </button>
                    </div>
                </div>
            </div>
            <!-- Submit Button -->
            <div class="flex justify-end mt-2">
                <button class="w-full md:w-auto px-8 py-3 text-white rounded-lg transform duration-200 bg-gradient-to-r from-red-500 to-orange-500 hover:from-red-600 hover:to-orange-600 font-medium transition-colors">
                    Book Now
                </button>
            </div>
        </div>

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
                    <!-- Buttons -->
                    <div class="flex space-x-4 mb-4 sm:mb-0">
                        <button class="bg-black whitespace-nowrap text-white px-6 py-1 rounded-full flex items-center space-x-2 hover:bg-gray-700 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                            </svg>
                            <span>Add Your Car</span>
                        </button>
                        <button class="bg-red-500 whitespace-nowrap text-white px-6 py-3 rounded-full flex items-center space-x-2 hover:bg-gradient-to-r from-red-500 to-orange-500 hover:from-red-600 hover:to-orange-600 font-medium transition-colors transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                            </svg>
                            <span>Book a Car</span>
                        </button>
                    </div>

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
                                <h3 class="font-semibold text-gray-900 mb-1">New York</h3>
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
                                <h3 class="font-semibold text-gray-900 mb-1">London</h3>
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
                                <h3 class="font-semibold text-gray-900 mb-1">Paris</h3>
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
                                <h3 class="font-semibold text-gray-900 mb-1">Dubai</h3>
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
        
        <!-- Footer -->
        <footer class="bg-black text-white py-16 mt-16">
            <div class="max-w-6xl container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Company Info -->
                    <div>
                        <h4 class="uppercase font-medium">Chauffeur</h4>
                        <p class="mb-4 text-sm font-light">Premium car rental and chauffeur services in Dubai. Your trusted partner for luxury transportation across the UAE.</p>
                        <div class="flex space-x-4">
                            <a href="#" class="hover:underline transition-colors">
                                <i class="fab fa-facebook "></i>
                            </a>
                            <a href="#" class="hover:underline transition-colors">
                                <i class="fab fa-twitter "></i>
                            </a>
                            <a href="#" class="hover:underline transition-colors">
                                <i class="fab fa-instagram "></i>
                            </a>
                            <a href="#" class="hover:underline transition-colors">
                                <i class="fab fa-linkedin "></i>
                            </a>
                            <a href="#" class="hover:underline transition-colors">
                                <i class="fab fa-youtube "></i>
                            </a>
                        </div>
                    </div>

                    <!-- Services -->
                    <div>
                        <h3 class="font-medium mb-1">Our Services</h3>
                        <ul class="space-y-2 text-sm font-light">
                            <li><a href="#" class="hover:underline transition-colors">Chauffeur Service</a></li>
                            <li><a href="#" class="hover:underline transition-colors">Airport Transfer</a></li>
                            <li><a href="#" class="hover:underline transition-colors">Hourly Service</a></li>
                            <li><a href="#" class="hover:underline transition-colors">Point-to-Point</a></li>
                            <li><a href="#" class="hover:underline transition-colors">Car Rental</a></li>
                            <li><a href="#" class="hover:underline transition-colors">Luxury Cars</a></li>
                            <li><a href="#" class="hover:underline transition-colors">Sports Cars</a></li>
                            <li><a href="#" class="hover:underline transition-colors">Yacht Charter</a></li>
                        </ul>
                    </div>

                    <!-- Quick Links -->
                    <div>
                        <h3 class="font-medium mb-1">Quick Links</h3>
                        <ul class="space-y-2 text-sm font-light">
                            <li><a href="#" class="hover:underline transition-colors">About Us</a></li>
                            <li><a href="#" class="hover:underline transition-colors">Contact Us</a></li>
                            <li><a href="#" class="hover:underline transition-colors">Our Fleet</a></li>
                            <li><a href="#" class="hover:underline transition-colors">Locations</a></li>
                            <li><a href="#" class="hover:underline transition-colors">Pricing</a></li>
                            <li><a href="#" class="hover:underline transition-colors">Blog</a></li>
                            <li><a href="#" class="hover:underline transition-colors">Career</a></li>
                            <li><a href="#" class="hover:underline transition-colors">FAQ</a></li>
                        </ul>
                    </div>

                    <!-- Contact Info -->
                    <div>
                        <h3 class="font-medium mb-1">Contact Info</h3>
                        <div class="space-y-3 text-sm font-light">
                            <div class="flex items-start">
                                <i class="fas fa-map-marker-alt mr-3 mt-1 text-white"></i>
                                <span>Business Bay, Dubai<br>United Arab Emirates</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-phone mr-3 text-white"></i>
                                <a href="tel:+971501234567" class="hover:underline transition-colors">+971 50 123 4567</a>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-envelope mr-3 text-white"></i>
                                <a href="mailto:info@Chauffeur.com" class="hover:underline transition-colors">info@Chauffeur.com</a>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-clock mr-3 text-white"></i>
                                <span>24/7 Customer Support</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fab fa-whatsapp mr-3 text-white"></i>
                                <a href="https://wa.me/971501234567" class="hover:underline transition-colors">WhatsApp Support</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bottom Bar -->
                <div class="mt-8 pt-8">
                    <div class="flex flex-col md:flex-row justify-start items-center">
                        <div class="flex flex-wrap gap-6 text-sm font-light">
                            <p>&copy; 2025 Chauffeur. All rights reserved.</p>
                            <a href="#" class="hover:underline transition-colors">Privacy Policy</a>
                            <a href="#" class="hover:underline transition-colors">Terms of Service</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Scripts -->
        <script>
            // Mobile menu toggle
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            
            if (mobileMenuBtn && mobileMenu) {
                mobileMenuBtn.addEventListener('click', () => {
                    mobileMenu.classList.toggle('hidden');
                });

                // Close mobile menu when clicking outside
                document.addEventListener('click', (e) => {
                    if (!mobileMenuBtn.contains(e.target) && !mobileMenu.contains(e.target)) {
                        mobileMenu.classList.add('hidden');
                    }
                });
            }

            // Image slider functionality
            function initImageSliders() {
                const sliders = document.querySelectorAll('.image-slider');
                
                sliders.forEach((slider, sliderIndex) => {
                    const wrapper = slider.querySelector('.slider-wrapper');
                    const images = wrapper.querySelectorAll('img');
                    const dots = slider.querySelectorAll('.slider-dot');
                    
                    let currentIndex = 0;
                    const totalImages = images.length;
                    
                    function updateSlider() {
                        wrapper.style.transform = `translateX(-${currentIndex * 100}%)`;
                        
                        // Update dots
                        dots.forEach((dot, index) => {
                            dot.classList.toggle('active', index === currentIndex);
                        });
                    }
                    
                    function nextImage() {
                        currentIndex = (currentIndex + 1) % totalImages;
                        updateSlider();
                    }
                    
                    function prevImage() {
                        currentIndex = (currentIndex - 1 + totalImages) % totalImages;
                        updateSlider();
                    }
                    
                    function goToSlide(index) {
                        currentIndex = index;
                        updateSlider();
                    }
                    
                    // Initialize
                    updateSlider();
                    
                    // Dot navigation
                    dots.forEach((dot, index) => {
                        dot.addEventListener('click', (e) => {
                            e.preventDefault();
                            e.stopPropagation();
                            goToSlide(index);
                        });
                    });
                    
                    // Touch/swipe functionality
                    let startX = 0;
                    let currentX = 0;
                    let isDragging = false;
                    let startTime = 0;
                    
                    const container = slider.querySelector('.slider-container');
                    
                    // Touch events for mobile
                    container.addEventListener('touchstart', (e) => {
                        startX = e.touches[0].clientX;
                        isDragging = true;
                        startTime = Date.now();
                    }, { passive: true });
                    
                    container.addEventListener('touchmove', (e) => {
                        if (!isDragging) return;
                        currentX = e.touches[0].clientX;
                    }, { passive: true });
                    
                    container.addEventListener('touchend', handleEnd);
                    
                    // Mouse events for desktop
                    container.addEventListener('mousedown', (e) => {
                        startX = e.clientX;
                        isDragging = true;
                        startTime = Date.now();
                        container.style.cursor = 'grabbing';
                        e.preventDefault();
                    });
                    
                    container.addEventListener('mousemove', (e) => {
                        if (!isDragging) return;
                        e.preventDefault();
                        currentX = e.clientX;
                    });
                    
                    container.addEventListener('mouseup', handleEnd);
                    container.addEventListener('mouseleave', handleEnd);
                    
                    function handleEnd() {
                        if (!isDragging) return;
                        
                        const diffX = startX - currentX;
                        const diffTime = Date.now() - startTime;
                        const threshold = 50;
                        const velocity = Math.abs(diffX) / diffTime;
                        
                        if (Math.abs(diffX) > threshold || velocity > 0.5) {
                            if (diffX > 0) {
                                nextImage();
                            } else {
                                prevImage();
                            }
                        }
                        
                        isDragging = false;
                        container.style.cursor = 'grab';
                    }
                    
                    // Auto-play functionality
                    let autoPlayInterval;
                    
                    function startAutoPlay() {
                        autoPlayInterval = setInterval(nextImage, 4000);
                    }
                    
                    function stopAutoPlay() {
                        clearInterval(autoPlayInterval);
                    }
                    
                    // Start auto-play and pause on hover
                    // startAutoPlay();
                    // slider.addEventListener('mouseenter', stopAutoPlay);
                    // slider.addEventListener('mouseleave', startAutoPlay);
                    
                    // Keyboard navigation
                    slider.addEventListener('keydown', (e) => {
                        if (e.key === 'ArrowLeft') {
                            prevImage();
                        } else if (e.key === 'ArrowRight') {
                            nextImage();
                        }
                    });
                    
                    // Make slider focusable for keyboard navigation
                    slider.setAttribute('tabindex', '0');
                    container.style.cursor = 'grab';
                });
            }
            
            // Quote modal functionality
            const quoteModal = document.getElementById('quote-modal');
            const selectedCarInput = document.getElementById('selected-car');
            const closeModalBtn = document.getElementById('close-modal');
            const cancelQuoteBtn = document.getElementById('cancel-quote');
            const quoteForm = document.getElementById('quote-form');
            
            // Open quote modal
            document.addEventListener('click', (e) => {
                if (e.target.classList.contains('quote-btn')) {
                    e.preventDefault();
                    const carName = e.target.getAttribute('data-car');
                    selectedCarInput.value = carName + ' with Driver';
                    quoteModal.classList.remove('hidden');
                    document.body.style.overflow = 'hidden';
                }
            });
            
            // Close quote modal functions
            function closeQuoteModal() {
                quoteModal.classList.add('hidden');
                document.body.style.overflow = '';
            }
            
            if (closeModalBtn) {
                closeModalBtn.addEventListener('click', closeQuoteModal);
            }
            
            if (cancelQuoteBtn) {
                cancelQuoteBtn.addEventListener('click', closeQuoteModal);
            }
            
            // Close modal when clicking outside
            if (quoteModal) {
                quoteModal.addEventListener('click', (e) => {
                    if (e.target === quoteModal) {
                        closeQuoteModal();
                    }
                });
            }
            
            // Handle form submission
            if (quoteForm) {
                quoteForm.addEventListener('submit', (e) => {
                    e.preventDefault();
                    
                    // Show success message
                    alert('Thank you for your quote request! We will contact you shortly.');
                    
                    // Reset form and close modal
                    quoteForm.reset();
                    closeQuoteModal();
                });
            }
            
            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
            
            // Initialize everything when DOM is loaded
            document.addEventListener('DOMContentLoaded', () => {
                initImageSliders();
                
                // Set minimum date for date input to today
                const dateInput = document.querySelector('input[type="date"]');
                if (dateInput) {
                    const today = new Date().toISOString().split('T')[0];
                    dateInput.setAttribute('min', today);
                }
            });
            
            // Add loading animation
            window.addEventListener('load', () => {
                document.body.classList.add('loaded');
            });
            
            // Intersection Observer for animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);
            
            // Observe car cards for scroll animations
            document.querySelectorAll('.car-card').forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(card);
            });
        </script>

        <script>
            let stopCounter = 0;
            let currentTab = 'oneway';

            // Tab switching functionality
            function switchTab(tabName) {
                currentTab = tabName;
                
                // Reset all tabs to inactive style
                document.querySelectorAll('.tab-btn').forEach(btn => {
                    btn.classList.remove(
                        'bg-gradient-to-r',
                        'from-red-500',
                        'to-orange-500',
                        'hover:from-red-600',
                        'hover:to-orange-600',
                        'font-medium',
                        'transition-colors'
                    );
                    btn.classList.add('bg-black');
                });

                // Set active tab style
                const activeTab = document.getElementById(`tab-${tabName}`);
                activeTab.classList.remove('bg-black');
                activeTab.classList.add(
                    'bg-gradient-to-r',
                    'from-red-500',
                    'to-orange-500',
                    'hover:from-red-600',
                    'hover:to-orange-600',
                    'font-medium',
                    'transition-colors'
                );


                // Update form labels and fields based on tab
                const pickupLabel = document.getElementById('pickup-label');
                const dropoffContainer = document.getElementById('dropoff-container');
                const dropoffLabel = document.getElementById('dropoff-label');
                const dateLabel = document.getElementById('date-label');
                const dropoffInput = document.getElementById('dropoff-input');
                const dateInput = document.getElementById('date-input');
                const returnDateContainer = document.getElementById('return-date-container');

                switch(tabName) {
                    case 'oneway':
                        pickupLabel.textContent = 'Pickup';
                        dropoffLabel.textContent = 'Drop Off';
                        dateLabel.textContent = 'Date';
                        dropoffInput.placeholder = 'Address, Airport, Hotel';
                        dateInput.type = 'date';
                        dateInput.value = '2025-09-26';
                        returnDateContainer.classList.add('hidden');
                        break;
                    
                    case 'airport-transfer':
                        pickupLabel.textContent = 'Start Location';
                        dropoffLabel.textContent = 'Duration';
                        dateLabel.textContent = 'Date & Time';
                        dropoffInput.placeholder = 'Duration (e.g., 4 hours)';
                        dateInput.type = 'datetime-local';
                        dateInput.value = '2025-09-26T09:00';
                        returnDateContainer.classList.add('hidden');
                        break;
                    
                    case 'point-to-point':
                        pickupLabel.textContent = 'Pickup';
                        dropoffLabel.textContent = 'Destination';
                        dateLabel.textContent = 'Outbound Date';
                        dropoffInput.placeholder = 'Address, Airport, Hotel';
                        dateInput.type = 'date';
                        dateInput.value = '2025-09-26';
                        returnDateContainer.classList.remove('hidden');
                        break;
                }
            }

            // Add stop functionality
            function addStop() {
                stopCounter++;
                const stopsContainer = document.getElementById('stops-container');
                
                const stopHTML = `
                    <div class="relative stop-item" id="stop-${stopCounter}">
                        <div class="relative">
                            <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <input
                                type="text"
                                placeholder="Stop Location"
                                class="w-full pl-10 pr-10 py-3 md:border-r md:border-secondary focus:border-transparent outline-none transition-all"
                            />
                            <svg onclick="removeStop(${stopCounter})" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5 cursor-pointer hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </div>
                    </div>
                `;
                
                stopsContainer.insertAdjacentHTML('beforeend', stopHTML);
            }

            // Remove specific stop
            function removeStop(id) {
                const stopElement = document.getElementById(`stop-${id}`);
                if (stopElement) {
                    stopElement.remove();
                }
                
                // Hide remove button if no stops left
                const stopsContainer = document.getElementById('stops-container');
            }

            // Remove all stops
            function removeAllStops() {
                const stopsContainer = document.getElementById('stops-container');
                
                stopsContainer.innerHTML = '';
            }
        </script>
    </body>
</html>
