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
                    <li class="breadcrumb-item active">Giỏ hàng</li>
                </ol>
            </nav>
            <h1 class="page-title">Giỏ hàng của bạn</h1>
            <p class="page-subtitle">Kiểm tra và quản lý các sản phẩm trong giỏ hàng</p>
        </div>
    </div>
</section>

@if (!empty(session('cart')))
<!-- Cart Content -->
<section class="cart-modern">
    <div class="container">
        <div class="cart-header">
            <div class="cart-stats">
                <div class="stat-item">
                    <span class="stat-number">{{count(session('cart'))}}</span>
                    <span class="stat-label">Sản phẩm</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">{{convertPrice(session('total_price'))}}</span>
                    <span class="stat-label">Tổng tiền</span>
                </div>
            </div>
            <div class="cart-actions-header">
                <button class="btn-select-all" onclick="selectAllItems()">
                    <i class="fa fa-check"></i>
                    <span>Chọn tất cả</span>
                </button>
                <button class="btn-clear-cart" onclick="clearCart()">
                    <i class="fa fa-trash"></i>
                    <span>Xóa tất cả</span>
                </button>
            </div>
        </div>

        <div class="row">
            <!-- Cart Items -->
            <div class="col-lg-8">
                <div class="cart-items-container">
                    <div class="cart-table-header">
                        <div class="header-item ">#</div>
                        <div class="header-item product-col">Sản phẩm</div>
                        <div class="header-item price-col">Đơn giá</div>
                        <div class="header-item quantity-col">Số lượng</div>
                        <div class="header-item total-col">Thành tiền</div>
                        <div class="header-item action-col">Thao tác</div>
                    </div>

                    <div class="cart-items">
                        @foreach (session('cart') as $item)
                        <div class="cart-item" data-product-id="{{$item['product_id']}}">
                            <div class="item-checkbox">
                                <input type="checkbox" id="item_{{$item['product_id']}}" class="item-select" checked onchange="updateItemSelection()">
                                <label for="item_{{$item['product_id']}}"></label>
                            </div>
                            
                            <div class="item-product">
                                <div class="product-image">
                                    <img src="{{$item['image']}}" alt="{{$item['name']}}">
                                    <div class="product-badge">
                                        <i class="fa fa-leaf"></i>
                                        <span>Tươi</span>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h4 class="product-name">{{$item['name']}}</h4>
                                    <div class="product-details">
                                        <span class="detail-item">
                                            <i class="fa fa-tag"></i>
                                            Danh mục: Rau củ tươi
                                        </span>
                                        <span class="detail-item">
                                            <i class="fa fa-weight"></i>
                                            Trọng lượng: 500g
                                        </span>
                                    </div>
                                    <div class="product-features">
                                        <span class="feature-tag">
                                            <i class="fa fa-shield"></i>
                                            An toàn
                                        </span>
                                        <span class="feature-tag">
                                            <i class="fa fa-truck"></i>
                                            Giao nhanh
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="item-price">
                                <span class="current-price">{{number_format($item['price'])}}₫</span>
                                <span class="original-price">{{number_format($item['price'] * 1.2)}}₫</span>
                            </div>

                            <div class="item-quantity">
                                <div class="quantity-controls">
                                    <button type="button" class="qty-btn minus" onclick="updateQuantity({{$item['product_id']}}, -1)">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                    <input type="number" value="{{$item['quantity']}}" class="quantity-input" id="qty_{{$item['product_id']}}" min="1" max="99" readonly>
                                    <button type="button" class="qty-btn plus" onclick="updateQuantity({{$item['product_id']}}, 1)">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                                <div class="stock-info">
                                    <span class="stock-available">Còn ... sản phẩm</span>
                                </div>
                            </div>

                            <div class="item-total">
                                <span class="total-price">{{number_format($item['price'] * $item['quantity'])}}₫</span>
                                <div class="savings">Tiết kiệm {{number_format($item['price'] * $item['quantity'] * 0.17)}}₫</div>
                            </div>

                            <div class="item-actions">
                                <button class="action-btn favorite-btn" title="Thêm vào yêu thích">
                                    <i class="fa fa-heart-o"></i>
                                </button>
                                <button class="action-btn delete-btn" onclick="confirmDelete({{$item['product_id']}})" title="Xóa khỏi giỏ hàng">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Coupon Section -->
                <div class="coupon-section">
                    <div class="coupon-header">
                        <h4>
                            <i class="fa fa-ticket"></i>
                            Mã giảm giá
                        </h4>
                        <span class="coupon-info">Nhập mã để nhận ưu đãi</span>
                    </div>
                    <form action="{{route('discount')}}" method="POST" class="coupon-form">
                        @csrf
                        <div class="coupon-input-group">
                            <div class="input-wrapper">
                                <i class="fa fa-ticket input-icon"></i>
                                <input type="text" name="discount" placeholder="Nhập mã giảm giá" class="coupon-input">
                            </div>
                            <button type="submit" class="apply-coupon-btn">
                                <span>Áp dụng</span>
                                <i class="fa fa-arrow-right"></i>
                            </button>
                        </div>
                    </form>
                    
                    @if (Session::get('discount'))
                    <div class="applied-coupon">
                        <div class="coupon-success">
                            <i class="fa fa-check-circle"></i>
                            <span>Mã giảm giá đã được áp dụng thành công!</span>
                        </div>
                        <button class="remove-coupon-btn" onclick="removeCoupon()">
                            <i class="fa fa-times"></i>
                            <span>Xóa mã</span>
                        </button>
                    </div>
                    @endif
                </div>

                <!-- Continue Shopping -->
                <div class="continue-shopping">
                    <a href="{{route('shop')}}" class="continue-btn">
                        <i class="fa fa-arrow-left"></i>
                        <span>Tiếp tục mua sắm</span>
                    </a>
                </div>
            </div>

            <!-- Cart Summary -->
            <div class="col-lg-4">
                <div class="cart-summary">
                    <div class="summary-header">
                        <h4>Tóm tắt đơn hàng</h4>
                        <span class="item-count">{{count(session('cart'))}} sản phẩm</span>
                    </div>

                    <div class="summary-content">
                        <div class="summary-line">
                            <span class="label">Tạm tính:</span>
                            <span class="value">{{convertPrice(session('total_price'))}}</span>
                        </div>

                        @if (Session::get('discount'))
                        @php
                            $latestDiscount = Session::get('discount');
                            $total = session('total_price');
                        @endphp
                        @foreach ($latestDiscount as $discount)
                        <div class="discount-applied">
                            <div class="discount-info">
                                <span class="discount-label">Mã giảm giá:</span>
                                <span class="discount-code">{{$discount['discount_code']}}</span>
                            </div>
                            @if ($discount['discount_condition'] == 1)
                            @php
                                $totalDiscount = ($total * $discount['discount_value']) / 100;
                                $total_after_discount = $total - $totalDiscount;
                                session(['total_after_discount1' => $total_after_discount]);
                            @endphp
                            <div class="discount-value">
                                <span class="discount-percent">-{{$discount['discount_value']}}%</span>
                                <span class="discount-amount">-{{number_format($totalDiscount)}}₫</span>
                            </div>
                            @endif
                            @if ($discount['discount_condition'] == 2)
                            @php
                                $total_after_discount = $total - $discount['discount_value'];
                                session(['total_after_discount2' => $total_after_discount]);
                            @endphp
                            <div class="discount-value">
                                <span class="discount-amount">-{{number_format($discount['discount_value'])}}₫</span>
                            </div>
                            @endif
                        </div>
                        @endforeach
                        @endif

                        <div class="summary-line shipping">
                            <span class="label">Phí vận chuyển:</span>
                            <span class="value free">Miễn phí</span>
                        </div>

                        <div class="summary-line tax">
                            <span class="label">VAT (0%):</span>
                            <span class="value">0₫</span>
                        </div>

                        <div class="summary-divider"></div>

                        <div class="summary-total">
                            <span class="total-label">Tổng cộng:</span>
                            <span class="total-value">
                                @if (Session::get('discount'))
                                    {{number_format($total_after_discount)}}₫
                                @else
                                    {{convertPrice(session('total_price'))}}
                                @endif
                            </span>
                        </div>

                        <div class="savings-info">
                            <i class="fa fa-gift"></i>
                            <span>Bạn tiết kiệm được {{number_format(session('total_price') * 0.17)}}₫ cho đơn hàng này!</span>
                        </div>
                    </div>

                    <div class="checkout-section">
                        <a href="{{route('checkout')}}" class="checkout-btn">
                            <i class="fa fa-credit-card"></i>
                            <span>Tiến hành thanh toán</span>
                        </a>
                        
                        <div class="payment-methods">
                            <span class="payment-label">Phương thức thanh toán:</span>
                            <div class="payment-icons">
                                <img src="/assets/frontend/img/payment/visa.png" alt="Visa">
                                <img src="/assets/frontend/img/payment/mastercard.png" alt="Mastercard">
                                <img src="/assets/frontend/img/payment/momo.png" alt="MoMo">
                                <img src="/assets/frontend/img/payment/zalopay.png" alt="ZaloPay">
                            </div>
                        </div>

                        <div class="security-badges">
                            <div class="security-item">
                                <i class="fa fa-shield"></i>
                                <span>Thanh toán an toàn</span>
                            </div>
                            <div class="security-item">
                                <i class="fa fa-truck"></i>
                                <span>Giao hàng nhanh chóng</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recommended Products -->
                <div class="recommended-products">
                    <h4 class="recommend-title">
                        <i class="fa fa-heart"></i>
                        Có thể bạn thích
                    </h4>
                    <div class="recommend-list">
                        <!-- Sample recommended products -->
                        <div class="recommend-item">
                            <div class="recommend-image">
                                <img src="{{ asset('/assets/frontend/img/no-avatar.png') }}" alt="Sản phẩm">
                            </div>
                            <div class="recommend-info">
                                <h5>Rau cải xanh hữu cơ</h5>
                                <span class="recommend-price">25.000₫</span>
                                <button class="quick-add-btn">
                                    <i class="fa fa-plus"></i>
                                    Thêm
                                </button>
                            </div>
                        </div>
                        <div class="recommend-item">
                            <div class="recommend-image">
                                <img src="{{ asset('/assets/frontend/img/no-avatar.png') }}" alt="Sản phẩm">
                            </div>
                            <div class="recommend-info">
                                <h5>Cà rót tím organic</h5>
                                <span class="recommend-price">30.000₫</span>
                                <button class="quick-add-btn">
                                    <i class="fa fa-plus"></i>
                                    Thêm
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@else
<!-- Empty Cart -->
<section class="empty-cart">
    <div class="container">
        <div class="empty-cart-content">
            <div class="empty-cart-icon">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <h2>Giỏ hàng của bạn đang trống</h2>
            <p>Hãy khám phá các sản phẩm tươi ngon và thêm vào giỏ hàng của bạn!</p>
            <div class="empty-cart-actions">
                <a href="{{route('shop')}}" class="shop-now-btn">
                    <i class="fa fa-shopping-bag"></i>
                    <span>Mua sắm ngay</span>
                </a>
            </div>
            <div class="empty-cart-features">
                <div class="feature-item">
                    <i class="fa fa-leaf"></i>
                    <span>100% Hữu cơ</span>
                </div>
                <div class="feature-item">
                    <i class="fa fa-truck"></i>
                    <span>Giao hàng nhanh</span>
                </div>
                <div class="feature-item">
                    <i class="fa fa-shield"></i>
                    <span>An toàn chất lượng</span>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

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
}

