
 zz = function() {$.post('http://localhost/render/web/app_dev.php/recup',{},function(data){
	
	
	$('#nbrmsg').html(data.nb);

	
})}
setInterval(zz,2000);
