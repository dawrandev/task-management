<x-layouts.user>
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
                                    <a class="nav-link active" aria-current="true" href="{{Route('user_tasks')}}">Tasks</a>
                                </li>
                            </ul>
                            </div>
                            <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-header">
                                        <h4>Advanced Table</h4>
                                        <div class="card-header-form">
                                        <form>
                                            <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search">
                                            <div class="input-group-btn">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tr>
                                            <th>Task Name</th>
                                            <th>Priority</th>
                                            <th>Members</th>
                                            <th>Due Date</th>
                                            <th>Status</th>
                                            <th>Comments</th>
                                            </tr>
                                            @foreach($tasks as $task)
                                            <tr>
                                            <td>{{$task->title}}</td>
                                            <td class="align-middle">
                                                @if($task->priority == 'Low')
                                                <div class="progress" data-height="5" data-toggle="tooltip" title="Low">
                                                <div class="progress-bar bg-warning" style="width: 15%"></div>
                                                </div>
                                                @elseif($task->priority == 'Medium')
                                                <div class="progress" data-height="5" data-toggle="tooltip" title="Medium">
                                                <div class="progress-bar bg-success" style="width: 50%"></div>
                                                </div>
                                                @elseif($task->priority == 'High')
                                                <div class="progress" data-height="5" data-toggle="tooltip" title="High">
                                                <div class="progress-bar" style="width: 100%"></div>
                                                </div>
                                                @endif
                                            </td>
                                            <td>
                                                @foreach($users as $user)
                                                @if($task->id ==  $user->task_id)
                                                {{$user->name}} <br>
                                                @endif
                                                @endforeach     
                                                </td>
                                            <td>{{$task->term}}</td>
                                            <td>
                                            @if($task->status == 'Not Finished')
                                                <div class="badge badge-pill badge-danger mb-1">Not Finished</div>
                                                @elseif($task->status == 'Progress')
                                                <div class="badge badge-pill badge-warning mb-1">Progress</div>
                                                @elseif($task->status == 'Completed')
                                                <div class="badge badge-pill badge-primary mb-1">Completed</div>
                                                @endif
                                            </td>
                                            <td><a href="{{Route('user_comments_page', $task->id)}}" class="btn btn-light">Comments</a></td>
                                            </tr>
                                            @endforeach
                                        </table>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary mr-1" type="submit" id="toastr-2">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-layouts.user>