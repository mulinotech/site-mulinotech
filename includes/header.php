<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html class="dark" lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title><?php echo isset($pageTitle) ? $pageTitle . " | MulinoTech" : "MulinoTech | Onde a Robustez encontra a Vanguarda"; ?></title>
    
    <!-- Pré-conexão de servidores de alta velocidade para o Spline 3D -->
    <link rel="preconnect" href="https://prod.spline.design" crossorigin />
    <link rel="preconnect" href="https://unpkg.com" crossorigin />
    <script src="https://unpkg.com/@splinetool/viewer@1.9.4/build/spline-viewer.js" type="module"></script>

    <!-- Favicon -->
    <link rel="icon" href="assets/image/favicon.ico" type="image/x-icon" />
    
    <!-- Tailwind CSS com Plugins -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800&amp;family=Inter:wght@400;500;600;700&amp;family=JetBrains+Mono:wght@500&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    
    <!-- Configuração do Tailwind -->
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "primary-fixed-dim": "#c7bfff",
                        "on-primary-container": "#25008c",
                        "tertiary-fixed": "#ffe08f",
                        "deep-space": "#060608",
                        "surface-variant": "#353437",
                        "surface-container": "#201f22",
                        "tertiary": "#e6c364",
                        "secondary": "#44e2cd",
                        "primary-container": "#8e7fff",
                        "on-primary": "#2b009e",
                        "frost-white": "#F0F0F5",
                        "on-surface": "#e5e1e5",
                        "secondary-fixed-dim": "#3cddc7",
                        "on-primary-fixed-variant": "#4229b9",
                        "on-secondary-fixed": "#00201c",
                        "void-navy": "#0B0B1A",
                        "on-tertiary-container": "#503d00",
                        "on-secondary": "#003731",
                        "neon-cyan": "#2DD4BF",
                        "surface-dim": "#131316",
                        "surface-container-highest": "#353437",
                        "on-secondary-fixed-variant": "#005047",
                        "tertiary-container": "#c9a84c",
                        "surface-container-high": "#2a2a2c",
                        "on-error-container": "#ffdad6",
                        "tertiary-fixed-dim": "#e6c364",
                        "on-secondary-container": "#004d44",
                        "surface-container-lowest": "#0e0e10",
                        "outline": "#928ea0",
                        "on-primary-fixed": "#180065",
                        "surface": "#131316",
                        "primary": "#c7bfff",
                        "on-surface-variant": "#c9c4d6",
                        "electric-violet": "#7C6AF5",
                        "background": "#131316",
                        "surface-container-low": "#1c1b1e",
                        "on-tertiary-fixed": "#241a00",
                        "surface-tint": "#c7bfff",
                        "on-tertiary": "#3d2e00",
                        "plasma-gold": "#C9A84C",
                        "surface-bright": "#39393c",
                        "error": "#ffb4ab",
                        "primary-fixed": "#e5deff",
                        "inverse-surface": "#e5e1e5",
                        "on-error": "#690005",
                        "inverse-on-surface": "#313033",
                        "on-tertiary-fixed-variant": "#584400",
                        "secondary-fixed": "#62fae3",
                        "on-background": "#e5e1e5",
                        "inverse-primary": "#5b46d2",
                        "glass-stroke": "rgba(240, 240, 245, 0.12)",
                        "secondary-container": "#03c6b2",
                        "error-container": "#93000a",
                        "outline-variant": "#474554"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "margin-desktop": "64px",
                        "gutter": "24px",
                        "container-max": "1280px",
                        "unit": "8px",
                        "margin-mobile": "16px"
                    },
                    "fontFamily": {
                        "headline-md": ["Sora"],
                        "code-label": ["JetBrains Mono"],
                        "body-lg": ["Inter"],
                        "display-lg": ["Sora"],
                        "display-lg-mobile": ["Sora"],
                        "headline-sm": ["Sora"],
                        "body-md": ["Inter"],
                        "cta-label": ["Sora"]
                    },
                    "fontSize": {
                        "headline-md": ["32px", { "lineHeight": "40px", "fontWeight": "600" }],
                        "code-label": ["14px", { "lineHeight": "20px", "letterSpacing": "0.05em", "fontWeight": "500" }],
                        "body-lg": ["18px", { "lineHeight": "28px", "fontWeight": "400" }],
                        "display-lg": ["64px", { "lineHeight": "72px", "letterSpacing": "-0.02em", "fontWeight": "800" }],
                        "display-lg-mobile": ["40px", { "lineHeight": "48px", "letterSpacing": "-0.02em", "fontWeight": "800" }],
                        "headline-sm": ["24px", { "lineHeight": "32px", "fontWeight": "600" }],
                        "body-md": ["16px", { "lineHeight": "24px", "fontWeight": "400" }],
                        "cta-label": ["16px", { "lineHeight": "100%", "fontWeight": "700" }]
                    }
                },
            },
        }
    </script>
    
    <!-- Folha de Estilos Externa -->
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body class="font-body-md selection:bg-neon-cyan selection:text-void-navy">
    <div class="mouse-glow" id="glow" style="left: 1px; top: 624px;"></div>
    
    <!-- Barra de Navegação Fixa de Largura Total -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-deep-space/70 backdrop-blur-xl border-b border-glass-stroke shadow-lg transition-all duration-300">
        <div class="flex justify-between items-center px-6 py-4 max-w-container-max mx-auto">
            <a href="index" class="flex items-center">
                <img src="assets/image/logo_mulinotech_branco.png" alt="MulinoTech" class="h-10 w-auto object-contain hover:scale-105 transition-transform duration-300 rounded-lg" />
            </a>
            <div class="hidden md:flex items-center gap-8">
                <a class="<?php echo ($currentPage == 'index.php' || $currentPage == '') ? 'text-neon-cyan border-b-2 border-neon-cyan pb-1' : 'text-on-surface-variant hover:text-primary transition-all duration-300 hover:translate-y-[-2px]'; ?> font-headline-sm text-[16px]" href="index">Home</a>
                <a class="<?php echo ($currentPage == 'quem-somos.php') ? 'text-neon-cyan border-b-2 border-neon-cyan pb-1' : 'text-on-surface-variant hover:text-primary transition-all duration-300 hover:translate-y-[-2px]'; ?> font-headline-sm text-[16px]" href="quem-somos">Quem Somos</a>
                <a class="<?php echo ($currentPage == 'servicos.php') ? 'text-neon-cyan border-b-2 border-neon-cyan pb-1' : 'text-on-surface-variant hover:text-primary transition-all duration-300 hover:translate-y-[-2px]'; ?> font-headline-sm text-[16px]" href="servicos">Serviços</a>
                <a class="<?php echo ($currentPage == 'produtos.php') ? 'text-neon-cyan border-b-2 border-neon-cyan pb-1' : 'text-on-surface-variant hover:text-primary transition-all duration-300 hover:translate-y-[-2px]'; ?> font-headline-sm text-[16px]" href="produtos">Produtos</a>
            </div>
            <div class="flex items-center gap-4">
                <a href="login.html" id="nav-login-icon" class="material-symbols-outlined text-primary cursor-pointer hover:scale-110 transition-transform" title="Área do Cliente / Login">account_circle</a>
                <a href="index#contato" class="bg-electric-violet text-on-primary font-cta-label py-2 px-6 rounded-lg btn-3d glow-violet shadow-[0_4px_0_#4229b9] flex items-center justify-center text-sm">Fale com um Especialista</a>
            </div>
        </div>
    </nav>
