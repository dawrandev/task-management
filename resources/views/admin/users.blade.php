<x-layouts.main>
<div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                                    <div class="card-header">
                                        <h4 class="d-inline">Select Admin</h4>
                                        <div class="card-header-action">
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{Route('select_admin')}}" method="post">
                                            @csrf
                                        <ul class="list-unstyled list-unstyled-border">
                                            @foreach($contributors as $contributor)
                                                <li class="media">
                                                    <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="user_id[]" value="{{$contributor->id}}" class="custom-control-input" id="{{$contributor->id}}">
                                                    <label class="custom-control-label" for="{{$contributor->id}}"></label>
                                                    </div>
                                                    <div class="media-body">
                                                    <div class="badge badge-pill badge mb-1 float-right">{{$contributor->role}}</div>
                                                    <h6 class="media-title">{{$contributor->name}}</h6>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div class="card-footer text-right">
                                            <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                        </div>
                                    </form>
                                    <h4 class="d-inline">Users</h4>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tr>
                                                <th>№</th>
                                                <th>Username</th>
                                                <th>Role</th>
                                            </tr>
                                            @foreach($users as $user)
                                            <tr>
                                            <td>{{$i++}}</td>
                                           <td>{{$user->name}}</td>
                                           <td>{{$user->role}}</td>
                                            </tr>
                                            @endforeach
                                        </table>
                                        </div>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-layouts.main>