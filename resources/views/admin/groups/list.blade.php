@extends('admin.layout.be')

@section('content')
<div class="groups-page">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <div class="header-left">
                <h1 class="page-title">
                    <i class="ti ti-shield"></i>
                    Quản lý Nhóm Người Dùng
                </h1>
                <nav class="breadcrumb-modern">
                    <ol>
                        <li><a href="{{ route('admin.dashboard') }}"><i class="ti ti-home"></i>Dashboard</a></li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li>Quản lý người dùng</li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li class="active">Phân quyền</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card stat-primary">
            <div class="stat-icon">
                <i class="ti ti-users-group"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Tổng Nhóm</span>
                <h3 class="stat-value">{{ $groups->total() }}</h3>
            </div>
        </div>
        <div class="stat-card stat-success">
            <div class="stat-icon">
                <i class="ti ti-shield-check"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Đã Phân Quyền</span>
                <h3 class="stat-value">{{ $groups->count() }}</h3>
            </div>
        </div>
        <div class="stat-card stat-info">
            <div class="stat-icon">
                <i class="ti ti-user"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Người Dùng</span>
                <h3 class="stat-value">{{ $groups->sum(function($g) { return $g->admins->count(); }) }}</h3>
            </div>
        </div>
        <div class="stat-card stat-warning">
            <div class="stat-icon">
                <i class="ti ti-settings"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Module</span>
                <h3 class="stat-value">{{ \App\Models\Module::count() }}</h3>
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
                    Danh sách Nhóm
                </h3>
                <span class="toolbar-badge">{{ $groups->total() }} nhóm</span>
            </div>
            <div class="toolbar-right">
                <form class="search-form" method="GET">
                    <div class="search-input-group">
                        <i class="ti ti-search search-icon"></i>
                        <input type="text" 
                               name="name" 
                               value="{{ request('name') }}" 
                               placeholder="Tìm kiếm tên nhóm..." 
                               class="search-input">
                        <button type="submit" class="btn-search">
                            <i class="ti ti-search"></i>
                            Tìm kiếm
                        </button>
                        @if(request('name'))
                            <a href="{{ route('group.index') }}" class="btn-clear">
                                <i class="ti ti-x"></i>
                            </a>
                        @endif
                    </div>
                </form>
                <a href="{{ route('group.create') }}" class="btn-add">
                    <i class="ti ti-plus"></i>
                    <span>Thêm mới</span>
                </a>
            </div>
        </div>

        <!-- Table -->
        <div class="table-container">
            <table class="data-table">
                <thead>
                    <tr>
                        <th style="width: 80px;">
                            <div class="th-content">
                                <i class="ti ti-hash"></i>
                                <span>ID</span>
                            </div>
                        </th>
                        <th style="width: 30%;">
                            <div class="th-content">
                                <i class="ti ti-users-group"></i>
                                <span>Tên Nhóm</span>
                            </div>
                        </th>
                        <th style="width: 20%;" class="text-center">
                            <div class="th-content">
                                <i class="ti ti-users"></i>
                                <span>Số Thành Viên</span>
                            </div>
                        </th>
                        {{-- <th style="width: 15%;" class="text-center">
                            <div class="th-content">
                                <i class="ti ti-calendar"></i>
                                <span>Ngày tạo</span>
                            </div>
                        </th> --}}
                        <th style="width: 15%;" class="text-center">
                            <div class="th-content">
                                <i class="ti ti-shield-check"></i>
                                <span>Phân quyền</span>
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
                    @forelse($groups as $group)
                        <tr class="data-row">
                            <td>
                                <div class="group-id-badge">
                                    <i class="ti ti-shield"></i>
                                    <span>{{ $group->id }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="group-name">
                                    <div class="group-icon">
                                        <i class="ti ti-users"></i>
                                    </div>
                                    <div class="group-info">
                                        <span class="name">{{ $group->name }}</span>
                                        <span class="created">{{ $group->created_at ? $group->created_at->diffForHumans() : 'N/A' }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="member-count">
                                    <i class="ti ti-users"></i>
                                    <span>{{ $group->admins ? $group->admins->count() : 0 }} thành viên</span>
                                </div>
                            </td>
                            {{-- <td class="text-center">
                                <div class="date-info">
                                    <span class="date-day">{{ $group->created_at ? date_format($group->created_at, 'd/m/Y') : 'N/A' }}</span>
                                    <span class="date-time">{{ $group->created_at ? date_format($group->created_at, 'H:i') : '' }}</span>
                                </div>
                            </td> --}}
                            <td class="text-center">
                                <a href="{{ route('group.permission', $group) }}" 
                                   class="btn-permission" 
                                   title="Phân quyền">
                                    <i class="ti ti-shield-check"></i>
                                    <span>Phân quyền</span>
                                </a>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('group.edit', $group) }}" 
                                       class="btn-action btn-edit" 
                                       title="Chỉnh sửa">
                                        <i class="ti ti-edit"></i>
                                        <span>Sửa</span>
                                    </a>
                                    <button type="button" 
                                            data-id_group="{{ $group->id }}" 
                                            class="btn-action btn-delete delete-group" 
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
                                        <i class="ti ti-shield-off"></i>
                                    </div>
                                    <h5>Không có nhóm nào</h5>
                                    <p>Chưa có nhóm người dùng nào trong hệ thống</p>
                                    <a href="{{ route('group.create') }}" class="btn-add">
                                        <i class="ti ti-plus"></i>
                                        Thêm nhóm mới
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($groups->hasPages())
            <div class="pagination-wrapper">
                <div class="pagination-info">
                    <span>Hiển thị {{ $groups->firstItem() }} - {{ $groups->lastItem() }} trong tổng số {{ $groups->total() }}</span>
                </div>
                <div class="pagination-links">
                    {{ $groups->appends(request()->query())->links() }}
                </div>
            </div>
        @endif
    </div>
