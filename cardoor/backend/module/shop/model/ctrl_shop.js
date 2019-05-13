$(document).ready(function(){
    if (document.getElementById('list_cars')) {
        $.get("module/shop/controller/controller_shop.php?&op=data_shop", function(data,status) {
            var json = JSON.parse(data);
               $.each(json, function(index, list) {
                //    console.log(list);
                var ElementDiv = document.createElement('div');
                ElementDiv.id = "list_cars";
                ElementDiv.innerHTML =  "<div class='row popular-car-gird'>"
                                            +"<div class='single-popular-car'>"
                                                +"<div class='p-car-thumbnails'>"
                                                    +"<a class='car-hover'>"
                                                        +"<img src='"+list.imagen+"' alt='JSOFT'>"
                                                    +"</a>"
                                                +"</div>"
                                                +"<div class='p-car-content'>"
                                                    +"<h3>"
                                                        +"<a>" + list.marca + " " + list.modelo+"</a>"
                                                        +"<span class='price'><i class='fa fa-tag'></i>"+list.precio+"</span>"
                                                    +"</h3>"
                                                    +"<div class='p-car-feature'>"
                                                        +"<a>CV "+list.caballos+"</a>"
                                                        +"<a>"+list.matricula+"</a>"
                                                        +"<a>"+list.tipo+"</a>"
                                                        // +"<a><i class='fa fa-heart'></i>"
                                                            +"<a id="+list.id+" class='btn-details'><i class='fa fa-plus'></i></a>"
                                                            
                                                                +"<a id='"+list.id+"' class='addToCart' ><i class='fa fa-shopping-cart'></i></a>"
                                                                // +"<a class='btn btn-primary btn-outline' id='btn-cart'>"
                                                                +"<span class='glyphicon glyphicon-shopping-cart'></span>"
                                                            +"<div class='marca' id="+list.id+" style='display: none;'></div>"
                                                            +"<div class='modelo' id="+list.marca+" style='display: none;'></div>"
                                                            +"<div class='precio' id="+list.marca+" style='display: none;'></div>";
                                                    +"</div>"
                                                +"</div>"
                                            +"</div>"
                                        +"</div>"
                document.getElementById("list_cars").appendChild(ElementDiv);
          });
        });
    }

    $( "#btn-api" ).click(function() {
        var fideus = $('#fideus').val();
        function search(fideus) {
          return $.getJSON("https://api.fuelapi.com/v1/json/vehicle/M/?api_key=daefd14b-9f2b-4968-9e4d-9d4bb4af01d1&model".replace("M", fideus));
        }
        search($("#fideus").val())
          .done(function(fideus) {
            $("#api_container").empty();

            var $div = $("#api_container");
            $div.html("");  
            // $.each(fideus, function(index, list) {
              console.log(fideus['products']['0']['productFormats']['1']['assets']['0']['url']);
              var $row = $('<div class="row popular-car-gird">'
                            +'<div class="single-popular-car">'
                                +'<div class="p-car-thumbnails">'
                                    +'<a class="car-hover" href="'+fideus['products']['0']['productFormats']['1']['assets']['0']['url']+'">'
                                    +'<img class="photo" src="'+fideus['products']['0']['productFormats']['1']['assets']['0']['url']+'" alt="JSOFT">'
                                +'</a>'
                                +'</div>'
                                +'<div class="p-car-content">'
                                    +'<h3>'
                                        +'<a>' +fideus['model']['make']['name']+ " " +fideus['model']['name']+'</a>'
                                    +'</h3>'
                                    +'<div class="p-car-feature">'
                                        +'<a>'+fideus['model']['year']+'</a>'
                                        +'<a>'+fideus['drivetrain']+'</a>'
                                        +'<a>'+fideus['bodytype']+'</a>'
                                        // +"<a><i class='fa fa-heart'></i></a>"
                                        +'<a id="btn-cart"><i class="fa fa-heart"></i></a>'
                                        +'<a id="btn-cart"><i class="fa fa-shopping-cart"></i></a>'
                                    +'</div>'
                                +'</div>'
                            +'</div>'
                        +'</div>').appendTo($div);
            $row.on("click", function() {
                document.location = list.links.web;
            });
        // })
        });
    });

    if (document.getElementById('list_details_cars')){
        $.get("module/shop/controller/controller_shop.php?&op=details", function(data, status) {
            var list = JSON.parse(data);
            console.log(data);
            var ElementDiv = document.createElement('div');
            ElementDiv.id = "list_details_cars";
            ElementDiv.innerHTML =  +"<section id='car-list-area' class='section-padding'>"
                                        +"<div class='container'>"
                                            +"<div class='row'>"
                                                +"<div class='col-lg-8'>"+
                                                    +"<div class='car-details-content'>"
                                                        +"<h2>"+ list.marca + "<span class='price'>Price: <b>"+list.precio+"</b></span></h2>"
                                                        +"<div class='car-preview-crousel'>"
                                                            +"<div class='single-car-preview'>"
                                                                +"<img src='"+list.imagen+"'>"
                                                            +"</div>"
                                                            +"<div class='single-car-preview'>"
                                                                +"<img src='assets/img/car/car-1.jpg'>"
                                                            +"</div>"
                                                            +"<div class='single-car-preview'>"
                                                                +"<img src='assets/img/car/car-6.jpg'>"
                                                            +"</div>"
                                                        +"</div>"
                                                        +"<div class='car-details-info'>"
                                                            +"<h4>Additional Info</h4>"
                                                            +"<p>The Aventador LPER 720-4 50° ise a limited a new specific engine calibration,plitter.</p>"
                                                            +"<div class='technical-info'>"
                                                                +"<div class='row'>"
                                                                    +"<div class='col-lg-6'>"
                                                                        +"<div class='tech-info-table'>"
                                                                            +"<table class='table table-bordered'>"
                                                                                +"<tr>"
                                                                                    +"<th>Maker</th>"
                                                                                    +"<td>"+list.fabricante+"</td>"
                                                                                +"</tr>"
                                                                                +"<tr>"
                                                                                    +"<th>Fuel</th>"
                                                                                    +"<td>"+list.combus+"</td>"
                                                                                +"</tr>"
                                                                                +"<tr>"
                                                                                    +"<th>Doors</th>"
                                                                                    +"<td>"+list.puertas+"</td>"
                                                                                +"</tr>"
                                                                                +"<tr>"
                                                                                    +"<th>Date fabric</th>"
                                                                                    +"<td>"+list.date_fabric+"</td>"
                                                                                +"</tr>"
                                                                            +"</table>"
                                                                        +"</div>"
                                                                    +"</div>"
                                
                                                                    +"<div class='col-lg-6'>"
                                                                        +"<div class='tech-info-list'>"
                                                                            +"<ul>"
                                                                                +"<li>"+list.extra+"</li>"
                                                                            +"</ul>"
                                                                        +"</div>"
                                                                    +"</div>"
                                                                +"</div>"
                                                            +"</div>"
                                                        +"</div>"
                                                    +"</div>"
                                                +"</div>"
                                            +"</div>"
                                        +"</div>"
                                    +"</section>"

            document.getElementById("list_details_cars").appendChild(ElementDiv);
        });
    }

    $(document).on('click','.btn-details',function () {
        var id = this.getAttribute('id');
        window.location.href = 'index.php?page=controller_shop&op=details2&id=' + id;
    });
});
  