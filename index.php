<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

</head>
<body>
    
    <div class="container mt-4">
        <?php
        if (!isset($_COOKIE['user']) || $_COOKIE['user'] == ''):
        ?>
        <div class="row">
            <h1>Register</h1>
            <form action="check.php" method="post">
                <input type="text" class="form-control" name="login" placeholder="Enter login"><br>
                <input type="text" class="form-control" name="email" placeholder="Enter email"><br>
                <input type="password" class="form-control" name="password" placeholder="Enter password"><br>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
            <div class="col"><br><br><br>
                <h1>Authorization</h1>
                <form action="autho.php" method="post">
                    <input type="text" class="form-control" name="login" placeholder="Enter login"><br>
                    <input type="password" class="form-control" name="password" placeholder="Enter password"><br>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
            <?php else: ?>
                <p>Hello  <?=$_COOKIE['user']?>. To exit, click<a href="/exit.php"> here </a></p>

            <?php endif;?>
        </div>
    </div>

</body>
</html>
