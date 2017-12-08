$(document).ready(function () {
    $("#send").on('click', function(){
        var len_char = $("#len_char").val();
        var len_row = $("#len_row").val();  
        //var send_soup_data = 'soupArray='+soup_data; 
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
                        console.log(data); 
                    }, 
                    error: function(data){
                        console.log(data); 
                    }
                }); 
            }
    });     
});