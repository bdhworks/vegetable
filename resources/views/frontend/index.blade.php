@extends('frontend.layout.fe')

@section('content')

<!-- Modern Hero Slider -->
<section class="hero-slider-modern">
    <div class="hero-container">
        <div class="hero-slide active" style="background: linear-gradient(135deg, rgba(16, 185, 129, 0.9), rgba(5, 150, 105, 0.95)), url('/assets/frontend/img/hero/hero-1.jpg'); background-size: cover; background-position: center;">
            <div class="container">
                <div class="row align-items-center min-vh-80">
                    <div class="col-lg-6">
                        <div class="hero-content-modern">
                            <div class="hero-badge">
                                <span class="badge-icon">🌱</span>
                                <span>100% Organic</span>
                            </div>
                            <h1 class="hero-title">
                                Nông sản tươi ngon<br>
                                <span class="text-gradient">Giao tận nhà</span>
                            </h1>
                            <p class="hero-description">
                                Khám phá những sản phẩm nông sản tươi ngon, sạch sẽ được chọn lọc từ các nông trại uy tín khắp Việt Nam. Đảm bảo chất lượng và an toàn thực phẩm.
                            </p>
                            <div class="hero-features">
                                <div class="feature-item">
                                    <i class="fa fa-shipping-fast"></i>
                                    <span>Giao hàng 2h</span>
                                </div>
                                <div class="feature-item">
                                    <i class="fa fa-medal"></i>
                                    <span>Chất lượng A+</span>
                                </div>
                                <div class="feature-item">
                                    <i class="fa fa-shield-alt"></i>
                                    <span>An toàn 100%</span>
                                </div>
                            </div>
                            <div class="hero-actions">
                                <a href="{{route('shop')}}" class="btn btn-primary-modern">
                                    <span>Mua sắm ngay</span>
                                    <i class="fa fa-arrow-right"></i>
                                </a>
                                <a href="#categories" class="btn btn-outline-white">
                                    <span>Khám phá danh mục</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="hero-visual">
                            <div class="hero-image-card">
                                <img src="/assets/frontend/img/products/fresh-vegetables.jpg" alt="Fresh Vegetables" class="img-fluid">
                                <div class="price-tag">
                                    <span class="price">25.000₫</span>
                                    <span class="unit">/kg</span>
                                </div>
                            </div>
                            <div class="floating-offer">
                                <div class="offer-content">
                                    <h4>Giảm 30%</h4>
                                    <p>Đơn hàng đầu tiên</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quick Stats Bar -->
<section class="stats-bar">
    <div class="container">
        <div class="stats-wrapper">
            <div class="stat-item">
                <div class="stat-icon">
                    <i class="fa fa-users"></i>
                </div>
                <div class="stat-info">
                    <span class="stat-number">5000+</span>
                    <span class="stat-label">Khách hàng</span>
                </div>
            </div>
            <div class="stat-item">
                <div class="stat-icon">
                    <i class="fa fa-leaf"></i>
                </div>
                <div class="stat-info">
                    <span class="stat-number">100%</span>
                    <span class="stat-label">Tự nhiên</span>
                </div>
            </div>
            <div class="stat-item">
                <div class="stat-icon">
                    <i class="fa fa-truck"></i>
                </div>
                <div class="stat-info">
                    <span class="stat-number">2h</span>
                    <span class="stat-label">Giao hàng</span>
                </div>
            </div>
            <div class="stat-item">
                <div class="stat-icon">
                    <i class="fa fa-star"></i>
                </div>
                <div class="stat-info">
                    <span class="stat-number">4.9</span>
                    <span class="stat-label">Đánh giá</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modern Categories Section -->
