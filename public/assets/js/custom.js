/**
 * Created by ben on 3/29/2017.
 */

$(document).ready(function () {
    /*$('input[type="submit"]').click(function (e) {
        $(this).attr("disabled","disabled");
    });*/
    $('[data-toggle="offcanvas"]').click(function () {
        $('.row-offcanvas').toggleClass('active')
    });
    $('.app-info').delay(10000).fadeOut("slow");

    $('.avatar-input').change(function(){
        var $this = $(this);
        var val = $this.val();
        var file = this.files[0];
        var reader = new FileReader();
        var imageUrl = null;

        reader.onload = function(event){
            imageUrl = event.target.result;
            $('.avatar').attr("src",imageUrl);
        };
        reader.readAsDataURL(file);
    });

});