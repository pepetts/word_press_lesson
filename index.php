<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>
    <?php wp_title('|','true','right'); ?>
    <?php bloginfo('name'); ?>
  </title>
  <link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <!-- header start-->
  <header>
    <div class="container">
      <div class="siteinfo">
        <h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
        <p><?php bloginfo('description'); ?></p>
      </div>
    </div>
  </header>
  <!-- header end -->
  <!-- content start -->
  <div class="container">
    <?php if(have_posts()): while(have_posts()): the_post(); ?>
    
    <article <?php post_class(); ?>>
    <?php if(is_single()): ?>
      <h1><?php the_title(); ?></h1>
    <?php else: ?>
      <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
    <?php endif; ?>
      <div class="postinfo">
        <time datetime="<?php echo get_the_date('Y-m-d') ?>">
        <i class="far fa-clock"></i>
        <?php echo get_the_date(); ?>
        </time>
        
        <span class="postcat">
          <i class="far fa-folder-open"></i>
          <?php the_category(','); ?>
        </span>
      </div>
      <p><?php the_content(); ?></p>
      <?php if(is_single()): ?>
      <div class="pagenav">
        <span class="old">
          <?php previous_post_link('%link','<i class="fas fa-chevron-circle-left"></i> %title'); ?>
        </span>
        <span class="new">
          <?php next_post_link('%link','%title <i class="fas fa-chevron-circle-right"></i>'); ?>
        </span>
      </div>
      <?php endif; ?>
    </article>
    <?php endwhile; endif; ?>
    
    <?php if($wp_query->max_num_pages > 1 ): ?>
    <div class="pagenav">
      <span class="old">
        <?php next_posts_link('<i class="fas fa-chevron-circle-left"></i> 古い記事'); ?>
      </span>
      <span class="new">
        <?php previous_posts_link('新しい記事 <i class="fas fa-chevron-circle-right"></i>'); ?>
      </span>
    </div>
    <?php endif ?>
  </div><!--container-->
  <!-- contents end -->
  <!-- footer start -->
  <footer>
    <div class="container">
      <small>Copyright &copy; <?php bloginfo('name'); ?></small>
    </div>
  </footer>
  <!-- footer end -->
  <?php wp_footer(); ?>
</body>
</html>