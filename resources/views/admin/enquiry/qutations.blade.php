<label for="name"> Qutations Received</label>

<form action="{{ route('admin.enquiry.update', $enquiry->id) }}" method="post" enctype='multipart/form-data'>
  @csrf @method('patch')
  <table class="table table-striped dataTable no-footer dtr-inline" >
    <colgroup>
      <col style="width: 30%;">
      <col style="width: 30%;">
      <col style="width: 40%;">
    </colgroup>
    <tr>
      <th>Qutation Received Date</th>
      <th>Manufacturer</th>
      <th>Qutation</th>
      <th>Selected Qutation</th>
    </tr>
    @forelse($enquiry->manufacturers->whereNotNull('qutation') as $man)
      <tr>
        <td>{{$man->created_at}}</td>
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
          <button type="submit" class="btn btn-info" onclick="return confirm('Are you sure want to Save Selected Qutation?');">
            Save Selected Qutation
          </button>
      </td>
    </tr>
    @endif
  </table>
</form>
