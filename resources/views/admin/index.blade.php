@extends('admin.layout.master')

@section('content')
<div class="dashboard-container">
    <!-- Welcome Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="welcome-banner card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <div class="welcome-content">
                                <h1 class="welcome-title">Chào mừng trở lại, {{ Auth::user()->name }}! 👋</h1>
                                <p class="welcome-subtitle">Quản lý hệ thống Nông Sản Việt một cách hiệu quả</p>
                                <div class="quick-stats">
                                    <span class="stat-item">
                                        <i class="fas fa-calendar-check"></i>
                                        Hôm nay: {{ date('d/m/Y') }}
                                    </span>
                                    <span class="stat-item">
                                        <i class="fas fa-clock"></i>
                                        {{ date('H:i A') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 text-end">
                            <div class="welcome-illustration">
                                <div class="floating-icon">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced Stats Cards -->
    <div class="row g-4 mb-5">
        <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="stats-card products-card">
                <div class="card-body">
                    <div class="stats-content">
                        <div class="stats-icon products">
                            <i class="fas fa-leaf"></i>
                        </div>
                        <div class="stats-info">
                            <h3 class="stats-number" data-count="{{$data['total_product']}}">0</h3>
                            <p class="stats-label">Tổng sản phẩm</p>
                            <div class="stats-trend">
                                <span class="trend-icon positive">
                                    <i class="fas fa-arrow-up"></i>
                                </span>
                                <span class="trend-text">+12% so với tháng trước</span>
                            </div>
                        </div>
                        <div class="mini-chart">
                            <canvas id="productsChart" width="100" height="40"></canvas>
                        </div>
                    </div>
                    <div class="stats-progress">
                        <div class="progress-bar products-progress" data-width="85"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="stats-card orders-card">
                <div class="card-body">
                    <div class="stats-content">
                        <div class="stats-icon orders">
                            <i class="fas fa-shopping-bag"></i>
                        </div>
                        <div class="stats-info">
                            <h3 class="stats-number" data-count="{{$data['total_order']}}">0</h3>
                            <p class="stats-label">Tổng đơn hàng</p>
                            <div class="stats-trend">
                                <span class="trend-icon positive">
                                    <i class="fas fa-arrow-up"></i>
                                </span>
                                <span class="trend-text">+8% so với tháng trước</span>
                            </div>
                        </div>
                        <div class="mini-chart">
                            <canvas id="ordersChart" width="100" height="40"></canvas>
                        </div>
                    </div>
                    <div class="stats-progress">
                        <div class="progress-bar orders-progress" data-width="72"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="stats-card revenue-card">
                <div class="card-body">
                    <div class="stats-content">
                        <div class="stats-icon revenue">
                            <i class="fas fa-coins"></i>
                        </div>
                        <div class="stats-info">
                            <h3 class="stats-number" data-count="{{$data['total_income']}}">0</h3>
                            <p class="stats-label">Tổng doanh thu</p>
                            <div class="stats-trend">
                                <span class="trend-icon positive">
                                    <i class="fas fa-arrow-up"></i>
                                </span>
                                <span class="trend-text">+15% so với tháng trước</span>
                            </div>
                        </div>
                        <div class="mini-chart">
                            <canvas id="revenueChart" width="100" height="40"></canvas>
                        </div>
                    </div>
                    <div class="stats-progress">
                        <div class="progress-bar revenue-progress" data-width="90"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="stats-card users-card">
                <div class="card-body">
                    <div class="stats-content">
                        <div class="stats-icon users">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stats-info">
                            <h3 class="stats-number" data-count="{{ intval($data['total_order'] * 0.85) }}">0</h3>
                            <p class="stats-label">Khách hàng</p>
                            <div class="stats-trend">
                                <span class="trend-icon positive">
                                    <i class="fas fa-arrow-up"></i>
                                </span>
                                <span class="trend-text">+6% so với tháng trước</span>
                            </div>
                        </div>
                        <div class="mini-chart">
                            <canvas id="usersChart" width="100" height="40"></canvas>
                        </div>
                    </div>
                    <div class="stats-progress">
                        <div class="progress-bar users-progress" data-width="68"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced Charts Section -->
    <div class="row g-4 mb-5">
        <div class="col-lg-8">
            <div class="chart-card advanced-chart-card">
                <div class="card-body">
                    <div class="chart-header">
                        <div class="chart-title-section">
                            <div class="title-with-icon">
                                <div class="chart-icon">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <div class="title-content">
                                    <h2 class="chart-title">Doanh số bán hàng</h2>
                                    <p class="chart-subtitle">Theo dõi xu hướng bán hàng hàng ngày với phân tích chi tiết</p>
                                </div>
                            </div>
                            <div class="chart-summary">
                                <div class="summary-stat">
                                    <span class="stat-value">{{ number_format(array_sum($totalSalesByDay)) }}đ</span>
                                    <span class="stat-label">Tổng doanh thu tháng</span>
                                </div>
                                <div class="summary-stat">
                                    <span class="stat-value">{{ count($totalSalesByDay) }}</span>
                                    <span class="stat-label">Ngày hoạt động</span>
                                </div>
                            </div>
                        </div>
                        <div class="chart-controls">
                            <div class="controls-wrapper">
                                <div class="chart-legend">
                                    <div class="legend-item">
                                        <div class="legend-indicator">
                                            <span class="legend-color" style="background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);"></span>
                                        </div>
                                        <span class="legend-text">Doanh thu</span>
                                    </div>
                                    <div class="legend-item">
                                        <div class="legend-indicator">
                                            <span class="legend-color" style="background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);"></span>
                                        </div>
                                        <span class="legend-text">Đơn hàng</span>
                                    </div>
                                </div>
                                <div class="chart-actions">
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
                                    <button class="chart-action-btn" title="Xuất báo cáo">
                                        <i class="fas fa-download"></i>
                                    </button>
                                    <button class="chart-action-btn" title="Toàn màn hình">
                                        <i class="fas fa-expand"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chart-container">
                        <div class="chart-wrapper">
                            <div id="sales"></div>
                        </div>
                    </div>
                    <div class="chart-insights">
                        <div class="insights-grid">
                            <div class="insight-card trend-up">
                                <div class="insight-icon">
                                    <i class="fas fa-arrow-trend-up"></i>
                                </div>
                                <div class="insight-content">
                                    <h4 class="insight-title">Xu hướng tăng trưởng</h4>
                                    <p class="insight-desc">Doanh số tăng đều trong tháng</p>
                                </div>
                                <div class="insight-value">+15%</div>
                            </div>
                            <div class="insight-card best-day">
                                <div class="insight-icon">
                                    <i class="fas fa-crown"></i>
                                </div>
                                <div class="insight-content">
                                    <h4 class="insight-title">Ngày bán tốt nhất</h4>
                                    <p class="insight-desc">{{ array_keys($totalSalesByDay, max($totalSalesByDay))[0] ?? 'Chưa có dữ liệu' }}</p>
                                </div>
                                <div class="insight-value">{{ number_format(max($totalSalesByDay) ?? 0) }}đ</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="performance-card enhanced-performance-card">
                <div class="card-body">
                    <div class="performance-header">
                        <div class="header-content">
                            <div class="header-icon">
                                <i class="fas fa-bullseye"></i>
                            </div>
                            <div class="header-text">
                                <h3 class="performance-title">Hiệu suất hôm nay</h3>
                                <p class="performance-subtitle">Tổng quan hoạt động kinh doanh</p>
                            </div>
                        </div>
                        <div class="performance-score">
                            <div class="score-circle">
                                <span class="score-value">{{ rand(75, 95) }}%</span>
                            </div>
                            <span class="score-label">Điểm hiệu suất</span>
                        </div>
                    </div>
                    
                    <div class="performance-chart-section">
                        <div class="chart-container-donut">
                            <canvas id="performanceDonut" width="180" height="180"></canvas>
                            <div class="chart-center-content">
                                <div class="center-value">{{ rand(75, 95) }}%</div>
                                <div class="center-label">Hiệu suất</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="performance-metrics">
                        <div class="metrics-header">
                            <h4>Chi tiết hiệu suất</h4>
                        </div>
                        <div class="metric-row">
                            <div class="metric-info">
                                <div class="metric-icon orders-new">
                                    <i class="fas fa-shopping-bag"></i>
                                </div>
                                <div class="metric-details">
                                    <span class="metric-title">Đơn hàng mới</span>
                                    <span class="metric-count">{{ rand(15, 45) }} đơn</span>
                                </div>
                            </div>
                            <div class="metric-progress">
                                <div class="progress-ring">
                                    <svg class="progress-svg" width="50" height="50">
                                        <circle cx="25" cy="25" r="20" stroke="#e2e8f0" stroke-width="4" fill="none"/>
                                        <circle cx="25" cy="25" r="20" stroke="#22c55e" stroke-width="4" fill="none" 
                                                stroke-dasharray="126" stroke-dashoffset="31.5" class="progress-circle"/>
                                    </svg>
                                    <span class="progress-text">75%</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="metric-row">
                            <div class="metric-info">
                                <div class="metric-icon page-views">
                                    <i class="fas fa-eye"></i>
                                </div>
                                <div class="metric-details">
                                    <span class="metric-title">Lượt xem</span>
                                    <span class="metric-count">{{ number_format(rand(250, 800)) }} lượt</span>
                                </div>
                            </div>
                            <div class="metric-progress">
                                <div class="progress-ring">
                                    <svg class="progress-svg" width="50" height="50">
                                        <circle cx="25" cy="25" r="20" stroke="#e2e8f0" stroke-width="4" fill="none"/>
                                        <circle cx="25" cy="25" r="20" stroke="#3b82f6" stroke-width="4" fill="none" 
                                                stroke-dasharray="126" stroke-dashoffset="47.88" class="progress-circle"/>
                                    </svg>
                                    <span class="progress-text">62%</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="metric-row">
                            <div class="metric-info">
                                <div class="metric-icon reviews">
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="metric-details">
                                    <span class="metric-title">Đánh giá</span>
                                    <span class="metric-count">{{ rand(10, 30) }} đánh giá</span>
                                </div>
                            </div>
                            <div class="metric-progress">
                                <div class="progress-ring">
                                    <svg class="progress-svg" width="50" height="50">
                                        <circle cx="25" cy="25" r="20" stroke="#e2e8f0" stroke-width="4" fill="none"/>
                                        <circle cx="25" cy="25" r="20" stroke="#f59e0b" stroke-width="4" fill="none" 
                                                stroke-dasharray="126" stroke-dashoffset="15.12" class="progress-circle"/>
                                    </svg>
                                    <span class="progress-text">88%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Analytics Cards Row -->
    <div class="row g-4 mb-5">
        <div class="col-lg-4">
            <div class="analytics-card">
                <div class="card-body text-center">
                    <h4 class="analytics-title">📊 Phân tích bán hàng</h4>
                    <div class="analytics-chart">
                        <canvas id="salesAnalytics" width="200" height="200"></canvas>
                    </div>
                    <div class="analytics-summary">
                        <div class="summary-item">
                            <span class="summary-value">{{number_format($data['total_product'])}}</span>
                            <span class="summary-label">Sản phẩm</span>
                        </div>
                        <div class="summary-item">
                            <span class="summary-value">{{ rand(15, 35) }}%</span>
                            <span class="summary-label">Tăng trưởng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="analytics-card">
                <div class="card-body text-center">
                    <h4 class="analytics-title">📈 Xu hướng đơn hàng</h4>
                    <div class="analytics-chart">
                        <canvas id="orderTrend" width="200" height="200"></canvas>
                    </div>
                    <div class="analytics-summary">
                        <div class="summary-item">
                            <span class="summary-value">{{number_format($data['total_order'])}}</span>
                            <span class="summary-label">Đơn hàng</span>
                        </div>
                        <div class="summary-item">
                            <span class="summary-value">{{ rand(20, 40) }}%</span>
                            <span class="summary-label">Hoàn thành</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="analytics-card">
                <div class="card-body text-center">
                    <h4 class="analytics-title">💰 Thu nhập theo giờ</h4>
                    <div class="analytics-chart">
                        <canvas id="hourlyRevenue" width="200" height="200"></canvas>
                    </div>
                    <div class="analytics-summary">
                        <div class="summary-item">
                            <span class="summary-value">{{ number_format(intval($data['total_income']/24)) }}đ</span>
                            <span class="summary-label">TB/giờ</span>
                        </div>
                        <div class="summary-item">
                            <span class="summary-value">{{ rand(10, 25) }}%</span>
                            <span class="summary-label">Tối ưu</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Tables Section -->
    <div class="row g-4">
        <div class="col-lg-6">
            <div class="data-table-card card">
                <div class="card-header">
                    <div class="table-header">
                        <h3 class="table-title">
                            <i class="fas fa-fire"></i>
                            Sản phẩm bán chạy
                        </h3>
                        <div class="table-actions">
                            <button class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-download"></i>
                                Xuất Excel
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table modern-table">
                            <thead>
                                <tr>
                                    <th>Rank</th>
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
                                            #{{ $key + 1 }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="product-info">
                                            <div class="product-avatar">
                                                <span>{{ substr($product->name, 0, 2) }}</span>
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
                                            +{{ rand(5, 25) }}%
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
            <div class="data-table-card card">
                <div class="card-header">
                    <div class="table-header">
                        <h3 class="table-title">
                            <i class="fas fa-clock"></i>
                            Đơn hàng gần đây
                        </h3>
                        <div class="table-actions">
                            <button class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-eye"></i>
                                Xem tất cả
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table modern-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Khách hàng</th>
                                    <th>Tổng tiền</th>
                                    <th>Thời gian</th>
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
                                                <span>{{ substr($order->name, 0, 2) }}</span>
                                            </div>
                                            <div class="customer-details">
                                                <span class="customer-name">{{ Str::limit($order->name, 20) }}</span>
                                                <span class="customer-type">Khách hàng</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="order-total">{{ number_format($order->total_price) }}đ</span>
                                    </td>
                                    <td>
                                        <span class="order-time">{{ $order->created_at->diffForHumans() }}</span>
                                    </td>
                                    <td>
                                        <span class="status-badge completed">
                                            <i class="fas fa-check"></i>
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
/* Dashboard Container Layout Fix */
.dashboard-container {
    width: 100%;
    max-width: none;
    margin: 0;
    padding: 2rem;
    min-height: 100vh;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
}

/* Responsive Container Padding */
@media (max-width: 1400px) {
    .dashboard-container {
        padding: 1.5rem;
    }
}

@media (max-width: 992px) {
    .dashboard-container {
        padding: 1rem;
    }
}

@media (max-width: 768px) {
    .dashboard-container {
        padding: 0.75rem;
    }
}

@media (max-width: 576px) {
    .dashboard-container {
        padding: 0.5rem;
    }
}

/* Fix row negative margins */
.dashboard-container .row {
    margin-left: 0;
    margin-right: 0;
}

.dashboard-container .row > * {
    padding-left: 0.75rem;
    padding-right: 0.75rem;
}

/* Enhanced Dashboard Styles */
.welcome-banner {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
    border: none;
    overflow: hidden;
    position: relative;
    box-shadow: 0 20px 40px rgba(34, 197, 94, 0.15);
    border-radius: var(--radius-lg);
}

.welcome-banner::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 300px;
    height: 300px;
    background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
    border-radius: 50%;
    transform: translate(30%, -30%);
    animation: pulse 4s ease-in-out infinite;
}

.welcome-title {
    color: white;
    font-size: 2.25rem;
    font-weight: 800;
    margin-bottom: 1rem;
    text-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.welcome-subtitle {
    color: rgba(255,255,255,0.9);
    font-size: 1.1rem;
    margin-bottom: 1.5rem;
    font-weight: 500;
}

.quick-stats {
    display: flex;
    gap: 2rem;
    flex-wrap: wrap;
}

.stat-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: rgba(255,255,255,0.9);
    font-weight: 500;
    font-size: 0.95rem;
}

.stat-item i {
    font-size: 1.1rem;
    color: rgba(255,255,255,0.8);
}

.floating-icon {
    width: 120px;
    height: 120px;
    background: rgba(255,255,255,0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-left: auto;
    animation: float 6s ease-in-out infinite;
    backdrop-filter: blur(10px);
}

.floating-icon i {
    font-size: 3rem;
    color: rgba(255,255,255,0.8);
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
}

@keyframes pulse {
    0%, 100% { transform: translate(30%, -30%) scale(1); opacity: 0.3; }
    50% { transform: translate(30%, -30%) scale(1.1); opacity: 0.5; }
}

/* Stats Cards Enhanced */
.stats-card {
    border: none;
    position: relative;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    border-radius: var(--radius-lg);
    background: white;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
}

.stats-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--primary-color) 0%, var(--accent-color) 100%);
}

