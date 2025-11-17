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
                                <i class="fa fa-shopping-bag"></i>
                                <span>Order Management</span>
                            </div>
                            <h1 class="hero-title">Lịch Sử Đơn Hàng</h1>
                            <p class="hero-subtitle">
                                <i class="fa fa-clock me-2 mr-2"></i>
                                Theo dõi và quản lý tất cả đơn hàng của bạn
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="hero-stats-grid">
                            <div class="stat-card">
                                <div class="stat-icon">
                                    <i class="fa fa-th-large"></i>
                                </div>
                                <div class="stat-details">
                                    <span class="stat-number">{{ $orders->total() }}</span>
                                    <span class="stat-label">Tổng đơn</span>
                                </div>
                            </div>
                            <div class="stat-card">
                                <div class="stat-icon">
                                    <i class="fa fa-flag-checkered"></i>
                                </div>
                                <div class="stat-details">
                                    <span class="stat-number">{{ $orders->where('status', 2)->count() }}</span>
                                    <span class="stat-label">Chờ xác nhận</span>
                                </div>
                            </div>
                            <div class="stat-card">
                                <div class="stat-icon">
                                    <i class="fa fa-truck"></i>
                                </div>
                                <div class="stat-details">
                                    <span class="stat-number">{{ $orders->where('status', 3)->count() }}</span>
                                    <span class="stat-label">Đang giao</span>
                                </div>
                            </div>
                            <div class="stat-card">
                                <div class="stat-icon">
                                    <i class="fa fa-check-circle"></i>
                                </div>
                                <div class="stat-details">
                                    <span class="stat-number">{{ $orders->where('status', 4)->count() }}</span>
                                    <span class="stat-label">Hoàn thành</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-pattern"></div>
    </div>

    <div class="container my-5">
        @if (session('success'))
            <div class="alert alert-success alert-modern">
                <i class="fa fa-check-circle me-2"></i>
                {{ session('success') }}
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
                        <a class="account-nav-link active" href="{{ route('account.orderHistory') }}">
                            <span class="nav-icon">
                                <i class="fa fa-shopping-bag"></i>
                            </span>
                            <span class="nav-text">Đơn hàng</span>
                            <span class="nav-badge">{{ $orders->total() }}</span>
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
                <div class="content-card">
                    <div class="card-header-custom">
                        <div>
                            <h3 class="card-title-custom">
                                <i class="fa fa-shopping-bag me-2 mr-2"></i>Đơn Hàng Của Bạn
                            </h3>
                            <p class="card-subtitle-custom">Quản lý và theo dõi đơn hàng</p>
                        </div>
                        <div class="header-actions">
                            <div class="filter-dropdown">
                                <button class="btn btn-custom-outline btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    <i class="fa fa-filter me-2"></i>Lọc theo trạng thái
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Tất cả đơn hàng</a></li>
                                    <li><a class="dropdown-item" href="#">Chờ xác nhận</a></li>
                                    <li><a class="dropdown-item" href="#">Đang giao</a></li>
                                    <li><a class="dropdown-item" href="#">Đã giao</a></li>
                                    <li><a class="dropdown-item" href="#">Đã hủy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body-custom">
                        @forelse($orders as $order)
                        <div class="order-card">
                            <div class="order-header">
                                <div class="order-info">
                                    <h5 class="order-number">
                                        <i class="fa fa-receipt me-2"></i>
                                        Đơn hàng #{{ $order->id }}
                                    </h5>
                                    <p class="order-date">
                                        <i class="fa fa-calendar me-2"></i>
                                        {{ date_format($order->created_at, "d/m/Y - H:i") }}
                                    </p>
                                </div>
                                <div class="order-status">
                                    @if($order->status == 0)
                                        <span class="status-badge status-cancelled">
                                            <i class="fa fa-times-circle"></i>
                                            Đã hủy
                                        </span>
                                    @elseif($order->status == 1)
                                        <span class="status-badge status-returned">
                                            <i class="fa fa-undo"></i>
                                            Trả hàng
                                        </span>
                                    @elseif($order->status == 2)
                                        <span class="status-badge status-pending">
                                            <i class="fa fa-clock"></i>
                                            Chờ xác nhận
                                        </span>
                                    @elseif($order->status == 3)
                                        <span class="status-badge status-shipping">
                                            <i class="fa fa-truck"></i>
                                            Đang giao
                                        </span>
                                    @else
                                        <span class="status-badge status-delivered">
                                            <i class="fa fa-check-circle"></i>
                                            Đã giao
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="order-body">
                                <div class="order-details-grid">
                                    <div class="detail-item">
                                        <span class="detail-label">
                                            <i class="fa fa-credit-card me-2 mr-2"></i>
                                            Thanh toán:
                                        </span>
                                        <span class="detail-value">
                                            {{ $order->payment == 1 ? 'VNPay' : 'Tiền mặt' }}
                                        </span>
                                    </div>
                                    <div class="detail-item">
                                        <span class="detail-label">
                                            <i class="fa fa-money-bill-wave me-2"></i>
                                            Tổng tiền:
                                        </span>
                                        <span class="detail-value total-amount">
                                            {{ number_format($order->total_price) }}đ
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="order-actions">
                                <a href="{{ route('order.detail', $order) }}" class="btn btn-custom-outline btn-sm">
                                    <i class="fa fa-eye me-2 mr-2"></i>Xem chi tiết
                                </a>
                                
                                @if($order->status == 2)
                                    <form action="{{ route('order.cancel', $order) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-custom-danger btn-sm" onclick="return confirm('Bạn có chắc muốn hủy đơn hàng này?')">
                                            <i class="fa fa-times me-2"></i>Hủy đơn
                                        </button>
                                    </form>
                                @elseif($order->status == 3)
                                    <form action="{{ route('order.receive', $order) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-custom-success btn-sm" onclick="return confirm('Xác nhận đã nhận hàng?')">
                                            <i class="fa fa-check me-2"></i>Đã nhận hàng
                                        </button>
                                    </form>
                                    <form action="{{ route('order.return', $order) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-custom-warning btn-sm" onclick="return confirm('Bạn có chắc muốn trả hàng?')">
                                            <i class="fa fa-undo me-2"></i>Trả hàng
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                        @empty
                        <div class="empty-state">
                            <div class="empty-icon">
                                <i class="fa fa-shopping-bag"></i>
                            </div>
                            <h4>Chưa có đơn hàng nào</h4>
                            <p>Bắt đầu mua sắm và đơn hàng của bạn sẽ xuất hiện ở đây</p>
                            <a href="{{ route('shop') }}" class="btn btn-custom-success">
                                <i class="fa fa-shopping-cart me-2"></i>Mua sắm ngay
                            </a>
                        </div>
                        @endforelse

                        @if($orders->hasPages())
                        <div class="pagination-wrapper">
                            {{ $orders->links() }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Account Page Styles */
.account-page {
    background: #f8f9fa;
    min-height: 100vh;
}

/* Hero Section */
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
}

