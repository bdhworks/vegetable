@extends('admin.layout.be')

@section('content')
<div class="discount-create-page">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <div class="header-left">
                <h1 class="page-title">
                    <i class="ti ti-plus"></i>
                    Thêm khuyến mãi sản phẩm
                </h1>
                <nav class="breadcrumb-modern">
                    <ol>
                        <li><a href="{{ route('admin.dashboard') }}"><i class="ti ti-home"></i>Dashboard</a></li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li><a href="{{ route('discount.index') }}">Khuyến mãi</a></li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li class="active">Thêm mới</li>
                    </ol>
                </nav>
            </div>
            <div class="header-right">
                <a href="{{ route('discount.index') }}" class="btn btn-back">
                    <i class="ti ti-arrow-left"></i>
                    <span>Quay lại</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Form Content -->
    <div class="form-container">
        <form method="POST" action="{{ route('discount.store') }}">
            @csrf
            
            <div class="row g-4">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <div class="content-card">
                        <div class="card-header-custom">
                            <h3 class="card-title-custom">
                                <i class="ti ti-info-circle"></i>
                                Thông tin khuyến mãi
                            </h3>
                            <p class="card-subtitle-custom">Nhập thông tin chi tiết cho chương trình khuyến mãi</p>
                        </div>
                        <div class="card-body-custom">
                            <!-- Code ID Field -->
                            <div class="form-group-modern">
                                <label class="form-label-modern required">
                                    <i class="ti ti-ticket"></i>
                                    Mã code liên kết
                                </label>
                                <select class="form-select-modern" name="code_id" id="code_id" required>
                                    <option value="">Chọn mã code...</option>
                                    @foreach ($codes as $code)
                                        <option value="{{$code->id}}" {{ old('code_id') == $code->id ? 'selected' : '' }}>
                                            {{$code->name}} : {{$code->title}}
                                        </option>
                                    @endforeach
                                </select>
                                <small class="form-hint">
                                    <i class="ti ti-info-circle"></i>
                                    Chọn mã code để liên kết với chương trình khuyến mãi
                                </small>
                                @error('code_id')
                                    <div class="error-message">
                                        <i class="ti ti-alert-circle"></i>
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

                            <!-- Name Field -->
                            <div class="form-group-modern">
                                <label class="form-label-modern required">
                                    <i class="ti ti-tag"></i>
                                    Tên chương trình khuyến mãi
                                </label>
                                <input type="text" 
                                       name="name" 
                                       class="form-control-modern" 
                                       id="name"
                                       placeholder="Nhập tên chương trình khuyến mãi..."
                                       value="{{ old('name') }}"
                                       required>
                                @error('name')
                                    <div class="error-message">
                                        <i class="ti ti-alert-circle"></i>
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

                            <!-- Code Field -->
                            <div class="form-group-modern">
                                <label class="form-label-modern required">
                                    <i class="ti ti-barcode"></i>
                                    Mã giảm giá
                                </label>
                                <input type="text" 
                                       name="code" 
                                       class="form-control-modern code-input" 
                                       id="code"
                                       placeholder="VD: DISCOUNT50, SALE2024"
                                       value="{{ old('code') }}"
                                       required>
                                <small class="form-hint">
                                    <i class="ti ti-info-circle"></i>
                                    Mã giảm giá nên viết hoa, không dấu, không khoảng trắng
                                </small>
                                @error('code')
                                    <div class="error-message">
                                        <i class="ti ti-alert-circle"></i>
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

                            <!-- Quantity Field -->
                            <div class="form-group-modern">
                                <label class="form-label-modern required">
                                    <i class="ti ti-package"></i>
                                    Số lượng
                                </label>
                                <input type="number" 
                                       name="quantity" 
                                       class="form-control-modern" 
                                       id="quantity"
                                       placeholder="Nhập số lượng mã giảm giá..."
                                       value="{{ old('quantity') }}"
                                       min="1"
                                       required>
                                @error('quantity')
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
                    <!-- Settings Card -->
                    <div class="content-card sticky-sidebar">
                        <div class="card-header-custom">
                            <h3 class="card-title-custom">
                                <i class="ti ti-settings"></i>
                                Cài đặt giảm giá
                            </h3>
                        </div>
                        <div class="card-body-custom">
                            <!-- Condition Field -->
                            <div class="form-group-modern">
                                <label class="form-label-modern required">
                                    <i class="ti ti-adjustments"></i>
                                    Loại giảm giá
                                </label>
                                <select name="condition" class="form-select-modern" id="condition" required>
                                    <option value="">Chọn loại giảm giá...</option>
                                    <option value="1" {{ old('condition') == '1' ? 'selected' : '' }}>
                                        Giảm theo phần trăm (%)
                                    </option>
                                    <option value="0" {{ old('condition') == '0' ? 'selected' : '' }}>
                                        Giảm theo tiền (VNĐ)
                                    </option>
                                </select>
                                @error('condition')
                                    <div class="error-message">
                                        <i class="ti ti-alert-circle"></i>
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

                            <!-- Value Field -->
                            <div class="form-group-modern">
                                <label class="form-label-modern required">
                                    <i class="ti ti-receipt"></i>
                                    <span id="value-label">Giá trị giảm</span>
                                </label>
                                <input type="number" 
                                       name="value" 
                                       class="form-control-modern" 
                                       id="value"
                                       placeholder="Nhập giá trị giảm..."
                                       value="{{ old('value') }}"
                                       min="0"
                                       required>
                                <small class="form-hint" id="value-hint">
                                    <i class="ti ti-info-circle"></i>
                                    Chọn loại giảm giá trước
                                </small>
                                @error('value')
                                    <div class="error-message">
                                        <i class="ti ti-alert-circle"></i>
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

                            <!-- Status Field -->
                            <div class="form-group-modern">
                                <label class="form-label-modern required">
                                    <i class="ti ti-toggle-right"></i>
                                    Trạng thái
                                </label>
                                <select name="status" class="form-select-modern" required>
                                    <option value="">Chọn trạng thái...</option>
                                    <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>
                                        Hoạt động
                                    </option>
                                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>
                                        Tạm dừng
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
                                        <li>Giảm theo % từ 1-100</li>
                                        <li>Giảm theo tiền tính bằng VNĐ</li>
                                        <li>Số lượng phải lớn hơn 0</li>
                                        <li>Mã giảm giá phải duy nhất</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="form-actions-sidebar">
                                <button type="submit" class="btn btn-save">
                                    <i class="ti ti-device-floppy"></i>
                                    <span>Lưu khuyến mãi</span>
                                </button>
                                <a href="{{ route('discount.index') }}" class="btn btn-cancel">
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
                                <div class="preview-discount-badge">
                                    <i class="ti ti-discount-2"></i>
                                    <span id="preview-value">0</span>
                                    <span id="preview-unit">%</span>
                                </div>
                                <h6 class="preview-name" id="preview-name">Tên chương trình</h6>
                                <div class="preview-code-badge">
                                    <i class="ti ti-ticket"></i>
                                    <span id="preview-code">CODE</span>
                                </div>
                                <p class="preview-quantity">
                                    <i class="ti ti-package"></i>
                                    Số lượng: <strong id="preview-quantity">0</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
