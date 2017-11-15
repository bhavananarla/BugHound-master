$(function(){
    $.getJSON("fetchpgms.php",success=function(data)
    {
        var x=$("#pgm");
        for (k = 0; k < data.length; k++)
        x.append("<option value='" + data[k]+ "'>" + data[k] + "</option>");
        x.change();
       
        
    });
    
    $("#pgm").change(function()
    {
         $.getJSON("fetchrelease.php?name="+ $(this).val(),success=function(data)
        {
        var x=$("#rel");
        x.html("");
        for (k = 0; k < data.length; k++)
        x.append("<option value='" + data[k]+ "'>" + data[k] + "</option>");
        x.change();
        });
        
    });
    
    $("#rel").change(function()
    {
         $.getJSON("fetchversion.php?release="+ $(this).val()+"&name="+$("#pgm").val(),success=function(data)
        {
        var x=$("#ver");
        x.html("");
        for (k = 0; k < data.length; k++)
        x.append("<option value='" + data[k]+ "'>" + data[k] + "</option>");
        
        });
        
    });
}); 