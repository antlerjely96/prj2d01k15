<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit a brand</title>
</head>
<body>
    <p>Edit a brand</p>
    <form action="<?php echo e(route('brands.update', $brand->id)); ?>" method="post">
        <?php echo method_field('PUT'); ?>
        <?php echo csrf_field(); ?>
        ID: <input type="text" name="id" readonly value="<?php echo e($brand->id); ?>"> <br>
        Name: <input type="text" name="name" value="<?php echo e($brand->name); ?>"><br>
        Country: <input type="text" name="country" value="<?php echo e($brand->country); ?>"><br>
        <button>Update</button>
    </form>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\prj2d01k15\resources\views/Brand/edit.blade.php ENDPATH**/ ?>