/* Discount Create Page Styles */
.discount-create-page {
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
    color: #ec4899;
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
    color: #ec4899;
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
    border-color: #ec4899;
    color: #ec4899;
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
    border-color: #ec4899;
    box-shadow: 0 0 0 3px rgba(236, 72, 153, 0.1);
}

/* Code Input Special Style */
.code-input {
    font-family: 'Courier New', monospace;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2px;
    font-size: 1.125rem !important;
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
    background: linear-gradient(135deg, #fce7f3 0%, #fbcfe8 100%);
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
    color: #ec4899;
    font-size: 1.25rem;
    margin-bottom: 0.75rem;
}

.info-box h6 {
    font-size: 0.9375rem;
    font-weight: 700;
    color: #9f1239;
    margin-bottom: 0.5rem;
}

.info-box ul {
    margin: 0;
    padding-left: 1.25rem;
    font-size: 0.8125rem;
    color: #be185d;
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
    background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
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
    box-shadow: 0 4px 6px -1px rgba(236, 72, 153, 0.3);
}

.btn-save:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 15px -3px rgba(236, 72, 153, 0.4);
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

.preview-discount-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: linear-gradient(135deg, #fce7f3, #fbcfe8);
    color: #9f1239;
    padding: 1rem 1.5rem;
    border-radius: 0.75rem;
    font-weight: 700;
    font-size: 2rem;
    border: 3px solid #ec4899;
    margin-bottom: 1rem;
}

.preview-discount-badge i {
    font-size: 2rem;
}

.preview-name {
    font-size: 1rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 1rem;
}

.preview-code-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: linear-gradient(135deg, #ddd6fe, #c4b5fd);
    color: #6b21a8;
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    font-weight: 700;
    font-size: 0.875rem;
    font-family: 'Courier New', monospace;
    border: 2px dashed #8b5cf6;
    margin-bottom: 1rem;
}

.preview-quantity {
    font-size: 0.875rem;
    color: #4b5563;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.375rem;
}

/* Responsive */
@media (max-width: 1024px) {
    .sticky-sidebar {
        position: relative;
        top: 0;
    }
}

@media (max-width: 768px) {
    .discount-create-page {
        padding: 1rem;
    }
    
    .header-content {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .page-title {
        font-size: 1.5rem;
    }
}
</style>

<script>
// Auto-uppercase code input
document.getElementById('code')?.addEventListener('input', function() {
    const code = this.value.toUpperCase().replace(/[^A-Z0-9]/g, '');
    this.value = code;
    document.getElementById('preview-code').textContent = code || 'CODE';
});

// Update preview on name change
document.getElementById('name')?.addEventListener('input', function() {
    document.getElementById('preview-name').textContent = this.value || 'Tên chương trình';
});

// Update preview on quantity change
document.getElementById('quantity')?.addEventListener('input', function() {
    document.getElementById('preview-quantity').textContent = this.value || '0';
});

// Update preview on value change
document.getElementById('value')?.addEventListener('input', function() {
    document.getElementById('preview-value').textContent = this.value || '0';
});

// Update condition and value label/hint
document.getElementById('condition')?.addEventListener('change', function() {
    const valueLabel = document.getElementById('value-label');
    const valueHint = document.getElementById('value-hint');
    const previewUnit = document.getElementById('preview-unit');
    
    if (this.value === '1') {
        valueLabel.innerHTML = '<i class="ti ti-percentage"></i> Giá trị giảm (%)';
        valueHint.innerHTML = '<i class="ti ti-info-circle"></i> Nhập giá trị từ 1 đến 100 (%)';
        previewUnit.textContent = '%';
    } else if (this.value === '0') {
        valueLabel.innerHTML = '<i class="ti ti-coin"></i> Giá trị giảm (VNĐ)';
        valueHint.innerHTML = '<i class="ti ti-info-circle"></i> Nhập số tiền giảm (VNĐ)';
        previewUnit.textContent = 'đ';
    } else {
        valueLabel.innerHTML = '<i class="ti ti-receipt"></i> Giá trị giảm';
        valueHint.innerHTML = '<i class="ti ti-info-circle"></i> Chọn loại giảm giá trước';
        previewUnit.textContent = '';
    }
});

// Form validation
document.querySelector('form')?.addEventListener('submit', function(e) {
    const codeId = document.getElementById('code_id').value;
    const name = document.getElementById('name').value.trim();
    const code = document.getElementById('code').value.trim();
    const quantity = document.getElementById('quantity').value;
    const condition = document.querySelector('select[name="condition"]').value;
    const value = document.getElementById('value').value;
    const status = document.querySelector('select[name="status"]').value;
    
    if (!codeId || !name || !code || !quantity || !condition || !value || !status) {
        e.preventDefault();
        alert('Vui lòng điền đầy đủ các trường bắt buộc!');
    }
});
</script>

@endsection
