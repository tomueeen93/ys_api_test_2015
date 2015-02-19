var distance = 230;
var padding = 0;
var $flipsnap = $(".flipsnap");
var view_port_width = distance+padding;
var item_length = 3;

// Initialize
$(document).ready(function(){
	console.log("init flipsnap");
	distance = $(window).width();
	padding = 0;
	view_port_width = $(window).width();
	item_length = 3;
	initFlipsnap();
	Flipsnap('.flipsnap');
});
function initFlipsnap(){
	$(".viewport").css({width:(view_port_width+"px")});
	$(".flipsnap").css({width:((view_port_width*item_length)+"px")});
	$(".item").css({width:(distance+"px")});
	width = distance + padding;
	flipsnap = Flipsnap(".flipsnap", {
		distance: distance
	});
	flipsnap.refresh();
}

// append new item
function addItem(){
    var newNumber = $flipsnap.find(".item").size() + 1;
    var $item = $("<div>").addClass("item").text(newNumber);
    width += distance;
    $flipsnap.append($item).width(width);
    flipsnap.refresh();
    console.log("add item");
}

// remove last item
function removeItem(){
    var $items = $flipsnap.find(".item");
    if ($items.size() <= 1) return;
    width -= distance;
    $items.last().remove().width(width);
    flipsnap.refresh();
}
// resize action
$(window).resize(function() {
    console.log('resized');
    // 何らかの処理
    
});
