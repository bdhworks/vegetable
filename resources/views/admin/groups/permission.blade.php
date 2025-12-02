@extends('admin.layout.be')

@section('content')
<div class="permission-page">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <div class="header-left">
                <h1 class="page-title">
                    <i class="ti ti-shield-check"></i>
                    Phân quyền cho {{ $group->name }}
                </h1>
                <nav class="breadcrumb-modern">
                    <ol>
                        <li><a href="{{ route('admin.dashboard') }}"><i class="ti ti-home"></i>Dashboard</a></li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li><a href="{{ route('group.index') }}">Nhóm người dùng</a></li>
                        <li><i class="ti ti-chevron-right"></i></li>
                        <li class="active">Phân quyền #{{ $group->id }}</li>
                    </ol>
                </nav>
            </div>
            <div class="header-right">
                <a href="{{ route('group.index') }}" class="btn-back">
                    <i class="ti ti-arrow-left"></i>
                    <span>Quay lại</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Info Banner -->
    <div class="info-banner">
        <div class="banner-icon">
            <i class="ti ti-info-circle"></i>
        </div>
        <div class="banner-content">
            <h3>Cấu hình Phân Quyền</h3>
            <p>Chọn các quyền truy cập cho nhóm <strong>{{ $group->name }}</strong>. Các thành viên trong nhóm sẽ có quyền tương ứng.</p>
        </div>
        <div class="banner-stats">
            <div class="stat-item">
                <i class="ti ti-users"></i>
                <span>{{ $group->admins ? $group->admins->count() : 0 }} thành viên</span>
            </div>
            <div class="stat-item">
                <i class="ti ti-puzzle"></i>
                <span>{{ $modules->count() }} module</span>
            </div>
        </div>
    </div>

    <!-- Permission Form -->
    <div class="content-card">
        <div class="card-header-custom">
            <div class="header-icon">
                <i class="ti ti-shield-lock"></i>
            </div>
            <div class="header-text">
                <h3 class="card-title-custom">Quản lý Quyền Truy Cập</h3>
                <p class="card-subtitle">Cấu hình chi tiết quyền cho từng module</p>
            </div>
            <div class="select-all-section">
                <label class="checkbox-modern">
                    <input type="checkbox" id="selectAll">
                    <span class="checkmark"></span>
                    <span class="label-text">Chọn tất cả</span>
                </label>
            </div>
        </div>

        <div class="card-body-custom">
            <form action="{{ route('group.storePermission', $group) }}" method="POST" id="permissionForm">
                @csrf
                
                <div class="modules-grid">
                    @foreach ($modules as $module)
                        <div class="module-card">
                            <div class="module-header">
                                <div class="module-info">
                                    <div class="module-icon">
                                        <i class="ti ti-{{ $module->name == 'groups' ? 'shield' : ($module->name == 'users' ? 'users' : ($module->name == 'products' ? 'shopping-cart' : 'puzzle')) }}"></i>
                                    </div>
                                    <div class="module-details">
                                        <h4>{{ $module->title }}</h4>
                                        <span class="module-name">{{ $module->name }}</span>
                                    </div>
                                </div>
                                <label class="checkbox-modern module-toggle">
                                    <input type="checkbox" class="module-checkbox" data-module="{{ $module->name }}">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            
                            <div class="permissions-grid">
                                @if (!empty($roles))
                                    @foreach ($roles as $roleName => $roleLabel)
                                        <label class="permission-item">
                                            <input type="checkbox" 
                                                   name="role[{{ $module->name }}][]" 
                                                   value="{{ $roleName }}"
                                                   class="permission-checkbox"
                                                   data-module="{{ $module->name }}"
                                                   {{ isRole($roleArr, $module->name, $roleName) ? 'checked' : '' }}>
                                            <span class="permission-box">
                                                <span class="permission-icon">
                                                    <i class="ti ti-{{ $roleName == 'view' ? 'eye' : ($roleName == 'add' ? 'plus' : ($roleName == 'edit' ? 'edit' : ($roleName == 'delete' ? 'trash' : 'toggle-right'))) }}"></i>
                                                </span>
                                                <span class="permission-label">{{ $roleLabel }}</span>
                                                <span class="permission-check">
                                                    <i class="ti ti-check"></i>
                                                </span>
                                            </span>
                                        </label>
                                    @endforeach
                                @endif
                                
                                @if ($module->name == 'groups')
                                    <label class="permission-item">
                                        <input type="checkbox" 
                                               name="role[{{ $module->name }}][]" 
                                               value="permission"
                                               class="permission-checkbox"
                                               data-module="{{ $module->name }}"
                                               {{ isRole($roleArr, $module->name, 'permission') ? 'checked' : '' }}>
                                        <span class="permission-box">
                                            <span class="permission-icon">
                                                <i class="ti ti-shield-check"></i>
                                            </span>
                                            <span class="permission-label">Phân quyền</span>
                                            <span class="permission-check">
                                                <i class="ti ti-check"></i>
                                            </span>
                                        </span>
                                    </label>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <button type="submit" class="btn-submit">
                        <i class="ti ti-device-floppy"></i>
                        <span>Lưu Phân Quyền</span>
                    </button>
                    <button type="button" class="btn-reset" onclick="resetForm()">
                        <i class="ti ti-refresh"></i>
                        <span>Đặt lại</span>
                    </button>
                    <a href="{{ route('group.index') }}" class="btn-cancel">
                        <i class="ti ti-x"></i>
                        <span>Hủy bỏ</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
