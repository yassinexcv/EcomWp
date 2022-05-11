<div id="search-overlay" class="block">
	<div class="centered">
		<div id="search-box">
			<i id="close-btn" class="fa fa-times fa-2x"></i>
			<form action="" id='top-search-form' method='get'>
				<input id='search-text' name='s' placeholder='<?php echo esc_attr__('Search', 'fashionable-store'); ?>'
				       type='text'/>
                <input type="hidden" name="post_type" value="product" />
				<button id='search-button' type='submit'>
					<span><?php echo esc_html__('Search', 'fashionable-store'); ?></span>
				</button>

			</form>
		</div>
	</div>
</div>