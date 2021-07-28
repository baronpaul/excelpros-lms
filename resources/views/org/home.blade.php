@extends('org.layouts.mainsite')

@section('content')


<div class="sec_content">
  <div class="page-title-box">
      <h4 class="page-title">Dashboard</h4>
        
      <ol class="breadcrumb">
          <li class="active">
            Dashboard 
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">

        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h4>Welcome, {{ auth()->guard('facilitator')->user()->name }}</h4><br>
                    <div class="table-responsive">
                        
                    </div>
                </div>
            </div>
        </div>

    </div>  

  </div>
</div>

@endsection

@include('admin.includes.js_includes')

</body>
</html>

