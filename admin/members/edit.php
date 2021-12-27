<?php 
include "../inc/admin_session.php";

// 클릭한 사용자 정보 가져오기
$u_idx = $_GET["u_idx"];

// DB 연결
include "../../inc/dbcon.php";

// 쿼리 작성
$sql="select * from members where idx=$u_idx;";
// 쿼리 전송
$result=mysqli_query($dbcon, $sql);

// 결과 가져오기
$array = mysqli_fetch_array($result);


?>

<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    span {
      font-size: 10px;
      color: red;

    }
  </style>
  <script>
    function edit_check() {
      var u_name = document.getElementById("u_name");
      var u_id = document.getElementById("u_id")
      var pwd = document.getElementById("pwd")
      var repwd = document.getElementById("repwd")
      var agree = document.getElementById("agree")
      
      var id_leng = u_id.value.length

      // if (u_name.value == "") {
      //   var err_txt = document.querySelector(".err_name")
      //   err_txt.innerHTML = "이름을 입력하세요"
      //   n_name.focus()
      //   return false
      // }
      // if (u_id.value == "") {
      //   var err_txt = document.querySelector(".err_id")
      //   err_txt.innerHTML = "아이디를 입력하세요";
      //   u_id.focus();
      //   return false;
      // };


      if (id_leng < 4 || id_leng > 12) {
        var err_txt = document.querySelector(".err_id");
        err_txt.innerHTML = "아이디는 4 ~ 12글자만 작성가능합니다."
        u_id.focus();
        return false;
      }

      if (pwd.value) {
         if (pwd_leng < 4 || pwd_leng > 12) {
        var err_txt = document.querySelector(".err_pwd");
        err_txt.innerHTML = "비밀번호는 4 ~ 12글자만 작성가능합니다."
        pwd.focus();
        return false;
      }
      };

     
      if (pwd.value) {
      var pwd_leng = pwd.value.length
      if (pwd.value != repwd.value) {
        var err_txt = document.querySelector(".err_repwd")
        err_txt.innerHTML = "비밀번호를 확인하세요"
        repwd.focus();
        return false;
      }
    };
    if (mobile.value) {
      var reg_mobile = /^[0-9]+$/g;
      if (!reg_mobile.test(mobile.value)) {
        var err_txt = document.querySelector(".err_mobile");
        err_txt.textContent = "전화번호는 '-'없이 숫자만 입력할수 있습니다.";
        mobile.focus();
        return false;
      }
    };
      // if (!agree.checked) {
      //   alert("약관에 동의가 필요합니다.")
      //   agree.focus();
      //   return false;
      // }

    }

    function change_email() {
      var email_sel = document.getElementById("email_sel")
      var email_dns = document.getElementById("email_dns")
      var idx = email_sel.options.selectedIndex

      email_dns.value = email_sel.options[idx].value
    }

    function id_search() {
      window.open("search_id.php", "", "width=400px, height=250px, top=0, left=0")
    };

    function del_check(){
      var i = confirm("정말 삭제하시겠습니까? \n삭제한 아이디는 다시 복원하실 수 없습니다.");

      if(i == true){  //확인 누름/탈퇴페이지로 이동
        location.href="delete.php?u_idx=<?php echo $u_idx; ?>";
        //location.href="delete.php";
      }

    };
  </script>
  <title>Document</title>
</head>

<body>
  <h2> 관리자 페이지 </h2>
  <form action="edit_ok.php" name="edit_form" method="post" onsubmit="return edit_check()">
    <fieldset>
      <legend>회원 정보 수정</legend>
      <!-- hidden 필드를 만들어 이걸로 다음 페이지의 값을 보낼수 있게 할수 있다 페이지에는 보이지 않음 -->
      <input type="hidden" name="u_idx" value="<?php echo "$u_idx"; ?>">
      <!-- 화면에 값을 가지고 있어야 하지만 사용자에게 보여줄 필요가 없을때 사용 -->
      <p>
        <span class="txt">이름</span>
        <?php echo $array["u_name"]; ?>
      </p>
      <p>
        <span class="txt">아이디</span>
        <?php echo $array["u_id"]; ?>
      </p>
      <p>
        <label for="pwd">비밀번호</label>
        <input type="password" name="pwd" class="pwd" id="pwd">
        <br>
        <span class="err_pwd">비밀번호는 4 ~ 12글자만 작성가능합니다.</span>
      </p>
      <p>
        <label for="repwd">비밀번호확인</label>
        <input type="password" name="repwd" class="repwd" id="repwd">
        <br>
        <span class="err_repwd"></span>
      </p>
<?php
// str_replace("어떤문자를", "어떤 문자로", "어떤 문장에서");

$birth = str_replace("-", "", $array["birth"]);
?>
      <p>
        <label for="birth">생년월일</label>
        <input type="text" name="birth" class="birth" id="birth" value="<?php echo $birth; ?>" >
        <br>
        <span>ex)20211202</span>
      </p>

      <p>
        <label for="postalCode">우편번호</label>
        <input type="text" name="postalCode" class="postalCode" id="postalCode" value="<?php echo $array["postalCode"]; ?>">
        <button type="button" class="btn">주소검색</button>
        <br>
        <label for="addr1">기본주소</label>
        <input type="text" name="addr1" class="addr1" id="addr1" value="<?php echo $array["addr1"]; ?>">
        <br>
        <label for="addr2">상세주소</label>
        <input type="text" name="addr2" class="addr2" id="addr2" value="<?php echo $array["addr2"]; ?>">
      </p>

      <?php
      //explode("기준문자", "어떤문장에서");
      $email = explode("@", $array["email"]);
      
      ?>

      <p>
        <label for="email_id">이메일</label>
        <input type="text" name="email_id" class="email_id" id="email_id" value="<?php echo $email[0]; ?>">
        @
        <input type="text" name="email_dns" class="email_dns" id="email_dns" value="<?php echo $email[1]; ?>">
        <select name="email_sel" id="email_sel" class="email_sel">
          <option value="">직접 입력</option>
          <option value="naver.com">NAVER</option>
          <option value="hanmail.net">DAUM</option>
          <option value="gmail.com">GOOGLE</option>
        </select>
      </p>

      <p>
        <label for="mobile">전화번호</label>
        <input type="text" name="mobile" class="mobile" id="mobile" value="<?php echo $array["mobile"]; ?>">
        <br>
        <span> 숫자만 작성 가능</span>
      </p>
      <!-- <p>
        <label for="agree">약관동의</label>
        <input type="checkbox" name="agree" class="agree" id="agree">
        <br>
      </p> -->
      <p>
        <button type="button" class="btn" onclick="history.back()">이전으로</button>
        <button type="button" class="btn" onclick="location.href='../admin.php'">홈으로</button>
        <button type="button" class="btn" onclick="del_check()">회원삭제</button>
        <button type="submit" class="btn">정보수정</button>
      </p>

    </fieldset>

<a href="insert.php"></a>

  </form>

</body>

</html>