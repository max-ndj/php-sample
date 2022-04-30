<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> Register </title>
    </head>
    <body>
        <div>
            <form method="POST" action="/register">
                <label for="lastname"> Lastname </label>
                <input id="lastname" type="text" name="lastname" required>
                <br>
                <label for="firstname"> Firstname </label>
                <input id="firstname" type="text" name="firstname" required>
                <br>
                <label for="email"> Email </label>
                <input id="email" type="email" name="email" placeholder="example@email.com" required>
                <br>
                <label for="password"> Password </label>
                <input id="password" type="password" name="password" required>
                <input type="submit" value="Register">
            </form>
        </div>
    </body>
</html>