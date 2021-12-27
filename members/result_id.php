
<?php //html 위에 작성할것
//이전 페이지에서 값 가져오기
$u_id = $_POST["input_id"];
// echo $u_id;

//DB연결
include "../inc/dbcon.php";       //<style> @import "aa.css" 와 같은 개념

//쿼리 작성
$sql ="select u_id from members where u_id='$u_id';";
//$sql ="select *";


//데이터 조회하기 /쿼리 전송
$result = mysqli_query($dbcon, $sql);

//DB에서 결과값 가져오기
//3가지 방법
//mysqli_fetch_row //필드의 순서(ex)idx, name, id...)를 이용하여 데이터값을 가져옴
//$row= mysqli_fetch_row($result);
//echo $row[0];

//mysqli_fetch_array // 필드명으로 데이터를 가져옴
//$row= mysqli_fetch_array($result);
//echo $row["u_name"];

//mysqli_num_rows // 결과 행의 개수
//mysqli_num_rows(전송객체)
$num = mysqli_num_rows($result);
//echo $num;
?>
<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>검색결과</title>
  <style>
    .able{
      font-weight:bold;
      color:rgb(0,110,255)
    }
    .d_able{
      font-weight:bold;
      color:rgb(255,123,0)
    }
  </style>
  <?php if(!$num){ ?>
  <script>
    function return_id() {
      opener.document.getElementById("u_id").value = "<?php echo $u_id;?>";
      window.close();
    }
  </script>
  <?php }; ?>
</head>

<body>
  <p>
    입력하신 "<?php echo $u_id;?>"은 사용할수 
    <!-- <?php
    if(!$num){ //if($num == 0)
    echo "<span class=\"able\">있는</span>";
  }else{
    echo "<span class=\"d_able\">없는</span>";
  }
  ?> -->

  <?php if(!$num){ //if($num == 0) ?>
  <span class=\"able\">있는</span>
  <?php }else{ ?>
  <span class=\"d_able\">없는</span>
  <?php };?>
  
    아이디입니다.<br><br>
    <!-- php는 어디에든 넣어서 사용할수 있음 -->
    <?php if(!$num){ ?>
       <a href="#" onclick="return_id()">[사용하기]</a>
    <?php }; ?>
    
    <a href="#" onclick="history.back()">[다시 검색]</a>
  </p>

</body>

</html>