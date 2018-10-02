@extends('layouts.cook')
@if (session('redirect_message'))
    <div class="alert alert-success">
        {{ session('redirect_message') }}
    </div>
@endif


@section('content')

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://bootswatch.com/cosmo/bootstrap.min.css">
    <div class="mainbody container-fluid">
        <div class="row">

            <div style="padding-top:50px;"> </div>
            <div class="col-lg-3 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4>Inbox</h4>

                        <div>

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#received" aria-controls="home" role="tab" data-toggle="tab">Inbox</a></li>
                                <li role="presentation"><a href="#sent" aria-controls="profile" role="tab" data-toggle="tab">Sent</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="received">

                                        @forelse($messages as $message)

                                                <form class="inbox-received" method="post" action="#" id="inbox-received">
                                                    <input type="hidden" class="from_id" name="from_id" value="{{$message[0]->fromUser->id}}">
                                                <h4>
                                                    From: {{ucfirst($message[0]->fromUser->username)}} on {{date('jS M @ H:i:s',strtotime($message[0]->created_at))}}
                                                </h4>
                                                <span>Subject: {{$message[0]->subject}}</span>
                                                <hr>
                                                </form>

                                        @empty
                                            <div>No message</div>

                                        @endforelse
                                </div>
                                <div role="tabpanel" class="tab-pane" id="sent">
                                    ..sent.
                                </div>
                            </div>

                        </div>




                    </div>
                </div>
                <hr>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4>
                            Messages body
                        </h4>
                        <div id="message_body"></div>

                    </div>
                </div>
                <hr>

            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4>
                            Free Space ...
                        </h4>
                    </div>
                </div>
                <hr>

            </div>
        </div>
    </div>


@endsection

@section('additional_style')
    {{-- Add custom stylesheet links here --}}
@endsection

@section('additional_script')
    {{-- Add custom javascript links here --}}
    <script>
    $('#received').tab('show'); // Select tab by name
    $('#sent').tab('show'); // Select first tab
    </script>
    <script>

        $( document ).ready(function() {
            $(".inbox-received").click(function(){
                var id = $(this).children('.from_id').attr('value');
                loadMessage(id);
            });
        });

        function loadMessage(id){
            $('#message_body').html("<img src='{{url('img/ajax-loader.gif')}}'>");
            $.ajax({
                type: 'POST',
                url: '/message/message-body',
                data: ({"from_id":id}),
                success: function(data) {
                    $('#message_body').html(data);
                }
            });
        }
        $( document ).ready(function() {

            setInterval(function(){
                var msg_count = $('#reply-form').children('.msg_count').attr('value');
                var id        = $('#reply-form').children('.from_id').attr('value');

                $.ajax({
                    type: 'POST',
                    url: '/message/message-count',
                    data: ({"from_id":id, "count":msg_count}),
                    success: function(data) {

                        if (data == 1){
                            loadMessage(id);
                        }
                    }
                });




            }, 3000);

        });
    </script>

@endsection

@section('modals')
    {{-- Add modal markup here --}}
@endsection
