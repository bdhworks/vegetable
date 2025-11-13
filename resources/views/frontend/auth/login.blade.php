@extends('frontend.layout.fe')

@section('content')

<!-- Modern Login Page -->
<section class="login-modern">
    <div class="login-container">
        <div class="login-wrapper">
            <!-- Left Side - Branding -->
            <div class="login-brand">
                <div class="brand-content">
                    <div class="brand-logo">
                        <div class="logo-icon">
                            <i class="fa fa-leaf"></i>
                        </div>
                        <h2 class="brand-name">Nông Sản Việt</h2>
                    </div>
                    <h3 class="brand-title">Chào mừng trở lại!</h3>
                    <p class="brand-subtitle">Đăng nhập để trải nghiệm mua sắm tuyệt vời với các sản phẩm nông sản tươi ngon, chất lượng cao.</p>
                    
                    <div class="brand-features">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fa fa-shield"></i>
                            </div>
                            <div class="feature-text">
                                <h5>Bảo mật tuyệt đối</h5>
                                <p>Thông tin cá nhân được mã hóa và bảo vệ an toàn</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fa fa-truck"></i>
                            </div>
                            <div class="feature-text">
                                <h5>Giao hàng nhanh chóng</h5>
                                <p>Nhận hàng trong 2-4 giờ tại nội thành</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fa fa-heart"></i>
                            </div>
                            <div class="feature-text">
                                <h5>Chăm sóc tận tình</h5>
                                <p>Hỗ trợ khách hàng 24/7 với đội ngũ chuyên nghiệp</p>
                            </div>
                        </div>
                    </div>

                    <div class="brand-stats">
                        <div class="stat-item">
                            <span class="stat-number">5000+</span>
                            <span class="stat-label">Khách hàng</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">100%</span>
                            <span class="stat-label">Tự nhiên</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">4.9★</span>
                            <span class="stat-label">Đánh giá</span>
                        </div>
                    </div>
                </div>
                
                <!-- Decorative Elements -->
                <div class="brand-decorations">
                    <div class="decoration-1">🌱</div>
                    <div class="decoration-2">🍃</div>
                    <div class="decoration-3">🥕</div>
                    <div class="decoration-4">🍅</div>
                </div>
            </div>

            <!-- Right Side - Login Form -->
            <div class="login-form-section">
                <div class="form-container">
                    <div class="form-header">
                        <h2 class="form-title">Đăng nhập</h2>
                        <p class="form-subtitle">Vui lòng nhập thông tin đăng nhập của bạn</p>
                    </div>

                    <!-- Success/Error Messages -->
                    @if (session('success'))
                    <div class="alert alert-success-modern">
                        <div class="alert-icon">
                            <i class="fa fa-check-circle"></i>
                        </div>
                        <div class="alert-content">
                            <strong>Thành công!</strong>
                            <span>{{ session('success') }}</span>
                        </div>
                    </div>
                    @endif

                    @error('status')
                    <div class="alert alert-error-modern">
                        <div class="alert-icon">
                            <i class="fa fa-exclamation-triangle"></i>
                        </div>
                        <div class="alert-content">
                            <strong>Lỗi!</strong>
                            <span>{{$message}}</span>
                        </div>
                    </div>
                    @enderror

                    <!-- Login Form -->
                    <form class="login-form" action="{{route('loginPost')}}" method="post">
                        @csrf
                        
                        <div class="form-group-modern">
                            <label class="form-label">Địa chỉ email</label>
                            <div class="input-wrapper">
                                <i class="fa fa-envelope input-icon"></i>
                                <input type="email" 
                                       name="email" 
                                       class="form-input {{ $errors->has('email') ? 'error' : '' }}" 
                                       placeholder="Nhập địa chỉ email của bạn"
                                       value="{{ old('email') }}"
                                       required>
                            </div>
                            @error('email')
                            <span class="field-error">
                                <i class="fa fa-exclamation-circle"></i>
                                {{$message}}
                            </span>
                            @enderror
                        </div>

                        <div class="form-group-modern">
                            <label class="form-label">Mật khẩu</label>
                            <div class="input-wrapper">
                                <i class="fa fa-lock input-icon"></i>
                                <input type="password" 
                                       name="password" 
                                       class="form-input {{ $errors->has('password') ? 'error' : '' }}" 
                                       placeholder="Nhập mật khẩu của bạn"
                                       required>
                                <button type="button" class="password-toggle" onclick="togglePassword()">
                                    <i class="fa fa-eye" id="password-eye"></i>
                                </button>
                            </div>
                            @error('password')
                            <span class="field-error">
                                <i class="fa fa-exclamation-circle"></i>
                                {{$message}}
                            </span>
                            @enderror
                        </div>

                        <div class="form-options">
                            <div class="remember-me">
                                <input type="checkbox" id="remember" name="remember">
                                <label for="remember">Ghi nhớ đăng nhập</label>
                            </div>
                            <a href="{{route('password.request')}}" class="forgot-password">
                                Quên mật khẩu?
                            </a>
                        </div>

                        <button type="submit" class="login-btn">
                            <span class="btn-text">Đăng nhập</span>
                            <i class="fa fa-arrow-right btn-icon"></i>
                            <div class="btn-loading">
                                <div class="spinner"></div>
                            </div>
                        </button>

                        <div class="divider">
                            <span>hoặc</span>
                        </div>

                        <div class="social-login">
                            <button type="button" class="social-btn google-btn">
                                <i class="fa fa-google"></i>
                                <span>Đăng nhập với Google</span>
                            </button>
                            <button type="button" class="social-btn facebook-btn">
                                <i class="fa fa-facebook-f"></i>
                                <span>Đăng nhập với Facebook</span>
                            </button>
                        </div>

                        <div class="signup-link">
                            <span>Chưa có tài khoản?</span>
                            <a href="{{route('register')}}" class="signup-btn">Đăng ký ngay</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
