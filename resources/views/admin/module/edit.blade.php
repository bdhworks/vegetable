@extends('admin.layout.be')

@section('content')
<div class="module-edit-page">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <div class="header-left">
                <h1 class="page-title">
                    <i class="ti ti-edit"></i>
                    Chỉnh sửa Module
                </h1>
                <nav class="breadcrumb-modern">
                    <ol>
                        <li><a href="{{ route('admin.dashboard') }}"><i class="ti ti-home"></i>Dashboard</a></li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li><a href="{{ route('module.index') }}">Module</a></li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li class="active">Chỉnh sửa #{{ $module->id }}</li>
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
                    <i class="ti ti-edit"></i>
                </div>
                <div class="header-text">
                    <h3 class="card-title-custom">Thông tin Module</h3>
                    <p class="card-subtitle">Cập nhật thông tin cho module #{{ $module->id }}</p>
                </div>
                <div class="module-badge">
                    <i class="ti ti-puzzle"></i>
                    ID: {{ $module->id }}
                </div>
            </div>

            <div class="card-body-custom">
                <form method="POST" action="{{ route('module.update', $module->id) }}" id="moduleForm">
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
                                       value="{{ old('name', $module->name) }}"
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
                                       value="{{ old('title', $module->title) }}"
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

                        <!-- Module Info Display -->
                        <div class="form-group">
                            <label class="form-label">
                                <i class="ti ti-calendar"></i>
                                Ngày tạo
                            </label>
                            <div class="info-display">
                                <i class="ti ti-clock"></i>
                                {{ $module->created_at ? $module->created_at->format('d/m/Y H:i') : 'N/A' }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <i class="ti ti-calendar-event"></i>
                                Cập nhật lần cuối
                            </label>
                            <div class="info-display">
                                <i class="ti ti-clock"></i>
                                {{ $module->updated_at ? $module->updated_at->format('d/m/Y H:i') : 'N/A' }}
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="form-actions">
                        <button type="submit" class="btn-submit">
                            <i class="ti ti-device-floppy"></i>
                            <span>Cập nhật Module</span>
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
                <h4>Thông tin Module</h4>
            </div>
            <div class="info-body">
                <div class="info-item">
                    <div class="info-icon primary">
                        <i class="ti ti-puzzle"></i>
                    </div>
                    <div class="info-content">
                        <h5>Mã Module</h5>
                        <p class="info-value">{{ $module->id }}</p>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon success">
                        <i class="ti ti-code"></i>
                    </div>
                    <div class="info-content">
                        <h5>Tên hiện tại</h5>
                        <p class="info-value">{{ $module->name }}</p>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon info">
                        <i class="ti ti-file-text"></i>
                    </div>
                    <div class="info-content">
                        <h5>Tiêu đề hiện tại</h5>
                        <p class="info-value">{{ $module->title }}</p>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon warning">
                        <i class="ti ti-calendar"></i>
                    </div>
                    <div class="info-content">
                        <h5>Ngày tạo</h5>
                        <p class="info-value">{{ $module->created_at ? $module->created_at->format('d/m/Y H:i') : 'N/A' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Module Edit Page - No Duplicates from Layout */
.module-edit-page {
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
    color: #f59e0b;
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
    color: #f59e0b;
}

.breadcrumb-modern .active {
    color: var(--text-primary);
    font-weight: 500;
}

.header-right {
    display: flex;
    gap: 0.75rem;
}

.btn-back {
    background: white;
    color: var(--text-secondary);
    border: 2px solid var(--border-color);
    padding: 0.75rem 1.5rem;
    border-radius: var(--radius-sm);
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
    text-decoration: none;
    font-size: 0.9375rem;
}

.btn-back:hover {
    border-color: #f59e0b;
    color: #f59e0b;
    transform: translateX(-4px);
}

/* Form Container */
.form-container {
    display: grid;
    grid-template-columns: 1fr 380px;
    gap: 1.5rem;
    max-width: 1400px;
}

/* Content Card */
.content-card {
    background: white;
    border-radius: var(--radius-md);
    box-shadow: var(--shadow-sm);
    overflow: hidden;
}

/* Card Header Custom */
.card-header-custom {
    padding: 1.5rem;
    background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
    border-bottom: 2px solid #fbbf24;
    display: flex;
    align-items: center;
    gap: 1rem;
}

.header-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #f59e0b, #d97706);
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
    flex-shrink: 0;
}

.header-text {
    flex: 1;
}

.card-title-custom {
    font-size: 1.25rem;
    font-weight: 700;
    color: #92400e;
    margin: 0;
}

.card-subtitle {
    font-size: 0.875rem;
    color: #b45309;
    margin: 0.25rem 0 0 0;
}

.module-badge {
    background: white;
    color: #92400e;
    padding: 0.5rem 1rem;
    border-radius: var(--radius-sm);
    font-weight: 700;
    font-size: 0.875rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    border: 2px solid #fbbf24;
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
    color: var(--text-primary);
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
    color: #f59e0b;
}

/* Input Wrapper */
.input-wrapper {
    position: relative;
}

.form-control {
    width: 100%;
    padding: 0.875rem 1rem 0.875rem 3rem;
    border: 2px solid var(--border-color);
    border-radius: var(--radius-sm);
    font-size: 0.9375rem;
    transition: all 0.3s ease;
    background: white;
    color: var(--text-primary);
}

.form-control:focus {
    outline: none;
    border-color: #f59e0b;
    box-shadow: 0 0 0 4px rgba(245, 158, 11, 0.1);
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
    pointer-events: none;
}

.form-control:focus ~ .input-icon {
    color: #f59e0b;
}

/* Info Display */
.info-display {
    padding: 0.875rem 1rem;
    background: linear-gradient(135deg, #f9fafb, #f3f4f6);
    border: 2px solid var(--border-color);
    border-radius: var(--radius-sm);
    color: var(--text-secondary);
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.info-display i {
    color: #f59e0b;
}

/* Form Hint */
.form-hint {
    display: flex;
    align-items: center;
    gap: 0.375rem;
    font-size: 0.8125rem;
    color: var(--text-secondary);
    margin-top: 0.25rem;
}

.form-hint i {
    color: #f59e0b;
    font-size: 0.875rem;
}

/* Error Message */
.error-message {
    display: flex;
    align-items: center;
    gap: 0.375rem;
    font-size: 0.875rem;
    color: #dc2626;
    margin-top: 0.5rem;
    padding: 0.5rem 0.75rem;
    background: #fef2f2;
    border-radius: 0.375rem;
    border-left: 3px solid #ef4444;
    font-weight: 500;
}

.error-message i {
    font-size: 1rem;
}

/* Form Actions */
.form-actions {
    display: flex;
    gap: 1rem;
    padding-top: 2rem;
    border-top: 2px solid var(--border-color);
}

.btn-submit,
.btn-cancel {
    padding: 0.875rem 2rem;
    border-radius: var(--radius-sm);
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
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: white;
    box-shadow: var(--shadow-sm);
}

.btn-submit:hover {
    background: linear-gradient(135deg, #d97706, #b45309);
    transform: translateY(-2px);
    box-shadow: 0 8px 16px rgba(245, 158, 11, 0.3);
}

.btn-submit:active {
    transform: translateY(0);
}

.btn-cancel {
    background: white;
    color: var(--text-secondary);
    border: 2px solid var(--border-color);
}

.btn-cancel:hover {
    border-color: #ef4444;
    color: #ef4444;
    transform: translateY(-2px);
}

/* Info Card */
.info-card {
    background: white;
    border-radius: var(--radius-md);
    box-shadow: var(--shadow-sm);
    overflow: hidden;
    height: fit-content;
    position: sticky;
    top: 90px;
}

.info-header {
    padding: 1.25rem 1.5rem;
    background: linear-gradient(135deg, #dbeafe, #bfdbfe);
    border-bottom: 2px solid #60a5fa;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.info-header i {
    font-size: 1.5rem;
    color: #1e40af;
}

.info-header h4 {
    margin: 0;
    font-size: 1.125rem;
    font-weight: 700;
    color: #1e40af;
}

.info-body {
    padding: 1.5rem;
}

.info-item {
    display: flex;
    gap: 1rem;
    margin-bottom: 1.5rem;
    padding-bottom: 1.5rem;
    border-bottom: 1px solid var(--border-color);
}

.info-item:last-child {
    margin-bottom: 0;
    padding-bottom: 0;
    border-bottom: none;
}

.info-icon {
    width: 40px;
    height: 40px;
    border-radius: var(--radius-sm);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    flex-shrink: 0;
    font-size: 1.125rem;
}

.info-icon.primary {
    background: linear-gradient(135deg, #8b5cf6, #7c3aed);
}

.info-icon.success {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
}

.info-icon.info {
    background: linear-gradient(135deg, #3b82f6, #2563eb);
}

.info-icon.warning {
    background: linear-gradient(135deg, #f59e0b, #d97706);
}

.info-content h5 {
    margin: 0 0 0.375rem 0;
    font-size: 0.8125rem;
    font-weight: 600;
    color: var(--text-secondary);
    text-transform: uppercase;
    letter-spacing: 0.025em;
}

.info-content .info-value {
    margin: 0;
    font-size: 0.9375rem;
    color: var(--text-primary);
    font-weight: 600;
    line-height: 1.4;
    word-break: break-word;
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
    .module-edit-page {
        padding: 1rem;
    }
    
    .page-title {
        font-size: 1.5rem;
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
    
    .header-icon,
    .header-text {
        width: 100%;
    }
    
    .module-badge {
        width: 100%;
        justify-content: center;
    }
    
    .header-content {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .btn-back {
        width: 100%;
        justify-content: center;
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
        SwalHelper.loading('Đang cập nhật...', 'Vui lòng đợi trong giây lát');
    });
});
</script>

@endsection
