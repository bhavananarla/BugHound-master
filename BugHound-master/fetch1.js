$(function(){
    $.getJSON("fetchpgms.php",success=function(data)
    {
        
        var x=$("#pgm1");
        for (k = 0; k < data.length; k++)
        x.append("<option value='" + data[k]+ "'>" + data[k] + "</option>");
        x.change();
       
        
    });
    
    $("#pgm1").change(function()
    {
         $.getJSON("fetchrelease.php?name="+ $(this).val(),success=function(data)
        {
        var x=$("#rel1");
        x.html("");
        for (k = 0; k < data.length; k++)
        x.append("<option value='" + data[k]+ "'>" + data[k] + "</option>");
        x.change();
        });
        
    });
        
});