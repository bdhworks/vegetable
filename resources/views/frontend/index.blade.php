@extends('frontend.layout.master')

@section('content')

    <!-- Hero Banner Section Begin -->
    <section class="hero-banner">
        <div class="container-fluid p-0">
            <div class="hero__item set-bg" data-setbg="/assets/frontend/img/hero/banner-main.jpg" style="position: relative; height: 70vh; background-size: cover; background-position: center;">
                <div class="hero-overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.4);"></div>
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-lg-8">
                            <div class="hero__text text-white" style="position: relative; z-index: 2;">
                                <span class="hero-badge bg-success text-white px-3 py-1 rounded-pill mb-3 d-inline-block">NÔNG SẢN VIỆT</span>
                                <h1 class="display-4 fw-bold mb-4">Chất lượng từ <br><span class="text-success">Tự nhiên</span></h1>
                                <p class="lead mb-4">Giảm giá đến 25% cho đơn hàng đầu tiên. Giao hàng miễn phí toàn quốc.</p>
                                <div class="hero-actions">
                                    <a href="{{route('shop')}}" class="btn btn-success btn-lg px-4 py-3 me-3">Mua ngay</a>
                                    <a href="#products" class="btn btn-outline-light btn-lg px-4 py-3">Khám phá</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Banner Section End -->

    <!-- Features Section Begin -->
    <section class="features py-5 bg-light">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="feature-card text-center p-4 bg-white rounded shadow-sm h-100">
                        <div class="feature-icon mb-3" style="font-size: 3rem;">
                            🌿
                        </div>
                        <h5 class="mb-3">100% Tự nhiên</h5>
                        <p class="text-muted mb-0">Sản phẩm sạch, không hóa chất</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="feature-card text-center p-4 bg-white rounded shadow-sm h-100">
                        <div class="feature-icon mb-3" style="font-size: 3rem;">
                            🚚
                        </div>
                        <h5 class="mb-3">Giao hàng nhanh</h5>
                        <p class="text-muted mb-0">Miễn phí giao hàng trong ngày</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="feature-card text-center p-4 bg-white rounded shadow-sm h-100">
                        <div class="feature-icon mb-3" style="font-size: 3rem;">
                            ✅
                        </div>
                        <h5 class="mb-3">Đảm bảo chất lượng</h5>
                        <p class="text-muted mb-0">Hoàn tiền nếu không hài lòng</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="feature-card text-center p-4 bg-white rounded shadow-sm h-100">
                        <div class="feature-icon mb-3" style="font-size: 3rem;">
                            📞
                        </div>
                        <h5 class="mb-3">Hỗ trợ 24/7</h5>
                        <p class="text-muted mb-0">Tư vấn nhiệt tình, chuyên nghiệp</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Features Section End -->

    <!-- Best Selling Products Section Begin -->
    <section id="products" class="featured-products py-5">
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
                                            👁️
                                        </button>
                                        <button class="action-btn cart-btn" onclick="window.location.href='{{route('cart.add', $product)}}'" title="Thêm vào giỏ">
                                            🛒
                                        </button>
                                        <button class="action-btn heart-btn" title="Yêu thích">
                                            ❤️
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
                                        Thêm vào giỏ
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

    <!-- Promotional Banners -->
    <section class="promo-banners py-5 bg-light">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="promo-card rounded overflow-hidden shadow">
                        <img src="/assets/frontend/img/banner/banner-1.jpg" class="img-fluid w-100" style="height: 200px; object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="promo-card rounded overflow-hidden shadow">
                        <img src="/assets/frontend/img/banner/banner-2.jpg" class="img-fluid w-100" style="height: 200px; object-fit: cover;" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest Products Section Begin -->
    <section class="latest-products py-5">
        <div class="container">
            <div class="section-header-left mb-5">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="title-wrapper">
                            <span class="section-badge">✨ Mới nhất</span>
                            <h2 class="section-title">Sản phẩm mới nhất</h2>
                            <p class="section-subtitle">Cập nhật liên tục những sản phẩm tươi ngon và chất lượng</p>
                        </div>
                    </div>
                    <div class="col-lg-4 text-end">
                        <a href="{{route('shop')}}" class="view-all-btn">Xem tất cả →</a>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($latestProducts as $product)
                    @if ($product->status == 1)
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                            <div class="product-card-modern">
                                <div class="product-image-container">
                                    <img src="{{$product->images->shift()->image}}" class="product-img" alt="{{$product->name}}">
                                    <div class="product-badges">
                                        <span class="badge-new">✨ Mới</span>
                                    </div>
                                    <div class="product-actions-overlay">
                                        <div class="quick-actions">
                                            <button class="action-btn view-btn" onclick="window.location.href='{{route('product', [$product,Str::slug($product->name)])}}'" title="Xem nhanh">
                                                👁️
                                            </button>
                                            <button class="action-btn cart-btn" onclick="window.location.href='{{route('cart.add', $product)}}'" title="Thêm vào giỏ">
                                                🛒
                                            </button>
                                            <button class="action-btn heart-btn" title="Yêu thích">
                                                ❤️
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-info-modern">
                                    <div class="product-rating">
                                        <span class="stars">⭐⭐⭐⭐⭐</span>
                                        <span class="sold-count">(Mới)</span>
                                    </div>
                                    <h6 class="product-name">
                                        <a href="{{route('product', [$product,Str::slug($product->name)])}}">{{$product->name}}</a>
                                    </h6>
                                    <div class="price-section">
                                        <span class="current-price">{{ number_format($product->price_sale) }}đ</span>
                                    </div>
                                    <div class="product-footer">
                                        <button class="add-to-cart-btn" onclick="window.location.href='{{route('cart.add', $product)}}'">
                                            Thêm vào giỏ
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    <!-- Latest Products Section End -->

    <!-- Blog Section Begin -->
    <section class="blog-section py-5 bg-light">
        <div class="container">
            <div class="section-header-left mb-5">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="title-wrapper">
                            <span class="section-badge">📰 Blog</span>
                            <h2 class="section-title">Tin tức & Blog</h2>
                            <p class="section-subtitle">Chia sẻ kiến thức về nông sản sạch và lối sống khỏe mạnh</p>
                        </div>
                    </div>
                    <div class="col-lg-4 text-end">
                        <a href="#" class="view-all-btn">Xem tất cả →</a>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="blog-card bg-white rounded shadow-sm overflow-hidden h-100">
                            <div class="blog-image position-relative">
                                <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid w-100" style="height: 200px; object-fit: cover;" alt="{{ $post->name }}">
                                <div class="blog-date position-absolute top-0 start-0 m-3 bg-success text-white p-2 rounded">
                                    <div class="text-center">
                                        <div class="fw-bold">{{ $post->updated_at->format('d') }}</div>
                                        <div class="small">{{ $post->updated_at->format('M') }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-content p-4">
                                <h5 class="mb-3">
                                    <a href="{{ route('blogDetail', $post->slug) }}" class="text-decoration-none text-dark">{{ $post->name }}</a>
                                </h5>
                                <p class="text-muted mb-3">{!! Str::limit(strip_tags($post->desc), 100) !!}</p>
                                <a href="{{ route('blogDetail', $post->slug) }}" class="btn btn-outline-success btn-sm">Đọc thêm <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

    <style>
        /* Section Header Left Styles */
        .section-header-left {
            margin-bottom: 3rem;
        }

        .title-wrapper {
            text-align: left;
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
            box-shadow: 0 2px 10px rgba(40, 167, 69, 0.3);
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: #333;
            margin-bottom: 10px;
            line-height: 1.2;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 60px;
            height: 4px;
            background: linear-gradient(45deg, #28a745, #20c997);
            border-radius: 2px;
        }

        .section-subtitle {
            color: #666;
            font-size: 1.1rem;
            line-height: 1.6;
            margin: 0;
            max-width: 500px;
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
        }

        .add-to-cart-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(40, 167, 69, 0.4);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .section-title {
                font-size: 2rem;
            }
            
            .section-subtitle {
                font-size: 1rem;
            }
            
            .view-all-btn {
                margin-top: 20px;
                display: block;
                text-align: center;
            }
            
            .col-lg-4.text-end {
                text-align: left !important;
            }
            
            .product-card-modern {
                margin-bottom: 20px;
            }
            
            .quick-actions {
                gap: 8px;
            }
            
            .action-btn {
                width: 40px;
                height: 40px;
                font-size: 14px;
            }
        }

        /* Legacy styles for other elements */
        .feature-card:hover {
            transform: translateY(-3px);
            transition: transform 0.3s;
        }
        .blog-card:hover {
            transform: translateY(-3px);
            transition: transform 0.3s;
        }
    </style>

@endsection
