import React, { useState, useEffect } from 'react';
import { motion, AnimatePresence } from 'framer-motion';
import { Link } from 'react-scroll';

const Navbar = () => {
    const [isScrolled, setIsScrolled] = useState(false);
    const [isMobileMenuOpen, setIsMobileMenuOpen] = useState(false);

    useEffect(() => {
        const handleScroll = () => {
            setIsScrolled(window.scrollY > 50);
        };
        window.addEventListener('scroll', handleScroll);
        return () => window.removeEventListener('scroll', handleScroll);
    }, []);

    return (
        <nav className={`fixed w-full z-50 top-0 transition-all duration-300 ${
            isScrolled ? 'py-2 glass-dark' : 'py-4 glass'
        }`}>
            <div className="container mx-auto flex justify-between items-center px-4">
                {/* logo */}
                <motion.div 
                    className="flex items-center space-x-3"
                    initial={{ opacity: 0, x: -20 }}
                    animate={{ opacity: 1, x: 0 }}
                    transition={{ duration: 0.5 }}
                >
                    <LogoAnimation />
                    <TitleAnimation />
                </motion.div>

                {/* menu */}
                <div className="hidden md:flex space-x-6">
                    <NavLinks />
                </div>

                {/* mobil menu*/}
                <motion.button
                    className="md:hidden text-white"
                    onClick={() => setIsMobileMenuOpen(!isMobileMenuOpen)}
                    whileTap={{ scale: 0.95 }}
                >
                    <i className={`fas fa-${isMobileMenuOpen ? 'times' : 'bars'} text-xl`} />
                </motion.button>
            </div>

            <AnimatePresence>
                {isMobileMenuOpen && (
                    <motion.div
                        className="md:hidden"
                        initial={{ opacity: 0, height: 0 }}
                        animate={{ opacity: 1, height: 'auto' }}
                        exit={{ opacity: 0, height: 0 }}
                        transition={{ duration: 0.3 }}
                    >
                        <div className="px-4 py-3 glass-dark">
                            <NavLinks mobile setIsMobileMenuOpen={setIsMobileMenuOpen} />
                        </div>
                    </motion.div>
                )}
            </AnimatePresence>
        </nav>
    );
};


const LogoAnimation = () => (
    <motion.div 
        className="relative w-12 h-12"
        whileHover={{ scale: 1.1 }}
    >
        <motion.div 
            className="absolute inset-0"
            animate={{ rotate: 360 }}
            transition={{ duration: 8, repeat: Infinity, ease: "linear" }}
        >
            <i className="fas fa-circle text-3xl opacity-30" />
        </motion.div>
        
        <motion.div 
            className="absolute inset-0 flex items-center justify-center"
            animate={{ 
                y: [0, -5, 0],
                rotate: [0, 5, 0]
            }}
            transition={{ 
                duration: 3,
                repeat: Infinity,
                ease: "easeInOut"
            }}
        >
            <i className="fas fa-hand-holding-heart text-2xl" />
        </motion.div>
        
        <SilentMusicNote />
    </motion.div>
);

const SilentMusicNote = () => (
    <motion.div 
        className="absolute -top-1 -right-1 text-xs opacity-75"
        animate={{ 
            opacity: [0.5, 1, 0.5],
            scale: [1, 1.1, 1]
        }}
        transition={{ 
            duration: 2,
            repeat: Infinity,
            ease: "easeInOut"
        }}
    >
        <i className="fas fa-music" />
        <div className="line" />
    </motion.div>
);

const TitleAnimation = () => (
    <div className="flex flex-col">
        <motion.h1 
            className="text-2xl font-bold tracking-wider"
            initial={{ opacity: 0 }}
            animate={{ opacity: 1 }}
            transition={{ duration: 0.5 }}
        >
            <span className="mysterious-text">IWTKLAUAAY</span>
        </motion.h1>
        <motion.p 
            className="text-xs italic opacity-75 love-message"
            initial={{ opacity: 0 }}
            animate={{ opacity: 1 }}
            transition={{ delay: 0.5, duration: 0.5 }}
        >
            I Want To Know, Learn And Understand Anything About You
        </motion.p>
    </div>
);

const NavLinks = ({ mobile, setIsMobileMenuOpen }) => {
    const links = [
        { to: "learn", icon: "hands", text: "Learn" },
        { to: "community", icon: "heart", text: "Connect" },
        { to: "about", icon: "infinity", text: "Journey" }
    ];

    return links.map(({ to, icon, text }) => (
        <Link
            key={to}
            to={to}
            smooth={true}
            duration={500}
            offset={-80}
            className={`hover:text-opacity-80 transition-all cursor-pointer
                ${mobile ? 'block py-2' : ''}`}
            onClick={() => mobile && setIsMobileMenuOpen(false)}
        >
            <motion.span
                whileHover={{ scale: 1.05 }}
                whileTap={{ scale: 0.95 }}
                className="flex items-center"
            >
                <i className={`fas fa-${icon} mr-2`} />
                {text}
            </motion.span>
        </Link>
    ));
};

export default Navbar; 