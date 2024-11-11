<x-layouts.main>
<div class="main-content">
        <section class="section">
          <div class="section-body">
          <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Simple Summernote</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{Route('send_message')}}" method="post">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Users</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="user_id">
                          <!-- projects dep jazbasam qate shigaberdi sebebin tusinbedim -->
                          @foreach($projects as $project) 
                            <option value="{{$project->id}}">{{$project->name}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Message</label>
                      <div class="col-sm-12 col-md-7">
                        <textarea class="form-control" name="message"></textarea>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary">Publish</button>
                        <button class="btn btn-secondary" type="reset">Reset</button>
                      </div>
                    </div>
                    </form>
                      </div>
                </div>
              </div>
            </div>
          </div>
        </section>
</x-layouts.main>