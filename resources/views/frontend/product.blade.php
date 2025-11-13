@extends('frontend.layout.fe')

@section('content')

<!-- Modern Breadcrumb -->
<section class="breadcrumb-modern">
    <div class="container">
        <div class="breadcrumb-content">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{route('shop')}}">Sản phẩm</a></li>
                    <li class="breadcrumb-item"><a href="#">{{$product->category->name}}</a></li>
                    <li class="breadcrumb-item active">{{$product->name}}</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- Product Detail Section -->
<section class="product-detail-modern">
    <div class="container">
        <div class="row">
            <!-- Product Gallery -->
            <div class="col-lg-6">
                <div class="product-gallery">
                    <div class="main-image-wrapper">
                        <div class="product-badges">
                            @if($product->quantity <= 5 && $product->quantity > 0)
                            <span class="badge low-stock">Sắp hết hàng</span>
                            @elseif($product->quantity <= 0)
                            <span class="badge out-stock">Hết hàng</span>
                            @endif
                            @if($product->created_at->diffInDays(now()) <= 30)
                            <span class="badge new-product">Mới</span>
                            @endif
                        </div>
                        
                        <div class="main-image">
                            <img id="mainProductImage" src="{{$product->images->first()->image}}" alt="{{$product->name}}">
                            <button class="zoom-btn" onclick="openImageModal()">
                                <i class="fa fa-search-plus"></i>
                            </button>
                        </div>
                        
                        <div class="image-navigation">
                            <button class="nav-btn prev-btn" onclick="previousImage()">
                                <i class="fa fa-chevron-left"></i>
                            </button>
                            <button class="nav-btn next-btn" onclick="nextImage()">
                                <i class="fa fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="thumbnail-gallery">
                        @foreach ($product->images as $index => $image)
                        <div class="thumbnail-item {{ $index === 0 ? 'active' : '' }}" 
                             onclick="changeMainImage('{{$image->image}}', this)">
                            <img src="{{$image->image}}" alt="{{$product->name}}">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <!-- Product Info -->
            <div class="col-lg-6">
                <div class="product-info">
                    <div class="product-meta">
                        <span class="product-category">{{$product->category->name}}</span>
                        <div class="product-rating">
                            <div class="stars">
                                @for($i = 1; $i <= 5; $i++)
                                <i class="fa fa-star {{ $i <= 4.5 ? 'active' : '' }}"></i>
                                @endfor
                            </div>
                            <span class="rating-text">(4.5)</span>
                            <span class="review-count">{{$product->sold ?? rand(10, 100)}} đánh giá</span>
                        </div>
                    </div>
                    
                    <h1 class="product-title">{{$product->name}}</h1>
                    
                    <div class="product-pricing">
                        <div class="price-main">
                            <span class="current-price">{{ convertPrice($product->price_sale) }}</span>
                            @if($product->price_sale < $product->price_sale * 1.2)
                            <span class="original-price">{{ convertPrice($product->price_sale * 1.2) }}</span>
                            <span class="discount-percent">-17%</span>
                            @endif
                        </div>
                        <div class="price-per-unit">{{ convertPrice($product->price_sale / 500) }}/100g</div>
                    </div>
                    
                    <div class="product-features">
                        <div class="feature-item">
                            <i class="fa fa-leaf"></i>
                            <span>100% Tự nhiên</span>
                        </div>
                        <div class="feature-item">
                            <i class="fa fa-truck"></i>
                            <span>Giao hàng 2-4h</span>
                        </div>
                        <div class="feature-item">
                            <i class="fa fa-shield"></i>
                            <span>An toàn thực phẩm</span>
                        </div>
                    </div>
                    
                    <form action="{{route('cart.add', $product)}}" class="add-to-cart-form">
                        <div class="quantity-selection">
                            <label class="quantity-label">Số lượng :</label>
                            <div class="quantity-controls">
                                <button type="button" class="qty-btn minus" onclick="decreaseQuantity()">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <input type="number" name="quantity" id="quantity" value="1" min="1" max="{{$product->quantity}}">
                                <button type="button" class="qty-btn plus" onclick="increaseQuantity()">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                            <span class="stock-info">{{$product->quantity}} sản phẩm có sẵn</span>
                        </div>
                        
                        <div class="action-buttons">
                            @if($product->quantity > 0)
                            <button type="submit" class="btn-add-cart">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Thêm vào giỏ hàng</span>
                            </button>
                            <button type="button" class="btn-buy-now" onclick="buyNow()">
                                <i class="fa fa-flash"></i>
                                <span>Mua ngay</span>
                            </button>
                            @else
                            <button type="button" class="btn-notify" disabled>
                                <i class="fa fa-bell"></i>
                                <span>Báo khi có hàng</span>
                            </button>
                            @endif
                            
                            <button type="button" class="btn-wishlist" onclick="toggleWishlist()">
                                <i class="fa fa-heart-o"></i>
                                <span>Yêu thích</span>
                            </button>
                        </div>
                    </form>
                    
                    <div class="product-details-list">
                        <div class="detail-item">
                            <span class="label">Mã sản phẩm :</span>
                            <span class="value">{{$product->productCode->name}}</span>
                        </div>
                        <div class="detail-item">
                            <span class="label">Tình trạng :</span>
                            <span class="value {{ $product->quantity > 0 ? 'text-success' : 'text-danger' }}">
                                {{ $product->quantity > 0 ? 'Còn hàng' : 'Hết hàng' }}
                            </span>
                        </div>
                        <div class="detail-item">
                            <span class="label">Đã bán :</span>
                            <span class="value">{{$product->sold}} sản phẩm</span>
                        </div>
                        <div class="detail-item">
                            <span class="label">Xuất xứ :</span>
                            <span class="value">{{$product->origin->name}}</span>
                        </div>
                        <div class="detail-item">
                            <span class="label">Khối lượng :</span>
                            <span class="value">{{$product->weight}}/hộp</span>
                        </div>
                    </div>
                    
                    <div class="delivery-info">
                        <h4>Thông tin giao hàng</h4>
                        <div class="delivery-options">
                            <div class="delivery-option">
                                <i class="fa fa-rocket"></i>
                                <div class="option-details">
                                    <strong>Giao hàng nhanh</strong>
                                    <span>Nhận hàng trong 2-4 giờ</span>
                                </div>
                            </div>
                            <div class="delivery-option">
                                <i class="fa fa-truck"></i>
                                <div class="option-details">
                                    <strong>Giao hàng tiêu chuẩn</strong>
                                    <span>Miễn phí với đơn từ 500.000₫</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="social-share">
                        <span class="share-label">Chia sẻ:</span>
                        <div class="share-buttons">
                            <a href="#" class="share-btn facebook">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="#" class="share-btn twitter">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="#" class="share-btn instagram">
                                <i class="fa fa-instagram"></i>
                            </a>
                            <a href="#" class="share-btn whatsapp">
                                <i class="fa fa-whatsapp"></i>
                            </a>
                        </div>
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
                                        <label for="star5"><i class="fas fa-star"></i></label>
                                        <input type="radio" name="rating" value="4" id="star4">
                                        <label for="star4"><i class="fas fa-star"></i></label>
                                        <input type="radio" name="rating" value="3" id="star3">
                                        <label for="star3"><i class="fas fa-star"></i></label>
                                        <input type="radio" name="rating" value="2" id="star2">
                                        <label for="star2"><i class="fas fa-star"></i></label>
                                        <input type="radio" name="rating" value="1" id="star1">
                                        <label for="star1"><i class="fas fa-star"></i></label>
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
                                            <i class="fas fa-star {{ $i <= 4 ? 'active' : '' }}"></i>
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

