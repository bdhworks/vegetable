@extends('frontend.layout.fe')

@section('content')

<!-- Modern Breadcrumb -->
<section class="breadcrumb-modern">
    <div class="container">
        <div class="breadcrumb-content">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Liên hệ</li>
                </ol>
            </nav>
            <h1 class="page-title">Liên hệ với chúng tôi</h1>
            <p class="page-subtitle">Chúng tôi luôn sẵn sàng hỗ trợ và tư vấn cho bạn</p>
        </div>
    </div>
</section>

<!-- Contact Hero -->
<section class="contact-hero">
    <div class="container">
        <div class="contact-hero-content">
            <div class="hero-text">
                <h2>Kết nối với chúng tôi</h2>
                <p>Hãy để chúng tôi biết cách chúng tôi có thể hỗ trợ bạn. Đội ngũ chăm sóc khách hàng của chúng tôi luôn sẵn sàng lắng nghe và giải đáp mọi thắc mắc.</p>
                
                <div class="hero-features">
                    <div class="feature-item">
                        <i class="fa fa-clock-o"></i>
                        <span>Phản hồi trong 24h</span>
                    </div>
                    <div class="feature-item">
                        <i class="fa fa-headphones"></i>
                        <span>Hỗ trợ chuyên nghiệp</span>
                    </div>
                    <div class="feature-item">
                        <i class="fa fa-shield"></i>
                        <span>Bảo mật thông tin</span>
                    </div>
                </div>
            </div>
            
            <div class="hero-stats">
                <div class="stat-item">
                    <span class="stat-number">5000+</span>
                    <span class="stat-label">Khách hàng hài lòng</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">24/7</span>
                    <span class="stat-label">Hỗ trợ trực tuyến</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">100%</span>
                    <span class="stat-label">Phản hồi tích cực</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Information -->
