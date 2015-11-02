<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="styles/login.css">
</head>
<body>
<div class="container">

  <div id="login-form">

    <h3>Авторизация</h3>

    <fieldset>

      <form action="auth" method="post">

        <input type="text" name="login" placeholder="Логин">

        <input type="password" name="password" placeholder="Пароль"> 

        <input type="submit" value="Войти">

        <footer class="clearfix">

          <p><span class="info">?</span><a href="#">Forgot Password</a></p>

        </footer>

      </form>

    </fieldset>

  </div> <!-- end login-form -->

</div>	
</body>
</html>
