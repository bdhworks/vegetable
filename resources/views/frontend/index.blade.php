@extends('frontend.layout.fe')

@section('content')

<!-- Enhanced Hero Banner with Image Slider -->
<section class="hero-banner-enhanced">
    <div class="hero-slider-wrapper">
        <div class="hero-slide active">
            <div class="hero-overlay"></div>
            <div class="container">
                <div class="hero-content-wrapper">
                    <div class="hero-text-section">
                        <div class="hero-label">
                            <span class="label-icon">🌿</span>
                            <span class="label-text">ORGANIC CERTIFIED</span>
                        </div>
                        <h1 class="hero-main-heading">
                            Nông Sản Sạch
                            <span class="hero-accent-text">Tươi Ngon Mỗi Ngày</span>
                        </h1>
                        <p class="hero-lead-text">
                            Trải nghiệm mua sắm thực phẩm tươi sống với chất lượng cao nhất. 
                            Giao hàng nhanh chóng, đóng gói cẩn thận, đảm bảo tươi ngon 100%.
                        </p>
                        
                        <div class="hero-highlight-features">
                            <div class="highlight-item">
                                <div class="highlight-icon">
                                    <i class="fa fa-check-circle"></i>
                                </div>
                                <div class="highlight-text">
                                    <strong>Giao 2-4 giờ</strong>
                                    <span>Miễn phí từ 300K</span>
                                </div>
                            </div>
                            <div class="highlight-item">
                                <div class="highlight-icon">
                                    <i class="fa fa-leaf"></i>
                                </div>
                                <div class="highlight-text">
                                    <strong>100% Organic</strong>
                                    <span>Chứng nhận VietGAP</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="hero-action-buttons">
                            <a href="{{route('shop')}}" class="btn-hero btn-hero-primary">
                                <span>Mua Ngay</span>
                                <i class="fa fa-shopping-bag"></i>
                            </a>
                            <a href="#categories" class="btn-hero btn-hero-outline">
                                <i class="fa fa-th-large"></i>
                                <span>Danh Mục</span>
                            </a>
                        </div>
                    </div>
                    
                    <div class="hero-visual-section">
                        <div class="hero-product-display">
                            <div class="product-badge-corner">
                                <div class="badge-circle">
                                    <span class="badge-number">-30%</span>
                                </div>
                            </div>
                            
                            <div class="product-display-card">
                                <div class="product-image-circle">
                                    <i class="fa fa-shopping-basket"></i>
                                </div>
                                <h4 class="product-display-name">Combo Rau Củ Tươi</h4>
                                <div class="product-display-price">
                                    <span class="display-price-sale">250.000₫</span>
                                    <span class="display-price-old">350.000₫</span>
                                </div>
                                <button class="btn-product-quick" onclick="window.location.href='{{route('shop')}}'">
                                    <i class="fa fa-cart-plus"></i>
                                    <span>Thêm Vào Giỏ</span>
                                </button>
                            </div>
                            
                            <div class="floating-badge badge-trust">
                                <div class="trust-icon">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="trust-content">
                                    <strong>5000+</strong>
                                    <span>Khách hàng</span>
                                </div>
                            </div>
                            
                            <div class="floating-badge badge-rating">
                                <div class="rating-stars">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <span class="rating-text">4.9/5.0</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Background Decorations -->
        <div class="hero-background-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
        </div>
    </div>
</section>

<!-- Enhanced Quick Access Categories -->
<section id="categories" class="quick-access-categories">
    <div class="container">
        <div class="categories-wrapper">
            <div class="category-box featured-box">
                <a href="{{route('shop')}}" class="category-link-enhanced">
                    <div class="category-visual">
                        <div class="category-icon-large green-gradient">
                            <i class="fa fa-leaf"></i>
                        </div>
                        <div class="category-badge">
                            <span>150+</span>
                        </div>
                    </div>
                    <div class="category-text">
                        <h3 class="category-title">Rau Củ Quả</h3>
                        <p class="category-subtitle">Tươi ngon hàng ngày</p>
                    </div>
                    <div class="category-arrow">
                        <i class="fa fa-arrow-right"></i>
                    </div>
                </a>
            </div>
            
            <div class="category-box">
                <a href="{{route('shop')}}" class="category-link-enhanced">
                    <div class="category-visual">
                        <div class="category-icon-large orange-gradient">
                            <i class="fa fa-apple"></i>
                        </div>
                        <div class="category-badge">
                            <span>80+</span>
                        </div>
                    </div>
                    <div class="category-text">
                        <h3 class="category-title">Trái Cây</h3>
                        <p class="category-subtitle">Nhập khẩu & nội địa</p>
                    </div>
                    <div class="category-arrow">
                        <i class="fa fa-arrow-right"></i>
                    </div>
                </a>
            </div>
            
            <div class="category-box">
                <a href="{{route('shop')}}" class="category-link-enhanced">
                    <div class="category-visual">
                        <div class="category-icon-large blue-gradient">
                            <i class="fa fa-pagelines"></i>
                        </div>
                        <div class="category-badge">
                            <span>25+</span>
                        </div>
                    </div>
                    <div class="category-text">
                        <h3 class="category-title">Rau Thơm</h3>
                        <p class="category-subtitle">Gia vị tự nhiên</p>
                    </div>
                    <div class="category-arrow">
                        <i class="fa fa-arrow-right"></i>
                    </div>
                </a>
            </div>
            
            <div class="category-box">
                <a href="{{route('shop')}}" class="category-link-enhanced">
                    <div class="category-visual">
                        <div class="category-icon-large purple-gradient">
                            <i class="fa fa-certificate"></i>
                        </div>
                        <div class="category-badge">
                            <span>60+</span>
                        </div>
                    </div>
                    <div class="category-text">
                        <h3 class="category-title">Hữu Cơ</h3>
                        <p class="category-subtitle">Chứng nhận quốc tế</p>
                    </div>
                    <div class="category-arrow">
                        <i class="fa fa-arrow-right"></i>
                    </div>
                </a>
            </div>
            
            <div class="category-box hot-box">
                <a href="{{route('shop')}}" class="category-link-enhanced">
                    <div class="category-visual">
                        <div class="category-icon-large red-gradient">
                            <i class="fa fa-fire"></i>
                        </div>
                        <div class="category-badge hot-badge">
                            <span>HOT</span>
                        </div>
                    </div>
                    <div class="category-text">
                        <h3 class="category-title">Khuyến Mãi</h3>
                        <p class="category-subtitle">Giảm đến 50%</p>
                    </div>
                    <div class="category-arrow">
                        <i class="fa fa-arrow-right"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Flash Deals Section -->
