$('input#submit').on('click',function(){
	var checkbox = new Array();
	$('input[name="checkbox[]"]:checked').each(function(){
			checkbox.push($(this).val());
	});
	//alert("Selected Flavours are:"+checkbox);
	$.post('../process1.php',{checkbox:checkbox},function (res){
			alert(res);
			//$('div#name-data').text(res);
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