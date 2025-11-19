@extends('frontend.layout.fe')

@section('content')
    <div class="account-page">
        <!-- Hero Section -->
        <div class="account-hero">
            <div class="container">
                <div class="hero-content">
                    <div class="row align-items-center">
                        <div class="col-lg-7">
                            <div class="hero-text">
                                <div class="welcome-badge">
                                    <i class="fa fa-hand-paper"></i>
                                    <span>Chào mừng trở lại</span>
                                </div>
                                <h1 class="hero-title">{{ Auth::user()->name }}</h1>
                                <p class="hero-subtitle">
                                    <i class="fa fa-calendar-alt me-2"></i>
                                    {{ now()->locale('vi')->isoFormat('dddd, D MMMM YYYY') }}
                                </p>
                                <div class="hero-quick-info">
                                    <div class="info-badge">
                                        <i class="fa fa-crown"></i>
                                        <span>Thành viên Vàng</span>
                                    </div>
                                    <div class="info-badge">
                                        <i class="fa fa-star"></i>
                                        <span>250 Điểm tích lũy</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="hero-stats-modern">
                                <div class="stat-box-hero">
                                    <div class="stat-icon-hero">
                                        <i class="fa fa-shopping-bag"></i>
                                    </div>
                                    <div class="stat-content-hero">
                                        <span class="stat-number-hero">{{ $orders->total() }}</span>
                                        <span class="stat-label-hero">Đơn hàng</span>
                                    </div>
                                </div>
                                <div class="stat-box-hero">
                                    <div class="stat-icon-hero">
                                        <i class="fa fa-wallet"></i>
                                    </div>
                                    <div class="stat-content-hero">
                                        <span class="stat-number-hero">0₫</span>
                                        <span class="stat-label-hero">Tổng chi</span>
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
                                        alt="Avatar" class="profile-avatar">
                                    <span class="avatar-badge">
                                        <i class="fa fa-check"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="profile-info">
                                <h4 class="profile-name">{{ Auth::user()->name }}</h4>
                                <p class="profile-email">{{ Auth::user()->email }}</p>

                                <!-- Loyalty Progress -->
                                <div class="loyalty-progress-box">
                                    <div class="loyalty-header">
                                        <span class="loyalty-level">Thành viên Vàng</span>
                                        <span class="loyalty-points">250 điểm</span>
                                    </div>
                                    <div class="progress-bar-loyalty">
                                        <div class="progress-fill-loyalty" style="width: 65%"></div>
                                    </div>
                                    <span class="loyalty-next">Còn 150 điểm để lên Bạch Kim</span>
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
                                <span class="nav-badge">{{ $orders->total() }}</span>
                                <i class="fa fa-chevron-right nav-arrow"></i>
                            </a>
                            <a class="account-nav-link" href="{{ route('account.info') }}">
                                <span class="nav-icon">
                                    <i class="fa fa-user"></i>
                                </span>
                                <span class="nav-text">Thông tin tài khoản</span>
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
                    <!-- Statistics Cards with Charts -->
                    <div class="row g-3 mb-4">
                        <div class="col-md-3 col-sm-6">
                            <div class="dashboard-stat-card-modern stat-primary">
                                <div class="stat-header-row">
                                    <div class="stat-icon-modern">
                                        <i class="fa fa-shopping-bag"></i>
                                    </div>
                                    <span class="stat-change positive">+0%</span>
                                </div>
                                <h3 class="stat-number-modern">{{ $orders->total() }}</h3>
                                <p class="stat-label-modern">Tổng đơn hàng</p>
                                <div class="stat-mini-chart">
                                    <svg viewBox="0 0 100 30" preserveAspectRatio="none">
                                        <path d="M0,20 L20,15 L40,18 L60,12 L80,15 L100,10" stroke="currentColor"
                                            fill="none" stroke-width="2" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="dashboard-stat-card-modern stat-success">
                                <div class="stat-header-row">
                                    <div class="stat-icon-modern">
                                        <i class="fa fa-check-circle"></i>
                                    </div>
                                    <span class="stat-change positive">+0%</span>
                                </div>
                                <h3 class="stat-number-modern">{{ $orders->where('status', 4)->count() }}</h3>
                                <p class="stat-label-modern">Hoàn thành</p>
                                <div class="stat-mini-chart">
                                    <svg viewBox="0 0 100 30" preserveAspectRatio="none">
                                        <path d="M0,25 L20,20 L40,22 L60,18 L80,20 L100,15" stroke="currentColor"
                                            fill="none" stroke-width="2" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="dashboard-stat-card-modern stat-warning">
                                <div class="stat-header-row">
                                    <div class="stat-icon-modern">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                    <span class="stat-change neutral">0%</span>
                                </div>
                                <h3 class="stat-number-modern">{{ $orders->where('status', 2)->count() }}</h3>
                                <p class="stat-label-modern">Đang xử lý</p>
                                <div class="stat-mini-chart">
                                    <svg viewBox="0 0 100 30" preserveAspectRatio="none">
                                        <path d="M0,15 L20,15 L40,15 L60,15 L80,15 L100,15" stroke="currentColor"
                                            fill="none" stroke-width="2" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="dashboard-stat-card-modern stat-info">
                                <div class="stat-header-row">
                                    <div class="stat-icon-modern">
                                        <i class="fa fa-google-wallet"></i>
                                    </div>
                                    <span class="stat-change positive">+0%</span>
                                </div>
                                <h3 class="stat-number-modern">{{ number_format($orders->sum('total_price')) }}₫</h3>
                                <p class="stat-label-modern">Tổng chi tiêu</p>
                                <div class="stat-mini-chart">
                                    <svg viewBox="0 0 100 30" preserveAspectRatio="none">
                                        <path d="M0,22 L20,18 L40,20 L60,14 L80,16 L100,12" stroke="currentColor"
                                            fill="none" stroke-width="2" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions Bar -->
                    <div class="quick-actions-bar mb-4">
                        <h4 class="actions-title">
                            <i class="fa fa-bolt"></i>
                            Thao tác nhanh
                        </h4>
                        <div class="actions-grid-horizontal">
                            <a href="{{ route('shop') }}" class="action-btn-horizontal">
                                <div class="action-icon-circle green">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                                <span>Mua sắm</span>
                            </a>
                            <a href="{{ route('account.orderHistory') }}" class="action-btn-horizontal">
                                <div class="action-icon-circle blue">
                                    <i class="fa fa-list"></i>
                                </div>
                                <span>Đơn hàng</span>
                            </a>
                            <a href="#" class="action-btn-horizontal">
                                <div class="action-icon-circle pink">
                                    <i class="fa fa-heart"></i>
                                </div>
                                <span>Yêu thích</span>
                            </a>
                            <a href="#" class="action-btn-horizontal">
                                <div class="action-icon-circle yellow">
                                    <i class="fa fa-gift"></i>
                                </div>
                                <span>Ưu đãi</span>
                            </a>
                            <a href="{{ route('account.change-password') }}" class="action-btn-horizontal">
                                <div class="action-icon-circle purple">
                                    <i class="fa fa-key"></i>
                                </div>
                                <span>Bảo mật</span>
                            </a>
                            <a href="{{ route('contact') }}" class="action-btn-horizontal">
                                <div class="action-icon-circle orange">
                                    <i class="fa fa-headset"></i>
                                </div>
                                <span>Hỗ trợ</span>
                            </a>
                        </div>
                    </div>

                    <!-- Main Dashboard Content -->
                    <div class="row g-4 mb-4">
                        <!-- Recent Orders -->
                        <div class="col-lg-8">
                            <div class="content-card">
                                <div class="card-header-custom d-flex justify-content-between align-items-center">
                                    <div>
                                        <h3 class="card-title-custom">
                                            <i class="fa fa-history me-2 mr-2"></i>Đơn hàng gần đây
                                        </h3>
                                        <p class="card-subtitle-custom">5 đơn hàng mới nhất của bạn</p>
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
                                                    {{ number_format($order->total_price) }}₫
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

                        <!-- Rewards & Vouchers -->
                        <div class="col-lg-4">
                            <div class="content-card">
                                <div class="card-header-custom">
                                    <h3 class="card-title-custom">
                                        <i class="fa fa-gift me-2 mr-2"></i>Ưu đãi của bạn
                                    </h3>
                                </div>
                                <div class="card-body-custom">
                                    <div class="voucher-list">
                                        <div class="voucher-card">
                                            <div class="voucher-left">
                                                <div class="voucher-icon">
                                                    <i class="fa fa-percent"></i>
                                                </div>
                                                <div class="voucher-info">
                                                    <h6>Giảm 15%</h6>
                                                    <p>Đơn từ 200K</p>
                                                </div>
                                            </div>
                                            <div class="voucher-expire">
                                                <i class="fa fa-clock-o"></i>
                                                <span>5 ngày</span>
                                            </div>
                                        </div>
                                        <div class="voucher-card">
                                            <div class="voucher-left">
                                                <div class="voucher-icon">
                                                    <i class="fa fa-gift"></i>
                                                </div>
                                                <div class="voucher-info">
                                                    <h6>Freeship</h6>
                                                    <p>Mọi đơn hàng</p>
                                                </div>
                                            </div>
                                            <div class="voucher-expire">
                                                <i class="fa fa-clock-o"></i>
                                                <span>10 ngày</span>
                                            </div>
                                        </div>
                                        <a href="#" class="btn-view-more-vouchers">
                                            <span>Xem thêm ưu đãi</span>
                                            <i class="fa fa-arrow-right"></i>
                                        </a>
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
                                            value="{{ Auth::user()->name }}" placeholder="Nhập họ và tên" required>
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
                                            value="{{ Auth::user()->email }}" placeholder="example@email.com" required>
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
                                            value="{{ Auth::user()->phone ?? '' }}" placeholder="0xxx xxx xxx">
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

        .hero-quick-info {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .info-badge {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-size: 0.875rem;
            font-weight: 600;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .info-badge i {
            color: #fbbf24;
        }

        .hero-stats-modern {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
        }

        .stat-box-hero {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 1rem;
            padding: 1.25rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.75rem;
            min-width: 140px;
            transition: all 0.3s ease;
        }

        .stat-box-hero:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: translateY(-4px);
        }

        .stat-icon-hero {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.25);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }

        .stat-content-hero {
            text-align: center;
        }

        .stat-number-hero {
            display: block;
            font-size: 1.75rem;
            font-weight: 900;
            color: white;
            line-height: 1;
            margin-bottom: 0.25rem;
        }

        .stat-label-hero {
            display: block;
            font-size: 0.875rem;
            color: rgba(255, 255, 255, 0.9);
        }

        /* Profile Card - Redesigned */
        .profile-card {
            background: white;
            border-radius: 1.25rem;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
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
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
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
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
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
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
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
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
        }

        .content-card:hover {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.12);
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
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
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
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
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
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
        }

        .content-card:hover {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.12);
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

        /* Loyalty Progress */
        .loyalty-progress-box {
            background: linear-gradient(135deg, #f9fafb, #f3f4f6);
            border-radius: 0.75rem;
            padding: 1rem;
            margin-bottom: 1rem;
        }

        .loyalty-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.75rem;
        }

        .loyalty-level {
            font-size: 0.875rem;
            font-weight: 700;
            color: #f59e0b;
        }

        .loyalty-points {
            font-size: 0.875rem;
            font-weight: 700;
            color: #34d399;
        }

        .progress-bar-loyalty {
            height: 8px;
            background: #e5e7eb;
            border-radius: 50px;
            overflow: hidden;
            margin-bottom: 0.5rem;
        }

        .progress-fill-loyalty {
            height: 100%;
            background: linear-gradient(90deg, #34d399, #10b981);
            border-radius: 50px;
            transition: width 0.3s ease;
        }

        .loyalty-next {
            display: block;
            font-size: 0.75rem;
            color: #6b7280;
            text-align: center;
        }

        /* Modern Dashboard Stat Cards */
        .dashboard-stat-card-modern {
            background: white;
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .dashboard-stat-card-modern::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100px;
            height: 100px;
            opacity: 0.05;
            border-radius: 50%;
        }

        .dashboard-stat-card-modern.stat-primary::before {
            background: #34d399;
        }

        .dashboard-stat-card-modern.stat-success::before {
            background: #10b981;
        }

        .dashboard-stat-card-modern.stat-warning::before {
            background: #f59e0b;
        }

        .dashboard-stat-card-modern.stat-info::before {
            background: #3b82f6;
        }

        .dashboard-stat-card-modern:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        }

        .stat-header-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .stat-icon-modern {
            width: 48px;
            height: 48px;
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }

        .stat-primary .stat-icon-modern {
            background: linear-gradient(135deg, #34d399, #10b981);
        }

        .stat-success .stat-icon-modern {
            background: linear-gradient(135deg, #10b981, #059669);
        }

        .stat-warning .stat-icon-modern {
            background: linear-gradient(135deg, #fbbf24, #f59e0b);
        }

        .stat-info .stat-icon-modern {
            background: linear-gradient(135deg, #60a5fa, #3b82f6);
        }

        .stat-change {
            font-size: 0.75rem;
            font-weight: 700;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
        }

        .stat-change.positive {
            background: #d1fae5;
            color: #059669;
        }

        .stat-change.neutral {
            background: #f3f4f6;
            color: #6b7280;
        }

        .stat-number-modern {
            font-size: 2rem;
            font-weight: 900;
            color: #1f2937;
            margin-bottom: 0.25rem;
            line-height: 1;
        }

        .stat-label-modern {
            font-size: 0.875rem;
            color: #6b7280;
            font-weight: 500;
            margin-bottom: 1rem;
            display: block;
        }

        .stat-mini-chart {
            height: 30px;
            color: currentColor;
            opacity: 0.3;
        }

        .stat-primary .stat-mini-chart {
            color: #34d399;
        }

        .stat-success .stat-mini-chart {
            color: #10b981;
        }

        .stat-warning .stat-mini-chart {
            color: #f59e0b;
        }

        .stat-info .stat-mini-chart {
            color: #3b82f6;
        }

        /* Quick Actions Bar */
        .quick-actions-bar {
            background: white;
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        }

        .actions-title {
            font-size: 1.125rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 1.25rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .actions-title i {
            color: #f59e0b;
        }

        .actions-grid-horizontal {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 1rem;
        }

        .action-btn-horizontal {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.75rem;
            padding: 1rem;
            background: #f9fafb;
            border-radius: 0.75rem;
            text-decoration: none;
            color: #1f2937;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .action-btn-horizontal:hover {
            background: white;
            border-color: #34d399;
            transform: translateY(-4px);
            box-shadow: 0 4px 12px rgba(52, 211, 153, 0.2);
            color: #1f2937;
        }

        .action-icon-circle {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            color: white;
            transition: all 0.3s ease;
        }

        .action-icon-circle.green {
            background: linear-gradient(135deg, #34d399, #10b981);
        }

        .action-icon-circle.blue {
            background: linear-gradient(135deg, #60a5fa, #3b82f6);
        }

        .action-icon-circle.pink {
            background: linear-gradient(135deg, #f472b6, #ec4899);
        }

        .action-icon-circle.yellow {
            background: linear-gradient(135deg, #fbbf24, #f59e0b);
        }

        .action-icon-circle.purple {
            background: linear-gradient(135deg, #a78bfa, #8b5cf6);
        }

        .action-icon-circle.orange {
            background: linear-gradient(135deg, #fb923c, #f97316);
        }

        .action-btn-horizontal:hover .action-icon-circle {
            transform: scale(1.1) rotate(5deg);
        }

        .action-btn-horizontal span {
            font-size: 0.8125rem;
            font-weight: 600;
            text-align: center;
        }

        /* Form Elements */
        .form-group-custom {
            margin-bottom: 1rem;
        }

        .input-group-custom {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            z-index: 1;
        }

        .form-control-custom {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 2.75rem;
            border: 2px solid #e2e8f0;
            border-radius: 0.5rem;
            font-size: 0.9375rem;
            transition: all 0.3s ease;
        }

        .form-control-custom:focus {
            outline: none;
            border-color: #34d399;
            box-shadow: 0 0 0 3px rgba(52, 211, 153, 0.1);
        }

        textarea.form-control-custom {
            resize: vertical;
            min-height: 100px;
        }

        .btn-custom-primary {
            background: linear-gradient(135deg, #34d399 0%, #10b981 100%);
            color: white;
            border: none;
            padding: 0.625rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-custom-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(52, 211, 153, 0.4);
            color: white;
        }

        .btn-custom-success {
            background: linear-gradient(135deg, #34d399 0%, #10b981 100%);
            color: white;
            border: none;
            padding: 0.625rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-custom-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(52, 211, 153, 0.4);
            color: white;
        }

        .btn-custom-outline {
            background: white;
            color: #4a5568;
            border: 2px solid #e2e8f0;
            padding: 0.625rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-custom-outline:hover {
            border-color: #cbd5e0;
            background: #f7fafc;
            color: #4a5568;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .actions-grid-horizontal {
                grid-template-columns: repeat(3, 1fr);
            }

            .hero-stats-modern {
                justify-content: center;
                width: 100%;
                margin-top: 2rem;
            }

            .hero-stats-modern {
                flex-direction: row;
                flex-wrap: wrap;
            }
        }

        @media (max-width: 768px) {
            .actions-grid-horizontal {
                grid-template-columns: repeat(2, 1fr);
            }

            .hero-quick-info {
                flex-direction: column;
                align-items: flex-start;
            }

            .info-badge {
                width: fit-content;
            }

            .stat-box-hero {
                width: 100%;
                flex: 1;
                min-width: 0;
            }

            .order-item-compact {
                flex-wrap: wrap;
                gap: 0.75rem;
            }

            .order-info {
                flex-basis: 100%;
                order: 2;
            }

            .order-icon {
                order: 1;
            }

            .order-status {
                order: 3;
            }

            .order-amount {
                order: 4;
                margin-left: auto;
            }

            .card-header-custom {
                flex-direction: column;
                align-items: flex-start !important;
                gap: 1rem;
            }

            .card-header-custom .btn {
                width: 100%;
            }

            .profile-card {
                margin-bottom: 1.5rem;
            }

            .account-nav {
                margin-bottom: 0;
            }
        }

        @media (max-width: 576px) {
            .dashboard-stat-card-modern {
                text-align: center;
            }

            .stat-header-row {
                flex-direction: column;
                gap: 0.5rem;
                text-align: center;
            }

            .stat-icon-modern {
                margin: 0 auto;
            }

            .actions-grid-horizontal {
                grid-template-columns: repeat(2, 1fr);
            }

            .hero-title {
                font-size: 2rem;
            }

            .hero-stats-modern {
                flex-direction: column;
                gap: 1rem;
            }

            .stat-box-hero {
                width: 100%;
            }

            .voucher-card {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.75rem;
            }

            .voucher-expire {
                width: 100%;
                justify-content: flex-start;
            }

            .activity-item:not(:last-child)::after {
                left: 22px;
            }

            .card-body-custom {
                padding: 1.5rem;
            }
        }

        @media (max-width: 400px) {
            .order-item-compact {
                padding: 1rem;
            }

            .order-icon {
                width: 40px;
                height: 40px;
                font-size: 1rem;
            }

            .order-amount {
                font-size: 1rem;
            }

            .hero-content {
                padding: 2rem 0 1.5rem;
            }

            .profile-info {
                padding: 1.5rem;
            }

            .account-nav {
                padding: 0.75rem;
            }

            .account-nav-link {
                padding: 0.75rem;
            }
        }

        /* Main content styles */
        .empty-state-compact {
            padding: 2rem;
        }
    </style>

    <script>
        // Avatar Preview with Animation
        document.getElementById('avatarInput')?.addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                if (file.size > 2 * 1024 * 1024) {
                    alert('Kích thước file quá lớn. Vui lòng chọn file nhỏ hơn 2MB.');
                    this.value = '';
                    return;
                }

                const reader = new FileReader();
                const preview = document.getElementById('avatarPreview');

                reader.onload = function (e) {
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
        document.querySelector('form')?.addEventListener('submit', function (e) {
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
            link.addEventListener('click', function (e) {
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