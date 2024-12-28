<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IWTKLAUAAY - Learn & Connect</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
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
        .theme-retro {
            --primary-color: #000000;
            --secondary-color: #333333;
            --bg-color: #FFFFFF;
            --gradient: linear-gradient(135deg, #000000, #333333);
        }
        .theme-japanese {
            --primary-color: #D64545;
            --secondary-color: #1A1A1A;
            --bg-color: #F5F5F5;
            --gradient: linear-gradient(135deg, #D64545, #1A1A1A);
        }
        .theme-vintage {
            --primary-color: #8B7355;
            --secondary-color: #6B4423;
            --bg-color: #F5E6D3;
            --gradient: linear-gradient(135deg, #8B7355, #6B4423);
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

        .music-player {
            position: fixed;
            bottom: 30px;
            left: 30px;
            z-index: 1000;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 15px;
            padding: 12px 15px;
            display: flex;
            align-items: center;
            gap: 15px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 
                0 8px 32px rgba(31, 38, 135, 0.15),
                inset 0 0 0 1px rgba(255, 255, 255, 0.2);
            width: 280px;
            transition: all 0.3s ease;
        }

        .music-player:hover {
            transform: translateY(-5px);
            box-shadow: 
                0 12px 40px rgba(31, 38, 135, 0.2),
                inset 0 0 0 1px rgba(255, 255, 255, 0.3);
        }

        .album-art {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            overflow: hidden;
            position: relative;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .album-art img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .album-art.spinning {
            animation: spin 8s linear infinite;
        }

        .album-art.paused {
            animation-play-state: paused;
        }

        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .music-info {
            flex-grow: 1;
        }

        .song-title {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 600;
            font-size: 0.95rem;
            margin-bottom: 4px;
        }

        .progress-bar {
            height: 3px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 1.5px;
            position: relative;
            cursor: pointer;
            margin-top: 8px;
        }

        .progress {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            background: var(--gradient);
            border-radius: 1.5px;
            transition: width 0.1s linear;
        }

        .mute-btn {
            background: transparent;
            border: none;
            color: var(--primary-color);
            cursor: pointer;
            font-size: 1.1rem;
            padding: 5px;
            transition: all 0.3s ease;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            backdrop-filter: blur(5px);
            background: rgba(255, 255, 255, 0.1);
        }

        .mute-btn:hover {
            transform: scale(1.1);
            color: var(--secondary-color);
            background: rgba(255, 255, 255, 0.2);
        }

        .mute-btn i {
            transition: transform 0.3s ease;
        }

        .mute-btn.muted i {
            transform: scale(0.8);
        }

        /* vinyl bro */
        .album-art::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 30%;
            height: 30%;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 50%;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .theme-romantic-vintage {
            --primary-color: #D4A5A5;
            --secondary-color: #9E7676;
            --bg-color: #F9F5F6;
            --gradient: linear-gradient(135deg, #D4A5A5, #9E7676);
        }

        .theme-romantic-vintage .hero-pattern {
            background-image: url('data:image/svg+xml,%3Csvg width="52" height="26" viewBox="0 0 52 26" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%239E7676" fill-opacity="0.1"%3E%3Cpath d="M10 10c0-2.21-1.79-4-4-4-3.314 0-6-2.686-6-6h2c0 2.21 1.79 4 4 4 3.314 0 6 2.686 6 6 0 2.21 1.79 4 4 4 3.314 0 6 2.686 6 6 0 2.21 1.79 4 4 4v2c-3.314 0-6-2.686-6-6 0-2.21-1.79-4-4-4-3.314 0-6-2.686-6-6zm25.464-1.95l8.486 8.486-1.414 1.414-8.486-8.486 1.414-1.414z" /%3E%3C/g%3E%3C/g%3E%3C/svg%3E');
        }

        .theme-romantic-vintage .feature-card {
            border: 1px solid rgba(158, 118, 118, 0.2);
            box-shadow: 
                0 10px 20px rgba(158, 118, 118, 0.1),
                0 0 0 1px rgba(158, 118, 118, 0.05);
        }

        .theme-romantic-vintage .feature-card:hover {
            border-color: rgba(158, 118, 118, 0.4);
        }

        .theme-romantic-vintage .mysterious-text {
            font-family: 'Playfair Display', serif;
        }

        .theme-romantic-vintage .logo-container::before {
            content: '❀';
            position: absolute;
            top: -5px;
            right: -5px;
            font-size: 1.2rem;
            color: var(--primary-color);
            animation: floatFlower 3s ease-in-out infinite;
        }

        .theme-romantic-vintage .logo-container::after {
            content: '✿';
            position: absolute;
            bottom: -5px;
            left: -5px;
            font-size: 1.2rem;
            color: var(--secondary-color);
            animation: floatFlower 3s ease-in-out infinite reverse;
        }

        @keyframes floatFlower {
            0%, 100% {
                transform: translate(0, 0) rotate(0deg);
            }
            50% {
                transform: translate(3px, -3px) rotate(15deg);
            }
        }

        .theme-romantic-vintage .nav-link:hover {
            text-shadow: 2px 2px 4px rgba(158, 118, 118, 0.3);
        }

        .theme-romantic-vintage .feature-card i {
            position: relative;
        }

        .theme-romantic-vintage .feature-card i::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: var(--gradient);
            opacity: 0.2;
            filter: blur(10px);
            transform: scale(1.5);
            z-index: -1;
            animation: pulseGlow 2s ease-in-out infinite;
        }

        @keyframes pulseGlow {
            0%, 100% {
                transform: scale(1.5);
                opacity: 0.2;
            }
            50% {
                transform: scale(2);
                opacity: 0.3;
            }
        }

        .theme-about-you {
            --primary-color: #8E9AAF;
            --secondary-color: #CBC0D3;
            --bg-color: #EFD3D7;
            --gradient: linear-gradient(135deg, #8E9AAF, #CBC0D3);
        }

        .theme-about-you .hero-pattern {
            background: linear-gradient(
                rgba(142, 154, 175, 0.1),
                rgba(203, 192, 211, 0.1)
            ),
            url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%239C92AC" fill-opacity="0.1"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2V6h4V4H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');
        }

        .theme-about-you .mysterious-text {
            animation: dreamyGlow 3s ease-in-out infinite;
        }

        @keyframes dreamyGlow {
            0%, 100% {
                text-shadow: 0 0 10px rgba(142, 154, 175, 0.5),
                             0 0 20px rgba(203, 192, 211, 0.3);
            }
            50% {
                text-shadow: 0 0 20px rgba(142, 154, 175, 0.8),
                             0 0 40px rgba(203, 192, 211, 0.6);
            }
        }

        .theme-about-you .feature-card {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.7);
            border: 1px solid rgba(203, 192, 211, 0.3);
            transition: all 0.5s ease;
        }

        .theme-about-you .feature-card:hover {
            transform: translateY(-10px) scale(1.02);
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 
                0 10px 20px rgba(142, 154, 175, 0.2),
                0 0 0 1px rgba(203, 192, 211, 0.1);
        }

        .theme-about-you .hero-pattern::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                linear-gradient(rgba(142, 154, 175, 0.1), rgba(203, 192, 211, 0.1)),
                url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="%239C92AC" fill-opacity="0.1"%3E%3Cpath d="M30 30c0-16.569 13.431-30 30-30v60c-16.569 0-30-13.431-30-30zm-30 0c0 16.569-13.431 30-30 30v-60c16.569 0 30 13.431 30 30z"/%3E%3C/g%3E%3C/svg%3E');
            pointer-events: none;
            z-index: -1;
            animation: fadeInOut 10s ease-in-out infinite;
        }

        .theme-about-you .logo-container {
            position: relative;
            overflow: visible;
        }

        .theme-about-you .logo-container::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(
                circle at center,
                transparent 30%,
                rgba(142, 154, 175, 0.1) 31%,
                rgba(142, 154, 175, 0.1) 32%,
                transparent 33%
            );
            transform: translate(-50%, -50%);
            animation: vinylSpin 4s linear infinite;
        }

        .theme-about-you .feature-card {
            transform: rotate(-2deg);
            padding: 20px;
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(203, 192, 211, 0.5);
            box-shadow: 
                0 5px 15px rgba(0, 0, 0, 0.1),
                0 0 0 1px rgba(255, 255, 255, 0.5);
        }

        .theme-about-you .feature-card:nth-child(2n) {
            transform: rotate(2deg);
        }

        .theme-about-you .feature-card:hover {
            transform: translateY(-10px) rotate(0deg) scale(1.02);
        }

        .theme-about-you .mysterious-text {
            background: linear-gradient(120deg, var(--primary-color), var(--secondary-color), var(--primary-color));
            background-size: 200% auto;
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: textGradient 8s linear infinite;
        }

        @keyframes textGradient {
            to {
                background-position: 200% center;
            }
        }

        .theme-about-you .hero-pattern::after {
            content: '';
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-image: 
                radial-gradient(circle at 20% 30%, rgba(142, 154, 175, 0.1) 0%, transparent 10%),
                radial-gradient(circle at 80% 70%, rgba(203, 192, 211, 0.1) 0%, transparent 10%);
            animation: floatBackground 20s ease-in-out infinite;
            pointer-events: none;
        }

        @keyframes floatBackground {
            0%, 100% {
                transform: translate(0, 0);
            }
            50% {
                transform: translate(-2%, -2%);
            }
        }

        .theme-about-you nav a {
            position: relative;
            overflow: hidden;
        }

        .theme-about-you nav a::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transform: translateX(-100%);
            transition: transform 0.6s ease;
        }

        .theme-about-you nav a:hover::before {
            transform: translateX(100%);
        }

        .theme-about-you .music-player {
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 
                0 8px 32px rgba(31, 38, 135, 0.15),
                inset 0 0 0 1px rgba(255, 255, 255, 0.2);
        }

        .theme-about-you .album-art {
            position: relative;
            overflow: hidden;
        }

        .theme-about-you .album-art::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 50%;
            height: 100%;
            background: linear-gradient(
                to right,
                transparent,
                rgba(255, 255, 255, 0.3),
                transparent
            );
            transform: skewX(-25deg);
            animation: shimmer 3s infinite;
        }

        @keyframes shimmer {
            0% {
                left: -100%;
            }
            100% {
                left: 200%;
            }
        }

        .theme-about-you .hero-pattern {
            position: relative;
        }

        .theme-about-you .hero-pattern::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 50% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 1%),
                radial-gradient(circle at 30% 70%, rgba(255, 255, 255, 0.1) 0%, transparent 1%),
                radial-gradient(circle at 70% 30%, rgba(255, 255, 255, 0.1) 0%, transparent 1%);
            animation: floatDust 15s linear infinite;
        }

        @keyframes floatDust {
            0% {
                transform: translateY(0) rotate(0deg);
            }
            100% {
                transform: translateY(-100px) rotate(360deg);
            }
        }

        .theme-about-you .feature-card i {
            transition: all 0.5s ease;
        }

        .theme-about-you .feature-card:hover i {
            transform: scale(1.2);
            color: var(--primary-color);
            filter: drop-shadow(0 0 10px rgba(142, 154, 175, 0.5));
        }


        .theme-about-you .hero-pattern {
            position: relative;
        }

        .theme-about-you .hero-pattern::before {
            content: '';
            position: fixed;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 50% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 1%),
                radial-gradient(circle at 30% 70%, rgba(255, 255, 255, 0.1) 0%, transparent 1%),
                radial-gradient(circle at 70% 30%, rgba(255, 255, 255, 0.1) 0%, transparent 1%);
            animation: floatDust 15s linear infinite;
        }

        .theme-about-you .hero-pattern::after {
            content: '🤟';
            position: fixed;
            bottom: -20px;
            font-size: 1.5rem;
            color: rgba(142, 154, 175, 0.3);
            animation: floatSignUp 10s linear infinite;
        }

        @keyframes floatSignUp {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 0;
            }
            50% {
                opacity: 0.3;
            }
            100% {
                transform: translateY(-100vh) rotate(360deg);
                opacity: 0;
            }
        }

        .theme-about-you .feature-card i.fa-hands {
            animation: heartbeat 1.5s ease-in-out infinite;
        }

        @keyframes heartbeat {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        .theme-about-you .feature-card:hover::after {
            content: '❤ Learn for Love ❤';
            position: absolute;
            bottom: -25px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 0.8rem;
            color: var(--primary-color);
            opacity: 0;
            animation: fadeInMessage 0.3s forwards;
        }

        @keyframes fadeInMessage {
            to {
                opacity: 1;
                bottom: -30px;
            }
        }

        .theme-about-you .feature-card {
            position: relative;
            overflow: hidden;
        }

        .theme-about-you .feature-card::before {
            content: '👋 ❤️ 🤟 🤲';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            font-size: 4rem;
            opacity: 0.03;
            transform: rotate(-45deg);
            pointer-events: none;
        }

        .theme-about-you .mysterious-text:hover {
            animation: romanticGlow 2s ease-in-out infinite;
        }

        @keyframes romanticGlow {
            0%, 100% {
                text-shadow: 0 0 10px rgba(142, 154, 175, 0.5),
                             0 0 20px rgba(203, 192, 211, 0.3);
            }
            50% {
                text-shadow: 0 0 20px rgba(142, 154, 175, 0.8),
                             0 0 40px rgba(203, 192, 211, 0.6);
            }
        }

        .theme-about-you .logo-container::before,
        .theme-about-you .logo-container::after {
            content: '❤';
            position: absolute;
            font-size: 1rem;
            color: var(--primary-color);
            opacity: 0;
            animation: floatHeart 3s ease-in-out infinite;
        }

        .theme-about-you .logo-container::before {
            top: -10px;
            right: -10px;
        }

        .theme-about-you .logo-container::after {
            bottom: -10px;
            left: -10px;
            animation-delay: 1.5s;
        }

        @keyframes floatHeart {
            0%, 100% {
                transform: translateY(0) scale(1);
                opacity: 0;
            }
            50% {
                transform: translateY(-10px) scale(1.2);
                opacity: 0.5;
            }
        }

        .theme-about-you .nav-link {
            position: relative;
        }

        .theme-about-you .nav-link::after {
            content: '👋 → 🤟';
            position: absolute;
            bottom: -20px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 0.8rem;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .theme-about-you .nav-link:hover::after {
            opacity: 0.7;
        }

        .theme-about-you .feature-card:hover i {
            position: relative;
        }

        .theme-about-you .feature-card:hover i::after {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: radial-gradient(circle at center,
                rgba(239, 211, 215, 0.2) 0%,
                transparent 70%);
            animation: pulseConnection 2s infinite;
        }

        @keyframes pulseConnection {
            0%, 100% {
                transform: translate(-50%, -50%) scale(1);
                opacity: 0.2;
            }
            50% {
                transform: translate(-50%, -50%) scale(1.5);
                opacity: 0;
            }
        }


        .theme-about-you h2 span {
            position: relative;
            display: inline-block;
        }

        .theme-about-you h2 span::after {
            content: '💝';
            position: absolute;
            font-size: 0.5em;
            top: -10px;
            right: -15px;
            animation: heartPulse 2s infinite;
        }

        @keyframes heartPulse {
            0%, 100% { transform: scale(1); opacity: 0.7; }
            50% { transform: scale(1.3); opacity: 0.9; }
        }

        .theme-about-you .feature-card:hover::before {
            content: '🤟 → ❤️';
            position: absolute;
            top: -25px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 1rem;
            opacity: 0;
            animation: signFadeIn 0.5s forwards;
        }

        @keyframes signFadeIn {
            to {
                opacity: 1;
                top: -30px;
            }
        }

        .theme-about-you .nav-link::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 2px;
            bottom: -5px;
            left: 0;
            background: linear-gradient(90deg, 
                transparent, 
                var(--primary-color),
                transparent
            );
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .theme-about-you .nav-link:hover::before {
            transform: scaleX(1);
        }

        .theme-about-you .hero-section::after {
            content: '♪ ❤️ ♫';
            position: fixed;
            font-size: 1.2rem;
            color: rgba(142, 154, 175, 0.2);
            animation: floatMusicLove 15s linear infinite;
            pointer-events: none;
        }

        @keyframes floatMusicLove {
            0% {
                transform: translate(0, 100vh) rotate(0deg);
                opacity: 0;
            }
            50% {
                opacity: 0.4;
            }
            100% {
                transform: translate(0, -100vh) rotate(360deg);
                opacity: 0;
            }
        }

        .theme-about-you .feature-card::after {
            content: '';
            position: absolute;
            inset: 0;
            border: 2px solid transparent;
            background: linear-gradient(45deg, 
                var(--primary-color), 
                transparent, 
                var(--secondary-color)
            ) border-box;
            -webkit-mask: 
                linear-gradient(#fff 0 0) padding-box,
                linear-gradient(#fff 0 0);
            -webkit-mask-composite: destination-out;
            mask-composite: exclude;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .theme-about-you .feature-card:hover::after {
            opacity: 1;
        }

        .theme-about-you .progress-indicator {
            position: relative;
            overflow: hidden;
        }

        .theme-about-you .progress-indicator::before {
            content: '👋 → 🤲 → 🤟 → ❤️';
            position: absolute;
            bottom: -30px;
            left: 0;
            font-size: 0.8rem;
            white-space: nowrap;
            animation: progressFlow 10s linear infinite;
        }

        @keyframes progressFlow {
            from { transform: translateX(100%); }
            to { transform: translateX(-100%); }
        }

        .theme-about-you .love-message::before {
            content: 'Learning to sign, just for you...';
            position: absolute;
            top: -20px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 0.8rem;
            color: var(--primary-color);
            white-space: nowrap;
            overflow: hidden;
            width: 0;
            animation: typing 4s steps(30) infinite;
        }

        @keyframes typing {
            from { width: 0; }
            to { width: 100%; }
        }

        .theme-about-you .feature-card i.fa-heart,
        .theme-about-you .feature-card i.fa-hands-helping {
            animation: iconHeartbeat 1.5s ease-in-out infinite;
        }

        @keyframes iconHeartbeat {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.15); }
        }

        .theme-about-you .feature-card:hover::after {
            content: '';
            position: absolute;
            width: 150%;
            height: 150%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: radial-gradient(
                circle at center,
                rgba(239, 211, 215, 0.1) 0%,
                transparent 70%
            );
            animation: connectionPulse 2s infinite;
        }

        @keyframes connectionPulse {
            0%, 100% {
                transform: translate(-50%, -50%) scale(1);
                opacity: 0.1;
            }
            50% {
                transform: translate(-50%, -50%) scale(1.2);
                opacity: 0.2;
            }
        }

        .theme-about-you .hero-pattern::before {
            content: 'Do you think I have forgotten?';
            position: fixed;
            font-family: 'Playfair Display', serif;
            font-style: italic;
            font-size: 1.2rem;
            color: rgba(142, 154, 175, 0.1);
            white-space: nowrap;
            animation: driftLyrics 20s linear infinite;
        }

        @keyframes driftLyrics {
            0% {
                transform: translateX(-100%) translateY(30vh);
                opacity: 0;
            }
            50% {
                opacity: 0.3;
            }
            100% {
                transform: translateX(100%) translateY(30vh);
                opacity: 0;
            }
        }

        .theme-about-you .hero-pattern::after {
            content: 'I think about you all the time';
            position: fixed;
            font-family: 'Playfair Display', serif;
            font-style: italic;
            font-size: 1.2rem;
            color: rgba(142, 154, 175, 0.1);
            white-space: nowrap;
            animation: driftLyricsReverse 20s linear infinite;
            animation-delay: 10s;
        }

        @keyframes driftLyricsReverse {
            0% {
                transform: translateX(100%) translateY(60vh);
                opacity: 0;
            }
            50% {
                opacity: 0.3;
            }
            100% {
                transform: translateX(-100%) translateY(60vh);
                opacity: 0;
            }
        }

        .theme-about-you .feature-card:hover::before {
            content: 'And I would find you if I was dying';
            position: absolute;
            top: -25px;
            left: 50%;
            transform: translateX(-50%);
            font-family: 'Playfair Display', serif;
            font-style: italic;
            font-size: 0.9rem;
            color: var(--primary-color);
            white-space: nowrap;
            opacity: 0;
            animation: fadeInLyric 0.5s forwards;
        }

        @keyframes fadeInLyric {
            to {
                opacity: 0.7;
                top: -30px;
            }
        }

        .theme-about-you .mysterious-text::after {
            content: 'I think about you all the time';
            position: absolute;
            bottom: -20px;
            left: 50%;
            transform: translateX(-50%);
            font-family: 'Playfair Display', serif;
            font-size: 0.8rem;
            color: var(--primary-color);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .theme-about-you .mysterious-text:hover::after {
            opacity: 0.7;
        }

        .theme-about-you .hero-section::before {
            content: 'About you...';
            position: fixed;
            font-family: 'Playfair Display', serif;
            font-style: italic;
            font-size: 2rem;
            color: rgba(142, 154, 175, 0.05);
            animation: floatMainLyric 15s ease-in-out infinite;
        }

        @keyframes floatMainLyric {
            0%, 100% {
                transform: translateY(20vh) translateX(-10vw);
                opacity: 0;
            }
            50% {
                transform: translateY(40vh) translateX(10vw);
                opacity: 0.1;
            }
        }

        .theme-about-you .feature-card:hover::after {
            content: 'I think about you';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            font-family: 'Playfair Display', serif;
            font-style: italic;
            font-size: 0.8rem;
            color: var(--primary-color);
            opacity: 0;
            animation: revealLyric 0.5s forwards;
        }

        @keyframes revealLyric {
            to {
                opacity: 0.7;
                bottom: -20px;
            }
        }

        #songTitle {
            white-space: pre-line;
            line-height: 1.3;
            text-align: left;
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
            <button onclick="setTheme('theme-sunset')" class="theme-button" data-theme="Sunset" style="background: linear-gradient(135deg, #FF6B6B, #FF8E53)"></button>
            <button onclick="setTheme('theme-ocean')" class="theme-button" data-theme="Azure" style="background: linear-gradient(135deg, #4FB4FF, #0085FF)"></button>
            <button onclick="setTheme('theme-retro')" class="theme-button" data-theme="Retro B&W" style="background: linear-gradient(135deg, #000000, #333333)"></button>
            <button onclick="setTheme('theme-japanese')" class="theme-button" data-theme="Japanese" style="background: linear-gradient(135deg, #D64545, #1A1A1A)"></button>
            <button onclick="setTheme('theme-vintage')" class="theme-button" data-theme="Vintage" style="background: linear-gradient(135deg, #8B7355, #6B4423)"></button>
            <button onclick="setTheme('theme-romantic-vintage')" 
                    class="theme-button" 
                    data-theme="Romantic Vintage" 
                    style="background: linear-gradient(135deg, #D4A5A5, #9E7676)">
            </button>
            <button onclick="setTheme('theme-about-you')" 
                    class="theme-button" 
                    data-theme="About You" 
                    style="background: linear-gradient(135deg, #8E9AAF, #CBC0D3)">
            </button>
        </div>
    </div>

    <footer class="bg-gradient-to-r from-[var(--primary-color)] to-[var(--secondary-color)] text-white py-12">
        <div class="container mx-auto text-center">
            <div class="flex justify-center space-x-6 mb-8">
                <a href="#" class="hover:text-opacity-80"><i class="fab fa-facebook text-2xl"></i></a>
                <a href="#" class="hover:text-opacity-80"><i class="fab fa-twitter text-2xl"></i></a>
                <a href="https://www.instagram.com/unlovdman/" class="hover:text-opacity-80"><i class="fab fa-instagram text-2xl"></i></a>
                <a href="https://www.youtube.com/@unlovdman/" class="hover:text-opacity-80"><i class="fab fa-youtube text-2xl"></i></a>
            </div>
            <p>© 2024 IWTKLAUAAY by unlovdman. All rights reserved.</p>
            <p class="mt-2 italic">"Words are easy, like the wind; Faithful friends are hard to find"</p>
        </div>
    </footer>

    <div class="music-player">
        <div class="album-art spinning paused">
            <img src="resources/img/AY.jpg" 
                 alt="Album Art"
                 id="albumArt">
        </div>
        <div class="music-info">
            <div class="song-title" id="songTitle">AY</div>
            <div class="progress-bar" id="progressBar">
                <div class="progress" id="progress"></div>
            </div>
        </div>
        <button class="mute-btn muted" id="muteBtn">
            <i class="fas fa-volume-mute" id="muteIcon"></i>
        </button>
    </div>

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

        document.addEventListener('DOMContentLoaded', function() {
            const audio = new Audio();
            const muteBtn = document.getElementById('muteBtn');
            const muteIcon = document.getElementById('muteIcon');
            const albumArt = document.getElementById('albumArt');
            const progress = document.getElementById('progress');
            let isMuted = true;

            function handleThemeChange(theme) {
                if (theme === 'theme-about-you') {
                    audio.src = 'resources/music/The 1975 - About You (Official).mp3';
                    albumArt.src = 'resources/img/The 1975 - About You (Official).jpg';
                    document.getElementById('songTitle').textContent = '"About You"\n _ The 1975 _';
                }
            }

            const themeButtons = document.querySelectorAll('.theme-button');
            themeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const theme = this.getAttribute('onclick').match(/'([^']+)'/)[1];
                    handleThemeChange(theme);
                });
            });

            muteBtn.addEventListener('click', () => {
                isMuted = !isMuted;
                if (isMuted) {
                    audio.pause();
                    muteIcon.className = 'fas fa-volume-mute';
                    albumArt.classList.add('paused');
                } else {
                    audio.play().then(() => {
                        audio.volume = 0.5;
                        muteIcon.className = 'fas fa-volume-up';
                        albumArt.classList.remove('paused');
                    }).catch(e => {
                        console.log("Playback failed:", e);
                        isMuted = true;
                        muteIcon.className = 'fas fa-volume-mute';
                        albumArt.classList.add('paused');
                    });
                }
                muteBtn.classList.toggle('muted');
            });

            audio.addEventListener('timeupdate', () => {
                const progressPercent = (audio.currentTime / audio.duration) * 100;
                progress.style.width = `${progressPercent}%`;
            });

            document.getElementById('progressBar').addEventListener('click', (e) => {
                const width = e.currentTarget.clientWidth;
                const clickX = e.offsetX;
                const duration = audio.duration;
                audio.currentTime = (clickX / width) * duration;
            });
        });

        function initThemeMusic() {
            const themeToggle = document.getElementById('theme-toggle');
            const audio = document.querySelector('audio');
            const albumArt = document.querySelector('.album-art img');
            
            themeToggle.addEventListener('click', () => {
                if (document.body.classList.contains('theme-about-you')) {
                    audio.src = '/resources/music/The 1975 - About You (Official).mp3';
                    albumArt.src = '/resources/img/The 1975 - About You (Official).jpg';
                    initLyricSync();
                }
            });
        }

        function initLyricSync() {
            const audio = document.querySelector('audio');
            const lyricDisplay = document.querySelector('.lyric-display');
            
            const lyricTimings = [
                { time: 0, id: 'intro' },
                { time: 30, id: 'verse1' },
                { time: 60, id: 'chorus' },
            ];

            audio.addEventListener('timeupdate', () => {
                const currentTime = audio.currentTime;
                updateLyricDisplay(currentTime, lyricTimings);
            });
        }

        function updateLyricDisplay(currentTime, timings) {
            const lyricDisplay = document.querySelector('.lyric-display');
            const currentTiming = timings.find(timing => 
                timing.time <= currentTime && 
                (!timings[timings.indexOf(timing) + 1] || 
                 timings[timings.indexOf(timing) + 1].time > currentTime)
            );
            
            if (currentTiming) {
                lyricDisplay.dataset.section = currentTiming.id;
                lyricDisplay.classList.add('active');
            }
        }
    </script>
</body>
</html> 