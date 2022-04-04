<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->

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
  						<a href="{{url('/add_doc_view')}}" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  						<strong>Success!</strong> {{session()->get('message')}}
					</div>
          			
          			

          		

          		@endif
          		<form action="{{url('upload_doc')}}" method="POST" enctype="multipart/form-data">
          			@csrf
          			<div style="padding-top: 20px" >
          				<label>Doctor Name :</label>
          				<input style="color:black" type="text" name="name" placeholder="Write The Doctor Name" required="">
          			</div>
          			<div style="padding-top: 20px" >
          				<label>Phone :</label>
          				<input style="color:black" type="number" name="number" placeholder="Write The Phone number" required="">
          			</div>
          			<div style="padding-top: 20px" >
          				<label>Speciality :</label>
          				<select  name="speciality" style="width: 225px;color: black" required="">
          					<option>----Select-----</option>
          					<option value="skin">skin</option>
          					<option value="heart">heart</option>
          					<option value="brain">brain</option>
          					<option value="liver">liver</option>
          				</select>
          			</div>
          			<div style="padding-top: 20px" >
          				<label>Room No :</label>
          				<input style="color:black" type="text" name="room" placeholder="Write The Room No" required="">
          			</div>
          			<div style="padding-top: 20px" >
          				<label>Doctor Image :</label>
          				<input type="file" name="file" required="" >
          			</div>
          			<div style="padding-top: 20px " >
          				<input type="submit" class="btn btn-success" value="Submit" required="">
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