<section id="categories" class="categories-modern py-5">
    <div class="container">
        <div class="section-header text-center mb-5">
            <h2 class="section-title">Danh mục sản phẩm</h2>
            <p class="section-subtitle">Khám phá các loại nông sản tươi ngon được phân loại theo từng danh mục</p>
        </div>
        
        <div class="categories-grid">
            <div class="category-card main-category">
                <div class="category-image">
                    <img src="/assets/frontend/img/categories/vegetables.jpg" alt="Rau củ">
                </div>
                <div class="category-overlay">
                    <div class="category-content">
                        <h3 class="category-title">Rau củ tươi</h3>
                        <p class="category-desc">150+ sản phẩm</p>
                        <a href="{{route('shop')}}" class="category-btn">
                            <span>Khám phá</span>
                            <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="category-card">
                <div class="category-image">
                    <img src="/assets/frontend/img/categories/fruits.jpg" alt="Trái cây">
                </div>
                <div class="category-overlay">
                    <div class="category-content">
                        <h3 class="category-title">Trái cây</h3>
                        <p class="category-desc">80+ sản phẩm</p>
                        <a href="{{route('shop')}}" class="category-btn">
                            <span>Khám phá</span>
                            <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="category-card">
                <div class="category-image">
                    <img src="/assets/frontend/img/categories/herbs.jpg" alt="Rau thơm">
                </div>
                <div class="category-overlay">
                    <div class="category-content">
                        <h3 class="category-title">Rau thơm</h3>
                        <p class="category-desc">25+ sản phẩm</p>
                        <a href="{{route('shop')}}" class="category-btn">
                            <span>Khám phá</span>
                            <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="category-card">
                <div class="category-image">
                    <img src="/assets/frontend/img/categories/organic.jpg" alt="Hữu cơ">
                </div>
                <div class="category-overlay">
                    <div class="category-content">
                        <h3 class="category-title">Hữu cơ</h3>
                        <p class="category-desc">60+ sản phẩm</p>
                        <a href="{{route('shop')}}" class="category-btn">
                            <span>Khám phá</span>
                            <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products Section -->
<section class="featured-products py-5 bg-light">
    <div class="container">
        <div class="section-header-with-tabs">
            <div class="row align-items-end">
                <div class="col-lg-6">
                    <h2 class="section-title">Sản phẩm nổi bật</h2>
                    <p class="section-subtitle">Những sản phẩm được yêu thích nhất</p>
                </div>
                <div class="col-lg-6">
                    <div class="product-tabs">
                        <button class="tab-btn active" data-filter="all">Tất cả</button>
                        <button class="tab-btn" data-filter="vegetables">Rau củ</button>
                        <button class="tab-btn" data-filter="fruits">Trái cây</button>
                        <button class="tab-btn" data-filter="organic">Hữu cơ</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="products-grid-modern" id="productsGrid">
            @foreach ($topSellingProducts as $index => $product)
            <div class="product-card-modern" data-category="vegetables">
                <div class="product-badges">
                    <span class="badge hot">Hot</span>
                    <span class="badge discount">-25%</span>
                </div>
                
                <div class="product-image">
                    <img src="{{$product->images->first()->image}}" alt="{{$product->name}}" class="main-img">
                    <img src="{{$product->images->skip(1)->first()?->image ?? $product->images->first()->image}}" alt="{{$product->name}}" class="hover-img">
                    
                    <div class="product-actions">
                        <button class="action-btn" onclick="addToWishlist({{$product->id}})">
                            <i class="fa fa-heart"></i>
                        </button>
                        <button class="action-btn" onclick="quickView({{$product->id}})">
                            <i class="fa fa-eye"></i>
                        </button>
                        <button class="action-btn" onclick="addToCompare({{$product->id}})">
                            <i class="fa fa-exchange"></i>
                        </button>
                    </div>
                    
                    <div class="quick-add">
                        <button class="quick-add-btn" onclick="window.location.href='{{route('cart.add', $product)}}'">
                            <i class="fa fa-shopping-cart"></i>
                            <span>Thêm vào giỏ</span>
                        </button>
                    </div>
                </div>
                
                <div class="product-info">
                    <div class="product-category">Rau củ tươi</div>
                    <h4 class="product-title">
                        <a href="{{route('product', [$product, Str::slug($product->name)])}}">{{$product->name}}</a>
                    </h4>
                    
                    <div class="product-rating">
                        <div class="stars">
                            @for($i = 1; $i <= 5; $i++)
                            <i class="fa fa-star {{ $i <= 4.5 ? 'active' : '' }}"></i>
                            @endfor
                        </div>
                        <span class="rating-count">({{rand(10, 50)}})</span>
                    </div>
                    
                    <div class="product-price">
                        <span class="current-price">{{number_format($product->price_sale)}}₫</span>
                        <span class="original-price">{{number_format($product->price_sale * 1.25)}}₫</span>
                        <span class="save-amount">Tiết kiệm {{number_format($product->price_sale * 0.2)}}₫</span>
                    </div>
                    
                    <div class="product-meta">
                        <div class="stock-status {{ $product->quantity > 0 ? 'in-stock' : 'out-stock' }}">
                            <i class="fa fa-{{ $product->quantity > 0 ? 'check' : 'times' }}"></i>
                            <span>{{ $product->quantity > 0 ? 'Còn hàng' : 'Hết hàng' }}</span>
                        </div>
                        <div class="unit-price">{{number_format($product->price_sale/500)}}₫/100g</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-5">
            <a href="{{route('shop')}}" class="btn btn-outline-primary btn-lg">
                <span>Xem tất cả sản phẩm</span>
                <i class="fa fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<!-- Promotional Banner -->
