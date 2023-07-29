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
    <title>Pocket Saver</title>

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
      .nav-item a {
        color: #eee;
        text-decoration: none;
      }

      .nav-item a:hover {
        text-decoration: underline;
        color: #666;
      }
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
    <?php include "./_header.php" ?>

    <div class="container">
      <div class="row">
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

          <div class="album py-5">
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
                  <img src="./imgs/img_box4.jpg" width="300" height="300" />
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
                    <img src="./imgs/img_box2.jpg"  width="300" height="300" />
                  </div>
                </div>
              </div>

              <hr class="featurette-divider" />

              <div class="row featurette justify-content-center">
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
                    <img src="./imgs/img_box3.jpg" width="500" height="300" />
                  </div>
                </div>
              </div>
            </div>
            <!-- /END THE FEATURETTES -->
          </div>
        </main>
      </div>
    </div>

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
