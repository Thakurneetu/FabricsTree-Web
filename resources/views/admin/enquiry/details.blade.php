<h5>Customer Details</h5>
<table class="table table-borderless table-responsive-md">
  <colgroup>
    <col style="width: 30%;">
    <col style="width: 70%;">
  </colgroup>
  <tr>
    <th>Name:</th>
    <td>{{$enquiry->customer->name}}</td>
  </tr>
  <tr>
    <th>Phone:</th>
    <td>{{$enquiry->customer->phone}}</td>
  </tr>
  <tr>
    <th>Email:</th>
    <td>{{$enquiry->customer->email}}</td>
  </tr>
  <tr>
    <th>Address:</th>
    <td>{{$enquiry->customer->address.', '.$enquiry->customer->pincode}}</td>
  </tr>
</table>