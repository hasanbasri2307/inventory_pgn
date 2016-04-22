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
                        <th>No. RO</th>
                        <th>RO date</th>
                        <th>Req. By</th>
                        <th>Department</th>
                        <th>Status RO</th>
                        <th>Approve / Reject By</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No. RO</th>
                        <th>RO date</th>
                        <th>Req. By</th>
                        <th>Department</th>
                        <th>Status RO</th>
                        <th>Approve / Reject By</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th></th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($ro as $item)
                        <tr>
                            <td>{{ $item->no_ro }}</td>
                            <td>{{ date("d F Y H:i:s",strtotime($item->date_ro)) }}</td>
                            <td>{{ $item->req_by->name }}</td>
                            <td>{{ $item->department->d_name }}</td>
                            <td>
                              @if($item->status_ro == '0')
                                  <span class="label label-warning">On Process</span>
                              @elseif($item->status_ro == '1')
                                  <span class="label label-sucess">Accepted</span>
                              @elseif($item->status_ro == '2')
                                  <span class="label label-danger">Rejected</span>
                              @else 
                                 Not Set
                              @endif
                            </td>
                            <td>{{ $item->approved_by->name }}</td>
                            <td>{{ date("d F Y H:i:s",strtotime($item->created_at)) }}</td>
                            <td>{{ date("d F Y H:i:s",strtotime($item->updated_at)) }}</td>
                            <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle" id="exampleAnimationDropdown1" data-toggle="dropdown" aria-expanded="false">Action
                                  <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu animate" aria-labelledby="exampleAnimationDropdown1" role="menu">
                                  <li role="presentation"><a href="{{ url('request-order/show/'.$item->id.'/'.$item->no_ro) }}" role="menuitem"><i class="icon wb-eye" aria-hidden="true"></i>Show Detail</a></li>
                                  <li role="presentation"><a href="{{ url('request-order/edit/'.$item->id.'/'.$item->no_ro) }}" role="menuitem"><i class="icon wb-edit" aria-hidden="true"></i>Edit</a></li>
                                  <li role="presentation"><a href="{{ url('request-order/delete/'.$item->id) }}" role="menuitem" data-method="delete" data-confirm="Delete this data ?" data-token="{{ csrf_token() }}"><i class="icon wb-trash" aria-hidden="true" ></i>Delete</a></li>
                                 
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