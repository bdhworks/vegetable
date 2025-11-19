@extends('frontend.layout.fe')

@section('content')

<!-- Modern Blog Hero -->
<section class="blog-detail-hero">
    <div class="hero-background">
        <img src="{{ asset('storage/' . $post->image) }}" alt="{{$post->name}}" class="hero-bg-image">
        <div class="hero-overlay"></div>
    </div>
    <div class="container">
        <div class="hero-content">
            <nav aria-label="breadcrumb" class="hero-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{route('blog')}}">Blog</a></li>
                    <li class="breadcrumb-item active">{{Str::limit($post->name, 50)}}</li>
                </ol>
            </nav>
            
            <div class="hero-meta">
                <span class="post-category">
                    <i class="fa fa-folder"></i>
                    Kiến thức nông sản
                </span>
                <span class="post-reading-time">
                    <i class="fa fa-clock"></i>
                    {{rand(3, 8)}} phút đọc
                </span>
            </div>
            
            <h1 class="hero-title">{{$post->name}}</h1>
            
            <div class="hero-info">
                <div class="author-info">
                    <div class="author-avatar">
                        <img src="https://ui-avatars.com/api/?name=Admin&background=10b981&color=fff" alt="Admin">
                    </div>
                    <div class="author-details">
                        <span class="author-name">Admin</span>
                        <span class="post-date">
                            <i class="fa fa-calendar"></i>
                            {{$post->updated_at->format('d/m/Y')}}
                        </span>
                    </div>
                </div>
                
                <div class="post-stats">
                    <span class="stat-item">
                        <i class="fa fa-eye"></i>
                        {{rand(500, 2000)}} lượt xem
                    </span>
                    <span class="stat-item">
                        <i class="fa fa-comment"></i>
                        {{rand(5, 25)}} bình luận
                    </span>
                    <span class="stat-item">
                        <i class="fa fa-heart"></i>
                        {{rand(10, 100)}} lượt thích
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blog Content -->
<section class="blog-detail-content">
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <div class="blog-content-wrapper">
                    <!-- Social Share Floating -->
                    <div class="social-share-floating">
                        <a href="#" class="share-btn facebook" title="Chia sẻ Facebook">
                            <i class="fa fa-facebook-f"></i>
                        </a>
                        <a href="#" class="share-btn twitter" title="Chia sẻ Twitter">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="#" class="share-btn linkedin" title="Chia sẻ LinkedIn">
                            <i class="fa fa-linkedin"></i>
                        </a>
                        <a href="#" class="share-btn pinterest" title="Chia sẻ Pinterest">
                            <i class="fa fa-pinterest"></i>
                        </a>
                        <button class="share-btn copy-link" title="Sao chép link">
                            <i class="fa fa-link"></i>
                        </button>
                    </div>

                    <!-- Post Content -->
                    <article class="post-article">
                        <div class="article-intro">
                            <p class="lead">{{Str::limit($post->desc, 200)}}</p>
                        </div>
                        
                        <div class="article-content">
                            {!! $post->content !!}
                        </div>
                        
                        <!-- Post Tags -->
                        <div class="post-tags">
                            <span class="tags-label">Thẻ:</span>
                            <div class="tags-list">
                                <a href="#" class="tag-item">Nông sản</a>
                                <a href="#" class="tag-item">Sức khỏe</a>
                                <a href="#" class="tag-item">Dinh dưỡng</a>
                                <a href="#" class="tag-item">Organic</a>
                                <a href="#" class="tag-item">Tự nhiên</a>
                            </div>
                        </div>
                        
                        <!-- Post Actions -->
                        <div class="post-actions">
                            <div class="action-buttons">
                                <button class="action-btn like-btn">
                                    <i class="fa fa-heart"></i>
                                    <span>Thích ({{rand(10, 100)}})</span>
                                </button>
                                <button class="action-btn share-btn">
                                    <i class="fa fa-share"></i>
                                    <span>Chia sẻ</span>
                                </button>
                                <button class="action-btn bookmark-btn">
                                    <i class="fa fa-bookmark"></i>
                                    <span>Lưu bài</span>
                                </button>
                            </div>
                            
                            <div class="social-share-inline">
                                <span class="share-text">Chia sẻ bài viết:</span>
                                <div class="share-buttons">
                                    <a href="#" class="social-btn facebook">
                                        <i class="fa fa-facebook-f"></i>
                                    </a>
                                    <a href="#" class="social-btn twitter">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <a href="#" class="social-btn whatsapp">
                                        <i class="fa fa-whatsapp"></i>
                                    </a>
                                    <a href="#" class="social-btn telegram">
                                        <i class="fa fa-telegram"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </article>
                    
                    <!-- Author Bio -->
                    <div class="author-bio">
                        <div class="author-avatar-large">
                            <img src="https://ui-avatars.com/api/?name=Admin&background=10b981&color=fff&size=80" alt="Admin">
                        </div>
                        <div class="author-info">
                            <h4 class="author-name">Admin</h4>
                            <p class="author-title">Chuyên gia nông sản</p>
                            <p class="author-description">
                                Với hơn 10 năm kinh nghiệm trong lĩnh vực nông nghiệp và dinh dưỡng, 
                                tôi cam kết mang đến những thông tin chính xác và hữu ích nhất về nông sản sạch.
                            </p>
                            <div class="author-social">
                                <a href="#" class="author-social-link">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a href="#" class="author-social-link">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a href="#" class="author-social-link">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Comments Section -->
                    <div class="comments-section">
                        <div class="comments-header">
                            <h3>Bình luận ({{rand(5, 25)}})</h3>
                            <div class="comments-sort">
                                <select class="sort-select">
                                    <option value="newest">Mới nhất</option>
                                    <option value="oldest">Cũ nhất</option>
                                    <option value="popular">Phổ biến nhất</option>
                                </select>
                            </div>
                        </div>
                        
                        <!-- Comment Form -->
                        <div class="comment-form-wrapper">
                            <h4>Để lại bình luận</h4>
                            <form class="comment-form">
                                <div class="form-row">
                                    <div class="form-group">
                                        <input type="text" placeholder="Họ và tên *" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" placeholder="Email *" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea placeholder="Nội dung bình luận *" rows="4" required></textarea>
                                </div>
                                <button type="submit" class="submit-btn">
                                    <i class="fa fa-paper-plane"></i>
                                    <span>Gửi bình luận</span>
                                </button>
                            </form>
                        </div>
                        
                        <!-- Comments List -->
                        <div class="comments-list">
                            @for($i = 1; $i <= 3; $i++)
                            <div class="comment-item">
                                <div class="comment-avatar">
                                    <img src="https://ui-avatars.com/api/?name=User{{$i}}&background=random" alt="User">
                                </div>
                                <div class="comment-content">
                                    <div class="comment-header">
                                        <h5 class="commenter-name">Người dùng {{$i}}</h5>
                                        <span class="comment-date">{{now()->subDays($i)->format('d/m/Y')}}</span>
                                    </div>
                                    <p class="comment-text">
                                        Bài viết rất hữu ích! Cảm ơn admin đã chia sẻ những kiến thức bổ ích về nông sản. 
                                        Tôi sẽ áp dụng những lời khuyên này cho gia đình mình.
                                    </p>
                                    <div class="comment-actions">
                                        <button class="comment-action-btn">
                                            <i class="fa fa-thumbs-up"></i>
                                            Thích ({{rand(1, 10)}})
                                        </button>
                                        <button class="comment-action-btn">
                                            <i class="fa fa-reply"></i>
                                            Trả lời
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="blog-sidebar">
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
                    
                    <!-- Related Posts Widget -->
                    <div class="sidebar-widget related-posts-widget">
                        <div class="widget-header">
                            <h3 class="widget-title">
                                <i class="fa fa-newspaper"></i>
                                Bài viết liên quan
                            </h3>
                        </div>
                        <div class="widget-content">
                            <div class="related-posts">
                                @for($i = 1; $i <= 3; $i++)
                                <div class="related-post">
                                    <div class="post-thumbnail">
                                        <img src="https://picsum.photos/300/200?random={{$i}}" alt="Related Post">
                                    </div>
                                    <div class="post-info">
                                        <h5 class="post-title">
                                            <a href="#">Lợi ích của việc ăn rau củ hữu cơ {{$i}}</a>
                                        </h5>
                                        <div class="post-meta">
                                            <span class="post-date">
                                                <i class="fa fa-calendar"></i>
                                                {{now()->subDays($i * 2)->format('d/m/Y')}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                @endfor
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
                            <p class="newsletter-desc">Nhận thông báo về những bài viết mới nhất</p>
                            <form class="newsletter-form">
                                <div class="newsletter-input-group">
                                    <input type="email" placeholder="Email của bạn" class="newsletter-input">
                                    <button type="submit" class="newsletter-btn">
                                        <i class="fa fa-paper-plane"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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

/* Blog Detail Hero */
.blog-detail-hero {
    position: relative;
    min-height: 60vh;
    display: flex;
    align-items: center;
    color: white;
    overflow: hidden;
}

.hero-background {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 1;
}

.hero-bg-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(31, 41, 55, 0.8), rgba(16, 185, 129, 0.6));
}

