<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
    <div align="center"style="margin: 5rem;margin-right: 5rem;position: relative;color:white">
    <table class="table .table-md table-hover table-dark table-bordered"  >
     <thead>
       <tr>
          <th scope="col">Email</th>
          <th scope="col">Date</th>
          <th scope="col">Doctor</th>
          <th scope="col">Message</th>
          <th scope="col">Status</th>
          <th scope="col">Cancel</th>
          <th scope="col">Approve</th>
          <th scope="col">Email</th>
          <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
    @foreach($data as $stData)
    <tr>
      <td>{{$stData->email}}</td>
      <td>{{$stData->date}}</td>
      <td>{{$stData->docName}}</td>
      <td>{{$stData->message}}</td>
      <td>{{$stData->status}}</td>
      <td><a class="btn btn-warning" onclick="return confirm('Are you sure about --Cancelling-- the appointment?')" href="{{url('cancelled',$stData->id)}}"  >Cancel</a></td>
      <td><a class="btn btn-success" onclick="return confirm('Are you sure about --Approving-- the appointment?')" href="{{url('approved',$stData->id)}}"  >Approve</a></td>

      <td><a class="btn btn-primary" onclick="return confirm('Are you sure about --Approving-- the appointment?')" href="{{url('sendemailview',$stData->id)}}"  >Email</a></td>

      <td><a class="btn btn-danger" onclick="return confirm('Are you sure about --Deleting-- the appointment?')" href="{{url('deleteAppointment',$stData->id)}}"  >X</a></td>
    </tr>
    @endforeach
    </tbody>
    </table>
  </div>
        
    </div>
        <!-- main-panel ends -->
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>