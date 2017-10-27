@push('scripts')
<script>
    $(function () {
        $('[name=disability]').change(function () {
            if($(this).val() == "Yes"){ $('.disability-nature').removeClass('hidden').show(); }
            else{ $('.disability-nature').addClass('hidden'); }
        });


        $('.more-edu-btn').click(function () {
            var moreInputs = true;
            var lastInput = $('.edu').last();
            var nextInput = lastInput.clone();

            lastInput.find('.edu-input')
                .each(function (index, input) {
                    if(!$(this).val()){
                        moreInputs = false;
                        return;
                    }
                });

            if(moreInputs){
                nextInput.find('.edu-input')
                    .each(function (index,input) {
                        var $this = $(this);
                        var beforeIndex = $this.attr("name").indexOf("[");
                        var afterIndex = $this.attr("name").indexOf("]");
                        var before = $this.attr("name").substring(0,beforeIndex+1);
                        var after = $this.attr("name").substring(afterIndex);
                        var name = before+$('.edu').length+after;
                        $(this).val('').attr("name",name);
                    });
                nextInput.addClass('mt-10').insertAfter(lastInput);
            }
        });

        $('[name="engagement_status"]').change(function () {

            if($('input:radio[name="engagement_status"]:checked').val() == "Yes")
            {
                $('[name="engagement_details"]').removeClass('hidden').show();
            }
            else { $('[name="engagement_details"]').addClass('hidden').hide(); }
        });

    });
</script>
@endpush