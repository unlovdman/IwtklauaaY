<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>I want to know,learn and understand anything about You Journey - Learn & Connect</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <style>
        .theme-red {
            --primary-color: #EF4444;
            --secondary-color: #DC2626;
            --bg-color: #FEF2F2;
            --gradient: linear-gradient(135deg, #EF4444, #B91C1C);
        }
        .theme-scarlett {
            --primary-color: #991B1B;
            --secondary-color: #7F1D1D;
            --bg-color: #FFF1F2;
            --gradient: linear-gradient(135deg, #991B1B, #BE123C);
        }
        .theme-purple {
            --primary-color: #8B5CF6;
            --secondary-color: #7C3AED;
            --bg-color: #EDE9FE;
            --gradient: linear-gradient(135deg, #8B5CF6, #6D28D9);
        }
        .theme-blue {
            --primary-color: #3B82F6;
            --secondary-color: #2563EB;
            --bg-color: #EFF6FF;
            --gradient: linear-gradient(135deg, #3B82F6, #1D4ED8);
        }
        .theme-green {
            --primary-color: #10B981;
            --secondary-color: #059669;
            --bg-color: #ECFDF5;
            --gradient: linear-gradient(135deg, #10B981, #047857);
        }
        .theme-sunset {
            --primary-color: #FF6B6B;
            --secondary-color: #FF8E53;
            --bg-color: #FFF5F5;
            --gradient: linear-gradient(135deg, #FF6B6B, #FF8E53);
        }
        .theme-ocean {
            --primary-color: #4FB4FF;
            --secondary-color: #38A3FF;
            --bg-color: #F0F9FF;
            --gradient: linear-gradient(135deg, #4FB4FF, #0085FF);
        }

        .theme-switcher {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 1000;
        }

        .theme-button {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 3px solid white;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .theme-button::after {
            content: '\f53f'; 
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            color: white;
            font-size: 20px;
        }

        .theme-button:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(0,0,0,0.3);
        }

        .theme-options {
            position: absolute;
            bottom: 70px;
            right: 0;
            display: none;
            flex-direction: column;
            gap: 12px;
            padding: 15px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        .theme-options::after {
            content: '';
            position: absolute;
            bottom: -8px;
            right: 20px;
            width: 16px;
            height: 16px;
            background: rgba(255, 255, 255, 0.95);
            transform: rotate(45deg);
        }

        .theme-options.active {
            display: flex;
            animation: slideIn 0.3s ease;
        }

        .theme-options .theme-button {
            width: 40px;
            height: 40px;
            margin: 0;
            transition: all 0.3s ease;
        }

        .theme-options .theme-button::after {
            display: none;
        }

        .theme-options .theme-button:hover {
            transform: scale(1.15);
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .theme-options .theme-button {
            position: relative;
        }

        .theme-options .theme-button::before {
            content: attr(data-theme);
            position: absolute;
            right: 50px;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 4px 12px;
            border-radius: 4px;
            font-size: 14px;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .theme-options .theme-button:hover::before {
            opacity: 1;
            visibility: visible;
            right: 55px;
        }

        .carousel-container {
            overflow: hidden;
            position: relative;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
        }

        .quotes-carousel {
            display: flex;
            transition: transform 0.5s ease;
        }

        .quote-slide {
            flex: 0 0 100%;
            padding: 3rem;
            opacity: 0;
            transition: all 0.5s ease;
            position: relative;
        }

        .quote-slide::before {
            content: '"';
            position: absolute;
            top: 1rem;
            left: 2rem;
            font-size: 4rem;
            opacity: 0.2;
            font-family: Georgia, serif;
        }

        .quote-slide::after {
            content: '"';
            position: absolute;
            bottom: 1rem;
            right: 2rem;
            font-size: 4rem;
            opacity: 0.2;
            font-family: Georgia, serif;
        }

        .quote-slide.active {
            opacity: 1;
            transform: scale(1);
        }

        .quote-slide p {
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            line-height: 1.6;
        }

        .quote-slide span {
            display: inline-block;
            margin-top: 1rem;
            padding: 0.5rem 1.5rem;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            backdrop-filter: blur(5px);
        }

        @keyframes fadeInOut {
            0% { 
                opacity: 0;
                transform: translateY(20px);
            }
            20%, 80% { 
                opacity: 1;
                transform: translateY(0);
            }
            100% { 
                opacity: 0;
                transform: translateY(-20px);
            }
        }

        .hover-float {
            transition: transform 0.3s ease;
        }
        .hover-float:hover {
            transform: translateY(-10px);
        }

        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
        }

        .hero-pattern {
            background-image: url('data:image/svg+xml,%3Csvg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="%239C92AC" fill-opacity="0.05" fill-rule="evenodd"%3E%3Ccircle cx="3" cy="3" r="3"/%3E%3Ccircle cx="13" cy="13" r="3"/%3E%3C/g%3E%3C/svg%3E');
        }

        .feature-card {
            border-radius: 20px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.95);
        }
        .feature-card:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        
        .mysterious-text {
            background: linear-gradient(120deg, #fff, var(--secondary-color), #fff);
            background-size: 200% auto;
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: shine 3s linear infinite;
            text-shadow: 0 0 30px rgba(255,255,255,0.3);
        }

        @keyframes shine {
            to {
                background-position: 200% center;
            }
        }

        .animate-spin-slow {
            animation: spin 4s linear infinite;
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        .logo-float {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        .mysterious-text:hover {
            animation: glow 2s ease-in-out infinite alternate;
        }

        @keyframes glow {
            from {
                text-shadow: 0 0 5px #fff,
                             0 0 10px #fff,
                             0 0 15px var(--primary-color),
                             0 0 20px var(--primary-color);
            }
            to {
                text-shadow: 0 0 10px #fff,
                             0 0 20px #fff,
                             0 0 30px var(--primary-color),
                             0 0 40px var(--primary-color);
            }
        }

        .logo-container {
            position: relative;
            transition: all 0.5s ease;
        }

        .logo-container:hover {
            transform: scale(1.1);
        }

        .logo-container:hover .silent-music {
            animation: pulse 2s infinite;
        }

        .silent-music {
            position: relative;
        }

        .silent-music .line {
            position: absolute;
            top: 50%;
            left: -15%;
            width: 130%;
            height: 2px;
            background: white;
            transform: rotate(-45deg);
            opacity: 0.8;
        }

        .love-message {
            position: relative;
            overflow: hidden;
        }

        .love-message::after {
            content: '❤';
            position: absolute;
            right: -20px;
            opacity: 0;
            animation: heartbeat 4s infinite;
        }

        @keyframes heartbeat {
            0%, 100% { 
                opacity: 0;
                transform: scale(1);
            }
            50% { 
                opacity: 1;
                transform: scale(1.2);
            }
        }

        .mysterious-text {
            background: linear-gradient(120deg, #fff, var(--secondary-color), #fff);
            background-size: 200% auto;
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: shine 3s linear infinite;
            text-shadow: 0 0 30px rgba(255,255,255,0.3);
        }

        .logo-float {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-5px) rotate(5deg);
            }
        }

        .animate-spin-slow {
            animation: spin 8s linear infinite;
        }

        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        @keyframes pulse {
            0%, 100% { opacity: 0.5; }
            50% { opacity: 1; }
        }

        .mysterious-text:hover {
            animation: glow 2s ease-in-out infinite alternate;
        }

        @keyframes glow {
            from {
                text-shadow: 0 0 5px #fff,
                             0 0 10px #fff,
                             0 0 15px var(--primary-color),
                             0 0 20px var(--primary-color);
            }
            to {
                text-shadow: 0 0 10px #fff,
                             0 0 20px #fff,
                             0 0 30px var(--primary-color),
                             0 0 40px var(--primary-color);
            }
        }

        .hero-pattern h2 {
            line-height: 1.4;
            padding-bottom: 0.5rem;
            margin-bottom: 1rem;
        }

        @media (max-width: 768px) {
            .hero-pattern h2 {
                line-height: 1.3;
                padding-bottom: 0.25rem;
            }
        }

        .glass {
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            background-color: rgba(var(--primary-rgb), 0.9);
        }

        .theme-switcher {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 1000;
        }

        .hero-pattern {
            margin-top: 80px;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 80px;
        }

        @media (max-width: 768px) {
            .hero-pattern {
                margin-top: 70px;
            }
        }
    </style>
</head>
<body class="bg-[var(--bg-color)] transition-all duration-500">
    <nav class="fixed w-full bg-gradient-to-r from-[var(--primary-color)] to-[var(--secondary-color)] text-white p-4 z-50 top-0 glass">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <div class="relative w-12 h-12 logo-container">
                    <div class="absolute inset-0 animate-spin-slow opacity-30">
                        <i class="fas fa-circle text-3xl"></i>
                    </div>
                    
                    <div class="absolute inset-0 logo-float flex items-center justify-center">
                        <i class="fas fa-hand-holding-heart text-2xl"></i>
                    </div>
                    
                    <div class="absolute -top-1 -right-1 text-xs opacity-75 silent-music">
                        <i class="fas fa-music"></i>
                        <div class="line"></div>
                    </div>
                </div>
                
                <div class="flex flex-col">
                    <h1 class="text-2xl font-bold tracking-wider animate__animated animate__fadeIn">
                        <span class="mysterious-text">IWTKLAUAAY</span>
                    </h1>
                    <p class="text-xs italic opacity-75 animate__animated animate__fadeIn animate__delay-1s love-message">
                        I Want To Know, Learn And Understand Anything About You
                    </p>
                </div>
            </div>
            
            <div class="hidden md:flex space-x-6">
                <a href="#learn" class="hover:text-opacity-80 transition-all">
                    <i class="fas fa-hands mr-2"></i>Learn
                </a>
                <a href="#community" class="hover:text-opacity-80 transition-all">
                    <i class="fas fa-heart mr-2"></i>Connect
                </a>
                <a href="#about" class="hover:text-opacity-80 transition-all">
                    <i class="fas fa-infinity mr-2"></i>Journey
                </a>
            </div>
        </div>
    </nav>

    <section class="pt-20 pb-16 px-4 hero-pattern">
        <div class="container mx-auto text-center">
            <div data-aos="fade-down" data-aos-duration="1000">
                <h2 class="text-4xl md:text-5xl font-bold mb-4 bg-gradient-to-r from-[var(--primary-color)] to-[var(--secondary-color)] text-transparent bg-clip-text leading-relaxed pb-2">
                    Discover the Art of Sign Language
                </h2>
                <p class="text-lg mb-6 text-gray-600 max-w-2xl mx-auto">
                    "All the world's a stage, And all the men and women merely players" - Join us in breaking communication barriers through the beauty of sign language.
                </p>
            </div>
            <div class="flex justify-center space-x-4" data-aos="fade-up" data-aos-duration="1000">
                <a href="#learn" class="bg-[var(--primary-color)] text-white px-8 py-3 rounded-full hover:bg-[var(--secondary-color)] transition-all duration-300 flex items-center space-x-2">
                    <i class="fas fa-play"></i>
                    <span>Start Learning</span>
                </a>
                <a href="#community" class="border-2 border-[var(--primary-color)] text-[var(--primary-color)] px-8 py-3 rounded-full hover:bg-[var(--primary-color)] hover:text-white transition-all duration-300 flex items-center space-x-2">
                    <i class="fas fa-users"></i>
                    <span>Join Community</span>
                </a>
            </div>
        </div>
    </section>

    <section id="learn" class="py-20 px-4">
        <div class="container mx-auto grid md:grid-cols-3 gap-8">
            <div class="feature-card p-8" data-aos="fade-up" data-aos-delay="100">
                <div class="text-[var(--primary-color)] text-4xl mb-4">
                    <i class="fas fa-book-open"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4 text-[var(--primary-color)]">Basic Sign Language</h3>
                <p class="mb-4 text-gray-600">Start your journey with fundamental signs and expressions.</p>
                <a href="#" class="text-[var(--primary-color)] hover:underline flex items-center">
                    Learn more <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <div class="feature-card p-8" data-aos="fade-up" data-aos-delay="200">
                <div class="text-[var(--primary-color)] text-4xl mb-4">
                    <i class="fas fa-hands"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4 text-[var(--primary-color)]">Interactive Practice</h3>
                <p class="mb-4 text-gray-600">Practice with our AI-powered recognition system.</p>
                <a href="#" class="text-[var(--primary-color)] hover:underline flex items-center">
                    Start practicing <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <div class="feature-card p-8" data-aos="fade-up" data-aos-delay="300">
                <div class="text-[var(--primary-color)] text-4xl mb-4">
                    <i class="fas fa-users"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4 text-[var(--primary-color)]">Community Hub</h3>
                <p class="mb-4 text-gray-600">Connect with other learners and native signers.</p>
                <a href="#" class="text-[var(--primary-color)] hover:underline flex items-center">
                    Join now <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <div class="theme-switcher">
        <button id="theme-toggle" class="theme-button animate__animated animate__fadeIn" style="background: var(--gradient)"></button>
        <div class="theme-options">
            <button onclick="setTheme('theme-red')" class="theme-button" data-theme="Ruby Red" style="background: linear-gradient(135deg, #EF4444, #B91C1C)"></button>
            <button onclick="setTheme('theme-scarlett')" class="theme-button" data-theme="Scarlet" style="background: linear-gradient(135deg, #991B1B, #BE123C)"></button>
            <button onclick="setTheme('theme-purple')" class="theme-button" data-theme="Royal Purple" style="background: linear-gradient(135deg, #8B5CF6, #6D28D9)"></button>
            <button onclick="setTheme('theme-blue')" class="theme-button" data-theme="Ocean Blue" style="background: linear-gradient(135deg, #3B82F6, #1D4ED8)"></button>
            <button onclick="setTheme('theme-green')" class="theme-button" data-theme="Forest Green" style="background: linear-gradient(135deg, #10B981, #047857)"></button>
            <button onclick="setTheme('theme-sunset')" class="theme-button" data-theme="Sunset" style="background: linear-gradient(135deg, #FF6B6B, #FF8E53)"></button>
            <button onclick="setTheme('theme-ocean')" class="theme-button" data-theme="Azure" style="background: linear-gradient(135deg, #4FB4FF, #0085FF)"></button>
        </div>
    </div>

    <footer class="bg-gradient-to-r from-[var(--primary-color)] to-[var(--secondary-color)] text-white py-12">
        <div class="container mx-auto text-center">
            <div class="flex justify-center space-x-6 mb-8">
                <a href="#" class="hover:text-opacity-80"><i class="fab fa-facebook text-2xl"></i></a>
                <a href="#" class="hover:text-opacity-80"><i class="fab fa-twitter text-2xl"></i></a>
                <a href="#" class="hover:text-opacity-80"><i class="fab fa-instagram text-2xl"></i></a>
                <a href="#" class="hover:text-opacity-80"><i class="fab fa-youtube text-2xl"></i></a>
            </div>
            <p>© 2024 IWTKLAUAAY by unlovdman. All rights reserved.</p>
            <p class="mt-2 italic">"Words are easy, like the wind; Faithful friends are hard to find"</p>
        </div>
    </footer>

    <script>
        //intirial AOS
        AOS.init();

        document.addEventListener('DOMContentLoaded', function() {
            setTheme('theme-red');
        });

        const themeToggle = document.getElementById('theme-toggle');
        const themeOptions = document.querySelector('.theme-options');

        themeToggle.addEventListener('click', function() {
            themeOptions.classList.toggle('active');
        });

        document.addEventListener('click', function(event) {
            if (!event.target.closest('.theme-switcher')) {
                themeOptions.classList.remove('active');
            }
        });

        function setTheme(theme) {
            document.documentElement.className = theme;
            const computedStyle = getComputedStyle(document.documentElement);
            themeToggle.style.background = computedStyle.getPropertyValue('--gradient');
            
            themeToggle.classList.remove('animate__bounce');
            void themeToggle.offsetWidth;
            themeToggle.classList.add('animate__bounce');
            
            themeOptions.classList.remove('active');
        }

        //scroll smooth
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html> 