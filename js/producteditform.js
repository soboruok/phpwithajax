// Move to ProductEdit Form
$(document).on("click", "#productEditForm", function (e) {
  // Product Edit

  e.preventDefault(); // Prevent the default link behavior
  var productId = $(this).data("pid");

  $("#productEditForm").data("productId", productId);

  // Redirect to the update form page with the productId as a query parameter
  window.location.href = "./producteditform.php?productId=" + productId;
});
