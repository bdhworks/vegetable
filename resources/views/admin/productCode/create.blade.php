@extends('admin.layout.be')

@section('content')
<div class="product-code-create-page">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <div class="header-left">
                <h1 class="page-title">
                    <i class="ti ti-plus"></i>
                    Thêm mã sản phẩm
                </h1>
                <nav class="breadcrumb-modern">
                    <ol>
                        <li><a href="{{ route('admin.dashboard') }}"><i class="ti ti-home"></i>Dashboard</a></li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li><a href="{{ route('productCode.index') }}">Mã sản phẩm</a></li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li class="active">Thêm mới</li>
                    </ol>
                </nav>
            </div>
            <div class="header-right">
                <a href="{{ route('productCode.index') }}" class="btn btn-back">
                    <i class="ti ti-arrow-left"></i>
                    <span>Quay lại</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Form Content -->
    <div class="form-container">
        <form method="POST" action="{{ route('productCode.store') }}">
            @csrf
            
            <div class="row g-4">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <div class="content-card">
                        <div class="card-header-custom">
                            <h3 class="card-title-custom">
                                <i class="ti ti-info-circle"></i>
                                Thông tin mã sản phẩm
                            </h3>
                            <p class="card-subtitle-custom">Nhập thông tin chi tiết cho mã sản phẩm</p>
                        </div>
                        <div class="card-body-custom">
                            <!-- Code Field -->
                            <div class="form-group-modern">
                                <label class="form-label-modern required">
                                    <i class="ti ti-barcode"></i>
                                    Mã sản phẩm
                                </label>
                                <input type="text" 
                                       name="name" 
                                       class="form-control-modern code-input" 
                                       id="name"
                                       placeholder="VD: PRD001, SKU2024"
                                       value="{{ old('name') }}"
                                       required>
                                <small class="form-hint">
                                    <i class="ti ti-info-circle"></i>
                                    Mã sản phẩm nên viết hoa, không dấu, không khoảng trắng
                                </small>
                                @error('name')
                                    <div class="error-message">
                                        <i class="ti ti-alert-circle"></i>
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

                            <!-- Title Field -->
                            <div class="form-group-modern">
                                <label class="form-label-modern required">
                                    <i class="ti ti-tag"></i>
                                    Tên sản phẩm
                                </label>
                                <input type="text" 
                                       name="title" 
                                       class="form-control-modern" 
                                       id="title"
                                       placeholder="Nhập tên sản phẩm..."
                                       value="{{ old('title') }}"
                                       required>
                                @error('title')
                                    <div class="error-message">
                                        <i class="ti ti-alert-circle"></i>
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

                            <!-- Description Field -->
                            <div class="form-group-modern">
                                <label class="form-label-modern">
                                    <i class="ti ti-file-text"></i>
                                    Mô tả
                                </label>
                                <textarea class="form-control-modern ckeditor" 
                                          name="desc" 
                                          id="desc"
                                          rows="6"
                                          placeholder="Nhập mô tả cho sản phẩm...">{{ old('desc') }}</textarea>
                                @error('desc')
                                    <div class="error-message">
                                        <i class="ti ti-alert-circle"></i>
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Publish Card -->
                    <div class="content-card sticky-sidebar">
                        <div class="card-header-custom">
                            <h3 class="card-title-custom">
                                <i class="ti ti-settings"></i>
                                Cài đặt
                            </h3>
                        </div>
                        <div class="card-body-custom">
                            <!-- Status Field -->
                            <div class="form-group-modern">
                                <label class="form-label-modern required">
                                    <i class="ti ti-toggle-right"></i>
                                    Trạng thái
                                </label>
                                <select name="status" class="form-select-modern" required>
                                    <option value="">Chọn trạng thái...</option>
                                    <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>
                                        Hiển thị
                                    </option>
                                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>
                                        Ẩn
                                    </option>
                                </select>
                                @error('status')
                                    <div class="error-message">
                                        <i class="ti ti-alert-circle"></i>
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

                            <!-- Info Box -->
                            <div class="info-box">
                                <div class="info-icon">
                                    <i class="ti ti-info-circle"></i>
                                </div>
                                <div class="info-content">
                                    <h6>Lưu ý quan trọng</h6>
                                    <ul>
                                        <li>Mã sản phẩm phải là duy nhất</li>
                                        <li>Không sử dụng ký tự đặc biệt</li>
                                        <li>Tên sản phẩm rõ ràng, dễ hiểu</li>
                                        <li>Mô tả chi tiết giúp quản lý tốt hơn</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="form-actions-sidebar">
                                <button type="submit" class="btn btn-save">
                                    <i class="ti ti-device-floppy"></i>
                                    <span>Lưu mã sản phẩm</span>
                                </button>
                                <a href="{{ route('productCode.index') }}" class="btn btn-cancel">
                                    <i class="ti ti-x"></i>
                                    <span>Hủy bỏ</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Preview Card -->
                    <div class="content-card mt-4">
                        <div class="card-header-custom">
                            <h3 class="card-title-custom">
                                <i class="ti ti-eye"></i>
                                Xem trước
                            </h3>
                        </div>
                        <div class="card-body-custom">
                            <div class="preview-box">
                                <div class="preview-code-badge">
                                    <i class="ti ti-qrcode"></i>
                                    <span id="preview-code">PRD001</span>
                                </div>
                                <h6 class="preview-title" id="preview-title">Tên sản phẩm</h6>
                                <p class="preview-hint">Mã sản phẩm dùng để quản lý và tra cứu</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
/* Product Code Create Page Styles */
.product-code-create-page {
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
    color: #14b8a6;
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
    color: #14b8a6;
}

