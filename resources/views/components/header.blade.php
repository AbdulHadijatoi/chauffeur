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

            @include('components.navigation')
        </div>
    </div>

    @include('components.mobile-menu')
</header>
