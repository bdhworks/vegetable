@extends('frontend.layout.fe')

@section('content')

<!-- Modern Registration Page -->
<section class="register-modern">
    <div class="register-container">
        <div class="register-wrapper">
            <!-- Left Side - Registration Form -->
            <div class="register-form-section">
                <div class="form-container">
                    <div class="form-header">
                        <h2 class="form-title">Tạo tài khoản mới</h2>
                        <p class="form-subtitle">Tham gia cộng đồng và khám phá những sản phẩm nông sản tuyệt vời</p>
                    </div>

                    <!-- Registration Form -->
                    <form class="register-form" action="{{route('registerPost')}}" method="post">
                        @csrf
                        
                        <div class="form-row">
                            <div class="form-group-modern full-width">
                                <label class="form-label">Họ và tên</label>
                                <div class="input-wrapper">
                                    <i class="fa fa-user input-icon"></i>
                                    <input type="text" 
                                           name="name" 
                                           class="form-input {{ $errors->has('name') ? 'error' : '' }}" 
                                           placeholder="Nhập họ và tên đầy đủ"
                                           value="{{ old('name') }}"
                                           required>
                                </div>
                                @error('name')
                                <span class="field-error">
                                    <i class="fa fa-exclamation-circle"></i>
                                    {{$message}}
                                </span>
                                @enderror
                            </div>
                        </div>

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

                        <div class="form-row">
                            <div class="form-group-modern half-width">
                                <label class="form-label">Mật khẩu</label>
                                <div class="input-wrapper">
                                    <i class="fa fa-lock input-icon"></i>
                                    <input type="password" 
                                           name="password" 
                                           class="form-input {{ $errors->has('password') ? 'error' : '' }}" 
                                           placeholder="Tạo mật khẩu mạnh"
                                           id="password"
                                           required>
                                    <button type="button" class="password-toggle" onclick="togglePassword('password', 'password-eye-1')">
                                        <i class="fa fa-eye" id="password-eye-1"></i>
                                    </button>
                                </div>
                                @error('password')
                                <span class="field-error">
                                    <i class="fa fa-exclamation-circle"></i>
                                    {{$message}}
                                </span>
                                @enderror
                            </div>

                            <div class="form-group-modern half-width">
                                <label class="form-label">Xác nhận mật khẩu</label>
                                <div class="input-wrapper">
                                    <i class="fa fa-lock input-icon"></i>
                                    <input type="password" 
                                           name="password_confirmation" 
                                           class="form-input {{ $errors->has('password_confirmation') ? 'error' : '' }}" 
                                           placeholder="Nhập lại mật khẩu"
                                           id="password_confirmation"
                                           required>
                                    <button type="button" class="password-toggle" onclick="togglePassword('password_confirmation', 'password-eye-2')">
                                        <i class="fa fa-eye" id="password-eye-2"></i>
                                    </button>
                                </div>
                                @error('password_confirmation')
                                <span class="field-error">
                                    <i class="fa fa-exclamation-circle"></i>
                                    {{$message}}
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Password Strength Indicator -->
                        <div class="password-strength">
                            <div class="strength-label">Độ mạnh mật khẩu:</div>
                            <div class="strength-bar">
                                <div class="strength-fill" id="strengthFill"></div>
                            </div>
                            <div class="strength-text" id="strengthText">Yếu</div>
                        </div>

                        <!-- Terms and Conditions -->
                        <div class="form-group-modern">
                            <div class="terms-agreement">
                                <div class="checkbox-wrapper">
                                    <input type="checkbox" id="terms" name="terms" required>
                                    <label for="terms" class="checkbox-label">
                                        <span class="checkmark"></span>
                                        <span class="terms-text">
                                            Tôi đồng ý với 
                                            <a href="#" class="terms-link">Điều khoản sử dụng</a> 
                                            và 
                                            <a href="#" class="terms-link">Chính sách bảo mật</a>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Marketing Agreement -->
                        <div class="form-group-modern">
                            <div class="marketing-agreement">
                                <div class="checkbox-wrapper">
                                    <input type="checkbox" id="marketing" name="marketing">
                                    <label for="marketing" class="checkbox-label">
                                        <span class="checkmark"></span>
                                        <span class="marketing-text">
                                            Tôi muốn nhận thông tin khuyến mãi và ưu đãi đặc biệt
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="register-btn">
                            <span class="btn-text">Tạo tài khoản</span>
                            <i class="fa fa-user-plus btn-icon"></i>
                            <div class="btn-loading">
                                <div class="spinner"></div>
                            </div>
                        </button>

                        <div class="divider">
                            <span>hoặc đăng ký với</span>
                        </div>

                        <div class="social-register">
                            <button type="button" class="social-btn google-btn">
                                <i class="fa fa-google"></i>
                                <span>Google</span>
                            </button>
                            <button type="button" class="social-btn facebook-btn">
                                <i class="fa fa-facebook-f"></i>
                                <span>Facebook</span>
                            </button>
                        </div>

                        <div class="login-link">
                            <span>Đã có tài khoản?</span>
                            <a href="{{route('login')}}" class="login-btn-link">Đăng nhập ngay</a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Right Side - Benefits -->
            <div class="register-benefits">
                <div class="benefits-content">
                    <div class="benefits-header">
                        <div class="logo-section">
                            <div class="logo-icon">
                                <i class="fa fa-leaf"></i>
                            </div>
                            <h3 class="logo-text">Nông Sản Việt</h3>
                        </div>
                        <h2 class="benefits-title">Tham gia cùng chúng tôi!</h2>
                        <p class="benefits-subtitle">Trở thành thành viên để nhận những ưu đãi tuyệt vời</p>
                    </div>

                    <div class="benefits-list">
                        <div class="benefit-item">
                            <div class="benefit-icon">
                                <i class="fa fa-gift"></i>
                            </div>
                            <div class="benefit-content">
                                <h4>Ưu đãi độc quyền</h4>
                                <p>Giảm giá 20% cho đơn hàng đầu tiên và nhiều khuyến mãi hấp dẫn khác</p>
                            </div>
                        </div>

                        <div class="benefit-item">
                            <div class="benefit-icon">
                                <i class="fa fa-truck"></i>
                            </div>
                            <div class="benefit-content">
                                <h4>Giao hàng miễn phí</h4>
                                <p>Miễn phí vận chuyển cho tất cả đơn hàng trên 500.000₫</p>
                            </div>
                        </div>

                        <div class="benefit-item">
                            <div class="benefit-icon">
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="benefit-content">
                                <h4>Điểm thưởng</h4>
                                <p>Tích điểm mỗi khi mua hàng và đổi quà tặng hấp dẫn</p>
                            </div>
                        </div>

                        <div class="benefit-item">
                            <div class="benefit-icon">
                                <i class="fa fa-bell"></i>
                            </div>
                            <div class="benefit-content">
                                <h4>Thông báo sớm</h4>
                                <p>Nhận thông báo về sản phẩm mới và chương trình khuyến mãi</p>
                            </div>
                        </div>

                        <div class="benefit-item">
                            <div class="benefit-icon">
                                <i class="fa fa-shield-alt"></i>
                            </div>
                            <div class="benefit-content">
                                <h4>Bảo mật tuyệt đối</h4>
                                <p>Thông tin cá nhân được mã hóa và bảo vệ an toàn</p>
                            </div>
                        </div>

                        <div class="benefit-item">
                            <div class="benefit-icon">
                                <i class="fa fa-headset"></i>
                            </div>
                            <div class="benefit-content">
                                <h4>Hỗ trợ 24/7</h4>
                                <p>Đội ngũ chăm sóc khách hàng luôn sẵn sàng hỗ trợ bạn</p>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial">
                        <div class="testimonial-content">
                            <p>"Tôi rất hài lòng với chất lượng sản phẩm và dịch vụ tại đây. Rau củ luôn tươi ngon!"</p>
                        </div>
                        <div class="testimonial-author">
                            <div class="author-avatar">
                                <img src="{{ asset('/assets/frontend/img/no-avatar.png') }}" alt="Khách hàng">
                            </div>
                            <div class="author-info">
                                <strong>Nguyễn Thị Lan</strong>
                                <span>Khách hàng thân thiết</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Decorative Elements -->
                <div class="benefits-decorations">
                    <div class="decoration-1">🌿</div>
                    <div class="decoration-2">🥕</div>
                    <div class="decoration-3">🍅</div>
                    <div class="decoration-4">🌽</div>
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