<section class="contact-info">
    <div class="container">
        <div class="contact-cards">
            <div class="contact-card">
                <div class="card-icon">
                    <i class="fa fa-phone"></i>
                </div>
                <div class="card-content">
                    <h3>Hotline</h3>
                    <p class="contact-detail">0988888888</p>
                    <span class="contact-note">Miễn phí cuộc gọi</span>
                    <div class="card-actions">
                        <a href="tel:0988888888" class="action-btn">
                            <i class="fa fa-phone"></i>
                            Gọi ngay
                        </a>
                    </div>
                </div>
            </div>

            <div class="contact-card">
                <div class="card-icon">
                    <i class="fa fa-envelope"></i>
                </div>
                <div class="card-content">
                    <h3>Email</h3>
                    <p class="contact-detail">hello@nongsanviet.com</p>
                    <span class="contact-note">Phản hồi trong 24h</span>
                    <div class="card-actions">
                        <a href="mailto:hello@nongsanviet.com" class="action-btn">
                            <i class="fa fa-envelope"></i>
                            Gửi email
                        </a>
                    </div>
                </div>
            </div>

            <div class="contact-card">
                <div class="card-icon">
                    <i class="fa fa-map"></i>
                </div>
                <div class="card-content">
                    <h3>Địa chỉ</h3>
                    <p class="contact-detail">Mê Linh - Mê Linh - Hà Nội</p>
                    <span class="contact-note">Chi nhánh chính</span>
                    <div class="card-actions">
                        <a href="#map" class="action-btn">
                            <i class="fa fa-map"></i>
                            Xem bản đồ
                        </a>
                    </div>
                </div>
            </div>

            <div class="contact-card">
                <div class="card-icon">
                    <i class="fa fa-clock-o"></i>
                </div>
                <div class="card-content">
                    <h3>Giờ làm việc</h3>
                    <p class="contact-detail">08:00 - 22:00</p>
                    <span class="contact-note">Tất cả các ngày trong tuần</span>
                    <div class="card-actions">
                        <span class="status-badge online">
                            <i class="fa fa-circle"></i>
                            Đang mở cửa
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form & Map -->
<section class="contact-main">
    <div class="container">
        <div class="row">
            <!-- Contact Form -->
            <div class="col-lg-8">
                <div class="contact-form-section">
                    <div class="section-header">
                        <h2>Gửi tin nhắn cho chúng tôi</h2>
                        <p>Điền thông tin vào form dưới đây và chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất</p>
                    </div>

                    <form class="contact-form" action="#" method="POST">
                        @csrf
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label">Họ và tên <span class="required">*</span></label>
                                <div class="input-wrapper">
                                    <i class="fa fa-user input-icon"></i>
                                    <input type="text" name="name" class="form-input" placeholder="Nhập họ và tên đầy đủ" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Email <span class="required">*</span></label>
                                <div class="input-wrapper">
                                    <i class="fa fa-envelope input-icon"></i>
                                    <input type="email" name="email" class="form-input" placeholder="Nhập địa chỉ email" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Số điện thoại</label>
                                <div class="input-wrapper">
                                    <i class="fa fa-phone input-icon"></i>
                                    <input type="tel" name="phone" class="form-input" placeholder="Nhập số điện thoại">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Chủ đề</label>
                                <div class="input-wrapper">
                                    <i class="fa fa-tag input-icon"></i>
                                    <select name="subject" class="form-select">
                                        <option value="">Chọn chủ đề</option>
                                        <option value="product">Sản phẩm</option>
                                        <option value="order">Đơn hàng</option>
                                        <option value="shipping">Vận chuyển</option>
                                        <option value="return">Đổi trả</option>
                                        <option value="other">Khác</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group full-width">
                                <label class="form-label">Nội dung <span class="required">*</span></label>
                                <div class="input-wrapper">
                                    <i class="fa fa-pencil input-icon textarea-icon"></i>
                                    <textarea name="message" class="form-textarea" rows="6" placeholder="Nhập nội dung tin nhắn của bạn..." required></textarea>
                                </div>
                            </div>

                            <div class="form-group full-width">
                                <div class="form-checkbox">
                                    <input type="checkbox" id="privacy" name="privacy" required>
                                    <label for="privacy">
                                        Tôi đồng ý với <a href="#" class="privacy-link">Chính sách bảo mật</a> và cho phép xử lý thông tin cá nhân
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="submit-btn">
                                <i class="fa fa-paper-plane"></i>
                                <span>Gửi tin nhắn</span>
                            </button>
                            <button type="reset" class="reset-btn">
                                <i class="fa fa-refresh"></i>
                                <span>Xóa form</span>
                            </button>
                        </div>
                    </form>

                    <!-- Contact Methods -->
                    <div class="contact-methods">
                        <div class="methods-header">
                            <h4>Hoặc liên hệ trực tiếp qua:</h4>
                        </div>
                        <div class="methods-list">
                            <a href="tel:0988888888" class="method-item">
                                <div class="method-icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="method-info">
                                    <h5>Gọi điện</h5>
                                    <p>Nhanh chóng & tiện lợi</p>
                                </div>
                            </a>

                            <a href="https://zalo.me/" class="method-item">
                                <div class="method-icon">
                                    <i class="fa fa-comments"></i>
                                </div>
                                <div class="method-info">
                                    <h5>Zalo</h5>
                                    <p>Chat trực tiếp</p>
                                </div>
                            </a>

                            <a href="https://m.me/" class="method-item">
                                <div class="method-icon">
                                    <i class="fa fa-facebook"></i>
                                </div>
                                <div class="method-info">
                                    <h5>Messenger</h5>
                                    <p>Hỗ trợ 24/7</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="contact-sidebar">
                    <!-- FAQ Widget -->
                    <div class="sidebar-widget faq-widget">
                        <div class="widget-header">
                            <h3>Câu hỏi thường gặp</h3>
                        </div>
                        <div class="widget-content">
                            <div class="faq-list">
                                <div class="faq-item">
                                    <div class="faq-question">
                                        <i class="fa fa-question-circle"></i>
                                        <span>Làm thế nào để đặt hàng?</span>
                                    </div>
                                    <div class="faq-answer">
                                        Bạn có thể đặt hàng trực tiếp trên website hoặc gọi hotline để được hỗ trợ.
                                    </div>
                                </div>

                                <div class="faq-item">
                                    <div class="faq-question">
                                        <i class="fa fa-question-circle"></i>
                                        <span>Thời gian giao hàng?</span>
                                    </div>
                                    <div class="faq-answer">
                                        Chúng tôi giao hàng trong vòng 2-4 giờ tại nội thành và 1-2 ngày tại các tỉnh khác.
                                    </div>
                                </div>

                                <div class="faq-item">
                                    <div class="faq-question">
                                        <i class="fa fa-question-circle"></i>
                                        <span>Chính sách đổi trả?</span>
                                    </div>
                                    <div class="faq-answer">
                                        Chúng tôi hỗ trợ đổi trả trong vòng 7 ngày nếu sản phẩm có vấn đề về chất lượng.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Support Hours -->
                    <div class="sidebar-widget hours-widget">
                        <div class="widget-header">
                            <h3>Giờ hỗ trợ khách hàng</h3>
                        </div>
                        <div class="widget-content">
                            <div class="hours-list">
                                <div class="hours-item">
                                    <span class="day">Thứ 2 - Thứ 6</span>
                                    <span class="time">08:00 - 22:00</span>
                                </div>
                                <div class="hours-item">
                                    <span class="day">Thứ 7 - Chủ nhật</span>
                                    <span class="time">08:00 - 20:00</span>
                                </div>
                            </div>
                            <div class="current-status">
                                <i class="fa fa-circle status-indicator online"></i>
                                <span class="status-text">Hiện tại: Đang mở cửa</span>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="sidebar-widget social-widget">
                        <div class="widget-header">
                            <h3>Theo dõi chúng tôi</h3>
                        </div>
                        <div class="widget-content">
                            <div class="social-links">
                                <a href="#" class="social-link facebook">
                                    <i class="fa fa-facebook"></i>
                                    <span>Facebook</span>
                                </a>
                                <a href="#" class="social-link instagram">
                                    <i class="fa fa-instagram"></i>
                                    <span>Instagram</span>
                                </a>
                                <a href="#" class="social-link youtube">
                                    <i class="fa fa-youtube-play"></i>
                                    <span>YouTube</span>
                                </a>
                                <a href="#" class="social-link tiktok">
                                    <i class="fa fa-music"></i>
                                    <span>TikTok</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="map-section" id="map">
    <div class="map-container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2901.921829968429!2d105.73640963911771!3d21.17201728890668!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134ff0157fdd923%3A0xc9004a6300faa150!2sJ%26T%20Express!5e0!3m2!1svi!2s!4v1719372681744!5m2!1svi!2s" 
                width="100%" 
                height="450" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
        </iframe>
        
        <div class="map-overlay">
            <div class="map-info">
                <div class="map-icon">
                    <i class="fa fa-map-marker"></i>
                </div>
                <div class="map-details">
                    <h4>Chi nhánh Hà Nội</h4>
                    <p>Mê Linh - Mê Linh - Hà Nội</p>
                    <div class="map-actions">
                        <a href="tel:0988888888" class="map-btn">
                            <i class="fa fa-phone"></i>
                            Gọi điện
                        </a>
                        <a href="https://maps.google.com/?q=Mê+Linh+Hà+Nội" target="_blank" class="map-btn">
                            <i class="fa fa-location-arrow"></i>
                            Chỉ đường
                        </a>
                    </div>
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

