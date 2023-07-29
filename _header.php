<header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row  d-flex justify-content-center">
            <div class="col-12 col-md-4 py-4">
              <h4 class="text-white text-center">Menu</h4>
                <ul class="nav flex-column text-center">
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
                      <a class="nav-link" href="sections.php">
                          <span data-feather="users"></span>
                          Add Sections
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#">
                          <span data-feather="layers"></span>
                          Yearly Reports
                      </a>
                  </li>
                </ul>
            </div>
            <div class="col-12 col-md-4 py-4">
                <h4 class="text-white text-center">Menu</h4>
                <ul class="nav flex-column text-center">
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
            <div class="col-12 col-md-4 py-4">
              <h4 class="text-white text-center">Account</h4>
              <ul class="list-unstyled text-center">
                <?php 
                    if(isset($_SESSION["userID"]))
                    {
                ?>
                <li>
                  <i class="fas fa-sign-out-alt text-white"></i>
                  <a href="includes/logout.php" class="px-2 text-white"
                    >Sign out</a
                  >
                </li>
                <?php } else { ?>
                <li>
                  <i class="fas fa-sign-in-alt text-white"></i>
                  <a
                    class="px-2 text-white"
                    href="#"
                    data-bs-toggle="modal"
                    data-bs-target="#loginModal"
                    >Sign in
                  </a>
                </li>
                <li>
                  <i class="fas fa-user-plus text-white"></i>
                  <a
                    class="px-2 text-white"
                    href="#"
                    data-bs-toggle="modal"
                    data-bs-target="#memberModal"
                    >Sign up
                  </a>
                </li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-light navbarbg shadow-sm">
        <div class="container">
          <a href="#" class="navbar-brand d-flex align-items-center">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="20"
              height="20"
              fill="none"
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              aria-hidden="true"
              class="me-2"
              viewBox="0 0 24 24"
            >
              <path
                d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"
              />
              <circle cx="12" cy="13" r="4" />
            </svg>
            <strong>PocketSaver</strong>
          </a>
          <?php 
        if(isset($_SESSION["userID"]))
        {
            echo "USER ID : ". $_SESSION["userID"]. " Welcome";
            // echo $_SESSION['idx'];
        }
        ?>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarHeader"
            aria-controls="navbarHeader"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header>