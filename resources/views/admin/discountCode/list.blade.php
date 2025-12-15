@extends('admin.layout.be')

@section('content')
<div class="discount-code-page">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <div class="header-left">
                <h1 class="page-title">
                    <i class="ti ti-ticket"></i>
                    Mã giảm giá
                </h1>
                <nav class="breadcrumb-modern">
                    <ol>
                        <li><a href="{{ route('admin.dashboard') }}"><i class="ti ti-home"></i>Dashboard</a></li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li>Quản lý sản phẩm</li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li class="active">Mã giảm giá</li>
                    </ol>
                </nav>
            </div>
            <div class="header-right">
                <a href="{{ route('discountCode.create') }}" class="btn btn-add">
                    <i class="ti ti-plus"></i>
                    <span>Thêm mã giảm giá</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card stat-primary">
            <div class="stat-icon">
                <i class="ti ti-ticket"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Tổng mã code</span>
                <h3 class="stat-value">{{ $discountCodes->total() }}</h3>
            </div>
        </div>
        <div class="stat-card stat-success">
            <div class="stat-icon">
                <i class="ti ti-check"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Đang hoạt động</span>
                <h3 class="stat-value">{{ $discountCodes->where('status', 1)->count() }}</h3>
            </div>
        </div>
        <div class="stat-card stat-warning">
            <div class="stat-icon">
                <i class="ti ti-clock"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Tạm dừng</span>
                <h3 class="stat-value">{{ $discountCodes->where('status', 0)->count() }}</h3>
            </div>
        </div>
        <div class="stat-card stat-info">
            <div class="stat-icon">
                <i class="ti ti-discount"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Tỷ lệ sử dụng</span>
                <h3 class="stat-value">{{ $discountCodes->count() > 0 ? round(($discountCodes->where('status', 1)->count() / $discountCodes->total()) * 100) : 0 }}%</h3>
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
                    Danh sách mã giảm giá
                </h3>
                <span class="toolbar-badge">{{ $discountCodes->total() }} mã code</span>
            </div>
            <div class="toolbar-right">
                <form class="search-form" method="GET">
                    <div class="search-input-group">
                        <i class="ti ti-search search-icon"></i>
                        <input type="text" 
                               name="name" 
                               value="{{ request('name') }}" 
                               placeholder="Tìm kiếm mã giảm giá..." 
                               class="search-input">
                        <button type="submit" class="btn-search">
                            <i class="ti ti-search"></i>
                            Tìm kiếm
                        </button>
                        @if(request('name'))
                            <a href="{{ route('discountCode.index') }}" class="btn-clear">
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
                        <th style="width: 15%;">
                            <div class="th-content">
                                <i class="ti ti-barcode"></i>
                                <span>Mã code</span>
                            </div>
                        </th>
                        <th style="width: 20%;">
                            <div class="th-content">
                                <i class="ti ti-tag"></i>
                                <span>Tên mã</span>
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
                    @forelse($discountCodes as $discountCode)
                        <tr class="data-row">
                            <td>
                                <div class="td-content">
                                    <input type="checkbox" class="row-checkbox" value="{{ $discountCode->id }}">
                                    <span class="id-badge">{{ $discountCode->id }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="code-info">
                                    <div class="code-badge">
                                        <i class="ti ti-ticket"></i>
                                        <span>{{ $discountCode->name }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="discount-info">
                                    <h6 class="discount-title">{{ $discountCode->title }}</h6>
                                </div>
                            </td>
                            <td>
                                <div class="description-content">
                                    {!! Str::limit($discountCode->desc, 150) !!}
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="status-wrapper">
                                    @if ($discountCode->status == 1)
                                        <a href="{{ route('discountCode.active', $discountCode->id) }}" 
                                           class="status-badge status-active">
                                            <i class="ti ti-check"></i>
                                            <span>Hoạt động</span>
                                        </a>
                                    @else
                                        <a href="{{ route('discountCode.hidden', $discountCode->id) }}" 
                                           class="status-badge status-inactive">
                                            <i class="ti ti-clock"></i>
                                            <span>Tạm dừng</span>
                                        </a>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('discountCode.edit', $discountCode) }}" 
                                       class="btn-action btn-edit" 
                                       title="Chỉnh sửa">
                                        <i class="ti ti-edit"></i>
                                        <span>Sửa</span>
                                    </a>
                                    <button type="button" 
                                            class="btn-action btn-delete delete-discountCode" 
                                            data-id_discountCode="{{ $discountCode->id }}"
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
                                        <i class="ti ti-ticket-off"></i>
                                    </div>
                                    <h5>Không có mã giảm giá nào</h5>
                                    <p>Hãy thêm mã giảm giá đầu tiên cho khách hàng</p>
                                    <a href="{{ route('discountCode.create') }}" class="btn btn-add">
                                        <i class="ti ti-plus"></i>
                                        Thêm mã giảm giá
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($discountCodes->hasPages())
            <div class="pagination-wrapper">
                <div class="pagination-info">
                    <span>Hiển thị {{ $discountCodes->firstItem() }} - {{ $discountCodes->lastItem() }} trong tổng số {{ $discountCodes->total() }}</span>
                </div>
                <div class="pagination-links">
                    {{ $discountCodes->appends(request()->query())->links() }}
                </div>
            </div>
        @endif
    </div>
