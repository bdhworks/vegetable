@extends('frontend.layout.fe')

@section('content')
<div class="account-page">
    <!-- Hero Section -->
    <div class="account-hero">
        <div class="container">
            <div class="hero-content">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="hero-text">
                            <div class="welcome-badge">
                                <i class="fa fa-heart"></i>
                                <span>Sản phẩm yêu thích</span>
                            </div>
                            <h1 class="hero-title">Danh sách yêu thích</h1>
                            <p class="hero-subtitle">
                                <i class="fa fa-info-circle me-2"></i>
                                Quản lý các sản phẩm bạn quan tâm
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="hero-icon-large">
                            <i class="fa fa-heart"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-pattern"></div>
    </div>

    <div class="container my-5">
        @if (session('success'))
            <div class="alert alert-success alert-modern alert-dismissible fade show">
                <div class="alert-icon">
                    <i class="fa fa-check-circle"></i>
                </div>
                <div class="alert-content">
                    <strong>Thành công!</strong>
                    <p>{{ session('success') }}</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row g-4">
            <!-- Sidebar -->
            <div class="col-lg-3">
                <div class="account-sidebar">
                    <!-- User Profile Card -->
                    <div class="profile-card">
                        <div class="profile-header">
                            <div class="profile-avatar-wrapper">
                                <img src="{{ Auth::user()->avatar ?? asset('assets/frontend/img/no-avatar.png') }}" 
                                     alt="Avatar" 
                                     class="profile-avatar">
                                <span class="avatar-badge">
                                    <i class="fa fa-check"></i>
                                </span>
                            </div>
                        </div>
                        <div class="profile-info">
                            <h4 class="profile-name">{{ Auth::user()->name }}</h4>
                            <p class="profile-email">{{ Auth::user()->email }}</p>
                            
                            <div class="profile-member-since">
                                <i class="fa fa-calendar-alt me-2"></i>
                                Thành viên từ {{ Auth::user()->created_at->format('M Y') }}
                            </div>
                        </div>
                    </div>

                    <!-- Navigation Menu -->
                    <nav class="account-nav">
                        <a class="account-nav-link" href="{{ route('account') }}">
                            <span class="nav-icon">
                                <i class="fa fa-tachometer"></i>
                            </span>
                            <span class="nav-text">Tổng quan</span>
                            <i class="fa fa-chevron-right nav-arrow"></i>
                        </a>
                        <a class="account-nav-link" href="{{ route('account.info') }}">
                            <span class="nav-icon">
                                <i class="fa fa-user-circle"></i>
                            </span>
                            <span class="nav-text">Thông tin</span>
                            <i class="fa fa-chevron-right nav-arrow"></i>
                        </a>
                        <a class="account-nav-link" href="{{ route('account.orderHistory') }}">
                            <span class="nav-icon">
                                <i class="fa fa-shopping-bag"></i>
                            </span>
                            <span class="nav-text">Đơn hàng</span>
                            <span class="nav-badge">{{ $orders->total() }}</span>
                            <i class="fa fa-chevron-right nav-arrow"></i>
                        </a>
                        <a class="account-nav-link active" href="{{ route('account.favorite') }}">
                            <span class="nav-icon">
                                <i class="fa fa-heart"></i>
                            </span>
                            <span class="nav-text">Yêu thích</span>
                            <span class="nav-badge-favorite">0</span>
                            <i class="fa fa-chevron-right nav-arrow"></i>
                        </a>
                        <a class="account-nav-link" href="{{ route('account.change-password') }}">
                            <span class="nav-icon">
                                <i class="fa fa-key"></i>
                            </span>
                            <span class="nav-text">Đổi mật khẩu</span>
                            <i class="fa fa-chevron-right nav-arrow"></i>
                        </a>
                        <div class="nav-divider"></div>
                        <a class="account-nav-link logout-link" href="{{ route('logout') }}" 
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span class="nav-icon">
                                <i class="fa fa-sign-out"></i>
                            </span>
                            <span class="nav-text">Đăng xuất</span>
                            <i class="fa fa-chevron-right nav-arrow"></i>
                        </a>
                    </nav>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-9">
                <!-- Filter and Sort Bar -->
                <div class="filter-bar mb-4">
                    <div class="filter-left">
                        <h5 class="filter-title">
                            <i class="fa fa-heart text-danger"></i>
                            <span id="favorite-count">0</span> sản phẩm yêu thích
                        </h5>
                    </div>
                    <div class="filter-right">
                        <select class="form-select-modern" id="sortSelect">
                            <option value="newest">Mới nhất</option>
                            <option value="oldest">Cũ nhất</option>
                            <option value="price-asc">Giá thấp đến cao</option>
                            <option value="price-desc">Giá cao đến thấp</option>
                            <option value="name-asc">Tên A-Z</option>
                            <option value="name-desc">Tên Z-A</option>
                        </select>
                        <button class="btn-view-mode active" data-view="grid" title="Lưới">
                            <i class="fa fa-th"></i>
                        </button>
                        <button class="btn-view-mode" data-view="list" title="Danh sách">
                            <i class="fa fa-list"></i>
                        </button>
                    </div>
                </div>

                <!-- Favorite Products Grid -->
                <div class="favorite-products-container" id="favoriteContainer">
                    <!-- Empty State (shown when no favorites) -->
                    <div class="empty-favorites" id="emptyState">
                        <div class="empty-icon">
                            <i class="fa fa-heart-o"></i>
                        </div>
                        <h3>Chưa có sản phẩm yêu thích</h3>
                        <p>Thêm sản phẩm vào danh sách yêu thích để theo dõi và mua sắm dễ dàng hơn</p>
                        <a href="{{ route('shop') }}" class="btn btn-shop-now">
                            <i class="fa fa-shopping-cart me-2"></i>
                            Khám phá sản phẩm
                        </a>
                    </div>

                    <!-- Products Grid (hidden initially) -->
                    <div class="products-grid view-grid" id="productsGrid" style="display: none;">
                        <!-- Sample Product Card (will be generated dynamically) -->
                        <div class="favorite-product-card">
                            <div class="product-badge-group">
                                <span class="badge-sale">-15%</span>
                                <span class="badge-new">Mới</span>
                            </div>
                            
                            <button class="btn-remove-favorite" title="Bỏ yêu thích">
                                <i class="fa fa-heart"></i>
                            </button>
                            
                            <div class="product-image">
                                <img src="{{ asset('assets/frontend/img/products/product-1.jpg') }}" alt="Product">
                                <div class="product-overlay">
                                    <button class="btn-quick-view">
                                        <i class="fa fa-eye"></i>
                                        <span>Xem nhanh</span>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="product-info">
                                <div class="product-category">Rau củ</div>
                                <h4 class="product-name">
                                    <a href="#">Cà chua bi hữu cơ</a>
                                </h4>
                                <div class="product-rating">
                                    <div class="stars">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                    <span class="rating-count">(128)</span>
                                </div>
                                <div class="product-price">
                                    <span class="price-current">45,000₫</span>
                                    <span class="price-original">53,000₫</span>
                                </div>
                                <div class="product-stock">
                                    <i class="fa fa-check-circle text-success"></i>
                                    <span>Còn hàng</span>
                                </div>
                            </div>
                            
                            <div class="product-actions">
                                <button class="btn btn-add-to-cart">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>Thêm vào giỏ</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="favorite-quick-actions" id="quickActions" style="display: none;">
                    <div class="actions-left">
                        <label class="checkbox-wrapper">
                            <input type="checkbox" id="selectAll">
                            <span>Chọn tất cả</span>
                        </label>
                        <span class="selected-count">
                            Đã chọn: <strong id="selectedCount">0</strong>
                        </span>
                    </div>
                    <div class="actions-right">
                        <button class="btn btn-add-selected" id="addSelectedToCart">
                            <i class="fa fa-shopping-cart me-2"></i>
                            Thêm vào giỏ hàng
                        </button>
                        <button class="btn btn-remove-selected" id="removeSelected">
                            <i class="fa fa-trash me-2"></i>
                            Xóa đã chọn
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Base Styles from Account Page */
.account-page {
    background: #f8f9fa;
    min-height: 100vh;
}

