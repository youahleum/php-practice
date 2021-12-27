<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    
    /* LOGIN */
    .nothing {
      width: 100%;
      height: 140px;
      padding-bottom: 250px;
    }

    .login {
      /* background-color: #f7ede2; */
      background-image: url(./images/login_bg.jpg);
      background-repeat: no-repeat;
      background-position: center;
      background-attachment: fixed;
      background-size: cover;
      width: 100%;
      height: 1300px;
    }

    .login h2 {
      font-size: 34px;
      font-weight: bold;
      text-align: center;
      padding-top: 15px;
    }



    .login_box {
      width: 500px;
      /* padding: 15px 15px 20px 15px; */
      border: 2px solid #282828;
      border-radius: 10px;
      margin: auto;
      background: #fff;
      box-sizing: border-box;
      padding-bottom: 80px;
    }

    .login_box form {
      padding: 30px 25px 10px;
      border-bottom: 1px solid #999;
    }

    .login_box input {
      width: 100%;
      margin-bottom: 10px;
      font-size: 15px;
      padding: 10px;
      box-sizing: border-box;
      border: 1px solid #282828;
      border-radius: 5px;
    }

    .login_box form [type="submit"] {
      width: 270px;
      margin: 20px 90px 20px 90px;
      font-size: 16px;
      font-weight: 600;
      color: #f7ede2;
      background-color: #264a36;
      cursor: pointer;
    }

    .login a {
      display: block;
      width: 200px;
      height: 50px;
      margin: 15px 24px 20px;
      border: 1px solid #999;
      border-radius: 5px;
      background-color: #ffbc0d;
      box-sizing: border-box;
      float: left;
      text-align: center;
      padding: 10px 0;
      font-weight: 700;
      font-size: 15px;
    }






  </style>
  <script>
    function login_check() {
      var u_id = document.getElementById("u_id")
      var pwd = document.getElementById("pwd")


      if (u_id.value == "") {
        var err_txt = document.querySelector(".err_id")
        err_txt.innerHTML = "아이디를 입력하세요";
        u_id.focus();
        return false;

        if (pwd.value == "") {
        var err_txt = document.querySelector(".err_pwd");
        err_txt.innerHTML = "비밀번호를 입력하세요 ( 4 ~ 12 글자)";
        pwd.focus();
        return false;
      };
      };
    }

    </script>
</head>
<body>
<section class="login">
    <div class="nothing"></div>

    <div class="login_box">
      <h2>LOGIN</h2>
      <form action="login_ok.php" method="post" name="login_form" onsubmit="return login_check()">
        <input type="text" name="u_id" class="u_id" id="u_id" placeholder="아이디를 입력해주세요"><br>
        <span class="err_id"></span>
        <input type="password"  name="pwd" class="pwd" id="pwd" placeholder="비밀번호를 입력해주세요"><br>
        <span class="err_pwd"></span>
        <input type="submit" value="로그인">
      </form>
      <div>
        <a href="">회원가입</a>
        <a href="">아이디/비밀번호 찾기</a>
      </div>
    </div>

  </section>
</body>
</html>