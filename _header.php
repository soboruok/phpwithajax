<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"
    >My Tax Record</a
    >
    <button
    class="navbar-toggler position-absolute d-md-none collapsed"
    type="button"
    data-bs-toggle="collapse"
    data-bs-target="#sidebarMenu"
    aria-controls="sidebarMenu"
    aria-expanded="false"
    aria-label="Toggle navigation"
    >
    <span class="navbar-toggler-icon"></span>
    </button>
    <input
    class="form-control form-control-dark w-100"
    type="text"
    placeholder="Search"
    aria-label="Search"
    />
    <div class="navbar-nav d-flex flex-row">
    <!-- <div class="nav-item text-nowrap">
        <a class="nav-link px-3" href="#">Sign out</a>
    </div> -->
    <div class="nav-item text-nowrap">
    <?php 
        if(isset($_SESSION["userID"]))
        {
    ?>
        <a href="includes/logout.php" >Sign Out</a>
    <?php } else { ?>
        <a class="px-2" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Sign in
        </a>
        <a class="px-2" href="#" data-bs-toggle="modal" data-bs-target="#memberModal">Sign up
        </a>
    <?php } ?>
    
    </div>
    


    </div>
</header>