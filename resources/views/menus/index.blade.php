@extends('layouts.main')
@section('title', '| Menu List')
@section('content')

  <div class="row">
      <div class="col-md-8 col-md-offset-2">
         <h4 class="page-head-line"><br>Menu List</h4>
      </div>

      <div class="col-md-4 col-md-offset-2">
        <a href="{{ route('menus.create')}}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create New Menu</a>
      </div>  
  <!--end of the row-->

  <hr>
   <!--table-->
  <div class="col-md-10 col-md-offset-1">
    <div class="table-responsive">
              <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>Menu</th>
                    <th>Price</th>
               
                    <th>Image</th>
                    <th>Desciption</th>
                    <th>Created Date</th>
                    <th>View/Edit</th>
                  </tr>
                </thead>
            
          <tbody>
            @foreach ($_tblmenu as $tblmenu)
              <tr>
                <th>{{ $tblmenu->menuId }}</th>
                <td>{{ $tblmenu->categoryName}}</td>
                <td>{{ substr($tblmenu->menuName, 0, 10)}} {{strlen ($tblmenu->menuName) > 10 ? "..." : ""}}</td>
                <td>{{ $tblmenu->menuPrice}}</td>
                <td><img src="{{ asset('images/'.$tblmenu->menuImg)}} " alt= "This is a photo" /></td>
                <td>{{ substr($tblmenu->menuDesc, 0, 30) }}{{strlen ($tblmenu->menuDesc) > 30 ? "..." : ""}}</td>
                <td>{{ date('M j, Y', strtotime($tblmenu->created_at))}}</td>
                <td><a href="{{ route('menus.show',$tblmenu->menuId)}}" class="btn btn-default btn-sm"><i class="fa fa-folder-open"></i>View</a>
                <a href="{{ route('menus.edit',$tblmenu->menuId)}}" class="btn btn-default btn-sm"><i class="fa fa-fw fa-edit"></i>Edit</a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
    </div>  
  
            <div class="text-center">
              {!! $_tblmenu->links(); !!}
            </div>
  </div>
</div>

@endsection