@extends('admin_layouts.master')

@section('title')
Users
@endsection

@section('content')
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/admin/addstudent" method="post">
        @csrf
          <div class="form-group">
            <label for="userid" class="col-form-label">firstname</label>
            <input type="text" class="form-control" id="" name="firstName" required>
          </div>
          <div class="form-group">
            <label class="col-form-label">lastName</label>
            <input type="text" class="form-control"  name="lastName" required>
          </div>
          <div class="form-group">
            <label  class="col-form-label">phone</label>
            <input type="tel" class="form-control"  name="phone" required>
          </div>
          <div class="form-group">
            <label  class="col-form-label">email</label>
            <input type="text" class="form-control"  name="email" required>
          </div>
          <div class="form-group">
            <label class="col-form-label">password</label>
            <input type="password" class="form-control"  name="password" required>
          </div>
          <div class="form-group">
            <label class="col-form-label">Confirm password</label>
            <input type="password" class="form-control"  name="password_confirmation" required>
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add User</button>
      </div>
</form>
</div>
    </div>
  </div>
</div>
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">

                <h4 class="card-title"> Users Table</h4>
                <x-alert />
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addModal" >Add</button>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-stripped" id="userstable">
                    <thead class=" text-primary">
                    <th>user_id </th>
                      <th>FirstName </th>
                      <th>lastName </th>
                      <th class="text-center">email</th>
                      <th >phone</th>
                      <th >image</th>
                      <th >role</th>
                      <th >isDeleted</th>
                      <th >email_verified_at</th>
                      <th >Edit</th>
                      <th >Delete</th>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                      <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->firstName}}</td>
                        <td>{{$user->lastName}}</td>
                        <td>{{$user->email}}</td>
                        <td >{{$user->phone}}</td>
                        <th><img src="{{ asset('upload/images/'.$user->imageUser)}}" width="100px" height="100px"></th>
                        <td >{{$user->role}}</td>
                        <td class="text-center">{{$user->isDeleted}}</td>
                        <td >{{$user->email_verified_at}}</td>
                        <td >
                            <a href="/edit/{{$user->id}}" class="btn btn-success">Edit</a>
                        </td>
                        <td >
                            <a href="/delete/{{$user->id}}" class="btn btn-danger">Delete</a>
                        </td>
                       <!-- <td >
                            <a href="upload/resumes/1605824200.pdf" class="btn btn-danger" download="1605824200.pdf">

                            </a>
                        </td>-->
                      </tr>
                     @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection

@section('scripts')
<script>
  $(document).ready( function () {
    $('#userstable').DataTable();
} );
</script>
@endsection