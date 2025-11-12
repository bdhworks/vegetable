@extends('frontend.layout.master')

@section('content')

    <!-- Hero Banner Section Begin -->
    <section class="hero-banner">
        <div class="container-fluid p-0">
            <div class="hero__item set-bg" data-setbg="/assets/frontend/img/hero/banner-main.jpg" style="position: relative; height: 80vh; background-size: cover; background-position: center;">
                <div class="hero-overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(135deg, rgba(40, 167, 69, 0.7) 0%, rgba(34, 197, 94, 0.5) 100%);"></div>
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-lg-8">
                            <div class="hero__text text-white" style="position: relative; z-index: 2;">
                                <span class="hero-badge">🌱 NÔNG SẢN VIỆT</span>
                                <h1 class="hero-title">Chất lượng từ <br><span class="text-warning">Tự nhiên</span></h1>
                                <p class="hero-description">Giảm giá đến 25% cho đơn hàng đầu tiên. Giao hàng miễn phí toàn quốc.</p>
                                <div class="hero-stats mb-4">
                                    <div class="stat-item">
                                        <span class="stat-number">1000+</span>
                                        <span class="stat-label">Khách hàng</span>
                                    </div>
                                    <div class="stat-item">
                                        <span class="stat-number">100%</span>
                                        <span class="stat-label">Tự nhiên</span>
                                    </div>
                                    <div class="stat-item">
                                        <span class="stat-number">24/7</span>
                                        <span class="stat-label">Hỗ trợ</span>
                                    </div>
                                </div>
                                <div class="hero-actions">
                                    <a href="{{route('shop')}}" class="hero-btn primary">
                                        <span>Mua ngay</span>
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                    <a href="#products" class="hero-btn secondary">
                                        <span>Khám phá</span>
                                        <i class="fa fa-arrow-down"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="hero-floating-card">
                                <div class="floating-offer">
                                    <div class="offer-badge">🎉 Ưu đãi đặc biệt</div>
                                    <h3>Giảm 25%</h3>
                                    <p>Cho đơn hàng đầu tiên</p>
                                    <div class="countdown-timer" id="countdown">
                                        <div class="time-unit">
                                            <span class="number">24</span>
                                            <span class="label">Giờ</span>
                                        </div>
                                        <div class="time-unit">
                                            <span class="number">59</span>
                                            <span class="label">Phút</span>
                                        </div>
                                        <div class="time-unit">
                                            <span class="number">59</span>
                                            <span class="label">Giây</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Floating Elements -->
                <div class="floating-elements">
                    <div class="float-element float-1">🌿</div>
                    <div class="float-element float-2">🥕</div>
                    <div class="float-element float-3">🍎</div>
                    <div class="float-element float-4">🌾</div>
                    <div class="float-element float-5">🥬</div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Banner Section End -->

    <!-- Trust Indicators -->
    <section class="trust-indicators py-4 bg-white shadow-sm">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3 col-6 mb-3 mb-md-0">
                    <div class="trust-item">
                        <div class="trust-icon">🏆</div>
                        <div class="trust-text">
                            <span class="trust-number">5 năm</span>
                            <span class="trust-label">Kinh nghiệm</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-3 mb-md-0">
                    <div class="trust-item">
                        <div class="trust-icon">✅</div>
                        <div class="trust-text">
                            <span class="trust-number">100%</span>
                            <span class="trust-label">Đảm bảo chất lượng</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="trust-item">
                        <div class="trust-icon">🚚</div>
                        <div class="trust-text">
                            <span class="trust-number">Miễn phí</span>
                            <span class="trust-label">Giao hàng</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="trust-item">
                        <div class="trust-icon">⭐</div>
                        <div class="trust-text">
                            <span class="trust-number">4.9/5</span>
                            <span class="trust-label">Đánh giá</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section Begin -->
    <section class="features py-5 bg-gradient">
        <div class="container">
            <div class="section-header text-center mb-5">
                <span class="section-badge">✨ Tại sao chọn chúng tôi</span>
                <h2 class="section-title">Cam kết chất lượng</h2>
                <p class="section-subtitle">Những giá trị cốt lõi mà chúng tôi mang đến cho khách hàng</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="feature-card-enhanced">
                        <div class="feature-icon-wrapper">
                            <div class="feature-icon">🌿</div>
                            <div class="icon-bg"></div>
                        </div>
                        <h5>100% Tự nhiên</h5>
                        <p>Sản phẩm sạch, không hóa chất, an toàn cho sức khỏe</p>
                        <div class="feature-arrow">→</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="feature-card-enhanced">
                        <div class="feature-icon-wrapper">
                            <div class="feature-icon">🚚</div>
                            <div class="icon-bg"></div>
                        </div>
                        <h5>Giao hàng nhanh</h5>
                        <p>Miễn phí giao hàng trong ngày tại TP.HCM và Hà Nội</p>
                        <div class="feature-arrow">→</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="feature-card-enhanced">
                        <div class="feature-icon-wrapper">
                            <div class="feature-icon">✅</div>
                            <div class="icon-bg"></div>
                        </div>
                        <h5>Đảm bảo chất lượng</h5>
                        <p>Hoàn tiền 100% nếu không hài lòng về chất lượng</p>
                        <div class="feature-arrow">→</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="feature-card-enhanced">
                        <div class="feature-icon-wrapper">
                            <div class="feature-icon">📞</div>
                            <div class="icon-bg"></div>
                        </div>
                        <h5>Hỗ trợ 24/7</h5>
                        <p>Tư vấn nhiệt tình, chuyên nghiệp mọi lúc mọi nơi</p>
                        <div class="feature-arrow">→</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Features Section End -->

    <!-- Categories Section -->
    <section class="categories-section py-5">
        <div class="container">
            <div class="section-header text-center mb-5">
                <span class="section-badge">🛒 Danh mục</span>
                <h2 class="section-title">Sản phẩm theo danh mục</h2>
                <p class="section-subtitle">Khám phá các loại nông sản tươi ngon được phân loại cẩn thận</p>
            </div>
            <div class="row g-4">
                @foreach ($categories as $category)
                <div class="col-lg-4 col-md-6">
                    <div class="category-card-modern">
                        <div class="category-image">
                            <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}">
                            <div class="category-overlay"></div>
                        </div>
                        <div class="category-content">
                            <h4>{{ $category->name }}</h4>
                            <p>{{ $category->products_count ?? 0 }} sản phẩm</p>
                            <a href="{{ route('shop', ['category' => $category->id]) }}" class="category-btn">
                                Khám phá ngay
                                <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                        <div class="category-badge">
                            <span>{{ $category->products_count ?? 0 }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Best Selling Products Section Begin -->
    <section id="products" class="featured-products py-5 bg-light">
        <div class="container">
            <div class="section-header-left mb-5">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="title-wrapper">
                            <span class="section-badge">🔥 Bán chạy</span>
                            <h2 class="section-title">Sản phẩm bán chạy</h2>
                            <p class="section-subtitle">Những sản phẩm được khách hàng yêu thích và tin tưởng nhất</p>
                        </div>
                    </div>
                    <div class="col-lg-4 text-end">
                        <a href="{{route('shop')}}" class="view-all-btn">Xem tất cả →</a>
                    </div>
                </div>
            </div>
            
            <!-- Product Filter Tabs -->
            <div class="product-filter-tabs mb-4">
                <div class="filter-tabs-wrapper">
                    <button class="filter-tab active" data-filter="all">Tất cả</button>
                    <button class="filter-tab" data-filter="vegetables">Rau củ</button>
                    <button class="filter-tab" data-filter="fruits">Trái cây</button>
                    <button class="filter-tab" data-filter="organic">Hữu cơ</button>
                </div>
            </div>

            <div class="row product-grid">
                @foreach ($topSellingProducts as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="product-card-modern">
                            <div class="product-image-container">
                                <img src="{{$product->images->shift()->image}}" class="product-img" alt="{{$product->name}}">
                                <div class="product-badges">
                                    <span class="badge-hot">🔥 Hot</span>
                                    <span class="badge-discount">-25%</span>
                                </div>
                                <div class="product-actions-overlay">
                                    <div class="quick-actions">
                                        <button class="action-btn view-btn" onclick="window.location.href='{{route('product', [$product,Str::slug($product->name)])}}'" title="Xem nhanh">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                        <button class="action-btn cart-btn" onclick="window.location.href='{{route('cart.add', $product)}}'" title="Thêm vào giỏ">
                                            <i class="fa fa-shopping-cart"></i>
                                        </button>
                                        <button class="action-btn heart-btn" title="Yêu thích">
                                            <i class="fa fa-heart"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info-modern">
                                <div class="product-rating">
                                    <span class="stars">⭐⭐⭐⭐⭐</span>
                                    <span class="sold-count">({{$product->sold}})</span>
                                </div>
                                <h6 class="product-name">
                                    <a href="{{route('product', [$product,Str::slug($product->name)])}}">{{$product->name}}</a>
                                </h6>
                                <div class="price-section">
                                    <span class="current-price">{{ number_format($product->price_sale) }}đ</span>
                                    <span class="original-price">{{ number_format($product->price_sale * 1.25) }}đ</span>
                                </div>
                                <div class="product-footer">
                                    <button class="add-to-cart-btn" onclick="window.location.href='{{route('cart.add', $product)}}'">
                                        <span>Thêm vào giỏ</span>
                                        <div class="cart-icon"><i class="fa fa-shopping-cart"></i></div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Best Selling Products Section End -->

    <!-- Testimonials Section -->
    <section class="testimonials-section py-5">
        <div class="container">
            <div class="section-header text-center mb-5">
                <span class="section-badge">💬 Khách hàng nói gì</span>
                <h2 class="section-title">Đánh giá từ khách hàng</h2>
                <p class="section-subtitle">Những phản hồi chân thực từ khách hàng đã sử dụng sản phẩm</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="testimonial-card">
                        <div class="testimonial-header">
                            <div class="customer-avatar">
                                <img src="/assets/frontend/img/customers/customer-1.jpg" alt="Nguyễn Thị Lan">
                            </div>
                            <div class="customer-info">
                                <h5>Nguyễn Thị Lan</h5>
                                <p>Khách hàng thân thiết</p>
                            </div>
                            <div class="rating">⭐⭐⭐⭐⭐</div>
                        </div>
                        <div class="testimonial-content">
                            <p>"Rau củ ở đây tươi ngon lắm, giao hàng nhanh và đóng gói cẩn thận. Tôi đã mua nhiều lần và rất hài lòng!"</p>
                        </div>
                        <div class="testimonial-date">2 ngày trước</div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial-card">
                        <div class="testimonial-header">
                            <div class="customer-avatar">
                                <img src="/assets/frontend/img/customers/customer-2.jpg" alt="Trần Văn Nam">
                            </div>
                            <div class="customer-info">
                                <h5>Trần Văn Nam</h5>
                                <p>Khách hàng mới</p>
                            </div>
                            <div class="rating">⭐⭐⭐⭐⭐</div>
                        </div>
                        <div class="testimonial-content">
                            <p>"Chất lượng sản phẩm tuyệt vời, giá cả hợp lý. Đặc biệt là dịch vụ chăm sóc khách hàng rất tốt!"</p>
                        </div>
                        <div class="testimonial-date">1 tuần trước</div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial-card">
                        <div class="testimonial-header">
                            <div class="customer-avatar">
                                <img src="/assets/frontend/img/customers/customer-3.jpg" alt="Lê Thị Hoa">
                            </div>
                            <div class="customer-info">
                                <h5>Lê Thị Hoa</h5>
                                <p>Khách hàng VIP</p>
                            </div>
                            <div class="rating">⭐⭐⭐⭐⭐</div>
                        </div>
                        <div class="testimonial-content">
                            <p>"Mình tin tưởng và chỉ mua nông sản tại đây thôi. An toàn, sạch sẽ và luôn tươi ngon!"</p>
                        </div>
                        <div class="testimonial-date">3 ngày trước</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        /* Enhanced Hero Section */
        .hero-badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            color: white;
            padding: 10px 20px;
            border-radius: 30px;
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 20px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            animation: fadeInDown 1s ease-out;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 900;
            line-height: 1.1;
            margin-bottom: 25px;
            animation: fadeInUp 1s ease-out 0.3s both;
            text-shadow: 0 4px 20px rgba(0,0,0,0.3);
        }

        .hero-description {
            font-size: 1.2rem;
            line-height: 1.6;
            margin-bottom: 30px;
            opacity: 0.95;
            animation: fadeInUp 1s ease-out 0.5s both;
        }

        .hero-stats {
            display: flex;
            gap: 30px;
            margin-bottom: 40px;
            animation: fadeInUp 1s ease-out 0.7s both;
        }

        .stat-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 15px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 800;
            color: #fff;
        }

        .stat-label {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .hero-actions {
            display: flex;
            gap: 20px;
            animation: fadeInUp 1s ease-out 0.9s both;
        }

        .hero-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 15px 30px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .hero-btn.primary {
            background: linear-gradient(45deg, #fff, #f8f9fa);
            color: #28a745;
            box-shadow: 0 8px 30px rgba(255, 255, 255, 0.3);
        }

        .hero-btn.secondary {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
        }

        .hero-btn:hover {
            transform: translateY(-3px) scale(1.05);
        }

        .hero-btn.primary:hover {
            box-shadow: 0 12px 40px rgba(255, 255, 255, 0.4);
            color: #28a745;
        }

        .hero-btn.secondary:hover {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.5);
            color: white;
        }

        /* Floating Card */
        .hero-floating-card {
            animation: float 3s ease-in-out infinite;
        }

        .floating-offer {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 20px 60px rgba(0,0,0,0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .offer-badge {
            background: linear-gradient(45deg, #ff6b35, #f7931e);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 15px;
            display: inline-block;
        }

        .floating-offer h3 {
            font-size: 2.5rem;
            font-weight: 800;
            color: #28a745;
            margin-bottom: 10px;
        }

        .countdown-timer {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }

        .time-unit {
            display: flex;
            flex-direction: column;
            align-items: center;
            background: #28a745;
            color: white;
            padding: 10px;
            border-radius: 10px;
            min-width: 50px;
        }

        .time-unit .number {
            font-size: 1.5rem;
            font-weight: 700;
        }

        .time-unit .label {
            font-size: 0.7rem;
            margin-top: 2px;
        }

        /* Floating Elements */
        .floating-elements {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            pointer-events: none;
            overflow: hidden;
        }

        .float-element {
            position: absolute;
            font-size: 3rem;
            opacity: 0.1;
            animation: floatRandom 10s ease-in-out infinite;
        }

        .float-1 { top: 20%; left: 10%; animation-delay: 0s; }
        .float-2 { top: 60%; right: 15%; animation-delay: -2s; }
        .float-3 { top: 80%; left: 20%; animation-delay: -4s; }
        .float-4 { top: 40%; right: 30%; animation-delay: -6s; }
        .float-5 { top: 10%; left: 60%; animation-delay: -8s; }

        /* Trust Indicators */
        .trust-indicators {
            border-top: 4px solid #28a745;
        }

        .trust-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px;
            transition: transform 0.3s ease;
        }

        .trust-item:hover {
            transform: translateY(-3px);
        }

        .trust-icon {
            font-size: 2.5rem;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(45deg, #28a745, #20c997);
            border-radius: 15px;
            color: white;
            box-shadow: 0 8px 25px rgba(40, 167, 69, 0.3);
        }

        .trust-text {
            display: flex;
            flex-direction: column;
        }

        .trust-number {
            font-size: 1.2rem;
            font-weight: 700;
            color: #28a745;
        }

        .trust-label {
            font-size: 0.9rem;
            color: #666;
            font-weight: 500;
        }

        /* Enhanced Features */
        .bg-gradient {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }

        .feature-card-enhanced {
            background: white;
            padding: 40px 30px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 8px 30px rgba(0,0,0,0.08);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            height: 100%;
        }

        .feature-card-enhanced:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0,0,0,0.15);
        }

        .feature-card-enhanced::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(40, 167, 69, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .feature-card-enhanced:hover::before {
            left: 100%;
        }

        .feature-icon-wrapper {
            position: relative;
            margin-bottom: 25px;
        }

        .feature-icon {
            font-size: 4rem;
            position: relative;
            z-index: 2;
            display: inline-block;
        }

        .icon-bg {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100px;
            height: 100px;
            background: linear-gradient(45deg, rgba(40, 167, 69, 0.1), rgba(32, 201, 151, 0.1));
            border-radius: 50%;
            z-index: 1;
            transition: all 0.3s ease;
        }

        .feature-card-enhanced:hover .icon-bg {
            transform: translate(-50%, -50%) scale(1.2);
            background: linear-gradient(45deg, rgba(40, 167, 69, 0.2), rgba(32, 201, 151, 0.2));
        }

        .feature-card-enhanced h5 {
            font-size: 1.4rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 15px;
        }

        .feature-card-enhanced p {
            color: #666;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .feature-arrow {
            color: #28a745;
            font-size: 1.5rem;
            font-weight: 700;
            opacity: 0;
            transform: translateX(-10px);
            transition: all 0.3s ease;
        }

        .feature-card-enhanced:hover .feature-arrow {
            opacity: 1;
            transform: translateX(0);
        }

        /* Categories Section */
        .category-card-modern {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(0,0,0,0.1);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            height: 300px;
        }

        .category-card-modern:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0,0,0,0.2);
        }

        .category-image {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }

        .category-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .category-card-modern:hover .category-image img {
            transform: scale(1.1);
        }

        .category-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(40, 167, 69, 0.8), rgba(32, 201, 151, 0.6));
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .category-card-modern:hover .category-overlay {
            opacity: 1;
        }

        .category-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 30px;
            color: white;
            transform: translateY(20px);
            transition: all 0.3s ease;
        }

        .category-card-modern:hover .category-content {
            transform: translateY(0);
        }

        .category-content h4 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .category-content p {
            margin-bottom: 15px;
            opacity: 0.9;
        }

        .category-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            text-decoration: none;
            border-radius: 25px;
            font-weight: 600;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
        }

        .category-btn:hover {
            background: white;
            color: #28a745;
            transform: translateY(-2px);
        }

        .category-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(255, 255, 255, 0.9);
            color: #28a745;
            padding: 8px 12px;
            border-radius: 20px;
            font-weight: 700;
            font-size: 0.9rem;
        }

        /* Product Filter Tabs */
        .product-filter-tabs {
            display: flex;
            justify-content: center;
            margin-bottom: 40px;
        }

        .filter-tabs-wrapper {
            display: flex;
            background: white;
            border-radius: 50px;
            padding: 5px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            gap: 5px;
        }

        .filter-tab {
            padding: 12px 24px;
            background: transparent;
            border: none;
            border-radius: 25px;
            font-weight: 600;
            color: #666;
            cursor: pointer;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .filter-tab.active,
        .filter-tab:hover {
            background: linear-gradient(45deg, #28a745, #20c997);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
        }

        /* Enhanced Add to Cart Button */
        .add-to-cart-btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(45deg, #28a745, #20c997);
            color: white;
            border: none;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            position: relative;
            overflow: hidden;
        }

        .add-to-cart-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(40, 167, 69, 0.4);
        }

        .add-to-cart-btn .cart-icon {
            transition: transform 0.3s ease;
        }

        .add-to-cart-btn:hover .cart-icon {
            transform: scale(1.2) rotate(10deg);
        }

        /* Testimonials */
        .testimonial-card {
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            height: 100%;
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .testimonial-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            gap: 15px;
        }

        .customer-avatar img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #28a745;
        }

        .customer-info h5 {
            margin: 0;
            font-weight: 700;
            color: #333;
        }

        .customer-info p {
            margin: 5px 0 0 0;
            color: #666;
            font-size: 0.9rem;
        }

        .testimonial-content {
            margin-bottom: 15px;
        }

        .testimonial-content p {
            font-style: italic;
            color: #555;
            line-height: 1.6;
            margin: 0;
        }

        .testimonial-date {
            color: #999;
            font-size: 0.9rem;
        }

        .rating {
            margin-left: auto;
            font-size: 1.1rem;
        }

        /* Animations */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        @keyframes floatRandom {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            25% { transform: translate(10px, -10px) rotate(90deg); }
            50% { transform: translate(-10px, -20px) rotate(180deg); }
            75% { transform: translate(-20px, 10px) rotate(270deg); }
        }

        /* Section Headers */
        .section-header {
            max-width: 600px;
            margin: 0 auto;
        }

        .section-badge {
            display: inline-block;
            background: linear-gradient(45deg, #28a745, #20c997);
            color: white;
            padding: 8px 16px;
            border-radius: 25px;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 15px;
            box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: #333;
            margin-bottom: 15px;
            line-height: 1.2;
        }

        .section-subtitle {
            color: #666;
            font-size: 1.1rem;
            line-height: 1.6;
            margin: 0;
        }

        .view-all-btn {
            color: #28a745;
            font-weight: 600;
            font-size: 16px;
            text-decoration: none;
            padding: 12px 24px;
            border: 2px solid #28a745;
            border-radius: 25px;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .view-all-btn:hover {
            background: #28a745;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(40, 167, 69, 0.4);
        }

        /* Modern Product Card Styles */
        .product-card-modern {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            overflow: hidden;
            transition: all 0.3s ease;
            position: relative;
            height: 100%;
        }

        .product-card-modern:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 30px rgba(0,0,0,0.15);
        }

        .product-image-container {
            position: relative;
            overflow: hidden;
            border-radius: 16px 16px 0 0;
        }

        .product-img {
            width: 100%;
            height: 280px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .product-card-modern:hover .product-img {
            transform: scale(1.05);
        }

        .product-badges {
            position: absolute;
            top: 12px;
            left: 12px;
            z-index: 2;
        }

        .badge-hot {
            background: linear-gradient(45deg, #ff6b35, #f7931e);
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: block;
            margin-bottom: 5px;
        }

        .badge-new {
            background: linear-gradient(45deg, #28a745, #20c997);
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: block;
            margin-bottom: 5px;
        }

        .badge-discount {
            background: linear-gradient(45deg, #dc3545, #e74c3c);
            color: white;
            padding: 4px 8px;
            border-radius: 15px;
            font-size: 10px;
            font-weight: 700;
        }

        .product-actions-overlay {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: rgba(0,0,0,0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .product-card-modern:hover .product-actions-overlay {
            opacity: 1;
        }

        .quick-actions {
            display: flex;
            gap: 10px;
        }

        .action-btn {
            width: 45px;
            height: 45px;
            border: none;
            border-radius: 50%;
            background: white;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }

        .action-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
        }

        .view-btn:hover { background: #007bff; }
        .cart-btn:hover { background: #28a745; }
        .heart-btn:hover { background: #dc3545; }

        .product-info-modern {
            padding: 20px;
        }

        .product-rating {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .stars {
            font-size: 12px;
        }

        .sold-count {
            color: #666;
            font-size: 12px;
        }

        .product-name {
            margin-bottom: 12px;
            line-height: 1.4;
        }

        .product-name a {
            color: #333;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .product-name a:hover {
            color: #28a745;
        }

        .price-section {
            margin-bottom: 15px;
        }

        .current-price {
            color: #28a745;
            font-size: 18px;
            font-weight: 700;
        }

        .original-price {
            color: #999;
            font-size: 14px;
            text-decoration: line-through;
            margin-left: 8px;
        }

        /* Section Header Left Styles */
        .section-header-left {
            margin-bottom: 3rem;
        }

        .title-wrapper {
            text-align: left;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-stats {
                flex-direction: column;
                gap: 15px;
            }
            
            .hero-actions {
                flex-direction: column;
                gap: 15px;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .filter-tabs-wrapper {
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .trust-item {
                flex-direction: column;
                text-align: center;
                gap: 10px;
            }
            
            .testimonial-header {
                flex-direction: column;
                text-align: center;
            }
            
            .category-card-modern {
                height: 250px;
            }
            
            .floating-offer {
                padding: 20px;
            }
            
            .hero-floating-card {
                margin-top: 30px;
            }
            
            .section-badge {
                font-size: 12px;
                padding: 6px 12px;
            }
            
            .feature-icon {
                font-size: 3rem;
            }
        }

        @media (max-width: 576px) {
            .hero-title {
                font-size: 2rem;
            }
            
            .section-title {
                font-size: 1.75rem;
            }
            
            .trust-icon {
                font-size: 2rem;
                width: 50px;
                height: 50px;
            }
            
            .feature-card-enhanced {
                padding: 30px 20px;
            }
            
            .category-card-modern {
                height: 200px;
            }
            
            .category-content {
                padding: 20px;
            }
            
            .testimonial-card {
                padding: 20px;
            }
        }
    </style>

    <script>
        // Product filter tabs functionality
        document.addEventListener('DOMContentLoaded', function() {
            const filterTabs = document.querySelectorAll('.filter-tab');
            const productCards = document.querySelectorAll('.product-card-modern');

            filterTabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    // Remove active class from all tabs
                    filterTabs.forEach(t => t.classList.remove('active'));
                    // Add active class to clicked tab
                    this.classList.add('active');

                    const filter = this.getAttribute('data-filter');
                    
                    // Show/hide products based on filter
                    productCards.forEach(card => {
                        if (filter === 'all') {
                            card.style.display = 'block';
                        } else {
                            // This would need to be implemented based on your product data structure
                            card.style.display = 'block';
                        }
                    });
                });
            });

            // Countdown timer
            function updateCountdown() {
                const now = new Date().getTime();
                const tomorrow = new Date(now + 24 * 60 * 60 * 1000);
                const distance = tomorrow - now;

                const hours = Math.floor(distance / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                const timeUnits = document.querySelectorAll('.time-unit .number');
                if (timeUnits.length >= 3) {
                    timeUnits[0].textContent = hours.toString().padStart(2, '0');
                    timeUnits[1].textContent = minutes.toString().padStart(2, '0');
                    timeUnits[2].textContent = seconds.toString().padStart(2, '0');
                }
            }

            // Update countdown every second
            setInterval(updateCountdown, 1000);
            updateCountdown();

            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Add scroll animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            // Observe all cards and sections
            document.querySelectorAll('.feature-card-enhanced, .product-card-modern, .testimonial-card, .category-card-modern').forEach(el => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(30px)';
                el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(el);
            });
        });
    </script>

@endsection
