<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add a brand</title>
</head>
<body>
    <p>Add a brand</p>
    <form action="<?php echo e(route('brands.store')); ?>" method="post">
        <?php echo csrf_field(); ?>
        Name: <input type="text" name="name"><br>
        Country: <input type="text" name="country"><br>
        <button>Add</button>
    </form>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\prj2d01k15\resources\views/Brand/create.blade.php ENDPATH**/ ?>