@extends('admin.layout.be')

@section('content')
<div class="product-code-page">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <div class="header-left">
                <h1 class="page-title">
                    <i class="ti ti-qrcode"></i>
                    Mã sản phẩm
                </h1>
                <nav class="breadcrumb-modern">
                    <ol>
                        <li><a href="{{ route('admin.dashboard') }}"><i class="ti ti-home"></i>Dashboard</a></li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li>Quản lý sản phẩm</li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li class="active">Mã sản phẩm</li>
                    </ol>
                </nav>
            </div>
            <div class="header-right">
                <a href="{{ route('productCode.create') }}" class="btn btn-add">
                    <i class="ti ti-plus"></i>
                    <span>Thêm mã sản phẩm</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card stat-primary">
            <div class="stat-icon">
                <i class="ti ti-qrcode"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Tổng mã sản phẩm</span>
                <h3 class="stat-value">{{ $productCodes->total() }}</h3>
            </div>
        </div>
        <div class="stat-card stat-success">
            <div class="stat-icon">
                <i class="ti ti-eye"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Đang hiển thị</span>
                <h3 class="stat-value">{{ $productCodes->where('status', 1)->count() }}</h3>
            </div>
        </div>
        <div class="stat-card stat-warning">
            <div class="stat-icon">
                <i class="ti ti-eye-off"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Đang ẩn</span>
                <h3 class="stat-value">{{ $productCodes->where('status', 0)->count() }}</h3>
            </div>
        </div>
        <div class="stat-card stat-info">
            <div class="stat-icon">
                <i class="ti ti-percentage"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Tỷ lệ hoạt động</span>
                <h3 class="stat-value">{{ $productCodes->count() > 0 ? round(($productCodes->where('status', 1)->count() / $productCodes->total()) * 100) : 0 }}%</h3>
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
                    Danh sách mã sản phẩm
                </h3>
                <span class="toolbar-badge">{{ $productCodes->total() }} mã sản phẩm</span>
            </div>
            <div class="toolbar-right">
                <form class="search-form" method="GET">
                    <div class="search-input-group">
                        <i class="ti ti-search search-icon"></i>
                        <input type="text" 
                               name="product_code" 
                               value="{{ request('product_code') }}" 
                               placeholder="Tìm kiếm mã sản phẩm..." 
                               class="search-input">
                        <button type="submit" class="btn-search">
                            <i class="ti ti-search"></i>
                            Tìm kiếm
                        </button>
                        @if(request('product_code'))
                            <a href="{{ route('productCode.index') }}" class="btn-clear">
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
                        <th style="width: 20%;">
                            <div class="th-content">
                                <i class="ti ti-barcode"></i>
                                <span>Mã sản phẩm</span>
                            </div>
                        </th>
                        <th style="width: 25%;">
                            <div class="th-content">
                                <i class="ti ti-tag"></i>
                                <span>Tên</span>
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
                    @forelse($productCodes as $productCode)
                        <tr class="data-row">
                            <td>
                                <div class="td-content">
                                    <input type="checkbox" class="row-checkbox" value="{{ $productCode->id }}">
                                    <span class="id-badge">{{ $productCode->id }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="product-code-badge">
                                    <i class="ti ti-qrcode"></i>
                                    <span>{{ $productCode->name }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="product-code-info">
                                    <h6 class="product-code-title">{{ $productCode->title }}</h6>
                                </div>
                            </td>
                            <td>
                                <div class="description-content">
                                    {!! Str::limit($productCode->desc, 150) !!}
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="status-wrapper">
                                    @if ($productCode->status == 1)
                                        <a href="{{ route('productCode.active', $productCode->id) }}" 
                                           class="status-badge status-active">
                                            <i class="ti ti-eye"></i>
                                            <span>Hiển thị</span>
                                        </a>
                                    @else
                                        <a href="{{ route('productCode.hidden', $productCode->id) }}" 
                                           class="status-badge status-inactive">
                                            <i class="ti ti-eye-off"></i>
                                            <span>Ẩn</span>
                                        </a>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('productCode.edit', $productCode) }}" 
                                       class="btn-action btn-edit" 
                                       title="Chỉnh sửa">
                                        <i class="ti ti-edit"></i>
                                        <span>Sửa</span>
                                    </a>
                                    <button type="button" 
                                            class="btn-action btn-delete delete-productCode" 
                                            data-id_productCode="{{ $productCode->id }}"
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
                                        <i class="ti ti-qrcode-off"></i>
                                    </div>
                                    <h5>Không có mã sản phẩm nào</h5>
                                    <p>Hãy thêm mã sản phẩm đầu tiên</p>
                                    <a href="{{ route('productCode.create') }}" class="btn btn-add">
                                        <i class="ti ti-plus"></i>
                                        Thêm mã sản phẩm
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($productCodes->hasPages())
            <div class="pagination-wrapper">
                <div class="pagination-info">
                    <span>Hiển thị {{ $productCodes->firstItem() }} - {{ $productCodes->lastItem() }} trong tổng số {{ $productCodes->total() }}</span>
                </div>
                <div class="pagination-links">
                    {{ $productCodes->appends(request()->query())->links() }}
                </div>
            </div>
        @endif
    </div>
</div>

