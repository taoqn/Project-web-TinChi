<!doctype html>
<html>
<head>
<title>Đăng Nhập Hệ Thống</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chọn ngành</title>
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
<style type="text/css">
.form-field {
    clear: both;
    padding: 10px;
    width: 350px;
}
.form-field label {
    float: left;
    width: 150px;
    text-align: right;
}
.form-field input {
    float: right;
    width: 150px;
    text-align: left;
}
#submit {
    text-align: center;
}
#con{
    color: green;
}
</style>
</head>
<body>
<h1>Đại Học Quy Nhơn</h1>
<hr>
<form action="" method="post" name="form1" id="form1">
<fieldset>
    <legend>Đăng Nhập</legend>
    <div class="form-field">
        <label for="username">Admin:</label>
        <input type="text" id="username" name="username">
    </div>
    <div class="form-field">
        <label for="email">Mật Khẩu:</label>
        <input type="password" id="password" name="password">
    </div>
    <div class="form-field">
        <input id="submit" type="button" name="submit" value="Đăng Nhập">
    </div>
</fieldset>
</form>
<p id="con"></p>
<script>
$(document).ready(function(){
    $("#submit").click(function(event){
        var user = form1.username.value;
        var pass = form1.password.value;
        $.post('login_query.php',{'user':user,'pass':pass},function(data){
            if(data=="Đăng Nhập Thành Công !")
                window.location.replace("main.php");
            else
            {
                alert(data);
                $("#con").html(data);
            }
        });
    })
})
</script>
</body>
</html>