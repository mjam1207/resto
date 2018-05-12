@extends('layouts.main')
@section('title','| Admin')
@section('content')

   
<div class="container">
   <div class="row">
      <div class="col-md-12">
          <h4 class="page-head-line"><br><br>Dashboard<br></h4>
      </div>
   </div>
           
   <div class="row">
      <div class="col-md-4 col-sm-4 col-xs-6">
         <div class="dashboard-div-wrapper bk-clr-one">
            <a href="{{ route('menus.index')}}"  class="fa fa-list dashboard-div-icon" ></a>
               <div class="progress progress-striped active">
                 <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                 </div>
               </div>
                  <h5> Menu List </h5> </a>
         </div>
      </div>

      <div class="col-md-4 col-sm-4 col-xs-6">
         <div class="dashboard-div-wrapper bk-clr-two">
            <a href="{{ route('menus.create')}}" class="fa fa-edit dashboard-div-icon"></a>
               <div class="progress progress-striped active">
                   <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                   </div> 
                </div>
                   <h5>Create New Menu</h5>
          </div>
      </div>

      <div class="col-md-4 col-sm-4 col-xs-6">
         <div class="dashboard-div-wrapper bk-clr-three">
            <a href="{{ route('categories.index')}}"  class="fa fa-cogs dashboard-div-icon" ></a>
               <div class="progress progress-striped active">
                  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                  </div>                           
               </div>
                   <h5>Categories</h5>
         </div>
      </div>
         

  </div>
</div>


@endsection