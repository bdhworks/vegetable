@extends('frontend.layout.fe')

@section('content')

<!-- Modern Breadcrumb -->
<section class="breadcrumb-modern">
    <div class="container">
        <div class="breadcrumb-content">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Cửa hàng</li>
                </ol>
            </nav>
            <h1 class="page-title">Cửa hàng nông sản</h1>
            <p class="page-subtitle">Khám phá các sản phẩm nông sản tươi ngon, chất lượng cao</p>
        </div>
    </div>
</section>

<!-- Shop Header -->
<section class="shop-header">
    <div class="container">
        <div class="shop-header-content">
            <div class="shop-stats">
                <div class="stat-item">
                    <span class="stat-number">{{$products->total()}}</span>
                    <span class="stat-label">Sản phẩm</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">{{$categories->count()}}</span>
                    <span class="stat-label">Danh mục</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">100%</span>
                    <span class="stat-label">Tự nhiên</span>
                </div>
            </div>
            
            @if(request('search'))
            <div class="search-results">
                <h3>Kết quả tìm kiếm cho: <span>"{{request('search')}}"</span></h3>
                <p>Tìm thấy {{$products->total()}} sản phẩm phù hợp</p>
            </div>
            @endif
        </div>
    </div>
</section>

<!-- Shop Content -->
<section class="shop-modern">
    <div class="container">
        <form action="" id="filterForm">
            <div class="row">
                <!-- Sidebar Filter -->
                <div class="col-lg-3">
                    <div class="shop-sidebar">
                        <!-- Categories Filter -->
                        <div class="filter-widget">
                            <div class="widget-header">
                                <h4 class="widget-title">
                                    <i class="fa fa-list"></i>
                                    <span>Danh mục sản phẩm</span>
                                </h4>
                                <button type="button" class="toggle-widget">
                                    <i class="fa fa-chevron-down"></i>
                                </button>
                            </div>
                            <div class="widget-content">
                                <ul class="category-list">
                                    <li class="category-item {{ !request()->segment(2) ? 'active' : '' }}">
                                        <a href="{{route('shop')}}" class="category-link">
                                            <span class="category-name">Tất cả sản phẩm</span>
                                            <span class="category-count">{{$products->total()}}</span>
                                        </a>
                                    </li>
                                    @foreach ($categories as $category)
                                    <li class="category-item {{ request()->segment(2) == $category->id && request()->segment(1) == 'danh-muc' ? 'active' : '' }}">
                                        <a href="{{route('category', $category)}}" class="category-link">
                                            <span class="category-name">{{$category->name}}</span>
                                            {{-- <span class="category-count">{{$category->products->count()}}</span> --}}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <!-- Price Range Filter -->
                        <div class="filter-widget">
                            <div class="widget-header">
                                <h4 class="widget-title">
                                    <i class="fa fa-money"></i>
                                    <span>Khoảng giá</span>
                                </h4>
                                <button type="button" class="toggle-widget">
                                    <i class="fa fa-chevron-down"></i>
                                </button>
                            </div>
                            <div class="widget-content">
                                <div class="price-filter">
                                    <div class="price-range-slider">
                                        <input type="range" min="20000" max="500000" value="20000" class="price-slider" id="minPrice">
                                        <input type="range" min="20000" max="500000" value="500000" class="price-slider" id="maxPrice">
                                    </div>
                                    <div class="price-inputs">
                                        <div class="price-input-group">
                                            <label>Từ:</label>
                                            <input type="text" name="min_price" id="minPriceInput" value="20,000₫" readonly>
                                        </div>
                                        <div class="price-input-group">
                                            <label>Đến:</label>
                                            <input type="text" name="max_price" id="maxPriceInput" value="500,000₫" readonly>
                                        </div>
                                    </div>
                                    <button type="submit" class="apply-price-filter">Áp dụng</button>
                                </div>
                            </div>
                        </div>

                        <!-- Origin Filter -->
                        <div class="filter-widget">
                            <div class="widget-header">
                                <h4 class="widget-title">
                                    <i class="fa fa-map-marker"></i>
                                    <span>Xuất xứ</span>
                                </h4>
                                <button type="button" class="toggle-widget">
                                    <i class="fa fa-chevron-down"></i>
                                </button>
                            </div>
                            <div class="widget-content">
                                <div class="checkbox-group">
                                    @foreach($brands as $brand)
                                    <div class="checkbox-item">
                                        <input type="checkbox" name="brand[{{$brand->id}}]" id="brand_{{$brand->id}}"
                                        {{ (request('brand')[$brand->id] ?? '' ) == 'on' ? 'checked' : ''}} onchange="this.form.submit()">
                                        <label for="brand_{{$brand->id}}" class="checkbox-label">
                                            <span class="checkmark"></span>
                                            <span class="label-text">{{$brand->name}}</span>
                                            <span class="item-count">({{$brand->products->count()}})</span>
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Top Selling Products -->
                        <div class="filter-widget">
                            <div class="widget-header">
                                <h4 class="widget-title">
                                    <i class="fa fa-fire"></i>
                                    <span>Bán chạy trong tuần</span>
                                </h4>
                            </div>
                            <div class="widget-content">
                                <div class="top-products">
                                    @foreach ($topProducts as $index => $product)
                                    <div class="top-product-item">
                                        <div class="product-rank">{{$index + 1}}</div>
                                        <div class="product-image">
                                            <img src="{{$product->images->first()->image}}" alt="{{$product->name}}">
                                        </div>
                                        <div class="product-info">
                                            <h5 class="product-name">
                                                <a href="{{route('product', [$product,Str::slug($product->name)])}}">{{$product->name}}</a>
                                            </h5>
                                            <div class="product-price">{{convertPrice($product->price_sale)}}</div>
                                            <div class="product-sold">Đã bán {{$product->totalSold}}</div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="col-lg-9">
                    <!-- Filter Bar -->
                    <div class="filter-bar">
                        <div class="filter-bar-left">
                            <div class="results-info">
                                <span class="results-count">
                                    Hiển thị {{$products->firstItem()}} - {{$products->lastItem()}} trong {{$products->total()}} sản phẩm
                                </span>
                            </div>
                        </div>
                        
                        <div class="filter-bar-right">
                            <div class="view-mode">
                                <button type="button" class="view-btn grid-view active" data-view="grid">
                                    <i class="fa fa-th"></i>
                                </button>
                                <button type="button" class="view-btn list-view" data-view="list">
                                    <i class="fa fa-list"></i>
                                </button>
                            </div>
                            
                            <div class="sort-dropdown">
                                <select name="sort_by" onchange="this.form.submit()" class="sort-select">
                                    <option {{ request('sort_by') == 'latest' ? 'selected' : ''}} value="latest">Mới nhất</option>
                                    <option {{ request('sort_by') == 'oldest' ? 'selected' : ''}} value="oldest">Cũ nhất</option>
                                    <option {{ request('sort_by') == 'price-ascending' ? 'selected' : ''}} value="price-ascending">Giá tăng dần</option>
                                    <option {{ request('sort_by') == 'price-descending' ? 'selected' : ''}} value="price-descending">Giá giảm dần</option>
                                    <option {{ request('sort_by') == 'popular' ? 'selected' : ''}} value="popular">Phổ biến nhất</option>
                                </select>
                            </div>
                            
                            <div class="per-page-dropdown">
                                <select name="show" onchange="this.form.submit()" class="show-select">
                                    <option {{ request('show') == '9' ? 'selected' : ''}} value="9">9 sản phẩm</option>
                                    <option {{ request('show') == '12' ? 'selected' : ''}} value="12">12 sản phẩm</option>
                                    <option {{ request('show') == '18' ? 'selected' : ''}} value="18">18 sản phẩm</option>
                                    <option {{ request('show') == '24' ? 'selected' : ''}} value="24">24 sản phẩm</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Products Grid -->
                    <div class="products-grid" data-view="grid">
                        @forelse($products as $product)
                        @if ($product->status == 1)
                        <div class="product-card-modern">
                            <!-- Product Badges -->
                            <div class="product-badges">
                                @if($product->created_at->diffInDays(now()) <= 7)
                                <span class="badge badge-new">Mới</span>
                                @endif
                                @if($product->quantity <= 5 && $product->quantity > 0)
                                <span class="badge badge-hot">Sắp hết</span>
                                @elseif($product->quantity <= 0)
                                <span class="badge badge-sold">Hết hàng</span>
                                @endif
                            </div>
                            
                            <!-- Product Image -->
                            <div class="product-image">
                                <img src="{{$product->images->first()->image}}" alt="{{$product->name}}" class="main-image">
                                @if($product->images->count() > 1)
                                <img src="{{$product->images->skip(1)->first()->image}}" alt="{{$product->name}}" class="hover-image">
                                @endif
                                
                                <!-- Quick Actions -->
                                <div class="product-actions">
                                    <button class="action-btn wishlist-btn" title="Thêm vào yêu thích">
                                        <i class="fa fa-heart-o"></i>
                                    </button>
                                    <a href="{{route('product', [$product,Str::slug($product->name)])}}" class="action-btn view-btn" title="Xem chi tiết">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <button class="action-btn compare-btn" title="So sánh">
                                        <i class="fa fa-exchange"></i>
                                    </button>
                                </div>

                                <!-- Quick Add to Cart -->
                                @if($product->quantity > 0)
                                <div class="quick-add">
                                    <a href="{{route('cart.add', $product)}}" class="quick-add-btn">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span>Thêm vào giỏ</span>
                                    </a>
                                </div>
                                @else
                                <div class="quick-add">
                                    <button class="quick-add-btn disabled" disabled>
                                        <i class="fa fa-ban"></i>
                                        <span>Hết hàng</span>
                                    </button>
                                </div>
                                @endif
                            </div>
                            
                            <!-- Product Info -->
                            <div class="product-info">
                                <div class="product-category">{{$product->category->name ?? 'Chưa phân loại'}}</div>
                                <h4 class="product-title">
                                    <a href="{{route('product', [$product, Str::slug($product->name)])}}">{{$product->name}}</a>
                                </h4>
                                
                                <div class="product-rating">
                                    <div class="stars">
                                        @for($i = 1; $i <= 5; $i++)
                                        <i class="fa fa-star {{ $i <= 4.5 ? 'active' : '' }}"></i>
                                        @endfor
                                    </div>
                                    <span class="rating-count">({{rand(10, 100)}} đánh giá)</span>
                                </div>
                                
                                <div class="product-origin">
                                    <i class="fa fa-map-marker"></i>
                                    <span>{{$product->origin->name}}</span>
                                </div>
                                
                                <div class="product-price">
                                    <span class="current-price">{{convertPrice($product->price_sale)}}</span>
                                    @if($product->price_sale < $product->price_sale * 1.2)
                                    <span class="original-price">{{convertPrice($product->price_sale * 1.2)}}</span>
                                    <span class="discount-percent">-17%</span>
                                    @endif
                                </div>

                                <div class="product-features">
                                    <span class="feature-tag">
                                        <i class="fa fa-leaf"></i>
                                        Hữu cơ
                                    </span>
                                    <span class="feature-tag">
                                        <i class="fa fa-truck"></i>
                                        Giao nhanh
                                    </span>
                                </div>
                            </div>
                        </div>
                        @endif
                        @empty
                        <div class="no-products">
                            <div class="no-products-icon">
                                <i class="fa fa-search"></i>
                            </div>
                            <h3>Không tìm thấy sản phẩm</h3>
                            <p>Rất tiếc, không có sản phẩm nào phù hợp với tiêu chí tìm kiếm của bạn.</p>
                            <a href="{{route('shop')}}" class="btn-back-shop">Quay lại cửa hàng</a>
                        </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    @if($products->hasPages())
                    <div class="pagination-wrapper">
                        <div class="pagination-info">
                            <span>Hiển thị {{$products->firstItem()}} đến {{$products->lastItem()}} trong {{$products->total()}} sản phẩm</span>
                        </div>
                        <div class="pagination-modern">
                            {{ $products->appends(request()->query())->links() }}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </form>
    </div>
