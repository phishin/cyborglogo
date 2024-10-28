<?php
// Infinite Horizontal Scroller. Uses /_assets/js/infinite-scroller.js
// and /_assets/scss/infinite-scroller.scss. Uncomment the
// import in main.js to enable the JavaScript.
?>

<div {{ $attributes->merge(['class' => 'scroll-container']) }}>
	<div class="scroll-list">
		<div class="scroll-item">
			{{ $slot }}
		</div>
	</div>
</div>
