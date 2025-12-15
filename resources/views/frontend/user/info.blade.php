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
                                    <i class="fa fa-user-circle"></i>
                                    <span>Thông tin cá nhân</span>
                                </div>
                                <h1 class="hero-title">Hồ sơ của tôi</h1>
                                <p class="hero-subtitle">
                                    <i class="fa fa-info-circle me-2"></i>
                                    Quản lý thông tin để bảo mật tài khoản
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="hero-stats-compact">
                                <div class="stat-compact">
                                    <i class="fa fa-check-circle"></i>
                                    <div>
                                        <strong>Đã xác thực</strong>
                                        <span>Tài khoản</span>
                                    </div>
                                </div>
                                <div class="stat-compact">
                                    <i class="fa fa-shield"></i>
                                    <div>
                                        <strong>Bảo mật</strong>
                                        <span>Cao</span>
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

                                <div class="profile-completion">
                                    <div class="completion-header">
                                        <span>Hoàn thiện hồ sơ</span>
                                        <strong>75%</strong>
                                    </div>
                                    <div class="progress-bar-profile">
                                        <div class="progress-fill-profile" style="width: 75%"></div>
                                    </div>
                                    <small class="completion-hint">Thêm số điện thoại và địa chỉ</small>
                                </div>

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
                            <a class="account-nav-link active" href="{{ route('account.info') }}">
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
                            <a class="account-nav-link" href="{{ route('account.favorite') }}">
                                <span class="nav-icon">
                                    <i class="fa fa-heart"></i>
                                </span>
                                <span class="nav-text">Yêu thích</span>
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

                <!-- Main Content -->
                <div class="col-lg-9">
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
                                    <a href="#" class="btn btn-custom-outline btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editProfileModal">
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
                                                <span
                                                    class="info-value">{{ Str::limit(Auth::user()->address ?? 'Chưa cập nhật', 50) }}</span>
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
                                        <i class="fa fa-bell me-2 mr-2"></i>Thông báo & Hoạt động
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
                                                <i class="fa fa-gift"></i>
                                            </div>
                                            <div class="activity-content">
                                                <p class="activity-text">Bạn nhận được 2 voucher mới</p>
                                                <span class="activity-time">
                                                    <i class="fa fa-clock me-1"></i>2 giờ trước
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
                                                    <i
                                                        class="fa fa-clock me-1"></i>{{ Auth::user()->created_at->diffForHumans() }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Security Settings -->
                    <div class="content-card mt-4">
                        <div class="card-header-custom">
                            <h3 class="card-title-custom">
                                <i class="fa fa-shield me-2 mr-2"></i>Cài đặt bảo mật
                            </h3>
                            <p class="card-subtitle-custom">Quản lý bảo mật và quyền riêng tư</p>
                        </div>
                        <div class="card-body-custom">
                            <div class="security-list">
                                <div class="security-item">
                                    <div class="security-info">
                                        <div class="security-icon">
                                            <i class="fa fa-lock"></i>
                                        </div>
                                        <div>
                                            <h5>Mật khẩu</h5>
                                            <p>Thay đổi mật khẩu định kỳ để bảo vệ tài khoản</p>
                                        </div>
                                    </div>
                                    <a href="{{ route('account.change-password') }}" class="btn btn-security">
                                        <span>Đổi mật khẩu</span>
                                        <i class="fa fa-arrow-right"></i>
                                    </a>
                                </div>

                                <div class="security-item">
                                    <div class="security-info">
                                        <div class="security-icon">
                                            <i class="fa fa-mobile-alt"></i>
                                        </div>
                                        <div>
                                            <h5>Xác thực hai yếu tố</h5>
                                            <p>Tăng cường bảo mật với xác thực 2 bước</p>
                                        </div>
                                    </div>
                                    <button class="btn btn-security" disabled>
                                        <span>Đang phát triển</span>
                                    </button>
                                </div>

                                <div class="security-item">
                                    <div class="security-info">
                                        <div class="security-icon">
                                            <i class="fa fa-history"></i>
                                        </div>
                                        <div>
                                            <h5>Lịch sử đăng nhập</h5>
                                            <p>Xem các thiết bị đã đăng nhập tài khoản</p>
                                        </div>
                                    </div>
                                    <button class="btn btn-security">
                                        <span>Xem chi tiết</span>
                                        <i class="fa fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Privacy Settings -->
                    <div class="content-card mt-4">
                        <div class="card-header-custom">
                            <h3 class="card-title-custom">
                                <i class="fa fa-user-secret me-2 mr-2"></i>Cài đặt quyền riêng tư
                            </h3>
                        </div>
                        <div class="card-body-custom">
                            <div class="privacy-settings">
                                <div class="privacy-item">
                                    <div>
                                        <h5>Hiển thị thông tin cá nhân</h5>
                                        <p>Cho phép người khác xem thông tin của bạn</p>
                                    </div>
                                    <label class="toggle-switch">
                                        <input type="checkbox" checked>
                                        <span class="toggle-slider"></span>
                                    </label>
                                </div>

                                <div class="privacy-item">
                                    <div>
                                        <h5>Nhận email khuyến mãi</h5>
                                        <p>Nhận thông tin về các chương trình ưu đãi</p>
                                    </div>
                                    <label class="toggle-switch">
                                        <input type="checkbox" checked>
                                        <span class="toggle-slider"></span>
                                    </label>
                                </div>

                                <div class="privacy-item">
                                    <div>
                                        <h5>Thông báo đơn hàng</h5>
                                        <p>Nhận cập nhật về trạng thái đơn hàng</p>
                                    </div>
                                    <label class="toggle-switch">
                                        <input type="checkbox" checked>
                                        <span class="toggle-slider"></span>
                                    </label>
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
        /* Account Info Page - Specific Styles Only */
        .account-page {
            background: #f8f9fa;
            min-height: 100vh;
        }

        /* Account Hero Section */
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

        .hero-text {
            position: relative;
            z-index: 2;
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

        /* Hero Stats Compact */
        .hero-stats-compact {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
        }

        .stat-compact {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 1rem;
            padding: 1rem 1.25rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .stat-compact i {
            font-size: 1.75rem;
            color: rgba(255, 255, 255, 0.9);
        }

        .stat-compact div {
            display: flex;
            flex-direction: column;
        }

        .stat-compact strong {
            font-size: 0.9375rem;
            font-weight: 700;
            color: white;
        }

        .stat-compact span {
            font-size: 0.8125rem;
            color: rgba(255, 255, 255, 0.8);
        }

        /* Alert Modern */
        .alert-modern {
            border-radius: 0.75rem;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.07);
            padding: 1rem 1.25rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .alert-success {
            background: linear-gradient(135deg, #d1fae5, #a7f3d0);
            color: #065f46;
        }

        .alert-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .alert-success .alert-icon {
            color: #34d399;
        }

        .alert-content {
            flex: 1;
        }

        .alert-content strong {
            display: block;
            font-weight: 700;
            margin-bottom: 0.25rem;
        }

        .alert-content p {
            margin: 0;
            font-size: 0.9375rem;
        }

        /* Account Sidebar */
        .account-sidebar {
            position: sticky;
            top: 90px;
        }

        /* Profile Card */
        .profile-card {
            background: white;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            margin-bottom: 1.5rem;
        }

        .profile-header {
            background: linear-gradient(135deg, #34d399, #10b981);
            padding: 2rem 1.5rem 1rem;
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
            border: 4px solid white;
            object-fit: cover;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .avatar-badge {
            position: absolute;
            bottom: 5px;
            right: 5px;
            width: 28px;
            height: 28px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        }

        .avatar-badge i {
            color: #34d399;
            font-size: 0.875rem;
        }

        .profile-info {
            padding: 1.5rem;
        }

        .profile-name {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 0.25rem;
            text-align: center;
        }

        .profile-email {
            font-size: 0.875rem;
            color: #6b7280;
            margin-bottom: 1.25rem;
            text-align: center;
            word-break: break-all;
        }

        /* Profile Completion */
        .profile-completion {
            background: linear-gradient(135deg, #f9fafb, #f3f4f6);
            border-radius: 0.75rem;
            padding: 1rem;
            margin-bottom: 1rem;
        }

        .completion-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.75rem;
            font-size: 0.875rem;
            color: #4b5563;
            font-weight: 600;
        }

        .completion-header strong {
            color: #34d399;
            font-size: 1rem;
        }

        .progress-bar-profile {
            height: 8px;
            background: #e5e7eb;
            border-radius: 50px;
            overflow: hidden;
            margin-bottom: 0.5rem;
        }

        .progress-fill-profile {
            height: 100%;
            background: linear-gradient(90deg, #34d399, #10b981);
            border-radius: 50px;
            transition: width 0.3s ease;
        }

        .completion-hint {
            font-size: 0.75rem;
            color: #6b7280;
            display: block;
            text-align: center;
        }

        .profile-member-since {
            font-size: 0.875rem;
            color: #6b7280;
            text-align: center;
            padding-top: 1rem;
            border-top: 1px solid #e5e7eb;
        }

        /* Account Navigation */
        .account-nav {
            background: white;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
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

        /* .account-nav-link:last-child {
        border-bottom: none;
    } */

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
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f3f4f6;
            border-radius: 0.5rem;
            margin-right: 1rem;
            flex-shrink: 0;
        }

        .account-nav-link.active .nav-icon {
            background: white;
            color: #34d399;
        }

        .account-nav-link:hover .nav-icon {
            background: #e5e7eb;
        }

        .nav-text {
            flex: 1;
            font-size: 0.9375rem;
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
            color: #d1d5db;
            font-size: 0.75rem;
        }

        .account-nav-link.active .nav-arrow {
            color: #34d399;
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
        }

        .logout-link .nav-icon {
            background: #fee2e2;
            color: #ef4444;
        }

        /* Content Card */
        .content-card {
            background: white;
            border-radius: 1rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .card-header-custom {
            padding: 1.5rem;
            border-bottom: 2px solid #f3f4f6;
            background: linear-gradient(135deg, #f9fafb, #ffffff);
        }

        .card-title-custom {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 0.25rem;
            display: flex;
            align-items: center;
        }

        .card-subtitle-custom {
            font-size: 0.875rem;
            color: #6b7280;
            margin: 0;
        }

        .card-body-custom {
            padding: 1.5rem;
        }

        /* Account Info List */
        .account-info-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .info-item {
            display: flex;
            gap: 1rem;
            padding: 1rem;
            background: #f9fafb;
            border-radius: 0.75rem;
            transition: all 0.3s ease;
        }

        .info-item:hover {
            background: #f3f4f6;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .info-icon {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, #34d399, #10b981);
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            flex-shrink: 0;
        }

        .info-details {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .info-label {
            font-size: 0.8125rem;
            color: #6b7280;
            font-weight: 500;
            margin-bottom: 0.25rem;
        }

        .info-value {
            font-size: 0.9375rem;
            color: #1f2937;
            font-weight: 600;
            word-break: break-word;
        }

        /* Activity Timeline */
        .activity-timeline {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .activity-item {
            display: flex;
            gap: 1rem;
            padding: 1rem;
            background: #f9fafb;
            border-radius: 0.75rem;
            transition: all 0.3s ease;
        }

        .activity-item:hover {
            background: #f3f4f6;
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #34d399, #10b981);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            flex-shrink: 0;
        }

        .activity-content {
            flex: 1;
        }

        .activity-text {
            font-size: 0.9375rem;
            color: #1f2937;
            font-weight: 500;
            margin-bottom: 0.375rem;
        }

        .activity-time {
            font-size: 0.8125rem;
            color: #6b7280;
            display: flex;
            align-items: center;
        }

        /* Security List */
        .security-list {
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
        }

        .security-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.25rem;
            background: #f9fafb;
            border-radius: 0.75rem;
            transition: all 0.3s ease;
        }

        .security-item:hover {
            background: #f3f4f6;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .security-info {
            display: flex;
            gap: 1rem;
            flex: 1;
        }

        .security-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #34d399, #10b981);
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.25rem;
            flex-shrink: 0;
        }

        .security-info h5 {
            font-size: 1rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 0.25rem;
        }

        .security-info p {
            font-size: 0.875rem;
            color: #6b7280;
            margin: 0;
        }

        .btn-security {
            background: white;
            border: 2px solid #e5e7eb;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 600;
            font-size: 0.9375rem;
            color: #34d399;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-security:hover:not(:disabled) {
            border-color: #34d399;
            background: #f0fdf4;
            box-shadow: 0 2px 8px rgba(52, 211, 153, 0.15);
        }

        .btn-security:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        /* Privacy Settings */
        .privacy-settings {
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
        }

        .privacy-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.25rem;
            background: #f9fafb;
            border-radius: 0.75rem;
            transition: all 0.3s ease;
        }

        .privacy-item:hover {
            background: #f3f4f6;
        }

        .privacy-item h5 {
            font-size: 1rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 0.25rem;
        }

        .privacy-item p {
            font-size: 0.875rem;
            color: #6b7280;
            margin: 0;
        }

        /* Toggle Switch */
        .toggle-switch {
            position: relative;
            display: inline-block;
            width: 52px;
            height: 28px;
        }

        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .toggle-slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #e5e7eb;
            transition: 0.4s;
            border-radius: 34px;
        }

        .toggle-slider:before {
            position: absolute;
            content: "";
            height: 20px;
            width: 20px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: 0.4s;
            border-radius: 50%;
        }

        .toggle-switch input:checked+.toggle-slider {
            background-color: #34d399;
        }

        .toggle-switch input:checked+.toggle-slider:before {
            transform: translateX(24px);
        }

        /* Modal Styles */
        .modal-content {
            border-radius: 1rem;
            border: none;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        }

        .modal-header {
            background: linear-gradient(135deg, #f9fafb, #ffffff);
            border-bottom: 2px solid #f3f4f6;
            padding: 1.5rem;
        }

        .modal-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1f2937;
            display: flex;
            align-items: center;
        }

        .modal-body {
            padding: 1.5rem;
        }

        .modal-footer {
            padding: 1.25rem 1.5rem;
            border-top: 2px solid #f3f4f6;
        }

        /* Avatar Upload Section */
        .avatar-upload-section {
            display: flex;
            gap: 1.5rem;
            align-items: center;
            padding: 1.5rem;
            background: #f9fafb;
            border-radius: 0.75rem;
        }

        .current-avatar {
            flex-shrink: 0;
        }

        .current-avatar img,
        #avatarPreview {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .avatar-upload-info h5 {
            font-size: 1rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 0.5rem;
        }

        /* Form Styles */
        .form-group-custom {
            margin-bottom: 1.25rem;
        }

        .form-label-custom {
            display: block;
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.5rem;
            font-size: 0.9375rem;
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
            font-size: 1rem;
        }

        .form-control-custom {
            width: 100%;
            padding: 0.875rem 1rem 0.875rem 3rem;
            border: 2px solid #e5e7eb;
            border-radius: 0.5rem;
            font-size: 0.9375rem;
            transition: all 0.3s ease;
        }

        .form-control-custom:focus {
            outline: none;
            border-color: #34d399;
            box-shadow: 0 0 0 4px rgba(52, 211, 153, 0.1);
        }

        textarea.form-control-custom {
            resize: vertical;
            padding-top: 0.875rem;
        }

        /* Button Styles */
        .btn-custom-outline,
        .btn-custom-success,
        .btn-custom-primary {
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 600;
            font-size: 0.9375rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-custom-outline {
            background: white;
            border: 2px solid #e5e7eb;
            color: #6b7280;
        }

        .btn-custom-outline:hover {
            border-color: #34d399;
            color: #34d399;
        }

        .btn-custom-success {
            background: linear-gradient(135deg, #34d399, #10b981);
            color: white;
        }

        .btn-custom-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(52, 211, 153, 0.3);
        }

        .btn-custom-primary {
            background: linear-gradient(135deg, #34d399, #10b981);
            color: white;
        }

        .btn-custom-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(52, 211, 153, 0.3);
        }

        /* Responsive */
        @media (max-width: 992px) {
            .account-sidebar {
                position: relative;
                top: 0;
            }
        }

        @media (max-width: 768px) {
            .hero-stats-compact {
                justify-content: center;
                width: 100%;
                margin-top: 2rem;
            }

            .hero-title {
                font-size: 2rem;
            }

            .security-item,
            .privacy-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .btn-security {
                width: 100%;
                justify-content: center;
            }

            .avatar-upload-section {
                flex-direction: column;
                text-align: center;
            }
        }

        @media (max-width: 576px) {
            .hero-content {
                padding: 2rem 0 1.5rem;
            }

            .stat-compact {
                padding: 0.875rem 1rem;
            }

            .stat-compact i {
                font-size: 1.5rem;
            }
        }
    </style>

    <script>
        // Avatar preview
        document.getElementById('avatarInput')?.addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('avatarPreview').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

        // Auto-hide alerts
        setTimeout(() => {
            document.querySelectorAll('.alert').forEach(alert => {
                alert.style.transition = 'opacity 0.5s';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            });
        }, 5000);
    </script>

@endsection