.hero-content {
    position: relative;
    z-index: 2;
    max-width: 800px;
}

.hero-breadcrumb {
    margin-bottom: 20px;
}

.hero-breadcrumb .breadcrumb {
    background: none;
    padding: 0;
    margin: 0;
}

.hero-breadcrumb .breadcrumb-item a {
    color: rgba(255, 255, 255, 0.8);
    text-decoration: none;
}

.hero-breadcrumb .breadcrumb-item.active {
    color: white;
}

.hero-breadcrumb .breadcrumb-item + .breadcrumb-item::before {
    color: rgba(255, 255, 255, 0.6);
    content: "/";
}

.hero-meta {
    display: flex;
    gap: 20px;
    margin-bottom: 20px;
    flex-wrap: wrap;
}

.hero-meta span {
    display: flex;
    align-items: center;
    gap: 6px;
    background: rgba(255, 255, 255, 0.15);
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 0.9rem;
    backdrop-filter: blur(10px);
}

.hero-title {
    font-size: 2.5rem;
    font-weight: 800;
    line-height: 1.2;
    margin-bottom: 30px;
}

.hero-info {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 20px;
}

.author-info {
    display: flex;
    align-items: center;
    gap: 15px;
}

.author-avatar {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    overflow: hidden;
    border: 2px solid rgba(255, 255, 255, 0.3);
}

