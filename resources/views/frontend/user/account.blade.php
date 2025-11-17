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
                                <i class="fa fa-hand-paper"></i>
                                <span>Chào mừng trở lại</span>
                            </div>
                            <h1 class="hero-title">{{ Auth::user()->name }}</h1>
                            <p class="hero-subtitle">
                                <i class="fa fa-calendar-alt me-2"></i>
                                Hôm nay là {{ now()->locale('vi')->isoFormat('dddd, D MMMM YYYY') }}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="quick-actions-hero">
                            <a href="{{ route('shop') }}" class="quick-action-btn">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Mua sắm ngay</span>
                            </a>
                            <a href="{{ route('account.orderHistory') }}" class="quick-action-btn">
                                <i class="fa fa-history"></i>
                                <span>Đơn hàng</span>
                            </a>
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
                            <div class="profile-stats">
                                <div class="profile-stat-item">
                                    <span class="stat-value">0</span>
                                    <span class="stat-text">Đơn hàng</span>
                                </div>
                                <div class="profile-stat-divider"></div>
                                <div class="profile-stat-item">
                                    <span class="stat-value">0</span>
                                    <span class="stat-text">Điểm</span>
                                </div>
                            </div>
                            <div class="profile-member-since">
                                <i class="fa fa-calendar-alt me-2"></i>
                                Thành viên từ {{ Auth::user()->created_at->format('M Y') }}
                            </div>
                        </div>
                    </div>

                    <!-- Navigation Menu -->
                    <nav class="account-nav">
                        <a class="account-nav-link active" href="{{ route('account') }}">
                            <span class="nav-icon">
                                <i class="fa fa-tachometer"></i>
                            </span>
                            <span class="nav-text">Tổng quan</span>
                            <i class="fa fa-chevron-right nav-arrow"></i>
                        </a>
                        <a class="account-nav-link" href="{{ route('account.orderHistory') }}">
                            <span class="nav-icon">
                                <i class="fa fa-shopping-bag"></i>
                            </span>
                            <span class="nav-text">Đơn hàng</span>
                            <span class="nav-badge">0</span>
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

            <!-- Main Content - Dashboard -->
            <div class="col-lg-9">
                <!-- Statistics Cards -->
                <div class="row g-3 mb-4">
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-stat-card stat-primary">
                            <div class="stat-icon-wrapper">
                                <i class="fa fa-shopping-bag"></i>
                            </div>
                            <div class="stat-content">
                                <span class="stat-label">Tổng đơn hàng</span>
                                <h3 class="stat-value">0</h3>
                                <span class="stat-trend positive">
                                    <i class="fa fa-arrow-up"></i> +0%
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-stat-card stat-success">
                            <div class="stat-icon-wrapper">
                                <i class="fa fa-check-circle"></i>
                            </div>
                            <div class="stat-content">
                                <span class="stat-label">Hoàn thành</span>
                                <h3 class="stat-value">0</h3>
                                <span class="stat-trend positive">
                                    <i class="fa fa-arrow-up"></i> +0%
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-stat-card stat-warning">
                            <div class="stat-icon-wrapper">
                                <i class="fa fa-clock-o"></i>
                            </div>
                            <div class="stat-content">
                                <span class="stat-label">Đang xử lý</span>
                                <h3 class="stat-value">0</h3>
                                <span class="stat-trend neutral">
                                    <i class="fa fa-minus"></i> 0%
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-stat-card stat-info">
                            <div class="stat-icon-wrapper">
                                <i class="fa fa-google-wallet"></i>
                            </div>
                            <div class="stat-content">
                                <span class="stat-label">Tổng chi tiêu</span>
                                <h3 class="stat-value">0đ</h3>
                                <span class="stat-trend positive">
                                    <i class="fa fa-arrow-up"></i> +0%
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Orders & Quick Actions -->
                <div class="row g-4 mb-4">
                    <!-- Recent Orders -->
                    <div class="col-lg-8">
                        <div class="content-card">
                            <div class="card-header-custom d-flex justify-content-between align-items-center">
                                <div>
                                    <h3 class="card-title-custom">
                                        <i class="fa fa-history me-2 mr-2"></i>Đơn hàng gần đây
                                    </h3>
                                    <p class="card-subtitle-custom">5 đơn hàng mới nhất</p>
                                </div>
                                <a href="{{ route('account.orderHistory') }}" class="btn btn-custom-outline btn-sm">
                                    Xem tất cả <i class="fa fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                            <div class="card-body-custom p-0">
                                <div class="recent-orders-list">
                                    @forelse([] as $order)
                                    <div class="order-item-compact">
                                        <div class="order-icon">
                                            <i class="fa fa-box"></i>
                                        </div>
                                        <div class="order-info">
                                            <h6>Đơn hàng #{{ $order->id }}</h6>
                                            <p>{{ $order->created_at->diffForHumans() }}</p>
                                        </div>
                                        <div class="order-status">
                                            <span class="badge bg-success">Hoàn thành</span>
                                        </div>
                                        <div class="order-amount">
                                            {{ number_format($order->total_price) }}đ
                                        </div>
                                    </div>
                                    @empty
                                    <div class="empty-state-compact">
                                        <div class="empty-icon-compact">
                                            <i class="fa fa-shopping-bag"></i>
                                        </div>
                                        <h5>Chưa có đơn hàng nào</h5>
                                        <p>Bắt đầu mua sắm để xem đơn hàng tại đây</p>
                                        <a href="{{ route('shop') }}" class="btn btn-custom-success btn-sm">
                                            <i class="fa fa-shopping-cart me-2"></i>Mua sắm ngay
                                        </a>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="col-lg-4">
                        <div class="content-card">
                            <div class="card-header-custom">
                                <h3 class="card-title-custom">
                                    <i class="fa fa-bolt me-2 mr-2"></i>Thao tác nhanh
                                </h3>
                            </div>
                            <div class="card-body-custom">
                                <div class="quick-actions-grid">
                                    <a href="{{ route('shop') }}" class="quick-action-item">
                                        <div class="action-icon" style="background: linear-gradient(135deg, #34d399, #10b981);">
                                            <i class="fa fa-shopping-cart"></i>
                                        </div>
                                        <span>Mua sắm</span>
                                    </a>
                                    <a href="{{ route('account.orderHistory') }}" class="quick-action-item">
                                        <div class="action-icon" style="background: linear-gradient(135deg, #60a5fa, #3b82f6);">
                                            <i class="fa fa-list"></i>
                                        </div>
                                        <span>Đơn hàng</span>
                                    </a>
                                    <a href="#" class="quick-action-item">
                                        <div class="action-icon" style="background: linear-gradient(135deg, #f472b6, #ec4899);">
                                            <i class="fa fa-heart"></i>
                                        </div>
                                        <span>Yêu thích</span>
                                    </a>
                                    <a href="#" class="quick-action-item">
                                        <div class="action-icon" style="background: linear-gradient(135deg, #fbbf24, #f59e0b);">
                                            <i class="fa fa-gift"></i>
                                        </div>
                                        <span>Ưu đãi</span>
                                    </a>
                                    <a href="{{ route('account.change-password') }}" class="quick-action-item">
                                        <div class="action-icon" style="background: linear-gradient(135deg, #a78bfa, #8b5cf6);">
                                            <i class="fa fa-key"></i>
                                        </div>
                                        <span>Bảo mật</span>
                                    </a>
                                    <a href="{{ route('contact') }}" class="quick-action-item">
                                        <div class="action-icon" style="background: linear-gradient(135deg, #fb923c, #f97316);">
                                            <i class="fa fa-headset"></i>
                                        </div>
                                        <span>Hỗ trợ</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Account Info & Activity -->
                <div class="row g-4">
                    <!-- Account Information -->
                    <div class="col-lg-6">
                        <div class="content-card">
                            <div class="card-header-custom d-flex justify-content-between align-items-start">
                                <div>
                                    <h3 class="card-title-custom">
                                        <i class="fa fa-user-circle me-2 mr-2"></i>Thông tin tài khoản
                                    </h3>
                                    <p class="card-subtitle-custom">Chi tiết tài khoản của bạn</p>
                                </div>
                                <a href="#" class="btn btn-custom-outline btn-sm" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                                    <i class="fa fa-edit"></i> Chỉnh sửa
                                </a>
                            </div>
                            <div class="card-body-custom">
                                <div class="account-info-list">
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <div class="info-details">
                                            <span class="info-label">Họ và tên</span>
                                            <span class="info-value">{{ Auth::user()->name }}</span>
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <div class="info-details">
                                            <span class="info-label">Email</span>
                                            <span class="info-value">{{ Auth::user()->email }}</span>
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <div class="info-details">
                                            <span class="info-label">Số điện thoại</span>
                                            <span class="info-value">{{ Auth::user()->phone ?? 'Chưa cập nhật' }}</span>
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="fa fa-map-marker-alt"></i>
                                        </div>
                                        <div class="info-details">
                                            <span class="info-label">Địa chỉ</span>
                                            <span class="info-value">{{ Str::limit(Auth::user()->address ?? 'Chưa cập nhật', 50) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div class="col-lg-6">
                        <div class="content-card">
                            <div class="card-header-custom">
                                <h3 class="card-title-custom">
                                    <i class="fa fa-clock me-2 mr-2"></i>Hoạt động gần đây
                                </h3>
                            </div>
                            <div class="card-body-custom">
                                <div class="activity-timeline">
                                    <div class="activity-item">
                                        <div class="activity-icon">
                                            <i class="fa fa-user-check"></i>
                                        </div>
                                        <div class="activity-content">
                                            <p class="activity-text">Bạn đã đăng nhập vào hệ thống</p>
                                            <span class="activity-time">
                                                <i class="fa fa-clock me-1"></i>Vừa xong
                                            </span>
                                        </div>
                                    </div>
                                    <div class="activity-item">
                                        <div class="activity-icon">
                                            <i class="fa fa-user-plus"></i>
                                        </div>
                                        <div class="activity-content">
                                            <p class="activity-text">Tài khoản được tạo thành công</p>
                                            <span class="activity-time">
                                                <i class="fa fa-clock me-1"></i>{{ Auth::user()->created_at->diffForHumans() }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fa fa-edit me-2"></i>Chỉnh sửa thông tin
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('account.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <!-- Avatar Upload -->
                    <div class="avatar-upload-section mb-4">
                        <div class="current-avatar">
                            <img src="{{ Auth::user()->avatar ?? asset('assets/frontend/img/no-avatar.png') }}" 
                                 alt="Avatar" id="avatarPreview">
                        </div>
                        <div class="avatar-upload-info">
                            <h5>Ảnh đại diện</h5>
                            <p class="text-muted small">JPG, PNG hoặc GIF. Kích thước tối đa 2MB</p>
                            <label for="avatarInput" class="btn btn-custom-primary btn-sm">
                                <i class="fa fa-upload me-2"></i>Tải ảnh lên
                            </label>
                            <input type="file" id="avatarInput" name="avatar" accept="image/*" class="d-none">
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-group-custom">
                                <label class="form-label-custom">
                                    <i class="fa fa-user text-muted me-2"></i>Họ và tên
                                </label>
                                <div class="input-group-custom">
                                    <i class="fa fa-user input-icon"></i>
                                    <input type="text" class="form-control-custom" name="name" 
                                           value="{{ Auth::user()->name }}" 
                                           placeholder="Nhập họ và tên"
                                           required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group-custom">
                                <label class="form-label-custom">
                                    <i class="fa fa-envelope text-muted me-2"></i>Địa chỉ Email
                                </label>
                                <div class="input-group-custom">
                                    <i class="fa fa-envelope input-icon"></i>
                                    <input type="email" class="form-control-custom" name="email" 
                                           value="{{ Auth::user()->email }}" 
                                           placeholder="example@email.com"
                                           required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group-custom">
                                <label class="form-label-custom">
                                    <i class="fa fa-phone text-muted me-2"></i>Số điện thoại
                                </label>
                                <div class="input-group-custom">
                                    <i class="fa fa-phone input-icon"></i>
                                    <input type="tel" class="form-control-custom" name="phone" 
                                           value="{{ Auth::user()->phone ?? '' }}"
                                           placeholder="0xxx xxx xxx">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group-custom">
                                <label class="form-label-custom">
                                    <i class="fa fa-birthday-cake text-muted me-2"></i>Ngày sinh
                                </label>
                                <div class="input-group-custom">
                                    <i class="fa fa-calendar input-icon"></i>
                                    <input type="date" class="form-control-custom" name="birthday" 
                                           value="{{ Auth::user()->birthday ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group-custom">
                                <label class="form-label-custom">
                                    <i class="fa fa-map-marker-alt text-muted me-2"></i>Địa chỉ
                                </label>
                                <div class="input-group-custom">
                                    <i class="fa fa-map-marker-alt input-icon"></i>
                                    <textarea class="form-control-custom" name="address" rows="3" 
                                              placeholder="Nhập địa chỉ của bạn">{{ Auth::user()->address ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-custom-outline" data-bs-dismiss="modal">
                        <i class="fa fa-times me-2"></i>Hủy
                    </button>
                    <button type="submit" class="btn btn-custom-success">
                        <i class="fa fa-save me-2"></i>Lưu thay đổi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
/* Account Page Styles */
.account-page {
    background: #f8f9fa;
    min-height: 100vh;
}

/* Hero Section - Redesigned */
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
    padding: 1.25rem;
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
    color: white;
    line-height: 1;
}

.stat-label {
    font-size: 0.8125rem;
    opacity: 0.9;
    margin-top: 0.25rem;
}

/* Profile Card - Redesigned */
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

.profile-stats {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 1.5rem;
    padding: 1rem 0;
    margin-bottom: 1rem;
}

.profile-stat-item {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.stat-value {
    font-size: 1.5rem;
    font-weight: 700;
    color: #34d399;
    line-height: 1;
}

.stat-text {
    font-size: 0.75rem;
    color: #6b7280;
    margin-top: 0.25rem;
}

.profile-stat-divider {
    width: 1px;
    height: 30px;
    background: #e5e7eb;
}

.profile-member-since {
    font-size: 0.75rem;
    color: #9ca3af;
    padding-top: 1rem;
    border-top: 1px solid #e5e7eb;
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
    margin-right: 10px !important;
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

/* Content Cards */
.content-card {
    background: white;
    border-radius: 1rem;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
    overflow: hidden;
    margin-bottom: 1.5rem;
    transition: all 0.3s ease;
}

.content-card:hover {
    box-shadow: 0 4px 20px rgba(0,0,0,0.12);
}

.card-header-custom {
    padding: 1.5rem 2rem;
    border-bottom: 2px solid #f7fafc;
    background: linear-gradient(to right, #ffffff, #f9fafb);
}

.card-title-custom {
    font-size: 1.5rem;
    font-weight: 700;
    color: #1f2937;
    margin: 0;
    display: flex;
    align-items: center;
}

.card-title-custom i {
    font-size: 1.25rem;
}

.card-subtitle-custom {
    color: #6b7280;
    font-size: 0.875rem;
    margin: 0.5rem 0 0 0;
    font-weight: 500;
}

.card-body-custom {
    padding: 2rem;
}

/* Enhanced Alert Styles */
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

.alert-danger .alert-icon {
    background: rgba(239, 68, 68, 0.15);
    color: #ef4444;
}

.alert-content {
    flex: 1;
}

.alert-content strong {
    display: block;
    margin-bottom: 0.25rem;
    font-size: 1rem;
}

.alert-content p,
.alert-content ul {
    margin-bottom: 0;
    font-size: 0.875rem;
    opacity: 0.9;
}

.alert-content ul {
    padding-left: 1.25rem;
}

.btn-close {
    flex-shrink: 0;
}

/* Enhanced Hero Section */
.stat-number {
    font-size: 1.75rem;
    font-weight: 700;
    color: white;
    line-height: 1;
}

/* Enhanced Form Labels */
.form-label-custom {
    font-weight: 600;
    color: #4a5568;
    margin-bottom: 0.5rem;
    font-size: 0.875rem;
    display: flex;
    align-items: center;
}

.form-label-custom i {
    font-size: 0.875rem;
}

/* Enhanced Input Placeholders */
.form-control-custom::placeholder {
    color: #9ca3af;
    opacity: 1;
}

/* Enhanced Button Styles */
.btn {
    font-weight: 600;
    letter-spacing: 0.025em;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.btn i {
    transition: transform 0.3s ease;
}

.btn:hover i {
    transform: translateX(2px);
}

.btn-custom-success:active {
    transform: scale(0.98);
}

.btn-custom-outline:hover {
    border-color: #cbd5e0;
    background: #f7fafc;
    transform: translateY(-1px);
}

/* Enhanced Avatar Upload */
.avatar-upload-section {
    display: flex;
    gap: 1.5rem;
    align-items: center;
    padding: 1.5rem;
    background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
    border-radius: 0.75rem;
    border: 2px dashed #e2e8f0;
    transition: all 0.3s ease;
}

.avatar-upload-section:hover {
    border-color: #34d399;
    background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
}

.current-avatar {
    position: relative;
}

.current-avatar img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid white;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    transition: all 0.3s ease;
}

.current-avatar:hover img {
    transform: scale(1.05);
    box-shadow: 0 6px 16px rgba(52, 211, 153, 0.3);
}

.avatar-upload-info h5 {
    margin-bottom: 0.25rem;
    font-size: 1.125rem;
    color: #2d3748;
    font-weight: 700;
}

.avatar-upload-info .small {
    font-size: 0.8125rem;
}

/* Enhanced Card Styles */
.content-card {
    background: white;
    border-radius: 1rem;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
    overflow: hidden;
    margin-bottom: 1.5rem;
    transition: all 0.3s ease;
}

.content-card:hover {
    box-shadow: 0 4px 20px rgba(0,0,0,0.12);
}

.card-header-custom {
    padding: 1.5rem 2rem;
    border-bottom: 2px solid #f7fafc;
    background: linear-gradient(to right, #ffffff, #f9fafb);
}

.card-title-custom {
    font-size: 1.5rem;
    font-weight: 700;
    color: #1f2937;
    margin: 0;
    display: flex;
    align-items: center;
}

.card-title-custom i {
    font-size: 1.25rem;
}

.card-subtitle-custom {
    color: #6b7280;
    font-size: 0.875rem;
    margin: 0.5rem 0 0 0;
    font-weight: 500;
}

/* Dashboard Statistics Cards */
.dashboard-stat-card {
    background: white;
    border-radius: 1rem;
    padding: 0.5rem;
    display: flex;
    align-items: center;
    gap: 1rem;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    transition: all 0.3s ease;
    border-left: 4px solid;
    position: relative;
    overflow: hidden;
}

/* .dashboard-stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 100px;
    height: 100px;
    opacity: 0.1;
    border-radius: 50%;
} */

.dashboard-stat-card.stat-primary {
    border-left-color: #34d399;
}

.dashboard-stat-card.stat-primary::before {
    background: #34d399;
}

.dashboard-stat-card.stat-success {
    border-left-color: #10b981;
}

.dashboard-stat-card.stat-success::before {
    background: #10b981;
}

.dashboard-stat-card.stat-warning {
    border-left-color: #f59e0b;
}

.dashboard-stat-card.stat-warning::before {
    background: #f59e0b;
}

.dashboard-stat-card.stat-info {
    border-left-color: #3b82f6;
}

.dashboard-stat-card.stat-info::before {
    background: #3b82f6;
}

.dashboard-stat-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 6px 20px rgba(0,0,0,0.12);
}

.stat-icon-wrapper {
    width: 60px;
    height: 60px;
    border-radius: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.75rem;
    flex-shrink: 0;
}

.stat-primary .stat-icon-wrapper {
    background: linear-gradient(135deg, #34d399, #10b981);
    color: white;
}

.stat-success .stat-icon-wrapper {
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
}

.stat-warning .stat-icon-wrapper {
    background: linear-gradient(135deg, #fbbf24, #f59e0b);
    color: white;
}

.stat-info .stat-icon-wrapper {
    background: linear-gradient(135deg, #60a5fa, #3b82f6);
    color: white;
}

.stat-content {
    flex: 1;
}

.stat-label {
    display: block;
    font-size: 0.8125rem;
    color: #6b7280;
    margin-bottom: 0.25rem;
    font-weight: 500;
}

.stat-content .stat-value {
    font-size: 1.875rem;
    font-weight: 700;
    color: #1f2937;
    line-height: 1;
    margin-bottom: 0.5rem;
}

.stat-trend {
    font-size: 0.75rem;
    font-weight: 600;
    padding: 0.25rem 0.5rem;
    border-radius: 0.25rem;
}

.stat-trend.positive {
    background: #d1fae5;
    color: #059669;
}

.stat-trend.negative {
    background: #fee2e2;
    color: #dc2626;
}

.stat-trend.neutral {
    background: #f3f4f6;
    color: #6b7280;
}

/* Quick Actions Hero */
.quick-actions-hero {
    display: flex;
    gap: 0.75rem;
    justify-content: flex-end;
}

.quick-action-btn {
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 0.75rem;
    padding: 0.875rem 1.25rem;
    color: white;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: 600;
    font-size: 0.875rem;
    transition: all 0.3s ease;
}

.quick-action-btn:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: translateY(-2px);
    color: white;
}

/* Recent Orders List */
.recent-orders-list {
    display: flex;
    flex-direction: column;
}

.order-item-compact {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1.25rem 1.5rem;
    border-bottom: 1px solid #f3f4f6;
    transition: all 0.3s ease;
}

.order-item-compact:last-child {
    border-bottom: none;
}

.order-item-compact:hover {
    background: #f9fafb;
}

.order-icon {
    width: 45px;
    height: 45px;
    background: linear-gradient(135deg, #34d399, #10b981);
    border-radius: 0.75rem;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.125rem;
    flex-shrink: 0;
}

.order-info {
    flex: 1;
}

.order-info h6 {
    font-size: 0.9375rem;
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 0.25rem;
}

.order-info p {
    font-size: 0.8125rem;
    color: #6b7280;
    margin: 0;
}

.order-amount {
    font-size: 1.125rem;
    font-weight: 700;
    color: #34d399;
}

.empty-state-compact {
    text-align: center;
    padding: 3rem 2rem;
}

.empty-icon-compact {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    color: #9ca3af;
    margin: 0 auto 1rem;
}

.empty-state-compact h5 {
    font-size: 1.125rem;
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 0.5rem;
}

.empty-state-compact p {
    color: #6b7280;
    margin-bottom: 1.5rem;
}

/* Quick Actions Grid */
.quick-actions-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
}

.quick-action-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.75rem;
    padding: 1.25rem;
    background: #f9fafb;
    border-radius: 0.75rem;
    text-decoration: none;
    color: #1f2937;
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.quick-action-item:hover {
    background: white;
    border-color: #34d399;
    transform: translateY(-4px);
    box-shadow: 0 4px 12px rgba(52, 211, 153, 0.2);
}

.quick-action-item .action-icon {
    width: 50px;
    height: 50px;
    border-radius: 0.75rem;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.25rem;
}

.quick-action-item span {
    font-size: 0.875rem;
    font-weight: 600;
}

/* Account Info List */
.account-info-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.info-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem;
    background: #f9fafb;
    border-radius: 0.75rem;
    transition: all 0.3s ease;
}

.info-item:hover {
    background: #f3f4f6;
}

.info-item .info-icon {
    width: 45px;
    height: 45px;
    background: linear-gradient(135deg, #34d399, #10b981);
    border-radius: 0.75rem;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.125rem;
    flex-shrink: 0;
}

.info-details {
    flex: 1;
    display: flex;
    flex-direction: column;
}

.info-label {
    font-size: 0.75rem;
    color: #6b7280;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.info-value {
    font-size: 0.9375rem;
    color: #1f2937;
    font-weight: 600;
    margin-top: 0.25rem;
}

/* Activity Timeline */
.activity-timeline {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.activity-item {
    display: flex;
    gap: 1rem;
    position: relative;
}

.activity-item:not(:last-child)::after {
    content: '';
    position: absolute;
    left: 22px;
    top: 45px;
    width: 2px;
    height: calc(100% - 10px);
    background: #e5e7eb;
}

.activity-item .activity-icon {
    width: 45px;
    height: 45px;
    background: linear-gradient(135deg, #34d399, #10b981);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.125rem;
    flex-shrink: 0;
    z-index: 1;
}

.activity-content {
    flex: 1;
    padding-top: 0.5rem;
}

.activity-text {
    font-size: 0.9375rem;
    color: #1f2937;
    font-weight: 500;
    margin-bottom: 0.5rem;
}

.activity-time {
    font-size: 0.8125rem;
    color: #6b7280;
    display: flex;
    align-items: center;
}

/* Modal Enhancements */
.modal-content {
    border-radius: 1rem;
    border: none;
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
}

.modal-header {
    border-bottom: 2px solid #f3f4f6;
    padding: 1.5rem 2rem;
}

.modal-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: #1f2937;
}

.modal-body {
    padding: 2rem;
}

.modal-footer {
    border-top: 2px solid #f3f4f6;
    padding: 1.5rem 2rem;
}

/* Responsive Dashboard */
@media (max-width: 768px) {
    .dashboard-stat-card {
        flex-direction: column;
        text-align: center;
    }
    
    .quick-actions-hero {
        flex-direction: column;
        width: 100%;
    }
    
    .quick-action-btn {
        width: 100%;
        justify-content: center;
    }
    
    .quick-actions-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

@media (max-width: 576px) {
    .quick-actions-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}
</style>

<script>
// Avatar Preview with Animation
document.getElementById('avatarInput')?.addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        if (file.size > 2 * 1024 * 1024) {
            alert('Kích thước file quá lớn. Vui lòng chọn file nhỏ hơn 2MB.');
            this.value = '';
            return;
        }
        
        const reader = new FileReader();
        const preview = document.getElementById('avatarPreview');
        
        reader.onload = function(e) {
            preview.style.opacity = '0';
            setTimeout(() => {
                preview.src = e.target.result;
                preview.style.opacity = '1';
            }, 150);
        }
        reader.readAsDataURL(file);
    }
});

// Form Submit Loading State
document.querySelector('form')?.addEventListener('submit', function(e) {
    const submitBtn = this.querySelector('button[type="submit"]');
    if (submitBtn) {
        submitBtn.classList.add('loading');
        submitBtn.disabled = true;
        
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fa fa-spinner fa-spin me-2"></i>Đang xử lý...';
    }
});

// Auto-hide Alerts
document.querySelectorAll('.alert-dismissible').forEach(alert => {
    setTimeout(() => {
        const bsAlert = new bootstrap.Alert(alert);
        bsAlert.close();
    }, 5000);
});

// Smooth Scroll for Navigation
document.querySelectorAll('.account-nav-link').forEach(link => {
    link.addEventListener('click', function(e) {
        if (this.getAttribute('href').startsWith('#')) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }
    });
});

// Real-time Clock Update
function updateTime() {
    const now = new Date();
    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    const dateString = now.toLocaleDateString('vi-VN', options);
    // Update if element exists
}

updateTime();
setInterval(updateTime, 60000); // Update every minute
</script>
@endsection