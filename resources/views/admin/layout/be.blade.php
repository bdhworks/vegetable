<!doctype html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('assets/frontend/img/icon_logo.png') }}">
    <title>Admin - Nông Sản Việt</title>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/styles.min.css') }}" />
    
    <!-- Google Fonts - Modern Font Stack -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700;800;900&family=Source+Sans+Pro:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    
    <style>
        /* Modern Admin UI Variables */
        :root {
            --primary-color: #22c55e;
            --primary-dark: #16a34a;
            --secondary-color: #f8fafc;
            --accent-color: #3b82f6;
            --text-primary: #1e293b;
            --text-secondary: #64748b;
            --border-color: #e2e8f0;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1);
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            
            /* Sidebar Dark Theme Variables */
            --sidebar-bg: #0f172a;
            --sidebar-bg-secondary: #1e293b;
            --sidebar-bg-tertiary: #334155;
            --sidebar-text: #f1f5f9;
            --sidebar-text-secondary: #cbd5e1;
            --sidebar-text-muted: #94a3b8;
            --sidebar-accent: #22c55e;
            --sidebar-accent-hover: #16a34a;
            --sidebar-border: rgba(255, 255, 255, 0.1);
            
            /* Font Variables */
            --font-primary: 'Nunito', -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif;
            --font-heading: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', sans-serif;
            --font-body: 'Source Sans Pro', -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', sans-serif;
            --font-mono: 'Jetbrains Mono', 'Fira Code', 'Monaco', 'Consolas', 'Courier New', monospace;
        }

        /* Global Font Settings */
        * {
            font-family: var(--font-primary);
            font-feature-settings: 'kern' 1, 'liga' 1, 'calt' 1;
            text-rendering: optimizeLegibility;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Typography Hierarchy */
        h1, h2, h3, h4, h5, h6 {
            font-family: var(--font-heading);
            font-weight: 700;
            line-height: 1.2;
            margin: 0 0 1rem 0;
            color: var(--text-primary);
            letter-spacing: -0.025em;
        }

        h1 { font-size: 2.5rem; font-weight: 900; line-height: 1.1; }
        h2 { font-size: 2rem; font-weight: 800; }
        h3 { font-size: 1.75rem; font-weight: 700; }
        h4 { font-size: 1.5rem; font-weight: 600; }
        h5 { font-size: 1.25rem; font-weight: 600; }
        h6 { font-size: 1.125rem; font-weight: 600; }

        /* Body Text */
        p, div, span {
            font-family: var(--font-body);
            font-weight: 400;
            line-height: 1.6;
            color: var(--text-primary);
        }

        body {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            font-weight: 400;
            color: var(--text-primary);
        }

        /* Layout Adjustments */
        .body-wrapper {
            margin-left: 280px !important;
            transition: margin-left 0.3s ease !important;
            padding-top: 70px !important;
        }

        /* Enhanced Sidebar - Complete Redesign */
        .left-sidebar {
            background: linear-gradient(180deg, var(--sidebar-bg) 0%, var(--sidebar-bg-secondary) 100%) !important;
            border-right: 1px solid var(--sidebar-border) !important;
            box-shadow: 4px 0 30px rgba(0, 0, 0, 0.4) !important;
            width: 280px !important;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
            position: fixed !important;
            z-index: 1001;
            height: 100vh !important;
            top: 0 !important;
            left: 0 !important;
        }

        /* Sidebar Scroll Container */
        .sidebar-scroll-container {
            height: 100vh;
            overflow-y: auto;
            overflow-x: hidden;
            display: flex;
            flex-direction: column;
            padding-bottom: 20px;
        }

        /* Brand Logo Section - Enhanced */
        .brand-logo-section {
            padding: 2rem 1.5rem;
            border-bottom: 1px solid var(--sidebar-border);
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(20px);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .brand-logo-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .brand-link {
            text-decoration: none;
            display: block;
        }

        .logo-wrapper {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .brand-image {
            filter: brightness(1.4) drop-shadow(0 4px 15px rgba(34, 197, 94, 0.4));
            transition: all 0.3s ease;
            max-width: 110px;
            height: auto;
        }

        .brand-link:hover .brand-image {
            transform: scale(1.05);
            filter: brightness(1.5) drop-shadow(0 6px 20px rgba(34, 197, 94, 0.6));
        }

        .brand-title {
            color: var(--sidebar-text) !important;
            font-size: 20px;
            font-weight: 800;
            font-family: var(--font-heading);
            line-height: 1.1;
            margin: 0;
            letter-spacing: -0.02em;
            text-shadow: 0 2px 10px rgba(0,0,0,0.3);
            background: linear-gradient(135deg, #ffffff, #e2e8f0);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Sidebar Navigation - Enhanced */
        .sidebar-nav-modern {
            flex: 1;
            padding: 1.5rem 0;
            overflow-y: auto;
        }

        .nav-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        /* Navigation Section Headers - Enhanced */
        .nav-section-header {
            padding: 1.5rem 1.5rem 0.8rem;
            margin-bottom: 0.5rem;
        }

        .section-title {
            color: var(--sidebar-text-muted) !important;
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 0;
            font-family: var(--font-body);
            position: relative;
            padding-left: 15px;
        }

        .section-title::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 4px;
            background: var(--sidebar-accent);
            border-radius: 50%;
        }

        .section-icon {
            font-size: 12px;
            color: var(--sidebar-accent) !important;
            opacity: 0.8;
        }

        /* Navigation Items - Complete Redesign */
        .nav-item {
            margin-bottom: 4px;
            padding: 0 1.2rem;
        }

        .nav-link {
            display: flex !important;
            align-items: center !important;
            padding: 15px 18px !important;
            border-radius: 14px !important;
            color: var(--sidebar-text-secondary) !important;
            text-decoration: none !important;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
            position: relative !important;
            border: 1px solid transparent !important;
            overflow: hidden;
            font-weight: 500 !important;
            margin-bottom: 3px;
            background: transparent !important;
            font-family: var(--font-body) !important;
            font-size: 14px !important;
        }

        /* Navigation Link Hover Effect */
        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(34, 197, 94, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .nav-link:hover::before {
            left: 100%;
        }

        .nav-link:hover {
            background: linear-gradient(135deg, 
                rgba(34, 197, 94, 0.15) 0%, 
                rgba(34, 197, 94, 0.08) 100%) !important;
            border-color: rgba(34, 197, 94, 0.3) !important;
            color: var(--sidebar-text) !important;
            transform: translateX(6px);
            box-shadow: 0 4px 15px rgba(34, 197, 94, 0.15);
        }

        /* Active Navigation Link */
        .nav-link.active,
        .dashboard-link.active {
            background: linear-gradient(135deg, 
                var(--sidebar-accent) 0%, 
                var(--sidebar-accent-hover) 100%) !important;
            border-color: var(--sidebar-accent) !important;
            color: #ffffff !important;
            box-shadow: 0 6px 20px rgba(34, 197, 94, 0.4);
            transform: translateX(6px);
        }

        .nav-link.active .nav-text,
        .dashboard-link.active .nav-text {
            color: #ffffff !important;
            font-weight: 600 !important;
        }

        /* Navigation Icon Wrapper - Enhanced */
        .nav-icon-wrapper {
            width: 42px;
            height: 42px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 16px;
            transition: all 0.3s ease;
            flex-shrink: 0;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .nav-link:hover .nav-icon-wrapper {
            background: rgba(34, 197, 94, 0.2);
            border-color: rgba(34, 197, 94, 0.3);
            transform: scale(1.05);
        }

        .nav-link.active .nav-icon-wrapper,
        .dashboard-link.active .nav-icon-wrapper {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.3);
        }

        .nav-icon {
            font-size: 16px;
            color: inherit;
            transition: all 0.3s ease;
        }

        .nav-link:hover .nav-icon {
            color: var(--sidebar-accent);
        }

        .nav-link.active .nav-icon,
        .dashboard-link.active .nav-icon {
            color: #ffffff;
        }

        .nav-text {
            flex: 1;
            font-size: 15px;
            font-weight: 500;
            font-family: var(--font-body);
            letter-spacing: 0.2px;
            color: inherit !important;
            transition: all 0.3s ease;
        }

        /* Navigation Indicator */
        .nav-indicator {
            position: absolute;
            right: 18px;
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: transparent;
            transition: all 0.3s ease;
        }

        .nav-link.active .nav-indicator {
            background: #ffffff;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        }

        /* Sidebar Footer - Enhanced */
        .sidebar-footer {
            padding: 1.5rem;
            border-top: 1px solid var(--sidebar-border);
            background: linear-gradient(135deg, 
                rgba(15, 23, 42, 0.9) 0%, 
                rgba(30, 41, 59, 0.8) 100%);
            margin-top: auto;
            backdrop-filter: blur(15px);
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .system-info {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--sidebar-text-secondary);
            font-size: 12px;
            font-family: var(--font-body);
            font-weight: 500;
        }

        .info-item i {
            font-size: 12px;
            color: var(--sidebar-accent) !important;
            width: 14px;
        }

        .info-item span {
            color: var(--sidebar-text) !important;
        }

        #sidebarTime {
            color: var(--sidebar-text) !important;
            font-weight: 600;
        }

        .footer-actions {
            display: flex;
            gap: 8px;
        }

        .footer-btn {
            width: 36px;
            height: 36px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--sidebar-text-secondary) !important;
            text-decoration: none;
            font-size: 13px;
            transition: all 0.3s ease;
        }

        .footer-btn:hover {
            background: rgba(34, 197, 94, 0.2);
            border-color: rgba(34, 197, 94, 0.4);
            color: var(--sidebar-text) !important;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(34, 197, 94, 0.2);
        }

        .footer-btn.logout:hover {
            background: rgba(239, 68, 68, 0.2);
            border-color: rgba(239, 68, 68, 0.4);
            color: #ef4444 !important;
        }

        /* Enhanced Scrollbar for Sidebar */
        .sidebar-scroll-container::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar-scroll-container::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 3px;
        }

        .sidebar-scroll-container::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, 
                rgba(34, 197, 94, 0.4) 0%, 
                rgba(34, 197, 94, 0.6) 100%);
            border-radius: 3px;
        }

        .sidebar-scroll-container::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, 
                rgba(34, 197, 94, 0.6) 0%, 
                rgba(34, 197, 94, 0.8) 100%);
        }

        /* Header Styles */
        .app-header {
            background: rgba(255, 255, 255, 0.98) !important;
            backdrop-filter: blur(25px) !important;
            border-bottom: 1px solid var(--border-color) !important;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.06) !important;
            position: fixed !important;
            top: 0 !important;
            left: 280px !important;
            width: calc(100% - 280px) !important;
            z-index: 1000 !important;
            transition: all 0.3s ease !important;
            height: 70px;
        }

        .modern-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, 
                transparent 0%, 
                rgba(34, 197, 94, 0.3) 20%, 
                rgba(34, 197, 94, 0.8) 50%, 
                rgba(34, 197, 94, 0.3) 80%, 
                transparent 100%);
        }

        .header-navbar {
            padding: 0 2rem !important;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        /* Header Left Section */
        .header-left-section {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            min-width: 200px;
        }

        .mobile-menu-toggle {
            display: none;
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            border: none;
            border-radius: 10px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(34, 197, 94, 0.3);
        }

        .mobile-menu-toggle:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(34, 197, 94, 0.4);
        }

        .breadcrumb-section {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .current-page-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .page-icon {
            width: 35px;
            height: 35px;
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.1), rgba(34, 197, 94, 0.05));
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
            font-size: 16px;
        }

        .page-text {
            display: flex;
            flex-direction: column;
        }

        .page-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
            line-height: 1.2;
        }

        .page-breadcrumb {
            font-size: 12px;
            color: var(--text-secondary);
            margin: 0;
            font-weight: 500;
        }

        /* Header Center - Enhanced Search */
        .header-center-section {
            flex: 1;
            max-width: 500px;
            margin: 0 2rem;
        }

        .enhanced-search-container {
            position: relative;
            width: 100%;
        }

        .search-wrapper {
            position: relative;
            background: linear-gradient(135deg, 
                rgba(255, 255, 255, 0.9) 0%, 
                rgba(248, 250, 252, 0.95) 100%);
            border: 2px solid transparent;
            border-radius: 25px;
            padding: 2px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            background-clip: padding-box;
        }

        .search-wrapper::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, 
                var(--border-color) 0%, 
                rgba(34, 197, 94, 0.3) 50%, 
                var(--border-color) 100%);
            border-radius: 25px;
            z-index: -1;
        }

        .search-wrapper:focus-within {
            transform: translateY(-1px);
            box-shadow: 0 8px 30px rgba(34, 197, 94, 0.15);
        }

        .search-wrapper:focus-within::before {
            background: linear-gradient(135deg, 
                var(--primary-color) 0%, 
                rgba(34, 197, 94, 0.7) 50%, 
                var(--primary-color) 100%);
        }

        .search-input-group {
            display: flex;
            align-items: center;
            background: white;
            border-radius: 23px;
            overflow: hidden;
        }

        .search-icon-btn {
            width: 45px;
            height: 45px;
            background: none;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-secondary);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .search-wrapper:focus-within .search-icon-btn {
            color: var(--primary-color);
        }

        .enhanced-search-input {
            flex: 1;
            border: none;
            background: transparent;
            padding: 12px 8px 12px 0;
            font-size: 14px;
            color: var(--text-primary);
            outline: none;
            font-weight: 500;
        }

        .enhanced-search-input::placeholder {
            color: var(--text-secondary);
            font-weight: 400;
        }

        .search-shortcut {
            padding: 4px 12px;
            background: rgba(34, 197, 94, 0.1);
            color: var(--primary-color);
            font-size: 11px;
            font-weight: 600;
            border-radius: 15px;
            margin-right: 12px;
            display: flex;
            align-items: center;
            gap: 4px;
            opacity: 0.8;
        }

        /* Search Suggestions Enhanced */
        .search-suggestions-panel {
            position: absolute;
            top: calc(100% + 8px);
            left: 0;
            right: 0;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            border: 1px solid var(--border-color);
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px) scale(0.95);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1001;
            overflow: hidden;
            max-height: 400px;
        }

        .search-wrapper:focus-within .search-suggestions-panel {
            opacity: 1;
            visibility: visible;
            transform: translateY(0) scale(1);
        }

        .suggestions-header {
            padding: 16px 20px 8px;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border-bottom: 1px solid var(--border-color);
        }

        .suggestions-title {
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--text-secondary);
            margin: 0;
        }

        .suggestions-content {
            padding: 12px;
            max-height: 300px;
            overflow-y: auto;
        }

        .suggestion-group {
            margin-bottom: 16px;
        }

        .suggestion-group:last-child {
            margin-bottom: 0;
        }

        .group-title {
            font-size: 11px;
            font-weight: 700;
            color: var(--primary-color);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin: 0 0 8px 8px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .suggestion-item-enhanced {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 12px;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.2s ease;
            margin-bottom: 4px;
            text-decoration: none;
            color: var(--text-primary);
        }

        .suggestion-item-enhanced:hover {
            background: linear-gradient(135deg, 
                rgba(34, 197, 94, 0.08) 0%, 
                rgba(34, 197, 94, 0.04) 100%);
            color: var(--primary-color);
            transform: translateX(4px);
        }

        .suggestion-icon {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, 
                rgba(34, 197, 94, 0.1) 0%, 
                rgba(34, 197, 94, 0.05) 100%);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
            font-size: 14px;
        }

        .suggestion-content {
            flex: 1;
        }

        .suggestion-title {
            font-weight: 600;
            font-size: 13px;
            margin: 0 0 2px 0;
            line-height: 1.2;
        }

        .suggestion-desc {
            font-size: 11px;
            color: var(--text-secondary);
            margin: 0;
        }

        .suggestion-shortcut {
            font-size: 10px;
            color: var(--text-muted);
            background: rgba(248, 250, 252, 0.8);
            padding: 2px 6px;
            border-radius: 4px;
            font-weight: 500;
        }

        /* Header Right Section */
        .header-right-section {
            display: flex;
            align-items: center;
            gap: 1rem;
            min-width: 250px;
            justify-content: flex-end;
        }

        /* Quick Actions Enhanced */
        .quick-actions-menu {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-right: 1rem;
        }

        .quick-action-item {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            background: rgba(255, 255, 255, 0.8);
            border: 2px solid transparent;
            border-radius: 12px;
            color: var(--text-secondary);
            text-decoration: none;
            transition: all 0.3s ease;
            cursor: pointer;
            font-size: 16px;
        }

        .quick-action-item:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(34, 197, 94, 0.3);
            border-color: var(--primary-color);
        }

        .quick-action-item.has-notification {
            position: relative;
        }

        .notification-badge {
            position: absolute;
            top: -4px;
            right: -4px;
            width: 18px;
            height: 18px;
            background: #dc2626;
            color: white;
            border-radius: 50%;
            font-size: 10px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid white;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        /* Time Widget Enhanced */
        .time-display-widget {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 8px 16px;
            background: linear-gradient(135deg, 
                rgba(34, 197, 94, 0.05) 0%, 
                rgba(34, 197, 94, 0.02) 100%);
            border: 1px solid rgba(34, 197, 94, 0.1);
            border-radius: 12px;
            min-width: 80px;
        }

        .current-time-display {
            font-size: 16px;
            font-weight: 700;
            color: var(--primary-color);
            line-height: 1;
            font-family: 'Inter', monospace;
        }

        .current-date-display {
            font-size: 10px;
            color: var(--text-secondary);
            font-weight: 500;
            margin-top: 2px;
        }

        /* User Profile Enhanced */
        .user-profile-section {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 6px;
            background: rgba(255, 255, 255, 0.8);
            border: 2px solid transparent;
            border-radius: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            min-width: 180px;
        }

        .user-profile-section:hover {
            background: white;
            border-color: rgba(34, 197, 94, 0.2);
            transform: translateY(-1px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        }

        .user-avatar-container {
            position: relative;
            width: 45px;
            height: 45px;
        }

        .user-avatar-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 15px;
            border: 3px solid rgba(34, 197, 94, 0.2);
            transition: all 0.3s ease;
        }

        .user-profile-section:hover .user-avatar-image {
            border-color: var(--primary-color);
        }

        .user-status-indicator {
            position: absolute;
            bottom: -2px;
            right: -2px;
            width: 14px;
            height: 14px;
            background: #22c55e;
            border: 3px solid white;
            border-radius: 50%;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        }

        .user-info-section {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .user-display-name {
            font-size: 14px;
            font-weight: 600;
            color: var(--text-primary);
            margin: 0;
            line-height: 1.2;
        }

        .user-role-badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            font-size: 10px;
            font-weight: 600;
            color: var(--primary-color);
            background: rgba(34, 197, 94, 0.1);
            padding: 2px 8px;
            border-radius: 10px;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .dropdown-toggle-icon {
            font-size: 12px;
            color: var(--text-secondary);
            transition: all 0.3s ease;
        }

        .user-profile-section:hover .dropdown-toggle-icon {
            color: var(--primary-color);
            transform: rotate(180deg);
        }

        /* Enhanced Dropdown */
        .user-dropdown {
            background: white !important;
            border: 1px solid var(--border-color) !important;
            border-radius: 20px !important;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15) !important;
            padding: 0 !important;
            margin-top: 10px !important;
            min-width: 320px !important;
            overflow: hidden;
        }

        .dropdown-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, #16a34a 100%);
            padding: 20px;
            color: white;
        }

        .user-header-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .header-avatar {
            width: 50px;
            height: 50px;
            border-radius: 15px;
            border: 3px solid rgba(255, 255, 255, 0.3);
        }

        .header-user-details {
            flex: 1;
        }

        .user-name-header {
            margin: 0;
            font-size: 16px;
            font-weight: 700;
        }

        .user-email {
            margin: 0;
            font-size: 13px;
            opacity: 0.9;
        }

        .user-status-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 11px;
            margin-top: 5px;
            padding: 4px 8px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
        }

        .user-status-badge i {
            font-size: 8px;
        }

        .dropdown-section {
            padding: 15px 0;
        }

        .section-title {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--text-secondary);
            margin: 0 20px 10px;
        }

        .dropdown-item {
            display: flex !important;
            align-items: center !important;
            gap: 15px !important;
            padding: 12px 20px !important;
            border: none !important;
            border-radius: 0 !important;
            transition: all 0.3s ease !important;
        }

        .dropdown-item:hover {
            background: rgba(34, 197, 94, 0.05) !important;
            color: var(--primary-color) !important;
        }

        .dropdown-icon {
            width: 40px;
            height: 40px;
            background: rgba(34, 197, 94, 0.1);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
            flex-shrink: 0;
        }

        .dropdown-content {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .item-title {
            font-weight: 600;
            font-size: 14px;
            color: var(--text-primary);
        }

        .item-desc {
            font-size: 12px;
            color: var(--text-secondary);
        }

        .dropdown-footer {
            padding: 15px 20px;
            background: rgba(248, 250, 252, 0.8);
        }

        .logout-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
            text-decoration: none;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);
            color: white;
        }

        /* Notification Panel */
        .notification-panel {
            position: fixed;
            top: 80px;
            right: 20px;
            width: 380px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            transform: translateX(400px);
            transition: transform 0.3s ease;
            z-index: 1001;
            overflow: hidden;
            max-height: 500px;
        }

        .notification-panel.show {
            transform: translateX(0);
        }

        .notification-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, #16a34a 100%);
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .notification-header h5 {
            margin: 0;
            font-weight: 700;
        }

        .close-notification {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            font-size: 16px;
            padding: 5px;
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .close-notification:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .notification-content {
            max-height: 300px;
            overflow-y: auto;
            padding: 0;
        }

        .notification-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            padding: 15px 20px;
            border-bottom: 1px solid #f1f5f9;
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .notification-item:hover {
            background: rgba(34, 197, 94, 0.05);
        }

        .notification-item:last-child {
            border-bottom: none;
        }

        .notification-item.new {
            background: rgba(34, 197, 94, 0.08);
            border-left: 4px solid var(--primary-color);
        }

        .notification-icon {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, 
                rgba(34, 197, 94, 0.1) 0%, 
                rgba(34, 197, 94, 0.05) 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
            font-size: 16px;
            flex-shrink: 0;
        }

        .notification-details {
            flex: 1;
            min-width: 0;
        }

        .notification-details h6 {
            margin: 0 0 5px 0;
            font-weight: 600;
            font-size: 14px;
            color: var(--text-primary);
        }

        .notification-details p {
            margin: 0 0 5px 0;
            font-size: 13px;
            color: var(--text-secondary);
            line-height: 1.4;
        }

        .notification-time {
            font-size: 11px;
            color: var(--text-secondary);
            font-weight: 500;
        }

        .notification-footer {
            padding: 15px 20px;
            background: rgba(248, 250, 252, 0.8);
            border-top: 1px solid #f1f5f9;
        }

        .view-all-notifications {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            padding: 8px 12px;
            background: transparent;
            color: var(--primary-color);
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 13px;
            transition: all 0.3s ease;
        }

        .view-all-notifications:hover {
            background: rgba(34, 197, 94, 0.1);
            color: var(--primary-color);
            transform: translateY(-1px);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            h1 { font-size: 2rem; }
            h2 { font-size: 1.75rem; }
            h3 { font-size: 1.5rem; }
            h4 { font-size: 1.25rem; }
            h5 { font-size: 1.125rem; }
            h6 { font-size: 1rem; }
        }

        @media (max-width: 576px) {
            h1 { font-size: 1.75rem; }
            h2 { font-size: 1.5rem; }
            h3 { font-size: 1.25rem; }
        }

        @media (max-width: 1200px) {
            .left-sidebar {
                width: 260px !important;
            }
            
            .body-wrapper {
                margin-left: 260px !important;
            }
            
            .app-header {
                left: 260px !important;
                width: calc(100% - 260px) !important;
            }
        }

        @media (max-width: 768px) {
            .left-sidebar {
                position: fixed !important;
                left: -280px !important;
                z-index: 1002 !important;
                transition: left 0.3s ease !important;
                box-shadow: 8px 0 40px rgba(0, 0, 0, 0.6) !important;
            }
            
            .left-sidebar.show {
                left: 0 !important;
            }
            
            .body-wrapper {
                margin-left: 0 !important;
            }
            
            .app-header {
                left: 0 !important;
                width: 100% !important;
            }

            .brand-logo-container {
                flex-direction: column;
                gap: 1.2rem;
                text-align: center;
            }

            .logo-wrapper {
                justify-content: center;
                flex-direction: column;
                gap: 10px;
            }

            .brand-image {
                width: 90px;
            }

            .brand-title {
                font-size: 18px;
            }

            .mobile-menu-toggle {
                display: flex;
            }
            
            .header-center-section {
                display: none;
            }
            
            .user-info-section {
                display: none;
            }
            
            .quick-actions-menu {
                margin-right: 0.5rem;
                gap: 4px;
            }
            
            .quick-action-item {
                width: 38px;
                height: 38px;
                font-size: 14px;
            }
        }

        /* Enhanced visual feedback */
        .nav-link:active {
            transform: translateX(6px) scale(0.98);
        }

        .nav-link.active:active {
            transform: translateX(6px) scale(0.98);
        }
    </style>
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar modern-sidebar">
            <!-- Sidebar scroll-->
            <div class="sidebar-scroll-container">
                <!-- Brand Logo Section -->
                <div class="brand-logo-section">
                    <div class="brand-logo-container">
                        <a href="{{route('admin.dashboard')}}" class="brand-link">
                            <div class="logo-wrapper">
                                <img src="/assets/admin/images/logos/logo.png" width="120px" alt="Nông Sản Việt" class="brand-image" />
                                <span class="brand-title">|</span>
                                <div class="brand-text">
                                    <span class="brand-title"> Admin Panel</span>
                                </div>
                            </div>
                        </a>
                        <div class="sidebar-toggle-mobile d-xl-none" id="sidebarCollapse">
                            <i class="fas fa-times"></i>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Navigation -->
                <nav class="sidebar-nav-modern">
                    <ul class="nav-list" id="modernSidebarNav">
                        <!-- Dashboard -->
                        <li class="nav-item">
                            <a class="nav-link dashboard-link" href="{{route('admin.dashboard')}}">
                                <div class="nav-icon-wrapper">
                                    <i class="fas fa-chart-pie nav-icon"></i>
                                </div>
                                <span class="nav-text">Dashboard</span>
                                <div class="nav-indicator"></div>
                            </a>
                        </li>

                        <!-- Products Management -->
                        <li class="nav-section-header">
                            <span class="section-title">
                                <i class="fas fa-cube section-icon"></i>
                                Quản lý sản phẩm
                            </span>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('categoryProduct.index')}}">
                                <div class="nav-icon-wrapper">
                                    <i class="fas fa-layer-group nav-icon"></i>
                                </div>
                                <span class="nav-text">Danh mục</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('origin.index')}}">
                                <div class="nav-icon-wrapper">
                                    <i class="fas fa-map-marker-alt nav-icon"></i>
                                </div>
                                <span class="nav-text">Xuất xứ</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('productCode.index') }}">
                                <div class="nav-icon-wrapper">
                                    <i class="fas fa-barcode nav-icon"></i>
                                </div>
                                <span class="nav-text">Mã sản phẩm</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('product.index')}}">
                                <div class="nav-icon-wrapper">
                                    <i class="fas fa-seedling nav-icon"></i>
                                </div>
                                <span class="nav-text">Sản phẩm</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('discountCode.index') }}">
                                <div class="nav-icon-wrapper">
                                    <i class="fas fa-tags nav-icon"></i>
                                </div>
                                <span class="nav-text">Mã code</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('discount.index') }}">
                                <div class="nav-icon-wrapper">
                                    <i class="fas fa-percentage nav-icon"></i>
                                </div>
                                <span class="nav-text">Khuyến mãi</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('order.index')}}">
                                <div class="nav-icon-wrapper">
                                    <i class="fas fa-shopping-cart nav-icon"></i>
                                </div>
                                <span class="nav-text">Đơn hàng</span>
                            </a>
                        </li>

                        <!-- Content Management -->
                        <li class="nav-section-header">
                            <span class="section-title">
                                <i class="fas fa-edit section-icon"></i>
                                Quản lý nội dung
                            </span>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('categoryPost.index') }}">
                                <div class="nav-icon-wrapper">
                                    <i class="fas fa-folder-open nav-icon"></i>
                                </div>
                                <span class="nav-text">Chuyên mục</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('post.index') }}">
                                <div class="nav-icon-wrapper">
                                    <i class="fas fa-newspaper nav-icon"></i>
                                </div>
                                <span class="nav-text">Bài viết</span>
                            </a>
                        </li>

                        <!-- User Management -->
                        <li class="nav-section-header">
                            <span class="section-title">
                                <i class="fas fa-users section-icon"></i>
                                Quản lý người dùng
                            </span>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('group.index')}}">
                                <div class="nav-icon-wrapper">
                                    <i class="fas fa-shield-alt nav-icon"></i>
                                </div>
                                <span class="nav-text">Phân quyền</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('module.index')}}">
                                <div class="nav-icon-wrapper">
                                    <i class="fas fa-puzzle-piece nav-icon"></i>
                                </div>
                                <span class="nav-text">Module</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('staff.index')}}">
                                <div class="nav-icon-wrapper">
                                    <i class="fas fa-user-tie nav-icon"></i>
                                </div>
                                <span class="nav-text">Nhân viên</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('user.index')}}">
                                <div class="nav-icon-wrapper">
                                    <i class="fas fa-users nav-icon"></i>
                                </div>
                                <span class="nav-text">Khách hàng</span>
                            </a>
                        </li>
                    </ul>
                </nav>

                <!-- Sidebar Footer -->
                <div class="sidebar-footer">
                    <div class="footer-content">
                        <div class="system-info">
                            <div class="info-item">
                                <i class="fas fa-server"></i>
                                <span>System Status</span>
                                <div class="status-indicator online"></div>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-clock"></i>
                                <span id="sidebarTime">{{ date('H:i') }}</span>
                            </div>
                        </div>
                        <div class="footer-actions">
                            <a href="{{ route('home') }}" target="_blank" class="footer-btn" title="Xem website">
                                <i class="fas fa-external-link-alt"></i>
                            </a>
                            <a href="{{ route('admin.password') }}" class="footer-btn" title="Cài đặt">
                                <i class="fas fa-cog"></i>
                            </a>
                            <a href="{{ route('admin.logout') }}" class="footer-btn logout" title="Đăng xuất">
                                <i class="fas fa-sign-out-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header modern-header">
                <nav class="navbar navbar-expand-lg header-navbar">
                    <!-- Header Left Section -->
                    <div class="header-left-section">
                        <!-- Mobile Menu Toggle -->
                        <button class="mobile-menu-toggle d-xl-none" id="headerCollapse">
                            <i class="fas fa-bars"></i>
                        </button>

                        <!-- Page Info & Breadcrumb -->
                        <div class="breadcrumb-section d-none d-lg-block">
                            <div class="current-page-info">
                                <div class="page-icon">
                                    <i class="fas fa-chart-pie" id="page-icon"></i>
                                </div>
                                <div class="page-text">
                                    <h6 class="page-title" id="page-title">@yield('title_one') </h6>
                                    <p class="page-breadcrumb" id="page-breadcrumb">@yield('title_two')</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Header Center - Enhanced Search -->
                    <div class="header-center-section d-none d-lg-block">
                        <div class="enhanced-search-container">
                            <div class="search-wrapper">
                                <div class="search-input-group">
                                    <button class="search-icon-btn">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <input type="text" 
                                           class="enhanced-search-input" 
                                           placeholder="Tìm kiếm sản phẩm, đơn hàng, khách hàng..." 
                                           autocomplete="off" />
                                    <div class="search-shortcut">
                                        <i class="fas fa-keyboard"></i>
                                        Ctrl K
                                    </div>
                                </div>
                                
                                <!-- Enhanced Search Suggestions -->
                                <div class="search-suggestions-panel">
                                    <div class="suggestions-header">
                                        <h6 class="suggestions-title">Tìm kiếm nhanh</h6>
                                    </div>
                                    <div class="suggestions-content">
                                        <div class="suggestion-group">
                                            <h6 class="group-title">
                                                <i class="fas fa-bolt"></i>
                                                Chức năng chính
                                            </h6>
                                            <a href="{{route('product.index')}}" class="suggestion-item-enhanced">
                                                <div class="suggestion-icon">
                                                    <i class="fas fa-seedling"></i>
                                                </div>
                                                <div class="suggestion-content">
                                                    <p class="suggestion-title">Quản lý sản phẩm</p>
                                                    <p class="suggestion-desc">Thêm, sửa, xóa sản phẩm</p>
                                                </div>
                                                <span class="suggestion-shortcut">Ctrl+P</span>
                                            </a>
                                            
                                            <a href="{{route('order.index')}}" class="suggestion-item-enhanced">
                                                <div class="suggestion-icon">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </div>
                                                <div class="suggestion-content">
                                                    <p class="suggestion-title">Quản lý đơn hàng</p>
                                                    <p class="suggestion-desc">Xem và xử lý đơn hàng</p>
                                                </div>
                                                <span class="suggestion-shortcut">Ctrl+O</span>
                                            </a>
                                            
                                            <a href="{{route('user.index')}}" class="suggestion-item-enhanced">
                                                <div class="suggestion-icon">
                                                    <i class="fas fa-users"></i>
                                                </div>
                                                <div class="suggestion-content">
                                                    <p class="suggestion-title">Quản lý khách hàng</p>
                                                    <p class="suggestion-desc">Thông tin khách hàng</p>
                                                </div>
                                                <span class="suggestion-shortcut">Ctrl+U</span>
                                            </a>
                                        </div>

                                        <div class="suggestion-group">
                                            <h6 class="group-title">
                                                <i class="fas fa-cog"></i>
                                                Cấu hình
                                            </h6>
                                            <a href="{{route('categoryProduct.index')}}" class="suggestion-item-enhanced">
                                                <div class="suggestion-icon">
                                                    <i class="fas fa-layer-group"></i>
                                                </div>
                                                <div class="suggestion-content">
                                                    <p class="suggestion-title">Danh mục sản phẩm</p>
                                                    <p class="suggestion-desc">Quản lý phân loại</p>
                                                </div>
                                            </a>
                                            
                                            <a href="{{route('post.index')}}" class="suggestion-item-enhanced">
                                                <div class="suggestion-icon">
                                                    <i class="fas fa-newspaper"></i>
                                                </div>
                                                <div class="suggestion-content">
                                                    <p class="suggestion-title">Quản lý bài viết</p>
                                                    <p class="suggestion-desc">Tin tức và blog</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Header Right Section -->
                    <div class="header-right-section">
                        <!-- Quick Actions Menu -->
                        <div class="quick-actions-menu">
                            <a href="{{ route('home') }}" 
                               target="_blank" 
                               class="quick-action-item" 
                               title="Xem website" 
                               data-bs-toggle="tooltip">
                                <i class="fas fa-external-link-alt"></i>
                            </a>
                            
                            <a href="{{ route('order.index') }}" 
                               class="quick-action-item has-notification" 
                               title="Đơn hàng mới" 
                               data-bs-toggle="tooltip">
                                <i class="fas fa-shopping-bag"></i>
                                <span class="notification-badge">3</span>
                            </a>
                            
                            <button class="quick-action-item has-notification notification-toggle" 
                                    title="Thông báo" 
                                    data-bs-toggle="tooltip"
                                    onclick="toggleNotificationPanel()">
                                <i class="fas fa-bell"></i>
                                <span class="notification-badge">5</span>
                            </button>
                        </div>

                        <!-- Time Display Widget -->
                        <div class="time-display-widget d-none d-xl-flex">
                            <div class="current-time-display" id="header-time">{{ date('H:i') }}</div>
                            <div class="current-date-display">{{ date('d/m/Y') }}</div>
                        </div>

                        <!-- User Profile Section -->
                        <div class="dropdown">
                            <div class="user-profile-section" 
                                 id="userProfileDropdown"
                                 data-bs-toggle="dropdown" 
                                 aria-expanded="false">
                                <div class="user-avatar-container">
                                    <img src="/assets/admin/images/profile/avatar.jpg" 
                                         alt="User Avatar" 
                                         class="user-avatar-image">
                                    <div class="user-status-indicator"></div>
                                </div>
                                <div class="user-info-section d-none d-md-block">
                                    <h6 class="user-display-name">{{ Auth::user()->name }}</h6>
                                    <span class="user-role-badge">
                                        <i class="fas fa-crown"></i>
                                        Admin
                                    </span>
                                </div>
                                <i class="fas fa-chevron-down dropdown-toggle-icon"></i>
                            </div>
                            
                            <!-- Enhanced User Dropdown -->
                            <div class="dropdown-menu dropdown-menu-end user-dropdown" 
                                 aria-labelledby="userProfileDropdown">
                                <div class="dropdown-header">
                                    <div class="user-header-info">
                                        <img src="/assets/admin/images/profile/avatar.jpg" alt="Avatar" class="header-avatar">
                                        <div class="header-user-details">
                                            <h6 class="user-name-header">{{ Auth::user()->name }}</h6>
                                            <p class="user-email">{{ Auth::user()->email }}</p>
                                            <span class="user-status-badge active">
                                                <i class="fas fa-circle"></i>
                                                Đang hoạt động
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="dropdown-divider"></div>
                                
                                <div class="dropdown-section">
                                    <h6 class="section-title">Tài khoản</h6>
                                    <a href="{{ route('staff.profile') }}" class="dropdown-item">
                                        <div class="dropdown-icon">
                                            <i class="fas fa-user-circle"></i>
                                        </div>
                                        <div class="dropdown-content">
                                            <span class="item-title">Hồ sơ cá nhân</span>
                                            <span class="item-desc">Quản lý thông tin tài khoản</span>
                                        </div>
                                    </a>
                                    
                                    <a href="{{ route('admin.password') }}" class="dropdown-item">
                                        <div class="dropdown-icon">
                                            <i class="fas fa-key"></i>
                                        </div>
                                        <div class="dropdown-content">
                                            <span class="item-title">Đổi mật khẩu</span>
                                            <span class="item-desc">Cập nhật mật khẩu bảo mật</span>
                                        </div>
                                    </a>
                                </div>

                                <div class="dropdown-divider"></div>

                                <div class="dropdown-section">
                                    <h6 class="section-title">Hệ thống</h6>
                                    <a href="javascript:void(0)" class="dropdown-item">
                                        <div class="dropdown-icon">
                                            <i class="fas fa-cog"></i>
                                        </div>
                                        <div class="dropdown-content">
                                            <span class="item-title">Cài đặt</span>
                                            <span class="item-desc">Cấu hình hệ thống</span>
                                        </div>
                                    </a>
                                    
                                    <a href="javascript:void(0)" class="dropdown-item">
                                        <div class="dropdown-icon">
                                            <i class="fas fa-chart-bar"></i>
                                        </div>
                                        <div class="dropdown-content">
                                            <span class="item-title">Thống kê</span>
                                            <span class="item-desc">Báo cáo chi tiết</span>
                                        </div>
                                    </a>
                                </div>

                                <div class="dropdown-divider"></div>

                                <div class="dropdown-footer">
                                    <a href="{{ route('admin.logout') }}" class="logout-btn">
                                        <i class="fas fa-sign-out-alt"></i>
                                        <span>Đăng xuất</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>

                <!-- Enhanced Notification Panel -->
                <div class="notification-panel" id="notificationPanel">
                    <div class="notification-header">
                        <h5><i class="fas fa-bell me-2"></i>Thông báo</h5>
                        <button class="close-notification" onclick="closeNotificationPanel()">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="notification-content">
                        <div class="notification-item new">
                            <div class="notification-icon">
                                <i class="fas fa-shopping-bag"></i>
                            </div>
                            <div class="notification-details">
                                <h6>Đơn hàng mới</h6>
                                <p>Có 3 đơn hàng mới cần xử lý từ khách hàng</p>
                                <span class="notification-time">2 phút trước</span>
                            </div>
                        </div>
                        
                        <div class="notification-item">
                            <div class="notification-icon">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <div class="notification-details">
                                <h6>Khách hàng mới</h6>
                                <p>5 khách hàng mới đăng ký tài khoản hôm nay</p>
                                <span class="notification-time">15 phút trước</span>
                            </div>
                        </div>
                        
                        <div class="notification-item">
                            <div class="notification-icon">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <div class="notification-details">
                                <h6>Báo cáo doanh thu</h6>
                                <p>Doanh thu hôm nay tăng 15% so với hôm qua</p>
                                <span class="notification-time">1 giờ trước</span>
                            </div>
                        </div>

                        <div class="notification-item">
                            <div class="notification-icon">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                            <div class="notification-details">
                                <h6>Cảnh báo hết hàng</h6>
                                <p>2 sản phẩm sắp hết hàng trong kho</p>
                                <span class="notification-time">2 giờ trước</span>
                            </div>
                        </div>
                    </div>
                    <div class="notification-footer">
                        <a href="#" class="view-all-notifications">
                            <i class="fas fa-arrow-right me-1"></i>
                            Xem tất cả thông báo
                        </a>
                    </div>
                </div>
            </header>
            <!--  Header End -->

            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/admin/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    {{-- <script src="/assets/admin/libs/summernote/summernote-lite.min.js"></script> --}}
    <script src="{{ asset('assets/admin/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/admin/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('assets/admin/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/admin/js/my_script.js') }}"></script>
    {{-- <script src="{{ asset('assets/admin/ckeditor/ckeditor.js') }}"></script> --}}
    @stack('js')

    <script>
        // Enhanced header interactions
        // document.addEventListener('DOMContentLoaded', function() {
        //     Update time displays
        //     function updateTimeDisplays() {
        //         const now = new Date();
        //         const timeString = now.toLocaleTimeString('vi-VN', {
        //             hour: '2-digit',
        //             minute: '2-digit'
        //         });
                
        //         // Update header time
        //         const headerTime = document.getElementById('header-time');
        //         if (headerTime) {
        //             headerTime.textContent = timeString;
        //         }
        //     }
            
        //     setInterval(updateTimeDisplays, 1000);
        //     updateTimeDisplays();

        //     Enhanced page title and breadcrumb management - FIXED
        //     function updatePageInfo() {
        //         const currentPath = window.location.pathname;
        //         const titleElement = document.getElementById('page-title');
        //         const breadcrumbElement = document.getElementById('page-breadcrumb');
        //         const iconElement = document.getElementById('page-icon');
                
        //         let pageInfo = {
        //             title: 'Dashboard',
        //             breadcrumb: 'Trang chủ / Quản lý hệ thống',
        //             icon: 'fas fa-chart-pie'
        //         };
                
        //         // Enhanced page mappings - More comprehensive
        //         const pageMap = {
        //             'dashboard': {
        //                 title: 'Dashboard',
        //                 breadcrumb: 'Trang chủ / Quản lý hệ thống',
        //                 icon: 'fas fa-chart-pie'
        //             },
        //             'category-product': {
        //                 title: 'Danh mục sản phẩm',
        //                 breadcrumb: 'Quản lý sản phẩm / Danh mục',
        //                 icon: 'fas fa-layer-group'
        //             },
        //             'origin': {
        //                 title: 'Xuất xứ',
        //                 breadcrumb: 'Quản lý sản phẩm / Xuất xứ',
        //                 icon: 'fas fa-map-marker-alt'
        //             },
        //             'product-code': {
        //                 title: 'Mã sản phẩm',
        //                 breadcrumb: 'Quản lý sản phẩm / Mã sản phẩm',
        //                 icon: 'fas fa-barcode'
        //             },
        //             'product': {
        //                 title: 'Sản phẩm',
        //                 breadcrumb: 'Quản lý sản phẩm / Sản phẩm',
        //                 icon: 'fas fa-seedling'
        //             },
        //             'discount-code': {
        //                 title: 'Mã giảm giá',
        //                 breadcrumb: 'Quản lý sản phẩm / Mã code',
        //                 icon: 'fas fa-tags'
        //             },
        //             'discount': {
        //                 title: 'Khuyến mãi',
        //                 breadcrumb: 'Quản lý sản phẩm / Khuyến mãi',
        //                 icon: 'fas fa-percentage'
        //             },
        //             'order': {
        //                 title: 'Đơn hàng',
        //                 breadcrumb: 'Quản lý sản phẩm / Đơn hàng',
        //                 icon: 'fas fa-shopping-cart'
        //             },
        //             'category-post': {
        //                 title: 'Chuyên mục bài viết',
        //                 breadcrumb: 'Quản lý nội dung / Chuyên mục',
        //                 icon: 'fas fa-folder-open'
        //             },
        //             'post': {
        //                 title: 'Bài viết',
        //                 breadcrumb: 'Quản lý nội dung / Bài viết',
        //                 icon: 'fas fa-newspaper'
        //             },
        //             'group': {
        //                 title: 'Phân quyền',
        //                 breadcrumb: 'Quản lý người dùng / Phân quyền',
        //                 icon: 'fas fa-shield-alt'
        //             },
        //             'module': {
        //                 title: 'Module',
        //                 breadcrumb: 'Quản lý người dùng / Module',
        //                 icon: 'fas fa-puzzle-piece'
        //             },
        //             'staff': {
        //                 title: 'Nhân viên',
        //                 breadcrumb: 'Quản lý người dùng / Nhân viên',
        //                 icon: 'fas fa-user-tie'
        //             },
        //             'user': {
        //                 title: 'Khách hàng',
        //                 breadcrumb: 'Quản lý người dùng / Khách hàng',
        //                 icon: 'fas fa-users'
        //             }
        //         };
                
        //         // Find matching page based on URL segments
        //         const pathSegments = currentPath.split('/').filter(segment => segment !== '' && segment !== 'admin');
                
        //         if (pathSegments.length === 0 || currentPath.includes('/admin/dashboard') || currentPath === '/admin') {
        //             pageInfo = pageMap['dashboard'];
        //         } else {
        //             // Try to match the first segment
        //             const mainSegment = pathSegments[0];
        //             if (pageMap[mainSegment]) {
        //                 pageInfo = pageMap[mainSegment];
        //             } else {
        //                 // Try to match with dashes converted
        //                 const dashedSegment = mainSegment.replace(/([A-Z])/g, '-$1').toLowerCase();
        //                 if (pageMap[dashedSegment]) {
        //                     pageInfo = pageMap[dashedSegment];
        //                 }
        //             }
        //         }
                
        //         // Update elements if they exist
        //         if (titleElement) titleElement.textContent = pageInfo.title;
        //         if (breadcrumbElement) breadcrumbElement.textContent = pageInfo.breadcrumb;
        //         if (iconElement) iconElement.className = pageInfo.icon;
        //     }
            
        //     // Call immediately and on page changes
        //     updatePageInfo();
            
        //     // Update on popstate (back/forward navigation)
        //     window.addEventListener('popstate', updatePageInfo);
            
        //     // Update on hash changes
        //     window.addEventListener('hashchange', updatePageInfo);

        //     // Enhanced search with keyboard shortcuts
        //     const searchInput = document.querySelector('.enhanced-search-input');
        //     if (searchInput) {
        //         // Ctrl+K to focus search
        //         document.addEventListener('keydown', function(e) {
        //             if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
        //                 e.preventDefault();
        //                 searchInput.focus();
        //             }
        //         });

        //         // Enhanced search filtering
        //         searchInput.addEventListener('input', function() {
        //             const query = this.value.toLowerCase();
        //             const suggestions = document.querySelectorAll('.suggestion-item-enhanced');
                    
        //             suggestions.forEach(item => {
        //                 const title = item.querySelector('.suggestion-title')?.textContent.toLowerCase() || '';
        //                 const desc = item.querySelector('.suggestion-desc')?.textContent.toLowerCase() || '';
                        
        //                 if (query.length === 0 || title.includes(query) || desc.includes(query)) {
        //                     item.style.display = 'flex';
        //                 } else {
        //                     item.style.display = 'none';
        //                 }
        //             });
        //         });

        //         // Handle Enter key
        //         searchInput.addEventListener('keydown', function(e) {
        //             if (e.key === 'Enter') {
        //                 e.preventDefault();
        //                 const visibleSuggestions = document.querySelectorAll('.suggestion-item-enhanced[style="display: flex"], .suggestion-item-enhanced:not([style*="none"])');
        //                 if (visibleSuggestions.length > 0) {
        //                     visibleSuggestions[0].click();
        //                 }
        //             }
        //         });
        //     }

        //     // Mobile menu toggle
        //     const mobileToggle = document.getElementById('headerCollapse');
        //     const sidebarCloseToggle = document.getElementById('sidebarCollapse');
        //     const sidebar = document.querySelector('.left-sidebar');
            
        //     if (mobileToggle && sidebar) {
        //         mobileToggle.addEventListener('click', function() {
        //             sidebar.classList.toggle('show');
        //         });
        //     }

        //     if (sidebarCloseToggle && sidebar) {
        //         sidebarCloseToggle.addEventListener('click', function() {
        //             sidebar.classList.remove('show');
        //         });
        //     }

        //     // Close sidebar when clicking outside on mobile
        //     document.addEventListener('click', function(e) {
        //         if (window.innerWidth <= 768 && sidebar) {
        //             if (!sidebar.contains(e.target) && 
        //                 !mobileToggle?.contains(e.target) && 
        //                 sidebar.classList.contains('show')) {
        //                 sidebar.classList.remove('show');
        //             }
        //         }
        //     });

        //     // Active navigation highlighting - FIXED
        //     const currentPath = window.location.pathname;
        //     const navLinks = document.querySelectorAll('.nav-link');
            
        //     navLinks.forEach(link => {
        //         link.classList.remove('active'); // Remove existing active classes first
        //         const href = link.getAttribute('href');
        //         if (href) {
        //             // More precise path matching
        //             if (currentPath === href || 
        //                 (href.includes('/admin/') && currentPath.includes(href.replace('/admin/', '').split('/')[0]))) {
        //                 link.classList.add('active');
        //             }
        //         }
        //     });

        //     // Update sidebar time
        //     function updateSidebarTime() {
        //         const sidebarTimeElement = document.getElementById('sidebarTime');
        //         if (sidebarTimeElement) {
        //             const now = new Date();
        //             const timeString = now.toLocaleTimeString('vi-VN', {
        //                 hour: '2-digit',
        //                 minute: '2-digit'
        //             });
        //             sidebarTimeElement.textContent = timeString;
        //         }
        //     }
            
        //     setInterval(updateSidebarTime, 1000);
        //     updateSidebarTime();

        //     // Initialize tooltips
        //     const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        //     tooltipTriggerList.map(function (tooltipTriggerEl) {
        //         return new bootstrap.Tooltip(tooltipTriggerEl);
        //     });

        //     // Enhanced notification panel management
        //     const notificationPanel = document.getElementById('notificationPanel');
        //     const notificationToggle = document.querySelector('.notification-toggle');
            
        //     // Close notification panel when clicking outside
        //     document.addEventListener('click', function(e) {
        //         if (notificationPanel && !notificationPanel.contains(e.target) && 
        //             !notificationToggle?.contains(e.target)) {
        //             notificationPanel.classList.remove('show');
        //         }
        //     });

        //     // Close notification panel on ESC key
        //     document.addEventListener('keydown', function(e) {
        //         if (e.key === 'Escape' && notificationPanel?.classList.contains('show')) {
        //             notificationPanel.classList.remove('show');
        //         }
        //     });
        // });

        // Enhanced notification panel functions
        function toggleNotificationPanel() {
            const panel = document.getElementById('notificationPanel');
            if (panel) {
                panel.classList.toggle('show');
                
                // Add focus trap for accessibility
                if (panel.classList.contains('show')) {
                    const firstFocusable = panel.querySelector('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
                    if (firstFocusable) {
                        setTimeout(() => firstFocusable.focus(), 100);
                    }
                }
            }
        }

        function closeNotificationPanel() {
            const panel = document.getElementById('notificationPanel');
            if (panel) {
                panel.classList.remove('show');
            }
        }

        // Update page info when navigating (for SPA-like behavior)
        function updatePageOnNavigation() {
            // Re-run the page info update
            setTimeout(() => {
                const event = new Event('DOMContentLoaded');
                document.dispatchEvent(event);
            }, 100);
        }

        // Listen for navigation events if using AJAX navigation
        if (window.history && window.history.pushState) {
            const originalPushState = window.history.pushState;
            window.history.pushState = function() {
                originalPushState.apply(window.history, arguments);
                updatePageOnNavigation();
            };
        }
    </script>
</body>

</html>