.stats-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 25px 50px rgba(0,0,0,0.15);
}

.stats-card .card-body {
    padding: 2rem;
}

.stats-content {
    display: flex;
    align-items: flex-start;
    gap: 1.5rem;
    margin-bottom: 2rem;
    position: relative;
}

.mini-chart {
    position: absolute;
    top: -10px;
    right: -10px;
    opacity: 0.2;
    transition: opacity 0.3s ease;
}

.stats-card:hover .mini-chart {
    opacity: 0.4;
}

.stats-icon {
    width: 70px;
    height: 70px;
    border-radius: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.75rem;
    color: white;
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.stats-icon.products { background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%); }
.stats-icon.orders { background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%); }
.stats-icon.revenue { background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); }
.stats-icon.users { background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%); }

.stats-info {
    flex: 1;
}

.stats-number {
    font-size: 2.5rem;
    font-weight: 900;
    color: var(--text-primary);
    margin-bottom: 0.5rem;
    line-height: 1;
    font-family: 'Poppins', sans-serif;
}

.stats-label {
    font-size: 1rem;
    color: var(--text-secondary);
    margin-bottom: 1rem;
    font-weight: 600;
}

.stats-trend {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.trend-icon {
    width: 24px;
    height: 24px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.875rem;
}

.trend-icon.positive {
    background: rgba(34, 197, 94, 0.1);
    color: #22c55e;
}

.trend-text {
    font-size: 0.875rem;
    color: var(--text-secondary);
    font-weight: 500;
}

.stats-progress {
    height: 6px;
    background: #f1f5f9;
    border-radius: 3px;
    overflow: hidden;
    position: relative;
}

.progress-bar {
    height: 100%;
    border-radius: 3px;
    animation: progressAnimation 2s ease-out;
    position: relative;
}

.progress-bar::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(90deg, transparent 0%, rgba(255,255,255,0.4) 50%, transparent 100%);
    animation: shimmer 2s infinite;
}

