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
                                <i class="fa fa-shield"></i>
                                <span>Bảo mật tài khoản</span>
                            </div>
                            <h1 class="hero-title">Đổi mật khẩu</h1>
                            <p class="hero-subtitle">
                                <i class="fa fa-info-circle me-2"></i>
                                Bảo vệ tài khoản của bạn bằng mật khẩu mạnh
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="hero-icon-large">
                            <i class="fa fa-key"></i>
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
                        <a class="account-nav-link" href="{{ route('account.orderHistory') }}">
                            <span class="nav-icon">
                                <i class="fa fa-shopping-bag"></i>
                            </span>
                            <span class="nav-text">Đơn hàng</span>
                            <span class="nav-badge">0</span>
                            <i class="fa fa-chevron-right nav-arrow"></i>
                        </a>
                        <a class="account-nav-link active" href="{{ route('account.change-password') }}">
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
                <!-- Security Tips -->
                <div class="security-tips-card mb-4">
                    <div class="tips-header">
                        <i class="fa fa-lightbulb"></i>
                        <h4>Mẹo bảo mật</h4>
                    </div>
                    <div class="tips-content">
                        <div class="tip-item">
                            <i class="fa fa-check-circle"></i>
                            <span>Sử dụng ít nhất 8 ký tự</span>
                        </div>
                        <div class="tip-item">
                            <i class="fa fa-check-circle"></i>
                            <span>Kết hợp chữ hoa, chữ thường, số và ký tự đặc biệt</span>
                        </div>
                        <div class="tip-item">
                            <i class="fa fa-check-circle"></i>
                            <span>Không sử dụng thông tin cá nhân dễ đoán</span>
                        </div>
                        <div class="tip-item">
                            <i class="fa fa-check-circle"></i>
                            <span>Thay đổi mật khẩu định kỳ để tăng cường bảo mật</span>
                        </div>
                    </div>
                </div>

                <!-- Change Password Form -->
                <div class="content-card">
                    <div class="card-header-custom">
                        <h3 class="card-title-custom">
                            <i class="fa fa-lock me-2 mr-2"></i>Thay đổi mật khẩu
                        </h3>
                        <p class="card-subtitle-custom">Cập nhật mật khẩu để bảo vệ tài khoản của bạn</p>
                    </div>
                    <div class="card-body-custom">
                        <form method="POST" action="{{ route('account.update-password') }}" class="change-password-form">
                            @csrf
                            
                            <div class="row">
                                <div class="col-lg-8 mx-auto">
                                    <!-- Current Password -->
                                    <div class="form-group-modern mb-4">
                                        <label class="form-label-modern">
                                            <i class="fa fa-lock text-muted me-2"></i>
                                            Mật khẩu hiện tại
                                        </label>
                                        <div class="input-group-modern">
                                            <span class="input-icon-modern">
                                                <i class="fa fa-lock"></i>
                                            </span>
                                            <input type="password" 
                                                   class="form-control-modern @error('old_password') is-invalid @enderror" 
                                                   name="old_password" 
                                                   placeholder="Nhập mật khẩu hiện tại"
                                                   required>
                                            <button type="button" class="toggle-password" data-target="old_password">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </div>
                                        @error('old_password')
                                            <div class="error-message">
                                                <i class="fa fa-exclamation-circle"></i>
                                                <span>{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="password-divider">
                                        <span>Mật khẩu mới</span>
                                    </div>

                                    <!-- New Password -->
                                    <div class="form-group-modern mb-4">
                                        <label class="form-label-modern">
                                            <i class="fa fa-key text-muted me-2"></i>
                                            Mật khẩu mới
                                        </label>
                                        <div class="input-group-modern">
                                            <span class="input-icon-modern">
                                                <i class="fa fa-key"></i>
                                            </span>
                                            <input type="password" 
                                                   class="form-control-modern @error('password') is-invalid @enderror" 
                                                   name="password" 
                                                   id="new_password"
                                                   placeholder="Nhập mật khẩu mới"
                                                   required>
                                            <button type="button" class="toggle-password" data-target="password">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </div>
                                        @error('password')
                                            <div class="error-message">
                                                <i class="fa fa-exclamation-circle"></i>
                                                <span>{{ $message }}</span>
                                            </div>
                                        @enderror
                                        
                                        <!-- Password Strength Indicator -->
                                        <div class="password-strength mt-3">
                                            <div class="strength-label">Độ mạnh mật khẩu:</div>
                                            <div class="strength-bars">
                                                <div class="strength-bar"></div>
                                                <div class="strength-bar"></div>
                                                <div class="strength-bar"></div>
                                                <div class="strength-bar"></div>
                                            </div>
                                            <div class="strength-text">Nhập mật khẩu</div>
                                        </div>
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="form-group-modern mb-4">
                                        <label class="form-label-modern">
                                            <i class="fa fa-check-circle text-muted me-2"></i>
                                            Xác nhận mật khẩu mới
                                        </label>
                                        <div class="input-group-modern">
                                            <span class="input-icon-modern">
                                                <i class="fa fa-check-circle"></i>
                                            </span>
                                            <input type="password" 
                                                   class="form-control-modern" 
                                                   name="password_confirmation" 
                                                   placeholder="Nhập lại mật khẩu mới"
                                                   required>
                                            <button type="button" class="toggle-password" data-target="password_confirmation">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="form-actions">
                                        <button type="button" class="btn btn-cancel" onclick="window.history.back()">
                                            <i class="fa fa-times me-2"></i>
                                            Hủy
                                        </button>
                                        <button type="submit" class="btn btn-update">
                                            <i class="fa fa-save me-2"></i>
                                            Cập nhật mật khẩu
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Additional Security Info -->
                <div class="security-info-card">
                    <div class="info-icon">
                        <i class="fa fa-info-circle"></i>
                    </div>
                    <div class="info-content">
                        <h5>Lưu ý quan trọng</h5>
                        <p>Sau khi thay đổi mật khẩu, bạn sẽ cần đăng nhập lại bằng mật khẩu mới trên tất cả các thiết bị.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Account Page Base Styles */
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
    font-weight: 400;
}

