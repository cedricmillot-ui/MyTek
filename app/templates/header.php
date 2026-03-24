<?php if (!ob_start("ob_gzhandler")) ob_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Mytek Energies | Chauffage, Climatisation & Plomberie</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <link rel="preload" href="/assets/img/logo.webp" as="image" fetchpriority="high">

    <link rel="stylesheet" href="/assets/css/base.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700&family=Orbitron:wght@600&display=swap" media="print" onload="this.media='all'">
    
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700&family=Orbitron:wght@600&display=swap">
    </noscript>

    <?php if (class_exists('\Lib\SEO\SEO')) \Lib\SEO\SEO::render(); ?>
    <link rel="icon" href="/favicon.ico">
</head>

<body>
    <div class="topbar">
        <div class="topbar-left">
            <span class="topbar-item">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="14" height="14" fill="currentColor" aria-hidden="true"><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
                67350 Niedermodern
            </span>
            <p href="tel:+33771772785" class="topbar-link" aria-label="Appeler Mytek Energies au 07 71 77 27 85">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="14" height="14" fill="currentColor" aria-hidden="true"><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
                +33 7 71 77 27 85
</p>
            <p href="mailto:contact@mytek-energies.fr" class="topbar-link" aria-label="Nous envoyer un e-mail">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="14" height="14" fill="currentColor" aria-hidden="true"><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>
                contact@mytek-energies.fr
</p>
        </div>

        <div class="topbar-right">
            <a href="https://www.linkedin.com/in/turgay-yildiz-2b158419a/" target="_blank" rel="noopener" aria-label="Suivre Mytek Energies sur LinkedIn" class="social-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="18" height="18" fill="currentColor"><path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"/></svg>
            </a>
            <a href="https://www.instagram.com/mytek_energies/" target="_blank" rel="noopener" aria-label="Suivre Mytek Energies sur Instagram" class="social-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="18" height="18" fill="currentColor"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
            </a>
        </div>
    </div>

    <header>
        <nav class="navbar" aria-label="Menu principal">
            <div class="nav-left">
                <button id="menuTrigger" class="dropdown-trigger" aria-haspopup="true" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="18" height="18" fill="currentColor" aria-hidden="true" style="margin-right: 8px; vertical-align: -3px;">
                        <path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/>
                    </svg>
                    Nos services
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="12" height="12" fill="currentColor" aria-hidden="true" style="margin-left: 6px; vertical-align: 1px;">
                        <path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/>
                    </svg>
                </button>
                <div id="servicesDropdown" class="dropdown">
                    <a href="/climatisation">Climatisation réversible</a>
                    <a href="/pompe-a-chaleur">Pompe à chaleur Air/Eau</a>
                    <a href="/chauffe-eau">Chauffe-eau thermodynamique</a>
                    <a href="/plomberie">Plomberie & Sanitaire</a>
                    <a href="/nettoyage">Nettoyage climatisation</a>
                    <a href="/entretien">Entretien & Maintenance</a>
                </div>
            </div>

            <a href="/" class="logo" title="Retour à l'accueil Mytek Energies">
              <picture>
                <source media="(max-width: 992px)" srcset="/assets/img/logo-mobile.webp">
                <img src="/assets/img/logo.webp" 
                     alt="Logo Mytek Energies" 
                     width="134" 
                     height="63" 
                     fetchpriority="high"
                     decoding="async">
              </picture>
            </a>

            <div class="nav-right">
                <a href="/contact" class="btn" aria-label="Demander un devis gratuit en ligne">Obtenir un devis gratuit</a>
            </div>

            <button class="burger" aria-label="Ouvrir le menu de navigation" onclick="document.getElementById('mobile-nav').classList.toggle('open')">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="24" height="24" fill="currentColor"><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg>
            </button>
        </nav>

        <nav class="mobile-nav" id="mobile-nav" aria-label="Menu mobile">
            <a href="/climatisation">Climatisation</a>
            <a href="/pompe-a-chaleur">Pompe à chaleur</a>
            <a href="/chauffe-eau">Chauffe-eau</a>
            <a href="/plomberie">Plomberie</a>
            <a href="/nettoyage">Nettoyage</a>
            <a href="/entretien">Entretien</a>
            <a href="/contact" class="btn-mobile" aria-label="Contacter Mytek Energies par formulaire">Contactez-nous</a>
        </nav>
    </header>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const trigger = document.getElementById('menuTrigger');
            const dropdown = document.getElementById('servicesDropdown');

            if(trigger && dropdown) {
                trigger.addEventListener('click', (e) => {
                    e.stopPropagation();
                    const isOpen = dropdown.classList.toggle('is-open');
                    trigger.setAttribute('aria-expanded', isOpen);
                });

                document.addEventListener('click', (e) => {
                    if (!dropdown.contains(e.target) && !trigger.contains(e.target)) {
                        dropdown.classList.remove('is-open');
                        trigger.setAttribute('aria-expanded', 'false');
                    }
                });
            }
        });
    </script>
</body>
</html>