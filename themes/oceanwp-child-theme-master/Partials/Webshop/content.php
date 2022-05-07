<?php
/**
 * Post single content
 *
 * @package OceanWP WordPress theme
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<?php do_action( 'ocean_before_single_post_content' ); ?>

<div class="entry-content clr"<?php oceanwp_schema_markup( 'entry_content' ); ?>>
	<?php
	the_content();

		//Hier heb ik de custom buttons toegevoegd
		echo 'Verzend vanuit: ', the_field('verzendland'); 
		echo '<br>';
		echo 'Verzendkosten: €', the_field('verzendkosten');
		echo '<br>';
		echo 'Gratis retour: ', (get_field('retour')? 'ja' : 'nee'); 
		echo '<br>';
		echo '<br>';
		echo 'Webshop verkoopt de volgende duurzame merken: '; ?>
 
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
			'before'      => '<div class="page-links">' . __( 'Pages:', 'oceanwp' ),
			'after'       => '</div>',
			'link_before' => '<span class="page-number">',
			'link_after'  => '</span>',
		)
	);
	?>

</div><!-- .entry -->

<?php do_action( 'ocean_after_single_post_content' ); ?>
