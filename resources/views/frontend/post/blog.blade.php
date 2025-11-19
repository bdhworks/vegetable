@extends('frontend.layout.fe')

@section('content')

<!-- Modern Breadcrumb -->
<section class="breadcrumb-modern">
    <div class="container">
        <div class="breadcrumb-content">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Blog</li>
                </ol>
            </nav>
            <h1 class="page-title">Blog nông sản</h1>
            <p class="page-subtitle">Khám phá những kiến thức bổ ích về nông sản và sức khỏe</p>
        </div>
    </div>
</section>

<!-- Blog Hero -->
<section class="blog-hero">
    <div class="container">
        <div class="blog-hero-content">
            <div class="hero-stats">
                <div class="stat-item">
                    <span class="stat-number">{{$posts->count()}}</span>
                    <span class="stat-label">Bài viết</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">{{$categoryPosts->count()}}</span>
                    <span class="stat-label">Chủ đề</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">100+</span>
                    <span class="stat-label">Mẹo hay</span>
                </div>
            </div>
            
            <div class="hero-topics">
                <span class="topics-label">Chủ đề nổi bật:</span>
                <div class="topic-tags">
                    @foreach ($categoryPosts->take(4) as $category)
                    <span class="topic-tag">{{$category->name}}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blog Content -->
