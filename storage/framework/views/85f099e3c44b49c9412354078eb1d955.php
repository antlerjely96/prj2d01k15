<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add a product</title>
</head>
<body>
    <form action="<?php echo e(route('products.store')); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        Name: <input type="text" name="name"><br>
        Price: <input type="text" name="price"><br>
        Quantity: <input type="text" name="quantity"><br>
        Description: <input type="text" name="description"><br>
        Brand: <select name="brand_id">
            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($brand->id); ?>">
                    <?php echo e($brand->name); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select><br>
        Image: <input type="file" name="image"><br>
        <button>Add</button>
    </form>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\prj2d01k15\resources\views/Product/create.blade.php ENDPATH**/ ?>