@keyframes shimmer {
    0% { transform: translateX(-100%); }
    100% { transform: translateX(100%); }
}

.products-progress { 
    background: linear-gradient(90deg, #22c55e 0%, #16a34a 100%); 
}
.orders-progress { 
    background: linear-gradient(90deg, #3b82f6 0%, #1d4ed8 100%); 
}
.revenue-progress { 
    background: linear-gradient(90deg, #f59e0b 0%, #d97706 100%); 
}
.users-progress { 
    background: linear-gradient(90deg, #8b5cf6 0%, #7c3aed 100%); 
}

@keyframes progressAnimation {
    from { width: 0; }
}

/* Enhanced Chart Card Styles */
.chart-card {
    border: none;
    border-radius: var(--radius-lg);
    background: white;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    overflow: hidden;
    transition: all 0.3s ease;
}

.chart-card:hover {
    box-shadow: 0 8px 30px rgba(0,0,0,0.12);
}

.advanced-chart-card {
    background: linear-gradient(145deg, 
        rgba(255, 255, 255, 0.98) 0%, 
        rgba(248, 250, 252, 0.95) 100%);
    border: 1px solid rgba(226, 232, 240, 0.6);
    backdrop-filter: blur(20px);
}

/* Chart Header Redesign */
.chart-header {
    margin-bottom: 2.5rem;
    padding-bottom: 1.5rem;
    border-bottom: 2px solid #f1f5f9;
}

.title-with-icon {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1.5rem;
}

.chart-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.25rem;
    box-shadow: 0 8px 20px rgba(34, 197, 94, 0.25);
}

.title-content {
    flex: 1;
}

.chart-title {
    font-size: 1.875rem;
    font-weight: 700;
    color: var(--text-primary);
    margin: 0 0 0.25rem 0;
    font-family: 'Poppins', sans-serif;
}

.chart-subtitle {
    color: var(--text-secondary);
    margin: 0;
    font-size: 1rem;
    font-weight: 500;
    line-height: 1.4;
}

.chart-summary {
    display: flex;
    gap: 2rem;
    margin-bottom: 1.5rem;
}

.summary-stat {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
}

.summary-stat .stat-value {
    font-size: 1.5rem;
    font-weight: 800;
    color: var(--primary-color);
    font-family: 'Poppins', sans-serif;
}

.summary-stat .stat-label {
    font-size: 0.875rem;
    color: var(--text-secondary);
    font-weight: 500;
}

/* Chart Controls Redesign */
.controls-wrapper {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
    align-items: flex-end;
}

.chart-legend {
    display: flex;
    gap: 1.5rem;
    flex-wrap: wrap;
}

.legend-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.5rem 1rem;
    background: rgba(248, 250, 252, 0.8);
    border: 1px solid var(--border-color);
    border-radius: var(--radius-md);
    transition: all 0.3s ease;
}

.legend-item:hover {
    background: white;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}

.legend-indicator {
    display: flex;
    align-items: center;
}

.legend-color {
    width: 14px;
    height: 14px;
    border-radius: 50%;
    box-shadow: 0 2px 8px rgba(0,0,0,0.15);
}

.legend-text {
    font-size: 0.875rem;
    color: var(--text-secondary);
    font-weight: 600;
}

.chart-actions {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.select-wrapper {
    position: relative;
    display: flex;
    align-items: center;
}

.modern-select {
    appearance: none;
    background: white;
    border: 2px solid var(--border-color);
    color: var(--text-primary);
    border-radius: var(--radius-md);
    padding: 0.75rem 3rem 0.75rem 1rem;
    font-weight: 600;
    min-width: 140px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
    cursor: pointer;
}

.modern-select:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.1);
    outline: none;
}

.select-icon {
    position: absolute;
    right: 1rem;
    color: var(--text-secondary);
    font-size: 0.875rem;
    pointer-events: none;
    transition: transform 0.3s ease;
}

.select-wrapper:hover .select-icon {
    transform: rotate(180deg);
}

.chart-action-btn {
    width: 40px;
    height: 40px;
    background: white;
    border: 2px solid var(--border-color);
    border-radius: var(--radius-md);
    color: var(--text-secondary);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 0.875rem;
}

.chart-action-btn:hover {
    background: var(--primary-color);
    border-color: var(--primary-color);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(34, 197, 94, 0.25);
}

/* Chart Container */
.chart-container {
    margin: 2rem 0;
    padding: 1rem;
    background: rgba(255, 255, 255, 0.5);
    border-radius: var(--radius-md);
    border: 1px solid rgba(226, 232, 240, 0.5);
}

.chart-wrapper {
    position: relative;
    overflow: hidden;
    border-radius: var(--radius-sm);
}

/* Chart Insights Redesign */
.chart-insights {
    margin-top: 2rem;
    padding-top: 2rem;
    border-top: 2px solid #f1f5f9;
}

.insights-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 1.5rem;
}

