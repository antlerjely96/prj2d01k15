<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product List</title>
</head>
<body>
    <a href="<?php echo e(route('products.create')); ?>">Add a product</a>
    <table border="1px" cellspacing="0" cellpadding="0" width="50%">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Price</td>
            <td>Quantity</td>
            <td>Description</td>
            <td>Brand</td>
            <td>Image</td>
            <td></td>
            <td></td>
            <td></td>
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
                    <?php echo e($product->description); ?>

                </td>
                <td>
                    <?php echo e($product->brand->name); ?>

                </td>
                <td>
                    <img src="<?php echo e(asset(\Illuminate\Support\Facades\Storage::url('Admin/') . $product->image)); ?>" width="50px" height="50px">
                </td>
                <td>
                    <a href="<?php echo e(route('products.edit', $product->id)); ?>">Edit</a>
                </td>
                <td>
                    <form action="<?php echo e(route('products.destroy', $product->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field("DELETE"); ?>
                        <button>Delete</button>
                    </form>
                </td>

                <td>
                    <a href="<?php echo e(route('products.addToCart', $product->id)); ?>">Add to Cart</a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\prj2d01k15\resources\views/product/index.blade.php ENDPATH**/ ?>