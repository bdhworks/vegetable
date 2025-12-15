@extends('admin.layout.be')

@section('content')
<div class="password-page">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <div class="header-left">
                <h1 class="page-title">
                    <i class="ti ti-lock"></i>
                    Đổi Mật Khẩu
                </h1>
                <nav class="breadcrumb-modern">
                    <ol>
                        <li><a href="{{ route('admin.dashboard') }}"><i class="ti ti-home"></i>Dashboard</a></li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li>Tài khoản</li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li class="active">Đổi mật khẩu</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Main Form Card -->
    <div class="form-container">
        <div class="content-card">
            <div class="card-header-custom">
                <div class="header-icon">
                    <i class="ti ti-shield-lock"></i>
                </div>
                <div class="header-text">
                    <h3 class="card-title-custom">Bảo Mật Tài Khoản</h3>
                    <p class="card-subtitle">Thay đổi mật khẩu của bạn để bảo vệ tài khoản</p>
                </div>
            </div>

            <div class="card-body-custom">
                <form action="{{ route('admin.change-password') }}" method="POST" id="passwordForm">
                    @csrf
                    
                    <div class="form-grid">
                        <!-- Old Password -->
                        <div class="form-group full-width">
                            <label for="old_password" class="form-label required">
                                <i class="ti ti-lock-open"></i>
                                Mật Khẩu Hiện Tại
                            </label>
                            <div class="input-wrapper">
                                <input type="password" 
                                       name="old_password" 
                                       id="old_password" 
                                       class="form-control @error('old_password') is-invalid @enderror" 
                                       placeholder="Nhập mật khẩu hiện tại..."
                                       required>
                                <span class="input-icon">
                                    <i class="ti ti-lock-open"></i>
                                </span>
                                <button type="button" class="toggle-password" onclick="togglePassword('old_password')">
                                    <i class="ti ti-eye" id="old_password-icon"></i>
                                </button>
                            </div>
                            @error('old_password')
                                <div class="error-message">
                                    <i class="ti ti-alert-circle"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                            <small class="form-hint">
                                <i class="ti ti-info-circle"></i>
                                Nhập mật khẩu hiện tại của bạn để xác thực
                            </small>
                        </div>

                        <!-- New Password -->
                        <div class="form-group">
                            <label for="password" class="form-label required">
                                <i class="ti ti-lock"></i>
                                Mật Khẩu Mới
                            </label>
                            <div class="input-wrapper">
                                <input type="password" 
                                       name="password" 
                                       id="password" 
                                       class="form-control @error('password') is-invalid @enderror" 
                                       placeholder="Nhập mật khẩu mới..."
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
                                Tối thiểu 8 ký tự, bao gồm chữ và số
                            </small>
                            <!-- Password Strength Indicator -->
                            <div class="password-strength" id="password-strength">
                                <div class="strength-bar">
                                    <div class="strength-fill" id="strength-fill"></div>
                                </div>
                                <span class="strength-text" id="strength-text">Độ mạnh mật khẩu</span>
                            </div>
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
                                       placeholder="Nhập lại mật khẩu mới..."
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
                            <div class="password-match" id="password-match" style="display: none;">
                                <i class="ti ti-check"></i>
                                <span>Mật khẩu khớp</span>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="form-actions">
                        <button type="submit" class="btn-submit">
                            <i class="ti ti-device-floppy"></i>
                            <span>Đổi Mật Khẩu</span>
                        </button>
                        <button type="reset" class="btn-reset">
                            <i class="ti ti-refresh"></i>
                            <span>Đặt Lại</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Info Card -->
        <div class="info-card">
            <div class="info-header">
                <i class="ti ti-shield-check"></i>
                <h4>Bảo Mật</h4>
            </div>
            <div class="info-body">
                <div class="info-item">
                    <div class="info-icon success">
                        <i class="ti ti-check"></i>
                    </div>
                    <div class="info-content">
                        <h5>Mật Khẩu Mạnh</h5>
                        <p>Sử dụng ít nhất 8 ký tự với sự kết hợp của chữ cái, số và ký tự đặc biệt</p>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon warning">
                        <i class="ti ti-alert-triangle"></i>
                    </div>
                    <div class="info-content">
                        <h5>Tránh Sử Dụng</h5>
                        <p>Không dùng thông tin cá nhân như tên, ngày sinh, số điện thoại</p>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon info">
                        <i class="ti ti-refresh"></i>
                    </div>
                    <div class="info-content">
                        <h5>Thay Đổi Định Kỳ</h5>
                        <p>Nên đổi mật khẩu mỗi 3-6 tháng để tăng cường bảo mật</p>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon primary">
                        <i class="ti ti-lock"></i>
                    </div>
                    <div class="info-content">
                        <h5>Bảo Mật Tài Khoản</h5>
                        <p>Không chia sẻ mật khẩu với người khác và đăng xuất sau khi sử dụng</p>
                    </div>
                </div>
            </div>
            
            <div class="info-footer">
                <div class="tip-box">
                    <i class="ti ti-bulb"></i>
                    <div>
                        <strong>Gợi ý:</strong> Sử dụng trình quản lý mật khẩu để lưu trữ mật khẩu an toàn
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Password Page - No Duplicates from Layout */
.password-page {
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
    color: #f59e0b;
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
    background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
    border-bottom: 2px solid #fbbf24;
    display: flex;
    align-items: center;
    gap: 1rem;
}

.header-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #f59e0b, #d97706);
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
    color: #92400e;
    margin: 0;
}

.card-subtitle {
    font-size: 0.875rem;
    color: #b45309;
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
    color: #f59e0b;
}

