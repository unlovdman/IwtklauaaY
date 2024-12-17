<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar Bahasa Isyarat - Know Your Shakespeare</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <script>
        function setTheme(theme) {
            document.documentElement.className = theme;
        }
    </script>
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

        .theme-switcher {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
        }

        .theme-button {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 2px solid white;
            cursor: pointer;
            transition: all 0.3s ease;
            position: absolute;
            right: 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        
        .theme-button:hover {
            transform: scale(1.1);
            box-shadow: 0 0 10px rgba(255,255,255,0.5);
        }

        .theme-options {
            position: absolute;
            right: 0;
            top: 0;
            display: flex;
            flex-direction: column;
            gap: 2px;
            visibility: hidden;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .theme-options.active {
            visibility: visible;
            opacity: 1;
        }

        .theme-options .theme-button {
            position: relative;
            transform: scale(0);
            transition: transform 0.3s ease;
        }

        .theme-options.active .theme-button {
            transform: scale(1);
        }

        .theme-options.active .theme-button:nth-child(1) { transform: translateY(45px) scale(1); }
        .theme-options.active .theme-button:nth-child(2) { transform: translateY(90px) scale(1); }
        .theme-options.active .theme-button:nth-child(3) { transform: translateY(135px) scale(1); }
        .theme-options.active .theme-button:nth-child(4) { transform: translateY(180px) scale(1); }
        .theme-options.active .theme-button:nth-child(5) { transform: translateY(225px) scale(1); }

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
    </style>
</head>
<body class="bg-[var(--bg-color)] transition-all duration-500">
    <nav class="fixed w-full bg-gradient-to-r from-[var(--primary-color)] to-[var(--secondary-color)] text-white p-4 z-40">
        <div class="container mx-auto">
            <h1 class="text-2xl font-bold animate__animated animate__fadeIn">SignLanguage Journey</h1>
        </div>
    </nav>

    <div class="theme-switcher">
        <button id="theme-toggle" class="theme-button animate__animated animate__fadeIn" style="background: var(--gradient)"></button>
        <div class="theme-options">
            <button onclick="setTheme('theme-red')" class="theme-button" style="background: linear-gradient(135deg, #EF4444, #B91C1C)"></button>
            <button onclick="setTheme('theme-scarlett')" class="theme-button" style="background: linear-gradient(135deg, #991B1B, #BE123C)"></button>
            <button onclick="setTheme('theme-purple')" class="theme-button" style="background: linear-gradient(135deg, #8B5CF6, #6D28D9)"></button>
            <button onclick="setTheme('theme-blue')" class="theme-button" style="background: linear-gradient(135deg, #3B82F6, #1D4ED8)"></button>
            <button onclick="setTheme('theme-green')" class="theme-button" style="background: linear-gradient(135deg, #10B981, #047857)"></button>
        </div>
    </div>

    <section class="pt-24 pb-12 px-4">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold mb-6 animate__animated animate__fadeInDown">
                "All the world's a stage, And all the men and women merely players"
            </h2>
            <p class="text-xl mb-8 animate__animated animate__fadeInUp">
                Pelajari bahasa isyarat dan temukan dunia baru dalam berkomunikasi
            </p>
            <div class="flex justify-center space-x-4">
                <a href="#learn" class="bg-[var(--primary-color)] text-white px-8 py-3 rounded-full hover:bg-[var(--secondary-color)] transition-all duration-300 animate__animated animate__pulse">
                    Mulai Belajar
                </a>
            </div>
        </div>
    </section>

    <section class="py-16 px-4 overflow-hidden bg-gradient-to-r from-[var(--primary-color)] to-[var(--secondary-color)]">
        <div class="container mx-auto max-w-4xl">
            <div class="carousel-container">
                <div class="quotes-carousel animate__animated animate__fadeIn">
                    <div class="quote-slide text-white text-center">
                        <p class="text-2xl italic mb-2">"Sign language is the equal of speech, lending itself equally to the rigorous and the poetic, to philosophical analysis or to making love."</p>
                        <span class="text-lg">- Oliver Sacks</span>
                    </div>
                    <div class="quote-slide text-white text-center">
                        <p class="text-2xl italic mb-2">"The beauty of sign language is that it's free-flowing, like a dance between two people communicating."</p>
                        <span class="text-lg">- Nyle DiMarco</span>
                    </div>
                    <div class="quote-slide text-white text-center">
                        <p class="text-2xl italic mb-2">"Sign language is the noblest gift God has given to deaf people."</p>
                        <span class="text-lg">- George Veditz</span>
                    </div>
                    <div class="quote-slide text-white text-center">
                        <p class="text-2xl italic mb-2">"Through sign language, deaf people are able to express themselves in a visual-spatial language that is beautiful and complex."</p>
                        <span class="text-lg">- Marlee Matlin</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="learn" class="py-16 px-4">
        <div class="container mx-auto grid md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-lg transform hover:scale-105 transition-all duration-300">
                <h3 class="text-2xl font-bold mb-4 text-[var(--primary-color)]">Dasar Bahasa Isyarat</h3>
                <p class="mb-4">"The fool doth think he is wise, but the wise man knows himself to be a fool"</p>
                <a href="#" class="text-[var(--primary-color)] hover:underline">Pelajari lebih lanjut →</a>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg transform hover:scale-105 transition-all duration-300">
                <h3 class="text-2xl font-bold mb-4 text-[var(--primary-color)]">Praktik Interaktif</h3>
                <p class="mb-4">"We know what we are, but know not what we may be"</p>
                <a href="#" class="text-[var(--primary-color)] hover:underline">Mulai berlatih →</a>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg transform hover:scale-105 transition-all duration-300">
                <h3 class="text-2xl font-bold mb-4 text-[var(--primary-color)]">Komunitas</h3>
                <p class="mb-4">"Love all, trust a few, do wrong to none"</p>
                <a href="#" class="text-[var(--primary-color)] hover:underline">Bergabung sekarang →</a>
            </div>
        </div>
    </section>

    <section class="py-16 px-4 bg-[var(--primary-color)] text-white">
        <div class="container mx-auto text-center">
            <blockquote class="text-2xl italic mb-4 animate__animated animate__fadeIn">
                "This above all: to thine own self be true"
            </blockquote>
            <p class="text-lg">- William Shakespeare</p>
        </div>
    </section>

    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto text-center">
            <p>© 2024 IWTKLAUAAY by lovdman. All rights reserved.</p>
            <p class="mt-2 italic">"Words are easy, like the wind; Faithful friends are hard to find"</p>
        </div>
    </footer>

    <script>
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
            void themeToggle.offsetWidth; // Trigger reflow
            themeToggle.classList.add('animate__bounce');
            
            themeOptions.classList.remove('active');
        }

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        
        document.addEventListener('DOMContentLoaded', function() {
            const carousel = document.querySelector('.quotes-carousel');
            const slides = document.querySelectorAll('.quote-slide');
            let currentSlide = 0;

            slides[0].classList.add('active');

            function nextSlide() {
                slides[currentSlide].classList.remove('active');
                currentSlide = (currentSlide + 1) % slides.length;
                slides[currentSlide].classList.add('active');
                carousel.style.transform = `translateX(-${currentSlide * 100}%)`;
            }

            setInterval(nextSlide, 5000); 

            slides.forEach(slide => {
                slide.style.animation = 'fadeInOut 5s infinite';
            });
        });
    </script>
</body>
</html> 