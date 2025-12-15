@extends('admin.layout.be')

@section('content')
<div class="staff-create-page">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <div class="header-left">
                <h1 class="page-title">
                    <i class="ti ti-user-plus"></i>
                    Thêm Nhân Viên Mới
                </h1>
                <nav class="breadcrumb-modern">
                    <ol>
                        <li><a href="{{ route('admin.dashboard') }}"><i class="ti ti-home"></i>Dashboard</a></li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li><a href="{{ route('staff.index') }}">Nhân viên</a></li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li class="active">Thêm mới</li>
                    </ol>
                </nav>
            </div>
            <div class="header-right">
                <a href="{{ route('staff.index') }}" class="btn-back">
                    <i class="ti ti-arrow-left"></i>
                    <span>Quay lại</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Main Form Card -->
    <div class="form-container">
        <div class="content-card">
            <div class="card-header-custom">
                <div class="header-icon">
                    <i class="ti ti-user"></i>
                </div>
                <div class="header-text">
                    <h3 class="card-title-custom">Thông tin Nhân Viên</h3>
                    <p class="card-subtitle">Vui lòng điền đầy đủ thông tin bên dưới</p>
                </div>
            </div>

            <div class="card-body-custom">
                <form action="{{ route('staff.store') }}" method="POST" id="staffForm">
                    @csrf
                    
                    <div class="form-grid">
                        <!-- Full Name -->
                        <div class="form-group full-width">
                            <label for="name" class="form-label required">
                                <i class="ti ti-user"></i>
                                Họ và Tên
                            </label>
                            <div class="input-wrapper">
                                <input type="text" 
                                       name="name" 
                                       id="name" 
                                       class="form-control @error('name') is-invalid @enderror" 
                                       placeholder="Nhập họ và tên đầy đủ..."
                                       value="{{ old('name') }}"
                                       required>
                                <span class="input-icon">
                                    <i class="ti ti-user"></i>
                                </span>
                            </div>
                            @error('name')
                                <div class="error-message">
                                    <i class="ti ti-alert-circle"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email" class="form-label required">
                                <i class="ti ti-mail"></i>
                                Email
                            </label>
                            <div class="input-wrapper">
                                <input type="email" 
                                       name="email" 
                                       id="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       placeholder="email@example.com"
                                       value="{{ old('email') }}"
                                       required>
                                <span class="input-icon">
                                    <i class="ti ti-mail"></i>
                                </span>
                            </div>
                            @error('email')
                                <div class="error-message">
                                    <i class="ti ti-alert-circle"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                            <small class="form-hint">
                                <i class="ti ti-info-circle"></i>
                                Email sẽ dùng để đăng nhập vào hệ thống
                            </small>
                        </div>

                        <!-- Group/Role -->
                        <div class="form-group">
                            <label for="group_id" class="form-label required">
                                <i class="ti ti-shield"></i>
                                Chức Vụ
                            </label>
                            <div class="input-wrapper">
                                <select name="group_id" 
                                        id="group_id" 
                                        class="form-control @error('group_id') is-invalid @enderror"
                                        required>
                                    <option value="" disabled selected>--- Chọn chức vụ ---</option>
                                    @foreach ($groups as $item)
                                        <option value="{{ $item->id }}" {{ old('group_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="input-icon">
                                    <i class="ti ti-shield"></i>
                                </span>
                            </div>
                            @error('group_id')
                                <div class="error-message">
                                    <i class="ti ti-alert-circle"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                            <small class="form-hint">
                                <i class="ti ti-info-circle"></i>
                                Chức vụ xác định quyền truy cập của nhân viên
                            </small>
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <label for="password" class="form-label required">
                                <i class="ti ti-lock"></i>
                                Mật Khẩu
                            </label>
                            <div class="input-wrapper">
                                <input type="password" 
                                       name="password" 
                                       id="password" 
                                       class="form-control @error('password') is-invalid @enderror" 
                                       placeholder="Nhập mật khẩu..."
                                       required>
                                <span class="input-icon">
                                    <i class="ti ti-lock"></i>
                                </span>
                                <button type="button" class="toggle-password" onclick="togglePassword('password')">
                                    <i class="ti ti-eye" id="password-icon"></i>
                                </button>
                            </div>
                            @error('password')
                                <div class="error-message">
                                    <i class="ti ti-alert-circle"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                            <small class="form-hint">
                                <i class="ti ti-info-circle"></i>
                                Mật khẩu tối thiểu 8 ký tự
                            </small>
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group">
                            <label for="password_confirmation" class="form-label required">
                                <i class="ti ti-lock-check"></i>
                                Xác Nhận Mật Khẩu
                            </label>
                            <div class="input-wrapper">
                                <input type="password" 
                                       name="password_confirmation" 
                                       id="password_confirmation" 
                                       class="form-control @error('password_confirmation') is-invalid @enderror" 
                                       placeholder="Nhập lại mật khẩu..."
                                       required>
                                <span class="input-icon">
                                    <i class="ti ti-lock-check"></i>
                                </span>
                                <button type="button" class="toggle-password" onclick="togglePassword('password_confirmation')">
                                    <i class="ti ti-eye" id="password_confirmation-icon"></i>
                                </button>
                            </div>
                            @error('password_confirmation')
                                <div class="error-message">
                                    <i class="ti ti-alert-circle"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="form-actions">
                        <button type="submit" class="btn-submit">
                            <i class="ti ti-device-floppy"></i>
                            <span>Lưu Nhân Viên</span>
                        </button>
                        <a href="{{ route('staff.index') }}" class="btn-cancel">
                            <i class="ti ti-x"></i>
                            <span>Hủy bỏ</span>
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Info Card -->
        <div class="info-card">
            <div class="info-header">
                <i class="ti ti-info-circle"></i>
                <h4>Hướng dẫn</h4>
            </div>
            <div class="info-body">
                <div class="info-item">
                    <div class="info-icon success">
                        <i class="ti ti-user-check"></i>
                    </div>
                    <div class="info-content">
                        <h5>Thông Tin Cá Nhân</h5>
                        <p>Nhập đầy đủ họ tên và email hợp lệ cho nhân viên</p>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon info">
                        <i class="ti ti-shield"></i>
                    </div>
                    <div class="info-content">
                        <h5>Phân Quyền</h5>
                        <p>Chọn chức vụ phù hợp để cấp quyền truy cập tương ứng</p>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon warning">
                        <i class="ti ti-lock"></i>
                    </div>
                    <div class="info-content">
                        <h5>Mật Khẩu</h5>
                        <p>Mật khẩu nên có ít nhất 8 ký tự, bao gồm chữ và số</p>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon primary">
                        <i class="ti ti-mail"></i>
                    </div>
                    <div class="info-content">
                        <h5>Email Đăng Nhập</h5>
                        <p>Email sẽ được sử dụng làm tên đăng nhập vào hệ thống</p>
                    </div>
                </div>
            </div>
            
            <div class="info-footer">
                <div class="tip-box">
                    <i class="ti ti-bulb"></i>
                    <div>
                        <strong>Lưu ý:</strong> Sau khi tạo tài khoản, nhân viên có thể đổi mật khẩu trong phần cài đặt cá nhân
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Staff Create Page - No Duplicates from Layout */
.staff-create-page {
    padding: 1.5rem;
    min-height: 100vh;
}

/* Page Header */
.page-header {
    margin-bottom: 1.5rem;
}

.header-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
}

.page-title {
    font-size: 1.75rem;
    font-weight: 700;
    color: var(--text-primary);
    margin: 0 0 0.5rem 0;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.page-title i {
    font-size: 2rem;
    color: #3b82f6;
}

.breadcrumb-modern {
    margin: 0;
}

.breadcrumb-modern ol {
    display: flex;
    align-items: center;
    list-style: none;
    padding: 0;
    margin: 0;
    font-size: 0.875rem;
    color: var(--text-secondary);
}

.breadcrumb-modern li {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.breadcrumb-modern a {
    color: var(--text-secondary);
    text-decoration: none;
    transition: color 0.2s;
    display: flex;
    align-items: center;
    gap: 0.375rem;
}

.breadcrumb-modern a:hover {
    color: var(--primary-color);
}

.breadcrumb-modern .active {
    color: var(--text-primary);
    font-weight: 500;
}

.header-right {
    display: flex;
    gap: 0.75rem;
}

.btn-back {
    background: white;
    color: var(--text-secondary);
    border: 2px solid var(--border-color);
    padding: 0.75rem 1.5rem;
    border-radius: var(--radius-sm);
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
    text-decoration: none;
    font-size: 0.9375rem;
}

.btn-back:hover {
    border-color: #3b82f6;
    color: #3b82f6;
    transform: translateX(-4px);
}

/* Form Container */
.form-container {
    display: grid;
    grid-template-columns: 1fr 380px;
    gap: 1.5rem;
    max-width: 1400px;
}

/* Content Card */
.content-card {
    background: white;
    border-radius: var(--radius-md);
    box-shadow: var(--shadow-sm);
    overflow: hidden;
}

/* Card Header Custom */
.card-header-custom {
    padding: 1.5rem;
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
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
    flex-shrink: 0;
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
    color: var(--text-primary);
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.form-label.required::after {
    content: '*';
    color: #ef4444;
    margin-left: 0.25rem;
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
    border: 2px solid var(--border-color);
    border-radius: var(--radius-sm);
    font-size: 0.9375rem;
    transition: all 0.3s ease;
    background: white;
    color: var(--text-primary);
}

.form-control:focus {
    outline: none;
    border-color: #3b82f6;
    box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
}

.form-control.is-invalid {
    border-color: #ef4444;
}

.form-control.is-invalid:focus {
    box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.1);
}

.input-icon {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: #9ca3af;
    font-size: 1.125rem;
    pointer-events: none;
}

.form-control:focus ~ .input-icon {
    color: #3b82f6;
}

/* Select Dropdown */
select.form-control {
    cursor: pointer;
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%239ca3af' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 1rem center;
    padding-right: 3rem;
}

select.form-control:focus {
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%233b82f6' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
}

/* Toggle Password */
.toggle-password {
    position: absolute;
    right: 1rem;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: #9ca3af;
    cursor: pointer;
    padding: 0.25rem;
    font-size: 1.125rem;
    transition: color 0.3s ease;
}

.toggle-password:hover {
    color: #3b82f6;
}

/* Form Hint */
.form-hint {
    display: flex;
    align-items: center;
    gap: 0.375rem;
    font-size: 0.8125rem;
    color: var(--text-secondary);
    margin-top: 0.25rem;
}

.form-hint i {
    color: #3b82f6;
    font-size: 0.875rem;
}

/* Error Message */
.error-message {
    display: flex;
    align-items: center;
    gap: 0.375rem;
    font-size: 0.875rem;
    color: #dc2626;
    margin-top: 0.5rem;
    padding: 0.5rem 0.75rem;
    background: #fef2f2;
    border-radius: 0.375rem;
    border-left: 3px solid #ef4444;
    font-weight: 500;
}

.error-message i {
    font-size: 1rem;
}

/* Form Actions */
.form-actions {
    display: flex;
    gap: 1rem;
    padding-top: 2rem;
    border-top: 2px solid var(--border-color);
}

.btn-submit,
.btn-cancel {
    padding: 0.875rem 2rem;
    border-radius: var(--radius-sm);
    font-weight: 600;
    font-size: 0.9375rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    text-decoration: none;
}

.btn-submit {
    background: linear-gradient(135deg, #3b82f6, #2563eb);
    color: white;
    box-shadow: var(--shadow-sm);
}

.btn-submit:hover {
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

.btn-submit:active {
    transform: translateY(0);
}

.btn-cancel {
    background: white;
    color: var(--text-secondary);
    border: 2px solid var(--border-color);
}

.btn-cancel:hover {
    border-color: #ef4444;
    color: #ef4444;
    transform: translateY(-2px);
}

/* Info Card */
.info-card {
    background: white;
    border-radius: var(--radius-md);
    box-shadow: var(--shadow-sm);
    overflow: hidden;
    height: fit-content;
    position: sticky;
    top: 90px;
}

.info-header {
    padding: 1.25rem 1.5rem;
    background: linear-gradient(135deg, #d1fae5, #a7f3d0);
    border-bottom: 2px solid #6ee7b7;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.info-header i {
    font-size: 1.5rem;
    color: #065f46;
}

.info-header h4 {
    margin: 0;
    font-size: 1.125rem;
    font-weight: 700;
    color: #065f46;
}

.info-body {
    padding: 1.5rem;
}

.info-item {
    display: flex;
    gap: 1rem;
    margin-bottom: 1.5rem;
    padding-bottom: 1.5rem;
    border-bottom: 1px solid var(--border-color);
}

.info-item:last-child {
    margin-bottom: 0;
    padding-bottom: 0;
    border-bottom: none;
}

.info-icon {
    width: 40px;
    height: 40px;
    border-radius: var(--radius-sm);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    flex-shrink: 0;
    font-size: 1.125rem;
}

.info-icon.primary {
    background: linear-gradient(135deg, #3b82f6, #2563eb);
}

.info-icon.success {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
}

.info-icon.info {
    background: linear-gradient(135deg, #8b5cf6, #7c3aed);
}

.info-icon.warning {
    background: linear-gradient(135deg, #f59e0b, #d97706);
}

.info-content h5 {
    margin: 0 0 0.375rem 0;
    font-size: 0.9375rem;
    font-weight: 600;
    color: var(--text-primary);
}

.info-content p {
    margin: 0;
    font-size: 0.8125rem;
    color: var(--text-secondary);
    line-height: 1.5;
}

/* Info Footer */
.info-footer {
    padding: 1rem 1.5rem;
    background: linear-gradient(135deg, #fef3c7, #fde68a);
    border-top: 2px solid #fbbf24;
}

.tip-box {
    display: flex;
    gap: 0.75rem;
    align-items: flex-start;
}

.tip-box i {
    font-size: 1.25rem;
    color: #92400e;
    flex-shrink: 0;
    margin-top: 0.125rem;
}

.tip-box div {
    font-size: 0.8125rem;
    color: #78350f;
    line-height: 1.5;
}

.tip-box strong {
    font-weight: 700;
    color: #92400e;
}

/* Responsive */
@media (max-width: 1024px) {
    .form-container {
        grid-template-columns: 1fr;
    }
    
    .info-card {
        position: relative;
        top: 0;
    }
}

@media (max-width: 768px) {
    .staff-create-page {
        padding: 1rem;
    }
    
    .page-title {
        font-size: 1.5rem;
    }
    
    .form-grid {
        grid-template-columns: 1fr;
    }
    
    .card-body-custom {
        padding: 1.5rem;
    }
    
    .form-actions {
        flex-direction: column;
    }
    
    .btn-submit,
    .btn-cancel {
        width: 100%;
        justify-content: center;
    }
    
    .card-header-custom {
        flex-direction: column;
        text-align: center;
    }
    
    .header-icon,
    .header-text {
        width: 100%;
    }
    
    .header-content {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .btn-back {
        width: 100%;
        justify-content: center;
    }
}
</style>

<script>
// Toggle password visibility
function togglePassword(fieldId) {
    const field = document.getElementById(fieldId);
    const icon = document.getElementById(fieldId + '-icon');
    
    if (field.type === 'password') {
        field.type = 'text';
        icon.classList.remove('ti-eye');
        icon.classList.add('ti-eye-off');
    } else {
        field.type = 'password';
        icon.classList.remove('ti-eye-off');
        icon.classList.add('ti-eye');
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('staffForm');
    
    // Form validation
    form.addEventListener('submit', function(e) {
        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const groupId = document.getElementById('group_id').value;
        const password = document.getElementById('password').value;
        const passwordConfirmation = document.getElementById('password_confirmation').value;
        
        if (!name || !email || !groupId || !password || !passwordConfirmation) {
            e.preventDefault();
            SwalHelper.error('Lỗi!', 'Vui lòng điền đầy đủ thông tin');
            return false;
        }
        
        if (password !== passwordConfirmation) {
            e.preventDefault();
            SwalHelper.error('Lỗi!', 'Mật khẩu xác nhận không khớp');
            return false;
        }
        
        if (password.length < 8) {
            e.preventDefault();
            SwalHelper.error('Lỗi!', 'Mật khẩu phải có ít nhất 8 ký tự');
            return false;
        }
        
        // Show loading
        SwalHelper.loading('Đang tạo tài khoản...', 'Vui lòng đợi trong giây lát');
    });
});
</script>

@endsection