var Product = {
    init : function(){
        $(".component--product-item").click(function(){
            console.log("CLICK");

        })
    }
}


$(function () {
    Product.init();
})