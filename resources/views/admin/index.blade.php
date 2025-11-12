@extends('admin.layout.master')

@section('content')
<div class="dashboard-container">
    <!-- Welcome Section - Redesigned -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="welcome-banner card">
                <div class="card-body p-4 p-lg-5">
                    <div class="row align-items-center">
                        <div class="col-lg-7">
                            <div class="welcome-content">
                                <h1 class="welcome-title">Chào mừng trở lại, {{ Auth::user()->name }}! 👋</h1>
                                <p class="welcome-subtitle">Quản lý hệ thống Nông Sản Việt một cách hiệu quả với các công cụ thông minh</p>
                                <div class="quick-stats">
                                    <div class="stat-item">
                                        <div class="stat-icon">
                                            <i class="fas fa-calendar-alt"></i>
                                        </div>
                                        <div class="stat-details">
                                            <span class="stat-label">Hôm nay</span>
                                            <span class="stat-value">{{ date('d/m/Y') }}</span>
                                        </div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="stat-icon">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                        <div class="stat-details">
                                            <span class="stat-label">Thời gian</span>
                                            <span class="stat-value">{{ date('H:i A') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="welcome-illustration">
                                <div class="illustration-grid">
                                    <div class="floating-element element-1">
                                        <i class="fas fa-chart-line"></i>
                                    </div>
                                    <div class="floating-element element-2">
                                        <i class="fas fa-leaf"></i>
                                    </div>
                                    <div class="floating-element element-3">
                                        <i class="fas fa-store"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced Stats Cards - Better Grid -->
    <div class="row g-4 mb-5">
        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="stats-card products-card">
                <div class="card-body p-4">
                    <div class="stats-header">
                        <div class="stats-icon products">
                            <i class="fas fa-leaf"></i>
                        </div>
                        <div class="stats-meta">
                            <div class="stats-trend positive">
                                <i class="fas fa-arrow-up"></i>
                                <span>+12%</span>
                            </div>
                        </div>
                    </div>
                    <div class="stats-content">
                        <h3 class="stats-number" data-count="{{$data['total_product']}}">0</h3>
                        <p class="stats-label">Sản phẩm</p>
                        <p class="stats-description">Tổng số sản phẩm hiện có</p>
                    </div>
                    <div class="stats-chart">
                        <canvas id="productsChart" width="100" height="30"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="stats-card orders-card">
                <div class="card-body p-4">
                    <div class="stats-header">
                        <div class="stats-icon orders">
                            <i class="fas fa-shopping-basket"></i>
                        </div>
                        <div class="stats-meta">
                            <div class="stats-trend positive">
                                <i class="fas fa-arrow-up"></i>
                                <span>+8%</span>
                            </div>
                        </div>
                    </div>
                    <div class="stats-content">
                        <h3 class="stats-number" data-count="{{$data['total_order']}}">0</h3>
                        <p class="stats-label">Đơn hàng</p>
                        <p class="stats-description">Tổng số đơn đã xử lý</p>
                    </div>
                    <div class="stats-chart">
                        <canvas id="ordersChart" width="100" height="30"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="stats-card revenue-card">
                <div class="card-body p-4">
                    <div class="stats-header">
                        <div class="stats-icon revenue">
                            <i class="fas fa-hand-holding-usd"></i>
                        </div>
                        <div class="stats-meta">
                            <div class="stats-trend positive">
                                <i class="fas fa-arrow-up"></i>
                                <span>+15%</span>
                            </div>
                        </div>
                    </div>
                    <div class="stats-content">
                        <h3 class="stats-number" data-count="{{$data['total_income']}}">0</h3>
                        <p class="stats-label">Doanh thu</p>
                        <p class="stats-description">Tổng doanh thu tháng này</p>
                    </div>
                    <div class="stats-chart">
                        <canvas id="revenueChart" width="100" height="30"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="stats-card users-card">
                <div class="card-body p-4">
                    <div class="stats-header">
                        <div class="stats-icon users">
                            <i class="fas fa-user-friends"></i>
                        </div>
                        <div class="stats-meta">
                            <div class="stats-trend positive">
                                <i class="fas fa-arrow-up"></i>
                                <span>+6%</span>
                            </div>
                        </div>
                    </div>
                    <div class="stats-content">
                        <h3 class="stats-number" data-count="{{ intval($data['total_order'] * 0.85) }}">0</h3>
                        <p class="stats-label">Khách hàng</p>
                        <p class="stats-description">Tổng số khách hàng</p>
                    </div>
                    <div class="stats-chart">
                        <canvas id="usersChart" width="100" height="30"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Row - Better Layout -->
    <div class="row g-4 mb-5">
        <!-- Sales Chart - Improved -->
        <div class="col-lg-8">
            <div class="chart-card main-chart-card">
                <div class="card-body p-4 p-lg-5">
                    <div class="chart-header">
                        <div class="chart-title-section">
                            <h3 class="chart-title">
                                <i class="fas fa-chart-area me-2"></i>
                                Doanh số bán hàng
                            </h3>
                            <p class="chart-subtitle">Theo dõi xu hướng bán hàng theo thời gian</p>
                        </div>
                        <div class="chart-controls">
                            <form class="filter-form">
                                <div class="select-wrapper">
                                    <select name="month" class="modern-select" onchange="this.form.submit()">
                                        @for ($i = 1; $i < 13; $i++)
                                            @if (request('month') == $i)
                                                <option value="{{$i}}" selected>Tháng {{$i}}</option>
                                            @elseif (request('month') == '' AND date('m') == $i)
                                                <option value="{{$i}}" selected>Tháng {{$i}}</option>
                                            @else
                                                <option value="{{$i}}">Tháng {{$i}}</option> 
                                            @endif
                                        @endfor
                                    </select>
                                    <i class="fas fa-chevron-down select-icon"></i>
                                </div>
                            </form>
                            <div class="chart-actions">
                                <button class="chart-action-btn" title="Xuất báo cáo">
                                    <i class="fas fa-file-download"></i>
                                </button>
                                <button class="chart-action-btn" title="Làm mới">
                                    <i class="fas fa-sync-alt"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="chart-summary-stats">
                        <div class="summary-item">
                            <div class="summary-icon revenue-icon">
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                            <div class="summary-details">
                                <span class="summary-value">{{ number_format(array_sum($totalSalesByDay)) }}đ</span>
                                <span class="summary-label">Tổng doanh thu</span>
                            </div>
                        </div>
                        <div class="summary-item">
                            <div class="summary-icon orders-icon">
                                <i class="fas fa-shopping-bag"></i>
                            </div>
                            <div class="summary-details">
                                <span class="summary-value">{{ count($totalSalesByDay) }}</span>
                                <span class="summary-label">Ngày hoạt động</span>
                            </div>
                        </div>
                        <div class="summary-item">
                            <div class="summary-icon growth-icon">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <div class="summary-details">
                                <span class="summary-value">+15%</span>
                                <span class="summary-label">Tăng trưởng</span>
                            </div>
                        </div>
                    </div>

                    <div class="chart-container">
                        <div id="sales"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Performance Card - Redesigned -->
        <div class="col-lg-4">
            <div class="performance-card">
                <div class="card-body p-4">
                    <div class="performance-header">
                        <h3 class="performance-title">
                            <i class="fas fa-tachometer-alt me-2"></i>
                            Hiệu suất hôm nay
                        </h3>
                        <div class="performance-score">
                            <span class="score-value">{{ rand(75, 95) }}%</span>
                        </div>
                    </div>
                    
                    <div class="performance-chart">
                        <canvas id="performanceDonut" width="160" height="160"></canvas>
                        <div class="chart-center">
                            <div class="center-value">{{ rand(75, 95) }}%</div>
                            <div class="center-label">Tổng thể</div>
                        </div>
                    </div>
                    
                    <div class="performance-metrics">
                        <div class="metric-item">
                            <div class="metric-icon orders-metric">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <div class="metric-info">
                                <span class="metric-title">Đơn hàng mới</span>
                                <span class="metric-value">{{ rand(15, 45) }} đơn</span>
                            </div>
                            <div class="metric-progress">
                                <div class="progress-circle" data-percentage="75">
                                    <span>75%</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="metric-item">
                            <div class="metric-icon views-metric">
                                <i class="fas fa-eye"></i>
                            </div>
                            <div class="metric-info">
                                <span class="metric-title">Lượt xem</span>
                                <span class="metric-value">{{ number_format(rand(250, 800)) }} lượt</span>
                            </div>
                            <div class="metric-progress">
                                <div class="progress-circle" data-percentage="62">
                                    <span>62%</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="metric-item">
                            <div class="metric-icon reviews-metric">
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="metric-info">
                                <span class="metric-title">Đánh giá</span>
                                <span class="metric-value">{{ rand(10, 30) }} đánh giá</span>
                            </div>
                            <div class="metric-progress">
                                <div class="progress-circle" data-percentage="88">
                                    <span>88%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Analytics Row - Improved Grid -->
    <div class="row g-4 mb-5">
        <div class="col-lg-4">
            <div class="analytics-card">
                <div class="card-body p-4">
                    <div class="analytics-header">
                        <h4 class="analytics-title">
                            <i class="fas fa-chart-pie me-2"></i>
                            Phân tích bán hàng
                        </h4>
                        <div class="analytics-badge">
                            <span>+12%</span>
                        </div>
                    </div>
                    <div class="analytics-chart">
                        <canvas id="salesAnalytics" width="180" height="180"></canvas>
                    </div>
                    <div class="analytics-summary">
                        <div class="summary-metric">
                            <span class="metric-number">{{number_format($data['total_product'])}}</span>
                            <span class="metric-label">Sản phẩm</span>
                        </div>
                        <div class="summary-metric">
                            <span class="metric-number">{{ rand(15, 35) }}%</span>
                            <span class="metric-label">Tăng trưởng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="analytics-card">
                <div class="card-body p-4">
                    <div class="analytics-header">
                        <h4 class="analytics-title">
                            <i class="fas fa-chart-bar me-2"></i>
                            Xu hướng đơn hàng
                        </h4>
                        <div class="analytics-badge success">
                            <span>+18%</span>
                        </div>
                    </div>
                    <div class="analytics-chart">
                        <canvas id="orderTrend" width="180" height="180"></canvas>
                    </div>
                    <div class="analytics-summary">
                        <div class="summary-metric">
                            <span class="metric-number">{{number_format($data['total_order'])}}</span>
                            <span class="metric-label">Đơn hàng</span>
                        </div>
                        <div class="summary-metric">
                            <span class="metric-number">{{ rand(20, 40) }}%</span>
                            <span class="metric-label">Hoàn thành</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="analytics-card">
                <div class="card-body p-4">
                    <div class="analytics-header">
                        <h4 class="analytics-title">
                            <i class="fas fa-clock me-2"></i>
                            Thu nhập theo giờ
                        </h4>
                        <div class="analytics-badge warning">
                            <span>{{ rand(10, 25) }}%</span>
                        </div>
                    </div>
                    <div class="analytics-chart">
                        <canvas id="hourlyRevenue" width="180" height="180"></canvas>
                    </div>
                    <div class="analytics-summary">
                        <div class="summary-metric">
                            <span class="metric-number">{{ number_format(intval($data['total_income']/24)) }}đ</span>
                            <span class="metric-label">TB/giờ</span>
                        </div>
                        <div class="summary-metric">
                            <span class="metric-number">24h</span>
                            <span class="metric-label">Hoạt động</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Tables Section - Improved -->
    <div class="row g-4">
        <div class="col-lg-6">
            <div class="data-table-card">
                <div class="card-header">
                    <div class="table-header">
                        <h3 class="table-title">
                            <i class="fas fa-fire me-2"></i>
                            Sản phẩm bán chạy
                        </h3>
                        <div class="table-actions">
                            <button class="btn btn-outline-success btn-sm">
                                <i class="fas fa-file-excel me-1"></i>
                                Xuất Excel
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table modern-table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Sản phẩm</th>
                                    <th>Đã bán</th>
                                    <th>Xu hướng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bestSellingProducts as $key=>$product)
                                <tr>
                                    <td>
                                        <div class="rank-badge rank-{{ $key + 1 }}">
                                            {{ $key + 1 }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="product-info">
                                            <div class="product-avatar">
                                                {{ substr($product->name, 0, 2) }}
                                            </div>
                                            <div class="product-details">
                                                <a href="{{route('product.show', $product)}}" class="product-name">
                                                    {{ Str::limit($product->name, 25) }}
                                                </a>
                                                <span class="product-category">Nông sản</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="sold-count">{{ $product->sold }}</span>
                                    </td>
                                    <td>
                                        <div class="trend-indicator positive">
                                            <i class="fas fa-trending-up"></i>
                                            <span>+{{ rand(5, 25) }}%</span>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="data-table-card">
                <div class="card-header">
                    <div class="table-header">
                        <h3 class="table-title">
                            <i class="fas fa-history me-2"></i>
                            Đơn hàng gần đây
                        </h3>
                        <div class="table-actions">
                            <button class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-external-link-alt me-1"></i>
                                Xem tất cả
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table modern-table mb-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Khách hàng</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($latestOrders as $key=>$order)
                                <tr>
                                    <td>
                                        <span class="order-id">#{{ 1000 + $order->id }}</span>
                                    </td>
                                    <td>
                                        <div class="customer-info">
                                            <div class="customer-avatar">
                                                {{ substr($order->name, 0, 2) }}
                                            </div>
                                            <div class="customer-details">
                                                <span class="customer-name">{{ Str::limit($order->name, 20) }}</span>
                                                <span class="customer-time">{{ $order->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="order-total">{{ number_format($order->total_price) }}đ</span>
                                    </td>
                                    <td>
                                        <span class="status-badge completed">
                                            <i class="fas fa-check-circle"></i>
                                            Hoàn thành
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Dashboard Container - Enhanced Spacing */
.dashboard-container {
    padding: 2rem;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    min-height: 100vh;
}

/* Welcome Banner - Enhanced Spacing */
.welcome-banner {
    background: linear-gradient(135deg, var(--primary-color) 0%, #059669 100%);
    border: none;
    border-radius: 24px;
    overflow: hidden;
    position: relative;
    box-shadow: 0 20px 40px rgba(34, 197, 94, 0.15);
    margin-bottom: 0.5rem;
}

.welcome-banner .card-body {
    padding: 3rem 2rem;
    position: relative;
    z-index: 2;
}

.welcome-banner::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -20%;
    width: 400px;
    height: 400px;
    background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
    border-radius: 50%;
    animation: pulse 4s ease-in-out infinite;
}

.welcome-content {
    padding-right: 2rem;
}

.welcome-title {
    color: white;
    font-size: 1.875rem; /* Reduced from 2.25rem */
    font-weight: 600; /* Reduced from 700 */
    margin-bottom: 1.5rem;
    text-shadow: 0 2px 10px rgba(0,0,0,0.1);
    line-height: 1.2;
}

.welcome-subtitle {
    color: rgba(255,255,255,0.9);
    font-size: 1rem; /* Reduced from 1.125rem */
    margin-bottom: 2.5rem;
    line-height: 1.6;
    max-width: 90%;
    font-weight: 400; /* Added normal weight */
}

.quick-stats {
    display: flex;
    gap: 2.5rem;
    margin-top: 2rem;
}

.stat-item {
    display: flex;
    align-items: center;
    gap: 1.25rem;
    padding: 1rem 1.5rem;
    background: rgba(255,255,255,0.1);
    border-radius: 16px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.2);
    transition: all 0.3s ease;
}

.stat-item:hover {
    background: rgba(255,255,255,0.15);
    transform: translateY(-2px);
}

.stat-icon {
    width: 56px;
    height: 56px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: white;
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    position: relative;
    overflow: hidden;
}

.stat-icon::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255,255,255,0.3) 0%, transparent 70%);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.stats-card:hover .stat-icon::before {
    opacity: 1;
    animation: shimmer 1.5s ease-in-out;
}

@keyframes shimmer {
    0% { transform: rotate(0deg) scale(0); }
    50% { transform: rotate(180deg) scale(1); }
    100% { transform: rotate(360deg) scale(0); }
}

.stat-details {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.stat-label {
    color: rgba(255,255,255,0.8);
    font-size: 0.75rem; /* Reduced from 0.875rem */
    font-weight: 500;
}

.stat-value {
    color: white;
    font-size: 1rem; /* Reduced from 1.125rem */
    font-weight: 600; /* Reduced from 700 */
}

/* Welcome Illustration - Enhanced */
.welcome-illustration {
    position: relative;
    height: 180px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 1rem;
}

.illustration-grid {
    position: relative;
    width: 220px;
    height: 160px;
}

.floating-element {
    position: absolute;
    width: 70px;
    height: 70px;
    background: rgba(255,255,255,0.15);
    border-radius: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: rgba(255,255,255,0.9);
    font-size: 1.5rem;
    backdrop-filter: blur(10px);
    animation: float 3s ease-in-out infinite;
    border: 2px solid rgba(255,255,255,0.2);
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
}

.element-1 {
    top: 10px;
    right: 10px;
    animation-delay: 0s;
}

.element-2 {
    bottom: 10px;
    left: 10px;
    animation-delay: 1s;
}

.element-3 {
    top: 50%;
    right: -51%;
    transform: translate(50%, -50%);
    animation-delay: 2s;
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
}

/* Stats Cards - Enhanced Spacing */
.stats-card {
    background: white;
    border: none;
    border-radius: 20px;
    box-shadow: 0 8px 30px rgba(0,0,0,0.08);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    overflow: hidden;
    position: relative;
    height: 100%;
}

.stats-card .card-body {
    padding: 2rem;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.stats-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 5px;
}

.stats-card.products-card::before { background: linear-gradient(90deg, #10b981 0%, #059669 100%); }
.stats-card.orders-card::before { background: linear-gradient(90deg, #3b82f6 0%, #1d4ed8 100%); }
.stats-card.revenue-card::before { background: linear-gradient(90deg, #f59e0b 0%, #d97706 100%); }
.stats-card.users-card::before { background: linear-gradient(90deg, #8b5cf6 0%, #7c3aed 100%); }

.stats-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 25px 50px rgba(0,0,0,0.12);
}

.stats-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
}

.stats-icon {
    width: 56px;
    height: 56px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: white;
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    position: relative;
    overflow: hidden;
}

.stats-icon::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255,255,255,0.3) 0%, transparent 70%);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.stats-card:hover .stats-icon::before {
    opacity: 1;
    animation: shimmer 1.5s ease-in-out;
}

@keyframes shimmer {
    0% { transform: rotate(0deg) scale(0); }
    50% { transform: rotate(180deg) scale(1); }
    100% { transform: rotate(360deg) scale(0); }
}

.stats-icon.products { 
    background: linear-gradient(135deg, #10b981 0%, #059669 100%); 
    box-shadow: 0 8px 20px rgba(16, 185, 129, 0.3);
}

.stats-icon.orders { 
    background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%); 
    box-shadow: 0 8px 20px rgba(59, 130, 246, 0.3);
}

.stats-icon.revenue { 
    background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); 
    box-shadow: 0 8px 20px rgba(245, 158, 11, 0.3);
}

.stats-icon.users { 
    background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%); 
    box-shadow: 0 8px 20px rgba(139, 92, 246, 0.3);
}

/* Enhanced Floating Elements */
.floating-element {
    position: absolute;
    width: 70px;
    height: 70px;
    background: rgba(255,255,255,0.15);
    border-radius: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: rgba(255,255,255,0.9);
    font-size: 1.5rem;
    backdrop-filter: blur(10px);
    animation: float 3s ease-in-out infinite;
    border: 2px solid rgba(255,255,255,0.2);
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
}

.element-1 {
    top: 10px;
    right: 10px;
    animation-delay: 0s;
}

.element-2 {
    bottom: 10px;
    left: 10px;
    animation-delay: 1s;
}

.element-3 {
    top: 50%;
    right: -51%;
    transform: translate(50%, -50%);
    animation-delay: 2s;
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
}

/* Stats Cards - Enhanced Spacing */
.stats-card {
    background: white;
    border: none;
    border-radius: 20px;
    box-shadow: 0 8px 30px rgba(0,0,0,0.08);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    overflow: hidden;
    position: relative;
    height: 100%;
}

.stats-card .card-body {
    padding: 2rem;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.stats-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 5px;
}

.stats-card.products-card::before { background: linear-gradient(90deg, #10b981 0%, #059669 100%); }
.stats-card.orders-card::before { background: linear-gradient(90deg, #3b82f6 0%, #1d4ed8 100%); }
.stats-card.revenue-card::before { background: linear-gradient(90deg, #f59e0b 0%, #d97706 100%); }
.stats-card.users-card::before { background: linear-gradient(90deg, #8b5cf6 0%, #7c3aed 100%); }

.stats-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 25px 50px rgba(0,0,0,0.12);
}

.stats-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
}

.stats-icon {
    width: 56px;
    height: 56px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: white;
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    position: relative;
    overflow: hidden;
}

.stats-icon::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255,255,255,0.3) 0%, transparent 70%);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.stats-card:hover .stats-icon::before {
    opacity: 1;
    animation: shimmer 1.5s ease-in-out;
}

@keyframes shimmer {
    0% { transform: rotate(0deg) scale(0); }
    50% { transform: rotate(180deg) scale(1); }
    100% { transform: rotate(360deg) scale(0); }
}

.stats-icon.products { 
    background: linear-gradient(135deg, #10b981 0%, #059669 100%); 
    box-shadow: 0 8px 20px rgba(16, 185, 129, 0.3);
}

.stats-icon.orders { 
    background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%); 
    box-shadow: 0 8px 20px rgba(59, 130, 246, 0.3);
}

.stats-icon.revenue { 
    background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); 
    box-shadow: 0 8px 20px rgba(245, 158, 11, 0.3);
}

.stats-icon.users { 
    background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%); 
    box-shadow: 0 8px 20px rgba(139, 92, 246, 0.3);
}

/* Enhanced Summary Icons */
.summary-icon {
    width: 48px;
    height: 48px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.125rem;
    flex-shrink: 0;
    position: relative;
    overflow: hidden;
}

.summary-icon::after {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
    transition: left 0.5s ease;
}

.summary-item:hover .summary-icon::after {
    left: 100%;
}

.revenue-icon { 
    background: linear-gradient(135deg, #10b981 0%, #059669 100%); 
    box-shadow: 0 4px 15px rgba(16, 185, 129, 0.2);
}

.orders-icon { 
    background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%); 
    box-shadow: 0 4px 15px rgba(59, 130, 246, 0.2);
}

.growth-icon { 
    background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); 
    box-shadow: 0 4px 15px rgba(245, 158, 11, 0.2);
}

/* Chart Cards - Enhanced Spacing */
.chart-card {
    background: white;
    border: none;
    border-radius: 24px;
    box-shadow: 0 8px 30px rgba(0,0,0,0.08);
    height: 100%;
}

.chart-card .card-body {
    padding: 2.5rem;
}

.main-chart-card {
    border: 1px solid rgba(226, 232, 240, 0.5);
}

.chart-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 2.5rem;
    padding-bottom: 2rem;
    border-bottom: 2px solid #f1f5f9;
}

.chart-title-section {
    flex: 1;
    margin-right: 2rem;
}

.chart-title {
    font-size: 1.5rem; /* Reduced from 1.75rem */
    font-weight: 600; /* Reduced from 700 */
    color: var(--text-primary);
    margin-bottom: 0.75rem;
    display: flex;
    align-items: center;
}

.chart-subtitle {
    color: var(--text-secondary);
    font-size: 0.875rem; /* Reduced from 1rem */
    margin: 0;
    line-height: 1.5;
    font-weight: 400; /* Added normal weight */
}

.chart-controls {
    display: flex;
    align-items: center;
    gap: 1.5rem;
}

.select-wrapper {
    position: relative;
}

.modern-select {
    appearance: none;
    background: white;
    border: 2px solid var(--border-color);
    border-radius: 12px;
    padding: 1rem 3rem 1rem 1.5rem;
    font-weight: 500;
    min-width: 140px;
    cursor: pointer;
    font-size: 0.8rem; /* Reduced from 0.875rem */
    transition: all 0.3s ease;
}

.modern-select:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.1);
    outline: none;
}

.select-icon {
    position: absolute;
    right: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-secondary);
    pointer-events: none;
}

.chart-actions {
    display: flex;
    gap: 0.75rem;
}

.chart-action-btn {
    width: 40px; /* Reduced from 44px */
    height: 40px; /* Reduced from 44px */
    background: white;
    border: 2px solid var(--border-color);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 0.8rem; /* Reduced from 0.875rem */
}

.chart-action-btn:hover {
    background: var(--primary-color);
    border-color: var(--primary-color);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(34, 197, 94, 0.25);
}

.chart-summary-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
    padding: 2rem;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    border-radius: 20px;
    border: 1px solid rgba(226, 232, 240, 0.5);
}

