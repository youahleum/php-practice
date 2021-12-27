<meta charset="utf-8">
<?php 



// header("content-type:text/html; charset=utf-8");


/* 여러줄 주석*/ 
// 이전페이지에서 값 가져오기
//method(데이터 전송방식) ="get" : $_GET["필드의 name값"] (ex)input의 name값)
// $u_name= $_GET["u_name"];
// $u_id=$_GET["u_id"];
// $pwd=$_GET["pwd"];
// $birth=$_GET["birth"];
// $postalCode=$_GET["postalCode"];
// $addr1=$_GET["addr1"];
// $addr2=$_GET["addr2"];
// // $email_id=$_GET["email_id"];
// // $email_dns=$_GET["email_dns"];
// $email=$_GET["email_id"]."@".$_GET["email_dns"];
// $mobile=$_GET["mobile"];
// //date("형식")Y: 4자리 연도, y:2자리 연도, 시간도 표시 가능  H:0~23시간, h:1~12시간 
// $reg_date=date("Y-m-d");
// // $agree=$_GET["agree"]; 동의하지 않으면 가입이 되지 않기때문에 필요하지 않음

$u_name= $_POST["u_name"];
$u_id=$_POST["u_id"];
$pwd=$_POST["pwd"];
$birth=$_POST["birth"];
$postalCode=$_POST["postalCode"];
$addr1=$_POST["addr1"];
$addr2=$_POST["addr2"];
// $email_id=$_POST["email_id"];
// $email_dns=$_POST["email_dns"];
$email=$_POST["email_id"]."@".$_POST["email_dns"];
$mobile=$_POST["mobile"];
//date("형식")Y: 4자리 연도, y:2자리 연도, 시간도 표시 가능  H:0~23시간, h:1~12시간 
$reg_date=date("Y-m-d");
// $agree=$_POST["agree"]; 동의하지 않으면 가입이 되지 않기때문에 필요하지 않음
//method(데이터 전송방식) ="post" : $_POST["필드의 name값"] (ex)input의 name값)
//GET, POST 대문자임 


//값 확인
//js:document.write()
// echo $u_name."<br>";
// echo $u_id."<br>";
// echo $pwd."<br>";
// echo $birth."<br>";
// echo $postalCode."<br>";
// echo $addr1."<br>";
// echo $addr2."<br>";
// echo $email_id."<br>";
// echo $email_dns."<br>";
// echo $mobile."<br>";
// echo $agree."<br>";

echo "이름 : ".$u_name."<br>";
echo "아이디 : ".$u_id."<br>";
echo "비밀번호 : ".$pwd."<br>";
echo "생년월일 : ".$birth."<br>";
echo "우편번호 : ".$postalCode."<br>";
echo "기본주소 : ".$addr1."<br>";
echo "상세주소 : ".$addr2."<br>";
// echo $email_id."<br>";
// echo $email_dns."<br>";
echo "이메일 : ".$email."<br>";
echo "핸드폰번호 : ".$mobile."<br>";
echo "가입일 : ".$reg_date."<br>";
// echo $agree."<br>";

//DB 접속 
// mysqli_connect("호스트", "사용자", "비밀번호");
// mysqli_select_db("연결객체", "DB명");

// 연결객체
// $dbcon = mysqli_connect("호스트", "사용자", "비밀번호"); 
// mysqli_select_db($dbcon, "DB명");

//$dbcon = mysqli_connect("호스트", "사용자", "비밀번호", "DB명");

//$dbcon = mysqli_connect("localhost", "root", "", "front");

// $dbcon = mysqli_connect("호스트", "사용자", "비밀번호", "DB명") or die("접속 실패시 메세지");

// $dbcon = mysqli_connect("localhost", "root", "", "front") or die("접속에 실패하였습니다.");
// mysqli_set_charset($dbcon,"utf8");

include "../inc/dbcon.php";

// 쿼리작성
// insert into 테이블명 value(값, 값, 값, ..)
// insert into 테이블명(필드명, 필드명, 필드명) values (값, 값, 값, ..)


// insert into 테이블명(u_name, u_id, pwd, birth, postalCode, addr1, addr2, email, mobile, reg_date)
// values("유아름","dkfma","1234","20211202","12345","서울","관악구","fdg@123","123","2021-12-03")

// $sql = "insert into members(u_name, u_id, pwd, birth, postalCode, addr1, addr2, email, mobile, reg_date)
// values('유아름','dkfma','1234','20211202','12345','서울','관악구','fdg@123','123','2021-12-03');";
// 큰따옴표를 써야 하기때문에 그 안에 들어가는 구문들은 작은따옴표를 쓸것


// 방법1
// $sql = "insert into members(u_name, u_id, pwd, birth, postalCode, addr1, addr2, email, mobile, reg_date)
// values('".$u_name."','".$u_id."','".$pwd."','".$birth."','".$postalCode."','".$addr1."','".$addr2."','".$email."','".$mobile."','".$reg_date."');";

// 방법2
// $sql = "insert into members(u_name, u_id, pwd, birth, postalCode, addr1, addr2, email, mobile, reg_date)
// values('$u_name','$u_id','$pwd','$birth','$postalCode','$addr1','$addr2','$email','$mobile','$reg_date');";

// 방법3
$sql = "insert into members(";
$sql .= "u_name, u_id, pwd, birth, postalCode, addr1, addr2, email, mobile, reg_date";
$sql .= ")values(";
$sql .= "'$u_name','$u_id','$pwd','$birth','$postalCode','$addr1','$addr2','$email','$mobile','$reg_date'";
$sql .= ");";
// .이 자바스크립트에서 +이다 .=는 +=와 동일하다고 생각하면 될듯 +=는 php 숫자데이터일때는 사용가능함

// echo $sql;
// 데이터베이스에 쿼리 전송
// mysqli_query("연결객체", "전달할 쿼리");

mysqli_query($dbcon, $sql);

// DB(연결) 종료   -- 커넥트한 데이터베이스 종료
// mysqli_close(); --->오류 어떤 DB를 닫을지가 적혀있지가 않음
mysqli_close($dbcon);

// 리디렉션 : 주소바꾸기 결과페이지로 이동
// echo "
// <script type=\"text/script\">
//     // location.href='welcome.php';
//     location.href=\"./welcome.php\";
// </script>
// ";
?>
 <!-- 리디렉션 : 주소바꾸기 결과페이지로 이동
 리디렉션은 php로 불가능 스크립트로 가능하다 location.href ::: <a href="">-->
<script type="text/javascript">
    location.href="./welcome.php";
</script>

<!-- php로 쓰고 싶다aus 위 리디렉션을 보자-->
