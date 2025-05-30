<h5>Enquiry Item</h5>
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
  </colgroup>
  <thead>
    <tr>
      <th>Category</th>
      <th>Sub Category</th>
      <th>Width</th>
      <th>Warp</th>
      <th>Weft</th>
      <th>Count</th>
      <th>Reed</th>
      <th>Pik</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>{{$enquiry->category->name??''}}</td>
      <td>{{$enquiry->subcategory->name??''}}</td>
      <td>{{$enquiry->width}}</td>
      <td>{{$enquiry->warp}}</td>
      <td>{{$enquiry->weft}}</td>
      <td>{{$enquiry->count}}</td>
      <td>{{$enquiry->reed}}</td>
      <td>{{$enquiry->pick}}</td>
    </tr>
  </tbody>
</table>