.author-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.author-details {
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.author-name {
    font-weight: 600;
    font-size: 1rem;
}

.post-date {
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 0.9rem;
    opacity: 0.9;
}

.post-stats {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
}

.stat-item {
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 0.9rem;
    opacity: 0.9;
}

/* Blog Content */
.blog-detail-content {
    background: var(--light-color);
    padding: 60px 0;
}

.blog-content-wrapper {
    position: relative;
}

/* Social Share Floating */
.social-share-floating {
    position: sticky;
    top: 100px;
    left: -80px;
    width: 60px;
    background: white;
    border-radius: var(--border-radius-lg);
    box-shadow: var(--box-shadow-lg);
    padding: 15px 0;
    text-align: center;
    z-index: 10;
}

.share-btn {
    display: block;
    width: 40px;
    height: 40px;
    margin: 8px auto;
    background: var(--light-color);
    color: var(--text-light);
    border: none;
    border-radius: 50%;
    text-decoration: none;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: var(--transition);
    cursor: pointer;
}

.share-btn:hover {
    transform: scale(1.1);
}

.share-btn.facebook:hover {
    background: #3b5998;
    color: white;
}

.share-btn.twitter:hover {
    background: #1da1f2;
    color: white;
}

.share-btn.linkedin:hover {
    background: #0077b5;
    color: white;
}

.share-btn.pinterest:hover {
    background: #bd081c;
    color: white;
}

.share-btn.copy-link:hover {
    background: var(--success-color);
    color: white;
}

/* Post Article */
.post-article {
    background: white;
    border-radius: var(--border-radius-lg);
    padding: 40px;
    margin-bottom: 30px;
    box-shadow: var(--box-shadow);
}

.article-intro .lead {
    font-size: 1.2rem;
    line-height: 1.7;
    color: var(--text-dark);
    font-weight: 400;
    margin-bottom: 30px;
    padding-bottom: 20px;
    border-bottom: 1px solid var(--border-color);
}

.article-content {
    line-height: 1.8;
    color: var(--text-dark);
    margin-bottom: 30px;
}

.article-content h1,
.article-content h2,
.article-content h3,
.article-content h4 {
    color: var(--dark-color);
    font-weight: 700;
    margin: 30px 0 15px 0;
}

.article-content p {
    margin-bottom: 20px;
}

.article-content img {
    width: 100%;
    height: auto;
    border-radius: var(--border-radius);
    margin: 20px 0;
    box-shadow: var(--box-shadow);
}

.article-content ul,
.article-content ol {
    margin: 20px 0;
    padding-left: 30px;
}

.article-content li {
    margin-bottom: 8px;
}

.article-content blockquote {
    background: var(--light-color);
    border-left: 4px solid var(--primary-color);
    padding: 20px;
    margin: 25px 0;
    border-radius: var(--border-radius);
    font-style: italic;
}

/* Post Tags */
.post-tags {
    padding: 20px 0;
    border-top: 1px solid var(--border-color);
    border-bottom: 1px solid var(--border-color);
    margin-bottom: 30px;
}

.tags-label {
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 10px;
    display: block;
}

.tags-list {
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
    font-size: 0.85rem;
    transition: var(--transition);
}

.tag-item:hover {
    background: var(--primary-color);
    color: white;
}

/* Post Actions */
.post-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 20px;
    padding: 25px 0;
}

