<!doctype html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('assets/frontend/img/icon_logo.png') }}">
    <title>Admin - Nông Sản Việt</title>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/styles.min.css') }}" />
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <style>
        /* Modern Admin UI Styles */
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
        }

        * {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            font-weight: 400;
            color: var(--text-primary);
        }

        /* Enhanced Sidebar */
        .left-sidebar {
            background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%) !important;
            border-right: 1px solid var(--border-color) !important;
            box-shadow: var(--shadow-lg) !important;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .brand-logo {
            padding: 1.5rem !important;
            border-bottom: 1px solid var(--border-color);
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
        }

        .brand-logo img {
            filter: drop-shadow(0 2px 8px rgba(0, 0, 0, 0.1));
        }

        /* Navigation Styles */
        .nav-small-cap {
            color: var(--text-secondary) !important;
            font-weight: 600 !important;
            font-size: 11px !important;
            text-transform: uppercase !important;
            letter-spacing: 0.5px !important;
            margin: 1.5rem 0 0.5rem 0 !important;
            padding: 0 1.5rem !important;
        }

        .nav-small-cap-icon {
            color: var(--primary-color) !important;
        }

        .sidebar-item {
            margin-bottom: 4px;
        }

        .sidebar-link {
            display: flex !important;
            align-items: center !important;
            padding: 12px 24px !important;
            margin: 0 12px !important;
            border-radius: var(--radius-md) !important;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
            color: var(--text-primary) !important;
            font-weight: 500 !important;
            text-decoration: none !important;
            position: relative;
            overflow: hidden;
        }

        .sidebar-link:hover {
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.1) 0%, rgba(34, 197, 94, 0.05) 100%) !important;
            color: var(--primary-color) !important;
            transform: translateX(4px);
            box-shadow: var(--shadow-md);
        }

        .sidebar-link.active {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%) !important;
            color: white !important;
            box-shadow: 0 8px 25px rgba(34, 197, 94, 0.3);
        }

        .sidebar-link i {
            width: 20px;
            font-size: 18px !important;
            margin-right: 12px !important;
        }

        .hide-menu {
            font-size: 14px;
            font-weight: 500;
        }

        /* Header Styles */
        .app-header {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(20px) !important;
            border-bottom: 1px solid var(--border-color) !important;
            box-shadow: var(--shadow-sm) !important;
        }

        .navbar {
            padding: 1rem 1.5rem;
        }

        .nav-link {
            color: var(--text-primary) !important;
            font-weight: 500 !important;
            padding: 8px 12px !important;
            border-radius: var(--radius-sm) !important;
            transition: all 0.3s ease !important;
        }

        .nav-link:hover {
            background: rgba(34, 197, 94, 0.1) !important;
            color: var(--primary-color) !important;
        }

        .nav-icon-hover {
            position: relative;
        }

        .notification {
            position: absolute !important;
            top: 8px !important;
            right: 8px !important;
            width: 8px !important;
            height: 8px !important;
            background: #ef4444 !important;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.2); opacity: 0.7; }
            100% { transform: scale(1); opacity: 1; }
        }

        /* Profile Dropdown */
        .dropdown-menu {
            border: 1px solid var(--border-color) !important;
            box-shadow: var(--shadow-lg) !important;
            border-radius: var(--radius-md) !important;
            padding: 8px !important;
            margin-top: 8px !important;
        }

        .dropdown-menu a {
            border-radius: var(--radius-sm) !important;
            transition: all 0.3s ease !important;
            font-weight: 500 !important;
        }

        .dropdown-menu a:hover {
            background: var(--primary-color) !important;
            color: white !important;
        }

        /* Profile Image */
        .rounded-circle {
            border: 2px solid var(--primary-color);
            box-shadow: 0 4px 12px rgba(34, 197, 94, 0.2);
            transition: all 0.3s ease;
        }

        .rounded-circle:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(34, 197, 94, 0.3);
        }

        /* Content Area */
        .body-wrapper {
            background: transparent;
        }

        /* Enhanced Cards */
        .card {
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow-md);
            border-radius: var(--radius-lg);
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
        }

        .card:hover {
            box-shadow: var(--shadow-lg);
            transform: translateY(-2px);
        }

        .card-header {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border-bottom: 1px solid var(--border-color);
            border-radius: var(--radius-lg) var(--radius-lg) 0 0 !important;
            padding: 1.5rem;
        }

        .card-body {
            padding: 1.5rem;
        }

        /* Buttons */
        .btn {
            font-weight: 600;
            letter-spacing: 0.025em;
            border-radius: var(--radius-sm);
            transition: all 0.3s ease;
            border: none;
            box-shadow: var(--shadow-sm);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 25px rgba(34, 197, 94, 0.3);
        }

        .btn-outline-primary {
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            background: transparent;
        }

        .btn-outline-primary:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-1px);
        }

        /* Tables */
        .table {
            border-radius: var(--radius-md);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
        }

        .table thead th {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border: none;
            font-weight: 600;
            color: var(--text-primary);
            padding: 1rem;
        }

        .table tbody td {
            padding: 1rem;
            border-color: var(--border-color);
            vertical-align: middle;
        }

        .table tbody tr:hover {
            background: rgba(34, 197, 94, 0.05);
        }

        /* Forms */
        .form-control {
            border: 2px solid var(--border-color);
            border-radius: var(--radius-sm);
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.8);
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1);
            background: white;
        }

        .form-label {
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        /* Status Badges */
        .badge {
            font-weight: 600;
            padding: 6px 12px;
            border-radius: 20px;
            letter-spacing: 0.025em;
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
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            animation: loading 1.5s infinite;
        }

        @keyframes loading {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-color);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary-dark);
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .brand-logo {
                padding: 1rem !important;
            }
            
            .sidebar-link {
                padding: 10px 16px !important;
                margin: 0 8px !important;
            }
            
            .nav-small-cap {
                padding: 0 1rem !important;
            }
        }

        /* Custom Animations */
        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Success States */
        .success-glow {
            box-shadow: 0 0 20px rgba(34, 197, 94, 0.3);
            animation: successGlow 0.5s ease;
        }

        @keyframes successGlow {
            0% { box-shadow: 0 0 0 rgba(34, 197, 94, 0); }
            50% { box-shadow: 0 0 30px rgba(34, 197, 94, 0.5); }
            100% { box-shadow: 0 0 20px rgba(34, 197, 94, 0.3); }
        }

        /* Enhanced Typography */
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            color: var(--text-primary);
        }

        .page-title {
            font-size: 2rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Enhanced Header Styles */
        .modern-header {
            background: linear-gradient(135deg, 
                rgba(255, 255, 255, 0.95) 0%, 
                rgba(248, 250, 252, 0.95) 100%) !important;
            backdrop-filter: blur(20px) !important;
            border-bottom: 1px solid var(--border-color) !important;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08) !important;
            position: relative;
            z-index: 1000;
        }

        .modern-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--primary-color), transparent);
        }

        .navbar {
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-left, .header-center, .header-right {
            display: flex;
            align-items: center;
        }

        .header-center {
            flex: 1;
            max-width: 500px;
            margin: 0 2rem;
        }

        /* Breadcrumb Modern */
        .breadcrumb-modern {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .current-page {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 700;
            font-size: 18px;
            color: var(--text-primary);
        }

        .current-page i {
            color: var(--primary-color);
        }

        .page-subtitle {
            font-size: 12px;
            color: var(--text-secondary);
            margin-left: 26px;
        }

        /* Modern Search */
        .search-modern {
            width: 100%;
        }

        .search-container {
            position: relative;
            background: rgba(255, 255, 255, 0.8);
            border: 2px solid var(--border-color);
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .search-container:focus-within {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.1);
        }

        .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-secondary);
            z-index: 2;
        }

        .search-input {
            width: 100%;
            padding: 12px 15px 12px 45px;
            border: none;
            background: transparent;
            font-size: 14px;
            outline: none;
            color: var(--text-primary);
            border-radius: 25px;
        }

        .search-input::placeholder {
            color: var(--text-secondary);
        }

        .search-suggestions {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 10px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .search-container:focus-within .search-suggestions {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .suggestion-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 12px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .suggestion-item:hover {
            background: rgba(34, 197, 94, 0.1);
            color: var(--primary-color);
        }

        /* Quick Actions */
        .quick-actions {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-right: 20px;
        }

        .quick-action-btn {
            position: relative;
            width: 44px;
            height: 44px;
            background: rgba(255, 255, 255, 0.8);
            border: 2px solid var(--border-color);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-primary);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .quick-action-btn:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(34, 197, 94, 0.3);
        }

        .badge {
            position: absolute;
            top: -6px;
            right: -6px;
            background: #ef4444;
            color: white;
            border-radius: 10px;
            padding: 2px 6px;
            font-size: 10px;
            font-weight: 700;
            min-width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .badge-new { background: #f59e0b; }
        .badge-notification { background: #ef4444; }

        .notification-pulse {
            position: absolute;
            top: 8px;
            right: 8px;
            width: 8px;
            height: 8px;
            background: #ef4444;
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        /* Time Widget */
        .time-widget {
            text-align: right;
            padding: 8px 12px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 12px;
            border: 1px solid var(--border-color);
        }

        .current-time {
            font-size: 16px;
            font-weight: 700;
            color: var(--text-primary);
            font-family: 'JetBrains Mono', monospace;
        }

        .current-date {
            font-size: 11px;
            color: var(--text-secondary);
        }

        /* Enhanced User Profile */
        .user-profile-link {
            padding: 0 !important;
            background: rgba(255, 255, 255, 0.8) !important;
            border: 2px solid var(--border-color) !important;
            border-radius: 15px !important;
            transition: all 0.3s ease !important;
        }

        .user-profile-link:hover {
            border-color: var(--primary-color) !important;
            box-shadow: 0 4px 15px rgba(34, 197, 94, 0.2) !important;
        }

        .user-profile-section {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px 16px;
        }

        .user-avatar-container {
            position: relative;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            border: 2px solid white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .status-indicator {
            position: absolute;
            bottom: -2px;
            right: -2px;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            border: 2px solid white;
        }

        .status-indicator.online { background: #22c55e; }
        .status-indicator.away { background: #f59e0b; }
        .status-indicator.busy { background: #ef4444; }

        .user-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .user-name {
            font-weight: 700;
            font-size: 14px;
            color: var(--text-primary);
        }

        .user-role {
            font-size: 11px;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .dropdown-arrow {
            font-size: 12px;
            color: var(--text-secondary);
            transition: transform 0.3s ease;
        }

        .user-profile-link[aria-expanded="true"] .dropdown-arrow {
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
        }

        /* Notification Panel */
        .notification-panel {
            position: fixed;
            top: 80px;
            right: 20px;
            width: 350px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            transform: translateX(400px);
            transition: transform 0.3s ease;
            z-index: 1001;
            overflow: hidden;
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
        }

        .notification-content {
            padding: 20px;
            max-height: 400px;
            overflow-y: auto;
        }

        .notification-item {
            display: flex;
            gap: 15px;
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 10px;
            transition: all 0.3s ease;
        }

        .notification-item:hover {
            background: rgba(248, 250, 252, 0.8);
        }

        .notification-item.new {
            background: rgba(34, 197, 94, 0.05);
            border: 1px solid rgba(34, 197, 94, 0.2);
        }

        .notification-icon {
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
        }

        .notification-time {
            font-size: 11px;
            color: var(--text-muted);
        }

        .notification-footer {
            padding: 15px 20px;
            background: rgba(248, 250, 252, 0.8);
            text-align: center;
        }

        .view-all-notifications {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .header-center {
                max-width: 300px;
                margin: 0 1rem;
            }
            
            .user-info {
                display: none;
            }
            
            .time-widget {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 1rem;
            }
            
            .header-center {
                display: none;
            }
            
            .quick-actions {
                margin-right: 10px;
                gap: 5px;
            }
            
            .quick-action-btn {
                width: 40px;
                height: 40px;
            }
            
            .notification-panel {
                width: 300px;
                right: 10px;
            }
        }
    </style>
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="{{route('admin.dashboard')}}" class="text-nowrap logo-img">
                        Admin |
                        <img src="/assets/admin/images/logos/logo.png" width="100px" alt="Nông Sản Việt" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="fas fa-times fs-6"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{route('admin.dashboard')}}" aria-expanded="false">
                                <i class="fas fa-chart-line"></i>
                                <span class="hide-menu">Tổng quan</span>
                            </a>
                        </li>

                        <li class="nav-small-cap">
                            <i class="fas fa-circle nav-small-cap-icon"></i>
                            <span class="hide-menu">Quản lý sản phẩm</span>
                        </li>

                       <li class="sidebar-item">
                            <a class="sidebar-link" href="{{route('categoryProduct.index')}}" aria-expanded="false">
                                <i class="fas fa-layer-group"></i>
                                <span class="hide-menu">Danh mục sản phẩm</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{route('origin.index')}}" aria-expanded="false">
                                <i class="fas fa-map-marker-alt"></i>
                                <span class="hide-menu">Xuất xứ sản phẩm</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('productCode.index') }}" aria-expanded="false">
                                <i class="fas fa-barcode"></i>
                                <span class="hide-menu">Mã sản phẩm</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{route('product.index')}}" aria-expanded="false">
                                <i class="fas fa-seedling"></i>
                                <span class="hide-menu">Sản phẩm</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('discountCode.index') }}" aria-expanded="false">
                                <i class="fas fa-ticket-alt"></i>
                                <span class="hide-menu">Mã code</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('discount.index') }}" aria-expanded="false">
                                <i class="fas fa-percentage"></i>
                                <span class="hide-menu">Mã giảm giá</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{route('order.index')}}" aria-expanded="false">
                                <i class="fas fa-shopping-cart"></i>
                                <span class="hide-menu">Đơn hàng</span>
                            </a>
                        </li>

                        <li class="nav-small-cap">
                            <i class="fas fa-circle nav-small-cap-icon"></i>
                            <span class="hide-menu">Quản lý bài viết</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('categoryPost.index') }}" aria-expanded="false">
                                <i class="fas fa-folder"></i>
                                <span class="hide-menu">Danh mục bài viết</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('post.index') }}" aria-expanded="false">
                                <i class="fas fa-newspaper"></i>
                                <span class="hide-menu">Bài viết</span>
                            </a>
                        </li>

                        <li class="nav-small-cap">
                            <i class="fas fa-circle nav-small-cap-icon"></i>
                            <span class="hide-menu">Quản lý người dùng</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{route('group.index')}}" aria-expanded="false">
                                <i class="fas fa-shield-alt"></i>
                                <span class="hide-menu">Phân quyền</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{route('module.index')}}" aria-expanded="false">
                                <i class="fas fa-puzzle-piece"></i>
                                <span class="hide-menu">Module</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{route('staff.index')}}" aria-expanded="false">
                                <i class="fas fa-user-tie"></i>
                                <span class="hide-menu">Nhân viên</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{route('user.index')}}" aria-expanded="false">
                                <i class="fas fa-users"></i>
                                <span class="hide-menu">Khách hàng</span>
                            </a>
                        </li>

                        <li class="nav-small-cap">
                            <i class="fas fa-circle nav-small-cap-icon"></i>
                            <span class="hide-menu">Tài khoản</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('staff.profile') }}" aria-expanded="false">
                                <i class="fas fa-user-circle"></i>
                                <span class="hide-menu">Thông tin cá nhân</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{route('admin.password')}}" aria-expanded="false">
                                <i class="fas fa-key"></i>
                                <span class="hide-menu">Đổi mật khẩu</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{route('admin.logout')}}" aria-expanded="false">
                                <i class="fas fa-sign-out-alt"></i>
                                <span class="hide-menu">Đăng xuất</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header modern-header">
                <nav class="navbar navbar-expand-lg">
                    <div class="header-left">
                        <ul class="navbar-nav">
                            <li class="nav-item d-block d-xl-none">
                                <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse"
                                    href="javascript:void(0)">
                                    <i class="fas fa-bars"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <div class="breadcrumb-modern">
                                    <div class="current-page">
                                        <i class="fas fa-chart-line"></i>
                                        <span>Dashboard</span>
                                    </div>
                                    <div class="page-subtitle">
                                        Quản lý hệ thống nông sản
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="header-center">
                        <div class="search-modern">
                            <div class="search-container">
                                <i class="fas fa-search search-icon"></i>
                                <input type="text" class="search-input" placeholder="Tìm kiếm..." />
                                <div class="search-suggestions">
                                    <div class="suggestion-item">
                                        <i class="fas fa-seedling"></i>
                                        <span>Sản phẩm</span>
                                    </div>
                                    <div class="suggestion-item">
                                        <i class="fas fa-shopping-cart"></i>
                                        <span>Đơn hàng</span>
                                    </div>
                                    <div class="suggestion-item">
                                        <i class="fas fa-users"></i>
                                        <span>Khách hàng</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="header-right">
                        <ul class="navbar-nav flex-row align-items-center">
                            <!-- Quick Actions -->
                            <li class="nav-item">
                                <div class="quick-actions">
                                    <a href="{{ route('home') }}" target="_blank" class="quick-action-btn" title="Xem website">
                                        <i class="fas fa-external-link-alt"></i>
                                    </a>
                                    <a href="{{ route('order.index') }}" class="quick-action-btn" title="Đơn hàng mới">
                                        <i class="fas fa-shopping-bag"></i>
                                        <span class="badge badge-new">3</span>
                                    </a>
                                    <a href="javascript:void(0)" class="quick-action-btn notification-btn" title="Thông báo">
                                        <i class="fas fa-bell"></i>
                                        <div class="notification-pulse"></div>
                                        <span class="badge badge-notification">5</span>
                                    </a>
                                </div>
                            </li>

                            <!-- Time & Date Widget -->
                            <li class="nav-item me-3">
                                <div class="time-widget">
                                    <div class="current-time">
                                        <span id="current-time">{{ date('H:i') }}</span>
                                    </div>
                                    <div class="current-date">
                                        <span>{{ date('d/m/Y') }}</span>
                                    </div>
                                </div>
                            </li>

                            <!-- User Profile Dropdown -->
                            <li class="nav-item dropdown">
                                <a class="nav-link user-profile-link" href="javascript:void(0)" id="userProfileDropdown"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-profile-section">
                                        <div class="user-avatar-container">
                                            <img src="/assets/admin/images/profile/avatar.jpg" alt="User Avatar" class="user-avatar">
                                            <div class="status-indicator online"></div>
                                        </div>
                                        <div class="user-info">
                                            <span class="user-name">{{ Auth::user()->name }}</span>
                                            <span class="user-role">Super Admin</span>
                                        </div>
                                        <i class="fas fa-chevron-down dropdown-arrow"></i>
                                    </div>
                                </a>
                                
                                <div class="dropdown-menu dropdown-menu-end user-dropdown" aria-labelledby="userProfileDropdown">
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
                            </li>
                        </ul>
                    </div>
                </nav>

                <!-- Notification Panel -->
                <div class="notification-panel" id="notificationPanel">
                    <div class="notification-header">
                        <h5>Thông báo</h5>
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
                                <p>Có 3 đơn hàng mới cần xử lý</p>
                                <span class="notification-time">2 phút trước</span>
                            </div>
                        </div>
                        
                        <div class="notification-item">
                            <div class="notification-icon">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <div class="notification-details">
                                <h6>Khách hàng mới</h6>
                                <p>5 khách hàng mới đăng ký</p>
                                <span class="notification-time">15 phút trước</span>
                            </div>
                        </div>
                        
                        <div class="notification-item">
                            <div class="notification-icon">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <div class="notification-details">
                                <h6>Báo cáo doanh thu</h6>
                                <p>Doanh thu hôm nay tăng 15%</p>
                                <span class="notification-time">1 giờ trước</span>
                            </div>
                        </div>
                    </div>
                    <div class="notification-footer">
                        <a href="#" class="view-all-notifications">Xem tất cả thông báo</a>
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
    <script src="{{ asset('assets/admin/ckeditor/ckeditor.js') }}"></script>
    @stack('js')

    <script>
        // Enhanced UI interactions
        document.addEventListener('DOMContentLoaded', function() {
            // Add active class to current sidebar item
            const currentPath = window.location.pathname;
            const sidebarLinks = document.querySelectorAll('.sidebar-link');
            
            sidebarLinks.forEach(link => {
                if (link.getAttribute('href') === currentPath) {
                    link.classList.add('active');
                }
            });

            // Add fade-in animation to cards
            const cards = document.querySelectorAll('.card');
            cards.forEach((card, index) => {
                setTimeout(() => {
                    card.classList.add('fade-in');
                }, index * 100);
            });

            // Enhanced button hover effects
            const buttons = document.querySelectorAll('.btn');
            buttons.forEach(btn => {
                btn.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-2px)';
                });
                btn.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
        });

        $(document).ready(function() {
            // Enhanced SweetAlert2 styling
            const swalStyle = {
                customClass: {
                    confirmButton: 'btn btn-success me-2',
                    cancelButton: 'btn btn-outline-secondary'
                },
                buttonsStyling: false
            };

            // delete group
            $('.delete-group').click(function(e){
                e.preventDefault();

                var id = $(this).data('id_group');
                var _token = $('input[name="_token"]').val();

                Swal.fire({
                    title: "Bạn có chắc chắn?",
                    text: "Bạn sẽ không thể khôi phục lại điều này!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Có, xóa nó đi!",
                    cancelButtonText: "Hủy"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('group.destroy') }}",
                            method: "POST",
                            data: {
                                group_id: id,
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

            // delete origin
            $('.delete-origin').click(function(e){
                e.preventDefault();

                var id = $(this).data('id_origin');
                var _token = $('input[name="_token"]').val();

                Swal.fire({
                    title: "Bạn có chắc chắn?",
                    text: "Bạn sẽ không thể khôi phục lại điều này!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Có, xóa nó đi!",
                    cancelButtonText: "Hủy"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('origin.destroy') }}",
                            method: "POST",
                            data: {
                                origin_id: id,
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


            // delete category product
            $('.delete-category-product').click(function(e){
                e.preventDefault();

                var id = $(this).data('id_category');
                var _token = $('input[name="_token"]').val();

                Swal.fire({
                    title: "Bạn có chắc chắn?",
                    text: "Bạn sẽ không thể khôi phục lại điều này!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Có, xóa nó đi!",
                    cancelButtonText: "Hủy"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('categoryProduct.destroy') }}",
                            method: "POST",
                            data: {
                                categoryProduct_id: id,
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


            // delete product
            $('.delete-product').click(function(e){
                e.preventDefault();

                var id = $(this).data('id_product');
                var _token = $('input[name="_token"]').val();

                Swal.fire({
                    title: "Bạn có chắc chắn?",
                    text: "Bạn sẽ không thể khôi phục lại điều này!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Có, xóa nó đi!",
                    cancelButtonText: "Hủy"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('product.destroy') }}",
                            method: "POST",
                            data: {
                                product_id: id,
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


            // delete discount
            $('.delete-discount').click(function(e){
                e.preventDefault();

                var id = $(this).data('id_discount');
                var _token = $('input[name="_token"]').val();

                Swal.fire({
                    title: "Bạn có chắc chắn?",
                    text: "Bạn sẽ không thể khôi phục lại điều này!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Có, xóa nó đi!",
                    cancelButtonText: "Hủy"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('discount.destroy') }}",
                            method: "POST",
                            data: {
                                discount_id: id,
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


            // delete post
            $('.delete-post').click(function(e){
                e.preventDefault();

                var id = $(this).data('id_post');
                var _token = $('input[name="_token"]').val();

                Swal.fire({
                    title: "Bạn có chắc chắn?",
                    text: "Bạn sẽ không thể khôi phục lại điều này!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Có, xóa nó đi!",
                    cancelButtonText: "Hủy"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('post.destroy') }}",
                            method: "POST",
                            data: {
                                post_id: id,
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


            // delete category post
            $('.delete-categoryPost').click(function(e){
                e.preventDefault();

                var id = $(this).data('id_categoryPost');
                var _token = $('input[name="_token"]').val();

                Swal.fire({
                    title: "Bạn có chắc chắn?",
                    text: "Bạn sẽ không thể khôi phục lại điều này!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Có, xóa nó đi!",
                    cancelButtonText: "Hủy"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('post.destroy') }}",
                            method: "POST",
                            data: {
                                categoryPost_id: id,
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



            // delete staff
            $('.delete-staff').click(function(e){
                e.preventDefault();

                var id = $(this).data('id_staff');
                var _token = $('input[name="_token"]').val();

                Swal.fire({
                    title: "Bạn có chắc chắn?",
                    text: "Bạn sẽ không thể khôi phục lại điều này!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Có, xóa nó đi!",
                    cancelButtonText: "Hủy"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('staff.destroy') }}",
                            method: "POST",
                            data: {
                                staff_id: id,
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


            // delete user
            $('.delete-user').click(function(e){
                e.preventDefault();

                var id = $(this).data('id_user');
                var _token = $('input[name="_token"]').val();

                Swal.fire({
                    title: "Bạn có chắc chắn?",
                    text: "Bạn sẽ không thể khôi phục lại điều này!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Có, xóa nó đi!",
                    cancelButtonText: "Hủy"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('user.destroy') }}",
                            method: "POST",
                            data: {
                                user_id: id,
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


            // delete product code
            $('.delete-productCode').on('click', function(e) {
                e.preventDefault();
                var id = $(this).data('id_productcode');
                var _token = $('input[name="_token"]').val();

                Swal.fire({
                    title: "Bạn có chắc chắn?",
                    text: "Bạn sẽ không thể khôi phục lại điều này!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Có, xóa nó đi!",
                    cancelButtonText: "Hủy"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('productCode.destroy') }}",
                            method: "POST",
                            data: {
                                productCode_id: id,
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



        })

        // Enhanced header interactions
        document.addEventListener('DOMContentLoaded', function() {

































































</html></body>    </script>        }            }                notificationPanel.classList.remove('show');            if (notificationPanel) {            const notificationPanel = document.getElementById('notificationPanel');        function closeNotificationPanel() {        // Close notification panel function        });            }                });                    console.log('Searching for:', this.value);                    // Add search logic here                searchInput.addEventListener('input', function() {                });                    searchSuggestions.style.visibility = 'visible';                    searchSuggestions.style.opacity = '1';                searchInput.addEventListener('focus', function() {            if (searchInput) {                        const searchSuggestions = document.querySelector('.search-suggestions');            const searchInput = document.querySelector('.search-input');            // Search functionality            });                }                    notificationPanel.classList.remove('show');                    !e.target.closest('.notification-btn')) {                    !notificationPanel.contains(e.target) &&                 if (notificationPanel &&             document.addEventListener('click', function(e) {            // Close notification panel when clicking outside            }                });                    notificationPanel.classList.toggle('show');                    e.preventDefault();                notificationBtn.addEventListener('click', function(e) {            if (notificationBtn && notificationPanel) {                        const notificationPanel = document.getElementById('notificationPanel');            const notificationBtn = document.querySelector('.notification-btn');            // Notification panel toggle            updateTime();            setInterval(updateTime, 1000);                        }                }                    });                        minute: '2-digit'                        hour: '2-digit',                    timeElement.textContent = now.toLocaleTimeString('vi-VN', {                if (timeElement) {                const timeElement = document.getElementById('current-time');                const now = new Date();            function updateTime() {            // Update time every second
</body>

</html>
