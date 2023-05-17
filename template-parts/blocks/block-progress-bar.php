<?php $progress_bar = get_field('progress_bar'); ?>

<section class="section-skills__progress-bar container">
    <?php if(!empty($progress_bar['title_colorised'] || !empty($progress_bar['title_normal']))): ?>
        <h3 class="skills__title hide-cursor">
            <span class="<?php echo $progress_bar['colorised'] ?>"><?php echo $progress_bar['title_colorised'] ?></span> <?php echo $progress_bar['title_normal'] ?>
        </h3>
     <?php endif; ?>
 
     <?php if( have_rows('progress_bar') ): while ( have_rows('progress_bar') ) : the_row(); ?>
        <div class="circle-container">
            <?php if( have_rows('circles') ): while ( have_rows('circles') ) : the_row();    
            $text = get_sub_field('text_inside');
            $rotation = get_sub_field('rotate_degrees');
            $color = get_sub_field('color'); ?>

                <?php if(!empty($text) && !empty($rotation) && !empty($color)): ?>
                    <div class="circle-wrap hide-cursor">
                        <div class="circle">
                            <div class="mask half">
                                <div class="fill" style= <?php echo "transform:rotate(" . $rotation . "deg);background-color:" . $color ?>></div>
                            </div>
                            <div class="mask full" style= <?php echo "transform:rotate(" . $rotation . "deg);" ?>>
                                <div class="fill" style= <?php echo "transform:rotate(" . $rotation . "deg);background-color:" . $color ?>></div>
                            </div>
                        </div>
                        <div class="inside-circle"><?php echo $text ?></div>
                    </div>
                <?php endif; ?>
            <?php endwhile; endif;?>
        </div>
    <?php endwhile; endif; ?>
</section>
