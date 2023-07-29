function updateSections() {
  var selectedCategory = $("#category").val();

  $.ajax({
    url: "includes/sectionprocess.php", // 서버의 데이터를 처리할 엔드포인트 URL
    method: "POST", // GET 또는 POST를 사용할 수 있습니다. 필요에 따라 변경하세요.
    data: { category: selectedCategory }, // 서버로 전송할 데이터
    dataType: "json", // 서버에서 받아올 데이터의 형식 (JSON으로 응답받을 예정)
    success: function (response) {
      console.log(response);
      // 서버로부터 성공적으로 응답이 왔을 때 처리할 로직
      // 받아온 데이터를 이용하여 섹션 선택 옵션들을 동적으로 추가
      var sectionSelect = $("#section");

      sectionSelect.empty(); // 기존의 옵션들을 지우고 새로운 옵션들을 추가하기 위해 비움

      console.log(response.sections);
      // 서버에서 받아온 섹션들을 순회하며 <select> 요소에 옵션들을 추가
      $.each(response.sections, function (index, section) {
        sectionSelect.append(
          '<option value="' + section + '">' + section + "</option>"
        );
      });
    },
    error: function (xhr, status, error) {
      // Error handling for the AJAX request
      console.log(error); // Output the error to the console
    },
  });
}
