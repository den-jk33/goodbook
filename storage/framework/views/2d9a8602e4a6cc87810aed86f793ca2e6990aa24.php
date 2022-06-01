 <?php echo $__env->make('includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <?php echo $__env->make('includes.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php if(!empty($text)): ?>
                    <div style="padding-top: 50px;">
                        <?php echo e($text); ?>

                    </div>
                <?php endif; ?>

            </div>
        </div>
    </body>
</html>
<?php /**PATH E:\server\domains\books\resources\views/main.blade.php ENDPATH**/ ?>