@extends('admin.layout.be')

@section('title_one')
Bài viết
@endsection
@section('title_two')
Quản lý nội dung / Chỉnh sửa Bài Viết
@endsection

@section('content')
<div class="post-edit-page">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <div class="header-left">
                <h1 class="page-title">
                    <i class="ti ti-edit"></i>
                    Chỉnh sửa Bài Viết
                </h1>
                <nav class="breadcrumb-modern">
                    <ol>
                        <li><a href="{{ route('admin.dashboard') }}"><i class="ti ti-home"></i>Dashboard</a></li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li><a href="{{ route('post.index') }}">Bài viết</a></li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li class="active">Chỉnh sửa #{{ $post->id }}</li>
                    </ol>
                </nav>
            </div>
            <div class="header-right">
                <a href="{{ route('post.index') }}" class="btn-back">
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
                    <i class="ti ti-file-text"></i>
                </div>
                <div class="header-text">
                    <h3 class="card-title-custom">Thông tin Bài Viết</h3>
                    <p class="card-subtitle">Cập nhật thông tin cho bài viết #{{ $post->id }}</p>
                </div>
                <div class="post-badge">
                    <i class="ti ti-file-text"></i>
                    ID: {{ $post->id }}
                </div>
            </div>

            <div class="card-body-custom">
                <form method="POST" action="{{ route('post.update', $post) }}" enctype="multipart/form-data" id="postForm">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-grid">
                        <!-- Post Name -->
                        <div class="form-group full-width">
                            <label for="name" class="form-label required">
                                <i class="ti ti-file-text"></i>
                                Tên Bài Viết
                            </label>
                            <div class="input-wrapper">
                                <input type="text" 
                                       name="name" 
                                       id="name" 
                                       class="form-control title @error('name') is-invalid @enderror" 
                                       placeholder="Nhập tên bài viết..."
                                       value="{{ old('name', $post->name) }}"
                                       required>
                                <span class="input-icon">
                                    <i class="ti ti-file-text"></i>
                                </span>
                            </div>
                            @error('name')
                                <div class="error-message">
                                    <i class="ti ti-alert-circle"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Slug -->
                        <div class="form-group full-width">
                            <label for="slug" class="form-label required">
                                <i class="ti ti-link"></i>
                                Slug (URL)
                            </label>
                            <div class="input-wrapper">
                                <input type="text" 
                                       name="slug" 
                                       id="slug" 
                                       class="form-control slug @error('slug') is-invalid @enderror" 
                                       placeholder="slug-bai-viet"
                                       value="{{ old('slug', $post->slug) }}"
                                       required>
                                <span class="input-icon">
                                    <i class="ti ti-link"></i>
                                </span>
                            </div>
                            @error('slug')
                                <div class="error-message">
                                    <i class="ti ti-alert-circle"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Category -->
                        <div class="form-group">
                            <label for="categoryPost_id" class="form-label required">
                                <i class="ti ti-folder"></i>
                                Danh Mục
                            </label>
                            <div class="input-wrapper">
                                <select name="categoryPost_id" 
                                        id="categoryPost_id" 
                                        class="form-control @error('categoryPost_id') is-invalid @enderror"
                                        required>
                                    <option value="" disabled>--- Chọn danh mục ---</option>
                                    @foreach ($categoryPosts as $category)
                                        <option value="{{ $category->id }}" {{ $post->categoryPost_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="input-icon">
                                    <i class="ti ti-folder"></i>
                                </span>
                            </div>
                            @error('categoryPost_id')
                                <div class="error-message">
                                    <i class="ti ti-alert-circle"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div class="form-group">
                            <label for="status" class="form-label required">
                                <i class="ti ti-toggle-right"></i>
                                Trạng Thái
                            </label>
                            <div class="input-wrapper">
                                <select name="status" 
                                        id="status" 
                                        class="form-control @error('status') is-invalid @enderror"
                                        required>
                                    <option value="" disabled>--- Chọn trạng thái ---</option>
                                    <option value="1" {{ $post->status == 1 ? 'selected' : '' }}>Hiển thị</option>
                                    <option value="0" {{ $post->status == 0 ? 'selected' : '' }}>Ẩn</option>
                                </select>
                                <span class="input-icon">
                                    <i class="ti ti-toggle-right"></i>
                                </span>
                            </div>
                            @error('status')
                                <div class="error-message">
                                    <i class="ti ti-alert-circle"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Image Upload -->
                        <div class="form-group full-width">
                            <label for="image" class="form-label">
                                <i class="ti ti-photo"></i>
                                Hình Ảnh Bài Viết
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
                                    <span class="file-text">Chọn hình ảnh mới</span>
                                </label>
                                @if($post->image)
                                    <div class="current-image">
                                        <img src="{{ Storage::url($post->image) }}" alt="Current image" id="preview-current">
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

                        <!-- Description -->
                        <div class="form-group full-width">
                            <label for="desc" class="form-label required">
                                <i class="ti ti-align-left"></i>
                                Mô Tả Ngắn
                            </label>
                            <textarea name="desc" 
                                      id="desc" 
                                      rows="4" 
                                      class="form-control @error('desc') is-invalid @enderror" 
                                      placeholder="Nhập mô tả ngắn cho bài viết..."
                                      required>{{ old('desc', $post->desc) }}</textarea>
                            @error('desc')
                                <div class="error-message">
                                    <i class="ti ti-alert-circle"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Content -->
                        <div class="form-group full-width">
                            <label for="content" class="form-label required">
                                <i class="ti ti-article"></i>
                                Nội Dung Bài Viết
                            </label>
                            <textarea name="content" 
                                      id="content" 
                                      rows="10" 
                                      class="form-control ckeditor @error('content') is-invalid @enderror" 
                                      required>{{ old('content', $post->content) }}</textarea>
                            @error('content')
                                <div class="error-message">
                                    <i class="ti ti-alert-circle"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Info Display -->
                        <div class="form-group">
                            <label class="form-label">
                                <i class="ti ti-calendar"></i>
                                Ngày tạo
                            </label>
                            <div class="info-display">
                                <i class="ti ti-clock"></i>
                                {{ $post->created_at ? $post->created_at->format('d/m/Y H:i') : 'N/A' }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <i class="ti ti-calendar-event"></i>
                                Cập nhật lần cuối
                            </label>
                            <div class="info-display">
                                <i class="ti ti-clock"></i>
                                {{ $post->updated_at ? $post->updated_at->format('d/m/Y H:i') : 'N/A' }}
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="form-actions">
                        <button type="submit" class="btn-submit">
                            <i class="ti ti-device-floppy"></i>
                            <span>Cập nhật Bài Viết</span>
                        </button>
                        <a href="{{ route('post.index') }}" class="btn-cancel">
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
                <h4>Thông tin Bài Viết</h4>
            </div>
            <div class="info-body">
                <div class="info-item">
                    <div class="info-icon primary">
                        <i class="ti ti-file-text"></i>
                    </div>
                    <div class="info-content">
                        <h5>Mã Bài Viết</h5>
                        <p class="info-value">{{ $post->id }}</p>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon success">
                        <i class="ti ti-folder"></i>
                    </div>
                    <div class="info-content">
                        <h5>Danh mục</h5>
                        <p class="info-value">{{ $post->categoryPost->name }}</p>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon info">
                        <i class="ti ti-toggle-right"></i>
                    </div>
                    <div class="info-content">
                        <h5>Trạng thái</h5>
                        <p class="info-value">{{ $post->status == 1 ? 'Hiển thị' : 'Ẩn' }}</p>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon warning">
                        <i class="ti ti-calendar"></i>
                    </div>
                    <div class="info-content">
                        <h5>Ngày tạo</h5>
                        <p class="info-value">{{ $post->created_at ? $post->created_at->format('d/m/Y H:i') : 'N/A' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Post Edit Page Specific Styles */
.post-edit-page {
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
    color: #92400e;
    margin: 0;
}

.card-subtitle {
    font-size: 0.875rem;
    color: #b45309;
    margin: 0.25rem 0 0 0;
}

.post-badge {
    background: white;
    color: #92400e;
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
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
    color: #f59e0b;
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
}

.form-control:focus + .input-icon {
    color: #f59e0b;
}

/* Textarea */
textarea.form-control {
    padding: 0.875rem 1rem;
    resize: vertical;
    min-height: 100px;
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
    border-radius: 0.75rem;
    cursor: pointer;
    transition: all 0.3s ease;
    color: #6b7280;
    font-weight: 600;
}

.file-label:hover {
    border-color: #f59e0b;
    background: linear-gradient(135deg, #fef3c7, #fde68a);
    color: #f59e0b;
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
    max-width: 300px;
    max-height: 300px;
    object-fit: contain;
    border-radius: 0.75rem;
    border: 3px solid #e5e7eb;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.image-label {
    font-size: 0.875rem;
    font-weight: 600;
    color: #6b7280;
}

/* Info Display */
.info-display {
    padding: 0.875rem 1rem;
    background: linear-gradient(135deg, #f9fafb, #f3f4f6);
    border: 2px solid #e5e7eb;
    border-radius: 0.5rem;
    color: #4b5563;
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
    color: #6b7280;
    margin-top: 0.25rem;
}

.form-hint i {
    color: #f59e0b;
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
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: white;
}

.btn-submit:hover {
    background: linear-gradient(135deg, #d97706, #b45309);
    transform: translateY(-2px);
    box-shadow: 0 8px 16px rgba(245, 158, 11, 0.3);
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
    border-bottom: 1px solid #e5e7eb;
}

.info-item:last-child {
    margin-bottom: 0;
    padding-bottom: 0;
    border-bottom: none;
}

.info-icon {
    width: 40px;
    height: 40px;
    border-radius: 0.5rem;
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
    background: linear-gradient(135deg, #10b981, #059669);
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
    color: #6b7280;
    text-transform: uppercase;
    letter-spacing: 0.025em;
}

.info-content .info-value {
    margin: 0;
    font-size: 0.9375rem;
    color: #1f2937;
    font-weight: 600;
    line-height: 1.4;
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
    .post-edit-page {
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
    
    .post-badge {
        width: 100%;
        justify-content: center;
    }
    
    .current-image img,
    .preview-container img {
        max-width: 100%;
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
    const form = document.getElementById('postForm');
    
    // Form validation
    form.addEventListener('submit', function(e) {
        const name = document.getElementById('name').value.trim();
        const slug = document.getElementById('slug').value.trim();
        const category = document.getElementById('categoryPost_id').value;
        const status = document.getElementById('status').value;
        const desc = document.getElementById('desc').value.trim();
        const content = CKEDITOR.instances.content.getData();
        
        if (!name || !slug || !category || !status || !desc || !content) {
            e.preventDefault();
            SwalHelper.error('Lỗi!', 'Vui lòng điền đầy đủ thông tin bắt buộc');
            return false;
        }
        
        // Show loading
        SwalHelper.loading('Đang cập nhật...', 'Vui lòng đợi trong giây lát');
    });
    
    // Initialize CKEditor if available
    if (typeof CKEDITOR !== 'undefined') {
        CKEDITOR.replace('content');
    }
});
</script>

@endsection