.page-title {
    font-size: 2.5rem;
    font-weight: 800;
    margin-bottom: 10px;
}

.page-subtitle {
    font-size: 1.1rem;
    opacity: 0.9;
    margin: 0;
}

/* Cart Modern */
.cart-modern {
    padding: 40px 0 60px;
    background: var(--light-color);
}

.cart-header {
    background: white;
    padding: 25px;
    border-radius: var(--border-radius-lg);
    margin-bottom: 30px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    box-shadow: var(--box-shadow);
}

.cart-stats {
    display: flex;
    gap: 40px;
}

.stat-item {
    text-align: center;
}

.stat-number {
    display: block;
    font-size: 1.8rem;
    font-weight: 800;
    color: var(--primary-color);
    line-height: 1;
}

.stat-label {
    font-size: 0.9rem;
    color: var(--text-light);
    margin-top: 4px;
}

.cart-actions-header {
    display: flex;
    gap: 15px;
}

.btn-select-all,
.btn-clear-cart {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 10px 20px;
    border-radius: var(--border-radius);
    font-weight: 600;
    cursor: pointer;
    transition: var(--transition);
    text-decoration: none;
    border: none;
}

.btn-select-all {
    background: var(--primary-color);
    color: white;
}

.btn-select-all:hover {
    background: var(--primary-dark);
    color: white;
}

