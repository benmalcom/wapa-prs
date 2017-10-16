@push('scripts')
<script>
    $(function () {
        var lgas = {!! json_encode($lgas->toArray(), JSON_HEX_TAG) !!};
        var selectedLgas = [];

        $('.country').change(function () {
            var value = $(this).val();
            $('.states').prop("disabled",!(value && value==="Nigeria"));
        });

        $('.states').change(function () {
            var value = $(this).val();
            if(value){
                selectedLgas = lgas.filter(function (lga) {
                    return lga.state_id == value;
                });
            }

            var html = '';
            selectedLgas.forEach(function (lga) {
                html +='<option value='+lga.id+'>'+lga.name+'</option>';
            });
            $('.lgas').empty()
                .append("<option value=''>-- Select --</option>")
                .append(html)
                .prop("disabled",false);

        });


    });

    function watchForms() {

    }
</script>
@endpush