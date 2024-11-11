<x-layouts.main>
    <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                <div class="card">
                  <div class="card-header">
                    <h4>Create Project</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{Route('create_project')}}" method="post">
                      @csrf
                    <div class="form-group">
                      <label>Project Name</label>
                      <input type="text" name="name" class="form-control">
                      @error('name')
                      <li style="color: red;">{{$message}}</li>
                      @enderror
                      </div>
                    <div class="form-group">
                      <label>Description</label>
                      <textarea class="form-control" name="description"></textarea>
                      @error('description')
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
                    <div class="form-group">
                      <label>Datetime Local</label>
                      <input type="datetime-local" name="datetime" class="form-control">
                      @error('datetime')
                      <li style="color: red;">{{$message}}</li>
                      @enderror
                    </div>
                    <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
                  </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
</x-layouts.main>