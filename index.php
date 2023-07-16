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
    
    <!-- <script src="./js/account.js" defer></script> -->
    <script>
    
    $(document).ready(function () {
        // singup
        $("#memberForm").submit(function (e) {
            e.preventDefault();
            var userID = $("#userID").val();
            var userEmail = $("#userEmail").val();
            var userPassword = $("#userPassword").val();
            var rePassword = $("#rePassword").val();
            console.log(userEmail);
            // Make an AJAX request
            $.ajax({
            url: "./includes/member.php", // Replace with the actual PHP script URL for login validation
            method: "POST",
            data: { userID: userID, userEmail: userEmail, userPassword: userPassword, rePassword: rePassword },
            success: function (response) {
                console.log(response);
                if (!response) {
                    $("#memberModel").modal("hide"); // Hide the login modal
                    window.location.href = "index.php";
                } else {
                    var errorMessage = response;
                    //JSON.parse() 함수를 사용합니다. 이 함수는 JSON 형식의 문자열을 JavaScript 객체로 변환
                    var errorMessage = JSON.parse(errorMessage);
                    $('.membererrorMessage').text(errorMessage.error);
                    $('#memberModel').modal('show');
                }
                
            },
            error: function (xhr, status, error) {
                // Error handling for the AJAX request
                alert(error);
            },
            });
        });

        //login  
        $("#loginForm").submit(function (e) {
            e.preventDefault();
            var loginUserId = $("#loginUserId").val();
            var loginUserPassword = $("#loginUserPassword").val();

            // Make an AJAX request 
            $.ajax({
                url: "includes/login.php", // Replace with the actual PHP script URL for login validation
                method: "POST",
                data: { loginUserId: loginUserId, loginUserPassword: loginUserPassword },
                success: function (response) {
                    // Remove any non-JSON characters from the beginning of the response
                    // charAt(0)은 문자열의 첫 번째 문자를 가져오기 위해 사용되었습니다. 
                    // 위의 코드에서는 response 문자열의 첫 번째 문자가 {가 아닌 경우에는 
                    // 해당 문자를 제거하는 작업을 수행하기 위해 while 루프와 함께 사용되었습니다.
                    
                    // 이후에는 가공된 response를 파싱하여 오류 메시지를 확인하고 처리합니다.
                    while (response.charAt(0) !== '{' && response.length > 0) {
                        //첫 번째 문자 이후의 나머지 부분을 반환합니다.
                        response = response.substring(1);
                    }
                    console.log(response);
                    // JSON.parse()는 JSON 형식의 문자열을 파싱하여 JavaScript 객체로 변환. 
                    // response 변수가 {"error":"success"}와 같은 JSON 형식의 문자열을 가지고 있다면, 
                    // JSON.parse(response)를 호출하면 해당 문자열이 JavaScript 객체로 변환된다.  
                    // parsedResponse.error와 같은 방식으로 JavaScript 객체의 속성에 접근
                    var parsedResponse = JSON.parse(response);

                     
                    
                    if (parsedResponse.error === "success") {
                        $('#loginModal').modal('hide');
                    } else {
                        $('.loginerrorMessage').text(parsedResponse.error);
                        $('#loginModal').modal('show');
                    }
                },
                error: function (xhr, status, error) {
                    // Error handling for the AJAX request
                    alert(error);
                },
            }); 
        }); 

    });
   </script>
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
            <h1 class="h2">Dashboard</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">
                  Share
                </button>
                <button type="button" class="btn btn-sm btn-outline-secondary">
                  Export
                </button>
              </div>
              <button
                type="button"
                class="btn btn-sm btn-outline-secondary dropdown-toggle"
              >
                <span data-feather="calendar"></span>
                This week
              </button>
            </div>
          </div>

          <canvas
            class="my-4 w-100"
            id="myChart"
            width="900"
            height="380"
          ></canvas>

          <h2>Section title</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Header</th>
                  <th scope="col">Header</th>
                  <th scope="col">Header</th>
                  <th scope="col">Header</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1,001</td>
                  <td>random</td>
                  <td>data</td>
                  <td>placeholder</td>
                  <td>text</td>
                </tr>
                <tr>
                  <td>1,002</td>
                  <td>placeholder</td>
                  <td>irrelevant</td>
                  <td>visual</td>
                  <td>layout</td>
                </tr>
                <tr>
                  <td>1,003</td>
                  <td>data</td>
                  <td>rich</td>
                  <td>dashboard</td>
                  <td>tabular</td>
                </tr>
                <tr>
                  <td>1,003</td>
                  <td>information</td>
                  <td>placeholder</td>
                  <td>illustrative</td>
                  <td>data</td>
                </tr>
                <tr>
                  <td>1,004</td>
                  <td>text</td>
                  <td>random</td>
                  <td>layout</td>
                  <td>dashboard</td>
                </tr>
                <tr>
                  <td>1,005</td>
                  <td>dashboard</td>
                  <td>irrelevant</td>
                  <td>text</td>
                  <td>placeholder</td>
                </tr>
                <tr>
                  <td>1,006</td>
                  <td>dashboard</td>
                  <td>illustrative</td>
                  <td>rich</td>
                  <td>data</td>
                </tr>
                <tr>
                  <td>1,007</td>
                  <td>placeholder</td>
                  <td>tabular</td>
                  <td>information</td>
                  <td>irrelevant</td>
                </tr>
                <tr>
                  <td>1,008</td>
                  <td>random</td>
                  <td>data</td>
                  <td>placeholder</td>
                  <td>text</td>
                </tr>
                <tr>
                  <td>1,009</td>
                  <td>placeholder</td>
                  <td>irrelevant</td>
                  <td>visual</td>
                  <td>layout</td>
                </tr>
                <tr>
                  <td>1,010</td>
                  <td>data</td>
                  <td>rich</td>
                  <td>dashboard</td>
                  <td>tabular</td>
                </tr>
                <tr>
                  <td>1,011</td>
                  <td>information</td>
                  <td>placeholder</td>
                  <td>illustrative</td>
                  <td>data</td>
                </tr>
                <tr>
                  <td>1,012</td>
                  <td>text</td>
                  <td>placeholder</td>
                  <td>layout</td>
                  <td>dashboard</td>
                </tr>
                <tr>
                  <td>1,013</td>
                  <td>dashboard</td>
                  <td>irrelevant</td>
                  <td>text</td>
                  <td>visual</td>
                </tr>
                <tr>
                  <td>1,014</td>
                  <td>dashboard</td>
                  <td>illustrative</td>
                  <td>rich</td>
                  <td>data</td>
                </tr>
                <tr>
                  <td>1,015</td>
                  <td>random</td>
                  <td>tabular</td>
                  <td>information</td>
                  <td>text</td>
                </tr>
              </tbody>
            </table>
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
    <script
      src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
      integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha"
      crossorigin="anonymous"
    ></script>
    <script src="dashboard.js"></script>

    <!-- Sign in Modal -->
    <?php include "./_loginModal.php" ?>

    <!-- Sign up Modal -->
    <?php include "./_memberModal.php" ?>

    
  </body>
</html>
