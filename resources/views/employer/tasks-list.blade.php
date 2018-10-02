@extends('layouts.employer')

@section('content')
<div class="cs-content">
    <div class="container">
        <div class="col-md-12">
            
            <section>
                <h1>Outstanding Tasks</h1>

                <hr>

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
                        <a href="#" role="button" title="Export all tasks to csv" class="btn btn-default btn-block">CSV Export</a>
                    </div>
                </div>

                <hr>            

                <table class="table table-hover table-striped table-condensed table-responsive cs-table">
                    <thead>
                        <tr>
                            <th colspan="1">Date</th>
                            <th colspan="1">Type</th>
                            <th colspan="2">Status</th>
                        </tr>
                    </thead>
                    <tbody>    
                        @forelse($tasks as $task)
                            <tr>
                                <td>{{ $task->date or '' }}</td>
                                <td>{{ $task->type or 0.00 }}</td>
                                <td>{{ $task->state or '' }}</td>
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
                    {!! $tasks->render() !!}
                </div>
                
            </section>

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
