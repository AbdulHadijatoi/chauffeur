<div class="bg-white md:bg-transparent overflow-hidden p-4 md:p-0 max-w-6xl mx-auto relative z-30 md:-translate-y-[100px]">
    

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