<?php danupe()->view()->get('plugin-user', 'header'); ?>
<?php danupe()->view()->get('plugin-user', 'pageTitle', ['title' => $title]); ?>


<div class="mb-4">
    <a href='/<?php echo danupe()->env()->get('DANUPE_ADMIN_PREFIX'); ?>/skeletons' class="btn btn-solid-secondary">Skeletons</a>
</div>


<form method="POST" action="/<?php echo danupe()->env()->get('DANUPE_ADMIN_PREFIX'); ?>/skeletons/update_post" class="grid grid-cols-1 md:grid-cols-1 gap-4">

    <?php echo danupe()->plugin('user', 'form')->csrf(); ?>
    <?php echo danupe()->plugin('user', 'form')->input('id', 'hidden', danupe()->data()->get($skeleton, 'id')); ?>

    <div class="form-group">
        <?php echo danupe()->plugin('user', 'form')->label('text', 'Text'); ?>
        <?php echo danupe()->plugin('user', 'form')->input('text', '', danupe()->data()->get($skeleton, 'text') ?: danupe()->session()->old('text')); ?>
    </div>

    <?php echo danupe()->plugin('user', 'form')->submit('submit'); ?>
</form>

<div class="divider divider-horizontal">OR</div>

<div class="mb-4">
    <form method="POST" action="/<?php echo danupe()->env()->get('DANUPE_ADMIN_PREFIX'); ?>/skeletons/delete_post" class="grid grid-cols-1 md:grid-cols-8 gap-4">
        <?php echo danupe()->plugin('user', 'form')->csrf(); ?>
        <?php echo danupe()->plugin('user', 'form')->input('id', 'hidden', danupe()->data()->get($skeleton, 'id')); ?>
        <?php echo danupe()->plugin('user', 'form')->submit('delete', ['class' => 'btn btn-solid-error']); ?>
    </form>
</div>



<?php danupe()->view()->get('plugin-user', 'footer'); ?>