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
                                    <a class="nav-link " aria-current="true" href="{{Route('assign_task_users_page', $project_id)}}">Assign Users</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="true" href="#">Project Users</a>
                                </li>
                                
                            </ul>
                            </div>
                            <div class="card-body">
                                <div class="row">
                            <div class="col-6">
                                    <div class="card-header">
                                    <h4 class="d-inline">Project Users</h4>
                                        <div class="card-header-action">
                                        </div>
                                    </div>
                                    <form action="#" method="post">
                                        @csrf
                                    <div class="card-body">
                                       
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tr>
                                            <th>№</th>
                                            <th>Username</th>
                                            <th>Role</th>
                                            </tr>
                                            @foreach($project_users as $user)
                                            <tr>
                                            <td>{{$i++}}</td>
                                           <td>{{$user->name}}</td>
                                           <td>{{$user->role}}</td>
                                            </tr>
                                            @endforeach
                                        </table>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                <div class="col-6">
                                    <div class="card-header">
                                    <h4 class="d-inline">Task Users</h4>
                                        <div class="card-header-action">
                                        </div>
                                    </div>
                                    <form action="{{Route('search_task_users')}}" method="post">
                                        @csrf
                                    <div class="card-body">
                                        <input type="hidden" name="project_id" value="{{$project_id}}">
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-10">
                                                    <label>Select Task</label>
                                                    <select class="form-control" name="task_id">
                                                        @foreach($tasks as $task)
                                                        <option value="{{$task->id}}">{{$task->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-2 align-self-end">
                                                    <button class="btn btn-primary" type="submit">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="list-unstyled list-unstyled-border">
                                                <li class="media">
                                                <div class="media-body">
                                                <table class="table table-striped">
                                                        <tr>
                                                        <th>Username</th>
                                                        <th>Role</th>
                                                        </tr>
                                                        @foreach($task_users as $user)
                                                        <tr>
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->role}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </table>
                                                    </div>
                                                </li>
                                        </ul>
                                    </div>
                                    </form>
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