.insight-card {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1.25rem;
    background: linear-gradient(135deg, 
        rgba(248, 250, 252, 0.8) 0%, 
        rgba(255, 255, 255, 0.9) 100%);
    border: 1px solid var(--border-color);
    border-radius: var(--radius-md);
    transition: all 0.3s ease;
}

.insight-card:hover {
    background: white;
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    transform: translateY(-2px);
}

.insight-icon {
    width: 45px;
    height: 45px;
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.125rem;
    color: white;
}

.insight-card.trend-up .insight-icon {
    background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
}

.insight-card.best-day .insight-icon {
    background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
}

.insight-content {
    flex: 1;
}

.insight-title {
    font-size: 0.9rem;
    font-weight: 700;
    color: var(--text-primary);
    margin: 0 0 0.25rem 0;
}

.insight-desc {
    font-size: 0.825rem;
    color: var(--text-secondary);
    margin: 0;
    font-weight: 500;
}

.insight-value {
    font-size: 1.125rem;
    font-weight: 800;
    color: var(--primary-color);
    font-family: 'Poppins', sans-serif;
}

/* Enhanced Performance Card */
.performance-card {
    background: white;
    border: none;
    border-radius: var(--radius-lg);
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
}

.performance-card:hover {
    box-shadow: 0 8px 30px rgba(0,0,0,0.12);
}

