@if(count($linked_family_accounts->rows) > 0)
<table class="table table-hover table-striped table-condensed table-responsive">
  <thead>
    <tr>
      <td colspan="1">Account Number</td>
      <th colspan="1">Name</th>
      <th colspan="1">username</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($linked_family_accounts->rows as $req)
    <tr>
      <td>{{ $req->id_account_member }}</td>
      <td>{{ $req->first_name }} {{ $req->last_name }}</td>
      <td>{{ $req->username }}</td>
    </tr>
    @endforeach

  </tbody>
</table>
@else
<div class="alert alert-info">No Linked Accounts Found</div>
@endif
