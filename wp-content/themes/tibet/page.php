<?php 
get_header();

$focus_src = trim(get_post_meta($post->ID, 'focus_src', true)); 
if( !$focus_src ) {
	$focus_src = _hui('page_focus_image');
}

?>

<div class="leader-title" style="background-image: url(<?php echo $focus_src ?>)">
	<div class="container">
		<h1><?php the_title(); ?></h1>
	</div>
</div>

<section class="container">
    <div class="pagecontainer">
    	<?php /* ?>
    	<div class="pagemenus">
			<ul><?php _the_menu('pagenav'); ?></ul>
		</div>
		<?php */ ?>

		<?php while (have_posts()) : the_post(); ?>

    		<article class="article-content">
    			<?php the_content(); ?>
    		</article>

		<?php endwhile; ?>

    </div>
</section>

<?php get_footer(); ?>