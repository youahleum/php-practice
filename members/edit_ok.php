<meta charset="utf-8">
<?php 
// 세션 시작
session_start();

$s_idx= $_SESSION["s_idx"];



// 이전페이지에서 값 가져오기
$pwd=$_POST["pwd"];
$birth=$_POST["birth"];
$postalCode=$_POST["postalCode"];
$addr1=$_POST["addr1"];
$addr2=$_POST["addr2"];
$email=$_POST["email_id"]."@".$_POST["email_dns"];
$mobile=$_POST["mobile"];

// $agree=$_POST["agree"]; 동의하지 않으면 가입이 되지 않기때문에 필요하지 않음


//method(데이터 전송방식) ="post" : $_POST["필드의 name값"] (ex)input의 name값)
//GET, POST 대문자임 


//값 확인
echo "비밀번호 : ".$pwd."<br>";
echo "생년월일 : ".$birth."<br>";
echo "우편번호 : ".$postalCode."<br>";
echo "기본주소 : ".$addr1."<br>";
echo "상세주소 : ".$addr2."<br>";
echo "이메일 : ".$email."<br>";
echo "핸드폰번호 : ".$mobile."<br>";


//DB 접속 
include "../inc/dbcon.php";

// 쿼리작성
// update 테이블명 set 필드명=값, 필드명=값,...;

if(!$pwd){
    $sql="update members set birth='$birth', postalCode='$postalCode', addr1='$addr1', addr2='$addr2', email='$email', mobile='$mobile' where idx=$s_idx;";
}else{
    $sql="update members set pwd='$pwd' , birth='$birth', postalCode='$postalCode', addr1='$addr1', addr2='$addr2', email='$email', mobile='$mobile' where idx=$s_idx;";
}
echo $sql;
exit;

// .이 자바스크립트에서 +이다 .=는 +=와 동일하다고 생각하면 될듯 +=는 php 숫자데이터일때는 사용가능함

// 데이터베이스에 쿼리 전송
// mysqli_query("연결객체", "전달할 쿼리");

mysqli_query($dbcon, $sql);

// DB(연결) 종료   -- 커넥트한 데이터베이스 종료
// mysqli_close(); --->오류 어떤 DB를 닫을지가 적혀있지가 않음
mysqli_close($dbcon);

// 리디렉션 : 주소바꾸기 결과페이지로 이동
echo "
<script type=\"text/script\">
    alert(\"정보가 수정되었습니다.\");
    location.href=\"edit.php\";
</script>
";
?>
 <!-- 리디렉션 : 주소바꾸기 결과페이지로 이동
 리디렉션은 php로 불가능 스크립트로 가능하다 location.href ::: <a href="">-->
<!-- <script type="text/script">
    alert(\"정보가 수정되었습니다.\");
    location.href="./welcome.php";
</script> -->

<!-- php로 쓰고 싶다aus 위 리디렉션을 보자 -->
