@extends('frontend.layout.fe')

@section('content')

<!-- Modern Breadcrumb - FIXED -->
<section class="breadcrumb-modern">
    <div class="container">
        <div class="breadcrumb-content">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/"><i class="fa fa-home"></i> Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{route('shop')}}">Sản phẩm</a></li>
                    <li class="breadcrumb-item"><a href="#">{{$product->category->name}}</a></li>
                    <li class="breadcrumb-item active">{{$product->name}}</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- Product Detail Section - Redesigned -->
<section class="product-detail-redesigned">
    <div class="container">
        <div class="product-main-wrapper">
            <!-- Product Gallery - Enhanced -->
            <div class="product-gallery-modern">
                <div class="gallery-container">
                    <div class="main-image-container">
                        <div class="product-labels-modern">
                            @if($product->quantity <= 5 && $product->quantity > 0)
                            <span class="label-badge low-stock">
                                <i class="fa fa-exclamation-circle"></i>
                                Sắp hết hàng
                            </span>
                            @elseif($product->quantity <= 0)
                            <span class="label-badge out-stock">
                                <i class="fa fa-times-circle"></i>
                                Hết hàng
                            </span>
                            @endif
                            @if($product->created_at->diffInDays(now()) <= 30)
                            <span class="label-badge new-badge">
                                <i class="fa fa-star"></i>
                                Mới
                            </span>
                            @endif
                            <span class="label-badge discount-badge">
                                <i class="fa fa-tag"></i>
                                -20%
                            </span>
                        </div>
                        
                        <div class="main-product-image">
                            <img id="mainProductImage" src="{{$product->images->first()->image}}" alt="{{$product->name}}">
                            <div class="image-actions">
                                <button class="image-action-btn zoom-btn" onclick="openImageModal()">
                                    <i class="fa fa-search-plus"></i>
                                    <span>Phóng to</span>
                                </button>
                                <button class="image-action-btn share-btn">
                                    <i class="fa fa-share-alt"></i>
                                    <span>Chia sẻ</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="thumbnail-slider">
                        <button class="thumb-nav prev-thumb" onclick="scrollThumbnails('prev')">
                            <i class="fa fa-chevron-left"></i>
                        </button>
                        
                        <div class="thumbnail-container" id="thumbnailContainer">
                            @foreach ($product->images as $index => $image)
                            <div class="thumbnail-card {{ $index === 0 ? 'active' : '' }}" 
                                 onclick="changeMainImage('{{$image->image}}', this)">
                                <img src="{{$image->image}}" alt="{{$product->name}}">
                                <div class="thumb-overlay"></div>
                            </div>
                            @endforeach
                        </div>
                        
                        <button class="thumb-nav next-thumb" onclick="scrollThumbnails('next')">
                            <i class="fa fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
                
                <!-- Trust Badges -->
                <div class="trust-badges-section">
                    <div class="trust-badge-item">
                        <div class="trust-icon">
                            <i class="fa fa-shield"></i>
                        </div>
                        <div class="trust-text">
                            <strong>100% An toàn</strong>
                            <span>Chứng nhận VietGAP</span>
                        </div>
                    </div>
                    <div class="trust-badge-item">
                        <div class="trust-icon">
                            <i class="fa fa-sync"></i>
                        </div>
                        <div class="trust-text">
                            <strong>Đổi trả dễ dàng</strong>
                            <span>Trong vòng 7 ngày</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Product Info - Enhanced -->
            <div class="product-info-modern">
                <div class="product-header-section">
                    <div class="product-category-badge">
                        <i class="fa fa-tag"></i>
                        {{$product->category->name}}
                    </div>
                    
                    <h1 class="product-name-modern">{{$product->name}}</h1>
                    
                    <div class="product-meta-row">
                        <div class="rating-display">
                            <div class="stars-large">
                                @for($i = 1; $i <= 5; $i++)
                                <i class="fa fa-star {{ $i <= 4 ? 'filled' : '' }}"></i>
                                @endfor
                            </div>
                            <span class="rating-score">4.5</span>
                            <span class="rating-divider">|</span>
                            <span class="review-link">{{$product->sold ?? rand(10, 100)}} đánh giá</span>
                            <span class="rating-divider">|</span>
                            <span class="sold-count">
                                <i class="fa fa-shopping-bag"></i>
                                Đã bán {{$product->sold}}
                            </span>
                        </div>
                        
                        <button class="wishlist-btn-modern" onclick="toggleWishlist()">
                            <i class="fa fa-heart-o"></i>
                            <span>Yêu thích</span>
                        </button>
                    </div>
                </div>
                
                <!-- Pricing Section - Enhanced -->
                <div class="pricing-section-modern">
                    <div class="price-container">
                        <div class="main-pricing">
                            <span class="current-price-large">{{ convertPrice($product->price_sale) }}</span>
                            @if($product->price_sale < $product->price_sale * 1.2)
                            <span class="original-price-large">{{ convertPrice($product->price_sale * 1.2) }}</span>
                            <div class="discount-tag-large">
                                <i class="fa fa-bolt"></i>
                                Giảm 20%
                            </div>
                            @endif
                        </div>
                        <div class="price-per-unit-display">
                            <i class="fa fa-balance-scale"></i>
                            {{ convertPrice($product->price_sale / 500) }}/100g
                        </div>
                    </div>
                    
                    <div class="price-benefits">
                        <div class="benefit-tag-item">
                            <i class="fa fa-gift"></i>
                            <span>Tích điểm thưởng</span>
                        </div>
                        <div class="benefit-tag-item">
                            <i class="fa fa-truck"></i>
                            <span>Miễn phí ship từ 300K</span>
                        </div>
                    </div>
                </div>
                
                <!-- Product Highlights -->
                <div class="product-highlights-modern">
                    <div class="highlight-card">
                        <div class="highlight-icon green">
                            <i class="fa fa-leaf"></i>
                        </div>
                        <div class="highlight-content">
                            <strong>100% Tự nhiên</strong>
                            <span>Không chất bảo quản</span>
                        </div>
                    </div>
                    <div class="highlight-card">
                        <div class="highlight-icon blue">
                            <i class="fa fa-truck"></i>
                        </div>
                        <div class="highlight-content">
                            <strong>Giao nhanh 2-4h</strong>
                            <span>Trong nội thành</span>
                        </div>
                    </div>
                    <div class="highlight-card">
                        <div class="highlight-icon orange">
                            <i class="fa fa-shield"></i>
                        </div>
                        <div class="highlight-content">
                            <strong>An toàn tuyệt đối</strong>
                            <span>Chứng nhận VietGAP</span>
                        </div>
                    </div>
                </div>
                
                <!-- Add to Cart Form - Enhanced -->
                <form action="{{route('cart.add', $product)}}" class="cart-form-modern">
                    <div class="quantity-selector-modern">
                        <label class="selector-label">
                            <i class="fa fa-cubes"></i>
                            Số lượng
                        </label>
                        <div class="quantity-input-group">
                            <button type="button" class="qty-control minus" onclick="decreaseQuantity()">
                                <i class="fa fa-minus"></i>
                            </button>
                            <input type="number" name="quantity" id="quantity" value="1" min="1" max="{{$product->quantity}}" readonly>
                            <button type="button" class="qty-control plus" onclick="increaseQuantity()">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <span class="stock-available">
                            <i class="fa fa-check-circle"></i>
                            {{$product->quantity}} sản phẩm có sẵn
                        </span>
                    </div>
                    
                    <div class="cart-actions-modern">
                        @if($product->quantity > 0)
                        <button type="button" class="btn-buy-now-modern" onclick="buyNow()">
                            <i class="fa fa-bolt"></i>
                            <span>Mua Ngay</span>
                        </button>
                        <button type="submit" class="btn-add-cart-modern">
                            <i class="fa fa-shopping-cart"></i>
                            <span>Thêm Vào Giỏ</span>
                        </button>
                        @else
                        <button type="button" class="btn-notify-modern" disabled>
                            <i class="fa fa-bell"></i>
                            <span>Thông Báo Khi Có Hàng</span>
                        </button>
                        @endif
                    </div>
                </form>
                
                <!-- Product Details List - Enhanced -->
                <div class="product-specs-modern">
                    <h4 class="specs-title">
                        <i class="fa fa-info-circle"></i>
                        Thông tin sản phẩm
                    </h4>
                    <div class="specs-grid">
                        <div class="spec-row">
                            <span class="spec-label">Mã sản phẩm</span>
                            <span class="spec-value">{{$product->productCode->name}}</span>
                        </div>
                        <div class="spec-row">
                            <span class="spec-label">Tình trạng</span>
                            <span class="spec-value {{ $product->quantity > 0 ? 'in-stock' : 'out-stock' }}">
                                <i class="fa fa-{{$product->quantity > 0 ? 'check-circle' : 'times-circle'}}"></i>
                                {{ $product->quantity > 0 ? 'Còn hàng' : 'Hết hàng' }}
                            </span>
                        </div>
                        <div class="spec-row">
                            <span class="spec-label">Xuất xứ</span>
                            <span class="spec-value">
                                <i class="fa fa-map-marker"></i>
                                {{$product->origin->name}}
                            </span>
                        </div>
                        <div class="spec-row">
                            <span class="spec-label">Khối lượng</span>
                            <span class="spec-value">
                                <i class="fa fa-balance-scale"></i>
                                {{$product->weight}}/hộp
                            </span>
                        </div>
                    </div>
                </div>
                
                <!-- Delivery Info - Enhanced -->
                <div class="delivery-section-modern">
                    <h4 class="delivery-title">
                        <i class="fa fa-truck"></i>
                        Phương thức vận chuyển
                    </h4>
                    <div class="delivery-methods">
                        <div class="delivery-method-card active" data-shipping-fee="0" onclick="selectDeliveryMethod(this)">
                            <div class="method-icon">
                                <i class="fa fa-rocket"></i>
                            </div>
                            <div class="method-info">
                                <strong>Giao hàng nhanh</strong>
                                <span>Nhận hàng trong 2-4 giờ</span>
                                <div class="method-price free">Miễn phí</div>
                            </div>
                            <div class="method-check">
                                <i class="fa fa-check-circle"></i>
                            </div>
                        </div>
                        
                        <div class="delivery-method-card" data-shipping-fee="20000" onclick="selectDeliveryMethod(this)">
                            <div class="method-icon">
                                <i class="fa fa-truck"></i>
                            </div>
                            <div class="method-info">
                                <strong>Giao hàng tiêu chuẩn</strong>
                                <span>Nhận hàng trong 1-2 ngày</span>
                                <div class="method-price">20.000₫</div>
                            </div>
                            <div class="method-check">
                                <i class="fa fa-circle-o"></i>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Shipping Summary -->
                    <div class="shipping-summary">
                        <div class="summary-row">
                            <span class="summary-label">Giá sản phẩm:</span>
                            <span class="summary-value" id="productPrice">{{ convertPrice($product->price_sale) }}</span>
                        </div>
                        <div class="summary-row">
                            <span class="summary-label">Phí vận chuyển:</span>
                            <span class="summary-value shipping-fee" id="shippingFee">Miễn phí</span>
                        </div>
                        <div class="summary-divider"></div>
                        <div class="summary-row total">
                            <span class="summary-label">Tổng cộng:</span>
                            <span class="summary-value" id="totalPrice">{{ convertPrice($product->price_sale) }}</span>
                        </div>
                    </div>
                </div>
                
                <!-- Social Share - Enhanced -->
                <div class="social-share-modern">
                    <span class="share-text">
                        <i class="fa fa-share-alt"></i>
                        Chia sẻ
                    </span>
                    <div class="social-buttons-modern">
                        <a href="#" class="social-btn facebook" title="Facebook">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="#" class="social-btn messenger" title="Messenger">
                            <i class="fa fa-comment"></i>
                        </a>
                        <a href="#" class="social-btn zalo" title="Zalo">
                            <i class="fa fa-phone"></i>
                        </a>
                        <a href="#" class="social-btn twitter" title="Twitter">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <button class="social-btn copy-link" onclick="copyProductLink()" title="Sao chép link">
                            <i class="fa fa-link"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Product Tabs -->
