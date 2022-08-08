$(function(){
    get_departament();
    get_provinces();
    get_districts();
})

let get_departament = function(){
    
    $.ajax({
        url:'controller/clientController.php',
        method:'POST',
        data:'option=departaments',
        success: function(response){
            var response = JSON.parse(response);
            var html = "<option value=''>Seleccione un departamento</option>";
            for (var i = 0; i < response.length; i++) {
                html = html + "<option value='" + response[i]['idDepa'] + "'>" + response[i]['departamento'] + "</option>";
            }

            $(".departament").html(html);
        }
    })

}

let get_provinces = function(){
    
    $(".departament").on('change',function(){
        departament  = $(this).val();
        $.ajax({
            url:'controller/clientController.php',
            method:'POST',
            data:'option=provinces&departament=' + departament,
            success: function(response){
                var response = JSON.parse(response);
                var html = "<option value=''>Seleccione una provincia</option>";
                for (var i = 0; i < response.length; i++) {
                    html = html + "<option value='" + response[i]['idProv'] + "'>" + response[i]['provincia'] + "</option>";
                }
    
                $(".province").html(html);
            }
        })
    })

}

let get_districts = function(){
    
    $(".province").on('change',function(){
        province  = $(this).val();
        $.ajax({
            url:'controller/clientController.php',
            method:'POST',
            data:'option=districts&province=' + province,
            success: function(response){
                var response = JSON.parse(response);
                var html = "<option value=''>Seleccione un distrito</option>";
                for (var i = 0; i < response.length; i++) {
                    html = html + "<option value='" + response[i]['idDist'] + "'>" + response[i]['distrito'] + "</option>";
                }
    
                $(".district").html(html);
            }
        })
    })

}