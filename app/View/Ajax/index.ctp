<script>
	//console.log(<?php //echo json_encode($api_result) ?>);
	
	//var json_string = <?php //echo json_encode($api_result) ?>;
	// var json_array = JSON.parse(json_string);
	function setResultArray(array){
		console.log(array);
	}
</script>

<button onclick="ajaxMethod(5,15);" class="btn btn-default">ajaxTest</button>

<div id="search-result" class="row">
	<h3>商品一覧</h3>
	<!-- li><?//php var_dump($items) ?></li> -->
	<?php foreach ((array)$items as $each): ?>
			<?php if(array_key_exists("Name",(array)$each)) {?>
				<div class="content col-xs-12 col-sm-6 col-md-4 col-lg-3">
					<div class="content-image centr col-xs-2 col-sm-2 col-md-12 col-lg-12">
						<div>
							<?php echo $this->Html->link(
							 	$this->Html->image($each['Image']['Medium'], array('alt' => $each['Image']['Id'])),
							 	$each['Url'],
							 	array('target' => '_blank', 'escape' => false)
							); ?>
						</div>
					</div>
					<div class="content-name col-xs-7 col-sm-7 col-md-12 col-lg-12">
						<?php echo $this->Html->link(
							$each["Name"],
							$each['Url'],
							array('target' => '_blank', 'escape' => false)
						); ?>
					</div>
					<div class="content-price col-xs-7 col-sm-7 col-md-12 col-lg-12">
						￥<?php print_r($each["Price"]["_value"]) ?>
					</div>
				</div>	
			<?php } ?>
	<?php endforeach; ?>
</div>