.btn-clear-cart {
    background: var(--light-color);
    color: var(--text-light);
    border: 1px solid var(--border-color);
}

.btn-clear-cart:hover {
    background: var(--accent-color);
    color: white;
    border-color: var(--accent-color);
}

/* Cart Items Container */
.cart-items-container {
    background: white;
    border-radius: var(--border-radius-lg);
    box-shadow: var(--box-shadow);
    overflow: hidden;
    margin-bottom: 30px;
}

.cart-table-header {
    display: grid;
    grid-template-columns: auto 1fr 120px 100px 120px 80px;
    gap: 20px;
    align-items: center;
    padding: 20px 25px;
    background: var(--light-color);
    border-bottom: 1px solid var(--border-color);
    font-weight: 600;
    color: var(--text-dark);
}

.header-item {
    font-size: 0.9rem;
    text-align: center;
}

.product-col {
    text-align: left;
}

.cart-items {
    padding: 0;
}

.cart-item {
    display: grid;
    grid-template-columns: auto 1fr 120px 100px 120px 80px;
    gap: 20px;
    align-items: center;
    padding: 25px;
    border-bottom: 1px solid var(--border-color);
    transition: var(--transition);
}

.cart-item:hover {
    background: var(--light-color);
}

.cart-item:last-child {
    border-bottom: none;
}

