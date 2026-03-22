const supportedLangs = ["en", "ar", "es", "fr"];

function runWhenIdle(callback) {
    if ("requestIdleCallback" in window) {
        window.requestIdleCallback(callback, { timeout: 1200 });
        return;
    }

    window.setTimeout(callback, 150);
}

function getCurrentLanguage() {
    const savedLang = localStorage.getItem("lang");
    if (savedLang && supportedLangs.includes(savedLang)) return savedLang;

    const browserLang = navigator.language.slice(0, 2);
    return supportedLangs.includes(browserLang) ? browserLang : "en";
}

let currentLang = getCurrentLanguage();

function applyLanguage(lang) {
    currentLang = lang;
    localStorage.setItem("lang", lang);

    document.querySelectorAll(`[data-${lang}]`).forEach(el => {
        const translatedValue = el.getAttribute(`data-${lang}`) || "";

        if (el.tagName === 'META') {
            el.setAttribute('content', translatedValue);
        } else if (el.classList.contains('blog-link')) {
            const temp = document.createElement('div');
            temp.innerHTML = translatedValue;

            const text = temp.textContent?.trim() || "";
            const tempIcon = temp.querySelector('i');
            const targetText = el.querySelector('span');
            const targetIcon = el.querySelector('i');

            if (targetText) {
                targetText.textContent = text;
            } else {
                el.textContent = text;
            }

            if (targetIcon && tempIcon) {
                targetIcon.className = tempIcon.className;
            }
        } else if (el.dataset.allowHtml === 'true') {
            el.innerHTML = translatedValue;
        } else {
            el.textContent = translatedValue;
        }
    });

    document.querySelectorAll(`[data-placeholder-${lang}]`).forEach(el => {
        el.placeholder = el.getAttribute(`data-placeholder-${lang}`);
    });

    document.documentElement.dir = lang === "ar" ? "rtl" : "ltr";
}

window.currentLang = currentLang;
window.applyLanguage = applyLanguage;

let productsSwiper;
let productsSwiperLang;

function buildProductsSwiper(lang) {
    const isRTL = lang === "ar";

    if (productsSwiper) {
        productsSwiper.destroy(true, true);
    }

    productsSwiper = new Swiper(".products-swiper", {
        rtl: isRTL,
        direction: "horizontal",
        slidesPerView: 3,
        spaceBetween: 10,
        slideToClickedSlide: true,
        centeredSlides: true,
        loop: true,
        speed: 1000,
        grabCursor: true,
        autoplay: { delay: 3500, disableOnInteraction: false },
        breakpoints: {
            0: { slidesPerView: 1, centeredSlides: false },
            576: { slidesPerView: 2, centeredSlides: true },
            992: { slidesPerView: 3, centeredSlides: true },
            1200: { slidesPerView: 5, centeredSlides: true }
        }
    });

    productsSwiperLang = lang;
}

function initProductsSwiper(lang) {
    const swiperElement = document.querySelector(".products-swiper");

    if (!swiperElement || typeof window.Swiper === "undefined") {
        return;
    }

    if (productsSwiper && productsSwiperLang === lang) {
        return;
    }

    buildProductsSwiper(lang);
}

function scheduleProductsSwiper(lang) {
    const swiperElement = document.querySelector(".products-swiper");

    if (!swiperElement || typeof window.Swiper === "undefined") {
        return;
    }

    const startSwiper = () => initProductsSwiper(lang);

    if (!("IntersectionObserver" in window)) {
        runWhenIdle(startSwiper);
        return;
    }

    const observer = new IntersectionObserver((entries) => {
        if (!entries.some(entry => entry.isIntersecting)) {
            return;
        }

        observer.disconnect();
        runWhenIdle(startSwiper);
    }, { rootMargin: "250px 0px" });

    observer.observe(swiperElement);
}

function initAOSIfNeeded() {
    if (typeof window.AOS === "undefined" || !document.querySelector("[data-aos]")) {
        return;
    }

    window.AOS.init({
        duration: 700,
        once: true,
        disable: window.matchMedia("(prefers-reduced-motion: reduce)").matches,
    });
}

