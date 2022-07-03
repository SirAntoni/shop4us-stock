$(function(){
    dashboard_cards();
})

var dashboard_cards = function() {

    $.ajax({
        url: "controller/dashboardController.php",
        beforeSend: function() {
            Notiflix.Loading.Pulse("Cargando datos...");
        },
        success: function(response) {
            Notiflix.Loading.Remove();
            var response = JSON.parse(response);
            $("#dashboard_articles").html(response.articles);
            $("#dashboard_clients").html(response.clients);
            $("#dashboard_providers").html(response.providers);
        }
    })

}