<section class="promo-banner py-5">
    <div class="container">
        <div class="promo-grid">
            <div class="promo-card large">
                <div class="promo-content">
                    <div class="promo-badge">Ưu đãi đặc biệt</div>
                    <h3>Giảm 50% cho đơn hàng đầu tiên</h3>
                    <p>Áp dụng cho tất cả sản phẩm rau củ tươi. Không áp dụng cùng ưu đãi khác.</p>
                    <a href="{{route('shop')}}" class="btn btn-white">
                        <span>Mua ngay</span>
                        <i class="fa fa-arrow-right"></i>
                    </a>
                </div>
                <div class="promo-image">
                    <img src="/assets/frontend/img/promo/promo-1.jpg" alt="Promo">
                </div>
            </div>
            
            <div class="promo-card">
                <div class="promo-content">
                    <h4>Miễn phí vận chuyển</h4>
                    <p>Cho đơn hàng từ 500.000₫</p>
                    <a href="{{route('shop')}}" class="promo-link">Tìm hiểu thêm</a>
                </div>
            </div>
            
            <div class="promo-card">
                <div class="promo-content">
                    <h4>Cam kết chất lượng</h4>
                    <p>Hoàn tiền 100% nếu không hài lòng</p>
                    <a href="#" class="promo-link">Xem chính sách</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="why-choose-us py-5">
    <div class="container">
        <div class="section-header text-center mb-5">
            <h2 class="section-title">Tại sao chọn chúng tôi?</h2>
            <p class="section-subtitle">Những lý do khách hàng tin tưởng và lựa chọn</p>
        </div>
        
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fa fa-leaf"></i>
                </div>
                <h4 class="feature-title">100% Tự nhiên</h4>
                <p class="feature-desc">Không sử dụng chất bảo quản hay hóa chất độc hại. An toàn cho sức khỏe gia đình.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fa fa-shipping-fast"></i>
                </div>
                <h4 class="feature-title">Giao hàng nhanh</h4>
                <p class="feature-desc">Giao hàng trong 2 giờ tại nội thành. Đảm bảo sản phẩm tươi ngon nhất.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fa fa-shield-alt"></i>
                </div>
                <h4 class="feature-title">Cam kết chất lượng</h4>
                <p class="feature-desc">Hoàn tiền 100% nếu không hài lòng. Chính sách đổi trả linh hoạt.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fa fa-headset"></i>
                </div>
                <h4 class="feature-title">Hỗ trợ 24/7</h4>
                <p class="feature-desc">Đội ngũ tư vấn chuyên nghiệp sẵn sàng hỗ trợ mọi lúc mọi nơi.</p>
            </div>
        </div>
    </div>
