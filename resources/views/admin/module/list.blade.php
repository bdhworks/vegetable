@extends('admin.layout.be')

@section('title_one')
Module
@endsection
@section('title_two')
Quản lý người dùng / Module
@endsection

@section('content')
<div class="module-page">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <div class="header-left">
                <h1 class="page-title">
                    <i class="ti ti-puzzle"></i>
                    Quản lý Module
                </h1>
                <nav class="breadcrumb-modern">
                    <ol>
                        <li><a href="{{ route('admin.dashboard') }}"><i class="ti ti-home"></i>Dashboard</a></li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li>Quản lý người dùng</li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li class="active">Module</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card stat-primary">
            <div class="stat-icon">
                <i class="ti ti-puzzle"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Tổng Module</span>
                <h3 class="stat-value">{{ $modules->total() }}</h3>
            </div>
        </div>
        <div class="stat-card stat-success">
            <div class="stat-icon">
                <i class="ti ti-check-circle"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Module Hệ thống</span>
                <h3 class="stat-value">{{ $modules->count() }}</h3>
            </div>
        </div>
        <div class="stat-card stat-info">
            <div class="stat-icon">
                <i class="ti ti-code"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Đang hoạt động</span>
                <h3 class="stat-value">{{ $modules->count() }}</h3>
            </div>
        </div>
        <div class="stat-card stat-warning">
            <div class="stat-icon">
                <i class="ti ti-settings"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Cấu hình</span>
                <h3 class="stat-value">{{ $modules->count() }}</h3>
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
                    Danh sách Module
                </h3>
                <span class="toolbar-badge">{{ $modules->total() }} module</span>
            </div>
            <div class="toolbar-right">
                <form class="search-form" method="GET">
                    <div class="search-input-group">
                        <i class="ti ti-search search-icon"></i>
                        <input type="text" 
                               name="name" 
                               value="{{ request('name') }}" 
                               placeholder="Tìm kiếm tên module..." 
                               class="search-input">
                        <button type="submit" class="btn-search">
                            <i class="ti ti-search"></i>
                            Tìm kiếm
                        </button>
                        @if(request('name'))
                            <a href="{{ route('module.index') }}" class="btn-clear">
                                <i class="ti ti-x"></i>
                            </a>
                        @endif
                    </div>
                </form>
                <a href="{{ route('module.create') }}" class="btn-add">
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
                                <i class="ti ti-code"></i>
                                <span>Tên Module</span>
                            </div>
                        </th>
                        <th style="width: 40%;">
                            <div class="th-content">
                                <i class="ti ti-file-text"></i>
                                <span>Tiêu đề</span>
                            </div>
                        </th>
                        <th style="width: 15%;" class="text-center">
                            <div class="th-content">
                                <i class="ti ti-calendar"></i>
                                <span>Ngày tạo</span>
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
                    @forelse($modules as $module)
                        <tr class="data-row">
                            <td>
                                <div class="module-id-badge">
                                    <i class="ti ti-puzzle"></i>
                                    <span>{{ $module->id }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="module-name">
                                    <i class="ti ti-code"></i>
                                    <span>{{ $module->name }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="module-title">
                                    {{ $module->title }}
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="date-info">
                                    <span class="date-day">{{ $module->created_at ? date_format($module->created_at, 'd/m/Y') : 'N/A' }}</span>
                                    <span class="date-time">{{ $module->created_at ? date_format($module->created_at, 'H:i') : '' }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('module.edit', $module->id) }}" 
                                       class="btn-action btn-edit" 
                                       title="Chỉnh sửa">
                                        <i class="ti ti-edit"></i>
                                        <span>Sửa</span>
                                    </a>
                                    <button type="button" 
                                            data-id_module="{{ $module->id }}" 
                                            class="btn-action btn-delete delete-module" 
                                            title="Xóa">
                                        <i class="ti ti-trash"></i>
                                        <span>Xóa</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">
                                <div class="empty-state">
                                    <div class="empty-icon">
                                        <i class="ti ti-puzzle-off"></i>
                                    </div>
                                    <h5>Không có module nào</h5>
                                    <p>Chưa có module nào trong hệ thống</p>
                                    <a href="{{ route('module.create') }}" class="btn-add">
                                        <i class="ti ti-plus"></i>
                                        Thêm module mới
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($modules->hasPages())
            <div class="pagination-wrapper">
                <div class="pagination-info">
                    <span>Hiển thị {{ $modules->firstItem() }} - {{ $modules->lastItem() }} trong tổng số {{ $modules->total() }}</span>
                </div>
                <div class="pagination-links">
                    {{ $modules->appends(request()->query())->links() }}
                </div>
            </div>
        @endif
    </div>
</div>

<style>
/* Module Page Specific Styles Only - No Duplicates */
.module-page {
    padding: 1.5rem;
    background: #f5f7fa;
    min-height: 100vh;
}

/* Module Specific Elements */
.module-id-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: linear-gradient(135deg, #dbeafe, #bfdbfe);
    color: #1e40af;
    padding: 0.5rem 0.875rem;
    border-radius: 0.5rem;
    font-weight: 700;
    font-size: 0.875rem;
    font-family: 'Courier New', monospace;
    border: 2px solid #60a5fa;
}

.module-name {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.9375rem;
    font-weight: 600;
    color: #1f2937;
    font-family: 'Courier New', monospace;
}

.module-name i {
    color: #8b5cf6;
}

.module-title {
    font-size: 0.9375rem;
    color: #4b5563;
    font-weight: 500;
}

.date-info {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
}

.date-day {
    font-size: 0.9375rem;
    font-weight: 600;
    color: #1f2937;
}

.date-time {
    font-size: 0.8125rem;
    color: #6b7280;
}

/* Add Button */
.btn-add {
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 0.5rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    text-decoration: none;
    font-size: 0.9375rem;
}

.btn-add:hover {
    background: linear-gradient(135deg, #059669, #047857);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
    color: white;
}

/* Edit & Delete Buttons */
.btn-edit {
    background: #dbeafe;
    color: #1e40af;
}

.btn-edit:hover {
    background: #3b82f6;
    color: white;
    transform: translateY(-2px);
}

.btn-delete {
    background: #fee2e2;
    color: #991b1b;
}

.btn-delete:hover {
    background: #ef4444;
    color: white;
    transform: translateY(-2px);
}

/* Responsive */
@media (max-width: 768px) {
    .module-page {
        padding: 1rem;
    }
    
    .stats-grid {
        grid-template-columns: 1fr !important;
    }
    
    .card-toolbar {
        flex-direction: column !important;
        align-items: flex-start !important;
    }
    
    .toolbar-right {
        width: 100% !important;
        flex-direction: column !important;
        gap: 0.75rem;
    }
    
    .search-form {
        width: 100%;
    }
    
    .btn-add {
        width: 100%;
        justify-content: center;
    }
    
    .action-buttons {
        flex-direction: column !important;
    }
    
    .btn-action {
        width: 100%;
        justify-content: center;
    }
    
    .module-name {
        flex-direction: column;
        align-items: flex-start;
    }
}
</style>

<script>
// Delete module with SweetAlert
$(document).on('click', '.delete-module', function() {
    const moduleId = $(this).data('id_module');
    
    SwalHelper.confirmDelete(
        '<p style="margin-bottom: 1rem;">Bạn có chắc chắn muốn xóa module này?</p><p style="color: #dc2626; font-size: 0.875rem;">⚠️ Hành động này không thể hoàn tác!</p>',
        function() {
            SwalHelper.loading();
            
            $.ajax({
                url: '{{ route("module.destroy") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    module_id: moduleId
                },
                success: function(response) {
                    if (response.success) {
                        SwalHelper.success('Đã xóa!', response.message, function() {
                            location.reload();
                        });
                    } else {
                        SwalHelper.error('Lỗi!', response.error || 'Có lỗi xảy ra khi xóa module');
                    }
                },
                error: function(xhr) {
                    SwalHelper.error('Lỗi!', 'Có lỗi xảy ra khi xóa module');
                }
            });
        }
    );
});
</script>

@endsection