<section class="blog-modern">
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="blog-sidebar">
                    <!-- Search Widget -->
                    <div class="sidebar-widget search-widget">
                        <div class="widget-header">
                            <h3 class="widget-title">
                                <i class="fa fa-search"></i>
                                Tìm kiếm bài viết
                            </h3>
                        </div>
                        <div class="widget-content">
                            <form class="search-form">
                                <div class="search-input-group">
                                    <input type="text" placeholder="Nhập từ khóa tìm kiếm..." class="search-input">
                                    <button type="submit" class="search-btn">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Categories Widget -->
                    <div class="sidebar-widget categories-widget">
                        <div class="widget-header">
                            <h3 class="widget-title">
                                <i class="fa fa-folder"></i>
                                Danh mục bài viết
                            </h3>
                        </div>
                        <div class="widget-content">
                            <ul class="categories-list">
                                <li class="category-item active">
                                    <a href="#" class="category-link">
                                        <span class="category-name">Tất cả bài viết</span>
                                        <span class="post-count">{{$posts->count()}}</span>
                                    </a>
                                </li>
                                @foreach ($categoryPosts as $category)
                                <li class="category-item">
                                    <a href="#" class="category-link">
                                        <span class="category-name">{{$category->name}}</span>
                                        <span class="post-count">{{rand(5, 15)}}</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Popular Posts Widget -->
                    <div class="sidebar-widget popular-posts-widget">
                        <div class="widget-header">
                            <h3 class="widget-title">
                                <i class="fa fa-fire"></i>
                                Bài viết phổ biến
                            </h3>
                        </div>
                        <div class="widget-content">
                            <div class="popular-posts">
                                @foreach ($posts->take(3) as $index => $post)
                                <div class="popular-post">
                                    <div class="post-rank">{{$index + 1}}</div>
                                    <div class="post-thumbnail">
                                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{$post->name}}">
                                    </div>
                                    <div class="post-info">
                                        <h5 class="post-title">
                                            <a href="{{ route('blogDetail', $post->slug) }}">{{$post->name}}</a>
                                        </h5>
                                        <div class="post-meta">
                                            <span class="post-date">
                                                <i class="fa fa-calendar"></i>
                                                {{$post->updated_at->format('d/m/Y')}}
                                            </span>
                                            <span class="post-views">
                                                <i class="fa fa-eye"></i>
                                                {{rand(100, 500)}} lượt xem
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Newsletter Widget -->
                    <div class="sidebar-widget newsletter-widget">
                        <div class="widget-header">
                            <h3 class="widget-title">
                                <i class="fa fa-envelope"></i>
                                Đăng ký nhận tin
                            </h3>
                        </div>
                        <div class="widget-content">
                            <p class="newsletter-desc">Nhận thông báo về những bài viết mới nhất và hữu ích nhất</p>
                            <form class="newsletter-form">
                                <div class="newsletter-input-group">
                                    <input type="email" placeholder="Nhập email của bạn" class="newsletter-input">
                                    <button type="submit" class="newsletter-btn">
                                        <i class="fa fa-paper-plane"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Tags Widget -->
                    <div class="sidebar-widget tags-widget">
                        <div class="widget-header">
                            <h3 class="widget-title">
                                <i class="fa fa-tags"></i>
                                Thẻ phổ biến
                            </h3>
                        </div>
                        <div class="widget-content">
                            <div class="tags-cloud">
                                <a href="#" class="tag-item">Nông sản sạch</a>
                                <a href="#" class="tag-item">Sức khỏe</a>
                                <a href="#" class="tag-item">Dinh dưỡng</a>
                                <a href="#" class="tag-item">Organic</a>
                                <a href="#" class="tag-item">Mẹo vặt</a>
                                <a href="#" class="tag-item">Công thức</a>
                                <a href="#" class="tag-item">Vitamin</a>
                                <a href="#" class="tag-item">Tự nhiên</a>
                                <a href="#" class="tag-item">An toàn</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Blog Posts -->
            <div class="col-lg-8">
                <div class="blog-header">
                    <div class="blog-results">
                        <h2>Tất cả bài viết</h2>
                        <span class="results-count">Hiển thị {{$posts->count()}} bài viết</span>
                    </div>
                    
                    <div class="blog-filters">
                        <div class="view-mode">
                            <button class="view-btn grid-view active" data-view="grid">
                                <i class="fa fa-th"></i>
                            </button>
                            <button class="view-btn list-view" data-view="list">
                                <i class="fa fa-list"></i>
                            </button>
                        </div>
                        
                        <select class="sort-select">
                            <option value="latest">Mới nhất</option>
                            <option value="oldest">Cũ nhất</option>
                            <option value="popular">Phổ biến nhất</option>
                            <option value="title">Theo tiêu đề</option>
                        </select>
                    </div>
                </div>

                <div class="blog-posts-grid" data-view="grid">
                    @forelse ($posts as $post)
                    <article class="blog-post-card">
                        <div class="post-image">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{$post->name}}">
                            <div class="post-overlay">
                                <a href="{{ route('blogDetail', $post->slug) }}" class="read-more-btn">
                                    <i class="fa fa-arrow-right"></i>
                                    <span>Đọc ngay</span>
                                </a>
                            </div>
                            <div class="post-category">
                                <span>Kiến thức</span>
                            </div>
                        </div>
                        
                        <div class="post-content">
                            <div class="post-meta">
                                <span class="post-date">
                                    <i class="fa fa-calendar"></i>
                                    {{$post->updated_at->format('d/m/Y')}}
                                </span>
                                <span class="post-author">
                                    <i class="fa fa-user"></i>
                                    Admin
                                </span>
                                <span class="post-comments">
                                    <i class="fa fa-comment"></i>
                                    {{rand(5, 25)}} bình luận
                                </span>
                            </div>
                            
                            <h3 class="post-title">
                                <a href="{{ route('blogDetail', $post->slug) }}">{{$post->name}}</a>
                            </h3>
                            
                            <p class="post-excerpt">{{Str::limit($post->desc, 120)}}</p>
                            
                            <div class="post-footer">
                                <a href="{{ route('blogDetail', $post->slug) }}" class="read-more-link">
                                    <span>Đọc tiếp</span>
                                    <i class="fa fa-arrow-right"></i>
                                </a>
                                
                                <div class="post-stats">
                                    <span class="views">
                                        <i class="fa fa-eye"></i>
                                        {{rand(100, 500)}}
                                    </span>
                                    <span class="likes">
                                        <i class="fa fa-heart"></i>
                                        {{rand(10, 50)}}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </article>
                    @empty
                    <div class="no-posts">
                        <div class="no-posts-icon">
                            <i class="fa fa-file-text"></i>
                        </div>
                        <h3>Không có bài viết nào</h3>
                        <p>Hiện tại chưa có bài viết nào được đăng tải.</p>
                    </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                @if($posts->count() > 6)
                <div class="blog-pagination">
                    <div class="pagination-wrapper">
                        <div class="pagination-info">
                            <span>Hiển thị 1-{{$posts->count()}} trong {{$posts->count()}} bài viết</span>
                        </div>
                        <div class="pagination-controls">
                            <!-- Add pagination here if needed -->
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<style>
:root {
    --primary-color: #10b981;
    --primary-dark: #059669;
    --primary-light: #34d399;
    --secondary-color: #f59e0b;
    --accent-color: #ef4444;
    --success-color: #22c55e;
    --dark-color: #1f2937;
    --light-color: #f9fafb;
    --border-color: #e5e7eb;
    --text-dark: #374151;
    --text-light: #6b7280;
    --white: #ffffff;
    --box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    --box-shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    --border-radius: 8px;
    --border-radius-lg: 12px;
    --transition: all 0.3s ease;
}