.hero-stats-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
}

.stat-card {
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 1rem;
    padding: 0.25rem;
    display: flex;
    align-items: center;
    gap: 1rem;
    transition: all 0.3s ease;
}

.stat-card:hover {
    background: rgba(255, 255, 255, 0.25);
    transform: translateY(-2px);
}

.stat-icon {
    width: 50px;
    height: 50px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 0.75rem;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
}

.stat-details {
    display: flex;
    flex-direction: column;
}

.stat-number {
    font-size: 1.75rem;
    font-weight: 700;
    line-height: 1;
}

.stat-label {
    font-size: 0.8125rem;
    opacity: 0.9;
    margin-top: 0.25rem;
}

/* Alert */
.alert-modern {
    border-radius: 0.75rem;
    border: none;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
    display: flex;
    align-items: center;
}

/* Sidebar */
.account-sidebar {
    position: sticky;
    top: 2rem;
}

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
    margin: 0;
}

/* Navigation */
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
    transition: all 0.3s ease;
    margin-bottom: 0.5rem;
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
    background: #fef3c7;
    color: #d97706;
    padding: 0.125rem 0.5rem;
    border-radius: 1rem;
    font-size: 0.75rem;
    font-weight: 600;
    margin-right: 0.5rem;
}

.account-nav-link.active .nav-badge {
    background: rgba(255, 255, 255, 0.2);
    color: white;
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
    background: #e5e7eb;
    margin: 0.5rem 0;
}

.logout-link {
    color: #ef4444;
}

.logout-link:hover {
    background: #fef2f2;
    color: #dc2626;
}