* {
    box-sizing: border-box;
}

/* Breadcrumb Modern */
.breadcrumb-modern {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    color: white;
    padding: 40px 0;
    position: relative;
    overflow: hidden;
}

.breadcrumb-modern::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="20" height="20" patternUnits="userSpaceOnUse"><path d="M 20 0 L 0 0 0 20" fill="none" stroke="white" stroke-width="0.5" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
}

.breadcrumb-content {
    position: relative;
    z-index: 2;
}

.breadcrumb {
    background: none;
    padding: 0;
    margin-bottom: 20px;
    display: flex;
    list-style: none;
}

.breadcrumb-item {
    display: inline-block;
}

.breadcrumb-item a {
    color: rgba(255, 255, 255, 0.8);
    text-decoration: none;
}

.breadcrumb-item.active {
    color: white;
}

.breadcrumb-item + .breadcrumb-item::before {
    color: rgba(255, 255, 255, 0.6);
    content: "/";
    padding: 0 8px;
}

.page-title {
    font-size: 2.5rem;
    font-weight: 800;
    margin-bottom: 10px;
    margin-top: 0;
}

.page-subtitle {
    font-size: 1.1rem;
    opacity: 0.9;
    margin: 0;
}

/* Contact Hero */
.contact-hero {
    background: white;
    padding: 50px 0;
    border-bottom: 1px solid var(--border-color);
}