.item-checkbox {
    position: relative;
}

.item-checkbox input[type="checkbox"] {
    display: none;
}

.item-checkbox label {
    width: 20px;
    height: 20px;
    border: 2px solid var(--border-color);
    border-radius: 4px;
    cursor: pointer;
    position: relative;
    transition: var(--transition);
    display: block;
}

.item-checkbox label::after {
    content: '';
    position: absolute;
    left: 5px;
    top: 2px;
    width: 6px;
    height: 10px;
    border: solid white;
    border-width: 0 2px 2px 0;
    transform: rotate(45deg);
    opacity: 0;
}

.item-checkbox input[type="checkbox"]:checked + label {
    background: var(--primary-color);
    border-color: var(--primary-color);
}

.item-checkbox input[type="checkbox"]:checked + label::after {
    opacity: 1;
}

.item-product {
    gap: 15px;
    align-items: center;
}

.product-image {
    position: relative;
    width: 80px;
    height: 80px;
    border-radius: var(--border-radius);
    overflow: hidden;
}

.product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.product-badge {
    position: absolute;
    top: 5px;
    right: 5px;
    background: var(--success-color);
    color: white;
    padding: 2px 6px;
    border-radius: 10px;
    font-size: 8px;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 2px;
}

.product-info {
    flex: 1;
}

.product-name {
    font-size: 1.1rem;
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 8px;
    margin-top: 8px;
    line-height: 1.3;
}

.product-details {
    display: flex;
    flex-direction: column;
    gap: 4px;
    margin-bottom: 8px;
}

.detail-item {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 0.8rem;
    color: var(--text-light);
}

.detail-item i {
    color: var(--primary-color);
    width: 12px;
}

.product-features {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}

.feature-tag {
    display: flex;
    align-items: center;
    gap: 4px;
    background: var(--light-color);
    color: var(--text-light);
    padding: 2px 6px;
    border-radius: 8px;
    font-size: 0.7rem;
    font-weight: 500;
}

.feature-tag i {
    font-size: 0.6rem;
    color: var(--primary-color);
}

.item-price {
    text-align: center;
}

.current-price {
    display: block;
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--primary-color);
    margin-bottom: 4px;
}

.original-price {
    font-size: 0.9rem;
    color: var(--text-light);
    text-decoration: line-through;
}

.quantity-controls {
    display: flex;
    align-items: center;
    border: 1px solid var(--border-color);
    border-radius: var(--border-radius);
    overflow: hidden;
    margin-bottom: 8px;
}

.qty-btn {
    width: 32px;
    height: 32px;
    background: var(--light-color);
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: var(--transition);
    color: var(--text-dark);
}

.qty-btn:hover {
    background: var(--primary-color);
    color: white;
}

