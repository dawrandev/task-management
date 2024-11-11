<x-layouts.user>
<div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              @foreach($projects as $project)
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4 class="max-texts"><a href="{{Route('user_tasks', $project->id)}}">{{$project->name}}</a></h4>
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
</x-layouts.user>