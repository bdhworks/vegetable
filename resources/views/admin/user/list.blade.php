@extends('admin.layout.be')

@section('title_one')
Khách hàng
@endsection
@section('title_two')
Quản lý người dùng / Khách hàng
@endsection

@section('content')
<div class="user-page">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <div class="header-left">
                <h1 class="page-title">
                    <i class="ti ti-users"></i>
                    Quản lý Khách Hàng
                </h1>
                <nav class="breadcrumb-modern">
                    <ol>
                        <li><a href="{{ route('admin.dashboard') }}"><i class="ti ti-home"></i>Dashboard</a></li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li>Quản lý người dùng</li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li class="active">Khách hàng</li>
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
                <span class="stat-label">Tổng Khách Hàng</span>
                <h3 class="stat-value">{{ $users->total() }}</h3>
            </div>
        </div>
        <div class="stat-card stat-success">
            <div class="stat-icon">
                <i class="ti ti-user-check"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Đang Hoạt Động</span>
                <h3 class="stat-value">{{ $users->where('status', 1)->count() }}</h3>
            </div>
        </div>
        <div class="stat-card stat-warning">
            <div class="stat-icon">
                <i class="ti ti-user-off"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Bị Khóa</span>
                <h3 class="stat-value">{{ $users->where('status', 0)->count() }}</h3>
            </div>
        </div>
        <div class="stat-card stat-info">
            <div class="stat-icon">
                <i class="ti ti-calendar-plus"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Mới Tháng Này</span>
                <h3 class="stat-value">{{ $users->where('created_at', '>=', now()->startOfMonth())->count() }}</h3>
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
                    Danh sách Khách Hàng
                </h3>
                <span class="toolbar-badge">{{ $users->total() }} khách hàng</span>
            </div>
            <div class="toolbar-right">
                <form class="search-form" method="GET">
                    <div class="search-input-group">
                        <i class="ti ti-search search-icon"></i>
                        <input type="text" 
                               name="email" 
                               value="{{ request('email') }}" 
                               placeholder="Tìm kiếm theo email..." 
                               class="search-input">
                        <button type="submit" class="btn-search">
                            <i class="ti ti-search"></i>
                            Tìm kiếm
                        </button>
                        @if(request('email'))
                            <a href="{{ route('user.index') }}" class="btn-clear">
                                <i class="ti ti-x"></i>
                            </a>
                        @endif
                    </div>
                </form>
                <a href="{{ route('user.create') }}" class="btn-add">
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
                                <span>Khách Hàng</span>
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
                                <i class="ti ti-phone"></i>
                                <span>Số Điện Thoại</span>
                            </div>
                        </th>
                        <th style="width: 15%;" class="text-center">
                            <div class="th-content">
                                <i class="ti ti-map-pin"></i>
                                <span>Địa Chỉ</span>
                            </div>
                        </th>
                        <th style="width: 10%;" class="text-center">
                            <div class="th-content">
                                <i class="ti ti-toggle-right"></i>
                                <span>Trạng Thái</span>
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
                    @forelse($users as $user)
                        <tr class="data-row">
                            <td>
                                <div class="user-id-badge">
                                    <i class="ti ti-user-circle"></i>
                                    <span>{{ $user->id }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="user-info">
                                    <div class="user-avatar">
                                        <img src="{{ $user->avatar ?? asset('assets/frontend/img/no-avatar.png') }}" 
                                             alt="{{ $user->name }}">
                                        <div class="avatar-status {{ $user->status == 1 ? 'online' : 'offline' }}"></div>
                                    </div>
                                    <div class="user-details">
                                        <span class="user-name">{{ $user->name }}</span>
                                        <span class="user-meta">{{ $user->created_at ? $user->created_at->diffForHumans() : 'N/A' }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="email-info">
                                    <i class="ti ti-mail"></i>
                                    <span>{{ $user->email }}</span>
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="phone-info">
                                    <i class="ti ti-phone"></i>
                                    <span>{{ $user->phone ?? 'Chưa cập nhật' }}</span>
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="address-info">
                                    <i class="ti ti-map-pin"></i>
                                    <span>{{ Str::limit($user->address ?? 'Chưa cập nhật', 30) }}</span>
                                </div>
                            </td>
                            <td class="text-center">
                                @if ($user->status === 1)
                                    <div class="status-badge active">
                                        <i class="ti ti-circle-check"></i>
                                        <span>Hoạt động</span>
                                    </div>
                                @else
                                    <div class="status-badge locked">
                                        <i class="ti ti-lock"></i>
                                        <span>Bị khóa</span>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div class="action-buttons">
                                    @if ($user->status === 1)
                                        <a href="{{ route('user.status', $user) }}" 
                                           class="btn-action btn-lock" 
                                           title="Khóa tài khoản"
                                           onclick="return confirm('Bạn có chắc muốn khóa tài khoản này không?')">
                                            <i class="ti ti-lock"></i>
                                            <span>Khóa</span>
                                        </a>
                                    @else
                                        <a href="{{ route('user.status', $user) }}" 
                                           class="btn-action btn-unlock" 
                                           title="Mở khóa tài khoản"
                                           onclick="return confirm('Bạn có chắc muốn mở khóa tài khoản này không?')">
                                            <i class="ti ti-lock-open"></i>
                                            <span>Mở khóa</span>
                                        </a>
                                    @endif
                                    
                                    <a href="{{ route('user.edit', $user) }}" 
                                       class="btn-action btn-edit" 
                                       title="Chỉnh sửa">
                                        <i class="ti ti-edit"></i>
                                        <span>Sửa</span>
                                    </a>
                                    
                                    <button type="button" 
                                            data-id_user="{{ $user->id }}" 
                                            class="btn-action btn-delete delete-user" 
                                            title="Xóa">
                                        <i class="ti ti-trash"></i>
                                        <span>Xóa</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                <div class="empty-state">
                                    <div class="empty-icon">
                                        <i class="ti ti-user-off"></i>
                                    </div>
                                    <h5>Không có khách hàng nào</h5>
                                    <p>Chưa có khách hàng nào trong hệ thống</p>
                                    <a href="{{ route('user.create') }}" class="btn-add">
                                        <i class="ti ti-plus"></i>
                                        Thêm khách hàng mới
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($users->hasPages())
            <div class="pagination-wrapper">
                <div class="pagination-info">
                    <span>Hiển thị {{ $users->firstItem() }} - {{ $users->lastItem() }} trong tổng số {{ $users->total() }}</span>
                </div>
                <div class="pagination-links">
                    {{ $users->appends(request()->query())->links() }}
                </div>
            </div>
        @endif
    </div>
</div>

<style>
/* User Page Specific Styles Only - No Duplicates */
.user-page {
    padding: 1.5rem;
    background: #f5f7fa;
    min-height: 100vh;
}

/* Page Header Styles */
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

.header-left {
    display: flex;
    flex-direction: column;
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
    flex-shrink: 0;
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
    font-weight: 500;
}

.stat-value {
    font-size: 1.875rem;
    font-weight: 700;
    color: #1f2937;
    margin: 0;
    line-height: 1;
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
    color: #3b82f6;
    padding: 0.375rem 0.75rem;
    border-radius: 0.5rem;
    font-size: 0.875rem;
    font-weight: 600;
}

.toolbar-right {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
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
    width: 250px;
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

.text-center {
    text-align: center !important;
}

.text-center .th-content {
    justify-content: center;
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

/* Action Buttons */
.action-buttons {
    display: flex;
    gap: 0.5rem;
    justify-content: center;
    flex-wrap: wrap;
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

/* User Specific Elements */
.user-id-badge {
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

.user-info {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.user-avatar {
    position: relative;
    width: 50px;
    height: 50px;
    flex-shrink: 0;
}

.user-avatar img {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid #e5e7eb;
    transition: all 0.3s ease;
}

.data-row:hover .user-avatar img {
    border-color: #3b82f6;
    transform: scale(1.05);
}

.avatar-status {
    position: absolute;
    bottom: 2px;
    right: 2px;
    width: 14px;
    height: 14px;
    border-radius: 50%;
    border: 3px solid white;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

.avatar-status.online {
    background: #22c55e;
    animation: pulse-status 2s infinite;
}

.avatar-status.offline {
    background: #ef4444;
}

@keyframes pulse-status {
    0%, 100% {
        opacity: 1;
        box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.7);
    }
    50% {
        opacity: 0.8;
        box-shadow: 0 0 0 4px rgba(34, 197, 94, 0);
    }
}

.user-details {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
}

.user-name {
    font-size: 0.9375rem;
    font-weight: 600;
    color: #1f2937;
}

.user-meta {
    font-size: 0.8125rem;
    color: #6b7280;
}

.email-info,
.phone-info,
.address-info {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.875rem;
    color: #4b5563;
}

.email-info i,
.phone-info i,
.address-info i {
    color: #3b82f6;
    font-size: 1rem;
}

.address-info span {
    max-width: 200px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* Status Badges */
.status-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    font-weight: 600;
    font-size: 0.875rem;
}

.status-badge.active {
    background: linear-gradient(135deg, #d1fae5, #a7f3d0);
    color: #065f46;
    border: 2px solid #34d399;
}

.status-badge.locked {
    background: linear-gradient(135deg, #fee2e2, #fecaca);
    color: #991b1b;
    border: 2px solid #fca5a5;
}

/* Action Buttons */
.btn-lock {
    background: #fef3c7;
    color: #92400e;
}

.btn-lock:hover {
    background: #f59e0b;
    color: white;
    transform: translateY(-2px);
}

.btn-unlock {
    background: #d1fae5;
    color: #065f46;
}

.btn-unlock:hover {
    background: #10b981;
    color: white;
    transform: translateY(-2px);
}

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

/* Responsive */
@media (max-width: 768px) {
    .user-page {
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
    
    .search-input-group {
        width: 100%;
    }
    
    .search-input {
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
    
    .user-info {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .user-avatar {
        width: 40px;
        height: 40px;
    }
    
    .table-container {
        overflow-x: scroll;
        -webkit-overflow-scrolling: touch;
    }
    
    .data-table {
        min-width: 800px;
    }
}
</style>

<script>
// Delete user with SweetAlert
$(document).on('click', '.delete-user', function() {
    const userId = $(this).data('id_user');
    
    SwalHelper.confirmDelete(
        '<p style="margin-bottom: 1rem;">Bạn có chắc chắn muốn xóa khách hàng này?</p><p style="color: #dc2626; font-size: 0.875rem;">⚠️ Hành động này không thể hoàn tác!</p>',
        function() {
            SwalHelper.loading();
            
            $.ajax({
                url: '{{ route("user.destroy") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    user_id: userId
                },
                success: function(response) {
                    if (response.success) {
                        SwalHelper.success('Đã xóa!', response.message, function() {
                            location.reload();
                        });
                    } else {
                        SwalHelper.error('Lỗi!', response.error || 'Có lỗi xảy ra khi xóa khách hàng');
                    }
                },
                error: function(xhr) {
                    SwalHelper.error('Lỗi!', 'Có lỗi xảy ra khi xóa khách hàng');
                }
            });
        }
    );
});
</script>

@endsection
