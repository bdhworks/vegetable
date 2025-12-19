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

        /* Beautiful Floating Action Buttons */
        .floating-actions-beautiful {
            position: fixed;
            bottom: 24px;
            right: 24px;
            z-index: 999;
            display: flex;
            flex-direction: column;
            gap: 12px;
            align-items: flex-end;
        }

        .floating-btn-wrapper {
            position: relative;
            animation: floatBtnSlideIn 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            animation-fill-mode: both;
        }

        .floating-btn-wrapper.chat-wrapper {
            animation-delay: 0.1s;
        }

        .floating-btn-wrapper.follow-wrapper {
            animation-delay: 0.2s;
        }

        .floating-btn-wrapper.scroll-wrapper {
            animation-delay: 0.3s;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .floating-btn-wrapper.scroll-wrapper.visible {
            opacity: 1;
            visibility: visible;
        }

        /* Hide all buttons when chat is active */
        .floating-actions-beautiful.chat-active .floating-btn-wrapper {
            opacity: 0;
            visibility: hidden;
            transform: translateX(100px) scale(0.8);
            pointer-events: none;
        }

        @keyframes floatBtnSlideIn {
            from {
                opacity: 0;
                transform: translateX(100px) scale(0.8);
            }
            to {
                opacity: 1;
                transform: translateX(0) scale(1);
            }
        }

        .floating-btn-beautiful {
            position: relative;
            width: 56px;
            height: 56px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 6px 24px rgba(0, 0, 0, 0.15);
            border: none;
            text-decoration: none;
            overflow: visible;
        }

        .floating-btn-beautiful:hover {
            transform: translateY(-4px) scale(1.05);
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.2);
        }

        .btn-icon-container {
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2;
        }

        .floating-btn-beautiful i {
            font-size: 24px;
            color: white;
            transition: all 0.3s ease;
            position: relative;
            z-index: 2;
        }

        .pulse-ring {
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 3px solid;
            opacity: 0;
            animation: pulseRing 2s cubic-bezier(0.4, 0, 0.2, 1) infinite;
        }

        @keyframes pulseRing {
            0% {
                transform: scale(0.95);
                opacity: 0.8;
            }
            50% {
                opacity: 0.4;
            }
            100% {
                transform: scale(1.4);
                opacity: 0;
            }
        }

        .btn-tooltip {
            position: absolute;
            right: calc(100% + 12px);
            background: rgba(31, 41, 55, 0.95);
            color: white;
            padding: 10px 16px;
            border-radius: var(--border-radius-lg);
            font-size: 14px;
            font-weight: 600;
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            transform: translateX(10px);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            pointer-events: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            backdrop-filter: blur(10px);
        }

        .btn-tooltip::after {
            content: '';
            position: absolute;
            right: -6px;
            top: 50%;
            transform: translateY(-50%);
            width: 0;
            height: 0;
            border-left: 6px solid rgba(31, 41, 55, 0.95);
            border-top: 6px solid transparent;
            border-bottom: 6px solid transparent;
        }

        .floating-btn-wrapper:hover .btn-tooltip {
            opacity: 1;
            visibility: visible;
            transform: translateX(0);
        }

        .notification-dot {
            position: absolute;
            top: 4px;
            right: 4px;
            width: 12px;
            height: 12px;
            background: #ef4444;
            border-radius: 50%;
            border: 2px solid white;
            animation: notificationPulse 2s ease-in-out infinite;
            z-index: 3;
        }

        @keyframes notificationPulse {
            0%, 100% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(1.2);
                opacity: 0.8;
            }
        }

        /* Chat Button Styles */
        .chat-btn {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        }

        .chat-btn .pulse-ring {
            border-color: #10b981;
        }

        .chat-btn:hover {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
        }

        .chat-btn:hover i {
            animation: chatBounce 0.6s ease-in-out;
        }

        @keyframes chatBounce {
            0%, 100% { transform: scale(1); }
            25% { transform: scale(1.1) rotate(-10deg); }
            75% { transform: scale(1.1) rotate(10deg); }
        }

        /* Follow Button Styles */
        .follow-btn {
            background: linear-gradient(135deg, #1877f2 0%, #0a5dc2 100%);
        }

        .follow-btn .pulse-ring {
            border-color: #1877f2;
        }

        .follow-btn:hover {
            background: linear-gradient(135deg, #0a5dc2 0%, #084a9a 100%);
        }

        .follow-btn:hover i {
            animation: followShake 0.6s ease-in-out;
        }

        @keyframes followShake {
            0%, 100% { transform: rotate(0deg); }
            25% { transform: rotate(-15deg); }
            75% { transform: rotate(15deg); }
        }

        /* Zalo Button Styles */
        .zalo-btn {
            background: linear-gradient(135deg, #0068FF 0%, #0084FF 100%);
            box-shadow: 0 4px 15px rgba(0, 104, 255, 0.4);
        }

        .zalo-btn .pulse-ring {
            border: 3px solid rgba(0, 104, 255, 0.5);
        }

        .zalo-btn .btn-icon-container {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .zalo-btn .btn-icon-container img {
            width: 28px;
            height: 28px;
            object-fit: contain;
            filter: brightness(0) invert(1);
            position: relative;
            z-index: 2;
        }

        .zalo-btn:hover {
            background: linear-gradient(135deg, #0084FF 0%, #0068FF 100%);
            box-shadow: 0 6px 25px rgba(0, 104, 255, 0.6);
            animation: zaloWave 0.6s ease;
        }

        .zalo-btn:hover .btn-icon-container img {
            animation: zaloRing 0.6s ease;
        }

        @keyframes zaloWave {
            0%, 100% { transform: scale(1); }
            25% { transform: scale(1.05) rotate(-3deg); }
            50% { transform: scale(1.1); }
            75% { transform: scale(1.05) rotate(3deg); }
        }

        @keyframes zaloRing {
            0%, 100% { transform: rotate(0deg) scale(1); }
            10% { transform: rotate(-15deg) scale(1.1); }
            20% { transform: rotate(15deg) scale(1.1); }
            30% { transform: rotate(-15deg) scale(1.1); }
            40% { transform: rotate(15deg) scale(1.1); }
            50% { transform: rotate(-10deg) scale(1.05); }
            60% { transform: rotate(10deg) scale(1.05); }
            70% { transform: rotate(-5deg) scale(1); }
            80% { transform: rotate(5deg) scale(1); }
        }

        /* Scroll Top Button Styles */
        .scroll-top-btn {
            background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
        }

        .scroll-top-btn:hover {
            background: linear-gradient(135deg, #4f46e5 0%, #4338ca 100%);
        }

        .scroll-top-btn:hover i {
            animation: arrowUp 0.6s ease-in-out infinite;
        }

        @keyframes arrowUp {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-4px); }
        }

        /* Chat Modal Styles */
        .chat-modal-beautiful {
            position: fixed;
            bottom: 100px;
            right: 24px;
            width: 380px;
            height: 600px;
            max-height: calc(100vh - 120px);
            background: white;
            border-radius: var(--border-radius-2xl);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
            z-index: 998;
            opacity: 0;
            visibility: hidden;
            transform: translateY(20px) scale(0.95);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            flex-direction: column;
        }

        .chat-modal-beautiful.active {
            opacity: 1;
            visibility: visible;
            transform: translateY(0) scale(1);
        }

        .chat-modal-content {
            display: flex;
            flex-direction: column;
            height: 100%;
            overflow: hidden;
        }

        .chat-header {
            background: var(--gradient-emerald);
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-shrink: 0;
        }

        .chat-header-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .chat-avatar {
            position: relative;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            overflow: hidden;
            border: 3px solid rgba(255, 255, 255, 0.3);
            flex-shrink: 0;
            background-color: white;
        }

        .chat-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .online-status {
            position: absolute;
            bottom: 2px;
            right: 2px;
            width: 12px;
            height: 12px;
            background: #22c55e;
            border-radius: 50%;
            border: 2px solid white;
            animation: onlinePulse 2s ease-in-out infinite;
        }

        @keyframes onlinePulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.6; }
        }

        .chat-header-text h4 {
            margin: 0;
            font-size: 16px;
            font-weight: 700;
            color: white;
        }

        .chat-header-text p {
            margin: 0;
            font-size: 12px;
            opacity: 0.9;
        }

        .chat-close-btn {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .chat-close-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: rotate(90deg);
        }

        .chat-body {
            padding: 16px;
            height: 400px;
            overflow-y: auto;
            background: var(--neutral-gray-50);
            display: flex;
            flex-direction: column;
            position: relative;
            flex: 1;
        }

        .chat-body::-webkit-scrollbar {
            width: 6px;
        }

        .chat-body::-webkit-scrollbar-thumb {
            background: var(--neutral-gray-300);
            border-radius: 3px;
        }

        .chat-welcome {
            text-align: center;
            padding: 20px;
            background: white;
            border-radius: var(--border-radius-lg);
            margin-bottom: 16px;
        }

        .admin-status-info {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 12px;
            padding: 8px 16px;
            background: linear-gradient(135deg, #d1fae5, #a7f3d0);
            border-radius: var(--border-radius-lg);
            font-size: 13px;
            color: var(--neutral-gray-700);
        }

        .admin-status-info i {
            color: var(--primary-emerald);
        }

        .admin-status-info strong {
            color: var(--primary-emerald);
            font-weight: 700;
        }

        .welcome-icon {
            width: 64px;
            height: 64px;
            background: linear-gradient(135deg, #d1fae5, #a7f3d0);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
        }

        .welcome-icon i {
            font-size: 32px;
            color: var(--primary-emerald);
        }

        .chat-welcome h3 {
            font-size: 20px;
            font-weight: 700;
            color: var(--neutral-gray-900);
            margin-bottom: 8px;
        }

        .chat-welcome p {
            font-size: 14px;
            color: var(--neutral-gray-500);
            margin: 0;
        }

        .chat-quick-actions {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            margin-top: 16px;
        }

        .quick-action-btn {
            padding: 16px;
            background: var(--neutral-gray-50);
            border: 2px solid transparent;
            border-radius: var(--border-radius-lg);
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            text-align: center;
        }

        .quick-action-btn:hover {
            background: white;
            border-color: var(--primary-emerald);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.15);
        }

        .quick-action-btn i {
            font-size: 24px;
            color: var(--primary-emerald);
        }

        .quick-action-btn span {
            font-size: 13px;
            font-weight: 600;
            color: var(--neutral-gray-700);
        }

        .chat-footer {
            border-top: 2px solid var(--neutral-gray-100);
            background: white;
            flex-shrink: 0;
        }

        .chat-contact-methods {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .contact-method-btn {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            background: white;
            border: 2px solid var(--neutral-gray-200);
            border-radius: var(--border-radius-lg);
            text-decoration: none;
            color: var(--neutral-gray-700);
            transition: all 0.3s ease;
        }

        .contact-method-btn:hover {
            border-color: var(--primary-emerald);
            transform: translateX(4px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .contact-method-btn i {
            width: 36px;
            height: 36px;
            border-radius: var(--border-radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        .phone-btn i {
            background: linear-gradient(135deg, #dbeafe, #bfdbfe);
            color: #3b82f6;
        }

        .messenger-btn i {
            background: linear-gradient(135deg, #dbeafe, #bfdbfe);
            color: #1877f2;
        }

        .zalo-btn i {
            background: linear-gradient(135deg, #dbeafe, #bfdbfe);
            color: #0068ff;
        }

        .method-info {
            display: flex;
            flex-direction: column;
        }

        .method-label {
            font-size: 11px;
            color: var(--neutral-gray-500);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .method-value {
            font-size: 14px;
            color: var(--neutral-gray-900);
            font-weight: 700;
        }

        /* Real-time Chat Styles */
        .chat-messages {
            display: flex;
            flex-direction: column;
            gap: 12px;
            padding: 8px 0;
            flex: 1;
            overflow-y: auto;
        }

        .message-wrapper {
            display: flex;
            gap: 8px;
            animation: messageSlideIn 0.3s ease-out;
        }

        @keyframes messageSlideIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .message-wrapper.user {
            flex-direction: row-reverse;
        }

        .message-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            flex-shrink: 0;
            overflow: hidden;
            background: var(--gradient-emerald);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 14px;
        }

        .message-wrapper.admin .message-avatar,
        .message-wrapper.bot .message-avatar {
            background: white;
            border: 2px solid #e2e8f0;
            padding: 4px;
        }

        .message-wrapper.user .message-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .message-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .message-content {
            max-width: 70%;
        }

        .message-bubble {
            padding: 12px 16px;
            border-radius: 18px;
            position: relative;
            word-wrap: break-word;
            font-size: 14px;
            line-height: 1.5;
        }

        .message-wrapper.bot .message-bubble,
        .message-wrapper.admin .message-bubble {
            background: white;
            color: var(--neutral-gray-800);
            border-bottom-left-radius: 4px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .message-wrapper.admin .message-bubble {
            background: linear-gradient(135deg, #eff6ff, #dbeafe);
            border: 1px solid #bfdbfe;
        }

        .message-wrapper.user .message-bubble {
            background: var(--gradient-emerald);
            color: white;
            border-bottom-right-radius: 4px;
            box-shadow: 0 2px 8px rgba(16, 185, 129, 0.3);
        }

        .message-time {
            font-size: 11px;
            color: var(--neutral-gray-400);
            margin-top: 4px;
            display: block;
        }

        .message-wrapper.user .message-time {
            text-align: right;
            color: var(--neutral-gray-500);
        }

        /* Typing Indicator */
        .typing-indicator {
            display: flex;
            gap: 8px;
            padding: 8px 0;
            animation: messageSlideIn 0.3s ease-out;
        }

        .typing-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            overflow: hidden;
            flex-shrink: 0;
            background: white;
            padding: 4px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .typing-avatar img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .typing-bubble {
            background: white;
            padding: 12px 16px;
            border-radius: 18px;
            border-bottom-left-radius: 4px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .typing-dots {
            display: flex;
            gap: 4px;
            align-items: center;
        }

        .typing-dots span {
            width: 8px;
            height: 8px;
            background: var(--primary-emerald);
            border-radius: 50%;
            animation: typingDot 1.4s ease-in-out infinite;
        }

        .typing-dots span:nth-child(2) {
            animation-delay: 0.2s;
        }

        .typing-dots span:nth-child(3) {
            animation-delay: 0.4s;
        }

        @keyframes typingDot {
            0%, 60%, 100% {
                transform: translateY(0);
                opacity: 0.5;
            }
            30% {
                transform: translateY(-6px);
                opacity: 1;
            }
        }

        /* Chat Input Styles */
        .chat-input-container {
            padding: 16px;
            background: white;
            border-top: 2px solid var(--neutral-gray-100);
        }

        .user-name-input {
            display: flex;
            gap: 8px;
            margin-bottom: 12px;
        }

        .name-input {
            flex: 1;
            padding: 12px 16px;
            border: 2px solid var(--neutral-gray-200);
            border-radius: var(--border-radius-lg);
            font-size: 14px;
            font-family: 'Inter', sans-serif;
            color: var(--neutral-gray-800);
            transition: all 0.3s ease;
        }

        .name-input:focus {
            outline: none;
            border-color: var(--primary-emerald);
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        }

        .name-input::placeholder {
            color: var(--neutral-gray-400);
        }

        .start-chat-btn {
            padding: 12px 24px;
            background: var(--gradient-emerald);
            color: white;
            border: none;
            border-radius: var(--border-radius-lg);
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
            box-shadow: 0 2px 8px rgba(16, 185, 129, 0.3);
        }

        .start-chat-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.4);
        }

        .start-chat-btn:active {
            transform: translateY(0);
        }

        .chat-input-hint {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 11px;
            color: var(--neutral-gray-500);
            margin-top: 8px;
            padding: 8px;
            background: var(--neutral-gray-50);
            border-radius: var(--border-radius-md);
        }

        .chat-input-hint i {
            color: var(--primary-emerald);
        }

        .chat-input-wrapper {
            display: flex;
            align-items: center;
            gap: 8px;
            background: var(--neutral-gray-50);
            border: 2px solid var(--neutral-gray-200);
            border-radius: 24px;
            padding: 4px 4px 4px 12px;
            transition: all 0.3s ease;
        }

        .chat-input-wrapper:focus-within {
            border-color: var(--primary-emerald);
            background: white;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        }

        .emoji-btn,
        .attach-btn {
            width: 32px;
            height: 32px;
            border: none;
            background: transparent;
            color: var(--neutral-gray-500);
            cursor: pointer;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            flex-shrink: 0;
        }

        .emoji-btn:hover,
        .attach-btn:hover {
            background: var(--neutral-gray-200);
            color: var(--primary-emerald);
        }

        .chat-input {
            flex: 1;
            border: none;
            background: transparent;
            padding: 8px 4px;
            font-size: 14px;
            color: var(--neutral-gray-800);
            outline: none;
            font-family: 'Inter', sans-serif;
        }

        .chat-input::placeholder {
            color: var(--neutral-gray-400);
        }

        .send-btn {
            width: 36px;
            height: 36px;
            border: none;
            background: var(--gradient-emerald);
            color: white;
            cursor: pointer;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            flex-shrink: 0;
            box-shadow: 0 2px 8px rgba(16, 185, 129, 0.3);
        }

        .send-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.4);
        }

        .send-btn:active {
            transform: scale(0.95);
        }

        .send-btn i {
            font-size: 14px;
        }

        /* Suggested messages */
        .suggested-messages {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            padding: 12px 0;
            animation: messageSlideIn 0.3s ease-out;
        }

        .suggested-msg-btn {
            padding: 8px 14px;
            background: white;
            border: 2px solid var(--neutral-gray-200);
            border-radius: 16px;
            font-size: 13px;
            color: var(--neutral-gray-700);
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .suggested-msg-btn:hover {
            border-color: var(--primary-emerald);
            background: rgba(16, 185, 129, 0.05);
            color: var(--primary-emerald);
            transform: translateY(-2px);
        }

        /* Mobile Responsive for Floating Buttons */
        @media (max-width: 768px) {
            .floating-actions-beautiful {
                bottom: 16px;
                right: 16px;
                gap: 10px;
            }

            .floating-btn-beautiful {
                width: 52px;
                height: 52px;
            }

            .floating-btn-beautiful i {
                font-size: 22px;
            }

            .btn-tooltip {
                display: none;
            }

            .chat-modal-beautiful {
                width: calc(100vw - 32px);
                max-width: 380px;
                height: calc(100vh - 180px);
                max-height: 550px;
                bottom: 90px;
                right: 16px;
            }

            .chat-quick-actions {
                grid-template-columns: repeat(2, 1fr);
                gap: 10px;
            }

            .quick-action-btn {
                padding: 12px;
            }

            .quick-action-btn i {
                font-size: 20px;
            }

            .quick-action-btn span {
                font-size: 12px;
            }
        }

        @media (max-width: 480px) {
            .floating-btn-beautiful {
                width: 48px;
                height: 48px;
            }

            .floating-btn-beautiful i {
                font-size: 20px;
            }

            .chat-modal-beautiful {
                width: calc(100vw - 16px);
                height: calc(100vh - 160px);
                max-height: 500px;
                right: 8px;
                bottom: 80px;
            }

            .chat-body {
                padding: 10px;
                height: auto;
                max-height: 300px;
            }

            .chat-quick-actions {
                gap: 8px;
                margin-top: 12px;
            }

            .chat-header {
                padding: 16px;
            }

            .chat-input-container {
                padding: 12px;
            }

            .user-name-input {
                flex-direction: column;
            }

            .start-chat-btn {
                width: 100%;
                justify-content: center;
            }

            .quick-action-btn {
                padding: 10px 8px;
            }

            .quick-action-btn i {
                font-size: 20px;
            }
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

                        <a href="{{ route('account.favorite') }}" class="action-beautiful wishlist-action">
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

    <!-- Beautiful Floating Action Buttons -->
    <div class="floating-actions-beautiful">
        <!-- Chat Button -->
        <div class="floating-btn-wrapper chat-wrapper">
            <a href="#" class="floating-btn-beautiful chat-btn" id="chatBtn">
                <div class="btn-icon-container">
                    <i class="fa fa-comments"></i>
                    <span class="pulse-ring"></span>
                </div>
                <span class="btn-tooltip">Chat với chúng tôi</span>
                <span class="notification-dot"></span>
            </a>
        </div>

        <!-- Follow Page Button -->
        <div class="floating-btn-wrapper follow-wrapper">
            <a href="#" class="floating-btn-beautiful follow-btn" id="followBtn">
                <div class="btn-icon-container">
                    <i class="fa fa-facebook"></i>
                    <span class="pulse-ring"></span>
                </div>
                <span class="btn-tooltip">Theo dõi Fanpage</span>
            </a>
        </div>

        <!-- Zalo Button -->
        <div class="floating-btn-wrapper zalo-wrapper">
            <a href="https://zalo.me/0988888888" target="_blank" class="floating-btn-beautiful zalo-btn" id="zaloBtn">
                <div class="btn-icon-container">
                    <img src="{{ asset('assets/frontend/img/zalo.png') }}" alt="">
                    <span class="pulse-ring"></span>
                </div>
                <span class="btn-tooltip">Chat Zalo với chúng tôi</span>
            </a>
        </div>

        <!-- Scroll to Top Button -->
        <div class="floating-btn-wrapper scroll-wrapper">
            <button class="floating-btn-beautiful scroll-top-btn" id="scrollTopBtn">
                <div class="btn-icon-container">
                    <i class="fa fa-arrow-up"></i>
                </div>
                <span class="btn-tooltip">Lên đầu trang</span>
            </button>
        </div>
    </div>

    <!-- Chat Modal with Real-time Messaging -->
    <div class="chat-modal-beautiful" id="chatModal">
        <div class="chat-modal-content">
            <div class="chat-header">
                <div class="chat-header-info">
                    <div class="chat-avatar">
                        <img src="{{ asset('assets/frontend/img/icon_logo.png') }}" alt="Support">
                        <span class="online-status"></span>
                    </div>
                    <div class="chat-header-text">
                        <h4>Nông Sản Việt</h4>
                        <p id="chatStatus">Trực tuyến • Phản hồi ngay</p>
                    </div>
                </div>
                <button class="chat-close-btn" id="closeChatBtn">
                    <i class="fa fa-times"></i>
                </button>
            </div>
            
            <div class="chat-body" id="chatBody">
                <!-- Welcome message -->
                <div class="chat-welcome" id="chatWelcome">
                    <div class="welcome-icon">
                        <i class="fa fa-comments-o"></i>
                    </div>
                    <h3>Xin chào! 👋</h3>
                    <p>Bắt đầu cuộc trò chuyện với chúng tôi</p>
                    <div class="admin-status-info">
                        <i class="fa fa-clock-o"></i>
                        <span>Thời gian phản hồi: <strong>~2 phút</strong></span>
                    </div>
                </div>
                
                <!-- Quick actions -->
                <div class="chat-quick-actions" id="quickActions">
                    <button class="quick-action-btn" data-message="Tôi muốn đặt hàng">
                        <i class="fa fa-shopping-bag"></i>
                        <span>Đặt hàng</span>
                    </button>
                    <button class="quick-action-btn" data-message="Cho tôi xem các khuyến mãi hiện tại">
                        <i class="fa fa-gift"></i>
                        <span>Khuyến mãi</span>
                    </button>
                    <button class="quick-action-btn" data-message="Tôi muốn biết chính sách giao hàng">
                        <i class="fa fa-truck"></i>
                        <span>Giao hàng</span>
                    </button>
                    <button class="quick-action-btn" data-message="Tôi cần hỗ trợ">
                        <i class="fa fa-headphones"></i>
                        <span>Hỗ trợ</span>
                    </button>
                </div>

                <!-- Messages container -->
                <div class="chat-messages" id="chatMessages"></div>

                <!-- Typing indicator -->
                <div class="typing-indicator" id="typingIndicator" style="display: none;">
                    <div class="typing-avatar">
                        <img src="{{ asset('assets/frontend/img/icon_logo.png') }}" alt="Admin">
                    </div>
                    <div class="typing-bubble">
                        <div class="typing-dots">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="chat-footer">
                <!-- Message input - Always visible for customer -->
                <div class="chat-input-container" id="chatInputContainer">
                    <div class="user-name-input" id="userNameInput">
                        <input 
                            type="text" 
                            id="userName" 
                            class="name-input" 
                            placeholder="Nhập tên của bạn..."
                            maxlength="30"
                        >
                        <button class="start-chat-btn" id="startChatBtn">
                            <i class="fa fa-comment"></i>
                            <span>Bắt đầu chat</span>
                        </button>
                    </div>
                    <div class="chat-input-wrapper" id="messageInputWrapper" style="display: none;">
                        <button class="emoji-btn" id="emojiBtn" title="Emoji">
                            <i class="fa fa-smile-o"></i>
                        </button>
                        <input 
                            type="text" 
                            id="chatInput" 
                            class="chat-input" 
                            placeholder="Nhập tin nhắn gửi tới admin..."
                            autocomplete="off"
                        >
                        <button class="attach-btn" id="attachBtn" title="Đính kèm file">
                            <i class="fa fa-paperclip"></i>
                        </button>
                        <button class="send-btn" id="sendBtn" title="Gửi tin nhắn">
                            <i class="fa fa-paper-plane"></i>
                        </button>
                    </div>
                    <div class="chat-input-hint">
                        <i class="fa fa-info-circle"></i>
                        <span>Nhắn tin trực tiếp với Admin - Phản hồi nhanh chóng</span>
                    </div>
                </div>

                <!-- Contact methods (alternative contacts) -->
                <div class="chat-contact-methods" id="contactMethods" style="display: none;">
                    <a href="tel:0988888888" class="contact-method-btn phone-btn">
                        <i class="fa fa-phone"></i>
                        <div class="method-info">
                            <span class="method-label">Gọi ngay</span>
                            <span class="method-value">0988 888 888</span>
                        </div>
                    </a>
                    <a href="https://facebook.com" target="_blank" class="contact-method-btn messenger-btn">
                        <i class="fa fa-facebook-messenger"></i>
                        <div class="method-info">
                            <span class="method-label">Messenger</span>
                            <span class="method-value">Chat Facebook</span>
                        </div>
                    </a>
                    <a href="https://zalo.me" target="_blank" class="contact-method-btn zalo-btn">
                        <i class="fa fa-commenting"></i>
                        <div class="method-info">
                            <span class="method-label">Zalo</span>
                            <span class="method-value">Chat Zalo</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

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

                // Show/hide scroll to top button
                const scrollTopBtn = document.querySelector('.scroll-wrapper');
                if (scrollTop > 300) {
                    scrollTopBtn.classList.add('visible');
                } else {
                    scrollTopBtn.classList.remove('visible');
                }
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

            // Real-time Chat System with Admin Support
            class ChatSystem {
                constructor() {
                    this.chatBtn = document.getElementById('chatBtn');
                    this.chatModal = document.getElementById('chatModal');
                    this.closeChatBtn = document.getElementById('closeChatBtn');
                    this.userNameInput = document.getElementById('userName');
                    this.startChatBtn = document.getElementById('startChatBtn');
                    this.userNameInputDiv = document.getElementById('userNameInput');
                    this.messageInputWrapper = document.getElementById('messageInputWrapper');
                    this.chatInput = document.getElementById('chatInput');
                    this.sendBtn = document.getElementById('sendBtn');
                    this.chatMessages = document.getElementById('chatMessages');
                    this.chatBody = document.getElementById('chatBody');
                    this.typingIndicator = document.getElementById('typingIndicator');
                    this.chatWelcome = document.getElementById('chatWelcome');
                    this.quickActions = document.getElementById('quickActions');
                    this.chatInputContainer = document.getElementById('chatInputContainer');
                    this.contactMethods = document.getElementById('contactMethods');
                    this.chatStatus = document.getElementById('chatStatus');
                    
                    this.messages = this.loadMessages();
                    this.isTyping = false;
                    this.userName = this.getUserName();
                    this.userImage = this.getUserImage();
                    this.sessionId = this.getSessionId();
                    this.isAdminOnline = true; // Simulate admin status
                    
                    this.init();
                }

                init() {
                    // Open/close chat
                    this.chatBtn.addEventListener('click', (e) => {
                        e.preventDefault();
                        this.openChat();
                    });

                    this.closeChatBtn.addEventListener('click', () => {
                        this.closeChat();
                    });

                    // Start chat with name
                    this.startChatBtn.addEventListener('click', () => {
                        this.initializeChat();
                    });

                    this.userNameInput.addEventListener('keypress', (e) => {
                        if (e.key === 'Enter') {
                            this.initializeChat();
                        }
                    });

                    // Send message
                    this.sendBtn.addEventListener('click', () => this.sendMessage());
                    
                    this.chatInput.addEventListener('keypress', (e) => {
                        if (e.key === 'Enter') {
                            this.sendMessage();
                        }
                    });

                    // Quick action buttons
                    document.querySelectorAll('.quick-action-btn').forEach(btn => {
                        btn.addEventListener('click', () => {
                            const message = btn.getAttribute('data-message');
                            if (!this.userName || this.userName === 'Khách') {
                                this.userNameInput.focus();
                                return;
                            }
                            this.startChat(message);
                        });
                    });

                    // Close when clicking outside
                    document.addEventListener('click', (e) => {
                        if (!this.chatModal.contains(e.target) && !this.chatBtn.contains(e.target)) {
                            this.closeChat();
                        }
                    });

                    this.chatModal.addEventListener('click', (e) => {
                        e.stopPropagation();
                    });

                    // Load existing chat session
                    if (this.userName && this.userName !== 'Khách' && this.messages.length > 0) {
                        this.showChatMode();
                        this.renderMessages();
                    } else if (this.userName && this.userName !== 'Khách') {
                        // User is logged in, skip name input
                        @if (Auth::guard('web')->check())
                            this.showChatMode();
                            setTimeout(() => {
                                this.addMessage('admin', `Xin chào ${this.userName}! Tôi là admin của Nông Sản Việt. Tôi có thể giúp gì cho bạn? 😊`);
                            }, 500);
                        @else
                            this.userNameInput.value = this.userName;
                        @endif
                    }
                }

                initializeChat() {
                    const name = this.userNameInput.value.trim();
                    if (name === '') {
                        this.userNameInput.focus();
                        return;
                    }
                    
                    this.userName = name;
                    localStorage.setItem('chatUserName', name);
                    
                    // Send welcome message from admin
                    this.showChatMode();
                    setTimeout(() => {
                        this.addMessage('admin', `Xin chào ${name}! Tôi là admin của Nông Sản Việt. Tôi có thể giúp gì cho bạn? 😊`);
                    }, 500);
                }

                getUserName() {
                    // Check if user is logged in from Laravel
                    @if (Auth::guard('web')->check())
                        return '{{ Auth::guard('web')->user()->name }}';
                    @endif
                    
                    let name = localStorage.getItem('chatUserName');
                    return name || null;
                }

                getUserImage() {
                    // Check if user is logged in and has image from Laravel
                    @if (Auth::guard('web')->check())
                        @if (Auth::guard('web')->user()->avatar)
                            return '{{ asset("storage/" . Auth::guard('web')->user()->avatar) }}';
                        @endif
                    @endif
                    
                    return null;
                }

                getSessionId() {
                    let sessionId = localStorage.getItem('chatSessionId');
                    if (!sessionId) {
                        sessionId = 'session_' + Date.now() + '_' + Math.random().toString(36).substr(2, 9);
                        localStorage.setItem('chatSessionId', sessionId);
                    }
                    return sessionId;
                }

                openChat() {
                    this.chatModal.classList.add('active');
                    document.querySelector('.floating-actions-beautiful').classList.add('chat-active');
                    if (this.messages.length > 0 && this.userName) {
                        this.chatInput.focus();
                    } else if (!this.userName || this.userName === 'Khách') {
                        this.userNameInput.focus();
                    }
                }

                closeChat() {
                    this.chatModal.classList.remove('active');
                    document.querySelector('.floating-actions-beautiful').classList.remove('chat-active');
                }

                startChat(initialMessage) {
                    this.showChatMode();
                    if (initialMessage) {
                        setTimeout(() => {
                            this.addMessage('user', initialMessage);
                            this.adminResponse(initialMessage);
                        }, 300);
                    }
                    this.chatInput.focus();
                }

                showChatMode() {
                    this.chatWelcome.style.display = 'none';
                    this.quickActions.style.display = 'none';
                    this.chatMessages.style.display = 'flex';
                    this.userNameInputDiv.style.display = 'none';
                    this.messageInputWrapper.style.display = 'flex';
                    this.contactMethods.style.display = 'none';
                }

                sendMessage() {
                    const message = this.chatInput.value.trim();
                    if (message === '') return;

                    this.addMessage('user', message);
                    this.chatInput.value = '';
                    
                    // Send to server (simulated with admin response)
                    this.sendToServer(message);
                    
                    // Admin response after delay
                    setTimeout(() => {
                        this.adminResponse(message);
                    }, 2000 + Math.random() * 2000);
                }

                sendToServer(message) {
                    // Simulate sending to server
                    const data = {
                        sessionId: this.sessionId,
                        userName: this.userName,
                        message: message,
                        timestamp: new Date().toISOString()
                    };
                    
                    console.log('Sending to server:', data);
                    
                    // TODO: Replace with actual API call
                    // fetch('/api/chat/send', {
                    //     method: 'POST',
                    //     headers: { 'Content-Type': 'application/json' },
                    //     body: JSON.stringify(data)
                    // });
                }

                addMessage(sender, text) {
                    const timestamp = new Date().toLocaleTimeString('vi-VN', { 
                        hour: '2-digit', 
                        minute: '2-digit' 
                    });

                    const messageData = { sender, text, timestamp, sessionId: this.sessionId };
                    this.messages.push(messageData);
                    this.saveMessages();

                    this.renderMessage(messageData);
                    this.scrollToBottom();
                }

                renderMessage(messageData) {
                    const { sender, text, timestamp } = messageData;
                    
                    const messageWrapper = document.createElement('div');
                    messageWrapper.className = `message-wrapper ${sender}`;

                    const avatar = document.createElement('div');
                    avatar.className = 'message-avatar';
                    
                    if (sender === 'admin' || sender === 'bot') {
                        avatar.innerHTML = '<img src="{{ asset("assets/frontend/img/icon_logo.png") }}" alt="Admin">';
                    } else {
                        if (this.userImage) {
                            const img = document.createElement('img');
                            img.src = this.userImage;
                            img.alt = this.userName || 'User';
                            img.onerror = () => {
                                // If image fails to load, show letter avatar
                                avatar.innerHTML = '';
                                avatar.textContent = this.userName ? this.userName.charAt(0).toUpperCase() : 'K';
                            };
                            avatar.appendChild(img);
                        } else {
                            avatar.textContent = this.userName ? this.userName.charAt(0).toUpperCase() : 'K';
                        }
                    }

                    const content = document.createElement('div');
                    content.className = 'message-content';
                    
                    const bubble = document.createElement('div');
                    bubble.className = 'message-bubble';
                    bubble.textContent = text;

                    const time = document.createElement('span');
                    time.className = 'message-time';
                    time.textContent = timestamp;

                    content.appendChild(bubble);
                    content.appendChild(time);

                    messageWrapper.appendChild(avatar);
                    messageWrapper.appendChild(content);

                    this.chatMessages.appendChild(messageWrapper);
                }

                renderMessages() {
                    this.chatMessages.innerHTML = '';
                    this.messages.forEach(msg => this.renderMessage(msg));
                    this.scrollToBottom();
                }

                showTyping() {
                    this.typingIndicator.style.display = 'flex';
                    this.chatStatus.textContent = 'Admin đang soạn tin nhắn...';
                    this.scrollToBottom();
                }

                hideTyping() {
                    this.typingIndicator.style.display = 'none';
                    this.chatStatus.textContent = 'Trực tuyến • Phản hồi ngay';
                }

                adminResponse(userMessage) {
                    this.showTyping();

                    const responses = this.getAdminResponse(userMessage);
                    const response = responses[Math.floor(Math.random() * responses.length)];

                    setTimeout(() => {
                        this.hideTyping();
                        this.addMessage('admin', response);
                        
                        // Show suggested messages occasionally
                        if (Math.random() > 0.6) {
                            this.showSuggestedMessages();
                        }
                    }, 2000 + Math.random() * 2000);
                }

                getAdminResponse(message) {
                    const lowerMessage = message.toLowerCase();

                    if (lowerMessage.includes('đặt hàng') || lowerMessage.includes('mua')) {
                        return [
                            `Chào ${this.userName}! Tôi rất vui được hỗ trợ bạn đặt hàng. Bạn có thể xem sản phẩm tại trang Sản phẩm hoặc cho tôi biết bạn quan tâm loại nông sản nào? Tôi sẽ tư vấn cụ thể cho bạn! 🛒`,
                            `Tuyệt vời ${this.userName}! Để đặt hàng, bạn chọn sản phẩm yêu thích và thêm vào giỏ. Nếu cần tư vấn về sản phẩm nào, cứ hỏi tôi nhé! 🌿`
                        ];
                    }

                    if (lowerMessage.includes('khuyến mãi') || lowerMessage.includes('giảm giá')) {
                        return [
                            'Hiện chúng tôi đang có chương trình: Giảm 25% đơn đầu tiên + Freeship từ 500K. Ngoài ra còn nhiều Flash Sale hấp dẫn mỗi ngày! Bạn muốn đặt hàng luôn không? 🎉',
                            'Ưu đãi hot hiện tại: -25% đơn đầu, miễn phí ship 500K+, và combo tiết kiệm đến 40%! Để tôi gửi bạn link sản phẩm đang sale nhé! 🎁'
                        ];
                    }

                    if (lowerMessage.includes('giao hàng') || lowerMessage.includes('ship')) {
                        return [
                            'Về giao hàng, chúng tôi có 2 hình thức:\n• Giao nhanh (2-4h): Miễn phí\n• Giao tiêu chuẩn (1-2 ngày): 20.000đ\nBạn ở khu vực nào để tôi check thời gian giao cụ thể nhé? 🚚',
                            'Chúng tôi giao hàng toàn quốc! Giao nhanh 2-4h hoặc tiêu chuẩn 1-2 ngày. Miễn phí ship cho đơn từ 500K. Bạn cần giao đến đâu ạ? 📦'
                        ];
                    }

                    if (lowerMessage.includes('chất lượng') || lowerMessage.includes('tươi')) {
                        return [
                            'Về chất lượng bạn yên tâm nhé! 100% nông sản sạch, được kiểm tra kỹ từ vườn. Nếu có vấn đề gì, chúng tôi đổi trả miễn phí trong 24h. Cam kết tươi ngon! 🌱',
                            'Tất cả sản phẩm đều là nông sản sạch, nguồn gốc rõ ràng từ các trang trại uy tín. Tôi có thể gửi bạn chứng nhận VietGAP nếu bạn cần! ✅'
                        ];
                    }

                    if (lowerMessage.includes('cảm ơn') || lowerMessage.includes('thanks')) {
                        return [
                            `Rất vui được hỗ trợ ${this.userName}! Nếu cần gì thêm, cứ nhắn tin cho tôi bất cứ lúc nào nhé! 😊`,
                            'Không có gì! Chúc bạn có trải nghiệm mua sắm tuyệt vời tại Nông Sản Việt! 🌟'
                        ];
                    }

                    if (lowerMessage.includes('giá') || lowerMessage.includes('bao nhiêu')) {
                        return [
                            'Giá của chúng tôi rất cạnh tranh và cập nhật hàng ngày theo thị trường. Bạn quan tâm sản phẩm nào cụ thể? Tôi sẽ báo giá chi tiết và có thêm ưu đãi cho bạn! 💰',
                            'Mỗi loại sản phẩm có giá khác nhau. Bạn muốn hỏi về sản phẩm nào? Tôi sẽ tư vấn giá tốt nhất cho bạn! 🏷️'
                        ];
                    }

                    if (lowerMessage.includes('hello') || lowerMessage.includes('hi') || lowerMessage.includes('chào')) {
                        return [
                            `Chào ${this.userName}! Rất vui được trò chuyện với bạn. Tôi có thể giúp bạn về đặt hàng, sản phẩm, khuyến mãi hay giao hàng. Bạn cần tư vấn gì nhé? 👋`,
                            `Hi ${this.userName}! Tôi là admin của Nông Sản Việt. Cần tôi hỗ trợ gì cho bạn không? 😊`
                        ];
                    }

                    // Default responses
                    return [
                        `${this.userName} ơi, tôi hiểu câu hỏi của bạn rồi. Để tôi hỗ trợ chính xác hơn, bạn có thể nói rõ hơn về: Sản phẩm nào bạn quan tâm? Hay cần tư vấn về đặt hàng, giao hàng? 😊`,
                        'Tôi đang lắng nghe! Bạn cần tư vấn về sản phẩm, giá cả, khuyến mãi hay giao hàng? Cứ hỏi tôi bất cứ điều gì nhé! 💚',
                        'Để tôi hỗ trợ bạn tốt nhất, bạn có thể cho tôi biết cụ thể hơn bạn cần gì không? Ví dụ: Loại rau củ, trái cây hay thực phẩm nào bạn đang tìm? 🌿'
                    ];
                }

                showSuggestedMessages() {
                    const suggestions = [
                        'Xem sản phẩm mới',
                        'Khuyến mãi hiện tại',
                        'Chính sách đổi trả',
                        'Liên hệ trực tiếp'
                    ];

                    const suggestedContainer = document.createElement('div');
                    suggestedContainer.className = 'suggested-messages';

                    suggestions.forEach(text => {
                        const btn = document.createElement('button');
                        btn.className = 'suggested-msg-btn';
                        btn.textContent = text;
                        btn.addEventListener('click', () => {
                            this.addMessage('user', text);
                            this.botResponse(text);
                            suggestedContainer.remove();
                        });
                        suggestedContainer.appendChild(btn);
                    });

                    this.chatMessages.appendChild(suggestedContainer);
                    this.scrollToBottom();
                }

                scrollToBottom() {
                    setTimeout(() => {
                        this.chatBody.scrollTop = this.chatBody.scrollHeight;
                    }, 100);
                }

                saveMessages() {
                    localStorage.setItem('chatMessages', JSON.stringify(this.messages));
                }

                loadMessages() {
                    const saved = localStorage.getItem('chatMessages');
                    return saved ? JSON.parse(saved) : [];
                }

                clearChat() {
                    this.messages = [];
                    this.saveMessages();
                    this.chatMessages.innerHTML = '';
                }
            }

            // Initialize chat system
            const chatSystem = new ChatSystem();

            // Scroll to Top Functionality
            const scrollTopBtn = document.getElementById('scrollTopBtn');
            if (scrollTopBtn) {
                scrollTopBtn.addEventListener('click', function() {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                });
            }

            // Follow Button - Open Facebook page in new tab
            const followBtn = document.getElementById('followBtn');
            if (followBtn) {
                followBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    // Replace with your actual Facebook page URL
                    window.open('https://www.facebook.com/nongsanviet', '_blank');
                });
            }

            // Quick action buttons functionality
            const quickActionBtns = document.querySelectorAll('.quick-action-btn');
            quickActionBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const text = this.querySelector('span').textContent;
                    console.log('Quick action clicked:', text);
                    // Add your custom logic here based on the action
                });
            });

            // Auto-show chat modal on first visit (optional)
            const hasSeenChat = localStorage.getItem('hasSeenChat');
            if (!hasSeenChat) {
                setTimeout(() => {
                    if (chatModal) {
                        chatModal.classList.add('active');
                        localStorage.setItem('hasSeenChat', 'true');
                        
                        // Auto-hide after 5 seconds
                        setTimeout(() => {
                            chatModal.classList.remove('active');
                        }, 5000);
                    }
                }, 3000);
            }
        });
    </script>

</body>

</html>
