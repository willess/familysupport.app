/**
 * Created by Wilco on 27/10/16.
 */
$(document).ready(function(){
    $(".test").each.on("change", "input:checkbox", function(){
        $(".test").submit();
    });
});

