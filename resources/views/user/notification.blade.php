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
                        <div class="chat-with"><h3></h3></div>
                      </div>
                    </div>
                  </div>
                  <div class="chat-box" id="mychatbox">
                    <div class="col-5">
                        @foreach($notifications as $notification)
                    <div class="alert alert-primary">
                        {{$notification->sent_user_name}} <br>
                        {{$notification->message}}
                        </div>
                        @endforeach
                    </div>
                  </div>
                    <div class="card-footer chat-form">
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
</x-layouts.user>