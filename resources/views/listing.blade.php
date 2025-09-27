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
                    <a href="#" class="block py-3 border-b text-gray-700 hover:underline transition-colors">Rent a Car</a>
                    <a href="#" class="block py-3 border-b text-gray-700 hover:underline transition-colors">Buy a Car</a>
                    <a href="#" class="block py-3 border-b text-gray-700 hover:underline transition-colors">Car Brands</a>
                    <a href="#" class="block py-3 border-b text-gray-700 hover:underline transition-colors">Car with Driver</a>
                    <div class="py-4 space-y-3">
                        <button class="bg-gradient-to-r from-red-500 to-orange-500 hover:from-red-600 hover:to-orange-600 font-medium transition-colors text-white px-6 py-3 rounded-sm w-full">
                            Book Now
                        </button>
                        <!-- <button class="hover:bg-gradient-to-r bg-primary to-primary-dark text-white px-6 py-3 rounded-sm font-semibold w-full transition-all">
                            Login
                        </button> -->
                    </div>
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

        
    <!-- Main Content -->
    <div class="max-w-6xl container mx-auto px-4 py-12">
        <div class="flex flex-col xl:flex-row gap-8">
            
            <!-- Left Content - Car Listings -->
            <div class="xl:w-3/4">
                <div class="mb-6 text-sm font-medium">
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">Rent a Car With Driver in Dubai</h2>
                    <div class="flex flex-wrap gap-2">
                        <span class="bg-gray-200 text-gray-700 px-4 py-2 rounded-full">Mercedes Benz with Driver</span>
                        <span class="bg-gray-200 text-gray-700 px-4 py-2 rounded-full">Mercedes V class with Driver</span>
                        <span class="bg-gray-200 text-gray-700 px-4 py-2 rounded-full">Mercedes S Class with Driver</span>
                        <span class="bg-gray-200 text-gray-700 px-4 py-2 rounded-full">Rolls Royce with Driver</span>
                        <button class="bg-gray-200 text-gray-700 px-4 py-2 rounded-full font-semibold underline">View more</button>
                    </div>
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
                                                    <div class="text-xl md:text-2xl font-bold text-primary">AED 800</div>
                                                    <div class="text-sm text-gray-600 font-medium">5-Hour Service</div>
                                                </div>
                                                <div class="rounded-sm p-2">
                                                    <div class="text-lg font-bold text-primary">AED 1300</div>
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
                                        <div class="flex justify-center sm:justify-end space-x-3 py-3 text-lg">
                                            <button class="flex items-center justify-center w-[50px] h-[50px] border rounded-full hover:border-black hover:bg-black hover:text-white transition-all duration-300" onclick="showLocation()" title="Show Location">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </button>
                                            <button class="flex items-center justify-center w-[50px] h-[50px] border rounded-full hover:border-black hover:bg-black hover:text-white transition-all duration-300" onclick="makeCall()" title="Call Now">
                                                <i class="fas fa-phone"></i>
                                            </button>
                                            <button class="flex items-center justify-center w-[50px] h-[50px] border rounded-full hover:border-black hover:bg-black transition-all duration-300 group" onclick="openWhatsApp()" title="WhatsApp">
                                                <i class="fab fa-whatsapp group-hover:text-white transition-colors duration-300"></i>
                                            </button>
                                        </div>

                                        <!-- Primary Action Button -->
                                        <button class="quote-btn quote-btn-mobile bg-gray-800 text-white px-6 py-3 rounded-full hover:from-gray-900 hover:to-black transform hover:scale-[101%] transition-all duration-300  text-sm flex-1 sm:flex-none sm:min-w-[120px]" data-car="Nissan Patrol Titanium 2023" onclick="getQuote()">
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
                    <button class="w-full bg-black text-white py-3 rounded-md hover:from-primary-dark hover:to-primary transform hover:scale-[101%] transition-all">
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
    </body>
</html>
