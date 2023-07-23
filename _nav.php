<nav
    id="sidebarMenu"
    class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse"
>
    <div class="position-sticky pt-3">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
                <span data-feather="home"></span>
                Dashboard
            </a>
        </li>
        <li class="nav-item p-2">
        <?php 
        if(isset($_SESSION["userID"]))
        {
            echo "USER ID : ". $_SESSION["userID"]. " Welcome";
            echo $_SESSION['idx'];
        }
        ?>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <span data-feather="file"></span>
               <?php echo date("Y") ?> Expense List
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="products.php">
                <span data-feather="shopping-cart"></span>
                Add Receipt
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="productslist.php">
                <span data-feather="shopping-cart"></span>
                List Receipts
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="#">
                <span data-feather="users"></span>
                Add Brands
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="#">
                <span data-feather="layers"></span>
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
            <span data-feather="file-text"></span>
            Current month
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Last quarter
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Social engagement
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Year-end sale
        </a>
        </li>
    </ul>
    </div>
</nav>