<!-- Related Products -->
<section class="related-products-modern">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Sản phẩm tương tự</h2>
            <p class="section-subtitle">Khám phá những sản phẩm khác trong cùng danh mục</p>
        </div>
        
        <div class="products-carousel-wrapper">
            <div class="carousel-controls">
                <button class="carousel-btn prev-btn" onclick="scrollCarousel('prev')">
                    <i class="fa fa-chevron-left"></i>
                </button>
                <button class="carousel-btn next-btn" onclick="scrollCarousel('next')">
                    <i class="fa fa-chevron-right"></i>
                </button>
            </div>
            
            <div class="products-carousel" id="productsCarousel">
                @foreach($relatedProducts as $relatedProduct)
                <div class="product-card-carousel">
                    <div class="product-image">
                        <img src="{{$relatedProduct->images->first()->image}}" alt="{{$relatedProduct->name}}">
                        <div class="product-overlay">
                            <div class="product-actions">
                                <a href="{{route('product', [$relatedProduct, Str::slug($relatedProduct->name)])}}" class="action-btn" title="Xem chi tiết">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{route('cart.add', $relatedProduct)}}" class="action-btn" title="Thêm vào giỏ">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                                <button class="action-btn wishlist-btn" title="Yêu thích">
                                    <i class="fa fa-heart-o"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="product-category">{{$relatedProduct->category->name}}</div>
                        <h4 class="product-name">
                            <a href="{{route('product', [$relatedProduct, Str::slug($relatedProduct->name)])}}">{{$relatedProduct->name}}</a>
                        </h4>
                        <div class="product-rating">
                            @for($i = 1; $i <= 5; $i++)
                            <i class="fa fa-star {{ $i <= 4 ? 'active' : '' }}"></i>
                            @endfor
                            <span class="rating-count">({{rand(10, 50)}})</span>
                        </div>
                        <div class="product-price">
                            <span class="current-price">{{ convertPrice($relatedProduct->price_sale) }}</span>
                            @if($relatedProduct->price_sale < $relatedProduct->price_sale * 1.2)
                            <span class="original-price">{{ convertPrice($relatedProduct->price_sale * 1.2) }}</span>
                            @endif
                        </div>
                        <button class="quick-add-btn" onclick="addToCart({{$relatedProduct->id}})">
                            <i class="fa fa-shopping-cart"></i>
                            <span>Thêm vào giỏ</span>
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Image Modal -->
<div id="imageModal" class="image-modal">
    <span class="close-modal" onclick="closeImageModal()">&times;</span>
    <img class="modal-content" id="modalImage">
    <div class="modal-navigation">
        <button class="modal-nav-btn prev" onclick="previousModalImage()">
            <i class="fa fa-chevron-left"></i>
        </button>
        <button class="modal-nav-btn next" onclick="nextModalImage()">
            <i class="fa fa-chevron-right"></i>
        </button>
    </div>