:root {
    --primary-color: #10b981;
    --primary-dark: #059669;
    --primary-light: #34d399;
    --secondary-color: #f59e0b;
    --accent-color: #ef4444;
    --success-color: #22c55e;
    --dark-color: #1f2937;
    --light-color: #f9fafb;
    --border-color: #e5e7eb;
    --text-dark: #374151;
    --text-light: #6b7280;
    --white: #ffffff;
    --box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    --box-shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    --border-radius: 8px;
    --border-radius-lg: 12px;
    --transition: all 0.3s ease;
}

/* Login Modern */
.login-modern {
    min-height: 100vh;
    display: flex;
    align-items: center;
    background: linear-gradient(135deg, #f0fdfa 0%, #ecfdf5 100%);
    padding: 20px 0;
}

.login-container {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.login-wrapper {
    display: grid;
    grid-template-columns: 1fr 1fr;
    background: white;
    border-radius: 20px;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
    overflow: hidden;
    min-height: 700px;
}

/* Left Side - Branding */
.login-brand {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    color: white;
    padding: 60px 40px;
    position: relative;
    overflow: hidden;
}

.brand-content {
    position: relative;
    z-index: 2;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.brand-logo {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 40px;
}

.logo-icon {
    width: 50px;
    height: 50px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
}

.brand-name {
    font-size: 1.5rem;
    font-weight: 800;
    margin: 0;
}

.brand-title {
    font-size: 2.2rem;
    font-weight: 800;
    margin-bottom: 15px;
    line-height: 1.2;
}

.brand-subtitle {
    font-size: 1.1rem;
    opacity: 0.9;
    line-height: 1.6;
    margin-bottom: 40px;
}

.brand-features {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 25px;
    margin-bottom: 40px;
}

.feature-item {
    display: flex;
    align-items: flex-start;
    gap: 15px;
}

.feature-icon {
    width: 40px;
    height: 40px;
    background: rgba(255, 255, 255, 0.15);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
    flex-shrink: 0;
}

.feature-text h5 {
    font-size: 1rem;
    font-weight: 600;
    margin-bottom: 5px;
}

.feature-text p {
    font-size: 0.9rem;
    opacity: 0.8;
    line-height: 1.4;
    margin: 0;
}

.brand-stats {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    margin-top: auto;
}

.stat-item {
    text-align: center;
    padding: 15px 10px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 10px;
}

.stat-number {
    display: block;
    font-size: 1.5rem;
    font-weight: 800;
    margin-bottom: 5px;
}

.stat-label {
    font-size: 0.8rem;
    opacity: 0.8;
}

.brand-decorations {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    pointer-events: none;
    z-index: 1;
}

.brand-decorations > div {
    position: absolute;
    font-size: 2rem;
    opacity: 0.1;
    animation: float 10s ease-in-out infinite;
}

.decoration-1 { top: 10%; right: 10%; animation-delay: 0s; }
.decoration-2 { top: 30%; right: 25%; animation-delay: -2s; }
.decoration-3 { bottom: 30%; right: 15%; animation-delay: -4s; }
.decoration-4 { bottom: 10%; right: 30%; animation-delay: -6s; }

@keyframes float {
    0%, 100% { transform: translateY(0) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(10deg); }
}

/* Right Side - Login Form */
.login-form-section {
    padding: 60px 40px;
    display: flex;
    align-items: center;
    background: white;
}

.form-container {
    width: 100%;
    max-width: 400px;
    margin: 0 auto;
}

.form-header {
    text-align: center;
    margin-bottom: 40px;
}

.form-title {
    font-size: 2rem;
    font-weight: 800;
    color: var(--text-dark);
    margin-bottom: 10px;
}

.form-subtitle {
    color: var(--text-light);
    font-size: 1rem;
    margin: 0;
}

/* Alert Messages */
.alert-success-modern,
.alert-error-modern {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 15px;
    border-radius: var(--border-radius);
    margin-bottom: 25px;
    font-size: 0.9rem;
}

.alert-success-modern {
    background: rgba(34, 197, 94, 0.1);
    border: 1px solid rgba(34, 197, 94, 0.2);
    color: #166534;
}

.alert-error-modern {
    background: rgba(239, 68, 68, 0.1);
    border: 1px solid rgba(239, 68, 68, 0.2);
    color: #dc2626;
}

.alert-icon {
    font-size: 1.1rem;
}

.alert-content strong {
    font-weight: 600;
}

/* Form Styles */
.login-form {
    width: 100%;
}

.form-group-modern {
    margin-bottom: 25px;
}

.form-label {
    display: block;
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 8px;
    font-size: 0.9rem;
}

.input-wrapper {
    position: relative;
}

.input-icon {
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-light);
    font-size: 1rem;
    z-index: 2;
}

.form-input {
    width: 100%;
    padding: 15px 20px 15px 50px;
    border: 2px solid var(--border-color);
    border-radius: var(--border-radius);
    font-size: 1rem;
    transition: var(--transition);
    background: white;
}

.form-input:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
}

.form-input.error {
    border-color: var(--accent-color);
}

.password-toggle {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: var(--text-light);
    cursor: pointer;
    font-size: 1rem;
    transition: var(--transition);
}

.password-toggle:hover {
    color: var(--primary-color);
}

.field-error {
    display: flex;
    align-items: center;
    gap: 6px;
    color: var(--accent-color);
    font-size: 0.85rem;
    margin-top: 6px;
    font-weight: 500;
}

.form-options {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
}

.remember-me {
    display: flex;
    align-items: center;
    gap: 8px;
}

.remember-me input[type="checkbox"] {
    width: 16px;
    height: 16px;
    accent-color: var(--primary-color);
}

.remember-me label {
    font-size: 0.9rem;
    color: var(--text-dark);
    cursor: pointer;
}

.forgot-password {
    color: var(--primary-color);
    text-decoration: none;
    font-size: 0.9rem;
    font-weight: 500;
    transition: var(--transition);
}

.forgot-password:hover {
    color: var(--primary-dark);
}

.login-btn {
    width: 100%;
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    color: white;
    border: none;
    padding: 15px 20px;
    border-radius: var(--border-radius);
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    transition: var(--transition);
    margin-bottom: 25px;
    position: relative;
    overflow: hidden;
}

.login-btn:hover {
    transform: translateY(-2px);
    box-shadow: var(--box-shadow-lg);
}

.login-btn.loading .btn-text,
.login-btn.loading .btn-icon {
    opacity: 0;
}

.btn-loading {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    opacity: 0;
    transition: var(--transition);
}

.login-btn.loading .btn-loading {
    opacity: 1;
}

.spinner {
    width: 20px;
    height: 20px;
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-top: 2px solid white;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.divider {
    text-align: center;
    margin: 25px 0;
    position: relative;
}

.divider::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    height: 1px;
    background: var(--border-color);
}

.divider span {
    background: white;
    color: var(--text-light);
    padding: 0 15px;
    font-size: 0.9rem;
    position: relative;
}

.social-login {
    display: flex;
    flex-direction: column;
    gap: 12px;
    margin-bottom: 30px;
}

.social-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    padding: 12px 20px;
    border: 2px solid var(--border-color);
    border-radius: var(--border-radius);
    background: white;
    cursor: pointer;
    transition: var(--transition);
    font-weight: 500;
}

