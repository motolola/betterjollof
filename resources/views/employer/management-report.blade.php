@extends('layouts.employer')

@section('content')
<div class="cs-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <section>
                    <h1>Management Report <span class="text-danger">(Page Under Construction)</span></h1>

                    <hr>

                    <canvas role="graphics-doc" id="myChart">    
                        <p>Your browser does not support html canvas.</p>
                    </canvas>                

                    <div class="row">
                        <div class="col-md-3">

                            {{-- Search --}}
                            <form action="#" method="GET">
                                {{ csrf_field() }}
                                <div class="input-group">
                                    <label for="search" class="sr-only">Search For</label>
                                    <input id="search" name="search" type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                                        <button role="button" class="btn btn-default" type="submit">Go!</button>
                                    </span>
                                </div>
                            </form>

                        </div>
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-3">                        
                            <a href="#" role="button" title="Export all invoices to csv" class="btn btn-default btn-block">CSV Export</a>
                        </div>
                    </div>

                    <hr>          

                    <table class="table table-hover table-striped table-condensed table-responsive cs-table">
                        <thead>
                            <tr>
                                <th colspan="1">Date</th>
                                <th colspan="1">Value</th>
                                <th colspan="2">Status</th>
                            </tr>
                        </thead>
                        <tbody>    
                            @forelse($reportRows as $reportRow)
                            <tr>
                                <td>{{ $reportRow->date or '' }}</td>
                                <td>{{ $reportRow->value or 0.00 }}</td>
                                <td>{{ $reportRow->state or '' }}</td>
                                <td class="text-right">
                                    <a href="#" title="More employee information" role="button" class="btn btn-sm btn-default">Info</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center"><b>No Employees</b></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="cs-pagination text-center">
                        {!! $reportRows->render() !!}
                    </div>

                </section>

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.min.js"></script>
<script>

/**
* Removes Iframe used for resize detection for accessability purposes.
* If we encounter issues when resizing we may need to comment out this section.
* See this thread for info: https://github.com/chartjs/Chart.js/issues/2210
*/
var origResizeListener = Chart.helpers.addResizeListener;
Chart.helpers.addResizeListener = function(node, callback){

    if(Chart.defaults.global.responsive){
        origResizeListener(node,callback);
    }

};
Chart.defaults.global.responsive = false;
/** End iFrae Removal */

var ctx = document.getElementById("myChart").getContext("2d");
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
        datasets: [{
            label: '# of Uptake',
            data: [12, 19, 3, 20, 2, 15],
            fill: false,
            lineTension: 0.1,
            borderColor: '#3A3A3A',
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'round', // bevel, round, miter
            pointBorderColor: "#3A3A3A",
            pointBackgroundColor: "#fff",
            pointBorderWidth: 2,
            pointHoverRadius: 6,
            pointHoverBackgroundColor: "rgba(75,192,192,1)",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointHoverBorderWidth: 2,
            pointRadius: 4,
            pointHitRadius: 10,
}]
},
options: {
    responsive: true,
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero:true
            }
        }]
    }
}
});
</script>
@endsection

@section('modals')
{{-- Add modal markup here --}}
@endsection