.contact-hero-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 50px;
    flex-wrap: wrap;
}

.hero-text {
    flex: 1;
    min-width: 300px;
}

.hero-text h2 {
    font-size: 2rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 15px;
    margin-top: 0;
}

.hero-text p {
    color: var(--text-light);
    font-size: 1.1rem;
    line-height: 1.6;
    margin-bottom: 25px;
}

.hero-features {
    display: flex;
    gap: 25px;
    flex-wrap: wrap;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 8px;
    color: var(--text-dark);
    font-weight: 500;
}

.feature-item i {
    color: var(--primary-color);
    font-size: 1.1rem;
}

.hero-stats {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    min-width: 280px;
}

.stat-item {
    text-align: center;
    padding: 15px;
}

.stat-number {
    display: block;
    font-size: 1.8rem;
    font-weight: 800;
    color: var(--primary-color);
    line-height: 1;
}

.stat-label {
    font-size: 0.85rem;
    color: var(--text-light);
    margin-top: 5px;
    display: block;
}

/* Contact Info */
.contact-info {
    background: var(--light-color);
    padding: 60px 0;
}

.contact-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 25px;
}

.contact-card {
    background: white;
    border-radius: var(--border-radius-lg);
    padding: 30px 20px;
    text-align: center;
    box-shadow: var(--box-shadow);
    transition: var(--transition);
    border: 1px solid var(--border-color);
}

.contact-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--box-shadow-lg);
    border-color: var(--primary-color);
}

.card-icon {
    width: 70px;
    height: 70px;
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    font-size: 1.5rem;
}

.card-content h3 {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--text-dark);
    margin: 0 0 10px 0;
}

.contact-detail {
    font-size: 1rem;
    font-weight: 600;
    color: var(--text-dark);
    margin: 0 0 8px 0;
}

.contact-note {
    color: var(--text-light);
    font-size: 0.85rem;
    margin-bottom: 20px;
    display: block;
}

.card-actions {
    margin-top: 15px;
}

.action-btn {
    background: var(--primary-color);
    color: white;
    padding: 10px 20px;
    border-radius: 25px;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-weight: 500;
    transition: var(--transition);
    font-size: 0.9rem;
}

.action-btn:hover {
    background: var(--primary-dark);
    color: white;
    transform: scale(1.05);
}

.status-badge {
    background: var(--success-color);
    color: white;
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}

.status-badge .fa-circle {
    font-size: 0.6rem;
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.5; }
}

/* Contact Main */
.contact-main {
    background: white;
    padding: 60px 0;
}

.contact-form-section {
    background: white;
    border-radius: var(--border-radius-lg);
    padding: 30px;
    box-shadow: var(--box-shadow);
    margin-bottom: 30px;
}

.section-header {
    margin-bottom: 30px;
}

.section-header h2 {
    font-size: 1.6rem;
    font-weight: 700;
    color: var(--text-dark);
    margin: 0 0 10px 0;
}

.section-header p {
    color: var(--text-light);
    line-height: 1.6;
    margin: 0;
}

/* Form Styles */
.form-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
    margin-bottom: 25px;
}

.form-group {
    margin-bottom: 0;
}

.form-group.full-width {
    grid-column: 1 / -1;
}

.form-label {
    display: block;
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 8px;
    font-size: 0.9rem;
}

