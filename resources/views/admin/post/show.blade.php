@extends('admin.layout.be')

@section('content')
<div class="post-show-page">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <div class="header-left">
                <h1 class="page-title">
                    <i class="ti ti-eye"></i>
                    Chi Tiết Bài Viết
                </h1>
                <nav class="breadcrumb-modern">
                    <ol>
                        <li><a href="{{ route('admin.dashboard') }}"><i class="ti ti-home"></i>Dashboard</a></li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li><a href="{{ route('post.index') }}">Bài viết</a></li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li class="active">Chi tiết #{{ $post->id }}</li>
                    </ol>
                </nav>
            </div>
            <div class="header-right">
                <a href="{{ route('post.index') }}" class="btn-back">
                    <i class="ti ti-arrow-left"></i>
                    <span>Quay lại</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Post Content -->
    <div class="post-container">
        <!-- Main Content -->
        <div class="post-content">
            <!-- Featured Image -->
            <div class="featured-image">
                <img src="{{ Storage::url($post->image) }}" alt="{{ $post->name }}">
                <div class="image-overlay">
                    <div class="category-badge">
                        <i class="ti ti-folder"></i>
                        <span>{{ $post->categoryPost->name }}</span>
                    </div>
                    <div class="status-badge {{ $post->status == 1 ? 'visible' : 'hidden' }}">
                        <i class="ti ti-{{ $post->status == 1 ? 'eye' : 'eye-off' }}"></i>
                        <span>{{ $post->status == 1 ? 'Hiển thị' : 'Ẩn' }}</span>
                    </div>
                </div>
            </div>

            <!-- Post Header -->
            <div class="post-header">
                <h1 class="post-title">{{ $post->name }}</h1>
                <div class="post-meta">
                    <div class="meta-item">
                        <i class="ti ti-calendar"></i>
                        <span>{{ $post->created_at ? $post->created_at->format('d/m/Y H:i') : 'N/A' }}</span>
                    </div>
                    <div class="meta-item">
                        <i class="ti ti-user"></i>
                        <span>{{ $post->user ? $post->user->name : 'Admin' }}</span>
                    </div>
                    <div class="meta-item">
                        <i class="ti ti-clock"></i>
                        <span>{{ $post->created_at ? $post->created_at->diffForHumans() : 'N/A' }}</span>
                    </div>
                </div>
            </div>

            <!-- Post Description -->
            <div class="post-description">
                <p>{{ $post->desc }}</p>
            </div>

            <!-- Post Content -->
            <div class="post-body">
                {!! $post->content !!}
            </div>

            <!-- Post Footer -->
            <div class="post-footer">
                <div class="post-tags">
                    <i class="ti ti-tag"></i>
                    <span>Slug:</span>
                    <code>{{ $post->slug }}</code>
                </div>
                <div class="post-actions">
                    <a href="{{ route('post.edit', $post) }}" class="action-btn edit">
                        <i class="ti ti-edit"></i>
                        <span>Chỉnh sửa</span>
                    </a>
                    @if ($post->status == 0)
                        <a href="{{ route('post.hidden', $post->id) }}" class="action-btn show">
                            <i class="ti ti-eye"></i>
                            <span>Hiển thị</span>
                        </a>
                    @else
                        <a href="{{ route('post.active', $post->id) }}" class="action-btn hide">
                            <i class="ti ti-eye-off"></i>
                            <span>Ẩn</span>
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="post-sidebar">
            <!-- Post Info Card -->
            <div class="info-card">
                <div class="info-header">
                    <i class="ti ti-info-circle"></i>
                    <h4>Thông tin Bài Viết</h4>
                </div>
                <div class="info-body">
                    <div class="info-item">
                        <div class="info-icon primary">
                            <i class="ti ti-hash"></i>
                        </div>
                        <div class="info-content">
                            <h5>Mã Bài Viết</h5>
                            <p class="info-value">{{ $post->id }}</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon success">
                            <i class="ti ti-folder"></i>
                        </div>
                        <div class="info-content">
                            <h5>Danh Mục</h5>
                            <p class="info-value">{{ $post->categoryPost->name }}</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon info">
                            <i class="ti ti-toggle-right"></i>
                        </div>
                        <div class="info-content">
                            <h5>Trạng Thái</h5>
                            <p class="info-value">{{ $post->status == 1 ? 'Hiển thị' : 'Ẩn' }}</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon warning">
                            <i class="ti ti-calendar"></i>
                        </div>
                        <div class="info-content">
                            <h5>Ngày Tạo</h5>
                            <p class="info-value">{{ $post->created_at ? $post->created_at->format('d/m/Y H:i') : 'N/A' }}</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon primary">
                            <i class="ti ti-calendar-event"></i>
                        </div>
                        <div class="info-content">
                            <h5>Cập Nhật</h5>
                            <p class="info-value">{{ $post->updated_at ? $post->updated_at->format('d/m/Y H:i') : 'N/A' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions Card -->
            <div class="actions-card">
                <div class="actions-header">
                    <i class="ti ti-settings"></i>
                    <h4>Hành Động</h4>
                </div>
                <div class="actions-body">
                    <a href="{{ route('post.edit', $post) }}" class="action-button edit">
                        <i class="ti ti-edit"></i>
                        <span>Chỉnh sửa bài viết</span>
                    </a>
                    @if ($post->status == 0)
                        <a href="{{ route('post.hidden', $post->id) }}" class="action-button show">
                            <i class="ti ti-eye"></i>
                            <span>Hiển thị bài viết</span>
                        </a>
                    @else
                        <a href="{{ route('post.active', $post->id) }}" class="action-button hide">
                            <i class="ti ti-eye-off"></i>
                            <span>Ẩn bài viết</span>
                        </a>
                    @endif
                    <button type="button" class="action-button delete" onclick="deletePost({{ $post->id }})">
                        <i class="ti ti-trash"></i>
                        <span>Xóa bài viết</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Post Show Page Specific Styles */
.post-show-page {
    padding: 1.5rem;
    background: #f5f7fa;
    min-height: 100vh;
}

/* Back Button */
.btn-back {
    background: white;
    color: #4b5563;
    border: 2px solid #e5e7eb;
    padding: 0.75rem 1.5rem;
    border-radius: 0.5rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
    text-decoration: none;
}

.btn-back:hover {
    border-color: #3b82f6;
    color: #3b82f6;
    transform: translateX(-4px);
}

/* Post Container */
.post-container {
    display: grid;
    grid-template-columns: 1fr 380px;
    gap: 1.5rem;
    max-width: 1400px;
}

/* Main Content */
.post-content {
    background: white;
    border-radius: 1rem;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

/* Featured Image */
.featured-image {
    position: relative;
    width: 100%;
    height: 400px;
    overflow: hidden;
}

.featured-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.image-overlay {
    position: absolute;
    top: 1.5rem;
    left: 1.5rem;
    right: 1.5rem;
    display: flex;
    justify-content: space-between;
}

.category-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: rgba(139, 92, 246, 0.95);
    color: white;
    padding: 0.75rem 1.25rem;
    border-radius: 0.75rem;
    font-weight: 600;
    font-size: 0.9375rem;
    backdrop-filter: blur(10px);
}

.status-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.25rem;
    border-radius: 0.75rem;
    font-weight: 600;
    font-size: 0.9375rem;
    backdrop-filter: blur(10px);
}

.status-badge.visible {
    background: rgba(16, 185, 129, 0.95);
    color: white;
}

.status-badge.hidden {
    background: rgba(239, 68, 68, 0.95);
    color: white;
}

/* Post Header */
.post-header {
    padding: 2rem;
    border-bottom: 2px solid #f3f4f6;
}

.post-title {
    font-size: 2rem;
    font-weight: 700;
    color: #1f2937;
    margin: 0 0 1rem 0;
    line-height: 1.3;
}

.post-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 1.5rem;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #6b7280;
    font-size: 0.9375rem;
}

