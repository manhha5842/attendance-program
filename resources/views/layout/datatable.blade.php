@push('css')
    <link href="{{ asset('css/vendor/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
@endpush
@push('js')
    <!-- Datatables js -->
    {{-- <script src="{{ asset('js/vendor/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/vendor/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/vendor/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/vendor/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('js/vendor/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/vendor/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('js/vendor/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/vendor/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/vendor/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('js/vendor/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('js/pages/demo.datatable-init.js') }}"></script> --}}
    <script>
        DataTable("datatable-buttons");
    </script>
@endpush