.summary-item {
    display: flex;
    align-items: center;
    gap: 1.5rem;
    padding: 1rem;
    background: white;
    border-radius: 16px;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
}

.summary-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
}

.summary-icon {
    width: 48px;
    height: 48px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.125rem;
    flex-shrink: 0;
    position: relative;
    overflow: hidden;
}

.summary-icon::after {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
    transition: left 0.5s ease;
}

.summary-item:hover .summary-icon::after {
    left: 100%;
}

.revenue-icon { 
    background: linear-gradient(135deg, #10b981 0%, #059669 100%); 
    box-shadow: 0 4px 15px rgba(16, 185, 129, 0.2);
}

.orders-icon { 
    background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%); 
    box-shadow: 0 4px 15px rgba(59, 130, 246, 0.2);
}

.growth-icon { 
    background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); 
    box-shadow: 0 4px 15px rgba(245, 158, 11, 0.2);
}

/* Chart Cards - Enhanced Spacing */
.chart-card {
    background: white;
    border: none;
    border-radius: 24px;
    box-shadow: 0 8px 30px rgba(0,0,0,0.08);
    height: 100%;
}

.chart-card .card-body {
    padding: 2.5rem;
}

.main-chart-card {
    border: 1px solid rgba(226, 232, 240, 0.5);
}

