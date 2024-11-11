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
                                        <a href="{{Route('projects')}}" class="btn">
                                            <div class="preview">
                                                <i class="fas fa-arrow-left"></i>
                                            </div>
                                        </a>
                                    <h4 class="d-inline">Select Admin</h4>
                                        <div class="card-header-action">
                                        </div>
                                    </div>
                                    <form action="{{Route('assign_project_users')}}" method="post">
                                        @csrf
                                    <div class="card-body">
                                        <ul class="list-unstyled list-unstyled-border">
                                            @foreach($users as $user)
                                                <li class="media">
                                                    <input type="hidden" name="project_id" value="{{$project_id}}">
                                                    <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="user_id[]" value="{{$user->id}}" class="custom-control-input" id="{{$user->id}}">
                                                    <label class="custom-control-label" for="{{$user->id}}"></label>
                                                    </div>
                                                    <div class="media-body">
                                                    <div class="badge badge-pill badge mb-1 float-right">{{$user->role}}</div>
                                                    <h6 class="media-title">{{$user->name}}</h6>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div class="card-footer text-right">
                                            <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-layouts.main>