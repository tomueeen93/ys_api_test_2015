<script>
	
	console.log(<?php echo json_encode($api_result) ?>);
	
	var json_string = <?php echo json_encode($api_result) ?>;
	
</script>
<?php $items = $api_result["ResultSet"][0]["Result"] ?>


<div id="name">
	<h2>商品ランキング</h2>
</div>
<div id="search-result" class="row">
	<?php foreach ((array)$items as $each): ?>
		<?php if(array_key_exists("Name",(array)$each)) {?>
			<div class="content col-xs-12 col-sm-6 col-md-4 col-lg-3">
				<div class="row">
					<div class="content-rank col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<p><?php print_r($each['_attributes']['rank']) ?> 位</p>
					</div>
					<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
						<div class="content-image centr col-xs-2 col-sm-2 col-md-12 col-lg-12">
							<div>
								<?php echo $this->Html->link(
								 	$this->Html->image($each['Image']['Medium'], array('alt' => $each['Image']['Id'])),
								 	$each['Url'],
								 	array('target' => '_blank', 'escape' => false)
								); ?>
							</div>
						</div>
					</div>
					<div class="content-name col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<?php echo $this->Html->link(
							$each["Name"],
							$each['Url'],
							array('target' => '_blank', 'escape' => false)
						); ?>
					</div>
				</div>
			</div>	
		<?php } ?>
	<?php endforeach; ?>
</div>
