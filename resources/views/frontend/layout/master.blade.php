<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Vegetable">
    <meta name="keywords" content="Vegetable, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nông Sản Việt</title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Nunito:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}" type="text/css">
    
    <!-- Custom Font Styles -->
    <style>
        /* Font Family Override */
        body, html {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif !important;
            font-weight: 400;
            line-height: 1.6;
            color: #333;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Nunito', -apple-system, BlinkMacSystemFont, sans-serif !important;
            font-weight: 700;
            line-height: 1.3;
            color: #2d3436;
        }

        .header__menu ul li a {
            font-family: 'Inter', sans-serif !important;
            font-weight: 500;
            font-size: 15px;
            letter-spacing: 0.3px;
        }

        .hero__categories__all span {
            font-family: 'Inter', sans-serif !important;
            font-weight: 600;
        }

        .footer__widget h6 {
            font-family: 'Nunito', sans-serif !important;
            font-weight: 700;
            font-size: 16px;
        }

        /* Button Styles */
        .site-btn, .btn {
            font-family: 'Inter', sans-serif !important;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        /* Product Cards */
        .product-name a {
            font-family: 'Nunito', sans-serif !important;
            font-weight: 600;
        }

        .section-title {
            font-family: 'Nunito', sans-serif !important;
            font-weight: 800;
        }

        .section-subtitle {
            font-family: 'Inter', sans-serif !important;
            font-weight: 400;
        }

        /* Header Top */
        .header__top__left ul li {
            font-family: 'Inter', sans-serif !important;
            font-weight: 400;
            font-size: 14px;
        }

        /* Search */
        .hero__search__form input {
            font-family: 'Inter', sans-serif !important;
            font-weight: 400;
        }

        /* Price */
        .current-price, .original-price {
            font-family: 'Inter', sans-serif !important;
            font-weight: 700;
        }

        /* Badges */
        .badge-hot, .badge-new, .section-badge {
            font-family: 'Inter', sans-serif !important;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        /* Blog Content */
        .blog-content h5 {
            font-family: 'Nunito', sans-serif !important;
            font-weight: 600;
        }

        .blog-content p {
            font-family: 'Inter', sans-serif !important;
            font-weight: 400;
            line-height: 1.7;
        }

        /* Features */
        .feature-card h5 {
            font-family: 'Nunito', sans-serif !important;
            font-weight: 700;
        }

        .feature-card p {
            font-family: 'Inter', sans-serif !important;
            font-weight: 400;
        }

        /* Hero Text */
        .hero__text h1 {
            font-family: 'Nunito', sans-serif !important;
            font-weight: 900;
            letter-spacing: -0.5px;
        }

        .hero__text p {
            font-family: 'Inter', sans-serif !important;
            font-weight: 400;
            line-height: 1.6;
        }

        .hero-badge {
            font-family: 'Inter', sans-serif !important;
            font-weight: 600;
            letter-spacing: 1px;
        }

        /* Mobile Menu */
        .mobile-menu ul li a {
            font-family: 'Inter', sans-serif !important;
            font-weight: 500;
        }

        /* Cart */
        .header__cart__price {
            font-family: 'Inter', sans-serif !important;
            font-weight: 600;
        }

        /* Product Rating */
        .sold-count {
            font-family: 'Inter', sans-serif !important;
            font-weight: 500;
        }

        /* View All Button */
        .view-all-btn {
            font-family: 'Inter', sans-serif !important;
            font-weight: 600;
            letter-spacing: 0.3px;
        }

        /* Improved Readability */
        p {
            font-size: 15px;
            line-height: 1.7;
        }

        small {
            font-size: 13px;
        }

        /* Better Font Smoothing */
        * {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Modern Header Styles */
        .header-modern {
            background: #fff;
            box-shadow: 0 2px 20px rgba(0,0,0,0.08);
            position: sticky;
            top: 0;
            z-index: 999;
        }

        /* Top Bar */
        .header-top {
            background: #28a745;
            color: white;
            padding: 8px 0;
        }

        .header-top-left {
            display: flex;
            align-items: center;
            flex-wrap: nowrap;
        }

        .header-top-left .top-info {
            margin-right: 25px;
            font-size: 13px;
            color: rgba(255,255,255,0.9);
            white-space: nowrap;
            display: inline-flex;
            align-items: center;
        }

        .header-top-left .top-info i {
            margin-right: 6px;
            color: white;
            flex-shrink: 0;
        }

        .header-top-right {
            text-align: right;
        }

        .auth-links {
            display: flex;
            gap: 8px;
            justify-content: flex-end;
            flex-wrap: nowrap;
        }

        .auth-link {
            color: rgba(255,255,255,0.9);
            text-decoration: none;
            font-size: 12px;
            padding: 4px 10px;
            border-radius: 12px;
            transition: all 0.3s;
            border: 1px solid rgba(255,255,255,0.3);
            white-space: nowrap;
        }

        .auth-link:hover {
            color: white;
            background: rgba(255,255,255,0.1);
        }

        .auth-link.register {
            background: white;
            color: #28a745;
            border-color: white;
        }

        .auth-link.register:hover {
            background: #f8f9fa;
        }

        .user-info {
            font-size: 12px;
            color: white;
            white-space: nowrap;
        }

        .user-info a {
            color: white;
            text-decoration: none;
            font-weight: 600;
        }

        .logout-btn {
            margin-left: 10px;
            color: rgba(255,255,255,0.8);
            text-decoration: none;
        }

        /* Main Header */
        .header-main {
            padding: 15px 0;
        }

        .logo-section .logo img {
            max-height: 50px;
            width: auto;
        }

        /* Navigation */
        .main-navigation .nav-menu {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
            gap: 20px;
            align-items: center;
            justify-content: center;
            flex-wrap: nowrap;
        }

        .nav-item .nav-link {
            display: flex;
            align-items: center;
            gap: 5px;
            padding: 8px 12px;
            color: #333;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
            position: relative;
            border-radius: 15px;
            white-space: nowrap;
            font-size: 14px;
        }

        .nav-item .nav-link i {
            font-size: 13px;
        }

        .nav-item.active .nav-link,
        .nav-item .nav-link:hover {
            color: #28a745;
            background: rgba(40, 167, 69, 0.1);
        }

        .nav-item.has-dropdown {
            position: relative;
        }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            background: white;
            min-width: 180px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
            border-radius: 8px;
            list-style: none;
            padding: 8px 0;
            margin: 0;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s;
            z-index: 1000;
        }

        .nav-item.has-dropdown:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-menu li a {
            display: block;
            padding: 6px 16px;
            color: #333;
            text-decoration: none;
            transition: all 0.3s;
            font-size: 13px;
            white-space: nowrap;
        }

        .dropdown-menu li a:hover {
            background: #f8f9fa;
            color: #28a745;
        }

        /* Header Right */
        .header-right {
            display: flex;
            align-items: center;
            gap: 12px;
            justify-content: flex-end;
            flex-wrap: nowrap;
        }

        .search-section {
            position: relative;
        }

        .search-input-wrapper {
            position: relative;
            background: rgba(40, 167, 69, 0.15);
            border: 2px solid rgba(40, 167, 69, 0.3);
            border-radius: 25px;
            overflow: hidden;
            width: 42px;
            height: 42px;
            transition: all 0.4s ease;
            display: flex;
            align-items: center;
        }

        .search-input-wrapper:hover,
        .search-input-wrapper:focus-within,
        .search-input-wrapper.active {
            width: 250px;
            background: rgba(40, 167, 69, 0.2);
            border-color: #28a745;
        }

        .search-input-wrapper input {
            width: 100%;
            padding: 10px 45px 10px 15px;
            border: none;
            background: transparent;
            font-size: 14px;
            outline: none;
            color: white;
            opacity: 0;
            transition: opacity 0.3s ease 0.1s;
            font-weight: 500;
        }

        .search-input-wrapper input::placeholder {
            color: rgba(255, 255, 255, 0.8);
            font-weight: 400;
        }

        .search-input-wrapper:hover input,
        .search-input-wrapper:focus-within input,
        .search-input-wrapper.active input {
            opacity: 1;
        }

        .search-btn {
            position: absolute;
            right: 6px;
            top: 50%;
            transform: translateY(-50%);
            background: #28a745;
            border: none;
            width: 30px;
            height: 30px;
            /* border-radius: 15px; */
            color: white;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 14px;
            z-index: 2;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .search-input-wrapper:not(:hover):not(:focus-within):not(.active) .search-btn {
            right: 6px;
            background: #28a745;
        }

        .search-btn:hover {
            background: #1e7e34;
            transform: translateY(-50%) scale(1.1);
        }

        .search-btn i {
            font-size: 14px;
        }

        /* Categories Section */
        .categories-section {
            background: #f8f9fa;
            border-bottom: 1px solid #eee;
            padding: 0;
        }

        .categories-bar {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .categories-toggle {
            background: #28a745;
            color: white;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            font-size: 14px;
        }

        .categories-list {
            display: flex;
            align-items: center;
            gap: 25px;
            flex: 1;
        }

        .category-item {
            color: #333;
            text-decoration: none;
            padding: 12px 0;
            font-weight: 500;
            font-size: 14px;
            transition: color 0.3s;
        }

        .category-item:hover {
            color: #28a745;
        }

        .more-categories {
            position: relative;
        }

        .more-toggle {
            color: #333;
            cursor: pointer;
            padding: 12px 0;
            font-weight: 500;
            font-size: 14px;
            transition: color 0.3s;
        }

        .more-toggle:hover {
            color: #28a745;
        }

        .more-dropdown {
            position: absolute;
            top: 100%;
            right: 0;
            background: white;
            min-width: 200px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.15);
            border-radius: 8px;
            padding: 10px 0;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s;
            z-index: 1000;
        }

        .more-categories:hover .more-dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .more-dropdown a {
            display: block;
            padding: 8px 20px;
            color: #333;
            text-decoration: none;
            transition: all 0.3s;
        }

        .more-dropdown a:hover {
            background: #f8f9fa;
            color: #28a745;
        }

        /* Mobile Menu */
        .mobile-menu-toggle {
            display: none;
            position: fixed;
            top: 20px;
            right: 20px;
            background: #28a745;
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            cursor: pointer;
            z-index: 1001;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }

        #result {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.15);
            max-height: 300px;
            overflow-y: auto;
            z-index: 1000;
            display: none;
            min-width: 220px;
        }

        .cart-icon {
            position: relative;
            width: 42px;
            height: 42px;
            background: #28a745;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s;
            flex-shrink: 0;
        }

        .cart-icon:hover {
            transform: scale(1.1);
            background: #1e7e34;
        }

        .cart-count {
            position: absolute;
            top: -4px;
            right: -4px;
            background: #dc3545;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        /* Responsive */
        @media (max-width: 1400px) {
            .header-top-left .top-info {
                margin-right: 20px;
                font-size: 12px;
            }
            
            .nav-menu {
                gap: 18px;
            }
            
            .nav-item .nav-link {
                padding: 7px 11px;
                font-size: 13px;
            }
            
            .search-input-wrapper {
                width: 38px;
                height: 38px;
            }
            
            .search-input-wrapper:hover,
            .search-input-wrapper:focus-within,
            .search-input-wrapper.active {
                width: 220px;
            }
            
            .search-btn {
                width: 28px;
                height: 28px;
                border-radius: 14px;
                font-size: 13px;
            }
            
            .search-btn i {
                font-size: 13px;
            }
            
            .cart-icon {
                width: 38px;
                height: 38px;
                font-size: 15px;
            }
            
            .cart-count {
                width: 16px;
                height: 16px;
                font-size: 9px;
            }
        }

        @media (max-width: 1200px) {
            .header-top-left .top-info {
                margin-right: 15px;
                font-size: 11px;
            }
            
            .nav-menu {
                gap: 15px;
            }
            
            .nav-item .nav-link {
                padding: 6px 10px;
                font-size: 12px;
            }
            
            .nav-item .nav-link i {
                font-size: 11px;
            }
            
            .search-input-wrapper:hover,
            .search-input-wrapper:focus-within,
            .search-input-wrapper.active {
                width: 190px;
            }
            
            .cart-icon {
                width: 36px;
                height: 36px;
                font-size: 14px;
            }
            
            .cart-count {
                width: 15px;
                height: 15px;
                font-size: 8px;
            }
        }

        @media (max-width: 992px) {
            .header-main {
                padding: 10px 0;
            }
            
            .main-navigation {
                display: none;
            }
            
            .header-right {
                justify-content: center;
                margin-top: 15px;
                width: 100%;
            }
            
            .logo-section {
                text-align: center;
            }
            
            .logo-section .logo img {
                max-height: 45px;
            }
            
            .search-input-wrapper {
                width: 40px;
                height: 40px;
            }
            
            .search-input-wrapper:hover,
            .search-input_wrapper:focus-within,
            .search-input-wrapper.active {
                width: 240px;
            }
            
            .search-btn {
                width: 30px;
                height: 30px;
                border-radius: 15px;
                font-size: 14px;
            }
            
            .cart-icon {
                width: 40px;
                height: 40px;
                font-size: 16px;
            }
            
            .cart-count {
                width: 18px;
                height: 18px;
                font-size: 10px;
            }
            
            /* Reorganize mobile header layout */
            .header-main .row {
                flex-direction: column;
                text-align: center;
            }
            
            .header-main .col-lg-3,
            .header-main .col-lg-6,
            .header-main .col-lg-3 {
                width: 100%;
                margin: 5px 0;
            }
        }

        @media (max-width: 768px) {
            .header-top {
                padding: 5px 0;
            }
            
            .header-top-left,
            .header-top-right {
                text-align: center;
                margin: 2px 0;
            }
            
            .header-top-left {
                justify-content: center;
                flex-wrap: wrap;
            }
            
            .header-top-left .top-info {
                margin-right: 8px;
                margin-bottom: 2px;
                font-size: 10px;
            }
            
            .auth-links {
                justify-content: center;
                gap: 5px;
            }
            
            .auth-link {
                font-size: 10px;
                padding: 3px 8px;
            }
            
            .user-info {
                font-size: 10px;
                text-align: center;
            }
            
            .header-main {
                padding: 8px 0;
            }
            
            .logo-section .logo img {
                max-height: 40px;
            }
            
            .header-right {
                margin-top: 10px;
                gap: 10px;
            }
            
            .search-input-wrapper {
                width: 36px;
                height: 36px;
            }
            
            .search-input-wrapper:hover,
            .search-input-wrapper:focus-within,
            .search-input-wrapper.active {
                width: 220px;
            }
            
            .search-input-wrapper input {
                padding: 8px 38px 8px 12px;
                font-size: 13px;
            }
            
            .search-btn {
                width: 26px;
                height: 26px;
                border-radius: 13px;
                font-size: 12px;
                right: 5px;
            }
            
            .search-btn i {
                font-size: 12px;
            }
            
            .cart-icon {
                width: 36px;
                height: 36px;
                font-size: 14px;
            }
            
            .cart-count {
                width: 16px;
                height: 16px;
                font-size: 8px;
                top: -3px;
                right: -3px;
            }
        }

        @media (max-width: 576px) {
            .header-top {
                padding: 4px 0;
            }
            
            .header-top-left .top-info:last-child {
                display: none;
            }
            
            .header-top-left .top-info {
                margin-right: 5px;
                font-size: 9px;
            }
            
            .auth-link {
                font-size: 9px;
                padding: 2px 6px;
            }
            
            .user-info {
                font-size: 9px;
            }
            
            .header-main {
                padding: 6px 0;
            }
            
            .logo-section .logo img {
                max-height: 35px;
            }
            
            .header-right {
                margin-top: 8px;
                gap: 8px;
                flex-direction: column;
                align-items: center;
            }
            
            .search-section {
                width: 100%;
                max-width: 250px;
            }
            
            .search-input-wrapper {
                width: 100%;
            }
            
            .search-input-wrapper:focus-within {
                width: 100%;
            }
            
            .cart-section {
                margin-top: 5px;
            }
            
            .mobile-menu-toggle {
                top: 15px;
                right: 15px;
                width: 45px;
                height: 45px;
                font-size: 16px;
            }
            
            /* Container adjustments for small screens */
            .container {
                padding-left: 10px;
                padding-right: 10px;
            }
        }

        @media (max-width: 480px) {
            .header-top-left .top-info {
                font-size: 8px;
                margin-right: 3px;
            }
            
            .header-top-left .top-info i {
                margin-right: 3px;
            }
            
            .auth-link {
                font-size: 8px;
                padding: 2px 5px;
            }
            
            .header-main {
                padding: 5px 0;
            }
            
            .logo-section .logo img {
                max-height: 30px;
            }
            
            .search-input-wrapper {
                width: 32px;
                height: 32px;
            }
            
            .search-input-wrapper:hover,
            .search-input-wrapper:focus-within,
            .search-input-wrapper.active {
                width: 100%;
            }
            
            .search-input-wrapper input {
                padding: 6px 32px 6px 10px;
                font-size: 12px;
            }
            
            .search-btn {
                width: 24px;
                height: 24px;
                border-radius: 12px;
                font-size: 11px;
                right: 4px;
            }
            
            .search-btn i {
                font-size: 11px;
            }
            
            .cart-icon {
                width: 30px;
                height: 30px;
                font-size: 12px;
            }
            
            .cart-count {
                width: 14px;
                height: 14px;
                font-size: 7px;
            }
        }

        /* Large screens optimization */
        @media (min-width: 1400px) {
            .header-top-left .top-info {
                margin-right: 35px;
                font-size: 14px;
            }
            
            .nav-menu {
                gap: 35px;
            }
            
            .nav-item .nav-link {
                padding: 10px 16px;
                font-size: 15px;
            }
            
            .search-input-wrapper {
                width: 45px;
                height: 45px;
            }
            
            .search-input-wrapper:hover,
            .search-input-wrapper:focus-within,
            .search-input-wrapper.active {
                width: 300px;
            }
            
            .search-input-wrapper input {
                padding: 12px 50px 12px 18px;
                font-size: 15px;
            }
            
            .search-btn {
                width: 30px;
                height: 30px;
                border-radius: 17px;
                font-size: 16px;
                right: 6px;
            }
            
            .search-btn i {
                font-size: 16px;
            }
            
            .cart-icon {
                width: 45px;
                height: 45px;
                font-size: 18px;
            }
            
            .cart-count {
                width: 20px;
                height: 20px;
                font-size: 11px;
            }
        }

        /* Height adjustments for different screen orientations */
        @media (max-height: 600px) and (orientation: landscape) {
            .header-top {
                padding: 3px 0;
            }
            
            .header-main {
                padding: 8px 0;
            }
            
            .header-top-left .top-info {
                font-size: 10px;
                margin-right: 10px;
            }
            
            .logo-section .logo img {
                max-height: 35px;
            }
        }

        /* Touch device optimizations */
        @media (pointer: coarse) {
            .nav-item .nav-link {
                padding: 12px 15px;
                min-height: 44px;
                display: flex;
                align-items: center;
            }
            
            .auth-link {
                min-height: 32px;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            
            .search-btn,
            .cart-icon {
                min-width: 44px;
                min-height: 44px;
            }
        }

        /* High DPI screens */
        @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
            .header-modern {
                box-shadow: 0 1px 10px rgba(0,0,0,0.1);
            }
            
            .dropdown-menu {
                box-shadow: 0 3px 15px rgba(0,0,0,0.2);
            }
            
            #result {
                box-shadow: 0 3px 15px rgba(0,0,0,0.2);
            }
        }

        /* Print styles */
        @media print {
            .header-modern {
                position: static;
                box-shadow: none;
                border-bottom: 1px solid #000;
            }
            
            .header-top,
            .header-right,
            .mobile-menu-toggle {
                display: none !important;
            }
            
            .main-navigation {
                display: none !important;
            }
            
            .logo-section .logo img {
                max-height: 60px;
            }
        }

        /* Accessibility improvements */
        @media (prefers-reduced-motion: reduce) {
            * {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }

        /* Dark mode support */
        @media (prefers-color-scheme: dark) {
            .search-input-wrapper {
                background: white;
            }
            
            .search-input-wrapper input {
                color: white;
            }
            
            .search-input-wrapper input::placeholder {
                color: #a0aec0;
            }
        }

        /* Ultra Modern Footer */
        .footer-ultra-modern {
            background: linear-gradient(145deg, #0f172a 0%, #1e293b 50%, #334155 100%);
            position: relative;
            overflow: hidden;
        }

        .footer-ultra-modern::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="0.5" fill="%23ffffff" opacity="0.03"/><circle cx="30" cy="30" r="0.3" fill="%23ffffff" opacity="0.02"/><circle cx="60" cy="20" r="0.4" fill="%23ffffff" opacity="0.03"/><circle cx="80" cy="50" r="0.3" fill="%23ffffff" opacity="0.02"/><circle cx="40" cy="70" r="0.5" fill="%23ffffff" opacity="0.03"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            pointer-events: none;
        }

        .footer-main-content {
            padding: 5rem 0 3rem;
            position: relative;
            z-index: 1;
        }

        /* Brand Section */
        .footer-brand .brand-logo {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 2.5rem;
        }

        .footer-logo-img {
            height: 60px;
            filter: brightness(1.4) contrast(1.2);
        }

        .brand-name {
            color: #f1f5f9;
            font-family: 'Nunito', sans-serif !important;
            font-weight: 800;
            font-size: 2rem;
            margin: 0;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
            background: linear-gradient(45deg, #22c55e, #16a34a);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .brand-description {
            color: #cbd5e1;
            line-height: 1.8;
            font-size: 16px;
            margin-bottom: 2.5rem;
            font-weight: 400;
        }

        /* Contact Cards */
        .contact-info-cards {
            display: grid;
            gap: 20px;
        }

        .contact-card {
            display: flex;
            align-items: center;
            gap: 18px;
            padding: 20px;
            background: rgba(255,255,255,0.06);
            border-radius: 16px;
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255,255,255,0.1);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .contact-card:hover {
            background: rgba(255,255,255,0.1);
            transform: translateX(12px) scale(1.02);
            border-color: rgba(34, 197, 94, 0.3);
            box-shadow: 0 8px 32px rgba(34, 197, 94, 0.15);
        }

        .contact-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
            box-shadow: 0 4px 16px rgba(34, 197, 94, 0.3);
        }

        .contact-details {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .contact-label {
            font-size: 13px;
            color: #94a3b8;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .contact-value {
            font-size: 16px;
            color: #f1f5f9;
            font-weight: 600;
        }

        /* Section Titles */
        .section-title {
            color: #f1f5f9;
            font-family: 'Nunito', sans-serif !important;
            font-weight: 700;
            font-size: 1.4rem;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 12px;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 40px;
            height: 3px;
            background: linear-gradient(90deg, #22c55e, #16a34a);
            border-radius: 2px;
        }

        .section-icon {
            color: #22c55e;
            font-size: 20px;
        }

        /* Footer Menu */
        .footer-menu {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .footer-menu a {
            color: #cbd5e1;
            text-decoration: none;
            font-size: 15px;
            font-weight: 500;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            padding: 10px 0;
            position: relative;
            border-radius: 8px;
        }

        .footer-menu a:hover {
            color: #22c55e;
            padding-left: 24px;
            background: rgba(34, 197, 94, 0.05);
        }

        .footer-menu a::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #22c55e, #16a34a);
            transition: width 0.3s ease;
            border-radius: 1px;
        }

        .footer-menu a:hover::before {
            width: 18px;
        }

        /* Newsletter Section */
        .newsletter-section .newsletter-description {
            color: #cbd5e1;
            font-size: 15px;
            font-weight: 500;
            margin-bottom: 24px;
            line-height: 1.6;
        }

        .newsletter-form-modern {
            margin-bottom: 2.5rem;
        }

        .newsletter-input-group {
            position: relative;
            display: flex;
            background: rgba(255,255,255,0.08);
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid rgba(255,255,255,0.2);
            backdrop-filter: blur(20px);
            transition: all 0.3s ease;
        }

        .newsletter-input-group:focus-within {
            border-color: #22c55e;
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1);
        }

        .newsletter-input-group input {
            flex: 1;
            padding: 16px 20px;
            border: none;
            background: transparent;
            color: #f1f5f9;
            font-size: 15px;
            font-weight: 500;
            outline: none;
        }

        .newsletter-input-group input::placeholder {
            color: #94a3b8;
            font-weight: 400;
        }

        .newsletter-input-group button {
            padding: 16px 24px;
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            border: none;
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 16px rgba(34, 197, 94, 0.3);
        }

        .newsletter-input-group button:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 24px rgba(34, 197, 94, 0.4);
        }

        /* Social Media */
        .social-title {
            color: #f1f5f9;
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 20px;
            font-family: 'Nunito', sans-serif !important;
        }

        .social-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        .social-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 14px 16px;
            border-radius: 12px;
            text-decoration: none;
            color: #f1f5f9;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid rgba(255,255,255,0.1);
            position: relative;
            overflow: hidden;
        }

        .social-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
            transition: left 0.5s ease;
        }

        .social-item:hover::before {
            left: 100%;
        }

        .social-item.facebook { background: rgba(24, 119, 242, 0.15); border-color: rgba(24, 119, 242, 0.3); }
        .social-item.instagram { background: rgba(225, 48, 108, 0.15); border-color: rgba(225, 48, 108, 0.3); }
        .social-item.youtube { background: rgba(255, 0, 0, 0.15); border-color: rgba(255, 0, 0, 0.3); }
        .social-item.tiktok { background: rgba(0, 0, 0, 0.3); border-color: rgba(255, 255, 255, 0.3); }

        .social-item:hover {
            transform: translateY(-4px) scale(1.02);
            box-shadow: 0 8px 32px rgba(0,0,0,0.3);
        }

        /* Trust Section */
        .trust-section {
            background: rgba(15, 23, 42, 0.6);
            padding: 3rem 0;
            border-top: 1px solid rgba(255,255,255,0.1);
            backdrop-filter: blur(20px);
        }

        .trust-title {
            color: #f1f5f9;
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 20px;
            font-family: 'Nunito', sans-serif !important;
        }

        .payment-methods {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .payment-item {
            padding: 12px 20px;
            background: rgba(255,255,255,0.08);
            border-radius: 12px;
            color: #f1f5f9;
            font-size: 14px;
            font-weight: 700;
            border: 1px solid rgba(255,255,255,0.2);
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .payment-item:hover {
            background: rgba(34, 197, 94, 0.2);
            border-color: #22c55e;
            transform: translateY(-2px);
            color: #22c55e;
            box-shadow: 0 8px 24px rgba(34, 197, 94, 0.2);
        }

        .trust-badges {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .trust-badge {
            padding: 10px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            color: #f1f5f9;
            border: 1px solid rgba(255,255,255,0.2);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .trust-badge.ssl { background: rgba(34, 197, 94, 0.2); border-color: #22c55e; color: #22c55e; }
        .trust-badge.verified { background: rgba(59, 130, 246, 0.2); border-color: #3b82f6; color: #3b82f6; }
        .trust-badge.rating { background: rgba(245, 158, 11, 0.2); border-color: #f59e0b; color: #f59e0b; }
        .trust-badge.support { background: rgba(139, 69, 19, 0.2); border-color: #8b4513; color: #d97706; }

        /* Footer Bottom */
        .footer-bottom {
            background: rgba(15, 23, 42, 0.8);
            padding: 2rem 0;
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        .copyright-text {
            color: #94a3b8;
            font-size: 15px;
            font-weight: 500;
            margin: 0;
            line-height: 1.6;
        }

        .brand-highlight {
            color: #22c55e;
            font-weight: 800;
        }

        .separator {
            margin: 0 12px;
            color: rgba(255,255,255,0.3);
        }

        .heart {
            color: #ef4444;
            animation: heartbeat 2s ease-in-out infinite;
        }

        @keyframes heartbeat {
            0% { transform: scale(1); }
            14% { transform: scale(1.1); }
            28% { transform: scale(1); }
            42% { transform: scale(1.1); }
            70% { transform: scale(1); }
        }

        .legal-link {
            color: #94a3b8;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .legal-link:hover {
            color: #22c55e;
        }

        .legal-separator {
            margin: 0 12px;
            color: rgba(255,255,255,0.2);
        }

        /* Enhanced Hover Effects */
        .footer-brand:hover .brand-name {
            transform: scale(1.05);
            transition: transform 0.3s ease;
        }

        .trust-badge:hover {
            transform: translateY(-2px) scale(1.05);
            transition: all 0.3s ease;
        }

        /* Responsive Footer */
        @media (max-width: 768px) {
            .footer-main-content {
                padding: 4rem 0 2rem;
            }
            
            .brand-name {
                font-size: 1.5rem;
            }
            
            .section-title {
                font-size: 1.2rem;
            }
            
            .contact-info-cards {
                gap: 15px;
            }
            
            .contact-card {
                padding: 16px;
            }
            
            .social-grid {
                grid-template-columns: 1fr;
            }
            
            .payment-methods,
            .trust-badges {
                justify-content: center;
                margin-bottom: 20px;
            }
            
            .footer-legal {
                text-align: center !important;
                margin-top: 20px;
            }
            
            .trust-section .col-lg-6 {
                text-align: center !important;
            }
        }

        @media (max-width: 576px) {
            .brand-logo {
                flex-direction: column;
                text-align: center;
                gap: 15px !important;
            }
            
            .brand-name {
                font-size: 1.3rem;
            }
            
            .contact-card {
                flex-direction: column;
                text-align: center;
                gap: 12px;
                padding: 20px;
            }
            
            .payment-item,
            .trust-badge {
                font-size: 12px;
                padding: 8px 12px;
            }
            
            .footer-main-content {
                padding: 3rem 0 1.5rem;
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
            <a href="#"><img src="{{ asset('assets/frontend/img/logo.png') }}" alt="" ></a>
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
                <li><i class="fa fa-envelope"></i> hello@nongsanviet.com</li>
                <li>Hỗ trợ vận chuyển đồ toàn quốc</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header-modern">
        <!-- Top Bar -->
        <div class="header-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="header-top-left">
                            <span class="top-info">
                                <i class="fa fa-envelope"></i>
                                nongsanviet@gmail.com
                            </span>
                            <span class="top-info">
                                <i class="fa fa-truck"></i>
                                Miễn phí vận chuyển toàn quốc
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header-top-right">
                            @if (Auth::guard('web')->check())
                                <div class="user-info">
                                    <i class="fa fa-user"></i>
                                    <span>Xin chào, <a href="{{route('account')}}">{{Auth::guard('web')->user()->name}}</a></span>
                                    <a href="{{route('logout')}}" class="logout-btn">Đăng xuất</a>
                                </div>
                            @else
                                <div class="auth-links">
                                    <a href="{{route('login')}}" class="auth-link">
                                        <i class="fa fa-sign-in"></i> Đăng nhập
                                    </a>
                                    <a href="{{route('register')}}" class="auth-link register">
                                        <i class="fa fa-user-plus"></i> Đăng ký
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Header -->
        <div class="header-main">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3">
                        <div class="logo-section">
                            <a href="/" class="logo">
                                <img src="{{ asset('assets/frontend/img/logo.png') }}" alt="Nông Sản Việt" width="160px">
                            </a>
                        </div>
                    </div>
                    
                    <div class="col-lg-6 col-md-5">
                        <nav class="main-navigation">
                            <ul class="nav-menu">
                                <li class="nav-item active">
                                    <a href="{{route('home')}}" class="nav-link">
                                        <i class="fa fa-home"></i> Trang chủ
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('shop')}}" class="nav-link">
                                        <i class="fa fa-shopping-bag"></i> Cửa hàng
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('blog')}}" class="nav-link">
                                        <i class="fa fa-newspaper-o"></i> Bài viết
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('contact')}}" class="nav-link">
                                        <i class="fa fa-phone"></i> Liên hệ
                                    </a>
                                </li>
                            </ul>
                        </nav></ul>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="header-right">
                            <div class="search-section">
                                <form action="{{route('shop')}}" class="search-form">
                                    <div class="search-input-wrapper">
                                        <input type="text" id="search" name="search" placeholder="Tìm kiếm..." value="{{ request('search') }}">
                                        <button type="submit" class="search-btn">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                    <ul class="list-group" id="result"></ul>
                                </form>
                            </div>
                            <div class="cart-section">
                                <a href="{{route('cart')}}" class="cart-link">
                                    <div class="cart-icon">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span class="cart-count">{{ session('cart') !== null ? count(session('cart')) : 0 }}</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Button -->
        <div class="mobile-menu-toggle">
            <i class="fa fa-bars"></i>
        </div>
    </header>
    <!-- Header Section End -->

    @yield('content')

     <!-- Footer Section Begin -->
     <footer class="footer-ultra-modern">
        <!-- Main Footer Content -->
        <div class="footer-main-content">
            <div class="container">
                <div class="row">
                    <!-- Brand Section -->
                    <div class="col-lg-4 col-md-6 mb-5">
                        <div class="footer-brand">
                            <div class="brand-logo mb-4">
                                <img src="/assets/frontend/img/logo.png" alt="Nông Sản Việt" class="footer-logo-img">
                                <h3 class="brand-name">Nông Sản Việt</h3>
                            </div>
                            <p class="brand-description">
                                🌱 Mang thiên nhiên tươi xanh đến từng gia đình Việt. Chúng tôi cam kết cung cấp nông sản sạch, 
                                an toàn và chất lượng cao nhất từ những vùng đất phì nhiêu.
                            </p>
                            <div class="contact-info-cards">
                                <div class="contact-card">
                                    <div class="contact-icon">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                    <div class="contact-details">
                                        <span class="contact-label">Địa chỉ</span>
                                        <span class="contact-value">Mê Linh, Hà Nội</span>
                                    </div>
                                </div>
                                <div class="contact-card">
                                    <div class="contact-icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="contact-details">
                                        <span class="contact-label">Hotline</span>
                                        <span class="contact-value">0988 888 888</span>
                                    </div>
                                </div>
                                <div class="contact-card">
                                    <div class="contact-icon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <div class="contact-details">
                                        <span class="contact-label">Email</span>
                                        <span class="contact-value">hello@nongsanviet.com</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="col-lg-2 col-md-6 mb-5">
                        <div class="footer-section">
                            <h5 class="section-title">
                                <i class="fa fa-link section-icon"></i>
                                Liên kết
                            </h5>
                            <ul class="footer-menu">
                                <li><a href="{{route('home')}}">🏠 Trang chủ</a></li>
                                <li><a href="{{route('shop')}}">🛒 Cửa hàng</a></li>
                                <li><a href="{{route('blog')}}">📝 Bài viết</a></li>
                                <li><a href="{{route('contact')}}">📞 Liên hệ</a></li>
                                <li><a href="#">ℹ️ Giới thiệu</a></li>
                                <li><a href="#">🎯 Tuyển dụng</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Customer Services -->
                    <div class="col-lg-3 col-md-6 mb-5">
                        <div class="footer-section">
                            <h4 class="section-title">
                                <i class="fa fa-heart section-icon"></i>
                                Dịch vụ
                            </h4>
                            <ul class="footer-menu">
                                <li><a href="#">📋 Hướng dẫn mua hàng</a></li>
                                <li><a href="#">🔄 Chính sách đổi trả</a></li>
                                <li><a href="#">🚚 Vận chuyển & Giao hàng</a></li>
                                <li><a href="#">🔒 Bảo mật thông tin</a></li>
                                <li><a href="#">📜 Điều khoản sử dụng</a></li>
                                <li><a href="#">❓ Câu hỏi thường gặp</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Newsletter & Social -->
                    <div class="col-lg-3 col-md-6 mb-5">
                        <div class="footer-section">
                            <h4 class="section-title">
                                <i class="fa fa-paper-plane section-icon"></i>
                                Kết nối
                            </h4>
                            
                            <!-- Newsletter -->
                            <div class="newsletter-section mb-4">
                                <p class="newsletter-description">
                                    💌 Đăng ký nhận tin để không bỏ lỡ ưu đãi hot!
                                </p>
                                <form class="newsletter-form-modern">
                                    <div class="newsletter-input-group">
                                        <input type="email" placeholder="email@example.com" required>
                                        <button type="submit">
                                            <i class="fa fa-rocket"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <!-- Social Media -->
                            <div class="social-section">
                                <h5 class="social-title">🌟 Theo dõi chúng tôi</h5>
                                <div class="social-grid">
                                    <a href="#" class="social-item facebook">
                                        <i class="fa fa-facebook-f"></i>
                                        <span>Facebook</span>
                                    </a>
                                    <a href="#" class="social-item instagram">
                                        <i class="fa fa-instagram"></i>
                                        <span>Instagram</span>
                                    </a>
                                    <a href="#" class="social-item youtube">
                                        <i class="fa fa-youtube-play"></i>
                                        <span>YouTube</span>
                                    </a>
                                    <a href="#" class="social-item tiktok">
                                        <i class="fa fa-music"></i>
                                        <span>TikTok</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Trust Indicators -->
        <div class="trust-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="payment-trust">
                            <h5 class="trust-title">💳 Thanh toán an toàn</h5>
                            <div class="payment-methods">
                                <div class="payment-item visa">VISA</div>
                                <div class="payment-item mastercard">Master</div>
                                <div class="payment-item momo">MoMo</div>
                                <div class="payment-item banking">Banking</div>
                                <div class="payment-item cod">COD</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="security-trust text-lg-end">
                            <h5 class="trust-title">🛡️ Bảo mật & Tin cậy</h5>
                            <div class="trust-badges">
                                <span class="trust-badge ssl">🔐 SSL Secured</span>
                                <span class="trust-badge verified">✅ Verified Store</span>
                                <span class="trust-badge rating">⭐ 4.9/5 Rating</span>
                                <span class="trust-badge support">💬 24/7 Support</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="copyright-info">
                            <p class="copyright-text">
                                © 2024 <strong class="brand-highlight">Nông Sản Việt</strong>
                                <span class="separator">•</span>
                                Made with <span class="heart">❤️</span> in Vietnam
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="footer-legal text-lg-end">
                            <a href="#" class="legal-link">Chính sách bảo mật</a>
                            <span class="legal-separator">•</span>
                            <a href="#" class="legal-link">Điều khoản sử dụng</a>
                            <span class="legal-separator">•</span>
                            <a href="#" class="legal-link">Sitemap</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </footer>
     <!-- Footer Section End -->
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Js Plugins -->
    <script src="{{ asset('assets/frontend/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/main.js') }}"></script>

    {{-- Search --}}
    <script>
        $(document).ready(function() {
            // Add active class when input has value
            $('#search').on('input', function() {
                if ($(this).val().length > 0) {
                    $('.search-input-wrapper').addClass('active');
                } else {
                    $('.search-input-wrapper').removeClass('active');
                }
            });

            // Keep expanded when clicking inside
            $('.search-input-wrapper').on('click', function(e) {
                e.stopPropagation();
                $(this).addClass('active');
                $('#search').focus();
            });

            // Collapse when clicking outside
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.search-section').length) {
                    if ($('#search').val().length === 0) {
                        $('.search-input-wrapper').removeClass('active');
                        $('#result').css('display', 'none');
                    }
                }
            });

            // Original search functionality
            $('#search').keyup(function() {
                $('#result').html('');
                var search = $('#search').val();
                if (search != '') {
                    $('#result').css('display', 'inherit');
                    $('.search-input-wrapper').addClass('active');
                    var expression = new RegExp(search, 'i');
                    $.getJSON('/json/products.json', function(data) {
                        $.each(data, function(key, value) {
                            if (value.name.search(expression) != -1) {
                                $('#result').append('<li class="list-group-item" style="cursor: pointer">' + value.name + '</li>');
                            }
                        });
                    });
                } else {
                    $('#result').css('display', 'none');
                    if (!$('.search-input-wrapper').is(':hover') && !$('.search-input-wrapper').is(':focus-within')) {}
                        $('.search-input-wrapper').removeClass('active');
                    }
                }
            });

            $('#result').on('click', 'li', function() {
                var click_text = $(this).text();
                $('#search').val($.trim(click_text));
                $('#result').html('');
                $('#result').css('display', 'none');
                $('.search-input-wrapper').addClass('active');
            });


            // delete group
            $('.delete-discount').click(function(e){
                e.preventDefault();

                var _token = $('input[name="_token"]').val();

                Swal.fire({
                    title: "Bạn có chắc chắn?",
                    text: "Bạn sẽ không thể khôi phục lại mã giảm giá này!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Có, xóa nó đi!",
                    cancelButtonText: "Hủy"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('deleteDiscount') }}",
                            method: "GET",
                            data: {
                                _token: _token
                            },
                            success: function(data) {
                                Swal.fire({
                                    title: "Đã xóa!",
                                    text: "Dữ liệu đã được xóa thành công.",
                                    icon: "success"
                                }).then((result) => {
                                    location.reload();
                                });
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText);
                                Swal.fire({
                                    title: "Lỗi!",
                                    text: "Đã xảy ra lỗi. Vui lòng thử lại.",
                                    icon: "error"
                                });
                            }
                        });
                    }
                });
            });


        });
    </script>

</body>

</html>
