@extends("layouts.main")
@section("css")
    <link rel="stylesheet" href="{{ asset(env('ASSET_DIR').'vendor/datatables-bootstrap/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset(env('ASSET_DIR').'vendor/datatables-fixedheader/dataTables.fixedHeader.css') }}">
    <link rel="stylesheet" href="{{ asset(env('ASSET_DIR').'vendor/datatables-responsive/dataTables.responsive.css') }}">

     <style>
        @media (max-width: 480px) {
          .panel-actions .dataTables_length {
            display: none;
          }
        }
        
        @media (max-width: 320px) {
          .panel-actions .dataTables_filter {
            display: none;
          }
        }
        
        @media (max-width: 767px) {
          .dataTables_length {
            float: left;
          }
        }
        
        #exampleTableAddToolbar {
          padding-left: 30px;
        }

        .btn-group a {
            text-decoration: none;
        }
      </style>
@endsection
@section("content")
    <!-- Panel Table Tools -->

    <div class="panel">

        <header class="panel-heading">
            <h3 class="panel-title">{{ $title }}</h3>
        </header>
        <div class="panel-body">
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                  {{ Session::get('success') }}
                </div>
            @endif
            <table class="table table-hover dataTable table-striped width-full" id="exampleTableTools">
                <thead>
                    <tr>
                        <th>Department</th>
                        <th>Product Name</th>
                        <th>Stock</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Department</th>
                        <th>Product Name</th>
                        <th>Stock</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($stocks as $item)
                        <tr>
                            <td>{{ $item->dep->d_name }}</td>
                            <td>{{ $item->prd->p_name }}</td>
                            <td>{{ number_format($item->stock) }}</td>
                            <td>{{ date("d F Y H:i:s",strtotime($item->created_at)) }}</td>
                            <td>{{ date("d F Y H:i:s",strtotime($item->updated_at)) }}</td>
                           
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- End Panel Table Tools -->
@endsection
@section("js")
    <script src="{{ asset(env('ASSET_DIR').'vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset(env('ASSET_DIR').'vendor/datatables-fixedheader/dataTables.fixedHeader.js') }}"></script>
    <script src="{{ asset(env('ASSET_DIR').'vendor/datatables-bootstrap/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset(env('ASSET_DIR').'vendor/datatables-responsive/dataTables.responsive.js') }}"></script>
    <script src="{{ asset(env('ASSET_DIR').'vendor/datatables-tabletools/dataTables.tableTools.js') }}"></script>
    <script src="{{ asset(env('ASSET_DIR').'js/components/datatables.js') }}"></script>
    <script src="{{ asset(env('ASSET_DIR').'js/laravel.js') }}"></script>
@endsection
@section("js_script")
    <script type="text/javascript">
     (function(document, window, $) {
          'use strict';

          var Site = window.Site;

          $(document).ready(function($) {
            Site.run();
          });

          (function() {
                $(document).ready(function() {
                  var defaults = $.components.getDefaults("dataTable");

                  var options = $.extend(true, {}, defaults, {
                    "order" : [[0,"asc"]],
                    "aoColumnDefs": [{
                      'bSortable': false,
                      'aTargets': [-1]
                    }],
                    "iDisplayLength": 10,
                    "aLengthMenu": [
                      [5, 10, 25, 50, -1],
                      [5, 10, 25, 50, "All"]
                    ],
                    "sDom": '<"dt-panelmenu clearfix"Tfr>t<"dt-panelfooter clearfix"ip>',
                    "oTableTools": {
                      "sSwfPath": "{{ asset(env('ASSET_DIR').'vendor/datatables-tabletools/swf/copy_csv_xls_pdf.swf') }}"
                    }
                  });

                  $('#exampleTableTools').dataTable(options);
                });
              })();
        })(document, window, jQuery);
    </script>
@endsection