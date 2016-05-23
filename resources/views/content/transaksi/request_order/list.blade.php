@extends("layouts.main")
@section("css")
    <link rel="stylesheet" href="{{ asset(env('ASSET_DIR').'vendor/footable/footable.core.css') }}">

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
              <table class="table table-bordered table-hover toggle-circle" id="exampleFootableFiltering">
                <thead>
                  <tr>
                    <th data-toggle="true">No. Request Order</th>
                    <th>Date</th>
                    <th>Invoice</th>
                    <th>Action</th>
                    <th data-hide="phone, tablet">Req. By</th>

                    <th data-hide="phone, tablet">Status Request</th>
                    <th data-hide="phone, tablet">Created At</th>
                    <th data-hide="phone, tablet">Updated At</th>
                    <th data-hide="phone, tablet"></th>
                  </tr>
                </thead>
                <div class="form-inline padding-bottom-15">
                  <div class="row">
                    <div class="col-sm-6">
                     <label class="form-inline">Show
                <select id="exampleShow" class="form-control input-sm">
                  <option value="5">5</option>
                  <option value="10" selected="selected">10</option>
                  <option value="15">15</option>
                  <option value="20">20</option>
                </select>
                entries
              </label>
                    </div>
                    <div class="col-sm-6 text-right">
                      <div class="form-group">
                        <input id="addRemoveSearch" type="text" placeholder="Search" class="form-control"
                        autocomplete="off">
                      </div>
                    </div>
                  </div>
                </div>
                <tbody>
                @foreach($ro as $item)
                  <tr>
                    <td>{{ $item->no_ro }}</td>
                    <td>{{ date("d F Y",strtotime($item->date_ro)) }}</td>
                    <th><a href="{{ url('request-order/show/'.$item->id) }}" target="_blank">Print</a></th>
                    <td>
                      <div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggle" id="exampleAnimationDropdown1" data-toggle="dropdown" aria-expanded="false">Action
                            <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu animate" aria-labelledby="exampleAnimationDropdown1" role="menu">
                              @if(Auth::user()->role == "staff" && Auth::user()->dep_id == 8 && $item->status_ro == 0)
                              <li role="presentation"><a href="{{ url('request-order/edit/'.$item->id) }}" role="menuitem"><i class="icon wb-edit" aria-hidden="true"></i>Edit</a></li>
                              @elseif(Auth::user()->role =="administrator")
                                  <li role="presentation"><a href="{{ url('request-order/edit/'.$item->id) }}" role="menuitem"><i class="icon wb-edit" aria-hidden="true"></i>Edit</a></li>
                                
                              @else
                                  <li role="presentation">-</li>
                              @endif


                           
                          </ul>
                        </div>
                    </td>
                    <td>{{ $item->user->name }}</td>
                   
                    <td>
                      @if($item->status_ro == '0')
                        <span class="label label-warning">On Process</span>
                      @elseif($item->status_ro == '1')
                        <span class="label label-success">Approved</span>
                      @elseif($item->status_ro == '2')
                        <span class="label label-danger">Rejected</span>
                      @else
                        Not Set
                      @endif
                    </td> 
                    <td>
                      {{ date("d F Y H:i:s",strtotime($item->created_at)) }}
                    </td>
                    <td>
                      {{ date("d F Y H:i:s",strtotime($item->updated_at)) }}
                    </td>       
                    <td>
                      <div class="example">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Product</th>
                              <th>Qty Req.</th>
                              <th>Qty Approved</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($item->detail_ro  as $key => $detail)
                            <tr>
                              <td>{{ $key+=1 }}</td>
                              <td>{{ $detail->product->p_name }}</td>
                              <td>{{ $detail->qty_req }}</td>
                              <td>{{ $detail->qty_approve }}</td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </td>
                  </tr>
                  
                @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="5">
                      <div class="text-right">
                        <ul class="pagination"></ul>
                      </div>
                    </td>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
    <!-- End Panel Table Tools -->
@endsection
@section("js")
    <script src="{{ asset(env('ASSET_DIR').'vendor/footable/footable.all.min.js') }}"></script>
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

          // Pagination
      // ----------
      (function() {
        $('#exampleFootableFiltering').footable();
        $('#exampleShow').change(function(e) {
          e.preventDefault();
          var pagesize = $(this).find('option:selected').val();
          $('#exampleFootableFiltering').data('page-size', pagesize);
          $('#exampleFootableFiltering').trigger('footable_initialized');
        });
      })();

      // Filtering
      // ---------
      (function() {
        var filtering = $('#exampleFootableFiltering');
        
        $('#addRemoveSearch').on('input', function(e) {
          e.preventDefault();

          filtering.trigger('footable_filter', {
            filter: $(this).val()
          });
        });
      })();
        })(document, window, jQuery);
    </script>
@endsection