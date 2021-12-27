<?php
// 세션 실행 : 모든 페이지에서 공통으로 사용할수 있는 데이터 , 변수 
// 세션의 시작은 항상 상위에 둔다. 먼저 키는것으로 시작
session_start();



// 이전 페이지에서 값 가져오기
$u_id = $_POST["u_id"];
$pwd = $_POST["pwd"];
//echo "ID : " .$u_id. " PW : " .$pwd;

// DB접속
include "../inc/dbcon.php";

// 쿼리 작성
$sql = "select idx, u_name, u_id, pwd from members where u_id='$u_id';";
//echo $sql

// 쿼리 전송(연결객체)
$result = mysqli_query($dbcon, $sql);

// DB에서 결과값 가져오기
//mysqli_fetch_row(연결객체) //필드 순서
//mysqli_fetch_array(연결객체) //필드명
//mysqli_num_rows(연결객체) //결과행의 개수
//mysqli_num_rows(인자/parameter/매개변수);
$num= mysqli_num_rows($result);

//조건처리

if(!$num){ //아이디가 존재하지 않으면
//메세지 출력후 이전 페이지로 이동
  echo "
    <script type=\"text/javascript\">
      alert(\"일치하는 아이디가 없습니다.\")
      history.go(-1);  //history.back;
    </script>
  ";
  exit;
} else{ // 해당하는 아이디가 존재하면 

  //DB에서 사용자 정보 가져오기
  $array = mysqli_fetch_array($result);  // ==> 이 페이지에서만 쓸수 있는 값
  //$g_idx= $array["idx"];  //배열처리를 위해 []대괄호 사용
  //$g_u_name= $array["u_name"];
  //$g_u_id = $array["u_id"];
  $g_pwd= $array["pwd"];

  // $array = mysqli_fetch_row($result);
  // $array[0];  //배열처리를 위해 []대괄호 사용
  // $array[1];
  // $array[2];
  // $array[3];  //쿼리 작성에서의 필드 순서대로 나타난다.

  //사용자가 입력한 비밀번호와 DB에 저장된 비밀번호가 일치하는지 확인
  if($pwd != $g_pwd){
  echo "
  <script type=\"text/javascript\">
    alert(\"비밀번호가 일치하지 않습니다.\")
    history.back;
  </script>
   ";
   exit;
  } else{ //비밀번호가 일치한다면
     //로그인 처리
  // 세션변수 생성
  // $_SESSION["세션변수명"] = 저장할 값;    ==>모든페이지에서 쓸수 있는값
    $_SESSION["s_idx"] = $array["idx"];
    $_SESSION["s_name"] = $array["u_name"];
    $_SESSION["s_id"] = $array["u_id"] ;
    echo "idx : ". $_SESSION["s_idx"]."/ "."name : ".$_SESSION["s_name"]." / "." ID : ".$_SESSION["s_id"];
    
    
    //DB 연결 종료
    mysqli_close($dbcon);

    //페이지 이동
echo"
<script type=\"text/javascript\">
      location.href= \"../index.php\";
    </script>
    ";
  };
  
  

};
 





?>