<section class="product-tabs-section">
    <div class="container">
        <div class="product-tabs">
            <div class="tab-header">
                <button class="tab-btn active" data-tab="description">
                    <i class="fa fa-info-circle"></i>
                    <span>Mô tả sản phẩm</span>
                </button>
                <button class="tab-btn" data-tab="shipping">
                    <i class="fa fa-truck"></i>
                    <span>Chính sách vận chuyển</span>
                </button>
                <button class="tab-btn" data-tab="reviews">
                    <i class="fa fa-star"></i>
                    <span>Đánh giá ({{$comments->count()}})</span>
                </button>
            </div>
            
            <div class="tab-content">
                <div class="tab-pane active" id="description">
                    <div class="description-content">
                        {!!$product->desc!!}
                    </div>
                </div>
                
                <div class="tab-pane" id="shipping">
                    <div class="shipping-content">
                        @include('frontend.layout.shipping-policy')
                    </div>
                </div>
                
                <div class="tab-pane" id="reviews">
                    <div class="reviews-section">
                        <!-- Comment Form -->
                        <div class="comment-form-wrapper">
                            <h4>Viết đánh giá</h4>
                            <form action="{{route('comment.store', $product)}}" method="POST" class="comment-form">
                                @csrf
                                <div class="rating-input">
                                    <label>Đánh giá của bạn:</label>
                                    <div class="star-rating">
                                        <input type="radio" name="rating" value="5" id="star5">
                                        <label for="star5"><i class="fa fa-star"></i></label>
                                        <input type="radio" name="rating" value="4" id="star4">
                                        <label for="star4"><i class="fa fa-star"></i></label>
                                        <input type="radio" name="rating" value="3" id="star3">
                                        <label for="star3"><i class="fa fa-star"></i></label>
                                        <input type="radio" name="rating" value="2" id="star2">
                                        <label for="star2"><i class="fa fa-star"></i></label>
                                        <input type="radio" name="rating" value="1" id="star1">
                                        <label for="star1"><i class="fa fa-star"></i></label>
                                    </div>
                                </div>
                                <div class="comment-input">
                                    <textarea name="comment" rows="4" placeholder="Chia sẻ trải nghiệm của bạn về sản phẩm..." required></textarea>
                                </div>
                                <button type="submit" class="btn-submit-review">
                                    <i class="fa fa-paper-plane"></i>
                                    <span>Gửi đánh giá</span>
                                </button>
                            </form>
                        </div>
                        
                        <!-- Comments List -->
                        <div class="comments-list">
                            @forelse ($comments as $comment)
                            <div class="comment-item">
                                <div class="comment-avatar">
                                    <img src="https://ui-avatars.com/api/?name={{$comment->user->name}}&background=10b981&color=fff" alt="{{$comment->user->name}}">
                                </div>
                                <div class="comment-content">
                                    <div class="comment-header">
                                        <h5 class="commenter-name">{{$comment->user->name}}</h5>
                                        <div class="comment-rating">
                                            @for($i = 1; $i <= 5; $i++)
                                            <i class="fa fa-star {{ $i <= 4 ? 'active' : '' }}"></i>
                                            @endfor
                                        </div>
                                        <span class="comment-date">{{$comment->created_at->diffForHumans()}}</span>
                                    </div>
                                    <p class="comment-text">{{$comment->content}}</p>
                                    <div class="comment-actions">
                                        <button class="action-btn like-btn">
                                            <i class="fa fa-thumbs-up"></i>
                                            <span>Hữu ích ({{rand(0, 5)}})</span>
                                        </button>
                                        <button class="action-btn reply-btn">
                                            <i class="fa fa-comment"></i>
                                            <span>Trả lời</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="no-comments">
                                <i class="fa fa-comments"></i>
                                <h4>Chưa có đánh giá nào</h4>
                                <p>Hãy là người đầu tiên đánh giá sản phẩm này!</p>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Products - Redesigned -->
