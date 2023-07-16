// Login
$(document).ready(function () {
  $("#loginForm").submit(function (e) {
    e.preventDefault();
    var username = $("#username").val();
    var password = $("#pw").val();

    // Make an AJAX request
    $.ajax({
      url: "includes/login.php", // Replace with the actual PHP script URL for login validation
      method: "POST",
      data: { username: username, password: password },
      success: function (response) {
        if (response === "success") {
          window.location.href = "main.php";

          $("#loginModal").modal("hide"); // Hide the login modal
        } else {
          alert("Login failed. Please try again.");
        }
      },
      error: function () {
        // Error handling for the AJAX request
        alert("An error occurred. Please try again later.");
      },
    });
  });
});

// singup
$(document).ready(function () {
  $("#memberForm").submit(function (e) {
    e.preventDefault();
    var username = $("#username").val();
    var password = $("#password").val();
    var userID = $("#userID").val();

    // Make an AJAX request
    $.ajax({
      url: "includes/signup.php", // Replace with the actual PHP script URL for login validation
      method: "POST",
      data: { username: username, password: password, userID: userID },
      success: function (response) {
        console.log(response);
        if (response === "success") {
          window.location.href = "main.php";

          $("#memberModel").modal("hide"); // Hide the login modal
        } else {
          alert("Login failed. Please try again.");
        }
      },
      error: function (xhr, status, error) {
        // Error handling for the AJAX request
        alert(error);
      },
    });
  });
});