.chart-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 2.5rem;
    padding-bottom: 2rem;
    border-bottom: 2px solid #f1f5f9;
}

.chart-title-section {
    flex: 1;
    margin-right: 2rem;
}

.chart-title {
    font-size: 1.5rem; /* Reduced from 1.75rem */
    font-weight: 600; /* Reduced from 700 */
    color: var(--text-primary);
    margin-bottom: 0.75rem;
    display: flex;
    align-items: center;
}

.chart-subtitle {
    color: var(--text-secondary);
    font-size: 0.875rem; /* Reduced from 1rem */
    margin: 0;
    line-height: 1.5;
    font-weight: 400; /* Added normal weight */
}

.chart-controls {
    display: flex;
    align-items: center;
    gap: 1.5rem;
}

.select-wrapper {
    position: relative;
}

.modern-select {
    appearance: none;
    background: white;
    border: 2px solid var(--border-color);
    border-radius: 12px;
    padding: 1rem 3rem 1rem 1.5rem;
    font-weight: 500;
    min-width: 140px;
    cursor: pointer;
    font-size: 0.8rem; /* Reduced from 0.875rem */
    transition: all 0.3s ease;
}

.modern-select:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.1);
    outline: none;
}

.select-icon {
    position: absolute;
    right: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-secondary);
    pointer-events: none;
}