/* Breadcrumb Modern */
.breadcrumb-modern {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    color: white;
    padding: 40px 0;
    position: relative;
    overflow: hidden;
}

.breadcrumb-modern::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="20" height="20" patternUnits="userSpaceOnUse"><path d="M 20 0 L 0 0 0 20" fill="none" stroke="white" stroke-width="0.5" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
}

.breadcrumb-content {
    position: relative;
    z-index: 2;
}

.breadcrumb {
    background: none;
    padding: 0;
    margin-bottom: 20px;
}

.breadcrumb-item a {
    color: rgba(255, 255, 255, 0.8);
    text-decoration: none;
}

.breadcrumb-item.active {
    color: white;
}

.breadcrumb-item + .breadcrumb-item::before {
    color: rgba(255, 255, 255, 0.6);
    content: "/";
}

.page-title {
    font-size: 2.5rem;
    font-weight: 800;
    margin-bottom: 10px;
}

.page-subtitle {
    font-size: 1.1rem;
    opacity: 0.9;
    margin: 0;
}

/* Blog Hero */
.blog-hero {
    background: white;
    padding: 30px 0;
    border-bottom: 1px solid var(--border-color);
}

.blog-hero-content {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 20px;
}

.hero-stats {
    display: flex;
    gap: 30px;
}

.stat-item {
    text-align: center;
}

.stat-number {
    display: block;
    font-size: 1.8rem;
    font-weight: 800;
    color: var(--primary-color);
    line-height: 1;
}

.stat-label {
    font-size: 0.9rem;
    color: var(--text-light);
    margin-top: 4px;
}

.hero-topics {
    display: flex;
    align-items: center;
    gap: 15px;
    flex-wrap: wrap;
}

.topics-label {
    font-weight: 600;
    color: var(--text-dark);
    font-size: 0.9rem;
}

.topic-tags {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}

.topic-tag {
    background: var(--primary-color);
    color: white;
    padding: 4px 12px;
    border-radius: 15px;
    font-size: 0.8rem;
    font-weight: 500;
}

/* Blog Modern */
.blog-modern {
    background: var(--light-color);
    padding: 40px 0 60px;
}

/* Sidebar */
.blog-sidebar {
    position: sticky;
    top: 20px;
}

.sidebar-widget {
    background: white;
    border-radius: var(--border-radius-lg);
    margin-bottom: 30px;
    box-shadow: var(--box-shadow);
    overflow: hidden;
}

.widget-header {
    padding: 20px;
    border-bottom: 1px solid var(--border-color);
    background: var(--light-color);
}

.widget-title {
    display: flex;
    align-items: center;
    gap: 10px;
    margin: 0;
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--text-dark);
}

.widget-title i {
    color: var(--primary-color);
    font-size: 1rem;
}

.widget-content {
    padding: 20px;
}

/* Search Widget */
.search-input-group {
    display: flex;
    border: 2px solid var(--border-color);
    border-radius: var(--border-radius);
    overflow: hidden;
    transition: var(--transition);
}

.search-input-group:focus-within {
    border-color: var(--primary-color);
}

.search-input {
    flex: 1;
    padding: 12px 15px;
    border: none;
    background: transparent;
    font-size: 1rem;
}

.search-input:focus {
    outline: none;
}

.search-btn {
    background: var(--primary-color);
    color: white;
    border: none;
    padding: 12px 15px;
    cursor: pointer;
    transition: var(--transition);
}

.search-btn:hover {
    background: var(--primary-dark);
}

/* Categories Widget */
.categories-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.category-item {
    border-bottom: 1px solid var(--border-color);
}

.category-item:last-child {
    border-bottom: none;
}

.category-link {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 0;
    color: var(--text-dark);
    text-decoration: none;
    transition: var(--transition);
}