</div>

<style>
/* Discount Code Page Styles */
.discount-code-page {
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
    color: #3b82f6;
}

.breadcrumb-modern .active {
    color: #1f2937;
    font-weight: 500;
}

.btn-add {
    background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);
    color: white;
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 0.5rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
    box-shadow: 0 4px 6px -1px rgba(139, 92, 246, 0.3);
    text-decoration: none;
}

.btn-add:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 15px -3px rgba(139, 92, 246, 0.4);
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
    background: linear-gradient(135deg, #8b5cf6, #7c3aed);
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
    background: #ede9fe;
    color: #8b5cf6;
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
    border-color: #8b5cf6;
    box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.1);
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
    background: #8b5cf6;
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
    background: #7c3aed;
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
    background: #ede9fe;
    color: #8b5cf6;
    padding: 0.25rem 0.625rem;
    border-radius: 0.375rem;
    font-weight: 600;
    font-size: 0.875rem;
}

/* Code Info Specific Styles */
.code-info {
    display: flex;
    align-items: center;
}

.code-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: linear-gradient(135deg, #ede9fe, #ddd6fe);
    color: #7c3aed;
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    font-weight: 700;
    font-size: 0.875rem;
    font-family: 'Courier New', monospace;
    border: 2px dashed #8b5cf6;
}

.code-badge i {
    font-size: 1rem;
}

/* Discount Info */
.discount-info {
    display: flex;
    align-items: center;
}

.discount-title {
    font-size: 0.9375rem;
    font-weight: 600;
    color: #1f2937;
    margin: 0;
}

/* Description */
.description-content {
    font-size: 0.875rem;
    color: #4b5563;
    line-height: 1.6;
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

/* Responsive */
@media (max-width: 1024px) {
    .search-input {
        width: 250px;
    }
}

@media (max-width: 768px) {
    .discount-code-page {
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

// Delete discount code with SweetAlert2
$(document).ready(function() {
    $(document).on('click', '.delete-discountCode', function(e) {
        e.preventDefault();
        e.stopPropagation();
        
        const discountCodeId = $(this).data('id_discountcode');
        
        if (!discountCodeId) {
            SwalHelper.error('Lỗi!', 'Không tìm thấy ID mã giảm giá');
            return;
        }
        
        Swal.fire({
            title: 'Xác nhận xóa?',
            html: '<p style="margin-bottom: 1rem;">Bạn có chắc chắn muốn xóa mã giảm giá này?</p><p style="color: #dc2626; font-size: 0.875rem;"><i class="ti ti-alert-triangle"></i> Hành động này không thể hoàn tác!</p>',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#6b7280',
            confirmButtonText: '<i class="ti ti-trash"></i> Xóa mã giảm giá',
            cancelButtonText: '<i class="ti ti-x"></i> Hủy bỏ',
            reverseButtons: true,
            customClass: {
                confirmButton: 'swal-btn-danger',
                cancelButton: 'swal-btn-secondary'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                SwalHelper.loading('Đang xóa mã giảm giá...', 'Vui lòng đợi trong giây lát');
                
                $.ajax({
                    url: '{{ route("discountCode.destroy") }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        discountCode_id: discountCodeId
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Đã xóa!',
                                text: response.message || 'Mã giảm giá đã được xóa thành công',
                                confirmButtonColor: '#22c55e',
                                confirmButtonText: 'OK',
                                timer: 3000,
                                timerProgressBar: true
                            }).then(() => {
                                location.reload();
                            });
                        } else {
                            SwalHelper.error('Lỗi!', response.error || 'Có lỗi xảy ra khi xóa mã giảm giá');
                        }
                    },
                    error: function(xhr) {
                        console.error('AJAX Error:', xhr);
                        let errorMsg = 'Có lỗi xảy ra khi xóa mã giảm giá';
                        
                        if (xhr.status === 403) {
                            errorMsg = 'Bạn không có quyền xóa mã giảm giá này';
                        } else if (xhr.status === 404) {
                            errorMsg = 'Không tìm thấy mã giảm giá';
                        } else if (xhr.status === 409) {
                            errorMsg = 'Không thể xóa mã giảm giá vì đang được sử dụng trong đơn hàng';
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
