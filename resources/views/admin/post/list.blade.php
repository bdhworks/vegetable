@extends('admin.layout.be')

@section('title_one')
Bài viết
@endsection
@section('title_two')
Quản lý nội dung / Bài viết
@endsection

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
/* Post Page Specific Styles Only - No Duplicates */
.post-page {
    padding: 1.5rem;
    background: #f5f7fa;
    min-height: 100vh;
}

/* Post Specific Elements */
.post-id-badge {
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

.post-image {
    width: 80px;
    height: 80px;
    border-radius: 0.5rem;
    overflow: hidden;
    border: 2px solid #e5e7eb;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.post-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.post-info {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
}

.post-name {
    font-size: 0.9375rem;
    font-weight: 600;
    color: #1f2937;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.post-meta {
    font-size: 0.8125rem;
    color: #6b7280;
}

.category-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: linear-gradient(135deg, #ede9fe, #ddd6fe);
    color: #6b21a8;
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    font-weight: 600;
    font-size: 0.875rem;
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
    .post-page {
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
    
    .post-image {
        width: 60px;
        height: 60px;
    }
}
</style>

<script>
// Delete post with SweetAlert
$(document).on('click', '.delete-post', function() {
    const postId = $(this).data('id_post');
    
    SwalHelper.confirmDelete(
        '<p style="margin-bottom: 1rem;">Bạn có chắc chắn muốn xóa bài viết này?</p><p style="color: #dc2626; font-size: 0.875rem;">⚠️ Hành động này không thể hoàn tác!</p>',
        function() {
            SwalHelper.loading();
            
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
                    SwalHelper.error('Lỗi!', 'Có lỗi xảy ra khi xóa bài viết');
                }
            });
        }
    );
});
</script>

@endsection
