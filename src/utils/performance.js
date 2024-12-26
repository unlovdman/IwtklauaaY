export const lazyLoadImage = (target) => {
    const io = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.classList.add('loaded');
                observer.disconnect();
            }
        });
    });

    io.observe(target);
};

export const debounce = (func, wait) => {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
};

export const deviceCapabilities = {
    touchDevice: 'ontouchstart' in window,
    reducedMotion: window.matchMedia('(prefers-reduced-motion: reduce)').matches,
    highPerformance: !navigator.connection || navigator.connection.effectiveType === '4g'
}; 