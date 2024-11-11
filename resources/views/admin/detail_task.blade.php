<x-layouts.main>
<div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                            <a href="{{Route('tasks_page', $project_id)}}" class="btn">
                                <div class="preview">
                                    <i class="fas fa-arrow-left"></i>
                                </div>
                            </a>
                            </div>
                            <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-header">
                                        <h4>Advanced Table</h4>
                                        <div class="card-header-form">
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tr>
                                            <th>Username</th>
                                            <th>Description</th>
                                            <th>Priority</th>
                                            <th>Due Date</th>
                                            <th>Status</th>
                                            <th>Update</th>
                                            </tr>
                                            @foreach($tasks as $task)
                                            <form action="{{Route('edit_task')}}" method="post">
                                                @csrf
                                            <tr>
                                                <input type="hidden" name="task_id" value="{{$task->id}}">
                                                <input type="hidden" name="project_id" value="{{$project_id}}">
                                                <td><input type="text" name="title" value="{{$task->title}}" class="form-control" id="">
                                                @error('title')
                                                        <div style="color: red;">{{$message}}</div>
                                                    @enderror</td>
                                                <td><textarea name="description" class="form-control" id="">{{$task->description}}</textarea>
                                                @error('description')
                                                        <div style="color: red;">{{$message}}</div>
                                                    @enderror</td>
                                                <td><select class="form-control" name="priority">
                                                    <option>High</option>
                                                    <option>Medium</option>
                                                    <option>Low</option>
                                                    </select>
                                                    @error('priority')
                                                        <div style="color: red;">{{$message}}</div>
                                                    @enderror
                                                </td>
                                                <td><input type="datetime-local" value="{{$task->term}}" name="term" class="form-control">
                                                    @error('term')
                                                        <div style="color: red;">{{$message}}</div>
                                                    @enderror</td>
                                                <td><select class="form-control" name="status">
                                                        <option>Progress</option>
                                                        <option>Completed</option>
                                                        <option>Not Finished</option>
                                                    </select>
                                                    @error('status')
                                                        <div style="color: red;">{{$message}}</div>
                                                    @enderror</td>
                                                <td><input type="submit" value="Edit" class="btn btn-warning"></td>
                                            </tr>
                                            </form>
                                            @endforeach
                                        </table>
                                        </div>
                                    </div>
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