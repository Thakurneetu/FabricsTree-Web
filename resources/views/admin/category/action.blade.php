<div class="btn-group">
  <a href="{{ route('admin.category.edit', $id) }}" class='btn btn-sm btn-info tooltip-box'>
    <i class="text-white icon icon-sm cil-pen-alt"></i>
    <div class="tooltip text-white text-xs -top-full">
      <span>Edit</span>
    </div>
  </a>
  <button onclick="delete_data({{$id}})" class='btn btn-sm btn-danger tooltip-box'>
    <i class="text-white icon icon-sm cil-trash"></i>
    <div class="tooltip text-white text-xs -top-full">
      <span>Delete</span>
    </div>
  </button>
</div>
<form id="delete_form-{{$id}}" action="{{ route('admin.category.destroy', $id) }}" method="post">
    @csrf @method('delete')
</form>