.chart-actions {
    display: flex;
    gap: 0.75rem;
}

.chart-action-btn {
    width: 40px; /* Reduced from 44px */
    height: 40px; /* Reduced from 44px */
    background: white;
    border: 2px solid var(--border-color);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 0.8rem; /* Reduced from 0.875rem */
}

.chart-action-btn:hover {
    background: var(--primary-color);
    border-color: var(--primary-color);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(34, 197, 94, 0.25);
}

.chart-summary-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
    padding: 2rem;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    border-radius: 20px;
    border: 1px solid rgba(226, 232, 240, 0.5);
}

.summary-item {
    display: flex;
    align-items: center;
    gap: 1.5rem;
    padding: 1rem;
    background: white;
    border-radius: 16px;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
}

.summary-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
}

.summary-icon {
    width: 48px;
    height: 48px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.125rem;
    flex-shrink: 0;
    position: relative;
    overflow: hidden;
}

.summary-icon::after {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
    transition: left 0.5s ease;
}

.summary-item:hover .summary-icon::after {
    left: 100%;
}

.revenue-icon { 
    background: linear-gradient(135deg, #10b981 0%, #059669 100%); 
    box-shadow: 0 4px 15px rgba(16, 185, 129, 0.2);
}

.orders-icon { 
    background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%); 
    box-shadow: 0 4px 15px rgba(59, 130, 246, 0.2);
}

.growth-icon { 
    background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); 
    box-shadow: 0 4px 15px rgba(245, 158, 11, 0.2);
}

/* Chart Cards - Enhanced Spacing */
.chart-card {
    background: white;
    border: none;
    border-radius: 24px;
    box-shadow: 0 8px 30px rgba(0,0,0,0.08);
    height: 100%;
}

.chart-card .card-body {
    padding: 2.5rem;
}

.main-chart-card {
    border: 1px solid rgba(226, 232, 240, 0.5);
}

.chart-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 2.5rem;
    padding-bottom: 2rem;
    border-bottom: 2px solid #f1f5f9;
}

.chart-title-section {
    flex: 1;
    margin-right: 2rem;
}

.chart-title {
    font-size: 1.5rem; /* Reduced from 1.75rem */
    font-weight: 600; /* Reduced from 700 */
    color: var(--text-primary);
    margin-bottom: 0.75rem;
    display: flex;
    align-items: center;
}

.chart-subtitle {
    color: var(--text-secondary);
    font-size: 0.875rem; /* Reduced from 1rem */
    margin: 0;
    line-height: 1.5;
    font-weight: 400; /* Added normal weight */
}

.chart-controls {
    display: flex;
    align-items: center;
    gap: 1.5rem;
}

.select-wrapper {
    position: relative;
}

.modern-select {
    appearance: none;
    background: white;
    border: 2px solid var(--border-color);
    border-radius: 12px;
    padding: 1rem 3rem 1rem 1.5rem;
    font-weight: 500;
    min-width: 140px;
    cursor: pointer;
    font-size: 0.8rem; /* Reduced from 0.875rem */
    transition: all 0.3s ease;
}

.modern-select:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.1);
    outline: none;
}

.select-icon {
    position: absolute;
    right: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-secondary);
    pointer-events: none;
}

.chart-actions {
    display: flex;
    gap: 0.75rem;
}

.chart-action-btn {
    width: 40px; /* Reduced from 44px */
    height: 40px; /* Reduced from 44px */
    background: white;
    border: 2px solid var(--border-color);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 0.8rem; /* Reduced from 0.875rem */
}

.chart-action-btn:hover {
    background: var(--primary-color);
    border-color: var(--primary-color);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(34, 197, 94, 0.25);
}

.chart-summary-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
    padding: 2rem;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    border-radius: 20px;
    border: 1px solid rgba(226, 232, 240, 0.5);
}

.summary-item {
    display: flex;
    align-items: center;
    gap: 1.5rem;
    padding: 1rem;
    background: white;
    border-radius: 16px;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
}

.summary-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
}

.summary-icon {
    width: 48px;
    height: 48px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.125rem;
    flex-shrink: 0;
    position: relative;
    overflow: hidden;
}

.summary-icon::after {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
    transition: left 0.5s ease;
}

.summary-item:hover .summary-icon::after {
    left: 100%;
}

.revenue-icon { 
    background: linear-gradient(135deg, #10b981 0%, #059669 100%); 
    box-shadow: 0 4px 15px rgba(16, 185, 129, 0.2);
}

.orders-icon { 
    background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%); 
    box-shadow: 0 4px 15px rgba(59, 130, 246, 0.2);
}

.growth-icon { 
    background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); 
    box-shadow: 0 4px 15px rgba(245, 158, 11, 0.2);
}

/* Chart Cards - Enhanced Spacing */
.chart-card {
    background: white;
    border: none;
    border-radius: 24px;
    box-shadow: 0 8px 30px rgba(0,0,0,0.08);
    height: 100%;
}

.chart-card .card-body {
    padding: 2.5rem;
}

.main-chart-card {
    border: 1px solid rgba(226, 232, 240, 0.5);
}

.chart-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 2.5rem;
    padding-bottom: 2rem;
    border-bottom: 2px solid #f1f5f9;
}

.chart-title-section {
    flex: 1;
    margin-right: 2rem;
}

.chart-title {
    font-size: 1.5rem; /* Reduced from 1.75rem */
    font-weight: 600; /* Reduced from 700 */
    color: var(--text-primary);
    margin-bottom: 0.75rem;
    display: flex;
    align-items: center;
}

.chart-subtitle {
    color: var(--text-secondary);
    font-size: 0.875rem; /* Reduced from 1rem */
    margin: 0;
    line-height: 1.5;
    font-weight: 400; /* Added normal weight */
}

.chart-controls {
    display: flex;
    align-items: center;
    gap: 1.5rem;
}

.select-wrapper {
    position: relative;
}

.modern-select {
    appearance: none;
    background: white;
    border: 2px solid var(--border-color);
    border-radius: 12px;
    padding: 1rem 3rem 1rem 1.5rem;
    font-weight: 500;
    min-width: 140px;
    cursor: pointer;
    font-size: 0.8rem; /* Reduced from 0.875rem */
    transition: all 0.3s ease;
}

.modern-select:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.1);
    outline: none;
}

.select-icon {
    position: absolute;
    right: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-secondary);
    pointer-events: none;
}

.chart-actions {
    display: flex;
    gap: 0.75rem;
}

.chart-action-btn {
    width: 40px; /* Reduced from 44px */
    height: 40px; /* Reduced from 44px */
    background: white;
    border: 2px solid var(--border-color);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 0.8rem; /* Reduced from 0.875rem */
}

.chart-action-btn:hover {
    background: var(--primary-color);
    border-color: var(--primary-color);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(34, 197, 94, 0.25);
}

.chart-summary-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
    padding: 2rem;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    border-radius: 20px;
    border: 1px solid rgba(226, 232, 240, 0.5);
}

.summary-item {
    display: flex;
    align-items: center;
    gap: 1.5rem;
    padding: 1rem;
    background: white;
    border-radius: 16px;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
}

.summary-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
}

.summary-icon {
    width: 48px;
    height: 48px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.125rem;
    flex-shrink: 0;
    position: relative;
    overflow: hidden;
}

.summary-icon::after {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
    transition: left 0.5s ease;
}

.summary-item:hover .summary-icon::after {
    left: 100%;
}

.revenue-icon { 
    background: linear-gradient(135deg, #10b981 0%, #059669 100%); 
    box-shadow: 0 4px 15px rgba(16, 185, 129, 0.2);
}

.orders-icon { 
    background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%); 
    box-shadow: 0 4px 15px rgba(59, 130, 246, 0.2);
}

.growth-icon { 
    background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); 
    box-shadow: 0 4px 15px rgba(245, 158, 11, 0.2);
}

/* Chart Cards - Enhanced Spacing */
.chart-card {
    background: white;
    border: none;
    border-radius: 24px;
    box-shadow: 0 8px 30px rgba(0,0,0,0.08);
    height: 100%;
}

.chart-card .card-body {
    padding: 2.5rem;
}

.main-chart-card {
    border: 1px solid rgba(226, 232, 240, 0.5);
}