<section class="flash-deals-section">
    <div class="container">
        <div class="section-header-flash">
            <div class="section-title-group">
                <div class="flash-badge-wrapper">
                    <div class="flash-icon-box">
                        <i class="fa fa-bolt"></i>
                    </div>
                    <div class="flash-text-group">
                        <h2 class="section-title-main">
                            Flash Sale Hôm Nay
                        </h2>
                        <p class="section-subtitle-main">
                            <i class="fa fa-fire"></i>
                            Giảm giá sốc - Số lượng có hạn
                        </p>
                    </div>
                </div>
            </div>
            <div class="countdown-timer">
                <div class="timer-label-main">Kết thúc trong:</div>
                <div class="timer-boxes">
                    <div class="timer-box">
                        <span class="timer-number">02</span>
                        <span class="timer-label">Giờ</span>
                    </div>
                    <span class="timer-colon">:</span>
                    <div class="timer-box">
                        <span class="timer-number">30</span>
                        <span class="timer-label">Phút</span>
                    </div>
                    <span class="timer-colon">:</span>
                    <div class="timer-box">
                        <span class="timer-number">45</span>
                        <span class="timer-label">Giây</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="flash-deals-grid">
            @foreach ($topSellingProducts->take(4) as $product)
            <div class="deal-card">
                <div class="deal-badge-group">
                    <div class="deal-badge discount-badge">
                        <i class="fa fa-bolt"></i>
                        <span>-35%</span>
                    </div>
                    <div class="deal-badge hot-badge">
                        <i class="fa fa-fire"></i>
                    </div>
                </div>
                
                <div class="deal-image">
                    @if($product->images->count() > 0)
                        <img src="{{$product->images->first()->image}}" alt="{{$product->name}}">
                    @else
                        <div class="deal-placeholder">
                            <i class="fa fa-image"></i>
                            <p>No Image</p>
                        </div>
                    @endif
                    <div class="deal-overlay">
                        <a class="deal-quick-view" href="{{route('product', [$product, Str::slug($product->name)])}}">
                            <i class="fa fa-eye"></i>
                        </a>
                    </div>
                </div>
                
                <div class="deal-info">
                    <div class="deal-category">
                        <i class="fa fa-leaf"></i>
                        {{ $product->category->name ?? 'Nông Sản' }}
                    </div>
                    
                    <h3 class="deal-title" title="{{$product->name}}">{{$product->name}}</h3>
                    
                    <div class="deal-rating">
                        <div class="stars">
                            @for($i = 1; $i <= 5; $i++)
                            <i class="fa fa-star{{$i <= 4 ? '' : '-o'}}"></i>
                            @endfor
                        </div>
                        <span class="rating-number">(4.0)</span>
                        <span class="sold-count">• {{rand(100, 500)}} đã bán</span>
                    </div>
                    
                    <div class="deal-price-wrapper">
                        <div class="deal-price">
                            <span class="price-sale">{{number_format($product->price_sale)}}₫</span>
                            <span class="price-original">{{number_format($product->price_sale * 1.35)}}₫</span>
                        </div>
                        <div class="save-amount">
                            <i class="fa fa-gift"></i>
                            Tiết kiệm {{number_format($product->price_sale * 0.35)}}₫
                        </div>
                    </div>
                    
                    <div class="deal-progress">
                        <div class="progress-header">
                            <span class="progress-label">
                                <i class="fa fa-fire"></i>
                                Đang bán chạy
                            </span>
                            <span class="progress-text">Đã bán 70%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 70%"></div>
                        </div>
                    </div>
                    
                    <a href="{{route('cart.add', $product)}}" class="btn-add-deal">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Thêm Vào Giỏ</span>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="flash-deals-footer">
            <a href="{{route('shop')}}" class="btn-view-all-deals">
                Xem Tất Cả Flash Sale
                <i class="fa fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<!-- Featured Products -->
<section id="products" class="featured-products-section">
    <div class="container">
        <div class="section-header-with-tabs">
            <div class="section-title-group">
                <h2 class="section-title-main">Sản Phẩm Nổi Bật</h2>
                <p class="section-subtitle-main">Được khách hàng yêu thích nhất</p>
            </div>
            <div class="product-filter-tabs">
                <button class="tab-filter active" data-filter="all">
                    <span>Tất Cả</span>
                </button>
                <button class="tab-filter" data-filter="vegetables">
                    <span>Rau Củ</span>
                </button>
                <button class="tab-filter" data-filter="fruits">
                    <span>Trái Cây</span>
                </button>
                <button class="tab-filter" data-filter="organic">
                    <span>Hữu Cơ</span>
                </button>
            </div>
        </div>
        
        <div class="products-grid-main">
            @foreach ($topSellingProducts->take(9) as $product)
            <div class="product-card-main" data-category="vegetables">
                @if($product->quantity > 0)
                <div class="product-labels">
                    <span class="label hot">Hot</span>
                    @if($product->price_sale < $product->price_sale * 1.2)
                    <span class="label discount">-20%</span>
                    @endif
                </div>
                @endif
                
                <div class="product-image-main">
                    @if($product->images->count() > 0)
                        <img src="{{$product->images->first()->image}}" alt="{{$product->name}}" class="img-main">
                    @else
                        <div class="img-placeholder">
                            <i class="fa fa-image"></i>
                            <p>No Image</p>
                        </div>
                    @endif
                    
                    <div class="product-actions-overlay">
                        <button class="action-icon-btn" title="Yêu thích">
                            <i class="fa fa-heart-o"></i>
                        </button>
                        <a class="action-icon-btn" href="{{route('product', [$product, Str::slug($product->name)])}}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <button class="action-icon-btn" title="So sánh">
                            <i class="fa fa-exchange"></i>
                        </button>
                    </div>
                    
                    <div class="quick-add-overlay">
                        <button class="btn-quick-add" onclick="window.location.href='{{route('cart.add', $product)}}'">
                            <i class="fa fa-shopping-cart"></i>
                            <span>Thêm Vào Giỏ</span>
                        </button>
                    </div>
                </div>
                
                <div class="product-content-main">
                    <div class="product-meta-row">
                        <span class="product-category-tag">{{ $product->category->name ?? 'Nông Sản' }}</span>
                        <div class="stock-badge {{$product->quantity > 0 ? 'in-stock' : 'out-stock'}}">
                            <i class="fa fa-{{$product->quantity > 0 ? 'check' : 'times'}}"></i>
                            {{$product->quantity > 0 ? 'Còn hàng' : 'Hết'}}
                        </div>
                    </div>
                    
                    <h3 class="product-title-main">
                        <a href="{{route('product', [$product, Str::slug($product->name)])}}">
                            {{$product->name}}
                        </a>
                    </h3>
                    
                    <div class="product-rating-row">
                        <div class="rating-stars-group">
                            @for($i = 1; $i <= 5; $i++)
                            <i class="fa fa-star{{$i <= 4 ? '' : '-o'}}"></i>
                            @endfor
                        </div>
                        <span class="rating-count-text">({{rand(10, 50)}} đánh giá)</span>
                    </div>
                    
                    <div class="product-price-section">
                        <div class="price-main-group">
                            <span class="price-sale-main">{{number_format($product->price_sale)}}₫</span>
                            @if($product->price_sale < $product->price_sale * 1.2)
                            <span class="price-old-main">{{number_format($product->price_sale * 1.2)}}₫</span>
                            @endif
                        </div>
                        @if($product->price_sale < $product->price_sale * 1.2)
                        <div class="save-amount">
                            <span>Tiết kiệm {{number_format($product->price_sale * 0.2)}}₫</span>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="section-footer-center">
            <a href="{{route('shop')}}" class="btn-view-more">
                <span>Xem Tất Cả Sản Phẩm</span>
                <i class="fa fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<!-- Why Choose Us - Redesigned E-commerce Style -->
<section class="why-choose-redesigned">
    <div class="container">
        <div class="why-choose-content">
            <div class="why-choose-left">
                <div class="section-badge">
                    <i class="fa fa-star"></i>
                    <span>Cam Kết Chất Lượng</span>
                </div>
                <h2 class="section-heading-large">
                    Tại Sao Khách Hàng
                    <span class="heading-highlight">Tin Tưởng Chúng Tôi?</span>
                </h2>
                <p class="section-description-large">
                    Chúng tôi cam kết mang đến trải nghiệm mua sắm tốt nhất với sản phẩm chất lượng cao, 
                    dịch vụ chuyên nghiệp và giá cả cạnh tranh nhất thị trường.
                </p>
                
                <div class="stats-highlights">
                    <div class="stat-highlight-item">
                        <div class="stat-number-large">5000+</div>
                        <div class="stat-label-text">Khách hàng hài lòng</div>
                    </div>
                    <div class="stat-highlight-item">
                        <div class="stat-number-large">10K+</div>
                        <div class="stat-label-text">Đơn hàng thành công</div>
                    </div>
                    <div class="stat-highlight-item">
                        <div class="stat-number-large">4.9★</div>
                        <div class="stat-label-text">Đánh giá trung bình</div>
                    </div>
                </div>
            </div>
            
            <div class="why-choose-right">
                <div class="features-grid-modern">
                    <div class="feature-item-modern">
                        <div class="feature-icon-box green">
                            <i class="fa fa-leaf"></i>
                        </div>
                        <div class="feature-content">
                            <h4 class="feature-heading">100% Tự Nhiên</h4>
                            <p class="feature-description">Không chất bảo quản, hóa chất độc hại. An toàn tuyệt đối cho sức khỏe.</p>
                        </div>
                    </div>
                    
                    <div class="feature-item-modern">
                        <div class="feature-icon-box blue">
                            <i class="fa fa-truck"></i>
                        </div>
                        <div class="feature-content">
                            <h4 class="feature-heading">Giao Hàng Nhanh</h4>
                            <p class="feature-description">Giao hàng trong 2-4 giờ. Miễn phí vận chuyển cho đơn từ 300K.</p>
                        </div>
                    </div>
                    
                    <div class="feature-item-modern">
                        <div class="feature-icon-box orange">
                            <i class="fa fa-shield"></i>
                        </div>
                        <div class="feature-content">
                            <h4 class="feature-heading">Cam Kết Hoàn Tiền</h4>
                            <p class="feature-description">Hoàn tiền 100% nếu sản phẩm không đúng như mô tả.</p>
                        </div>
                    </div>
                    
                    <div class="feature-item-modern">
                        <div class="feature-icon-box purple">
                            <i class="fa fa-headphones"></i>
                        </div>
                        <div class="feature-content">
                            <h4 class="feature-heading">Hỗ Trợ 24/7</h4>
                            <p class="feature-description">Đội ngũ tư vấn chuyên nghiệp luôn sẵn sàng giúp đỡ bạn.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials - Redesigned E-commerce Style -->
