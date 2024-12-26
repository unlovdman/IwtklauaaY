import React, { useState, useEffect } from 'react';
import { motion, AnimatePresence } from 'framer-motion';

const FloatingHint = () => {
    const [isVisible, setIsVisible] = useState(true);
    const [currentHint, setCurrentHint] = useState(0);

    const hints = [
        "Try changing the theme! 🎨",
        "Scroll to explore more! 👇",
        "Join our community! 👋",
        "Learn sign language today! ✨"
    ];

    useEffect(() => {
        const timer = setInterval(() => {
            setCurrentHint((prev) => (prev + 1) % hints.length);
        }, 5000);

        return () => clearInterval(timer);
    }, []);

    if (!isVisible) return null;

    return (
        <motion.div
            className="fixed bottom-24 left-8 z-40"
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            exit={{ opacity: 0, y: 20 }}
        >
            <AnimatePresence mode="wait">
                <motion.div
                    key={currentHint}
                    className="bg-white/90 backdrop-blur-sm px-4 py-2 rounded-full shadow-lg"
                    initial={{ opacity: 0, x: -20 }}
                    animate={{ opacity: 1, x: 0 }}
                    exit={{ opacity: 0, x: 20 }}
                >
                    <p className="text-sm text-gray-700">{hints[currentHint]}</p>
                </motion.div>
            </AnimatePresence>
            <button
                className="absolute -top-2 -right-2 text-gray-400 hover:text-gray-600"
                onClick={() => setIsVisible(false)}
            >
                <i className="fas fa-times-circle" />
            </button>
        </motion.div>
    );
};

export default FloatingHint; 