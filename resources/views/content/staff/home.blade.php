@extends("layouts.main")
@section("content")
    <!-- Panel Basic -->
    <h3>Home</h3>
@endsection
@section("js_script")
        <script>
            $(document).ready(function($) {
              Site.run();
            
            });
        </script>
@endsection