</div>

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
    --box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    --box-shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    --border-radius: 8px;
    --border-radius-lg: 12px;
    --transition: all 0.3s ease;
}

/* Breadcrumb */
.breadcrumb-modern {
    background: var(--light-color);
    padding: 20px 0;
    border-bottom: 1px solid var(--border-color);
}

.breadcrumb {
    background: none;
    padding: 0;
    margin: 0;
}

.breadcrumb-item + .breadcrumb-item::before {
    content: "/";
    color: var(--text-light);
}

.breadcrumb-item a {
    color: var(--text-dark);
    text-decoration: none;
    transition: var(--transition);
}

.breadcrumb-item a:hover {
    color: var(--primary-color);
}

.breadcrumb-item.active {
    color: var(--text-light);
}

/* Product Detail */
.product-detail-modern {
    padding: 60px 0;
    background: var(--white);
}

/* Product Gallery */
.product-gallery {
    position: sticky;
    top: 20px;
}

.main-image-wrapper {
    position: relative;
    margin-bottom: 20px;
    border-radius: var(--border-radius-lg);
    overflow: hidden;
    box-shadow: var(--box-shadow-lg);
}

.product-badges {
    position: absolute;
    top: 15px;
    left: 15px;
    z-index: 10;
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.badge {
    padding: 6px 12px;
    border-radius: 15px;
    font-size: 12px;
    font-weight: 600;
    color: white;
}

.badge.low-stock {
    background: var(--secondary-color);
}

.badge.out-stock {
    background: var(--accent-color);
}

.badge.new-product {
    background: var(--primary-color);
}

.main-image {
    position: relative;
    width: 100%;
    height: 500px;
    overflow: hidden;
}

.main-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.zoom-btn {
    position: absolute;
    top: 15px;
    right: 15px;
    width: 40px;
    height: 40px;
    background: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: var(--transition);
}

.zoom-btn:hover {
    background: rgba(0, 0, 0, 0.7);
}

.image-navigation {
    position: absolute;
    top: 50%;
    left: 15px;
    right: 15px;
    transform: translateY(-50%);
    display: flex;
    justify-content: space-between;
    pointer-events: none;
}

.nav-btn {
    width: 40px;
    height: 40px;
    background: rgba(255, 255, 255, 0.8);
    border: none;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: var(--transition);
    pointer-events: all;
    opacity: 0;
}

.main-image-wrapper:hover .nav-btn {
    opacity: 1;
}

.nav-btn:hover {
    background: white;
    transform: scale(1.1);
}

.thumbnail-gallery {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(80px, 1fr));
    gap: 10px;
}

