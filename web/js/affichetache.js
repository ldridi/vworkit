
 zz = function() {$.post('http://localhost/render/web/app_dev.php/profil/tachej',{},function(data){
	


	html = '';
	for(i=0;i<data.msg.length;i++)
	{
		var url_modif ="http://localhost/render/web/app_dev.php/profil/tache/"+data.msg[i].id+"/edit";
		
		var url_del ="http://localhost/render/web/app_dev.php/profil/tache/"+data.msg[i].id+"/delete";
		var a = new Date(data.msg[i].dateajout);
		var f = new Date(data.msg[i].datefin);
		var dateajout  = a.toUTCString();
		var datefin  = f.toUTCString();
		if(data.msg[i].progression == '100%'){
			var p='Tache Terminée et verifié';
			var color='success';
		}
		else if(data.msg[i].progression == 'Annuler'){
			data.msg[i].progression =  '100%';
			var p='Tache Annulée';
			var color='danger';
		}
		else if(data.msg[i].progression == 'En Attente'){
			data.msg[i].progression =  '50%';
			var p='En attente de verification';
			var color='warning';
		}
		else{
			var p= data.msg[i].progression;
			var color='primary';
		}
		html+="<div class='col-md-3' style='margin-bottom: 20px;'>"+
			"	<article style='line-height: 25px;font-size:12px;background:white;border:1px solid silver;border-radius:0px;border-top:3px solid "+data.msg[i].label+";'>"+
                    "<b class='pull-right'>"+
                        "<a class='param3'><i class='glyphicon glyphicon-comment'></i></a>"+
                        "<a href='"+url_modif+"'><i class='glyphicon glyphicon-pencil'></i></a>"+
                        "<a href='"+url_del+"'><i class='glyphicon glyphicon-remove-circle'></i></a>"+
                        "</b><br>"+
                        "<b id='reunion' style='font-size:12px;'><i class='glyphicon glyphicon-tag'></i>&nbsp;Associé à " +data.msg[i].reunion+ "</br>"+
                        "<b style='font-size:12px;'><i class='glyphicon glyphicon-time'></i>&nbsp;Debut : "+dateajout+"</b></br>"+
                        "<b style='font-size:12px;'><i class='glyphicon glyphicon-time'></i>&nbsp;Fin : "+datefin+"</b></br>"+
                        "<b style='font-size:12px;'><i class='glyphicon glyphicon-retweet'></i>&nbsp;Progression : </b>"+
                        "<div class='progress' style='font-size:12px;'>"+
                            "<div class='progress-bar progress-bar-"+color+"' role='progressbar' aria-valuenow='60' aria-valuemin='0' aria-valuemax='100' style='width:"+data.msg[i].progression+";'>"+p+"</div>"+
                        "</div>"+
                        "<p style='font-size:12px;'>"+data.msg[i].description+"</p>"+
                "</article>"+
                "</div>";

	}
	$('#tachetache').html(html);
	
  $('.param3').click(function(){
    $('#commenttache').toggle({ "right": "0%" } );
    
    
  
});

	 
})}

setInterval(zz,2000);

 