/* Input Wrapper */
.input-wrapper {
    position: relative;
}

.form-control {
    width: 100%;
    padding: 0.875rem 3rem 0.875rem 3rem;
    border: 2px solid var(--border-color);
    border-radius: var(--radius-sm);
    font-size: 0.9375rem;
    transition: all 0.3s ease;
    background: white;
    color: var(--text-primary);
}

.form-control:focus {
    outline: none;
    border-color: #f59e0b;
    box-shadow: 0 0 0 4px rgba(245, 158, 11, 0.1);
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
    color: #f59e0b;
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
    color: #f59e0b;
}

/* Password Strength Indicator */
.password-strength {
    margin-top: 0.5rem;
}

.strength-bar {
    height: 6px;
    background: var(--border-color);
    border-radius: 3px;
    overflow: hidden;
    margin-bottom: 0.5rem;
}

.strength-fill {
    height: 100%;
    width: 0;
    transition: all 0.3s ease;
    border-radius: 3px;
}

.strength-text {
    font-size: 0.8125rem;
    font-weight: 600;
    color: var(--text-secondary);
}

/* Password Match Indicator */
.password-match {
    display: flex;
    align-items: center;
    gap: 0.375rem;
    font-size: 0.8125rem;
    color: var(--primary-color);
    margin-top: 0.5rem;
    font-weight: 600;
}

.password-match i {
    font-size: 1rem;
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
    color: #f59e0b;
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
.btn-reset {
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
}

.btn-submit {
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: white;
    box-shadow: var(--shadow-sm);
}

.btn-submit:hover {
    background: linear-gradient(135deg, #d97706, #b45309);
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

.btn-submit:active {
    transform: translateY(0);
}

.btn-reset {
    background: white;
    color: var(--text-secondary);
    border: 2px solid var(--border-color);
}

.btn-reset:hover {
    border-color: #f59e0b;
    color: #f59e0b;
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
    background: linear-gradient(135deg, #dbeafe, #bfdbfe);
    border-top: 2px solid #60a5fa;
}

.tip-box {
    display: flex;
    gap: 0.75rem;
    align-items: flex-start;
}

.tip-box i {
    font-size: 1.25rem;
    color: #1e40af;
    flex-shrink: 0;
    margin-top: 0.125rem;
}

.tip-box div {
    font-size: 0.8125rem;
    color: #1e3a8a;
    line-height: 1.5;
}

.tip-box strong {
    font-weight: 700;
    color: #1e40af;
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
    .password-page {
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
    .btn-reset {
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

// Password strength checker
function checkPasswordStrength(password) {
    let strength = 0;
    const strengthFill = document.getElementById('strength-fill');
    const strengthText = document.getElementById('strength-text');
    
    // Length check
    if (password.length >= 8) strength += 25;
    if (password.length >= 12) strength += 25;
    
    // Contains lowercase
    if (/[a-z]/.test(password)) strength += 15;
    
    // Contains uppercase
    if (/[A-Z]/.test(password)) strength += 15;
    
    // Contains number
    if (/[0-9]/.test(password)) strength += 10;
    
    // Contains special char
    if (/[^A-Za-z0-9]/.test(password)) strength += 10;
    
    // Update UI
    strengthFill.style.width = strength + '%';
    
    if (strength < 30) {
        strengthFill.style.background = 'linear-gradient(135deg, #ef4444, #dc2626)';
        strengthText.textContent = 'Yếu';
        strengthText.style.color = '#ef4444';
    } else if (strength < 60) {
        strengthFill.style.background = 'linear-gradient(135deg, #f59e0b, #d97706)';
        strengthText.textContent = 'Trung bình';
        strengthText.style.color = '#f59e0b';
    } else if (strength < 80) {
        strengthFill.style.background = 'linear-gradient(135deg, #3b82f6, #2563eb)';
        strengthText.textContent = 'Tốt';
        strengthText.style.color = '#3b82f6';
    } else {
        strengthFill.style.background = 'linear-gradient(135deg, #10b981, #059669)';
        strengthText.textContent = 'Rất mạnh';
        strengthText.style.color = '#10b981';
    }
}

// Check password match
function checkPasswordMatch() {
    const password = document.getElementById('password').value;
    const confirmation = document.getElementById('password_confirmation').value;
    const matchIndicator = document.getElementById('password-match');
    
    if (confirmation.length > 0) {
        if (password === confirmation) {
            matchIndicator.style.display = 'flex';
        } else {
            matchIndicator.style.display = 'none';
        }
    } else {
        matchIndicator.style.display = 'none';
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('passwordForm');
    const passwordInput = document.getElementById('password');
    const confirmationInput = document.getElementById('password_confirmation');
    
    // Password strength checker
    passwordInput.addEventListener('input', function() {
        checkPasswordStrength(this.value);
    });
    
    // Password match checker
    confirmationInput.addEventListener('input', checkPasswordMatch);
    passwordInput.addEventListener('input', checkPasswordMatch);
    
    // Form validation
    form.addEventListener('submit', function(e) {
        const oldPassword = document.getElementById('old_password').value.trim();
        const password = document.getElementById('password').value;
        const confirmation = document.getElementById('password_confirmation').value;
        
        if (!oldPassword || !password || !confirmation) {
            e.preventDefault();
            SwalHelper.error('Lỗi!', 'Vui lòng điền đầy đủ thông tin');
            return false;
        }
        
        if (password !== confirmation) {
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
        SwalHelper.loading('Đang đổi mật khẩu...', 'Vui lòng đợi trong giây lát');
    });
});
</script>

@endsection