.thumbnail-item {
    width: 80px;
    height: 80px;
    border-radius: var(--border-radius);
    overflow: hidden;
    cursor: pointer;
    border: 2px solid transparent;
    transition: var(--transition);
}

.thumbnail-item.active {
    border-color: var(--primary-color);
}

.thumbnail-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.thumbnail-item:hover {
    transform: scale(1.05);
}

/* Product Info */
.product-info {
    padding: 0 20px;
}

.product-meta {
    margin-bottom: 15px;
}

.product-category {
    display: inline-block;
    background: var(--primary-color);
    color: white;
    padding: 4px 12px;
    border-radius: 15px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    margin-bottom: 10px;
}

.product-rating {
    display: flex;
    align-items: center;
    gap: 10px;
}

.stars i {
    color: #d1d5db;
    font-size: 16px;
}

.stars i.active {
    color: #fbbf24;
}

.rating-text {
    font-weight: 600;
    color: var(--text-dark);
}

.review-count {
    color: var(--text-light);
    font-size: 14px;
}

.product-title {
    font-size: 2.2rem;
    font-weight: 800;
    color: var(--dark-color);
    margin-bottom: 20px;
    line-height: 1.3;
}

.product-pricing {
    margin-bottom: 25px;
    padding: 20px;
    background: var(--light-color);
    border-radius: var(--border-radius-lg);
    border-left: 4px solid var(--primary-color);
}

.price-main {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 8px;
}

.current-price {
    font-size: 2rem;
    font-weight: 800;
    color: var(--primary-color);
}

.original-price {
    font-size: 1.2rem;
    color: var(--text-light);
    text-decoration: line-through;
}

.discount-percent {
    background: var(--accent-color);
    color: white;
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 12px;
    font-weight: 600;
}

.price-per-unit {
    color: var(--text-light);
    font-size: 14px;
}

.product-features {
    display: flex;
    gap: 20px;
    margin-bottom: 30px;
    flex-wrap: wrap;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 8px;
    color: var(--text-dark);
    font-weight: 500;
    font-size: 14px;
}

.feature-item i {
    color: var(--primary-color);
    font-size: 16px;
}

.add-to-cart-form {
    margin-bottom: 30px;
}

.quantity-selection {
    margin-bottom: 25px;
}

.quantity-label {
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 10px;
    display: block;
}

.quantity-controls {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 8px;
}