<section class="related-products-redesigned">
    <div class="container">
        <div class="section-header-modern">
            <div class="header-content">
                <h2 class="section-title-modern">
                    <i class="fa fa-heart"></i>
                    Sản phẩm tương tự
                </h2>
                <p class="section-subtitle-modern">Khám phá những sản phẩm khác trong cùng danh mục</p>
            </div>
            <a href="{{route('shop')}}" class="view-all-link">
                Xem tất cả
                <i class="fa fa-arrow-right"></i>
            </a>
        </div>
        
        <div class="products-carousel-modern">
            <button class="carousel-control prev" onclick="scrollCarousel('prev')">
                <i class="fa fa-chevron-left"></i>
            </button>
            
            <div class="products-track" id="productsCarousel">
                @foreach($relatedProducts as $relatedProduct)
                <div class="product-card-modern">
                    <div class="product-card-image">
                        @if($relatedProduct->quantity <= 5 && $relatedProduct->quantity > 0)
                        <span class="card-badge low-stock">Sắp hết</span>
                        @endif
                        
                        <img src="{{$relatedProduct->images->first()->image}}" alt="{{$relatedProduct->name}}">
                        
                        <div class="card-actions-overlay">
                            <a class="card-action-btn" href="{{route('product', [$product, Str::slug($product->name)])}}">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a class="card-action-btn" href="{{route('cart.addToFavorite', $relatedProduct->id)}}" title="Yêu thích">
                                <i class="fa fa-heart-o"></i>
                            </a>
                            <button class="card-action-btn" onclick="compareProduct({{$relatedProduct->id}})" title="So sánh">
                                <i class="fa fa-exchange"></i>
                            </button>
                        </div>
                        
                        <button class="quick-add-btn-overlay" onclick="addToCart({{$relatedProduct->id}})">
                            <i class="fa fa-shopping-cart"></i>
                            <span>Thêm vào giỏ</span>
                        </button>
                    </div>
                    
                    <div class="product-card-content">
                        <div class="card-category">{{$relatedProduct->category->name}}</div>
                        <h4 class="card-title">
                            <a href="{{route('product', [$relatedProduct, Str::slug($relatedProduct->name)])}}">
                                {{$relatedProduct->name}}
                            </a>
                        </h4>
                        
                        <div class="card-rating">
                            @for($i = 1; $i <= 5; $i++)
                            <i class="fa fa-star {{ $i <= 4 ? 'filled' : '' }}"></i>
                            @endfor
                            <span class="rating-number">({{rand(10, 50)}})</span>
                        </div>
                        
                        <div class="card-pricing">
                            <span class="card-price-current">{{ convertPrice($relatedProduct->price_sale) }}</span>
                            @if($relatedProduct->price_sale < $relatedProduct->price_sale * 1.2)
                            <span class="card-price-old">{{ convertPrice($relatedProduct->price_sale * 1.2) }}</span>
                            <span class="card-discount">-20%</span>
                            @endif
                        </div>
                        
                        <div class="card-stock-info">
                            <div class="stock-bar">
                                <div class="stock-fill" style="width: 70%"></div>
                            </div>
                            <span class="stock-text">Đã bán {{$relatedProduct->sold}}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <button class="carousel-control next" onclick="scrollCarousel('next')">
                <i class="fa fa-chevron-right"></i>
            </button>
        </div>
    </div>
</section>

<!-- Image Modal -->
<div id="imageModal" class="image-modal" onclick="closeImageModal()">
    <span class="modal-close">&times;</span>
    <button class="modal-nav prev" onclick="event.stopPropagation(); previousModalImage()">
        <i class="fa fa-chevron-left"></i>
    </button>
    <img class="modal-content" id="modalImage">
    <button class="modal-nav next" onclick="event.stopPropagation(); nextModalImage()">
        <i class="fa fa-chevron-right"></i>
    </button>
</div>