.category-link:hover,
.category-item.active .category-link {
    color: var(--primary-color);
}

.category-name {
    font-weight: 500;
}

.post-count {
    background: var(--light-color);
    color: var(--text-light);
    padding: 2px 8px;
    border-radius: 12px;
    font-size: 0.8rem;
    font-weight: 600;
}

.category-item.active .post-count {
    background: var(--primary-color);
    color: white;
}

/* Popular Posts Widget */
.popular-posts {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.popular-post {
    display: flex;
    gap: 12px;
    align-items: flex-start;
}

.post-rank {
    width: 30px;
    height: 30px;
    background: var(--primary-color);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 0.9rem;
    flex-shrink: 0;
}

.post-thumbnail {
    width: 60px;
    height: 60px;
    border-radius: var(--border-radius);
    overflow: hidden;
    flex-shrink: 0;
}

.post-thumbnail img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.post-info {
    flex: 1;
}

.post-title a {
    color: var(--text-dark);
    text-decoration: none;
    font-size: 0.9rem;
    font-weight: 600;
    line-height: 1.4;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    transition: var(--transition);
}

.post-title a:hover {
    color: var(--primary-color);
}

.post-meta {
    display: flex;
    flex-direction: column;
    gap: 4px;
    margin-top: 8px;
}

.post-meta span {
    display: flex;
    align-items: center;
    gap: 4px;
    font-size: 0.75rem;
    color: var(--text-light);
}

.post-meta i {
    font-size: 0.7rem;
}

/* Newsletter Widget */
.newsletter-desc {
    color: var(--text-light);
    font-size: 0.9rem;
    margin-bottom: 15px;
    line-height: 1.5;
}

.newsletter-input-group {
    display: flex;
    border: 2px solid var(--border-color);
    border-radius: var(--border-radius);
    overflow: hidden;
    transition: var(--transition);
}

.newsletter-input-group:focus-within {
    border-color: var(--primary-color);
}

.newsletter-input {
    flex: 1;
    padding: 10px 12px;
    border: none;
    background: transparent;
    font-size: 0.9rem;
}

.newsletter-input:focus {
    outline: none;
}

.newsletter-btn {
    background: var(--primary-color);
    color: white;
    border: none;
    padding: 10px 12px;
    cursor: pointer;
    transition: var(--transition);
}

.newsletter-btn:hover {
    background: var(--primary-dark);
}

/* Tags Widget */
.tags-cloud {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
}

.tag-item {
    background: var(--light-color);
    color: var(--text-dark);
    padding: 6px 12px;
    border-radius: 15px;
    text-decoration: none;
    font-size: 0.8rem;
    font-weight: 500;
    transition: var(--transition);
}

.tag-item:hover {
    background: var(--primary-color);
    color: white;
}

/* Blog Header */
.blog-header {
    background: white;
    padding: 25px;
    border-radius: var(--border-radius-lg);
    margin-bottom: 30px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    box-shadow: var(--box-shadow);
    flex-wrap: wrap;
    gap: 20px;
}

.blog-results h2 {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 5px;
}

.results-count {
    color: var(--text-light);
    font-size: 0.9rem;
}

.blog-filters {
    display: flex;
    align-items: center;
    gap: 15px;
}

.view-mode {
    display: flex;
    border: 1px solid var(--border-color);
    border-radius: var(--border-radius);
    overflow: hidden;
}

.view-btn {
    padding: 8px 12px;
    background: transparent;
    border: none;
    color: var(--text-light);
    cursor: pointer;
    transition: var(--transition);
}

.view-btn.active,
.view-btn:hover {
    background: var(--primary-color);
    color: white;
}

.sort-select {
    padding: 8px 12px;
    border: 1px solid var(--border-color);
    border-radius: var(--border-radius);
    background: white;
    color: var(--text-dark);
    cursor: pointer;
}

/* Blog Posts Grid */
.blog-posts-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 30px;
}

.blog-posts-grid[data-view="list"] {
    grid-template-columns: 1fr;
}

.blog-post-card {
    background: white;
    border-radius: var(--border-radius-lg);
    overflow: hidden;
    box-shadow: var(--box-shadow);
    transition: var(--transition);
}

.blog-post-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--box-shadow-lg);
}

.post-image {
    position: relative;
    height: 250px;
    overflow: hidden;
}

