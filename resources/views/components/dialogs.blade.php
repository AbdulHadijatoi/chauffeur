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
    
    <a href="#" class="flex items-center hover:underline transition-colors py-2">
        FAQ
    </a>

    <a href="#" class="flex items-center hover:underline transition-colors py-2">
        Help
    </a>
</nav>
