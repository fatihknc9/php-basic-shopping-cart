function addBasket(id)
{
    $.ajax({
        type: "POST",
        url: "addBasket.php",
        data: {"id": id},
        dataType: "json",
        success: function(response){
        }
    });
}

$(document).ready(function(){
    $(".basketBtn").click(function(e){
        if ($(this).hasClass("btn btn-success text-white basketBtn"))
        {
            $(this).removeClass("btn btn-success text-white basketBtn");
            $(this).addClass("btn btn-danger text-white basketBtn");
            $(this).html("remove from Basket");
        } else {
            $(this).removeClass("btn btn-danger text-white basketBtn");
            $(this).addClass("btn btn-success text-white basketBtn");
            $(this).html("add to Basket");
        }
    });
});

function getData()
{
    $.ajax({
        type: "POST",
        url: "getData.php",
        success: function(e){
            if (!e){
                e = 0;
            }
            $(".shoppingCartNumber").html("(" + e + ")");
        }
    });
}

setInterval("getData()", 1000);