/* Profile Card */
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

.btn-close {
    flex-shrink: 0;
}

/* Hero Icon Large */
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
    animation: floatAnimation 3s ease-in-out infinite;
}

@keyframes floatAnimation {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-20px);
    }
}

/* Security Tips Card */
.security-tips-card {
    background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
    border-radius: 1rem;
    padding: 1.5rem 2rem;
    box-shadow: 0 2px 12px rgba(251, 191, 36, 0.2);
}

.tips-header {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 1.25rem;
}

.tips-header i {
    font-size: 1.5rem;
    color: #f59e0b;
}

.tips-header h4 {
    font-size: 1.125rem;
    font-weight: 700;
    color: #92400e;
    margin: 0;
}

.tips-content {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 0.875rem;
}

.tip-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.875rem;
    color: #78350f;
}

.tip-item i {
    color: #10b981;
    font-size: 1rem;
    flex-shrink: 0;
}

/* Change Password Form */
.change-password-form {
    max-width: 100%;
}

.form-group-modern {
    margin-bottom: 1.5rem;
}

.form-label-modern {
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 0.75rem;
    font-size: 0.9375rem;
    display: flex;
    align-items: center;
}

.input-group-modern {
    position: relative;
    display: flex;
    align-items: center;
}

.input-icon-modern {
    position: absolute;
    left: 1rem;
    color: #9ca3af;
    font-size: 1.125rem;
    z-index: 1;
}