.chart-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 2.5rem;
    padding-bottom: 2rem;
    border-bottom: 2px solid #f1f5f9;
}

.chart-title-section {
    flex: 1;
    margin-right: 2rem;
}

.chart-title {
    font-size: 1.5rem; /* Reduced from 1.75rem */
    font-weight: 600; /* Reduced from 700 */
    color: var(--text-primary);
    margin-bottom: 0.75rem;
    display: flex;
    align-items: center;
}

.chart-subtitle {
    color: var(--text-secondary);
    font-size: 0.875rem; /* Reduced from 1rem */
    margin: 0;
    line-height: 1.5;
    font-weight: 400; /* Added normal weight */
}

.chart-controls {
    display: flex;
    align-items: center;
    gap: 1.5rem;
}

.select-wrapper {
    position: relative;
}

.modern-select {
    appearance: none;
    background: white;
    border: 2px solid var(--border-color);
    border-radius: 12px;
    padding: 1rem 3rem 1rem 1.5rem;
    font-weight: 500;
    min-width: 140px;
    cursor: pointer;
    font-size: 0.8rem; /* Reduced from 0.875rem */
    transition: all 0.3s ease;
}

.modern-select:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.1);
    outline: none;
}

.select-icon {
    position: absolute;
    right: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-secondary);
    pointer-events: none;
}

.chart-actions {
    display: flex;
    gap: 0.75rem;
}

.chart-action-btn {
    width: 40px; /* Reduced from 44px */
    height: 40px; /* Reduced from 44px */
    background: white;
    border: 2px solid var(--border-color);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 0.8rem; /* Reduced from 0.875rem */
}

.chart-action-btn:hover {
    background: var(--primary-color);
    border-color: var(--primary-color);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(34, 197, 94, 0.25);
}

.chart-summary-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
    padding: 2rem;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    border-radius: 20px;
    border: 1px solid rgba(226, 232, 240, 0.5);
}

.summary-item {
    display: flex;
    align-items: center;
    gap: 1.5rem;
    padding: 1rem;
    background: white;
    border-radius: 16px;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
}

.summary-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
}

.summary-icon {
    width: 48px;
    height: 48px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.125rem;
    flex-shrink: 0;
    position: relative;
    overflow: hidden;
}

.summary-icon::after {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
    transition: left 0.5s ease;
}

.summary-item:hover .summary-icon::after {
    left: 100%;
}

.revenue-icon { 
    background: linear-gradient(135deg, #10b981 0%, #059669 100%); 
    box-shadow: 0 4px 15px rgba(16, 185, 129, 0.2);
}

.orders-icon { 
    background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%); 
    box-shadow: 0 4px 15px rgba(59, 130, 246, 0.2);
}

.growth-icon { 
    background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); 
    box-shadow: 0 4px 15px rgba(245, 158, 11, 0.2);
}

/* Chart Cards - Enhanced Spacing */
.chart-card {
    background: white;
    border: none;
    border-radius: 24px;
    box-shadow: 0 8px 30px rgba(0,0,0,0.08);
    height: 100%;
}

.chart-card .card-body {
    padding: 2.5rem;
}

.main-chart-card {
    border: 1px solid rgba(226, 232, 240, 0.5);
}

.chart-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 2.5rem;
    padding-bottom: 2rem;
    border-bottom: 2px solid #f1f5f9;
}

.chart-title-section {
    flex: 1;
    margin-right: 2rem;
}

.chart-title {
    font-size: 1.5rem; /* Reduced from 1.75rem */
    font-weight: 600; /* Reduced from 700 */
    color: var(--text-primary);
    margin-bottom: 0.75rem;
    display: flex;
    align-items: center;
}

.chart-subtitle {
    color: var(--text-secondary);
    font-size: 0.875rem; /* Reduced from 1rem */
    margin: 0;
    line-height: 1.5;
    font-weight: 400; /* Added normal weight */
}

.chart-controls {
    display: flex;
    align-items: center;
    gap: 1.5rem;
}

.select-wrapper {
    position: relative;
}

.modern-select {
    appearance: none;
    background: white;
    border: 2px solid var(--border-color);
    border-radius: 12px;
    padding: 1rem 3rem 1rem 1.5rem;
    font-weight: 500;
    min-width: 140px;
    cursor: pointer;
    font-size: 0.8rem; /* Reduced from 0.875rem */
    transition: all 0.3s ease;
}

.modern-select:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.1);
    outline: none;
}

.select-icon {
    position: absolute;
    right: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-secondary);
    pointer-events: none;
}

.chart-actions {
    display: flex;
    gap: 0.75rem;
}

.chart-action-btn {
    width: 40px; /* Reduced from 44px */
    height: 40px; /* Reduced from 44px */
    background: white;
    border: 2px solid var(--border-color);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 0.8rem; /* Reduced from 0.875rem */
}

.chart-action-btn:hover {
    background: var(--primary-color);
    border-color: var(--primary-color);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(34, 197, 94, 0.25);
}

.chart-summary-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
    padding: 2rem;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    border-radius: 20px;
    border: 1px solid rgba(226, 232, 240, 0.5);
}

.summary-item {
    display: flex;
    align-items: center;
    gap: 1.5rem;
    padding: 1rem;
    background: white;
    border-radius: 16px;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
}

.summary-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
}

.summary-icon {
    width: 48px;
    height: 48px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.125rem;
    flex-shrink: 0;
    position: relative;
    overflow: hidden;
}

.summary-icon::after {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
    transition: left 0.5s ease;
}

.summary-item:hover .summary-icon::after {
    left: 100%;
}

.revenue-icon { 
    background: linear-gradient(135deg, #10b981 0%, #059669 100%); 
    box-shadow: 0 4px 15px rgba(16, 185, 129, 0.2);
}

.orders-icon { 
    background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%); 
    box-shadow: 0 4px 15px rgba(59, 130, 246, 0.2);
}

.growth-icon { 
    background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); 
    box-shadow: 0 4px 15px rgba(245, 158, 11, 0.2);
}

/* Chart Cards - Enhanced Spacing */
.chart-card {
    background: white;
    border: none;
    border-radius: 24px;
    box-shadow: 0 8px 30px rgba(0,0,0,0.08);
    height: 100%;
}

.chart-card .card-body {
    padding: 2.5rem;
}

.main-chart-card {
    border: 1px solid rgba(226, 232, 240, 0.5);
}

.chart-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 2.5rem;
    padding-bottom: 2rem;
    border-bottom: 2px solid #f1f5f9;
}

.chart-title-section {
    flex: 1;
    margin-right: 2rem;
}

.chart-title {
    font-size: 1.5rem; /* Reduced from 1.75rem */
    font-weight: 600; /* Reduced from 700 */
    color: var(--text-primary);
    margin-bottom: 0.75rem;
    display: flex;
    align-items: center;
}

.chart-subtitle {
    color: var(--text-secondary);
    font-size: 0.875rem; /* Reduced from 1rem */
    margin: 0;
    line-height: 1.5;
    font-weight: 400; /* Added normal weight */
}

.chart-controls {
    display: flex;
    align-items: center;
    gap: 1.5rem;
}

.select-wrapper {
    position: relative;
}

.modern-select {
    appearance: none;
    background: white;
    border: 2px solid var(--border-color);
    border-radius: 12px;
    padding: 1rem 3rem 1rem 1.5rem;
    font-weight: 500;
    min-width: 140px;
    cursor: pointer;
    font-size: 0.8rem; /* Reduced from 0.875rem */
    transition: all 0.3s ease;
}

.modern-select:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.1);
    outline: none;
}

.select-icon {
    position: absolute;
    right: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-secondary);
    pointer-events: none;
}

.chart-actions {
    display: flex;
    gap: 0.75rem;
}

.chart-action-btn {
    width: 40px; /* Reduced from 44px */
    height: 40px; /* Reduced from 44px */
    background: white;
    border: 2px solid var(--border-color);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 0.8rem; /* Reduced from 0.875rem */
}

.chart-action-btn:hover {
    background: var(--primary-color);
    border-color: var(--primary-color);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(34, 197, 94, 0.25);
}

.chart-summary-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
    padding: 2rem;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    border-radius: 20px;
    border: 1px solid rgba(226, 232, 240, 0.5);
}

.summary-item {
    display: flex;
    align-items: center;
    gap: 1.5rem;
    padding: 1rem;
    background: white;
    border-radius: 16px;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
}

.summary-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
}

.summary-icon {
    width: 48px;
    height: 48px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.125rem;
    flex-shrink: 0;
    position: relative;
    overflow: hidden;
}

.summary-icon::after {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
    transition: left 0.5s ease;
}

.summary-item:hover .summary-icon::after {
    left: 100%;
}

.revenue-icon { 
    background: linear-gradient(135deg, #10b981 0%, #059669 100%); 
    box-shadow: 0 4px 15px rgba(16, 185, 129, 0.2);
}

.orders-icon { 
    background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%); 
    box-shadow: 0 4px 15px rgba(59, 130, 246, 0.2);
}

