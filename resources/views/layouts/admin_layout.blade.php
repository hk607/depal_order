<!DOCTYPE html>
<html lang="en" ng-app="myApp">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> @yield('title') </title>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminpanel/plugins/fontawesome-free/css/all.min.css') }} ">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('adminpanel/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }} ">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('adminpanel/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('adminpanel/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('adminpanel/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminpanel/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminpanel/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminpanel/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminpanel/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('adminpanel/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Date Picker -->

  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('adminpanel/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('adminpanel/plugins/summernote/summernote-bs4.min.css') }}">

  {{-- CSS assets in head section --}}
  <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />


  <!-- jQuery -->
  <script src="{{ asset('adminpanel/plugins/jquery/jquery.min.js') }}"></script>
<!-- ./wrapper -->
</head>
@if(isset($Layout))
  <body class="hold-transition sidebar-mini sidebar-collapse">
@else
  <body class="hold-transition sidebar-mini layout-fixed"> 
@endif   
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <!-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right"> 

        </div>
      </li> -->
      <li class="nav-item">
        <a href="{{ route('adminLogout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-block bg-gradient-danger"><i class="fa fa-power-off" aria-hidden="true"></i>
        </a>
        <form id="logout-form" action="{{ route('adminLogout') }}" method="POST" class="d-none">
            @csrf
        </form>
      </li>  
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- <a href="{{ url('dashboard') }}" class="brand-link">
      <img src="{{ asset('adminpanel/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">OTS ADMIN</span>
    </a> -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('adminpanel/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('adminDashboard') }}" class="d-block">{{{ Auth::user()->name }}}</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('adminDashboard') }}" class="nav-link @if(isset($admindashboard)) {{ $admindashboard }} @endif">
             <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('hotels.index') }}" class="nav-link @if(isset($hotels)) {{ $hotels }} @endif">
             <i class="nav-icon fas fa-hotel"></i>
              <p>
                Hotels
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('types.index') }}" class="nav-link @if(isset($types)) {{ $types }} @endif">
             <i class="nav-icon fas fa-star"></i>
              <p>
                Create Room Types
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('roomtypes.index') }}" class="nav-link @if(isset($room_details)) {{ $room_details }} @endif">
             <i class="nav-icon fas fa-edit"></i>
              <p>
                Add Room Details
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('packages.index') }}" class="nav-link @if(isset($packages)) {{ $packages }} @endif">
             <i class="nav-icon fas fa-cubes" aria-hidden="true"></i>
              <p>
                Add Packages
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('services.index') }}" class="nav-link @if(isset($services)) {{ $services }} @endif">
            <i class="nav-icon fas fa-folder" aria-hidden="true"></i>
              <p>
                Add Services
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('hotelrooms.index') }}" class="nav-link @if(isset($hotel_rooms)) {{ $hotel_rooms }} @endif">
             <i class="nav-icon fas fa-bed" aria-hidden="true"></i>
              <p>
                Add Hotel Rooms
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('bookings.index') }}" class="nav-link @if(isset($booking)) {{ $booking }} @endif">
             <i class="nav-icon fas fa-edit" aria-hidden="true"></i>
              <p>
                Bookings
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('packagebooking') }}" class="nav-link @if(isset($packagebooking)) {{ $packagebooking }} @endif">
             <i class="nav-icon fas fa-edit" aria-hidden="true"></i>
              <p>
                Package Bookings
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('closebookingdate') }}" class="nav-link @if(isset($closebookingdate)) {{ $closebookingdate }} @endif">
             <i class="nav-icon fas fa-edit" aria-hidden="true"></i>
              <p>
                Close Booking Date
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('changepassword') }}" class="nav-link @if(isset($changepassword)) {{ $changepassword }} @endif">
             <i class="nav-icon fas fa-key" aria-hidden="true"></i>
              <p>
                Change Password
              </p>
            </a>
          </li>
          <!-- <li class="nav-item has-treeview @if(isset($users)) {{ __('menu-open') }} @endif">
            <a href="#" class="nav-link @if(isset($users)) {{ $users }} @endif">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link @if(isset($submenu1)) {{ $submenu1 }} @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="#" class="nav-link @if(isset($submenu2)) {{ $submenu2 }} @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Devices</p>
                </a>
              </li>
            </ul>
          </li> -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  
  @yield('content')
  
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong></strong>
    <div class="float-right d-none d-sm-inline-block">
    </div>
  </footer>
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('adminpanel/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminpanel/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('adminpanel/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('adminpanel/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('adminpanel/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('adminpanel/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('adminpanel/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('adminpanel/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('adminpanel/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('adminpanel/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('adminpanel/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('adminpanel/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('adminpanel/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminpanel/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }} "></script>
<script src="{{ asset('adminpanel/plugins/datatables-responsive/js/dataTables.responsive.min.js') }} "></script>
<script src="{{ asset('adminpanel/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminpanel/dist/js/adminlte.js') }}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('adminpanel/dist/js/demo.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
{{-- ...Some more scripts... --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
@yield('scripts')
<script type="text/javascript">
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });

    $("#example2").DataTable({
      "responsive": true,
      "autoWidth": false,
    });

    $("#example3").DataTable({
      "responsive": true,
      "autoWidth": false,
    });

    $(".select_type").on("change", function() {
        var hotel_id = $(this).val();
        $.LoadingOverlay("show");
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            url: "{{ route('admin.getRoomDetail') }}",
            type: "POST",              
            data: {hotel_id:hotel_id},
            dataType:'json',
            success: function(data) {
                $.LoadingOverlay("hide"); 
                $('select[name="room_detail_id"]').empty().append($('<option>').text('Select Type').attr('value', ''));
                $('select[name="room_detail_id"]').val('').trigger('change');
                if(data.success) {
                    $.each(data.types, function(i, value){
                        var name = value.name;
                        $('select[name="room_detail_id"]').append($('<option>').text(name).attr('value', value.id));
                    });         
                }  
            },
            error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.Message);
            }
        }); 
    });
  });
</script> 
</body>
</html>

  
  