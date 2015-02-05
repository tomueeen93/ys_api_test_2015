<h1>API test page</h1>
<ul>
	<li><?php echo $test_request ?></li>
	<?php foreach ((array)$api_result as $each): ?>
		<li><?php echo $each ?></li>
	<?php endforeach; ?>
</ul>