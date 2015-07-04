<?php /* Template Name: What we do */ ?>
<?php get_header() ?>
<div class="section <?php echo $post->post_name ?>"  id="<?php echo $post->post_name ?>" data-anchor="<?php echo $post->post_name ?>" data-title="<?php wp_title()?>">
	<!-- title -->
<section class="page-title white">
	<div class="vcenter">
<div><h1 class="underline"><?php echo $post->post_title ?></h1><?php /* <h2 class="underline"><?php echo get_field('sub_heading',$post->ID) ?></h2> */ ?></div>
</div>
</section> 
<!-- /title -->
<?php
list($src,$w,$h) = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');
//$src = getRetinaSrc($src);
?>
<!-- banner -->
<section class="banner">
	<?php

	if(get_field('image_grid')):
		$c=1;
while(the_repeater_field('image_grid')): 
	$class="";
	if($c>6) $class=' medium-up';
	if($c>10) $class=' medium-up large-up';
	if($c>12) $class=' medium-up large-up xlarge-up';
list($src,$w,$h) = wp_get_attachment_image_src(get_sub_field('image'), 'full');
?>
<div class="grid-square<?php echo $class ?>"><div class="inner-wrap"><img src="<?php echo $src ?>" /></div></div>

<?php
$c++;
endwhile;
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
<div class="column"><a href="http://<?php echo get_sub_field('column_logo_url') ?>" target="_blank" class="inner">
	<?php if(get_sub_field('column_heading')): ?>
	<h3><?php echo get_sub_field('column_heading') ?></h3>
<?php endif ?>
	<?php
	list($svg_src) = wp_get_attachment_image_src(get_sub_field('column_logo_svg'),'full');
	$alt = get_post_meta(get_sub_field('column_logo_svg'),'_wp_attachment_image_alt', true);
	list($png_src) = wp_get_attachment_image_src(get_sub_field('column_logo_png'),'full');
	if($svg_src): 
		?>
	<figure class="logo"><img src="<?php echo $svg_src ?>" alt="<?php echo $alt ?>" onerror="this.onerror=null; this.src='<?php echo $png_src ?>'" /></figure>
<?php endif ?>
	<p><?php echo do_shortcode(get_sub_field('column_content')) ?></p>
</a>
</div>
<?php endwhile; ?>
<?php endif; ?>
</div></section>
<!-- /content -->
</div>
<?php get_footer() ?>