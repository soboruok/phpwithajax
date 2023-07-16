$(document).ready(function () {
  //productProcess
  $("#productForm").submit(function (e) {
    e.preventDefault();

    var formData = new FormData(this); // 폼 데이터 객체 생성

    // Make an AJAX request
    $.ajax({
      url: "includes/productFormProcess.php", // Replace with the actual PHP script URL for login validation
      method: "POST",
      data: formData,
      dataType: "json", // JSON으로 응답 처리
      processData: false,
      contentType: false,
      success: function (response) {
        if (response.success) {
          $("#productErrorMessage").text("Success: " + response.message);
        } else {
          $("#productErrorMessage").text("Error: " + response.message);
        }
      },
      error: function (xhr, status, error) {
        // Error handling for the AJAX request
        // dataValidation, success, fail, filesize, uploadFail, filetype

        console.error(error);
      },
    });
  });
});