/* Content Card */
.content-card {
    background: white;
    border-radius: 1rem;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
    overflow: hidden;
}

.card-header-custom {
    padding: 1.5rem 2rem;
    border-bottom: 1px solid #e5e7eb;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
}

.card-title-custom {
    font-size: 1.5rem;
    font-weight: 600;
    color: #1f2937;
    margin: 0;
    display: flex;
    align-items: center;
}

.card-subtitle-custom {
    color: #6b7280;
    font-size: 0.875rem;
    margin: 0.25rem 0 0 0;
}

.card-body-custom {
    padding: 2rem;
}

/* Order Card */
.order-card {
    border: 2px solid #e5e7eb;
    border-radius: 0.75rem;
    padding: 0;
    margin-bottom: 1.5rem;
    transition: all 0.3s ease;
    overflow: hidden;
}

.order-card:hover {
    border-color: #34d399;
    box-shadow: 0 4px 12px rgba(52, 211, 153, 0.1);
}

.order-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    padding: 1.5rem;
    background: #f9fafb;
    border-bottom: 1px solid #e5e7eb;
}

.order-number {
    font-size: 1.125rem;
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 0.25rem;
}

.order-date {
    color: #6b7280;
    font-size: 0.875rem;
    margin: 0;
}

.status-badge {
    padding: 0.5rem 1rem;
    border-radius: 2rem;
    font-size: 0.8125rem;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

.status-pending { 
    background: #fef3c7; 
    color: #d97706; 
}

.status-shipping { 
    background: #dbeafe; 
    color: #2563eb; 
}

.status-delivered { 
    background: #d1fae5; 
    color: #059669; 
}

.status-cancelled { 
    background: #fee2e2; 
    color: #dc2626; 
}

.status-returned { 
    background: #f3e8ff; 
    color: #9333ea; 
}

.order-body {
    padding: 1.5rem;
}

.order-details-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
}

.detail-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.detail-label {
    color: #6b7280;
    font-size: 0.875rem;
    display: flex;
    align-items: center;
}

.detail-value {
    font-weight: 600;
    color: #1f2937;
}

.total-amount {
    font-size: 1.125rem;
    color: #059669;
}

.order-actions {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
    padding: 1.5rem;
    background: #f9fafb;
    border-top: 1px solid #e5e7eb;
}

/* Buttons */
.btn-custom-outline {
    background: white;
    color: #4b5563;
    border: 2px solid #e5e7eb;
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-custom-outline:hover {
    border-color: #34d399;
    color: #34d399;
    background: #f9fafb;
}

.btn-custom-success {
    background: linear-gradient(135deg, #34d399 0%, #10b981 100%);
    color: white;
    border: none;
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-custom-success:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(52, 211, 153, 0.4);
    color: white;
}

.btn-custom-danger {
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    color: white;
    border: none;
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-custom-danger:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
    color: white;
}

.btn-custom-warning {
    background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
    color: white;
    border: none;
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-custom-warning:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
    color: white;
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 4rem 2rem;
}

.empty-icon {
    font-size: 4rem;
    color: #cbd5e0;
    margin-bottom: 1.5rem;
}

.empty-state h4 {
    color: #1f2937;
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.empty-state p {
    color: #6b7280;
    margin-bottom: 1.5rem;
}

/* Pagination */
.pagination-wrapper {
    margin-top: 2rem;
    display: flex;
    justify-content: center;
}

/* Responsive */
@media (max-width: 991px) {
    .hero-title {
        font-size: 2rem;
    }
    
    .hero-stats-grid {
        margin-top: 2rem;
    }
    
    .account-sidebar {
        position: static;
    }
}

@media (max-width: 767px) {
    .hero-content {
        padding: 2rem 0 1.5rem;
    }
    
    .hero-title {
        font-size: 1.75rem;
    }
    
    .hero-stats-grid {
        grid-template-columns: 1fr;
    }
    
    .order-header {
        flex-direction: column;
        gap: 1rem;
    }
    
    .order-details-grid {
        grid-template-columns: 1fr;
    }
    
    .order-actions {
        flex-direction: column;
    }
    
    .order-actions .btn {
        width: 100%;
    }
    
    .card-header-custom {
        flex-direction: column;
        align-items: flex-start;
    }
}
</style>
@endsection