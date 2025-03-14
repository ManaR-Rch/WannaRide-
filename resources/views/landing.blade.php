<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>UberGo - Premium Ride Service</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Custom Styles -->
    <style>
        .hover-scale {
            transition: transform 0.2s ease-in-out;
        }
        .hover-scale:hover {
            transform: scale(1.05);
        }
        .hero-pattern {
            background-color: #111827;
            background-image: radial-gradient(rgba(255, 255, 255, 0.1) 1px, transparent 1px);
            background-size: 20px 20px;
        }
        .taxi-shadow {
            filter: drop-shadow(0 10px 8px rgb(0 0 0 / 0.5));
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-900">
    <!-- Header/Navigation -->
    <header class="bg-gray-900 text-white py-4 border-b border-gray-800">
        <div class="container mx-auto px-6 flex items-center justify-between">
            <!-- Logo -->
            <a href="/" class="text-3xl font-bold text-orange-500">UberGo</a>
            
            <!-- Navigation -->
            <nav class="hidden md:flex space-x-8">
                <a href="#features" class="hover:text-orange-400 transition">Features</a>
                <a href="#how-it-works" class="hover:text-orange-400 transition">How It Works</a>
                <a href="#testimonials" class="hover:text-orange-400 transition">Testimonials</a>
                <a href="#faq" class="hover:text-orange-400 transition">FAQ</a>
            </nav>
            
            <!-- Auth Buttons -->
            <div class="flex items-center space-x-4">
                <a href="{{ route('login') }}" class="hidden md:inline-block px-4 py-2 text-sm text-orange-500 hover:text-orange-400 transition">Login</a>
                <a href="{{ route('register') }}" class="px-4 py-2 bg-orange-500 hover:bg-orange-600 rounded-lg text-white transition hover-scale">Sign Up</a>
                <button class="md:hidden text-white">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero-pattern py-20 md:py-32">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row items-center">
                <!-- Left Content -->
                <div class="md:w-1/2 mb-12 md:mb-0">
                    <h1 class="text-4xl md:text-6xl font-extrabold text-white leading-tight mb-6">
                        Your Ride, <span class="text-orange-500">Your Way</span>
                    </h1>
                    <p class="text-xl text-gray-300 mb-8">
                        Book a comfortable ride in minutes. Fast, reliable and affordable transportation at your fingertips.
                    </p>
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                        <a href="{{ route('register') }}" class="bg-orange-500 hover:bg-orange-600 text-white py-3 px-8 rounded-lg text-lg font-semibold transition hover-scale inline-flex items-center justify-center">
                            <i class="fas fa-car-side mr-2"></i> Book a Ride
                        </a>
                        <a href="#how-it-works" class="bg-gray-800 hover:bg-gray-700 text-white py-3 px-8 rounded-lg text-lg font-semibold transition hover-scale inline-flex items-center justify-center border border-gray-700">
                            <i class="fas fa-info-circle mr-2"></i> Learn More
                        </a>
                    </div>
                    
                    <!-- App Download -->
                    <div class="mt-12">
                        <p class="text-gray-400 mb-4">Download our app:</p>
                        <div class="flex space-x-4">
                            <a href="#" class="bg-gray-800 hover:bg-gray-700 px-4 py-2 rounded-lg inline-flex items-center transition hover-scale">
                                <i class="fab fa-apple text-2xl mr-2 text-white"></i>
                                <div class="text-left">
                                    <div class="text-xs text-gray-500">Download on the</div>
                                    <div class="text-white font-semibold">App Store</div>
                                </div>
                            </a>
                            <a href="#" class="bg-gray-800 hover:bg-gray-700 px-4 py-2 rounded-lg inline-flex items-center transition hover-scale">
                                <i class="fab fa-google-play text-2xl mr-2 text-white"></i>
                                <div class="text-left">
                                    <div class="text-xs text-gray-500">Get it on</div>
                                    <div class="text-white font-semibold">Google Play</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Right Content - Taxi Illustration -->
                <div class="md:w-1/2 flex justify-center">
                    <div class="relative">
                        <!-- Taxi Car SVG -->
                        <svg class="w-full max-w-lg taxi-shadow" viewBox="0 0 800 500" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <!-- Road -->
                            <rect x="100" y="380" width="600" height="20" rx="2" fill="#374151" />
                            
                            <!-- Car Body -->
                            <path d="M600 330H200C170 330 150 340 140 350C130 360 120 370 110 380H690C680 370 670 360 660 350C650 340 630 330 600 330Z" fill="#1F2937" />
                            <path d="M180 330H620C640 330 650 310 650 290L630 230C620 210 600 200 580 200H220C200 200 180 210 170 230L150 290C150 310 160 330 180 330Z" fill="#F97316" />
                            
                            <!-- Windows -->
                            <path d="M590 290H530V220H580C590 220 600 230 610 240L590 290Z" fill="#111827" />
                            <path d="M210 290H270V220H220C210 220 200 230 190 240L210 290Z" fill="#111827" />
                            <rect x="280" y="220" width="240" height="70" fill="#111827" />
                            
                            <!-- Lights -->
                            <rect x="180" y="265" width="40" height="25" rx="5" fill="#FBBF24" />
                            <rect x="580" y="265" width="40" height="25" rx="5" fill="#FBBF24" />
                            
                            <!-- Wheels -->
                            <circle cx="220" cy="380" r="40" fill="#111827" />
                            <circle cx="220" cy="380" r="25" fill="#374151" />
                            <circle cx="220" cy="380" r="15" fill="#4B5563" />
                            
                            <circle cx="580" cy="380" r="40" fill="#111827" />
                            <circle cx="580" cy="380" r="25" fill="#374151" />
                            <circle cx="580" cy="380" r="15" fill="#4B5563" />
                            
                            <!-- Taxi Sign -->
                            <rect x="375" y="190" width="50" height="20" rx="5" fill="#FBBF24" />
                            <text x="382" y="205" fill="#111827" font-family="Arial" font-weight="bold" font-size="14">TAXI</text>
                        </svg>
                        
                        <!-- Animated Elements -->
                        <div class="absolute bottom-10 left-1/4 animate-bounce">
                            <div class="h-2 w-2 bg-orange-400 rounded-full"></div>
                        </div>
                        <div class="absolute bottom-14 right-1/4 animate-bounce" style="animation-delay: 0.5s">
                            <div class="h-2 w-2 bg-orange-400 rounded-full"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="bg-gray-800 py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-white mb-12">Why Choose <span class="text-orange-500">UberGo</span>?</h2>
            
            <div class="grid md:grid-cols-3 gap-10">
                <!-- Feature 1 -->
                <div class="bg-gray-900 rounded-xl p-6 shadow-lg border border-gray-700 hover-scale">
                    <div class="w-14 h-14 bg-orange-500 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-bolt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Fast Pickup</h3>
                    <p class="text-gray-400">Get a ride at your doorstep within minutes of booking. Our drivers are always nearby.</p>
                </div>
                
                <!-- Feature 2 -->
                <div class="bg-gray-900 rounded-xl p-6 shadow-lg border border-gray-700 hover-scale">
                    <div class="w-14 h-14 bg-orange-500 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-shield-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Safety First</h3>
                    <p class="text-gray-400">All our drivers are verified and vehicles regularly inspected. Your safety is our priority.</p>
                </div>
                
                <!-- Feature 3 -->
                <div class="bg-gray-900 rounded-xl p-6 shadow-lg border border-gray-700 hover-scale">
                    <div class="w-14 h-14 bg-orange-500 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-dollar-sign text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Affordable Rates</h3>
                    <p class="text-gray-400">Enjoy competitive pricing with no hidden charges. Pay only for what you see.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section id="how-it-works" class="bg-gray-900 py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-white mb-4">How It Works</h2>
            <p class="text-center text-gray-400 mb-12 max-w-2xl mx-auto">Getting a ride with U