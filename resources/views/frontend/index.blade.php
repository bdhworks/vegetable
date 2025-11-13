@extends('frontend.layout.fe')

@section('content')

    <!-- Modern Hero Section Begin -->
    <section class="modern-hero">
        <div class="container-fluid p-0">
            <div class="hero-content" style="background: linear-gradient(135deg, rgba(16, 185, 129, 0.8), rgba(5, 150, 105, 0.9)), url('/assets/frontend/img/hero/banner-main.jpg'); background-size: cover; background-position: center; height: 85vh;">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-lg-6">
                            <div class="hero-text">
                                <div class="hero-badge-modern">
                                    <i class="fa fa-leaf"></i>
                                    <span>NÔNG SẢN VIỆT NAM</span>
                                </div>
                                <h1 class="hero-title-modern">
                                    Nông sản <span class="text-highlight">sạch</span><br>
                                    Chất lượng <span class="text-highlight">hàng đầu</span>
                                </h1>
                                <p class="hero-description-modern">
                                    Cung cấp nông sản tự nhiên, tươi ngon từ các nông trại uy tín. 
                                    Đảm bảo an toàn thực phẩm và dinh dưỡng cao cho gia đình bạn.
                                </p>
                                
                                <div class="hero-features">
                                    <div class="hero-feature-item">
                                        <i class="fa fa-shield-alt"></i>
                                        <span>An toàn 100%</span>
                                    </div>
                                    <div class="hero-feature-item">
                                        <i class="fa fa-truck"></i>
                                        <span>Giao nhanh 2h</span>
                                    </div>
                                    <div class="hero-feature-item">
                                        <i class="fa fa-medal"></i>
                                        <span>Chất lượng cao</span>
                                    </div>
                                </div>

                                <div class="hero-actions-modern">
                                    <a href="{{route('shop')}}" class="btn-hero primary">
                                        <span>Mua sắm ngay</span>
                                        <i class="fa fa-arrow-right"></i>
                                    </a>
                                    <a href="#about" class="btn-hero secondary">
                                        <span>Tìm hiểu thêm</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="hero-visual">
                                <div class="offer-card-modern">
                                    <div class="offer-header">
                                        <div class="offer-icon">🎯</div>
                                        <h3>Ưu đãi hôm nay</h3>
                                    </div>
                                    <div class="offer-content">
                                        <div class="discount-percentage">25%</div>
                                        <p>Giảm giá cho đơn hàng đầu tiên</p>
                                        <div class="countdown-modern" id="countdown">
                                            <div class="time-item">
                                                <span class="number">12</span>
                                                <span class="label">Giờ</span>
                                            </div>
                                            <div class="separator">:</div>
                                            <div class="time-item">
                                                <span class="number">45</span>
                                                <span class="label">Phút</span>
                                            </div>
                                            <div class="separator">:</div>
                                            <div class="time-item">
                                                <span class="number">30</span>
                                                <span class="label">Giây</span>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{route('shop')}}" class="claim-btn">Nhận ưu đãi</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Background Decorations -->
                <div class="hero-decorations">
                    <div class="decoration-1">🌱</div>
                    <div class="decoration-2">🍃</div>
                    <div class="decoration-3">🌿</div>
                    <div class="decoration-4">🥕</div>
                    <div class="decoration-5">🍅</div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modern Hero Section End -->

    <!-- Trust & Stats Section - Fixed -->
    <section class="trust-stats-section py-4">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card-enhanced">
                        <div class="stat-icon-enhanced">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="stat-content-enhanced">
                            <h4 class="stat-number-enhanced" data-count="5000">5,000+</h4>
                            <p class="stat-label-enhanced">Khách hàng tin tưởng</p>
                        </div>
                        <div class="stat-background-pattern"></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card-enhanced">
                        <div class="stat-icon-enhanced">
                            <i class="fa fa-leaf"></i>
                        </div>
                        <div class="stat-content-enhanced">
                            <h4 class="stat-number-enhanced" data-count="100">100%</h4>
                            <p class="stat-label-enhanced">Sản phẩm tự nhiên</p>
                        </div>
                        <div class="stat-background-pattern"></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card-enhanced">
                        <div class="stat-icon-enhanced">
                            <i class="fa fa-truck"></i>
                        </div>
                        <div class="stat-content-enhanced">
                            <h4 class="stat-number-enhanced" data-count="24">24h</h4>
                            <p class="stat-label-enhanced">Giao hàng nhanh</p>
                        </div>
                        <div class="stat-background-pattern"></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card-enhanced">
                        <div class="stat-icon-enhanced">
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="stat-content-enhanced">
                            <h4 class="stat-number-enhanced" data-count="4.9">4.9★</h4>
                            <p class="stat-label-enhanced">Điểm đánh giá</p>
                        </div>
                        <div class="stat-background-pattern"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us Section - Redesigned -->
    <section id="about" class="about-section-redesigned py-5">
        <div class="container">
            <!-- Section Header -->
            <div class="text-center mb-5">
                <div class="section-badge-modern">
                    <i class="fa fa-leaf"></i>
                    <span>Về chúng tôi</span>
                </div>
                <h2 class="section-title-redesigned">
                    Câu chuyện của <span class="text-gradient">Nông Sản Việt</span>
                </h2>
                <p class="section-subtitle-redesigned">
                    Hành trình mang đến những sản phẩm nông sản sạch, tươi ngon nhất cho gia đình Việt
                </p>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="about-content-redesigned">
                        <!-- Story Content -->
                        <div class="story-section">
                            <div class="story-badge">
                                <span>🌱</span>
                                <span>Khởi nguồn</span>
                            </div>
                            <h3 class="story-heading">Từ tình yêu đất Việt</h3>
                            <p class="story-description">
                                Với hơn 5 năm kinh nghiệm trong ngành, chúng tôi tự hào là cầu nối tin cậy 
                                giữa những nông trại uy tín khắp Việt Nam và bàn ăn gia đình bạn. 
                                Mỗi sản phẩm đều được chọn lọc kỹ càng, đảm bảo chất lượng tốt nhất.
                            </p>
                        </div>

                        <!-- Values List -->
                        <div class="values-list">
                            <div class="value-item">
                                <div class="value-check">
                                    <i class="fa fa-check"></i>
                                </div>
                                <div class="value-content">
                                    <h5>Nguồn gốc xuất xứ rõ ràng</h5>
                                    <p>100% sản phẩm có tem truy xuất nguồn gốc</p>
                                </div>
                            </div>

                            <div class="value-item">
                                <div class="value-check">
                                    <i class="fa fa-check"></i>
                                </div>
                                <div class="value-content">
                                    <h5>Chứng nhận chất lượng quốc tế</h5>
                                    <p>Đạt tiêu chuẩn VietGAP, GlobalGAP</p>
                                </div>
                            </div>

                            <div class="value-item">
                                <div class="value-check">
                                    <i class="fa fa-check"></i>
                                </div>
                                <div class="value-content">
                                    <h5>Cam kết phục vụ tận tâm</h5>
                                    <p>Luôn đặt sức khỏe khách hàng lên hàng đầu</p>
                                </div>
                            </div>
                        </div>

                        <!-- Stats -->
                        <div class="about-stats">
                            <div class="stat-item">
                                <span class="stat-number">5+</span>
                                <span class="stat-label">Năm kinh nghiệm</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">5000+</span>
                                <span class="stat-label">Khách hàng</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">100+</span>
                                <span class="stat-label">Nông trại</span>
                            </div>
                        </div>

                        <!-- CTA Button -->
                        <div class="about-actions">
                            <a href="#" class="btn-about-redesigned">
                                <span>Tìm hiểu thêm</span>
                                <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="about-visual-redesigned">
                        <div class="visual-grid">
                            <div class="visual-card main-card">
                                <img src="/assets/frontend/img/about/about-main.jpg" alt="Nông trại sạch" class="img-fluid">
                                <div class="card-overlay">
                                    <h4>Nông trại sạch</h4>
                                    <p>Quy trình canh tác hiện đại</p>
                                </div>
                            </div>
                            <div class="visual-card side-card-1">
                                <img src="/assets/frontend/img/about/about-1.jpg" alt="Thu hoạch" class="img-fluid">
                                <div class="card-overlay">
                                    <h5>Thu hoạch tươi</h5>
                                </div>
                            </div>
                            <div class="visual-card side-card-2">
                                <img src="/assets/frontend/img/about/about-2.jpg" alt="Chất lượng" class="img-fluid">
                                <div class="card-overlay">
                                    <h5>Kiểm tra chất lượng</h5>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Floating Badge -->
                        <div class="floating-badge">
                            <div class="badge-content">
                                <span class="badge-emoji">🏆</span>
                                <div class="badge-text">
                                    <strong>Top 1</strong>
                                    <span>Uy tín</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Products Section - Redesigned -->
    <section id="products" class="products-section-redesigned py-5">
        <div class="container">
            <!-- Section Header -->
            <div class="text-center mb-5">
                <div class="section-badge-modern">
                    <i class="fa fa-fire"></i>
                    <span>Sản phẩm nổi bật</span>
                </div>
                <h2 class="section-title-redesigned">Sản phẩm bán chạy nhất</h2>
                <p class="section-subtitle-redesigned">Những sản phẩm được yêu thích và đánh giá cao nhất</p>
            </div>

            <!-- Product Filter -->
            <div class="product-filter-redesigned mb-5">
                <div class="filter-container">
                    <button class="filter-btn active" data-filter="all">
                        <span class="filter-icon">🌟</span>
                        <span>Tất cả</span>
                    </button>
                    <button class="filter-btn" data-filter="vegetables">
                        <span class="filter-icon">🥬</span>
                        <span>Rau củ</span>
                    </button>
                    <button class="filter-btn" data-filter="fruits">
                        <span class="filter-icon">🍎</span>
                        <span>Trái cây</span>
                    </button>
                    <button class="filter-btn" data-filter="organic">
                        <span class="filter-icon">🌿</span>
                        <span>Hữu cơ</span>
                    </button>
                </div>
            </div>

            <!-- Products Grid -->
            <div class="row products-grid-redesigned">
                @foreach ($topSellingProducts as $product)
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="product-card-redesigned">
                            <div class="product-image-container">
                                <img src="{{$product->images->shift()->image}}" alt="{{$product->name}}" class="product-image">
                                <div class="product-badges">
                                    <span class="badge-hot">Hot</span>
                                    <span class="badge-discount">-25%</span>
                                </div>
                                <div class="product-actions">
                                    <button class="action-btn" onclick="window.location.href='{{route('product', [$product,Str::slug($product->name)])}}'" title="Xem chi tiết">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <button class="action-btn" onclick="addToWishlist({{$product->id}})" title="Yêu thích">
                                        <i class="fa fa-heart"></i>
                                    </button>
                                    <button class="action-btn quick-add" onclick="window.location.href='{{route('cart.add', $product)}}'" title="Thêm vào giỏ">
                                        <i class="fa fa-cart-plus"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="product-info">
                                <div class="product-category">
                                    <span>Rau củ tươi</span>
                                </div>
                                <h4 class="product-title">
                                    <a href="{{route('product', [$product,Str::slug($product->name)])}}">{{$product->name}}</a>
                                </h4>
                                <div class="product-rating">
                                    <div class="stars">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <span class="review-count">({{ $product->sold ?? 0 }})</span>
                                </div>
                                <div class="product-features">
                                    <span class="feature-tag">
                                        <i class="fa fa-leaf"></i>
                                        Tự nhiên
                                    </span>
                                    <span class="feature-tag">
                                        <i class="fa fa-shield"></i>
                                        An toàn
                                    </span>
                                </div>
                                <div class="product-price">
                                    <span class="current-price">{{ number_format($product->price_sale) }}đ</span>
                                    <span class="old-price">{{ number_format($product->price_sale * 1.25) }}đ</span>
                                </div>
                                <button class="add-to-cart-btn" onclick="window.location.href='{{route('cart.add', $product)}}'">
                                    <i class="fa fa-shopping-bag"></i>
                                    <span>Thêm vào giỏ</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- View All Button -->
            <div class="text-center mt-5">
                <a href="{{route('shop')}}" class="btn-view-all-redesigned">
                    <span>Xem tất cả sản phẩm</span>
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="why-choose-section py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <div class="section-tag">
                    <i class="fa fa-trophy"></i>
                    <span>Tại sao chọn chúng tôi</span>
                </div>
                <h2 class="section-title-modern">Những giá trị cốt lõi</h2>
                <p class="section-description">Cam kết mang đến trải nghiệm mua sắm tuyệt vời nhất</p>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="value-card-enhanced">
                        <div class="value-icon-wrapper">
                            <div class="value-icon">
                                <i class="fa fa-leaf"></i>
                            </div>
                            <div class="icon-bg"></div>
                        </div>
                        <h5>100% Tự nhiên</h5>
                        <p>Không sử dụng chất bảo quản, hóa chất độc hại. An toàn tuyệt đối cho sức khỏe gia đình bạn.</p>
                        <div class="value-arrow">
                            <i class="fa fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="value-card-enhanced">
                        <div class="value-icon-wrapper">
                            <div class="value-icon">
                                <i class="fa fa-truck"></i>
                            </div>
                            <div class="icon-bg"></div>
                        </div>
                        <h5>Giao hàng siêu tốc</h5>
                        <p>Giao hàng trong 2 giờ tại nội thành. Miễn phí vận chuyển với đơn hàng từ 500.000đ.</p>
                        <div class="value-arrow">
                            <i class="fa fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="value-card-enhanced">
                        <div class="value-icon-wrapper">
                            <div class="value-icon">
                                <i class="fa fa-shield"></i>
                            </div>
                            <div class="icon-bg"></div>
                        </div>
                        <h5>Đảm bảo chất lượng</h5>
                        <p>Hoàn tiền 100% nếu không hài lòng. Cam kết chất lượng cao và dịch vụ tốt nhất.</p>
                        <div class="value-arrow">
                            <i class="fa fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="value-card-enhanced">
                        <div class="value-icon-wrapper">
                            <div class="value-icon">
                                <i class="fa fa-headphones"></i>
                            </div>
                            <div class="icon-bg"></div>
                        </div>
                        <h5>Hỗ trợ 24/7</h5>
                        <p>Đội ngũ tư vấn chuyên nghiệp, nhiệt tình hỗ trợ khách hàng mọi lúc mọi nơi.</p>
                        <div class="value-arrow">
                            <i class="fa fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section py-5">
        <div class="container">
            <div class="text-center mb-5">
                <div class="section-tag">
                    <i class="fa fa-quote-left"></i>
                    <span>Khách hàng nói gì</span>
                </div>
                <h2 class="section-title-modern">Đánh giá từ khách hàng</h2>
                <p class="section-description">Những phản hồi chân thực và tích cực từ cộng đồng</p>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="testimonial-card-new">
                        <div class="testimonial-content">
                            <div class="quote-icon">
                                <i class="fa fa-quote-left"></i>
                            </div>
                            <p>"Rau củ ở đây tươi ngon vô cùng! Giao hàng nhanh, đóng gói cẩn thận. 
                            Tôi đã giới thiệu cho nhiều bạn bè rồi."</p>
                        </div>
                        <div class="testimonial-author">
                            <div class="author-avatar">
                                <img src="/assets/frontend/img/testimonials/customer-1.jpg" alt="Nguyễn Thị Lan">
                            </div>
                            <div class="author-info">
                                <h6>Nguyễn Thị Lan</h6>
                                <span>Khách hàng thân thiết</span>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="testimonial-card-new">
                        <div class="testimonial-content">
                            <div class="quote-icon">
                                <i class="fa fa-quote-left"></i>
                            </div>
                            <p>"Chất lượng xuất sắc, giá cả hợp lý. Đặc biệt dịch vụ chăm sóc 
                            khách hàng rất tuyệt vời, luôn tư vấn nhiệt tình."</p>
                        </div>
                        <div class="testimonial-author">
                            <div class="author-avatar">
                                <img src="/assets/frontend/img/testimonials/customer-2.jpg" alt="Trần Văn Nam">
                            </div>
                            <div class="author-info">
                                <h6>Trần Văn Nam</h6>
                                <span>Chủ nhà hàng</span>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="testimonial-card-new">
                        <div class="testimonial-content">
                            <div class="quote-icon">
                                <i class="fa fa-quote-left"></i>
                            </div>
                            <p>"Từ khi biết đến shop, gia đình tôi chỉ mua nông sản ở đây thôi. 
                            An toàn, sạch sẽ và luôn đảm bảo chất lượng tốt nhất."</p>
                        </div>
                        <div class="testimonial-author">
                            <div class="author-avatar">
                                <img src="/assets/frontend/img/testimonials/customer-3.jpg" alt="Lê Thị Hoa">
                            </div>
                            <div class="author-info">
                                <h6>Lê Thị Hoa</h6>
                                <span>Khách hàng VIP</span>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="newsletter-section py-5">
        <div class="container">
            <div class="newsletter-wrapper">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="newsletter-content">
                            <div class="newsletter-icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <h3>Đăng ký nhận tin khuyến mãi</h3>
                            <p>Nhận thông tin về các sản phẩm mới, ưu đãi đặc biệt và mẹo vặt nấu ăn</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form class="newsletter-form">
                            <div class="input-group">
                                <input type="email" class="form-control" placeholder="Nhập địa chỉ email của bạn">
                                <button class="btn btn-primary" type="submit">
                                    Đăng ký
                                    <i class="fa fa-paper-plane"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Enhanced About Section CSS -->
    <style>
        /* Modern Variables */
        :root {
            --primary-color: #10b981;
            --primary-dark: #059669;
            --primary-light: #34d399;
            --secondary-color: #f59e0b;
            --text-dark: #1f2937;
            --text-light: #6b7280;
            --bg-light: #f9fafb;
            --white: #ffffff;
            --border-color: #e5e7eb;
            --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --radius-xl: 20px;
        }

        /* Modern Hero Section */
        .modern-hero {
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-badge-modern {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 12px 20px;
            border-radius: 30px;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 24px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .hero-title-modern {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.1;
            color: white;
            margin-bottom: 20px;
            text-shadow: 0 4px 20px rgba(0,0,0,0.3);
        }

        .text-highlight {
            color: #fbbf24;
            text-shadow: 0 2px 10px rgba(251, 191, 36, 0.3);
        }

        .hero-description-modern {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .hero-features {
            display: flex;
            gap: 30px;
            margin-bottom: 40px;
        }

        .hero-feature-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: white;
            font-weight: 500;
        }

        .hero-feature-item i {
            font-size: 18px;
            color: #fbbf24;
        }

        .hero-actions-modern {
            display: flex;
            gap: 20px;
        }

        .btn-hero {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 16px 32px;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 16px;
        }

        .btn-hero.primary {
            background: white;
            color: var(--primary-color);
            box-shadow: var(--shadow-lg);
        }

        .btn-hero.primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(255,255,255,0.4);
            color: var(--primary-color);
        }

        .btn-hero.secondary {
            background: rgba(255,255,255,0.1);
            color: white;
            border: 2px solid rgba(255,255,255,0.3);
            backdrop-filter: blur(10px);
        }

        .btn-hero.secondary:hover {
            background: rgba(255,255,255,0.2);
            color: white;
        }

        /* Offer Card */
        .offer-card-modern {
            background: white;
            border-radius: var(--radius-xl);
            padding: 30px;
            box-shadow: var(--shadow-lg);
            text-align: center;
            animation: float 3s ease-in-out infinite;
        }

        .offer-header {
            margin-bottom: 20px;
        }

        .offer-icon {
            font-size: 3rem;
            margin-bottom: 15px;
        }

        .offer-header h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-dark);
            margin: 0;
        }

        .discount-percentage {
            font-size: 4rem;
            font-weight: 800;
            color: var(--primary-color);
            line-height: 1;
            margin-bottom: 10px;
        }

        .countdown-modern {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin: 20px 0;
        }

        .time-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            background: var(--primary-color);
            color: white;
            padding: 10px;
            border-radius: var(--radius-md);
            min-width: 50px;
        }

        .time-item .number {
            font-size: 1.5rem;
            font-weight: 700;
        }

        .time-item .label {
            font-size: 0.7rem;
            margin-top: 2px;
        }

        .separator {
            display: flex;
            align-items: center;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
        }

        .claim-btn {
            background: var(--primary-color);
            color: white;
            padding: 12px 24px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-block;
            margin-top: 15px;
        }

        .claim-btn:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            color: white;
        }

        /* Hero Decorations */
        .hero-decorations {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            pointer-events: none;
            z-index: 1;
        }

        .hero-decorations > div {
            position: absolute;
            font-size: 3rem;
            opacity: 0.1;
            animation: float 8s ease-in-out infinite;
        }

        .decoration-1 { top: 20%; left: 10%; animation-delay: 0s; }
        .decoration-2 { top: 60%; right: 15%; animation-delay: -2s; }
        .decoration-3 { top: 80%; left: 20%; animation-delay: -4s; }
        .decoration-4 { top: 40%; right: 30%; animation-delay: -6s; }
        .decoration-5 { top: 15%; left: 70%; animation-delay: -8s; }

        /* Trust Stats Section */
        .trust-stats-section {
            background: linear-gradient(135deg, #ffffff 0%, #f8fffe 100%);
            border-bottom: 1px solid var(--border-color);
            position: relative;
            overflow: hidden;
        }

        .trust-stats-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 25% 50%, rgba(16, 185, 129, 0.03) 0%, transparent 40%),
                radial-gradient(circle at 75% 50%, rgba(34, 197, 94, 0.03) 0%, transparent 40%);
            pointer-events: none;
        }

        .stat-card-enhanced {
            background: white;
            border-radius: var(--radius-xl);
            padding: 2rem 1.5rem;
            text-align: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(229, 231, 235, 0.5);
            height: 100%;
        }

        .stat-card-enhanced:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
            border-color: rgba(16, 185, 129, 0.3);
        }

        .stat-card-enhanced::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(16, 185, 129, 0.05), transparent);
            transition: left 0.8s ease;
        }

        .stat-card-enhanced:hover::before {
            left: 100%;
        }

        .stat-icon-enhanced {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: white;
            font-size: 2rem;
            position: relative;
            z-index: 2;
            transition: all 0.4s ease;
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
        }

        .stat-card-enhanced:hover .stat-icon-enhanced {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 12px 35px rgba(16, 185, 129, 0.4);
        }

        .stat-icon-enhanced::before {
            content: '';
            position: absolute;
            top: -8px;
            left: -8px;
            right: -8px;
            bottom: -8px;
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.2), rgba(5, 150, 105, 0.2));
            border-radius: 50%;
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .stat-card-enhanced:hover .stat-icon-enhanced::before {
            opacity: 1;
        }

        .stat-content-enhanced {
            position: relative;
            z-index: 2;
        }

        .stat-number-enhanced {
            font-size: 2.8rem;
            font-weight: 800;
            color: var(--primary-color);
            margin: 0 0 0.5rem 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
            line-height: 1;
            text-shadow: 0 2px 4px rgba(16, 185, 129, 0.1);
            transition: all 0.3s ease;
        }

        .stat-card-enhanced:hover .stat-number-enhanced {
            color: var(--primary-dark);
            transform: scale(1.05);
        }

        .stat-label-enhanced {
            color: var(--text-light);
            font-size: 1rem;
            margin: 0;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
            letter-spacing: 0.5px;
            transition: color 0.3s ease;
        }

        .stat-card-enhanced:hover .stat-label-enhanced {
            color: var(--text-dark);
        }

        .stat-background-pattern {
            position: absolute;
            top: -20px;
            right: -20px;
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.05), rgba(16, 185, 129, 0.02));
            border-radius: 50%;
            z-index: 1;
            transition: all 0.4s ease;
        }

        .stat-card-enhanced:hover .stat-background-pattern {
            transform: scale(1.2);
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.08), rgba(16, 185, 129, 0.04));
        }

        /* Alternative stat cards with different colors */
        .stat-card-enhanced:nth-child(2) .stat-icon-enhanced {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
            box-shadow: 0 8px 25px rgba(5, 150, 105, 0.3);
        }

        .stat-card-enhanced:nth-child(2):hover .stat-icon-enhanced {
            box-shadow: 0 12px 35px rgba(5, 150, 105, 0.4);
        }

        .stat-card-enhanced:nth-child(3) .stat-icon-enhanced {
            background: linear-gradient(135deg, #0891b2 0%, #0e7490 100%);
            box-shadow: 0 8px 25px rgba(8, 145, 178, 0.3);
        }

        .stat-card-enhanced:nth-child(3):hover .stat-icon-enhanced {
            box-shadow: 0 12px 35px rgba(8, 145, 178, 0.4);
        }

        .stat-card-enhanced:nth-child(4) .stat-icon-enhanced {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            box-shadow: 0 8px 25px rgba(245, 158, 11, 0.3);
        }

        .stat-card-enhanced:nth-child(4):hover .stat-icon-enhanced {
            box-shadow: 0 12px 35px rgba(245, 158, 11, 0.4);
        }

        /* Responsive adjustments for stats */
        @media (max-width: 992px) {
            .stat-card-enhanced {
                padding: 1.5rem 1rem;
                margin-bottom: 1.5rem;
            }

            .stat-icon-enhanced {
                width: 70px;
                height: 70px;
                font-size: 1.75rem;
                margin-bottom: 1rem;
            }

            .stat-number-enhanced {
                font-size: 2.2rem;
            }

            .stat-label-enhanced {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 768px) {
            .trust-stats-section {
                padding: 2rem 0;
            }

            .stat-card-enhanced {
                padding: 1.25rem 0.75rem;
            }

            .stat-icon-enhanced {
                width: 60px;
                height: 60px;
                font-size: 1.5rem;
                margin-bottom: 0.75rem;
            }

            .stat-number-enhanced {
                font-size: 1.8rem;
            }

            .stat-label-enhanced {
                font-size: 0.85rem;
            }
        }

        @media (max-width: 576px) {
            .stat-card-enhanced {
                margin-bottom: 1rem;
                padding: 1rem 0.5rem;
            }

            .stat-number-enhanced {
                font-size: 1.6rem;
            }

            .stat-background-pattern {
                display: none;
            }
        }

        /* Add counter animation */
        @keyframes countUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .stat-number-enhanced.animate {
            animation: countUp 0.8s ease-out;
        }

        /* Enhanced Hero Section */
        .modern-hero {
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-badge-modern {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 12px 20px;
            border-radius: 30px;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 24px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .hero-title-modern {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.1;
            color: white;
            margin-bottom: 20px;
            text-shadow: 0 4px 20px rgba(0,0,0,0.3);
        }

        .text-highlight {
            color: #fbbf24;
            text-shadow: 0 2px 10px rgba(251, 191, 36, 0.3);
        }

        .hero-description-modern {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .hero-features {
            display: flex;
            gap: 30px;
            margin-bottom: 40px;
        }

        .hero-feature-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: white;
            font-weight: 500;
        }

        .hero-feature-item i {
            font-size: 18px;
            color: #fbbf24;
        }

        .hero-actions-modern {
            display: flex;
            gap: 20px;
        }

        .btn-hero {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 16px 32px;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 16px;
        }

        .btn-hero.primary {
            background: white;
            color: var(--primary-color);
            box-shadow: var(--shadow-lg);
        }

        .btn-hero.primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(255,255,255,0.4);
            color: var(--primary-color);
        }

        .btn-hero.secondary {
            background: rgba(255,255,255,0.1);
            color: white;
            border: 2px solid rgba(255,255,255,0.3);
            backdrop-filter: blur(10px);
        }

        .btn-hero.secondary:hover {
            background: rgba(255,255,255,0.2);
            color: white;
        }

        /* Offer Card */
        .offer-card-modern {
            background: white;
            border-radius: var(--radius-xl);
            padding: 30px;
            box-shadow: var(--shadow-lg);
            text-align: center;
            animation: float 3s ease-in-out infinite;
        }

        .offer-header {
            margin-bottom: 20px;
        }

        .offer-icon {
            font-size: 3rem;
            margin-bottom: 15px;
        }

        .offer-header h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-dark);
            margin: 0;
        }

        .discount-percentage {
            font-size: 4rem;
            font-weight: 800;
            color: var(--primary-color);
            line-height: 1;
            margin-bottom: 10px;
        }

        .countdown-modern {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin: 20px 0;
        }

        .time-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            background: var(--primary-color);
            color: white;
            padding: 10px;
            border-radius: var(--radius-md);
            min-width: 50px;
        }

        .time-item .number {
            font-size: 1.5rem;
            font-weight: 700;
        }

        .time-item .label {
            font-size: 0.7rem;
            margin-top: 2px;
        }

        .separator {
            display: flex;
            align-items: center;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
        }

        .claim-btn {
            background: var(--primary-color);
            color: white;
            padding: 12px 24px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-block;
            margin-top: 15px;
        }

        .claim-btn:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            color: white;
        }

        /* Hero Decorations */
        .hero-decorations {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            pointer-events: none;
            z-index: 1;
        }

        .hero-decorations > div {
            position: absolute;
            font-size: 3rem;
            opacity: 0.1;
            animation: float 8s ease-in-out infinite;
        }

        .decoration-1 { top: 20%; left: 10%; animation-delay: 0s; }
        .decoration-2 { top: 60%; right: 15%; animation-delay: -2s; }
        .decoration-3 { top: 80%; left: 20%; animation-delay: -4s; }
        .decoration-4 { top: 40%; right: 30%; animation-delay: -6s; }
        .decoration-5 { top: 15%; left: 70%; animation-delay: -8s; }

        /* Trust Stats Section */
        .trust-stats-section {
            background: linear-gradient(135deg, #ffffff 0%, #f8fffe 100%);
            border-bottom: 1px solid var(--border-color);
            position: relative;
            overflow: hidden;
        }

        .trust-stats-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 25% 50%, rgba(16, 185, 129, 0.03) 0%, transparent 40%),
                radial-gradient(circle at 75% 50%, rgba(34, 197, 94, 0.03) 0%, transparent 40%);
            pointer-events: none;
        }

        .stat-card-enhanced {
            background: white;
            border-radius: var(--radius-xl);
            padding: 2rem 1.5rem;
            text-align: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(229, 231, 235, 0.5);
            height: 100%;
        }

        .stat-card-enhanced:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
            border-color: rgba(16, 185, 129, 0.3);
        }

        .stat-card-enhanced::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(16, 185, 129, 0.05), transparent);
            transition: left 0.8s ease;
        }

        .stat-card-enhanced:hover::before {
            left: 100%;
        }

        .stat-icon-enhanced {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: white;
            font-size: 2rem;
            position: relative;
            z-index: 2;
            transition: all 0.4s ease;
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
        }

        .stat-card-enhanced:hover .stat-icon-enhanced {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 12px 35px rgba(16, 185, 129, 0.4);
        }

        .stat-icon-enhanced::before {
            content: '';
            position: absolute;
            top: -8px;
            left: -8px;
            right: -8px;
            bottom: -8px;
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.2), rgba(5, 150, 105, 0.2));
            border-radius: 50%;
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .stat-card-enhanced:hover .stat-icon-enhanced::before {
            opacity: 1;
        }

        .stat-content-enhanced {
            position: relative;
            z-index: 2;
        }

        .stat-number-enhanced {
            font-size: 2.8rem;
            font-weight: 800;
            color: var(--primary-color);
            margin: 0 0 0.5rem 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
            line-height: 1;
            text-shadow: 0 2px 4px rgba(16, 185, 129, 0.1);
            transition: all 0.3s ease;
        }

        .stat-card-enhanced:hover .stat-number-enhanced {
            color: var(--primary-dark);
            transform: scale(1.05);
        }

        .stat-label-enhanced {
            color: var(--text-light);
            font-size: 1rem;
            margin: 0;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
            letter-spacing: 0.5px;
            transition: color 0.3s ease;
        }

        .stat-card-enhanced:hover .stat-label-enhanced {
            color: var(--text-dark);
        }

        .stat-background-pattern {
            position: absolute;
            top: -20px;
            right: -20px;
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.05), rgba(16, 185, 129, 0.02));
            border-radius: 50%;
            z-index: 1;
            transition: all 0.4s ease;
        }

        .stat-card-enhanced:hover .stat-background-pattern {
            transform: scale(1.2);
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.08), rgba(16, 185, 129, 0.04));
        }

        /* Alternative stat cards with different colors */
        .stat-card-enhanced:nth-child(2) .stat-icon-enhanced {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
            box-shadow: 0 8px 25px rgba(5, 150, 105, 0.3);
        }

        .stat-card-enhanced:nth-child(2):hover .stat-icon-enhanced {
            box-shadow: 0 12px 35px rgba(5, 150, 105, 0.4);
        }

        .stat-card-enhanced:nth-child(3) .stat-icon-enhanced {
            background: linear-gradient(135deg, #0891b2 0%, #0e7490 100%);
            box-shadow: 0 8px 25px rgba(8, 145, 178, 0.3);
        }

        .stat-card-enhanced:nth-child(3):hover .stat-icon-enhanced {
            box-shadow: 0 12px 35px rgba(8, 145, 178, 0.4);
        }

        .stat-card-enhanced:nth-child(4) .stat-icon-enhanced {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            box-shadow: 0 8px 25px rgba(245, 158, 11, 0.3);
        }

        .stat-card-enhanced:nth-child(4):hover .stat-icon-enhanced {
            box-shadow: 0 12px 35px rgba(245, 158, 11, 0.4);
        }

        /* Responsive adjustments for stats */
        @media (max-width: 992px) {
            .stat-card-enhanced {
                padding: 1.5rem 1rem;
                margin-bottom: 1.5rem;
            }

            .stat-icon-enhanced {
                width: 70px;
                height: 70px;
                font-size: 1.75rem;
                margin-bottom: 1rem;
            }

            .stat-number-enhanced {
                font-size: 2.2rem;
            }

            .stat-label-enhanced {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 768px) {
            .trust-stats-section {
                padding: 2rem 0;
            }

            .stat-card-enhanced {
                padding: 1.25rem 0.75rem;
            }

            .stat-icon-enhanced {
                width: 60px;
                height: 60px;
                font-size: 1.5rem;
                margin-bottom: 0.75rem;
            }

            .stat-number-enhanced {
                font-size: 1.8rem;
            }

            .stat-label-enhanced {
                font-size: 0.85rem;
            }
        }

        @media (max-width: 576px) {
            .stat-card-enhanced {
                margin-bottom: 1rem;
                padding: 1rem 0.5rem;
            }

            .stat-number-enhanced {
                font-size: 1.6rem;
            }

            .stat-background-pattern {
                display: none;
            }
        }

        /* Add counter animation */
        @keyframes countUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .stat-number-enhanced.animate {
            animation: countUp 0.8s ease-out;
        }

        /* Enhanced Hero Section */
        .modern-hero {
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-badge-modern {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 12px 20px;
            border-radius: 30px;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 24px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .hero-title-modern {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.1;
            color: white;
            margin-bottom: 20px;
            text-shadow: 0 4px 20px rgba(0,0,0,0.3);
        }

        .text-highlight {
            color: #fbbf24;
            text-shadow: 0 2px 10px rgba(251, 191, 36, 0.3);
        }

        .hero-description-modern {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .hero-features {
            display: flex;
            gap: 30px;
            margin-bottom: 40px;
        }

        .hero-feature-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: white;
            font-weight: 500;
        }

        .hero-feature-item i {
            font-size: 18px;
            color: #fbbf24;
        }

        .hero-actions-modern {
            display: flex;
            gap: 20px;
        }

        .btn-hero {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 16px 32px;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 16px;
        }

        .btn-hero.primary {
            background: white;
            color: var(--primary-color);
            box-shadow: var(--shadow-lg);
        }

        .btn-hero.primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(255,255,255,0.4);
            color: var(--primary-color);
        }

        .btn-hero.secondary {
            background: rgba(255,255,255,0.1);
            color: white;
            border: 2px solid rgba(255,255,255,0.3);
            backdrop-filter: blur(10px);
        }

        .btn-hero.secondary:hover {
            background: rgba(255,255,255,0.2);
            color: white;
        }

        /* Offer Card */
        .offer-card-modern {
            background: white;
            border-radius: var(--radius-xl);
            padding: 30px;
            box-shadow: var(--shadow-lg);
            text-align: center;
            animation: float 3s ease-in-out infinite;
        }

        .offer-header {
            margin-bottom: 20px;
        }

        .offer-icon {
            font-size: 3rem;
            margin-bottom: 15px;
        }

        .offer-header h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-dark);
            margin: 0;
        }

        .discount-percentage {
            font-size: 4rem;
            font-weight: 800;
            color: var(--primary-color);
            line-height: 1;
            margin-bottom: 10px;
        }

        .countdown-modern {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin: 20px 0;
        }

        .time-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            background: var(--primary-color);
            color: white;
            padding: 10px;
            border-radius: var(--radius-md);
            min-width: 50px;
        }

        .time-item .number {
            font-size: 1.5rem;
            font-weight: 700;
        }

        .time-item .label {
            font-size: 0.7rem;
            margin-top: 2px;
        }

        .separator {
            display: flex;
            align-items: center;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
        }

        .claim-btn {
            background: var(--primary-color);
            color: white;
            padding: 12px 24px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-block;
            margin-top: 15px;
        }

        .claim-btn:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            color: white;
        }

        /* Hero Decorations */
        .hero-decorations {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            pointer-events: none;
            z-index: 1;
        }

        .hero-decorations > div {
            position: absolute;
            font-size: 3rem;
            opacity: 0.1;
            animation: float 8s ease-in-out infinite;
        }

        .decoration-1 { top: 20%; left: 10%; animation-delay: 0s; }
        .decoration-2 { top: 60%; right: 15%; animation-delay: -2s; }
        .decoration-3 { top: 80%; left: 20%; animation-delay: -4s; }
        .decoration-4 { top: 40%; right: 30%; animation-delay: -6s; }
        .decoration-5 { top: 15%; left: 70%; animation-delay: -8s; }

        /* Trust Stats Section */
        .trust-stats-section {
            background: linear-gradient(135deg, #ffffff 0%, #f8fffe 100%);
            border-bottom: 1px solid var(--border-color);
            position: relative;
            overflow: hidden;
        }

        .trust-stats-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 25% 50%, rgba(16, 185, 129, 0.03) 0%, transparent 40%),
                radial-gradient(circle at 75% 50%, rgba(34, 197, 94, 0.03) 0%, transparent 40%);
            pointer-events: none;
        }

        .stat-card-enhanced {
            background: white;
            border-radius: var(--radius-xl);
            padding: 2rem 1.5rem;
            text-align: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(229, 231, 235, 0.5);
            height: 100%;
        }

        .stat-card-enhanced:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
            border-color: rgba(16, 185, 129, 0.3);
        }

        .stat-card-enhanced::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(16, 185, 129, 0.05), transparent);
            transition: left 0.8s ease;
        }

        .stat-card-enhanced:hover::before {
            left: 100%;
        }

        .stat-icon-enhanced {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: white;
            font-size: 2rem;
            position: relative;
            z-index: 2;
            transition: all 0.4s ease;
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
        }

        .stat-card-enhanced:hover .stat-icon-enhanced {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 12px 35px rgba(16, 185, 129, 0.4);
        }

        .stat-icon-enhanced::before {
            content: '';
            position: absolute;
            top: -8px;
            left: -8px;
            right: -8px;
            bottom: -8px;
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.2), rgba(5, 150, 105, 0.2));
            border-radius: 50%;
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .stat-card-enhanced:hover .stat-icon-enhanced::before {
            opacity: 1;
        }

        .stat-content-enhanced {
            position: relative;
            z-index: 2;
        }

        .stat-number-enhanced {
            font-size: 2.8rem;
            font-weight: 800;
            color: var(--primary-color);
            margin: 0 0 0.5rem 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
            line-height: 1;
            text-shadow: 0 2px 4px rgba(16, 185, 129, 0.1);
            transition: all 0.3s ease;
        }

        .stat-card-enhanced:hover .stat-number-enhanced {
            color: var(--primary-dark);
            transform: scale(1.05);
        }

        .stat-label-enhanced {
            color: var(--text-light);
            font-size: 1rem;
            margin: 0;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
            letter-spacing: 0.5px;
            transition: color 0.3s ease;
        }

        .stat-card-enhanced:hover .stat-label-enhanced {
            color: var(--text-dark);
        }

        .stat-background-pattern {
            position: absolute;
            top: -20px;
            right: -20px;
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.05), rgba(16, 185, 129, 0.02));
            border-radius: 50%;
            z-index: 1;
            transition: all 0.4s ease;
        }

        .stat-card-enhanced:hover .stat-background-pattern {
            transform: scale(1.2);
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.08), rgba(16, 185, 129, 0.04));
        }

        /* Alternative stat cards with different colors */
        .stat-card-enhanced:nth-child(2) .stat-icon-enhanced {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
            box-shadow: 0 8px 25px rgba(5, 150, 105, 0.3);
        }

        .stat-card-enhanced:nth-child(2):hover .stat-icon-enhanced {
            box-shadow: 0 12px 35px rgba(5, 150, 105, 0.4);
        }

        .stat-card-enhanced:nth-child(3) .stat-icon-enhanced {
            background: linear-gradient(135deg, #0891b2 0%, #0e7490 100%);
            box-shadow: 0 8px 25px rgba(8, 145, 178, 0.3);
        }

        .stat-card-enhanced:nth-child(3):hover .stat-icon-enhanced {
            box-shadow: 0 12px 35px rgba(8, 145, 178, 0.4);
        }

        .stat-card-enhanced:nth-child(4) .stat-icon-enhanced {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            box-shadow: 0 8px 25px rgba(245, 158, 11, 0.3);
        }

        .stat-card-enhanced:nth-child(4):hover .stat-icon-enhanced {
            box-shadow: 0 12px 35px rgba(245, 158, 11, 0.4);
        }

        /* Responsive adjustments for stats */
        @media (max-width: 992px) {
            .stat-card-enhanced {
                padding: 1.5rem 1rem;
                margin-bottom: 1.5rem;
            }

            .stat-icon-enhanced {
                width: 70px;
                height: 70px;
                font-size: 1.75rem;
                margin-bottom: 1rem;
            }

            .stat-number-enhanced {
                font-size: 2.2rem;
            }

            .stat-label-enhanced {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 768px) {
            .trust-stats-section {
                padding: 2rem 0;
            }

            .stat-card-enhanced {
                padding: 1.25rem 0.75rem;
            }

            .stat-icon-enhanced {
                width: 60px;
                height: 60px;
                font-size: 1.5rem;
                margin-bottom: 0.75rem;
            }

            .stat-number-enhanced {
                font-size: 1.8rem;
            }

            .stat-label-enhanced {
                font-size: 0.85rem;
            }
        }

        @media (max-width: 576px) {
            .stat-card-enhanced {
                margin-bottom: 1rem;
                padding: 1rem 0.5rem;
            }

            .stat-number-enhanced {
                font-size: 1.6rem;
            }

            .stat-background-pattern {
                display: none;
            }
        }

        /* Add counter animation */
        @keyframes countUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .stat-number-enhanced.animate {
            animation: countUp 0.8s ease-out;
        }

        /* Enhanced Hero Section */
        .modern-hero {
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-badge-modern {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 12px 20px;
            border-radius: 30px;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 24px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .hero-title-modern {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.1;
            color: white;
            margin-bottom: 20px;
            text-shadow: 0 4px 20px rgba(0,0,0,0.3);
        }

        .text-highlight {
            color: #fbbf24;
            text-shadow: 0 2px 10px rgba(251, 191, 36, 0.3);
        }

        .hero-description-modern {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .hero-features {
            display: flex;
            gap: 30px;
            margin-bottom: 40px;
        }

        .hero-feature-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: white;
            font-weight: 500;
        }

        .hero-feature-item i {
            font-size: 18px;
            color: #fbbf24;
        }

        .hero-actions-modern {
            display: flex;
            gap: 20px;
        }

        .btn-hero {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 16px 32px;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 16px;
        }

        .btn-hero.primary {
            background: white;
            color: var(--primary-color);
            box-shadow: var(--shadow-lg);
        }

        .btn-hero.primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(255,255,255,0.4);
            color: var(--primary-color);
        }

        .btn-hero.secondary {
            background: rgba(255,255,255,0.1);
            color: white;
            border: 2px solid rgba(255,255,255,0.3);
            backdrop-filter: blur(10px);
        }

        .btn-hero.secondary:hover {
            background: rgba(255,255,255,0.2);
            color: white;
        }

        /* Offer Card */
        .offer-card-modern {
            background: white;
            border-radius: var(--radius-xl);
            padding: 30px;
            box-shadow: var(--shadow-lg);
            text-align: center;
            animation: float 3s ease-in-out infinite;
        }

        .offer-header {
            margin-bottom: 20px;
        }

        .offer-icon {
            font-size: 3rem;
            margin-bottom: 15px;
        }

        .offer-header h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-dark);
            margin: 0;
        }

        .discount-percentage {
            font-size: 4rem;
            font-weight: 800;
            color: var(--primary-color);
            line-height: 1;
            margin-bottom: 10px;
        }

        .countdown-modern {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin: 20px 0;
        }

        .time-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            background: var(--primary-color);
            color: white;
            padding: 10px;
            border-radius: var(--radius-md);
            min-width: 50px;
        }

        .time-item .number {
            font-size: 1.5rem;
            font-weight: 700;
        }

        .time-item .label {
            font-size: 0.7rem;
            margin-top: 2px;
        }

        .separator {
            display: flex;
            align-items: center;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
        }

        .claim-btn {
            background: var(--primary-color);
            color: white;
            padding: 12px 24px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-block;
            margin-top: 15px;
        }

        .claim-btn:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            color: white;
        }

        /* Hero Decorations */
        .hero-decorations {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            pointer-events: none;
            z-index: 1;
        }

        .hero-decorations > div {
            position: absolute;
            font-size: 3rem;
            opacity: 0.1;
            animation: float 8s ease-in-out infinite;
        }

        .decoration-1 { top: 20%; left: 10%; animation-delay: 0s; }
        .decoration-2 { top: 60%; right: 15%; animation-delay: -2s; }
        .decoration-3 { top: 80%; left: 20%; animation-delay: -4s; }
        .decoration-4 { top: 40%; right: 30%; animation-delay: -6s; }
        .decoration-5 { top: 15%; left: 70%; animation-delay: -8s; }

        /* Trust Stats Section */
        .trust-stats-section {
            background: linear-gradient(135deg, #ffffff 0%, #f8fffe 100%);
            border-bottom: 1px solid var(--border-color);
            position: relative;
            overflow: hidden;
        }

        .trust-stats-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 25% 50%, rgba(16, 185, 129, 0.03) 0%, transparent 40%),
                radial-gradient(circle at 75% 50%, rgba(34, 197, 94, 0.03) 0%, transparent 40%);
            pointer-events: none;
        }

        .stat-card-enhanced {
            background: white;
            border-radius: var(--radius-xl);
            padding: 2rem 1.5rem;
            text-align: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(229, 231, 235, 0.5);
            height: 100%;
        }

        .stat-card-enhanced:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
            border-color: rgba(16, 185, 129, 0.3);
        }

        .stat-card-enhanced::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(16, 185, 129, 0.05), transparent);
            transition: left 0.8s ease;
        }

        .stat-card-enhanced:hover::before {
            left: 100%;
        }

        .stat-icon-enhanced {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: white;
            font-size: 2rem;
            position: relative;
            z-index: 2;
            transition: all 0.4s ease;
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
        }

        .stat-card-enhanced:hover .stat-icon-enhanced {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 12px 35px rgba(16, 185, 129, 0.4);
        }

        .stat-icon-enhanced::before {
            content: '';
            position: absolute;
            top: -8px;
            left: -8px;
            right: -8px;
            bottom: -8px;
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.2), rgba(5, 150, 105, 0.2));
            border-radius: 50%;
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .stat-card-enhanced:hover .stat-icon-enhanced::before {
            opacity: 1;
        }

        .stat-content-enhanced {
            position: relative;
            z-index: 2;
        }

        .stat-number-enhanced {
            font-size: 2.8rem;
            font-weight: 800;
            color: var(--primary-color);
            margin: 0 0 0.5rem 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
            line-height: 1;
            text-shadow: 0 2px 4px rgba(16, 185, 129, 0.1);
            transition: all 0.3s ease;
        }

        .stat-card-enhanced:hover .stat-number-enhanced {
            color: var(--primary-dark);
            transform: scale(1.05);
        }

        .stat-label-enhanced {
            color: var(--text-light);
            font-size: 1rem;
            margin: 0;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
            letter-spacing: 0.5px;
            transition: color 0.3s ease;
        }

        .stat-card-enhanced:hover .stat-label-enhanced {
            color: var(--text-dark);
        }

        .stat-background-pattern {
            position: absolute;
            top: -20px;
            right: -20px;
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.05), rgba(16, 185, 129, 0.02));
            border-radius: 50%;
            z-index: 1;
            transition: all 0.4s ease;
        }

        .stat-card-enhanced:hover .stat-background-pattern {
            transform: scale(1.2);
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.08), rgba(16, 185, 129, 0.04));
        }

        /* Alternative stat cards with different colors */
        .stat-card-enhanced:nth-child(2) .stat-icon-enhanced {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
            box-shadow: 0 8px 25px rgba(5, 150, 105, 0.3);
        }

        .stat-card-enhanced:nth-child(2):hover .stat-icon-enhanced {
            box-shadow: 0 12px 35px rgba(5, 150, 105, 0.4);
        }

        .stat-card-enhanced:nth-child(3) .stat-icon-enhanced {
            background: linear-gradient(135deg, #0891b2 0%, #0e7490 100%);
            box-shadow: 0 8px 25px rgba(8, 145, 178, 0.3);
        }

        .stat-card-enhanced:nth-child(3):hover .stat-icon-enhanced {
            box-shadow: 0 12px 35px rgba(8, 145, 178, 0.4);
        }

        .stat-card-enhanced:nth-child(4) .stat-icon-enhanced {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            box-shadow: 0 8px 25px rgba(245, 158, 11, 0.3);
        }

        .stat-card-enhanced:nth-child(4):hover .stat-icon-enhanced {
            box-shadow: 0 12px 35px rgba(245, 158, 11, 0.4);
        }

        /* Responsive adjustments for stats */
        @media (max-width: 992px) {
            .stat-card-enhanced {
                padding: 1.5rem 1rem;
                margin-bottom: 1.5rem;
            }

            .stat-icon-enhanced {
                width: 70px;
                height: 70px;
                font-size: 1.75rem;
                margin-bottom: 1rem;
            }

            .stat-number-enhanced {
                font-size: 2.2rem;
            }

            .stat-label-enhanced {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 768px) {
            .trust-stats-section {
                padding: 2rem 0;
            }

            .stat-card-enhanced {
                padding: 1.25rem 0.75rem;
            }

            .stat-icon-enhanced {
                width: 60px;
                height: 60px;
                font-size: 1.5rem;
                margin-bottom: 0.75rem;
            }

            .stat-number-enhanced {
                font-size: 1.8rem;
            }

            .stat-label-enhanced {
                font-size: 0.85rem;
            }
        }

        @media (max-width: 576px) {
            .stat-card-enhanced {
                margin-bottom: 1rem;
                padding: 1rem 0.5rem;
            }

            .stat-number-enhanced {
                font-size: 1.6rem;
            }

            .stat-background-pattern {
                display: none;
            }
        }

        /* Add counter animation */
        @keyframes countUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .stat-number-enhanced.animate {
            animation: countUp 0.8s ease-out;
        }

        /* Enhanced Hero Section */
        .modern-hero {
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-badge-modern {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 12px 20px;
            border-radius: 30px;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 24px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .hero-title-modern {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.1;
            color: white;
            margin-bottom: 20px;
            text-shadow: 0 4px 20px rgba(0,0,0,0.3);
        }

        .text-highlight {
            color: #fbbf24;
            text-shadow: 0 2px 10px rgba(251, 191, 36, 0.3);
        }

        .hero-description-modern {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .hero-features {
            display: flex;
            gap: 30px;
            margin-bottom: 40px;
        }

        .hero-feature-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: white;
            font-weight: 500;
        }

        .hero-feature-item i {
            font-size: 18px;
            color: #fbbf24;
        }

        .hero-actions-modern {
            display: flex;
            gap: 20px;
        }

        .btn-hero {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 16px 32px;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 16px;
        }

        .btn-hero.primary {
            background: white;
            color: var(--primary-color);
            box-shadow: var(--shadow-lg);
        }

        .btn-hero.primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(255,255,255,0.4);
            color: var(--primary-color);
        }

        .btn-hero.secondary {
            background: rgba(255,255,255,0.1);
            color: white;
            border: 2px solid rgba(255,255,255,0.3);
            backdrop-filter: blur(10px);
        }

        .btn-hero.secondary:hover {
            background: rgba(255,255,255,0.2);
            color: white;
        }

        /* Offer Card */
        .offer-card-modern {
            background: white;
            border-radius: var(--radius-xl);
            padding: 30px;
            box-shadow: var(--shadow-lg);
            text-align: center;
            animation: float 3s ease-in-out infinite;
        }

        .offer-header {
            margin-bottom: 20px;
        }

        .offer-icon {
            font-size: 3rem;
            margin-bottom: 15px;
        }

        .offer-header h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-dark);
            margin: 0;
        }

        .discount-percentage {
            font-size: 4rem;
            font-weight: 800;
            color: var(--primary-color);
            line-height: 1;
            margin-bottom: 10px;
        }

        .countdown-modern {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin: 20px 0;
        }

        .time-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            background: var(--primary-color);
            color: white;
            padding: 10px;
            border-radius: var(--radius-md);
            min-width: 50px;
        }

        .time-item .number {
            font-size: 1.5rem;
            font-weight: 700;
        }

        .time-item .label {
            font-size: 0.7rem;
            margin-top: 2px;
        }

        .separator {
            display: flex;
            align-items: center;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
        }

        .claim-btn {
            background: var(--primary-color);
            color: white;
            padding: 12px 24px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-block;
            margin-top: 15px;
        }

        .claim-btn:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            color: white;
        }

        /* Hero Decorations */
        .hero-decorations {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            pointer-events: none;
            z-index: 1;
        }

        .hero-decorations > div {
            position: absolute;
            font-size: 3rem;
            opacity: 0.1;
            animation: float 8s ease-in-out infinite;
        }

        .decoration-1 { top: 20%; left: 10%; animation-delay: 0s; }
        .decoration-2 { top: 60%; right: 15%; animation-delay: -2s; }
        .decoration-3 { top: 80%; left: 20%; animation-delay: -4s; }
        .decoration-4 { top: 40%; right: 30%; animation-delay: -6s; }
        .decoration-5 { top: 15%; left: 70%; animation-delay: -8s; }

        /* Trust Stats Section */
        .trust-stats-section {
            background: linear-gradient(135deg, #ffffff 0%, #f8fffe 100%);
            border-bottom: 1px solid var(--border-color);
            position: relative;
            overflow: hidden;
        }

        .trust-stats-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 25% 50%, rgba(16, 185, 129, 0.03) 0%, transparent 40%),
                radial-gradient(circle at 75% 50%, rgba(34, 197, 94, 0.03) 0%, transparent 40%);
            pointer-events: none;
        }

        .stat-card-enhanced {
            background: white;
            border-radius: var(--radius-xl);
            padding: 2rem 1.5rem;
            text-align: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(229, 231, 235, 0.5);
            height: 100%;
        }

        .stat-card-enhanced:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
            border-color: rgba(16, 185, 129, 0.3);
        }

        .stat-card-enhanced::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(16, 185, 129, 0.05), transparent);
            transition: left 0.8s ease;
        }

        .stat-card-enhanced:hover::before {
            left: 100%;
        }

        .stat-icon-enhanced {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: white;
            font-size: 2rem;
            position: relative;
            z-index: 2;
            transition: all 0.4s ease;
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
        }

        .stat-card-enhanced:hover .stat-icon-enhanced {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 12px 35px rgba(16, 185, 129, 0.4);
        }

        .stat-icon-enhanced::before {
            content: '';
            position: absolute;
            top: -8px;
            left: -8px;
            right: -8px;
            bottom: -8px;
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.2), rgba(5, 150, 105, 0.2));
            border-radius: 50%;
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .stat-card-enhanced:hover .stat-icon-enhanced::before {
            opacity: 1;
        }

        .stat-content-enhanced {
            position: relative;
            z-index: 2;
        }

        .stat-number-enhanced {
            font-size: 2.8rem;
            font-weight: 800;
            color: var(--primary-color);
            margin: 0 0 0.5rem 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
            line-height: 1;
            text-shadow: 0 2px 4px rgba(16, 185, 129, 0.1);
            transition: all 0.3s ease;
        }

        .stat-card-enhanced:hover .stat-number-enhanced {
            color: var(--primary-dark);
            transform: scale(1.05);
        }

        .stat-label-enhanced {
            color: var(--text-light);
            font-size: 1rem;
            margin: 0;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
            letter-spacing: 0.5px;
            transition: color 0.3s ease;
        }

        .stat-card-enhanced:hover .stat-label-enhanced {
            color: var(--text-dark);
        }

        .stat-background-pattern {
            position: absolute;
            top: -20px;
            right: -20px;
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.05), rgba(16, 185, 129, 0.02));
            border-radius: 50%;
            z-index: 1;
            transition: all 0.4s ease;
        }

        .stat-card-enhanced:hover .stat-background-pattern {
            transform: scale(1.2);
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.08), rgba(16, 185, 129, 0.04));
        }

        /* Alternative stat cards with different colors */
        .stat-card-enhanced:nth-child(2) .stat-icon-enhanced {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
            box-shadow: 0 8px 25px rgba(5, 150, 105, 0.3);
        }

        .stat-card-enhanced:nth-child(2):hover .stat-icon-enhanced {
            box-shadow: 0 12px 35px rgba(5, 150, 105, 0.4);
        }

        .stat-card-enhanced:nth-child(3) .stat-icon-enhanced {
            background: linear-gradient(135deg, #0891b2 0%, #0e7490 100%);
            box-shadow: 0 8px 25px rgba(8, 145, 178, 0.3);
        }

        .stat-card-enhanced:nth-child(3):hover .stat-icon-enhanced {
            box-shadow: 0 12px 35px rgba(8, 145, 178, 0.4);
        }

        .stat-card-enhanced:nth-child(4) .stat-icon-enhanced {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            box-shadow: 0 8px 25px rgba(245, 158, 11, 0.3);
        }

        .stat-card-enhanced:nth-child(4):hover .stat-icon-enhanced {
            box-shadow: 0 12px 35px rgba(245, 158, 11, 0.4);
        }

        /* Responsive adjustments for stats */
        @media (max-width: 992px) {
            .stat-card-enhanced {
                padding: 1.5rem 1rem;
                margin-bottom: 1.5rem;
            }

            .stat-icon-enhanced {
                width: 70px;
                height: 70px;
                font-size: 1.75rem;
                margin-bottom: 1rem;
            }

            .stat-number-enhanced {
                font-size: 2.2rem;
            }

            .stat-label-enhanced {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 768px) {
            .trust-stats-section {
                padding: 2rem 0;
            }

            .stat-card-enhanced {
                padding: 1.25rem 0.75rem;
            }

            .stat-icon-enhanced {
                width: 60px;
                height: 60px;
                font-size: 1.5rem;
                margin-bottom: 0.75rem;
            }

            .stat-number-enhanced {
                font-size: 1.8rem;
            }

            .stat-label-enhanced {
                font-size: 0.85rem;
            }
        }

        @media (max-width: 576px) {
            .stat-card-enhanced {
                margin-bottom: 1rem;
                padding: 1rem 0.5rem;
            }

            .stat-number-enhanced {
                font-size: 1.6rem;
            }

            .stat-background-pattern {
                display: none;
            }
        }

        /* Add counter animation */
        @keyframes countUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .stat-number-enhanced.animate {
            animation: countUp 0.8s ease-out;
        }

        /* Enhanced Hero Section */
        .modern-hero {
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-badge-modern {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 12px 20px;
            border-radius: 30px;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 24px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .hero-title-modern {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.1;
            color: white;
            margin-bottom: 20px;
            text-shadow: 0 4px 20px rgba(0,0,0,0.3);
        }

        .text-highlight {
            color: #fbbf24;
            text-shadow: 0 2px 10px rgba(251, 191, 36, 0.3);
        }

        .hero-description-modern {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .hero-features {
            display: flex;
            gap: 30px;
            margin-bottom: 40px;
        }

        .hero-feature-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: white;
            font-weight: 500;
        }

        .hero-feature-item i {
            font-size: 18px;
            color: #fbbf24;
        }

        .hero-actions-modern {
            display: flex;
            gap: 20px;
        }

        .btn-hero {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 16px 32px;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 16px;
        }

        .btn-hero.primary {
            background: white;
            color: var(--primary-color);
            box-shadow: var(--shadow-lg);
        }

        .btn-hero.primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(255,255,255,0.4);
            color: var(--primary-color);
        }

        .btn-hero.secondary {
            background: rgba(255,255,255,0.1);
            color: white;
            border: 2px solid rgba(255,255,255,0.3);
            backdrop-filter: blur(10px);
        }

        .btn-hero.secondary:hover {
            background: rgba(255,255,255,0.2);
            color: white;
        }

        /* Offer Card */
        .offer-card-modern {
            background: white;
            border-radius: var(--radius-xl);
            padding: 30px;
            box-shadow: var(--shadow-lg);
            text-align: center;
            animation: float 3s ease-in-out infinite;
        }

        .offer-header {
            margin-bottom: 20px;
        }

        .offer-icon {
            font-size: 3rem;
            margin-bottom: 15px;
        }

        .offer-header h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-dark);
            margin: 0;
        }

        .discount-percentage {
            font-size: 4rem;
            font-weight: 800;
            color: var(--primary-color);
            line-height: 1;
            margin-bottom: 10px;
        }

        .countdown-modern {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin: 20px 0;
        }

        .time-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            background: var(--primary-color);
            color: white;
            padding: 10px;
            border-radius: var(--radius-md);
            min-width: 50px;
        }

        .time-item .number {
            font-size: 1.5rem;
            font-weight: 700;
        }

        .time-item .label {
            font-size: 0.7rem;
            margin-top: 2px;
        }

        .separator {
            display: flex;
            align-items: center;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
        }

        .claim-btn {
            background: var(--primary-color);
            color: white;
            padding: 12px 24px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-block;
            margin-top: 15px;
        }

        .claim-btn:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            color: white;
        }

        /* Hero Decorations */
        .hero-decorations {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            pointer-events: none;
            z-index: 1;
        }

        .hero-decorations > div {
            position: absolute;
            font-size: 3rem;
            opacity: 0.1;
            animation: float 8s ease-in-out infinite;
        }

        .decoration-1 { top: 20%; left: 10%; animation-delay: 0s; }
        .decoration-2 { top: 60%; right: 15%; animation-delay: -2s; }
        .decoration-3 { top: 80%; left: 20%; animation-delay: -4s; }
        .decoration-4 { top: 40%; right: 30%; animation-delay: -6s; }
        .decoration-5 { top: 15%; left: 70%; animation-delay: -8s; }

        /* Trust Stats Section */
        .trust-stats-section {
            background: linear-gradient(135deg, #ffffff 0%, #f8fffe 100%);
            border-bottom: 1px solid var(--border-color);
            position: relative;
            overflow: hidden;
        }

        .trust-stats-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 25% 50%, rgba(16, 185, 129, 0.03) 0%, transparent 40%),
                radial-gradient(circle at 75% 50%, rgba(34, 197, 94, 0.03) 0%, transparent 40%);
            pointer-events: none;
        }

        .stat-card-enhanced {
            background: white;
            border-radius: var(--radius-xl);
            padding: 2rem 1.5rem;
            text-align: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(229, 231, 235, 0.5);
            height: 100%;
        }

        .stat-card-enhanced:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
            border-color: rgba(16, 185, 129, 0.3);
        }

        .stat-card-enhanced::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(16, 185, 129, 0.05), transparent);
            transition: left 0.8s ease;
        }

        .stat-card-enhanced:hover::before {
            left: 100%;
        }

        .stat-icon-enhanced {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: white;
            font-size: 2rem;
            position: relative;
            z-index: 2;
            transition: all 0.4s ease;
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
        }

        .stat-card-enhanced:hover .stat-icon-enhanced {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 12px 35px rgba(16, 185, 129, 0.4);
        }

        .stat-icon-enhanced::before {
            content: '';
            position: absolute;
            top: -8px;
            left: -8px;
            right: -8px;
            bottom: -8px;
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.2), rgba(5, 150, 105, 0.2));
            border-radius: 50%;
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .stat-card-enhanced:hover .stat-icon-enhanced::before {
            opacity: 1;
        }

        .stat-content-enhanced {
            position: relative;
            z-index: 2;
        }

        .stat-number-enhanced {
            font-size: 2.8rem;
            font-weight: 800;
            color: var(--primary-color);
            margin: 0 0 0.5rem 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
            line-height: 1;
            text-shadow: 0 2px 4px rgba(16, 185, 129, 0.1);
            transition: all 0.3s ease;
        }

        .stat-card-enhanced:hover .stat-number-enhanced {
            color: var(--primary-dark);
            transform: scale(1.05);
        }

        .stat-label-enhanced {
            color: var(--text-light);
            font-size: 1rem;
            margin: 0;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
            letter-spacing: 0.5px;
            transition: color 0.3s ease;
        }

        .stat-card-enhanced:hover .stat-label-enhanced {
            color: var(--text-dark);
        }

        .stat-background-pattern {
            position: absolute;
            top: -20px;
            right: -20px;
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.05), rgba(16, 185, 129, 0.02));
            border-radius: 50%;
            z-index: 1;
            transition: all 0.4s ease;
        }

        .stat-card-enhanced:hover .stat-background-pattern {
            transform: scale(1.2);
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.08), rgba(16, 185, 129, 0.04));
        }

        /* Alternative stat cards with different colors */
        .stat-card-enhanced:nth-child(2) .stat-icon-enhanced {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
            box-shadow: 0 8px 25px rgba(5, 150, 105, 0.3);
        }

        .stat-card-enhanced:nth-child(2):hover .stat-icon-enhanced {
            box-shadow: 0 12px 35px rgba(5, 150, 105, 0.4);
        }

        .stat-card-enhanced:nth-child(3) .stat-icon-enhanced {
            background: linear-gradient(135deg, #0891b2 0%, #0e7490 100%);
            box-shadow: 0 8px 25px rgba(8, 145, 178, 0.3);
        }

        .stat-card-enhanced:nth-child(3):hover .stat-icon-enhanced {
            box-shadow: 0 12px 35px rgba(8, 145, 178, 0.4);
        }

        .stat-card-enhanced:nth-child(4) .stat-icon-enhanced {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            box-shadow: 0 8px 25px rgba(245, 158, 11, 0.3);
        }

        .stat-card-enhanced:nth-child(4):hover .stat-icon-enhanced {
            box-shadow: 0 12px 35px rgba(245, 158, 11, 0.4);
        }

        /* Responsive adjustments for stats */
        @media (max-width: 992px) {
            .stat-card-enhanced {
                padding: 1.5rem 1rem;
                margin-bottom: 1.5rem;
            }

            .stat-icon-enhanced {
                width: 70px;
                height: 70px;
                font-size: 1.75rem;
                margin-bottom: 1rem;
            }

            .stat-number-enhanced {
                font-size: 2.2rem;
            }

            .stat-label-enhanced {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 768px) {
            .trust-stats-section {
                padding: 2rem 0;
            }

            .stat-card-enhanced {
                padding: 1.25rem 0.75rem;
            }

            .stat-icon-enhanced {
                width: 60px;
                height: 60px;
                font-size: 1.5rem;
                margin-bottom: 0.75rem;
            }

            .stat-number-enhanced {
                font-size: 1.8rem;
            }

            .stat-label-enhanced {
                font-size: 0.85rem;
            }
        }

        @media (max-width: 576px) {
            .stat-card-enhanced {
                margin-bottom: 1rem;
                padding: 1rem 0.5rem;
            }

            .stat-number-enhanced {
                font-size: 1.6rem;
            }

            .stat-background-pattern {
                display: none;
            }
        }

        /* Add counter animation */
        @keyframes countUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .stat-number-enhanced.animate {
            animation: countUp 0.8s ease-out;
        }

        /* Enhanced Hero Section */
        .modern-hero {
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-badge-modern {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 12px 20px;
            border-radius: 30px;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 24px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .hero-title-modern {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.1;
            color: white;
            margin-bottom: 20px;
            text-shadow: 0 4px 20px rgba(0,0,0,0.3);
        }

        .text-highlight {
            color: #fbbf24;
            text-shadow: 0 2px 10px rgba(251, 191, 36, 0.3);
        }

        .hero-description-modern {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .hero-features {
            display: flex;
            gap: 30px;
            margin-bottom: 40px;
        }

        .hero-feature-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: white;
            font-weight: 500;
        }

        .hero-feature-item i {
            font-size: 18px;
            color: #fbbf24;
        }

        .hero-actions-modern {
            display: flex;
            gap: 20px;
        }

        .btn-hero {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 16px 32px;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 16px;
        }

        .btn-hero.primary {
            background: white;
            color: var(--primary-color);
            box-shadow: var(--shadow-lg);
        }

        .btn-hero.primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(255,255,255,0.4);
            color: var(--primary-color);
        }

        .btn-hero.secondary {
            background: rgba(255,255,255,0.1);
            color: white;
            border: 2px solid rgba(255,255,255,0.3);
            backdrop-filter: blur(10px);
        }

        .btn-hero.secondary:hover {
            background: rgba(255,255,255,0.2);
            color: white;
        }

        /* Offer Card */
        .offer-card-modern {
            background: white;
            border-radius: var(--radius-xl);
            padding: 30px;
            box-shadow: var(--shadow-lg);
            text-align: center;
            animation: float 3s ease-in-out infinite;
        }

        .offer-header {
            margin-bottom: 20px;
        }

        .offer-icon {
            font-size: 3rem;
            margin-bottom: 15px;
        }

        .offer-header h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-dark);
            margin: 0;
        }

        .discount-percentage {
            font-size: 4rem;
            font-weight: 800;
            color: var(--primary-color);
            line-height: 1;
            margin-bottom: 10px;
        }

        .countdown-modern {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin: 20px 0;
        }

        .time-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            background: var(--primary-color);
            color: white;
            padding: 10px;
            border-radius: var(--radius-md);
            min-width: 50px;
        }

        .time-item .number {
            font-size: 1.5rem;
            font-weight: 700;
        }

        .time-item .label {
            font-size: 0.7rem;
            margin-top: 2px;
        }

        .separator {
            display: flex;
            align-items: center;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
        }

        .claim-btn {
            background: var(--primary-color);
            color: white;
            padding: 12px 24px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-block;
            margin-top: 15px;
        }

        .claim-btn:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            color: white;
        }

        /* About Section - Redesigned */
        .about-section-redesigned {
            background: linear-gradient(135deg, #f8fffe 0%, #f0fdfa 100%);
            position: relative;
            overflow: hidden;
        }

        .about-section-redesigned::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="%2310b981" stroke-width="0.5" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
            pointer-events: none;
        }

        .section-badge-modern {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            padding: 12px 24px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 20px;
            box-shadow: 0 4px 20px rgba(16, 185, 129, 0.3);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .section-title-redesigned {
            font-size: 2.8rem;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .text-gradient {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .section-subtitle-redesigned {
            font-size: 1.2rem;
            color: var(--text-light);
            line-height: 1.6;
            max-width: 600px;
            margin: 0 auto;
        }

        .about-content-redesigned {
            position: relative;
            z-index: 2;
        }

        .story-section {
            margin-bottom: 40px;
        }

        .story-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(16, 185, 129, 0.1);
            color: var(--primary-color);
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .story-heading {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 20px;
            line-height: 1.3;
        }

        .story-description {
            font-size: 1.1rem;
            color: var(--text-light);
            line-height: 1.8;
            margin-bottom: 0;
        }

        .values-list {
            margin-bottom: 40px;
        }

        .value-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 20px;
            padding: 20px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .value-item:hover {
            transform: translateX(5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .value-check {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 16px;
            flex-shrink: 0;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
        }

        .value-content h5 {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 5px;
            color: var(--text-dark);
        }

        .value-content p {
            color: var(--text-light);
            margin: 0;
            font-size: 0.95rem;
        }

        .about-stats {
            display: flex;
            gap: 30px;
            margin-bottom: 40px;
            padding: 25px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        }

        .stat-item {
            text-align: center;
            flex: 1;
        }

        .stat-number {
            display: block;
            font-size: 2rem;
            font-weight: 800;
            color: var(--primary-color);
            line-height: 1;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 0.9rem;
            color: var(--text-light);
            font-weight: 500;
        }

        .btn-about-redesigned {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            padding: 16px 32px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 700;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
        }

        .btn-about-redesigned:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(16, 185, 129, 0.4);
            color: white;
        }

        /* About Visual - Redesigned */
        .about-visual-redesigned {
            position: relative;
            height: 500px;
        }

        .visual-grid {
            position: relative;
            height: 100%;
        }

        .visual-card {
            position: absolute;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
            transition: all 0.4s ease;
            cursor: pointer;
        }

        .visual-card:hover {
            transform: scale(1.05) translateY(-5px);
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.25);
        }

        .main-card {
            width: 300px;
            height: 350px;
            top: 0;
            left: 0;
            z-index: 3;
        }

        .side-card-1 {
            width: 200px;
            height: 150px;
            top: 50px;
            right: 0;
            z-index: 2;
        }

        .side-card-2 {
            width: 180px;
            height: 120px;
            bottom: 0;
            left: 150px;
            z-index: 1;
        }

        .visual-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .visual-card:hover img {
            transform: scale(1.1);
        }

        .card-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
            color: white;
            padding: 20px;
            transform: translateY(100%);
            transition: transform 0.3s ease;
        }

        .visual-card:hover .card-overlay {
            transform: translateY(0);
        }

        .floating-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: white;
            padding: 15px 20px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            z-index: 10;
            animation: float 3s ease-in-out infinite;
        }

        .badge-content {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .badge-emoji {
            font-size: 2rem;
        }

        .badge-text strong {
            display: block;
            font-size: 1.2rem;
            color: var(--primary-color);
            font-weight: 800;
            line-height: 1;
        }

        .badge-text span {
            color: var(--text-light);
            font-size: 0.9rem;
        }

        /* Products Section - Redesigned */
        .products-section-redesigned {
            background: white;
        }

        .product-filter-redesigned {
            display: flex;
            justify-content: center;
        }

        .filter-container {
            display: flex;
            background: var(--bg-light);
            padding: 8px;
            border-radius: 50px;
            gap: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .filter-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            background: transparent;
            border: none;
            border-radius: 25px;
            font-weight: 600;
            color: var(--text-light);
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        .filter-btn.active,
        .filter-btn:hover {
            background: white;
            color: var(--primary-color);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .filter-icon {
            font-size: 16px;
        }

        /* Product Cards - Redesigned */
        .product-card-redesigned {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.4s ease;
            height: 100%;
        }

        .product-card-redesigned:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
        }

        .product-image-container {
            position: relative;
            height: 250px;
            overflow: hidden;
            background: var(--bg-light);
        }

        .product-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .product-card-redesigned:hover .product-image {
            transform: scale(1.1);
        }

        .product-badges {
            position: absolute;
            top: 15px;
            left: 15px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            z-index: 5;
        }

        .badge-hot {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: white;
            padding: 6px 12px;
            border-radius: 15px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .badge-discount {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
            padding: 6px 12px;
            border-radius: 15px;
            font-size: 11px;
            font-weight: 700;
        }

        .product-actions {
            position: absolute;
            top: 15px;
            right: 15px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .product-card-redesigned:hover .product-actions {
            opacity: 1;
        }

        .action-btn {
            width: 40px;
            height: 40px;
            background: white;
            border: none;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            color: var(--text-light);
        }

        .action-btn:hover {
            background: var(--primary-color);
            color: white;
            transform: scale(1.1);
        }

        .quick-add {
            background: var(--primary-color);
            color: white;
        }

        .quick-add:hover {
            background: var(--primary-dark);
        }

        .product-info {
            padding: 25px 20px;
        }

        .product-category {
            margin-bottom: 10px;
        }

        .product-category span {
            background: rgba(16, 185, 129, 0.1);
            color: var(--primary-color);
            padding: 4px 12px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .product-title {
            margin-bottom: 15px;
        }

        .product-title a {
            color: var(--text-dark);
            text-decoration: none;
            font-weight: 700;
            font-size: 1.1rem;
            line-height: 1.3;
            transition: color 0.3s ease;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .product-title a:hover {
            color: var(--primary-color);
        }

        .product-rating {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .stars {
            color: #fbbf24;
            font-size: 14px;
        }

        .review-count {
            color: var(--text-light);
            font-size: 12px;
        }

        .product-features {
            display: flex;
            gap: 8px;
            margin-bottom: 15px;
        }

        .feature-tag {
            display: flex;
            align-items: center;
            gap: 4px;
            background: var(--bg-light);
            padding: 4px 8px;
            border-radius: 8px;
            font-size: 11px;
            font-weight: 500;
            color: var(--text-light);
        }

        .feature-tag i {
            color: var(--primary-color);
            font-size: 10px;
        }

        .product-price {
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .current-price {
            font-size: 1.4rem;
            font-weight: 800;
            color: var(--primary-color);
        }

        .old-price {
            font-size: 1rem;
            color: var(--text-light);
            text-decoration: line-through;
        }

        .add-to-cart-btn {
            width: 100%;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            border: none;
            padding: 14px 20px;
            border-radius: 15px;
            font-weight: 700;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .add-to-cart-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
        }

        .btn-view-all-redesigned {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            padding: 16px 32px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 700;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
        }

        .btn-view-all-redesigned:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(16, 185, 129, 0.4);
            color: white;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .visual-grid .main-card {
                width: 250px;
                height: 300px;
            }

            .visual-grid .side-card-1 {
                width: 180px;
                height: 130px;
            }

            .visual-grid .side-card-2 {
                width: 160px;
                height: 100px;
            }

            .about-stats {
                gap: 20px;
            }
        }

        @media (max-width: 768px) {
            .section-title-redesigned {
                font-size: 2.2rem;
            }

            .about-visual-redesigned {
                height: 400px;
                margin-top: 30px;
            }

            .visual-grid {
                display: flex;
                flex-direction: column;
                gap: 20px;
                height: auto;
            }

            .visual-card {
                position: static !important;
                width: 100% !important;
                height: 200px !important;
            }

            .floating-badge {
                position: static;
                display: inline-block;
                margin-top: 20px;
            }

            .about-stats {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            .filter-container {
                flex-wrap: wrap;
                justify-content: center;
                gap: 5px;
            }

            .filter-btn {
                padding: 10px 16px;
                font-size: 13px;
            }

            .product-image-container {
                height: 220px;
            }
        }

        @media (max-width: 576px) {
            .values-list .value-item {
                flex-direction: column;
                text-align: center;
                gap: 10px;
            }

            .product-info {
                padding: 20px 15px;
            }

            .product-features {
                flex-wrap: wrap;
            }
        }

        /* Float animation */
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
    </style>

    <script>
        // Enhanced counter animation
        document.addEventListener('DOMContentLoaded', function() {
            // Animate counters when in viewport
            const observerOptions = {
                threshold: 0.3,
                rootMargin: '0px'
            };

            const statObserver = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const statNumbers = entry.target.querySelectorAll('.stat-number-enhanced');
                        statNumbers.forEach(statNumber => {
                            if (!statNumber.classList.contains('animated')) {
                                statNumber.classList.add('animate');
                                statNumber.classList.add('animated');
                                
                                // Animate the number counting if it has data-count
                                const finalValue = statNumber.getAttribute('data-count');
                                if (finalValue && !isNaN(parseFloat(finalValue))) {
                                    animateCounter(statNumber, finalValue);
                                }
                            }
                        });
                    }
                });
            }, observerOptions);

            // Observe the stats section
            const statsSection = document.querySelector('.trust-stats-section');
            if (statsSection) {
                statObserver.observe(statsSection);
            }

            function animateCounter(element, target) {
                const isPercentage = target.includes('%');
                const isStarRating = target.includes('★');
                const isPlus = target.includes('+');
                const isTime = target.includes('h');
                
                let numericTarget = parseFloat(target.replace(/[^\d.]/g, ''));
                let current = 0;
                const increment = numericTarget / 50; // 50 steps
                const duration = 2000; // 2 seconds
                const stepTime = duration / 50;

                const timer = setInterval(() => {
                    current += increment;
                    if (current >= numericTarget) {
                        current = numericTarget;
                        clearInterval(timer);
                    }

                    // Format the display value
                    let displayValue = Math.floor(current);
                    
                    if (isStarRating) {
                        displayValue = current.toFixed(1) + '★';
                    } else if (isPercentage) {
                        displayValue = Math.floor(current) + '%';
                    } else if (isPlus) {
                        displayValue = Math.floor(current).toLocaleString() + '+';
                    } else if (isTime) {
                        displayValue = Math.floor(current) + 'h';
                    } else if (current >= 1000) {
                        displayValue = (Math.floor(current) / 1000).toFixed(1) + 'k+';
                    }

                    element.textContent = displayValue;
                }, stepTime);
            }

            // ...existing code for other functionality...
        });
    </script>

@endsection
