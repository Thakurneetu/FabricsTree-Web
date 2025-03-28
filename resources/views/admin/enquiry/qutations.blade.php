<h5>Qutations Received</h5>

<form action="{{ route('admin.enquiry.update', $enquiry->id) }}" method="post" enctype='multipart/form-data'>
  @csrf @method('patch')

<table class="table table-responsive-md">
  <colgroup>
    <col style="width: 30%;">
    <col style="width: 30%;">
    <col style="width: 40%;">
  </colgroup>
  <tr>
    <th>Manufacturer</th>
    <th>Qutation</th>
    <th>Selected Qutation</th>
  </tr>
  @forelse($enquiry->manufacturers->whereNotNull('qutation') as $man)
    <tr>
      <td>{{$man->customer->name}}</td>
      <td>
        <h5>
          <a href="{{asset($man->qutation)}}" target="_blank" rel="noopener noreferrer">
            <u><i>Download/View</i></u>
          </a>
        </h5>
      </td>
      <td>
        <div class="form-check form-check-inline">
          <input style="transform: scale(1.5);" class="form-check-input"
           name="manufacturer_id" type="radio" value="{{$man->customer_id}}"
           {{$enquiry->manufacturer_id == $man->customer_id ? 'checked' : ''}}>
        </div>
      </td>
    </tr>
  @empty
  <tr>
    <td class="text-center" colspan="3">No Qutation Submitted!</td>
  </tr>
  @endforelse
  @if(count($enquiry->manufacturers->whereNotNull('qutation')) > 0)
  <tr>
    <td class="text-center" colspan="3">
        <button type="submit" class="btn btn-info">
          Save Selected Qutation
        </button>
    </td>
  </tr>
  @endif
</table>

</form>