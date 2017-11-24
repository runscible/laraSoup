$(document).ready(function () {
   
    $("#input_soup").keyup(function () {
        var a_ = $(this).val();
        //para agregar un formato similar al de la sopa de letras 
        //(cada tres caracteres)
        console.log(a_.length); 
        if(a_.length % 3 == 0){
            a_+='\n';  
        }

        
        $("#marc_").html(a_);
    });
    $("#send").on('click', function(){
        var soup_data = $("#input_soup").val(); 
        var send_soup_data = 'soupArray='+soup_data; 
        
        $.get('/getResults', {soupArray: soup_data}, function(data){
            console.log(data); 
        }); 
        
    });     
});