.required {
    color: var(--accent-color);
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

.textarea-icon {
    top: 18px;
    transform: none;
}

.form-input,
.form-select,
.form-textarea {
    width: 100%;
    padding: 12px 15px 12px 45px;
    border: 2px solid var(--border-color);
    border-radius: var(--border-radius);
    font-size: 0.95rem;
    transition: var(--transition);
    background: white;
    font-family: inherit;
}

.form-textarea {
    resize: vertical;
    min-height: 120px;
}

.form-input:focus,
.form-select:focus,
.form-textarea:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
}

.form-checkbox {
    display: flex;
    align-items: flex-start;
    gap: 10px;
}

.form-checkbox input[type="checkbox"] {
    width: 18px;
    height: 18px;
    accent-color: var(--primary-color);
    margin-top: 2px;
    flex-shrink: 0;
}

.form-checkbox label {
    color: var(--text-dark);
    line-height: 1.5;
    font-size: 0.9rem;
}

.privacy-link {
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 500;
}

.privacy-link:hover {
    text-decoration: underline;
}

.form-actions {
    display: flex;
    gap: 15px;
    align-items: center;
    flex-wrap: wrap;
}

.submit-btn,
.reset-btn {
    padding: 12px 25px;
    border-radius: var(--border-radius);
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: var(--transition);
    border: none;
    font-size: 0.95rem;
}

.submit-btn {
    background: var(--primary-color);
    color: white;
}

.submit-btn:hover {
    background: var(--primary-dark);
    transform: translateY(-2px);
}

.reset-btn {
    background: var(--light-color);
    color: var(--text-dark);
    border: 1px solid var(--border-color);
}

.reset-btn:hover {
    background: var(--border-color);
}

/* Contact Methods */
.contact-methods {
    margin-top: 30px;
    padding-top: 25px;
    border-top: 1px solid var(--border-color);
}

.methods-header h4 {
    color: var(--text-dark);
    font-weight: 600;
    margin: 0 0 15px 0;
    font-size: 1.1rem;
}

.methods-list {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
}

.method-item {
    display: flex;
    align-items: center;
    gap: 12px;
    background: var(--light-color);
    padding: 15px;
    border-radius: var(--border-radius);
    text-decoration: none;
    color: var(--text-dark);
    transition: var(--transition);
}

.method-item:hover {
    background: var(--primary-color);
    color: white;
    transform: translateY(-2px);
}

.method-icon {
    width: 40px;
    height: 40px;
    background: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
    transition: var(--transition);
    flex-shrink: 0;
}

.method-item:hover .method-icon {
    background: var(--primary-dark);
    color: white;
}

.method-info {
    flex: 1;
}

.method-info h5 {
    font-size: 0.95rem;
    font-weight: 600;
    margin: 0 0 3px 0;
}

.method-info p {
    font-size: 0.8rem;
    margin: 0;
    opacity: 0.8;
}

/* Sidebar */
.contact-sidebar {
    position: sticky;
    top: 20px;
}

.sidebar-widget {
    background: white;
    border-radius: var(--border-radius-lg);
    margin-bottom: 25px;
    box-shadow: var(--box-shadow);
    overflow: hidden;
}

.widget-header {
    padding: 18px 20px;
    border-bottom: 1px solid var(--border-color);
    background: var(--light-color);
}

.widget-header h3 {
    margin: 0;
    font-size: 1.05rem;
    font-weight: 700;
    color: var(--text-dark);
}

.widget-content {
    padding: 20px;
}

/* FAQ */
.faq-list {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.faq-item {
    border-bottom: 1px solid var(--border-color);
    padding-bottom: 12px;
}

.faq-item:last-child {
    border-bottom: none;
    padding-bottom: 0;
}

.faq-question {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    margin-bottom: 8px;
    font-weight: 600;
    color: var(--text-dark);
    cursor: pointer;
    font-size: 0.9rem;
}

.faq-question i {
    color: var(--primary-color);
    margin-top: 2px;
    flex-shrink: 0;
}

.faq-answer {
    color: var(--text-light);
    font-size: 0.85rem;
    line-height: 1.5;
    padding-left: 25px;
    display: none;
}

/* Hours */
.hours-list {
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin-bottom: 12px;
}

.hours-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 12px;
    background: var(--light-color);
    border-radius: var(--border-radius);
}