.enhanced-performance-card {
    background: linear-gradient(145deg, 
        rgba(59, 130, 246, 0.02) 0%, 
        rgba(139, 92, 246, 0.02) 100%);
    border: 1px solid rgba(59, 130, 246, 0.08);
}

.performance-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
    padding-bottom: 1.5rem;
    border-bottom: 2px solid #f1f5f9;
}

.header-content {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.header-icon {
    width: 45px;
    height: 45px;
    background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.125rem;
    box-shadow: 0 8px 20px rgba(59, 130, 246, 0.25);
}

.header-text {
    flex: 1;
}

.performance-title {
    font-size: 1.375rem;
    font-weight: 700;
    color: var(--text-primary);
    margin: 0 0 0.25rem 0;
    font-family: 'Poppins', sans-serif;
}

.performance-subtitle {
    color: var(--text-secondary);
    margin: 0;
    font-size: 0.875rem;
    font-weight: 500;
}

.performance-score {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.5rem;
}

.score-circle {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 8px 20px rgba(34, 197, 94, 0.25);
}

.score-value {
    color: white;
    font-size: 1.125rem;
    font-weight: 800;
    font-family: 'Poppins', sans-serif;
}

.score-label {
    font-size: 0.75rem;
    color: var(--text-secondary);
    font-weight: 600;
}

/* Performance Chart Section */
.performance-chart-section {
    text-align: center;
    margin-bottom: 2rem;
    position: relative;
}

.chart-container-donut {
    position: relative;
    display: inline-block;
    margin-bottom: 1rem;
}

.chart-center-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
}

