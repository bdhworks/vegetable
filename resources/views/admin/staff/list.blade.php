@extends('admin.layout.be')

@section('title_one')
Nhân viên
@endsection
@section('title_two')
Quản lý người dùng / Nhân viên
@endsection

@section('content')
<div class="staff-page">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <div class="header-left">
                <h1 class="page-title">
                    <i class="ti ti-user-tie"></i>
                    Quản lý Nhân Viên
                </h1>
                <nav class="breadcrumb-modern">
                    <ol>
                        <li><a href="{{ route('admin.dashboard') }}"><i class="ti ti-home"></i>Dashboard</a></li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li>Quản lý người dùng</li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li class="active">Nhân viên</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card stat-primary">
            <div class="stat-icon">
                <i class="ti ti-users"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Tổng Nhân Viên</span>
                <h3 class="stat-value">{{ $staffs->total() }}</h3>
            </div>
        </div>
        <div class="stat-card stat-success">
            <div class="stat-icon">
                <i class="ti ti-user-check"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Đang Hoạt Động</span>
                <h3 class="stat-value">{{ $staffs->count() }}</h3>
            </div>
        </div>
        <div class="stat-card stat-info">
            <div class="stat-icon">
                <i class="ti ti-shield"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Quản Trị Viên</span>
                <h3 class="stat-value">{{ $staffs->where('group_id', 1)->count() }}</h3>
            </div>
        </div>
        <div class="stat-card stat-warning">
            <div class="stat-icon">
                <i class="ti ti-calendar-plus"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Mới Tháng Này</span>
                <h3 class="stat-value">{{ $staffs->where('created_at', '>=', now()->startOfMonth())->count() }}</h3>
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
                    Danh sách Nhân Viên
                </h3>
                <span class="toolbar-badge">{{ $staffs->total() }} nhân viên</span>
            </div>
            <div class="toolbar-right">
                <form class="search-form" method="GET">
                    <div class="search-input-group">
                        <i class="ti ti-search search-icon"></i>
                        <input type="text" 
                               name="name" 
                               value="{{ request('name') }}" 
                               placeholder="Tìm kiếm tên nhân viên..." 
                               class="search-input">
                        <button type="submit" class="btn-search">
                            <i class="ti ti-search"></i>
                            Tìm kiếm
                        </button>
                        @if(request('name'))
                            <a href="{{ route('staff.index') }}" class="btn-clear">
                                <i class="ti ti-x"></i>
                            </a>
                        @endif
                    </div>
                </form>
                <a href="{{ route('staff.create') }}" class="btn-add">
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
                        <th style="width: 25%;">
                            <div class="th-content">
                                <i class="ti ti-user"></i>
                                <span>Họ Tên</span>
                            </div>
                        </th>
                        <th style="width: 20%;">
                            <div class="th-content">
                                <i class="ti ti-mail"></i>
                                <span>Email</span>
                            </div>
                        </th>
                        <th style="width: 15%;" class="text-center">
                            <div class="th-content">
                                <i class="ti ti-shield"></i>
                                <span>Chức Vụ</span>
                            </div>
                        </th>
                        <th style="width: 15%;" class="text-center">
                            <div class="th-content">
                                <i class="ti ti-calendar"></i>
                                <span>Ngày Tạo</span>
                            </div>
                        </th>
                        <th style="width: 200px;" class="text-center">
                            <div class="th-content">
                                <i class="ti ti-settings"></i>
                                <span>Thao Tác</span>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($staffs as $staff)
                        <tr class="data-row">
                            <td>
                                <div class="staff-id-badge">
                                    <i class="ti ti-user-circle"></i>
                                    <span>{{ $staff->id }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="staff-info">
                                    <div class="staff-avatar">
                                        <i class="ti ti-user"></i>
                                    </div>
                                    <div class="staff-details">
                                        <span class="staff-name">{{ $staff->name }}</span>
                                        <span class="staff-meta">{{ $staff->created_at ? $staff->created_at->diffForHumans() : 'N/A' }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="email-info">
                                    <i class="ti ti-mail"></i>
                                    <span>{{ $staff->email }}</span>
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="role-badge {{ $staff->group_id == 1 ? 'admin' : 'staff' }}">
                                    <i class="ti ti-{{ $staff->group_id == 1 ? 'crown' : 'user-check' }}"></i>
                                    <span>{{ $staff->group->name }}</span>
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="date-info">
                                    <span class="date-day">{{ date_format($staff->created_at, 'd/m/Y') }}</span>
                                    <span class="date-time">{{ date_format($staff->created_at, 'H:i') }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('staff.edit', $staff) }}" 
                                       class="btn-action btn-edit" 
                                       title="Chỉnh sửa">
                                        <i class="ti ti-edit"></i>
                                        <span>Sửa</span>
                                    </a>
                                    @if ($staff->group_id != 1)
                                        <button type="button" 
                                                data-id_staff="{{ $staff->id }}" 
                                                class="btn-action btn-delete delete-staff" 
                                                title="Xóa">
                                            <i class="ti ti-trash"></i>
                                            <span>Xóa</span>
                                        </button>
                                    @else
                                        <span class="protected-badge" title="Không thể xóa quản trị viên">
                                            <i class="ti ti-lock"></i>
                                        </span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                <div class="empty-state">
                                    <div class="empty-icon">
                                        <i class="ti ti-user-off"></i>
                                    </div>
                                    <h5>Không có nhân viên nào</h5>
                                    <p>Chưa có nhân viên nào trong hệ thống</p>
                                    <a href="{{ route('staff.create') }}" class="btn-add">
                                        <i class="ti ti-plus"></i>
                                        Thêm nhân viên mới
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($staffs->hasPages())
            <div class="pagination-wrapper">
                <div class="pagination-info">
                    <span>Hiển thị {{ $staffs->firstItem() }} - {{ $staffs->lastItem() }} trong tổng số {{ $staffs->total() }}</span>
                </div>
                <div class="pagination-links">
                    {{ $staffs->appends(request()->query())->links() }}
                </div>
            </div>
        @endif
    </div>
</div>

<style>
/* Staff Page Specific Styles Only - No Duplicates */
.staff-page {
    padding: 1.5rem;
    background: #f5f7fa;
    min-height: 100vh;
}

/* Staff Specific Elements */
.staff-id-badge {
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

.staff-info {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.staff-avatar {
    width: 45px;
    height: 45px;
    background: linear-gradient(135deg, #3b82f6, #2563eb);
    border-radius: 0.75rem;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.25rem;
    flex-shrink: 0;
}

.staff-details {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
}

.staff-name {
    font-size: 0.9375rem;
    font-weight: 600;
    color: #1f2937;
}

.staff-meta {
    font-size: 0.8125rem;
    color: #6b7280;
}

.email-info {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.875rem;
    color: #4b5563;
}

.email-info i {
    color: #3b82f6;
    font-size: 1rem;
}

.role-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    font-weight: 600;
    font-size: 0.875rem;
}

.role-badge.admin {
    background: linear-gradient(135deg, #fef3c7, #fde68a);
    color: #92400e;
    border: 2px solid #fbbf24;
}

.role-badge.staff {
    background: linear-gradient(135deg, #dbeafe, #bfdbfe);
    color: #1e40af;
    border: 2px solid #60a5fa;
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

.protected-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    background: #f3f4f6;
    color: #9ca3af;
    border-radius: 0.5rem;
    font-size: 1rem;
    cursor: not-allowed;
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
    .staff-page {
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
    
    .staff-info {
        flex-direction: column;
        align-items: flex-start;
    }
}
</style>

<script>
// Delete staff with SweetAlert
$(document).on('click', '.delete-staff', function() {
    const staffId = $(this).data('id_staff');
    
    SwalHelper.confirmDelete(
        '<p style="margin-bottom: 1rem;">Bạn có chắc chắn muốn xóa nhân viên này?</p><p style="color: #dc2626; font-size: 0.875rem;">⚠️ Hành động này không thể hoàn tác!</p>',
        function() {
            SwalHelper.loading();
            
            $.ajax({
                url: '{{ route("staff.destroy") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    staff_id: staffId
                },
                success: function(response) {
                    if (response.success) {
                        SwalHelper.success('Đã xóa!', response.message, function() {
                            location.reload();
                        });
                    } else {
                        SwalHelper.error('Lỗi!', response.error || 'Có lỗi xảy ra khi xóa nhân viên');
                    }
                },
                error: function(xhr) {
                    SwalHelper.error('Lỗi!', 'Có lỗi xảy ra khi xóa nhân viên');
                }
            });
        }
    );
});
</script>

@endsection