.growth-icon { 
    background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); 
    box-shadow: 0 4px 15px rgba(245, 158, 11, 0.2);
}

/* Chart Container - Enhanced */
.chart-container {
    padding: 1.5rem;
    background: rgba(255, 255, 255, 0.5);
    border-radius: 16px;
    border: 1px solid rgba(226, 232, 240, 0.5);
}

/* Performance Card - Enhanced Spacing */
.performance-card {
    background: white;
    border: none;
    border-radius: 24px;
    box-shadow: 0 8px 30px rgba(0,0,0,0.08);
    height: 100%;
}

.performance-card .card-body {
    padding: 2rem;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.performance-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2.5rem;
    padding-bottom: 1.5rem;
    border-bottom: 2px solid #f1f5f9;
}

.performance-title {
    font-size: 1.25rem; /* Reduced from 1.375rem */
    font-weight: 600; /* Reduced from 700 */
    color: var(--text-primary);
    margin: 0;
    display: flex;
    align-items: center;
}

.performance-score {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 16px;
    font-weight: 600; /* Reduced from 700 */
    font-size: 1rem; /* Reduced from 1.125rem */
    box-shadow: 0 8px 20px rgba(34, 197, 94, 0.25);
}

.performance-chart {
    position: relative;
    text-align: center;
    margin-bottom: 2.5rem;
    padding: 1rem;
}

.chart-center {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
}

.center-value {
    font-size: 1.5rem; /* Reduced from 1.75rem */
    font-weight: 700; /* Reduced from 900 */
    color: var(--text-primary);
    font-family: 'Poppins', sans-serif;
}

.center-label {
    font-size: 0.8rem; /* Reduced from 0.875rem */
    color: var(--text-secondary);
    font-weight: 500; /* Reduced from 600 */
    margin-top: 0.25rem;
}

.performance-metrics {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
    flex: 1;
}

.metric-item {
    display: flex;
    align-items: center;
    padding: 1.5rem;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    border-radius: 16px;
    transition: all 0.3s ease;
    border: 1px solid rgba(226, 232, 240, 0.5);
}

.metric-item:hover {
    background: white;
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    transform: translateY(-2px);
}

.metric-icon {
    width: 44px; /* Reduced from 48px */
    height: 44px; /* Reduced from 48px */
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    margin-right: 1.5rem;
    flex-shrink: 0;
}

.orders-metric { background: linear-gradient(135deg, #10b981 0%, #059669 100%); }
.views-metric { background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%); }
.reviews-metric { background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); }

.metric-info {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.metric-title {
    font-size: 0.8rem; /* Reduced from 0.875rem */
    color: var(--text-secondary);
    font-weight: 500; /* Reduced from 600 */
}

.metric-value {
    font-size: 1rem; /* Reduced from 1.125rem */
    color: var(--text-primary);
    font-weight: 600; /* Reduced from 700 */
    font-family: 'Poppins', sans-serif;
}

.metric-progress {
    margin-left: 1rem;
}

.progress-circle {
    width: 44px; /* Reduced from 48px */
    height: 44px; /* Reduced from 48px */
    border-radius: 50%;
    background: conic-gradient(var(--primary-color) 0deg, var(--primary-color) calc(var(--percentage, 0) * 3.6deg), #f1f5f9 calc(var(--percentage, 0) * 3.6deg));
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.7rem; /* Reduced from 0.75rem */
    font-weight: 600; /* Reduced from 700 */
    color: var(--text-primary);
    position: relative;
}

.progress-circle::before {
    content: '';
    position: absolute;
    width: 32px; /* Reduced from 36px */
    height: 32px; /* Reduced from 36px */
    background: white;
    border-radius: 50%;
    z-index: 1;
}

.progress-circle span {
    position: relative;
    z-index: 2;
}

/* Analytics Cards - Enhanced Spacing */
.analytics-card {
    background: white;
    border: none;
    border-radius: 20px;
    box-shadow: 0 8px 30px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
    height: 100%;
}

.analytics-card .card-body {
    padding: 2rem;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.analytics-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.12);
}

.analytics-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
    padding-bottom: 1rem;
    border-bottom: 1px solid #f1f5f9;
}

.analytics-title {
    font-size: 1.125rem; /* Reduced from 1.25rem */
    font-weight: 600; /* Reduced from 700 */
    color: var(--text-primary);
    margin: 0;
    display: flex;
    align-items: center;
}

.analytics-badge {
    background: rgba(34, 197, 94, 0.1);
    color: #22c55e;
    padding: 0.5rem 1rem;
    border-radius: 12px;
    font-size: 0.8rem; /* Reduced from 0.875rem */
    font-weight: 600; /* Reduced from 700 */
    border: 1px solid rgba(34, 197, 94, 0.2);
}

.analytics-badge.success {
    background: rgba(34, 197, 94, 0.1);
    color: #22c55e;
    border-color: rgba(34, 197, 94, 0.2);
}

.analytics-badge.warning {
    background: rgba(245, 158, 11, 0.1);
    color: #f59e0b;
    border-color: rgba(245, 158, 11, 0.2);
}

.analytics-chart {
    text-align: center;
    margin-bottom: 2rem;
    height: 180px;
    padding: 1rem;
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
}

.analytics-summary {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
    margin-top: auto;
}

.summary-metric {
    text-align: center;
    padding: 1.5rem 1rem;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    border-radius: 16px;
    border: 1px solid rgba(226, 232, 240, 0.5);
    transition: all 0.3s ease;
}

.summary-metric:hover {
    background: white;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
}

.metric-number {
    display: block;
    font-size: 1.25rem; /* Reduced from 1.5rem */
    font-weight: 700; /* Reduced from 800 */
    color: var(--text-primary);
    font-family: 'Poppins', sans-serif;
    margin-bottom: 0.5rem;
}

