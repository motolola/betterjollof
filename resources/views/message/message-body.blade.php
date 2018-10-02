
        <div class="row">

            <div style="padding-top:50px;"> </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body" >
                        @foreach($messages as $message)
                           <div class="{{ Auth::user()->id == $message->to_id ? 'pull-left from-msg-style' : 'pull-right to-msg-style' }}">
                               {{$message->body}} </div>
                            <br>
                        @endforeach
                    </div>
                </div>
                <hr>
                <form method="post" action="#" id="reply-form">
                    <input type="hidden" name="to_id" class="from_id" value="{{$from_id}}">
                    <input type="hidden" name="msg_count" class="msg_count" value="{{ $msg_count }}">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Reply Message</label>
                        <textarea class="form-control" required="required" id="exampleFormControlTextarea1" name="msg_body" rows="2"></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-default btn-sm btn-block">Send</button>
                    </div>
                </form>

            </div>

        </div>

        <script>
            $( document ).ready(function() {
                $("#reply-form").submit(function(e){
                    $.ajax({
                        type: 'POST',
                        url: '/message/reply-message',
                        data:$("#reply-form").serialize(),
                        success: function(data) {
                            $('#message_body').html(data);
                        }
                    });

                    e.preventDefault();
                });
            });

        </script>


