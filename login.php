<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="app.css">

</head>
<body>
    <section class ="signup-form">
        <div class = "signup-form-form"></div>
          <form action="includes/login.inc.php" method="post">
            <input type="text" name="user" placeholder="Username/Email">
            <input type="password" name="pwd" placeholder="Password">
            <button type="submit" name="submit">Log in</button>
        </form>
    </section>
</body>
</html>