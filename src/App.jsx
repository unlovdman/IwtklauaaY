import React from 'react';
import { ThemeProvider } from './contexts/ThemeContext';
import { AnimatePresence } from 'framer-motion';
import Navbar from './components/Navbar';
import Hero from './components/Hero';
import ThemeSwitcher from './components/ThemeSwitcher';
import Features from './components/Features';
import ScrollProgress from './components/ScrollProgress';
import FloatingHint from './components/FloatingHint';

function App() {
    return (
        <ThemeProvider>
            <div className="app">
                <ScrollProgress />
                <Navbar />
                <AnimatePresence mode="wait">
                    <main>
                        <Hero />
                        <Features />
                    </main>
                </AnimatePresence>
                <ThemeSwitcher />
                <FloatingHint />
            </div>
        </ThemeProvider>
    );
}

export default App; 