<style>
/* Product Code Page Styles */
.product-code-page {
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

.btn-add {
    background: linear-gradient(135deg, #14b8a6 0%, #0d9488 100%);
    color: white;
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 0.5rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
    box-shadow: 0 4px 6px -1px rgba(20, 184, 166, 0.3);
    text-decoration: none;
}

.btn-add:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 15px -3px rgba(20, 184, 166, 0.4);
    color: white;
}

/* Stats Grid - copy from other pages */
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
    background: linear-gradient(135deg, #14b8a6, #0d9488);
}

.stat-success .stat-icon {
    background: linear-gradient(135deg, #10b981, #059669);
}

.stat-warning .stat-icon {
    background: linear-gradient(135deg, #f59e0b, #d97706);
}

.stat-info .stat-icon {
    background: linear-gradient(135deg, #3b82f6, #2563eb);
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

.stat-value {}
    font-size: 1.875rem;
    font-weight: 700;
    color: #1f2937;
    margin: 0;
}

/* Content Card - copy from other pages */
.content-card {
    background: white;
    border-radius: 0.75rem;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

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
    background: #ccfbf1;
    color: #14b8a6;
    padding: 0.375rem 0.75rem;
    border-radius: 0.5rem;
    font-size: 0.875rem;
    font-weight: 600;
}

/* Search Form - copy from other pages */
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
    border-color: #14b8a6;
    box-shadow: 0 0 0 3px rgba(20, 184, 166, 0.1);
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
    background: #14b8a6;
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
    background: #0d9488;
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

/* Table styles - copy from other pages */
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

.td-content {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.id-badge {
    background: #ccfbf1;
    color: #14b8a6;
    padding: 0.25rem 0.625rem;
    border-radius: 0.375rem;
    font-weight: 600;
    font-size: 0.875rem;
}

/* Product Code Specific Styles */
.product-code-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: linear-gradient(135deg, #ccfbf1, #99f6e4);
    color: #115e59;
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    font-weight: 700;
    font-size: 0.875rem;
    font-family: 'Courier New', monospace;
    border: 2px solid #14b8a6;
    letter-spacing: 1px;
}

.product-code-info {
    display: flex;
    flex-direction: column;
}

.product-code-title {
    font-size: 0.9375rem;
    font-weight: 600;
    color: #1f2937;
    margin: 0;
}

.description-content {
    font-size: 0.875rem;
    color: #4b5563;
    line-height: 1.6;
}

/* Status and Action buttons - copy from other pages */
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

/* Empty State - copy from other pages */
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

/* Pagination - copy from other pages */
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

/* Responsive */
@media (max-width: 1024px) {
    .search-input {
        width: 250px;
    }
}

@media (max-width: 768px) {
    .product-code-page {
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
}
</style>

<script>
// Select all checkbox
document.querySelector('.select-all')?.addEventListener('change', function() {
    document.querySelectorAll('.row-checkbox').forEach(cb => {
        cb.checked = this.checked;
    });
});

// Delete product code with SweetAlert2
$(document).ready(function() {
    $(document).on('click', '.delete-productCode', function(e) {
        e.preventDefault();
        e.stopPropagation();
        
        const productCodeId = $(this).data('id_productcode');
        
        if (!productCodeId) {
            SwalHelper.error('Lỗi!', 'Không tìm thấy ID mã sản phẩm');
            return;
        }
        
        Swal.fire({
            title: 'Xác nhận xóa?',
            html: '<p style="margin-bottom: 1rem;">Bạn có chắc chắn muốn xóa mã sản phẩm này?</p><p style="color: #dc2626; font-size: 0.875rem;"><i class="ti ti-alert-triangle"></i> Hành động này không thể hoàn tác!</p>',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#6b7280',
            confirmButtonText: '<i class="ti ti-trash"></i> Xóa mã sản phẩm',
            cancelButtonText: '<i class="ti ti-x"></i> Hủy bỏ',
            reverseButtons: true,
            customClass: {
                confirmButton: 'swal-btn-danger',
                cancelButton: 'swal-btn-secondary'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                SwalHelper.loading('Đang xóa mã sản phẩm...', 'Vui lòng đợi trong giây lát');
                
                $.ajax({
                    url: '{{ route("productCode.destroy") }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        productCode_id: productCodeId
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Đã xóa!',
                                text: response.message || 'Mã sản phẩm đã được xóa thành công',
                                confirmButtonColor: '#22c55e',
                                confirmButtonText: 'OK',
                                timer: 3000,
                                timerProgressBar: true
                            }).then(() => {
                                location.reload();
                            });
                        } else {
                            SwalHelper.error('Lỗi!', response.error || 'Có lỗi xảy ra khi xóa mã sản phẩm');
                        }
                    },
                    error: function(xhr) {
                        console.error('AJAX Error:', xhr);
                        let errorMsg = 'Có lỗi xảy ra khi xóa mã sản phẩm';
                        
                        if (xhr.status === 403) {
                            errorMsg = 'Bạn không có quyền xóa mã sản phẩm này';
                        } else if (xhr.status === 404) {
                            errorMsg = 'Không tìm thấy mã sản phẩm';
                        } else if (xhr.status === 409) {
                            errorMsg = 'Không thể xóa mã sản phẩm vì đang có sản phẩm liên kết';
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
</script>

@endsection
