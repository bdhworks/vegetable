@extends('frontend.layout.fe')

@section('content')

<!-- Modern Breadcrumb -->
<section class="breadcrumb-modern">
    <div class="container">
        <div class="breadcrumb-content">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{route('cart')}}">Giỏ hàng</a></li>
                    <li class="breadcrumb-item active">Thanh toán</li>
                </ol>
            </nav>
            <h1 class="page-title">Thanh toán đơn hàng</h1>
            <p class="page-subtitle">Hoàn tất đơn hàng của bạn một cách nhanh chóng và bảo mật</p>
        </div>
    </div>
</section>

<!-- Checkout Steps -->
<section class="checkout-steps">
    <div class="container">
        <div class="steps-wrapper">
            <div class="step-item completed">
                <div class="step-number">
                    <i class="fa fa-check"></i>
                </div>
                <div class="step-info">
                    <h4>Giỏ hàng</h4>
                    <p>Xem lại sản phẩm</p>
                </div>
            </div>
            <div class="step-connector completed"></div>
            <div class="step-item active">
                <div class="step-number">2</div>
                <div class="step-info">
                    <h4>Thông tin giao hàng</h4>
                    <p>Điền thông tin nhận hàng</p>
                </div>
            </div>
            <div class="step-connector"></div>
            <div class="step-item">
                <div class="step-number">3</div>
                <div class="step-info">
                    <h4>Thanh toán</h4>
                    <p>Hoàn tất đơn hàng</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Checkout Content -->
