<!DOCTYPE html>
<html <?php language_attributes()?>>
  <head>
    <meta charset="<?php echo get_bloginfo('charset')?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content= "<?php echo get_bloginfo('description')?>" />
    <?php // <!-- Stylesheets --> ?>
    <?php wp_head() ?>
  </head>

  <body id="top" <?php body_class() ?> > 
    <?php // <!-- ****** - NAVIGATION - ****** --> ?>
    <nav id="main__nav">   
      <?php //   <!-- Check if there is a Logo image --> ?>
      <?php $logo_image = get_field('logo', 'options') ?>
      <?php 
        if(empty($logo_image)) {
          $class_logo = 'main__nav--no-logo';
        }
        else {
          $class_logo = '';
        }
      ?>

      <div class="container <?php echo $class_logo ?>">
        <?php // <!-- LOGO --> ?>
        <?php if(!empty($logo_image)): ?>
          <div id="brand" class='hide-cursor'>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"> 
              <?php echo wp_get_attachment_image($logo_image, 'full') ?>
            </a>
          </div>
        <?php endif; ?>
        <?php // <!-- HAMBURGER MENU--> ?>
        <div class="hamburger-menu hide-cursor">
          <span class="screen-reader-text">
            <?php _e('Click to open the menu', '_themename') ?>
          </span>
          <div class="line"></div>
        </div>
        <?php // <!-- Navigation MENU --> ?>
        <?php  wp_nav_menu(
                array (
                    'theme_location' => 'primary',
                    'menu_class' => 'main__nav--list',
                    'menu_id' => '',
                    'container' => false,
                    'fallback_cb' => false,
                    'depth' => 1
                )
            );       
        ?>
      </div>
  </nav>
  <!-- Check if progress bar block exists -->
  <?php include(locate_template('template-parts/progress-bar-condition.php')) ?>

