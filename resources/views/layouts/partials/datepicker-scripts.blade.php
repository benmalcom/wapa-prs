@push('scripts')
<script type="text/javascript" src="{{ asset('assets/js/plugins/pickers/jquery-datepicker/datepicker.min.js') }}"></script>
<script>
    $(function () {
        $(document).on('focus', '[data-toggle="datepicker"]',function () {
            $(this).datepicker();
        });
    });

</script>
@endpush

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/js/plugins/pickers/jquery-datepicker/datepicker.min.css') }}" media="screen">
@endpush
