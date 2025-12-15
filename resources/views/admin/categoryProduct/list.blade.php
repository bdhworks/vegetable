@extends('admin.layout.be')

@section('content')
<div class="category-product-page">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <div class="header-left">
                <h1 class="page-title">
                    <i class="ti ti-category"></i>
                    Danh mục sản phẩm
                </h1>
                <nav class="breadcrumb-modern">
                    <ol>
                        <li><a href="{{ route('admin.dashboard') }}"><i class="ti ti-home"></i>Dashboard</a></li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li>Quản lý sản phẩm</li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li class="active">Danh mục sản phẩm</li>
                    </ol>
                </nav>
            </div>
            <div class="header-right">
                <a href="{{ route('categoryProduct.create') }}" class="btn btn-add">
                    <i class="ti ti-plus"></i>
                    <span>Thêm danh mục</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card stat-primary">
            <div class="stat-icon">
                <i class="ti ti-category"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Tổng danh mục</span>
                <h3 class="stat-value">{{ $totalCategories ?? $categoryProducts->total() }}</h3>
            </div>
        </div>
        <div class="stat-card stat-success">
            <div class="stat-icon">
                <i class="ti ti-eye"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Đang hiển thị</span>
                <h3 class="stat-value">{{ $activeCategories ?? $categoryProducts->where('status', 0)->count() }}</h3>
            </div>
        </div>
        <div class="stat-card stat-warning">
            <div class="stat-icon">
                <i class="ti ti-eye-off"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Đang ẩn</span>
                <h3 class="stat-value">{{ $inactiveCategories ?? $categoryProducts->where('status', 1)->count() }}</h3>
            </div>
        </div>
        <div class="stat-card stat-info">
            <div class="stat-icon">
                <i class="ti ti-photo"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Có hình ảnh</span>
                <h3 class="stat-value">{{ $withImageCategories ?? $categoryProducts->whereNotNull('image')->count() }}</h3>
            </div>
        </div>
    </div>

    <!-- Main Content Card -->
    <div class="content-card">
        <!-- Filters and Search -->
        <div class="card-toolbar">
            <div class="toolbar-left">
                <h3 class="toolbar-title">
                    <i class="ti ti-list"></i>
                    Danh sách danh mục
                </h3>
                <span class="toolbar-badge">{{ $categoryProducts->total() }} danh mục</span>
            </div>
            <div class="toolbar-right">
                <form class="search-form" method="GET">
                    <div class="search-input-group">
                        <i class="ti ti-search search-icon"></i>
                        <input type="text" 
                               name="name" 
                               value="{{ request('name') }}" 
                               placeholder="Tìm kiếm danh mục..." 
                               class="search-input">
                        <button type="submit" class="btn-search">
                            <i class="ti ti-search"></i>
                            Tìm kiếm
                        </button>
                        @if(request('name'))
                            <a href="{{ route('categoryProduct.index') }}" class="btn-clear">
                                <i class="ti ti-x"></i>
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        <!-- Table -->
        <div class="table-container">
            <table class="data-table">
                <thead>
                    <tr>
                        <th style="width: 80px;">
                            <div class="th-content">
                                <input type="checkbox" class="select-all">
                                <span>ID</span>
                            </div>
                        </th>
                        <th style="width: 120px;">
                            <div class="th-content">
                                <i class="ti ti-photo"></i>
                                <span>Hình ảnh</span>
                            </div>
                        </th>
                        <th style="width: 25%;">
                            <div class="th-content">
                                <i class="ti ti-tag"></i>
                                <span>Tên danh mục</span>
                            </div>
                        </th>
                        <th style="width: 35%;">
                            <div class="th-content">
                                <i class="ti ti-file-text"></i>
                                <span>Mô tả</span>
                            </div>
                        </th>
                        <th style="width: 150px;" class="text-center">
                            <div class="th-content">
                                <i class="ti ti-toggle-right"></i>
                                <span>Trạng thái</span>
                            </div>
                        </th>
                        <th style="width: 200px;" class="text-center">
                            <div class="th-content">
                                <i class="ti ti-settings"></i>
                                <span>Thao tác</span>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categoryProducts as $categoryProduct)
                        <tr class="data-row">
                            <td>
                                <div class="td-content">
                                    <input type="checkbox" class="row-checkbox" value="{{ $categoryProduct->id }}">
                                    <span class="id-badge">{{ $categoryProduct->id }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="image-preview">
                                    @if($categoryProduct->image)
                                        <img src="{{ Storage::url($categoryProduct->image) }}" 
                                             alt="{{ $categoryProduct->name }}"
                                             class="category-image">
                                    @else
                                        <div class="no-image">
                                            <i class="ti ti-photo-off"></i>
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="category-info">
                                    <div class="category-icon">
                                        <i class="ti ti-category"></i>
                                    </div>
                                    <div class="category-details">
                                        <h6 class="category-name">{{ $categoryProduct->name }}</h6>
                                        <span class="category-slug">{{ Str::slug($categoryProduct->name) }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="description-content">
                                    {!! Str::limit($categoryProduct->desc, 150) !!}
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="status-wrapper">
                                    @if ($categoryProduct->status == 0)
                                        <a href="{{ route('categoryProduct.active', $categoryProduct->id) }}" 
                                           class="status-badge status-active">
                                            <i class="ti ti-eye"></i>
                                            <span>Hiển thị</span>
                                        </a>
                                    @else
                                        <a href="{{ route('categoryProduct.hidden', $categoryProduct->id) }}" 
                                           class="status-badge status-inactive">
                                            <i class="ti ti-eye-off"></i>
                                            <span>Ẩn</span>
                                        </a>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('categoryProduct.edit', $categoryProduct) }}" 
                                       class="btn-action btn-edit" 
                                       title="Chỉnh sửa">
                                        <i class="ti ti-edit"></i>
                                        <span>Sửa</span>
                                    </a>
                                    <button type="button" 
                                            class="btn-action btn-delete delete-category-product" 
                                            data-id_category="{{ $categoryProduct->id }}"
                                            title="Xóa">
                                        <i class="ti ti-trash"></i>
                                        <span>Xóa</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                <div class="empty-state">
                                    <div class="empty-icon">
                                        <i class="ti ti-category-off"></i>
                                    </div>
                                    <h5>Không có danh mục nào</h5>
                                    <p>Hãy thêm danh mục sản phẩm đầu tiên của bạn</p>
                                    <a href="{{ route('categoryProduct.create') }}" class="btn btn-add">
                                        <i class="ti ti-plus"></i>
                                        Thêm danh mục
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($categoryProducts->hasPages())
            <div class="pagination-wrapper">
                <div class="pagination-info">
                    <span>Hiển thị {{ $categoryProducts->firstItem() }} - {{ $categoryProducts->lastItem() }} trong tổng số {{ $categoryProducts->total() }}</span>
                </div>
                <div class="pagination-links">
                    {{ $categoryProducts->appends(request()->query())->links() }}
                </div>
            </div>
        @endif
    </div>
