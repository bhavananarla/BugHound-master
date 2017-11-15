$(document).ready(function(){
    $.getJSON("fetchpgms.php", success=function(data)
    {
        var options= "";
        for(var i=0;i<data.lenth;i++)
        {
            options += "<option value='" + data[i]+ "'>" + data[i] + "</option>";
        }
        $("#pgm").append(options);
    });
    
    $("#pgm").change(function()
    {
        $.getJSON("fetchver.php?ver=" + $(this).val(), success=function(data)
    {
        var options= "";
        for(var i=0;i<data.lenth;i++)
        {
            options +=" <option value='" + data[i]+ "'>" + data[i] + "</option>";
        }
        $("#ver").append(options);
    });   
    });
    
}); 