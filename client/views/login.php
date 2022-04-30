<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> Login </title>
    </head>
    <body>
        <div>
            <form method="POST" action="/login">
                <label for="email"> Email </label>
                <input id="email" type="email" name="email" placeholder="example@email.com" required>
                <br>
                <label for="password"> Password </label>
                <input id="password" type="password" name="password" required>
                <input type="submit" value="Login">
            </form>
        </div>
    </body>
</html>