$(document).ready(function () {
  //login
  $("#loginForm").submit(function (e) {
    e.preventDefault();

    var formData = new FormData(this);

    // Make an AJAX request
    $.ajax({
      url: "includes/login.php", // Replace with the actual PHP script URL for login validation
      method: "POST",
      data: formData,
      dataType: "json", // JSON response from the server
      processData: false,
      contentType: false,
      success: function (response) {
        console.log(response);
        // JSON.parse()는 JSON 형식의 문자열을 파싱하여 JavaScript 객체로 변환.
        // response 변수가 {"error":"success"}와 같은 JSON 형식의 문자열을 가지고 있다면,
        // JSON.parse(response)를 호출하면 해당 문자열이 JavaScript 객체로 변환된다.
        // parsedResponse.error와 같은 방식으로 JavaScript 객체의 속성에 접근

        if (response.error === "success") {
          $("#loginModal").modal("hide");
          location.reload(); // Refresh the browser window after successful login
        } else {
          $(".loginerrorMessage").text(response.error);
          $("#loginModal").modal("show");
        }
      },
      error: function (xhr, status, error) {
        // Error handling for the AJAX request
        alert(error);
      },
    });
  });
});
