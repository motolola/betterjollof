<div class="panel panel-default">
    <div class="panel-heading"><strong>{{ $food->total() }} record(s)</strong></div>
    <div class="panel-body">
        @forelse ($food as $item)
            <div class="row">
                <div class="col-sm-4">
                    <a href="{{url('food/'.$item->slug)}}">
                    <img class="food-list-image" src="{{url('photos/food/thumbnail_'.$item->photo)}}">
                    </a>
                </div>
                <div class="col-sm-5">
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="{{url('food/'.$item->slug)}}"><h4 class="text-uppercase"><strong>{{ $item->name }}</strong></h4></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <strong>{{$item->description }}</strong>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h4>{{ count($item->portions) }} portions available</h4>
                            <table class="table table-condensed table-striped"><tr>
                            @forelse ($item->portions as $portion)
                                @if($loop->iteration < 4)
                                      <td>{{ $portion->name }}</td>
                                @endif
                            @empty
                                <p>No Portions added to this food.</p>
                            @endforelse
                                </tr></table>

                        </div>

                    </div>

                </div>
                <div class="col-sm-3">
                    ...
                </div>
            </div>
            <hr>
        @empty
            <p>No food available.</p>
        @endforelse
        {{ $food->links() }}
    </div>