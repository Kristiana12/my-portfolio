<?php $list_group = get_field('lists'); ?>
<?php // <!-- SKILLS SECTION --> ?>
<section class="section-skills container">
  <?php if(!empty($list_group['colorised_title_word'] || !empty($list_group['title']))): ?>
  <h3 class="skills__title hide-cursor">
    <span class="<?php echo $list_group['colorised'] ?>"><?php echo $list_group['colorised_title_word'] ?></span> <?php echo $list_group['title'] ?>
  </h3>
  <?php endif; ?>

  <ul class="skills__list" >
      <?php if(have_rows('lists')) : while(have_rows('lists')) : the_row() ?>
          <?php if(have_rows('list_items')) : while(have_rows('list_items')) : the_row() ?>
              <?php // <!-- Check if field is empty --> ?>
              <?php $list_item = get_sub_field('list_item') ?>
              <?php if(!empty($list_item)): ?>
                  <li class="hide-cursor" style="list-style-image: url('<?php echo $list_group['list_image'] ?>')">
                      <span>
                          <?php echo $list_item ?>
                      </span>
                  </li>
              <?php endif; ?>
          <?php endwhile; endif;
        endwhile; endif; ?>
  </ul>
</section>