/* Permission Page Specific Styles */
.permission-page {
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
    border-color: #8b5cf6;
    color: #8b5cf6;
    transform: translateX(-4px);
}

/* Info Banner */
.info-banner {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    border-radius: 1rem;
    padding: 1.5rem 2rem;
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
    gap: 1.5rem;
    box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2);
}

.banner-icon {
    width: 60px;
    height: 60px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 2rem;
    flex-shrink: 0;
}

.banner-content {
    flex: 1;
}

.banner-content h3 {
    color: white;
    font-size: 1.25rem;
    font-weight: 700;
    margin: 0 0 0.5rem 0;
}

.banner-content p {
    color: rgba(255, 255, 255, 0.9);
    margin: 0;
    font-size: 0.9375rem;
}

.banner-content strong {
    color: white;
    font-weight: 700;
}

.banner-stats {
    display: flex;
    gap: 1.5rem;
}

.stat-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    background: rgba(255, 255, 255, 0.2);
    padding: 0.75rem 1.25rem;
    border-radius: 0.75rem;
    color: white;
    font-weight: 600;
    font-size: 0.9375rem;
}

.stat-item i {
    font-size: 1.25rem;
}

/* Card Header Custom */
.card-header-custom {
    padding: 1.5rem 2rem;
    background: linear-gradient(135deg, #ede9fe 0%, #ddd6fe 100%);
    border-bottom: 2px solid #a78bfa;
    display: flex;
    align-items: center;
    gap: 1.5rem;
}

.header-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #8b5cf6, #7c3aed);
    border-radius: 0.75rem;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
}

.header-text {
    flex: 1;
}

.card-title-custom {
    font-size: 1.25rem;
    font-weight: 700;
    color: #6b21a8;
    margin: 0;
}

.card-subtitle {
    font-size: 0.875rem;
    color: #7c3aed;
    margin: 0.25rem 0 0 0;
}

.select-all-section {
    margin-left: auto;
}

.card-body-custom {
    padding: 2rem;
}

/* Checkbox Modern */
.checkbox-modern {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    cursor: pointer;
    user-select: none;
}

.checkbox-modern input {
    display: none;
}

.checkbox-modern .checkmark {
    width: 22px;
    height: 22px;
    border: 2px solid #d1d5db;
    border-radius: 0.375rem;
    background: white;
    position: relative;
    transition: all 0.3s ease;
}