<style>
:root {
    --primary-color: #10b981;
    --primary-dark: #059669;
    --primary-light: #34d399;
    --secondary-color: #f59e0b;
    --accent-color: #ef4444;
    --success-color: #22c55e;
    --info-color: #3b82f6;
    --dark-color: #1f2937;
    --light-color: #f9fafb;
    --border-color: #e5e7eb;
    --text-dark: #374151;
    --text-light: #6b7280;
    --white: #ffffff;
    
    --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
    
    --radius-sm: 8px;
    --radius-md: 12px;
    --radius-lg: 16px;
    --radius-xl: 20px;
    --radius-2xl: 24px;
    --radius-full: 9999px;
    
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Modern Breadcrumb - FIXED */
.breadcrumb-modern {
    background: linear-gradient(135deg, #f9fafb 0%, white 100%);
    padding: 24px 0;
    border-bottom: 1px solid var(--border-color);
    margin-top: 20px;
}

.breadcrumb-content {
    max-width: 100%;
}

.breadcrumb {
    background: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-wrap: wrap;
    list-style: none;
    align-items: center;
}

.breadcrumb-item {
    font-size: 14px;
    font-weight: 500;
    display: flex;
    align-items: center;
}

.breadcrumb-item + .breadcrumb-item {
    padding-left: 8px;
}

.breadcrumb-item + .breadcrumb-item::before {
    content: "›";
    color: var(--text-light);
    padding-right: 8px;
    font-size: 18px;
    font-weight: 400;
}

.breadcrumb-item a {
    color: var(--text-dark);
    text-decoration: none;
    transition: var(--transition);
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 4px 8px;
    border-radius: var(--radius-sm);
}

.breadcrumb-item a:hover {
    color: var(--primary-color);
    background: rgba(16, 185, 129, 0.08);
}

.breadcrumb-item a i {
    font-size: 14px;
}

.breadcrumb-item.active {
    color: var(--text-light);
    padding-left: 8px;
}

/* Product Detail Redesigned */
.product-detail-redesigned {
    padding: 40px 0 60px;
    background: white;
}

.product-main-wrapper {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: start;
}

/* Product Gallery Modern */
.product-gallery-modern {
    position: sticky;
    top: 100px;
}

.gallery-container {
    background: linear-gradient(135deg, #f9fafb, white);
    border-radius: var(--radius-2xl);
    padding: 24px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
}

.main-image-container {
    position: relative;
    margin-bottom: 20px;
    border-radius: var(--radius-xl);
    overflow: hidden;
    background: white;
}

.product-labels-modern {
    position: absolute;
    top: 20px;
    left: 20px;
    z-index: 10;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.label-badge {
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 8px 14px;
    border-radius: var(--radius-full);
    font-size: 12px;
    font-weight: 700;
    color: white;
    backdrop-filter: blur(10px);
    box-shadow: var(--shadow-md);
}

.label-badge.low-stock {
    background: linear-gradient(135deg, #f59e0b, #d97706);
}

.label-badge.out-stock {
    background: linear-gradient(135deg, #ef4444, #dc2626);
}

.label-badge.new-badge {
    background: linear-gradient(135deg, #10b981, #059669);
}

.label-badge.discount-badge {
    background: linear-gradient(135deg, #ef4444, #dc2626);
}

.main-product-image {
    position: relative;
    height: 500px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.main-product-image img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
    transition: transform 0.5s ease;
}

.main-product-image:hover img {
    transform: scale(1.05);
}

.image-actions {
    position: absolute;
    bottom: 20px;
    right: 20px;
    display: flex;
    gap: 10px;
}

.image-action-btn {
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 10px 16px;
    background: rgba(255, 255, 255, 0.95);
    border: none;
    border-radius: var(--radius-full);
    font-weight: 600;
    font-size: 13px;
    cursor: pointer;
    box-shadow: var(--shadow-md);
    transition: var(--transition);
}

.image-action-btn:hover {
    background: white;
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

.thumbnail-slider {
    position: relative;
    padding: 0 40px;
}

.thumb-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 32px;
    height: 32px;
    background: white;
    border: 2px solid var(--border-color);
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 10;
    transition: var(--transition);
}

.thumb-nav:hover {
    background: var(--primary-color);
    color: white;
    border-color: var(--primary-color);
}

.thumb-nav.prev-thumb {
    left: 0;
}

.thumb-nav.next-thumb {
    right: 0;
}

.thumbnail-container {
    display: flex;
    gap: 12px;
    overflow-x: auto;
    scroll-behavior: smooth;
    scrollbar-width: none;
    -ms-overflow-style: none;
}

.thumbnail-container::-webkit-scrollbar {
    display: none;
}

.thumbnail-card {
    position: relative;
    flex-shrink: 0;
    width: 90px;
    height: 90px;
    border-radius: var(--radius-lg);
    overflow: hidden;
    cursor: pointer;
    border: 3px solid transparent;
    transition: var(--transition);
    background: white;
}

.thumbnail-card.active {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 2px rgba(16, 185, 129, 0.2);
}

.thumbnail-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.thumbnail-card:hover {
    transform: scale(1.05);
}

.thumb-overlay {
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.1);
    opacity: 0;
    transition: var(--transition);
}

.thumbnail-card:hover .thumb-overlay {
    opacity: 1;
}

/* Trust Badges */
.trust-badges-section {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 15px;
    margin-top: 20px;
}

.trust-badge-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 15px;
    background: white;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-sm);
}

.trust-icon {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, var(--primary-light), var(--primary-color));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 18px;
    flex-shrink: 0;
}

.trust-text strong {
    display: block;
    font-size: 13px;
    font-weight: 700;
    color: var(--dark-color);
    margin-bottom: 2px;
}

.trust-text span {
    font-size: 11px;
    color: var(--text-light);
}

/* Product Info Modern - BALANCED ICONS */
.product-info-modern {
    background: white;
    padding: 0;
}

.product-header-section {
    margin-bottom: 30px;
}

.product-category-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(16, 185, 129, 0.1);
    color: var(--primary-color);
    padding: 8px 16px;
    border-radius: var(--radius-full);
    font-size: 13px;
    font-weight: 700;
    text-transform: uppercase;
    margin-bottom: 15px;
}

.product-category-badge i {
    font-size: 14px;
}

.product-name-modern {
    font-size: 2.5rem;
    font-weight: 900;
    color: var(--dark-color);
    line-height: 1.2;
    margin-bottom: 20px;
}

.product-meta-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 20px;
    padding-bottom: 20px;
    border-bottom: 2px solid var(--border-color);
}

.rating-display {
    display: flex;
    align-items: center;
    gap: 12px;
    flex-wrap: wrap;
}

.stars-large {
    display: flex;
    align-items: center;
    gap: 2px;
}

.stars-large i {
    color: #d1d5db;
    font-size: 16px;
}

.stars-large i.filled {
    color: #fbbf24;
}

.rating-score {
    font-weight: 700;
    font-size: 16px;
    color: var(--dark-color);
}

.rating-divider {
    color: var(--border-color);
    margin: 0 4px;
}

.review-link {
    color: var(--primary-color);
    font-weight: 600;
    cursor: pointer;
    transition: var(--transition);
    font-size: 14px;
}

.review-link:hover {
    text-decoration: underline;
}

.sold-count {
    color: var(--text-light);
    font-size: 14px;
    display: flex;
    align-items: center;
    gap: 6px;
}

.sold-count i {
    font-size: 14px;
}

.wishlist-btn-modern {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 10px 20px;
    background: transparent;
    border: 2px solid var(--border-color);
    border-radius: var(--radius-full);
    font-weight: 600;
    cursor: pointer;
    transition: var(--transition);
    color: var(--text-dark);
    font-size: 14px;
}

.wishlist-btn-modern i {
    font-size: 16px;
}

.wishlist-btn-modern:hover,
.wishlist-btn-modern.active {
    background: rgba(239, 68, 68, 0.1);
    border-color: var(--accent-color);
    color: var(--accent-color);
}

.wishlist-btn-modern.active i::before {
    content: "\f004";
}

/* Pricing Section Modern - BALANCED */
.pricing-section-modern {
    background: linear-gradient(135deg, rgba(16, 185, 129, 0.08), rgba(5, 150, 105, 0.03));
    border: 2px solid var(--primary-light);
    border-radius: var(--radius-xl);
    padding: 32px;
    margin-bottom: 32px;
    box-shadow: 0 4px 16px rgba(16, 185, 129, 0.1);
}

.main-pricing {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 15px;
    flex-wrap: wrap;
}

.current-price-large {
    font-size: 3rem;
    font-weight: 900;
    color: var(--primary-color);
    line-height: 1;
}

.original-price_large {
    font-size: 1.5rem;
    color: var(--text-light);
    text-decoration: line-through;
    font-weight: 500;
}

.discount-tag-large {
    display: flex;
    align-items: center;
    gap: 6px;
    background: var(--accent-color);
    color: white;
    padding: 8px 16px;
    border-radius: var(--radius-full);
    font-weight: 700;
    font-size: 14px;
}

.discount-tag-large i {
    font-size: 14px;
}

.price-per-unit-display {
    display: flex;
    align-items: center;
    gap: 8px;
    color: var(--text-light);
    font-size: 15px;
    padding-bottom: 15px;
    margin-bottom: 15px;
    border-bottom: 1px dashed var(--border-color);
}

.price-per-unit-display i {
    font-size: 15px;
}

.price-benefits {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
}

.benefit-tag-item {
    display: flex;
    align-items: center;
    gap: 8px;
    color: var(--text-dark);
    font-weight: 600;
    font-size: 14px;
}

.benefit-tag-item i {
    color: var(--primary-color);
    font-size: 16px;
}

/* Product Highlights - BALANCED */
.product-highlights-modern {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 15px;
    margin-bottom: 30px;
}

.highlight-card {
    display: flex;
    align-items: center;
    gap: 12px;
    border-radius: var(--radius-lg);
    transition: var(--transition);
}

.highlight-card:hover {
    background: white;
    box-shadow: var(--shadow-md);
    transform: translateY(-2px);
}

.highlight-icon {
    width: 48px;
    height: 48px;
    border-radius: var(--radius-lg);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    color: white;
    flex-shrink: 0;
}

.highlight-icon i {
    font-size: 20px;
}

.highlight-icon.green {
    background: linear-gradient(135deg, #10b981, #059669);
}

.highlight-icon.blue {
    background: linear-gradient(135deg, #3b82f6, #2563eb);
}

.highlight-icon.orange {
    background: linear-gradient(135deg, #f59e0b, #d97706);
}

.highlight-content strong {
    display: block;
    font-size: 14px;
    font-weight: 700;
    color: var(--dark-color);
    margin-bottom: 2px;
}

.highlight-content span {
    font-size: 12px;
    color: var(--text-light);
}

/* Cart Form Modern - BALANCED */
.cart-form-modern {
    margin-bottom: 30px;
}

.quantity-selector-modern {
    margin-bottom: 25px;
}

.selector-label {
    display: flex;
    align-items: center;
    gap: 8px;
    font-weight: 700;
    font-size: 16px;
    color: var(--dark-color);
    margin-bottom: 12px;
}

.selector-label i {
    font-size: 16px;
}

.quantity-input-group {
    display: flex;
    align-items: center;
    gap: 0;
    width: fit-content;
    background: white;
    border: 2px solid var(--border-color);
    border-radius: var(--radius-full);
    padding: 4px;
    margin-bottom: 10px;
}

.qty-control {
    width: 40px;
    height: 40px;
    background: transparent;
    border: none;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--text-dark);
    transition: var(--transition);
    font-size: 14px;
}

.qty-control i {
    font-size: 14px;
}

.qty-control:hover {
    background: var(--primary-color);
    color: white;
}

#quantity {
    width: 60px;
    text-align: center;
    border: none;
    font-weight: 700;
    font-size: 18px;
    color: var(--dark-color);
    background: transparent;
}

.stock-available {
    display: flex;
    align-items: center;
    gap: 6px;
    color: var(--success-color);
    font-weight: 600;
    font-size: 14px;
}

.stock-available i {
    font-size: 14px;
}

.cart-actions-modern {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px;
}

.btn-buy-now-modern,
.btn-add-cart-modern,
.btn-notify-modern {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    padding: 16px 24px;
    border: none;
    border-radius: var(--radius-lg);
    font-weight: 700;
    font-size: 16px;
    cursor: pointer;
    transition: var(--transition);
    text-decoration: none;
}

.btn-buy-now-modern i,
.btn-add-cart-modern i,
.btn-notify-modern i {
    font-size: 16px;
}

.btn-buy-now-modern {
    background: linear-gradient(135deg, var(--secondary-color), #d97706);
    color: white;
    box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
}

.btn-buy-now-modern:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(245, 158, 11, 0.4);
}

.btn-add-cart-modern {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    color: white;
    box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
}

.btn-add-cart-modern:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(16, 185, 129, 0.4);
}

.btn-notify-modern {
    grid-column: 1 / -1;
    background: var(--text-light);
    color: white;
    cursor: not-allowed;
}

/* Product Specs Modern - BALANCED */
.product-specs-modern {
    background: white;
    border: 2px solid var(--border-color);
    border-radius: var(--radius-xl);
    padding: 28px;
    margin-bottom: 32px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}

.specs-title {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 18px;
    font-weight: 700;
    color: var(--dark-color);
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 2px solid var(--border-color);
}

.specs-title i {
    font-size: 18px;
}

.specs-grid {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.spec-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 0;
    border-bottom: 1px solid var(--border-color);
}

.spec-row:last-child {
    border-bottom: none;
}

.spec-label {
    font-weight: 600;
    color: var(--text-light);
    font-size: 14px;
}

.spec-value {
    font-weight: 700;
    color: var(--dark-color);
    font-size: 14px;
    display: flex;
    align-items: center;
    gap: 6px;
}

.spec-value i {
    font-size: 14px;
}

.spec-value.in-stock {
    color: var(--success-color);
}

.spec-value.out-stock {
    color: var(--accent-color);
}

/* Delivery Section Modern - BALANCED */
.delivery-section-modern {
    background: linear-gradient(135deg, var(--light-color), white);
    border-radius: var(--radius-xl);
    padding: 28px;
    margin-bottom: 32px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}

.delivery-title {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 18px;
    font-weight: 700;
    color: var(--dark-color);
    margin-bottom: 20px;
}

.delivery-title i {
    font-size: 18px;
}

.delivery-methods {
    display: flex;
    flex-direction: column;
    gap: 12px;
    margin-bottom: 24px;
}

.delivery-method-card {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 16px;
    background: white;
    border: 2px solid var(--border-color);
    border-radius: var(--radius-lg);
    cursor: pointer;
    transition: var(--transition);
    position: relative;
}

.delivery-method-card::before {
    content: '';
    position: absolute;
    inset: 0;
    border-radius: var(--radius-lg);
    background: linear-gradient(135deg, rgba(16, 185, 129, 0.05), rgba(5, 150, 105, 0.02));
    opacity: 0;
    transition: var(--transition);
}

.delivery-method-card:hover::before {
    opacity: 0.5;
}

.delivery-method-card:hover,
.delivery-method-card.active {
    border-color: var(--primary-color);
    background: rgba(16, 185, 129, 0.05);
    transform: translateX(4px);
    box-shadow: 0 4px 12px rgba(16, 185, 129, 0.15);
}

.delivery-method-card.active::before {
    opacity: 1;
}

.method-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, var(--primary-light), var(--primary-color));
    border-radius: var(--radius-lg);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 20px;
    flex-shrink: 0;
    transition: var(--transition);
}

