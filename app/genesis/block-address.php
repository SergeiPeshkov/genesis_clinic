<?php $blocks = maybe_unserialize(get_option('gnss_blocks')); ?>
<!-- .address -->
<div class="address">
	<div class="map">
		<?=stripslashes($blocks['map'])?>
	</div>
</div>
<!-- /.address -->