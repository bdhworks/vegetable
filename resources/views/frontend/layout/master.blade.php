<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Vegetable">
    <meta name="keywords" content="Vegetable, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('assets/frontend/img/icon_logo.png') }}">
    <title>Nông Sản Việt</title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}" type="text/css">
    
    <!-- Ultra Modern E-commerce Styles -->
    <style>
        /* Elite Variables */
        :root {
            --primary-green: #10b981;
            --primary-green-dark: #059669;
            --primary-green-light: #34d399;
            --accent-blue: #3b82f6;
            --accent-purple: #8b5cf6;
            --neutral-50: #fafafa;
            --neutral-100: #f5f5f5;
            --neutral-200: #e5e5e5;
            --neutral-300: #d4d4d4;
            --neutral-400: #a3a3a3;
            --neutral-500: #737373;
            --neutral-600: #525252;
            --neutral-700: #404040;
            --neutral-800: #262626;
            --neutral-900: #171717;
            --orange-500: #f97316;
            --red-500: #ef4444;
            --yellow-500: #eab308;
            
            --gradient-primary: linear-gradient(135deg, #10b981 0%, #059669 100%);
            --gradient-secondary: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            --gradient-warm: linear-gradient(135deg, #f97316 0%, #ea580c 100%);
            --gradient-purple: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);
            
            --shadow-xs: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-sm: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
            --shadow-2xl: 0 25px 50px -12px rgb(0 0 0 / 0.25);
            
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --radius-xl: 20px;
            --radius-2xl: 24px;
            
            --font-display: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
            --font-body: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            --font-mono: 'SF Mono', 'Monaco', 'Cascadia Code', 'Roboto Mono', monospace;
        }

        /* Elite Typography */
        * {
            font-feature-settings: 'kern' 1, 'liga' 1, 'calt' 1, 'ss01' 1;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        body, html {
            font-family: var(--font-body) !important;
            font-size: 15px;
            font-weight: 400;
            line-height: 1.6;
            color: var(--neutral-700);
            background: #ffffff;
            scroll-behavior: smooth;
            letter-spacing: -0.01em;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: var(--font-display) !important;
            font-weight: 700;
            line-height: 1.2;
            color: var(--neutral-900);
            letter-spacing: -0.02em;
        }

        /* Elite Header Design */
        .header-elite {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px) saturate(180%);
            border-bottom: 1px solid var(--neutral-200);
            position: sticky;
            top: 0;
            z-index: 1000;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .header-elite.scrolled {
            background: rgba(255, 255, 255, 0.98);
            box-shadow: var(--shadow-lg);
            border-bottom-color: var(--neutral-300);
        }

        /* Elite Top Bar */
        .elite-top-bar {
            background: var(--gradient-primary);
            color: white;
            padding: 8px 0;
            font-size: 13px;
            position: relative;
            overflow: hidden;
        }

        .elite-top-bar::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            animation: shimmerEffect 3s ease-in-out infinite;
        }

        @keyframes shimmerEffect {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        .top-bar-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        .promo-message {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 500;
        }

        .promo-icon {
            width: 20px;
            height: 20px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
        }

        .top-bar-links {
            display: flex;
            gap: 20px;
            font-size: 12px;
        }

        .top-bar-link {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .top-bar-link:hover {
            color: white;
        }

        /* Elite Main Header */
        .elite-main-header {
            padding: 16px 0;
        }

        .header-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 2rem;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        /* Elite Logo */
        .logo-elite {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .logo-elite:hover {
            transform: scale(1.02);
        }

        .logo-img {
            height: 48px;
            width: auto;
            filter: drop-shadow(0 2px 8px rgba(16, 185, 129, 0.2));
        }

        .brand-text {
            display: flex;
            flex-direction: column;
        }

        .brand-title {
            font-size: 18px;
            font-weight: 800;
            color: var(--primary-green);
            margin: 0;
            line-height: 1;
            font-family: var(--font-display);
        }

        .brand-tagline {
            font-size: 10px;
            color: var(--neutral-500);
            margin: 0;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        /* Elite Search */
        .search-elite {
            flex: 1;
            max-width: 580px;
            margin: 0 2rem;
        }

        .search-container {
            position: relative;
            background: var(--neutral-50);
            border: 2px solid transparent;
            border-radius: var(--radius-2xl);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
        }

        .search-container:focus-within {
            border-color: var(--primary-green);
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1), var(--shadow-lg);
            background: white;
            transform: translateY(-1px);
        }

        .search-form {
            display: flex;
            align-items: center;
            position: relative;
        }

        .search-icon {
            position: absolute;
            left: 20px;
            color: var(--neutral-400);
            font-size: 16px;
            z-index: 2;
            transition: color 0.3s ease;
        }

        .search-container:focus-within .search-icon {
            color: var(--primary-green);
        }

        .search-input {
            flex: 1;
            border: none;
            background: transparent;
            padding: 16px 24px 16px 52px;
            font-size: 15px;
            color: var(--neutral-700);
            outline: none;
            font-weight: 500;
            font-family: var(--font-body);
        }

        .search-input::placeholder {
            color: var(--neutral-400);
            font-weight: 400;
        }

        .search-btn {
            background: var(--gradient-primary);
            border: none;
            padding: 16px 24px;
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            font-family: var(--font-body);
        }

        .search-btn:hover {
            background: var(--gradient-secondary);
            transform: scale(1.02);
        }

        /* Elite Actions */
        .header-actions-elite {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .action-elite {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px 12px;
            background: var(--neutral-50);
            border: 2px solid transparent;
            border-radius: var(--radius-lg);
            text-decoration: none;
            color: var(--neutral-600);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            min-width: 60px;
            font-size: 12px;
            box-shadow: var(--shadow-xs);
        }

        .action-elite:hover {
            border-color: var(--primary-green);
            background: white;
            color: var(--primary-green);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .action-icon {
            font-size: 20px;
            margin-bottom: 4px;
            transition: transform 0.3s ease;
        }

        .action-elite:hover .action-icon {
            transform: scale(1.1);
        }

        .action-text {
            font-size: 11px;
            font-weight: 600;
            line-height: 1;
            font-family: var(--font-body);
        }

        .action-badge {
            position: absolute;
            top: -2px;
            right: -2px;
            background: var(--gradient-warm);
            color: white;
            font-size: 10px;
            font-weight: 700;
            padding: 2px 6px;
            border-radius: 10px;
            min-width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: var(--shadow-sm);
            animation: badgePulse 2s ease-in-out infinite;
        }

        @keyframes badgePulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        /* Elite Navigation */
        .nav-elite {
            background: white;
            border-top: 1px solid var(--neutral-200);
            padding: 8px 0;
            box-shadow: var(--shadow-sm);
        }

        .nav-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
            gap: 8px;
        }

        .nav-item {
            position: relative;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px 20px;
            color: var(--neutral-600);
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: var(--radius-lg);
            font-family: var(--font-body);
            position: relative;
            overflow: hidden;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(16, 185, 129, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .nav-link:hover::before {
            left: 100%;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--primary-green);
            background: rgba(16, 185, 129, 0.05);
            transform: translateY(-1px);
        }

        .nav-icon {
            font-size: 14px;
            transition: transform 0.3s ease;
        }

        .nav-link:hover .nav-icon {
            transform: scale(1.1);
        }

        /* Dropdown */
        .nav-dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            background: white;
            min-width: 280px;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-xl);
            border: 1px solid var(--neutral-200);
            opacity: 0;
            visibility: hidden;
            transform: translateY(-8px);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1000;
            overflow: hidden;
        }

        .nav-item:hover .nav-dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-header {
            background: var(--gradient-primary);
            color: white;
            padding: 16px 20px;
            font-weight: 600;
            font-size: 14px;
        }

        .dropdown-content {
            padding: 12px;
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            border-radius: var(--radius-md);
            text-decoration: none;
            color: var(--neutral-600);
            transition: all 0.2s ease;
            margin-bottom: 4px;
        }

        .dropdown-item:hover {
            background: var(--neutral-50);
            color: var(--primary-green);
            transform: translateX(4px);
        }

        .dropdown-icon {
            width: 32px;
            height: 32px;
            background: rgba(16, 185, 129, 0.1);
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-green);
            font-size: 14px;
        }

        .dropdown-text {
            display: flex;
            flex-direction: column;
        }

        .dropdown-title {
            font-weight: 600;
            font-size: 13px;
            margin: 0;
            line-height: 1.2;
        }

        .dropdown-desc {
            font-size: 11px;
            color: var(--neutral-400);
            margin: 2px 0 0 0;
        }

        /* Elite Features */
        .elite-features {
            display: flex;
            gap: 24px;
            font-size: 12px;
            color: var(--neutral-500);
        }

        .feature-elite {
            display: flex;
            align-items: center;
            gap: 6px;
            font-weight: 500;
        }

        .feature-icon {
            font-size: 12px;
            color: var(--primary-green);
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .header-container {
                flex-direction: column;
                gap: 16px;
                padding: 0 1rem;
            }

            .search-elite {
                order: 2;
                width: 100%;
                margin: 0;
            }

            .header-actions-elite {
                order: 3;
                justify-content: center;
                width: 100%;
                gap: 12px;
            }

            .nav-elite {
                display: none;
            }

            .elite-main-header {
                padding: 12px 0;
            }

            .elite-features {
                display: none;
            }

            .brand-text {
                display: none;
            }

            .top-bar-links {
                display: none;
            }
        }

        /* Elite Product Cards */
        .product-card-elite {
            background: white;
            border: 1px solid var(--neutral-200);
            border-radius: var(--radius-xl);
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            height: 100%;
            box-shadow: var(--shadow-sm);
            position: relative;
        }

        .product-card-elite:hover {
            border-color: var(--primary-green);
            box-shadow: var(--shadow-xl);
            transform: translateY(-8px);
        }

        .product-image-elite {
            position: relative;
            overflow: hidden;
            aspect-ratio: 1;
            background: var(--neutral-50);
        }

        .product-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .product-card-elite:hover .product-img {
            transform: scale(1.05);
        }

        .product-badges-elite {
            position: absolute;
            top: 12px;
            left: 12px;
            display: flex;
            flex-direction: column;
            gap: 6px;
            z-index: 2;
        }

        .badge-elite {
            padding: 4px 10px;
            border-radius: var(--radius-md);
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: var(--shadow-sm);
        }

        .badge-sale { background: var(--gradient-warm); color: white; }
        .badge-new { background: var(--gradient-primary); color: white; }
        .badge-hot { background: var(--gradient-purple); color: white; }

        .product-actions-elite {
            position: absolute;
            top: 12px;
            right: 12px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            opacity: 0;
            transform: translateX(20px);
            transition: all 0.3s ease;
        }

        .product-card-elite:hover .product-actions-elite {
            opacity: 1;
            transform: translateX(0);
        }

        .action-btn-elite {
            width: 36px;
            height: 36px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid var(--neutral-200);
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 14px;
            color: var(--neutral-600);
            box-shadow: var(--shadow-sm);
        }

        .action-btn-elite:hover {
            background: var(--primary-green);
            color: white;
            border-color: var(--primary-green);
            transform: scale(1.1);
            box-shadow: var(--shadow-md);
        }

        .product-info-elite {
            padding: 20px;
        }

        .product-category-elite {
            font-size: 11px;
            color: var(--primary-green);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }

        .product-title-elite {
            font-size: 16px;
            font-weight: 700;
            color: var(--neutral-900);
            margin: 0 0 8px 0;
            line-height: 1.3;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            font-family: var(--font-display);
        }

        .product-title-elite a {
            color: inherit;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .product-title-elite a:hover {
            color: var(--primary-green);
        }

        .product-rating-elite {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 12px;
        }

        .stars-elite {
            display: flex;
            gap: 2px;
        }

        .star {
            font-size: 12px;
            color: var(--yellow-500);
        }

        .rating-text {
            font-size: 12px;
            color: var(--neutral-400);
            font-weight: 500;
        }

        .product-price-elite {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 16px;
        }

        .price-current {
            font-size: 20px;
            font-weight: 800;
            color: var(--primary-green);
            font-family: var(--font-mono);
        }

        .price-original {
            font-size: 14px;
            color: var(--neutral-400);
            text-decoration: line-through;
            font-family: var(--font-mono);
        }

        .price-discount {
            background: var(--red-500);
            color: white;
            font-size: 10px;
            font-weight: 700;
            padding: 2px 6px;
            border-radius: var(--radius-sm);
        }

        .add-to-cart-elite {
            width: 100%;
            background: var(--gradient-primary);
            color: white;
            border: none;
            padding: 14px 20px;
            border-radius: var(--radius-lg);
            font-weight: 700;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-family: var(--font-body);
            box-shadow: var(--shadow-sm);
        }

        .add-to-cart-elite:hover {
            background: var(--gradient-secondary);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .add-to-cart-elite:active {
            transform: translateY(0);
        }

        /* Elite Footer */
        .footer-elite {
            background: linear-gradient(135deg, var(--neutral-900) 0%, var(--neutral-800) 100%);
            color: white;
            position: relative;
            overflow: hidden;
        }

        .footer-elite::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 20% 50%, rgba(16, 185, 129, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(59, 130, 246, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 40% 80%, rgba(139, 92, 246, 0.1) 0%, transparent 50%);
            pointer-events: none;
        }

        .footer-content {
            padding: 60px 0 30px;
            position: relative;
            z-index: 1;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-section {
            display: flex;
            flex-direction: column;
        }

        .footer-logo {
            margin-bottom: 24px;
        }

        .footer-logo img {
            height: 48px;
            filter: brightness(1.2);
        }

        .footer-desc {
            color: var(--neutral-300);
            line-height: 1.6;
            margin-bottom: 24px;
            font-size: 15px;
        }

        .footer-title {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 20px;
            color: white;
            font-family: var(--font-display);
            position: relative;
            padding-bottom: 8px;
        }

        .footer-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 3px;
            background: var(--gradient-primary);
            border-radius: 2px;
        }

        .footer-link {
            color: var(--neutral-300);
            text-decoration: none;
            padding: 6px 0;
            transition: all 0.3s ease;
            font-weight: 500;
            font-size: 14px;
        }

        .footer-link:hover {
            color: var(--primary-green-light);
            padding-left: 8px;
        }

        .social-links {
            display: flex;
            gap: 12px;
            margin-top: 24px;
        }

        .social-link {
            width: 44px;
            height: 44px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: var(--radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 16px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .social-link:hover {
            background: var(--primary-green);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
            color: white;
        }

        .footer-bottom {
            background: rgba(0, 0, 0, 0.2);
            padding: 24px 0;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
            backdrop-filter: blur(10px);
        }

        .footer-bottom-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        .copyright {
            color: var(--neutral-400);
            font-size: 14px;
        }

        .footer-links {
            display: flex;
            gap: 24px;
        }

        .footer-links a {
            color: var(--neutral-400);
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: var(--primary-green-light);
        }

        /* Responsive Footer */
        @media (max-width: 768px) {
            .footer-grid {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .footer-bottom-content {
                flex-direction: column;
                gap: 16px;
            }

            .footer-links {
                flex-wrap: wrap;
                justify-content: center;
                gap: 16px;
            }
        }

        /* Animation Utilities */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-fade-up {
            animation: fadeInUp 0.6s ease forwards;
        }

        .animate-fade-left {
            animation: fadeInLeft 0.6s ease forwards;
        }

        /* Scrollbar Styling */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--neutral-100);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--gradient-primary);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--gradient-secondary);
        }

        /* Loading States */
        .loading {
            position: relative;
            overflow: hidden;
        }

        .loading::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            animation: loading 1.5s infinite;
        }

        @keyframes loading {
            0% { left: -100%; }
            100% { left: 100%; }
        }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="">
        <div class=""></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="{{ asset('assets/frontend/img/icon_logo.png') }}" alt="" ></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="{{route('cart')}}"><i class="fa fa-shopping-basket"></i> <span>{{ session('cart') !== null ? count(session('cart')) : 0 }}</span></a></li>
            </ul>
            <div class="header__cart__price">Tổng tiền: <span>{{session('total_price') ?? 0}}đ</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__auth">
                @if (!Auth::guard('web')->check())
                    <a href="{{route('login')}}"><i class="fa fa-user"></i> Đăng nhập</a>
                @else
                    <a href="{{route('account')}}"><i class="fa fa-user"></i>{{Auth::guard('web')->user()->name}}</a>
                @endif
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="{{route('home')}}">Trang chủ</a></li>
                <li><a href="{{route('shop')}}">Cửa hàng</a></li>
                <li><a href="#">Thương hiệu</a>
                    <ul class="header__menu__dropdown">
                         @foreach ($brands as $brand)
                            <li><a href="{{route('brand', $brand)}}">{{$brand->name}}</a></li>
                         @endforeach
                    </ul>
                </li>
                <li><a href="{{ route('blog') }}">Bài viết</a></li>
                <li><a href="{{route('contact')}}">Liên hệ</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">

        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i>hello@nongsanviet.com</li>
                <li>Hỗ trợ vận chuyển đồ toàn quốc</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Elite Modern Header Begin -->
    <header class="header-elite" id="header">
        <!-- Elite Top Bar -->
        <div class="elite-top-bar">
            <div class="container">
                <div class="top-bar-content">
                    <div class="promo-message">
                        <div class="promo-icon">🎉</div>
                        <span>Miễn phí vận chuyển đơn từ 500K • Giảm 25% đơn đầu tiên</span>
                    </div>
                    <div class="top-bar-links">
                        <a href="#" class="top-bar-link">Hướng dẫn mua hàng</a>
                        <a href="#" class="top-bar-link">Chăm sóc khách hàng</a>
                        <a href="#" class="top-bar-link">Tải ứng dụng</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Elite Main Header -->
        <div class="elite-main-header">
            <div class="header-container">
                <!-- Elite Logo -->
                <a href="{{route('home')}}" class="logo-elite">
                    <img src="{{ asset('assets/frontend/img/icon_logo.png') }}" alt="Nông Sản Việt" class="logo-img">
                    <div class="brand-text d-none d-lg-block">
                        <div class="brand-title">Nông Sản Việt</div>
                        <div class="brand-tagline">Tự nhiên • Tươi ngon • An toàn</div>
                    </div>
                </a>

                <!-- Elite Search -->
                <div class="search-elite d-none d-md-block">
                    <div class="search-container">
                        <form action="{{route('shop')}}" class="search-form">
                            <i class="fa fa-search search-icon"></i>
                            <input type="text" 
                                   name="search" 
                                   class="search-input" 
                                   placeholder="Tìm kiếm sản phẩm, thương hiệu, danh mục..."
                                   value="{{ request('search') }}">
                            <button type="submit" class="search-btn">
                                <span>Tìm kiếm</span>
                                <i class="fa fa-arrow-right"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Elite Actions -->
                <div class="header-actions-elite">
                    @if (Auth::guard('web')->check())
                        <a href="{{route('account')}}" class="action-elite">
                            <div class="action-icon">
                                <i class="fa fa-user-circle"></i>
                            </div>
                            <div class="action-text">Tài khoản</div>
                        </a>
                    @else
                        <a href="{{route('login')}}" class="action-elite">
                            <div class="action-icon">
                                <i class="fa fa-sign-in"></i>
                            </div>
                            <div class="action-text">Đăng nhập</div>
                        </a>
                    @endif

                    <a href="#" class="action-elite">
                        <div class="action-icon">
                            <i class="fa fa-heart"></i>
                            <span class="action-badge">3</span>
                        </div>
                        <div class="action-text">Yêu thích</div>
                    </a>

                    <a href="{{route('cart')}}" class="action-elite">
                        <div class="action-icon">
                            <i class="fa fa-shopping-cart"></i>
                            <span class="action-badge">{{ session('cart') !== null ? count(session('cart')) : 0 }}</span>
                        </div>
                        <div class="action-text">Giỏ hàng</div>
                    </a>
                </div>
            </div>

            <!-- Mobile Search -->
            <div class="d-md-none mt-3">
                <div class="container">
                    <div class="search-elite">
                        <div class="search-container">
                            <form action="{{route('shop')}}" class="search-form">
                                <i class="fa fa-search search-icon"></i>
                                <input type="text" 
                                       name="search" 
                                       class="search-input" 
                                       placeholder="Tìm kiếm sản phẩm..."
                                       value="{{ request('search') }}">
                                <button type="submit" class="search-btn">
                                    <i class="fa fa-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Elite Navigation -->
        <div class="nav-elite d-none d-lg-block">
            <div class="nav-container">
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="{{route('home')}}" class="nav-link active">
                            <i class="nav-icon fa fa-home"></i>
                            <span>Trang chủ</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('shop')}}" class="nav-link">
                            <i class="nav-icon fa fa-shopping-bag"></i>
                            <span>Sản phẩm</span>
                        </a>
                        <div class="nav-dropdown">
                            <div class="dropdown-header">
                                <i class="fa fa-leaf"></i>
                                Danh mục sản phẩm
                            </div>
                            <div class="dropdown-content">
                                @foreach ($categories->take(6) as $category)
                                <a href="{{ route('shop', ['category' => $category->id]) }}" class="dropdown-item">
                                    <div class="dropdown-icon">
                                        <i class="fa fa-leaf"></i>
                                    </div>
                                    <div class="dropdown-text">
                                        <div class="dropdown-title">{{ $category->name }}</div>
                                        <div class="dropdown-desc">{{ $category->products_count ?? 0 }} sản phẩm</div>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('blog')}}" class="nav-link">
                            <i class="nav-icon fa fa-newspaper-o"></i>
                            <span>Tin tức</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('contact')}}" class="nav-link">
                            <i class="nav-icon fa fa-phone"></i>
                            <span>Liên hệ</span>
                        </a>
                    </li>
                </ul>

                <div class="elite-features">
                    <div class="feature-elite">
                        <i class="feature-icon fa fa-shield"></i>
                        <span>Đảm bảo chất lượng</span>
                    </div>
                    <div class="feature-elite">
                        <i class="feature-icon fa fa-truck"></i>
                        <span>Giao hàng miễn phí</span>
                    </div>
                    <div class="feature-elite">
                        <i class="feature-icon fa fa-headphones"></i>
                        <span>Hỗ trợ 24/7</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Elite Modern Header End -->

    @yield('content')

    <!-- Elite Footer Begin -->
    <footer class="footer-elite">
        <div class="footer-content">
            <div class="container">
                <div class="footer-grid">
                    <div class="footer-section">
                        <div class="footer-logo">
                            <img src="/assets/frontend/img/logo.png" alt="Nông Sản Việt">
                        </div>
                        <p class="footer-desc">
                            Nông Sản Việt - Cung cấp nông sản sạch, tươi ngon và an toàn cho sức khỏe. 
                            Chúng tôi cam kết mang đến những sản phẩm chất lượng cao nhất từ các vùng đất phì nhiêu.
                        </p>
                        <div class="social-links">
                            <a href="#" class="social-link"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="social-link"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="social-link"><i class="fa fa-youtube"></i></a>
                            <a href="#" class="social-link"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="social-link"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>

                    <div class="footer-section">
                        <h6 class="footer-title">Sản phẩm</h6>
                        <a href="{{route('shop')}}" class="footer-link">Tất cả sản phẩm</a>
                        <a href="#" class="footer-link">Rau xanh hữu cơ</a>
                        <a href="#" class="footer-link">Trái cây tươi</a>
                        <a href="#" class="footer-link">Thực phẩm sạch</a>
                        <a href="#" class="footer-link">Combo tiết kiệm</a>
                    </div>

                    <div class="footer-section">
                        <h6 class="footer-title">Hỗ trợ</h6>
                        <a href="#" class="footer-link">Hướng dẫn mua hàng</a>
                        <a href="#" class="footer-link">Chính sách đổi trả</a>
                        <a href="#" class="footer-link">Chính sách bảo mật</a>
                        <a href="#" class="footer-link">Điều khoản sử dụng</a>
                        <a href="#" class="footer-link">Câu hỏi thường gặp</a>
                    </div>

                    <div class="footer-section">
                        <h6 class="footer-title">Liên hệ</h6>
                        <div style="color: var(--neutral-300); line-height: 1.8;">
                            <p><i class="fa fa-map-marker" style="color: var(--primary-green-light); margin-right: 8px;"></i>Mê Linh, Hà Nội</p>
                            <p><i class="fa fa-phone" style="color: var(--primary-green-light); margin-right: 8px;"></i>0988 888 888</p>
                            <p><i class="fa fa-envelope" style="color: var(--primary-green-light); margin-right: 8px;"></i>hello@nongsanviet.com</p>
                            <p><i class="fa fa-clock-o" style="color: var(--primary-green-light); margin-right: 8px;"></i>7:00 - 22:00 (Hàng ngày)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="footer-bottom-content">
                <div class="copyright">
                    &copy; 2024 Nông Sản Việt. All rights reserved. Made with ❤️ in Vietnam
                </div>
                <div class="footer-links">
                    <a href="#">Chính sách bảo mật</a>
                    <a href="#">Điều khoản dịch vụ</a>
                    <a href="#">Sitemap</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Elite Footer End -->

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- ...existing scripts... -->

    <!-- Elite JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Elite header scroll effect
            const header = document.getElementById('header');
            let lastScrollTop = 0;
            
            window.addEventListener('scroll', function() {
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                
                if (scrollTop > 10) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
                
                // Hide/show header on scroll
                if (scrollTop > lastScrollTop && scrollTop > 200) {
                    header.style.transform = 'translateY(-100%)';
                } else {
                    header.style.transform = 'translateY(0)';
                }
                
                lastScrollTop = scrollTop;
            });

            // Enhanced search functionality
            const searchInput = document.querySelector('.search-input');
            if (searchInput) {
                let searchTimeout;
                
                searchInput.addEventListener('input', function() {
                    clearTimeout(searchTimeout);
                    searchTimeout = setTimeout(() => {
                        // Implement real-time search here
                        console.log('Searching for:', this.value);
                    }, 300);
                });

                // Search shortcuts
                document.addEventListener('keydown', function(e) {
                    if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                        e.preventDefault();
                        searchInput.focus();
                    }
                });
            }

            // Animation on scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-fade-up');
                    }
                });
            }, observerOptions);

            // Observe elements for animation
            document.querySelectorAll('.product-card-elite').forEach(el => {
                observer.observe(el);
            });

            // Enhanced cart functionality
            document.querySelectorAll('.add-to-cart-elite').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    const originalText = this.innerHTML;
                    this.classList.add('loading');
                    this.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Đang thêm...';
                    this.disabled = true;
                    
                    setTimeout(() => {
                        this.classList.remove('loading');
                        this.innerHTML = '<i class="fa fa-check"></i> Đã thêm vào giỏ';
                        this.style.background = 'var(--gradient-primary)';
                        
                        setTimeout(() => {
                            this.innerHTML = originalText;
                            this.disabled = false;
                            this.style.background = '';
                        }, 2000);
                    }, 800);
                });
            });

            // Smooth scrolling for anchor links
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

            // Initialize tooltips and other Bootstrap components
            if (typeof bootstrap !== 'undefined') {
                const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                tooltipTriggerList.map(function (tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl);
                });
            }
        });
    </script>

</body>

</html>
