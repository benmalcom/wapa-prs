@push('scripts')
<script>
    $(function () {
        var lgas = {!! json_encode($lgas->toArray(), JSON_HEX_TAG) !!};
        var selectedLgas = [];

        checkCountry();
        checkState();


        $('.country').change(function () {
            var value = $(this).val();
            $('.states').prop("disabled", !(value && value === "Nigeria"));
        });

        $('.states').change(function () {
            var value = $(this).val();
            if (value) {
                selectedLgas = lgas.filter(function (lga) {
                    return lga.state_id == value;
                });
            }

            var html = '';
            selectedLgas.forEach(function (lga) {
                html += '<option value=' + lga.id + '  >' + lga.name + '</option>';
            });

            $('.lgas').empty()
                .append("<option value=''>-- Select --</option>")
                .append(html)
                .prop("disabled", false);

        });


    });

    function checkCountry() {
        var value = $('.country').val();
        if(value && value == "Nigeria"){
            $('.states').prop("disabled", false);
        }

    }

    function checkState() {

        var value = $('.states').val();
        if (value) {
            var html = '';
            lgas.filter(function (lga) {
                return lga.state_id == value;
            })
            .forEach(function (lga) {
                var selected = lga.state_id == lga.state_id ? 'selected' : '';
                html += '<option value=' + lga.id + ' '+selected+'>' + lga.name + '</option>';
            });


            $('.lgas').empty()
                .append("<option value=''>-- Select --</option>")
                .append(html)
                .prop("disabled", false);
        }

    }
</script>
@endpush