.delivery-method-card.active .method-icon {
    transform: scale(1.1);
    box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
}

.method-icon i {
    font-size: 20px;
}

.method-info {
    flex: 1;
}

.method-info strong {
    display: block;
    font-size: 15px;
    font-weight: 700;
    color: var(--dark-color);
    margin-bottom: 4px;
}

.method-info span {
    font-size: 13px;
    color: var(--text-light);
    display: block;
    margin-bottom: 6px;
}

.method-price {
    font-weight: 700;
    color: var(--dark-color);
    font-size: 15px;
}

.method-price.free {
    color: var(--success-color);
}

.method-check {
    font-size: 20px;
    color: var(--text-light);
    transition: var(--transition);
}

.method-check i {
    font-size: 20px;
}

.delivery-method-card.active .method-check {
    color: var(--primary-color);
    transform: scale(1.2);
}

.delivery-method-card.active .method-check i::before {
    content: "\f058"; /* fa-check-circle */
}

/* Shipping Summary */
.shipping-summary {
    background: white;
    border: 2px solid var(--border-color);
    border-radius: var(--radius-lg);
    padding: 20px;
    margin-top: 20px;
}

.summary-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 0;
}

.summary-label {
    font-size: 14px;
    color: var(--text-dark);
    font-weight: 500;
}

.summary-value {
    font-size: 15px;
    color: var(--dark-color);
    font-weight: 600;
}

.summary-value.shipping-fee {
    color: var(--success-color);
}

.summary-divider {
    height: 2px;
    background: linear-gradient(to right, transparent, var(--border-color), transparent);
    margin: 8px 0;
}

.summary-row.total {
    padding-top: 15px;
}

.summary-row.total .summary-label {
    font-size: 16px;
    font-weight: 700;
    color: var(--dark-color);
}

.summary-row.total .summary-value {
    font-size: 20px;
    font-weight: 900;
    color: var(--primary-color);
}

/* Product Tabs */
.product-tabs-section {
    background: var(--light-color);
    padding: 60px 0;
}

.tab-header {
    display: flex;
    background: white;
    border-radius: var(--border-radius-lg);
    margin-bottom: 30px;
    overflow: hidden;
    box-shadow: var(--box-shadow);
}

.tab-btn {
    flex: 1;
    padding: 20px;
    border: none;
    background: transparent;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    font-weight: 600;
    color: var(--text-dark);
    transition: var(--transition);
    border-bottom: 3px solid transparent;
}

.tab-btn.active {
    background: var(--primary-color);
    color: white;
}

.tab-btn:hover {
    background: var(--light-color);
}

.tab-btn.active:hover {
    background: var(--primary-color);
}

.tab-content {
    background: white;
    border-radius: var(--border-radius-lg);
    padding: 40px;
    box-shadow: var(--box-shadow);
}

.tab-pane {
    display: none;
}

.tab-pane.active {
    display: block;
}

/* Comments */
.comment-form-wrapper {
    margin-bottom: 40px;
    padding: 30px;
    background: var(--light-color);
    border-radius: var(--border-radius-lg);
}

.star-rating {
    display: flex;
    flex-direction: row-reverse;
    gap: 5px;
    margin-bottom: 15px;
}

.star-rating input {
    display: none;
}

.star-rating label {
    cursor: pointer;
    color: #ddd;
    font-size: 20px;
    transition: var(--transition);
}

.star-rating input:checked ~ label,
.star-rating label:hover,
.star-rating label:hover ~ label {
    color: #fbbf24;
}

.comment-input textarea {
    width: 100%;
    border: 1px solid var(--border-color);
    border-radius: var(--border-radius);
    padding: 15px;
    resize: vertical;
    font-family: inherit;
}