</section>

<!-- Customer Reviews -->
<section class="reviews-section py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5">
            <h2 class="section-title">Khách hàng nói gì?</h2>
            <p class="section-subtitle">Những đánh giá chân thực từ khách hàng</p>
        </div>
        
        <div class="reviews-slider">
            <div class="review-card">
                <div class="review-stars">
                    @for($i = 1; $i <= 5; $i++)
                    <i class="fa fa-star"></i>
                    @endfor
                </div>
                <p class="review-text">"Rau củ ở đây tươi ngon vô cùng! Giao hàng nhanh, đóng gói cẩn thận. Tôi đã giới thiệu cho nhiều bạn bè rồi."</p>
                <div class="reviewer">
                    <div class="reviewer-avatar">
                        <img src="/assets/frontend/img/testimonials/customer-1.jpg" alt="Nguyễn Thị Lan">
                    </div>
                    <div class="reviewer-info">
                        <h5 class="reviewer-name">Nguyễn Thị Lan</h5>
                        <span class="reviewer-title">Khách hàng thân thiết</span>
                    </div>
                </div>
            </div>
            
            <div class="review-card">
                <div class="review-stars">
                    @for($i = 1; $i <= 5; $i++)
                    <i class="fa fa-star"></i>
                    @endfor
                </div>
                <p class="review-text">"Chất lượng tuyệt vời, giá cả hợp lý. Dịch vụ chăm sóc khách hàng rất chu đáo và nhiệt tình."</p>
                <div class="reviewer">
                    <div class="reviewer-avatar">
                        <img src="/assets/frontend/img/testimonials/customer-2.jpg" alt="Trần Văn Nam">
                    </div>
                    <div class="reviewer-info">
                        <h5 class="reviewer-name">Trần Văn Nam</h5>
                        <span class="reviewer-title">Chủ nhà hàng</span>
                    </div>
                </div>
            </div>
            
            <div class="review-card">
                <div class="review-stars">
                    @for($i = 1; $i <= 5; $i++)
                    <i class="fa fa-star"></i>
                    @endfor
                </div>
                <p class="review-text">"Từ khi biết đến shop, gia đình tôi chỉ mua nông sản ở đây. An toàn và luôn tươi ngon."</p>
                <div class="reviewer">
                    <div class="reviewer-avatar">
                        <img src="/assets/frontend/img/testimonials/customer-3.jpg" alt="Lê Thị Hoa">
                    </div>
                    <div class="reviewer-info">
                        <h5 class="reviewer-name">Lê Thị Hoa</h5>
                        <span class="reviewer-title">Khách hàng VIP</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter -->
<section class="newsletter-section">
    <div class="container">
        <div class="newsletter-content">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="newsletter-text">
                        <h3>Đăng ký nhận tin khuyến mãi</h3>
                        <p>Nhận thông báo về sản phẩm mới, ưu đãi đặc biệt và mẹo vặt nấu ăn hàng tuần</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form class="newsletter-form">
                        <div class="input-group-modern">
                            <input type="email" class="form-control" placeholder="Nhập email của bạn" required>
                            <button type="submit" class="btn btn-primary-modern">
                                <span>Đăng ký</span>
                                <i class="fa fa-paper-plane"></i>
                            </button>
                        </div>
                        <small class="form-text">Chúng tôi cam kết không chia sẻ email của bạn với bên thứ ba.</small>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modern Styles -->
<style>
:root {
    --primary-color: #10b981;
    --primary-dark: #059669;
    --primary-light: #34d399;
    --secondary-color: #f59e0b;
    --accent-color: #ef4444;
    --dark-color: #1f2937;
    --light-color: #f9fafb;
    --border-color: #e5e7eb;
    --text-dark: #374151;
    --text-light: #6b7280;
    --white: #ffffff;
    --success: #10b981;
    --warning: #f59e0b;
    --danger: #ef4444;
    --box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    --box-shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    --border-radius: 8px;
    --border-radius-lg: 12px;
    --transition: all 0.3s ease;
}

