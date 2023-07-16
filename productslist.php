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
    <!-- Custom CSS -->
    <link href="css/custom.css" rel="stylesheet" />
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
    <script src="./js/productform.js" defer></script>
    <script src="./js/deleteform.js" defer></script>
    <script src="./js/producteditform.js" defer></script>   <!--move to product Edit form -->
    
  </head>
  <body>
    <?php include "./_header.php" ?>
    <div class="container-fluid">
      <div class="row">
        <?php include "./_nav.php" ?>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
          >
            <h1 class="h2"> List Product</h1>
          </div>
          
         
          <div class="table-responsive">
            <div class="container">
                <div class="row">
                    <div class="col">
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
                                $sql ="select * from products 
                                ORDER BY created_at DESC";
                                $result = mysqli_query($con, $sql);
                                if (mysqli_num_rows($result) > 0) 
                                {
                                    while($row = mysqli_fetch_array($result)) 
                                    { 
                                ?>
                                <tr class="product" data-pid="<?php echo $row["pid"]?>">
                                    <th scope="row"><?php echo substr($row["created_at"],0,7)?></th>
                                    <td><?php echo $row["display"]?></td>
                                    <td><?php echo $row["category"]?></td>
                                    <td><?php echo $row["section"]?></td>
                                    <td><?php echo $row["title"]?></td>
                                    <td><?php echo $row["price"]?></td>
                                    <td><?php echo $row["qty"]?></td>
                                    <td><img src="productImg/<?php echo $row["photo"]?>" class="img_list"/></td>
                                    <td><?php echo substr($row["memo"],0,30) ?></td>
                                    <td>
                                        <a href="#" data-pid="<?php echo $row["pid"]?>" id="productEditForm" class="btn btn-success">Edit</a>
                                        <a href="#" data-pid="<?php echo $row["pid"]?>" id="productDel" class="btn btn-danger">Delete</a>
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