.action-buttons {
    display: flex;
    gap: 15px;
}

.action-btn {
    display: flex;
    align-items: center;
    gap: 8px;
    background: var(--light-color);
    color: var(--text-dark);
    border: none;
    padding: 10px 16px;
    border-radius: 25px;
    cursor: pointer;
    transition: var(--transition);
    text-decoration: none;
    font-size: 0.9rem;
}

.action-btn:hover {
    background: var(--primary-color);
    color: white;
}

.social-share-inline {
    display: flex;
    align-items: center;
    gap: 15px;
}

.share-text {
    font-weight: 600;
    color: var(--text-dark);
}

.share-buttons {
    display: flex;
    gap: 8px;
}

.social-btn {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-decoration: none;
    transition: var(--transition);
}

.social-btn:hover {
    transform: scale(1.1);
    color: white;
}

.social-btn.facebook { background: #3b5998; }
.social-btn.twitter { background: #1da1f2; }
.social-btn.whatsapp { background: #25d366; }
.social-btn.telegram { background: #0088cc; }

/* Author Bio */
.author-bio {
    background: white;
    border-radius: var(--border-radius-lg);
    padding: 30px;
    margin-bottom: 30px;
    box-shadow: var(--box-shadow);
    display: flex;
    gap: 20px;
}

.author-avatar-large {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    overflow: hidden;
    flex-shrink: 0;
}

.author-avatar-large img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.author-bio .author-info {
    flex: 1;
}

.author-bio .author-name {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--dark-color);
    margin-bottom: 5px;
}

.author-title {
    color: var(--primary-color);
    font-weight: 600;
    margin-bottom: 10px;
}

.author-description {
    color: var(--text-light);
    line-height: 1.6;
    margin-bottom: 15px;
}

.author-social {
    display: flex;
    gap: 10px;
}

.author-social-link {
    width: 35px;
    height: 35px;
    background: var(--light-color);
    color: var(--text-light);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: var(--transition);
}

.author-social-link:hover {
    background: var(--primary-color);
    color: white;
}

/* Comments Section */
.comments-section {
    background: white;
    border-radius: var(--border-radius-lg);
    padding: 30px;
    box-shadow: var(--box-shadow);
}

.comments-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
    padding-bottom: 20px;
    border-bottom: 1px solid var(--border-color);
}

.comments-header h3 {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--dark-color);
    margin: 0;
}

.sort-select {
    padding: 8px 12px;
    border: 1px solid var(--border-color);
    border-radius: var(--border-radius);
    background: white;
    color: var(--text-dark);
    cursor: pointer;
}

/* Comment Form */
.comment-form-wrapper {
    margin-bottom: 30px;
    padding: 25px;
    background: var(--light-color);
    border-radius: var(--border-radius);
}

.comment-form-wrapper h4 {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--dark-color);
    margin-bottom: 20px;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px;
    margin-bottom: 15px;
}

.form-group input,
.form-group textarea {
    width: 100%;
    padding: 12px 15px;
    border: 1px solid var(--border-color);
    border-radius: var(--border-radius);
    font-size: 1rem;
    transition: var(--transition);
    box-sizing: border-box;
}

.form-group input:focus,
.form-group textarea:focus {
    outline: none;
    border-color: var(--primary-color);
}

.form-group textarea {
    resize: vertical;
    font-family: inherit;
}

.submit-btn {
    background: var(--primary-color);
    color: white;
    border: none;
    padding: 12px 25px;
    border-radius: var(--border-radius);
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: var(--transition);
}

.submit-btn:hover {
    background: var(--primary-dark);
}

/* Comments List */
.comment-item {
    display: flex;
    gap: 15px;
    padding: 20px 0;
    border-bottom: 1px solid var(--border-color);
}

.comment-item:last-child {
    border-bottom: none;
}

.comment-avatar {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    overflow: hidden;
    flex-shrink: 0;
}

.comment-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.comment-content {
    flex: 1;
}

.comment-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}

.commenter-name {
    font-weight: 600;
    color: var(--dark-color);
    margin: 0;
}

.comment-date {
    color: var(--text-light);
    font-size: 0.9rem;
}

.comment-text {
    color: var(--text-dark);
    line-height: 1.6;
    margin-bottom: 15px;
}