</div>

<style>
/* Groups Page Specific Styles - No Duplicates from Layout */
.groups-page {
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

/* Stats Grid */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.25rem;
    margin-bottom: 1.5rem;
}

.stat-card {
    background: white;
    border-radius: var(--radius-md);
    padding: 1.5rem;
    display: flex;
    align-items: center;
    gap: 1rem;
    box-shadow: var(--shadow-sm);
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.stat-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
}

.stat-card.stat-primary {
    border-color: #8b5cf6;
}

.stat-card.stat-primary:hover {
    box-shadow: 0 8px 25px rgba(139, 92, 246, 0.3);
}

.stat-card.stat-success {
    border-color: var(--primary-color);
}

.stat-card.stat-success:hover {
    box-shadow: 0 8px 25px rgba(34, 197, 94, 0.3);
}

.stat-card.stat-info {
    border-color: #3b82f6;
}

.stat-card.stat-info:hover {
    box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
}

.stat-card.stat-warning {
    border-color: #f59e0b;
}

.stat-card.stat-warning:hover {
    box-shadow: 0 8px 25px rgba(245, 158, 11, 0.3);
}

.stat-icon {
    width: 60px;
    height: 60px;
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.75rem;
    color: white;
    flex-shrink: 0;
}

.stat-primary .stat-icon {
    background: linear-gradient(135deg, #8b5cf6, #7c3aed);
}

.stat-success .stat-icon {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
}

.stat-info .stat-icon {
    background: linear-gradient(135deg, #3b82f6, #2563eb);
}

.stat-warning .stat-icon {
    background: linear-gradient(135deg, #f59e0b, #d97706);
}

.stat-content {
    flex: 1;
}

.stat-label {
    display: block;
    font-size: 0.875rem;
    color: var(--text-secondary);
    margin-bottom: 0.25rem;
    font-weight: 500;
}

.stat-value {
    font-size: 1.75rem;
    font-weight: 700;
    color: var(--text-primary);
    margin: 0;
}

/* Content Card */
.content-card {
    background: white;
    border-radius: var(--radius-md);
    box-shadow: var(--shadow-sm);
    overflow: hidden;
}

/* Card Toolbar */
.card-toolbar {
    padding: 1.5rem;
    border-bottom: 2px solid var(--border-color);
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
    background: linear-gradient(135deg, #faf5ff, #f5f3ff);
}

.toolbar-left {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.toolbar-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--text-primary);
    margin: 0;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.toolbar-title i {
    color: #8b5cf6;
}

.toolbar-badge {
    background: linear-gradient(135deg, #ddd6fe, #c4b5fd);
    color: #6d28d9;
    padding: 0.375rem 0.875rem;
    border-radius: var(--radius-sm);
    font-size: 0.875rem;
    font-weight: 700;
    border: 2px solid #a78bfa;
}

.toolbar-right {
    display: flex;
    align-items: center;
    gap: 1rem;
}

/* Search Form */
.search-form {
    display: flex;
}

.search-input-group {
    display: flex;
    align-items: center;
    background: white;
    border: 2px solid var(--border-color);
    border-radius: var(--radius-sm);
    overflow: hidden;
    transition: all 0.3s ease;
}

.search-input-group:focus-within {
    border-color: #8b5cf6;
    box-shadow: 0 0 0 4px rgba(139, 92, 246, 0.1);
}

.search-icon {
    padding: 0 0.875rem;
    color: var(--text-secondary);
    font-size: 1.125rem;
}

.search-input {
    border: none;
    padding: 0.75rem 0.5rem;
    font-size: 0.9375rem;
    color: var(--text-primary);
    outline: none;
    min-width: 250px;
    background: transparent;
}

.search-input::placeholder {
    color: var(--text-secondary);
}

.btn-search {
    background: linear-gradient(135deg, #8b5cf6, #7c3aed);
    color: white;
    border: none;
    padding: 0.75rem 1.25rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.9375rem;
}

.btn-search:hover {
    background: linear-gradient(135deg, #7c3aed, #6d28d9);
}

.btn-clear {
    background: #fee2e2;
    color: #991b1b;
    border: none;
    padding: 0.75rem;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
}

.btn-clear:hover {
    background: #ef4444;
    color: white;
}

.btn-add {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    color: white;
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: var(--radius-sm);
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    text-decoration: none;
    font-size: 0.9375rem;
    box-shadow: var(--shadow-sm);
}

.btn-add:hover {
    background: linear-gradient(135deg, var(--primary-dark), #15803d);
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
    color: white;
}

/* Table */
.table-container {
    overflow-x: auto;
}

.data-table {
    width: 100%;
    border-collapse: collapse;
}

.data-table thead {
    background: linear-gradient(135deg, #faf5ff, #f5f3ff);
    border-bottom: 2px solid #e9d5ff;
}

.data-table th {
    padding: 1rem 1.25rem;
    text-align: left;
    font-weight: 700;
    font-size: 0.875rem;
    color: #6d28d9;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.th-content {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.data-table tbody tr {
    border-bottom: 1px solid var(--border-color);
    transition: all 0.2s ease;
}

.data-table tbody tr:hover {
    background: linear-gradient(135deg, #faf5ff, #f9fafb);
}

.data-table td {
    padding: 1rem 1.25rem;
    font-size: 0.9375rem;
    color: var(--text-primary);
}

/* Group Specific Elements */
.group-id-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: linear-gradient(135deg, #ede9fe, #ddd6fe);
    color: #6b21a8;
    padding: 0.5rem 0.875rem;
    border-radius: var(--radius-sm);
    font-weight: 700;
    font-size: 0.875rem;
    font-family: 'Courier New', monospace;
    border: 2px solid #a78bfa;
}

.group-name {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.group-icon {
    width: 42px;
    height: 42px;
    background: linear-gradient(135deg, #8b5cf6, #7c3aed);
    border-radius: var(--radius-sm);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.125rem;
    flex-shrink: 0;
}

.group-info {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
}

.group-info .name {
    font-size: 0.9375rem;
    font-weight: 600;
    color: var(--text-primary);
}

.group-info .created {
    font-size: 0.8125rem;
    color: var(--text-secondary);
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

.member-count {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: linear-gradient(135deg, #dbeafe, #bfdbfe);
    color: #1e40af;
    padding: 0.5rem 1rem;
    border-radius: var(--radius-sm);
    font-weight: 600;
    font-size: 0.875rem;
    border: 2px solid #60a5fa;
}

.member-count i {
    font-size: 1rem;
}

.date-info {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
    align-items: center;
}

.date-day {
    font-size: 0.9375rem;
    font-weight: 600;
    color: var(--text-primary);
}

.date-time {
    font-size: 0.8125rem;
    color: var(--text-secondary);
}

/* Permission Button */
.btn-permission {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: linear-gradient(135deg, #d1fae5, #a7f3d0);
    color: #065f46;
    padding: 0.5rem 1rem;
    border-radius: var(--radius-sm);
    font-weight: 600;
    font-size: 0.875rem;
    transition: all 0.3s ease;
    text-decoration: none;
    border: 2px solid #6ee7b7;
}

.btn-permission:hover {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    color: white;
    transform: translateY(-2px);
    box-shadow: var(--shadow-sm);
}

/* Action Buttons */
.action-buttons {
    display: flex;
    gap: 0.5rem;
    justify-content: center;
}

.btn-action {
    padding: 0.5rem 1rem;
    border-radius: var(--radius-sm);
    font-weight: 600;
    font-size: 0.875rem;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.375rem;
    border: 2px solid transparent;
    text-decoration: none;
    background: transparent;
}

.btn-action i {
    font-size: 1rem;
}

.btn-edit {
    background: linear-gradient(135deg, #dbeafe, #bfdbfe);
    color: #1e40af;
    border-color: #60a5fa;
}

.btn-edit:hover {
    background: linear-gradient(135deg, #3b82f6, #2563eb);
    color: white;
    transform: translateY(-2px);
    box-shadow: var(--shadow-sm);
}

.btn-delete {
    background: linear-gradient(135deg, #fee2e2, #fecaca);
    color: #991b1b;
    border-color: #fca5a5;
    cursor: pointer !important;
}

.btn-delete:hover {
    background: linear-gradient(135deg, #ef4444, #dc2626);
    color: white;
    transform: translateY(-2px);
    box-shadow: var(--shadow-sm);
}

/* Empty State */
.empty-state {
    padding: 3rem 1.5rem;
    text-align: center;
}

.empty-icon {
    font-size: 4rem;
    color: #d1d5db;
    margin-bottom: 1rem;
}

.empty-state h5 {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 0.5rem;
}

.empty-state p {
    color: var(--text-secondary);
    margin-bottom: 1.5rem;
}

/* Pagination */
.pagination-wrapper {
    padding: 1.5rem;
    border-top: 2px solid var(--border-color);
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
    background: #fafafa;
}

.pagination-info {
    font-size: 0.875rem;
    color: var(--text-secondary);
    font-weight: 500;
}

.pagination-links {
    display: flex;
    gap: 0.5rem;
}

/* Text Center Utility */
.text-center {
    text-align: center;
}

/* Responsive */
@media (max-width: 768px) {
    .groups-page {
        padding: 1rem;
    }
    
    .page-title {
        font-size: 1.5rem;
    }
    
    .stats-grid {
        grid-template-columns: 1fr;
    }
    
    .card-toolbar {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .toolbar-right {
        width: 100%;
        flex-direction: column;
    }
    
    .search-form {
        width: 100%;
    }
    
    .search-input {
        min-width: auto;
        flex: 1;
    }
    
    .btn-add {
        width: 100%;
        justify-content: center;
    }
    
    .table-container {
        overflow-x: scroll;
    }
    
    .action-buttons {
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .btn-action,
    .btn-permission {
        width: 100%;
        justify-content: center;
    }
    
    .group-name {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .pagination-wrapper {
        flex-direction: column;
        text-align: center;
    }
}
</style>

<script>
// Delete group with SweetAlert
$(document).ready(function() {
    $(document).on('click', '.delete-group', function(e) {
        e.preventDefault();
        e.stopPropagation();
        
        const groupId = $(this).data('id_group');
        
        if (!groupId) {
            SwalHelper.error('Lỗi!', 'Không tìm thấy ID nhóm');
            return;
        }
        
        Swal.fire({
            title: 'Xác nhận xóa?',
            html: '<p style="margin-bottom: 1rem;">Bạn có chắc chắn muốn xóa nhóm này?</p><p style="color: #dc2626; font-size: 0.875rem;">⚠️ Hành động này không thể hoàn tác!</p>',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#6b7280',
            confirmButtonText: '<i class="ti ti-trash"></i> Xóa',
            cancelButtonText: '<i class="ti ti-x"></i> Hủy',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                SwalHelper.loading('Đang xóa...', 'Vui lòng đợi');
                
                $.ajax({
                    url: '{{ route("group.destroy") }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        group_id: groupId
                    },
                    success: function(response) {
                        if (response.success) {
                            SwalHelper.success('Đã xóa!', response.message, function() {
                                location.reload();
                            });
                        } else {
                            SwalHelper.error('Lỗi!', response.error || 'Có lỗi xảy ra khi xóa nhóm');
                        }
                    },
                    error: function(xhr) {
                        console.error('AJAX Error:', xhr);
                        const errorMsg = xhr.responseJSON?.message || 'Có lỗi xảy ra khi xóa nhóm';
                        SwalHelper.error('Lỗi!', errorMsg);
                    }
                });
            }
        });
    });
});
</script>

@endsection