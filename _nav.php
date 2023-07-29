<nav
    id="sidebarMenu"
    class="col-md-3 col-lg-2 d-md-block bg-dark collapse"
>
    <div class="position-sticky pt-3">
    <ul class="nav flex-column">
        
        <li class="nav-item">
            <a class="nav-link" href="#">
            <i class="fas fa-list-ul"></i> 
               <?php echo date("Y") ?> List
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="products.php">
            <i class="fas fa-plus"></i>
                Add Receipt
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="productslist.php">
            <i class="fas fa-list-ul"></i> 
                List Receipts
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="sections.php">
            <i class="fas fa-plus"></i>
                Add Sections
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="#">
            <i class="fas fa-file-alt"></i>
                Yearly Reports
            </a>
        </li>
    </ul>

    <h6
        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"
    >
        <span>Saved reports</span>
        <a class="link-secondary" href="#" aria-label="Add a new report">
        <span data-feather="plus-circle"></span>
        </a>
    </h6>
    <ul class="nav flex-column mb-2">
        <li class="nav-item">
        <a class="nav-link" href="#">
        <i class="fas fa-file-alt"></i>
            Current month
        </a>
        </li>
        
        <li class="nav-item">
        <a class="nav-link" href="#">
        <i class="fas fa-file-alt"></i>
            Past Data List
        </a>
        </li>

        
        <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-newspaper"></i>
            Social engagement
        </a>
        </li>
    </ul>
    </div>
</nav>