/* Reset and Base */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.min-vh-80 {
    min-height: 80vh;
}

/* Hero Section */
.hero-slider-modern {
    position: relative;
    overflow: hidden;
}

.hero-slide {
    position: relative;
    min-height: 80vh;
    display: flex;
    align-items: center;
}

.hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(255, 255, 255, 0.15);
    color: white;
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 20px;
    backdrop-filter: blur(10px);
}

.hero-title {
    font-size: 3.5rem;
    font-weight: 800;
    color: white;
    line-height: 1.1;
    margin-bottom: 20px;
}

.text-gradient {
    background: linear-gradient(135deg, #fbbf24, #f59e0b);
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.hero-description {
    font-size: 1.1rem;
    color: rgba(255, 255, 255, 0.9);
    line-height: 1.6;
    margin-bottom: 30px;
}

.hero-features {
    display: flex;
    gap: 30px;
    margin-bottom: 40px;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 8px;
    color: white;
    font-weight: 500;
}

.feature-item i {
    color: #fbbf24;
    font-size: 18px;
}

.hero-actions {
    display: flex;
    gap: 15px;
}

.btn-primary-modern {
    background: var(--white);
    color: var(--primary-color);
    padding: 14px 28px;
    border-radius: 25px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    transition: var(--transition);
    box-shadow: var(--box-shadow-lg);
}

.btn-primary-modern:hover {
    transform: translateY(-2px);
    box-shadow: 0 15px 30px rgba(255, 255, 255, 0.3);
    color: var(--primary-color);
}

.btn-outline-white {
    background: transparent;
    color: white;
    border: 2px solid rgba(255, 255, 255, 0.3);
    padding: 12px 24px;
    border-radius: 25px;
    font-weight: 600;
    text-decoration: none;
    transition: var(--transition);
    backdrop-filter: blur(10px);
}

.btn-outline-white:hover {
    background: rgba(255, 255, 255, 0.1);
    color: white;
}

.hero-visual {
    position: relative;
    text-align: center;
}

.hero-image-card {
    position: relative;
    background: white;
    border-radius: 20px;
    padding: 20px;
    box-shadow: var(--box-shadow-lg);
    margin: 0 auto;
    max-width: 400px;
}

.hero-image-card img {
    width: 100%;
    border-radius: 12px;
}

.price-tag {
    position: absolute;
    top: 30px;
    right: 30px;
    background: var(--primary-color);
    color: white;
    padding: 8px 16px;
    border-radius: 15px;
    font-weight: 700;
}

.floating-offer {
    position: absolute;
    top: 20px;
    left: 20px;
    background: var(--secondary-color);
    color: white;
    padding: 15px 20px;
    border-radius: 15px;
    text-align: center;
    animation: float 3s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

/* Stats Bar */
.stats-bar {
    background: white;
    padding: 20px 0;
    box-shadow: var(--box-shadow);
}

.stats-wrapper {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 30px;
}

.stat-item {
    display: flex;
    align-items: center;
    gap: 15px;
    text-align: center;
}

.stat-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
}

.stat-number {
    font-size: 1.8rem;
    font-weight: 800;
    color: var(--primary-color);
    display: block;
}

.stat-label {
    color: var(--text-light);
    font-size: 14px;
}

/* Categories Section */
.categories-modern {
    background: var(--light-color);
}

.section-header {
    text-align: center;
    margin-bottom: 60px;
}

.section-title {
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--dark-color);
    margin-bottom: 15px;
}

.section-subtitle {
    color: var(--text-light);
    font-size: 1.1rem;
}

.categories-grid {
    display: grid;
    grid-template-columns: 2fr 1fr 1fr;
    grid-template-rows: 1fr 1fr;
    gap: 20px;
    height: 600px;
}

.main-category {
    grid-row: 1 / -1;
}

.category-card {
    position: relative;
    border-radius: var(--border-radius-lg);
    overflow: hidden;
    cursor: pointer;
    transition: var(--transition);
}

.category-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--box-shadow-lg);
}

