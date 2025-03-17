<h5>Qutations Received</h5>
<table class="table table-responsive-md">
  <colgroup>
    <col style="width: 30%;">
    <col style="width: 70%;">
  </colgroup>
  <tr>
    <th>Manufacturer</th>
    <th>Qutation</th>
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
    </tr>
  @empty
  <tr>
    <td class="text-center" colspan="2">No Qutation Submitted!</td>
  </tr>
  @endforelse
</table>