<h5>Order Items</h5>
<table class="table table-borderless table-responsive-md">
  <colgroup>
    <col style="width: 30%;">
    <col style="width: 10%;">
    <col style="width: 20%;">
    <col style="width: 10%;">
    <col style="width: 10%;">
    <col style="width: 10%;">
    <col style="width: 10%;">
    <col style="width: 10%;">
    <col style="width: 10%;">
    <col style="width: 10%;">
  </colgroup>
  <thead>
    <tr>
      <th>Product</th>
      <th>Category</th>
      <th>Sub Category</th>
      <th>Width</th>
      <th>Warp</th>
      <th>Weft</th>
      <th>Count</th>
      <th>Reed</th>
      <th>Pik</th>
      <th>Qty</th>
    </tr>
  </thead>
  @foreach($order->items as $item)
  <tbody>
    <tr>
      <td>{{$item->title}}</td>
      <td>{{$item->category}}</td>
      <td>{{$item->subcategory}}</td>
      <td>{{$item->width}}</td>
      <td>{{$item->warp}}</td>
      <td>{{$item->weft}}</td>
      <td>{{$item->count}}</td>
      <td>{{$item->reed}}</td>
      <td>{{$item->pick}}</td>
      <td>{{$item->quantity}}</td>
    </tr>
  </tbody>
  @endforeach
</table>