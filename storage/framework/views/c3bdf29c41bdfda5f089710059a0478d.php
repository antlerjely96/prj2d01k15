<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
</head>
<body>
    <form method="post" action="<?php echo e(route('loginProcess')); ?>">
        <?php echo csrf_field(); ?>
        Email: <input type="email" name="email"><br>
        Password: <input type="password" name="password"><br>
        <button>Login</button>
    </form>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\prj2d01k15\resources\views/Login/login.blade.php ENDPATH**/ ?>