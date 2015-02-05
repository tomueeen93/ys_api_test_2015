<ul>
	<h2>API test page</h2>
	<script>
		console.log(<?php echo json_encode($api_result) ?>);
		
		var json_string = <?php echo json_encode($api_result) ?>;
		var json_array = JSON.parse(json_string);
		
	</script>
	<?php $items = $api_result["ResultSet"][0]["Result"] ?>
	
	
	<h2>検索ワード : <?php print_r($query) ?></h2>
	<h2>商品数 : <?php print_r(count($items)-3) ?></h2>
	<p></p>
	<h3>商品一覧</h3>
	<!--<li><?php var_dump($items) ?></li>-->
	<?php foreach ((array)$items as $each): ?>
		<?php if(array_key_exists("Name",(array)$each)) {?>
			<li><?php print_r($each["Name"]) ?></li>
		<?php } ?>
	<?php endforeach; ?>
</ul>
