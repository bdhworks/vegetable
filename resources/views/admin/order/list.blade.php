@extends('admin.layout.be')

@section('title_one')
Đơn hàng
@endsection
@section('title_two')
Quản lý đơn hàng / Đơn hàng
@endsection

@section('content')
<div class="order-page">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <div class="header-left">
                <h1 class="page-title">
                    <i class="ti ti-shopping-cart"></i>
                    Quản lý đơn hàng
                </h1>
                <nav class="breadcrumb-modern">
                    <ol>
                        <li><a href="{{ route('admin.dashboard') }}"><i class="ti ti-home"></i>Dashboard</a></li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li>Quản lý đơn hàng</li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li class="active">Đơn hàng</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card stat-primary">
            <div class="stat-icon">
                <i class="ti ti-shopping-cart"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Tổng đơn hàng</span>
                <h3 class="stat-value">{{ $orders->total() }}</h3>
            </div>
        </div>
        <div class="stat-card stat-warning">
            <div class="stat-icon">
                <i class="ti ti-clock"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Chờ xác nhận</span>
                <h3 class="stat-value">{{ $orders->where('status', 2)->count() }}</h3>
            </div>
        </div>
        <div class="stat-card stat-info">
            <div class="stat-icon">
                <i class="ti ti-truck"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Đang giao</span>
                <h3 class="stat-value">{{ $orders->where('status', 3)->count() }}</h3>
            </div>
        </div>
        <div class="stat-card stat-success">
            <div class="stat-icon">
                <i class="ti ti-check"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Đã giao</span>
                <h3 class="stat-value">{{ $orders->where('status', 4)->count() }}</h3>
            </div>
        </div>
    </div>

    <!-- Main Content Card -->
    <div class="content-card">
        <!-- Filters and Search -->
        <div class="card-toolbar">
            <div class="toolbar-left">
                <h3 class="toolbar-title">
                    <i class="ti ti-list"></i>
                    Danh sách đơn hàng
                </h3>
                <span class="toolbar-badge">{{ $orders->total() }} đơn hàng</span>
            </div>
            <div class="toolbar-right">
                <form class="search-form" method="GET">
                    <div class="search-input-group">
                        <i class="ti ti-search search-icon"></i>
                        <input type="text" 
                               name="order_id" 
                               value="{{ request('order_id') }}" 
                               placeholder="Tìm kiếm mã đơn hàng..." 
                               class="search-input">
                        <button type="submit" class="btn-search">
                            <i class="ti ti-search"></i>
                            Tìm kiếm
                        </button>
                        @if(request('order_id'))
                            <a href="{{ route('order.index') }}" class="btn-clear">
                                <i class="ti ti-x"></i>
                            </a>
                        @endif
                    </div>
                </form>
                <form method="GET" class="filter-form">
                    <select class="form-select-modern" name="status" onchange="this.form.submit()">
                        <option {{ request('status') == '' ? 'selected' : ''}} value="">Tất cả đơn hàng</option>
                        <option {{ request('status') == '0' ? 'selected' : ''}} value="0">Đơn hàng đã hủy</option>
                        <option {{ request('status') == '1' ? 'selected' : ''}} value="1">Đơn hàng đã trả</option>
                        <option {{ request('status') == '2' ? 'selected' : ''}} value="2">Chờ xác nhận</option>
                        <option {{ request('status') == '3' ? 'selected' : ''}} value="3">Đang giao hàng</option>
                        <option {{ request('status') == '4' ? 'selected' : ''}} value="4">Đã giao hàng</option>
                    </select>
                </form>
            </div>
        </div>

        <!-- Table -->
        <div class="table-container">
            <table class="data-table">
                <thead>
                    <tr>
                        <th style="width: 80px;">
                            <div class="th-content">
                                <i class="ti ti-hash"></i>
                                <span>Mã ĐH</span>
                            </div>
                        </th>
                        <th style="width: 10%;">
                            <div class="th-content">
                                <i class="ti ti-calendar"></i>
                                <span>Ngày đặt</span>
                            </div>
                        </th>
                        <th style="width: 15%;">
                            <div class="th-content">
                                <i class="ti ti-user"></i>
                                <span>Khách hàng</span>
                            </div>
                        </th>
                        <th style="width: 20%;">
                            <div class="th-content">
                                <i class="ti ti-map-pin"></i>
                                <span>Địa chỉ</span>
                            </div>
                        </th>
                        <th style="width: 10%;">
                            <div class="th-content">
                                <i class="ti ti-credit-card"></i>
                                <span>Thanh toán</span>
                            </div>
                        </th>
                        <th style="width: 10%;" class="text-center">
                            <div class="th-content">
                                <i class="ti ti-currency-dong"></i>
                                <span>Tổng tiền</span>
                            </div>
                        </th>
                        <th style="width: 12%;" class="text-center">
                            <div class="th-content">
                                <i class="ti ti-toggle-right"></i>
                                <span>Trạng thái</span>
                            </div>
                        </th>
                        <th style="width: 200px;" class="text-center">
                            <div class="th-content">
                                <i class="ti ti-settings"></i>
                                <span>Thao tác</span>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                        <tr class="data-row">
                            <td>
                                <div class="order-id-badge">
                                    <i class="ti ti-file-invoice"></i>
                                    <span>#{{ $order->id }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="date-info">
                                    <span class="date-day">{{ date_format($order->created_at, 'd/m/Y') }}</span>
                                    <span class="date-time">{{ date_format($order->created_at, 'H:i') }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="customer-info">
                                    <h6 class="customer-name">{{ $order->name }}</h6>
                                    <span class="customer-phone">
                                        <i class="ti ti-phone"></i>
                                        {{ $order->phone }}
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div class="address-info">
                                    <i class="ti ti-map-pin"></i>
                                    <span>{{ $order->address }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="payment-badge {{ $order->payment === 1 ? 'vnpay' : 'cash' }}">
                                    <i class="ti ti-{{ $order->payment === 1 ? 'wallet' : 'cash' }}"></i>
                                    <span>{{ $order->payment === 1 ? 'VNPay' : 'Tiền mặt' }}</span>
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="total-price">
                                    {{ convertPrice($order->total_price) }}
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="status-wrapper">
                                    @if($order->status == 0)
                                        <span class="status-badge status-cancelled">
                                            <i class="ti ti-x"></i>
                                            Đã hủy
                                        </span>
                                    @elseif($order->status == 1)
                                        <span class="status-badge status-returned">
                                            <i class="ti ti-arrow-back"></i>
                                            Đã trả
                                        </span>
                                    @elseif($order->status == 2)
                                        <span class="status-badge status-pending">
                                            <i class="ti ti-clock"></i>
                                            Chờ xác nhận
                                        </span>
                                    @elseif($order->status == 3)
                                        <span class="status-badge status-shipping">
                                            <i class="ti ti-truck"></i>
                                            Đang giao
                                        </span>
                                    @else
                                        <span class="status-badge status-delivered">
                                            <i class="ti ti-check"></i>
                                            Đã giao
                                        </span>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    @if ($order->status === 2)
                                        <a href="javascript:void(0)" 
                                           onclick="confirmOrder({{ $order->id }})"
                                           class="btn-action btn-confirm" 
                                           title="Xác nhận">
                                            <i class="ti ti-check"></i>
                                            <span>Xác nhận</span>
                                        </a>
                                    @elseif ($order->status === 3)
                                        <a href="javascript:void(0)" 
                                           onclick="markAsDelivered({{ $order->id }})"
                                           class="btn-action btn-delivered" 
                                           title="Đã giao">
                                            <i class="ti ti-package"></i>
                                            <span>Đã giao</span>
                                        </a>
                                        <a href="javascript:void(0)" 
                                           onclick="returnOrder({{ $order->id }})"
                                           class="btn-action btn-return" 
                                           title="Trả hàng">
                                            <i class="ti ti-arrow-back"></i>
                                            <span>Trả hàng</span>
                                        </a>
                                    @endif
                                    <a href="{{ route('order.show', $order) }}" 
                                       class="btn-action btn-view" 
                                       title="Chi tiết">
                                        <i class="ti ti-eye"></i>
                                        <span>Chi tiết</span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">
                                <div class="empty-state">
                                    <div class="empty-icon">
                                        <i class="ti ti-shopping-cart-off"></i>
                                    </div>
                                    <h5>Không có đơn hàng nào</h5>
                                    <p>Chưa có đơn hàng nào được tạo</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($orders->hasPages())
            <div class="pagination-wrapper">
                <div class="pagination-info">
                    <span>Hiển thị {{ $orders->firstItem() }} - {{ $orders->lastItem() }} trong tổng số {{ $orders->total() }}</span>
                </div>
                <div class="pagination-links">
                    {{ $orders->appends(request()->query())->links() }}
                </div>
            </div>
        @endif
    </div>
</div>

<style>
/* Order Page Specific Styles Only - No Duplicates */
.order-page {
    padding: 1.5rem;
    background: #f5f7fa;
    min-height: 100vh;
}

/* Order Specific Badges and Info */
.order-id-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: linear-gradient(135deg, #ede9fe, #ddd6fe);
    color: #6b21a8;
    padding: 0.5rem 0.875rem;
    border-radius: 0.5rem;
    font-weight: 700;
    font-size: 0.875rem;
    font-family: 'Courier New', monospace;
    border: 2px solid #a78bfa;
}

.date-info {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
}

.date-day {
    font-size: 0.9375rem;
    font-weight: 600;
    color: #1f2937;
}

.date-time {
    font-size: 0.8125rem;
    color: #6b7280;
}

.customer-info {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
}

.customer-name {
    font-size: 0.9375rem;
    font-weight: 600;
    color: #1f2937;
    margin: 0;
}

.customer-phone {
    font-size: 0.8125rem;
    color: #6b7280;
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

.address-info {
    font-size: 0.875rem;
    color: #4b5563;
    display: flex;
    align-items: flex-start;
    gap: 0.375rem;
}

.address-info i {
    color: #8b5cf6;
    margin-top: 0.125rem;
}

.payment-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 0.875rem;
    border-radius: 0.5rem;
    font-weight: 700;
    font-size: 0.875rem;
}

.payment-badge.vnpay {
    background: linear-gradient(135deg, #dbeafe, #bfdbfe);
    color: #1e40af;
    border: 2px solid #60a5fa;
}

.payment-badge.cash {
    background: linear-gradient(135deg, #d1fae5, #a7f3d0);
    color: #065f46;
    border: 2px solid #34d399;
}

.total-price {
    font-size: 1rem;
    font-weight: 700;
    color: #1e293b;
    background: linear-gradient(135deg, #fef3c7, #fde68a);
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    display: inline-block;
}

/* Order Status Badges - Specific Colors */
.status-cancelled {
    background: linear-gradient(135deg, #f1f5f9, #e2e8f0);
    color: #475569;
}

.status-returned {
    background: linear-gradient(135deg, #fee2e2, #fecaca);
    color: #991b1b;
}

.status-pending {
    background: linear-gradient(135deg, #fef3c7, #fde68a);
    color: #92400e;
}

.status-shipping {
    background: linear-gradient(135deg, #dbeafe, #bfdbfe);
    color: #1e40af;
}

.status-delivered {
    background: linear-gradient(135deg, #d1fae5, #a7f3d0);
    color: #065f46;
}

/* Responsive */
@media (max-width: 768px) {
    .order-page {
        padding: 1rem;
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