<section class="testimonials-redesigned">
    <div class="container">
        <div class="testimonials-header-center">
            <div class="section-badge">
                <i class="fa fa-comments"></i>
                <span>Đánh Giá Từ Khách Hàng</span>
            </div>
            <h2 class="section-heading-large">
                Câu Chuyện Từ
                <span class="heading-highlight">Khách Hàng Của Chúng Tôi</span>
            </h2>
            <p class="section-description-large">Hơn 5000 khách hàng đã tin tưởng và hài lòng với sản phẩm của chúng tôi</p>
        </div>
        
        <div class="testimonials-slider">
            <div class="testimonial-item-modern">
                <div class="testimonial-header">
                    <div class="customer-avatar-large">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="customer-identity">
                        <h4 class="customer-name-large">Nguyễn Thị Lan Anh</h4>
                        <div class="customer-meta">
                            <span class="customer-role">Khách hàng thân thiết</span>
                            <span class="verified-badge">
                                <i class="fa fa-check-circle"></i>
                                Đã xác minh
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="testimonial-rating-large">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <span class="rating-score">5.0</span>
                </div>
                
                <p class="testimonial-content-large">
                    "Tôi đã mua rau củ ở đây được 6 tháng và luôn hài lòng về chất lượng. Rau tươi ngon, 
                    đóng gói cẩn thận, giao hàng đúng hẹn. Nhân viên tư vấn nhiệt tình. Sẽ tiếp tục ủng hộ!"
                </p>
                
                <div class="testimonial-footer">
                    <span class="purchase-info">
                        <i class="fa fa-shopping-bag"></i>
                        Đã mua 45 lần
                    </span>
                    <span class="date-info">3 ngày trước</span>
                </div>
            </div>
            
            <div class="testimonial-item-modern featured">
                <div class="featured-badge-ribbon">
                    <i class="fa fa-star"></i>
                    <span>Đánh giá nổi bật</span>
                </div>
                
                <div class="testimonial-header">
                    <div class="customer-avatar-large">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="customer-identity">
                        <h4 class="customer-name-large">Trần Văn Nam</h4>
                        <div class="customer-meta">
                            <span class="customer-role">Chủ nhà hàng</span>
                            <span class="verified-badge">
                                <i class="fa fa-check-circle"></i>
                                Đã xác minh
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="testimonial-rating-large">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <span class="rating-score">5.0</span>
                </div>
                
                <p class="testimonial-content-large">
                    "Là chủ nhà hàng, tôi rất khắt khe về nguồn gốc thực phẩm. Shop này không chỉ cung cấp 
                    rau củ tươi ngon mà còn có giá cả hợp lý. Dịch vụ chuyên nghiệp, luôn giao đúng giờ!"
                </p>
                
                <div class="testimonial-footer">
                    <span class="purchase-info">
                        <i class="fa fa-shopping-bag"></i>
                        Đã mua 120 lần
                    </span>
                    <span class="date-info">1 tuần trước</span>
                </div>
            </div>
            
            <div class="testimonial-item-modern">
                <div class="testimonial-header">
                    <div class="customer-avatar-large">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="customer-identity">
                        <h4 class="customer-name-large">Lê Thị Hoa</h4>
                        <div class="customer-meta">
                            <span class="customer-role">Khách hàng VIP</span>
                            <span class="verified-badge">
                                <i class="fa fa-check-circle"></i>
                                Đã xác minh
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="testimonial-rating-large">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <span class="rating-score">5.0</span>
                </div>
                
                <p class="testimonial-content-large">
                    "Từ khi biết shop này, cả gia đình tôi chỉ mua rau củ ở đây. Sản phẩm luôn tươi ngon, 
                    an toàn. Đặc biệt là cam kết hữu cơ VietGAP rất đáng tin cậy. Rất hài lòng!"
                </p>
                
                <div class="testimonial-footer">
                    <span class="purchase-info">
                        <i class="fa fa-shopping-bag"></i>
                        Đã mua 78 lần
                    </span>
                    <span class="date-info">5 ngày trước</span>
                </div>
            </div>
        </div>
        
        <div class="testimonials-navigation">
            <button class="nav-arrow prev-arrow">
                <i class="fa fa-chevron-left"></i>
            </button>
            <div class="testimonials-dots">
                <span class="dot active"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
            <button class="nav-arrow next-arrow">
                <i class="fa fa-chevron-right"></i>
            </button>
        </div>
    </div>
</section>

<!-- Newsletter CTA - Redesigned E-commerce Style -->
<section class="newsletter-redesigned">
    <div class="newsletter-background">
        <div class="newsletter-shape shape-1"></div>
        <div class="newsletter-shape shape-2"></div>
    </div>
    
    <div class="container">
        <div class="newsletter-container-modern">
            <div class="newsletter-visual">
                <div class="newsletter-icon-large">
                    <i class="fa fa-envelope-open"></i>
                </div>
                <div class="newsletter-benefits">
                    <div class="benefit-tag">
                        <i class="fa fa-check"></i>
                        <span>Ưu đãi độc quyền</span>
                    </div>
                    <div class="benefit-tag">
                        <i class="fa fa-check"></i>
                        <span>Sản phẩm mới</span>
                    </div>
                    <div class="benefit-tag">
                        <i class="fa fa-check"></i>
                        <span>Mẹo nấu ăn</span>
                    </div>
                </div>
            </div>
            
            <div class="newsletter-form-wrapper">
                <h2 class="newsletter-heading-modern">
                    Đăng Ký Nhận Ưu Đãi
                    <span class="highlight-text">Đặc Biệt</span>
                </h2>
                <p class="newsletter-subheading">
                    Nhận mã giảm giá 10% cho đơn hàng đầu tiên và cập nhật sản phẩm mới mỗi tuần
                </p>
                
                <form class="newsletter-form-modern">
                    <div class="form-input-modern">
                        <i class="fa fa-envelope"></i>
                        <input type="email" placeholder="Nhập email của bạn" required>
                    </div>
                    <button type="submit" class="newsletter-submit-modern">
                        <span>Đăng Ký Ngay</span>
                        <i class="fa fa-arrow-right"></i>
                    </button>
                </form>
                
                <div class="newsletter-footer-info">
                    <div class="privacy-notice">
                        <i class="fa fa-lock"></i>
                        <span>Chúng tôi cam kết bảo mật thông tin của bạn</span>
                    </div>
                    <div class="subscriber-count">
                        <i class="fa fa-users"></i>
                        <span>Tham gia cùng <strong>8,000+</strong> người đăng ký</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
:root {
    --color-primary: #10b981;
    --color-primary-dark: #059669;
    --color-primary-light: #34d399;
    --color-secondary: #f59e0b;
    --color-danger: #ef4444;
    --color-success: #10b981;
    --color-info: #3b82f6;
    --color-warning: #f59e0b;
    --color-dark: #1f2937;
    --color-light: #f9fafb;
    --color-white: #ffffff;
    --color-border: #e5e7eb;
    --color-text: #374151;
    --color-text-light: #6b7280;
    --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
    --radius-sm: 8px;
    --radius-md: 12px;
    --radius-lg: 16px;
    --radius-xl: 20px;
    --radius-full: 9999px;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Enhanced Hero Banner */
.hero-banner-enhanced {
    position: relative;
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    overflow: hidden;
}

.hero-slider-wrapper {
    position: relative;
    min-height: 600px;
}

.hero-slide {
    position: relative;
    padding: 100px 0 80px;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(16, 185, 129, 0.95) 0%, rgba(5, 150, 105, 0.9) 100%);
    z-index: 1;
}

