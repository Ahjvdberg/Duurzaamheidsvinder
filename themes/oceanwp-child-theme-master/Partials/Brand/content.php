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
	echo 'Verkoopt ook BH\'s: ', (get_field('bhs')? 'ja' : 'nee'); 
	echo "<br>";
	echo 'Duurzaamheidslabels:';
	$duurz = get_field('duurzaamheidslabels');
	if( $duurz ): ?>
	<ul>
    	<?php foreach( $duurz as $duur ): ?>
        	<li><?php echo $duur; ?></li>
    	<?php endforeach; ?>
	</ul>
	<?php endif;
	echo 'Prijscategorie: ', get_field('prijs') ;


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
