import React from 'react';
import { motion } from 'framer-motion';

const Hero = () => {
    return (
        <section className="pt-20 pb-16 px-4 hero-pattern min-h-screen flex items-center">
            <div className="container mx-auto text-center">
                <motion.div
                    initial={{ opacity: 0, y: 20 }}
                    animate={{ opacity: 1, y: 0 }}
                    transition={{ duration: 0.8 }}
                >
                    <h2 className="text-4xl md:text-5xl font-bold mb-4 bg-gradient-to-r from-[var(--primary-color)] to-[var(--secondary-color)] text-transparent bg-clip-text leading-relaxed pb-2">
                        Discover the Art of Sign Language
                    </h2>
                    
                    <motion.p 
                        className="text-lg mb-6 text-gray-600 max-w-2xl mx-auto"
                        initial={{ opacity: 0 }}
                        animate={{ opacity: 1 }}
                        transition={{ delay: 0.3, duration: 0.8 }}
                    >
                        "All the world's a stage, And all the men and women merely players" - Join us in
                        breaking communication barriers through the beauty of sign language.
                    </motion.p>
                    
                    <motion.div 
                        className="flex flex-wrap justify-center gap-4"
                        initial={{ opacity: 0, y: 20 }}
                        animate={{ opacity: 1, y: 0 }}
                        transition={{ delay: 0.6, duration: 0.8 }}
                    >
                        <ActionButton 
                            text="Start Learning"
                            icon="play"
                            primary
                        />
                        <ActionButton 
                            text="Join Community"
                            icon="users"
                        />
                    </motion.div>
                </motion.div>
            </div>
        </section>
    );
};

const ActionButton = ({ text, icon, primary }) => (
    <motion.button
        className={`
            px-8 py-3 rounded-full flex items-center space-x-2
            ${primary 
                ? 'bg-[var(--primary-color)] text-white hover:bg-[var(--secondary-color)]' 
                : 'border-2 border-[var(--primary-color)] text-[var(--primary-color)] hover:bg-[var(--primary-color)] hover:text-white'
            }
            transition-all duration-300
        `}
        whileHover={{ scale: 1.05 }}
        whileTap={{ scale: 0.95 }}
    >
        <i className={`fas fa-${icon}`} />
        <span>{text}</span>
    </motion.button>
);

export default Hero; 