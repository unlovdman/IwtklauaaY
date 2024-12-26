import React, { useState } from 'react';
import { motion, AnimatePresence } from 'framer-motion';

const themes = [
    { name: 'Ruby Red', class: 'theme-red', gradient: 'linear-gradient(135deg, #EF4444, #B91C1C)' },
    { name: 'Ocean Blue', class: 'theme-blue', gradient: 'linear-gradient(135deg, #3B82F6, #1D4ED8)' },
    { name: 'Forest Green', class: 'theme-green', gradient: 'linear-gradient(135deg, #10B981, #047857)' },
    { name: 'Royal Purple', class: 'theme-purple', gradient: 'linear-gradient(135deg, #8B5CF6, #6D28D9)' },
    { name: 'Sunset Orange', class: 'theme-sunset', gradient: 'linear-gradient(135deg, #FF6B6B, #FF8E53)' },
    { name: 'Midnight', class: 'theme-midnight', gradient: 'linear-gradient(135deg, #2C3E50, #3498DB)' },
    { name: 'Rose Gold', class: 'theme-rose', gradient: 'linear-gradient(135deg, #E8BCB9, #B76E79)' },
];

const ThemeSwitcher = () => {
    const [isOpen, setIsOpen] = useState(false);
    const [currentTheme, setCurrentTheme] = useState(themes[0]);

    const handleThemeChange = (theme) => {
        setCurrentTheme(theme);
        document.documentElement.className = theme.class;
        setIsOpen(false);
    };

    return (
        <div className="fixed bottom-8 right-8 z-50">
            <motion.button
                className="theme-button"
                style={{ background: currentTheme.gradient }}
                whileHover={{ scale: 1.1 }}
                whileTap={{ scale: 0.9 }}
                onClick={() => setIsOpen(!isOpen)}
            >
                <i className="fas fa-palette text-white" />
            </motion.button>

            <AnimatePresence>
                {isOpen && (
                    <motion.div
                        className="absolute bottom-16 right-0 bg-white rounded-lg shadow-xl p-3 grid gap-2"
                        initial={{ opacity: 0, scale: 0.9, y: 20 }}
                        animate={{ opacity: 1, scale: 1, y: 0 }}
                        exit={{ opacity: 0, scale: 0.9, y: 20 }}
                        transition={{ type: "spring", stiffness: 300, damping: 25 }}
                    >
                        {themes.map((theme) => (
                            <motion.button
                                key={theme.name}
                                className="theme-option"
                                style={{ background: theme.gradient }}
                                whileHover={{ scale: 1.05 }}
                                whileTap={{ scale: 0.95 }}
                                onClick={() => handleThemeChange(theme)}
                            >
                                <span className="sr-only">{theme.name}</span>
                            </motion.button>
                        ))}
                    </motion.div>
                )}
            </AnimatePresence>
        </div>
    );
};

export default ThemeSwitcher; 