.day {
    font-weight: 500;
    color: var(--text-dark);
    font-size: 0.9rem;
}

.time {
    font-weight: 600;
    color: var(--primary-color);
    font-size: 0.9rem;
}

.current-status {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 10px 12px;
    background: rgba(34, 197, 94, 0.1);
    border-radius: var(--border-radius);
}

.status-indicator {
    font-size: 0.6rem;
}

.status-indicator.online {
    color: var(--success-color);
}

.status-text {
    font-weight: 500;
    color: var(--success-color);
    font-size: 0.9rem;
}

/* Social Links */
.social-links {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 10px;
}

.social-link {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    gap: 10px;
    padding: 12px 15px;
    background: var(--light-color);
    border-radius: var(--border-radius);
    text-decoration: none;
    color: var(--text-dark);
    font-weight: 500;
    transition: var(--transition);
    font-size: 0.9rem;
}

.social-link i {
    width: 24px;
    font-size: 1.2rem;
    text-align: center;
    flex-shrink: 0;
}

.social-link span {
    flex: 1;
    text-align: left;
}

.social-link:hover {
    transform: translateY(-2px);
    box-shadow: var(--box-shadow);
}

.social-link.facebook:hover {
    background: #3b5998;
    color: white;
}

.social-link.facebook:hover i {
    color: white;
}

.social-link.instagram:hover {
    background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
    color: white;
}

.social-link.instagram:hover i {
    color: white;
}

.social-link.youtube:hover {
    background: #ff0000;
    color: white;
}

.social-link.youtube:hover i {
    color: white;
}

.social-link.tiktok:hover {
    background: #000000;
    color: white;
}

.social-link.tiktok:hover i {
    color: white;
}

/* Map Section */
.map-section {
    position: relative;
    margin-top: 40px;
}

.map-container {
    position: relative;
    width: 100%;
    height: 450px;
}

.map-container iframe {
    width: 100%;
    height: 100%;
}

.map-overlay {
    position: absolute;
    bottom: 25px;
    left: 25px;
    z-index: 10;
}

.map-info {
    background: white;
    border-radius: var(--border-radius-lg);
    padding: 20px;
    box-shadow: var(--box-shadow-lg);
    display: flex;
    gap: 15px;
    align-items: flex-start;
    max-width: 380px;
}

.map-icon {
    width: 45px;
    height: 45px;
    background: var(--primary-color);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    flex-shrink: 0;
}

.map-details {
    flex: 1;
}

.map-details h4 {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--text-dark);
    margin: 0 0 8px 0;
}

.map-details p {
    color: var(--text-light);
    margin: 0 0 12px 0;
    font-size: 0.9rem;
}

.map-actions {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}

.map-btn {
    background: var(--primary-color);
    color: white;
    padding: 8px 15px;
    border-radius: 20px;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 0.85rem;
    font-weight: 500;
    transition: var(--transition);
}

.map-btn:hover {
    background: var(--primary-dark);
    color: white;
    transform: scale(1.05);
}

/* Responsive Design */
@media (max-width: 1024px) {
    .contact-hero-content {
        flex-direction: column;
        text-align: center;
        gap: 30px;
    }

    .hero-text {
        max-width: 100%;
    }

    .hero-stats {
        width: 100%;
        max-width: 500px;
        margin: 0 auto;
    }

    .hero-features {
        justify-content: center;
    }
}

