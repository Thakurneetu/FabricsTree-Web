<h5>Enquries</h5>
<table class="table table-borderless table-responsive-md">
  <colgroup>
    <col style="width: 10%;">
    <col style="width: 10%;">
    <col style="width: 10%;">
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
      <th>Quantity</th>
    </tr>
  </thead>
  @foreach($enquiry->items as $item)
  <tbody>
    <tr>
      <td>{{$item->title}}</td>
      <td>{{$item->category->name??''}}</td>
      <td>{{$item->subcategory->name??''}}</td>
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