.btn-submit-review {
    background: var(--primary-color);
    color: white;
    border: none;
    padding: 12px 25px;
    border-radius: var(--border-radius);
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: var(--transition);
}

.btn-submit-review:hover {
    background: var(--primary-dark);
}

.comment-item {
    display: flex;
    gap: 15px;
    padding: 20px 0;
    border-bottom: 1px solid var(--border-color);
}

.comment-item:last-child {
    border-bottom: none;
}

.comment-avatar img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    object-fit: cover;
}

.comment-content {
    flex: 1;
}

.comment-header {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 10px;
}

.commenter-name {
    font-weight: 600;
    color: var(--dark-color);
    margin: 0;
}

.comment-rating i {
    color: #fbbf24;
    font-size: 14px;
}

.comment-date {
    color: var(--text-light);
    font-size: 14px;
}

.comment-text {
    color: var(--text-dark);
    line-height: 1.6;
    margin-bottom: 15px;
}

.comment-actions {
    display: flex;
    gap: 20px;
}

.action-btn {
    background: none;
    border: none;
    color: var(--text-light);
    font-size: 14px;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 5px;
    transition: var(--transition);
}

.action-btn:hover {
    color: var(--primary-color);
}

.no-comments {
    text-align: center;
    padding: 60px 20px;
    color: var(--text-light);
}

.no-comments i {
    font-size: 4rem;
    margin-bottom: 20px;
    opacity: 0.5;
}

/* Related Products Redesigned */
.related-products-redesigned {
    padding: 80px 0;
    background: linear-gradient(to bottom, white, var(--light-color));
}

.section-header-modern {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 40px;
}

.header-content {
    flex: 1;
}

.section-title-modern {
    font-size: 2rem;
    font-weight: 900;
    color: var(--dark-color);
    margin-bottom: 8px;
    display: flex;
    align-items: center;
    gap: 12px;
}

.section-title-modern i {
    color: var(--primary-color);
}

.section-subtitle-modern {
    color: var(--text-light);
    font-size: 15px;
}

.view-all-link {
    display: flex;
    align-items: center;
    gap: 8px;
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 700;
    padding: 10px 20px;
    border-radius: var(--radius-full);
    transition: var(--transition);
}

.view-all-link:hover {
    background: rgba(16, 185, 129, 0.1);
    gap: 12px;
}

.products-carousel-modern {
    position: relative;
}

.carousel-control {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 50px;
    height: 50px;
    background: white;
    border: 2px solid var(--border-color);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    z-index: 10;
    transition: var(--transition);
    box-shadow: var(--shadow-lg);
}

.carousel-control:hover {
    background: var(--primary-color);
    color: white;
    border-color: var(--primary-color);
    transform: translateY(-50%) scale(1.1);
}

.carousel-control.prev {
    left: -25px;
}

.carousel-control.next {
    right: -25px;
}

.products-track {
    display: flex;
    gap: 24px;
    overflow-x: auto;
    scroll-behavior: smooth;
    padding: 10px 5px 30px;
    scrollbar-width: none;
    -ms-overflow-style: none;
}

.products-track::-webkit-scrollbar {
    display: none;
}

.product-card-modern {
    flex: 0 0 calc(25% - 18px);
    min-width: 280px;
    background: white;
    border-radius: var(--radius-xl);
    overflow: hidden;
    box-shadow: var(--shadow-md);
    transition: var(--transition);
    border: 2px solid transparent;
}

.product-card-modern:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-xl);
    border-color: var(--primary-color);
}

.product-card-image {
    position: relative;
    height: 260px;
    overflow: hidden;
    background: var(--light-color);
}

.card-badge {
    position: absolute;
    top: 12px;
    left: 12px;
    background: var(--secondary-color);
    color: white;
    padding: 6px 12px;
    border-radius: var(--radius-full);
    font-size: 11px;
    font-weight: 700;
    z-index: 10;
}

.card-badge.low-stock {
    background: var(--accent-color);
}

.product-card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
}

.product-card-modern:hover .product-card-image img {
    transform: scale(1.1);
}

.card-actions-overlay {
    position: absolute;
    top: 12px;
    right: 12px;
    display: flex;
    flex-direction: column;
    gap: 8px;
    opacity: 0;
    transform: translateX(20px);
    transition: var(--transition);
}

.product-card-modern:hover .card-actions-overlay {
    opacity: 1;
    transform: translateX(0);
}

.card-action-btn {
    width: 40px;
    height: 40px;
    background: white;
    border: none;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    box-shadow: var(--shadow-md);
    transition: var(--transition);
}

.card-action-btn:hover {
    background: var(--primary-color);
    color: white;
    transform: scale(1.1) rotate(5deg);
}

.quick-add-btn-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
    padding: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    color: white;
    border: none;
    font-weight: 700;
    cursor: pointer;
    opacity: 0;
    transform: translateY(20px);
    transition: var(--transition);
}

.product-card-modern:hover .quick-add-btn-overlay {
    opacity: 1;
    transform: translateY(0);
}

.quick-add-btn-overlay:hover {
    background: linear-gradient(to top, var(--primary-color), transparent);
}

.product-card-content {
    padding: 20px;
}

.card-category {
    color: var(--primary-color);
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    margin-bottom: 8px;
}

.card-title {
    margin-bottom: 12px;
}

.card-title a {
    color: var(--dark-color);
    text-decoration: none;
    font-size: 16px;
    font-weight: 700;
    line-height: 1.4;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    transition: var(--transition);
}

.card-title a:hover {
    color: var(--primary-color);
}

.card-rating {
    display: flex;
    align-items: center;
    gap: 4px;
    margin-bottom: 12px;
}

.card-rating i {
    color: #d1d5db;
    font-size: 14px;
}

.card-rating i.filled {
    color: #fbbf24;
}

.rating-number {
    font-size: 12px;
    color: var(--text-light);
    margin-left: 4px;
}

.card-pricing {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 12px;
}

.card-price_current {
    font-size: 20px;
    font-weight: 900;
    color: var(--primary-color);
}

.card-price-old {
    font-size: 14px;
    color: var(--text-light);
    text-decoration: line-through;
}

.card-discount {
    background: var(--accent-color);
    color: white;
    padding: 3px 8px;
    border-radius: var(--radius-sm);
    font-size: 11px;
    font-weight: 700;
}

.card-stock-info {
    margin-top: 12px;
}

.stock-bar {
    height: 6px;
    background: var(--border-color);
    border-radius: var(--radius-full);
    overflow: hidden;
    margin-bottom: 6px;
}

.stock-fill {
    height: 100%;
    background: linear-gradient(90deg, var(--primary-color), var(--primary-light));
    border-radius: var(--radius-full);
    transition: width 0.3s ease;
}

/* Image Modal */
.image-modal {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.95);
    backdrop-filter: blur(10px);
}

.modal-content {
    margin: auto;
    display: block;
    max-width: 90%;
    max-height: 90vh;
    object-fit: contain;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.modal-close {
    position: absolute;
    top: 20px;
    right: 35px;
    color: white;
    font-size: 40px;
    font-weight: bold;
    cursor: pointer;
    transition: var(--transition);
}

.modal-close:hover {
    color: var(--primary-color);
}

.modal-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(255, 255, 255, 0.1);
    border: 2px solid rgba(255, 255, 255, 0.3);
    color: white;
    font-size: 24px;
    padding: 15px 20px;
    cursor: pointer;
    border-radius: var(--radius-lg);
    backdrop-filter: blur(10px);
    transition: var(--transition);
}

.modal-nav:hover {
    background: rgba(255, 255, 255, 0.2);
}

.modal-nav.prev {
    left: 20px;
}

.modal-nav.next {
    right: 20px;
}

