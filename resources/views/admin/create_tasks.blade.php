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
                                    <a class="nav-link" aria-current="true" href="{{Route('tasks_page', $project_id)}}">Tasks</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link active" aria-current="true" href="{{Route('create_tasks_page', $project_id)}}">Create Task</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="true" href="{{Route('assign_task_users_page', $project_id)}}">Assign Users</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="true" href="{{Route('project_users_page', $project_id)}}">Project Users</a>
                                </li>
                                
                            </ul>
                            </div>
                            <div class="card-body">
                                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                                <form action="{{Route('create_task')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="project_id" value="{{$project_id}}">
                                    <div class="card-header">
                                    <h4>Create Task</h4>
                                    <div class="card-header-action">
                            <h6>{{$project_name}}</h6>
                                    </div>
                                    </div>
                                    <div class="card-body">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control" >
                                            @error('title')
                                            <li style="color: red;">{{$message}}</li>
                                            @enderror
                                    </div>
                                    <div class="form-group mb-0">
                                        <label>Description</label>
                                        <textarea class="form-control" name="description"></textarea>
                                        @error('description')
                                            <li style="color: red;">{{$message}}</li>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                    <label>Priority</label>
                                        <select class="form-control" name="priority">
                                            <option>High</option>
                                            <option>Medium</option>
                                            <option>Low</option>
                                        </select>
                                        @error('priority')
                                            <li style="color: red;">{{$message}}</li>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Term</label>
                                        <input type="datetime-local" name="term" class="form-control">
                                        @error('title')
                                            <li style="color: red;">{{$message}}</li>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status">
                                            <option>Progress</option>
                                            <option>Completed</option>
                                            <option>Not Finished</option>
                                        </select>
                                        @error('status')
                                        <li style="color: red;">{{$message}}</li>
                                        @enderror
                                        </div>
                                    <div class="card-footer text-right">
                                    <button class="btn btn-primary">Submit</button>
                                    <button class="btn btn-secondary" type="reset">Reset</button>
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
