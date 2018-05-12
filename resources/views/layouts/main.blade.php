<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  
 @include('layouts.admin._head')

    <body>

 @include('layouts.admin._nav') <!--navbar-->


     @include('layouts.admin._message')

     @yield('content')
     
 @include('layouts.admin._footer')
     
 	 @include('layouts.admin._javascript')
	
  
</body>
</html>