.qty-btn {
    width: 35px;
    height: 35px;
    background: var(--light-color);
    border: 1px solid var(--border-color);
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: var(--transition);
}

.qty-btn:hover {
    background: var(--primary-color);
    color: white;
    border-color: var(--primary-color);
}

#quantity {
    width: 60px;
    height: 35px;
    text-align: center;
    border: 1px solid var(--border-color);
    border-radius: var(--border-radius);
    font-weight: 600;
}

.stock-info {
    color: var(--text-light);
    font-size: 14px;
}

.action-buttons {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px;
    margin-bottom: 30px;
}

.btn-add-cart,
.btn-buy-now,
.btn-notify,
.btn-wishlist {
    padding: 15px 25px;
    border: none;
    border-radius: var(--border-radius);
    font-weight: 600;
    font-size: 16px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    transition: var(--transition);
    text-decoration: none;
}

.btn-add-cart {
    background: var(--primary-color);
    color: white;
    grid-column: 1 / -1;
}

.btn-add-cart:hover {
    background: var(--primary-dark);
    transform: translateY(-2px);
}

.btn-buy-now {
    background: var(--secondary-color);
    color: white;
}

.btn-buy-now:hover {
    background: #d97706;
}

.btn-notify {
    background: var(--text-light);
    color: white;
    cursor: not-allowed;
}

.btn-wishlist {
    background: transparent;
    color: var(--text-dark);
    border: 2px solid var(--border-color);
}

.btn-wishlist:hover,
.btn-wishlist.active {
    border-color: var(--accent-color);
    color: var(--accent-color);
}

.product-details-list {
    margin-bottom: 30px;
    background: white;
    border-radius: var(--border-radius-lg);
    overflow: hidden;
    box-shadow: var(--box-shadow);
}

.detail-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 20px;
    border-bottom: 1px solid var(--border-color);
}

.detail-item:last-child {
    border-bottom: none;
}

.detail-item .label {
    font-weight: 600;
    color: var(--text-dark);
}

.detail-item .value {
    color: var(--text-light);
}

.delivery-info {
    margin-bottom: 30px;
}

.delivery-info h4 {
    font-weight: 700;
    color: var(--dark-color);
    margin-bottom: 15px;
}

