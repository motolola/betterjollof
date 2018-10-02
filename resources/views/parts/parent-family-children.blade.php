@if(count($children->rows))
<table class="table table-hover table-striped table-condensed table-responsive">
  <thead>
    <tr>
     
      <th colspan="1">Name</th>
      <th colspan="1">Date Of Birth</th>
      <th colspan="2">Relationship</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($children->rows as $child)
    <tr>
      
      <td>{{ $child->first_name }} {{ $child->last_name }}</td>
      <td>{{ $child->dob  }}</td>
      <td>{{ $child->relationship  }}</td>
      <td class="text-right">

        <form method="POST" action="{{url('parent/child-edit/'.$child->id_child)}}">
          <input type="hidden" name="id_child" value="{{ $child->id_child }}">
          <input type="hidden" name="firstname" value="{{ $child->first_name }}">
          <input type="hidden" name="lastname" value="{{ $child->last_name }}">
          <input type="hidden" name="dob" value="{{ $child->dob }}">
           <input type="hidden" name="registered_disabled" value="{{ $child->registered_disabled }}"> 
           <input type="hidden" name="relationship" value="{{ $child->relationship }}">
           
          <input type="hidden" name="beneficiary_id" value="{{ $beneficiary_id or '' }}" >
          <input type="submit" class="btn btn-success" value="Edit Child">
        </form>

      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@else
<div class="alert alert-info">No Family Found</div>
@endif
