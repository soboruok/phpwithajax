$(document).ready(function () {
  // singup
  $("#memberForm").submit(function (e) {
    e.preventDefault();

    var formData = new FormData(this); // 폼 데이터 객체 생성

    // Make an AJAX request
    $.ajax({
      url: "./includes/signup.php", // Replace with the actual PHP script URL for login validation
      method: "POST",
      data: formData,
      dataType: "json", // JSON으로 응답 처리
      processData: false,
      contentType: false,
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
