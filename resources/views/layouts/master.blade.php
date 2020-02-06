<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
   

        <title>RSL Mapping Development</title>
        <link rel="icon" href="/img/location.png">

        <!-- Fonts -->
       <!-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
       -->

       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
     
  
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>





        <link rel="stylesheet" type="text/css" href="/css/main.css">
 

        @yield('cdn')


    </head>




    <body style="margin:0;" >

       
     

         

        @include('/layouts/topnav')


            @yield('content')

        @include('/layouts/footer')
        


        
        <div class="loader">
            <div class="dot dot-1"></div>
            <div class="dot dot-2"></div>
            <div class="dot dot-3"></div>
          </div>


     





<script type="text/javascript">
    

$(window).on('load', function() {
    $(".loader").fadeOut("slow");
});

</script>





        @yield('scripts')


 


        

 <!-- made by Jojo V. Casidsid Email:jvcasidsid2013@gmail.com-->


    </body>
</html>