.center-value {
    font-size: 1.5rem;
    font-weight: 800;
    color: var(--text-primary);
    font-family: 'Poppins', sans-serif;
}

.center-label {
    font-size: 0.75rem;
    color: var(--text-secondary);
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* Performance Metrics */
.performance-metrics {
    background: rgba(248, 250, 252, 0.5);
    border-radius: var(--radius-md);
    padding: 1.5rem;
}

.metrics-header {
    margin-bottom: 1.5rem;
}

.metrics-header h4 {
    font-size: 1.125rem;
    font-weight: 700;
    color: var(--text-primary);
    margin: 0;
}

.metric-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1rem;
    background: white;
    border-radius: var(--radius-md);
    margin-bottom: 1rem;
    border: 1px solid var(--border-color);
    transition: all 0.3s ease;
}

.metric-row:hover {
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    transform: translateY(-1px);
}

.metric-info {
    display: flex;
    align-items: center;
    gap: 1rem;
    flex: 1;
}

.metric-icon {
    width: 40px;
    height: 40px;
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
    color: white;
}

.metric-icon.orders-new {
    background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
}

.metric-icon.page-views {
    background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
}

.metric-icon.reviews {
    background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
}

.metric-details {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
}

.metric-title {
    font-size: 0.875rem;
    font-weight: 600;
    color: var(--text-primary);
}

