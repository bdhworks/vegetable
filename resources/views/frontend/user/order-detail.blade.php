@extends('frontend.layout.fe')

@section('content')
<div class="order-detail-page">
    <!-- Hero Section -->
    <div class="order-hero">
        <div class="container">
            <div class="hero-content">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="hero-text">
                            <a href="{{ route('account.orderHistory') }}" class="back-link">
                                <i class="fa fa-arrow-left me-2 mr-2"></i>
                                Quay lại
                            </a>
                            <h1 class="hero-title">Chi Tiết Đơn Hàng #{{ $order->id }}</h1>
                            <p class="hero-subtitle">
                                <i class="fa fa-calendar me-2 mr-2"></i>
                                Đặt hàng ngày {{ date_format($order->created_at, "d/m/Y - H:i") }}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <div class="order-status-badge">
                            @if($order->status == 0)
                                <span class="status-badge status-cancelled">
                                    <i class="fa fa-times-circle"></i>
                                    Đã hủy
                                </span>
                            @elseif($order->status == 1)
                                <span class="status-badge status-returned">
                                    <i class="fa fa-undo"></i>
                                    Trả hàng
                                </span>
                            @elseif($order->status == 2)
                                <span class="status-badge status-pending">
                                    <i class="fa fa-clock"></i>
                                    Chờ xác nhận
                                </span>
                            @elseif($order->status == 3)
                                <span class="status-badge status-shipping">
                                    <i class="fa fa-truck"></i>
                                    Đang giao
                                </span>
                            @else
                                <span class="status-badge status-delivered">
                                    <i class="fa fa-check-circle"></i>
                                    Đã giao
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-pattern"></div>
    </div>

    <div class="container my-5">
        <!-- Order Timeline -->
        <div class="order-timeline-card mb-4">
            <div class="timeline-header">
                <h5><i class="fa fa-route me-2"></i>Trạng Thái Đơn Hàng</h5>
            </div>
            <div class="timeline-body">
                <div class="order-timeline">
                    <div class="timeline-item {{ $order->status >= 2 ? 'active' : '' }}">
                        <div class="timeline-icon">
                            <i class="fa fa-file"></i>
                        </div>
                        <div class="timeline-content">
                            <h6>Đơn hàng đã đặt</h6>
                            <p>{{ date_format($order->created_at, "d/m/Y H:i") }}</p>
                        </div>
                    </div>
                    <div class="timeline-item {{ $order->status >= 2 ? 'active' : '' }}">
                        <div class="timeline-icon">
                            <i class="fa fa-check-circle"></i>
                        </div>
                        <div class="timeline-content">
                            <h6>Đã xác nhận</h6>
                            <p>{{ $order->status >= 2 ? 'Đã xác nhận' : 'Chờ xác nhận' }}</p>
                        </div>
                    </div>
                    <div class="timeline-item {{ $order->status >= 3 ? 'active' : '' }}">
                        <div class="timeline-icon">
                            <i class="fa fa-truck"></i>
                        </div>
                        <div class="timeline-content">
                            <h6>Đang giao hàng</h6>
                            <p>{{ $order->status >= 3 ? 'Đang vận chuyển' : 'Chưa giao' }}</p>
                        </div>
                    </div>
                    <div class="timeline-item {{ $order->status == 4 ? 'active' : '' }}">
                        <div class="timeline-icon">
                            <i class="fa fa-box"></i>
                        </div>
                        <div class="timeline-content">
                            <h6>Đã giao hàng</h6>
                            <p>{{ $order->status == 4 ? 'Hoàn thành' : 'Chưa giao' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <!-- Left Column -->
            <div class="col-lg-8">
                <!-- Shipping Information -->
                <div class="info-card mb-4">
                    <div class="info-card-header">
                        <h5><i class="fa fa-shipping-fast me-2"></i>Thông Tin Giao Hàng</h5>
                    </div>
                    <div class="info-card-body">
                        <div class="info-grid">
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <div class="info-content">
                                    <label>Người nhận</label>
                                    <p>{{ $order->name }}</p>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="info-content">
                                    <label>Số điện thoại</label>
                                    <p>{{ $order->phone }}</p>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="info-content">
                                    <label>Email</label>
                                    <p>{{ $order->email }}</p>
                                </div>
                            </div>
                            <div class="info-item full-width">
                                <div class="info-icon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <div class="info-content">
                                    <label>Địa chỉ giao hàng</label>
                                    <p>{{ $order->address }}</p>
                                </div>
                            </div>
                            @if($order->note)
                            <div class="info-item full-width">
                                <div class="info-icon">
                                    <i class="fa fa-sticky-note"></i>
                                </div>
                                <div class="info-content">
                                    <label>Ghi chú</label>
                                    <p>{{ $order->note }}</p>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Products List -->
                <div class="info-card mb-4">
                    <div class="info-card-header">
                        <h5><i class="fa fa-shopping-bag me-2 mr-2"></i>Sản Phẩm ({{ $order->products->count() }})</h5>
                    </div>
                    <div class="info-card-body p-0">
                        <div class="products-list">
                            @foreach ($order->products as $product)
                            <div class="product-item">
                                <div class="product-image">
                                    <img src="{{ $product->image ?? asset('assets/frontend/img/no-image.png') }}" alt="{{ $product->pivot->name }}">
                                </div>
                                <div class="product-info">
                                    <h6>{{ $product->pivot->name }}</h6>
                                    <p class="product-quantity">Số lượng: {{ $product->pivot->quantity }}</p>
                                </div>
                                <div class="product-price">
                                    <p class="unit-price">{{ number_format($product->pivot->price) }}đ</p>
                                    <p class="total-price">{{ number_format($product->pivot->price * $product->pivot->quantity) }}đ</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Feedback Section -->
                @if($order->status == 4)
                <div class="info-card">
                    <div class="info-card-header">
                        <h5><i class="fa fa-comment-dots me-2"></i>Đánh Giá Đơn Hàng</h5>
                    </div>
                    <div class="info-card-body">
                        @if($order->feedback)
                            <div class="feedback-display">
                                <div class="feedback-icon">
                                    <i class="fa fa-quote-left"></i>
                                </div>
                                <p>{{ $order->feedback }}</p>
                            </div>
                        @else
                            <form method="POST" action="{{ route('account.feedback', $order) }}">
                                @csrf
                                @method("PUT")
                                <div class="form-group-modern">
                                    <label>Chia sẻ trải nghiệm của bạn về đơn hàng này</label>
                                    <textarea name="feedback" class="form-control-modern" rows="5" placeholder="Nhập đánh giá của bạn..." required></textarea>
                                </div>
                                <button type="submit" class="btn btn-custom-primary mt-3">
                                    <i class="fa fa-paper-plane me-2"></i>Gửi đánh giá
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
                @endif
            </div>

            <!-- Right Column - Order Summary -->
            <div class="col-lg-4">
                <div class="order-summary-card sticky-summary">
                    <div class="summary-header">
                        <h5><i class="fa fa-receipt me-2"></i>Tóm Tắt Đơn Hàng</h5>
                    </div>
                    <div class="summary-body">
                        <div class="summary-row">
                            <span>Tạm tính</span>
                            <span>{{ number_format($order->total_price) }}đ</span>
                        </div>
                        <div class="summary-row">
                            <span>Phí vận chuyển</span>
                            <span class="text-success">Miễn phí</span>
                        </div>
                        <div class="summary-divider"></div>
                        <div class="summary-row total">
                            <span>Tổng cộng</span>
                            <span>{{ number_format($order->total_price) }}đ</span>
                        </div>
                        <div class="payment-method">
                            <label>Phương thức thanh toán</label>
                            <div class="payment-badge">
                                @if($order->payment === 1)
                                    <i class="fa fa-credit-card me-2 mr-2"></i>
                                    VNPay
                                @else
                                    <i class="fa fa-money-bill-wave me-2"></i>
                                    Tiền mặt
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="summary-actions">
                        @if($order->status == 2)
                            <form action="{{ route('order.cancel', $order) }}" method="POST" class="w-100">
                                @csrf
                                <button type="submit" class="btn btn-custom-danger w-100 mb-2" onclick="return confirm('Bạn có chắc muốn hủy đơn hàng này?')">
                                    <i class="fa fa-times me-2"></i>Hủy đơn hàng
                                </button>
                            </form>
                        @elseif($order->status == 3)
                            <form action="{{ route('order.receive', $order) }}" method="POST" class="w-100 mb-2">
                                @csrf
                                <button type="submit" class="btn btn-custom-success w-100" onclick="return confirm('Xác nhận đã nhận hàng?')">
                                    <i class="fa fa-check me-2"></i>Đã nhận hàng
                                </button>
                            </form>
                            <form action="{{ route('order.return', $order) }}" method="POST" class="w-100">
                                @csrf
                                <button type="submit" class="btn btn-custom-warning w-100" onclick="return confirm('Bạn có chắc muốn trả hàng?')">
                                    <i class="fa fa-undo me-2"></i>Yêu cầu trả hàng
                                </button>
                            </form>
                        @endif
                        <a href="{{ route('account.orderHistory') }}" class="btn btn-custom-outline w-100 mt-2">
                            <i class="fa fa-list me-2 mr-2"></i>Xem tất cả đơn hàng
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Order Detail Page Styles */
.order-detail-page {
    background: #f8f9fa;
    min-height: 100vh;
}

/* Hero Section */
.order-hero {
    background: linear-gradient(135deg, #34d399 0%, #10b981 100%);
    padding: 0;
    color: white;
    margin-bottom: 2rem;
    position: relative;
    overflow: hidden;
}

.hero-content {
    padding: 3rem 0 2rem;
    position: relative;
    z-index: 2;
}

.hero-pattern {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: 
        radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
    z-index: 1;
}

.back-link {
    color: rgba(255, 255, 255, 0.9);
    text-decoration: none;
    font-size: 0.875rem;
    display: inline-flex;
    align-items: center;
    margin-bottom: 1rem;
    transition: all 0.3s ease;
}

.back-link:hover {
    color: white;
    transform: translateX(-5px);
}

.hero-title {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.hero-subtitle {
    font-size: 1rem;
    opacity: 0.95;
    margin: 0;
    display: flex;
    align-items: center;
}

.order-status-badge {
    display: flex;
    justify-content: flex-end;
}

.status-badge {
    padding: 0.75rem 1.5rem;
    border-radius: 2rem;
    font-size: 1rem;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
}

/* Timeline */
.order-timeline-card {
    background: white;
    border-radius: 1rem;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
    overflow: hidden;
}

.timeline-header {
    padding: 1.5rem 2rem;
    border-bottom: 1px solid #e5e7eb;
}

.timeline-header h5 {
    margin: 0;
    font-size: 1.25rem;
    font-weight: 600;
    color: #1f2937;
}

.timeline-body {
    padding: 2rem;
}

.order-timeline {
    display: flex;
    justify-content: space-between;
    position: relative;
    padding: 0 1rem;
}

.order-timeline::before {
    content: '';
    position: absolute;
    top: 30px;
    left: 0;
    right: 0;
    height: 2px;
    background: #e5e7eb;
    z-index: 0;
}

.timeline-item {
    position: relative;
    text-align: center;
    flex: 1;
    z-index: 1;
}

.timeline-icon {
    width: 60px;
    height: 60px;
    background: white;
    border: 3px solid #e5e7eb;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
    font-size: 1.5rem;
    color: #9ca3af;
    transition: all 0.3s ease;
}

.timeline-item.active .timeline-icon {
    background: linear-gradient(135deg, #34d399 0%, #10b981 100%);
    border-color: #34d399;
    color: white;
}

.timeline-content h6 {
    font-size: 0.875rem;
    font-weight: 600;
    color: #4b5563;
    margin-bottom: 0.25rem;
}

.timeline-content p {
    font-size: 0.75rem;
    color: #9ca3af;
    margin: 0;
}

.timeline-item.active .timeline-content h6 {
    color: #34d399;
}

/* Info Cards */
.info-card {
    background: white;
    border-radius: 1rem;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
    overflow: hidden;
}

.info-card-header {
    padding: 1.5rem 2rem;
    border-bottom: 1px solid #e5e7eb;
}

.info-card-header h5 {
    margin: 0;
    font-size: 1.125rem;
    font-weight: 600;
    color: #1f2937;
}

.info-card-body {
    padding: 2rem;
}

.info-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1.5rem;
}

.info-item {
    display: flex;
    gap: 1rem;
}

.info-item.full-width {
    grid-column: 1 / -1;
}

.info-icon {
    width: 45px;
    height: 45px;
    background: linear-gradient(135deg, #34d399 0%, #10b981 100%);
    border-radius: 0.75rem;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.125rem;
    flex-shrink: 0;
}

.info-content {
    flex: 1;
}

.info-content label {
    font-size: 0.75rem;
    color: #6b7280;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 0.25rem;
    display: block;
}

.info-content p {
    font-size: 1rem;
    color: #1f2937;
    font-weight: 500;
    margin: 0;
}

/* Products List */
.products-list {
    display: flex;
    flex-direction: column;
}

.product-item {
    display: flex;
    align-items: center;
    gap: 1.5rem;
    padding: 1.5rem 2rem;
    border-bottom: 1px solid #e5e7eb;
    transition: background 0.3s ease;
}

.product-item:last-child {
    border-bottom: none;
}

.product-item:hover {
    background: #f9fafb;
}

.product-image {
    width: 80px;
    height: 80px;
    border-radius: 0.75rem;
    overflow: hidden;
    flex-shrink: 0;
    border: 2px solid #e5e7eb;
}

.product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.product-info {
    flex: 1;
}

.product-info h6 {
    font-size: 1rem;
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 0.25rem;
}

.product-quantity {
    font-size: 0.875rem;
    color: #6b7280;
    margin: 0;
}

.product-price {
    text-align: right;
}

.unit-price {
    font-size: 0.875rem;
    color: #6b7280;
    margin-bottom: 0.25rem;
}

.total-price {
    font-size: 1.125rem;
    font-weight: 700;
    color: #059669;
    margin: 0;
}

/* Feedback */
.feedback-display {
    background: #f9fafb;
    border-left: 4px solid #34d399;
    border-radius: 0.5rem;
    padding: 1.5rem;
    position: relative;
}

.feedback-icon {
    position: absolute;
    top: 1rem;
    right: 1rem;
    font-size: 2rem;
    color: #e5e7eb;
}

.feedback-display p {
    font-size: 1rem;
    color: #4b5563;
    line-height: 1.6;
    margin: 0;
}

.form-group-modern {
    margin-bottom: 1rem;
}

.form-group-modern label {
    font-weight: 600;
    color: #4b5563;
    margin-bottom: 0.5rem;
    display: block;
}

.form-control-modern {
    width: 100%;
    padding: 0.875rem 1rem;
    border: 2px solid #e5e7eb;
    border-radius: 0.75rem;
    font-size: 0.9375rem;
    transition: all 0.3s ease;
    resize: vertical;
}

.form-control-modern:focus {
    outline: none;
    border-color: #34d399;
    box-shadow: 0 0 0 3px rgba(52, 211, 153, 0.1);
}

/* Order Summary */
.order-summary-card {
    background: white;
    border-radius: 1rem;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
    overflow: hidden;
}

.sticky-summary {
    position: sticky;
    top: 2rem;
}

.summary-header {
    padding: 1.5rem 2rem;
    background: linear-gradient(135deg, #34d399 0%, #10b981 100%);
    color: white;
}

.summary-header h5 {
    margin: 0;
    font-size: 1.125rem;
    font-weight: 600;
}

.summary-body {
    padding: 2rem;
}

.summary-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1rem;
    font-size: 0.9375rem;
}

.summary-row span:first-child {
    color: #6b7280;
}

.summary-row span:last-child {
    font-weight: 600;
    color: #1f2937;
}

.summary-row.total {
    font-size: 1.25rem;
}

.summary-row.total span {
    color: #1f2937;
    font-weight: 700;
}

.summary-row.total span:last-child {
    color: #059669;
}

.summary-divider {
    height: 1px;
    background: #e5e7eb;
    margin: 1.5rem 0;
}

.payment-method {
    margin-top: 1.5rem;
    padding-top: 1.5rem;
    border-top: 1px solid #e5e7eb;
}

.payment-method label {
    font-size: 0.75rem;
    color: #6b7280;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 0.75rem;
    display: block;
}

.payment-badge {
    background: #f3f4f6;
    padding: 0.75rem 1rem;
    border-radius: 0.5rem;
    font-weight: 600;
    color: #1f2937;
    display: flex;
    align-items: center;
}

.summary-actions {
    padding: 1.5rem 2rem;
    background: #f9fafb;
    border-top: 1px solid #e5e7eb;
}

/* Buttons */
.btn-custom-primary {
    background: linear-gradient(135deg, #34d399 0%, #10b981 100%);
    color: white;
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 0.5rem;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-custom-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(52, 211, 153, 0.4);
    color: white;
}

.btn-custom-success {
    background: linear-gradient(135deg, #34d399 0%, #10b981 100%);
    color: white;
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 0.5rem;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-custom-success:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(52, 211, 153, 0.4);
    color: white;
}

.btn-custom-danger {
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    color: white;
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 0.5rem;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-custom-danger:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
    color: white;
}

.btn-custom-warning {
    background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
    color: white;
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 0.5rem;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-custom-warning:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
    color: white;
}

.btn-custom-outline {
    background: white;
    color: #4b5563;
    border: 2px solid #e5e7eb;
    padding: 0.75rem 1.5rem;
    border-radius: 0.5rem;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-custom-outline:hover {
    border-color: #34d399;
    color: #34d399;
    background: #f9fafb;
}

/* Responsive */
@media (max-width: 991px) {
    .hero-title {
        font-size: 1.5rem;
    }
    
    .order-status-badge {
        justify-content: flex-start;
        margin-top: 1rem;
    }
    
    .sticky-summary {
        position: static;
    }
    
    .order-timeline {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .order-timeline::before {
        width: 2px;
        height: calc(100% - 60px);
        left: 30px;
        top: 30px;
    }
    
    .timeline-item {
        display: flex;
        align-items: center;
        text-align: left;
        margin-bottom: 2rem;
    }
    
    .timeline-icon {
        margin: 0 1rem 0 0;
    }
}

@media (max-width: 767px) {
    .hero-content {
        padding: 2rem 0 1.5rem;
    }
    
    .info-grid {
        grid-template-columns: 1fr;
    }
    
    .product-item {
        flex-direction: column;
        text-align: center;
    }
    
    .product-price {
        text-align: center;
    }
}
</style>
@endsection