.comment-actions {
    display: flex;
    gap: 15px;
}

.comment-action-btn {
    background: none;
    border: none;
    color: var(--text-light);
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 0.85rem;
    transition: var(--transition);
}

.comment-action-btn:hover {
    color: var(--primary-color);
}

/* Sidebar Widgets */
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
}

.widget-content {
    padding: 20px;
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

.category-link:hover {
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

/* Related Posts Widget */
.related-posts {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.related-post {
    display: flex;
    gap: 12px;
}

.related-post .post-thumbnail {
    width: 80px;
    height: 60px;
    border-radius: var(--border-radius);
    overflow: hidden;
    flex-shrink: 0;
}

.related-post .post-thumbnail img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.related-post .post-info {
    flex: 1;
}

.related-post .post-title a {
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

.related-post .post-title a:hover {
    color: var(--primary-color);
}

.related-post .post-meta {
    margin-top: 5px;
}

.related-post .post-date {
    display: flex;
    align-items: center;
    gap: 4px;
    color: var(--text-light);
    font-size: 0.8rem;
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

/* Responsive Design */
@media (max-width: 1024px) {
    .social-share-floating {
        display: none;
    }

    .hero-info {
        flex-direction: column;
        align-items: flex-start;
    }
}

@media (max-width: 768px) {
    .hero-title {
        font-size: 2rem;
    }

    .post-article {
        padding: 25px;
    }

    .author-bio {
        flex-direction: column;
        text-align: center;
    }

    .post-actions {
        flex-direction: column;
        align-items: flex-start;
    }

    .form-row {
        grid-template-columns: 1fr;
    }

    .hero-meta {
        gap: 10px;
    }

    .post-stats {
        gap: 15px;
    }
}

@media (max-width: 576px) {
    .blog-detail-hero {
        min-height: 50vh;
    }

    .hero-content {
        max-width: 100%;
    }

    .post-article,
    .author-bio,
    .comments-section {
        padding: 20px;
        margin-left: -15px;
        margin-right: -15px;
        border-radius: 0;
    }

    .widget-content,
    .widget-header {
        padding: 15px;
    }

    .action-buttons {
        flex-direction: column;
        width: 100%;
    }

    .action-btn {
        justify-content: center;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Copy link functionality
    document.querySelector('.copy-link')?.addEventListener('click', function() {
        navigator.clipboard.writeText(window.location.href).then(() => {
            this.innerHTML = '<i class="fa fa-check"></i>';
            setTimeout(() => {
                this.innerHTML = '<i class="fa fa-link"></i>';
            }, 2000);
        });
    });

    // Like button functionality
    document.querySelector('.like-btn')?.addEventListener('click', function() {
        const icon = this.querySelector('i');
        const text = this.querySelector('span');
        
        if (icon.classList.contains('fa-heart')) {
            icon.classList.remove('fa-heart');
            icon.classList.add('fa-heart');
            icon.style.color = '#ef4444';
            this.style.background = 'rgba(239, 68, 68, 0.1)';
        }
    });

    // Comment form submission
    document.querySelector('.comment-form')?.addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Cảm ơn bạn đã bình luận! Chúng tôi sẽ duyệt và phản hồi sớm nhất.');
        this.reset();
    });

    // Newsletter form submission
    document.querySelector('.newsletter-form')?.addEventListener('submit', function(e) {
        e.preventDefault();
        const email = this.querySelector('.newsletter-input').value;
        if (email) {
            alert('Cảm ơn bạn đã đăng ký nhận tin!');
            this.reset();
        }
    });

    // Smooth scrolling for hash links
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

    // Reading progress indicator
    const createReadingProgress = () => {
        const article = document.querySelector('.post-article');
        if (!article) return;

        const progressBar = document.createElement('div');
        progressBar.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            height: 3px;
            background: var(--primary-color);
            z-index: 9999;
            transition: width 0.3s ease;
        `;
        document.body.appendChild(progressBar);

        const updateProgress = () => {
            const scrolled = window.scrollY;
            const articleTop = article.offsetTop;
            const articleHeight = article.offsetHeight;
            const windowHeight = window.innerHeight;
            const maxScroll = articleTop + articleHeight - windowHeight;
            
            if (scrolled >= articleTop) {
                const progress = Math.min(((scrolled - articleTop) / (maxScroll - articleTop)) * 100, 100);
                progressBar.style.width = `${progress}%`;
            } else {
                progressBar.style.width = '0%';
            }
        };

        window.addEventListener('scroll', updateProgress);
    };

    createReadingProgress();
});
</script>

@endsection