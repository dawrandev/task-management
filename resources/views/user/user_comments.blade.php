<x-layouts.user>
<style>
    .chat-box .alert {
        display: inline-block;
        padding: 10px;
        margin-bottom: 10px;
        word-wrap: break-word; 
        max-width: 100%; 
        min-width: 200px; 
        border-radius: 20px;
    }
</style>
<div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 ">
                <div class="card">
                  <div class="chat">
                    <div class="chat-header clearfix">
                      <div class="chat-about">
                        <div class="chat-with"><h3>{{$title}}</h3></div>
                      </div>
                    </div>
                  </div>
                  @foreach($comments as $comment)
                  <div class="chat-box" id="mychatbox">
                    <div class="col-5">
                    <div class="alert alert-primary">
                        {{$comment->name}} | {{$comment->role}} <br>
                        {{$comment->comment}} <br>
                      {{$comment->date}}
                        </div>
                    </div>
                  </div>
                    @endforeach
                    <div class="card-footer chat-form">
                      <form id="chat-form" class="row" method="POST" action="{{Route('leave_comment')}}">
                        @csrf
                        <input type="hidden" name="task_id" value="{{$comment->task_id}}">
                        <div class="col-11">
                        <input type="text" class="form-control" name="comment" placeholder="Type a message">
                        </div>
                        <div class="col-1">
                        <button class="btn btn-primary">
                          <i class="far fa-paper-plane"></i>
                        </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
</x-layouts.user>