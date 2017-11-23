$(document).ready(function () {
   
    $("#input_soup").keyup(function () {
        var a_ = $(this).val();
        console.log();
        $("#marc_").html(a_);
    });
    $("#send").on('click', function(){
        var soup_data = $("#input_soup").val(); 
        var send_soup_data = 'soupArray='+soup_data; 
        
        $.ajax({
            type: "POST", 
            url: 'getResults', 
            data: send_soup_data , 
            success: function(data){
                console.log(data); 
                $("#marc_").html(data); 
            } 
        });
             
    });     

   
});