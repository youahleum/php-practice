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
    function form_check() {
      var u_name = document.getElementById("u_name");
      var u_id = document.getElementById("u_id")
      var pwd = document.getElementById("pwd")
      var repwd = document.getElementById("repwd")
      var agree = document.getElementById("agree")
      var pwd_leng = pwd.value.length
      var id_leng = u_id.value.length

      if (u_name.value == "") {
        var err_txt = document.querySelector(".err_name")
        err_txt.innerHTML = "이름을 입력하세요"
        n_name.focus()
        return false
      }
      if (u_id.value == "") {
        var err_txt = document.querySelector(".err_id")
        err_txt.innerHTML = "아이디를 입력하세요";
        u_id.focus();
        return false;
      };


      if (id_leng < 4 || id_leng > 12) {
        var err_txt = document.querySelector(".err_id");
        err_txt.innerHTML = "비밀번호는 4 ~ 12글자만 작성가능합니다."
        u_id.focus();
        return false;
      }

      if (pwd.value == "") {
        var err_txt = document.querySelector(".err_pwd");
        err_txt.innerHTML = "비밀번호를 입력하세요 ( 4 ~ 12 글자)";
        pwd.focus();
        return false;
      };

      if (pwd_leng < 4 || pwd_leng > 12) {
        var err_txt = document.querySelector(".err_pwd");
        err_txt.innerHTML = "비밀번호는 4 ~ 12글자만 작성가능합니다."
        pwd.focus();
        return false;
      }

      if (pwd.value != repwd.value) {
        var err_txt = document.querySelector(".err_repwd")
        err_txt.innerHTML = "비밀번호를 확인하세요"
        repwd.focus();
        return false;
      }


      var reg_mobile = /^[0-9]+$/g;
      if (!reg_mobile.test(mobile.value)) {
        var err_txt = document.querySelector(".err_mobile");
        err_txt.textContent = "전화번호는 '-'없이 숫자만 입력할수 있습니다.";
        mobile.focus();
        return false;
      }

      if (!agree.checked) {
        alert("약관에 동의가 필요합니다.")
        agree.focus();
        return false;
      }

    }

    function change_email() {
      var email_sel = document.getElementById("email_sel")
      var email_dns = document.getElementById("email_dns")
      var idx = email_sel.options.selectedIndex

      email_dns.value = email_sel.options[idx].value
    }

    function id_search() {
      window.open("search_id.php", "", "width=400px, height=250px, top=0, left=0")
    }
  </script>
  <title>Document</title>
</head>

<body>
  <form action="insert.php" name="join_form" method="post" onsubmit="return form_check()">
    <fieldset>
      <legend>회원가입</legend>
      <p>
        <label for="u_name">이름</label>
        <input type="text" name="u_name" class="u_name" id="u_name" >
        <br>
        <span class="err_name"></span>
      </p>
      <p>
        <label for="u_id">아이디</label>
        <input type="text" name="u_id" class="u_id" id="u_id" readonly>
        <button type="button" class="btn" onclick="id_search()">아이디 중복확인</button>
        <br>
        <span class="err_id">아이디는 4 ~ 12글자만 작성가능합니다.</span>
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
      <p>
        <label for="birth">생년월일</label>
        <input type="text" name="birth" class="birth" id="birth">
        <br>
        <span>ex)20211202</span>
      </p>
      <p>
        <label for="postalCode">우편번호</label>
        <input type="text" name="postalCode" class="postalCode" id="postalCode">
        <button type="button" class="btn">주소검색</button>
        <br>
        <label for="addr1">기본주소</label>
        <input type="text" name="addr1" class="addr1" id="addr1">
        <br>
        <label for="addr2">상세주소</label>
        <input type="text" name="addr2" class="addr2" id="addr2">
      </p>
      <p>
        <label for="email_id">이메일</label>
        <input type="text" name="email_id" class="email_id" id="email_id">@
        <input type="text" name="email_dns" class="email_dns" id="email_dns">
        <select name="email_sel" id="email_sel" class="email_sel">
          <option value="">직접 입력</option>
          <option value="naver.com">NAVER</option>
          <option value="hanmail.net">DAUM</option>
          <option value="gmail.com">GOOGLE</option>
        </select>
      </p>

      <p>
        <label for="mobile">전화번호</label>
        <input type="text" name="mobile" class="mobile" id="mobile">
        <br>
        <span> 숫자만 작성 가능</span>
      </p>
      <p>
        <label for="agree">약관동의</label>
        <input type="checkbox" name="agree" class="agree" id="agree">
        <br>
      </p>
      <p>
        <button type="button" class="btn" onclick="history.back()">취소</button>
        <button type="submit" class="btn">가입하기</button>
      </p>

    </fieldset>

<a href="insert.php"></a>

  </form>

</body>

</html>