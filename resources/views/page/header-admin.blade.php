<aside id="sidebar" class="bg-light border-end vh-100 p-3">
    <div class="h-100 d-flex flex-column">
        <!-- Sidebar Logo -->
        <div class="sidebar-logo mb-4">
            <a href="{{ route('home') }}" class="text-decoration-none text-dark fw-bold fs-4">Khang</a>
        </div>
        
        <!-- Sidebar Navigation -->
        <ul class="nav flex-column">
            <li class="nav-item">
                <div class="sidebar-header text-uppercase text-muted fw-bold mb-2">
                    Admin
                </div>
            </li>
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link text-dark">
                    <i class="fa-solid fa-list pe-2"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('products.index') }}" class="nav-link text-dark">
                    <i class="fa-solid fa-fire pe-2"></i>
                    Products
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('categories.index') }}" class="nav-link text-dark">
                    <i class="fa-solid fa-border-all pe-2"></i>
                    Category
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-dark">
                    <i class="fa-solid fa-file-lines pe-2"></i>
                    User
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('order') }}" class="nav-link text-dark">
                    <i class="fa-solid fa-file-lines pe-2"></i>
                    Order
                </a>
            </li>
        </ul>
        
        <!-- Spacer to push content to the bottom -->
        <div class="mt-auto">
            <!-- Additional content like logout or profile links can go here -->
        </div>
    </div>
</aside>