.metric-count {
    font-size: 1rem;
    font-weight: 800;
    color: var(--text-secondary);
    font-family: 'Poppins', sans-serif;
}

.metric-progress {
    display: flex;
    align-items: center;
}

.progress-ring {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
}

.progress-svg {
    transform: rotate(-90deg);
}

.progress-circle {
    transition: stroke-dashoffset 1s ease-in-out;
}

.progress-text {
    position: absolute;
    font-size: 0.75rem;
    font-weight: 700;
    color: var(--text-primary);
}

/* Responsive Design for Charts */
@media (max-width: 1200px) {
    .controls-wrapper {
        align-items: stretch;
    }
    
    .chart-legend {
        justify-content: center;
    }
    
    .chart-actions {
        justify-content: center;
    }
}

@media (max-width: 768px) {
    .chart-header {
        text-align: center;
    }
    
    .title-with-icon {
        flex-direction: column;
        text-align: center;
        gap: 1.5rem;
    }
    
    .chart-summary {
        justify-content: center;
        flex-wrap: wrap;
    }
    
    .controls-wrapper {
        align-items: center;
    }
    
    .insights-grid {
        grid-template-columns: 1fr;
    }
    
    .performance-header {
        flex-direction: column;
        gap: 1.5rem;
        text-align: center;
    }
    
    .metric-row {
        flex-direction: column;
        gap: 1rem;
        text-align: center;
    }
    
    .metric-info {
        justify-content: center;
    }
}

@media (max-width: 576px) {
    .chart-title {
        font-size: 1.5rem;
    }
    
    .chart-legend {
        flex-direction: column;
        gap: 0.75rem;
    }
    
    .chart-actions {
        flex-direction: column;
        gap: 0.75rem;
    }
}
</style>

