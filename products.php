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
    <title>Dashboard Template · Bootstrap v5.0</title>

    <link
      rel="canonical"
      href="https://getbootstrap.com/docs/5.0/examples/dashboard/"
    />

    <!-- Bootstrap core CSS -->
    <link
      href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />

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

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet" />
    <link href="index.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
    
    <!-- modal ajax -->
    <script src="./js/memberform.js" defer></script> 
    <script src="./js/loginform.js" defer></script> 
    <script src="./js/productformProcess.js" defer></script>
    
  </head>
  <body>
    <?php include "./_header.php" ?>
    <div class="container-fluid">
      <div class="container">
        <div class="row">
          <?php include "./_nav.php" ?>
          <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div
              class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
            >
              <h1 class="h2">Adding Product</h1>
            </div>
            
            
          
            <div class="table-responsive">
            <form id="productForm" enctype="multipart/form-data">
            <p id="productErrorMessage">dd</p>
                <select name="category" id="category" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                  <option selected>Select Brand</option>
                    <option value="Swiss">Swiss</option>
                    <option value="blacmore">Blackmore</option>
                    
                </select>
                <select name="section" id="section" class="form-select" aria-label="Default select example">
                    <option value="" selected>Select Section</option>
                    <option value="vitaminc">vitamin C</option>
                    <option value="vitamind">vitamin D</option>
                </select>
                <br>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="title">Title</span>
                  <input type="text"  name="title" id="title" class="form-control" aria-label="Sizing example input" aria-describedby="price">
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="price">Price</span>
                  <input type="text"  name="price" id="price" class="form-control" aria-label="Sizing example input" aria-describedby="price">
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="qty">Q'ty</span>
                  <input type="text"  name="qty" id="qty" class="form-control" aria-label="Sizing example input" aria-describedby="qty">
                </div>
                <div class="mb-3">
                  <input class="form-control" type="file" id="photo" name="photo">
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="memo">Memo</span>
                  <textarea class="form-control" id="memo"  name="memo" placeholder="memo" required></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </main>
        </div>
      </div>
    </div>

    <script src="https://getbootstrap.com/docs/5.0/dist/js/bootstrap.bundle.min.js"></script>

    <script
      src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
      integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
      crossorigin="anonymous"
    ></script>
    

    <!-- Sign in Modal -->
    <?php include "./_loginModal.php" ?>

    <!-- Sign up Modal -->
    <?php include "./_memberModal.php" ?>

    
  </body>
</html>
