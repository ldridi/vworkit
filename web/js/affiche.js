
 zz = function() {$.post('http://localhost/render/web/app_dev.php/recup',{},function(data){
	
	
	$('#pro').html("Message reçu "+data.nb);
	
})}
setInterval(zz,2000);
