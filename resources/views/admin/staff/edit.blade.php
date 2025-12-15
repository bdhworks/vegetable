@extends('admin.layout.be')

@section('content')
<div class="staff-edit-page">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <div class="header-left">
                <h1 class="page-title">
                    <i class="ti ti-user-edit"></i>
                    Chỉnh sửa Nhân Viên
                </h1>
                <nav class="breadcrumb-modern">
                    <ol>
                        <li><a href="{{ route('admin.dashboard') }}"><i class="ti ti-home"></i>Dashboard</a></li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li><a href="{{ route('staff.index') }}">Nhân viên</a></li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li class="active">Chỉnh sửa #{{ $admin->id }}</li>
                    </ol>
                </nav>
            </div>
            <div class="header-right">
                <a href="{{ route('staff.index') }}" class="btn-back">
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
                    <i class="ti ti-user"></i>
                </div>
                <div class="header-text">
                    <h3 class="card-title-custom">Thông tin Nhân Viên</h3>
                    <p class="card-subtitle">Cập nhật thông tin cho nhân viên #{{ $admin->id }}</p>
                </div>
                <div class="staff-badge">
                    <i class="ti ti-user-circle"></i>
                    ID: {{ $admin->id }}
                </div>
            </div>

            <div class="card-body-custom">
                <form action="{{ route('staff.update', $admin) }}" method="POST" enctype="multipart/form-data" id="staffForm">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-grid">
                        <!-- Full Name -->
                        <div class="form-group full-width">
                            <label for="name" class="form-label required">
                                <i class="ti ti-user"></i>
                                Họ và Tên
                            </label>
                            <div class="input-wrapper">
                                <input type="text" 
                                       name="name" 
                                       id="name" 
                                       class="form-control @error('name') is-invalid @enderror" 
                                       placeholder="Nhập họ và tên đầy đủ..."
                                       value="{{ old('name', $admin->name) }}"
                                       required>
                                <span class="input-icon">
                                    <i class="ti ti-user"></i>
                                </span>
                            </div>
                            @error('name')
                                <div class="error-message">
                                    <i class="ti ti-alert-circle"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email" class="form-label required">
                                <i class="ti ti-mail"></i>
                                Email
                            </label>
                            <div class="input-wrapper">
                                <input type="email" 
                                       name="email" 
                                       id="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       placeholder="email@example.com"
                                       value="{{ old('email', $admin->email) }}"
                                       required>
                                <span class="input-icon">
                                    <i class="ti ti-mail"></i>
                                </span>
                            </div>
                            @error('email')
                                <div class="error-message">
                                    <i class="ti ti-alert-circle"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Group/Role -->
                        <div class="form-group">
                            <label for="group_id" class="form-label required">
                                <i class="ti ti-shield"></i>
                                Chức Vụ
                            </label>
                            <div class="input-wrapper">
                                <select name="group_id" 
                                        id="group_id" 
                                        class="form-control @error('group_id') is-invalid @enderror"
                                        required>
                                    <option value="" disabled>--- Chọn chức vụ ---</option>
                                    @foreach ($groups as $item)
                                        <option value="{{ $item->id }}" {{ $admin->group_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="input-icon">
                                    <i class="ti ti-shield"></i>
                                </span>
                            </div>
                            @error('group_id')
                                <div class="error-message">
                                    <i class="ti ti-alert-circle"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Phone -->
                        <div class="form-group">
                            <label for="phone" class="form-label">
                                <i class="ti ti-phone"></i>
                                Số Điện Thoại
                            </label>
                            <div class="input-wrapper">
                                <input type="text" 
                                       name="phone" 
                                       id="phone" 
                                       class="form-control @error('phone') is-invalid @enderror" 
                                       placeholder="0123456789"
                                       value="{{ old('phone', $admin->phone) }}">
                                <span class="input-icon">
                                    <i class="ti ti-phone"></i>
                                </span>
                            </div>
                            @error('phone')
                                <div class="error-message">
                                    <i class="ti ti-alert-circle"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Address -->
                        <div class="form-group">
                            <label for="address" class="form-label">
                                <i class="ti ti-map-pin"></i>
                                Địa Chỉ
                            </label>
                            <div class="input-wrapper">
                                <input type="text" 
                                       name="address" 
                                       id="address" 
                                       class="form-control @error('address') is-invalid @enderror" 
                                       placeholder="Nhập địa chỉ..."
                                       value="{{ old('address', $admin->address) }}">
                                <span class="input-icon">
                                    <i class="ti ti-map-pin"></i>
                                </span>
                            </div>
                            @error('address')
                                <div class="error-message">
                                    <i class="ti ti-alert-circle"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Avatar Image -->
                        <div class="form-group full-width">
                            <label for="image" class="form-label">
                                <i class="ti ti-photo"></i>
                                Ảnh Đại Diện
                            </label>
                            <div class="file-upload-wrapper">
                                <input type="file" 
                                       name="image" 
                                       id="image" 
                                       class="file-input @error('image') is-invalid @enderror" 
                                       accept="image/*"
                                       onchange="previewImage(this)">
                                <label for="image" class="file-label">
                                    <i class="ti ti-upload"></i>
                                    <span class="file-text">Chọn ảnh đại diện</span>
                                </label>
                                @if($admin->image)
                                    <div class="current-image">
                                        <img src="{{ asset($admin->image) }}" alt="Current avatar" id="preview-current">
                                        <span class="image-label">Ảnh hiện tại</span>
                                    </div>
                                @endif
                                <div class="preview-container" id="preview-container" style="display: none;">
                                    <img id="preview-image" alt="Preview">
                                    <span class="image-label">Ảnh mới</span>
                                </div>
                            </div>
                            @error('image')
                                <div class="error-message">
                                    <i class="ti ti-alert-circle"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                            <small class="form-hint">
                                <i class="ti ti-info-circle"></i>
                                Định dạng: JPG, PNG, JPEG. Kích thước tối đa: 2MB
                            </small>
                        </div>

                        <!-- Info Display -->
                        <div class="form-group">
                            <label class="form-label">
                                <i class="ti ti-calendar"></i>
                                Ngày tạo
                            </label>
                            <div class="info-display">
                                <i class="ti ti-clock"></i>
                                {{ $admin->created_at ? $admin->created_at->format('d/m/Y H:i') : 'N/A' }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <i class="ti ti-calendar-event"></i>
                                Cập nhật lần cuối
                            </label>
                            <div class="info-display">
                                <i class="ti ti-clock"></i>
                                {{ $admin->updated_at ? $admin->updated_at->format('d/m/Y H:i') : 'N/A' }}
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="form-actions">
                        <button type="submit" class="btn-submit">
                            <i class="ti ti-device-floppy"></i>
                            <span>Cập nhật Nhân Viên</span>
                        </button>
                        <a href="{{ route('admin.password') }}" class="btn-password">
                            <i class="ti ti-lock"></i>
                            <span>Đổi mật khẩu</span>
                        </a>
                        <a href="{{ route('staff.index') }}" class="btn-cancel">
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
                <h4>Thông tin Nhân Viên</h4>
            </div>
            <div class="info-body">
                <div class="info-item">
                    <div class="info-icon primary">
                        <i class="ti ti-user-circle"></i>
                    </div>
                    <div class="info-content">
                        <h5>Mã Nhân Viên</h5>
                        <p class="info-value">{{ $admin->id }}</p>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon success">
                        <i class="ti ti-user"></i>
                    </div>
                    <div class="info-content">
                        <h5>Tên hiện tại</h5>
                        <p class="info-value">{{ $admin->name }}</p>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon info">
                        <i class="ti ti-mail"></i>
                    </div>
                    <div class="info-content">
                        <h5>Email</h5>
                        <p class="info-value">{{ $admin->email }}</p>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon warning">
                        <i class="ti ti-shield"></i>
                    </div>
                    <div class="info-content">
                        <h5>Chức vụ</h5>
                        <p class="info-value">{{ $admin->group->name }}</p>
                    </div>
                </div>
            </div>

            <div class="info-footer">
                <a href="{{ route('admin.password') }}" class="btn-password-full">
                    <i class="ti ti-lock"></i>
                    <span>Đổi mật khẩu</span>
                </a>
            </div>
        </div>
    </div>
</div>

<style>
/* Staff Edit Page - No Duplicates from Layout */
.staff-edit-page {
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
    color: #3b82f6;
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
    border-color: #3b82f6;
    color: #3b82f6;
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
    background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
    border-bottom: 2px solid #60a5fa;
    display: flex;
    align-items: center;
    gap: 1rem;
    flex-wrap: wrap;
}

.header-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #3b82f6, #2563eb);
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
    color: #1e40af;
    margin: 0;
}

.card-subtitle {
    font-size: 0.875rem;
    color: #3b82f6;
    margin: 0.25rem 0 0 0;
}

.staff-badge {
    background: white;
    color: #1e40af;
    padding: 0.5rem 1rem;
    border-radius: var(--radius-sm);
    font-weight: 700;
    font-size: 0.875rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    border: 2px solid #60a5fa;
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
    color: #3b82f6;
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
    pointer-events: none;
}

.form-control:focus ~ .input-icon {
    color: #3b82f6;
}

/* Select Dropdown */
select.form-control {
    cursor: pointer;
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%239ca3af' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 1rem center;
    padding-right: 3rem;
}

select.form-control:focus {
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%233b82f6' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
}

/* File Upload Styles */
.file-upload-wrapper {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.file-input {
    display: none;
}

.file-label {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.75rem;
    padding: 1.25rem 2rem;
    background: linear-gradient(135deg, #f9fafb, #f3f4f6);
    border: 2px dashed #d1d5db;
    border-radius: var(--radius-md);
    cursor: pointer;
    transition: all 0.3s ease;
    color: var(--text-secondary);
    font-weight: 600;
}

.file-label:hover {
    border-color: #3b82f6;
    background: linear-gradient(135deg, #eff6ff, #dbeafe);
    color: #3b82f6;
}

.file-label i {
    font-size: 1.5rem;
}

.current-image,
.preview-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.75rem;
}

.current-image img,
.preview-container img {
    width: 150px;
    height: 150px;
    object-fit: cover;
    border-radius: var(--radius-md);
    border: 3px solid var(--border-color);
    box-shadow: var(--shadow-md);
}

.image-label {
    font-size: 0.875rem;
    font-weight: 600;
    color: var(--text-secondary);
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
    color: #3b82f6;
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
    color: #3b82f6;
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
    flex-wrap: wrap;
}

.btn-submit,
.btn-password,
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
    background: linear-gradient(135deg, #3b82f6, #2563eb);
    color: white;
    box-shadow: var(--shadow-sm);
}

.btn-submit:hover {
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

.btn-submit:active {
    transform: translateY(0);
}

.btn-password {
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: white;
    box-shadow: var(--shadow-sm);
}

.btn-password:hover {
    background: linear-gradient(135deg, #d97706, #b45309);
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
    color: white;
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
    background: linear-gradient(135deg, #ede9fe, #ddd6fe);
    border-bottom: 2px solid #a78bfa;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.info-header i {
    font-size: 1.5rem;
    color: #6b21a8;
}

.info-header h4 {
    margin: 0;
    font-size: 1.125rem;
    font-weight: 700;
    color: #6b21a8;
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
    background: linear-gradient(135deg, #f97316, #ea580c);
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

/* Info Footer */
.info-footer {
    padding: 1.5rem;
    background: linear-gradient(135deg, #fed7aa, #fdba74);
    border-top: 2px solid #fb923c;
}

.btn-password-full {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    width: 100%;
    padding: 0.875rem 1.5rem;
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: white;
    border-radius: var(--radius-sm);
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: var(--shadow-sm);
}

.btn-password-full:hover {
    background: linear-gradient(135deg, #d97706, #b45309);
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
    color: white;
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
    .staff-edit-page {
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
    .btn-password,
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
    
    .staff-badge {
        width: 100%;
        justify-content: center;
    }
    
    .current-image img,
    .preview-container img {
        width: 120px;
        height: 120px;
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
// Preview image function
function previewImage(input) {
    const previewContainer = document.getElementById('preview-container');
    const previewImage = document.getElementById('preview-image');
    const fileLabel = input.nextElementSibling.querySelector('.file-text');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            previewImage.src = e.target.result;
            previewContainer.style.display = 'flex';
            fileLabel.textContent = input.files[0].name;
        };
        
        reader.readAsDataURL(input.files[0]);
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('staffForm');
    
    // Form validation
    form.addEventListener('submit', function(e) {
        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const groupId = document.getElementById('group_id').value;
        
        if (!name || !email || !groupId) {
            e.preventDefault();
            SwalHelper.error('Lỗi!', 'Vui lòng điền đầy đủ thông tin bắt buộc');
            return false;
        }
        
        // Show loading
        SwalHelper.loading('Đang cập nhật...', 'Vui lòng đợi trong giây lát');
    });
});
</script>

@endsection