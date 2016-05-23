@extends("layouts.main")
@section("content")
@if(Auth::user()->role == "staff" and Auth::user()->dep_id != 7 and Auth::user()->dep_id != 8)
    <div class="row" data-plugin="masonry" style="position: relative; ">
       
        <div class="col-md-8 col-xs-12 " >
          <!-- Panel Tasks -->
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">Last Request Order</h3>
            </div>
            <div class="table-responsive">
              <table class="table table-hover table-striped">
                <thead>
                  <tr>
                    <th width="40%">RO Number #</th>
                    <th>RO Time</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($request_order as $item)
                  <tr>
                    <td>{{ $item->no_ro }}</td>
                    <td>{{ date("d F Y H:i:s",strtotime($item->created_at)) }}</td>
                    <td>@if($item->status_ro == '0')
                        <span class="label label-warning">On Process</span>
                      @elseif($item->status_ro == '1')
                        <span class="label label-success">Approved</span>
                      @elseif($item->status_ro == '2')
                        <span class="label label-danger">Rejected</span></td>
                    @endif
                  </tr>
                 @endforeach
                 <tr>
                 	 <td colspan="3"><a href="{{ url('request-order') }}">See More</a></td>
                </tbody>
              </table>
            </div>
          </div>
          <!-- End Panel Tasks -->
        </div>

        </div>
      </div>
      <div class="col-lg-12 col-md-12">
          <div class="row">
            <div class="col-md-4">
              <!-- Widget -->
              <div class="widget">
                <div class="widget-content widget-radius padding-30 bg-white clearfix">
                  <div class="pull-left white">
                    <i class="icon icon-circle icon-2x wb-clipboard bg-orange-600" aria-hidden="true"></i>
                  </div>
                  <div class="counter counter-md counter text-right pull-right">
                    <div class="counter-number-group">
                      <span class="counter-number">{{ $ro_1 }}</span>
                      <span class="counter-number-related text-capitalize">RO</span>
                    </div>
                    <div class="counter-label text-capitalize font-size-16">waiting confirmation</div>
                  </div>
                </div>
              </div>
              <!-- End Widget -->
            </div>

            <div class="col-md-4">
              <!-- Widget -->
              <div class="widget">
                <div class="widget-content widget-radius padding-30 bg-white clearfix">
                  <div class="counter counter-md pull-left text-left">
                    <div class="counter-number-group">
                      <span class="counter-number">{{ $ro_2 }}</span>
                      <span class="counter-number-related text-capitalize">RO</span>
                    </div>
                    <div class="counter-label text-capitalize font-size-16">accepted</div>
                  </div>
                  <div class="pull-right white">
                    <i class="icon icon-circle icon-2x wb-clipboard bg-green-600" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
              <!-- End Widget -->
            </div>
            <div class="col-md-4">
              <!-- Widget -->
              <div class="widget">
                <div class="widget-content widget-radius padding-30 bg-white clearfix">
                  <div class="counter counter-md pull-left text-left">
                    <div class="counter-number-group">
                      <span class="counter-number">{{ $ro_3 }}</span>
                      <span class="counter-number-related text-capitalize">RO</span>
                    </div>
                    <div class="counter-label text-capitalize font-size-16">rejected</div>
                  </div>
                  <div class="pull-right white">
                    <i class="icon icon-circle icon-2x wb-clipboard bg-red-600" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
              <!-- End Widget -->
            </div>
          </div>
        </div>
@elseif(Auth::user()->role == "staff" and Auth::user()->dep_id == 7)

