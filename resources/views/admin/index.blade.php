@extends('admin.layout.master')

@section('content')
<div class="container" style="padding-top: 100px">
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
                            <h2 class="chart-title">📈 Doanh số bán hàng</h2>
                            <p class="chart-subtitle">Theo dõi xu hướng bán hàng hàng ngày với phân tích chi tiết</p>
                        </div>
                        <div class="chart-controls">
                            <div class="chart-legend">
                                <div class="legend-item">
                                    <span class="legend-color" style="background: #10b981;"></span>
                                    <span>Doanh thu</span>
                                </div>
                                <div class="legend-item">
                                    <span class="legend-color" style="background: #6366f1;"></span>
                                    <span>Đơn hàng</span>
                                </div>
                            </div>
                            <form class="filter-form">
                                <select name="month" class="form-select modern-select" onchange="this.form.submit()">
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
                            </form>
                        </div>
                    </div>
                    <div class="chart-container">
                        <div id="sales"></div>
                    </div>
                    <div class="chart-insights">
                        <div class="insight-item">
                            <i class="fas fa-trending-up text-success"></i>
                            <span>Tăng trưởng ổn định trong tháng</span>
                        </div>
                        <div class="insight-item">
                            <i class="fas fa-star text-warning"></i>
                            <span>Ngày bán tốt nhất: {{ array_keys($totalSalesByDay, max($totalSalesByDay))[0] ?? 'N/A' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="performance-card enhanced-performance-card">
                <div class="card-body">
                    <h3 class="performance-title">🎯 Hiệu suất hôm nay</h3>
                    <div class="performance-overview">
                        <div class="overview-chart">
                            <canvas id="performanceDonut" width="150" height="150"></canvas>
                        </div>
                        <div class="overview-stats">
                            <div class="overview-stat">
                                <span class="stat-value">{{ rand(75, 95) }}%</span>
                                <span class="stat-label">Hiệu suất tổng</span>
                            </div>
                        </div>
                    </div>
                    <div class="performance-metrics">
                        <div class="metric-item">
                            <div class="metric-icon">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <div class="metric-info">
                                <h4>{{ rand(15, 45) }}</h4>
                                <p>Đơn hàng mới</p>
                                <div class="metric-bar">
                                    <div class="bar-fill" style="width: 75%; background: linear-gradient(90deg, #10b981, #059669);"></div>
                                </div>
                            </div>
                            <div class="metric-percentage">75%</div>
                        </div>

                        <div class="metric-item">
                            <div class="metric-icon">
                                <i class="fas fa-eye"></i>
                            </div>
                            <div class="metric-info">
                                <h4>{{ rand(250, 800) }}</h4>
                                <p>Lượt xem</p>
                                <div class="metric-bar">
                                    <div class="bar-fill" style="width: 62%; background: linear-gradient(90deg, #6366f1, #4f46e5);"></div>
                                </div>
                            </div>
                            <div class="metric-percentage">62%</div>
                        </div>

                        <div class="metric-item">
                            <div class="metric-icon">
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="metric-info">
                                <h4>{{ rand(10, 30) }}</h4>
                                <p>Đánh giá mới</p>
                                <div class="metric-bar">
                                    <div class="bar-fill" style="width: 88%; background: linear-gradient(90deg, #f59e0b, #d97706);"></div>
                                </div>
                            </div>
                            <div class="metric-percentage">88%</div>
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
/* Enhanced Dashboard Styles */
.welcome-banner {
    background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
    border: none;
    overflow: hidden;
    position: relative;
    box-shadow: 0 20px 40px rgba(16, 185, 129, 0.15);
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

@keyframes pulse {
    0%, 100% { transform: translate(30%, -30%) scale(1); }
    50% { transform: translate(30%, -30%) scale(1.1); }
}

/* Stats Cards */
.stats-card {
    border: none;
    position: relative;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.stats-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--primary) 0%, var(--accent) 100%);
}

.stats-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.2);
}

.stats-content {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    margin-bottom: 1rem;
    position: relative;
}

.mini-chart {
    position: absolute;
    top: -10px;
    right: -10px;
    opacity: 0.3;
    transition: opacity 0.3s ease;
}

.stats-card:hover .mini-chart {
    opacity: 0.6;
}

.stats-icon {
    width: 60px;
    height: 60px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: white;
}

.stats-icon.products { background: linear-gradient(135deg, #10b981 0%, #059669 100%); }
.stats-icon.orders { background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%); }
.stats-icon.revenue { background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); }
.stats-icon.users { background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%); }

.stats-info {
    flex: 1;
}

.stats-number {
    font-size: 2rem;
    font-weight: 800;
    color: var(--text-primary);
    margin-bottom: 0.25rem;
}

.stats-label {
    font-size: 0.875rem;
    color: var(--text-secondary);
    margin-bottom: 0.5rem;
}