.delivery-options {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.delivery-option {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px;
    background: var(--light-color);
    border-radius: var(--border-radius);
}

.delivery-option i {
    color: var(--primary-color);
    font-size: 20px;
    width: 24px;
}

.option-details strong {
    display: block;
    color: var(--text-dark);
    margin-bottom: 5px;
}

.option-details span {
    color: var(--text-light);
    font-size: 14px;
}

.social-share {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 20px 0;
    border-top: 1px solid var(--border-color);
}

.share-label {
    font-weight: 600;
    color: var(--text-dark);
}

.share-buttons {
    display: flex;
    gap: 10px;
}

.share-btn {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-decoration: none;
    transition: var(--transition);
}

.share-btn:hover {
    transform: scale(1.1);
    color: white;
}

.share-btn.facebook { background: #3b5998; }
.share-btn.twitter { background: #1da1f2; }
.share-btn.instagram { background: #e4405f; }
.share-btn.whatsapp { background: #25d366; }

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

/* Related Products Carousel */
.related-products-modern {
    padding: 60px 0;
    background: white;
    position: relative;
}

.products-carousel-wrapper {
    position: relative;
    margin-top: 20px;
}

.carousel-controls {
    position: absolute;
    top: 50%;
    left: -25px;
    right: -25px;
    transform: translateY(-50%);
    display: flex;
    justify-content: space-between;
    z-index: 10;
    pointer-events: none;
}

.carousel-btn {
    width: 50px;
    height: 50px;
    background: white;
    border: 2px solid var(--border-color);
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    color: var(--text-dark);
    transition: var(--transition);
    box-shadow: var(--box-shadow);
    pointer-events: all;
}

.carousel-btn:hover {
    background: var(--primary-color);
    color: white;
    border-color: var(--primary-color);
    transform: scale(1.1);
}

.carousel-btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
    background: var(--light-color);
}

.carousel-btn:disabled:hover {
    transform: none;
    background: var(--light-color);
    color: var(--text-light);
}

.products-carousel {
    display: flex;
    gap: 20px;
    overflow-x: auto;
    scroll-behavior: smooth;
    padding: 20px 10px;
    scrollbar-width: none;
    -ms-overflow-style: none;
}

.products-carousel::-webkit-scrollbar {
    display: none;
}

.product-card-carousel {
    flex: 0 0 280px;
    background: white;
    border-radius: var(--border-radius-lg);
    overflow: hidden;
    box-shadow: var(--box-shadow);
    transition: var(--transition);
    border: 1px solid var(--border-color);
}

.product-card-carousel:hover {
    transform: translateY(-5px);
    box-shadow: var(--box-shadow-lg);
    border-color: var(--primary-color);
}

.product-card-carousel .product-image {
    position: relative;
    height: 220px;
    overflow: hidden;
}

.product-card-carousel .product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.product-card-carousel:hover .product-image img {
    transform: scale(1.05);
}

.product-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.6);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: var(--transition);
}

.product-card-carousel:hover .product-overlay {
    opacity: 1;
}

.product-actions {
    display: flex;
    gap: 8px;
}

.product-actions .action-btn {
    width: 40px;
    height: 40px;
    background: white;
    color: var(--text-dark);
    border: none;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: var(--transition);
    font-size: 16px;
    cursor: pointer;
}

.product-actions .action-btn:hover {
    background: var(--primary-color);
    color: white;
    transform: scale(1.1);
}

.product-card-carousel .product-info {
    padding: 20px;
}

.product-card-carousel .product-category {
    font-size: 12px;
    color: var(--primary-color);
    font-weight: 600;
    text-transform: uppercase;
    margin-bottom: 8px;
}

.product-card-carousel .product-name {
    margin-bottom: 10px;
    font-size: 16px;
}

.product-card-carousel .product-name a {
    color: var(--text-dark);
    text-decoration: none;
    font-weight: 600;
    transition: var(--transition);
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    line-height: 1.4;
}

.product-card-carousel .product-name a:hover {
    color: var(--primary-color);
}

.product-card-carousel .product-rating {
    display: flex;
    align-items: center;
    gap: 5px;
    margin-bottom: 12px;
}

.product-card-carousel .product-rating .fa {
    color: #ddd;
    font-size: 14px;
}

.product-card-carousel .product-rating .fa.active {
    color: #fbbf24;
}

.product-card-carousel .rating-count {
    font-size: 12px;
    color: var(--text-light);
    margin-left: 5px;
}

.product-card-carousel .product-price {
    margin-bottom: 15px;
}

.product-card-carousel .current-price {
    font-size: 18px;
    font-weight: 700;
    color: var(--primary-color);
}

.product-card-carousel .original-price {
    font-size: 14px;
    color: var(--text-light);
    text-decoration: line-through;
    margin-left: 8px;
}

.quick-add-btn {
    width: 100%;
    background: var(--primary-color);
    color: white;
    border: none;
    padding: 10px;
    border-radius: var(--border-radius);
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: var(--transition);
    font-size: 14px;
}

.quick-add-btn:hover {
    background: var(--primary-dark);
    transform: translateY(-1px);
}

/* Fix Icons - Updated icon definitions */
.fa:before {
    font-family: "FontAwesome" !important;
}

.fa-heart-o:before {
    content: "\f08a";
}

.fa-shopping-cart:before {
    content: "\f07a";
}

.fa-eye:before {
    content: "\f06e";
}

.fa-chevron-left:before {
    content: "\f053";
}

.fa-chevron-right:before {
    content: "\f054";
}

.fa-star:before {
    content: "\f005";
}

.fa-search-plus:before {
    content: "\f00e";
}

.fa-minus:before {
    content: "\f068";
}

.fa-plus:before {
    content: "\f067";
}

.fa-flash:before {
    content: "\f0e7";
}

.fa-bell:before {
    content: "\f0f3";
}

.fa-heart:before {
    content: "\f004";
}

.fa-truck:before {
    content: "\f0d1";
}

.fa-leaf:before {
    content: "\f06c";
}

.fa-shield:before {
    content: "\f132";
}

.fa-rocket:before {
    content: "\f135";
}

.fa-info-circle:before {
    content: "\f05a";
}

.fa-paper-plane:before {
    content: "\f1d8";
}

.fa-thumbs-up:before {
    content: "\f164";
}

.fa-comment:before {
    content: "\f075";
}

.fa-comments:before {
    content: "\f086";
}

.fa-facebook:before {
    content: "\f09a";
}

.fa-twitter:before {
    content: "\f099";
}

.fa-instagram:before {
    content: "\f16d";
}

.fa-whatsapp:before {
    content: "\f232";
}

/* Responsive */
@media (max-width: 1200px) {
    .carousel-controls {
        left: -15px;
        right: -15px;
    }
    
    .carousel-btn {
        width: 40px;
        height: 40px;
        font-size: 16px;
    }
}

@media (max-width: 768px) {
    .carousel-controls {
        display: none;
    }
    
    .product-card-carousel {
        flex: 0 0 240px;
    }
    
    .products-carousel {
        padding: 10px 5px;
        gap: 15px;
    }
    
    .product-card-carousel .product-image {
        height: 180px;
    }
    
    .product-card-carousel .product-info {
        padding: 15px;
    }
    
    .product-title {
        font-size: 1.8rem;
    }
    
    .action-buttons {
        grid-template-columns: 1fr;
    }
    
    .btn-add-cart {
        grid-column: 1;
    }
    
    .quantity-controls {
        justify-content: center;
    }
    
    .tab-header {
        flex-direction: column;
    }
    
    .product-features {
        flex-direction: column;
        gap: 10px;
    }
    
    .social-share {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
    }
    
    .main-image {
        height: 300px;
    }
}

@media (max-width: 576px) {
    .product-info {
        padding: 0 10px;
    }
    
    .tab-content {
        padding: 20px;
    }
    
    .comment-form-wrapper {
        padding: 20px;
    }
    
    .product-card-carousel {
        flex: 0 0 200px;
    }
    
    .product-card-carousel .product-image {
        height: 150px;
    }
    
    .product-card-carousel .product-info {
        padding: 12px;
    }
    
    .product-card-carousel .current-price {
        font-size: 16px;
    }
    
    .quick-add-btn {
        padding: 8px;
        font-size: 12px;
    }
}
</style>

<script>
let currentImageIndex = 0;
const productImages = @json($product->images->pluck('image'));

function changeMainImage(imageSrc, thumbnail) {
    document.getElementById('mainProductImage').src = imageSrc;
    
    // Update active thumbnail
    document.querySelectorAll('.thumbnail-item').forEach(item => {
        item.classList.remove('active');
    });
    thumbnail.classList.add('active');
    
    // Update current index
    currentImageIndex = Array.from(document.querySelectorAll('.thumbnail-item')).indexOf(thumbnail);
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
    document.getElementById('mainProductImage').src = newImage;
    
    // Update active thumbnail
    document.querySelectorAll('.thumbnail-item').forEach((item, index) => {
        item.classList.toggle('active', index === currentImageIndex);
    });
}

function increaseQuantity() {
    const quantityInput = document.getElementById('quantity');
    const max = parseInt(quantityInput.max);
    const current = parseInt(quantityInput.value);
    if (current < max) {
        quantityInput.value = current + 1;
    }
}

function decreaseQuantity() {
    const quantityInput = document.getElementById('quantity');
    const current = parseInt(quantityInput.value);
    if (current > 1) {
        quantityInput.value = current - 1;
    }
}

function toggleWishlist() {
    const btn = document.querySelector('.btn-wishlist');
    const icon = btn.querySelector('i');
    
    btn.classList.toggle('active');
    if (btn.classList.contains('active')) {
        icon.className = 'fas fa-heart';
        btn.querySelector('span').textContent = 'Đã thích';
    } else {
        icon.className = 'far fa-heart';
        btn.querySelector('span').textContent = 'Yêu thích';
    }
}

function buyNow() {
    // Add to cart and redirect to checkout
    const form = document.querySelector('.add-to-cart-form');
    const formData = new FormData(form);
    
    fetch(form.action, {
        method: 'GET',
        // Add quantity parameter to URL
    }).then(() => {
        window.location.href = '/checkout';
    });
}

// Image Modal Functions
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

// Tab functionality
document.addEventListener('DOMContentLoaded', function() {
    const tabButtons = document.querySelectorAll('.tab-btn');
    const tabPanes = document.querySelectorAll('.tab-pane');
    
    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            const targetTab = this.getAttribute('data-tab');
            
            // Remove active class from all buttons and panes
            tabButtons.forEach(btn => btn.classList.remove('active'));
            tabPanes.forEach(pane => pane.classList.remove('active'));
            
            // Add active class to clicked button and corresponding pane
            this.classList.add('active');
            document.getElementById(targetTab).classList.add('active');
        });
    });
    
    // Close modal when clicking outside
    window.onclick = function(event) {
        const modal = document.getElementById('imageModal');
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    }
});