/* Fix all FontAwesome icons */
.fa {
    font-family: "FontAwesome" !important;
    font-style: normal;
    font-weight: normal;
    font-variant: normal;
    text-transform: none;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

/* Icon fixes */
.fa-home::before { content: "\f015"; }
.fa-exclamation-circle::before { content: "\f06a"; }
.fa-times-circle::before { content: "\f057"; }
.fa-star::before { content: "\f005"; }
.fa-tag::before { content: "\f02b"; }
.fa-search-plus::before { content: "\f00e"; }
.fa-share-alt::before { content: "\f1e0"; }
.fa-chevron-left::before { content: "\f053"; }
.fa-chevron-right::before { content: "\f054"; }
.fa-shield::before { content: "\f132"; }
.fa-sync::before { content: "\f021"; }
.fa-shopping-bag::before { content: "\f290"; }
.fa-heart::before { content: "\f004"; }
.fa-heart-o::before { content: "\f08a"; }
.fa-bolt::before { content: "\f0e7"; }
.fa-balance-scale::before { content: "\f24e"; }
.fa-gift::before { content: "\f06b"; }
.fa-truck::before { content: "\f0d1"; }
.fa-leaf::before { content: "\f06c"; }
.fa-cubes::before { content: "\f1b3"; }
.fa-minus::before { content: "\f068"; }
.fa-plus::before { content: "\f067"; }
.fa-check-circle::before { content: "\f058"; }
.fa-shopping-cart::before { content: "\f07a"; }
.fa-bell::before { content: "\f0f3"; }
.fa-info-circle::before { content: "\f05a"; }
.fa-map-marker::before { content: "\f041"; }
.fa-rocket::before { content: "\f135"; }
.fa-circle-o::before { content: "\f10c"; }
.fa-facebook::before { content: "\f09a"; }
.fa-comment::before { content: "\f075"; }
.fa-phone::before { content: "\f095"; }
.fa-twitter::before { content: "\f099"; }
.fa-link::before { content: "\f0c1"; }
.fa-paper-plane::before { content: "\f1d8"; }
.fa-thumbs-up::before { content: "\f164"; }
.fa-comments::before { content: "\f086"; }
.fa-arrow-right::before { content: "\f061"; }
.fa-eye::before { content: "\f06e"; }
.fa-exchange::before { content: "\f0ec"; }

/* Responsive - IMPROVED */
@media (max-width: 1200px) {
    .product-main-wrapper {
        gap: 40px;
    }
    
    .product-card-modern {
        flex: 0 0 calc(33.333% - 16px);
    }
    
    .breadcrumb-modern {
        padding: 20px 0;
    }
}

@media (max-width: 992px) {
    .product-main-wrapper {
        grid-template-columns: 1fr;
        gap: 30px;
    }
    
    .product-gallery-modern {
        position: static;
    }
    
    .product-card-modern {
        flex: 0 0 calc(50% - 12px);
    }
    
    .product-highlights-modern {
        grid-template-columns: 1fr;
    }
    
    .cart-actions-modern {
        grid-template-columns: 1fr;
    }
    
    .breadcrumb-modern {
        padding: 18px 0;
        margin-top: 10px;
    }
    
    .breadcrumb-item {
        font-size: 13px;
    }
}

@media (max-width: 768px) {
    .product-name-modern {
        font-size: 2rem;
    }
    
    .current-price-large {
        font-size: 2.5rem;
    }
    
    .main-product-image {
        height: 350px;
    }
    
    .thumbnail-slider {
        padding: 0 35px;
    }
    
    .trust-badges-section {
        grid-template-columns: 1fr;
    }
    
    .carousel-control {
        display: none;
    }
    
    .product-card-modern {
        flex: 0 0 250px;
    }
    
    .breadcrumb-modern {
        padding: 16px 0;
        margin-top: 5px;
    }
    
    .breadcrumb-item {
        font-size: 12px;
    }
    
    .breadcrumb-item a {
        padding: 3px 6px;
    }
}

@media (max-width: 576px) {
    .product-name-modern {
        font-size: 1.6rem;
    }
    
    .current-price_large {
        font-size: 2rem;
    }
    
    .main-product-image {
        height: 280px;
    }
    
    .thumbnail-card {
        width: 70px;
        height: 70px;
    }
    
    .pricing-section-modern {
        padding: 20px;
    }
    
    .product-specs-modern,
    .delivery-section-modern {
        padding: 20px;
    }
    
    .breadcrumb-modern {
        padding: 14px 0;
    }
    
    .breadcrumb {
        font-size: 11px;
    }
    
    .breadcrumb-item a i {
        font-size: 12px;
    }
    
    .breadcrumb-item.active {
        display: none;
    }
}

/* Additional improvements */
.product-detail-redesigned {
    padding: 40px 0 60px;
    background: white;
}

.gallery-container {
    background: linear-gradient(135deg, #f9fafb, white);
    border-radius: var(--radius-2xl);
    padding: 24px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
}

.product-info-modern {
    background: white;
    padding: 0;
}

.pricing-section-modern {
    background: linear-gradient(135deg, rgba(16, 185, 129, 0.08), rgba(5, 150, 105, 0.03));
    border: 2px solid var(--primary-light);
    border-radius: var(--radius-xl);
    padding: 32px;
    margin-bottom: 32px;
    box-shadow: 0 4px 16px rgba(16, 185, 129, 0.1);
}

.product-specs-modern {
    background: white;
    border: 2px solid var(--border-color);
    border-radius: var(--radius-xl);
    padding: 28px;
    margin-bottom: 32px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}

.delivery-section-modern {
    background: linear-gradient(135deg, var(--light-color), white);
    border-radius: var(--radius-xl);
    padding: 28px;
    margin-bottom: 32px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}

/* Smooth scroll behavior */
html {
    scroll-behavior: smooth;
}

/* Improve button interactions */
button {
    -webkit-tap-highlight-color: transparent;
    touch-action: manipulation;
}

/* Better focus states */
input:focus,
select:focus,
button:focus,
textarea:focus {
    outline: none;
}

/* Loading animation for images */
@keyframes imageLoad {
    from {
        opacity: 0;
        transform: scale(0.95);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

.main-product-image img {
    animation: imageLoad 0.5s ease-out;
}

/* Better scrollbar */
.thumbnail-container::-webkit-scrollbar,
.products-track::-webkit-scrollbar {
    height: 6px;
}

.thumbnail-container::-webkit-scrollbar-track,
.products-track::-webkit-scrollbar-track {
    background: var(--light-color);
    border-radius: var(--radius-full);
}

.thumbnail-container::-webkit-scrollbar-thumb,
.products-track::-webkit-scrollbar-thumb {
    background: var(--primary-color);
    border-radius: var(--radius-full);
}

.thumbnail-container::-webkit-scrollbar-thumb:hover,
.products-track::-webkit-scrollbar-thumb:hover {
    background: var(--primary-dark);
}
</style>

<script>
let currentImageIndex = 0;
const productImages = @json($product->images->pluck('image'));

function changeMainImage(imageSrc, thumbnail) {
    const mainImg = document.getElementById('mainProductImage');
    
    // Fade effect
    mainImg.style.opacity = '0';
    setTimeout(() => {
        mainImg.src = imageSrc;
        mainImg.style.opacity = '1';
    }, 200);
    
    // Update active thumbnail
    document.querySelectorAll('.thumbnail-card').forEach(item => {
        item.classList.remove('active');
    });
    thumbnail.classList.add('active');
    
    // Update current index
    currentImageIndex = Array.from(document.querySelectorAll('.thumbnail-card')).indexOf(thumbnail);
}

function scrollThumbnails(direction) {
    const container = document.getElementById('thumbnailContainer');
    const scrollAmount = 110;
    
    if (direction === 'prev') {
        container.scrollLeft -= scrollAmount;
    } else {
        container.scrollLeft += scrollAmount;
    }
}

function nextImage() {
    currentImageIndex = (currentImageIndex + 1) % productImages.length;
    updateMainImage();
}

function previousImage() {
    currentImageIndex = (currentImageIndex - 1 + productImages.length) % productImages.length;
    updateMainImage();
}

function updateMainImage() {
    const newImage = productImages[currentImageIndex];
    const mainImg = document.getElementById('mainProductImage');
    
    mainImg.style.opacity = '0';
    setTimeout(() => {
        mainImg.src = newImage;
        mainImg.style.opacity = '1';
    }, 200);
    
    // Update active thumbnail
    document.querySelectorAll('.thumbnail-card').forEach((item, index) => {
        item.classList.toggle('active', index === currentImageIndex);
    });
}

const baseProductPrice = {{ $product->price_sale }};
let currentShippingFee = 0;
let currentQuantity = 1;

// Delivery method selection
function selectDeliveryMethod(element) {
    // Remove active class from all cards
    document.querySelectorAll('.delivery-method-card').forEach(card => {
        card.classList.remove('active');
        // Reset check icons
        const checkIcon = card.querySelector('.method-check i');
        if (checkIcon) {
            checkIcon.className = 'fa fa-circle-o';
        }
    });
    
    // Add active class to selected card
    element.classList.add('active');
    
    // Update check icon for active card
    const activeCheckIcon = element.querySelector('.method-check i');
    if (activeCheckIcon) {
        activeCheckIcon.className = 'fa fa-check-circle';
    }
    
    // Get shipping fee
    const shippingFee = parseInt(element.getAttribute('data-shipping-fee'));
    currentShippingFee = shippingFee;
    
    // Update shipping fee display
    const shippingFeeElement = document.getElementById('shippingFee');
    if (shippingFee === 0) {
        shippingFeeElement.textContent = 'Miễn phí';
        shippingFeeElement.classList.add('shipping-fee');
    } else {
        shippingFeeElement.textContent = formatPrice(shippingFee);
        shippingFeeElement.classList.remove('shipping-fee');
    }
    
    // Update total price
    updateTotalPrice();
}

// Update total price calculation
function updateTotalPrice() {
    const quantity = parseInt(document.getElementById('quantity').value) || 1;
    currentQuantity = quantity;
    
    const productTotal = baseProductPrice * quantity;
    const totalPrice = productTotal + currentShippingFee;
    
    // Update product price
    document.getElementById('productPrice').textContent = formatPrice(productTotal);
    
    // Update total price
    document.getElementById('totalPrice').textContent = formatPrice(totalPrice);
}

// Format price with thousand separator
function formatPrice(price) {
    return new Intl.NumberFormat('vi-VN', {
        style: 'currency',
        currency: 'VND'
    }).format(price);
}

// Override quantity functions to update price
function increaseQuantity() {
    const quantityInput = document.getElementById('quantity');
    const max = parseInt(quantityInput.max);
    const current = parseInt(quantityInput.value);
    if (current < max) {
        quantityInput.value = current + 1;
        updateTotalPrice();
    }
}

function decreaseQuantity() {
    const quantityInput = document.getElementById('quantity');
    const current = parseInt(quantityInput.value);
    if (current > 1) {
        quantityInput.value = current - 1;
        updateTotalPrice();
    }
}

function toggleWishlist() {
    const btn = document.querySelector('.wishlist-btn-modern');
    const icon = btn.querySelector('i');
    
    btn.classList.toggle('active');
    if (btn.classList.contains('active')) {
        icon.className = 'fa fa-heart';
        btn.querySelector('span').textContent = 'Đã thích';
    } else {
        icon.className = 'fa fa-heart-o';
        btn.querySelector('span').textContent = 'Yêu thích';
    }
}

function buyNow() {
    const form = document.querySelector('.cart-form-modern');
    const quantity = document.getElementById('quantity').value;
    window.location.href = `${form.action}?quantity=${quantity}`;
}

function openImageModal() {
    const modal = document.getElementById('imageModal');
    const modalImg = document.getElementById('modalImage');
    const mainImg = document.getElementById('mainProductImage');
    
    modal.style.display = 'block';
    modalImg.src = mainImg.src;
}

function closeImageModal() {
    document.getElementById('imageModal').style.display = 'none';
}

function nextModalImage() {
    nextImage();
    document.getElementById('modalImage').src = productImages[currentImageIndex];
}

function previousModalImage() {
    previousImage();
    document.getElementById('modalImage').src = productImages[currentImageIndex];
}

function copyProductLink() {
    const url = window.location.href;
    navigator.clipboard.writeText(url).then(() => {
        if (typeof Swal !== 'undefined') {
            Swal.fire({
                icon: 'success',
                title: 'Đã sao chép link!',
                showConfirmButton: false,
                timer: 1500,
                toast: true,
                position: 'top-end'
            });
        } else {
            alert('Đã sao chép link sản phẩm!');
        }
    });
}

document.addEventListener('DOMContentLoaded', function() {
    // Tab functionality
    const tabButtons = document.querySelectorAll('.tab-btn');
    const tabPanes = document.querySelectorAll('.tab-pane');
    
    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            const targetTab = this.getAttribute('data-tab');
            
            tabButtons.forEach(btn => btn.classList.remove('active'));
            tabPanes.forEach(pane => pane.classList.remove('active'));
            
            this.classList.add('active');
            document.getElementById(targetTab).classList.add('active');
        });
    });
    
    // Modal close on outside click
    window.onclick = function(event) {
        const modal = document.getElementById('imageModal');
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    }
    
    // Smooth image transitions
    const mainImg = document.getElementById('mainProductImage');
    if (mainImg) {
        mainImg.style.transition = 'opacity 0.3s ease';
    }
    
    // Keyboard navigation for images
    document.addEventListener('keydown', function(e) {
        const modal = document.getElementById('imageModal');
        if (modal.style.display === 'block') {
            if (e.key === 'ArrowLeft') {
                previousModalImage();
            } else if (e.key === 'ArrowRight') {
                nextModalImage();
            } else if (e.key === 'Escape') {
                closeImageModal();
            }
        }
    });
    
    // Initialize price calculation
    updateTotalPrice();
    
    // Listen for quantity input changes
    const quantityInput = document.getElementById('quantity');
    if (quantityInput) {
        quantityInput.addEventListener('change', function() {
            updateTotalPrice();
        });
        
        quantityInput.addEventListener('input', function() {
            updateTotalPrice();
        });
    }
    
    // Update total when page loads
    setTimeout(() => {
        updateTotalPrice();
    }, 100);
});

