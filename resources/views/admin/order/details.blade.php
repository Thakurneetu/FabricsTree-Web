<h5>Customer Details</h5>
<table class="table table-borderless table-responsive-md">
  <colgroup>
    <col style="width: 30%;">
    <col style="width: 70%;">
  </colgroup>
  <tr>
    <th>Name:</th>
    <td>{{$order->customer->name}}</td>
  </tr>
  <tr>
    <th>Phone:</th>
    <td>{{$order->customer->phone}}</td>
  </tr>
  <tr>
    <th>Email:</th>
    <td>{{$order->customer->email}}</td>
  </tr>
  <tr>
    <th>Address:</th>
    <td>{{$order->customer->address.', '.$order->customer->pincode}}</td>
  </tr>
</table>

<h5>Order Details</h5>
<table class="table table-borderless table-responsive-md">
  <colgroup>
    <col style="width: 30%;">
    <col style="width: 70%;">
  </colgroup>
  <tr>
    <th>Order Id:</th>
    <td>{{$order->invoice_no}}</td>
  </tr>
  <tr>
    <th>Qutation:</th>
    <td>
      <h5>
        <a href="{{asset($order->qutation)}}" target="_blank" rel="noopener noreferrer">
          <u><i>Download/View</i></u>
        </a>
      </h5>
    </td>
  </tr>
  <tr>
    <th>Tracking Link:</th>
    <td class="row">
      <div class="col-md-11">
        <input type="text" name="track_link" class="form-control" value="{{$order->track_link}}">
      </div>
    </td>
  </tr>
  <tr>
    <th>Status:</th>
    <td class="row">
      <div class="col-md-3">
      <select name="status" class="form-control">
        <option value="Pending" {{$order->status == 'Pending' ? 'selected' : ''}}>Pending</option>
        <option value="Dispatched" {{$order->status == 'Dispatched' ? 'selected' : ''}}>Dispatched</option>
        <option value="Delivered" {{$order->status == 'Delivered' ? 'selected' : ''}}>Delivered</option>
        <option value="Cancelled" {{$order->status == 'Cancelled' ? 'selected' : ''}}>Cancelled</option>
        <option value="Sent For Return" {{$order->status == 'Sent For Return' ? 'selected' : ''}}>Sent For Return</option>
        <option value="Returned" {{$order->status == 'Returned' ? 'selected' : ''}}>Returned</option>
      </select>
      </div>
    </td>
  </tr>
</table>