// Carousel functionality
function scrollCarousel(direction) {
    const carousel = document.getElementById('productsCarousel');
    const cardWidth = 300; // card width + gap
    const scrollAmount = cardWidth * 2; // scroll 2 cards at a time
    
    if (direction === 'prev') {
        carousel.scrollLeft -= scrollAmount;
    } else {
        carousel.scrollLeft += scrollAmount;
    }
    
    // Update button states
    setTimeout(() => {
        updateCarouselButtons();
    }, 300);
}

function updateCarouselButtons() {
    const carousel = document.getElementById('productsCarousel');
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');
    
    if (!carousel || !prevBtn || !nextBtn) return;
    
    const isAtStart = carousel.scrollLeft <= 0;
    const isAtEnd = carousel.scrollLeft >= carousel.scrollWidth - carousel.clientWidth - 1;
    
    prevBtn.disabled = isAtStart;
    nextBtn.disabled = isAtEnd;
}

// Add to cart function for related products
function addToCart(productId) {
    // You can customize this function based on your cart implementation
    fetch(`/cart/add/${productId}`, {
        method: 'GET',
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Show success message or update cart counter
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
        // Fallback to page redirect
        window.location.href = `/cart/add/${productId}`;
    });
}

// Initialize carousel on page load
document.addEventListener('DOMContentLoaded', function() {
    // Initialize carousel buttons
    updateCarouselButtons();
    
    // Add scroll event listener for carousel
    const carousel = document.getElementById('productsCarousel');
    if (carousel) {
        carousel.addEventListener('scroll', updateCarouselButtons);
    }
    
    // Touch/swipe support for mobile
    let isDown = false;
    let startX;
    let scrollLeft;
    
    if (carousel) {
        carousel.addEventListener('mousedown', (e) => {
            isDown = true;
            carousel.classList.add('active');
            startX = e.pageX - carousel.offsetLeft;
            scrollLeft = carousel.scrollLeft;
        });
        
        carousel.addEventListener('mouseleave', () => {
            isDown = false;
            carousel.classList.remove('active');
        });
        
        carousel.addEventListener('mouseup', () => {
            isDown = false;
            carousel.classList.remove('active');
        });
        
        carousel.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - carousel.offsetLeft;
            const walk = (x - startX) * 2;
            carousel.scrollLeft = scrollLeft - walk;
        });
    }
});
</script>

@endsection
