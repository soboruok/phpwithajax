<?php 
session_start();  

include 'includes/db.php';
include 'includes/lib.php';

// 사용자가 로그인되어 있지 않은 경우, 로그인 페이지로 리디렉션합니다.
if (!isUserLoggedIn()) {
  header("Location: ./main.php");
  exit();
}

$productId = $_GET['productId'];
$sql = "SELECT * FROM products WHERE pid = '$productId'";
$result = mysqli_query($con, $sql);


// Fetch the data and send it back as a JSON response
if ($result) {
    // Fetch the data for the selected product
    $row = mysqli_fetch_assoc($result);
    
    // Access the data using the column names
    $category = $row['category'];
    $section = $row['section'];
    $title = $row['title'];
    $price = $row['price'];
    $qty = $row['qty'];
    $photo = $row['photo'];
    $memo = $row['memo'];
    
} else {
    // Handle the case when the query fails
    echo "Failed to fetch product data: " . mysqli_error($con);
}
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
    <!-- Bootstrap core CSS -->
    <link
      href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <!-- Custom CSS -->
    <link href="css/custom.css" rel="stylesheet" />
    <link href="dashboard.css" rel="stylesheet" />
    <link href="style.css" rel="stylesheet" />
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
    
    
     <!-- fontawesome -->
     <script
      src="https://kit.fontawesome.com/9eb162ac0d.js"
      crossorigin="anonymous"
    ></script>
     <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
    
    <!-- modal ajax -->
    <script src="./js/producteditProcess.js" defer></script>

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
            <h1 class="h2">Updating Product</h1>
          </div>
          
          <div class="table-responsive">
          <form id="producteditform" enctype="multipart/form-data">
            <input type="hidden" name="productId" value="<?php echo $productId ?>">
            <p id="productErrorMessage"></p>
              <div class="input-group mb-3">
                <span class="input-group-text" id="category">Category</span>
                <input type="text" value="<?php echo $category ?>" name="category" id="category" class="form-control" disabled>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="section">Section</span>
                <input type="text" value="<?php echo $section ?>" name="section" id="section" class="form-control" disabled>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="title">Title</span>
                <input type="text" value="<?php echo $title ?>" name="title" id="title" class="form-control">
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="price">Price</span>
                <input type="text" value = "<?php echo $price ?>" name="price" id="price" class="form-control">
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="qty">Q'ty</span>
                <input type="text" value = "<?php echo $qty ?>" name="qty" id="qty" class="form-control">
              </div>
              <div class="mb-3">
                <input class="form-control" type="file" id="photo" name="photo">
                <p><img src="productImg/<?php echo $photo ?>" /></p>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="memo">Memo</span>
                <textarea class="form-control" id="memo"  name="memo" placeholder="memo" required><?php echo $memo ?></textarea>
              </div>
              
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
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
