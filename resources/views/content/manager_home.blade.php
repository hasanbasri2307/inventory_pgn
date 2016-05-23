@extends("layouts.main")
@section("content")
    <!-- Panel Basic -->
    <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title">Welcome to manager
            
          </h3>
        </div>
        <div class="panel-body container-fluid">
          <div class="row row-lg">

          </div>
        </div>
      </div>
@endsection
@section("js_script")
    <script>
        $(document).ready(function($) {
            Site.run();

        });
    </script>
@endsection