.metric-label {
    display: block;
    font-size: 0.8rem; /* Reduced from 0.875rem */
    color: var(--text-secondary);
    font-weight: 500; /* Reduced from 600 */
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* Data Tables - Enhanced Spacing */
.data-table-card {
    background: white;
    border: none;
    border-radius: 20px;
    box-shadow: 0 8px 30px rgba(0,0,0,0.08);
    overflow: hidden;
    height: 100%;
}

.card-header {
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    border-bottom: 2px solid #f1f5f9;
    padding: 2rem;
}

.table-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.table-title {
    font-size: 1.125rem; /* Reduced from 1.25rem */
    font-weight: 600; /* Reduced from 700 */
    color: var(--text-primary);
    margin: 0;
    display: flex;
    align-items: center;
}

.modern-table {
    border-collapse: separate;
    border-spacing: 0;
}

.modern-table th {
    background: #f8fafc;
    color: var(--text-secondary);
    font-weight: 600; /* Reduced from 700 */
    font-size: 0.8rem; /* Reduced from 0.875rem */
    text-transform: uppercase;
    letter-spacing: 0.05em;
    padding: 1.5rem;
    border-bottom: 2px solid #f1f5f9;
}

.modern-table td {
    padding: 1.5rem;
    border-bottom: 1px solid #f1f5f9;
    vertical-align: middle;
}

.modern-table tr:hover {
    background: #f8fafc;
}

.rank-badge {
    width: 32px; /* Reduced from 36px */
    height: 32px; /* Reduced from 36px */
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700; /* Reduced from 800 */
    font-size: 0.8rem; /* Reduced from 0.875rem */
    color: white;
}

.rank-badge.rank-1 { background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); }
.rank-badge.rank-2 { background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%); }
.rank-badge.rank-3 { background: linear-gradient(135deg, #cd7c0e 0%, #92400e 100%); }
.rank-badge:not(.rank-1):not(.rank-2):not(.rank-3) { 
    background: linear-gradient(135deg, #64748b 0%, #475569 100%); 
}

.product-info,
.customer-info {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.product-avatar,
.customer-avatar {
    width: 40px; /* Reduced from 44px */
    height: 40px; /* Reduced from 44px */
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
    color: white;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600; /* Reduced from 700 */
    font-size: 0.8rem; /* Reduced from 0.875rem */
    flex-shrink: 0;
}

.product-details,
.customer-details {
    display: flex;
    flex-direction: column;
    gap: 0.375rem;
}

.product-name,
.customer-name {
    font-weight: 600; /* Reduced from 700 */
    color: var(--text-primary);
    text-decoration: none;
    font-size: 0.8rem; /* Reduced from 0.875rem */
}

.product-category,
.customer-time {
    font-size: 0.7rem; /* Reduced from 0.75rem */
    color: var(--text-secondary);
    font-weight: 500;
}

.sold-count,
.order-total {
    font-weight: 600; /* Reduced from 800 */
    color: var(--text-primary);
    font-family: 'Poppins', sans-serif;
    font-size: 0.9rem; /* Reduced from 1rem */
}

.order-id {
    font-family: 'Courier New', monospace;
    font-weight: 600; /* Reduced from 700 */
    color: var(--text-secondary);
    background: #f8fafc;
    padding: 0.25rem 0.5rem;
    border-radius: 6px;
    font-size: 0.8rem; /* Added font size */
}

.trend-indicator {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    border-radius: 12px;
    font-size: 0.8rem; /* Reduced from 0.875rem */
    font-weight: 600; /* Reduced from 700 */
}

.trend-indicator.positive {
    background: rgba(34, 197, 94, 0.1);
    color: #22c55e;
    border: 1px solid rgba(34, 197, 94, 0.2);
}

.status-badge {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1rem;
    border-radius: 12px;
    font-size: 0.8rem; /* Reduced from 0.875rem */
    font-weight: 600; /* Reduced from 700 */
}

.status-badge.completed {
    background: rgba(34, 197, 94, 0.1);
    color: #22c55e;
    border: 1px solid rgba(34, 197, 94, 0.2);
}

/* Responsive Design - Enhanced */
@media (max-width: 1400px) {
    .dashboard-container {
        padding: 1.5rem;
    }
    
    .welcome-title {
        font-size: 1.75rem; /* Adjusted for smaller screens */
    }
    
    .chart-summary-stats {
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
    }
}

@media (max-width: 1200px) {
    .dashboard-container {
        padding: 1.25rem;
    }
    
    .welcome-banner .card-body {
        padding: 2rem 1.5rem;
    }
    
    .stats-card .card-body {
        padding: 1.5rem;
    }
    
    .chart-card .card-body {
        padding: 2rem;
    }
    
    .analytics-summary {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .dashboard-container {
        padding: 1rem;
    }
    
    .welcome-title {
        font-size: 1.5rem; /* Further reduced for mobile */
    }
    
    .welcome-subtitle {
        font-size: 0.9rem; /* Reduced for mobile */
    }
    
    .quick-stats {
        flex-direction: column;
        gap: 1rem;
    }
    
    .stat-item {
        padding: 1rem;
        gap: 1rem;
    }
    
    .chart-header {
        flex-direction: column;
        gap: 1.5rem;
        align-items: stretch;
    }
    
    .chart-title {
        font-size: 1.25rem; /* Reduced for mobile */
    }
    
    .chart-summary-stats {
        grid-template-columns: 1fr;
        gap: 1rem;
        padding: 1.5rem;
    }
    
    .performance-header {
        flex-direction: column;
        gap: 1rem;
        text-align: center;
    }
    
    .table-header {
        flex-direction: column;
        gap: 1rem;
        align-items: stretch;
    }
    
    .modern-table th,
    .modern-table td {
        padding: 1rem;
    }
}

@media (max-width: 576px) {
    .dashboard-container {
        padding: 0.75rem;
    }
    
    .welcome-banner .card-body {
        padding: 1.5rem;
    }
    
    .welcome-title {
        font-size: 1.25rem; /* Further reduced for small mobile */
    }
    
    .stats-number {
        font-size: 1.875rem; /* Reduced for mobile */
    }
    
    .stats-card .card-body {
        padding: 1.25rem;
    }
    
    .chart-card .card-body {
        padding: 1.5rem;
    }
    
    .analytics-card .card-body {
        padding: 1.5rem;
    }
    
    .card-header {
        padding: 1.5rem;
    }
    
    .modern-table th,
    .modern-table td {
        padding: 0.75rem;
        font-size: 0.8rem; /* Reduced for mobile tables */
    }
}

/* Animation Enhancements */
.fade-in-up {
    animation: fadeInUp 0.8s ease-out forwards;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(40px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes pulse {
    0%, 100% { opacity: 0.3; transform: scale(1); }
    50% { opacity: 0.5; transform: scale(1.05); }
}

/* Loading States */
.stats-card.loading {
    pointer-events: none;
}

.stats-card.loading .stats-number {
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    animation: loading 1.5s infinite;
}

@keyframes loading {
    0% { background-position: 200% 0; }
    100% { background-position: -200% 0; }
}
</style>

@push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var dataChart = <?php echo json_encode($totalSalesByDay); ?>;

    // Enhanced Main Chart with better design - FIXED
    var chart = {
        series: [
            { 
                name: "Doanh thu", 
                data: Object.values(dataChart),
                type: 'area'
            },
            { 
                name: "Đơn hàng", 
                data: Object.values(dataChart).map(val => Math.floor(val / 100000)),
                type: 'line'
            }
        ],

        chart: {
            type: "line",
            height: 350,
            toolbar: { 
                show: true,
                tools: {
                    download: true,
                    selection: false,
                    zoom: true,
                    zoomin: true,
                    zoomout: true,
                    pan: false,
                    reset: true
                },
                export: {
                    csv: {
                        filename: 'doanh-so-ban-hang'
                    },
                    svg: {
                        filename: 'doanh-so-ban-hang'
                    },
                    png: {
                        filename: 'doanh-so-ban-hang'
                    }
                }
            },
            fontFamily: 'Inter, sans-serif',
            background: 'transparent',
            animations: {
                enabled: true,
                easing: 'easeinout',
                speed: 800,
                animateGradually: {
                    enabled: true,
                    delay: 100
                },
                dynamicAnimation: {
                    enabled: true,
                    speed: 350
                }
            },
            dropShadow: {
                enabled: false
            }
        },

        colors: ["#10b981", "#3b82f6"],
        
        fill: {
            type: ["gradient", "solid"],
            gradient: {
                shade: 'light',
                type: "vertical",
                shadeIntensity: 0.3,
                gradientToColors: ["#059669", "#1d4ed8"],
                inverseColors: false,
                opacityFrom: 0.6,
                opacityTo: 0.1,
                stops: [0, 100]
            }
        },

        dataLabels: { 
            enabled: false 
        },
        
        stroke: { 
            curve: "smooth",
            width: [0, 3],
            lineCap: 'round'
        },

        grid: {
            show: true,
            borderColor: "#e2e8f0",
            strokeDashArray: 2,
            position: 'back',
            xaxis: { 
                lines: { show: true } 
            },
            yaxis: { 
                lines: { show: true } 
            },
            padding: { 
                top: 10, 
                right: 10, 
                bottom: 10, 
                left: 10 
            }
        },

        xaxis: {
            type: 'category',
            categories: Object.keys(dataChart),
            labels: {
                style: { 
                    colors: "#64748b",
                    fontSize: "12px",
                    fontWeight: 500,
                    fontFamily: 'Inter, sans-serif'
                },
                rotate: 0,
                trim: false,
                maxHeight: undefined
            },
            axisBorder: { 
                show: true,
                color: '#e2e8f0',
                height: 1
            },
            axisTicks: { 
                show: true,
                color: '#e2e8f0',
                height: 6
            },
            tooltip: {
                enabled: false
            }
        },

        yaxis: [
            {
                seriesName: 'Doanh thu',
                title: {
                    text: 'Doanh thu (VNĐ)',
                    style: {
                        color: '#64748b',
                        fontSize: '12px',
                        fontWeight: 600
                    }
                },
                labels: {
                    style: {
                        colors: "#64748b",
                        fontSize: "12px",
                        fontWeight: 500
                    },
                    formatter: function(val) {
                        if (val >= 1000000) {
                            return (val / 1000000).toFixed(1) + 'M';
                        } else if (val >= 1000) {
                            return (val / 1000).toFixed(1) + 'K';
                        }
                        return val.toFixed(0);
                    }
                },
                min: 0
            }, 
            {
                seriesName: 'Đơn hàng',
                opposite: true,
                title: {
                    text: 'Số đơn hàng',
                    style: {
                        color: '#64748b',
                        fontSize: '12px',
                        fontWeight: 600
                    }
                },
                labels: {
                    style: {
                        colors: "#64748b",
                        fontSize: "12px",
                        fontWeight: 500
                    },
                    formatter: function(val) {
                        return Math.floor(val);
                    }
                },
                min: 0
            }
        ],

        legend: {
            show: true,
            position: 'top',
            horizontalAlign: 'right',
            floating: false,
            offsetY: 0,
            offsetX: 0,
            fontSize: '13px',
            fontFamily: 'Inter, sans-serif',
            fontWeight: 600,
            labels: {
                colors: ['#10b981', '#3b82f6'],
                useSeriesColors: false
            },
            markers: {
                width: 10,
                height: 10,
                strokeWidth: 0,
                strokeColor: '#fff',
                radius: 5,
                offsetX: 0,
                offsetY: 0
            },
            itemMargin: {
                horizontal: 15,
                vertical: 5
            }
        },

        tooltip: { 
            theme: "light",
            style: {
                fontSize: "12px",
                fontFamily: "Inter, sans-serif"
            },
            shared: true,
            intersect: false,
            backgroundColor: '#ffffff',
            borderColor: '#e2e8f0',
            borderWidth: 1,
            borderRadius: 8,
            y: {
                formatter: function(val, opts) {
                    if (opts.seriesIndex === 0) {
                        return new Intl.NumberFormat('vi-VN').format(val) + 'đ';
                    } else {
                        return val + ' đơn';
                    }
                },
                title: {
                    formatter: function (seriesName) {
                        return seriesName + ': ';
                    }
                }
            },
            marker: {
                show: true,
                fillColors: ['#10b981', '#3b82f6']
            },
            x: {
                show: true,
                formatter: function(val) {
                    return 'Ngày ' + val;
                }
            }
        },

        markers: {
            size: 0,
            colors: ['#10b981', '#3b82f6'],
            strokeColors: '#fff',
            strokeWidth: 2,
            hover: {
                size: 6,
                sizeOffset: 3
            }
        },

        responsive: [
            {
                breakpoint: 1200,
                options: {
                    chart: { 
                        height: 320
                    },
                    legend: {
                        position: 'bottom',
                        offsetY: 10
                    }
                }
            },
            {
                breakpoint: 768,
                options: {
                    chart: { 
                        height: 300
                    },
                    legend: { 
                        position: 'bottom',
                        fontSize: '11px',
                        offsetY: 10
                    },
                    xaxis: {
                        labels: {
                            rotate: -45,
                            style: {
                                fontSize: '10px'
                            }
                        }
                    },
                    yaxis: [
                        {
                            title: {
                                style: {
                                    fontSize: '10px'
                                }
                            },
                            labels: {
                                style: {
                                    fontSize: '10px'
                                }
                            }
                        },
                        {
                            title: {
                                style: {
                                    fontSize: '10px'
                                }
                            },
                            labels: {
                                style: {
                                    fontSize: '10px'
                                }
                            }
                        }
                    ]
                }
            },
            {
                breakpoint: 576,
                options: {
                    chart: { 
                        height: 250
                    },
                    toolbar: {
                        show: false
                    }
                }
            }
        ]
    };

    // Initialize the chart
    try {
        var chartInstance = new ApexCharts(document.querySelector("#sales"), chart);
        chartInstance.render();
    } catch (error) {
        console.error('Chart rendering error:', error);
        // Fallback: show a simple message
        document.querySelector("#sales").innerHTML = '<div style="text-align: center; padding: 2rem; color: #64748b;">Đang tải biểu đồ...</div>';
    }

    // Enhanced Mini Charts with better styling
    function createMiniChart(canvasId, data, color) {
        const ctx = document.getElementById(canvasId);
        if (!ctx) return;
        
        const gradient = ctx.getContext('2d').createLinearGradient(0, 0, 0, 30);
        gradient.addColorStop(0, color + '40');
        gradient.addColorStop(1, color + '10');
        
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: Array.from({length: data.length}, (_, i) => i + 1),
                datasets: [{
                    data: data,
                    borderColor: color,
                    backgroundColor: gradient,
                    borderWidth: 3,
                    fill: true,
                    tension: 0.6,
                    pointRadius: 0,
                    pointHoverRadius: 6,
                    pointHoverBackgroundColor: color,
                    pointHoverBorderColor: '#ffffff',
                    pointHoverBorderWidth: 3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { 
                    legend: { display: false },
                    tooltip: { enabled: false }
                },
                scales: {
                    x: { display: false },
                    y: { display: false }
                },
                elements: {
                    point: { radius: 0 }
                },
                animation: {
                    duration: 2000,
                    easing: 'easeInOutQuart'
                }
            }
        });
    }

    // Enhanced Performance Donut Chart
    const performanceCtx = document.getElementById('performanceDonut');
    if (performanceCtx) {
        const gradient1 = performanceCtx.getContext('2d').createLinearGradient(0, 0, 0, 160);
        gradient1.addColorStop(0, '#10b981');
        gradient1.addColorStop(1, '#059669');
        
        const gradient2 = performanceCtx.getContext('2d').createLinearGradient(0, 0, 0, 160);
        gradient2.addColorStop(0, '#f1f5f9');
        gradient2.addColorStop(1, '#e2e8f0');
        
        new Chart(performanceCtx, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [75, 25],
                    backgroundColor: [gradient1, gradient2],
                    borderWidth: 0,
                    cutout: '75%',
                    borderRadius: 8,
                    spacing: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { 
                    legend: { display: false },
                    tooltip: { enabled: false }
                },
                animation: {
                    animateRotate: true,
                    duration: 2000,
                    easing: 'easeInOutQuart'
                }
            }
        });
    }

    // Enhanced Analytics Charts
    function createAnalyticsChart(canvasId, type, data, colors) {
        const ctx = document.getElementById(canvasId);
        if (!ctx) return;
        
        const chartColors = colors.map(color => {
            const gradient = ctx.getContext('2d').createLinearGradient(0, 0, 0, 180);
            gradient.addColorStop(0, color);
            gradient.addColorStop(1, color.replace('0.8', '0.4'));
            return gradient;
        });
        
        const config = {
            type: type,
            data: {
                labels: data.labels,
                datasets: [{
                    data: data.values,
                    backgroundColor: chartColors,
                    borderColor: colors.map(c => c.replace('0.8', '1')),
                    borderWidth: type === 'line' ? 4 : 2,
                    tension: 0.4,
                    fill: type === 'line',
                    pointRadius: type === 'line' ? 0 : undefined,
                    pointHoverRadius: type === 'line' ? 8 : undefined,
                    pointHoverBackgroundColor: type === 'line' ? colors.map(c => c.replace('0.8', '1')) : undefined,
                    pointHoverBorderColor: '#ffffff',
                    pointHoverBorderWidth: 3,
                    borderRadius: type === 'bar' ? 8 : undefined,
                    borderSkipped: false,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { 
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        borderColor: '#10b981',
                        borderWidth: 1,
                        cornerRadius: 8,
                        displayColors: false,
                        padding: 12
                    }
                },
                scales: type === 'line' ? {
                    x: { display: false },
                    y: { display: false }
                } : {
                    x: {
                        grid: { display: false },
                        ticks: { display: false }
                    },
                    y: {
                        grid: { display: false },
                        ticks: { display: false }
                    }
                },
                animation: {
                    duration: 2000,
                    easing: 'easeInOutQuart'
                }
            }
        };
        
        new Chart(ctx, config);
    }

    // Initialize all charts
    document.addEventListener('DOMContentLoaded', function() {
        // Animate numbers
        document.querySelectorAll('.stats-number').forEach(el => {
            const target = parseInt(el.getAttribute('data-count'));
            let current = 0;
            const increment = target / 50;
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                el.textContent = Math.floor(current).toLocaleString('vi-VN');
            }, 40);
        });

        // Animate progress bars
        document.querySelectorAll('.progress-bar').forEach(bar => {
            const width = bar.getAttribute('data-width');
            setTimeout(() => {
                bar.style.width = width + '%';
            }, 500);
        });

        // Create enhanced mini charts
        const miniData = [12, 19, 3, 5, 2, 3, 15, 8, 12, 18];
        createMiniChart('productsChart', miniData, '#10b981');
        createMiniChart('ordersChart', miniData.reverse(), '#3b82f6');
        createMiniChart('revenueChart', miniData.map(x => x * 1.5), '#f59e0b');
        createMiniChart('usersChart', miniData.map(x => x * 0.8), '#8b5cf6');

        // Enhanced analytics charts
        createAnalyticsChart('salesAnalytics', 'doughnut', {
            labels: ['Hoàn thành', 'Đang xử lý', 'Đã hủy'],
            values: [65, 25, 10]
        }, ['rgba(16, 185, 129, 0.8)', 'rgba(59, 130, 246, 0.8)', 'rgba(239, 68, 68, 0.8)']);

        createAnalyticsChart('orderTrend', 'line', {
            labels: ['T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'CN'],
            values: [12, 19, 15, 25, 22, 18, 8]
        }, ['rgba(59, 130, 246, 0.8)']);

        createAnalyticsChart('hourlyRevenue', 'bar', {
            labels: ['6h', '9h', '12h', '15h', '18h', '21h'],
            values: [3, 8, 12, 15, 18, 10]
        }, ['rgba(245, 158, 11, 0.8)']);

        // Add stagger animation
        const cards = document.querySelectorAll('.stats-card, .chart-card, .analytics-card');
        cards.forEach((card, index) => {
            card.style.animationDelay = `${index * 0.1}s`;
            card.classList.add('fade-in-up');
        });
    });

    // Add custom tooltip styles
    const tooltipStyles = `
        <style>
        .custom-tooltip {
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border: 1px solid #e2e8f0;
            overflow: hidden;
        }
        .tooltip-header {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            padding: 8px 12px;
            font-weight: 600;
            font-size: 12px;
        }
        .tooltip-content {
            padding: 12px;
        }
        .tooltip-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 6px;
        }
        .tooltip-item:last-child {
            margin-bottom: 0;
        }
        .tooltip-label {
            color: #64748b;
            font-size: 12px;
        }
        .tooltip-value {
            color: #1e293b;
            font-weight: 600;
            font-size: 12px;
        }
        </style>
    `;
    
    if (!document.getElementById('tooltip-styles')) {
        const styleSheet = document.createElement('style');
        styleSheet.id = 'tooltip-styles';
        styleSheet.innerHTML = tooltipStyles;
        document.head.appendChild(styleSheet);
    }
</script>
@endpush
@endsection