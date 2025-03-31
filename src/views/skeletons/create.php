<?php danupe()->view()->get('plugin-user', 'header'); ?>
<?php danupe()->view()->get('plugin-user', 'pageTitle', ['title' => $title]); ?>
<?php danupe()->view()->get('plugin-user', 'alert'); ?>

<div class="mb-4">
    <a href='/<?php echo danupe()->env()->get('DANUPE_ADMIN_PREFIX'); ?>/skeletons' class="btn btn-solid-secondary">Skeletons</a>
</div>

<form method="POST" action="/<?php echo danupe()->env()->get('DANUPE_ADMIN_PREFIX'); ?>/skeletons/create_post" class="grid grid-cols-1 md:grid-cols-1 gap-4">

    <?php echo danupe()->plugin('user', 'form')->csrf(); ?>

    <div class="form-group">
        <?php echo danupe()->plugin('user', 'form')->label('text', 'Text'); ?>
        <?php echo danupe()->plugin('user', 'form')->input('text', '', danupe()->session()->old('text')); ?>
    </div>

    <?php echo danupe()->plugin('user', 'form')->submit(); ?>
</form>

<?php danupe()->view()->get('plugin-user', 'footer'); ?>