.quantity-input {
    width: 50px;
    height: 32px;
    border: none;
    text-align: center;
    font-weight: 600;
    background: white;
    color: var(--text-dark);
}

.stock-info {
    text-align: center;
}

.stock-available {
    font-size: 0.75rem;
    color: var(--success-color);
    font-weight: 500;
}

.item-total {
    text-align: center;
}

.total-price {
    display: block;
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 4px;
}

.savings {
    font-size: 0.75rem;
    color: var(--success-color);
    font-weight: 500;
}

.item-actions {
    display: flex;
    flex-direction: column;
    gap: 8px;
    align-items: center;
}

.action-btn {
    width: 32px;
    height: 32px;
    border: none;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: var(--transition);
    background: var(--light-color);
    color: var(--text-light);
}

.favorite-btn:hover {
    background: var(--accent-color);
    color: white;
}

.delete-btn:hover {
    background: var(--accent-color);
    color: white;
}

/* Coupon Section */
.coupon-section {
    background: white;
    border-radius: var(--border-radius-lg);
    padding: 25px;
    margin-bottom: 30px;
    box-shadow: var(--box-shadow);
}

.coupon-header {
    margin-bottom: 20px;
}

.coupon-header h4 {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 5px;
    color: var(--text-dark);
    font-weight: 600;
}

.coupon-header i {
    color: var(--secondary-color);
}

.coupon-info {
    color: var(--text-light);
    font-size: 0.9rem;
}

.coupon-input-group {
    display: flex;
    gap: 15px;
    align-items: stretch;
}

.input-wrapper {
    flex: 1;
    position: relative;
}

.input-icon {
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-light);
    font-size: 1rem;
}

.coupon-input {
    width: 100%;
    padding: 12px 15px 12px 45px;
    border: 1px solid var(--border-color);
    border-radius: var(--border-radius);
    font-size: 1rem;
    transition: var(--transition);
}

.coupon-input:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
}