</section>

<style>
:root {
    --primary-color: #10b981;
    --primary-dark: #059669;
    --primary-light: #34d399;
    --secondary-color: #f59e0b;
    --accent-color: #ef4444;
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
    color: white;
}

.page-subtitle {
    font-size: 1.1rem;
    opacity: 0.9;
    margin: 0;
}

/* Shop Header */
.shop-header {
    background: white;
    padding: 30px 0;
    box-shadow: var(--box-shadow);
}

.shop-stats {
    display: flex;
    gap: 40px;
    margin-bottom: 20px;
}

.stat-item {
    text-align: center;
}

.stat-number {
    display: block;
    font-size: 1.8rem;
    font-weight: 800;
    color: var(--primary-color);
}

.stat-label {
    font-size: 0.9rem;
    color: var(--text-light);
}

.search-results h3 {
    font-size: 1.5rem;
    color: var(--text-dark);
    margin-bottom: 5px;
}

.search-results span {
    color: var(--primary-color);
    font-weight: 600;
}

.search-results p {
    color: var(--text-light);
    margin: 0;
}

/* Shop Modern */
.shop-modern {
    padding: 40px 0 60px;
    background: var(--light-color);
}

/* Sidebar */
.shop-sidebar {
    background: white;
    border-radius: var(--border-radius-lg);
    padding: 0;
    box-shadow: var(--box-shadow);
    position: sticky;
    top: 20px;
}

