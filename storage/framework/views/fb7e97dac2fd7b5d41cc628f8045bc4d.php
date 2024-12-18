<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
    <h1>Brand List</h1>
    <table border="1px" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Country</td>
        </tr>
        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <?php echo e($brand->id); ?>

                </td>
                <td>
                    <?php echo e($brand->name); ?>

                </td>
                <td>
                    <?php echo e($brand->country); ?>

                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\prj2d01k15\resources\views/Brand/index.blade.php ENDPATH**/ ?>