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
        .theme-purple {
            --primary-color: #8B5CF6;
            --secondary-color: #7C3AED;
            --bg-color: #EDE9FE;
        }
        .theme-blue {
            --primary-color: #3B82F6;
            --secondary-color: #2563EB;
            --bg-color: #EFF6FF;
        }
        .theme-green {
            --primary-color: #10B981;
            --secondary-color: #059669;
            --bg-color: #ECFDF5;
        }
    </style>
</head>
<body class="bg-[var(--bg-color)] transition-all duration-500">
    <nav class="fixed w-full bg-[var(--primary-color)] text-white p-4 z-50">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold animate__animated animate__fadeIn">SignLanguage Journey</h1>
            <div class="space-x-4">
                <button onclick="setTheme('theme-purple')" class="px-4 py-2 bg-purple-600 rounded">Purple</button>
                <button onclick="setTheme('theme-blue')" class="px-4 py-2 bg-blue-600 rounded">Blue</button>
                <button onclick="setTheme('theme-green')" class="px-4 py-2 bg-green-600 rounded">Green</button>
            </div>
        </div>
    </nav>

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
            setTheme('theme-purple');
        });

        
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