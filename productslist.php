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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
    <!-- modal ajax -->
    <script src="./js/productform.js" defer></script>
    <script src="./js/deleteform.js" defer></script>
    <script src="./js/producteditform.js" defer></script>   <!--move to product Edit form -->
    
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
            <h1 class="h2"> List Receipts</h1>
          </div>
          
         
          <div class="table-responsive">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <form id="searchForm" class="mb-3">
                          <div class="input-group">
                              <span class="input-group-text">Title Search</span>    
                              <input type="text" class="form-control" id="searchInput" name="search" placeholder="Search...">
                              <button type="submit" class="btn btn-primary">Search</button>
                          </div>
                        </form>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">Display</th>
                                    <th scope="col">category</th>
                                    <th scope="col">section</th>
                                    <th scope="col">title</th>
                                    <th scope="col">price</th>
                                    <th scope="col">qty</th>
                                    <th scope="col">photo</th>
                                    <th scope="col">memo</th>
                                    <th scope="col">Edit/Del</th>
                                </tr>
                            </thead>
                            <tbody  class="product-list">
                                <p id="delresult"></p>
                                <?php
                                // Check if the search form is submitted
                                if (isset($_GET['search']) && !empty($_GET['search'])) {
                                  $search_query = $_GET['search'];
                                  // Use the search query in the SQL statement
                                  $sql = "SELECT * FROM products 
                                          WHERE  uidx= $idx and title LIKE '%$search_query%'
                                          ORDER BY created_at DESC";
                                } else {
                                    $sql = "SELECT * FROM products 
                                            WHERE uidx = $idx 
                                            ORDER BY created_at DESC";
                                }
                                
                                // echo $sql; 
                                $result = mysqli_query($con, $sql);
                                if (mysqli_num_rows($result) > 0) 
                                {
                                    while($row = mysqli_fetch_array($result)) 
                                    { 
                                ?>
                                <tr class="product" data-pid="<?php echo $row["pid"]?>">
                                    <th scope="row"><?php echo substr($row["created_at"],0,10)?></th>
                                    <td><?php echo $row["display"]?></td>
                                    <td><?php echo $row["category"]?></td>
                                    <td><?php echo $row["section"]?></td>
                                    <td><?php echo $row["title"]?></td>
                                    <td><?php echo $row["price"]?></td>
                                    <td><?php echo $row["qty"]?></td>
                                    <td><img src="productImg/<?php echo $row["photo"]?>" class="img_list"/></td>
                                    <td><?php echo substr($row["memo"],0,30) ?></td>
                                    <td>
                                        <a href="#" data-pid="<?php echo $row["pid"]?>" id="productEditForm" class="btn btn-sm btn-success">Edit</a>
                                        <a href="#" data-pid="<?php echo $row["pid"]?>" id="productDel" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                                <?php 
                                    } //end while
                                } //end if
                                ?> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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

    <!-- Alert Modal -->
    <?php include "./_alertModal.php" ?>


    
  </body>
</html>
