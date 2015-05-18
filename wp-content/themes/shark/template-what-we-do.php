<?php /* Template Name: What we do */ ?>
<?php get_header() ?>
<div class="section" id="<?php echo $post->post_name ?>" data-anchor="<?php echo $post->post_name ?>" data-title="<?php wp_title()?>">
	<!-- title -->
<section class="page-title white">
	<div class="vcenter">
<div><h1 class="underline"><?php echo $post->post_title ?></h1><?php /* <h2 class="underline"><?php echo get_field('sub_heading',$post->ID) ?></h2> */ ?></div>
</div>
</section> 
<!-- /title -->
<?php
list($src,$w,$h) = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'page-letterbox-image');
//$src = getRetinaSrc($src);
?>
<!-- banner -->
<section class="banner">
	<?php
	if(get_field('image_grid')):
while(the_repeater_field('image_grid')): 
list($src,$w,$h) = wp_get_attachment_image_src(get_sub_field('image'), 'full');
?>
<div class="image-square" style="background-image:url('<?php echo $src ?>');"></div>
<?php endwhile;
endif;
?>
</section>   
<!-- /banner -->
<!-- content -->
<section class="content blue">
    <div class="column-wrap">
    <?php
if(get_field('columns',$post->ID)):
while(the_repeater_field('columns',$post->ID)): 
?>
<div class="column"><div class="inner">
	<h3><?php echo get_sub_field('column_heading') ?></h3>
	<?php echo do_shortcode(get_sub_field('column_content')) ?>
</div>
</div>
<?php endwhile; ?>
<?php endif; ?>
</div></section>
<!-- /content -->
</div>
<?php get_footer() ?>