.filter-widget {
    border-bottom: 1px solid var(--border-color);
}

.filter-widget:last-child {
    border-bottom: none;
}

.widget-header {
    padding: 20px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 1px solid var(--border-color);
}

.widget-title {
    display: flex;
    align-items: center;
    gap: 10px;
    margin: 0;
    font-size: 1.1rem;
    font-weight: 600;
    color: var(--text-dark);
}

.widget-title i {
    color: var(--primary-color);
    font-size: 1rem;
}

.toggle-widget {
    background: none;
    border: none;
    color: var(--text-light);
    cursor: pointer;
    transition: var(--transition);
}

.toggle-widget:hover {
    color: var(--primary-color);
}

.widget-content {
    padding: 20px;
}

/* Category List */
.category-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.category-item {
    margin-bottom: 8px;
}

.category-link {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 15px;
    color: var(--text-dark);
    text-decoration: none;
    border-radius: var(--border-radius);
    transition: var(--transition);
}

.category-link:hover {
    background: var(--light-color);
    color: var(--primary-color);
}

.category-item.active .category-link {
    background: var(--primary-color);
    color: white;
}

.category-count {
    background: var(--light-color);
    color: var(--text-light);
    font-size: 0.8rem;
    padding: 2px 6px;
    border-radius: 10px;
    font-weight: 600;
}

