<article class="main__article no-results">
    <h2><?php _e('Nothing Found', 'twist'); ?></h2>
    <?php if (is_search()): ?>
    <p>
        <?php _e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twist'); ?>
    </p>
    <?php else: ?>
    <p>
        <?php _e('It seems we can not find what you are looking for. Perhaps searching can help.', 'twist'); ?>
    </p>
    <?php endif; ?>
</article>