function scrollCarousel(direction) {
    const carousel = document.getElementById('productsCarousel');
    const cardWidth = 304;
    const scrollAmount = cardWidth * 2;
    
    if (direction === 'prev') {
        carousel.scrollLeft -= scrollAmount;
    } else {
        carousel.scrollLeft += scrollAmount;
    }
}

function addToCart(productId) {
    fetch(`/cart/add/${productId}`, {
        method: 'GET',
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success || data) {
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    icon: 'success',
                    title: 'Đã thêm vào giỏ hàng!',
                    showConfirmButton: false,
                    timer: 1500,
                    toast: true,
                    position: 'top-end'
                });
            } else {
                alert('Đã thêm sản phẩm vào giỏ hàng!');
            }
        }
    })
    .catch(error => {
        console.error('Error:', error);
        window.location.href = `/cart/add/${productId}`;
    });
}

function quickView(productId) {
    console.log('Quick view:', productId);
}

function addToWishlist(productId) {
    console.log('Add to wishlist:', productId);
}

function compareProduct(productId) {
    console.log('Compare product:', productId);
}

function selectDeliveryMethod() {
    const methods = document.querySelectorAll('.delivery-method-card');
    methods.forEach(method => {
        method.addEventListener('click', function() {
            methods.forEach(m => m.classList.remove('active'));
            this.classList.add('active');
        });
    });
}
</script>

@endsection
