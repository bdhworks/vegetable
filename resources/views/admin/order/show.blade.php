@extends('admin.layout.be')

@section('title_one')
Đơn hàng
@endsection
@section('title_two')
Quản lý đơn hàng / Chi tiết đơn hàng
@endsection

@section('content')
<div class="order-detail-page">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <div class="header-left">
                <h1 class="page-title">
                    <i class="ti ti-file-invoice"></i>
                    Chi tiết đơn hàng #{{ $order->id }}
                </h1>
                <nav class="breadcrumb-modern">
                    <ol>
                        <li><a href="{{ route('admin.dashboard') }}"><i class="ti ti-home"></i>Dashboard</a></li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li><a href="{{ route('order.index') }}">Đơn hàng</a></li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li class="active">Chi tiết #{{ $order->id }}</li>
                    </ol>
                </nav>
            </div>
            <div class="header-right">
                <a href="{{ route('order.index') }}" class="btn btn-back">
                    <i class="ti ti-arrow-left"></i>
                    <span>Quay lại</span>
                </a>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <!-- Main Content -->
        <div class="col-lg-8">
            <!-- Order Items Card -->
            <div class="content-card">
                <div class="card-header-custom">
                    <h3 class="card-title-custom">
                        <i class="ti ti-package"></i>
                        Danh sách sản phẩm
                    </h3>
                    <span class="items-badge">{{ $order->products->count() }} sản phẩm</span>
                </div>
                <div class="card-body-custom">
                    <div class="products-list">
                        @foreach($order->products as $item)
                            <div class="product-item">
                                <div class="product-image">
                                    <img src="{{ $item->images->first()->image }}" alt="{{ $item->pivot->name }}">
                                </div>
                                <div class="product-details">
                                    <h6 class="product-name">{{ $item->pivot->name }}</h6>
                                    <div class="product-meta">
                                        <span class="quantity">
                                            <i class="ti ti-box"></i>
                                            Số lượng: <strong>{{ $item->pivot->quantity }}</strong>
                                        </span>
                                        <span class="price">
                                            <i class="ti ti-currency-dong"></i>
                                            {{ convertPrice($item->pivot->price) }}
                                        </span>
                                    </div>
                                </div>
                                <div class="product-total">
                                    {{ number_format($item->pivot->price * $item->pivot->quantity) }}đ
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    <!-- Order Summary -->
                    <div class="order-summary">
                        <div class="summary-row">
                            <span class="summary-label">Tạm tính:</span>
                            <span class="summary-value">{{ convertPrice($order->total_price) }}</span>
                        </div>
                        @if($order->discount)
                            <div class="summary-row">
                                <span class="summary-label">
                                    <i class="ti ti-discount"></i>
                                    Giảm giá:
                                </span>
                                <span class="summary-value discount">-{{ convertPrice($order->discount) }}</span>
                            </div>
                        @endif
                        <div class="summary-row total">
                            <span class="summary-label">Tổng cộng:</span>
                            <span class="summary-value">{{ convertPrice($order->total_price) }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Customer Information -->
            <div class="content-card mt-4">
                <div class="card-header-custom">
                    <h3 class="card-title-custom">
                        <i class="ti ti-user"></i>
                        Thông tin khách hàng
                    </h3>
                </div>
                <div class="card-body-custom">
                    <div class="info-grid">
                        <div class="info-item">
                            <span class="info-label">
                                <i class="ti ti-user"></i>
                                Tên khách hàng
                            </span>
                            <span class="info-value">{{ $order->name }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">
                                <i class="ti ti-mail"></i>
                                Email
                            </span>
                            <span class="info-value">{{ $order->email }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">
                                <i class="ti ti-phone"></i>
                                Số điện thoại
                            </span>
                            <span class="info-value">{{ $order->phone }}</span>
                        </div>
                        <div class="info-item full-width">
                            <span class="info-label">
                                <i class="ti ti-map-pin"></i>
                                Địa chỉ giao hàng
                            </span>
                            <span class="info-value">{{ $order->address }}</span>
                        </div>
                        @if($order->note)
                            <div class="info-item full-width">
                                <span class="info-label">
                                    <i class="ti ti-note"></i>
                                    Ghi chú
                                </span>
                                <span class="info-value">{{ $order->note }}</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Order Status Card -->
            <div class="content-card sticky-sidebar">
                <div class="card-header-custom">
                    <h3 class="card-title-custom">
                        <i class="ti ti-info-circle"></i>
                        Thông tin đơn hàng
                    </h3>
                </div>
                <div class="card-body-custom">
                    <!-- Order Status -->
                    <div class="status-section">
                        <label class="section-label">Trạng thái đơn hàng</label>
                        <div class="status-display">
                            @if ($order->status === 0)
                                <span class="status-badge-large cancelled">
                                    <i class="ti ti-x"></i>
                                    Đã hủy
                                </span>
                            @elseif ($order->status === 1)
                                <span class="status-badge-large returned">
                                    <i class="ti ti-arrow-back"></i>
                                    Đã trả hàng
                                </span>
                            @elseif ($order->status === 2)
                                <span class="status-badge-large pending">
                                    <i class="ti ti-clock"></i>
                                    Chờ xác nhận
                                </span>
                            @elseif ($order->status === 3)
                                <span class="status-badge-large shipping">
                                    <i class="ti ti-truck"></i>
                                    Đang giao hàng
                                </span>
                            @else
                                <span class="status-badge-large delivered">
                                    <i class="ti ti-check"></i>
                                    Đã giao hàng
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Payment Method -->
                    <div class="payment-section">
                        <label class="section-label">Phương thức thanh toán</label>
                        <div class="payment-display">
                            @if($order->payment == 1)
                                <span class="payment-badge vnpay">
                                    <i class="ti ti-wallet"></i>
                                    VNPay
                                </span>
                            @else
                                <span class="payment-badge cash">
                                    <i class="ti ti-cash"></i>
                                    Tiền mặt
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Order Details -->
                    <div class="order-details-section">
                        <div class="detail-row">
                            <span class="detail-label">
                                <i class="ti ti-calendar"></i>
                                Ngày đặt
                            </span>
                            <span class="detail-value">{{ $order->created_at->format('d/m/Y H:i') }}</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">
                                <i class="ti ti-clock"></i>
                                Thời gian
                            </span>
                            <span class="detail-value">{{ $order->created_at->diffForHumans() }}</span>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    @if($order->status === 2 || $order->status === 3)
                        <div class="action-section">
                            @if ($order->status === 2)
                                <a href="javascript:void(0)" 
                                   onclick="confirmOrder({{ $order->id }})"
                                   class="btn btn-confirm-full">
                                    <i class="ti ti-check"></i>
                                    <span>Xác nhận đơn hàng</span>
                                </a>
                            @elseif ($order->status === 3)
                                <a href="javascript:void(0)" 
                                   onclick="markAsDelivered({{ $order->id }})"
                                   class="btn btn-delivered-full">
                                    <i class="ti ti-package"></i>
                                    <span>Đánh dấu đã giao</span>
                                </a>
                                <a href="javascript:void(0)" 
                                   onclick="returnOrder({{ $order->id }})"
                                   class="btn btn-return-full">
                                    <i class="ti ti-arrow-back"></i>
                                    <span>Trả hàng</span>
                                </a>
                            @endif
                        </div>
                    @endif
                </div>
            </div>

            <!-- Feedback Card (if exists) -->
            @if($order->feedback)
                <div class="content-card mt-4">
                    <div class="card-header-custom">
                        <h3 class="card-title-custom">
                            <i class="ti ti-message"></i>
                            Phản hồi khách hàng
                        </h3>
                    </div>
                    <div class="card-body-custom">
                        <div class="feedback-content">
                            <p>{{ $order->feedback }}</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
/* Order Detail Page Specific Styles Only - No Duplicates */
.order-detail-page {
    padding: 1.5rem;
    background: #f5f7fa;
    min-height: 100vh;
}

/* Back Button */
.btn-back {
    background: white;
    color: #4b5563;
    border: 2px solid #e5e7eb;
    padding: 0.75rem 1.5rem;
    border-radius: 0.5rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
    text-decoration: none;
}

.btn-back:hover {
    border-color: #8b5cf6;
    color: #8b5cf6;
    transform: translateX(-4px);
}

/* Card Header Custom */
.card-header-custom {
    padding: 1.5rem;
    border-bottom: 2px solid #ede9fe;
    background: linear-gradient(135deg, #faf5ff 0%, #f3e8ff 100%);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.card-title-custom {
    font-size: 1.25rem;
    font-weight: 700;
    color: #581c87;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.card-title-custom i {
    color: #8b5cf6;
}

.items-badge {
    background: linear-gradient(135deg, #8b5cf6, #7c3aed);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    font-size: 0.875rem;
    font-weight: 600;
}

.card-body-custom {
    padding: 1.5rem;
}

/* Products List */
.products-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.product-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem;
    background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
    border-radius: 0.75rem;
    border: 2px solid #ede9fe;
    transition: all 0.3s ease;
}

.product-item:hover {
    border-color: #8b5cf6;
    box-shadow: 0 4px 12px rgba(139, 92, 246, 0.1);
}

.product-image {
    width: 80px;
    height: 80px;
    border-radius: 0.5rem;
    overflow: hidden;
    border: 2px solid #e5e7eb;
    flex-shrink: 0;
}

.product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.product-details {
    flex: 1;
}

.product-name {
    font-size: 1rem;
    font-weight: 600;
    color: #1f2937;
    margin: 0 0 0.5rem 0;
}

.product-meta {
    display: flex;
    gap: 1.5rem;
    font-size: 0.875rem;
}

.quantity, .price {
    display: flex;
    align-items: center;
    gap: 0.375rem;
    color: #6b7280;
}

.quantity i, .price i {
    color: #8b5cf6;
}

.product-total {
    font-size: 1.125rem;
    font-weight: 700;
    color: #1e293b;
    background: linear-gradient(135deg, #fef3c7, #fde68a);
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
}

/* Order Summary */
.order-summary {
    margin-top: 1.5rem;
    padding-top: 1.5rem;
    border-top: 2px solid #ede9fe;
}

.summary-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.75rem 1rem;
    background: #f8fafc;
    border-radius: 0.5rem;
    margin-bottom: 0.5rem;
}

.summary-row.total {
    background: linear-gradient(135deg, #faf5ff, #f3e8ff);
    border: 2px solid #8b5cf6;
    padding: 1rem 1.25rem;
    margin-top: 0.75rem;
}

.summary-label {
    font-size: 0.9375rem;
    color: #64748b;
    font-weight: 600;
}

.summary-row.total .summary-label {
    font-size: 1.125rem;
    color: #581c87;
}

.summary-value {
    font-size: 1rem;
    font-weight: 700;
    color: #1e293b;
}

.summary-value.discount {
    color: #dc2626;
}

.summary-row.total .summary-value {
    font-size: 1.5rem;
    color: #8b5cf6;
}

/* Customer Information */
.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.25rem;
}

.info-item {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
    padding: 1rem;
    border-radius: 0.5rem;
    border: 2px solid #ede9fe;
}

.info-item.full-width {
    grid-column: 1 / -1;
}

.info-label {
    font-size: 0.875rem;
    color: #64748b;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.375rem;
    text-transform: uppercase;
    letter-spacing: 0.025em;
}

.info-label i {
    color: #8b5cf6;
}

.info-value {
    font-size: 0.9375rem;
    font-weight: 600;
    color: #1e293b;
}

/* Sidebar Status */
.sticky-sidebar {
    position: sticky;
    top: 1.5rem;
}

.status-section, .payment-section, .order-details-section {
    margin-bottom: 1.5rem;
    padding-bottom: 1.5rem;
    border-bottom: 1px solid #ede9fe;
}

.section-label {
    display: block;
    font-size: 0.875rem;
    font-weight: 600;
    color: #64748b;
    text-transform: uppercase;
    letter-spacing: 0.025em;
    margin-bottom: 0.75rem;
}

.status-display, .payment-display {
    display: flex;
    justify-content: center;
}

.status-badge-large {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 1rem 1.5rem;
    border-radius: 0.75rem;
    font-weight: 700;
    font-size: 1rem;
    border: 2px solid;
}

.status-badge-large.cancelled {
    background: linear-gradient(135deg, #f1f5f9, #e2e8f0);
    color: #475569;
    border-color: #cbd5e1;
}

.status-badge-large.returned {
    background: linear-gradient(135deg, #fee2e2, #fecaca);
    color: #991b1b;
    border-color: #fca5a5;
}

.status-badge-large.pending {
    background: linear-gradient(135deg, #fef3c7, #fde68a);
    color: #92400e;
    border-color: #fbbf24;
}

.status-badge-large.shipping {
    background: linear-gradient(135deg, #dbeafe, #bfdbfe);
    color: #1e40af;
    border-color: #60a5fa;
}

.status-badge-large.delivered {
    background: linear-gradient(135deg, #d1fae5, #a7f3d0);
    color: #065f46;
    border-color: #34d399;
}

.payment-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.875rem 1.25rem;
    border-radius: 0.5rem;
    font-weight: 700;
    font-size: 0.9375rem;
    border: 2px solid;
}

.payment-badge.vnpay {
    background: linear-gradient(135deg, #dbeafe, #bfdbfe);
    color: #1e40af;
    border-color: #60a5fa;
}

.payment-badge.cash {
    background: linear-gradient(135deg, #d1fae5, #a7f3d0);
    color: #065f46;
    border-color: #34d399;
}

.detail-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.75rem 0;
}

.detail-label {
    font-size: 0.875rem;
    color: #64748b;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.375rem;
}

.detail-label i {
    color: #8b5cf6;
}

.detail-value {
    font-size: 0.875rem;
    font-weight: 600;
    color: #1e293b;
}

/* Action Buttons */
.action-section {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
    margin-top: 1.5rem;
}

.btn-confirm-full,
.btn-delivered-full,
.btn-return-full {
    width: 100%;
    padding: 1rem 1.5rem;
    border-radius: 0.5rem;
    font-weight: 600;
    font-size: 0.9375rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
    text-decoration: none;
    border: none;
}

.btn-confirm-full {
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
}

.btn-confirm-full:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 16px rgba(16, 185, 129, 0.3);
}

.btn-delivered-full {
    background: linear-gradient(135deg, #3b82f6, #2563eb);
    color: white;
}

.btn-delivered-full:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 16px rgba(59, 130, 246, 0.3);
}

.btn-return-full {
    background: white;
    color: #dc2626;
    border: 2px solid #fee2e2;
}

.btn-return-full:hover {
    background: #ef4444;
    color: white;
    border-color: #ef4444;
}

/* Feedback */
.feedback-content {
    background: linear-gradient(135deg, #fef3c7, #fde68a);
    padding: 1.25rem;
    border-radius: 0.75rem;
    border-left: 4px solid #f59e0b;
}

.feedback-content p {
    margin: 0;
    color: #78350f;
    font-style: italic;
    line-height: 1.6;
}

/* Responsive */
@media (max-width: 1024px) {
    .sticky-sidebar {
        position: relative;
        top: 0;
    }
}

@media (max-width: 768px) {
    .order-detail-page {
        padding: 1rem;
    }
    
    .product-item {
        flex-direction: column;
        text-align: center;
    }

    .product-meta {
        flex-direction: column;
        gap: 0.5rem;
    }

    .info-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<script>
// Use SwalHelper from layout file
function confirmOrder(orderId) {
    SwalHelper.confirm(
        'Xác nhận đơn hàng?',
        `<p style="margin-bottom: 1rem;">Bạn có chắc chắn muốn xác nhận đơn hàng <strong>#${orderId}</strong>?</p>
         <p style="color: #6b7280; font-size: 0.875rem;">Đơn hàng sẽ chuyển sang trạng thái "Đang giao hàng"</p>`,
        function() {
            SwalHelper.loading();
            window.location.href = `/admin/order/confirm/${orderId}`;
        }
    );
}

function markAsDelivered(orderId) {
    Swal.fire({
        title: 'Xác nhận đã giao hàng?',
        html: `<p style="margin-bottom: 1rem;">Xác nhận rằng đơn hàng <strong>#${orderId}</strong> đã được giao thành công?</p>
               <p style="color: #6b7280; font-size: 0.875rem;">Hành động này không thể hoàn tác</p>`,
        icon: 'success',
        showCancelButton: true,
        confirmButtonColor: '#3b82f6',
        cancelButtonColor: '#6b7280',
        confirmButtonText: '<i class="ti ti-package"></i> Đã giao',
        cancelButtonText: '<i class="ti ti-x"></i> Hủy',
        customClass: {
            popup: 'swal-modern'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            SwalHelper.loading();
            window.location.href = `/admin/order/delivered/${orderId}`;
        }
    });
}

function returnOrder(orderId) {
    Swal.fire({
        title: 'Xác nhận trả hàng?',
        html: `<p style="margin-bottom: 1rem;">Bạn có chắc chắn muốn đánh dấu đơn hàng <strong>#${orderId}</strong> là trả hàng?</p>
               <p style="color: #dc2626; font-size: 0.875rem;">⚠️ Hành động này sẽ không thể hoàn tác</p>`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#ef4444',
        cancelButtonColor: '#6b7280',
        confirmButtonText: '<i class="ti ti-arrow-back"></i> Trả hàng',
        cancelButtonText: '<i class="ti ti-x"></i> Hủy',
        customClass: {
            popup: 'swal-modern'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            SwalHelper.loading();
            window.location.href = `/admin/order/back/${orderId}`;
        }
    });
}
</script>

@endsection