/**
 * Physics4Microbio — Multilingual Support
 * Languages: th (ไทย) | en (English) | zh (中文简体)
 */
(function() {
    'use strict';

    const LANG_KEY = 'p4m_lang';
    const DEFAULT_LANG = 'th';

    function getLang() {
        return localStorage.getItem(LANG_KEY) || DEFAULT_LANG;
    }

    function setLang(lang) {
        localStorage.setItem(LANG_KEY, lang);
        applyLang(lang);
        updateButtons(lang);
    }

    function applyLang(lang) {
        // Show/hide language blocks
        document.querySelectorAll('.lang-block').forEach(el => {
            el.style.display = el.getAttribute('lang') === lang ? '' : 'none';
        });
        // Update html lang attribute
        document.documentElement.lang = lang;
        // Dispatch custom event for pages that need to react
        window.dispatchEvent(new CustomEvent('langChange', { detail: { lang } }));
    }

    function updateButtons(lang) {
        document.querySelectorAll('.lang-btn').forEach(btn => {
            btn.classList.toggle('active', btn.getAttribute('data-lang') === lang);
        });
    }

    function init() {
        const lang = getLang();
        applyLang(lang);

        // Attach click handlers to all lang buttons
        document.addEventListener('click', function(e) {
            const btn = e.target.closest('.lang-btn');
            if (btn) {
                setLang(btn.getAttribute('data-lang'));
            }
        });

        updateButtons(lang);
    }

    // Run after DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

    // Expose globally
    window.P4MLang = { setLang, getLang };
})();
