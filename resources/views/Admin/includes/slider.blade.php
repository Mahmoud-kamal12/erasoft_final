<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{asset($setting->logo)}}"  class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Fashion</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
            <ul>
                <li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Default</a>
                </li>
            </ul>
        </li>

        <li class="menu-label">All Pages</li>

        <li>
            <a href="{{route('admin.categories.index')}}">
                <div class="parent-icon"><i class='bx bx-grid-alt'></i>
                </div>
                <div class="menu-title">Categories</div>
            </a>
        </li>

        <li>
            <a href="{{route('admin.blog.index')}}">
                <div class="parent-icon"><i class='bx bx-photo-album'></i>
                </div>
                <div class="menu-title">Blog</div>
            </a>
        </li>


        <li>
            <a href="{{route('admin.products.index')}}">
                <div class="parent-icon"><i class='bx bx-layer'></i>
                </div>
                <div class="menu-title">Products</div>
            </a>
        </li>

        <li>
            <a href="{{route('admin.orders.index')}}">
                <div class="parent-icon"><i class='bx bx-shopping-bag'></i>
                </div>
                <div class="menu-title">Orders</div>
            </a>
        </li>

    </ul>
    <!--end navigation-->
</div>
