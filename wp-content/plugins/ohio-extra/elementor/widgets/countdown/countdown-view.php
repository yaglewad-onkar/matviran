<?php
	$labels  = esc_html__( 'Months', 'ohio-extra' ) . ',';
	$labels .= esc_html__( 'Days', 'ohio-extra' ) . ',';
	$labels .= esc_html__( 'Hours', 'ohio-extra' ) . ',';
	$labels .= esc_html__( 'Minutes', 'ohio-extra' ) . ',';
	$labels .= esc_html__( 'Seconds', 'ohio-extra' );
?>
<div class="ohio-countdown-box-sc countdown-box <?php echo $this->getWrapperClasses(); ?>" 
	id="<?php echo esc_attr( $countdown_box_uniqid ); ?>" 
	data-countdown-labels="<?php echo $labels; ?>" 
	data-countdown-box="template_<?php echo esc_attr( $countdown_box_uniqid ); ?>" 
	data-countdown-time="<?php echo esc_attr( $countdown_time ); ?>">
</div>

<?php if ( $settings['block_layout'] == 'default' ): ?>
	<script type="text/template" id="template_<?php echo esc_attr( $countdown_box_uniqid ); ?>">
		<div class="box-time <%= label %>">
			<div class="title-lead box-count box-next">
				<span class="number font-titles"><%= next %></span>
			</div>
			<h6 class="box-label"><%= label %></h6>
		</div>
	</script>
<?php else: ?>
	<script type="text/template" id="template_<?php echo esc_attr( $countdown_box_uniqid ); ?>">
		<div class="box-time <%= label %>">
			<div class="title-lead box-count">
				<div class="box-current box-top">
					<span class="number font-titles"><%= current %></span>
				</div>
				<div class="box-next box-top">
					<span class="number font-titles"><%= next %></span>
				</div>
				<div class="box-next box-bottom">
					<span class="number font-titles"><%= next %></span>
				</div>
				<div class="box-current box-bottom">
					<span class="number font-titles"><%= current %></span>
				</div>
			</div>
			<h6 class="box-label"><%= label %></h6>
		</div>
	</script>
<?php endif; ?>