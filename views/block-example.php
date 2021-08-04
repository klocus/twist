<div class="block">
    <div class="block__heading">
        <h1><?php echo esc_html($args['fields']['heading']); ?></h1>
    </div><!-- /.block__heading -->

    <div class="block__image">
        <?php echo wp_get_attachment_image($args['fields']['image'], 'full'); ?>
    </div><!-- /.block__image -->

    <div class="block__content">
        <?php echo apply_filters('the_content', $args['fields']['content']); ?>
    </div><!-- /.block__content -->
</div><!-- /.block -->