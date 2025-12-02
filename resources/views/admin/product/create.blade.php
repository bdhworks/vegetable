@extends('admin.layout.be')

@section('title_one')
Sản phẩm
@endsection
@section('title_two')
Quản lý sản phẩm / Sản phẩm
@endsection

@section('content')
<div class="product-create-page">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <div class="header-left">
                <h1 class="page-title">
                    <i class="ti ti-plus"></i>
                    Thêm sản phẩm mới
                </h1>
                <nav class="breadcrumb-modern">
                    <ol>
                        <li><a href="{{ route('admin.dashboard') }}"><i class="ti ti-home"></i>Dashboard</a></li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li><a href="{{ route('product.index') }}">Sản phẩm</a></li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li class="active">Thêm mới</li>
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

    <!-- Form Content -->
    <div class="form-container">
        <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="row g-4">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <!-- Basic Information -->
                    <div class="content-card">
                        <div class="card-header-custom">
                            <h3 class="card-title-custom">
                                <i class="ti ti-info-circle"></i>
                                Thông tin cơ bản
                            </h3>
                            <p class="card-subtitle-custom">Nhập thông tin chi tiết cho sản phẩm</p>
                        </div>
                        <div class="card-body-custom">
                            <!-- Product Code -->
                            <div class="form-group-modern">
                                <label class="form-label-modern required">
                                    <i class="ti ti-qrcode"></i>
                                    Mã sản phẩm
                                </label>
                                <select class="form-select-modern" name="code_id" id="code_id" required>
                                    <option value="">Chọn mã sản phẩm...</option>
                                    @foreach ($productCodes as $productCode)
                                        <option value="{{ $productCode->id }}" {{ old('code_id') == $productCode->id ? 'selected' : '' }}>
                                            {{ $productCode->name }} : {{ $productCode->title }}
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

                            <!-- Product Name -->
                            <div class="form-group-modern">
                                <label class="form-label-modern required">
                                    <i class="ti ti-package"></i>
                                    Tên sản phẩm
                                </label>
                                <input type="text" 
                                       name="name" 
                                       class="form-control-modern" 
                                       id="name"
                                       placeholder="Nhập tên sản phẩm..."
                                       value="{{ old('name') }}"
                                       required>
                                @error('name')
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
                                                <option value="{{ $origin->id }}" {{ old('origin_id') == $origin->id ? 'selected' : '' }}>
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
                                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                                               value="{{ old('quantity') }}"
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
                                            <option value="0.5 kg" {{ old('weight') == '0.5 kg' ? 'selected' : '' }}>0.5 kg</option>
                                            <option value="1.0 kg" {{ old('weight') == '1.0 kg' ? 'selected' : '' }}>1.0 kg</option>
                                            <option value="1.5 kg" {{ old('weight') == '1.5 kg' ? 'selected' : '' }}>1.5 kg</option>
                                            <option value="2.0 kg" {{ old('weight') == '2.0 kg' ? 'selected' : '' }}>2.0 kg</option>
                                            <option value="2.5 kg" {{ old('weight') == '2.5 kg' ? 'selected' : '' }}>2.5 kg</option>
                                            <option value="3.0 kg" {{ old('weight') == '3.0 kg' ? 'selected' : '' }}>3.0 kg</option>
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
                                          rows="10"
                                          placeholder="Nhập mô tả chi tiết về sản phẩm...">{{ old('desc') }}</textarea>
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
                            <p class="card-subtitle-custom">Tải lên nhiều hình ảnh cho sản phẩm</p>
                        </div>
                        <div class="card-body-custom">
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
                                    <h6>Tải ảnh lên</h6>
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
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Guidelines Card -->
                    <div class="content-card sticky-sidebar">
                        <div class="card-header-custom">
                            <h3 class="card-title-custom">
                                <i class="ti ti-info-circle"></i>
                                Hướng dẫn
                            </h3>
                        </div>
                        <div class="card-body-custom">
                            <div class="info-box">
                                <div class="info-icon">
                                    <i class="ti ti-bulb"></i>
                                </div>
                                <div class="info-content">
                                    <h6>Lưu ý quan trọng</h6>
                                    <ul>
                                        <li>Tên sản phẩm nên rõ ràng, dễ hiểu</li>
                                        <li>Chọn đúng mã và loại sản phẩm</li>
                                        <li>Xuất xứ giúp khách hàng tin tưởng</li>
                                        <li>Số lượng phải lớn hơn 0</li>
                                        <li>Tải lên ít nhất 1 hình ảnh</li>
                                        <li>Hình ảnh chất lượng cao tăng tỷ lệ bán</li>
                                        <li>Mô tả chi tiết giúp SEO tốt hơn</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="form-actions-sidebar">
                                <button type="submit" class="btn btn-save">
                                    <i class="ti ti-device-floppy"></i>
                                    <span>Lưu sản phẩm</span>
                                </button>
                                <a href="{{ route('product.index') }}" class="btn btn-cancel">
                                    <i class="ti ti-x"></i>
                                    <span>Hủy bỏ</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
/* Product Create Page Styles */
.product-create-page {
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
    padding-left: 1.25rem;
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

.btn-save {
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

.btn-save:hover {
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
    border-color: #ef4444;
    color: #ef4444;
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
    .product-create-page {
        padding: 1rem;
    }
    
    .header-content {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .page-title {
        font-size: 1.5rem;
    }

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

// Form Validation
document.querySelector('form')?.addEventListener('submit', function(e) {
    const codeId = document.getElementById('code_id').value;
    const name = document.querySelector('input[name="name"]').value.trim();
    const originId = document.querySelector('select[name="origin_id"]').value;
    const categoryId = document.querySelector('select[name="category_id"]').value;
    const quantity = document.querySelector('input[name="quantity"]').value;
    const weight = document.querySelector('select[name="weight"]').value;
    const images = document.getElementById('imageInput').files;
    
    if (!codeId || !name || !originId || !categoryId || !quantity || !weight) {
        e.preventDefault();
        alert('Vui lòng điền đầy đủ các trường bắt buộc!');
        return false;
    }
    
    if (images.length === 0) {
        e.preventDefault();
        alert('Vui lòng tải lên ít nhất 1 hình ảnh!');
        return false;
    }
});
</script>

@endsection
