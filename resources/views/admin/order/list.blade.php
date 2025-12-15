@extends('admin.layout.be')

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
/* Order Page Specific Styles - No Duplicates from Layout */
.order-page {
    padding: 1.5rem;
    min-height: 100vh;
}

/* Page Header */
.page-header {
    margin-bottom: 1.5rem;
}

.header-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
}

.page-title {
    font-size: 1.75rem;
    font-weight: 700;
    color: var(--text-primary);
    margin: 0 0 0.5rem 0;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.page-title i {
    font-size: 2rem;
    color: #8b5cf6;
}

.breadcrumb-modern {
    margin: 0;
}

.breadcrumb-modern ol {
    display: flex;
    align-items: center;
    list-style: none;
    padding: 0;
    margin: 0;
    font-size: 0.875rem;
    color: var(--text-secondary);
}

.breadcrumb-modern li {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.breadcrumb-modern a {
    color: var(--text-secondary);
    text-decoration: none;
    transition: color 0.2s;
    display: flex;
    align-items: center;
    gap: 0.375rem;
}

.breadcrumb-modern a:hover {
    color: var(--primary-color);
}

.breadcrumb-modern .active {
    color: var(--text-primary);
    font-weight: 500;
}

/* Stats Grid */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.25rem;
    margin-bottom: 1.5rem;
}

.stat-card {
    background: white;
    border-radius: var(--radius-md);
    padding: 1.5rem;
    display: flex;
    align-items: center;
    gap: 1rem;
    box-shadow: var(--shadow-sm);
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.stat-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
}

.stat-card.stat-primary {
    border-color: #8b5cf6;
}

.stat-card.stat-primary:hover {
    box-shadow: 0 8px 25px rgba(139, 92, 246, 0.3);
}

.stat-card.stat-warning {
    border-color: #f59e0b;
}

.stat-card.stat-warning:hover {
    box-shadow: 0 8px 25px rgba(245, 158, 11, 0.3);
}

.stat-card.stat-info {
    border-color: #3b82f6;
}

.stat-card.stat-info:hover {
    box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
}

.stat-card.stat-success {
    border-color: var(--primary-color);
}

.stat-card.stat-success:hover {
    box-shadow: 0 8px 25px rgba(34, 197, 94, 0.3);
}

.stat-icon {
    width: 60px;
    height: 60px;
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.75rem;
    color: white;
    flex-shrink: 0;
}

.stat-primary .stat-icon {
    background: linear-gradient(135deg, #8b5cf6, #7c3aed);
}

.stat-warning .stat-icon {
    background: linear-gradient(135deg, #f59e0b, #d97706);
}

.stat-info .stat-icon {
    background: linear-gradient(135deg, #3b82f6, #2563eb);
}

.stat-success .stat-icon {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
}

.stat-content {
    flex: 1;
}

.stat-label {
    display: block;
    font-size: 0.875rem;
    color: var(--text-secondary);
    margin-bottom: 0.25rem;
    font-weight: 500;
}

.stat-value {
    font-size: 1.75rem;
    font-weight: 700;
    color: var(--text-primary);
    margin: 0;
}

/* Content Card */
.content-card {
    background: white;
    border-radius: var(--radius-md);
    box-shadow: var(--shadow-sm);
    overflow: hidden;
}

/* Card Toolbar */
.card-toolbar {
    padding: 1.5rem;
    border-bottom: 2px solid var(--border-color);
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
    background: linear-gradient(135deg, #faf5ff, #f5f3ff);
}

.toolbar-left {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.toolbar-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--text-primary);
    margin: 0;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.toolbar-title i {
    color: #8b5cf6;
}

.toolbar-badge {
    background: linear-gradient(135deg, #ddd6fe, #c4b5fd);
    color: #6d28d9;
    padding: 0.375rem 0.875rem;
    border-radius: var(--radius-sm);
    font-size: 0.875rem;
    font-weight: 700;
    border: 2px solid #a78bfa;
}

.toolbar-right {
    display: flex;
    align-items: center;
    gap: 1rem;
    flex-wrap: wrap;
}

/* Search Form */
.search-form {
    display: flex;
}

.search-input-group {
    display: flex;
    align-items: center;
    background: white;
    border: 2px solid var(--border-color);
    border-radius: var(--radius-sm);
    overflow: hidden;
    transition: all 0.3s ease;
}

.search-input-group:focus-within {
    border-color: #8b5cf6;
    box-shadow: 0 0 0 4px rgba(139, 92, 246, 0.1);
}

.search-icon {
    padding: 0 0.875rem;
    color: var(--text-secondary);
    font-size: 1.125rem;
}

.search-input {
    border: none;
    padding: 0.75rem 0.5rem;
    font-size: 0.9375rem;
    color: var(--text-primary);
    outline: none;
    min-width: 250px;
    background: transparent;
}

.search-input::placeholder {
    color: var(--text-secondary);
}

.btn-search {
    background: linear-gradient(135deg, #8b5cf6, #7c3aed);
    color: white;
    border: none;
    padding: 0.75rem 1.25rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.9375rem;
}

.btn-search:hover {
    background: linear-gradient(135deg, #7c3aed, #6d28d9);
}

.btn-clear {
    background: #fee2e2;
    color: #991b1b;
    border: none;
    padding: 0.75rem;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
}

.btn-clear:hover {
    background: #ef4444;
    color: white;
}

/* Filter Form */
.filter-form {
    display: flex;
}

.form-select-modern {
    padding: 0.75rem 1rem;
    border: 2px solid var(--border-color);
    border-radius: var(--radius-sm);
    background: white;
    color: var(--text-primary);
    font-size: 0.9375rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    min-width: 200px;
}

.form-select-modern:focus {
    outline: none;
    border-color: #8b5cf6;
    box-shadow: 0 0 0 4px rgba(139, 92, 246, 0.1);
}

/* Table */
.table-container {
    overflow-x: auto;
}

.data-table {
    width: 100%;
    border-collapse: collapse;
}

.data-table thead {
    background: linear-gradient(135deg, #faf5ff, #f5f3ff);
    border-bottom: 2px solid #e9d5ff;
}

.data-table th {
    padding: 1rem 1.25rem;
    text-align: left;
    font-weight: 700;
    font-size: 0.875rem;
    color: #6d28d9;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.th-content {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.data-table tbody tr {
    border-bottom: 1px solid var(--border-color);
    transition: all 0.2s ease;
}

.data-table tbody tr:hover {
    background: linear-gradient(135deg, #faf5ff, #f9fafb);
}

.data-table td {
    padding: 1rem 1.25rem;
    font-size: 0.9375rem;
    color: var(--text-primary);
}

/* Order Specific Badges */
.order-id-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: linear-gradient(135deg, #ede9fe, #ddd6fe);
    color: #6b21a8;
    padding: 0.5rem 0.875rem;
    border-radius: var(--radius-sm);
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
    color: var(--text-primary);
}

.date-time {
    font-size: 0.8125rem;
    color: var(--text-secondary);
}

.customer-info {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
}

.customer-name {
    font-size: 0.9375rem;
    font-weight: 600;
    color: var(--text-primary);
    margin: 0;
}

.customer-phone {
    font-size: 0.8125rem;
    color: var(--text-secondary);
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

.address-info {
    font-size: 0.875rem;
    color: var(--text-secondary);
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
    border-radius: var(--radius-sm);
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
    border-radius: var(--radius-sm);
    display: inline-block;
}

/* Status Badges */
.status-wrapper {
    display: flex;
    justify-content: center;
}

.status-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    border-radius: var(--radius-sm);
    font-weight: 700;
    font-size: 0.875rem;
}

.status-cancelled {
    background: linear-gradient(135deg, #f1f5f9, #e2e8f0);
    color: #475569;
    border: 2px solid #cbd5e1;
}

.status-returned {
    background: linear-gradient(135deg, #fee2e2, #fecaca);
    color: #991b1b;
    border: 2px solid #fca5a5;
}

.status-pending {
    background: linear-gradient(135deg, #fef3c7, #fde68a);
    color: #92400e;
    border: 2px solid #fbbf24;
}

.status-shipping {
    background: linear-gradient(135deg, #dbeafe, #bfdbfe);
    color: #1e40af;
    border: 2px solid #60a5fa;
}

.status-delivered {
    background: linear-gradient(135deg, #d1fae5, #a7f3d0);
    color: #065f46;
    border: 2px solid #6ee7b7;
}

/* Action Buttons */
.action-buttons {
    display: flex;
    gap: 0.5rem;
    justify-content: center;
    flex-wrap: wrap;
}

.btn-action {
    padding: 0.5rem 1rem;
    border-radius: var(--radius-sm);
    font-weight: 600;
    font-size: 0.875rem;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.375rem;
    border: 2px solid transparent;
    text-decoration: none;
    background: transparent;
}

.btn-action i {
    font-size: 1rem;
}

.btn-confirm {
    background: linear-gradient(135deg, #d1fae5, #a7f3d0);
    color: #065f46;
    border-color: #6ee7b7;
}

.btn-confirm:hover {
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
    transform: translateY(-2px);
    box-shadow: var(--shadow-sm);
}

.btn-delivered {
    background: linear-gradient(135deg, #dbeafe, #bfdbfe);
    color: #1e40af;
    border-color: #60a5fa;
}

.btn-delivered:hover {
    background: linear-gradient(135deg, #3b82f6, #2563eb);
    color: white;
    transform: translateY(-2px);
    box-shadow: var(--shadow-sm);
}

.btn-return {
    background: linear-gradient(135deg, #fef3c7, #fde68a);
    color: #92400e;
    border-color: #fbbf24;
}

.btn-return:hover {
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: white;
    transform: translateY(-2px);
    box-shadow: var(--shadow-sm);
}

.btn-view {
    background: linear-gradient(135deg, #ede9fe, #ddd6fe);
    color: #6b21a8;
    border-color: #a78bfa;
}

.btn-view:hover {
    background: linear-gradient(135deg, #8b5cf6, #7c3aed);
    color: white;
    transform: translateY(-2px);
    box-shadow: var(--shadow-sm);
}

/* Empty State */
.empty-state {
    padding: 3rem 1.5rem;
    text-align: center;
}

.empty-icon {
    font-size: 4rem;
    color: #d1d5db;
    margin-bottom: 1rem;
}

.empty-state h5 {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 0.5rem;
}

.empty-state p {
    color: var(--text-secondary);
    margin-bottom: 1.5rem;
}

/* Pagination */
.pagination-wrapper {
    padding: 1.5rem;
    border-top: 2px solid var(--border-color);
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
    background: #fafafa;
}

.pagination-info {
    font-size: 0.875rem;
    color: var(--text-secondary);
    font-weight: 500;
}

.pagination-links {
    display: flex;
    gap: 0.5rem;
}

/* Text Center Utility */
.text-center {
    text-align: center;
}

/* Responsive */
@media (max-width: 768px) {
    .order-page {
        padding: 1rem;
    }
    
    .page-title {
        font-size: 1.5rem;
    }
    
    .stats-grid {
        grid-template-columns: 1fr;
    }
    
    .card-toolbar {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .toolbar-right {
        width: 100%;
        flex-direction: column;
    }
    
    .search-form,
    .filter-form {
        width: 100%;
    }
    
    .search-input {
        min-width: auto;
        flex: 1;
    }
    
    .form-select-modern {
        width: 100%;
    }
    
    .table-container {
        overflow-x: scroll;
    }
    
    .action-buttons {
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .btn-action {
        width: 100%;
        justify-content: center;
    }
    
    .pagination-wrapper {
        flex-direction: column;
        text-align: center;
    }
}
</style>

<script>
// Use SwalHelper from layout file
function confirmOrder(orderId) {
    Swal.fire({
        title: 'Xác nhận đơn hàng?',
        html: `<p style="margin-bottom: 1rem;">Bạn có chắc chắn muốn xác nhận đơn hàng <strong>#${orderId}</strong>?</p>
               <p style="color: #6b7280; font-size: 0.875rem;">Đơn hàng sẽ chuyển sang trạng thái "Đang giao hàng"</p>`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#22c55e',
        cancelButtonColor: '#6b7280',
        confirmButtonText: '<i class="ti ti-check"></i> Xác nhận',
        cancelButtonText: '<i class="ti ti-x"></i> Hủy',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            SwalHelper.loading('Đang xử lý...', 'Vui lòng đợi');
            window.location.href = `/admin/order/confirm/${orderId}`;
        }
    });
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
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            SwalHelper.loading('Đang xử lý...', 'Vui lòng đợi');
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
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            SwalHelper.loading('Đang xử lý...', 'Vui lòng đợi');
            window.location.href = `/admin/order/back/${orderId}`;
        }
    });
}
</script>

@endsection