<div class="col-lg-12 col-md-12">
          <div class="row">
            <div class="col-md-6">
              <!-- Widget -->
              <div class="widget">
                <div class="widget-content widget-radius padding-30 bg-white clearfix">
                  <div class="pull-left white">
                    <i class="icon icon-circle icon-2x wb-clipboard bg-red-600" aria-hidden="true"></i>
                  </div>
                  <div class="counter counter-md counter text-right pull-right">
                    <div class="counter-number-group">
                      <span class="counter-number">{{ $po_0 }}</span>
                      <span class="counter-number-related text-capitalize">PO</span>
                    </div>
                    <div class="counter-label text-capitalize font-size-16">waiting delivery order</div>
                  </div>
                </div>
              </div>
              <!-- End Widget -->
            </div>

            <div class="col-md-6">
              <!-- Widget -->
              <div class="widget">
                <div class="widget-content widget-radius padding-30 bg-white clearfix">
                  <div class="counter counter-md pull-left text-left">
                    <div class="counter-number-group">
                      <span class="counter-number">{{ $po_1 }}</span>
                      <span class="counter-number-related text-capitalize">PO</span>
                    </div>
                    <div class="counter-label text-capitalize font-size-16">done</div>
                  </div>
                  <div class="pull-right white">
                    <i class="icon icon-circle icon-2x wb-users bg-blue-600" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
              <!-- End Widget -->
            </div>

            
          </div>
        </div>
 @elseif(Auth::user()->role == "staff" and Auth::user()->dep_id == 8)
 	  <div class="col-lg-12 col-md-12">
          <div class="row">
            <div class="col-md-4">
              <!-- Widget -->
              <div class="widget">
                <div class="widget-content widget-radius padding-30 bg-white clearfix">
                  <div class="pull-left white">
                    <i class="icon icon-circle icon-2x wb-clipboard bg-orange-600" aria-hidden="true"></i>
                  </div>
                  <div class="counter counter-md counter text-right pull-right">
                    <div class="counter-number-group">
                      <span class="counter-number">{{ $ro_waiting }}</span>
                      <span class="counter-number-related text-capitalize">RO</span>
                    </div>
                    <div class="counter-label text-capitalize font-size-16">waiting approval</div>
                  </div>
                </div>
              </div>
              <!-- End Widget -->
            </div>

            <div class="col-md-4">
              <!-- Widget -->
              <div class="widget">
                <div class="widget-content widget-radius padding-30 bg-white clearfix">
                  <div class="counter counter-md pull-left text-left">
                    <div class="counter-number-group">
                      <span class="counter-number">{{ $ro_to_po }}</span>
                      <span class="counter-number-related text-capitalize">RO</span>
                    </div>
                    <div class="counter-label text-capitalize font-size-16">waiting to create PO</div>
                  </div>
                  <div class="pull-right white">
                    <i class="icon icon-circle icon-2x wb-clipboard bg-green-600" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
              <!-- End Widget -->
            </div>
            <div class="col-md-4">
              <!-- Widget -->
              <div class="widget">
                <div class="widget-content widget-radius padding-30 bg-white clearfix">
                  <div class="counter counter-md pull-left text-left">
                    <div class="counter-number-group">
                      <span class="counter-number">{{ $po_process }}</span>
                      <span class="counter-number-related text-capitalize">PO</span>
                    </div>
                    <div class="counter-label text-capitalize font-size-16">on process</div>
                  </div>
                  <div class="pull-right white">
                    <i class="icon icon-circle icon-2x wb-clipboard bg-red-600" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
              <!-- End Widget -->
            </div>
            <div class="col-md-4">
              <!-- Widget -->
              <div class="widget">
                <div class="widget-content widget-radius padding-30 bg-white clearfix">
                  <div class="counter counter-md pull-left text-left">
                    <div class="counter-number-group">
                      <span class="counter-number">{{ $po_done }}</span>
                      <span class="counter-number-related text-capitalize">PO</span>
                    </div>
                    <div class="counter-label text-capitalize font-size-16">done</div>
                  </div>
                  <div class="pull-right white">
                    <i class="icon icon-circle icon-2x wb-clipboard bg-red-600" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
              <!-- End Widget -->
            </div>
          </div>
        </div>
 @endif
@endsection
@section("js_script")
    <script>
        $(document).ready(function($) {
            Site.run();

        });
    </script>
@endsection