/* Register Modern */
.register-modern {
    min-height: 100vh;
    display: flex;
    align-items: center;
    background: linear-gradient(135deg, #f0fdfa 0%, #ecfdf5 100%);
    padding: 20px 0;
}

.register-container {
    width: 100%;
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 20px;
}

.register-wrapper {
    display: grid;
    grid-template-columns: 1.2fr 1fr;
    background: white;
    border-radius: 20px;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
    overflow: hidden;
    min-height: 800px;
}

/* Left Side - Registration Form */
.register-form-section {
    padding: 60px 50px;
    display: flex;
    align-items: center;
}

.form-container {
    width: 100%;
    max-width: 500px;
    margin: 0 auto;
}

.form-header {
    margin-bottom: 40px;
}

.form-title {
    font-size: 2.2rem;
    font-weight: 800;
    color: var(--text-dark);
    margin-bottom: 12px;
    line-height: 1.2;
}

.form-subtitle {
    color: var(--text-light);
    font-size: 1.05rem;
    line-height: 1.5;
    margin: 0;
}

/* Form Styles */
.register-form {
    width: 100%;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin-bottom: 25px;
}

.form-group-modern {
    margin-bottom: 25px;
}

.form-group-modern.full-width {
    margin-bottom: 25px;
}

.form-group-modern.half-width {
    margin-bottom: 0;
}

.form-label {
    display: block;
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 8px;
    font-size: 0.95rem;
}

.input-wrapper {
    position: relative;
}

.input-icon {
    position: absolute;
    left: 16px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-light);
    font-size: 1rem;
    z-index: 2;
}