.stats-trend {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.trend-icon {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.75rem;
}

.trend-icon.positive {
    background: rgba(16, 185, 129, 0.1);
    color: #10b981;
}

.trend-text {
    font-size: 0.75rem;
    color: var(--text-muted);
}

.stats-progress {
    height: 4px;
    background: var(--surface);
    border-radius: 2px;
    overflow: hidden;
}

.progress-bar {
    height: 100%;
    border-radius: 2px;
    animation: progressAnimation 2s ease-out;
}

.products-progress { 
    width: 85%; 
    background: linear-gradient(90deg, #10b981 0%, #059669 100%); 
}
.orders-progress { 
    width: 72%; 
    background: linear-gradient(90deg, #6366f1 0%, #4f46e5 100%); 
}
.revenue-progress { 
    width: 90%; 
    background: linear-gradient(90deg, #f59e0b 0%, #d97706 100%); 
}
.users-progress { 
    width: 68%; 
    background: linear-gradient(90deg, #8b5cf6 0%, #7c3aed 100%); 
}

@keyframes progressAnimation {
    from { width: 0; }
}

/* Chart Card */
.chart-card {
    border: none;
}

.chart-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 2rem;
}

.chart-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 0.25rem;
}

.chart-subtitle {
    color: var(--text-muted);
    margin-bottom: 0;
}

.modern-select {
    background: var(--surface);
    border: 2px solid var(--border);
    color: var(--text-primary);
    border-radius: 12px;
    padding: 0.75rem 1rem;
}

.modern-select:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
}

/* Enhanced Chart Card */
.advanced-chart-card {
    background: linear-gradient(135deg, 
        rgba(255, 255, 255, 0.1) 0%, 
        rgba(255, 255, 255, 0.05) 100%);
    border: 1px solid rgba(255, 255, 255, 0.1);
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
}

.chart-legend {
    display: flex;
    gap: 1rem;
    margin-bottom: 1rem;
}

.legend-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.875rem;
    color: var(--text-secondary);
}

.legend-color {
    width: 12px;
    height: 12px;
    border-radius: 2px;
}

.chart-insights {
    display: flex;
    gap: 2rem;
    margin-top: 1rem;
    padding-top: 1rem;
    border-top: 1px solid var(--border);
}

.insight-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--text-secondary);
    font-size: 0.875rem;
}

/* Performance Card */
.performance-card {
    background: linear-gradient(135deg, rgba(99, 102, 241, 0.05) 0%, rgba(139, 92, 246, 0.05) 100%);
    border: 1px solid rgba(99, 102, 241, 0.1);
}

.enhanced-performance-card {
    background: linear-gradient(135deg, 
        rgba(99, 102, 241, 0.08) 0%, 
        rgba(139, 92, 246, 0.08) 100%);
    border: 1px solid rgba(99, 102, 241, 0.15);
}

.performance-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 1.5rem;
}

.performance-overview {
    text-align: center;
    margin-bottom: 2rem;
}

.overview-chart {
    position: relative;
    display: inline-block;
    margin-bottom: 1rem;
}

.overview-stats {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.overview-stat .stat-value {
    display: block;
    font-size: 1.5rem;
    font-weight: 800;
    color: var(--text-primary);
}

.overview-stat .stat-label {
    font-size: 0.75rem;
    color: var(--text-muted);
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.metric-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem;
    background: var(--surface);
    border-radius: 12px;
    margin-bottom: 1rem;
    border: 1px solid var(--border);
    transition: all 0.3s ease;
}

.metric-item:hover {
    transform: translateX(4px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.metric-bar {
    width: 100%;
    height: 4px;
    background: var(--surface);
    border-radius: 2px;
    margin-top: 0.5rem;
    overflow: hidden;
}

.bar-fill {
    height: 100%;
    border-radius: 2px;
    transition: width 1s ease-out;
    animation: fillBar 1.5s ease-out;
}

@keyframes fillBar {
    from { width: 0; }
}

.metric-percentage {
    font-weight: 700;
    color: var(--text-primary);
    font-size: 0.875rem;
    min-width: 35px;
    text-align: right;
}

/* Analytics Cards */
.analytics-card {
    background: linear-gradient(145deg, 
        rgba(255, 255, 255, 0.08) 0%, 
        rgba(255, 255, 255, 0.04) 100%);
    border: 1px solid var(--border);
    border-radius: 20px;
    transition: all 0.3s ease;
    overflow: hidden;
}

.analytics-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
}

.analytics-title {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 1.5rem;
}

.analytics-chart {
    margin-bottom: 1.5rem;
    position: relative;
}

.analytics-summary {
    display: flex;
    justify-content: space-around;
    padding-top: 1rem;
    border-top: 1px solid var(--border);
}

.summary-item {
    text-align: center;
}

.summary-value {
    display: block;
    font-size: 1.25rem;
    font-weight: 800;
    color: var(--text-primary);
    margin-bottom: 0.25rem;
}

.summary-label {
    font-size: 0.75rem;
    color: var(--text-muted);
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .welcome-title {
        font-size: 1.75rem;
    }
    
    .quick-stats {
        flex-direction: column;
        gap: 1rem;
    }
    
    .chart-header {
        flex-direction: column;
        gap: 1rem;
    }
    
    .table-header {
        flex-direction: column;
        gap: 1rem;
        align-items: flex-start;
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