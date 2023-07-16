$("#producteditform").submit(function (e) {
  // Product Edit
  e.preventDefault(); // Prevent the default link behavior

  var formData = new FormData(this); // 폼 데이터 객체 생성

  $.ajax({
    url: "includes/productEditProcess.php",
    method: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      var result = JSON.parse(response);
      console.log(result.success);
      if (result.success) {
        $("#productErrorMessage").text("Success: " + result.message);
      } else {
        $("#productErrorMessage").text("Error: " + result.message);
      }
    },
    error: function (xhr, status, error) {
      // Error handling for the AJAX request
      console.log(error); // Output the error to the console
    },
  });
});
