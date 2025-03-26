<table border="1px" cellpadding="0" cellspacing="0">
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Price</td>
        <td>Quantity</td>
        <td>Image</td>
        <td></td>
    </tr>
    <form method="post" action="<?php echo e(route('products.updateCart')); ?>">
        <?php echo csrf_field(); ?>
        <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($id); ?></td>
                <td><?php echo e($product['name']); ?></td>
                <td><?php echo e($product['price']); ?></td>
                <td>
                    <input type="text" name="product[<?php echo e($id); ?>]" value="<?php echo e($product['quantity']); ?>">
                </td>
                <td>
                    <img src="<?php echo e(asset(\Illuminate\Support\Facades\Storage::url('Admin/') . $product['image'])); ?>" width="50px" height="50px">
                </td>
                <td>
                    <a href="<?php echo e(route('products.deleteAProduct', $id)); ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td colspan="6">
                <button>Update Cart</button>
            </td>
        </tr>
    </form>
    <tr>
        <td colspan="6">
            <a href="<?php echo e(route('products.deleteAllProducts')); ?>">Delete All Product</a>
        </td>
    </tr>
</table>
<?php /**PATH C:\xampp\htdocs\prj2d01k15\resources\views/Product/cart.blade.php ENDPATH**/ ?>