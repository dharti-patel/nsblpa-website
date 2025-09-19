document.addEventListener('DOMContentLoaded', function() {
    const mobileMenu = document.getElementById('mobileMenu');
    const navMenu = document.getElementById('navMenu');

    if (mobileMenu && navMenu) {
        // Toggle menu on mobile menu click
        mobileMenu.addEventListener('click', (e) => {
            navMenu.classList.toggle('show');
            e.stopPropagation(); // Prevent menu from closing immediately
        });

        // Close menu when clicking/touching outside
        const closeMenu = (e) => {
            if (!navMenu.contains(e.target) && navMenu.classList.contains('show')) {
                navMenu.classList.remove('show');
            }
        };

        document.addEventListener('click', closeMenu);
        document.addEventListener('touchstart', closeMenu); // for mobile taps

        // Close menu when clicking a link
        navMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                navMenu.classList.remove('show');
            });
        });

        // Optional: close menu on scroll
        window.addEventListener('scroll', () => {
            if (navMenu.classList.contains('show')) {
                navMenu.classList.remove('show');
            }
        });
    }
});
