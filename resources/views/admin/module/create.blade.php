@extends('admin.layout.be')

@section('title_one')
Module
@endsection
@section('title_two')
Quản lý người dùng / Thêm Module
@endsection

@section('content')
<div class="module-create-page">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <div class="header-left">
                <h1 class="page-title">
                    <i class="ti ti-puzzle-plus"></i>
                    Thêm Module Mới
                </h1>
                <nav class="breadcrumb-modern">
                    <ol>
                        <li><a href="{{ route('admin.dashboard') }}"><i class="ti ti-home"></i>Dashboard</a></li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li><a href="{{ route('module.index') }}">Module</a></li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li class="active">Thêm mới</li>
                    </ol>
                </nav>
            </div>
            <div class="header-right">
                <a href="{{ route('module.index') }}" class="btn-back">
                    <i class="ti ti-arrow-left"></i>
                    <span>Quay lại</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Main Form Card -->
    <div class="form-container">
        <div class="content-card">
            <div class="card-header-custom">
                <div class="header-icon">
                    <i class="ti ti-forms"></i>
                </div>
                <div class="header-text">
                    <h3 class="card-title-custom">Thông tin Module</h3>
                    <p class="card-subtitle">Vui lòng điền đầy đủ thông tin bên dưới</p>
                </div>
            </div>

            <div class="card-body-custom">
                <form method="POST" action="{{ route('module.store') }}" id="moduleForm">
                    @csrf
                    
                    <div class="form-grid">
                        <!-- Module Name -->
                        <div class="form-group full-width">
                            <label for="name" class="form-label required">
                                <i class="ti ti-code"></i>
                                Tên Module
                            </label>
                            <div class="input-wrapper">
                                <input type="text" 
                                       name="name" 
                                       id="name" 
                                       class="form-control @error('name') is-invalid @enderror" 
                                       placeholder="Ví dụ: users, products, categories..."
                                       value="{{ old('name') }}"
                                       required>
                                <span class="input-icon">
                                    <i class="ti ti-code"></i>
                                </span>
                            </div>
                            @error('name')
                                <div class="error-message">
                                    <i class="ti ti-alert-circle"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                            <small class="form-hint">
                                <i class="ti ti-info-circle"></i>
                                Tên module không dấu, chữ thường, không khoảng trắng
                            </small>
                        </div>

                        <!-- Module Title -->
                        <div class="form-group full-width">
                            <label for="title" class="form-label required">
                                <i class="ti ti-file-text"></i>
                                Tiêu đề Module
                            </label>
                            <div class="input-wrapper">
                                <input type="text" 
                                       name="title" 
                                       id="title" 
                                       class="form-control @error('title') is-invalid @enderror" 
                                       placeholder="Ví dụ: Quản lý người dùng, Quản lý sản phẩm..."
                                       value="{{ old('title') }}"
                                       required>
                                <span class="input-icon">
                                    <i class="ti ti-file-text"></i>
                                </span>
                            </div>
                            @error('title')
                                <div class="error-message">
                                    <i class="ti ti-alert-circle"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                            <small class="form-hint">
                                <i class="ti ti-info-circle"></i>
                                Tiêu đề hiển thị của module trong hệ thống
                            </small>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="form-actions">
                        <button type="submit" class="btn-submit">
                            <i class="ti ti-device-floppy"></i>
                            <span>Lưu Module</span>
                        </button>
                        <a href="{{ route('module.index') }}" class="btn-cancel">
                            <i class="ti ti-x"></i>
                            <span>Hủy bỏ</span>
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Info Card -->
        <div class="info-card">
            <div class="info-header">
                <i class="ti ti-info-circle"></i>
                <h4>Hướng dẫn</h4>
            </div>
            <div class="info-body">
                <div class="info-item">
                    <div class="info-icon">
                        <i class="ti ti-circle-check"></i>
                    </div>
                    <div class="info-content">
                        <h5>Tên Module</h5>
                        <p>Sử dụng chữ thường, không dấu, không khoảng trắng. Ví dụ: users, products</p>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon">
                        <i class="ti ti-circle-check"></i>
                    </div>
                    <div class="info-content">
                        <h5>Tiêu đề Module</h5>
                        <p>Tên hiển thị của module, có thể có dấu và khoảng trắng</p>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon">
                        <i class="ti ti-circle-check"></i>
                    </div>
                    <div class="info-content">
                        <h5>Lưu ý</h5>
                        <p>Module được sử dụng để phân quyền và quản lý các chức năng trong hệ thống</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Module Create Page Specific Styles */
.module-create-page {
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

/* Form Container */
.form-container {
    display: grid;
    grid-template-columns: 1fr 380px;
    gap: 1.5rem;
    max-width: 1400px;
}

/* Card Header Custom */
.card-header-custom {
    padding: 1.5rem;
    background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
    border-bottom: 2px solid #60a5fa;
    display: flex;
    align-items: center;
    gap: 1rem;
}

.header-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #3b82f6, #2563eb);
    border-radius: 0.75rem;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
}

.header-text {
    flex: 1;
}

.card-title-custom {
    font-size: 1.25rem;
    font-weight: 700;
    color: #1e40af;
    margin: 0;
}

.card-subtitle {
    font-size: 0.875rem;
    color: #3b82f6;
    margin: 0.25rem 0 0 0;
}

