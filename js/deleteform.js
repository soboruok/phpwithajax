$(document).on("click", "#productDel", function (e) {
  // Product Delete

  e.preventDefault(); // Prevent the default link behavior
  var productId = $(this).data("pid");

  // Show the modal
  $("#alertModal").modal("show");

  //Attach the productId to the modal's delete button
  //선택된 요소와 관련된 임의의 데이터를 저장하는 데 사용됩니다.
  //$("#alertOk").data('productId', productId)라는 줄에서는
  //productId 값을 #alertOk 요소의 data-productId 속성에 설정
  $("#alertOk").data("productId", productId);

  $("#alertOk").click(function () {
    $.ajax({
      url: "includes/productDel.php",
      method: "POST",
      data: { productId: productId }, // Pass the product ID to the server
      success: function (response) {
        // Parse the JSON string into a JavaScript object
        var result = JSON.parse(response);
        console.log(result.success);

        if (result.success) {
          $("#alertModal").modal("hide");
          alert("Product deleted successfully");
          // Remove the deleted product entry from the DOM
          $(`.product-list .product[data-pid="${productId}"]`).remove();
        } else {
          $("#alertModal").modal("hide");
          alert("Failed to delete the product");
        }
        $("#alertModal").modal("hide");
      },
      error: function (xhr, status, error) {
        // Error handling for the AJAX request
        console.log(error); // Output the error to the console
      },
    });
  });
});
