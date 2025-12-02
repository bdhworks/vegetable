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
/* Groups Page Specific Styles Only - No Duplicates */
.groups-page {
    padding: 1.5rem;
    background: #f5f7fa;
    min-height: 100vh;
}

/* Group Specific Elements */
.group-id-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: linear-gradient(135deg, #ede9fe, #ddd6fe);
    color: #6b21a8;
    padding: 0.5rem 0.875rem;
    border-radius: 0.5rem;
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
    border-radius: 0.5rem;
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
    color: #1f2937;
}

.group-info .created {
    font-size: 0.8125rem;
    color: #6b7280;
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
    border-radius: 0.5rem;
    font-weight: 600;
    font-size: 0.875rem;
}

.member-count i {
    font-size: 1rem;
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

/* Permission Button */
.btn-permission {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: linear-gradient(135deg, #d1fae5, #a7f3d0);
    color: #065f46;
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    font-weight: 600;
    font-size: 0.875rem;
    transition: all 0.3s ease;
    text-decoration: none;
    border: 2px solid transparent;
}

.btn-permission:hover {
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
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
    .groups-page {
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
    
    .btn-action,
    .btn-permission {
        width: 100%;
        justify-content: center;
    }
    
    .group-name {
        flex-direction: column;
        align-items: flex-start;
    }
}
</style>

<script>
// Delete group with SweetAlert
$(document).on('click', '.delete-group', function() {
    const groupId = $(this).data('id_group');
    
    SwalHelper.confirmDelete(
        '<p style="margin-bottom: 1rem;">Bạn có chắc chắn muốn xóa nhóm này?</p><p style="color: #dc2626; font-size: 0.875rem;">⚠️ Hành động này không thể hoàn tác!</p>',
        function() {
            SwalHelper.loading();
            
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
                    SwalHelper.error('Lỗi!', 'Có lỗi xảy ra khi xóa nhóm');
                }
            });
        }
    );
});
</script>

@endsection