<section class="pagination">
    <?php if(get_next_posts_link()) { ?>
        <div class="page-nav-bar">
            <div class="page-nav">
                <?php wp_pagenavi(); ?>
            </div>
        </div>
    <?php } else { ?>
        <p class="havenomore">Have no more!</p>
        <?php if(get_previous_posts_link()) { ?>
            <div class="page-nav-bar">
                <div class="page-nav">
                    <?php wp_pagenavi(); ?>
                </div>
            </div>
        <?php } ?>
    <?php } ?>
</section>