.apply-coupon-btn {
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

.apply-coupon-btn:hover {
    background: var(--primary-dark);
}

.applied-coupon {
    margin-top: 15px;
    padding: 15px;
    background: rgba(34, 197, 94, 0.1);
    border: 1px solid rgba(34, 197, 94, 0.2);
    border-radius: var(--border-radius);
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.coupon-success {
    display: flex;
    align-items: center;
    gap: 10px;
    color: var(--success-color);
    font-weight: 500;
}

.remove-coupon-btn {
    background: none;
    border: none;
    color: var(--accent-color);
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 5px;
    font-weight: 500;
    transition: var(--transition);
}

.remove-coupon-btn:hover {
    color: #dc2626;
}

/* Continue Shopping */
.continue-shopping {
    margin-bottom: 30px;
}

.continue-btn {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 600;
    transition: var(--transition);
}

.continue-btn:hover {
    color: var(--primary-dark);
}

/* Cart Summary */
.cart-summary {
    background: white;
    border-radius: var(--border-radius-lg);
    box-shadow: var(--box-shadow);
    position: sticky;
    top: 20px;
    margin-bottom: 30px;
}

.summary-header {
    padding: 25px;
    border-bottom: 1px solid var(--border-color);
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.summary-header h3 {
    margin: 0;
    color: var(--text-dark);
    font-weight: 700;
}

.item-count {
    color: var(--text-light);
    font-size: 0.9rem;
}

.summary-content {
    padding: 25px;
}

.summary-line {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
    font-size: 0.95rem;
}

.label {
    color: var(--text-light);
}

.value {
    font-weight: 600;
    color: var(--text-dark);
}

.value.free {
    color: var(--success-color);
}

.discount-applied {
    background: rgba(16, 185, 129, 0.1);
    padding: 15px;
    border-radius: var(--border-radius);
    margin-bottom: 15px;
}

.discount-info {
    display: flex;
    justify-content: space-between;
    margin-bottom: 8px;
    font-size: 0.9rem;
}

.discount-code {
    color: var(--primary-color);
    font-weight: 600;
}

.discount-value {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.discount-percent {
    background: var(--primary-color);
    color: white;
    padding: 2px 6px;
    border-radius: 4px;
    font-size: 0.8rem;
    font-weight: 600;
}

.discount-amount {
    color: var(--primary-color);
    font-weight: 600;
}

.summary-divider {
    height: 1px;
    background: var(--border-color);
    margin: 20px 0;
}

.summary-total {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 0;
    margin-bottom: 15px;
}

.total-label {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--text-dark);
}

.total-value {
    font-size: 1.4rem;
    font-weight: 800;
    color: var(--primary-color);
}

.savings-info {
    display: flex;
    align-items: center;
    gap: 8px;
    background: rgba(34, 197, 94, 0.1);
    color: var(--success-color);
    padding: 10px;
    border-radius: var(--border-radius);
    font-size: 0.9rem;
    font-weight: 500;
}

/* Checkout Section */
.checkout-section {
    padding: 25px;
    border-top: 1px solid var(--border-color);
}

.checkout-btn {
    width: 100%;
    background: var(--primary-color);
    color: white;
    padding: 15px;
    border-radius: var(--border-radius);
    font-weight: 700;
    font-size: 1.1rem;
    text-decoration: none;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    transition: var(--transition);
    margin-bottom: 20px;
}

.checkout-btn:hover {
    background: var(--primary-dark);
    color: white;
    transform: translateY(-2px);
}

.payment-methods {
    text-align: center;
    margin-bottom: 20px;
}

.payment-label {
    display: block;
    color: var(--text-light);
    font-size: 0.85rem;
    margin-bottom: 10px;
}

.payment-icons {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
}

.payment-icons img {
    height: 25px;
    filter: grayscale(1);
    transition: var(--transition);
}

.payment-icons img:hover {
    filter: grayscale(0);
}

.security-badges {
    display: flex;
    justify-content: space-around;
    gap: 10px;
}

.security-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 5px;
    text-align: center;
}

.security-item i {
    color: var(--primary-color);
    font-size: 1.2rem;
}

.security-item span {
    font-size: 0.8rem;
    color: var(--text-light);
}

/* Recommended Products */
.recommended-products {
    background: white;
    border-radius: var(--border-radius-lg);
    box-shadow: var(--box-shadow);
    padding: 20px;
}

.recommend-title {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 20px;
    color: var(--text-dark);
    font-weight: 600;
}

.recommend-title i {
    color: var(--accent-color);
}

.recommend-list {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.recommend-item {
    display: flex;
    gap: 12px;
    align-items: center;
    padding: 10px;
    border: 1px solid var(--border-color);
    border-radius: var(--border-radius);
    transition: var(--transition);
}

.recommend-item:hover {
    box-shadow: var(--box-shadow);
}

.recommend-image {
    width: 60px;
    height: 60px;
    border-radius: var(--border-radius);
    overflow: hidden;
}

.recommend-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.recommend-info {
    flex: 1;
}

.recommend-info h5 {
    font-size: 0.9rem;
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 4px;
    line-height: 1.3;
}

.recommend-price {
    color: var(--primary-color);
    font-weight: 700;
    font-size: 0.9rem;
}

.quick-add-btn {
    background: var(--primary-color);
    color: white;
    border: none;
    padding: 6px 12px;
    border-radius: var(--border-radius);
    font-size: 0.8rem;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 4px;
    transition: var(--transition);
}

.quick-add-btn:hover {
    background: var(--primary-dark);
}

/* Empty Cart */
.empty-cart {
    padding: 80px 0;
    background: var(--light-color);
}

.empty-cart-content {
    text-align: center;
    max-width: 500px;
    margin: 0 auto;
}

.empty-cart-icon {
    margin-bottom: 30px;
}

.empty-cart-icon i {
    font-size: 5rem;
    color: var(--text-light);
    opacity: 0.5;
}

.empty-cart-content h2 {
    font-size: 2rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 15px;
}

.empty-cart-content p {
    color: var(--text-light);
    font-size: 1.1rem;
    margin-bottom: 30px;
}

.shop-now-btn {
    background: var(--primary-color);
    color: white;
    padding: 15px 30px;
    border-radius: var(--border-radius);
    text-decoration: none;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    transition: var(--transition);
    font-size: 1.1rem;
}

.shop-now-btn:hover {
    background: var(--primary-dark);
    color: white;
    transform: translateY(-2px);
}

.empty-cart-features {
    display: flex;
    justify-content: center;
    gap: 40px;
    margin-top: 40px;
}

.empty-cart-features .feature-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    color: var(--text-light);
}

.empty-cart-features .feature-item i {
    font-size: 1.5rem;
    color: var(--primary-color);
}

/* Responsive Design */
@media (max-width: 1200px) {
    .cart-item {
        grid-template-columns: auto 1fr 100px 90px 100px 70px;
        gap: 15px;
    }

    .cart-table-header {
        grid-template-columns: auto 1fr 100px 90px 100px 70px;
        gap: 15px;
    }
}

@media (max-width: 992px) {
    .cart-header {
        flex-direction: column;
        gap: 20px;
        text-align: center;
    }

    .cart-stats {
        justify-content: center;
    }
}

@media (max-width: 768px) {
    .page-title {
        font-size: 2rem;
    }

    .cart-table-header {
        display: none;
    }

    .cart-item {
        display: block;
        padding: 20px;
        border-radius: var(--border-radius);
        margin-bottom: 15px;
        background: white;
    }

    .item-product {
        margin-bottom: 15px;
    }

    .product-image {
        width: 100px;
        height: 100px;
    }

    .cart-actions-header {
        flex-direction: column;
        width: 100%;
    }

    .coupon-input-group {
        flex-direction: column;
    }

    .empty-cart-features {
        flex-direction: column;
        gap: 20px;
    }
}

@media (max-width: 576px) {
    .cart-modern {
        padding: 20px 0 40px;
    }

    .cart-header,
    .cart-items-container,
    .coupon-section,
    .cart-summary {
        margin-left: -15px;
        margin-right: -15px;
        border-radius: 0;
    }
}
</style>

<script>
        function confirmDelete(id){
            Swal.fire({
                title: 'Bạn có muốn xóa sản phẩm này khỏi giỏ hàng không?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đồng ý',
                cancelButtonText: 'Hủy bỏ'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/cart/delete/' + id;
                }
            })
        }

        // Additional cart functionality
        function updateQuantity(productId, change) {
            const qtyInput = document.getElementById('qty_' + productId);
            let currentQty = parseInt(qtyInput.value);
            let newQty = currentQty + change;
            
            if (newQty >= 1 && newQty <= 99) {
                qtyInput.value = newQty;
                // Add AJAX call to update cart in backend
                updateCartQuantity(productId, newQty);
            }
        }

        function updateCartQuantity(productId, quantity) {
            // AJAX call to update cart
            fetch('/cart/update', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    product_id: productId,
                    quantity: quantity
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update total price displays
                    location.reload(); // Simple reload for now
                }
            });
        }

        function selectAllItems() {
            const checkboxes = document.querySelectorAll('.item-select');
            const allChecked = Array.from(checkboxes).every(cb => cb.checked);
            
            checkboxes.forEach(checkbox => {
                checkbox.checked = !allChecked;
            });
            
            updateItemSelection();
        }

        function updateItemSelection() {
            const checkboxes = document.querySelectorAll('.item-select');
            const checkedCount = Array.from(checkboxes).filter(cb => cb.checked).length;
            
            // Update summary based on selected items
            console.log(`${checkedCount} items selected`);
        }

        function clearCart() {
            Swal.fire({
                title: 'Xóa tất cả sản phẩm?',
                text: 'Bạn có chắc chắn muốn xóa tất cả sản phẩm khỏi giỏ hàng?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Xóa tất cả',
                cancelButtonText: 'Hủy bỏ'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/cart/clear';
                }
            });
        }

        function removeCoupon() {
            Swal.fire({
                title: 'Xóa mã giảm giá?',
                text: 'Bạn có chắc chắn muốn xóa mã giảm giá đã áp dụng?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Xóa mã',
                cancelButtonText: 'Hủy bỏ'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/cart/remove-coupon';
                }
            });
        }

        // Favorite button functionality
        document.querySelectorAll('.favorite-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const icon = this.querySelector('i');
                if (icon.classList.contains('fa-heart-o')) {
                    icon.classList.remove('fa-heart-o');
                    icon.classList.add('fa-heart');
                    this.style.background = '#ef4444';
                    this.style.color = 'white';
                } else {
                    icon.classList.remove('fa-heart');
                    icon.classList.add('fa-heart-o');
                    this.style.background = '';
                    this.style.color = '';
                }
            });
        });
    </script>

@endsection