<section class="checkout-modern">
    <div class="container">
        <form action="{{route('checkoutPost')}}" method="POST" class="checkout-form">
            @csrf
            <div class="row">
                <!-- Checkout Form -->
                <div class="col-lg-8">
                    <!-- Customer Information -->
                    <div class="checkout-section">
                        <div class="section-header">
                            <div class="section-icon">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="section-title">
                                <h3>Thông tin khách hàng</h3>
                                <p>Vui lòng điền đầy đủ thông tin để chúng tôi có thể liên hệ và giao hàng</p>
                            </div>
                        </div>

                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label">Họ và tên <span class="required">*</span></label>
                                <div class="input-wrapper">
                                    <i class="fa fa-user input-icon"></i>
                                    <input type="text" 
                                           name="name" 
                                           class="form-input"
                                           placeholder="Nhập họ và tên đầy đủ"
                                           value="{{Auth::guard('web')->user()->name}}"
                                           required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Email <span class="required">*</span></label>
                                <div class="input-wrapper">
                                    <i class="fa fa-envelope input-icon"></i>
                                    <input type="email" 
                                           name="email" 
                                           class="form-input"
                                           placeholder="Nhập địa chỉ email"
                                           value="{{Auth::guard('web')->user()->email}}"
                                           required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Số điện thoại <span class="required">*</span></label>
                                <div class="input-wrapper">
                                    <i class="fa fa-phone input-icon"></i>
                                    <input type="tel" 
                                           name="phone" 
                                           class="form-input"
                                           placeholder="Nhập số điện thoại"
                                           value="{{Auth::guard('web')->user()->phone}}"
                                           required>
                                </div>
                            </div>

                            <div class="form-group full-width">
                                <label class="form-label">Địa chỉ giao hàng <span class="required">*</span></label>
                                <div class="input-wrapper">
                                    <i class="fa fa-map-marker input-icon"></i>
                                    <input type="text" 
                                           name="address" 
                                           class="form-input"
                                           placeholder="Nhập địa chỉ chi tiết (số nhà, tên đường, phường/xã, quận/huyện, tỉnh/thành phố)"
                                           value="{{Auth::guard('web')->user()->address}}"
                                           required>
                                </div>
                            </div>

                            <div class="form-group full-width">
                                <label class="form-label">Ghi chú đơn hàng</label>
                                <div class="input-wrapper">
                                    <i class="fa fa-edit input-icon"></i>
                                    <textarea name="note" 
                                              class="form-textarea"
                                              rows="3"
                                              placeholder="Ghi chú thêm về đơn hàng (tùy chọn)"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Delivery Options -->
                    <div class="checkout-section">
                        <div class="section-header">
                            <div class="section-icon">
                                <i class="fa fa-truck"></i>
                            </div>
                            <div class="section-title">
                                <h3>Phương thức giao hàng</h3>
                                <p>Chọn phương thức giao hàng phù hợp với bạn</p>
                            </div>
                        </div>

                        <div class="delivery-options">
                            <div class="delivery-option">
                                <input type="radio" name="delivery" id="standard" value="standard" checked>
                                <label for="standard" class="delivery-label">
                                    <div class="delivery-icon">
                                        <i class="fa fa-truck"></i>
                                    </div>
                                    <div class="delivery-info">
                                        <h4>Giao hàng tiêu chuẩn</h4>
                                        <p>Giao hàng trong 2-3 ngày làm việc</p>
                                        <span class="delivery-price">Miễn phí</span>
                                    </div>
                                </label>
                            </div>

                            <div class="delivery-option">
                                <input type="radio" name="delivery" id="express" value="express">
                                <label for="express" class="delivery-label">
                                    <div class="delivery-icon">
                                        <i class="fa fa-truck"></i>
                                    </div>
                                    <div class="delivery-info">
                                        <h4>Giao hàng nhanh</h4>
                                        <p>Giao hàng trong 2-4 giờ</p>
                                        <span class="delivery-price">30.000₫</span>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Methods -->
                    <div class="checkout-section">
                        <div class="section-header">
                            <div class="section-icon">
                                <i class="fa fa-credit-card"></i>
                            </div>
                            <div class="section-title">
                                <h3>Phương thức thanh toán</h3>
                                <p>Chọn phương thức thanh toán thuận tiện cho bạn</p>
                            </div>
                        </div>

                        <div class="payment-methods">
                            <div class="payment-option">
                                <input type="radio" name="payment" id="vnpay" value="1">
                                <label for="vnpay" class="payment-label">
                                    <div class="payment-icon">
                                        <img src="{{asset('assets/frontend/img/vnpay.png')}}" alt="VNPay" class="payment-logo">
                                    </div>
                                    <div class="payment-info">
                                        <h4>VNPay</h4>
                                        <p>Thanh toán qua ví điện tử VNPay</p>
                                        <div class="payment-badges">
                                            <span class="badge">An toàn</span>
                                            <span class="badge">Nhanh chóng</span>
                                        </div>
                                    </div>
                                </label>
                            </div>

                            <div class="payment-option">
                                <input type="radio" name="payment" id="cod" value="2" checked>
                                <label for="cod" class="payment-label">
                                    <div class="payment-icon">
                                        <i class="fa fa-money"></i>
                                    </div>
                                    <div class="payment-info">
                                        <h4>Thanh toán khi nhận hàng (COD)</h4>
                                        <p>Thanh toán bằng tiền mặt khi nhận hàng</p>
                                        <div class="payment-badges">
                                            <span class="badge">Phổ biến</span>
                                            <span class="badge">Tin cậy</span>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="col-lg-4">
                    <div class="order-summary">
                        <div class="summary-header">
                            <h3>Tóm tắt đơn hàng</h3>
                            <span class="item-count">{{count(session('cart'))}} sản phẩm</span>
                        </div>

                        <div class="order-items">
                            @foreach (session('cart') as $item)
                            <div class="order-item">
                                <div class="item-image">
                                    <img src="{{$item['image']}}" alt="{{$item['name']}}">
                                    <span class="item-quantity">{{$item['quantity']}}</span>
                                </div>
                                <div class="item-details">
                                    <h4 class="item-name">{{$item['name']}}</h4>
                                    <div class="item-price">
                                        <span class="unit-price">{{convertPrice($item['price'])}}</span>
                                        <span class="total-price">{{convertPrice($item['price'] * $item['quantity'])}}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="order-calculations">
                            <div class="calc-line">
                                <span class="calc-label">Tạm tính:</span>
                                <span class="calc-value">{{convertPrice(session('total_price'))}}</span>
                            </div>

                            @if (Session::get('discount'))
                            @php
                                $latestDiscount = Session::get('discount');
                                $total = session('total_price');
                            @endphp
                            @foreach ($latestDiscount as $discount)
                            <div class="discount-applied">
                                <div class="discount-header">
                                    <span class="discount-label">Mã giảm giá:</span>
                                    <span class="discount-code">{{$discount['discount_code']}}</span>
                                </div>
                                @if ($discount['discount_condition'] == 1)
                                @php
                                    $totalDiscount = ($total * $discount['discount_value']) / 100;
                                    $total_after_discount = $total - $totalDiscount;
                                @endphp
                                <div class="discount-value">
                                    <span class="discount-percent">-{{$discount['discount_value']}}%</span>
                                    <span class="discount-amount">-{{number_format($totalDiscount)}}₫</span>
                                </div>
                                @endif
                                @if ($discount['discount_condition'] == 2)
                                @php
                                    $total_after_discount = $total - $discount['discount_value'];
                                @endphp
                                <div class="discount-value">
                                    <span class="discount-amount">-{{number_format($discount['discount_value'])}}₫</span>
                                </div>
                                @endif
                            </div>
                            @endforeach
                            @endif

                            <div class="calc-line">
                                <span class="calc-label">Phí vận chuyển:</span>
                                <span class="calc-value shipping-fee">Miễn phí</span>
                            </div>

                            <div class="calc-line total">
                                <span class="calc-label">Tổng cộng:</span>
                                <span class="calc-value">
                                    @if (Session::get('discount'))
                                        {{number_format($total_after_discount)}}₫
                                    @else
                                        {{convertPrice(session('total_price'))}}
                                    @endif
                                </span>
                            </div>
                        </div>

                        <button type="submit" class="checkout-btn">
                            <i class="fa fa-lock"></i>
                            <span>Hoàn tất đặt hàng</span>
                        </button>

                        <div class="security-info">
                            <div class="security-item">
                                <i class="fa fa-shield"></i>
                                <span>Thanh toán an toàn & bảo mật</span>
                            </div>
                            <div class="security-item">
                                <i class="fa fa-undo"></i>
                                <span>Đổi trả miễn phí trong 7 ngày</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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

