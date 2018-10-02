@if(count($account_requests->rows) > 0)
<table class="table table-hover table-striped table-condensed table-responsive">
  <thead>
    <tr>
      <td colspan="1">Request ID</td>
      <th colspan="2">Name</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($account_requests->rows as $req)
    <tr>
      <td>{{ $req->id_request }}</td>
      <td>{{ $req->first_name }} {{ $req->last_name }}</td>
      <td class="text-right">
        <a href="{{url('parent/accept-family-account/'.$req->id_request)}}"><button class="btn btn-success">Accept</button></a>
        <a href="{{url('parent/reject-family-account/'.$req->id_request)}}"><button class="btn btn-warning">Reject</button></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@else
<div class="alert alert-info">No Requests Found</div>
@endif