.meta-item i {
    color: #3b82f6;
    font-size: 1.125rem;
}

/* Post Description */
.post-description {
    padding: 2rem;
    background: linear-gradient(135deg, #eff6ff, #dbeafe);
    border-left: 4px solid #3b82f6;
}

.post-description p {
    margin: 0;
    font-size: 1.125rem;
    line-height: 1.7;
    color: #1e40af;
    font-weight: 500;
}

/* Post Body */
.post-body {
    padding: 2rem;
    font-size: 1rem;
    line-height: 1.8;
    color: #374151;
}

.post-body h1,
.post-body h2,
.post-body h3,
.post-body h4,
.post-body h5,
.post-body h6 {
    color: #1f2937;
    font-weight: 700;
    margin: 1.5rem 0 1rem 0;
}

.post-body p {
    margin: 1rem 0;
}

.post-body img {
    max-width: 100%;
    height: auto;
    border-radius: 0.75rem;
    margin: 1.5rem 0;
}

.post-body a {
    color: #3b82f6;
    text-decoration: underline;
}

.post-body a:hover {
    color: #2563eb;
}

/* Post Footer */
.post-footer {
    padding: 2rem;
    border-top: 2px solid #f3f4f6;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
}

.post-tags {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    font-size: 0.9375rem;
    color: #6b7280;
}

.post-tags code {
    background: #f3f4f6;
    padding: 0.375rem 0.75rem;
    border-radius: 0.375rem;
    font-family: 'Courier New', monospace;
    color: #3b82f6;
}

.post-actions {
    display: flex;
    gap: 0.75rem;
}

.action-btn {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.25rem;
    border-radius: 0.5rem;
    font-weight: 600;
    font-size: 0.875rem;
    transition: all 0.3s ease;
    text-decoration: none;
}

.action-btn.edit {
    background: #dbeafe;
    color: #1e40af;
}

.action-btn.edit:hover {
    background: #3b82f6;
    color: white;
    transform: translateY(-2px);
}

.action-btn.show {
    background: #d1fae5;
    color: #065f46;
}

.action-btn.show:hover {
    background: #10b981;
    color: white;
    transform: translateY(-2px);
}

.action-btn.hide {
    background: #fef3c7;
    color: #92400e;
}

.action-btn.hide:hover {
    background: #f59e0b;
    color: white;
    transform: translateY(-2px);
}

/* Sidebar */
.post-sidebar {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

/* Info Card */
.info-card {
    background: white;
    border-radius: 0.75rem;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    position: sticky;
    top: 1.5rem;
}

.info-header {
    padding: 1.25rem 1.5rem;
    background: linear-gradient(135deg, #dbeafe, #bfdbfe);
    border-bottom: 2px solid #60a5fa;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.info-header i {
    font-size: 1.5rem;
    color: #1e40af;
}

.info-header h4 {
    margin: 0;
    font-size: 1.125rem;
    font-weight: 700;
    color: #1e40af;
}

.info-body {
    padding: 1.5rem;
}

.info-item {
    display: flex;
    gap: 1rem;
    margin-bottom: 1.5rem;
    padding-bottom: 1.5rem;
    border-bottom: 1px solid #e5e7eb;
}

.info-item:last-child {
    margin-bottom: 0;
    padding-bottom: 0;
    border-bottom: none;
}

.info-icon {
    width: 40px;
    height: 40px;
    border-radius: 0.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    flex-shrink: 0;
    font-size: 1.125rem;
}

.info-icon.primary {
    background: linear-gradient(135deg, #8b5cf6, #7c3aed);
}

.info-icon.success {
    background: linear-gradient(135deg, #10b981, #059669);
}

.info-icon.info {
    background: linear-gradient(135deg, #3b82f6, #2563eb);
}

.info-icon.warning {
    background: linear-gradient(135deg, #f97316, #ea580c);
}

.info-content h5 {
    margin: 0 0 0.375rem 0;
    font-size: 0.8125rem;
    font-weight: 600;
    color: #6b7280;
    text-transform: uppercase;
    letter-spacing: 0.025em;
}

.info-content .info-value {
    margin: 0;
    font-size: 0.9375rem;
    color: #1f2937;
    font-weight: 600;
    line-height: 1.4;
}

/* Actions Card */
.actions-card {
    background: white;
    border-radius: 0.75rem;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.actions-header {
    padding: 1.25rem 1.5rem;
    background: linear-gradient(135deg, #fef3c7, #fde68a);
    border-bottom: 2px solid #fbbf24;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.actions-header i {
    font-size: 1.5rem;
    color: #92400e;
}

.actions-header h4 {
    margin: 0;
    font-size: 1.125rem;
    font-weight: 700;
    color: #92400e;
}

.actions-body {
    padding: 1.5rem;
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.action-button {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 1rem 1.25rem;
    border-radius: 0.75rem;
    font-weight: 600;
    font-size: 0.9375rem;
    transition: all 0.3s ease;
    text-decoration: none;
    border: none;
    cursor: pointer;
    width: 100%;
}

.action-button.edit {
    background: #dbeafe;
    color: #1e40af;
}

.action-button.edit:hover {
    background: #3b82f6;
    color: white;
    transform: translateY(-2px);
}

.action-button.show {
    background: #d1fae5;
    color: #065f46;
}

.action-button.show:hover {
    background: #10b981;
    color: white;
    transform: translateY(-2px);
}

.action-button.hide {
    background: #fef3c7;
    color: #92400e;
}

.action-button.hide:hover {
    background: #f59e0b;
    color: white;
    transform: translateY(-2px);
}

.action-button.delete {
    background: #fee2e2;
    color: #991b1b;
}

.action-button.delete:hover {
    background: #ef4444;
    color: white;
    transform: translateY(-2px);
}

/* Responsive */
@media (max-width: 1024px) {
    .post-container {
        grid-template-columns: 1fr;
    }
    
    .info-card {
        position: relative;
        top: 0;
    }
}

@media (max-width: 768px) {
    .post-show-page {
        padding: 1rem;
    }
    
    .featured-image {
        height: 250px;
    }
    
    .post-title {
        font-size: 1.5rem;
    }
    
    .post-header,
    .post-description,
    .post-body,
    .post-footer {
        padding: 1.5rem;
    }
    
    .post-meta {
        flex-direction: column;
        gap: 0.75rem;
    }
    
    .post-footer {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .post-actions {
        width: 100%;
        flex-direction: column;
    }
    
    .action-btn {
        width: 100%;
        justify-content: center;
    }
}
</style>

<script>
function deletePost(postId) {
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
                            window.location.href = '{{ route("post.index") }}';
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
}
</script>

@endsection