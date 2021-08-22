<?php

//http://duurzaamheidsvinder.local/webshop/
get_header();


$archiveWebshop = new WP_Query(array(
    'posts_per_page' => 10,
    'post_type' => 'webshop'
));
$description = get_the_archive_description();
?>

<?php if ($archiveWebshop->have_posts() ) : ?>

	<header class="page-header alignwide">
		<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
		<?php if ( $description ) : ?>
			<div class="archive-description"><?php echo wp_kses_post( wpautop( $description ) ); ?></div>
		<?php endif; ?>
	</header><!-- .page-header -->

	<?php while ($archiveWebshop->have_posts() ) : ?>
		<?php the_post(); ?>
<!-- Here I added the template part and changed it -->

		
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( is_singular() ) : ?>
			<?php the_title( '<h1 class="entry-title default-max-width">', '</h1>' ); ?>
		<?php else : ?>
			<?php the_title( sprintf( '<h2 class="entry-title default-max-width"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<?php endif; ?>

		<?php twenty_twenty_one_post_thumbnail(); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content(
			twenty_twenty_one_continue_reading_text()
		);
//Hier heb ik de custom buttons toegevoegd
		echo the_field('verzendland'), ', verzendkosten €', the_field('verzendkosten'), ', gratis retour: ', (get_field('retour')? 'ja' : 'nee'); ?>
 
		<br>
		<!-- Hier voeg ik de gerelateerde merken toe aan de webshop archive page -->
		<?php 
		$relatedBrands = get_field('webshop_merken');
		
		foreach($relatedBrands as $brand) { ?>
			<li><a href="<?php echo get_the_permalink($brand); ?>"><?php echo get_the_title($brand); ?></a></li>
			
			<?php
		}



		wp_link_pages(
			array(
				'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'twentytwentyone' ) . '">',
				'after'    => '</nav>',
				/* translators: %: Page number. */
				'pagelink' => esc_html__( 'Page %', 'twentytwentyone' ),
			)
		);

		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer default-max-width">
		<?php twenty_twenty_one_entry_meta_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->

	<?php endwhile; ?>

	<?php twenty_twenty_one_the_posts_navigation(); ?>

<?php else : ?>
	<?php get_template_part( 'template-parts/content/content-none' ); ?>
<?php endif; 

get_footer();
?>
