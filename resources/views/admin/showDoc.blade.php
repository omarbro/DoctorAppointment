<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
  </head>

  <body>
    <div class="container-scroller">
      
      @include('admin.sidebar')
      
      @include('admin.navbar')

      <div align="center"style="margin: 5rem;margin-right: 5rem;position: relative;color:white">
        <table class="table .table-md table-hover table-dark table-bordered"  >
          <thead>
            <tr>
              <th scope="col">Doctor Name</th>
              <th scope="col">Speciality</th>
              <th scope="col">Room</th>
              <th scope="col">Phone</th>
              <th scope="col">Image</th>
              <th scope="col">Update</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
              @foreach($data as $docData)
              <tr>
                <td>{{$docData->name}}</td>
                <td>{{$docData->speciality}}</td>
                <td>{{$docData->room}}</td>
                <td>{{$docData->phone}}</td>
                <td><img style="height: 100px;width: 100px" src="doctorImage/{{$docData->image}}"></td>
                <td><a class="btn btn-primary" onclick="return confirm('Are you sure to Update?')" href="{{url('updateDoc',$docData->id)}}"  >Update</a></td>
                <td><a class="btn btn-danger" onclick="return confirm('Are you sure to Delete?')" href="{{url('deleteDoc',$docData->id)}}"  >Delete</a></td>
                
              </tr>
              @endforeach
          </tbody>
        </table>
      </div>
        
    </div>

    @include('admin.script')
  </body>
</html>