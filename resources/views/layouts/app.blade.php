<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>@yield('title', ucfirst(request()->segment(1) ?: 'Home')) - {{ config('app.name', 'Chauffeur') }}</title>

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
    @include('components.topbar')
    @include('components.header')
    
    <main>
        @include('components.hero-section')
        @yield('content')
    </main>
    
    @include('components.footer')
    
    @include('components.scripts')
    @stack('scripts')
</body>
</html>
