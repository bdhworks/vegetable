@extends('admin.layout.be')

@section('content')
<div class="profile-page">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <div class="header-left">
                <h1 class="page-title">
                    <i class="ti ti-user-circle"></i>
                    Hồ Sơ Cá Nhân
                </h1>
                <nav class="breadcrumb-modern">
                    <ol>
                        <li><a href="{{ route('admin.dashboard') }}"><i class="ti ti-home"></i>Dashboard</a></li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li>Tài khoản</li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li class="active">{{ Auth::user()->name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Profile Container -->
    <div class="profile-container">
        <!-- Profile Sidebar -->
        <div class="profile-sidebar">
            <div class="profile-card">
                <div class="profile-avatar-section">
                    <div class="avatar-wrapper">
                        <img src="{{ Auth::guard('admin')->user()->image ?? '/assets/admin/images/profile/avatar.jpg' }}" 
                             alt="Avatar" 
                             id="user-avatar"
                             class="profile-avatar">
                        <label for="avatar" class="avatar-edit-btn">
                            <i class="ti ti-camera"></i>
                            <input type="file" 
                                   id="avatar" 
                                   name="avatar" 
                                   accept="image/*" 
                                   hidden 
                                   onchange="previewAvatar(this)">
                        </label>
                    </div>
                    <div class="profile-name-section">
                        <h3>{{ Auth::user()->name }}</h3>
                        <p>{{ Auth::user()->group->name }}</p>
                    </div>
                </div>

                <div class="profile-stats">
                    <div class="stat-item">
                        <i class="ti ti-calendar"></i>
                        <div class="stat-content">
                            <span class="stat-label">Ngày tham gia</span>
                            <span class="stat-value">{{ Auth::user()->created_at->format('d/m/Y') }}</span>
                        </div>
                    </div>
                    <div class="stat-item">
                        <i class="ti ti-shield"></i>
                        <div class="stat-content">
                            <span class="stat-label">Vai trò</span>
                            <span class="stat-value">{{ Auth::user()->group->name }}</span>
                        </div>
                    </div>
                    <div class="stat-item">
                        <i class="ti ti-mail"></i>
                        <div class="stat-content">
                            <span class="stat-label">Email</span>
                            <span class="stat-value">{{ Auth::user()->email }}</span>
                        </div>
                    </div>
                </div>

                <div class="profile-actions">
                    <a href="{{ route('admin.password') }}" class="action-btn">
                        <i class="ti ti-lock"></i>
                        <span>Đổi mật khẩu</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Profile Content -->
        <div class="profile-content">
            <div class="content-card">
                <div class="card-header-custom">
                    <div class="header-icon">
                        <i class="ti ti-info-circle"></i>
                    </div>
                    <div class="header-text">
                        <h3 class="card-title-custom">Thông Tin Cá Nhân</h3>
                        <p class="card-subtitle">Cập nhật thông tin của bạn</p>
                    </div>
                </div>

                <div class="card-body-custom">
                    <form action="{{ route('staff.updateProfile') }}" method="POST" enctype="multipart/form-data" id="profileForm">
                        @csrf
                        
                        <div class="form-grid">
                            <!-- Full Name -->
                            <div class="form-group full-width">
                                <label for="name" class="form-label">
                                    <i class="ti ti-user"></i>
                                    Họ và Tên
                                </label>
                                <div class="input-wrapper">
                                    <input type="text" 
                                           name="name" 
                                           id="name" 
                                           class="form-control" 
                                           value="{{ Auth::guard('admin')->user()->name }}"
                                           placeholder="Nhập họ và tên...">
                                    <span class="input-icon">
                                        <i class="ti ti-user"></i>
                                    </span>
                                </div>
                            </div>

                            <!-- Email (Read-only) -->
                            <div class="form-group">
                                <label for="email" class="form-label">
                                    <i class="ti ti-mail"></i>
                                    Email
                                </label>
                                <div class="input-wrapper">
                                    <input type="email" 
                                           id="email" 
                                           class="form-control" 
                                           value="{{ Auth::guard('admin')->user()->email }}"
                                           readonly>
                                    <span class="input-icon">
                                        <i class="ti ti-mail"></i>
                                    </span>
                                    <span class="readonly-badge">
                                        <i class="ti ti-lock"></i>
                                    </span>
                                </div>
                                <small class="form-hint">
                                    <i class="ti ti-info-circle"></i>
                                    Email không thể thay đổi
                                </small>
                            </div>

                            <!-- Role (Read-only) -->
                            <div class="form-group">
                                <label for="role" class="form-label">
                                    <i class="ti ti-shield"></i>
                                    Chức Vụ
                                </label>
                                <div class="input-wrapper">
                                    <input type="text" 
                                           id="role" 
                                           class="form-control" 
                                           value="{{ Auth::guard('admin')->user()->group->name }}"
                                           readonly>
                                    <span class="input-icon">
                                        <i class="ti ti-shield"></i>
                                    </span>
                                    <span class="readonly-badge">
                                        <i class="ti ti-lock"></i>
                                    </span>
                                </div>
                            </div>

                            <!-- Phone -->
                            <div class="form-group">
                                <label for="phone" class="form-label">
                                    <i class="ti ti-phone"></i>
                                    Số Điện Thoại
                                </label>
                                <div class="input-wrapper">
                                    <input type="text" 
                                           name="phone" 
                                           id="phone" 
                                           class="form-control" 
                                           value="{{ Auth::guard('admin')->user()->phone }}"
                                           placeholder="0123456789">
                                    <span class="input-icon">
                                        <i class="ti ti-phone"></i>
                                    </span>
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="form-group">
                                <label for="address" class="form-label">
                                    <i class="ti ti-map-pin"></i>
                                    Địa Chỉ
                                </label>
                                <div class="input-wrapper">
                                    <input type="text" 
                                           name="address" 
                                           id="address" 
                                           class="form-control" 
                                           value="{{ Auth::guard('admin')->user()->address }}"
                                           placeholder="Nhập địa chỉ...">
                                    <span class="input-icon">
                                        <i class="ti ti-map-pin"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="form-actions">
                            <button type="submit" class="btn-submit">
                                <i class="ti ti-device-floppy"></i>
                                <span>Cập Nhật Thông Tin</span>
                            </button>
                            <button type="reset" class="btn-reset">
                                <i class="ti ti-refresh"></i>
                                <span>Đặt Lại</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Profile Page Specific Styles */
.profile-page {
    padding: 1.5rem;
    background: #f5f7fa;
    min-height: 100vh;
}

/* Profile Container */
.profile-container {
    display: grid;
    grid-template-columns: 380px 1fr;
    gap: 1.5rem;
    max-width: 1400px;
}

/* Profile Sidebar */
.profile-sidebar {
    position: sticky;
    top: 1.5rem;
    height: fit-content;
}

.profile-card {
    background: white;
    border-radius: 1rem;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.profile-avatar-section {
    padding: 2rem;
    background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
    text-align: center;
}

.avatar-wrapper {
    position: relative;
    width: 150px;
    height: 150px;
    margin: 0 auto 1.5rem;
}

.profile-avatar {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    border: 5px solid rgba(255, 255, 255, 0.3);
    object-fit: cover;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
}

.avatar-edit-btn {
    position: absolute;
    bottom: 5px;
    right: 5px;
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, #10b981, #059669);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    border: 3px solid white;
    transition: all 0.3s ease;
    color: white;
    font-size: 1.125rem;
}

.avatar-edit-btn:hover {
    background: linear-gradient(135deg, #059669, #047857);
    transform: scale(1.1);
}

.profile-name-section h3 {
    margin: 0 0 0.5rem 0;
    color: white;
    font-size: 1.5rem;
    font-weight: 700;
}

.profile-name-section p {
    margin: 0;
    color: rgba(255, 255, 255, 0.9);
    font-size: 0.9375rem;
    font-weight: 500;
}

/* Profile Stats */
.profile-stats {
    padding: 1.5rem;
    display: flex;
    flex-direction: column;
    gap: 1rem;
    border-bottom: 1px solid #e5e7eb;
}

.stat-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 0.75rem;
    background: #f9fafb;
    border-radius: 0.75rem;
    transition: all 0.3s ease;
}

.stat-item:hover {
    background: #f3f4f6;
}

.stat-item i {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, #3b82f6, #2563eb);
    border-radius: 0.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.125rem;
    flex-shrink: 0;
}

.stat-content {
    display: flex;
    flex-direction: column;
    gap: 0.125rem;
    flex: 1;
    min-width: 0;
}

.stat-label {
    font-size: 0.8125rem;
    color: #6b7280;
    font-weight: 500;
}

.stat-value {
    font-size: 0.9375rem;
    color: #1f2937;
    font-weight: 600;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

/* Profile Actions */
.profile-actions {
    padding: 1.5rem;
}

.action-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    width: 100%;
    padding: 0.875rem 1.5rem;
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: white;
    border-radius: 0.75rem;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
}

.action-btn:hover {
    background: linear-gradient(135deg, #d97706, #b45309);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
    color: white;
}

/* Card Header Custom */
.card-header-custom {
    padding: 1.5rem 2rem;
    background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
    border-bottom: 2px solid #60a5fa;
    display: flex;
    align-items: center;
    gap: 1rem;
}

.header-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #3b82f6, #2563eb);
    border-radius: 0.75rem;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
}

.header-text {
    flex: 1;
}

.card-title-custom {
    font-size: 1.25rem;
    font-weight: 700;
    color: #1e40af;
    margin: 0;
}

.card-subtitle {
    font-size: 0.875rem;
    color: #3b82f6;
    margin: 0.25rem 0 0 0;
}

.card-body-custom {
    padding: 2rem;
}

/* Form Grid */
.form-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.form-group.full-width {
    grid-column: 1 / -1;
}

.form-label {
    font-size: 0.9375rem;
    font-weight: 600;
    color: #1f2937;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.form-label i {
    color: #3b82f6;
}

/* Input Wrapper */
.input-wrapper {
    position: relative;
}

.form-control {
    width: 100%;
    padding: 0.875rem 1rem 0.875rem 3rem;
    border: 2px solid #e5e7eb;
    border-radius: 0.5rem;
    font-size: 0.9375rem;
    transition: all 0.3s ease;
    background: white;
}

.form-control:focus {
    outline: none;
    border-color: #3b82f6;
    box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
}

.form-control[readonly] {
    background: #f9fafb;
    cursor: not-allowed;
    color: #6b7280;
}

.input-icon {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: #9ca3af;
    font-size: 1.125rem;
}

.form-control:focus + .input-icon {
    color: #3b82f6;
}

.readonly-badge {
    position: absolute;
    right: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: #9ca3af;
    font-size: 1rem;
}

/* Form Hint */
.form-hint {
    display: flex;
    align-items: center;
    gap: 0.375rem;
    font-size: 0.8125rem;
    color: #6b7280;
    margin-top: 0.25rem;
}

.form-hint i {
    color: #3b82f6;
}

/* Form Actions */
.form-actions {
    display: flex;
    gap: 1rem;
    padding-top: 2rem;
    border-top: 2px solid #e5e7eb;
}

.btn-submit,
.btn-reset {
    padding: 0.875rem 2rem;
    border-radius: 0.5rem;
    font-weight: 600;
    font-size: 0.9375rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
}

.btn-submit {
    background: linear-gradient(135deg, #3b82f6, #2563eb);
    color: white;
}

.btn-submit:hover {
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
    transform: translateY(-2px);
    box-shadow: 0 8px 16px rgba(59, 130, 246, 0.3);
}

.btn-reset {
    background: white;
    color: #6b7280;
    border: 2px solid #e5e7eb;
}

.btn-reset:hover {
    border-color: #3b82f6;
    color: #3b82f6;
    transform: translateY(-2px);
}

/* Responsive */
@media (max-width: 1024px) {
    .profile-container {
        grid-template-columns: 1fr;
    }
    
    .profile-sidebar {
        position: relative;
        top: 0;
    }
}

@media (max-width: 768px) {
    .profile-page {
        padding: 1rem;
    }
    
    .form-grid {
        grid-template-columns: 1fr;
    }
    
    .avatar-wrapper {
        width: 120px;
        height: 120px;
    }
    
    .form-actions {
        flex-direction: column;
    }
    
    .btn-submit,
    .btn-reset {
        width: 100%;
        justify-content: center;
    }
}
</style>

<script>
// Preview avatar function
function previewAvatar(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            document.getElementById('user-avatar').src = e.target.result;
        };
        
        reader.readAsDataURL(input.files[0]);
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('profileForm');
    
    // Form submission
    form.addEventListener('submit', function(e) {
        SwalHelper.loading('Đang cập nhật...', 'Vui lòng đợi trong giây lát');
    });
});
</script>

@endsection