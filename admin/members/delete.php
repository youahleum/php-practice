
<?php 

$u_idx=$_GET["u_idx"];
//echo $idx;



//DB 접속 
include "../../inc/dbcon.php";

// 쿼리작성
$sql = "delete from members where idx=$u_idx;";

// echo $sql;
// exit;
// 데이터베이스에 쿼리 전송
mysqli_query($dbcon, $sql);


// DB(연결) 종료   -- 커넥트한 데이터베이스 종료
mysqli_close($dbcon);

// 리디렉션 : 주소바꾸기 결과페이지로 이동
echo "
 <script type=\"text/javascript\">
     alert(\"정상처리 되었습니다. \");
       location.href=\"list.php\";
  </script>
 ";
?>
 
