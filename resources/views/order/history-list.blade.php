@extends('layouts.food')
@section('content')

    <div class="cs-content">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h1>
                                        <i class="fa fa-list-ul" aria-hidden="true"></i> Order History. <a href="{{url('order/received')}}" class="btn btn-primary">Go to Open Orders</a>
                                    </h1>
                                    <table class="uk-table uk-table-hover uk-table-striped uk-table-condensed">
                                        <tr>
                                            <th>From</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>

                                        @forelse($orders_received as $order)
                                            <tr>
                                                <td><a href="{{url('profile/'.$order->user->username)}}">{{$order->user->firstname." ".$order->user->surname}}</a></td>
                                                <td>{{date("jS M Y @H:i",strtotime($order->created_at))}}</td>
                                                <td>{{$order->status}}</td>
                                                <td>
                                                    <a href="{{url('order/received-details/'.$order->id)}}">
                                                        <button class="btn btn-sm btn-primary">View Details <i class="fa fa-binoculars" aria-hidden="true"></i>
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr><td>No order for you.</td></tr>

                                        @endforelse
                                    </table>


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
@endsection