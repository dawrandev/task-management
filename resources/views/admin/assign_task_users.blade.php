<x-layouts.main>
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                            <a href="{{Route('projects')}}" class="btn">
                                <div class="preview">
                                    <i class="fas fa-arrow-left"></i>
                                </div>
                            </a>
                                <ul class="nav nav-tabs card-header-tabs">
                                <li class="nav-item">
                                    <a class="nav-link " aria-current="true" href="{{Route('tasks_page', $project_id)}}">Tasks</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="true" href="{{Route('create_tasks_page', $project_id)}}">Create Task</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="true" href="{{Route('assign_task_users_page', $project_id)}}">Assign Users</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="true" href="{{Route('project_users_page', $project_id)}}">Project Users</a>
                                </li>
                                
                            </ul>
                            </div>
                            <div class="card-body">
                                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                                    <div class="card-header">
                                        <a href="#" class="btn">
                                            <div class="preview">
                                                <i class="fas fa-arrow-left"></i>
                                            </div>
                                        </a>
                                    <h4 class="d-inline">Assign Users to the project</h4>
                                        <div class="card-header-action">
                                        </div>
                                    </div>
                                    <form action="{{Route('assign_task_users')}}" method="post">
                                        @csrf
                                    <div class="card-body">
                                        <input type="hidden" name="project_id" value="{{$project_id}}">
                                        <div class="form-group">
                                            <label>Select Task</label>
                                            <select class="form-control" name="task_id">
                                                @foreach($tasks as $task)
                                                <option value="{{$task->id}}">{{$task->title}}</option>
                                                @endforeach
                                            </select>
                                            <!-- @error('priority')
                                            <li style="color: red;">{{$message}}</li>
                                            @enderror -->
                                        </div>
                                        @foreach($project_users as $user)
                                        <ul class="list-unstyled list-unstyled-border">
                                                <li class="media">
                                                    <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="user_id[]" value="{{$user->user_id}}" class="custom-control-input" id="{{$user->user_id}}">
                                                    <label class="custom-control-label" for="{{$user->user_id}}"></label>
                                                </div>
                                                <div class="media-body">
                                                    <div class="badge badge-pill badge mb-1 float-right">{{$user->role}}</div>
                                                    <h6 class="media-title">{{$user->username}}</h6>
                                                    @error('user_id')
                                                    <div style="color: red;">{{$message}}</div>
                                                    @enderror
                                                    </div>
                                                </li>
                                        </ul>
                                        @endforeach
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