<?php 
session_start();  

include './includes/db.php';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta
      name="author"
      content="Mark Otto, Jacob Thornton, and Bootstrap contributors"
    />
    <meta name="generator" content="Hugo 0.84.0" />
    <title>PocketSaver</title>

    <!-- <link
      rel="canonical"
      href="https://getbootstrap.com/docs/5.0/examples/album/"
    /> -->

    <script
      src="https://kit.fontawesome.com/9eb162ac0d.js"
      crossorigin="anonymous"
    ></script>

    <!-- Bootstrap core CSS -->
    <link
      href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />

    <meta name="theme-color" content="#7952b3" />

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <link href="style.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
    <!-- modal ajax -->
    <script src="./js/memberform.js" defer></script> 
    <script src="./js/loginform.js" defer></script> 
  </head>
  <body>
    <header>
      <div class="collapse bg-dark" id="navbarHeader">
          <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
              <h4 class="text-white">About</h4>
              <p class="text-muted">
                Inflation era! To save money, Write your daily household account
                book. It allows you to track where and how much money you spent,
                helping you reduce unnecessary expenses. Additionally,
                organizing receipts daily enables you to file your taxes
                quickly.
                <span class="redtext"
                  >*If a receipt is for tax returns, simply check the tax
                  returns box when you add your receipts</span
                >
              </p>
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
              <h4 class="text-white">Account</h4>
              <ul class="list-unstyled">
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

    <main>
      <section id="home" class="py-7 text-center container">
        <div class="row py-lg-5">
          <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Keeping a daily expense log!</h1>
            <p class="lead text-muted">
              Your Financial Companion in the Inflation Era! Always together,
              wherever you go – the household account book for the inflation
              era, the shortcut to saving money
              <!-- </p>
            <p>
              <a href="#" class="btn btn-primary my-2">Main call to action</a>
              <a href="#" class="btn btn-secondary my-2">Secondary action</a>
            </p> -->
            </p>
          </div>
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">
          <!-- START THE FEATURETTES -->
          <div class="row featurette">
            <div class="col-md-7">
              <h2 class="featurette-heading">
                Take photos and keep records!
                <i class="fas fa-camera-retro camera-icon"></i>
                <!-- <span class="text-muted">It’ll blow your mind.</span> -->
              </h2>
              <p class="lead">
                By keeping daily records, you can identify where unnecessary
                expenses occur and save money
              </p>
            </div>
            <div class="col-md-5">
              <img src="./imgs/img_box1.jpg" class="mainboximg1" />
            </div>
          </div>

          <hr class="featurette-divider" />

          <div class="row featurette">
            <div class="col-md-7 order-md-2">
              <h2 class="featurette-heading">
                Money saved is money earned
                <i class="fas fa-piggy-bank piggy-bank-icon"></i>
              </h2>
              <p class="lead">
                Through organized receipt management, we can achieve savings and
                financial goals.
              </p>
            </div>
            <div class="col-md-5 order-md-1">
              <div class="col-md-5">
                <img src="./imgs/img_box1.jpg" class="mainboximg1" />
              </div>
            </div>
          </div>

          <hr class="featurette-divider" />

          <div class="row featurette">
            <div class="col-md-7">
              <h2 class="featurette-heading">
                Tax returns become easier.
                <i class="fas fa-file-invoice-dollar tax-return-icon"></i>
              </h2>
              <p class="lead">
                With such records, there is no need for separate organizing when
                filing for tax returns later.
              </p>
            </div>
            <div class="col-md-5">
              <div class="col-md-5">
                <img src="./imgs/img_box1.jpg" class="mainboximg1" />
              </div>
            </div>
          </div>
        </div>
        <!-- /END THE FEATURETTES -->
      </div>
    </main>

    <?php include "./_footer.php" ?>

    <script
      src="https://getbootstrap.com/docs/5.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>

    <!-- Sign in Modal -->
    <?php include "./_loginModal.php" ?>

    <!-- Sign up Modal -->
    <?php include "./_memberModal.php" ?>
  </body>
</html>