</div>

<style>
/* Category Product Page Styles */
.category-product-page {
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
    color: #3b82f6;
}

.breadcrumb-modern .active {
    color: #1f2937;
    font-weight: 500;
}

.btn-add {
    background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
    color: white;
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 0.5rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
    box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.3);
    text-decoration: none;
}

.btn-add:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 15px -3px rgba(59, 130, 246, 0.4);
    color: white;
}

/* Stats Grid */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.25rem;
    margin-bottom: 1.5rem;
}

.stat-card {
    background: white;
    border-radius: 0.75rem;
    padding: 1.5rem;
    display: flex;
    align-items: center;
    gap: 1rem;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
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
}

.stat-primary .stat-icon {
    background: linear-gradient(135deg, #3b82f6, #2563eb);
}

.stat-success .stat-icon {
    background: linear-gradient(135deg, #10b981, #059669);
}

.stat-warning .stat-icon {
    background: linear-gradient(135deg, #f59e0b, #d97706);
}

.stat-info .stat-icon {
    background: linear-gradient(135deg, #8b5cf6, #7c3aed);
}

.stat-content {
    flex: 1;
}

.stat-label {
    display: block;
    font-size: 0.875rem;
    color: #6b7280;
    margin-bottom: 0.25rem;
}

.stat-value {
    font-size: 1.875rem;
    font-weight: 700;
    color: #1f2937;
    margin: 0;
}

/* Content Card */
.content-card {
    background: white;
    border-radius: 0.75rem;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

/* Card Toolbar */
.card-toolbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1.5rem;
    border-bottom: 1px solid #e5e7eb;
    flex-wrap: wrap;
    gap: 1rem;
}

.toolbar-left {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.toolbar-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: #1f2937;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.toolbar-badge {
    background: #e0e7ff;
    color: #3b82f6;
    padding: 0.375rem 0.75rem;
    border-radius: 0.5rem;
    font-size: 0.875rem;
    font-weight: 600;
}

/* Search Form */
.search-form {
    display: flex;
    gap: 0.75rem;
}

.search-input-group {
    position: relative;
    display: flex;
    align-items: center;
    background: #f9fafb;
    border: 2px solid #e5e7eb;
    border-radius: 0.5rem;
    overflow: hidden;
    transition: all 0.3s ease;
}

.search-input-group:focus-within {
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.search-icon {
    position: absolute;
    left: 1rem;
    color: #9ca3af;
    font-size: 1.125rem;
}

.search-input {
    padding: 0.75rem 1rem 0.75rem 2.75rem;
    border: none;
    background: transparent;
    outline: none;
    font-size: 0.9375rem;
    width: 300px;
}

.btn-search {
    background: #3b82f6;
    color: white;
    border: none;
    padding: 0.75rem 1.5rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.btn-search:hover {
    background: #2563eb;
}

.btn-clear {
    background: #ef4444;
    color: white;
    border: none;
    padding: 0.5rem 0.75rem;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    text-decoration: none;
}

.btn-clear:hover {
    background: #dc2626;
    color: white;
}

/* Table Container */
.table-container {
    overflow-x: auto;
}

.data-table {
    width: 100%;
    border-collapse: collapse;
}

.data-table thead {
    background: linear-gradient(to right, #f9fafb, #f3f4f6);
}

.data-table th {
    padding: 1rem 1.25rem;
    text-align: left;
    font-weight: 600;
    color: #374151;
    font-size: 0.875rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    border-bottom: 2px solid #e5e7eb;
}

.th-content {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.data-table tbody tr {
    border-bottom: 1px solid #f3f4f6;
    transition: all 0.2s ease;
}

.data-table tbody tr:hover {
    background: #f9fafb;
}

.data-table td {
    padding: 1.25rem;
    vertical-align: middle;
}

/* TD Content */
.td-content {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.id-badge {
    background: #e0e7ff;
    color: #3b82f6;
    padding: 0.25rem 0.625rem;
    border-radius: 0.375rem;
    font-weight: 600;
    font-size: 0.875rem;
}

/* Category Info */
.category-info {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.category-icon {
    width: 48px;
    height: 48px;
    background: linear-gradient(135deg, #dbeafe, #bfdbfe);
    border-radius: 0.75rem;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #3b82f6;
    font-size: 1.5rem;
}

.category-details {
    flex: 1;
}

.category-name {
    font-size: 0.9375rem;
    font-weight: 600;
    color: #1f2937;
    margin: 0 0 0.25rem 0;
}

.category-slug {
    font-size: 0.8125rem;
    color: #6b7280;
}

/* Description */
.description-content {
    font-size: 0.875rem;
    color: #4b5563;
    line-height: 1.6;
}

/* Image Preview Specific Styles */
.image-preview {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0.5rem;
}

.category-image {
    width: 70px;
    height: 70px;
    object-fit: cover;
    border-radius: 0.75rem;
    border: 2px solid #e5e7eb;
    transition: all 0.3s ease;
    cursor: pointer;
}

.category-image:hover {
    transform: scale(1.1);
    border-color: #3b82f6;
    box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
}

.no-image {
    width: 70px;
    height: 70px;
    background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
    border-radius: 0.75rem;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #9ca3af;
    font-size: 1.5rem;
    border: 2px dashed #d1d5db;
}

/* Status Badge */
.status-wrapper {
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
    text-decoration: none;
    transition: all 0.3s ease;
}

.status-active {
    background: #d1fae5;
    color: #059669;
}

.status-active:hover {
    background: #a7f3d0;
    transform: scale(1.05);
}

.status-inactive {
    background: #fef3c7;
    color: #d97706;
}

.status-inactive:hover {
    background: #fde68a;
    transform: scale(1.05);
}

/* Action Buttons */
.action-buttons {
    display: flex;
    gap: 0.5rem;
    justify-content: center;
}

.btn-action {
    display: inline-flex;
    align-items: center;
    gap: 0.375rem;
    padding: 0.5rem 1rem;
    border-radius: 0.375rem;
    font-weight: 600;
    font-size: 0.875rem;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
}

.btn-edit {
    background: #dbeafe;
    color: #2563eb;
}

.btn-edit:hover {
    background: #3b82f6;
    color: white;
    transform: translateY(-2px);
}

.btn-delete {
    background: #fee2e2;
    color: #dc2626;
}

.btn-delete:hover {
    background: #ef4444;
    color: white;
    transform: translateY(-2px);
}

/* Empty State */
.empty-state {
    padding: 4rem 2rem;
    text-align: center;
}

.empty-icon {
    width: 100px;
    height: 100px;
    background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 3rem;
    color: #9ca3af;
    margin: 0 auto 1.5rem;
}

.empty-state h5 {
    font-size: 1.25rem;
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 0.5rem;
}

.empty-state p {
    color: #6b7280;
    margin-bottom: 1.5rem;
}

/* Pagination */
.pagination-wrapper {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1.5rem;
    border-top: 1px solid #e5e7eb;
    flex-wrap: wrap;
    gap: 1rem;
}

.pagination-info {
    color: #6b7280;
    font-size: 0.875rem;
}

/* Image Modal */
.image-modal {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.8);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
    opacity: 0;
    transition: opacity 0.3s ease;
    cursor: pointer;
}

.image-modal.show {
    opacity: 1;
}

.image-modal img {
    max-width: 90%;
    max-height: 90%;
    border-radius: 0.75rem;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
}

/* Responsive */
@media (max-width: 1024px) {
    .search-input {
        width: 250px;
    }
}

@media (max-width: 768px) {
    .category-product-page {
        padding: 1rem;
    }
    
    .header-content {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .stats-grid {
        grid-template-columns: 1fr;
    }
    
    .card-toolbar {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .search-input {
        width: 100%;
    }
    
    .action-buttons {
        flex-direction: column;
        width: 100%;
    }
    
    .btn-action {
        width: 100%;
        justify-content: center;
    }

    .image-preview {
        padding: 0.25rem;
    }

    .category-image,
    .no-image {
        width: 50px;
        height: 50px;
    }
}
</style>

<script>
// Select all checkbox
document.querySelector('.select-all')?.addEventListener('change', function() {
    document.querySelectorAll('.row-checkbox').forEach(cb => {
        cb.checked = this.checked;
    });
});

// Delete category product with SweetAlert
$(document).ready(function() {
    $(document).on('click', '.delete-category-product', function(e) {
        e.preventDefault();
        e.stopPropagation();
        
        const categoryId = $(this).data('id_category');
        
        if (!categoryId) {
            SwalHelper.error('Lỗi!', 'Không tìm thấy ID danh mục');
            return;
        }
        
        Swal.fire({
            title: 'Xác nhận xóa?',
            html: '<p style="margin-bottom: 1rem;">Bạn có chắc chắn muốn xóa danh mục sản phẩm này?</p><p style="color: #dc2626; font-size: 0.875rem;"><i class="ti ti-alert-triangle"></i> Hành động này không thể hoàn tác!</p>',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#6b7280',
            confirmButtonText: '<i class="ti ti-trash"></i> Xóa danh mục',
            cancelButtonText: '<i class="ti ti-x"></i> Hủy bỏ',
            reverseButtons: true,
            customClass: {
                confirmButton: 'swal-btn-danger',
                cancelButton: 'swal-btn-secondary'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                SwalHelper.loading('Đang xóa danh mục...', 'Vui lòng đợi trong giây lát');
                
                $.ajax({
                    url: '{{ route("categoryProduct.destroy") }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        category_id: categoryId
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Đã xóa!',
                                text: response.message || 'Danh mục đã được xóa thành công',
                                confirmButtonColor: '#22c55e',
                                confirmButtonText: 'OK',
                                timer: 3000,
                                timerProgressBar: true
                            }).then(() => {
                                location.reload();
                            });
                        } else {
                            SwalHelper.error('Lỗi!', response.error || 'Có lỗi xảy ra khi xóa danh mục');
                        }
                    },
                    error: function(xhr) {
                        console.error('AJAX Error:', xhr);
                        let errorMsg = 'Có lỗi xảy ra khi xóa danh mục';
                        
                        if (xhr.status === 403) {
                            errorMsg = 'Bạn không có quyền xóa danh mục này';
                        } else if (xhr.status === 404) {
                            errorMsg = 'Không tìm thấy danh mục';
                        } else if (xhr.status === 409) {
                            errorMsg = 'Không thể xóa danh mục vì đang có sản phẩm liên kết';
                        } else if (xhr.responseJSON?.message) {
                            errorMsg = xhr.responseJSON.message;
                        }
                        
                        SwalHelper.error('Lỗi!', errorMsg);
                    }
                });
            }
        });
    });
});

// Image preview on hover - Enhanced
document.querySelectorAll('.category-image').forEach(img => {
    img.addEventListener('mouseenter', function() {
        const modal = document.createElement('div');
        modal.className = 'image-modal';
        modal.innerHTML = `<img src="${this.src}" alt="">`;
        document.body.appendChild(modal);
        
        setTimeout(() => modal.classList.add('show'), 10);
        
        modal.addEventListener('click', () => {
            modal.classList.remove('show');
            setTimeout(() => modal.remove(), 300);
        });
    });
});
</script>
                
@endsection
