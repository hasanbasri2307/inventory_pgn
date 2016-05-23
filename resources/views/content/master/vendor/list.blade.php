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
                        <th>Company</th>
                        <th>Phone</th>
                        <th>Fax</th>
                        <th>Address</th>
                        <th></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Company</th>
                        <th>Phone</th>
                        <th>Fax</th>
                        <th>Address</th>
                        <th></th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($vendors as $vendor)
                        <tr>
                            <td>{{ $vendor->v_name }}</td>
                            <td>{{ $vendor->phone }}</td>
                            <td>{{ $vendor->fax }}</td>
                            <td>{{ $vendor->address }}</td>
                            <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle" id="exampleAnimationDropdown1" data-toggle="dropdown" aria-expanded="false">Action
                                  <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu animate" aria-labelledby="exampleAnimationDropdown1" role="menu">
                                  <li role="presentation"><a href="{{ url('vendor/edit/'.$vendor->id.'/'.strtolower(str_replace(" ", "-", $vendor->v_name))) }}" role="menuitem"><i class="icon wb-edit" aria-hidden="true"></i>Edit</a></li>
                                  <li role="presentation"><a href="{{ url('vendor/delete/'.$vendor->id) }}" role="menuitem" data-method="delete" data-confirm="Delete this data ?" data-token="{{ csrf_token() }}"><i class="icon wb-trash" aria-hidden="true" ></i>Delete</a></li>
                                 
                                </ul>
                              </div>
                            </td>
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