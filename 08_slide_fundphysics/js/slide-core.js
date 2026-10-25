/* ============================================================
   slide-core.js  –  Shared navigation logic & MathJax setup
   ============================================================ */

function retypeset(el) {
    if (window.MathJax && MathJax.typesetPromise) {
        MathJax.typesetPromise([el]).catch(function(e){ console.log(e); });
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.slide');
    const total = slides.length;
    let current = 0;

    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const dotContainer = document.getElementById('dotContainer');
    const counterDisplay = document.getElementById('slideCounterDisplay');

    if (!total) return;

    // --- build dots ---
    if (dotContainer) {
        dotContainer.innerHTML = '';
        for (let i = 0; i < total; i++) {
            const dot = document.createElement('button');
            dot.className = 'dot' + (i === 0 ? ' active-dot' : '');
            dot.dataset.index = i;
            dot.addEventListener('click', function() {
                goTo(parseInt(this.dataset.index));
            });
            dotContainer.appendChild(dot);
        }
    }
    const dots = dotContainer ? dotContainer.querySelectorAll('.dot') : [];

    function goTo(index) {
        if (index < 0 || index >= total) return;
        slides.forEach((el, i) => {
            el.classList.toggle('active', i === index);
        });
        dots.forEach((d, i) => {
            d.classList.toggle('active-dot', i === index);
        });
        current = index;
        if (prevBtn) prevBtn.disabled = (current === 0);
        if (nextBtn) nextBtn.disabled = (current === total - 1);
        if (counterDisplay) counterDisplay.textContent = (current + 1) + ' / ' + total;
        
        const container = document.getElementById('slideContainer');
        if (container) container.scrollTop = 0;
        retypeset(slides[index]);
    }

    function next() {
        if (current < total - 1) goTo(current + 1);
    }

    function prev() {
        if (current > 0) goTo(current - 1);
    }

    if (prevBtn) prevBtn.addEventListener('click', prev);
    if (nextBtn) nextBtn.addEventListener('click', next);

    document.addEventListener('keydown', function(e) {
        if (e.key === 'ArrowRight' || e.key === 'ArrowDown') {
            e.preventDefault();
            next();
        } else if (e.key === 'ArrowLeft' || e.key === 'ArrowUp') {
            e.preventDefault();
            prev();
        }
    });

    let touchStartX = 0;
    const container = document.getElementById('slideContainer');
    if (container) {
        container.addEventListener('touchstart', function(e) {
            touchStartX = e.changedTouches[0].screenX;
        }, { passive: true });
        container.addEventListener('touchend', function(e) {
            const diff = touchStartX - e.changedTouches[0].screenX;
            if (Math.abs(diff) > 50) {
                if (diff > 0) next();
                else prev();
            }
        }, { passive: true });
    }

    goTo(0);
});
