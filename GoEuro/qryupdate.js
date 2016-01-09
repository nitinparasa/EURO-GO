$(document).ready(function() {
		
$('input[type="checkbox"]').on('change',function(){
	var city = new Array();
	var categ = new Array();
	$('input[name="city[]"]:checked').each(function(){
			city.push($(this).val());
	});
	$('input[name="categ[]"]:checked').each(function(){
			categ.push($(this).val());
	});
	
	$.post('querygen.php',{city:city,categ:categ},function (res){
			//alert("Filter has been selected. Hooray!!");
			$('div#grid').html(res);
		});
	/*$.ajax({
		type: "post",
		url: "../process.php",
		data: {checkbox:checkbox},
		success: function(data){
			alert(data);
		}
		});*/
});
});