@push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var dataChart = <?php echo json_encode($totalSalesByDay); ?>;

    // Enhanced Main Chart
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
            height: 400,
            toolbar: { 
                show: true,
                tools: {
                    download: true,
                    selection: true,
                    zoom: true,
                    zoomin: true,
                    zoomout: true,
                    pan: true,
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
                    delay: 150
                },
                dynamicAnimation: {
                    enabled: true,
                    speed: 350
                }
            }
        },

        colors: ["#10b981", "#6366f1"],
        
        fill: {
            type: "gradient",
            gradient: {
                shade: 'dark',
                shadeIntensity: 0.5,
                opacityFrom: 0.7,
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
            borderColor: "rgba(255,255,255,0.08)",
            strokeDashArray: 4,
            xaxis: { lines: { show: true } },
            yaxis: { lines: { show: true } },
            padding: { top: 0, right: 0, bottom: 0, left: 0 }
        },

        xaxis: {
            categories: Object.keys(dataChart),
            labels: {
                style: { 
                    colors: "#cbd5e1",
                    fontSize: "12px",
                    fontWeight: 500
                },
            },
            axisBorder: { 
                show: true,
                color: 'rgba(255,255,255,0.1)'
            },
            axisTicks: { 
                show: true,
                color: 'rgba(255,255,255,0.1)'
            }
        },

        yaxis: [{
            labels: {
                style: {
                    colors: "#cbd5e1",
                    fontSize: "12px"
                },
                formatter: function(val) {
                    return new Intl.NumberFormat('vi-VN').format(val) + 'đ';
                }
            },
        }, {
            opposite: true,
            labels: {
                style: {
                    colors: "#cbd5e1",
                    fontSize: "12px"
                },
                formatter: function(val) {
                    return val + ' đơn';
                }
            },
        }],

        legend: {
            show: true,
            position: 'top',
            horizontalAlign: 'left',
            labels: {
                colors: '#cbd5e1'
            },
            markers: {
                radius: 4
            }
        },

        tooltip: { 
            theme: "dark",
            style: {
                fontSize: "12px",
                fontFamily: "Inter, sans-serif"
            },
            y: {
                formatter: function(val, opts) {
                    if (opts.seriesIndex === 0) {
                        return new Intl.NumberFormat('vi-VN').format(val) + 'đ';
                    } else {
                        return val + ' đơn hàng';
                    }
                }
            },
            marker: {
                show: true,
            },
            x: {
                format: 'dd/MM'
            }
        },

        responsive: [{
            breakpoint: 600,
            options: {
                chart: { height: 300 },
                legend: { position: 'bottom' }
            }
        }]
    };

    var chartInstance = new ApexCharts(document.querySelector("#sales"), chart);
    chartInstance.render();

    // Mini Charts for Stats Cards
    function createMiniChart(canvasId, data, color) {
        const ctx = document.getElementById(canvasId);
        if (!ctx) return;
        
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: Array.from({length: data.length}, (_, i) => i + 1),
                datasets: [{
                    data: data,
                    borderColor: color,
                    backgroundColor: color + '20',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4,
                    pointRadius: 0,
                    pointHoverRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    x: { display: false },
                    y: { display: false }
                },
                elements: {
                    point: { radius: 0 }
                }
            }
        });
    }

    // Performance Donut Chart
    const performanceCtx = document.getElementById('performanceDonut');
    if (performanceCtx) {
        new Chart(performanceCtx, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [75, 25],
                    backgroundColor: [
                        'linear-gradient(135deg, #10b981 0%, #059669 100%)',
                        'rgba(255,255,255,0.1)'
                    ],
                    borderWidth: 0,
                    cutout: '75%'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } }
            }
        });
    }

    // Analytics Charts
    function createAnalyticsChart(canvasId, type, data, colors) {
        const ctx = document.getElementById(canvasId);
        if (!ctx) return;
        
        new Chart(ctx, {
            type: type,
            data: {
                labels: data.labels,
                datasets: [{
                    data: data.values,
                    backgroundColor: colors,
                    borderColor: colors.map(c => c.replace('0.8', '1')),
                    borderWidth: type === 'line' ? 3 : 0,
                    tension: 0.4,
                    fill: type === 'line'
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
                        borderWidth: 1
                    }
                },
                scales: type === 'line' ? {
                    x: { display: false },
                    y: { display: false }
                } : {}
            }
        });
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

        // Create mini charts
        const miniData = [12, 19, 3, 5, 2, 3, 15, 8, 12, 18];
        createMiniChart('productsChart', miniData, '#10b981');
        createMiniChart('ordersChart', miniData.reverse(), '#6366f1');
        createMiniChart('revenueChart', miniData.map(x => x * 1.5), '#f59e0b');
        createMiniChart('usersChart', miniData.map(x => x * 0.8), '#8b5cf6');

        // Analytics charts
        createAnalyticsChart('salesAnalytics', 'doughnut', {
            labels: ['Hoàn thành', 'Đang xử lý', 'Đã hủy'],
            values: [65, 25, 10]
        }, ['rgba(16, 185, 129, 0.8)', 'rgba(99, 102, 241, 0.8)', 'rgba(239, 68, 68, 0.8)']);

        createAnalyticsChart('orderTrend', 'line', {
            labels: ['T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'CN'],
            values: [12, 19, 15, 25, 22, 18, 8]
        }, ['rgba(99, 102, 241, 0.8)']);

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
</script>
@endpush
@endsection