.hero-background-shapes {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    z-index: 0;
}

.shape {
    position: absolute;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.08);
}

.shape-1 {
    width: 500px;
    height: 500px;
    top: -150px;
    right: -150px;
    animation: floatShape 8s ease-in-out infinite;
}

.shape-2 {
    width: 350px;
    height: 350px;
    bottom: -100px;
    left: -100px;
    animation: floatShape 10s ease-in-out infinite reverse;
}

.shape-3 {
    width: 250px;
    height: 250px;
    top: 50%;
    left: 30%;
    animation: floatShape 12s ease-in-out infinite;
}

@keyframes floatShape {
    0%, 100% {
        transform: translate(0, 0) scale(1);
    }
    50% {
        transform: translate(30px, -30px) scale(1.1);
    }
}

.hero-content-wrapper {
    display: grid;
    grid-template-columns: 1.2fr 1fr;
    gap: 60px;
    align-items: center;
    position: relative;
    z-index: 2;
}

.hero-text-section {
    color: white;
}

.hero-label {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 1px;
    margin-bottom: 24px;
    border: 1px solid rgba(255, 255, 255, 0.3);
}

.label-icon {
    font-size: 14px;
}

.hero-main-heading {
    font-size: 3.8rem;
    font-weight: 900;
    line-height: 1.1;
    margin-bottom: 20px;
    text-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.hero-accent-text {
    display: block;
    background: linear-gradient(135deg, #fbbf24, #f59e0b);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-top: 8px;
}

.hero-lead-text {
    font-size: 1.15rem;
    line-height: 1.7;
    margin-bottom: 32px;
    opacity: 0.95;
    max-width: 540px;
}

.hero-highlight-features {
    display: flex;
    gap: 24px;
    margin-bottom: 36px;
}

.highlight-item {
    display: flex;
    align-items: center;
    gap: 12px;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    padding: 12px 16px;
    border-radius: 12px;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.highlight-icon {
    width: 40px;
    height: 40px;
    background: rgba(255, 255, 255, 0.25);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
}

.highlight-text strong {
    display: block;
    font-size: 15px;
    line-height: 1.2;
    margin-bottom: 2px;
}

.highlight-text span {
    font-size: 12px;
    opacity: 0.9;
}

.hero-action-buttons {
    display: flex;
    gap: 16px;
}

.btn-hero {
    padding: 16px 32px;
    border-radius: 50px;
    font-weight: 700;
    font-size: 16px;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.btn-hero-primary {
    background: white;
    color: var(--color-primary);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
}

.btn-hero-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 32px rgba(0, 0, 0, 0.2);
    color: var(--color-primary);
}

.btn-hero-outline {
    background: transparent;
    color: white;
    border-color: rgba(255, 255, 255, 0.4);
}

.btn-hero-outline:hover {
    background: rgba(255, 255, 255, 0.15);
    border-color: white;
    color: white;
}

/* Hero Visual Section */
.hero-visual-section {
    position: relative;
}

.hero-product-display {
    position: relative;
}

.product-badge-corner {
    position: absolute;
    top: -15px;
    right: -15px;
    z-index: 10;
}

.badge-circle {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #f59e0b, #d97706);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 8px 24px rgba(245, 158, 11, 0.4);
    animation: rotateBadge 3s linear infinite;
}

@keyframes rotateBadge {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
}

.badge-number {
    font-size: 22px;
    font-weight: 900;
    color: white;
    animation: rotateBadge 3s linear infinite reverse;
}

.product-display-card {
    background: white;
    border-radius: 24px;
    padding: 40px 32px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
    text-align: center;
    animation: floatCard 4s ease-in-out infinite;
}

@keyframes floatCard {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-15px);
    }
}

.product-image-circle {
    width: 140px;
    height: 140px;
    background: linear-gradient(135deg, #d1fae5, #a7f3d0);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 24px;
    font-size: 64px;
    color: var(--color-primary);
}

.product-display-name {
    font-size: 1.4rem;
    font-weight: 700;
    color: var(--color-dark);
    margin-bottom: 16px;
}

.product-display-price {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    margin-bottom: 20px;
}

.display-price-sale {
    font-size: 2rem;
    font-weight: 900;
    color: var(--color-primary);
}

.display-price-old {
    font-size: 1.1rem;
    color: var(--color-text-light);
    text-decoration: line-through;
}

.btn-product-quick {
    width: 100%;
    background: var(--color-primary);
    color: white;
    border: none;
    padding: 14px 24px;
    border-radius: 50px;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: all 0.3s ease;
}

.btn-product-quick:hover {
    background: var(--color-primary-dark);
    transform: scale(1.05);
}

.floating-badge {
    position: absolute;
    background: white;
    border-radius: 16px;
    padding: 12px 16px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
    display: flex;
    align-items: center;
    gap: 12px;
    animation: floatBadge 3s ease-in-out infinite;
}

@keyframes floatBadge {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-8px);
    }
}

.badge-trust {
    bottom: 60px;
    left: -40px;
}

.badge-rating {
    top: 40px;
    left: -30px;
}

.trust-icon {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, var(--color-primary-light), var(--color-primary));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 18px;
}

.trust-content strong {
    display: block;
    font-size: 1.3rem;
    font-weight: 800;
    color: var(--color-dark);
    line-height: 1;
}

.trust-content span {
    font-size: 12px;
    color: var(--color-text-light);
}

.rating-stars {
    display: flex;
    gap: 2px;
}

.rating-stars i {
    color: #fbbf24;
    font-size: 14px;
}

.rating-text {
    font-size: 14px;
    font-weight: 700;
    color: var(--color-dark);
    margin-left: 8px;
}

/* Enhanced Quick Access Categories */
.quick-access-categories {
    background: white;
    padding: 30px 0;
    position: relative;
    margin-top: -40px;
    z-index: 100;
}

.categories-wrapper {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 20px;
}

.category-box {
    background: var(--color-light);
    border-radius: 20px;
    overflow: hidden;
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.category-box:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 32px rgba(0, 0, 0, 0.12);
    border-color: var(--color-primary);
}

.category-box.featured-box {
    background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(5, 150, 105, 0.05));
    border-color: var(--color-primary-light);
}

.category-box.hot-box {
    background: linear-gradient(135deg, rgba(239, 68, 68, 0.1), rgba(220, 38, 38, 0.05));
    border-color: rgba(239, 68, 68, 0.3);
    animation: pulseHot 2s ease-in-out infinite;
}

@keyframes pulseHot {
    0%, 100% {
        box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.4);
    }
    50% {
        box-shadow: 0 0 0 10px rgba(239, 68, 68, 0);
    }
}

.category-link-enhanced {
    display: flex;
    flex-direction: column;
    padding: 24px 20px;
    text-decoration: none;
    color: var(--color-dark);
    height: 100%;
    position: relative;
}

.category-visual {
    position: relative;
    margin-bottom: 16px;
    text-align: center;
}

.category-icon-large {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    font-size: 32px;
    color: white;
    transition: all 0.3s ease;
}

.category-box:hover .category-icon-large {
    transform: scale(1.15) rotate(5deg);
}

