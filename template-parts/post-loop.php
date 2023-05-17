<?php // <!-- Post Loop --> ?>
<?php // Get the category slug to style the post based on the category
    $categories = get_the_category( get_the_ID());
    //checks if the variable is already declared
    if(isset($post_ids))  array_push($post_ids, get_the_ID()); ?>   
<?php // <!-- Get category for each Post when not empty --> ?>
<?php  if ( ! empty( $categories ) ): ?>
    <?php // <!-- Echoes the first array element ([0]) of $categories. --> ?>
    <article class="blog__card <?php echo esc_html( $categories[0]->slug ); ?>-article hide-cursor">
        <?php // <!-- Title --> ?>
        <h4 class="blog__card--title">
            <?php the_title(); ?>
        </h4>
        <?php // <!-- Excerpt --> ?>
        <?php the_excerpt(); ?>
        <?php // <!-- Link to blog site --> ?>
        <a href="<?php the_permalink(); ?>"><?php _e('Read article', '_themename') ?></a>
    </article>
<?php endif; ?>
