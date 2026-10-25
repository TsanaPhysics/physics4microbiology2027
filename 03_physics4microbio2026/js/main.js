/* ============================================================
   Physics for Microbiology 2026 - Main JavaScript
   ============================================================ */

document.addEventListener('DOMContentLoaded', () => {
    initNavbar();
    initCollapsibles();
    initScrollReveal();
    initMobileMenu();
    initSmoothScroll();
});

/* ============ Navbar Scroll Effect ============ */
function initNavbar() {
    const navbar = document.querySelector('.navbar');
    if (!navbar) return;

    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
}

/* ============ Collapsible Sections ============ */
function initCollapsibles() {
    document.querySelectorAll('.collapsible-header').forEach(header => {
        header.addEventListener('click', () => {
            const content = header.nextElementSibling;
            const isActive = header.classList.contains('active');

            // Close all others in the same group
            const parent = header.closest('.exercise-group, .content-section');
            if (parent) {
                parent.querySelectorAll('.collapsible-header.active').forEach(h => {
                    if (h !== header) {
                        h.classList.remove('active');
                        h.nextElementSibling.classList.remove('show');
                    }
                });
            }

            header.classList.toggle('active');
            content.classList.toggle('show');
        });
    });
}

/* ============ Scroll Reveal Animation ============ */
function initScrollReveal() {
    const reveals = document.querySelectorAll('.reveal');
    if (reveals.length === 0) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });

    reveals.forEach(el => observer.observe(el));
}

/* ============ Mobile Menu ============ */
function initMobileMenu() {
    const toggle = document.querySelector('.nav-mobile-toggle');
    const navLinks = document.querySelector('.nav-links');
    if (!toggle || !navLinks) return;

    toggle.addEventListener('click', () => {
        navLinks.classList.toggle('show');
        toggle.innerHTML = navLinks.classList.contains('show') ? '✕' : '☰';
    });

    // Handle dropdown on mobile
    document.querySelectorAll('.nav-dropdown-toggle').forEach(btn => {
        btn.addEventListener('click', (e) => {
            if (window.innerWidth <= 768) {
                e.preventDefault();
                btn.closest('.nav-dropdown').classList.toggle('open');
            }
        });
    });

    // Close menu on link click
    navLinks.querySelectorAll('a:not(.nav-dropdown-toggle)').forEach(link => {
        link.addEventListener('click', () => {
            if (window.innerWidth <= 768) {
                navLinks.classList.remove('show');
                toggle.innerHTML = '☰';
            }
        });
    });
}

/* ============ Smooth Scroll ============ */
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}

/* ============ Chapter Card Stagger Animation ============ */
function animateCards() {
    const cards = document.querySelectorAll('.chapter-card');
    cards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1}s`;
        card.classList.add('animate-fadeInUp');
    });
}

// Run card animation when chapters section is visible
const chaptersSection = document.querySelector('.chapters-section');
if (chaptersSection) {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCards();
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });
    observer.observe(chaptersSection);
}
