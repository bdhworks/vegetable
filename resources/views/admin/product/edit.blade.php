@extends('admin.layout.be')

@section('title_one')
Sản phẩm
@endsection
@section('title_two')
Quản lý sản phẩm / Sản phẩm
@endsection

@section('content')
<div class="product-edit-page">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <div class="header-left">
                <h1 class="page-title">
                    <i class="ti ti-pencil"></i>
                    Cập nhật sản phẩm
                </h1>
                <nav class="breadcrumb-modern">
                    <ol>
                        <li><a href="{{ route('admin.dashboard') }}"><i class="ti ti-home"></i>Dashboard</a></li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li><a href="{{ route('product.index') }}">Sản phẩm</a></li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li class="active">Cập nhật</li>
                    </ol>
                </nav>
            </div>
            <div class="header-right">
                <a href="{{ route('product.index') }}" class="btn btn-back">
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
        <form method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data" id="editProductForm">
            @csrf
            @method('PUT')
            
            <div class="row g-4">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <!-- Basic Information -->
                    <div class="content-card">
                        <div class="card-header-custom">
                            <div class="header-left">
                                <h3 class="card-title-custom">
                                    <i class="ti ti-info-circle"></i>
                                    Thông tin cơ bản
                                </h3>
                                <p class="card-subtitle-custom">Cập nhật thông tin chi tiết cho sản phẩm</p>
                            </div>
                            <div class="header-right">
                                <span class="edit-badge">
                                    <i class="ti ti-edit"></i>
                                    Chế độ chỉnh sửa
                                </span>
                            </div>
                        </div>
                        <div class="card-body-custom">
                            <!-- Product Name -->
                            <div class="form-group-modern">
                                <label class="form-label-modern required">
                                    <i class="ti ti-package"></i>
                                    Tên sản phẩm
                                </label>
                                <input type="text" 
                                       name="name" 
                                       class="form-control-modern" 
                                       placeholder="Nhập tên sản phẩm..."
                                       value="{{ old('name', $product->name) }}"
                                       required>
                                @error('name')
                                    <div class="error-message">
                                        <i class="ti ti-alert-circle"></i>
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

                            <!-- Product Code -->
                            <div class="form-group-modern">
                                <label class="form-label-modern required">
                                    <i class="ti ti-qrcode"></i>
                                    Mã sản phẩm
                                </label>
                                <select class="form-select-modern" name="code_id" required>
                                    <option value="">Chọn mã sản phẩm...</option>
                                    @foreach ($codes as $code)
                                        <option value="{{ $code->id }}" {{ $code->id == $product->code_id ? 'selected' : '' }}>
                                            {{ $code->name }} : {{ $code->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('code_id')
                                    <div class="error-message">
                                        <i class="ti ti-alert-circle"></i>
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

                            <!-- Row: Origin & Category -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group-modern">
                                        <label class="form-label-modern required">
                                            <i class="ti ti-world"></i>
                                            Xuất xứ
                                        </label>
                                        <select class="form-select-modern" name="origin_id" required>
                                            <option value="">Chọn xuất xứ...</option>
                                            @foreach ($origins as $origin)
                                                <option value="{{ $origin->id }}" {{ $origin->id == $product->origin_id ? 'selected' : '' }}>
                                                    {{ $origin->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('origin_id')
                                            <div class="error-message">
                                                <i class="ti ti-alert-circle"></i>
                                                <span>{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group-modern">
                                        <label class="form-label-modern required">
                                            <i class="ti ti-category"></i>
                                            Loại sản phẩm
                                        </label>
                                        <select class="form-select-modern" name="category_id" required>
                                            <option value="">Chọn loại sản phẩm...</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <div class="error-message">
                                                <i class="ti ti-alert-circle"></i>
                                                <span>{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Row: Quantity & Weight -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group-modern">
                                        <label class="form-label-modern required">
                                            <i class="ti ti-box"></i>
                                            Số lượng
                                        </label>
                                        <input type="number" 
                                               name="quantity" 
                                               class="form-control-modern" 
                                               placeholder="Nhập số lượng..."
                                               value="{{ old('quantity', $product->quantity) }}"
                                               min="0"
                                               required>
                                        @error('quantity')
                                            <div class="error-message">
                                                <i class="ti ti-alert-circle"></i>
                                                <span>{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group-modern">
                                        <label class="form-label-modern required">
                                            <i class="ti ti-weight"></i>
                                            Khối lượng
                                        </label>
                                        <select class="form-select-modern" name="weight" required>
                                            <option value="">Chọn khối lượng...</option>
                                            <option value="0.5 kg" {{ $product->weight == '0.5 kg' ? 'selected' : '' }}>0.5 kg</option>
                                            <option value="1.0 kg" {{ $product->weight == '1.0 kg' ? 'selected' : '' }}>1.0 kg</option>
                                            <option value="1.5 kg" {{ $product->weight == '1.5 kg' ? 'selected' : '' }}>1.5 kg</option>
                                            <option value="2.0 kg" {{ $product->weight == '2.0 kg' ? 'selected' : '' }}>2.0 kg</option>
                                            <option value="2.5 kg" {{ $product->weight == '2.5 kg' ? 'selected' : '' }}>2.5 kg</option>
                                            <option value="3.0 kg" {{ $product->weight == '3.0 kg' ? 'selected' : '' }}>3.0 kg</option>
                                        </select>
                                        @error('weight')
                                            <div class="error-message">
                                                <i class="ti ti-alert-circle"></i>
                                                <span>{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="form-group-modern">
                                <label class="form-label-modern required">
                                    <i class="ti ti-file-text"></i>
                                    Mô tả sản phẩm
                                </label>
                                <textarea class="form-control-modern ckeditor" 
                                          name="desc" 
                                          id="editor"
                                          rows="10">{{ old('desc', $product->desc) }}</textarea>
                                @error('desc')
                                    <div class="error-message">
                                        <i class="ti ti-alert-circle"></i>
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Images Section -->
                    <div class="content-card mt-4">
                        <div class="card-header-custom">
                            <h3 class="card-title-custom">
                                <i class="ti ti-photo"></i>
                                Hình ảnh sản phẩm
                            </h3>
                            <p class="card-subtitle-custom">Cập nhật hình ảnh cho sản phẩm</p>
                        </div>
                        <div class="card-body-custom">
                            <!-- Current Images -->
                            <div class="current-images-section">
                                <label class="form-label-modern">
                                    <i class="ti ti-photo"></i>
                                    Hình ảnh hiện tại
                                </label>
                                <div class="current-images-grid">
                                    @foreach ($product->images as $image)
                                        <div class="current-image-item">
                                            <img src="{{ $image->image }}" alt="Product Image">
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Upload New Images -->
                            <div class="image-upload-zone">
                                <input type="file" 
                                       name="images[]" 
                                       id="imageInput" 
                                       accept="image/jpg, image/jpeg, image/png, image/webp" 
                                       multiple 
                                       class="d-none">
                                <label for="imageInput" class="upload-label">
                                    <div class="upload-icon">
                                        <i class="ti ti-cloud-upload"></i>
                                    </div>
                                    <h6>Thay đổi hoặc thêm ảnh mới</h6>
                                    <p>Kéo thả hoặc click để chọn nhiều ảnh</p>
                                    <span class="file-info">JPG, PNG, WEBP (Ctrl + Click để chọn nhiều)</span>
                                </label>
                            </div>
                            @error('images')
                                <div class="error-message">
                                    <i class="ti ti-alert-circle"></i>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                            <div id="imagePreview" class="image-preview-grid"></div>
                        </div>
                    </div>

                    <!-- Change History -->
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
                                        <p>{{ $product->created_at->format('d/m/Y H:i') }}</p>
                                        <span class="timeline-time">{{ $product->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-icon updated">
                                        <i class="ti ti-edit"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <h6>Cập nhật lần cuối</h6>
                                        <p>{{ $product->updated_at->format('d/m/Y H:i') }}</p>
                                        <span class="timeline-time">{{ $product->updated_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Product Info Card -->
                    <div class="content-card sticky-sidebar">
                        <div class="card-header-custom">
                            <h3 class="card-title-custom">
                                <i class="ti ti-database"></i>
                                Thông tin sản phẩm
                            </h3>
                        </div>
                        <div class="card-body-custom">
                            <div class="info-box">
                                <div class="info-icon">
                                    <i class="ti ti-package"></i>
                                </div>
                                <div class="info-content">
                                    <h6>Chi tiết</h6>
                                    <ul>
                                        <li><strong>ID:</strong> {{ $product->id }}</li>
                                        <li><strong>Mã SP:</strong> {{ $product->productCode->name }}</li>
                                        <li><strong>Đã bán:</strong> {{ $product->sold }}</li>
                                        <li><strong>Tạo:</strong> {{ $product->created_at->format('d/m/Y') }}</li>
                                        <li><strong>Cập nhật:</strong> {{ $product->updated_at->format('d/m/Y') }}</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="form-actions-sidebar">
                                <button type="submit" class="btn btn-update">
                                    <i class="ti ti-check"></i>
                                    <span>Cập nhật sản phẩm</span>
                                </button>
                                <a href="{{ route('product.index') }}" class="btn btn-cancel">
                                    <i class="ti ti-x"></i>
                                    <span>Hủy bỏ</span>
                                </a>
                                @if ($product->sold <= 0)
                                    <button type="button" class="btn btn-delete" onclick="confirmDelete()">
                                        <i class="ti ti-trash"></i>
                                        <span>Xóa sản phẩm</span>
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Delete Confirmation Form -->
<form id="deleteForm" action="{{ route('product.destroy', ['product_id' => $product->id]) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

<style>
/* Product Edit Page Styles */
.product-edit-page {
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
    color: #f97316;
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
    color: #f97316;
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
    border-color: #f97316;
    color: #f97316;
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

.edit-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: linear-gradient(135deg, #ffedd5, #fed7aa);
    color: #9a3412;
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
    border-color: #f97316;
    box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.1);
}

textarea.form-control-modern {
    resize: vertical;
    min-height: 120px;
}

.error-message {
    display: flex;
    align-items: center;
    gap: 0.375rem;
    margin-top: 0.5rem;
    color: #ef4444;
    font-size: 0.875rem;
}

/* Current Images Section */
.current-images-section {
    margin-bottom: 1.5rem;
}

.current-images-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
    gap: 1rem;
    margin-top: 1rem;
}

.current-image-item {
    position: relative;
    border-radius: 0.75rem;
    overflow: hidden;
    border: 2px solid #e5e7eb;
    aspect-ratio: 1;
    transition: all 0.3s ease;
}

.current-image-item:hover {
    border-color: #f97316;
    box-shadow: 0 4px 12px rgba(249, 115, 22, 0.2);
}

.current-image-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* CKEditor Styles */
.ck-editor__editable[role="textbox"] {
    min-height: 400px;
}

.ck-content .image {
    max-width: 80%;
    margin: 20px auto;
}

/* Image Upload Zone */
.image-upload-zone {
    border: 3px dashed #e5e7eb;
    border-radius: 0.75rem;
    padding: 3rem 2rem;
    text-align: center;
    transition: all 0.3s ease;
    background: #f9fafb;
    cursor: pointer;
    margin-top: 1.5rem;
}

.image-upload-zone:hover {
    border-color: #f97316;
    background: linear-gradient(135deg, rgba(249, 115, 22, 0.05), rgba(249, 115, 22, 0.02));
}

.upload-label {
    cursor: pointer;
    display: block;
    margin: 0;
}

.upload-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #ffedd5, #fed7aa);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2.5rem;
    color: #f97316;
    margin: 0 auto 1rem;
}

.upload-label h6 {
    font-size: 1.125rem;
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 0.5rem;
}

.upload-label p {
    font-size: 0.875rem;
    color: #6b7280;
    margin-bottom: 1rem;
}

.file-info {
    display: inline-block;
    padding: 0.5rem 1rem;
    background: rgba(249, 115, 22, 0.1);
    color: #f97316;
    border-radius: 0.5rem;
    font-size: 0.8125rem;
    font-weight: 600;
}

/* Image Preview Grid */
.image-preview-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
    gap: 1rem;
    margin-top: 1.5rem;
}

.preview-item {
    position: relative;
    border-radius: 0.75rem;
    overflow: hidden;
    border: 2px solid #e5e7eb;
    aspect-ratio: 1;
}

.preview-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.preview-remove {
    position: absolute;
    top: 0.5rem;
    right: 0.5rem;
    width: 32px;
    height: 32px;
    background: rgba(239, 68, 68, 0.9);
    border: none;
    border-radius: 50%;
    color: white;
    font-size: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}

.preview-remove:hover {
    background: #dc2626;
    transform: scale(1.1);
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
    background: linear-gradient(135deg, #f97316, #ea580c);
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
    background: linear-gradient(135deg, #ffedd5 0%, #fed7aa 100%);
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
    color: #f97316;
    font-size: 1.25rem;
    margin-bottom: 0.75rem;
}

.info-box .info-content h6 {
    font-size: 0.9375rem;
    font-weight: 700;
    color: #9a3412;
    margin-bottom: 0.5rem;
}

.info-box .info-content ul {
    margin: 0;
    padding-left: 0;
    list-style: none;
    font-size: 0.8125rem;
    color: #c2410c;
}

.info-box .info-content li {
    margin-bottom: 0.25rem;
}

/* Form Actions Sidebar */
.form-actions-sidebar {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.btn-update {
    background: linear-gradient(135deg, #f97316 0%, #ea580c 100%);
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
    box-shadow: 0 4px 6px -1px rgba(249, 115, 22, 0.3);
}

.btn-update:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 15px -3px rgba(249, 115, 22, 0.4);
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

/* Utility Classes */
.d-none {
    display: none !important;
}

/* Responsive */
@media (max-width: 1024px) {
    .sticky-sidebar {
        position: relative;
        top: 0;
    }
}

@media (max-width: 768px) {
    .product-edit-page {
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

    .current-images-grid,
    .image-preview-grid {
        grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
    }
}
</style>

<script>
// Image Preview Handler
document.getElementById('imageInput')?.addEventListener('change', function(e) {
    const preview = document.getElementById('imagePreview');
    preview.innerHTML = '';
    
    const files = Array.from(e.target.files);
    
    files.forEach((file, index) => {
        if (file.type.startsWith('image/')) {
            const reader = new FileReader();
            
            reader.onload = function(event) {
                const div = document.createElement('div');
                div.className = 'preview-item';
                div.innerHTML = `
                    <img src="${event.target.result}" alt="Preview ${index + 1}">
                    <button type="button" class="preview-remove" onclick="removePreview(this, ${index})">
                        <i class="ti ti-x"></i>
                    </button>
                `;
                preview.appendChild(div);
            };
            
            reader.readAsDataURL(file);
        }
    });
});

// Remove Preview
function removePreview(button, index) {
    const input = document.getElementById('imageInput');
    const dt = new DataTransfer();
    const files = Array.from(input.files);
    
    files.forEach((file, i) => {
        if (i !== index) {
            dt.items.add(file);
        }
    });
    
    input.files = dt.files;
    button.closest('.preview-item').remove();
}

// Delete confirmation
function confirmDelete() {
    if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này? Hành động này không thể hoàn tác!')) {
        document.getElementById('deleteForm').submit();
    }
}

// Form Validation
document.getElementById('editProductForm')?.addEventListener('submit', function(e) {
    const name = document.querySelector('input[name="name"]').value.trim();
    const codeId = document.querySelector('select[name="code_id"]').value;
    const originId = document.querySelector('select[name="origin_id"]').value;
    const categoryId = document.querySelector('select[name="category_id"]').value;
    const quantity = document.querySelector('input[name="quantity"]').value;
    const weight = document.querySelector('select[name="weight"]').value;
    
    if (!name || !codeId || !originId || !categoryId || !quantity || !weight) {
        e.preventDefault();
        alert('Vui lòng điền đầy đủ các trường bắt buộc!');
        return false;
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