document.addEventListener("DOMContentLoaded", function () {

    const navbarCollapse = document.getElementById("navbarNav");
    const bsCollapse = navbarCollapse ? new bootstrap.Collapse(navbarCollapse, { toggle: false }) : null;

    document.querySelectorAll('.btn-dropdown').forEach(button => {
        button.setAttribute('data-bs-toggle', '');
        const dropdownMenu = button.nextElementSibling;

        button.addEventListener('mouseenter', () => {
            if (window.innerWidth >= 992) {
                dropdownMenu.classList.add('show');
                button.setAttribute('aria-expanded', 'true');
            }
        });
        button.addEventListener('mouseleave', () => {
            if (window.innerWidth >= 992) {
                dropdownMenu.classList.remove('show');
                button.setAttribute('aria-expanded', 'false');
            }
        });
        dropdownMenu.addEventListener('mouseenter', () => {
            if (window.innerWidth >= 992) {
                dropdownMenu.classList.add('show');
                button.setAttribute('aria-expanded', 'true');
            }
        });
        dropdownMenu.addEventListener('mouseleave', () => {
            if (window.innerWidth >= 992) {
                dropdownMenu.classList.remove('show');
                button.setAttribute('aria-expanded', 'false');
            }
        });

        button.addEventListener('click', e => {
            if (window.innerWidth < 992) {
                e.preventDefault();
                e.stopPropagation();

                const isExpanded = button.getAttribute('aria-expanded') === 'true';

                document.querySelectorAll('.btn-dropdown').forEach(otherBtn => {
                    if (otherBtn !== button) {
                        otherBtn.setAttribute('aria-expanded', 'false');
                        const otherMenu = otherBtn.nextElementSibling;
                        if (otherMenu) otherMenu.classList.remove('show');
                    }
                });

                if (dropdownMenu) {
                    dropdownMenu.classList.toggle('show');
                    button.setAttribute('aria-expanded', !isExpanded);
                }
            }
        });
    });

    document.addEventListener('click', e => {
        if (window.innerWidth < 992) {
            const isDropdownButton = e.target.classList.contains('btn-dropdown') || e.target.closest('.btn-dropdown');
            const isInsideDropdown = e.target.closest('.dropdown-menu');

            if (!isDropdownButton && !isInsideDropdown) {
                document.querySelectorAll('.btn-dropdown').forEach(button => {
                    button.setAttribute('aria-expanded', 'false');
                    const menu = button.nextElementSibling;
                    if (menu) menu.classList.remove('show');
                });
            }
        }
    });

    document.querySelectorAll('.dropdown-item:not([data-lang])').forEach(item => {
        item.addEventListener('click', function (e) {
            if (window.innerWidth < 992) {
                const dropdown = this.closest('.dropdown-menu');
                if (dropdown) {
                    dropdown.classList.remove('show');
                }
                setTimeout(() => {
                    if (bsCollapse) {
                        bsCollapse.hide();
                    }
                }, 100);
            }


        });
    });
    document.querySelectorAll('.dropdown-item:not([data-lang])').forEach(item => {
        item.addEventListener('click', function () {
            if (window.innerWidth >= 992) {
                const dropdown = this.closest('.dropdown-menu');
                if (dropdown) {
                    dropdown.classList.remove('show');
                }
                const toggleBtn = this.closest('.dropdown')?.querySelector('.btn-dropdown');
                if (toggleBtn) {
                    toggleBtn.setAttribute('aria-expanded', 'false');
                }
            }
        });
    });

    applyLanguage(currentLang);
    document.documentElement.style.transition = 'opacity 0.15s ease';
    document.documentElement.style.opacity = '1';

    runWhenIdle(() => {
        initAOSIfNeeded();
        scheduleProductsSwiper(currentLang);
    });

    const navbar = document.getElementById("mainNavbar");
    const navLinks = document.querySelectorAll("#mainNavbar .nav-link");
    let isNavbarSticky = false;
    let navbarFrameRequested = false;

    function updateNavbarSticky() {
        if (!navbar) {
            return;
        }

        const shouldBeSticky = window.scrollY > 10;

        if (shouldBeSticky === isNavbarSticky) {
            return;
        }

        isNavbarSticky = shouldBeSticky;
        navbar.classList.toggle("sticky", shouldBeSticky);
    }

    function requestNavbarUpdate() {
        if (navbarFrameRequested) {
            return;
        }

        navbarFrameRequested = true;
        window.requestAnimationFrame(() => {
            navbarFrameRequested = false;
            updateNavbarSticky();
        });
    }

    updateNavbarSticky();
    window.addEventListener("scroll", requestNavbarUpdate, { passive: true });

    navLinks.forEach(link => {
        link.addEventListener("click", function (e) {
            const targetId = this.getAttribute("href");

            if (targetId && targetId.startsWith("#")) {
                e.preventDefault();
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    const offsetTop = targetElement.offsetTop - navbar.offsetHeight;
                    window.scrollTo({ top: offsetTop, behavior: "smooth" });
                }

                if (window.innerWidth < 992) {
                    bsCollapse.hide();
                }
            }
        });
    });
    document.querySelectorAll(".dropdown-item[data-lang]").forEach(item => {
        item.addEventListener("click", e => {
            e.preventDefault();
            const lang = item.dataset.lang;
            applyLanguage(lang);
            document.dispatchEvent(new CustomEvent("languageChanged", { detail: { lang } }));
        });
    });
    const countersSection = document.getElementById("honeyCounters");
    if (countersSection) {
        const counters = countersSection.querySelectorAll(".number");
        const formatNumber = num => num >= 1_000_000 ? (num / 1_000_000) + "M+" :
            num >= 1_000 ? (num / 1_000) + "K+" : num;

        const startCounters = () => {
            counters.forEach(counter => {
                let current = 0;
                const target = +counter.dataset.target;
                const speed = 400;
                const increment = Math.ceil(target / speed);

                const updateCount = () => {
                    current += increment;
                    if (current < target) {
                        counter.innerText = current.toLocaleString();
                        setTimeout(updateCount, 20);
                    } else counter.innerText = formatNumber(target);
                };
                updateCount();
            });
        };

        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    startCounters();
                    observer.disconnect();
                }
            });
        }, { threshold: 0.5 });

        observer.observe(countersSection);
    }
});

document.addEventListener("languageChanged", (e) => {
    scheduleProductsSwiper(e.detail.lang);
});
