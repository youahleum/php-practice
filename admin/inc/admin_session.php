<?php
session_start();
 
$s_id=isset($_SESSION["s_id"])? $_SESSION["s_id"] : "";  
$s_name=isset($_SESSION["s_name"])? $_SESSION["s_name"] : ""; 

// 관리자가 아닌 경우 index 문서로 이동 :  로그인이 안되어 있거나 다른 아이디 이거나
if(!$s_id || ($s_id != "admin")){
  echo "
  <script type=\"text/javascript\">
       alert(\"사용 권한이 없습니다.\");
       location.href=\"/index.php\";
   </script>
  ";
};
?>