.category-image {
    width: 100%;
    height: 100%;
    overflow: hidden;
}

.category-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.category-card:hover .category-image img {
    transform: scale(1.1);
}

.category-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(0,0,0,0.3), rgba(0,0,0,0.7));
    display: flex;
    align-items: flex-end;
    padding: 30px;
    color: white;
}

.category-title {
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 5px;
}

.category-desc {
    margin-bottom: 15px;
    opacity: 0.9;
}

.category-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: white;
    color: var(--dark-color);
    padding: 8px 16px;
    border-radius: 20px;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    transition: var(--transition);
}

.category-btn:hover {
    transform: translateX(5px);
    color: var(--primary-color);
}

/* Featured Products */
.section-header-with-tabs {
    margin-bottom: 40px;
}

.product-tabs {
    display: flex;
    gap: 10px;
    justify-content: flex-end;
}

.tab-btn {
    background: transparent;
    border: 2px solid var(--border-color);
    color: var(--text-dark);
    padding: 8px 20px;
    border-radius: 25px;
    font-weight: 600;
    transition: var(--transition);
    cursor: pointer;
}

.tab-btn.active,
.tab-btn:hover {
    background: var(--primary-color);
    border-color: var(--primary-color);
    color: white;
}

.products-grid-modern {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 30px;
}

.product-card-modern {
    background: white;
    border-radius: var(--border-radius-lg);
    overflow: hidden;
    box-shadow: var(--box-shadow);
    transition: var(--transition);
    position: relative;
}

.product-card-modern:hover {
    transform: translateY(-5px);
    box-shadow: var(--box-shadow-lg);
}