.google-btn:hover {
    border-color: #db4437;
    color: #db4437;
}

.facebook-btn:hover {
    border-color: #4267b2;
    color: #4267b2;
}

.signup-link {
    text-align: center;
    font-size: 0.9rem;
    color: var(--text-light);
}

.signup-btn {
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 600;
    margin-left: 5px;
    transition: var(--transition);
}

.signup-btn:hover {
    color: var(--primary-dark);
    text-decoration: underline;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .login-wrapper {
        grid-template-columns: 1fr;
        max-width: 500px;
        margin: 0 auto;
    }

    .login-brand {
        display: none;
    }

    .login-form-section {
        padding: 40px 30px;
    }
}

@media (max-width: 768px) {
    .login-modern {
        padding: 10px 0;
    }

    .login-container {
        padding: 0 15px;
    }

    .login-wrapper {
        border-radius: 15px;
        min-height: auto;
    }

    .login-form-section {
        padding: 30px 20px;
    }

    .form-container {
        max-width: none;
    }

    .form-title {
        font-size: 1.8rem;
    }

    .brand-stats {
        grid-template-columns: 1fr;
        gap: 15px;
    }

    .form-options {
        flex-direction: column;
        gap: 15px;
        align-items: flex-start;
    }

    .social-login {
        flex-direction: column;
    }
}

