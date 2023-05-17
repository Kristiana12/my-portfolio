<?php // <!-- IMAGES DECO --> ?>
<?php $bubble_image =  get_field('bubble', 'options') ?>

<?php echo wp_get_attachment_image($bubble_image, 'full', true, array('class' => 'bubble-home-s bubble')) ?>
<?php echo wp_get_attachment_image($bubble_image, 'full', true, array('class' => 'bubble-home-m bubble')) ?>
<?php echo wp_get_attachment_image($bubble_image, 'full', true, array('class' => 'bubble-home-l bubble')) ?>

  