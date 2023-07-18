$(document).ready(function () {
  // singup
  $("#memberForm").submit(function (e) {
    e.preventDefault();

    var userID = $("#userID").val();
    var userEmail = $("#userEmail").val();
    var userPassword = $("#userPassword").val();
    var rePassword = $("#rePassword").val();

    // Make an AJAX request
    $.ajax({
      url: "/includes/member.php", // Replace with the actual PHP script URL for login validation
      method: "POST",
      data: {
        userID: userID,
        userEmail: userEmail,
        userPassword: userPassword,
        rePassword: rePassword,
      },
      success: function (response) {
        console.log(response);
        if (!response) {
          $("#memberModel").modal("hide"); // Hide the login modal
          window.location.href = "index.php";
        } else {
          var errorMessage = response;
          //JSON.parse() 함수를 사용합니다. 이 함수는 JSON 형식의 문자열을 JavaScript 객체로 변환
          var errorMessage = JSON.parse(errorMessage);
          $(".membererrorMessage").text(errorMessage.error);
          $("#memberModel").modal("show");
        }
      },
      error: function (xhr, status, error) {
        // Error handling for the AJAX request
        alert(error);
      },
    });
  });
});
