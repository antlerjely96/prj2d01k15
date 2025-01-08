<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product List</title>
</head>
<body>
    <table border="1px" cellspacing="0" cellpadding="0" width="50%">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Price</td>
            <td>Quantity</td>
            <td>Brand</td>
        </tr>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <?php echo e($product->id); ?>

                </td>
                <td>
                    <?php echo e($product->name); ?>

                </td>
                <td>
                    <?php echo e($product->price); ?>

                </td>
                <td>
                    <?php echo e($product->quantity); ?>

                </td>
                <td>
                    <?php echo e($product->brand_name); ?>

                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\prj2d01k15\resources\views/product/index.blade.php ENDPATH**/ ?>