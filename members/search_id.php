<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>아이디 중복 확인</title>
  <style>
    span{
      color:red;
      font-size:12px
    }
  </style>
  <script>
    function check_id() {
       var input_id = document.getElementById("input_id")
            
      
      if (input_id.value == "") {
        var err_txt = document.querySelector(".err_id")
        err_txt.innerHTML = "아이디를 입력하세요";
        input_id.focus();
        return false;
      };

        var id_leng = input_id.value.length;
      if (id_leng < 4 || id_leng > 12) {
        var err_txt = document.querySelector(".err_id");
        err_txt.innerHTML = "아이디는 4 ~ 12글자만 작성가능합니다."
        input_id.focus();
        return false;
      }
    }
  </script>
  <title>Document</title>
</head>


<body>
  <form name="search_id_form" action="result_id.php" method="post" onsubmit="return check_id()">
    <fieldset>
      <legend>아이디 입력</legend>
      <p>
        <label for="">아이디</label>
        <input type="text" name="input_id" id="input_id" autofocus>
        <button type="submit" class="btn">검색</button><br>
        <span class="err_id"></span>
      </p>
    </fieldset>
  </form>
</body>

</html>