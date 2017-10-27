@push('scripts')
<script>
    $(function () {

        var userType = $('select[name="user_type"]').find(':selected').data('role-name');
        $('select[name="user_type"]').change(function () {
            console.log("changed ");
            userType = $(this).find(':selected').data('role-name');

            if(userType && userType === "principal"){
                $('.centers').removeClass('hidden').show();
            }
        });

    });
</script>
@endpush