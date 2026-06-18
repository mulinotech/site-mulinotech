document.addEventListener('DOMContentLoaded', () => {
    // Verificar estado de login para o ícone de Área do Cliente na barra de navegação
    const loginIcon = document.getElementById('nav-login-icon');
    if (loginIcon) {
        if (sessionStorage.getItem('logged_in') === 'true') {
            loginIcon.href = 'dashboard.html';
            loginIcon.title = 'Área do Cliente (Painel)';
            loginIcon.classList.remove('text-primary');
            loginIcon.classList.add('text-neon-cyan', 'text-glow-cyan');
        } else {
            loginIcon.href = 'login.html';
            loginIcon.title = 'Área do Cliente / Login';
        }
    }

    // Brilho interativo que segue o mouse
    const glow = document.getElementById('glow');
    if (glow) {
        window.addEventListener('mousemove', (e) => {
            glow.style.left = e.clientX + 'px';
            glow.style.top = e.clientY + 'px';
        });
    }



    // Intersection Observer para animações de revelar ao rolar (Reveal on Scroll)
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    };

    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
                revealObserver.unobserve(entry.target);
            }
        });
    }, observerOptions);

    document.querySelectorAll('.reveal-on-scroll, .glass-panel').forEach(el => revealObserver.observe(el));

    // Efeito de transição de Scroll na Barra de Navegação (Navbar)
    const nav = document.querySelector('nav');
    if (nav) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 20) {
                nav.classList.add('bg-deep-space/95', 'shadow-2xl');
                nav.classList.remove('bg-deep-space/70');
            } else {
                nav.classList.add('bg-deep-space/70');
                nav.classList.remove('bg-deep-space/95', 'shadow-2xl');
            }
        });
    }

    // Controle do Menu Mobile (Hamburger)
    const menuBtn = document.getElementById('mobile-menu-btn');
    const closeBtn = document.getElementById('mobile-menu-close');
    const mobileMenu = document.getElementById('mobile-menu');

    if (menuBtn && mobileMenu) {
        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.remove('translate-x-full');
            mobileMenu.classList.add('translate-x-0');
            document.body.style.overflow = 'hidden'; // Impede o scroll de fundo
        });
    }

    if (closeBtn && mobileMenu) {
        closeBtn.addEventListener('click', () => {
            mobileMenu.classList.remove('translate-x-0');
            mobileMenu.classList.add('translate-x-full');
            document.body.style.overflow = '';
        });
    }

    // Fechar ao clicar em algum link interno
    if (mobileMenu) {
        mobileMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.remove('translate-x-0');
                mobileMenu.classList.add('translate-x-full');
                document.body.style.overflow = '';
            });
        });
    }
    // Carregamento Condicional Otimizado do Spline 3D (Lighthouse Performance Upgrade)
    const splineWrapper = document.getElementById('spline-container-mask');
    if (splineWrapper && window.innerWidth >= 768) {
        // Atrasar o carregamento do visualizador 3D para após a renderização inicial completa da página (1.5 segundos)
        setTimeout(() => {
            // 1. Criar e injetar dinamicamente o script do Spline
            const splineScript = document.createElement('script');
            splineScript.src = "https://unpkg.com/@splinetool/viewer@1.9.4/build/spline-viewer.js";
            splineScript.type = "module";
            splineScript.onload = () => {
                // 2. Injetar o elemento spline-viewer
                const viewer = document.createElement('spline-viewer');
                viewer.setAttribute('loading-type', 'lazy');
                viewer.setAttribute('url', 'https://prod.spline.design/kZDDjO5HuC9GJUM2/scene.splinecode');
                viewer.style.width = '100%';
                viewer.style.height = 'calc(100% + 50px)';
                viewer.style.marginBottom = '-50px';
                viewer.style.pointerEvents = 'auto';
                viewer.style.webkitMaskImage = 'linear-gradient(to bottom, black 0%, black 90%, transparent 100%)';
                viewer.style.maskImage = 'linear-gradient(to bottom, black 0%, black 90%, transparent 100%)';
                viewer.className = 'w-full h-full';
                viewer.setAttribute('events-none', '');

                // 3. Remover fallback e adicionar o viewer 3D
                const fallback = document.getElementById('spline-fallback');
                if (fallback) {
                    fallback.style.display = 'none';
                }
                splineWrapper.appendChild(viewer);
            };
            document.head.appendChild(splineScript);
        }, 1500);
    }

    // Inicialização sob demanda do EmailJS e reCAPTCHA v3 para máxima performance
    const contactForm = document.getElementById('contact-form');
    let scriptsLoaded = false;

    const loadContactScripts = () => {
        if (scriptsLoaded) return;
        scriptsLoaded = true;

        // Carrega EmailJS
        const emailJsScript = document.createElement('script');
        emailJsScript.src = "https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js";
        emailJsScript.onload = () => {
            if (typeof emailjs !== 'undefined') {
                emailjs.init("C4ZqobJ25JWOMIAd4");
            }
        };
        document.head.appendChild(emailJsScript);

        // Carrega Google reCAPTCHA v3
        const recaptchaScript = document.createElement('script');
        recaptchaScript.src = "https://www.google.com/recaptcha/api.js?render=6LctbgMtAAAAANu8wfIPfLgYSDcDH-yruVM36Hmd";
        document.head.appendChild(recaptchaScript);
    };

    if (contactForm) {
        // Carrega os scripts quando o usuário interagir com o formulário
        ['focus', 'click', 'touchstart', 'input'].forEach(evt => {
            contactForm.addEventListener(evt, loadContactScripts, { once: true });
        });

        // Ou se o usuário rolar a página até próximo ao formulário
        if ('IntersectionObserver' in window) {
            const formObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        loadContactScripts();
                        formObserver.unobserve(entry.target);
                    }
                });
            }, { rootMargin: '300px 0px' });
            formObserver.observe(contactForm);
        } else {
            // Fallback caso não suporte IntersectionObserver
            window.addEventListener('scroll', () => {
                const rect = contactForm.getBoundingClientRect();
                if (rect.top < window.innerHeight + 300) {
                    loadContactScripts();
                }
            }, { passive: true });
        }
    }
});
