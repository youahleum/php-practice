
<?php 

session_start();
$idx=$_SESSION["s_idx"];
//echo $idx;



//DB 접속 
include "../inc/dbcon.php";

// 쿼리작성
$sql = "delete from members where idx=$idx;";
// echo $sql;
// exit;

// 데이터베이스에 쿼리 전송
mysqli_query($dbcon, $sql);

// 세션 삭제
unset($_SESSION["s_idx"]);
unset($_SESSION["s_name"]);
unset($_SESSION["s_id"]);

// DB(연결) 종료   -- 커넥트한 데이터베이스 종료
mysqli_close($dbcon);

// 리디렉션 : 주소바꾸기 결과페이지로 이동
echo "
 <script type=\"text/javascript\">
     alert(\"정상처리 되었습니다. \");
       location.href=\"../index.php\";
  </script>
 ";
?>
 <!-- 리디렉션 : 주소바꾸기 결과페이지로 이동
 리디렉션은 php로 불가능 스크립트로 가능하다 location.href ::: <a href="">-->
<!-- <script type="text/script">
    alert(\"정상처리 되었습니다. \");
    location.href="../index.php";
</script> -->

<!-- php로 쓰고 싶다aus 위 리디렉션을 보자-->