/* Checkout Steps */
.checkout-steps {
    background: white;
    padding: 40px 0;
    border-bottom: 1px solid var(--border-color);
}

.steps-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    max-width: 600px;
    margin: 0 auto;
}

.step-item {
    display: flex;
    align-items: center;
    gap: 15px;
    opacity: 0.5;
    transition: var(--transition);
}

.step-item.active,
.step-item.completed {
    opacity: 1;
}

.step-number {
    width: 50px;
    height: 50px;
    border: 2px solid var(--border-color);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    color: var(--text-light);
    transition: var(--transition);
}

.step-item.active .step-number {
    background: var(--primary-color);
    border-color: var(--primary-color);
    color: white;
}

.step-item.completed .step-number {
    background: var(--success-color);
    border-color: var(--success-color);
    color: white;
}

.step-info h4 {
    font-size: 1rem;
    font-weight: 600;
    margin-bottom: 4px;
    color: var(--text-dark);
}

.step-info p {
    font-size: 0.85rem;
    color: var(--text-light);
    margin: 0;
}

.step-connector {
    width: 80px;
    height: 2px;
    background: var(--border-color);
    margin: 0 20px;
    transition: var(--transition);
}

.step-connector.completed {
    background: var(--success-color);
}

/* Checkout Modern */
.checkout-modern {
    background: var(--light-color);
    padding: 40px 0 60px;
}

.checkout-section {
    background: white;
    border-radius: var(--border-radius-lg);
    padding: 30px;
    margin-bottom: 30px;
    box-shadow: var(--box-shadow);
}

.section-header {
    display: flex;
    align-items: flex-start;
    gap: 15px;
    margin-bottom: 25px;
    padding-bottom: 20px;
    border-bottom: 1px solid var(--border-color);
}

.section-icon {
    width: 45px;
    height: 45px;
    background: var(--primary-color);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2rem;
    flex-shrink: 0;
}

.section-title h3 {
    font-size: 1.4rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 5px;
}

.section-title p {
    color: var(--text-light);
    margin: 0;
    font-size: 0.95rem;
}

/* Form Styles */
.form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.form-group.full-width {
    grid-column: 1 / -1;
}

.form-label {
    display: block;
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 8px;
    font-size: 0.95rem;
}

.required {
    color: var(--accent-color);
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

.form-input,
.form-textarea {
    width: 100%;
    padding: 15px 20px 15px 50px;
    border: 2px solid var(--border-color);
    border-radius: var(--border-radius);
    font-size: 1rem;
    transition: var(--transition);
    background: white;
    box-sizing: border-box;
}

.form-textarea {
    resize: vertical;
    font-family: inherit;
}

.form-input:focus,
.form-textarea:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
}

