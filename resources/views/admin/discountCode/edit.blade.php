@extends('admin.layout.be')

@section('title_one')
Mã giảm giá
@endsection
@section('title_two')
Quản lý sản phẩm / Khuyến mãi
@endsection

@section('content')
<div class="discount-code-edit-page">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <div class="header-left">
                <h1 class="page-title">
                    <i class="ti ti-pencil"></i>
                    Cập nhật mã giảm giá
                </h1>
                <nav class="breadcrumb-modern">
                    <ol>
                        <li><a href="{{ route('admin.dashboard') }}"><i class="ti ti-home"></i>Dashboard</a></li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li><a href="{{ route('discountCode.index') }}">Mã giảm giá</a></li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li class="active">Cập nhật</li>
                    </ol>
                </nav>
            </div>
            <div class="header-right">
                <a href="{{ route('discountCode.index') }}" class="btn btn-back">
                    <i class="ti ti-arrow-left"></i>
                    <span>Quay lại</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Alert Messages -->
    @if(session('success'))
        <div class="alert-container">
            <div class="alert alert-success-modern">
                <div class="alert-icon">
                    <i class="ti ti-check"></i>
                </div>
                <div class="alert-content">
                    <strong>Thành công!</strong>
                    <p>{{ session('success') }}</p>
                </div>
                <button class="alert-close" onclick="this.parentElement.parentElement.remove()">
                    <i class="ti ti-x"></i>
                </button>
            </div>
        </div>
    @endif

    @if($errors->any())
        <div class="alert-container">
            <div class="alert alert-error-modern">
                <div class="alert-icon">
                    <i class="ti ti-alert-circle"></i>
                </div>
                <div class="alert-content">
                    <strong>Có lỗi xảy ra!</strong>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <button class="alert-close" onclick="this.parentElement.parentElement.remove()">
                    <i class="ti ti-x"></i>
                </button>
            </div>
        </div>
    @endif

    <!-- Form Content -->
    <div class="form-container">
        <form method="POST" action="{{ route('discountCode.update', $discountCode->id) }}" id="editDiscountCodeForm">
            @csrf
            @method('PUT')
            
            <div class="row g-4">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <div class="content-card">
                        <div class="card-header-custom">
                            <div class="header-left">
                                <h3 class="card-title-custom">
                                    <i class="ti ti-info-circle"></i>
                                    Thông tin mã giảm giá
                                </h3>
                                <p class="card-subtitle-custom">Cập nhật thông tin chi tiết cho mã giảm giá</p>
                            </div>
                            <div class="header-right">
                                <span class="edit-badge">
                                    <i class="ti ti-edit"></i>
                                    Chế độ chỉnh sửa
                                </span>
                            </div>
                        </div>
                        <div class="card-body-custom">
                            <!-- Code Field -->
                            <div class="form-group-modern">
                                <label class="form-label-modern required">
                                    <i class="ti ti-barcode"></i>
                                    Mã code
                                </label>
                                <input type="text" 
                                       name="name" 
                                       class="form-control-modern code-input" 
                                       id="name"
                                       placeholder="VD: SUMMER2024"
                                       value="{{ old('name', $discountCode->name) }}"
                                       required>
                                <small class="form-hint">
                                    <i class="ti ti-info-circle"></i>
                                    Mã code nên viết hoa, không dấu, không khoảng trắng
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
                                    Tên chương trình
                                </label>
                                <input type="text" 
                                       name="title" 
                                       class="form-control-modern title" 
                                       id="title"
                                       placeholder="Nhập tên chương trình giảm giá..."
                                       value="{{ old('title', $discountCode->title) }}"
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
                                    Mô tả chi tiết
                                </label>
                                <textarea class="form-control-modern ckeditor" 
                                          name="desc" 
                                          id="desc"
                                          rows="6"
                                          placeholder="Nhập mô tả chi tiết về chương trình...">{{ old('desc', $discountCode->desc) }}</textarea>
                                @error('desc')
                                    <div class="error-message">
                                        <i class="ti ti-alert-circle"></i>
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Change History Card -->
                    <div class="content-card mt-4">
                        <div class="card-header-custom">
                            <h3 class="card-title-custom">
                                <i class="ti ti-history"></i>
                                Lịch sử thay đổi
                            </h3>
                        </div>
                        <div class="card-body-custom">
                            <div class="history-timeline">
                                <div class="timeline-item">
                                    <div class="timeline-icon created">
                                        <i class="ti ti-plus"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <h6>Tạo mới</h6>
                                        <p>{{ $discountCode->created_at->format('d/m/Y H:i') }}</p>
                                        <span class="timeline-time">{{ $discountCode->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-icon updated">
                                        <i class="ti ti-edit"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <h6>Cập nhật lần cuối</h6>
                                        <p>{{ $discountCode->updated_at->format('d/m/Y H:i') }}</p>
                                        <span class="timeline-time">{{ $discountCode->updated_at->diffForHumans() }}</span>
                                    </div>
                                </div>
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
                                    <option value="1" {{ old('status', $discountCode->status) == '1' ? 'selected' : '' }}>
                                        Hoạt động
                                    </option>
                                    <option value="0" {{ old('status', $discountCode->status) == '0' ? 'selected' : '' }}>
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

                            <!-- Code Info -->
                            <div class="info-box">
                                <div class="info-icon">
                                    <i class="ti ti-database"></i>
                                </div>
                                <div class="info-content">
                                    <h6>Thông tin</h6>
                                    <ul>
                                        <li><strong>ID:</strong> {{ $discountCode->id }}</li>
                                        <li><strong>Mã:</strong> {{ $discountCode->name }}</li>
                                        <li><strong>Tạo:</strong> {{ $discountCode->created_at->format('d/m/Y') }}</li>
                                        <li><strong>Cập nhật:</strong> {{ $discountCode->updated_at->format('d/m/Y') }}</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="form-actions-sidebar">
                                <button type="submit" class="btn btn-update">
                                    <i class="ti ti-check"></i>
                                    <span>Cập nhật mã code</span>
                                </button>
                                <a href="{{ route('discountCode.index') }}" class="btn btn-cancel">
                                    <i class="ti ti-x"></i>
                                    <span>Hủy bỏ</span>
                                </a>
                                <button type="button" class="btn btn-delete" onclick="confirmDelete()">
                                    <i class="ti ti-trash"></i>
                                    <span>Xóa mã code</span>
                                </button>
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
                                <div class="preview-code-badge" id="preview-code-badge">
                                    <i class="ti ti-ticket"></i>
                                    <span id="preview-code">{{ $discountCode->name }}</span>
                                </div>
                                <h6 class="preview-title" id="preview-title">{{ $discountCode->title }}</h6>
                                <div class="preview-status" id="preview-status">
                                    @if($discountCode->status == 1)
                                        <span class="status-badge active">
                                            <i class="ti ti-check"></i> Hoạt động
                                        </span>
                                    @else
                                        <span class="status-badge inactive">
                                            <i class="ti ti-clock"></i> Tạm dừng
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Delete Confirmation Form -->
<form id="deleteForm" action="{{ route('discountCode.destroy', ['discountCode_id' => $discountCode->id]) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

<style>
/* Discount Code Edit Page Styles */
.discount-code-edit-page {
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
    color: #8b5cf6;
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
    border-color: #8b5cf6;
    color: #8b5cf6;
    transform: translateX(-4px);
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
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.alert-success-modern {
    background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
    border-left: 4px solid #10b981;
}

.alert-error-modern {
    background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
    border-left: 4px solid #ef4444;
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

.alert-error-modern .alert-icon {
    background: #ef4444;
    color: white;
}

.alert-content {
    flex: 1;
}

.alert-content strong {
    display: block;
    margin-bottom: 0.25rem;
    font-size: 1rem;
}

.alert-content p,
.alert-content ul {
    margin: 0;
    font-size: 0.875rem;
}

.alert-content ul {
    padding-left: 1.25rem;
}

.alert-close {
    background: none;
    border: none;
    cursor: pointer;
    font-size: 1.25rem;
    color: currentColor;
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
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.card-title-custom {
    font-size: 1.25rem;
    font-weight: 700;
    color: #1f2937;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.card-subtitle-custom {
    font-size: 0.875rem;
    color: #6b7280;
    margin: 0.25rem 0 0 0;
}

.edit-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: linear-gradient(135deg, #ede9fe, #ddd6fe);
    color: #7c3aed;
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    font-size: 0.875rem;
    font-weight: 600;
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
    border-color: #8b5cf6;
    box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.1);
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

/* History Timeline */
.history-timeline {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.timeline-item {
    display: flex;
    gap: 1rem;
    align-items: flex-start;
}

.timeline-icon {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    color: white;
    flex-shrink: 0;
}

.timeline-icon.created {
    background: linear-gradient(135deg, #10b981, #059669);
}

.timeline-icon.updated {
    background: linear-gradient(135deg, #8b5cf6, #7c3aed);
}

.timeline-content h6 {
    font-size: 1rem;
    font-weight: 600;
    color: #1f2937;
    margin: 0 0 0.25rem 0;
}

.timeline-content p {
    font-size: 0.875rem;
    color: #4b5563;
    margin: 0 0 0.25rem 0;
}

.timeline-time {
    font-size: 0.8125rem;
    color: #9ca3af;
}

/* Sticky Sidebar */
.sticky-sidebar {
    position: sticky;
    top: 1.5rem;
}

/* Info Box */
.info-box {
    background: linear-gradient(135deg, #ede9fe 0%, #ddd6fe 100%);
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
    color: #8b5cf6;
    font-size: 1.25rem;
    margin-bottom: 0.75rem;
}

.info-box h6 {
    font-size: 0.9375rem;
    font-weight: 700;
    color: #5b21b6;
    margin-bottom: 0.5rem;
}

.info-box ul {
    margin: 0;
    padding-left: 0;
    list-style: none;
    font-size: 0.8125rem;
    color: #6b21a8;
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

.btn-update {
    background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);
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
    box-shadow: 0 4px 6px -1px rgba(139, 92, 246, 0.3);
}

.btn-update:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 15px -3px rgba(139, 92, 246, 0.4);
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
    border-color: #9ca3af;
    color: #4b5563;
}

.btn-delete {
    background: white;
    color: #ef4444;
    border: 2px solid #fee2e2;
    padding: 0.875rem 1.5rem;
    border-radius: 0.5rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
}

.btn-delete:hover {
    background: #ef4444;
    color: white;
    border-color: #ef4444;
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
    background: linear-gradient(135deg, #ede9fe, #ddd6fe);
    color: #7c3aed;
    padding: 0.875rem 1.5rem;
    border-radius: 0.75rem;
    font-weight: 700;
    font-size: 1.25rem;
    font-family: 'Courier New', monospace;
    border: 2px dashed #8b5cf6;
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
    margin-bottom: 1rem;
}

.preview-status {
    display: flex;
    justify-content: center;
}

.status-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.375rem;
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    font-weight: 600;
    font-size: 0.875rem;
}

.status-badge.active {
    background: #d1fae5;
    color: #059669;
}

.status-badge.inactive {
    background: #fef3c7;
    color: #d97706;
}

/* Responsive */
@media (max-width: 1024px) {
    .sticky-sidebar {
        position: relative;
        top: 0;
    }
}

@media (max-width: 768px) {
    .discount-code-edit-page {
        padding: 1rem;
    }
    
    .header-content {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .page-title {
        font-size: 1.5rem;
    }

    .card-header-custom {
        flex-direction: column;
        align-items: flex-start;
        gap: 1rem;
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
    document.getElementById('preview-code').textContent = code || 'CODE';
});

// Update preview on title change
document.getElementById('title')?.addEventListener('input', function() {
    document.getElementById('preview-title').textContent = this.value || 'Tên chương trình';
});

// Update status preview
document.querySelector('select[name="status"]')?.addEventListener('change', function() {
    const previewStatus = document.getElementById('preview-status');
    if (this.value === '1') {
        previewStatus.innerHTML = '<span class="status-badge active"><i class="ti ti-check"></i> Hoạt động</span>';
    } else {
        previewStatus.innerHTML = '<span class="status-badge inactive"><i class="ti ti-clock"></i> Tạm dừng</span>';
    }
});

// Delete confirmation
function confirmDelete() {
    if (confirm('Bạn có chắc chắn muốn xóa mã giảm giá này? Hành động này không thể hoàn tác!')) {
        document.getElementById('deleteForm').submit();
    }
}

// Form validation
document.getElementById('editDiscountCodeForm')?.addEventListener('submit', function(e) {
    const code = document.getElementById('name').value.trim();
    const title = document.getElementById('title').value.trim();
    const status = document.querySelector('select[name="status"]').value;
    
    if (!code || !title || !status) {
        e.preventDefault();
        alert('Vui lòng điền đầy đủ các trường bắt buộc!');
    }
});

// Auto-hide alerts
setTimeout(() => {
    document.querySelectorAll('.alert').forEach(alert => {
        alert.style.transition = 'opacity 0.5s';
        alert.style.opacity = '0';
        setTimeout(() => alert.parentElement.remove(), 500);
    });
}, 5000);
</script>

@endsection
