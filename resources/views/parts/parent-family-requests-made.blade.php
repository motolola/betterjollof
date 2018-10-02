@if(count($account_request_made->rows) > 0)
<table class="table table-hover table-striped table-condensed table-responsive">
  <thead>
    <tr>
      <td colspan="1">Request ID</td>
      <th colspan="2">Name</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($account_request_made->rows as $req)
    <tr>
      <td>{{ $req->id_request }}</td>
      <td>{{ $req->first_name }} {{ $req->last_name }}</td>
      <td class="text-right">
        <a href="#"><button class="btn btn-success">Cancel</button></a>
      </td>
    </tr>
    @endforeach

  </tbody>
</table>
@else
<div class="alert alert-info">No Made Requests Found</div>
@endif
