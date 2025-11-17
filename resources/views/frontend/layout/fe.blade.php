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
    
    <!-- Beautiful Modern Header Styles -->
    <style>
        /* Beautiful Header Variables */
        :root {
            --header-height-main: 80px;
            --header-height-nav: 50px;
            --primary-emerald: #10b981;
            --primary-emerald-dark: #059669;
            --primary-emerald-light: #34d399;
            --accent-orange: #f59e0b;
            --accent-red: #ef4444;
            --neutral-white: #ffffff;
            --neutral-gray-50: #f9fafb;
            --neutral-gray-100: #f3f4f6;
            --neutral-gray-200: #e5e7eb;
            --neutral-gray-300: #d1d5db;
            --neutral-gray-400: #9ca3af;
            --neutral-gray-500: #6b7280;
            --neutral-gray-600: #4b5563;
            --neutral-gray-700: #374151;
            --neutral-gray-800: #1f2937;
            --neutral-gray-900: #111827;
            
            --gradient-emerald: linear-gradient(135deg, #10b981 0%, #059669 100%);
            --gradient-ocean: linear-gradient(135deg, #0891b2 0%, #0e7490 100%);
            --gradient-sunset: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            
            --shadow-subtle: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            --shadow-soft: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-medium: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-large: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            
            --border-radius-sm: 6px;
            --border-radius-md: 8px;
            --border-radius-lg: 12px;
            --border-radius-xl: 16px;
            --border-radius-2xl: 20px;
            --border-radius-full: 9999px;
        }

        /* Enhanced Typography */
        body, html {
            font-family: 'Inter', system-ui, -apple-system, sans-serif !important;
            font-size: 15px;
            font-weight: 400;
            line-height: 1.6;
            color: var(--neutral-gray-700);
            background: var(--neutral-white);
            scroll-behavior: smooth;
            letter-spacing: -0.01em;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Plus Jakarta Sans', system-ui, sans-serif !important;
            font-weight: 600;
            line-height: 1.25;
            color: var(--neutral-gray-900);
            letter-spacing: -0.025em;
        }

        /* Beautiful Header Container */
        .header-beautiful {
            background: linear-gradient(to bottom, rgba(255,255,255,0.98), rgba(255,255,255,0.95));
            backdrop-filter: blur(24px) saturate(180%);
            border-bottom: 1px solid var(--neutral-gray-200);
            position: sticky;
            top: 0;
            z-index: 1000;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: var(--shadow-subtle);
        }

        .header-beautiful.scrolled {
            background: rgba(255, 255, 255, 0.98);
            box-shadow: var(--shadow-soft);
            backdrop-filter: blur(20px);
        }

        /* Beautiful Top Bar */
        .beautiful-top-bar {
            background: var(--gradient-emerald);
            color: white;
            padding: 6px 0;
            font-size: 13px;
            position: relative;
            overflow: hidden;
        }

        .beautiful-top-bar::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.12), transparent);
            animation: topBarShimmer 4s ease-in-out infinite;
        }

        @keyframes topBarShimmer {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        .top-bar-beautiful {
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            z-index: 1;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .promo-beautiful {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 500;
        }

        .promo-icon-beautiful {
            width: 20px;
            height: 20px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            backdrop-filter: blur(10px);
        }

        .top-links-beautiful {
            display: flex;
            gap: 24px;
            font-size: 12px;
        }

        .top-link-beautiful {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 2px 8px;
            border-radius: var(--border-radius-md);
        }

        .top-link-beautiful:hover {
            color: white;
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-1px);
        }

        /* Beautiful Main Header */
        .beautiful-main-header {
            padding: 16px 0;
            background: var(--neutral-white);
        }

        .header-beautiful-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 2rem;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        /* Beautiful Logo */
        .logo-beautiful {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            transition: all 0.3s ease;
            padding: 8px;
            border-radius: var(--border-radius-lg);
        }

        .logo-beautiful:hover {
            transform: translateY(-2px);
            background: rgba(16, 185, 129, 0.05);
        }

        .logo-img-beautiful {
            height: 45px;
            width: auto;
            filter: drop-shadow(0 4px 8px rgba(16, 185, 129, 0.25));
            transition: filter 0.3s ease;
        }

        .logo-beautiful:hover .logo-img-beautiful {
            filter: drop-shadow(0 6px 12px rgba(16, 185, 129, 0.35));
        }

        .brand-beautiful {
            display: flex;
            flex-direction: column;
        }

        .brand-title-beautiful {
            font-size: 18px;
            font-weight: 800;
            color: var(--primary-emerald);
            margin: 0;
            line-height: 1;
            background: var(--gradient-emerald);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .brand-tagline-beautiful {
            font-size: 11px;
            color: var(--neutral-gray-500);
            margin: 0;
            font-weight: 500;
            letter-spacing: 0.5px;
            margin-top: 1px;
        }

        /* Beautiful Search */
        .search-beautiful {
            flex: 1;
            max-width: 500px;
            margin: 0 2rem;
        }

        .search-beautiful-container {
            position: relative;
            background: linear-gradient(135deg, var(--neutral-gray-50), var(--neutral-white));
            border: 2px solid transparent;
            border-radius: var(--border-radius-full);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
            box-shadow: var(--shadow-subtle);
        }

        .search-beautiful-container:focus-within {
            border-color: var(--primary-emerald);
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1), var(--shadow-soft);
            background: white;
            transform: translateY(-1px);
        }

        .search-form-beautiful {
            display: flex;
            align-items: center;
            position: relative;
        }

        .search-icon-beautiful {
            position: absolute;
            left: 18px;
            color: var(--neutral-gray-400);
            font-size: 16px;
            z-index: 2;
            transition: all 0.3s ease;
        }

        .search-beautiful-container:focus-within .search-icon-beautiful {
            color: var(--primary-emerald);
            transform: scale(1.1);
        }

        .search-input-beautiful {
            flex: 1;
            border: none;
            background: transparent;
            padding: 14px 24px 14px 48px;
            font-size: 15px;
            color: var(--neutral-gray-700);
            outline: none;
            font-weight: 500;
            font-family: 'Inter', sans-serif;
        }

        .search-input-beautiful::placeholder {
            color: var(--neutral-gray-400);
            font-weight: 400;
        }

        .search-btn-beautiful {
            background: var(--gradient-emerald);
            border: none;
            padding: 14px 24px;
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            border-radius: 0 var(--border-radius-full) var(--border-radius-full) 0;
            position: relative;
            overflow: hidden;
        }

        .search-btn-beautiful::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            
            transition: left 0.5s ease;
        }

        .search-btn-beautiful:hover::before {
            left: 100%;
        }

        .search-btn-beautiful:hover {
            transform: scale(1.02);
            box-shadow: var(--shadow-soft);
        }

        /* Beautiful Header Actions - Compact Borderless Design */
        .header-actions-beautiful {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .action-beautiful {
            position: relative;
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 10px;
            padding: 10px 14px;
            background: transparent;
            border: none;
            border-radius: var(--border-radius-lg);
            text-decoration: none;
            color: var(--neutral-gray-700);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            min-height: 48px;
            font-size: 12px;
        }

        .action-beautiful:hover {
            transform: translateY(-2px);
        }

        .action-icon-wrapper {
            position: relative;
            width: 38px;
            height: 38px;
            border-radius: var(--border-radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            flex-shrink: 0;
        }

        .action-beautiful:hover .action-icon-wrapper {
            transform: scale(1.15);
        }

        .action-icon-beautiful {
            font-size: 20px;
            transition: all 0.3s ease;
            position: relative;
            z-index: 1;
        }

        .action-content-beautiful {
            display: flex;
            flex-direction: column;
            gap: 1px;
            min-width: 65px;
        }

        .action-label-beautiful {
            font-size: 9px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            opacity: 0.5;
            line-height: 1;
        }

        .action-text-beautiful {
            font-size: 12px;
            font-weight: 700;
            line-height: 1.2;
            font-family: 'Inter', sans-serif;
        }

        .action-badge-beautiful {
            position: absolute;
            top: -4px;
            right: -4px;
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
            font-size: 10px;
            font-weight: 800;
            padding: 2px 6px;
            border-radius: var(--border-radius-full);
            min-width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 8px rgba(239, 68, 68, 0.4);
            border: 2px solid white;
            z-index: 10;
        }

        /* Login Action Styles */
        .action-beautiful.login-action .action-icon-wrapper {
            background: linear-gradient(135deg, #dbeafe, #bfdbfe);
            color: #3b82f6;
        }

        .action-beautiful.login-action:hover {
            background: rgba(59, 130, 246, 0.05);
        }

        .action-beautiful.login-action:hover .action-icon-wrapper {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: white;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        .action-beautiful.login-action:hover .action-text-beautiful {
            color: #1e40af;
        }

        /* Account Action Styles */
        .action-beautiful.account-action .action-icon-wrapper {
            background: linear-gradient(135deg, #e0e7ff, #c7d2fe);
            color: #6366f1;
        }

        .action-beautiful.account-action:hover {
            background: rgba(99, 102, 241, 0.05);
        }

        .action-beautiful.account-action:hover .action-icon-wrapper {
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            color: white;
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
        }

        .action-beautiful.account-action:hover .action-text-beautiful {
            color: #4338ca;
        }

        /* Wishlist Action Styles */
        .action-beautiful.wishlist-action .action-icon-wrapper {
            background: linear-gradient(135deg, #fce7f3, #fbcfe8);
            color: #ec4899;
        }

        .action-beautiful.wishlist-action:hover {
            background: rgba(236, 72, 153, 0.05);
        }

        .action-beautiful.wishlist-action:hover .action-icon-wrapper {
            background: linear-gradient(135deg, #ec4899, #db2777);
            color: white;
            box-shadow: 0 4px 12px rgba(236, 72, 153, 0.3);
        }

        .action-beautiful.wishlist-action:hover .action-text-beautiful {
            color: #be185d;
        }

        .action-beautiful.wishlist-action:hover .action-icon-beautiful {
            animation: heartBeat 0.6s ease-in-out;
        }

        @keyframes heartBeat {
            0%, 100% { transform: scale(1); }
            25% { transform: scale(1.15); }
            50% { transform: scale(0.95); }
            75% { transform: scale(1.1); }
        }

        /* Cart Action Styles */
        .action-beautiful.cart-action .action-icon-wrapper {
            background: linear-gradient(135deg, #d1fae5, #a7f3d0);
            color: var(--primary-emerald);
        }

        .action-beautiful.cart-action:hover {
            background: rgba(16, 185, 129, 0.05);
        }

        .action-beautiful.cart-action:hover .action-icon-wrapper {
            background: var(--gradient-emerald);
            color: white;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }

        .action-beautiful.cart-action:hover .action-text-beautiful {
            color: var(--primary-emerald-dark);
        }

        .action-beautiful.cart-action:hover .action-icon-beautiful {
            animation: cartShake 0.5s ease-in-out;
        }

        @keyframes cartShake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-2px) rotate(-3deg); }
            75% { transform: translateX(2px) rotate(3deg); }
        }

        /* Beautiful Navigation */
        .nav-beautiful {
            background: linear-gradient(to right, rgba(255,255,255,0.98), rgba(249,250,251,0.98));
            border-top: 1px solid var(--neutral-gray-200);
            padding: 8px 0;
            box-shadow: var(--shadow-subtle);
            backdrop-filter: blur(10px);
        }

        .nav-beautiful-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .nav-menu-beautiful {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
            gap: 8px;
        }

        .nav-item-beautiful {
            position: relative;
        }

        .nav-link-beautiful {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px 20px;
            color: var(--neutral-gray-600);
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: var(--border-radius-lg);
            font-family: 'Inter', sans-serif;
            position: relative;
            overflow: hidden;
        }

        .nav-link-beautiful::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(16, 185, 129, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .nav-link-beautiful:hover::before {
            left: 100%;
        }

        .nav-link-beautiful:hover,
        .nav-link-beautiful.active {
            color: var(--primary-emerald);
            background: rgba(16, 185, 129, 0.08);
            transform: translateY(-1px);
            box-shadow: var(--shadow-subtle);
        }

        .nav-icon-beautiful {
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .nav-link-beautiful:hover .nav-icon-beautiful {
            transform: scale(1.1) rotate(5deg);
        }

        /* Beautiful Dropdown */
        .nav-dropdown-beautiful {
            position: absolute;
            top: 100%;
            left: 0;
            background: white;
            min-width: 320px;
            border-radius: var(--border-radius-xl);
            box-shadow: var(--shadow-large);
            border: 1px solid var(--neutral-gray-200);
            opacity: 0;
            visibility: hidden;
            transform: translateY(-12px) scale(0.95);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1000;
            overflow: hidden;
        }

        .nav-item-beautiful:hover .nav-dropdown-beautiful {
            opacity: 1;
            visibility: visible;
            transform: translateY(0) scale(1);
        }

        .dropdown-header-beautiful {
            background: var(--gradient-emerald);
            color: white;
            padding: 18px 24px;
            font-weight: 700;
            font-size: 16px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .dropdown-content-beautiful {
            padding: 16px;
        }

        .dropdown-item-beautiful {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 14px 20px;
            border-radius: var(--border-radius-lg);
            text-decoration: none;
            color: var(--neutral-gray-600);
            transition: all 0.2s ease;
            margin-bottom: 4px;
        }

        .dropdown-item-beautiful:hover {
            background: var(--neutral-gray-50);
            color: var(--primary-emerald);
            transform: translateX(6px);
        }

        .dropdown-icon-beautiful {
            width: 40px;
            height: 40px;
            background: rgba(16, 185, 129, 0.1);
            border-radius: var(--border-radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-emerald);
            font-size: 16px;
            flex-shrink: 0;
        }

        .dropdown-text-beautiful {
            display: flex;
            flex-direction: column;
        }

        .dropdown-title-beautiful {
            font-weight: 600;
            font-size: 14px;
            margin: 0;
            line-height: 1.2;
            color: var(--neutral-gray-700);
        }

        .dropdown-desc-beautiful {
            font-size: 12px;
            color: var(--neutral-gray-400);
            margin: 2px 0 0 0;
        }

        /* Beautiful Features */
        .features-beautiful {
            display: flex;
            gap: 24px;
            font-size: 12px;
            color: var(--neutral-gray-500);
        }

        .feature-beautiful {
            display: flex;
            align-items: center;
            gap: 6px;
            font-weight: 500;
            padding: 6px 12px;
            background: rgba(16, 185, 129, 0.08);
            border-radius: var(--border-radius-lg);
            transition: all 0.3s ease;
        }

        .feature-beautiful:hover {
            background: rgba(16, 185, 129, 0.12);
            transform: translateY(-1px);
        }

        .feature-icon-beautiful {
            font-size: 12px;
            color: var(--primary-emerald);
        }

        /* Mobile Responsive */
        @media (max-width: 1200px) {
            .header-beautiful-container {
                gap: 1rem;
            }
            
            .search-beautiful {
                max-width: 350px;
                margin: 0 1rem;
            }
        }

        @media (max-width: 1024px) {
            .header-beautiful-container {
                flex-wrap: wrap;
                gap: 1rem;
            }

            .search-beautiful {
                order: 3;
                width: 100%;
                margin: 16px 0 0 0;
                max-width: none;
            }

            .header-actions-beautiful {
                order: 2;
                gap: 6px;
            }

            .nav-beautiful {
                display: none;
            }

            .beautiful-main-header {
                padding: 12px 0;
            }

            .brand-beautiful {
                display: none;
            }

            .top-links-beautiful {
                display: none;
            }

            .action-content-beautiful {
                display: none;
            }

            .action-beautiful {
                padding: 8px;
                min-height: 42px;
                min-width: 42px;
                justify-content: center;
            }

            .action-icon-wrapper {
                width: 36px;
                height: 36px;
            }

            .action-icon-beautiful {
                font-size: 18px;
            }

            .features-beautiful {
                display: none;
            }

            .top-bar-beautiful {
                padding: 0 1rem;
            }

            .header-beautiful-container {
                padding: 0 1rem;
            }
        }

        @media (max-width: 768px) {
            .promo-beautiful span {
                font-size: 11px;
            }

            .search-input-beautiful {
                font-size: 14px;
                padding: 12px 20px 12px 44px;
            }

            .search-btn-beautiful {
                padding: 12px 20px;
                font-size: 12px;
            }

            .action-beautiful {
                padding: 6px;
                min-height: 38px;
                min-width: 38px;
            }

            .action-icon-wrapper {
                width: 32px;
                height: 32px;
            }

            .action-icon-beautiful {
                font-size: 16px;
            }

            .action-badge-beautiful {
                top: -3px;
                right: -3px;
                min-width: 16px;
                height: 16px;
                font-size: 9px;
                padding: 2px 4px;
                border-width: 1.5px;
            }

            .header-actions-beautiful {
                gap: 4px;
            }
        }

        /* Enhanced Mobile Menu */
        .mobile-menu-beautiful {
            display: none;
            background: var(--gradient-emerald);
            border: none;
            color: white;
            padding: 10px 16px;
            border-radius: var(--border-radius-lg);
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-subtle);
        }

        .mobile-menu-beautiful:hover {
            transform: scale(1.05);
            box-shadow: var(--shadow-soft);
        }

        @media (max-width: 1024px) {
            .mobile-menu-beautiful {
                display: block;
            }
        }

        /* Enhanced Footer */
        .footer-elite {
            background: linear-gradient(135deg, var(--neutral-gray-900) 0%, var(--neutral-gray-800) 100%);
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

        .footer-logo a {
            transition: all 0.3s ease;
            display: inline-flex;
        }

        .footer-logo a:hover {
            transform: translateY(-2px);
        }

        .footer-logo a:hover img {
            filter: brightness(1.3) drop-shadow(0 6px 12px rgba(16, 185, 129, 0.4));
        }

        .footer-logo img {
            height: 48px;
            filter: brightness(1.2);
        }

        .footer-desc {
            color: var(--neutral-gray-300);
            line-height: 1.6;
            margin-bottom: 24px;
            font-size: 15px;
        }

        .footer-title {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 20px;
            color: white;
            font-family: 'Plus Jakarta Sans', sans-serif;
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
            background: var(--gradient-emerald);
            border-radius: 2px;
        }

        .footer-link {
            color: var(--neutral-gray-300);
            text-decoration: none;
            padding: 6px 0;
            transition: all 0.3s ease;
            font-weight: 500;
            font-size: 14px;
        }

        .footer-link:hover {
            color: var(--primary-emerald-light);
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
            border-radius: var(--border-radius-lg);
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
            background: var(--primary-emerald);
            transform: translateY(-2px);
            box-shadow: var(--shadow-soft);
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
            padding: 0 2rem;
        }

        .copyright {
            color: var(--neutral-gray-400);
            font-size: 14px;
        }

        .footer-links {
            display: flex;
            gap: 24px;
        }

        .footer-links a {
            color: var(--neutral-gray-400);
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: var(--primary-emerald-light);
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
                padding: 0 1rem;
            }

            .footer-links {
                flex-wrap: wrap;
                justify-content: center;
                gap: 16px;
            }
        }

        /* Scrollbar Styling */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--neutral-gray-100);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--gradient-emerald);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--gradient-ocean);
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
                <li><a href="{{route('shop')}}">Sản phẩm</a></li>
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

    <!-- Beautiful Modern Header Begin -->
    <header class="header-beautiful" id="header">
        <!-- Beautiful Top Bar -->
        <div class="beautiful-top-bar">
            <div class="top-bar-beautiful">
                <div class="promo-beautiful">
                    <div class="promo-icon-beautiful">🎉</div>
                    <span>Miễn phí vận chuyển đơn từ 500K • Giảm giá 25% cho đơn hàng đầu tiên</span>
                </div>
                <div class="top-links-beautiful">
                    <a href="#" class="top-link-beautiful">
                        <i class="fa fa-question-circle"></i>
                        Hướng dẫn mua hàng
                    </a>
                    <a href="#" class="top-link-beautiful">
                        <i class="fa fa-headphones"></i>
                        Chăm sóc khách hàng
                    </a>
                    <a href="#" class="top-link-beautiful">
                        <i class="fa fa-mobile"></i>
                        Tải ứng dụng
                    </a>
                </div>
            </div>
        </div>

        <!-- Beautiful Main Header -->
        <div class="beautiful-main-header">
            <div class="header-beautiful-container">
                <!-- Beautiful Logo -->
                <a href="{{route('home')}}" class="logo-beautiful">
                    <img src="{{ asset('assets/frontend/img/icon_logo.png') }}" alt="Nông Sản Việt" class="logo-img-beautiful">
                    <div class="brand-beautiful d-none d-lg-block">
                        <div class="brand-title-beautiful">Nông Sản Việt</div>
                        <div class="brand-tagline-beautiful">Tự nhiên • Tươi ngon • An toàn</div>
                    </div>
                </a>

                <!-- Beautiful Search -->
                <div class="search-beautiful d-none d-lg-block">
                    <div class="search-beautiful-container">
                        <form action="{{route('shop')}}" class="search-form-beautiful">
                            <i class="fa fa-search search-icon-beautiful"></i>
                            <input type="text" 
                                   name="search" 
                                   class="search-input-beautiful" 
                                   placeholder="Tìm kiếm sản phẩm tươi ngon, thương hiệu uy tín..."
                                   value="{{ request('search') }}">
                            <button type="submit" class="search-btn-beautiful">
                                <span>Tìm kiếm</span>
                                <i class="fa fa-arrow-right"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Beautiful Header Actions -->
                <div class="header-actions-beautiful">
                    @if (Auth::guard('web')->check())
                        <a href="{{route('account')}}" class="action-beautiful account-action">
                            <div class="action-icon-wrapper">
                                <i class="action-icon-beautiful fa fa-user-circle"></i>
                            </div>
                            <div class="action-content-beautiful">
                                <div class="action-label-beautiful">Xin chào</div>
                                <div class="action-text-beautiful">{{ Auth::guard('web')->user()->name }}</div>
                            </div>
                        </a>

                        <a href="#" class="action-beautiful wishlist-action">
                            <div class="action-icon-wrapper">
                                <i class="action-icon-beautiful fa fa-heart"></i>
                                <span class="action-badge-beautiful">0</span>
                            </div>
                            <div class="action-content-beautiful">
                                <div class="action-label-beautiful">Danh sách</div>
                                <div class="action-text-beautiful">Yêu thích</div>
                            </div>
                        </a>
                    @else
                        <a href="{{route('login')}}" class="action-beautiful login-action">
                            <div class="action-icon-wrapper">
                                <i class="action-icon-beautiful fa fa-sign-in"></i>
                            </div>
                            <div class="action-content-beautiful">
                                <div class="action-label-beautiful">Chào bạn</div>
                                <div class="action-text-beautiful">Đăng nhập</div>
                            </div>
                        </a>
                    @endif

                    <a href="{{route('cart')}}" class="action-beautiful cart-action">
                        <div class="action-icon-wrapper">
                            <i class="action-icon-beautiful fa fa-shopping-bag"></i>
                            <span class="action-badge-beautiful">{{ session('cart') !== null ? count(session('cart')) : 0 }}</span>
                        </div>
                        <div class="action-content-beautiful">
                            <div class="action-label-beautiful">Giỏ hàng</div>
                            <div class="action-text-beautiful">{{ session('cart') !== null ? count(session('cart')) : 0 }} sản phẩm</div>
                        </div>
                    </a>

                    <!-- Mobile Menu Toggle -->
                    <button class="mobile-menu-beautiful d-lg-none">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>

                <!-- Mobile Search -->
                <div class="search-beautiful d-lg-none">
                    <div class="search-beautiful-container">
                        <form action="{{route('shop')}}" class="search-form-beautiful">
                            <i class="fa fa-search search-icon-beautiful"></i>
                            <input type="text" 
                                   name="search" 
                                   class="search-input-beautiful" 
                                   placeholder="Tìm kiếm sản phẩm..."
                                   value="{{ request('search') }}">
                            <button type="submit" class="search-btn-beautiful">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Beautiful Navigation -->
        <div class="nav-beautiful d-none d-lg-block">
            <div class="nav-beautiful-container">
                <ul class="nav-menu-beautiful">
                    <li class="nav-item-beautiful">
                        <a href="{{route('home')}}" class="nav-link-beautiful active">
                            <i class="nav-icon-beautiful fa fa-home"></i>
                            <span>Trang chủ</span>
                        </a>
                    </li>
                    <li class="nav-item-beautiful">
                        <a href="{{route('shop')}}" class="nav-link-beautiful">
                            <i class="nav-icon-beautiful fa fa-shopping-bag"></i>
                            <span>Sản phẩm</span>
                        </a>
                        {{-- <div class="nav-dropdown-beautiful">
                            <div class="dropdown-header-beautiful">
                                <i class="fa fa-leaf"></i>
                                Danh mục sản phẩm
                            </div>
                            <div class="dropdown-content-beautiful">
                                @foreach ($categories->take(6) as $category)
                                <a href="{{ route('shop', ['category' => $category->id]) }}" class="dropdown-item-beautiful">
                                    <div class="dropdown-icon-beautiful">
                                        <i class="fa fa-leaf"></i>
                                    </div>
                                    <div class="dropdown-text-beautiful">
                                        <div class="dropdown-title-beautiful">{{ $category->name }}</div>
                                        <div class="dropdown-desc-beautiful">{{ $category->products->quantity ?? 0 }} sản phẩm</div>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div> --}}
                    </li>
                    <li class="nav-item-beautiful">
                        <a href="{{route('blog')}}" class="nav-link-beautiful">
                            <i class="nav-icon-beautiful fa fa-newspaper-o"></i>
                            <span>Tin tức</span>
                        </a>
                    </li>
                    <li class="nav-item-beautiful">
                        <a href="{{route('contact')}}" class="nav-link-beautiful">
                            <i class="nav-icon-beautiful fa fa-phone"></i>
                            <span>Liên hệ</span>
                        </a>
                    </li>
                </ul>

                <div class="features-beautiful">
                    <div class="feature-beautiful">
                        <i class="feature-icon-beautiful fa fa-shield"></i>
                        <span>Đảm bảo chất lượng</span>
                    </div>
                    <div class="feature-beautiful">
                        <i class="feature-icon-beautiful fa fa-truck"></i>
                        <span>Giao hàng miễn phí</span>
                    </div>
                    <div class="feature-beautiful">
                        <i class="feature-icon-beautiful fa fa-headphones"></i>
                        <span>Hỗ trợ 24/7</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Beautiful Modern Header End -->

    @yield('content')

    <!-- Elite Footer Begin -->
    <footer class="footer-elite">
        <div class="footer-content">
            <div class="container">
                <div class="footer-grid">
                    <div class="footer-section">
                        <div class="footer-logo">
                            <a href="{{route('home')}}" style="display: flex; align-items: center; gap: 12px; text-decoration: none;">
                                <img src="{{ asset('assets/frontend/img/icon_logo.png') }}" alt="Nông Sản Việt" style="height: 48px; width: auto; filter: brightness(1.2) drop-shadow(0 4px 8px rgba(16, 185, 129, 0.3));">
                                <div style="display: flex; flex-direction: column;">
                                    <div style="font-size: 20px; font-weight: 800; color: white; line-height: 1; font-family: 'Plus Jakarta Sans', sans-serif;">Nông Sản Việt</div>
                                    <div style="font-size: 11px; color: rgba(255, 255, 255, 0.7); margin-top: 4px; font-weight: 500; letter-spacing: 0.5px;">Tự nhiên • Tươi ngon • An toàn</div>
                                </div>
                            </a>
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

    <!-- Beautiful JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Beautiful header scroll effect
            const header = document.getElementById('header');
            let lastScrollTop = 0;
            
            window.addEventListener('scroll', function() {
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                
                if (scrollTop > 20) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
                
                // Hide/show header on scroll
                if (scrollTop > lastScrollTop && scrollTop > 300) {
                    header.style.transform = 'translateY(-100%)';
                } else {
                    header.style.transform = 'translateY(0)';
                }
                
                lastScrollTop = scrollTop;
            });

            // Enhanced search functionality
            const searchInputs = document.querySelectorAll('.search-input-beautiful');
            searchInputs.forEach(input => {
                let searchTimeout;
                
                input.addEventListener('input', function() {
                    clearTimeout(searchTimeout);
                    searchTimeout = setTimeout(() => {
                        console.log('Searching for:', this.value);
                    }, 300);
                });

                // Search shortcuts
                document.addEventListener('keydown', function(e) {
                    if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                        e.preventDefault();
                        input.focus();
                    }
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
        });
    </script>

</body>

</html>