.category-item.active .category-count {
    background: rgba(255, 255, 255, 0.2);
    color: white;
}

/* Price Filter */
.price-filter {
    padding: 10px 0;
}

.price-range-slider {
    position: relative;
    height: 5px;
    background: var(--border-color);
    border-radius: 5px;
    margin-bottom: 20px;
}

.price-slider {
    position: absolute;
    top: -5px;
    height: 15px;
    width: 100%;
    background: none;
    pointer-events: none;
    -webkit-appearance: none;
}

.price-slider::-webkit-slider-thumb {
    height: 15px;
    width: 15px;
    background: var(--primary-color);
    border-radius: 50%;
    cursor: pointer;
    pointer-events: all;
    -webkit-appearance: none;
}

.price-inputs {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;
    margin-bottom: 15px;
}

.price-input-group label {
    font-size: 0.9rem;
    color: var(--text-light);
    margin-bottom: 5px;
    display: block;
}

.price-input-group input {
    width: 100%;
    padding: 8px 12px;
    border: 1px solid var(--border-color);
    border-radius: var(--border-radius);
    font-size: 0.9rem;
    background: var(--light-color);
}

.apply-price-filter {
    width: 100%;
    background: var(--primary-color);
    color: white;
    border: none;
    padding: 10px;
    border-radius: var(--border-radius);
    font-weight: 600;
    cursor: pointer;
    transition: var(--transition);
}

.apply-price-filter:hover {
    background: var(--primary-dark);
}