.account-hero {
    background: linear-gradient(135deg, #34d399 0%, #10b981 100%);
    padding: 0;
    color: white;
    margin-bottom: 2rem;
    position: relative;
    overflow: hidden;
}

.hero-content {
    padding: 3rem 0 2rem;
    position: relative;
    z-index: 2;
}

.hero-pattern {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: 
        radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
    z-index: 1;
}

.welcome-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    padding: 0.5rem 1rem;
    border-radius: 2rem;
    font-size: 0.875rem;
    font-weight: 500;
    margin-bottom: 1rem;
    border: 1px solid rgba(255, 255, 255, 0.3);
}

.hero-title {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 0.75rem;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.hero-subtitle {
    font-size: 1rem;
    opacity: 0.95;
    margin: 0;
    display: flex;
    align-items: center;
    font-weight: 400;
}

.hero-icon-large {
    width: 150px;
    height: 150px;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(20px);
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 4rem;
    color: white;
    margin: 0 auto;
    animation: heartbeat 2s ease-in-out infinite;
}

@keyframes heartbeat {
    0%, 100% {
        transform: scale(1);
    }
    10%, 30% {
        transform: scale(1.1);
    }
    20%, 40% {
        transform: scale(1);
    }
}

/* Profile Card - Same as account page */
.profile-card {
    background: white;
    border-radius: 1.25rem;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    margin-bottom: 1.5rem;
}

.profile-header {
    background: linear-gradient(135deg, #34d399 0%, #10b981 100%);
    padding: 2rem 2rem 3rem;
    text-align: center;
    position: relative;
}

.profile-avatar-wrapper {
    position: relative;
    display: inline-block;
}

.profile-avatar {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid white;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

.avatar-badge {
    position: absolute;
    bottom: 5px;
    right: 5px;
    width: 28px;
    height: 28px;
    background: #10b981;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 0.75rem;
    border: 3px solid white;
    box-shadow: 0 2px 8px rgba(0,0,0,0.15);
}

.profile-info {
    padding: 2rem;
    text-align: center;
}

.profile-name {
    font-size: 1.25rem;
    font-weight: 700;
    margin-bottom: 0.25rem;
    color: #1f2937;
}

.profile-email {
    color: #6b7280;
    font-size: 0.875rem;
    margin-bottom: 1.25rem;
}

.profile-member-since {
    font-size: 0.75rem;
    color: #9ca3af;
    padding-top: 1rem;
    border-top: 1px solid #e5e7eb;
}

/* Navigation - Same as account page */
.account-nav {
    background: white;
    border-radius: 1rem;
    padding: 1rem;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
}

.account-nav-link {
    display: flex;
    align-items: center;
    padding: 0.875rem 1rem;
    color: #4b5563;
    text-decoration: none;
    border-radius: 0.75rem;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    margin-bottom: 0.5rem;
    position: relative;
    overflow: hidden;
}

.account-nav-link::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 4px;
    background: #34d399;
    transform: scaleY(0);
    transition: transform 0.3s ease;
}

.account-nav-link:hover::before,
.account-nav-link.active::before {
    transform: scaleY(1);
}

.account-nav-link:hover {
    background: #f3f4f6;
    color: #34d399;
    transform: translateX(5px);
}

.account-nav-link.active {
    background: linear-gradient(135deg, #34d399 0%, #10b981 100%);
    color: white;
    box-shadow: 0 4px 12px rgba(52, 211, 153, 0.3);
}

.nav-icon {
    width: 35px;
    height: 35px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(52, 211, 153, 0.1);
    border-radius: 0.5rem;
    margin-right: 0.75rem;
    font-size: 1rem;
}

.account-nav-link.active .nav-icon {
    background: rgba(255, 255, 255, 0.2);
}

.nav-text {
    flex: 1;
    font-weight: 500;
}

.nav-badge {
    background: #fed7d7;
    color: #c53030;
    padding: 0.125rem 0.5rem;
    border-radius: 1rem;
    font-size: 0.75rem;
    font-weight: 600;
    margin-right: 0.5rem;
}

.nav-badge-favorite {
    background: #fecaca;
    color: #dc2626;
    padding: 0.125rem 0.5rem;
    border-radius: 1rem;
    font-size: 0.75rem;
    font-weight: 600;
    margin-right: 0.5rem;
}

.nav-arrow {
    opacity: 0;
    transition: opacity 0.3s ease;
    font-size: 0.75rem;
}

.account-nav-link:hover .nav-arrow,
.account-nav-link.active .nav-arrow {
    opacity: 1;
}

.nav-divider {
    height: 1px;
    background: #e2e8f0;
    margin: 0.5rem 0;
}

.logout-link {
    color: #e53e3e;
}

.logout-link:hover {
    background: #fff5f5;
    color: #c53030;
}

/* Alert Styles */
.alert-modern {
    border-radius: 0.75rem;
    border: none;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    padding: 1.25rem 1.5rem;
    margin-bottom: 1.5rem;
    animation: slideDown 0.3s ease-out;
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.alert-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    flex-shrink: 0;
}

.alert-success .alert-icon {
    background: rgba(16, 185, 129, 0.15);
    color: #10b981;
}

.alert-content {
    flex: 1;
}

.alert-content strong {
    display: block;
    margin-bottom: 0.25rem;
    font-size: 1rem;
}

.alert-content p {
    margin-bottom: 0;
    font-size: 0.875rem;
    opacity: 0.9;
}

/* Filter Bar */
.filter-bar {
    background: white;
    border-radius: 1rem;
    padding: 1.25rem 1.5rem;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
}

.filter-title {
    font-size: 1.125rem;
    font-weight: 700;
    color: #1f2937;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.filter-title i {
    font-size: 1.25rem;
}

.filter-right {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.form-select-modern {
    padding: 0.625rem 2.5rem 0.625rem 1rem;
    border: 2px solid #e5e7eb;
    border-radius: 0.5rem;
    font-size: 0.875rem;
    font-weight: 500;
    color: #4b5563;
    background-color: white;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right 0.75rem center;
    background-size: 16px 12px;
    transition: all 0.3s ease;
}

.form-select-modern:focus {
    outline: none;
    border-color: #34d399;
    box-shadow: 0 0 0 3px rgba(52, 211, 153, 0.1);
}

.btn-view-mode {
    width: 40px;
    height: 40px;
    border: 2px solid #e5e7eb;
    border-radius: 0.5rem;
    background: white;
    color: #6b7280;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-view-mode:hover {
    border-color: #34d399;
    color: #34d399;
}

.btn-view-mode.active {
    background: #34d399;
    border-color: #34d399;
    color: white;
}

/* Empty State */
.empty-favorites {
    text-align: center;
    padding: 4rem 2rem;
    background: white;
    border-radius: 1rem;
    box-shadow: 0 2px 12px rgba(0,0,0,0.06);
}

.empty-icon {
    width: 120px;
    height: 120px;
    background: linear-gradient(135deg, #fecaca, #fca5a5);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 4rem;
    color: white;
    margin: 0 auto 2rem;
    animation: pulse 2s ease-in-out infinite;
}

@keyframes pulse {
    0%, 100% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.05);
    }
}

.empty-favorites h3 {
    font-size: 1.75rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 0.75rem;
}

.empty-favorites p {
    font-size: 1rem;
    color: #6b7280;
    margin-bottom: 2rem;
    max-width: 500px;
    margin-left: auto;
    margin-right: auto;
}

.btn-shop-now {
    background: linear-gradient(135deg, #34d399 0%, #10b981 100%);
    color: white;
    border: none;
    padding: 0.875rem 2rem;
    border-radius: 0.75rem;
    font-weight: 600;
    font-size: 1rem;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(52, 211, 153, 0.3);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
}

.btn-shop-now:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(52, 211, 153, 0.4);
    color: white;
}

/* Products Grid */
.products-grid {
    display: grid;
    gap: 1.5rem;
}

.products-grid.view-grid {
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
}

.products-grid.view-list {
    grid-template-columns: 1fr;
}

/* Favorite Product Card */
.favorite-product-card {
    background: white;
    border-radius: 1rem;
    overflow: hidden;
    box-shadow: 0 2px 12px rgba(0,0,0,0.06);
    transition: all 0.3s ease;
    position: relative;
}

.favorite-product-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 24px rgba(0,0,0,0.12);
}

.product-badge-group {
    position: absolute;
    top: 1rem;
    left: 1rem;
    z-index: 2;
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.badge-sale {
    background: #ef4444;
    color: white;
    padding: 0.375rem 0.75rem;
    border-radius: 0.5rem;
    font-size: 0.75rem;
    font-weight: 700;
    display: inline-block;
}

.badge-new {
    background: #3b82f6;
    color: white;
    padding: 0.375rem 0.75rem;
    border-radius: 0.5rem;
    font-size: 0.75rem;
    font-weight: 700;
    display: inline-block;
}

.btn-remove-favorite {
    position: absolute;
    top: 1rem;
    right: 1rem;
    width: 40px;
    height: 40px;
    background: rgba(255, 255, 255, 0.95);
    border: none;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #ef4444;
    font-size: 1.25rem;
    cursor: pointer;
    z-index: 3;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.btn-remove-favorite:hover {
    transform: scale(1.1);
    background: #ef4444;
    color: white;
}

.product-image {
    position: relative;
    width: 100%;
    height: 250px;
    overflow: hidden;
}

.product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.favorite-product-card:hover .product-image img {
    transform: scale(1.1);
}

.product-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.favorite-product-card:hover .product-overlay {
    opacity: 1;
}

.btn-quick-view {
    background: white;
    color: #1f2937;
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 0.5rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-quick-view:hover {
    background: #34d399;
    color: white;
}

.product-info {
    padding: 1.25rem;
}

.product-category {
    font-size: 0.8125rem;
    color: #6b7280;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 0.5rem;
}

.product-name {
    font-size: 1.125rem;
    font-weight: 600;
    margin-bottom: 0.75rem;
}

.product-name a {
    color: #1f2937;
    text-decoration: none;
    transition: color 0.3s ease;
}

.product-name a:hover {
    color: #34d399;
}

.product-rating {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin-bottom: 0.75rem;
}

.stars {
    display: flex;
    gap: 0.125rem;
    color: #fbbf24;
}

.rating-count {
    font-size: 0.8125rem;
    color: #6b7280;
}

.product-price {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 0.75rem;
}

.price-current {
    font-size: 1.5rem;
    font-weight: 700;
    color: #34d399;
}

.price-original {
    font-size: 1rem;
    color: #9ca3af;
    text-decoration: line-through;
}

.product-stock {
    display: flex;
    align-items: center;
    gap: 0.375rem;
    font-size: 0.875rem;
    color: #10b981;
    margin-bottom: 1rem;
}

.product-actions {
    padding: 0 1.25rem 1.25rem;
}

.btn-add-to-cart {
    width: 100%;
    background: linear-gradient(135deg, #34d399 0%, #10b981 100%);
    color: white;
    border: none;
    padding: 0.875rem;
    border-radius: 0.75rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-add-to-cart:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(52, 211, 153, 0.4);
}

/* Quick Actions */
.favorite-quick-actions {
    background: white;
    border-radius: 1rem;
    padding: 1.25rem 1.5rem;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
    margin-top: 1.5rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
}

.actions-left {
    display: flex;
    align-items: center;
    gap: 1.5rem;
}

.checkbox-wrapper {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    cursor: pointer;
    font-weight: 500;
    color: #4b5563;
}

.checkbox-wrapper input[type="checkbox"] {
    width: 18px;
    height: 18px;
    cursor: pointer;
}

.selected-count {
    font-size: 0.9375rem;
    color: #6b7280;
}

.selected-count strong {
    color: #34d399;
}

.actions-right {
    display: flex;
    gap: 0.75rem;
}

.btn-add-selected,
.btn-remove-selected {
    padding: 0.75rem 1.5rem;
    border-radius: 0.5rem;
    font-weight: 600;
    font-size: 0.9375rem;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
}

.btn-add-selected {
    background: linear-gradient(135deg, #34d399 0%, #10b981 100%);
    color: white;
}

.btn-add-selected:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(52, 211, 153, 0.4);
}

.btn-remove-selected {
    background: #f3f4f6;
    color: #ef4444;
}

.btn-remove-selected:hover {
    background: #ef4444;
    color: white;
}

/* List View Styles */
.products-grid.view-list .favorite-product-card {
    display: flex;
    flex-direction: row;
}

.products-grid.view-list .product-image {
    width: 250px;
    height: 200px;
    flex-shrink: 0;
}

.products-grid.view-list .product-info {
    flex: 1;
}

.products-grid.view-list .product-actions {
    padding: 1.25rem;
    display: flex;
    align-items: flex-end;
}

.products-grid.view-list .btn-add-to-cart {
    min-width: 180px;
}

/* Responsive */
@media (max-width: 992px) {
    .products-grid.view-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .hero-icon-large {
        width: 100px;
        height: 100px;
        font-size: 3rem;
    }
    
    .hero-title {
        font-size: 2rem;
    }
    
    .filter-bar {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .filter-right {
        width: 100%;
        justify-content: space-between;
    }
    
    .form-select-modern {
        flex: 1;
    }
    
    .products-grid.view-list .favorite-product-card {
        flex-direction: column;
    }
    
    .products-grid.view-list .product-image {
        width: 100%;
        height: 250px;
    }
    
    .products-grid.view-list .btn-add-to-cart {
        width: 100%;
    }
    
    .favorite-quick-actions {
        flex-direction: column;
        align-items: stretch;
    }
    
    .actions-left,
    .actions-right {
        width: 100%;
        flex-wrap: wrap;
    }
}

@media (max-width: 576px) {
    .products-grid.view-grid {
        grid-template-columns: 1fr;
    }
    
    .hero-content {
        padding: 2rem 0 1.5rem;
    }
}
</style>

<script>
// View mode toggle
document.querySelectorAll('.btn-view-mode').forEach(btn => {
    btn.addEventListener('click', function() {
        document.querySelectorAll('.btn-view-mode').forEach(b => b.classList.remove('active'));
        this.classList.add('active');
        
        const view = this.getAttribute('data-view');
        const grid = document.getElementById('productsGrid');
        
        grid.classList.remove('view-grid', 'view-list');
        grid.classList.add(`view-${view}`);
    });
});

// Select all checkbox
document.getElementById('selectAll')?.addEventListener('change', function() {
    const checkboxes = document.querySelectorAll('.product-checkbox');
    checkboxes.forEach(cb => cb.checked = this.checked);
    updateSelectedCount();
});

// Remove favorite
document.querySelectorAll('.btn-remove-favorite').forEach(btn => {
    btn.addEventListener('click', function(e) {
        e.stopPropagation();
        if (confirm('Bạn có chắc muốn xóa sản phẩm này khỏi danh sách yêu thích?')) {
            this.closest('.favorite-product-card').remove();
            updateFavoriteCount();
        }
    });
});

// Update favorite count
function updateFavoriteCount() {
    const count = document.querySelectorAll('.favorite-product-card').length;
    document.getElementById('favorite-count').textContent = count;
    
    if (count === 0) {
        document.getElementById('emptyState').style.display = 'block';
        document.getElementById('productsGrid').style.display = 'none';
        document.getElementById('quickActions').style.display = 'none';
    }
}

// Update selected count
function updateSelectedCount() {
    const selected = document.querySelectorAll('.product-checkbox:checked').length;
    document.getElementById('selectedCount').textContent = selected;
}

// Auto-hide alerts
document.querySelectorAll('.alert-dismissible').forEach(alert => {
    setTimeout(() => {
        const bsAlert = new bootstrap.Alert(alert);
        bsAlert.close();
    }, 5000);
});

// Initialize
document.addEventListener('DOMContentLoaded', function() {
    updateFavoriteCount();
});
</script>

@endsection