.card-body-custom {
    padding: 2rem;
}

/* Form Grid */
.form-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.form-group.full-width {
    grid-column: 1 / -1;
}

.form-label {
    font-size: 0.9375rem;
    font-weight: 600;
    color: #1f2937;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.form-label.required::after {
    content: '*';
    color: #ef4444;
    margin-left: 0.25rem;
}

.form-label i {
    color: #3b82f6;
}

/* Input Wrapper */
.input-wrapper {
    position: relative;
}

.form-control {
    width: 100%;
    padding: 0.875rem 1rem 0.875rem 3rem;
    border: 2px solid #e5e7eb;
    border-radius: 0.5rem;
    font-size: 0.9375rem;
    transition: all 0.3s ease;
    background: white;
}

.form-control:focus {
    outline: none;
    border-color: #3b82f6;
    box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
}

.form-control.is-invalid {
    border-color: #ef4444;
}

.form-control.is-invalid:focus {
    box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.1);
}

.input-icon {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: #9ca3af;
    font-size: 1.125rem;
}

.form-control:focus + .input-icon {
    color: #3b82f6;
}

/* Form Hint */
.form-hint {
    display: flex;
    align-items: center;
    gap: 0.375rem;
    font-size: 0.8125rem;
    color: #6b7280;
    margin-top: 0.25rem;
}

.form-hint i {
    color: #3b82f6;
}

/* Error Message */
.error-message {
    display: flex;
    align-items: center;
    gap: 0.375rem;
    font-size: 0.875rem;
    color: #dc2626;
    margin-top: 0.25rem;
    padding: 0.5rem 0.75rem;
    background: #fef2f2;
    border-radius: 0.375rem;
    border-left: 3px solid #ef4444;
}

/* Form Actions */
.form-actions {
    display: flex;
    gap: 1rem;
    padding-top: 2rem;
    border-top: 2px solid #e5e7eb;
}

.btn-submit,
.btn-cancel {
    padding: 0.875rem 2rem;
    border-radius: 0.5rem;
    font-weight: 600;
    font-size: 0.9375rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    text-decoration: none;
}

.btn-submit {
    background: linear-gradient(135deg, #3b82f6, #2563eb);
    color: white;
}

.btn-submit:hover {
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
    transform: translateY(-2px);
    box-shadow: 0 8px 16px rgba(59, 130, 246, 0.3);
}

.btn-cancel {
    background: white;
    color: #6b7280;
    border: 2px solid #e5e7eb;
}

.btn-cancel:hover {
    border-color: #ef4444;
    color: #ef4444;
    transform: translateY(-2px);
}

/* Info Card */
.info-card {
    background: white;
    border-radius: 0.75rem;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    height: fit-content;
    position: sticky;
    top: 1.5rem;
}

.info-header {
    padding: 1.25rem 1.5rem;
    background: linear-gradient(135deg, #fef3c7, #fde68a);
    border-bottom: 2px solid #fbbf24;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.info-header i {
    font-size: 1.5rem;
    color: #92400e;
}

.info-header h4 {
    margin: 0;
    font-size: 1.125rem;
    font-weight: 700;
    color: #92400e;
}

.info-body {
    padding: 1.5rem;
}

.info-item {
    display: flex;
    gap: 1rem;
    margin-bottom: 1.5rem;
}

.info-item:last-child {
    margin-bottom: 0;
}

.info-icon {
    width: 32px;
    height: 32px;
    background: linear-gradient(135deg, #d1fae5, #a7f3d0);
    border-radius: 0.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #065f46;
    flex-shrink: 0;
}

.info-content h5 {
    margin: 0 0 0.25rem 0;
    font-size: 0.9375rem;
    font-weight: 600;
    color: #1f2937;
}

.info-content p {
    margin: 0;
    font-size: 0.8125rem;
    color: #6b7280;
    line-height: 1.5;
}

/* Responsive */
@media (max-width: 1024px) {
    .form-container {
        grid-template-columns: 1fr;
    }
    
    .info-card {
        position: relative;
        top: 0;
    }
}

@media (max-width: 768px) {
    .module-create-page {
        padding: 1rem;
    }
    
    .form-grid {
        grid-template-columns: 1fr;
    }
    
    .card-body-custom {
        padding: 1.5rem;
    }
    
    .form-actions {
        flex-direction: column;
    }
    
    .btn-submit,
    .btn-cancel {
        width: 100%;
        justify-content: center;
    }
    
    .card-header-custom {
        flex-direction: column;
        text-align: center;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('moduleForm');
    
    // Auto-lowercase module name
    const nameInput = document.getElementById('name');
    if (nameInput) {
        nameInput.addEventListener('input', function() {
            this.value = this.value.toLowerCase().replace(/[^a-z0-9_]/g, '');
        });
    }
    
    // Form validation
    form.addEventListener('submit', function(e) {
        const name = document.getElementById('name').value.trim();
        const title = document.getElementById('title').value.trim();
        
        if (!name || !title) {
            e.preventDefault();
            SwalHelper.error('Lỗi!', 'Vui lòng điền đầy đủ thông tin');
            return false;
        }
        
        // Show loading
        SwalHelper.loading('Đang lưu...', 'Vui lòng đợi trong giây lát');
    });
});
</script>

@endsection