/* Delivery Options */
.delivery-options {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.delivery-option {
    position: relative;
}

.delivery-option input[type="radio"] {
    display: none;
}

.delivery-label {
    display: flex;
    align-items: center;
    gap: 20px;
    padding: 20px;
    border: 2px solid var(--border-color);
    border-radius: var(--border-radius);
    cursor: pointer;
    transition: var(--transition);
}

.delivery-option input[type="radio"]:checked + .delivery-label {
    border-color: var(--primary-color);
    background: rgba(16, 185, 129, 0.05);
}

.delivery-icon {
    width: 50px;
    height: 50px;
    background: var(--light-color);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.3rem;
    color: var(--text-light);
    transition: var(--transition);
}

.delivery-option input[type="radio"]:checked + .delivery-label .delivery-icon {
    background: var(--primary-color);
    color: white;
}

.delivery-info h4 {
    font-size: 1.1rem;
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 5px;
}

.delivery-info p {
    color: var(--text-light);
    font-size: 0.9rem;
    margin-bottom: 8px;
}

.delivery-price {
    font-weight: 700;
    color: var(--primary-color);
}

/* Payment Methods */
.payment-methods {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.payment-option {
    position: relative;
}

.payment-option input[type="radio"] {
    display: none;
}

.payment-label {
    display: flex;
    align-items: center;
    gap: 20px;
    padding: 20px;
    border: 2px solid var(--border-color);
    border-radius: var(--border-radius);
    cursor: pointer;
    transition: var(--transition);
}

.payment-option input[type="radio"]:checked + .payment-label {
    border-color: var(--primary-color);
    background: rgba(16, 185, 129, 0.05);
}

.payment-icon {
    width: 60px;
    height: 50px;
    background: var(--light-color);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.payment-logo {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
    border-radius: 4px;
}

.payment-icon i {
    font-size: 1.5rem;
    color: var(--text-light);
}

.payment-info h4 {
    font-size: 1.1rem;
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 5px;
}

.payment-info p {
    color: var(--text-light);
    font-size: 0.9rem;
    margin-bottom: 10px;
}

.payment-badges {
    display: flex;
    gap: 8px;
}

.badge {
    background: var(--primary-color);
    color: white;
    padding: 2px 8px;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 500;
}

/* Order Summary */
.order-summary {
    background: white;
    border-radius: var(--border-radius-lg);
    box-shadow: var(--box-shadow);
    position: sticky;
    top: 20px;
}

.summary-header {
    padding: 25px;
    border-bottom: 1px solid var(--border-color);
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.summary-header h3 {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--text-dark);
    margin: 0;
}

.item-count {
    color: var(--text-light);
    font-size: 0.9rem;
}

.order-items {
    padding: 25px;
    border-bottom: 1px solid var(--border-color);
    max-height: 400px;
    overflow-y: auto;
}

.order-item {
    display: flex;
    gap: 15px;
    margin-bottom: 20px;
}

.order-item:last-child {
    margin-bottom: 0;
}

.item-image {
    position: relative;
    width: 60px;
    height: 60px;
    border-radius: var(--border-radius);
    overflow: hidden;
    flex-shrink: 0;
}

.item-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.item-quantity {
    position: absolute;
    top: -8px;
    right: -8px;
    background: var(--primary-color);
    color: white;
    width: 22px;
    height: 22px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.75rem;
    font-weight: 600;
}

.item-details {
    flex: 1;
}

.item-name {
    font-size: 0.95rem;
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 8px;
    line-height: 1.3;
}

.item-price {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.unit-price {
    font-size: 0.85rem;
    color: var(--text-light);
}

.total-price {
    font-weight: 700;
    color: var(--primary-color);
}

.order-calculations {
    padding: 25px;
}

.calc-line {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
    font-size: 0.95rem;
}

.calc-line.total {
    padding-top: 15px;
    border-top: 1px solid var(--border-color);
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--text-dark);
}

.calc-label {
    color: var(--text-light);
}

.calc-value {
    font-weight: 600;
    color: var(--text-dark);
}

.discount-applied {
    background: rgba(16, 185, 129, 0.1);
    padding: 15px;
    border-radius: var(--border-radius);
    margin-bottom: 15px;
}

.discount-header {
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

.checkout-btn {
    width: 100%;
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    color: white;
    border: none;
    padding: 18px 20px;
    border-radius: var(--border-radius);
    font-size: 1.1rem;
    font-weight: 700;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    transition: var(--transition);
    margin-bottom: 20px;
}

.checkout-btn:hover {
    transform: translateY(-2px);
    box-shadow: var(--box-shadow-lg);
}

.security-info {
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin: 10px;
}

.security-item {
    display: flex;
    align-items: center;
    gap: 8px;
    color: var(--text-light);
    font-size: 0.85rem;
}

.security-item i {
    color: var(--success-color);
    font-size: 0.9rem;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .steps-wrapper {
        flex-direction: column;
        gap: 20px;
    }

    .step-connector {
        width: 2px;
        height: 30px;
        margin: 10px 0;
    }

    .form-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .page-title {
        font-size: 2rem;
    }

    .checkout-section {
        padding: 20px;
        margin-bottom: 20px;
    }

    .section-header {
        flex-direction: column;
        gap: 15px;
        text-align: center;
    }

    .order-summary {
        margin-top: 30px;
        position: static;
    }

    .delivery-label,
    .payment-label {
        flex-direction: column;
        text-align: center;
        gap: 15px;
    }

    .order-items {
        max-height: 300px;
    }
}

@media (max-width: 576px) {
    .checkout-modern {
        padding: 20px 0 40px;
    }

    .container {
        padding: 0 15px;
    }

    .checkout-section,
    .order-summary {
        border-radius: 0;
        margin-left: -15px;
        margin-right: -15px;
    }

    .item-price {
        flex-direction: column;
        align-items: flex-start;
        gap: 5px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Update shipping fee based on delivery method
    const deliveryOptions = document.querySelectorAll('input[name="delivery"]');
    const shippingFee = document.querySelector('.shipping-fee');
    
    deliveryOptions.forEach(option => {
        option.addEventListener('change', function() {
            if (this.value === 'express') {
                shippingFee.textContent = '30.000₫';
                shippingFee.style.color = 'var(--accent-color)';
            } else {
                shippingFee.textContent = 'Miễn phí';
                shippingFee.style.color = 'var(--success-color)';
            }
        });
    });

    // Form validation
    const form = document.querySelector('.checkout-form');
    const requiredFields = form.querySelectorAll('input[required]');
    
    form.addEventListener('submit', function(e) {
        let isValid = true;
        
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                isValid = false;
                field.style.borderColor = 'var(--accent-color)';
                field.focus();
            } else {
                field.style.borderColor = 'var(--border-color)';
            }
        });
        
        // Check if payment method is selected
        const paymentMethods = document.querySelectorAll('input[name="payment"]');
        const isPaymentSelected = Array.from(paymentMethods).some(method => method.checked);
        
        if (!isPaymentSelected) {
            isValid = false;
            alert('Vui lòng chọn phương thức thanh toán');
        }
        
        if (!isValid) {
            e.preventDefault();
            return false;
        }
        
        // Show loading state
        const submitBtn = document.querySelector('.checkout-btn');
        submitBtn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> <span>Đang xử lý...</span>';
        submitBtn.disabled = true;
    });

    // Real-time validation
    requiredFields.forEach(field => {
        field.addEventListener('blur', function() {
            if (!this.value.trim()) {
                this.style.borderColor = 'var(--accent-color)';
            } else {
                this.style.borderColor = 'var(--border-color)';
            }
        });
    });

    // Phone number formatting
    const phoneInput = document.querySelector('input[name="phone"]');
    if (phoneInput) {
        phoneInput.addEventListener('input', function() {
            // Remove non-digits
            let value = this.value.replace(/\D/g, '');
            
            // Limit to 10 digits
            if (value.length > 10) {
                value = value.substring(0, 10);
            }
            
            // Format phone number
            if (value.length >= 7) {
                value = value.replace(/(\d{3})(\d{3})(\d{4})/, '$1-$2-$3');
            } else if (value.length >= 4) {
                value = value.replace(/(\d{3})(\d{3})/, '$1-$2');
            }
            
            this.value = value;
        });
    }
});
</script>

@endsection
