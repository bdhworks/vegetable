@extends('admin.layout.be')

@section('content')
<div class="product-show-page">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <div class="header-left">
                <h1 class="page-title">
                    <i class="ti ti-eye"></i>
                    Chi tiết sản phẩm
                </h1>
                <nav class="breadcrumb-modern">
                    <ol>
                        <li><a href="{{ route('admin.dashboard') }}"><i class="ti ti-home"></i>Dashboard</a></li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li><a href="{{ route('product.index') }}">Sản phẩm</a></li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li class="active">Chi tiết</li>
                    </ol>
                </nav>
            </div>
            <div class="header-right">
                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-edit">
                    <i class="ti ti-edit"></i>
                    <span>Chỉnh sửa</span>
                </a>
                <a href="{{ route('product.index') }}" class="btn btn-back">
                    <i class="ti ti-arrow-left"></i>
                    <span>Quay lại</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Alert Messages -->
    @if(session('msg'))
        <div class="alert-container">
            <div class="alert alert-success-modern">
                <div class="alert-icon">
                    <i class="ti ti-check"></i>
                </div>
                <div class="alert-content">
                    <strong>Thành công!</strong>
                    <p>{{ session('msg') }}</p>
                </div>
                <button class="alert-close" onclick="this.parentElement.parentElement.remove()">
                    <i class="ti ti-x"></i>
                </button>
            </div>
        </div>
    @endif

    <div class="row g-4">
        <!-- Main Content -->
        <div class="col-lg-8">
            <!-- Product Info Card -->
            <div class="content-card">
                <div class="card-header-custom">
                    <div class="header-left">
                        <h3 class="card-title-custom">
                            <i class="ti ti-info-circle"></i>
                            Thông tin sản phẩm
                        </h3>
                    </div>
                    <div class="header-right">
                        <span class="status-badge {{ $product->status == 1 ? 'active' : 'inactive' }}">
                            <i class="ti ti-{{ $product->status == 1 ? 'eye' : 'eye-off' }}"></i>
                            {{ $product->status == 1 ? 'Đang hiển thị' : 'Đang ẩn' }}
                        </span>
                    </div>
                </div>
                <div class="card-body-custom">
                    <div class="info-grid">
                        <div class="info-item">
                            <span class="info-label"><i class="ti ti-qrcode"></i> Mã sản phẩm</span>
                            <span class="info-value code-badge">{{ $product->productCode->name }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label"><i class="ti ti-package"></i> Tên sản phẩm</span>
                            <span class="info-value">{{ $product->name }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label"><i class="ti ti-category"></i> Loại sản phẩm</span>
                            <span class="info-value">{{ $product->category->name }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label"><i class="ti ti-world"></i> Xuất xứ</span>
                            <span class="info-value">{{ $product->origin->name }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label"><i class="ti ti-coin"></i> Giá nhập</span>
                            <span class="info-value price-import">{{ number_format($product->price_import) }}đ</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label"><i class="ti ti-cash"></i> Giá bán</span>
                            <span class="info-value price-sale">{{ number_format($product->price_sale) }}đ</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label"><i class="ti ti-weight"></i> Khối lượng</span>
                            <span class="info-value">{{ $product->weight }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label"><i class="ti ti-box"></i> Số lượng tồn</span>
                            <span class="info-value {{ $product->quantity <= 10 ? 'low-stock' : '' }}">{{ $product->quantity }} hộp</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistics Card -->
            <div class="content-card mt-4">
                <div class="card-header-custom">
                    <h3 class="card-title-custom">
                        <i class="ti ti-chart-bar"></i>
                        Thống kê sản phẩm
                    </h3>
                </div>
                <div class="card-body-custom">
                    <div class="stats-grid">
                        <div class="stat-item">
                            <div class="stat-icon sold">
                                <i class="ti ti-shopping-cart"></i>
                            </div>
                            <div class="stat-content">
                                <span class="stat-label">Đã bán</span>
                                <h4 class="stat-value">{{ $product->sold }}</h4>
                            </div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-icon stock">
                                <i class="ti ti-box"></i>
                            </div>
                            <div class="stat-content">
                                <span class="stat-label">Tồn kho</span>
                                <h4 class="stat-value">{{ $product->quantity }}</h4>
                            </div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-icon profit">
                                <i class="ti ti-trending-up"></i>
                            </div>
                            <div class="stat-content">
                                <span class="stat-label">Lợi nhuận/SP</span>
                                <h4 class="stat-value">{{ number_format($product->price_sale - $product->price_import) }}đ</h4>
                            </div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-icon revenue">
                                <i class="ti ti-currency-dong"></i>
                            </div>
                            <div class="stat-content">
                                <span class="stat-label">Doanh thu ước tính</span>
                                <h4 class="stat-value">{{ number_format($product->sold * $product->price_sale) }}đ</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Images -->
            <div class="content-card mt-4">
                <div class="card-header-custom">
                    <h3 class="card-title-custom">
                        <i class="ti ti-photo"></i>
                        Hình ảnh sản phẩm
                    </h3>
                </div>
                <div class="card-body-custom">
                    <div class="product-images-grid">
                        @foreach ($product->images as $image)
                            <div class="product-image-item">
                                <img src="{{ $image->image }}" alt="Product Image">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Product Description -->
            <div class="content-card mt-4">
                <div class="card-header-custom">
                    <h3 class="card-title-custom">
                        <i class="ti ti-file-text"></i>
                        Mô tả sản phẩm
                    </h3>
                </div>
                <div class="card-body-custom">
                    <div class="product-description">
                        {!! $product->desc !!}
                    </div>
                </div>
            </div>

            <!-- Price History -->
            <div class="content-card mt-4">
                <div class="card-header-custom">
                    <h3 class="card-title-custom">
                        <i class="ti ti-chart-line"></i>
                        Lịch sử giá
                    </h3>
                </div>
                <div class="card-body-custom">
                    <div class="row g-3">
                        <!-- Import Price History -->
                        <div class="col-md-6">
                            <h6 class="price-history-title">
                                <i class="ti ti-coin"></i>
                                Lịch sử giá nhập
                            </h6>
                            <div class="price-history-list">
                                @foreach ($priceUpdate as $price)
                                    @if ($price->price_import)
                                        <div class="price-history-item">
                                            <span class="price-date">
                                                <i class="ti ti-calendar"></i>
                                                {{ date_format($price->created_at, 'd/m/Y') }}
                                            </span>
                                            <span class="price-amount import">{{ number_format($price->price_import) }}đ</span>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <!-- Sale Price History -->
                        <div class="col-md-6">
                            <h6 class="price-history-title">
                                <i class="ti ti-cash"></i>
                                Lịch sử giá bán
                            </h6>
                            <div class="price-history-list">
                                @foreach ($priceUpdate as $price)
                                    @if ($price->price_sale)
                                        <div class="price-history-item">
                                            <span class="price-date">
                                                <i class="ti ti-calendar"></i>
                                                {{ date_format($price->updated_at, 'd/m/Y') }}
                                            </span>
                                            <span class="price-amount sale">{{ number_format($price->price_sale) }}đ</span>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Details Table -->
            <div class="content-card mt-4">
                <div class="card-header-custom">
                    <h3 class="card-title-custom">
                        <i class="ti ti-list-details"></i>
                        Chi tiết bổ sung
                    </h3>
                </div>
                <div class="card-body-custom">
                    <div class="detail-table">
                        <div class="detail-row">
                            <span class="detail-label">
                                <i class="ti ti-calendar-plus"></i>
                                Ngày tạo
                            </span>
                            <span class="detail-value">{{ $product->created_at->format('d/m/Y H:i') }}</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">
                                <i class="ti ti-calendar-event"></i>
                                Cập nhật lần cuối
                            </span>
                            <span class="detail-value">{{ $product->updated_at->format('d/m/Y H:i') }}</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">
                                <i class="ti ti-clock"></i>
                                Thời gian tồn tại
                            </span>
                            <span class="detail-value">{{ $product->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">
                                <i class="ti ti-percentage"></i>
                                Tỷ lệ bán
                            </span>
                            <span class="detail-value">
                                @php
                                    $total = $product->sold + $product->quantity;
                                    $percentage = $total > 0 ? round(($product->sold / $total) * 100, 2) : 0;
                                @endphp
                                {{ $percentage }}%
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Quick Actions Card -->
            <div class="content-card sticky-sidebar">
                <div class="card-header-custom">
                    <h3 class="card-title-custom">
                        <i class="ti ti-bolt"></i>
                        Thao tác nhanh
                    </h3>
                </div>
                <div class="card-body-custom">
                    <div class="quick-actions">
                        <a href="{{ route('product.edit', $product->id) }}" class="action-btn edit">
                            <i class="ti ti-edit"></i>
                            <span>Chỉnh sửa sản phẩm</span>
                        </a>
                        <a href="{{ route('product.active', $product->id) }}" class="action-btn {{ $product->status == 1 ? 'hide' : 'show' }}">
                            <i class="ti ti-{{ $product->status == 1 ? 'eye-off' : 'eye' }}"></i>
                            <span>{{ $product->status == 1 ? 'Ẩn sản phẩm' : 'Hiện sản phẩm' }}</span>
                        </a>
                        @if($product->sold <= 0)
                            <button class="action-btn delete" onclick="confirmDelete()">
                                <i class="ti ti-trash"></i>
                                <span>Xóa sản phẩm</span>
                            </button>
                        @endif
                        <a href="{{ route('product.index') }}" class="action-btn back">
                            <i class="ti ti-arrow-left"></i>
                            <span>Quay lại danh sách</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Update Import Price -->
            <div class="content-card mt-4">
                <div class="card-header-custom">
                    <h3 class="card-title-custom">
                        <i class="ti ti-coin"></i>
                        Cập nhật giá nhập
                    </h3>
                    <span class="date-badge">{{ $dateToday }}</span>
                </div>
                <div class="card-body-custom">
                    <form action="{{ route('product.priceImport', $product->id) }}" method="POST">
                        @csrf
                        <div class="form-group-modern">
                            <label class="form-label-modern required">
                                <i class="ti ti-coin"></i>
                                Giá nhập mới (VNĐ)
                            </label>
                            <input type="number" 
                                   name="price_import_new" 
                                   class="form-control-modern" 
                                   placeholder="Nhập giá nhập..."
                                   min="0"
                                   required>
                            @error('price_import_new')
                                <div class="error-message">
                                    <i class="ti ti-alert-circle"></i>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-update-price">
                            <i class="ti ti-check"></i>
                            <span>Cập nhật giá nhập</span>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Update Sale Price -->
            <div class="content-card mt-4">
                <div class="card-header-custom">
                    <h3 class="card-title-custom">
                        <i class="ti ti-cash"></i>
                        Cập nhật giá bán
                    </h3>
                    <span class="date-badge">{{ $dateToday }}</span>
                </div>
                <div class="card-body-custom">
                    <form action="{{ route('product.priceSale', $product->id) }}" method="POST">
                        @csrf
                        <div class="form-group-modern">
                            <label class="form-label-modern required">
                                <i class="ti ti-cash"></i>
                                Giá bán mới (VNĐ)
                            </label>
                            <input type="number" 
                                   name="price_sale_new" 
                                   class="form-control-modern" 
                                   placeholder="Nhập giá bán..."
                                   min="0"
                                   required>
                            @error('price_sale_new')
                                <div class="error-message">
                                    <i class="ti ti-alert-circle"></i>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-update-price">
                            <i class="ti ti-check"></i>
                            <span>Cập nhật giá bán</span>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Price Info Summary -->
            <div class="content-card mt-4">
                <div class="card-header-custom">
                    <h3 class="card-title-custom">
                        <i class="ti ti-report-money"></i>
                        Tổng quan giá
                    </h3>
                </div>
                <div class="card-body-custom">
                    <div class="price-summary">
                        <div class="summary-item">
                            <span class="summary-label">Giá nhập hiện tại</span>
                            <span class="summary-value import">{{ number_format($product->price_import) }}đ</span>
                        </div>
                        <div class="summary-item">
                            <span class="summary-label">Giá bán hiện tại</span>
                            <span class="summary-value sale">{{ number_format($product->price_sale) }}đ</span>
                        </div>
                        <div class="summary-item highlight">
                            <span class="summary-label">Chênh lệch</span>
                            <span class="summary-value profit">{{ number_format($product->price_sale - $product->price_import) }}đ</span>
                        </div>
                        <div class="summary-item highlight">
                            <span class="summary-label">Tỷ suất lợi nhuận</span>
                            <span class="summary-value profit">
                                @php
                                    $profitMargin = $product->price_import > 0 ? round((($product->price_sale - $product->price_import) / $product->price_import) * 100, 2) : 0;
                                @endphp
                                {{ $profitMargin }}%
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Form -->
<form id="deleteForm" action="{{ route('product.destroy', ['product_id' => $product->id]) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

<style>
/* Product Show Page Styles */
.product-show-page {
    padding: 1.5rem;
    background: #f5f7fa;
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
    color: #1f2937;
    margin: 0 0 0.5rem 0;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.page-title i {
    font-size: 2rem;
    color: #0ea5e9;
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
    color: #6b7280;
}

.breadcrumb-modern li {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.breadcrumb-modern a {
    color: #6b7280;
    text-decoration: none;
    transition: color 0.2s;
    display: flex;
    align-items: center;
    gap: 0.375rem;
}

.breadcrumb-modern a:hover {
    color: #0ea5e9;
}

.breadcrumb-modern .active {
    color: #1f2937;
    font-weight: 500;
}

.header-right {
    display: flex;
    gap: 0.75rem;
    flex-wrap: wrap;
}

.btn-edit {
    background: linear-gradient(135deg, #0ea5e9 0%, #0284c7 100%);
    color: white;
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 0.5rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
    box-shadow: 0 4px 6px -1px rgba(14, 165, 233, 0.3);
    text-decoration: none;
}

.btn-edit:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 15px -3px rgba(14, 165, 233, 0.4);
    color: white;
}

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
    border-color: #0ea5e9;
    color: #0ea5e9;
}

/* Alert Styles */
.alert-container {
    margin-bottom: 1.5rem;
}

.alert {
    border-radius: 0.75rem;
    padding: 1.25rem;
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    animation: slideInDown 0.3s ease;
}

@keyframes slideInDown {
    from { opacity: 0; transform: translateY(-20px); }
    to { opacity: 1; transform: translateY(0); }
}

.alert-success-modern {
    background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
    border-left: 4px solid #10b981;
}

.alert-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    flex-shrink: 0;
}

.alert-success-modern .alert-icon {
    background: #10b981;
    color: white;
}

.alert-content {
    flex: 1;
}

.alert-content strong {
    display: block;
    margin-bottom: 0.25rem;
    font-size: 1rem;
    color: #065f46;
}

.alert-content p {
    margin: 0;
    font-size: 0.875rem;
    color: #047857;
}

.alert-close {
    background: none;
    border: none;
    cursor: pointer;
    font-size: 1.25rem;
    color: #047857;
    opacity: 0.7;
    transition: opacity 0.3s;
    padding: 0;
    width: 24px;
    height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.alert-close:hover {
    opacity: 1;
}

/* Content Card */
.content-card {
    background: white;
    border-radius: 0.75rem;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.card-header-custom {
    padding: 1.5rem;
    border-bottom: 2px solid #e0f2fe;
    background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
}

.card-title-custom {
    font-size: 1.25rem;
    font-weight: 700;
    color: #0c4a6e;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.card-title-custom i {
    color: #0ea5e9;
}

.date-badge {
    background: linear-gradient(135deg, #0ea5e9, #0284c7);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    font-size: 0.875rem;
    font-weight: 600;
    box-shadow: 0 2px 4px rgba(14, 165, 233, 0.2);
}

.card-body-custom {
    padding: 1.5rem;
}

/* Info Grid */
.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.25rem;
}

.info-item {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
    padding: 1.25rem;
    background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
    border-radius: 0.75rem;
    border: 2px solid #e0f2fe;
    transition: all 0.3s ease;
}

.info-item:hover {
    border-color: #0ea5e9;
    box-shadow: 0 4px 12px rgba(14, 165, 233, 0.1);
    transform: translateY(-2px);
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
    color: #0ea5e9;
}

.info-value {
    font-size: 1.125rem;
    font-weight: 700;
    color: #1e293b;
    word-break: break-word;
}

.code-badge {
    font-family: 'Courier New', monospace;
    background: linear-gradient(135deg, #ccfbf1, #99f6e4);
    color: #0f766e;
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    display: inline-block;
    width: fit-content;
    border: 2px solid #5eead4;
    font-weight: 700;
    letter-spacing: 1px;
}

.price-import {
    color: #991b1b;
    background: linear-gradient(135deg, #fee2e2, #fecaca);
    padding: 0.375rem 0.75rem;
    border-radius: 0.375rem;
    display: inline-block;
    width: fit-content;
    font-weight: 700;
}

.price-sale {
    color: #065f46;
    background: linear-gradient(135deg, #d1fae5, #a7f3d0);
    padding: 0.375rem 0.75rem;
    border-radius: 0.375rem;
    display: inline-block;
    width: fit-content;
    font-weight: 700;
}

.low-stock {
    color: #991b1b;
    background: linear-gradient(135deg, #fee2e2, #fecaca);
    padding: 0.375rem 0.75rem;
    border-radius: 0.375rem;
    display: inline-block;
    width: fit-content;
    animation: pulse 2s infinite;
    font-weight: 700;
}

@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.7; }
}

/* Product Images Grid */
.product-images-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 1.5rem;
}

.product-image-item {
    border-radius: 0.75rem;
    overflow: hidden;
    border: 3px solid #e0f2fe;
    aspect-ratio: 1;
    transition: all 0.3s ease;
    position: relative;
}

.product-image-item::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(14, 165, 233, 0.1), transparent);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.product-image-item:hover::before {
    opacity: 1;
}

.product-image-item:hover {
    border-color: #0ea5e9;
    box-shadow: 0 12px 24px rgba(14, 165, 233, 0.2);
    transform: scale(1.05);
}

.product-image-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Product Description */
.product-description {
    font-size: 0.9375rem;
    line-height: 1.75;
    color: #475569;
}

.product-description p {
    margin-bottom: 1rem;
}

.product-description img {
    max-width: 100%;
    height: auto;
    border-radius: 0.5rem;
    margin: 1rem 0;
}

/* Price History */
.price-history-title {
    font-size: 1.125rem;
    font-weight: 700;
    color: #0f172a;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding-bottom: 0.75rem;
    border-bottom: 2px solid #e0f2fe;
}

.price-history-title i {
    color: #0ea5e9;
}

.price-history-list {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
    max-height: 400px;
    overflow-y: auto;
    padding-right: 0.5rem;
}

.price-history-list::-webkit-scrollbar {
    width: 6px;
}

.price-history-list::-webkit-scrollbar-track {
    background: #f1f5f9;
    border-radius: 10px;
}

.price-history-list::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 10px;
}

.price-history-list::-webkit-scrollbar-thumb:hover {
    background: #94a3b8;
}

.price-history-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem 1.25rem;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    border-radius: 0.75rem;
    border-left: 4px solid #cbd5e1;
    transition: all 0.3s ease;
}

.price-history-item:hover {
    background: white;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    border-left-color: #0ea5e9;
    transform: translateX(4px);
}

.price-date {
    font-size: 0.875rem;
    color: #64748b;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: 500;
}

.price-date i {
    color: #0ea5e9;
}

.price-amount {
    font-size: 1rem;
    font-weight: 700;
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
}

.price-amount.import {
    background: linear-gradient(135deg, #fee2e2, #fecaca);
    color: #991b1b;
    border: 2px solid #fca5a5;
}

.price-amount.sale {
    background: linear-gradient(135deg, #d1fae5, #a7f3d0);
    color: #065f46;
    border: 2px solid #6ee7b7;
}

/* Additional Styles */

/* Status Badge in Header */
.header-left {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.header-right .status-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    font-weight: 600;
    font-size: 0.875rem;
}

.status-badge.active {
    background: linear-gradient(135deg, #d1fae5, #a7f3d0);
    color: #065f46;
    border: 2px solid #6ee7b7;
}

.status-badge.inactive {
    background: linear-gradient(135deg, #fef3c7, #fde68a);
    color: #92400e;
    border: 2px solid #fbbf24;
}

/* Statistics Grid */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.25rem;
}

.stat-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1.25rem;
    background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
    border-radius: 0.75rem;
    border: 2px solid #e0f2fe;
    transition: all 0.3s ease;
}

.stat-item:hover {
    border-color: #0ea5e9;
    box-shadow: 0 4px 12px rgba(14, 165, 233, 0.15);
    transform: translateY(-2px);
}

.stat-icon {
    width: 60px;
    height: 60px;
    border-radius: 0.75rem;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.75rem;
    color: white;
    flex-shrink: 0;
}

.stat-icon.sold {
    background: linear-gradient(135deg, #6366f1, #4f46e5);
}

.stat-icon.stock {
    background: linear-gradient(135deg, #f59e0b, #d97706);
}

.stat-icon.profit {
    background: linear-gradient(135deg, #10b981, #059669);
}

.stat-icon.revenue {
    background: linear-gradient(135deg, #ec4899, #db2777);
}

.stat-content {
    flex: 1;
}

.stat-label {
    display: block;
    font-size: 0.875rem;
    color: #64748b;
    margin-bottom: 0.25rem;
    font-weight: 500;
}

.stat-value {
    font-size: 1.5rem;
    font-weight: 700;
    color: #1e293b;
    margin: 0;
}

/* Detail Table */
.detail-table {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.detail-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem 1.25rem;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    border-radius: 0.5rem;
    border-left: 3px solid #e0f2fe;
    transition: all 0.3s ease;
}

.detail-row:hover {
    border-left-color: #0ea5e9;
    background: white;
    box-shadow: 0 2px 8px rgba(14, 165, 233, 0.1);
}

.detail-label {
    font-size: 0.875rem;
    color: #64748b;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.detail-label i {
    color: #0ea5e9;
}

.detail-value {
    font-size: 0.9375rem;
    font-weight: 700;
    color: #1e293b;
}

/* Quick Actions */
.quick-actions {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.action-btn {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 1rem 1.25rem;
    border-radius: 0.5rem;
    font-weight: 600;
    font-size: 0.9375rem;
    text-decoration: none;
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.action-btn i {
    font-size: 1.25rem;
}

.action-btn.edit {
    background: linear-gradient(135deg, #dbeafe, #bfdbfe);
    color: #1e40af;
}

.action-btn.edit:hover {
    background: linear-gradient(135deg, #3b82f6, #2563eb);
    color: white;
    box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
}

.action-btn.show {
    background: linear-gradient(135deg, #d1fae5, #a7f3d0);
    color: #065f46;
}

.action-btn.show:hover {
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
    box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
}

.action-btn.hide {
    background: linear-gradient(135deg, #fef3c7, #fde68a);
    color: #92400e;
}

.action-btn.hide:hover {
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: white;
    box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
}

.action-btn.delete {
    background: linear-gradient(135deg, #fee2e2, #fecaca);
    color: #991b1b;
    border: none;
    width: 100%;
    cursor: pointer;
}

.action-btn.delete:hover {
    background: linear-gradient(135deg, #ef4444, #dc2626);
    color: white;
    box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
}

.action-btn.back {
    background: linear-gradient(135deg, #f1f5f9, #e2e8f0);
    color: #475569;
}

.action-btn.back:hover {
    background: linear-gradient(135deg, #64748b, #475569);
    color: white;
    box-shadow: 0 4px 12px rgba(100, 116, 139, 0.3);
}

/* Price Summary */
.price-summary {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.summary-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.875rem 1rem;
    background: #f8fafc;
    border-radius: 0.5rem;
    border-left: 3px solid #cbd5e1;
}

.summary-item.highlight {
    background: linear-gradient(135deg, #f0f9ff, #e0f2fe);
    border-left-color: #0ea5e9;
}

.summary-label {
    font-size: 0.875rem;
    color: #64748b;
    font-weight: 600;
}

.summary-value {
    font-size: 1rem;
    font-weight: 700;
}

.summary-value.import {
    color: #991b1b;
}

.summary-value.sale {
    color: #065f46;
}

.summary-value.profit {
    color: #0284c7;
}

/* Responsive Updates */
@media (max-width: 768px) {
    .stats-grid {
        grid-template-columns: 1fr;
    }

    .header-left,
    .header-right {
        width: 100%;
    }

    .card-header-custom {
        flex-direction: column;
        align-items: flex-start;
    }

    .stat-item {
        flex-direction: row;
    }
}

/* Form Styles */
.form-group-modern {
    margin-bottom: 1.5rem;
}

.form-label-modern {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: 600;
    color: #1e293b;
    margin-bottom: 0.75rem;
    font-size: 0.9375rem;
}

.form-label-modern i {
    color: #0ea5e9;
}

.form-label-modern.required::after {
    content: '*';
    color: #ef4444;
    margin-left: 0.25rem;
}

.form-control-modern {
    width: 100%;
    padding: 0.875rem 1rem;
    border: 2px solid #e0f2fe;
    border-radius: 0.5rem;
    font-size: 0.9375rem;
    transition: all 0.3s ease;
    background: white;
    color: #1e293b;
}

.form-control-modern:focus {
    outline: none;
    border-color: #0ea5e9;
    box-shadow: 0 0 0 4px rgba(14, 165, 233, 0.1);
}

.error-message {
    display: flex;
    align-items: center;
    gap: 0.375rem;
    margin-top: 0.5rem;
    color: #dc2626;
    font-size: 0.875rem;
    font-weight: 500;
}

.btn-update-price {
    width: 100%;
    background: linear-gradient(135deg, #0ea5e9 0%, #0284c7 100%);
    color: white;
    border: none;
    padding: 1rem 1.5rem;
    border-radius: 0.5rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
    box-shadow: 0 4px 6px -1px rgba(14, 165, 233, 0.4);
    font-size: 1rem;
}

.btn-update-price:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 20px -3px rgba(14, 165, 233, 0.5);
}

.btn-update-price:active {
    transform: translateY(0);
}
</style>

<script>
// Auto-hide alerts
setTimeout(() => {
    document.querySelectorAll('.alert').forEach(alert => {
        alert.style.transition = 'opacity 0.5s';
        alert.style.opacity = '0';
        setTimeout(() => alert.parentElement.remove(), 500);
    });
}, 5000);

// Delete confirmation
function confirmDelete() {
    if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này? Hành động này không thể hoàn tác!')) {
        document.getElementById('deleteForm').submit();
    }
}
</script>

@endsection