@media (max-width: 480px) {
    .form-input {
        padding: 12px 15px 12px 45px;
    }

    .login-btn {
        padding: 12px 20px;
    }

    .social-btn {
        padding: 10px 15px;
    }
}
</style>

<script>
function togglePassword() {
    const passwordInput = document.querySelector('input[name="password"]');
    const passwordEye = document.getElementById('password-eye');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        passwordEye.classList.remove('fa-eye');
        passwordEye.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        passwordEye.classList.remove('fa-eye-slash');
        passwordEye.classList.add('fa-eye');
    }
}

// Form submission with loading state
document.querySelector('.login-form').addEventListener('submit', function() {
    const submitBtn = document.querySelector('.login-btn');
    submitBtn.classList.add('loading');
});

// Social login handlers (placeholder)
document.querySelector('.google-btn').addEventListener('click', function() {
    console.log('Google login clicked');
    // Implement Google OAuth
});

document.querySelector('.facebook-btn').addEventListener('click', function() {
    console.log('Facebook login clicked');
    // Implement Facebook OAuth
});

// Auto-remove alerts after 5 seconds
document.querySelectorAll('.alert-success-modern, .alert-error-modern').forEach(alert => {
    setTimeout(() => {
        alert.style.opacity = '0';
        alert.style.transform = 'translateY(-10px)';
        setTimeout(() => {
            alert.remove();
        }, 300);
    }, 5000);
});
</script>

@endsection
