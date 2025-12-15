@extends('admin.layout.be')

@section('content')
<div class="post-page">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <div class="header-left">
                <h1 class="page-title">
                    <i class="ti ti-news"></i>
                    Quản lý Bài Viết
                </h1>
                <nav class="breadcrumb-modern">
                    <ol>
                        <li><a href="{{ route('admin.dashboard') }}"><i class="ti ti-home"></i>Dashboard</a></li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li>Quản lý nội dung</li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li class="active">Bài viết</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card stat-primary">
            <div class="stat-icon">
                <i class="ti ti-file-text"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Tổng Bài Viết</span>
                <h3 class="stat-value">{{ $posts->total() }}</h3>
            </div>
        </div>
        <div class="stat-card stat-success">
            <div class="stat-icon">
                <i class="ti ti-eye"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Đang Hiển Thị</span>
                <h3 class="stat-value">{{ $posts->where('status', 1)->count() }}</h3>
            </div>
        </div>
        <div class="stat-card stat-warning">
            <div class="stat-icon">
                <i class="ti ti-eye-off"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Đang Ẩn</span>
                <h3 class="stat-value">{{ $posts->where('status', 0)->count() }}</h3>
            </div>
        </div>
        <div class="stat-card stat-info">
            <div class="stat-icon">
                <i class="ti ti-folder"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Danh Mục</span>
                <h3 class="stat-value">{{ \App\Models\CategoryPost::count() }}</h3>
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
                    Danh sách Bài Viết
                </h3>
                <span class="toolbar-badge">{{ $posts->total() }} bài viết</span>
            </div>
            <div class="toolbar-right">
                <form class="search-form" method="GET">
                    <div class="search-input-group">
                        <i class="ti ti-search search-icon"></i>
                        <input type="text" 
                               name="name" 
                               value="{{ request('name') }}" 
                               placeholder="Tìm kiếm tên bài viết..." 
                               class="search-input">
                        <button type="submit" class="btn-search">
                            <i class="ti ti-search"></i>
                            Tìm kiếm
                        </button>
                        @if(request('name'))
                            <a href="{{ route('post.index') }}" class="btn-clear">
                                <i class="ti ti-x"></i>
                            </a>
                        @endif
                    </div>
                </form>
                <a href="{{ route('post.create') }}" class="btn-add">
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
                        <th style="width: 120px;">
                            <div class="th-content">
                                <i class="ti ti-photo"></i>
                                <span>Hình Ảnh</span>
                            </div>
                        </th>
                        <th style="width: 30%;">
                            <div class="th-content">
                                <i class="ti ti-file-text"></i>
                                <span>Tên Bài Viết</span>
                            </div>
                        </th>
                        <th style="width: 20%;" class="text-center">
                            <div class="th-content">
                                <i class="ti ti-folder"></i>
                                <span>Danh Mục</span>
                            </div>
                        </th>
                        <th style="width: 15%;" class="text-center">
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
                    @forelse($posts as $post)
                        <tr class="data-row">
                            <td>
                                <div class="post-id-badge">
                                    <i class="ti ti-file-text"></i>
                                    <span>{{ $post->id }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="post-image">
                                    <img src="{{ Storage::url($post->image) }}" alt="{{ $post->name }}">
                                </div>
                            </td>
                            <td>
                                <div class="post-info">
                                    <span class="post-name">{{ $post->name }}</span>
                                    <span class="post-meta">{{ $post->created_at ? $post->created_at->diffForHumans() : 'N/A' }}</span>
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="category-badge">
                                    <i class="ti ti-folder"></i>
                                    <span>{{ $post->categoryPost->name }}</span>
                                </div>
                            </td>
                            <td class="text-center">
                                @if ($post->status == 0)
                                    <a href="{{ route('post.active', $post->id) }}" 
                                       class="status-badge hidden" 
                                       title="Hiển thị">
                                        <i class="ti ti-eye-off"></i>
                                        <span>Đang Ẩn</span>
                                    </a>
                                @else
                                    <a href="{{ route('post.hidden', $post->id) }}" 
                                       class="status-badge visible" 
                                       title="Ẩn">
                                        <i class="ti ti-eye"></i>
                                        <span>Hiển Thị</span>
                                    </a>
                                @endif
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('post.show', $post) }}" 
                                       class="btn-action btn-edit" 
                                       title="Chi tiết">
                                        <i class="ti ti-eye"></i>
                                        <span>Chi tiết</span>
                                    </a>
                                    <a href="{{ route('post.edit', $post) }}" 
                                       class="btn-action btn-edit" 
                                       title="Chỉnh sửa">
                                        <i class="ti ti-edit"></i>
                                        <span>Sửa</span>
                                    </a>
                                    <button type="button" 
                                            data-id_post="{{ $post->id }}" 
                                            class="btn-action btn-delete delete-post" 
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
                                        <i class="ti ti-file-off"></i>
                                    </div>
                                    <h5>Không có bài viết nào</h5>
                                    <p>Chưa có bài viết nào trong hệ thống</p>
                                    <a href="{{ route('post.create') }}" class="btn-add">
                                        <i class="ti ti-plus"></i>
                                        Thêm bài viết mới
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($posts->hasPages())
            <div class="pagination-wrapper">
                <div class="pagination-info">
                    <span>Hiển thị {{ $posts->firstItem() }} - {{ $posts->lastItem() }} trong tổng số {{ $posts->total() }}</span>
                </div>
                <div class="pagination-links">
                    {{ $posts->appends(request()->query())->links() }}
                </div>
            </div>
        @endif
    </div>
</div>

