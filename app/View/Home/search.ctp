<script>
	console.log(<?php echo json_encode($api_result) ?>);
	
	var json_string = <?php echo json_encode($api_result) ?>;
	//var json_array = JSON.parse(json_string);
	
</script>

<?php $items = $api_result["ResultSet"][0]["Result"] ?>

<div id="search-option" class="row">
	<div class="col-xs-0 col-sm-2 col-md-2 col-lg-2"></div>
	<div id="search-option-word" class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
		<h5>検索ワード : <?php print_r($query) ?></h5>
	</div>
	<div id="search-option-hits" class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
		<h5>表示数 : <?php print_r(count($items)-3) ?></h5>
	</div>
</div>

<p></p>
<h3>商品一覧</h3>
<!-- li><?//php var_dump($items) ?></li> -->
<?php foreach ((array)$items as $each): ?>
	<?php if(array_key_exists("Name",(array)$each)) {?>
		<ul>
			<div class="content">
				<div class="content_image">
					<?php echo $this->Html->link(
					 	$this->Html->image($each['Image']['Medium'], array('alt' => $each['Image']['Id'])),
					 	$each['Url'],
					 	array('target' => '_blank', 'escape' => false)
					); ?>
				
				</div>  
				<div>商品名 : <?php print_r($each["Name"]) ?></div>
				<div>値段 : ￥<?php print_r($each["Price"]["_value"]) ?></div>
			</div>
		</ul>
	<?php } ?>
<?php endforeach; ?>
