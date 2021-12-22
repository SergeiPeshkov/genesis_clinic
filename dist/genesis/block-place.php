<?php $blocks = maybe_unserialize(get_option('gnss_blocks')); ?>
<!-- .place -->
<div class="place">
	<h2>Адреса и телефоны</h2>
    <p><?=nl2br(stripslashes($blocks['place']))?></p>
</div>
<!-- /.place -->