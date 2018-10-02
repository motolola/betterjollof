@extends('layouts.food')
@section('content')

    <div class="cs-content">
        <div class="container">
            <div class="row">

                <div class="col-md-12">

                    <h1>
                        Order ID: {{ $order->id }} Customer: <a href="{{url('profile/'.$order->user->username)}}">{{$order->user->firstname}} {{$order->user->surname}} ({{$order->user->username}})</a>
                    </h1>
                    @include('flash::message')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <table class="table">
                                        <tr>
                                            <th><i class="fa fa-user" aria-hidden="true"></i>
                                                 Name:</th>
                                            <td><a href="{{url('profile/'.$order->user->username)}}">{{$order->user->firstname." ".$order->user->surname}}</a></td>
                                        </tr>
                                        <tr>
                                            <th><i class="fa fa-2x fa-mobile" aria-hidden="true"></i> Phone number:</th>
                                            <td>{{$order->user->mobilephone or "not provided"}}</td>
                                        </tr>
                                        <tr>
                                            <th><i class="fa fa-calendar-o" aria-hidden="true"></i>
                                                 Order date:</th>
                                            <td>{{date('jS  M Y @H:i',strtotime($order->created_at))}}</td>
                                        </tr>
                                        <tr>
                                            <th><i class="fa fa-hourglass" aria-hidden="true"></i>
                                                 Order status:</th>
                                            <td>{{$order->status}}</td>
                                        </tr>
                                        <tr>
                                            <th><i class="fa fa-envelope" aria-hidden="true"></i> Message:</th>
                                            <td>{{$order->message}}</td>
                                        </tr>

                                    </table>
                                    <!-- Start Modal -->

                                    <div class="row">

                                        <div class="col-md-4">
                                            <!-- Large modal -->
                                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target=".message-modal-lg">Message <i class="fa fa-envelope-o" aria-hidden="true"></i></button>

                                            <div class="modal fade message-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="panel">
                                                            <div class="panel-body">
                                                                <div class="row">
                                                                    <h3 class="text-center">You are about to send message to {{$order->user->username}}</h3>
                                                                    <div class="col-md-8 col-md-offset-2">
                                                                        <form method="post" action="{{url('message/send-message/')}}">
                                                                            {{ csrf_field() }}

                                                                            <input type="hidden" name="to_id" value="{{$order->user->id}}" id="recipient-name">
                                                                            <div class="form-group">
                                                                                <label for="message-subject" class="control-label">Subject:</label>
                                                                                <input type="text" class="form-control" name="msg_subject" id="message-subject">
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="message-text" class="control-label">Message to {{$order->user->username}}:</label>
                                                                                <textarea class="form-control" name="msg_body" id="message-text"></textarea>
                                                                            </div>
                                                                            <button type="submit" class="btn btn-primary btn-block btn-lg">Send <i class="fa fa-envelope-o" aria-hidden="true"></i></button>
                                                                            <button type="button" class="btn btn-default btn-block btn-lg" data-dismiss="modal">Close</button>
                                                                        </form>
                                                                    </div>
                                                                    <div class="col-md-2"></div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            @if ($order->status == "Open")
                                            <!-- Large modal -->
                                            <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target=".dispatch-modal-lg">Dispatch <i class="fa fa-truck" aria-hidden="true"></i></button>

                                            <div class="modal fade dispatch-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">

                                                        <div class="panel">
                                                            <div class="panel-body">
                                                                <div class="row">

                                                                 <div class="col-md-8 col-md-offset-2">
                                                                    <form method="post" action="{{url('order/dispatched-message')}}">
                                                                        <h3>You are about to dispatch the Order to {{$order->user->username}}</h3>
                                                                        <p>
                                                                            This allows you to finalise deal between you and <strong class="text-uppercase">{{$order->user->username}}</strong>. You are fully responsible
                                                                            for how you obtain your payments. <br>Also note that you must have agreed about your convenient delivery method, whether postal, self-delivery or pick-ups.
                                                                        </p>
                                                                        {{ csrf_field() }}

                                                                            <input type="hidden" name="to_id" value="{{$order->user->id}}" id="recipient-name">
                                                                            <input type="hidden" name="order_id" value="{{$order->id}}">

                                                                        <div class="form-group">
                                                                            <label for="message-text" class="control-label">Message to {{$order->user->username}}:</label>
                                                                            <textarea class="form-control" name="msg_body" id="message-text"></textarea>
                                                                        </div>
                                                                        <button type="submit" class="btn btn-success btn-block btn-lg">Send to dispatch <i class="fa fa-truck" aria-hidden="true"></i></button>
                                                                        <button type="button" class="btn btn-default btn-block btn-lg" data-dismiss="modal">Close</button>
                                                                    </form>
                                                                </div>
                                                                <div class="col-md-2"></div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif

                                        </div>
                                        <div class="col-md-4">
                                            @if ($order->status == "Open")
                                            <!-- Large modal -->
                                            <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target=".cancel-modal-lg">Cancel <i class="fa fa-times" aria-hidden="true"></i></button>

                                            <div class="modal fade cancel-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="panel">
                                                            <div class="panel-body">
                                                                <div class="row">
                                                                    <h3 class="text-center">You are about to cancel the Order (ID:{{$order->id}}) to {{$order->user->username}}</h3>
                                                                    <div class="col-md-8 col-md-offset-2">
                                                                        <form method="post" action="{{url('order/cancel-message')}}">
                                                                            {{ csrf_field() }}

                                                                            <input type="hidden" name="to_id" value="{{$order->user->id}}" id="recipient-name">
                                                                            <input type="hidden" name="order_id" value="{{$order->id}}">

                                                                            <div class="form-group">
                                                                                <label for="message-text" class="control-label">Message to {{$order->user->username}}:</label>
                                                                                <textarea class="form-control" name="msg_body" id="message-text"></textarea>
                                                                            </div>
                                                                            <button type="submit" class="btn btn-danger btn-block btn-lg">Cancel Order <i class="fa fa-times" aria-hidden="true"></i></button>
                                                                            <button type="button" class="btn btn-default btn-block btn-lg" data-dismiss="modal">Close</button>
                                                                        </form>
                                                                    </div>
                                                                    <div class="col-md-2"></div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif

                                        </div>

                                    </div>
                                    <!-- END of Modals -->

                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <table class="table">
                                        <tr>
                                            <th>Food</th>
                                            <th>Portion</th>
                                            <th>Unit</th>
                                            <th>Unit price</th>
                                            <th>line price</th>
                                        </tr>
                                        <span style="display: none;">{{$total = 0}}</span>

                                    @foreach($order_contents as $content)
                                        <tr>
                                            <td><a href="{{url('food/'.$content->food->slug)}}">{{$content->food->name}}</a></td>
                                            <td>{{$content->name}}</td>
                                            <td>{{$content->unit}}</td>
                                            <td>{{$content->food->user->country->currency_symbol.$content->price}}</td>
                                            <td>
                                                {{$content->food->user->country->currency_symbol.$content->price * $content->unit }}
                                                <span style="display: none;">{{$total = $total + $content->price * $content->unit}}</span>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </table>
                                    <p class="pull-right text-info">
                                        Total Price: {{$order_contents[0]->food->user->country->currency_symbol.$total}}
                                    </p>

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-12">


                    </div>

                </div>
            </div>
        </div>

        @endsection

        @section('additional_style')
            {{-- Add custom stylesheet links here --}}
        @endsection

        @section('additional_script')
            {{-- Add custom javascript links here --}}
        @endsection

        @section('modals')
            {{-- Add modal markup here --}}
            <script>
                $('#flash-overlay-modal').modal();
            </script>
@endsection