@extends('layouts.app')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding: 20px 0;">
        <div class="container">
            <a class="navbar-brand" href="#">CRUD APPLICATION</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Dashboard <span class="sr-only">(current)</span></a>
                    </li> 
                    <li class="nav-item active">
                        <a class="nav-link" href="#">My Profile </a>
                    </li>
                </ul>
                <div class=" my-2 my-lg-0">
                    <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <button type="submit" class="btn btn-outline-success my-2 my-sm-0" style="border:solid 3px #E6E6FA;color: #333;" type="submit">Sign Out</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <header>
        <div class="page-title">
            <div class="container">
                <h1>Dashboard</h1>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="search-box">
                <div class="row">
                    @if ($errors->any())
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    @if (Session()->has('success'))
                       <div class="col-md-12">
                         <div class="alert alert-success">
                           {{ Session()->get('success') }}
                         </div>
                       </div>
                    @endif
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" style="border-color: rgba(0,0,0,0.3);" class="form-control" name="search" placeholder="Search name">
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-header">
                <h3>Users Lists 
                    <button class="pull-right btn btn-default btn-sm" data-toggle="modal" data-target="#modal" >Add New</button>
                </h3>
            </div>
            <div class="table-wrapper">
                <table class="table table-striped" id="students-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Age</th>
                            <th>Marital Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ ucwords($user->person->first_name . ' ' . $user->person->last_name) }}</td>
                                <td>{{ $user->person->gender }}</td>
                                <td>{{ (int)date('Y') - (int)substr($user->person->birthdate,0,4) }}</td>
                                <td>{{$user->person->marital_status}}</td>
                                <td> 
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary actions btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item edit" data-id="{{ $user->id }}" href="#">Edit</a>
                                            <a class="dropdown-item delete" data-id="{{ $user->id }}" href="#">Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog">
       <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
             <form method="POST" action="{{ route('updateUser') }}">
                <div class="modal-header">
                   <h5 class="modal-title">Edit User</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                   </button>
                </div>
                <div class="modal-body">
                   @csrf
                   <div class="row">
                       <div class="col-md-6">
                           <fieldset>
                                <legend>Personal Information</legend>
                               <div class="form-group">
                                    <label>First Name</label>
                                  <input type="text" class="form-control" required="required" placeholder="First Name" name="first_name">
                               </div>
                               <div class="form-group">
                                    <label>Last Name</label>
                                  <input type="text" class="form-control" required="required" placeholder="Last Name" name="last_name">
                               </div>
                               <div class="form-group">
                                  <div class="form-check form-check-inline">
                                     <input class="form-check-input"  required="required" type="radio" name="gender" id="Male" value="Male">
                                     <label class="form-check-label" for="Male">Male</label>
                                  </div>
                               
                                   <div class="form-check form-check-inline">
                                      <input class="form-check-input" required="required" type="radio" name="gender" id="Female" value="Female">
                                      <label class="form-check-label" for="Female">Female</label>
                                   </div>
                               </div>
                               <div class="form-group">
                                    <label>Date of Birth</label>
                                  <input type="date" class="form-control" name="birthdate" required="required">
                               </div>
                               <div class="form-group">
                                    <label>Marital Status</label>
                                  <select class="form-control" name="status" required="required">
                                     <option value="">Marital Status</option>
                                     <option value="Single">Single</option>
                                   <option value="Married">Married</option>
                                  </select>
                               </div>
                           </fieldset>
                       </div>
                       <div class="col-md-6">
                           <fieldset>
                                <legend>Account Information</legend>
                               <div class="form-group">
                                    <label>Account Name</label>
                                  <input type="text" readonly="readonly" required="required" class="form-control" placeholder="Account Name" name="account_name">
                               </div>
                               <div class="form-group">
                                    <label>Email</label>
                                  <input type="email" readonly="readonly" required="required" class="form-control" placeholder="Email" name="email">
                               </div> 
                           </fieldset>
                       </div>
                   </div>
                   
                </div>
                <div class="modal-footer">
                   <button type="submit" class="btn btn-primary">Update</button>
                </div>
             </form>
          </div>
       </div>
    </div>
    <div class="modal fade" id="delete-confirmation-modal" tabindex="-1" role="dialog">
       <div class="modal-dialog" role="document">
          <div class="modal-content">
             <form method="POST" action="{{ route('deleteUser') }}">
                <div class="modal-header">
                   <h5 class="modal-title">Confirmation</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                   </button>
                </div>
                <div class="modal-body">
                    @method('delete')
                   @csrf
                  Are you sure you want to delete that user?
                   <input type="hidden" name="id">
                </div>
                <div class="modal-footer">
                   <button type="submit" class="btn btn-danger">Delete</button>
                </div>
             </form>
          </div>
       </div>
    </div>
    @include('dashboard.add-user-modal')
@endsection
