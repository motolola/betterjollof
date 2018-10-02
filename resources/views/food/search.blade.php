<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-inline" method="get" action="{{url('food-search')}}">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-sm-10">
                    <input name="search_terms" required="required" type="text" style="width: 100%" class="form-control" id="inlineFormInputName2" placeholder="Enter keywords like rice, pounded yam, egunsi">
                </div>
                <div class="col-sm-2">
                    <button type="submit" class="btn pull-left btn-default"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>