.form-control-modern {
    width: 100%;
    padding: 1rem 3.5rem 1rem 3rem;
    border: 2px solid #e5e7eb;
    border-radius: 0.75rem;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.form-control-modern:focus {
    outline: none;
    border-color: #34d399;
    box-shadow: 0 0 0 3px rgba(52, 211, 153, 0.1);
}

.form-control-modern.is-invalid {
    border-color: #ef4444;
}

.toggle-password {
    position: absolute;
    right: 1rem;
    background: none;
    border: none;
    color: #9ca3af;
    cursor: pointer;
    padding: 0.5rem;
    transition: all 0.3s ease;
    z-index: 1;
}

.toggle-password:hover {
    color: #34d399;
}

.error-message {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #ef4444;
    font-size: 0.875rem;
    margin-top: 0.5rem;
}

.error-message i {
    font-size: 1rem;
}

/* Password Divider */
.password-divider {
    display: flex;
    align-items: center;
    text-align: center;
    margin: 2rem 0 1.5rem;
}

.password-divider::before,
.password-divider::after {
    content: '';
    flex: 1;
    border-bottom: 2px solid #e5e7eb;
}

.password-divider span {
    padding: 0 1rem;
    color: #6b7280;
    font-weight: 600;
    font-size: 0.875rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* Password Strength */
.password-strength {
    margin-top: 0.75rem;
}

.strength-label {
    font-size: 0.8125rem;
    color: #6b7280;
    margin-bottom: 0.5rem;
    font-weight: 500;
}

.strength-bars {
    display: flex;
    gap: 0.5rem;
    margin-bottom: 0.5rem;
}

.strength-bar {
    flex: 1;
    height: 4px;
    background: #e5e7eb;
    border-radius: 2px;
    transition: all 0.3s ease;
}

.strength-text {
    font-size: 0.8125rem;
    color: #9ca3af;
    font-weight: 500;
}

/* Strength levels */
.password-strength.weak .strength-bar:nth-child(1) {
    background: #ef4444;
}

.password-strength.weak .strength-text {
    color: #ef4444;
}

.password-strength.fair .strength-bar:nth-child(1),
.password-strength.fair .strength-bar:nth-child(2) {
    background: #f59e0b;
}

.password-strength.fair .strength-text {
    color: #f59e0b;
}

.password-strength.good .strength-bar:nth-child(1),
.password-strength.good .strength-bar:nth-child(2),
.password-strength.good .strength-bar:nth-child(3) {
    background: #3b82f6;
}

.password-strength.good .strength-text {
    color: #3b82f6;
}

.password-strength.strong .strength-bar {
    background: #10b981;
}

.password-strength.strong .strength-text {
    color: #10b981;
}

/* Form Actions */
.form-actions {
    display: flex;
    gap: 1rem;
    justify-content: center;
    margin-top: 2rem;
    padding-top: 2rem;
    border-top: 2px solid #f3f4f6;
}

.btn-cancel {
    background: white;
    color: #6b7280;
    border: 2px solid #e5e7eb;
    padding: 0.875rem 2rem;
    border-radius: 0.75rem;
    font-weight: 600;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.btn-cancel:hover {
    border-color: #d1d5db;
    background: #f9fafb;
    color: #4b5563;
}

.btn-update {
    background: linear-gradient(135deg, #34d399 0%, #10b981 100%);
    color: white;
    border: none;
    padding: 0.875rem 2.5rem;
    border-radius: 0.75rem;
    font-weight: 600;
    font-size: 1rem;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(52, 211, 153, 0.3);
}

.btn-update:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(52, 211, 153, 0.4);
    color: white;
}

/* Security Info Card */
.security-info-card {
    background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
    border-radius: 1rem;
    padding: 1.5rem;
    display: flex;
    gap: 1rem;
    align-items: flex-start;
    margin-top: 1.5rem;
}

.info-icon {
    width: 48px;
    height: 48px;
    background: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #3b82f6;
    font-size: 1.5rem;
    flex-shrink: 0;
}

.info-content h5 {
    font-size: 1rem;
    font-weight: 700;
    color: #1e40af;
    margin-bottom: 0.5rem;
}

.info-content p {
    font-size: 0.875rem;
    color: #1e3a8a;
    margin: 0;
    line-height: 1.6;
}

/* Responsive */
@media (max-width: 992px) {
    .tips-content {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .hero-icon-large {
        width: 100px;
        height: 100px;
        font-size: 3rem;
    }
    
    .form-actions {
        flex-direction: column;
    }
    
    .btn-cancel,
    .btn-update {
        width: 100%;
    }
    
    .security-tips-card {
        padding: 1.25rem 1.5rem;
    }
    
    .hero-content {
        padding: 2rem 0 1.5rem;
    }
    
    .hero-title {
        font-size: 2rem;
    }
}

@media (max-width: 576px) {
    .form-control-modern {
        padding: 0.875rem 3rem 0.875rem 2.75rem;
    }
    
    .security-info-card {
        flex-direction: column;
        text-align: center;
    }
    
    .info-icon {
        margin: 0 auto;
    }
    
    .card-body-custom {
        padding: 1.5rem;
    }
    
    .card-header-custom {
        padding: 1.25rem 1.5rem;
    }
}
</style>

<script>
// Toggle password visibility
document.querySelectorAll('.toggle-password').forEach(button => {
    button.addEventListener('click', function() {
        const targetName = this.getAttribute('data-target');
        const input = document.querySelector(`input[name="${targetName}"]`);
        const icon = this.querySelector('i');
        
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });
});

// Password strength checker
const passwordInput = document.getElementById('new_password');
const strengthContainer = document.querySelector('.password-strength');

if (passwordInput) {
    passwordInput.addEventListener('input', function() {
        const password = this.value;
        const strength = calculatePasswordStrength(password);
        
        strengthContainer.className = 'password-strength ' + strength.class;
        strengthContainer.querySelector('.strength-text').textContent = strength.text;
    });
}

function calculatePasswordStrength(password) {
    if (password.length === 0) {
        return { class: '', text: 'Nhập mật khẩu' };
    }
    
    let strength = 0;
    
    if (password.length >= 8) strength++;
    if (password.length >= 12) strength++;
    if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength++;
    if (/\d/.test(password)) strength++;
    if (/[^a-zA-Z\d]/.test(password)) strength++;
    
    if (strength <= 2) {
        return { class: 'weak', text: 'Yếu - Cần cải thiện' };
    } else if (strength === 3) {
        return { class: 'fair', text: 'Trung bình - Có thể chấp nhận' };
    } else if (strength === 4) {
        return { class: 'good', text: 'Tốt - An toàn' };
    } else {
        return { class: 'strong', text: 'Rất mạnh - Xuất sắc!' };
    }
}

// Auto-hide alerts
document.querySelectorAll('.alert-dismissible').forEach(alert => {
    setTimeout(() => {
        const bsAlert = new bootstrap.Alert(alert);
        bsAlert.close();
    }, 5000);
});
</script>

@endsection
