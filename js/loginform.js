$(document).ready(function () {
  //login
  $("#loginForm").submit(function (e) {
    e.preventDefault();

    var formData = new FormData(this); // 폼 데이터 객체 생성

    // Make an AJAX request
    $.ajax({
      url: "includes/login.php", // Replace with the actual PHP script URL for login validation
      data: formData,
      dataType: "json", // JSON으로 응답 처리
      processData: false,
      contentType: false,
      success: function (response) {
        // Remove any non-JSON characters from the beginning of the response
        // charAt(0)은 문자열의 첫 번째 문자를 가져오기 위해 사용되었습니다.
        // 위의 코드에서는 response 문자열의 첫 번째 문자가 {가 아닌 경우에는
        // 해당 문자를 제거하는 작업을 수행하기 위해 while 루프와 함께 사용되었습니다.

        // 이후에는 가공된 response를 파싱하여 오류 메시지를 확인하고 처리합니다.
        while (response.charAt(0) !== "{" && response.length > 0) {
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
          $("#loginModal").modal("hide");
        } else {
          $(".loginerrorMessage").text(parsedResponse.error);
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
