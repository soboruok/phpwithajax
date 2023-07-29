<?php 
session_start();  

include './includes/db.php';
include './includes/lib.php';

// 사용자가 로그인되어 있지 않은 경우, 로그인 페이지로 리디렉션합니다.
if (!isUserLoggedIn()) {
  header("Location: ./main.php");
  exit();
}

$idx = $_SESSION['idx'];

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

    <link
      rel="canonical"
      href="https://getbootstrap.com/docs/5.0/examples/dashboard/"
    />

    <!-- Bootstrap core CSS -->
    <link
      href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link href="dashboard.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet" />

    <style>
      .nav-item a {
        color: #eee;
        text-decoration: none;
      }

      .nav-item a:hover {
        text-decoration: none;
        color: #ccc;
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
    
     <!-- fontawesome -->
     <script
      src="https://kit.fontawesome.com/9eb162ac0d.js"
      crossorigin="anonymous"
    ></script>
     <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
    
    <!-- modal ajax -->
    <script src="./js/loginform.js" defer></script> 
    <script src="./js/sectionform.js" defer></script>

  </head>
  <body>
    <?php include "./_header.php" ?>
    <div class="container">
      <div class="row">
        <?php include "./_nav.php" ?>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
          >
            <h1 class="h2">Add Sections</h1>
          </div>
          
          <div class="table-responsive">
            <form id="sectionForm">
              <input type="hidden" name="uidx" value="<?php echo $_SESSION['idx'] ?>">
              <p id="productErrorMessage"  class="btn-success"></p>

                <div class="input-group mb-3">
                <select name="bcategory" id="bcategory" class="form-select form-select-md" onchange="updateSections()">
                  <option selected disabled>Select Category</option>
                  <option value="PROPERTY">PROPERTY</option>
                  <option value="WORK">WORK</option>
                  <option value="INCOME">INCOME</option>
                  <option value="Share">Share</option>
                  <option value="Donation">Donation</option>
                </select>
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="bsection">Section</span>
                  <input type="text"  name="bsection" id="bsection" class="form-control">
                </div>
                
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>


            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">userIDNumber</th>
                        <th scope="col">Category</th>
                        <th scope="col">Section</th>
                    </tr>
                </thead>
                <tbody  class="product-list">
                    <p id="delresult"></p>
                    <?php
                    // Check if the search form is submitted
                    $sql = "SELECT * FROM sections 
                            WHERE uidx = $idx 
                            ORDER BY bcategory ASC";
                    // echo $sql; 
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) > 0) 
                    {
                        while($row = mysqli_fetch_array($result)) 
                        { 
                    ?>
                    <tr class="product">
                        <td><?php echo $row["uidx"]?></td>
                        <td><?php echo $row["bcategory"]?></td>
                        <td><?php echo $row["bsection"]?></td>
                    </tr>
                    <?php 
                        } //end while
                    } //end if
                    ?> 
                </tbody>
            </table>
          </div>
        </main>
        <?php include "./_footer.php" ?>
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