.form-input {
    width: 100%;
    padding: 16px 20px 16px 52px;
    border: 2px solid var(--border-color);
    border-radius: var(--border-radius);
    font-size: 1rem;
    transition: var(--transition);
    background: white;
    box-sizing: border-box;
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
    right: 16px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: var(--text-light);
    cursor: pointer;
    font-size: 1rem;
    transition: var(--transition);
    z-index: 3;
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

/* Password Strength */
.password-strength {
    margin: 15px 0 25px 0;
    opacity: 0;
    transition: var(--transition);
}

.password-strength.show {
    opacity: 1;
}

.strength-label {
    font-size: 0.85rem;
    color: var(--text-dark);
    margin-bottom: 8px;
    font-weight: 500;
}

.strength-bar {
    height: 6px;
    background: var(--border-color);
    border-radius: 3px;
    overflow: hidden;
    margin-bottom: 6px;
}

.strength-fill {
    height: 100%;
    width: 0%;
    transition: var(--transition);
    border-radius: 3px;
}

.strength-fill.weak { 
    background: var(--accent-color); 
    width: 25%; 
}

.strength-fill.fair { 
    background: #f59e0b; 
    width: 50%; 
}

.strength-fill.good { 
    background: #3b82f6; 
    width: 75%; 
}

.strength-fill.strong { 
    background: var(--success-color); 
    width: 100%; 
}

.strength-text {
    font-size: 0.8rem;
    font-weight: 500;
}

.strength-text.weak { color: var(--accent-color); }
.strength-text.fair { color: #f59e0b; }
.strength-text.good { color: #3b82f6; }
.strength-text.strong { color: var(--success-color); }

/* Checkboxes */
.terms-agreement,
.marketing-agreement {
    margin-bottom: 20px;
}

.checkbox-wrapper {
    display: flex;
    align-items: flex-start;
    gap: 12px;
}

.checkbox-wrapper input[type="checkbox"] {
    display: none;
}

.checkbox-label {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    cursor: pointer;
    line-height: 1.5;
}

.checkmark {
    width: 20px;
    height: 20px;
    border: 2px solid var(--border-color);
    border-radius: 4px;
    position: relative;
    transition: var(--transition);
    flex-shrink: 0;
    margin-top: 1px;
}

.checkmark::after {
    content: '';
    position: absolute;
    left: 6px;
    top: 2px;
    width: 6px;
    height: 10px;
    border: solid white;
    border-width: 0 2px 2px 0;
    transform: rotate(45deg);
    opacity: 0;
    transition: var(--transition);
}

input[type="checkbox"]:checked + .checkbox-label .checkmark {
    background: var(--primary-color);
    border-color: var(--primary-color);
}

input[type="checkbox"]:checked + .checkbox-label .checkmark::after {
    opacity: 1;
}

.terms-text,
.marketing-text {
    font-size: 0.9rem;
    color: var(--text-dark);
}

.terms-link {
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 500;
}

.terms-link:hover {
    text-decoration: underline;
}

.register-btn {
    width: 100%;
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    color: white;
    border: none;
    padding: 16px 20px;
    border-radius: var(--border-radius);
    font-size: 1.05rem;
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

.register-btn:hover {
    transform: translateY(-2px);
    box-shadow: var(--box-shadow-lg);
}

.register-btn.loading .btn-text,
.register-btn.loading .btn-icon {
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

.register-btn.loading .btn-loading {
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

.social-register {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px;
    margin-bottom: 30px;
}

.social-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 12px 16px;
    border: 2px solid var(--border-color);
    border-radius: var(--border-radius);
    background: white;
    cursor: pointer;
    transition: var(--transition);
    font-weight: 500;
    color: var(--text-dark);
    text-decoration: none;
}

.google-btn:hover {
    border-color: #db4437;
    color: #db4437;
}

.facebook-btn:hover {
    border-color: #4267b2;
    color: #4267b2;
}

.login-link {
    text-align: center;
    font-size: 0.95rem;
    color: var(--text-light);
}

.login-btn-link {
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 600;
    margin-left: 5px;
    transition: var(--transition);
}

.login-btn-link:hover {
    color: var(--primary-dark);
    text-decoration: underline;
}

/* Right Side - Benefits */
.register-benefits {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    color: white;
    padding: 60px 40px;
    position: relative;
    overflow: hidden;
}

.benefits-content {
    position: relative;
    z-index: 2;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.benefits-header {
    margin-bottom: 40px;
}

.logo-section {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 30px;
}

.logo-icon {
    width: 45px;
    height: 45px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.3rem;
}

.logo-text {
    font-size: 1.4rem;
    font-weight: 700;
    margin: 0;
}

.benefits-title {
    font-size: 2rem;
    font-weight: 800;
    margin-bottom: 12px;
    line-height: 1.2;
}

.benefits-subtitle {
    font-size: 1.05rem;
    opacity: 0.9;
    line-height: 1.5;
    margin: 0;
}

.benefits-list {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 25px;
    margin-bottom: 40px;
}

.benefit-item {
    display: flex;
    align-items: flex-start;
    gap: 15px;
}

.benefit-icon {
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

.benefit-content h4 {
    font-size: 1.05rem;
    font-weight: 600;
    margin-bottom: 5px;
}

.benefit-content p {
    font-size: 0.9rem;
    opacity: 0.85;
    line-height: 1.4;
    margin: 0;
}

.testimonial {
    background: rgba(255, 255, 255, 0.1);
    padding: 25px;
    border-radius: 15px;
    margin-top: auto;
}

.testimonial-content p {
    font-style: italic;
    font-size: 0.95rem;
    line-height: 1.5;
    margin-bottom: 15px;
    opacity: 0.9;
}

.testimonial-author {
    display: flex;
    align-items: center;
    gap: 12px;
}

.author-avatar {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    overflow: hidden;
}

.author-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.author-info strong {
    display: block;
    font-weight: 600;
    margin-bottom: 2px;
}

.author-info span {
    font-size: 0.85rem;
    opacity: 0.8;
}

.benefits-decorations {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    pointer-events: none;
    z-index: 1;
}

.benefits-decorations > div {
    position: absolute;
    font-size: 2rem;
    opacity: 0.1;
    animation: float 12s ease-in-out infinite;
}

.decoration-1 { top: 15%; right: 15%; animation-delay: 0s; }
.decoration-2 { top: 35%; right: 25%; animation-delay: -3s; }
.decoration-3 { bottom: 35%; right: 10%; animation-delay: -6s; }
.decoration-4 { bottom: 15%; right: 30%; animation-delay: -9s; }

@keyframes float {
    0%, 100% { transform: translateY(0) rotate(0deg); }
    50% { transform: translateY(-15px) rotate(5deg); }
}

/* Responsive Design */
@media (max-width: 1200px) {
    .register-wrapper {
        grid-template-columns: 1fr;
        max-width: 600px;
        margin: 0 auto;
    }

    .register-benefits {
        display: none;
    }

    .register-form-section {
        padding: 50px 40px;
    }
}

@media (max-width: 768px) {
    .register-modern {
        padding: 15px 0;
    }

    .register-container {
        padding: 0 15px;
    }

    .register-wrapper {
        border-radius: 15px;
        min-height: auto;
    }

    .register-form-section {
        padding: 40px 30px;
    }

    .form-container {
        max-width: none;
    }

    .form-title {
        font-size: 1.9rem;
    }

    .form-row {
        grid-template-columns: 1fr;
        gap: 25px;
    }

    .social-register {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 480px) {
    .register-form-section {
        padding: 30px 20px;
    }

    .form-input {
        padding: 14px 16px 14px 48px;
    }

    .register-btn {
        padding: 14px 20px;
    }

    .social-btn {
        padding: 12px 16px;
    }

    .form-title {
        font-size: 1.7rem;
    }
}
</style>

<script>
function togglePassword(inputId, eyeId) {
    const passwordInput = document.getElementById(inputId);
    const passwordEye = document.getElementById(eyeId);
    
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

// Password strength indicator
document.getElementById('password').addEventListener('input', function() {
    const password = this.value;
    const strengthIndicator = document.querySelector('.password-strength');
    const strengthFill = document.getElementById('strengthFill');
    const strengthText = document.getElementById('strengthText');
    
    if (password.length === 0) {
        strengthIndicator.classList.remove('show');
        return;
    }
    
    strengthIndicator.classList.add('show');
    
    let strength = 0;
    let strengthClass = 'weak';
    let strengthLabel = 'Yếu';
    
    // Length check
    if (password.length >= 8) strength++;
    
    // Uppercase check
    if (/[A-Z]/.test(password)) strength++;
    
    // Lowercase check
    if (/[a-z]/.test(password)) strength++;
    
    // Number check
    if (/\d/.test(password)) strength++;
    
    // Special character check
    if (/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(password)) strength++;
    
    // Set strength level
    if (strength >= 4) {
        strengthClass = 'strong';
        strengthLabel = 'Mạnh';
    } else if (strength >= 3) {
        strengthClass = 'good';
        strengthLabel = 'Tốt';
    } else if (strength >= 2) {
        strengthClass = 'fair';
        strengthLabel = 'Trung bình';
    }
    
    // Update UI
    strengthFill.className = `strength-fill ${strengthClass}`;
    strengthText.className = `strength-text ${strengthClass}`;
    strengthText.textContent = strengthLabel;
});

// Form submission with loading state
document.querySelector('.register-form').addEventListener('submit', function(e) {
    const termsCheckbox = document.getElementById('terms');
    if (!termsCheckbox.checked) {
        e.preventDefault();
        alert('Vui lòng đồng ý với điều khoản sử dụng để tiếp tục đăng ký.');
        return;
    }
    
    const submitBtn = document.querySelector('.register-btn');
    submitBtn.classList.add('loading');
});

// Social register handlers (placeholder)
document.querySelector('.google-btn').addEventListener('click', function() {
    console.log('Google register clicked');
    // Implement Google OAuth
});

document.querySelector('.facebook-btn').addEventListener('click', function() {
    console.log('Facebook register clicked');
    // Implement Facebook OAuth
});

// Password confirmation validation
document.getElementById('password_confirmation').addEventListener('input', function() {
    const password = document.getElementById('password').value;
    const confirmPassword = this.value;
    
    if (confirmPassword && password !== confirmPassword) {
        this.classList.add('error');
        this.style.borderColor = 'var(--accent-color)';
    } else {
        this.classList.remove('error');
        this.style.borderColor = '';
    }
});
</script>

@endsection