.product-badges {
    position: absolute;
    top: 15px;
    left: 15px;
    z-index: 10;
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.badge {
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
}

.badge.hot {
    background: var(--accent-color);
    color: white;
}

.badge.discount {
    background: var(--secondary-color);
    color: white;
}

.product-image {
    position: relative;
    height: 250px;
    overflow: hidden;
}

.product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.main-img {
    position: absolute;
    top: 0;
    left: 0;
}

.hover-img {
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.product-card-modern:hover .hover-img {
    opacity: 1;
}

.product-card-modern:hover .main-img {
    opacity: 0;
}

.product-actions {
    position: absolute;
    top: 15px;
    right: 15px;
    display: flex;
    flex-direction: column;
    gap: 8px;
    opacity: 0;
    transform: translateX(20px);
    transition: var(--transition);
}

.product-card-modern:hover .product-actions {
    opacity: 1;
    transform: translateX(0);
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
    box-shadow: var(--box-shadow);
    transition: var(--transition);
    cursor: pointer;
}

.action-btn:hover {
    background: var(--primary-color);
    color: white;
}

.quick-add {
    position: absolute;
    bottom: 15px;
    left: 15px;
    right: 15px;
    opacity: 0;
    transform: translateY(20px);
    transition: var(--transition);
}

.product-card-modern:hover .quick-add {
    opacity: 1;
    transform: translateY(0);
}

.quick-add-btn {
    width: 100%;
    background: var(--primary-color);
    color: white;
    border: none;
    padding: 10px;
    border-radius: var(--border-radius);
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: var(--transition);
    cursor: pointer;
}

.quick-add-btn:hover {
    background: var(--primary-dark);
}

.product-info {
    padding: 20px;
}

.product-category {
    color: var(--text-light);
    font-size: 12px;
    text-transform: uppercase;
    font-weight: 600;
    margin-bottom: 8px;
}

.product-title {
    margin-bottom: 10px;
}

.product-title a {
    color: var(--dark-color);
    text-decoration: none;
    font-size: 16px;
    font-weight: 600;
    transition: var(--transition);
}

.product-title a:hover {
    color: var(--primary-color);
}

.product-rating {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 12px;
}

.stars i {
    color: #d1d5db;
    font-size: 14px;
}

.stars i.active {
    color: #fbbf24;
}

.rating-count {
    color: var(--text-light);
    font-size: 12px;
}

.product-price {
    margin-bottom: 12px;
}

.current-price {
    font-size: 18px;
    font-weight: 700;
    color: var(--primary-color);
}

.original-price {
    text-decoration: line-through;
    color: var(--text-light);
    font-size: 14px;
    margin-left: 8px;
}

.save-amount {
    background: rgba(239, 68, 68, 0.1);
    color: var(--accent-color);
    font-size: 11px;
    padding: 2px 6px;
    border-radius: 4px;
    margin-left: 8px;
}

.product-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 12px;
}

.stock-status {
    display: flex;
    align-items: center;
    gap: 4px;
    font-weight: 600;
}

.stock-status.in-stock {
    color: var(--success);
}

.stock-status.out-stock {
    color: var(--accent-color);
}

.unit-price {
    color: var(--text-light);
}

/* Promotional Banner */
.promo-banner {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
}

.promo-grid {
    display: grid;
    grid-template-columns: 2fr 1fr 1fr;
    gap: 30px;
    align-items: stretch;
}

.promo-card {
    background: white;
    border-radius: var(--border-radius-lg);
    padding: 30px;
    position: relative;
    overflow: hidden;
}

.promo-card.large {
    display: flex;
    align-items: center;
    gap: 30px;
    background: linear-gradient(135deg, #fbbf24, #f59e0b);
    color: white;
}

.promo-badge {
    background: rgba(255, 255, 255, 0.2);
    color: white;
    padding: 4px 12px;
    border-radius: 15px;
    font-size: 12px;
    font-weight: 600;
    display: inline-block;
    margin-bottom: 15px;
}

.promo-card h3 {
    font-size: 1.8rem;
    font-weight: 700;
    margin-bottom: 10px;
}

.promo-card h4 {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--dark-color);
    margin-bottom: 10px;
}

.promo-card p {
    margin-bottom: 20px;
    line-height: 1.6;
}

.btn-white {
    background: white;
    color: var(--secondary-color);
    padding: 12px 24px;
    border-radius: 25px;
    text-decoration: none;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: var(--transition);
}

.btn-white:hover {
    transform: translateY(-2px);
    box-shadow: var(--box-shadow-lg);
    color: var(--secondary-color);
}

.promo-link {
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
}

.promo-link:hover {
    text-decoration: underline;
}

/* Features Grid */
.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
}

.feature-card {
    text-align: center;
    padding: 40px 20px;
    background: white;
    border-radius: var(--border-radius-lg);
    box-shadow: var(--box-shadow);
    transition: var(--transition);
}

.feature-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--box-shadow-lg);
}

.feature-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    margin: 0 auto 20px;
}

.feature-title {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--dark-color);
    margin-bottom: 15px;
}

.feature-desc {
    color: var(--text-light);
    line-height: 1.6;
}

/* Reviews */
.reviews-slider {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
}

.review-card {
    background: white;
    padding: 30px;
    border-radius: var(--border-radius-lg);
    box-shadow: var(--box-shadow);
}

.review-stars {
    margin-bottom: 20px;
}

.review-stars i {
    color: #fbbf24;
    font-size: 16px;
}

.review-text {
    font-style: italic;
    color: var(--text-dark);
    line-height: 1.6;
    margin-bottom: 25px;
}

.reviewer {
    display: flex;
    align-items: center;
    gap: 15px;
}

.reviewer-avatar {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    overflow: hidden;
}

.reviewer-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.reviewer-name {
    font-weight: 600;
    color: var(--dark-color);
    margin-bottom: 2px;
}

