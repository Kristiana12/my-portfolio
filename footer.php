<footer class="footer">
      <?php 
        // Social Icons on Footer
        if(have_rows('icons', 'options')): ?>
            <ul class="footer__nav--list">
                <?php while(have_rows('icons', 'options')) : the_row();    
                  $icon = get_sub_field('icon'); 
                  $name = get_sub_field('name'); 
                  $url = get_sub_field('url');
                  ?> 
                    <?php if(!empty($icon) && !empty($name) && !empty($url)): ?>
                      <li class="hide-cursor">
                        <a href="<?php echo esc_url($url) ?>" rel="no-follow" target="_blank" title="<?php echo  esc_attr($name) ?>">
                          <?php echo $icon; ?>
                        </a>
                      </li>
                    <?php endif; ?>  
                  <?php endwhile; ?>                
              </ul>
      <?php endif; ?>
      <?php // <!-- Footer Text --> ?>
      <?php $footer_text = get_field('footer_text', 'options') ?>
      <p class="hide-cursor">
          <?php // <!-- Check if field is empty --> ?>
          <?php if(!empty($footer_text['text'])): ?>
            <?php echo esc_attr($footer_text['text']) ?>
          <?php endif; ?>
          <?php // <!-- Check if field is empty --> ?>
          <?php if(!empty($footer_text['image'])): ?>
            <span class="heart-icon">
                <?php echo wp_get_attachment_image( $footer_text['image']); ?>
            </span>
          <?php endif; ?>
          <?php // <!-- Check if field is empty --> ?>
          <?php if(!empty($footer_text['text_after_image'])): ?>
            <?php echo esc_attr($footer_text['text_after_image']) ?>
          <?php endif; ?>

          <?php echo $footer_text['copy_sign'] ?> 
          <?php // <!-- Check if field is empty --> ?>
          <?php if(!empty($footer_text['colorised_text'])): ?>
            <span class="<?php echo $footer_text['colorised'] ?> ">
                <?php echo esc_attr($footer_text['colorised_text']) ?> 
            </span>
          <?php endif; ?>
      </p>
</footer>

  <?php // <!-- ****** - CURSOR MOUSE ANIMATION  - ****** --> ?>
    <div class="cursors">
      <?php $cursor_image = get_field('cursor_image', 'options'); ?> 
      <div style="background-image: url('<?php echo $cursor_image; ?>)'"></div>
    </div>

    <?php //  <!-- To top Button --> ?>
    <?php 
    $button_outside = get_field('button_to_top_outside', 'options'); 
    $button_inside = get_field('button_to_top_inside', 'options'); 
    ?>
    <a class="image-to-top hide-cursor"
        href="#top"
        aria-label="click to return to top" >
          <?php if(!empty($button_outside)): ?>
            <?php echo wp_get_attachment_image($button_outside, 'full', true, array('class' => 'bubble-to-top')) ?>
          <?php endif; ?>  
          <?php echo wp_get_attachment_image($button_inside, 'full', true, array('class' => 'arrow-up')) ?> 
    </a>
    
    <?php wp_footer() ?>
  </body>
</html>

