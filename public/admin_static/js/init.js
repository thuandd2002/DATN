import './component/run'
import './component/action'
import './component/length_content_seo'
import './component/delete'
import './component/hot'
import './component/accept'
import './component/media'
import './component/product'
import './component/guest'
import './component/active'
import './component/slug'


var Init = {
    init : function()
    {
        let __this = this; 

        // NOI THAT
        $("#add-input").click(function (event) {
            let $string = '<input class="form-control pro_name" style="margin-top: 10px" name="av_name[]" value="" type="text" placeholder="VD :  xanh, đỏ tím vàng">';

            $("#list--value").after($string);
        })

        $("#menu--product").change( function(){
            let $this = $(this);

            let  $url = $("#menu--product option:selected").attr('data-url');
            console.log($url);
            if ($url)
            {
                $.ajax({
                    url : $url,
                    type : 'get',
                    dataType: 'html',
                    format: "json",
                    async: true,
                }).done(function (responsive) {
                    let $value = (JSON.parse(responsive));
                    $("#attribute--value").html($value.data);
                });
            }
        });
        //END
    },
}


$(function(){
   Init.init();
});