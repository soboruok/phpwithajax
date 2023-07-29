<?php

include './db.php'; 

// AJAX 요청으로부터 카테고리 값을 받아옵니다.
$category = $_POST['category'];
 

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
  }

  // 데이터베이스에서 해당 카테고리에 맞는 섹션들을 조회
  // (section_table과 컬럼명을 실제 데이터베이스에 맞게 변경해야 함)
  $sql = "SELECT bsection FROM sections WHERE bcategory LIKE '%$category%'";
 
  

  //execute database
  $result = $con->query($sql);

  $sections = array(); // 섹션들을 담을 배열

  // if there is value, then execute while statement.
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $sections[] = $row["bsection"];
    }
  }

  //json_encode() 함수는 PHP의 데이터를 JSON 형식으로 변환하는데 사용. 변환된 JSON 데이터는 HTTP 응답(Response)으로 클라이언트로 전송
  // json_encode는 PHP에서 제공하는 함수로, PHP 배열 또는 객체를 JSON 형식의 문자열로 변환, 클라이언트로 전송.
  // "sections" => $sections는 sections라는 키(Key)에 $sections 배열을 할당
  // json_encode는 JSON 형식의 데이터를 HTTP 응답으로 클라이언트에게 보내는 역할
  echo json_encode(array("sections" => $sections));
?>