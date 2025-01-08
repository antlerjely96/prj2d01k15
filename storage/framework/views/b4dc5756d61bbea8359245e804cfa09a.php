<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update a product</title>
</head>
<body>
    <form action="<?php echo e(route('products.update', $product->id)); ?>" method="post">
        <?php echo csrf_field(); ?>
        <?php echo method_field("PUT"); ?>
        <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
        Name: <input type="text" name="name" value="<?php echo e($product->name); ?>"><br>
        Price: <input type="text" name="price" value="<?php echo e($product->price); ?>"><br>
        Quantity: <input type="text" name="quantity" value="<?php echo e($product->quantity); ?>"><br>
        Brand: <select name="brand_id">
            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($brand->id); ?>"
                    <?php if($brand->id == $product->brand_id): ?>
                        <?php echo e('selected'); ?>

                    <?php endif; ?>
                >
                    <?php echo e($brand->name); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select><br>
        <button>Update</button>
    </form>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\prj2d01k15\resources\views/Product/edit.blade.php ENDPATH**/ ?>