.breadcrumb-modern .active {
    color: #1f2937;
    font-weight: 500;
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
    border-color: #14b8a6;
    color: #14b8a6;
    transform: translateX(-4px);
}

/* Form Container */
.form-container {
    max-width: 100%;
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
    border-bottom: 1px solid #e5e7eb;
    background: linear-gradient(to right, #ffffff, #f9fafb);
}

.card-title-custom {
    font-size: 1.25rem;
    font-weight: 700;
    color: #1f2937;
    margin: 0 0 0.25rem 0;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.card-subtitle-custom {
    font-size: 0.875rem;
    color: #6b7280;
    margin: 0;
}

.card-body-custom {
    padding: 1.5rem;
}

/* Form Groups */
.form-group-modern {
    margin-bottom: 1.5rem;
}

.form-label-modern {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 0.5rem;
    font-size: 0.9375rem;
}

.form-label-modern.required::after {
    content: '*';
    color: #ef4444;
    margin-left: 0.25rem;
}

.form-control-modern,
.form-select-modern {
    width: 100%;
    padding: 0.875rem 1rem;
    border: 2px solid #e5e7eb;
    border-radius: 0.5rem;
    font-size: 0.9375rem;
    transition: all 0.3s ease;
    background: white;
}

.form-control-modern:focus,
.form-select-modern:focus {
    outline: none;
    border-color: #14b8a6;
    box-shadow: 0 0 0 3px rgba(20, 184, 166, 0.1);
}

/* Code Input Special Style */
.code-input {
    font-family: 'Courier New', monospace;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2px;
    font-size: 1.125rem !important;
}

textarea.form-control-modern {
    resize: vertical;
    min-height: 120px;
}

.form-hint {
    display: flex;
    align-items: center;
    gap: 0.375rem;
    margin-top: 0.5rem;
    font-size: 0.8125rem;
    color: #6b7280;
}

.error-message {
    display: flex;
    align-items: center;
    gap: 0.375rem;
    margin-top: 0.5rem;
    color: #ef4444;
    font-size: 0.875rem;
}

/* Sticky Sidebar */
.sticky-sidebar {
    position: sticky;
    top: 1.5rem;
}

/* Info Box */
.info-box {
    background: linear-gradient(135deg, #ccfbf1 0%, #99f6e4 100%);
    border-radius: 0.75rem;
    padding: 1rem;
    margin-bottom: 1.5rem;
}

.info-box .info-icon {
    width: 36px;
    height: 36px;
    background: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #14b8a6;
    font-size: 1.25rem;
    margin-bottom: 0.75rem;
}

.info-box h6 {
    font-size: 0.9375rem;
    font-weight: 700;
    color: #134e4a;
    margin-bottom: 0.5rem;
}

.info-box ul {
    margin: 0;
    padding-left: 1.25rem;
    font-size: 0.8125rem;
    color: #115e59;
}

.info-box li {
    margin-bottom: 0.25rem;
}

/* Form Actions Sidebar */
.form-actions-sidebar {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.btn-save {
    background: linear-gradient(135deg, #14b8a6 0%, #0d9488 100%);
    color: white;
    border: none;
    padding: 0.875rem 1.5rem;
    border-radius: 0.5rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
    box-shadow: 0 4px 6px -1px rgba(20, 184, 166, 0.3);
}

.btn-save:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 15px -3px rgba(20, 184, 166, 0.4);
}

.btn-cancel {
    background: white;
    color: #6b7280;
    border: 2px solid #e5e7eb;
    padding: 0.875rem 1.5rem;
    border-radius: 0.5rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
    text-decoration: none;
}

.btn-cancel:hover {
    border-color: #ef4444;
    color: #ef4444;
}

/* Preview Box */
.preview-box {
    text-align: center;
    padding: 1.5rem;
    background: linear-gradient(135deg, #f9fafb, #f3f4f6);
    border-radius: 0.75rem;
}

.preview-code-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
    background: linear-gradient(135deg, #ccfbf1, #99f6e4);
    color: #115e59;
    padding: 0.875rem 1.5rem;
    border-radius: 0.75rem;
    font-weight: 700;
    font-size: 1.25rem;
    font-family: 'Courier New', monospace;
    border: 2px solid #14b8a6;
    margin-bottom: 1rem;
    letter-spacing: 2px;
}

.preview-code-badge i {
    font-size: 1.5rem;
}

.preview-title {
    font-size: 1rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 0.5rem;
}

.preview-hint {
    font-size: 0.8125rem;
    color: #6b7280;
    margin: 0;
}

/* Responsive */
@media (max-width: 1024px) {
    .sticky-sidebar {
        position: relative;
        top: 0;
    }
}

@media (max-width: 768px) {
    .product-code-create-page {
        padding: 1rem;
    }
    
    .header-content {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .page-title {
        font-size: 1.5rem;
    }

    .preview-code-badge {
        font-size: 1rem;
        padding: 0.75rem 1.25rem;
    }
}
</style>

<script>
// Auto-uppercase code input
document.getElementById('name')?.addEventListener('input', function() {
    const code = this.value.toUpperCase().replace(/[^A-Z0-9]/g, '');
    this.value = code;
    document.getElementById('preview-code').textContent = code || 'PRD001';
});

// Update preview on title change
document.getElementById('title')?.addEventListener('input', function() {
    document.getElementById('preview-title').textContent = this.value || 'Tên sản phẩm';
});

// Form validation
document.querySelector('form')?.addEventListener('submit', function(e) {
    const code = document.getElementById('name').value.trim();
    const title = document.getElementById('title').value.trim();
    const status = document.querySelector('select[name="status"]').value;
    
    if (!code || !title || !status) {
        e.preventDefault();
        alert('Vui lòng điền đầy đủ các trường bắt buộc!');
    }
});
</script>

@endsection