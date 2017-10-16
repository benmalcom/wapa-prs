@push('scripts')
<script type="text/javascript" src="{{asset('assets/js/plugins/tables/DataTables/DataTables-1.10.16/js/jquery.dataTables.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/plugins/tables/DataTables/DataTables-1.10.16/js/dataTables.bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/plugins/tables/DataTables/Responsive-2.2.0/js/dataTables.responsive.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/plugins/tables/DataTables/Responsive-2.2.0/js/responsive.bootstrap.js')}}"></script>
<script>
    $(function() {

// Table setup
        // ------------------------------

        // Setting datatable defaults
        // Basic initialization
        $('.datatable-basic').DataTable({
            "bInfo": false,
            "paging": false,
            language: {
                searchPlaceholder: "Search records"
            }
        });
        /*$('.datatable-basic').DataTable({
         autoWidth: false,
         dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
         language: {
         search: '<span>Filter:</span> _INPUT_',
         lengthMenu: '<span>Show:</span> _MENU_',
         paginate: { 'first': 'First', 'last': 'Last', 'next': '→', 'previous': '←' }
         },
         drawCallback: function () {
         $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
         },
         preDrawCallback: function() {
         $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
         }
         });*/
    });

</script>
@endpush

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/js/plugins/tables/DataTables/DataTables-1.10.16/css/dataTables.bootstrap.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/js/plugins/tables/DataTables/Responsive-2.2.0/css/responsive.bootstrap.css') }}"/>
@endpush