$(document).ready(function(){
	
	$('#erstellen').click(function(e){
        var i=0;
        content1=inputs[0].value+"\n"+markers[0].position.lat()+"\n"+markers[0].position.lng();
        for(i=1;i<count;i++){
            content1=content1+"\n"+inputs[i].value+"\n"+markers[i].position.lat()+"\n"+markers[i].position.lng();
        }

		$.generateFile({
			filename	: filename1,
			content 	:  count+ "\n"+content1 ,
			script		: '/createFile.php'
		});
		
		e.preventDefault();
	});
	
	$('#downloadPage').click(function(e){

		$.generateFile({
			filename	: 'page.html',
			content		: $('html').html(),
			script		: 'download.php'
		});
		
		e.preventDefault();
	});
	
});




