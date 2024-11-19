<x-layouts.main>
<div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
            <div class="col-4"></div>
            <div class="col-4"></div>
            <div class="col-4">
            <div class="card-header-form">
            <form action="{{Route('project_search')}}" method="get">
                @csrf
                <div class="input-group">
                <input type="text" name="name" class="form-control" placeholder="Search">
                <div class="input-group-btn">
                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                </div>
                </div>
            </form><br>
            </div>
            </div>
            </div>
            <div class="row">
              @foreach($projects as $project)
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4 class="max-texts"><a href="{{Route('assign_project_users_page', $project->id)}}">{{$project->name}}</a></h4>
                    <div class="card-header-action">
                      @if($project->status == 'Not Finished')
                    <div class="badge badge-pill badge-danger mb-1 float-right">Not Finished</div>
                    @elseif($project->status == 'Progress')
                    <div class="badge badge-pill badge-warning mb-1 float-right">Progress</div>
                    @elseif($project->status == 'Completed')
                    <div class="badge badge-pill badge-primary mb-1 float-right">Completed</div>
                    @endif
                      </a>
                    </div>
                  </div>
                  <div class="card-body">
                    {{$project->description}}
                  </div>
                  <div class="card-footer">
                    {{$project->due_date}}
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </section>
    </div>
</x-layouts.main>