<style>
/* Post Page Specific Styles - No Duplicates from Layout */
.post-page {
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
    border-color: #3b82f6;
}

.stat-card.stat-primary:hover {
    box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
}

.stat-card.stat-success {
    border-color: var(--primary-color);
}

.stat-card.stat-success:hover {
    box-shadow: 0 8px 25px rgba(34, 197, 94, 0.3);
}

.stat-card.stat-warning {
    border-color: #f59e0b;
}

.stat-card.stat-warning:hover {
    box-shadow: 0 8px 25px rgba(245, 158, 11, 0.3);
}

.stat-card.stat-info {
    border-color: #8b5cf6;
}

.stat-card.stat-info:hover {
    box-shadow: 0 8px 25px rgba(139, 92, 246, 0.3);
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
    background: linear-gradient(135deg, #3b82f6, #2563eb);
}

.stat-success .stat-icon {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
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
    background: linear-gradient(135deg, #eff6ff, #dbeafe);
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
    color: #3b82f6;
}

.toolbar-badge {
    background: linear-gradient(135deg, #bfdbfe, #93c5fd);
    color: #1e40af;
    padding: 0.375rem 0.875rem;
    border-radius: var(--radius-sm);
    font-size: 0.875rem;
    font-weight: 700;
    border: 2px solid #60a5fa;
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
    border-color: #3b82f6;
    box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
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
    background: linear-gradient(135deg, #3b82f6, #2563eb);
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
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
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
    background: linear-gradient(135deg, #eff6ff, #dbeafe);
    border-bottom: 2px solid #bfdbfe;
}

.data-table th {
    padding: 1rem 1.25rem;
    text-align: left;
    font-weight: 700;
    font-size: 0.875rem;
    color: #1e40af;
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
    background: linear-gradient(135deg, #eff6ff, #f9fafb);
}

.data-table td {
    padding: 1rem 1.25rem;
    font-size: 0.9375rem;
    color: var(--text-primary);
}

/* Post Specific Elements */
.post-id-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: linear-gradient(135deg, #dbeafe, #bfdbfe);
    color: #1e40af;
    padding: 0.5rem 0.875rem;
    border-radius: var(--radius-sm);
    font-weight: 700;
    font-size: 0.875rem;
    font-family: 'Courier New', monospace;
    border: 2px solid #60a5fa;
}

.post-image {
    width: 80px;
    height: 80px;
    border-radius: var(--radius-sm);
    overflow: hidden;
    border: 2px solid var(--border-color);
    box-shadow: var(--shadow-sm);
}

.post-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.post-image:hover img {
    transform: scale(1.1);
}

.post-info {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
}

.post-name {
    font-size: 0.9375rem;
    font-weight: 600;
    color: var(--text-primary);
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.post-meta {
    font-size: 0.8125rem;
    color: var(--text-secondary);
}

.category-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: linear-gradient(135deg, #ede9fe, #ddd6fe);
    color: #6b21a8;
    padding: 0.5rem 1rem;
    border-radius: var(--radius-sm);
    font-weight: 600;
    font-size: 0.875rem;
    border: 2px solid #a78bfa;
}

/* Status Badges */
.status-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    border-radius: var(--radius-sm);
    font-weight: 600;
    font-size: 0.875rem;
    transition: all 0.3s ease;
    text-decoration: none;
    border: 2px solid transparent;
}

.status-badge.visible {
    background: linear-gradient(135deg, #d1fae5, #a7f3d0);
    color: #065f46;
    border-color: #34d399;
}

.status-badge.visible:hover {
    background: linear-gradient(135deg, #fef3c7, #fde68a);
    color: #92400e;
    border-color: #fbbf24;
    transform: translateY(-2px);
}

.status-badge.hidden {
    background: linear-gradient(135deg, #fee2e2, #fecaca);
    color: #991b1b;
    border-color: #fca5a5;
}

.status-badge.hidden:hover {
    background: linear-gradient(135deg, #d1fae5, #a7f3d0);
    color: #065f46;
    border-color: #34d399;
    transform: translateY(-2px);
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
    .post-page {
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
    
    .btn-action {
        width: 100%;
        justify-content: center;
    }
    
    .post-image {
        width: 60px;
        height: 60px;
    }
    
    .pagination-wrapper {
        flex-direction: column;
        text-align: center;
    }
}
</style>

<script>
// Delete post with SweetAlert
$(document).ready(function() {
    $(document).on('click', '.delete-post', function(e) {
        e.preventDefault();
        e.stopPropagation();
        
        const postId = $(this).data('id_post');
        
        if (!postId) {
            SwalHelper.error('Lỗi!', 'Không tìm thấy ID bài viết');
            return;
        }
        
        Swal.fire({
            title: 'Xác nhận xóa?',
            html: '<p style="margin-bottom: 1rem;">Bạn có chắc chắn muốn xóa bài viết này?</p><p style="color: #dc2626; font-size: 0.875rem;">⚠️ Hành động này không thể hoàn tác!</p>',
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
                    url: '{{ route("post.destroy") }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        post_id: postId
                    },
                    success: function(response) {
                        if (response.success) {
                            SwalHelper.success('Đã xóa!', response.message, function() {
                                location.reload();
                            });
                        } else {
                            SwalHelper.error('Lỗi!', response.error || 'Có lỗi xảy ra khi xóa bài viết');
                        }
                    },
                    error: function(xhr) {
                        console.error('AJAX Error:', xhr);
                        const errorMsg = xhr.responseJSON?.message || 'Có lỗi xảy ra khi xóa bài viết';
                        SwalHelper.error('Lỗi!', errorMsg);
                    }
                });
            }
        });
    });
});
</script>

@endsection
