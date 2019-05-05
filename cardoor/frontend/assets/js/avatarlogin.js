
$(document).ready(function(){
    if (document.getElementById('axantar')) {
        $.ajax({
            type : 'POST',
            url  : 'module/login/controller/controller_login.php?&op=avat',
            success: function(response){
                $link = "<img src="+response+">"
                console.log(response);
                var ElementDiv = document.createElement('div');
                ElementDiv.id = "axantar";
                ElementDiv.innerHTML =  $link;
                document.getElementById("axantar").appendChild(ElementDiv);
            }
        });
    }

    setInterval(function(){
		$.ajax({
			type : 'GET',
			url  : 'module/login/controller/controller_login.php?&op=actividad',
			success :  function(response){
                console.log(response);						
				if(response=="inactivo"){
					console.log("Se ha cerrado la cuenta por inactividad");
					setTimeout('window.location.href = "index.php?page=controller_login&op=logout";',1000);
				}
			}
		});
    }, 120000);
    
    setInterval(function(){ 
        $.ajax({
            type : 'POST',
            url  : 'module/login/controller/controller_login.php?op=reg',
        });
     }, 5000);


});