<nav class="navbar navbar-dark bg-dark text-light navbar-expand-sm px-5">
    <button data-bs-toggle="collapse" data-bs-target="#leftMenu" class="navbar-toggler">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="leftMenu">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a data-icon="&#xf0d7" href="/trangchu" class="btn rounded-0 {{ Route::current()->uri == 'trangchu' ? 'active' : '' }}">Trang chủ</a>
            </li>
            <li class="nav-item">
                <a data-icon="&#xf0d7" href="/sanpham" class="btn rounded-0 {{ Route::current()->uri == 'sanpham' ? 'active' : '' }}">Sản phẩm</a>
            </li>
            <li class="nav-item">
                <a data-icon="&#xf0d7" href="/tintuc" class="btn rounded-0 {{ Route::current()->uri == 'tintuc' ? 'active' : '' }}">Tin tức</a>
            </li>
            <li class="nav-item">
                <a data-icon="&#xf0d7" href="/gioithieu" class="btn rounded-0 {{ Route::current()->uri == 'gioithieu' ? 'active' : '' }}">Giới thiệu</a>
            </li>
            <li class="nav-item">
                <a data-icon="&#xf0d7" href="/component" class="btn rounded-0 {{ Route::current()->uri == 'component' ? 'active' : '' }}">Component Demo</a>
            </li>
        </ul>
    </div>
</nav>