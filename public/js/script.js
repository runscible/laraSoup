$(document).ready(function () {
    $("#send").on('click', function(){
        //empty divs 
        $("#h_").empty(); 
        $("#h_i").empty();
        $("#v_").empty();
        $("#d_u_r").empty();
        $("#d_u_l").empty();
        $("#d_d_r").empty();
        $("#d_d_l").empty();
        $("#found_").empty();


        var len_char = $("#len_char").val();
        var len_row = $("#len_row").val();  
        
            console.log(len_char);
            console.log(len_row);
            
            if(isNaN(len_char) || isNaN(len_row) ) {
                console.log('parameters no valids'); 

            }else if(len_char > 100 || len_char < 1 
                    || len_row > 100 || len_row < 1){
                console.log('los valores deben estar entre 1 y 100');         
            }
            else{
                console.log('all rigth'); 
                 $.ajax({
                    url: '/getResults', 
                    data: 'len_char='+len_char+'&len_row='+len_row, 
                    success: function(data){
                        parsed_data = JSON.parse(data); 
                       
                        var result_soup = parsed_data.result; 
                        console.log(parsed_data.coincidencias);
                        for(var i = 0 ; i < result_soup.length ; i++){
                            $("#found_").append(result_soup[i]); 
                            $("#found_").append('<br/>');
                        } 
                        $("#h_").html(parsed_data.coincidencias.coincidencias_horizontales);
                        $("#h_i").html(parsed_data.coincidencias.coincidencias_horizontales_invertidas);
                        $("#v_").html(parsed_data.coincidencias.coincidencias_verticales);
                        $("#v_i").html(parsed_data.coincidencias.coincidencias_verticales_invertidas);
                        $("#d_u_r").html(parsed_data.coincidencias.coincidencias_diagonal_superior_derecha);
                        $("#d_u_l").html(parsed_data.coincidencias.coincidencias_diagonal_superior_izquierda);
                        $("#d_d_r").html(parsed_data.coincidencias.coincidencias_diagonal_inferior_derecha);
                        $("#d_d_l").html(parsed_data.coincidencias.coincidencias_diagonal_inferior_izquierda); 
                        
                         
                    }, 
                    //todo : hacer que se muestre la data en html tal como lo hace en 
                    // en console log
                    error: function(data){
                        console.log(data); 
                    }
                }); 
            }
    });     
});