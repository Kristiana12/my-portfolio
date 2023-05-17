<div class="text-wrapper hide-cursor center">
    <?php $text_block = get_field('text_block');?>
    <?php // <!-- Check if there is a title --> ?>
    <?php if(!empty($text_block['title'])): ?>
        <h5> <?php echo $text_block['title'] ?></h5>
    <?php endif; ?>

    <?php // <!-- Check if there is are rows --> ?>
    <?php if( have_rows('text_block') ): while ( have_rows('text_block') ) : the_row(); 
            if( have_rows('paragraphs') ): while ( have_rows('paragraphs') ) : the_row();?>
                <p class="text">
                    <?php  echo get_sub_field('paragraph'); ?>
                </p>
            <?php  endwhile; endif;    
    endwhile; endif; ?> 
</div>