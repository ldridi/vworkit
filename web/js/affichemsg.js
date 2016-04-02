
 zz = function() {$.post('http://localhost/render/web/app_dev.php/message/listemessage1',{},function(data){
	
	//$('#testmsg').html(data.count+" message "); 
	html = '';
	for(i=0;i<data.msg.length;i++)
	{
		var t = new Date( 1370001284000 );
		
		var time  = t.toUTCString();

		html+='<div class="msg">'+
                                    
                                
                                   
                                        '<li class="list-group-item">'+
                                           '<div class="row">'+
                                                '<div class="col-md-1">'+
                                                    '<div class="imagefrom"><img src="http://'+document.domain+'/render/web/'+data.msg[i].img+'" width="50" height="50" class="thumbnails"style="border:2px solid #3BAFDA;" /> </div>'+
                                                '</div>'+
                                                '<div class="col-md-10">'+
                                                    '<p><b class="messagefrom">'+data.msg[i].nom+' '+data.msg[i].prenom+'</b></br><b class="datemessage"> '+time+' </b><br><div class="textemessage">'+data.msg[i].text+'</div></p>'+
                                                '</div>'+
                                                
                                           '</div>'+
                                            

                                        '</li>'+
                                   

                            
                                '</div>';

	}
	$('#test').html(html);
	
	 
})}

setInterval(zz,2000);
