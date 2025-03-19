<div class="btn-group">
  <a href="{{ route('admin.manufacturer.edit', $id) }}" class='btn btn-sm btn-info tooltip-box'>
    <i class="text-white icon icon-sm cil-pen-alt"></i>
    <div class="tooltip text-white text-xs -top-full"> 
      <span>Edit</span>
    </div>
  </a>
  <a href="{{ route('admin.manufacturer.show', $id) }}" class='btn btn-sm btn-primary tooltip-box'>
    <i class="text-white icon icon-sm cil-album"></i>
    <div class="tooltip text-white text-xs -top-full"> 
      <span>View</span>
    </div>
  </a>
  <a href="javascript:void(0);" onclick="delete_data({{$id}})" class='btn btn-sm btn-danger tooltip-box'>
    <i class="text-white icon icon-sm cil-trash"></i>
    <div class="tooltip text-white text-xs -top-full">
      <span>Delete</span>
    </div>
  </a>
</div>
<form id="delete_form-{{$id}}" action="{{ route('admin.manufacturer.destroy', $id) }}" method="post">
    @csrf @method('delete')
</form>