.green-gradient {
    background: linear-gradient(135deg, #10b981, #059669);
}

.orange-gradient {
    background: linear-gradient(135deg, #f59e0b, #d97706);
}

.blue-gradient {
    background: linear-gradient(135deg, #3b82f6, #2563eb);
}

.purple-gradient {
    background: linear-gradient(135deg, #8b5cf6, #7c3aed);
}

.red-gradient {
    background: linear-gradient(135deg, #ef4444, #dc2626);
}

.category-badge {
    position: absolute;
    top: -8px;
    right: calc(50% - 50px);
    background: white;
    color: var(--color-primary);
    font-size: 11px;
    font-weight: 800;
    padding: 4px 10px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.category-badge.hot-badge {
    background: var(--color-danger);
    color: white;
    animation: bounceHot 1s ease-in-out infinite;
}

@keyframes bounceHot {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-4px);
    }
}

.category-text {
    text-align: center;
    margin-bottom: 12px;
}

.category-title {
    font-size: 1.05rem;
    font-weight: 700;
    color: var(--color-dark);
    margin-bottom: 4px;
    line-height: 1.3;
}

.category-subtitle {
    font-size: 12px;
    color: var(--color-text-light);
    margin: 0;
}

.category-arrow {
    text-align: center;
    margin-top: auto;
    opacity: 0;
    transform: translateY(10px);
    transition: all 0.3s ease;
}

.category-box:hover .category-arrow {
    opacity: 1;
    transform: translateY(0);
}

.category-arrow i {
    font-size: 14px;
    color: var(--color-primary);
}

/* Quick Categories */
.quick-categories {
    background: white;
    padding: 20px 0;
    box-shadow: var(--shadow-md);
    position: relative;
    z-index: 100;
    margin-top: -50px;
}

.categories-slider {
    display: flex;
    gap: 20px;
    overflow-x: auto;
    padding: 10px 0;
}

.category-quick-link {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 12px;
    padding: 20px;
    background: var(--color-light);
    border-radius: var(--radius-lg);
    text-decoration: none;
    transition: all 0.3s ease;
    min-width: 120px;
}

.category-quick-link:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-md);
}

.category-icon-circle {
    width: 64px;
    height: 64px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    color: white;
}

.category-icon-circle.green {
    background: linear-gradient(135deg, #10b981, #059669);
}

.category-icon-circle.orange {
    background: linear-gradient(135deg, #f59e0b, #d97706);
}

.category-icon-circle.blue {
    background: linear-gradient(135deg, #3b82f6, #2563eb);
}

.category-icon-circle.purple {
    background: linear-gradient(135deg, #8b5cf6, #7c3aed);
}

.category-icon-circle.red {
    background: linear-gradient(135deg, #ef4444, #dc2626);
}

.category-quick-name {
    font-weight: 600;
    color: var(--color-dark);
    font-size: 14px;
}

.category-quick-count {
    font-size: 12px;
    color: var(--color-text-light);
}

/* Flash Deals - Enhanced Beautiful Design */
.flash-deals-section {
    padding: 80px 0;
    background: linear-gradient(135deg, #fef3c7 0%, #fde68a 50%, #fbbf24 100%);
    position: relative;
    overflow: hidden;
}

.flash-deals-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        radial-gradient(circle at 20% 30%, rgba(239, 68, 68, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 70%, rgba(249, 115, 22, 0.1) 0%, transparent 50%);
    pointer-events: none;
}

.section-header-flash {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 50px;
    flex-wrap: wrap;
    gap: 30px;
    position: relative;
    z-index: 1;
}

.flash-badge-wrapper {
    display: flex;
    align-items: center;
    gap: 20px;
}

.flash-icon-box {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 10px 30px rgba(239, 68, 68, 0.4);
    animation: flashPulse 2s ease-in-out infinite;
}

@keyframes flashPulse {
    0%, 100% {
        transform: scale(1);
        box-shadow: 0 10px 30px rgba(239, 68, 68, 0.4);
    }
    50% {
        transform: scale(1.05);
        box-shadow: 0 15px 40px rgba(239, 68, 68, 0.6);
    }
}

.flash-icon-box i {
    font-size: 2.5rem;
    color: white;
    animation: flashBolt 1.5s ease-in-out infinite;
}

@keyframes flashBolt {
    0%, 100% {
        transform: rotate(0deg);
    }
    25% {
        transform: rotate(-10deg);
    }
    75% {
        transform: rotate(10deg);
    }
}

.flash-text-group {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.section-title-main {
    font-size: 2.5rem;
    font-weight: 900;
    color: #1f2937;
    margin: 0;
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.section-subtitle-main {
    font-size: 1rem;
    color: #78350f;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 8px;
    margin: 0;
}

.section-subtitle-main i {
    color: #ea580c;
    animation: fireFlicker 1s ease-in-out infinite;
}

@keyframes fireFlicker {
    0%, 100% {
        opacity: 1;
        transform: scale(1);
    }
    50% {
        opacity: 0.7;
        transform: scale(1.1);
    }
}

.countdown-timer {
    display: flex;
    flex-direction: column;
    gap: 12px;
    background: white;
    padding: 20px 30px;
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
}

.timer-label-main {
    font-size: 0.875rem;
    font-weight: 600;
    color: #78350f;
    text-transform: uppercase;
    letter-spacing: 1px;
    text-align: center;
}

.timer-boxes {
    display: flex;
    align-items: center;
    gap: 10px;
}

.timer-box {
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    color: white;
    padding: 15px 18px;
    border-radius: 12px;
    text-align: center;
    min-width: 70px;
    box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);
    position: relative;
    overflow: hidden;
}

.timer-box::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    animation: timerShine 3s infinite;
}

@keyframes timerShine {
    0% {
        left: -100%;
    }
    100% {
        left: 100%;
    }
}

.timer-number {
    display: block;
    font-size: 2rem;
    font-weight: 900;
    line-height: 1;
    margin-bottom: 4px;
}

.timer-label {
    display: block;
    font-size: 0.75rem;
    opacity: 0.95;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.timer-colon {
    font-size: 2rem;
    font-weight: 900;
    color: #dc2626;
    animation: colonBlink 1s infinite;
}

@keyframes colonBlink {
    0%, 49%, 100% {
        opacity: 1;
    }
    50%, 99% {
        opacity: 0.3;
    }
}

.flash-deals-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 30px;
    position: relative;
    z-index: 1;
}

.deal-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    border: 3px solid transparent;
}

.deal-card::before {
    content: '';
    position: absolute;
    inset: -3px;
    border-radius: 20px;
    padding: 3px;
    background: linear-gradient(135deg, #ef4444, #f97316, #fbbf24);
    -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
    -webkit-mask-composite: xor;
    mask-composite: exclude;
    opacity: 0;
    transition: opacity 0.4s ease;
}

.deal-card:hover::before {
    opacity: 1;
}

.deal-card:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 20px 50px rgba(239, 68, 68, 0.3);
}

.deal-badge-group {
    position: absolute;
    top: 16px;
    left: 16px;
    right: 16px;
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    z-index: 10;
}

.deal-badge {
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 8px 14px;
    border-radius: 12px;
    font-size: 0.875rem;
    font-weight: 800;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    animation: badgeBounce 2s ease-in-out infinite;
}

@keyframes badgeBounce {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-5px);
    }
}

.discount-badge {
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    color: white;
}

.hot-badge {
    background: linear-gradient(135deg, #f97316 0%, #ea580c 100%);
    color: white;
    width: 45px;
    height: 45px;
    padding: 0;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.hot-badge i {
    font-size: 1.2rem;
    animation: fireFlicker 1s ease-in-out infinite;
}

.deal-image {
    height: 240px;
    background: linear-gradient(135deg, #fef3c7, #fde68a);
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
}

.deal-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
}

.deal-card:hover .deal-image img {
    transform: scale(1.15) rotate(2deg);
}

.deal-placeholder {
    text-align: center;
    color: #9ca3af;
}

.deal-placeholder i {
    font-size: 4rem;
    margin-bottom: 12px;
    opacity: 0.5;
}

.deal-placeholder p {
    font-size: 0.875rem;
    font-weight: 600;
}

.deal-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, transparent 0%, rgba(0, 0, 0, 0.7) 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.deal-card:hover .deal-overlay {
    opacity: 1;
}

.deal-quick-view {
    background: white;
    border: none;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    text-decoration: none;
    color: var(--color-primary);
}

.deal-quick-view:hover {
    transform: scale(1.1);
    background: var(--color-primary);
    color: white;
}

.deal-quick-view i {
    font-size: 1.25rem;
}

.deal-info {
    padding: 24px;
}

.deal-category {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 12px;
    background: linear-gradient(135deg, #dcfce7, #bbf7d0);
    color: #166534;
    border-radius: 8px;
    font-size: 0.75rem;
    font-weight: 700;
    margin-bottom: 12px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.deal-title {
    font-size: 1.125rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 12px;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    line-height: 1.4;
    min-height: 2.8em;
}

.deal-rating {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 16px;
    flex-wrap: wrap;
}

.stars {
    display: flex;
    gap: 2px;
}

.stars i {
    color: #fbbf24;
    font-size: 0.875rem;
}

.rating-number {
    font-size: 0.875rem;
    font-weight: 600;
    color: #4b5563;
}

.sold-count {
    font-size: 0.75rem;
    color: #9ca3af;
    font-weight: 500;
}

.deal-price-wrapper {
    margin-bottom: 16px;
}

.deal-price {
    display: flex;
    align-items: baseline;
    gap: 10px;
    margin-bottom: 8px;
}

.price-sale {
    font-size: 1.75rem;
    font-weight: 900;
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.price-original {
    font-size: 1rem;
    color: #9ca3af;
    text-decoration: line-through;
    font-weight: 500;
}

.save-amount {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 4px 10px;
    background: linear-gradient(135deg, #fef3c7, #fde68a);
    color: #92400e;
    border-radius: 6px;
    font-size: 0.75rem;
    font-weight: 700;
}

.save-amount i {
    color: #f59e0b;
}

.deal-progress {
    margin-bottom: 20px;
}

.progress-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 8px;
}

.progress-label {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 0.75rem;
    font-weight: 700;
    color: #dc2626;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.progress-label i {
    animation: fireFlicker 1s ease-in-out infinite;
}

.progress-text {
    font-size: 0.75rem;
    color: #6b7280;
    font-weight: 600;
}

.progress-bar {
    height: 10px;
    background: #e5e7eb;
    border-radius: 10px;
    overflow: hidden;
    position: relative;
}

.progress-fill {
    height: 100%;
    background: linear-gradient(90deg, #ef4444 0%, #f97316 50%, #fbbf24 100%);
    border-radius: 10px;
    position: relative;
    transition: width 0.5s ease;
}

.progress-fill::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.5), transparent);
    animation: progressShine 2s infinite;
}

@keyframes progressShine {
    0% {
        transform: translateX(-100%);
    }
    100% {
        transform: translateX(100%);
    }
}

.btn-add-deal {
    width: 100%;
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    color: white;
    border: none;
    padding: 14px;
    border-radius: 12px;
    font-weight: 700;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    text-decoration: none;
    box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
    position: relative;
    overflow: hidden;
    text-decoration: none;
}

.btn-add-deal::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.3);
    transform: translate(-50%, -50%);
    transition: width 0.5s ease, height 0.5s ease;
}

.btn-add-deal:hover::before {
    width: 300px;
    height: 300px;
}

.btn-add-deal:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4);
    text-decoration: none;
}

.btn-add-deal i,
.btn-add-deal span {
    position: relative;
    z-index: 1;
}

.flash-deals-footer {
    margin-top: 50px;
    text-align: center;
    position: relative;
    z-index: 1;
}

.btn-view-all-deals {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    padding: 16px 40px;
    background: white;
    color: #dc2626;
    border: 3px solid #dc2626;
    border-radius: 50px;
    font-size: 1.125rem;
    font-weight: 800;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 8px 20px rgba(220, 38, 38, 0.2);
}

.btn-view-all-deals:hover {
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 12px 30px rgba(220, 38, 38, 0.4);
}

.btn-view-all-deals i {
    transition: transform 0.3s ease;
}

.btn-view-all-deals:hover i {
    transform: translateX(5px);
}

/* Featured Products - Enhanced Design */
.featured-products-section {
    padding: 80px 0;
    background: white;
}

.section-header-with-tabs {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 50px;
    flex-wrap: wrap;
    gap: 24px;
}

.section-title-group {
    text-align: left;
}

.section-title-group.center {
    text-align: center;
    margin-bottom: 50px;
}

.product-filter-tabs {
    display: flex;
    gap: 12px;
    background: var(--color-light);
    padding: 6px;
    border-radius: var(--radius-full);
}

.tab-filter {
    background: transparent;
    border: none;
    color: var(--color-text);
    padding: 10px 24px;
    border-radius: var(--radius-full);
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.tab-filter.active,
.tab-filter:hover {
    background: var(--color-primary);
    color: white;
    box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
}

.products-grid-main {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 32px;
    margin-bottom: 50px;
}

.product-card-main {
    background: white;
    border: 2px solid var(--color-border);
    border-radius: var(--radius-xl);
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
}

.product-card-main:hover {
    border-color: var(--color-primary);
    box-shadow: 0 16px 40px rgba(16, 185, 129, 0.15);
    transform: translateY(-8px);
}

.product-labels {
    position: absolute;
    top: 16px;
    left: 16px;
    z-index: 10;
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.label {
    padding: 6px 12px;
    border-radius: var(--radius-lg);
    font-size: 11px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.label.hot {
    background: linear-gradient(135deg, #ef4444, #dc2626);
    color: white;
    animation: pulseHot 2s ease-in-out infinite;
}

.label.discount {
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: white;
}

.product-image-main {
    position: relative;
    height: 280px;
    background: linear-gradient(135deg, #f9fafb, #f3f4f6);
    overflow: hidden;
}

.img-main {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
}

.product-card-main:hover .img-main {
    transform: scale(1.12);
}

.img-placeholder {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: var(--color-text-light);
    background: linear-gradient(135deg, #f9fafb, #f3f4f6);
}

.img-placeholder i {
    font-size: 72px;
    margin-bottom: 12px;
    opacity: 0.3;
}

.img-placeholder p {
    font-size: 14px;
    font-weight: 500;
}

.product-actions-overlay {
    position: absolute;
    top: 16px;
    right: 16px;
    display: flex;
    flex-direction: column;
    gap: 10px;
    opacity: 0;
    transform: translateX(30px);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.product-card-main:hover .product-actions-overlay {
    opacity: 1;
    transform: translateX(0);
}

.action-icon-btn {
    width: 44px;
    height: 44px;
    background: white;
    border: none;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.12);
    transition: all 0.3s ease;
    font-size: 16px;
    color: var(--color-text);
}

.action-icon-btn:hover {
    background: var(--color-primary);
    color: white;
    transform: scale(1.15) rotate(5deg);
    box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4);
}

.quick-add-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 16px;
    background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.product-card-main:hover .quick-add-overlay {
    opacity: 1;
    transform: translateY(0);
}

.btn-quick-add {
    width: 100%;
    background: white;
    color: var(--color-primary);
    border: none;
    padding: 14px 20px;
    border-radius: var(--radius-lg);
    font-weight: 700;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
}

.btn-quick-add:hover {
    background: var(--color-primary);
    color: white;
    transform: scale(1.03);
}

.product-content-main {
    padding: 24px;
}

.product-meta-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 12px;
}

.product-category-tag {
    font-size: 11px;
    color: var(--color-primary);
    text-transform: uppercase;
    font-weight: 700;
    letter-spacing: 0.5px;
    background: rgba(16, 185, 129, 0.1);
    padding: 4px 10px;
    border-radius: var(--radius-sm);
}

.product-title-main {
    margin-bottom: 12px;
}

.product-title-main a {
    color: var(--color-dark);
    text-decoration: none;
    font-size: 17px;
    font-weight: 700;
    display: block;
    line-height: 1.4;
    transition: color 0.3s ease;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}

.product-title-main a:hover {
    color: var(--color-primary);
}

.product-rating-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 16px;
    padding-bottom: 16px;
    border-bottom: 1px solid var(--color-border);
}

.rating-stars-group {
    display: flex;
    gap: 2px;
}

.rating-stars-group i {
    color: #fbbf24;
    font-size: 15px;
}

.rating-stars-group i.fa-star-o {
    color: var(--color-border);
}

.rating-count-text {
    font-size: 13px;
    color: var(--color-text-light);
    font-weight: 500;
}

.product-price-section {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.price-main-group {
    display: flex;
    align-items: baseline;
    gap: 10px;
}

.price-sale-main {
    font-size: 1.6rem;
    font-weight: 900;
    color: var(--color-primary);
    line-height: 1;
}

.price-old-main {
    font-size: 15px;
    color: var(--color-text-light);
    text-decoration: line-through;
    font-weight: 500;
}

.save-amount {
    display: inline-block;
}

.save-amount span {
    background: linear-gradient(135deg, rgba(239, 68, 68, 0.1), rgba(220, 38, 38, 0.05));
    color: var(--color-danger);
    font-size: 12px;
    font-weight: 700;
    padding: 4px 10px;
    border-radius: var(--radius-sm);
}

.stock-badge {
    font-size: 11px;
    font-weight: 700;
    padding: 5px 10px;
    border-radius: var(--radius-sm);
    display: inline-flex;
    align-items: center;
    gap: 4px;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}

.stock-badge.in-stock {
    background: rgba(16, 185, 129, 0.15);
    color: var(--color-success);
}

.stock-badge.out-stock {
    background: rgba(239, 68, 68, 0.15);
    color: var(--color-danger);
}

.section-footer-center {
    text-align: center;
    margin-top: 20px;
}

.btn-view-more {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    background: linear-gradient(135deg, var(--color-primary), var(--color-primary-dark));
    color: white;
    padding: 16px 40px;
    border-radius: var(--radius-full);
    text-decoration: none;
    font-weight: 700;
    font-size: 16px;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 8px 24px rgba(16, 185, 129, 0.3);
    position: relative;
    overflow: hidden;
}

.btn-view-more::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.6s ease;
}

.btn-view-more:hover::before {
    left: 100%;
}

.btn-view-more:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 32px rgba(16, 185, 129, 0.4);
    color: white;
}

/* Why Choose Us - Redesigned */
.why-choose-redesigned {
    padding: 100px 0;
    background: linear-gradient(180deg, white 0%, #f9fafb 100%);
    position: relative;
    overflow: hidden;
}

.why-choose-content {
    display: grid;
    grid-template-columns: 1fr 1.2fr;
    gap: 80px;
    align-items: center;
}

.section-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(5, 150, 105, 0.05));
    color: var(--color-primary);
    padding: 8px 16px;
    border-radius: var(--radius-full);
    font-size: 13px;
    font-weight: 700;
    margin-bottom: 20px;
    border: 1px solid rgba(16, 185, 129, 0.2);
}

.section-heading-large {
    font-size: 3rem;
    font-weight: 900;
    color: var(--color-dark);
    line-height: 1.2;
    margin-bottom: 20px;
}

.heading-highlight {
    display: block;
    background: linear-gradient(135deg, var(--color-primary), var(--color-primary-dark));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.section-description-large {
    font-size: 1.1rem;
    line-height: 1.8;
    color: var(--color-text-light);
    margin-bottom: 40px;
}

.stats-highlights {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}

.stat-highlight-item {
    text-align: center;
    padding: 20px;
    background: white;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-md);
    transition: all 0.3s ease;
}

.stat-highlight-item:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-lg);
}

.stat-number-large {
    font-size: 2.5rem;
    font-weight: 900;
    background: linear-gradient(135deg, var(--color-primary), var(--color-primary-dark));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    line-height: 1;
    margin-bottom: 8px;
}

.stat-label-text {
    font-size: 14px;
    color: var(--color-text-light);
    font-weight: 500;
}

.features-grid-modern {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 24px;
}

.feature-item-modern {
    background: white;
    padding: 28px;
    border-radius: var(--radius-xl);
    display: flex;
    gap: 20px;
    align-items: flex-start;
    box-shadow: var(--shadow-md);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    border: 2px solid transparent;
}

.feature-item-modern:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-xl);
    border-color: var(--color-primary);
}

.feature-icon-box {
    width: 60px;
    height: 60px;
    border-radius: var(--radius-lg);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 26px;
    color: white;
    flex-shrink: 0;
    transition: all 0.3s ease;
}

.feature-item-modern:hover .feature-icon-box {
    transform: scale(1.1) rotate(5deg);
}

.feature-icon-box.green {
    background: linear-gradient(135deg, #10b981, #059669);
}

.feature-icon-box.blue {
    background: linear-gradient(135deg, #3b82f6, #2563eb);
}

.feature-icon-box.orange {
    background: linear-gradient(135deg, #f59e0b, #d97706);
}

.feature-icon-box.purple {
    background: linear-gradient(135deg, #8b5cf6, #7c3aed);
}

.feature-heading {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--color-dark);
    margin-bottom: 8px;
}

.feature-description {
    font-size: 14px;
    line-height: 1.6;
    color: var(--color-text-light);
    margin: 0;
}

/* Testimonials - Redesigned */
.testimonials-redesigned {
    padding: 100px 0;
    background: linear-gradient(135deg, #f9fafb 0%, white 100%);
}

.testimonials-header-center {
    text-align: center;
    max-width: 700px;
    margin: 0 auto 60px;
}

.testimonials-slider {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 32px;
    margin-bottom: 40px;
}

.testimonial-item-modern {
    background: white;
    padding: 32px;
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-md);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    border: 2px solid transparent;
    position: relative;
}

.testimonial-item-modern:hover {
    transform: translateY(-10px);
    box-shadow: var(--shadow-xl);
    border-color: var(--color-primary);
}

.testimonial-item-modern.featured {
    border-color: var(--color-primary);
    box-shadow: 0 16px 40px rgba(16, 185, 129, 0.15);
}

.featured-badge-ribbon {
    position: absolute;
    top: -12px;
    left: 50%;
    transform: translateX(-50%);
    background: linear-gradient(135deg, var(--color-primary), var(--color-primary-dark));
    color: white;
    padding: 6px 20px;
    border-radius: var(--radius-full);
    font-size: 12px;
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: 6px;
    box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
}

.testimonial-header {
    display: flex;
    gap: 16px;
    margin-bottom: 20px;
}

.customer-avatar-large {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, var(--color-primary-light), var(--color-primary));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    color: white;
    flex-shrink: 0;
}

.customer-name-large {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--color-dark);
    margin-bottom: 6px;
}

.customer-meta {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.customer-role {
    font-size: 13px;
    color: var(--color-text-light);
}

.verified-badge {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    font-size: 11px;
    color: var(--color-primary);
    font-weight: 600;
}

.verified-badge i {
    font-size: 12px;
}

.testimonial-rating-large {
    display: flex;
    align-items: center;
    gap: 4px;
    margin-bottom: 20px;
}

.testimonial-rating-large i {
    color: #fbbf24;
    font-size: 16px;
}

.rating-score {
    margin-left: 8px;
    font-weight: 700;
    color: var(--color-dark);
    font-size: 15px;
}

.testimonial-content-large {
    font-size: 15px;
    line-height: 1.8;
    color: var(--color-text);
    margin-bottom: 20px;
}

.testimonial-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 20px;
    border-top: 1px solid var(--color-border);
}

.purchase-info,
.date-info {
    font-size: 13px;
    color: var(--color-text-light);
    display: flex;
    align-items: center;
    gap: 6px;
}

.purchase-info {
    font-weight: 600;
    color: var(--color-primary);
}

.testimonials-navigation {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 20px;
}

.nav-arrow {
    width: 48px;
    height: 48px;
    background: white;
    border: 2px solid var(--color-border);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    color: var(--color-text);
}

.nav-arrow:hover {
    background: var(--color-primary);
    border-color: var(--color-primary);
    color: white;
    transform: scale(1.1);
}

.testimonials-dots {
    display: flex;
    gap: 10px;
}

.dot {
    width: 12px;
    height: 12px;
    background: var(--color-border);
    border-radius: 50%;
    cursor: pointer;
    transition: all 0.3s ease;
}

.dot.active {
    background: var(--color-primary);
    width: 32px;
    border-radius: var(--radius-full);
}

/* Newsletter - Redesigned */
.newsletter-redesigned {
    padding: 100px 0;
    background: linear-gradient(135deg, var(--color-dark) 0%, #374151 100%);
    position: relative;
    overflow: hidden;
}

.newsletter-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
}

.newsletter-shape {
    position: absolute;
    border-radius: 50%;
    background: rgba(16, 185, 129, 0.1);
}

.newsletter-shape.shape-1 {
    width: 400px;
    height: 400px;
    top: -100px;
       right: -100px;
    animation: floatShape 10s ease-in-out infinite;
}

.newsletter-shape.shape-2 {
    width: 300px;
    height: 300px;
    bottom: -80px;
    left: -80px;
    animation: floatShape 12s ease-in-out infinite reverse;
}

.newsletter-container-modern {
    display: grid;
    grid-template-columns: 1fr 1.5fr;
    gap: 60px;
    align-items: center;
    position: relative;
    z-index: 2;
}

.newsletter-icon-large {
    width: 120px;
    height: 120px;
    background: linear-gradient(135deg, var(--color-primary), var(--color-primary-dark));
    border-radius: var(--radius-xl);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 60px;
    color: white;
    margin-bottom: 30px;
    box-shadow: 0 20px 40px rgba(16, 185, 129, 0.3);
    animation: floatCard 3s ease-in-out infinite;
}

.newsletter-benefits {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.benefit-tag {
    display: flex;
    align-items: center;
    gap: 12px;
    color: rgba(255, 255, 255, 0.9);
    font-size: 15px;
    font-weight: 500;
}

.benefit-tag i {
    width: 28px;
    height: 28px;
    background: rgba(16, 185, 129, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--color-primary-light);
    font-size: 13px;
}

.newsletter-heading-modern {
    font-size: 2.5rem;
    font-weight: 900;
    color: white;
    margin-bottom: 12px;
    line-height: 1.2;
}

.highlight-text {
    display: inline-block;
    background: linear-gradient(135deg, var(--color-primary-light), var(--color-primary));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.newsletter-subheading {
    font-size: 1.05rem;
    color: rgba(255, 255, 255, 0.8);
    margin-bottom: 32px;
    line-height: 1.6;
}

.newsletter-form-modern {
    display: flex;
    gap: 12px;
    margin-bottom: 24px;
}

.form-input-modern {
    flex: 1;
    position: relative;
}

.form-input-modern i {
    position: absolute;
    left: 20px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--color-text-light);
    font-size: 18px;
}

.form-input-modern input {
    width: 100%;
    padding: 18px 20px 18px 55px;
    border: 2px solid rgba(255, 255, 255, 0.2);
    border-radius: var(--radius-lg);
    background: rgba(255, 255, 255, 0.1);
    color: white;
    font-size: 16px;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}

.form-input-modern input::placeholder {
    color: rgba(255, 255, 255, 0.6);
}

.form-input-modern input:focus {
    outline: none;
    border-color: var(--color-primary);
    background: rgba(255, 255, 255, 0.15);
}

.newsletter-submit-modern {
    padding: 18px 36px;
    background: linear-gradient(135deg, var(--color-primary), var(--color-primary-dark));
    color: white;
    border: none;
    border-radius: var(--radius-lg);
    font-weight: 700;
    font-size: 16px;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 10px;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 8px 24px rgba(16, 185, 129, 0.3);
    white-space: nowrap;
}

.newsletter-submit-modern:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 32px rgba(16, 185, 129, 0.4);
}

.newsletter-footer-info {
    display: flex;
    justify-content: space-between;
    gap: 20px;
    flex-wrap: wrap;
}

.privacy-notice,
.subscriber-count {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 13px;
    color: rgba(255, 255, 255, 0.7);
}

.privacy-notice i,
.subscriber-count i {
    color: var(--color-primary-light);
}

.subscriber-count strong {
    color: white;
    font-weight: 700;
}

/* Responsive Design */
@media (max-width: 1200px) {
    .why-choose-content {
        gap: 60px;
    }
    
    .newsletter-container-modern {
        gap: 40px;
    }
    
    .flash-deals-grid {
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
    }
}

@media (max-width: 992px) {
    .why-choose-content,
    .newsletter-container-modern {
        grid-template-columns: 1fr;
        gap: 40px;
        text-align: center;
    }
    
    .why-choose-left {
        max-width: 700px;
        margin: 0 auto;
    }
    
    .testimonials-slider {
        grid-template-columns: 1fr;
    }
    
    .features-grid-modern {
        grid-template-columns: 1fr;
    }
    
    .newsletter-visual {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    
    .newsletter-form-modern {
        flex-direction: column;
    }
    
    .newsletter-submit-modern {
        width: 100%;
        justify-content: center;
    }
    
    .flash-deals-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }
    
    .section-header-flash {
        flex-direction: column;
        align-items: flex-start;
        gap: 25px;
    }
    
    .flash-badge-wrapper {
        flex-direction: column;
        gap: 15px;
        align-items: center;
        text-align: center;
        width: 100%;
    }
    
    .countdown-timer {
        width: 100%;
    }
    
    .section-title-main {
        font-size: 2rem;
    }
}

@media (max-width: 768px) {
    .section-heading-large {
        font-size: 2.2rem;
    }
    
    .stats-highlights {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .newsletter-footer-info {
        flex-direction: column;
        text-align: center;
    }
    
    .flash-deals-section {
        padding: 60px 0;
    }
    
    .section-header-flash {
        margin-bottom: 35px;
    }
    
    .flash-icon-box {
        width: 60px;
        height: 60px;
    }
    
    .flash-icon-box i {
        font-size: 2rem;
    }
    
    .section-title-main {
        font-size: 1.75rem;
    }
    
    .section-subtitle-main {
        font-size: 0.875rem;
    }
    
    .timer-box {
        padding: 12px 14px;
        min-width: 60px;
    }
    
    .timer-number {
        font-size: 1.5rem;
    }
    
    .timer-label {
        font-size: 0.65rem;
    }
    
    .deal-image {
        height: 200px;
    }
    
    .deal-title {
        font-size: 1rem;
    }
    
    .price-sale {
        font-size: 1.5rem;
    }
    
    .flash-deals-footer {
        margin-top: 40px;
    }
    
    .btn-view-all-deals {
        padding: 14px 32px;
        font-size: 1rem;
    }
}

@media (max-width: 576px) {
    .why-choose-redesigned,
    .testimonials-redesigned,
    .newsletter-redesigned {
        padding: 60px 0;
    }
    
    .section-heading-large {
        font-size: 1.8rem;
    }
    
    .newsletter-heading-modern {
        font-size: 2rem;
    }
    
    .stat-number-large {
        font-size: 2rem;
    }
    
    .flash-deals-section {
        padding: 50px 0;
    }
    
    .flash-deals-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .flash-badge-wrapper {
        gap: 12px;
    }
    
    .flash-icon-box {
        width: 50px;
        height: 50px;
    }
    
    .flash-icon-box i {
        font-size: 1.5rem;
    }
    
    .section-title-main {
        font-size: 1.5rem;
    }
    
    .countdown-timer {
        padding: 16px 20px;
    }
    
    .timer-boxes {
        gap: 8px;
        justify-content: center;
    }
    
    .timer-box {
        padding: 10px 12px;
        min-width: 55px;
    }
    
    .timer-number {
        font-size: 1.25rem;
    }
    
    .timer-colon {
        font-size: 1.25rem;
    }
    
    .deal-card {
        border-radius: 16px;
    }
    
    .deal-image {
        height: 220px;
    }
    
    .deal-info {
        padding: 20px;
    }
    
    .deal-badge {
        padding: 6px 10px;
        font-size: 0.75rem;
    }
    
    .hot-badge {
        width: 40px;
        height: 40px;
    }
    
    .hot-badge i {
        font-size: 1rem;
    }
    
    .deal-title {
        font-size: 0.95rem;
        margin-bottom: 10px;
    }
    
    .deal-rating {
        flex-wrap: wrap;
        gap: 6px;
        margin-bottom: 12px;
    }
    
    .price-sale {
        font-size: 1.375rem;
    }
    
    .price-original {
        font-size: 0.875rem;
    }
    
    .btn-add-deal {
        padding: 12px;
        font-size: 0.9rem;
    }
    
    .flash-deals-footer {
        margin-top: 35px;
    }
    
    .btn-view-all-deals {
        padding: 12px 28px;
        font-size: 0.95rem;
        border-width: 2px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Product filter tabs
    const filterTabs = document.querySelectorAll('.tab-filter');
    const productCards = document.querySelectorAll('.product-card-main');
    
    filterTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            
            filterTabs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');
            
            productCards.forEach(card => {
                if (filter === 'all' || card.getAttribute('data-category') === filter) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
    
    // Newsletter form
    const newsletterForm = document.querySelector('.newsletter-cta-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Cảm ơn bạn đã đăng ký nhận tin!');
            this.reset();
        });
    }
    
    // Countdown timer
    function updateTimer() {
        const timerBoxes = document.querySelectorAll('.timer-number');
        if (timerBoxes.length === 0) return;
        
        let hours = parseInt(timerBoxes[0].textContent);
        let minutes = parseInt(timerBoxes[1].textContent);
        let seconds = parseInt(timerBoxes[2].textContent);
        
        seconds--;
        if (seconds < 0) {
            seconds = 59;
            minutes--;
            if (minutes < 0) {
                minutes = 59;
                hours--;
                if (hours < 0) {
                    hours = 0;
                    minutes = 0;
                    seconds = 0;
                }
            }
        }
        
        timerBoxes[0].textContent = String(hours).padStart(2, '0');
        timerBoxes[1].textContent = String(minutes).padStart(2, '0');
        timerBoxes[2].textContent = String(seconds).padStart(2, '0');
    }
    
    setInterval(updateTimer, 1000);
    
    // Smooth scroll
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });
});
</script>

@endsection