.checkbox-modern input:checked + .checkmark {
    background: linear-gradient(135deg, #10b981, #059669);
    border-color: #10b981;
}

.checkbox-modern input:checked + .checkmark::after {
    content: '✓';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    font-size: 14px;
    font-weight: 700;
}

.checkbox-modern .label-text {
    font-size: 0.9375rem;
    font-weight: 600;
    color: #1f2937;
}

/* Modules Grid */
.modules-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(500px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

/* Module Card */
.module-card {
    background: white;
    border: 2px solid #e5e7eb;
    border-radius: 1rem;
    overflow: hidden;
    transition: all 0.3s ease;
}

.module-card:hover {
    border-color: #8b5cf6;
    box-shadow: 0 4px 12px rgba(139, 92, 246, 0.15);
}

.module-header {
    padding: 1.25rem 1.5rem;
    background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
    border-bottom: 2px solid #e5e7eb;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.module-info {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.module-icon {
    width: 45px;
    height: 45px;
    background: linear-gradient(135deg, #8b5cf6, #7c3aed);
    border-radius: 0.75rem;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.25rem;
}

.module-details h4 {
    margin: 0 0 0.25rem 0;
    font-size: 1rem;
    font-weight: 700;
    color: #1f2937;
}

.module-name {
    font-size: 0.8125rem;
    color: #6b7280;
    font-family: 'Courier New', monospace;
    background: #f3f4f6;
    padding: 0.125rem 0.5rem;
    border-radius: 0.25rem;
}

.module-toggle .checkmark {
    width: 24px;
    height: 24px;
}

/* Permissions Grid */
.permissions-grid {
    padding: 1.25rem;
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
    gap: 0.75rem;
}

.permission-item {
    cursor: pointer;
}

.permission-item input {
    display: none;
}

.permission-box {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.5rem;
    padding: 1rem 0.75rem;
    background: #f9fafb;
    border: 2px solid #e5e7eb;
    border-radius: 0.75rem;
    transition: all 0.3s ease;
    position: relative;
}

.permission-item:hover .permission-box {
    border-color: #8b5cf6;
    background: #f5f3ff;
}

.permission-item input:checked + .permission-box {
    background: linear-gradient(135deg, #ede9fe, #ddd6fe);
    border-color: #8b5cf6;
}

.permission-icon {
    width: 40px;
    height: 40px;
    background: white;
    border-radius: 0.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    color: #6b7280;
    transition: all 0.3s ease;
}

.permission-item input:checked + .permission-box .permission-icon {
    background: linear-gradient(135deg, #8b5cf6, #7c3aed);
    color: white;
}

.permission-label {
    font-size: 0.8125rem;
    font-weight: 600;
    color: #4b5563;
    text-align: center;
}

.permission-item input:checked + .permission-box .permission-label {
    color: #6b21a8;
}

.permission-check {
    position: absolute;
    top: 0.5rem;
    right: 0.5rem;
    width: 20px;
    height: 20px;
    background: #10b981;
    border-radius: 50%;
    display: none;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 12px;
}

.permission-item input:checked + .permission-box .permission-check {
    display: flex;
}

/* Form Actions */
.form-actions {
    display: flex;
    gap: 1rem;
    padding-top: 2rem;
    border-top: 2px solid #e5e7eb;
    flex-wrap: wrap;
}

.btn-submit,
.btn-reset,
.btn-cancel {
    padding: 0.875rem 2rem;
    border-radius: 0.5rem;
    font-weight: 600;
    font-size: 0.9375rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    text-decoration: none;
}

.btn-submit {
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
}

.btn-submit:hover {
    background: linear-gradient(135deg, #059669, #047857);
    transform: translateY(-2px);
    box-shadow: 0 8px 16px rgba(16, 185, 129, 0.3);
}

.btn-reset {
    background: linear-gradient(135deg, #3b82f6, #2563eb);
    color: white;
}

.btn-reset:hover {
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
    transform: translateY(-2px);
    box-shadow: 0 8px 16px rgba(59, 130, 246, 0.3);
}

.btn-cancel {
    background: white;
    color: #6b7280;
    border: 2px solid #e5e7eb;
}

.btn-cancel:hover {
    border-color: #ef4444;
    color: #ef4444;
    transform: translateY(-2px);
}

/* Responsive */
@media (max-width: 1024px) {
    .modules-grid {
        grid-template-columns: 1fr;
    }
    
    .info-banner {
        flex-direction: column;
        text-align: center;
    }
    
    .banner-stats {
        width: 100%;
        justify-content: center;
    }
}

@media (max-width: 768px) {
    .permission-page {
        padding: 1rem;
    }
    
    .info-banner {
        padding: 1.25rem 1.5rem;
    }
    
    .banner-stats {
        flex-direction: column;
        width: 100%;
    }
    
    .stat-item {
        justify-content: center;
    }
    
    .card-header-custom {
        flex-direction: column;
        text-align: center;
    }
    
    .select-all-section {
        margin-left: 0;
    }
    
    .permissions-grid {
        grid-template-columns: repeat(auto-fill, minmax(110px, 1fr));
        gap: 0.5rem;
    }
    
    .form-actions {
        flex-direction: column;
    }
    
    .btn-submit,
    .btn-reset,
    .btn-cancel {
        width: 100%;
        justify-content: center;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Select all functionality
    const selectAllCheckbox = document.getElementById('selectAll');
    const allPermissionCheckboxes = document.querySelectorAll('.permission-checkbox');
    
    if (selectAllCheckbox) {
        selectAllCheckbox.addEventListener('change', function() {
            allPermissionCheckboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });
    }
    
    // Module toggle - check/uncheck all permissions in a module
    document.querySelectorAll('.module-checkbox').forEach(moduleCheckbox => {
        moduleCheckbox.addEventListener('change', function() {
            const moduleName = this.dataset.module;
            const modulePermissions = document.querySelectorAll(`.permission-checkbox[data-module="${moduleName}"]`);
            modulePermissions.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });
    });
    
    // Update module checkbox when permissions change
    document.querySelectorAll('.permission-checkbox').forEach(permCheckbox => {
        permCheckbox.addEventListener('change', function() {
            const moduleName = this.dataset.module;
            const modulePermissions = document.querySelectorAll(`.permission-checkbox[data-module="${moduleName}"]`);
            const moduleCheckbox = document.querySelector(`.module-checkbox[data-module="${moduleName}"]`);
            
            if (moduleCheckbox) {
                const allChecked = Array.from(modulePermissions).every(cb => cb.checked);
                const someChecked = Array.from(modulePermissions).some(cb => cb.checked);
                
                moduleCheckbox.checked = allChecked;
                moduleCheckbox.indeterminate = someChecked && !allChecked;
            }
        });
    });
    
    // Initialize module checkboxes state
    document.querySelectorAll('.module-checkbox').forEach(moduleCheckbox => {
        const moduleName = moduleCheckbox.dataset.module;
        const modulePermissions = document.querySelectorAll(`.permission-checkbox[data-module="${moduleName}"]`);
        const allChecked = Array.from(modulePermissions).every(cb => cb.checked);
        const someChecked = Array.from(modulePermissions).some(cb => cb.checked);
        
        moduleCheckbox.checked = allChecked;
        moduleCheckbox.indeterminate = someChecked && !allChecked;
    });
    
    // Form submission
    document.getElementById('permissionForm').addEventListener('submit', function(e) {
        SwalHelper.loading('Đang lưu phân quyền...', 'Vui lòng đợi trong giây lát');
    });
});

// Reset form function
function resetForm() {
    SwalHelper.confirm(
        'Đặt lại phân quyền?',
        '<p style="margin-bottom: 1rem;">Bạn có chắc chắn muốn bỏ chọn tất cả các quyền?</p>',
        function() {
            document.querySelectorAll('.permission-checkbox').forEach(checkbox => {
                checkbox.checked = false;
            });
            document.querySelectorAll('.module-checkbox').forEach(checkbox => {
                checkbox.checked = false;
                checkbox.indeterminate = false;
            });
            SwalHelper.success('Đã đặt lại!', 'Tất cả quyền đã được bỏ chọn');
        }
    );
}
</script>

@endsection