.reviewer-title {
    color: var(--text-light);
    font-size: 14px;
}

/* Newsletter */
.newsletter-section {
    background: linear-gradient(135deg, var(--dark-color), #374151);
    color: white;
    padding: 60px 0;
}

.newsletter-text h3 {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 10px;
}

.newsletter-text p {
    color: rgba(255, 255, 255, 0.8);
    font-size: 1.1rem;
}

.input-group-modern {
    display: flex;
    background: white;
    border-radius: 25px;
    padding: 8px;
    margin-bottom: 10px;
}

.input-group-modern .form-control {
    flex: 1;
    border: none;
    padding: 12px 20px;
    background: transparent;
    font-size: 16px;
    outline: none;
}

.input-group-modern .btn {
    border-radius: 20px;
    padding: 12px 24px;
    border: none;
}

.form-text {
    color: rgba(255, 255, 255, 0.7);
    font-size: 12px;
    margin-top: 5px;
}

/* Responsive Design */
@media (max-width: 1200px) {
    .categories-grid {
        grid-template-columns: 1fr 1fr;
        grid-template-rows: auto auto auto;
        height: auto;
    }
    
    .main-category {
        grid-column: 1 / -1;
        grid-row: 1;
    }
    
    .promo-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .hero-title {
        font-size: 2.5rem;
    }
    
    .hero-features {
        flex-direction: column;
        gap: 15px;
    }
    
    .hero-actions {
        flex-direction: column;
    }
    
    .stats-wrapper {
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }
    
    .categories-grid {
        grid-template-columns: 1fr;
        gap: 15px;
    }
    
    .products-grid-modern {
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
    }
    
    .product-tabs {
        flex-wrap: wrap;
        justify-content: center;
    }
    
    .features-grid {
        grid-template-columns: 1fr;
    }
    
    .reviews-slider {
        grid-template-columns: 1fr;
    }
    
    .newsletter-content .row {
        text-align: center;
    }
    
    .newsletter-text {
        margin-bottom: 30px;
    }
}

@media (max-width: 576px) {
    .hero-title {
        font-size: 2rem;
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .stats-wrapper {
        grid-template-columns: 1fr;
    }
    
    .products-grid-modern {
        grid-template-columns: 1fr;
    }
    
    .input-group-modern {
        flex-direction: column;
    }
    
    .input-group-modern .btn {
        margin-top: 10px;
        border-radius: 25px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Product filtering
    const filterTabs = document.querySelectorAll('.tab-btn');
    const productCards = document.querySelectorAll('.product-card-modern');
    
    filterTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            
            // Update active tab
            filterTabs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');
            
            // Filter products
            productCards.forEach(card => {
                if (filter === 'all' || card.getAttribute('data-category') === filter) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
    
    // Product actions
    window.addToWishlist = function(productId) {
        const btn = event.target.closest('.action-btn');
        const icon = btn.querySelector('i');
        
        if (icon.classList.contains('far')) {
            icon.classList.remove('far', 'fa-heart');
            icon.classList.add('fas', 'fa-heart');
            btn.style.color = '#ef4444';
        } else {
            icon.classList.remove('fas', 'fa-heart');
            icon.classList.add('far', 'fa-heart');
            btn.style.color = '';
        }
    };
    
    window.quickView = function(productId) {
        console.log('Quick view product:', productId);
    };
    
    window.addToCompare = function(productId) {
        console.log('Add to compare:', productId);
    };
    
    // Newsletter form
    const newsletterForm = document.querySelector('.newsletter-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const email = this.querySelector('input[type="email"]').value;
            if (email) {
                alert('Cảm ơn bạn đã đăng ký nhận tin!');
                this.reset();
            }
        });
    }
    
    // Smooth scroll for anchor links
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
    
    // Add animation on scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    // Observe elements for animation
    document.querySelectorAll('.product-card-modern, .feature-card, .review-card').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'all 0.6s ease';
        observer.observe(el);
    });
});
</script>

@endsection
