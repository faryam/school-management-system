<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="{{ URL::asset('img/favicon.png') }}">

    <title> @yield('title')</title>
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ URL::asset('css/bootstrap-theme.css')}}" rel="stylesheet">
     <link href="{{ URL::asset('css/elegant-icons-style.css')}}" rel="stylesheet">
     <link href="{{ URL::asset('css/font-awesome.min.css')}}" rel="stylesheet">  
     <link href="{{ URL::asset('assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css')}}" rel="stylesheet">
     <link href="{{ URL::asset('assets/fullcalendar/fullcalendar/fullcalendar.css')}}" rel="stylesheet">
   <link href="{{ URL::asset('assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css')}}" rel="stylesheet">
     <link href="{{ URL::asset('css/owl.carousel.css')}}" rel="stylesheet">
     <link href="{{ URL::asset('css/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet">
   <link href="{{ URL::asset('css/fullcalendar.css')}}" rel="stylesheet">
   <link href="{{ URL::asset('css/widgets.css')}}" rel="stylesheet">
   <link href="{{ URL::asset('css/style.css')}}" rel="stylesheet">
     <link href="{{ URL::asset('css/style-responsive.css')}}" rel="stylesheet">
     <link href="{{ URL::asset('css/xcharts.min.css')}}" rel="stylesheet">
   <link href="{{ URL::asset('css/jquery-ui-1.10.4.min.css')}}" rel="stylesheet">
      <link href="{{ URL::asset('css/bootstrap-timepicker.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('fonts/glyphicons-halflings-regular.woff')}}" >
    <link href="{{ URL::asset('fonts/glyphicons-halflings-regular.ttf')}}" >
     
    @yield('style')
  </head>
<body>


	<section id="container" class="">
		  @yield('container')
		
		 <section id="main-content">
      <div class="wrapper">
        
      @yield('content')


      </div>

		 </section>


	</section>




  <!-- javascripts -->
  <script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery-ui-1.10.4.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/jquery-1.8.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery-ui-1.9.2.custom.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery.scrollTo.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery.nicescroll.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/jquery-knob/js/jquery.knob.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery.sparkline.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/owl.carousel.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/fullcalendar.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/fullcalendar/fullcalendar/fullcalendar.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/calendar-custom.js') }}"></script>  
    <script type="text/javascript" src="{{ URL::asset('js/jquery.rateit.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/jquery.customSelect.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/chart-master/Chart.js') }}"></script>
	 <script type="text/javascript" src="{{ URL::asset('js/scripts.js') }}"></script>
     <script type="text/javascript" src="{{ URL::asset('js/sparkline-chart.js') }}"></script>
     <script type="text/javascript" src="{{ URL::asset('js/easy-pie-chart.js') }}"></script>
     <script type="text/javascript" src="{{ URL::asset('js/jquery-jvectormap-1.2.2.min.js') }}"></script>
   <script type="text/javascript" src="{{ URL::asset('js/jquery-jvectormap-world-mill-en.js') }}"></script>
   <script type="text/javascript" src="{{ URL::asset('js/xcharts.min.js') }}"></script>
   <script type="text/javascript" src="{{ URL::asset('js/jquery.autosize.min.js') }}"></script>
   <script type="text/javascript" src="{{ URL::asset('js/jquery.placeholder.min.js') }}"></script>
   <script type="text/javascript" src="{{ URL::asset('js/gdp-data.js') }}"></script>
   <script type="text/javascript" src="{{ URL::asset('js/morris.min.js') }}"></script>
   <script type="text/javascript" src="{{ URL::asset('js/sparklines.js') }}"></script>
   <script type="text/javascript" src="{{ URL::asset('js/charts.js') }}"></script>
   <script type="text/javascript" src="{{ URL::asset('js/jquery.slimscroll.min.js') }}"></script>
   <script type="text/javascript" src="{{ URL::asset('js/jquery.validate.min.js') }}"></script>
 <script src="{{ URL::asset('js/form-validation-script.js') }}"></script>

 <script src="{{ URL::asset('js/bootstrap-datepicker.min.js') }}"></script>
 <script src="{{ URL::asset('js/daterangepicker.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap-timepicker.min.js') }}"></script>

 <script src="{{ URL::asset('js/moment.min.js') }}"></script>
 <script src="{{ URL::asset('js/jquery.flot.js') }}"></script>
 <script src="{{ URL::asset('js/jquery.flot.pie.js') }}"></script>
 <script src="{{ URL::asset('js/jquery.flot.resize.js') }}"></script>
  @yield('script')

  <script>
    $(document).ready(function($) {
        $('#profile').click(function(event) {
          $('#form-profilepost').submit();
        }); 
    });

   $(document).ready(function() {

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
     
   }); 
      //knob

      $(document).ready(function() {
      
      $(function() {
        $(".knob").knob({
          'draw' : function () { 
            $(this.i).val(this.cv + '%')
          }
        })
      });  
      });
      

      //carousel
      $(document).ready(function() {
          $("#owl-slider").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box
  $(document).ready(function() {
    $(function(){
          $('select.styled').customSelect();
      });
  });
      
	  
	  
    $(document).ready(function() {
      $(function(){
    $('#map').vectorMap({
      map: 'world_mill_en',
      series: {
        regions: [{
          values: gdpData,
          scale: ['#000', '#000'],
          normalizeFunction: 'polynomial'
        }]
      },
    backgroundColor: '#eef3f7',
      onLabelShow: function(e, el, code){
        el.html(el.html()+' (GDP - '+gdpData[code]+')');
      }
    });
  });
    });
	

  </script>

</body>
</html>