@media (max-width: 768px) {
    .page-title {
        font-size: 1.8rem;
    }

    .page-subtitle {
        font-size: 1rem;
    }

    .contact-hero {
        padding: 30px 0;
    }

    .contact-info {
        padding: 40px 0;
    }

    .contact-main {
        padding: 40px 0;
    }

    .contact-cards {
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .hero-stats {
        grid-template-columns: 1fr;
        gap: 12px;
    }

    .form-grid {
        grid-template-columns: 1fr;
        gap: 15px;
    }

    .form-actions {
        flex-direction: column;
        width: 100%;
    }

    .submit-btn,
    .reset-btn {
        width: 100%;
        justify-content: center;
    }

    .contact-sidebar {
        margin-top: 25px;
        position: static;
    }

    .map-overlay {
        bottom: 15px;
        left: 15px;
        right: 15px;
    }

    .map-info {
        max-width: none;
    }

    .methods-list {
        grid-template-columns: 1fr;
    }

    .contact-form-section {
        padding: 25px 20px;
    }

    .social-links {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 576px) {
    .breadcrumb-modern {
        padding: 25px 0;
    }

    .page-title {
        font-size: 1.5rem;
    }

    .hero-text h2 {
        font-size: 1.5rem;
    }

    .hero-text p {
        font-size: 1rem;
    }

    .hero-features {
        flex-direction: column;
        gap: 12px;
        align-items: center;
    }

    .contact-card {
        padding: 25px 15px;
    }

    .card-icon {
        width: 60px;
        height: 60px;
        font-size: 1.3rem;
    }

    .map-info {
        flex-direction: column;
        text-align: center;
        padding: 15px;
    }

    .map-actions {
        justify-content: center;
    }

    .widget-content,
    .widget-header {
        padding: 15px;
    }

    .section-header h2 {
        font-size: 1.3rem;
    }
}

@media (max-width: 480px) {
    .stat-item {
        padding: 10px;
    }

    .stat-number {
        font-size: 1.5rem;
    }

    .stat-label {
        font-size: 0.8rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Form submission
    const contactForm = document.querySelector('.contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Show success message
            alert('Cảm ơn bạn đã liên hệ! Chúng tôi sẽ phản hồi trong thời gian sớm nhất.');
            
            // Reset form
            this.reset();
        });
    }

    // FAQ toggle
    const faqQuestions = document.querySelectorAll('.faq-question');
    faqQuestions.forEach(question => {
        question.addEventListener('click', function() {
            const answer = this.nextElementSibling;
            const isVisible = answer.style.display === 'block';
            
            // Hide all answers
            document.querySelectorAll('.faq-answer').forEach(ans => {
                ans.style.display = 'none';
            });
            
            // Toggle current answer
            if (!isVisible) {
                answer.style.display = 'block';
            }
        });
    });

    // Update current status based on time
    function updateStatus() {
        const now = new Date();
        const hour = now.getHours();
        const statusIndicator = document.querySelector('.status-indicator');
        const statusText = document.querySelector('.status-text');
        const statusBadge = document.querySelector('.status-badge');
        
        if (hour >= 8 && hour < 22) {
            statusIndicator.classList.add('online');
            statusText.textContent = 'Hiện tại: Đang mở cửa';
            if (statusBadge) {
                statusBadge.classList.add('online');
                statusBadge.innerHTML = '<i class="fa fa-circle"></i> Đang mở cửa';
            }
        } else {
            statusIndicator.classList.remove('online');
            statusIndicator.style.color = '#ef4444';
            statusText.textContent = 'Hiện tại: Đã đóng cửa';
            statusText.style.color = '#ef4444';
            if (statusBadge) {
                statusBadge.classList.remove('online');
                statusBadge.style.background = '#ef4444';
                statusBadge.innerHTML = '<i class="fa fa-circle"></i> Đã đóng cửa';
            }
        }
    }

    updateStatus();
    setInterval(updateStatus, 60000); // Update every minute

    // Smooth scroll to map
    document.querySelectorAll('a[href="#map"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector('#map').scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    // Phone number formatting
    const phoneInput = document.querySelector('input[type="tel"]');
    if (phoneInput) {
        phoneInput.addEventListener('input', function() {
            let value = this.value.replace(/\D/g, '');
            if (value.length > 10) {
                value = value.substring(0, 10);
            }
            this.value = value;
        });
    }
});
</script>

@endsection
