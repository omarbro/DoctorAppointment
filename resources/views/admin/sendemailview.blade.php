<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">
    @include('admin.css')
    <style type="text/css">
    	label{

    		display: inline-block;
    		width: 200px;
    	}
    </style>
  </head>
  <body>
    <div class="container-scroller">
      
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
      
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         <div class="container-fluid page-body-wrapper">
          	<div class="container " align="center" style="padding-top: 80px" >



          		@if(session()->has('message'))

          			<div class="alert alert-success alert-dismissible">
  						<a href="{{url('/statusApp')}}" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  						<strong>Success!</strong> {{session()->get('message')}}
					</div>
          			
          			

          		

          		@endif
          		<form action="{{url('sendemail',$data->id)}}" method="POST">
          			@csrf
          			<div style="padding-top: 20px" >
          				<label>Greeting :</label>
          				<input style="color:black" type="text" name="greeting">
          			</div>
          			<div style="padding-top: 20px" >
          				<label>Body :</label>
          				<input style="color:black" type="text" name="body">
          			</div>
          			<div style="padding-top: 20px" >
                  <label>Action Text :</label>
                  <input style="color:black" type="text" name="actiontext" >
                </div>
          			<div style="padding-top: 20px" >
          				<label>Action Url :</label>
          				<input style="color:black" type="text" name="actionurl">
          			</div>
                <div style="padding-top: 20px" >
                  <label>End Part :</label>
                  <input style="color:black" type="text" name="endpart">
                </div>
          			<div style="padding-top: 20px " >
          				<input type="submit" class="btn btn-primary" value="Send" required="">
          			</div>
          		</form>
          	</div>
         </div>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
