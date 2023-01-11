<?php

/**
* WPBakery Page Builder Ohio Team Members Group shortcode view
*/

?>
<div class="ohio-team-members-group-sc team-member cover <?php echo 'column-' . preg_match_all('/ohio_team_member_inner/i', $content, $matches); ?><?php echo $css_class; ?>" 
	data-ohio-cover-box="true"
	id="<?php echo $team_group_uniqid; ?>"
	<?php if ( $appearance_effect != 'none' ) { echo ' data-aos="' . esc_attr( $appearance_effect ) . '"'; } ?> 
	<?php if ( $appearance_duration ) { echo ' data-aos-duration="' . esc_attr( $appearance_duration ) . '"'; } ?>
		<?php if ( $appearance_delay ) echo ' data-aos-delay="' . $appearance_delay . '"'; ?>
	<?php if ( !$appearance_once ) echo ' data-aos-once="true"'; ?>>

	<?php echo do_shortcode( $content ); ?>

</div>