.post-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.blog-post-card:hover .post-image img {
    transform: scale(1.05);
}

.post-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: var(--transition);
}

.blog-post-card:hover .post-overlay {
    opacity: 1;
}

.read-more-btn {
    background: white;
    color: var(--text-dark);
    padding: 10px 20px;
    border-radius: 25px;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 8px;
    font-weight: 600;
    transition: var(--transition);
}

.read-more-btn:hover {
    background: var(--primary-color);
    color: white;
}

.post-category {
    position: absolute;
    top: 15px;
    left: 15px;
    background: var(--primary-color);
    color: white;
    padding: 5px 12px;
    border-radius: 15px;
    font-size: 0.8rem;
    font-weight: 600;
}

.post-content {
    padding: 25px;
}

.post-content .post-meta {
    display: flex;
    gap: 15px;
    margin-bottom: 15px;
    flex-wrap: wrap;
}

.post-content .post-meta span {
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 0.85rem;
    color: var(--text-light);
}

.post-title a {
    color: var(--text-dark);
    text-decoration: none;
    font-size: 1.3rem;
    font-weight: 700;
    line-height: 1.3;
    transition: var(--transition);
}

.post-title a:hover {
    color: var(--primary-color);
}

.post-excerpt {
    color: var(--text-light);
    line-height: 1.6;
    margin: 15px 0 20px;
}

.post-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 20px;
    border-top: 1px solid var(--border-color);
}

.read-more-link {
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: var(--transition);
}

.read-more-link:hover {
    color: var(--primary-dark);
}

.post-stats {
    display: flex;
    gap: 15px;
}

.post-stats span {
    display: flex;
    align-items: center;
    gap: 5px;
    color: var(--text-light);
    font-size: 0.85rem;
}

/* No Posts */
.no-posts {
    grid-column: 1 / -1;
    text-align: center;
    padding: 60px 20px;
    color: var(--text-light);
}

.no-posts-icon i {
    font-size: 4rem;
    margin-bottom: 20px;
    opacity: 0.5;
}

.no-posts h3 {
    font-size: 1.5rem;
    color: var(--text-dark);
    margin-bottom: 10px;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .blog-posts-grid {
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
    }

    .hero-stats {
        gap: 20px;
    }

    .blog-header {
        flex-direction: column;
        align-items: flex-start;
    }
}

@media (max-width: 768px) {
    .page-title {
        font-size: 2rem;
    }

    .blog-hero-content {
        flex-direction: column;
        text-align: center;
    }

    .blog-sidebar {
        margin-bottom: 30px;
        position: static;
    }

    .blog-posts-grid {
        grid-template-columns: 1fr;
    }

    .post-content .post-meta {
        gap: 10px;
    }

    .post-footer {
        flex-direction: column;
        gap: 15px;
        align-items: flex-start;
    }
}

@media (max-width: 576px) {
    .post-image {
        height: 200px;
    }

    .post-content {
        padding: 20px;
    }

    .widget-content,
    .widget-header {
        padding: 15px;
    }

    .hero-stats {
        flex-direction: column;
        gap: 15px;
        width: 100%;
    }

    .stat-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        text-align: left;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // View mode toggle
    const viewButtons = document.querySelectorAll('.view-btn');
    const postsGrid = document.querySelector('.blog-posts-grid');
    
    viewButtons.forEach(button => {
        button.addEventListener('click', function() {
            const view = this.getAttribute('data-view');
            
            viewButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            postsGrid.setAttribute('data-view', view);
        });
    });

    // Newsletter form
    const newsletterForm = document.querySelector('.newsletter-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const email = this.querySelector('.newsletter-input').value;
            if (email) {
                alert('Cảm ơn bạn đã đăng ký nhận tin!');
                this.reset();
            }
        });
    }

    // Search form
    const searchForm = document.querySelector('.search-form');
    if (searchForm) {
        searchForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const query = this.querySelector('.search-input').value;
            if (query) {
                // Implement search functionality
                console.log('Searching for:', query);
            }
        });
    }

    // Sort functionality
    const sortSelect = document.querySelector('.sort-select');
    if (sortSelect) {
        sortSelect.addEventListener('change', function() {
            // Implement sort functionality
            console.log('Sort by:', this.value);
        });
    }

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });
});
</script>

@endsection
