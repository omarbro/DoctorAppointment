<!DOCTYPE html>
<html lang="en">
  <head>
    
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
  						<a href="{{url('/showDoc')}}" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  						<strong></strong> {{session()->get('message')}}
					</div>
          			
          			

          		

          		@endif
          		<form action="{{url('editDoc',$upData->id)}}" method="POST" enctype="multipart/form-data">
          			@csrf
          			<div style="padding-top: 20px" >
          				<label>Doctor Name :</label>
          				<input style="color:black" type="text" name="name"
                  value="{{$upData->name}}">
          			</div>
          			<div style="padding-top: 20px" >
          				<label>Phone :</label>
          				<input style="color:black" type="number" name="number" value="{{$upData->phone}}">
          			</div>
          			<div style="padding-top: 20px" >
          				<label>Speciality :</label>
          				<select  name="speciality" style="width: 225px;color: black" value="{{$upData->speciality}}">
          					<option>----Select-----</option>
          					<option value="skin">skin</option>
          					<option value="heart">heart</option>
          					<option value="brain">brain</option>
          					<option value="liver">liver</option>
          				</select>
          			</div>
          			<div style="padding-top: 20px" >
          				<label>Room No :</label>
          				<input style="color:black" type="text" name="room" value="{{$upData->room}}">
          			</div>
          			<div style="padding-top: 20px" >
          				<label>Doctor Image :</label>
                  <img src="doctorImage/{{$upData->image}}" style="height: 100px;width: 100px">
          				<input type="file" name="file"  >
          			</div>
          			<div style="padding-top: 20px " >
          				<input type="submit" class="btn btn-primary" value="Update" required="">
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