/* Checkbox Group */
.checkbox-group {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.checkbox-item {
    display: flex;
    align-items: center;
}

.checkbox-item input[type="checkbox"] {
    display: none;
}

.checkbox-label {
    display: flex;
    align-items: center;
    gap: 10px;
    cursor: pointer;
    flex: 1;
    padding: 8px 0;
}

.checkmark {
    width: 18px;
    height: 18px;
    border: 2px solid var(--border-color);
    border-radius: 4px;
    position: relative;
    transition: var(--transition);
}

.checkmark::after {
    content: '';
    position: absolute;
    left: 5px;
    top: 2px;
    width: 6px;
    height: 10px;
    border: solid white;
    border-width: 0 2px 2px 0;
    transform: rotate(45deg);
    opacity: 0;
}

input[type="checkbox"]:checked + .checkbox-label .checkmark {
    background: var(--primary-color);
    border-color: var(--primary-color);
}

input[type="checkbox"]:checked + .checkbox-label .checkmark::after {
    opacity: 1;
}

.label-text {
    flex: 1;
    font-size: 0.95rem;
    color: var(--text-dark);
}

.item-count {
    font-size: 0.8rem;
    color: var(--text-light);
}

/* Top Products */
.top-products {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.top-product-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 10px;
    background: var(--light-color);
    border-radius: var(--border-radius);
    transition: var(--transition);
}

.top-product-item:hover {
    transform: translateY(-2px);
    box-shadow: var(--box-shadow);
}

.product-rank {
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
}

.product-image {
    width: 50px;
    height: 50px;
    border-radius: var(--border-radius);
    overflow: hidden;
}

.product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.product-info {
    flex: 1;
}

.product-name a {
    color: var(--text-dark);
    text-decoration: none;
    font-size: 0.9rem;
    font-weight: 600;
    line-height: 1.3;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.product-name a:hover {
    color: var(--primary-color);
}

.product-price {
    color: var(--primary-color);
    font-weight: 700;
    font-size: 0.9rem;
    margin: 2px 0;
}

.product-sold {
    color: var(--text-light);
    font-size: 0.8rem;
}

/* Filter Bar */
.filter-bar {
    background: white;
    padding: 20px;
    border-radius: var(--border-radius-lg);
    margin-bottom: 30px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    box-shadow: var(--box-shadow);
    flex-wrap: wrap;
    gap: 15px;
}

.filter-bar-left {
    display: flex;
    align-items: center;
    gap: 20px;
}

.results-count {
    color: var(--text-light);
    font-size: 0.9rem;
}

.filter-bar-right {
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
    background: white;
    border: none;
    cursor: pointer;
    transition: var(--transition);
    color: var(--text-light);
}

.view-btn.active,
.view-btn:hover {
    background: var(--primary-color);
    color: white;
}

.sort-select,
.show-select {
    padding: 8px 12px;
    border: 1px solid var(--border-color);
    border-radius: var(--border-radius);
    background: white;
    color: var(--text-dark);
    cursor: pointer;
    min-width: 150px;
}

/* Products Grid */
.products-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 30px;
    margin-bottom: 40px;
}

.products-grid[data-view="list"] {
    grid-template-columns: 1fr;
}

.product-card-modern {
    background: white;
    border-radius: var(--border-radius-lg);
    overflow: hidden;
    box-shadow: var(--box-shadow);
    transition: var(--transition);
    position: relative;
    border: 1px solid var(--border-color);
}

.product-card-modern:hover {
    transform: translateY(-5px);
    box-shadow: var(--box-shadow-lg);
    border-color: var(--primary-color);
}

.product-badges {
    position: absolute;
    top: 15px;
    left: 15px;
    z-index: 10;
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.badge {
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 11px;
    font-weight: 700;
    color: white;
}

.badge-new {
    background: var(--primary-color);
}

.badge-hot {
    background: var(--secondary-color);
}

.badge-sold {
    background: var(--accent-color);
}

.product-card-modern .product-image {
    position: relative;
    height: 250px;
    width: 100%;
    overflow: hidden;
}

.product-card-modern .product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.main-image {
    position: absolute;
    top: 0;
    left: 0;
}

.hover-image {
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.product-card-modern:hover .hover-image {
    opacity: 1;
}

.product-card-modern:hover .main-image {
    opacity: 0;
}

.product-actions {
    position: absolute;
    top: 15px;
    right: 15px;
    display: flex;
    flex-direction: column;
    gap: 8px;
    opacity: 0;
    transform: translateX(20px);
    transition: var(--transition);
}

.product-card-modern:hover .product-actions {
    opacity: 1;
    transform: translateX(0);
}

.action-btn {
    width: 40px;
    height: 40px;
    background: white;
    border: none;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: var(--box-shadow);
    transition: var(--transition);
    color: var(--text-dark);
    text-decoration: none;
}

.action-btn:hover {
    background: var(--primary-color);
    color: white;
    transform: scale(1.1);
}

.quick-add {
    position: absolute;
    bottom: 15px;
    left: 15px;
    right: 15px;
    opacity: 0;
    transform: translateY(20px);
    transition: var(--transition);
}

.product-card-modern:hover .quick-add {
    opacity: 1;
    transform: translateY(0);
}

.quick-add-btn {
    width: 100%;
    background: var(--primary-color);
    color: white;
    border: none;
    padding: 10px;
    border-radius: var(--border-radius);
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: var(--transition);
    text-decoration: none;
}

.quick-add-btn:hover {
    background: var(--primary-dark);
    color: white;
}

.quick-add-btn.disabled {
    background: var(--text-light);
    cursor: not-allowed;
}

.product-info {
    padding: 20px;
}

.product-category {
    color: var(--primary-color);
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    margin-bottom: 8px;
}

.product-title {
    margin-bottom: 10px;
}

.product-title a {
    color: var(--text-dark);
    text-decoration: none;
    font-size: 16px;
    font-weight: 600;
    line-height: 1.4;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    transition: var(--transition);
}

.product-title a:hover {
    color: var(--primary-color);
}

.product-rating {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 8px;
}

.stars i {
    color: #ddd;
    font-size: 14px;
}

.stars i.active {
    color: #fbbf24;
}

.rating-count {
    color: var(--text-light);
    font-size: 12px;
}

.product-origin {
    display: flex;
    align-items: center;
    gap: 6px;
    color: var(--text-light);
    font-size: 13px;
    margin-bottom: 12px;
}

.product-origin i {
    color: var(--accent-color);
}

.product-price {
    margin-bottom: 12px;
}

.current-price {
    font-size: 18px;
    font-weight: 700;
    color: var(--primary-color);
}

.original-price {
    text-decoration: line-through;
    color: var(--text-light);
    font-size: 14px;
    margin-left: 8px;
}

.discount-percent {
    background: var(--accent-color);
    color: white;
    font-size: 11px;
    padding: 2px 6px;
    border-radius: 4px;
    margin-left: 8px;
    font-weight: 600;
}

.product-features {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}

.feature-tag {
    display: flex;
    align-items: center;
    gap: 4px;
    background: var(--light-color);
    color: var(--text-light);
    font-size: 11px;
    padding: 4px 8px;
    border-radius: 12px;
    font-weight: 500;
}

.feature-tag i {
    font-size: 10px;
    color: var(--primary-color);
}

/* No Products */
.no-products {
    grid-column: 1 / -1;
    text-align: center;
    padding: 60px 20px;
    color: var(--text-light);
}

.no-products-icon i {
    font-size: 4rem;
    margin-bottom: 20px;
    opacity: 0.5;
}

.no-products h3 {
    font-size: 1.5rem;
    color: var(--text-dark);
    margin-bottom: 10px;
}

.btn-back-shop {
    background: var(--primary-color);
    color: white;
    padding: 12px 24px;
    border-radius: var(--border-radius);
    text-decoration: none;
    font-weight: 600;
    display: inline-block;
    margin-top: 20px;
    transition: var(--transition);
}

.btn-back-shop:hover {
    background: var(--primary-dark);
    color: white;
}

/* Pagination */
.pagination-wrapper {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: white;
    padding: 20px;
    border-radius: var(--border-radius-lg);
    box-shadow: var(--box-shadow);
    margin-top: 30px;
}

.pagination-info {
    color: var(--text-light);
    font-size: 0.9rem;
}

.pagination-modern .pagination {
    margin: 0;
}

.pagination .page-link {
    border: 1px solid var(--border-color);
    color: var(--text-dark);
    padding: 8px 12px;
    margin: 0 2px;
    border-radius: var(--border-radius);
    transition: var(--transition);
}

.pagination .page-link:hover,
.pagination .page-item.active .page-link {
    background: var(--primary-color);
    color: white;
    border-color: var(--primary-color);
}

/* Responsive */
@media (max-width: 1200px) {
    .products-grid {
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 20px;
    }
}

@media (max-width: 992px) {
    .shop-sidebar {
        margin-bottom: 30px;
    }
    
    .filter-bar {
        flex-direction: column;
        align-items: stretch;
    }
    
    .filter-bar-right {
        justify-content: space-between;
    }
    
    .products-grid {
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    }
}

@media (max-width: 768px) {
    .page-title {
        font-size: 2rem;
    }
    
    .shop-stats {
        justify-content: space-around;
        gap: 20px;
    }
    
    .filter-bar-right {
        flex-direction: column;
        gap: 10px;
    }
    
    .products-grid {
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 15px;
    }
    
    .pagination-wrapper {
        flex-direction: column;
        gap: 15px;
        text-align: center;
    }
}

@media (max-width: 576px) {
    .products-grid {
        grid-template-columns: 1fr;
    }
    
    .product-card-modern .product-image {
        height: 200px;
    }
    
    .view-mode {
        display: none;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Widget toggles
    const toggleButtons = document.querySelectorAll('.toggle-widget');
    toggleButtons.forEach(button => {
        button.addEventListener('click', function() {
            const widget = this.closest('.filter-widget');
            const content = widget.querySelector('.widget-content');
            const icon = this.querySelector('i');
            
            if (content.style.display === 'none') {
                content.style.display = 'block';
                icon.className = 'fa fa-chevron-down';
            } else {
                content.style.display = 'none';
                icon.className = 'fa fa-chevron-right';
            }
        });
    });

    // View mode toggle
    const viewButtons = document.querySelectorAll('.view-btn');
    const productsGrid = document.querySelector('.products-grid');
    
    viewButtons.forEach(button => {
        button.addEventListener('click', function() {
            const view = this.getAttribute('data-view');
            
            viewButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            productsGrid.setAttribute('data-view', view);
        });
    });

    // Price range slider
    const minPrice = document.getElementById('minPrice');
    const maxPrice = document.getElementById('maxPrice');
    const minPriceInput = document.getElementById('minPriceInput');
    const maxPriceInput = document.getElementById('maxPriceInput');

    function updatePriceInputs() {
        const min = parseInt(minPrice.value);
        const max = parseInt(maxPrice.value);
        
        if (min > max) {
            [minPrice.value, maxPrice.value] = [maxPrice.value, minPrice.value];
        }
        
        minPriceInput.value = new Intl.NumberFormat('vi-VN').format(minPrice.value) + '₫';
        maxPriceInput.value = new Intl.NumberFormat('vi-VN').format(maxPrice.value) + '₫';
    }

    if (minPrice && maxPrice) {
        minPrice.addEventListener('input', updatePriceInputs);
        maxPrice.addEventListener('input', updatePriceInputs);
        updatePriceInputs(); // Initial update
    }

    // Wishlist functionality
    const wishlistButtons = document.querySelectorAll('.wishlist-btn');
    wishlistButtons.forEach(button => {
        button.addEventListener('click', function() {
            const icon = this.querySelector('i');
            if (icon.classList.contains('fa-heart-o')) {
                icon.classList.remove('fa-heart-o');
                icon.classList.add('fa-heart');
                this.style.background = '#ef4444';
                this.style.color = 'white';
            } else {
                icon.classList.remove('fa-heart');
                icon.classList.add('fa-heart-o');
                this.style.background = '';
                this.style.color = '';
            }
        });
    });
});
</script>

@endsection
