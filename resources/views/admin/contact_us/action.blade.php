<div class="btn-group">
  <a href="{{ route('admin.contact-us.show', $id) }}" class='btn btn-sm btn-info tooltip-box'>
    <i class="text-white icon icon-sm cil-album"></i>
    <div class="tooltip text-white text-xs -top-full"> 
      <span>View</span>
    </div>
  </a>
  @if($status == 'pending')
  <a href="javascript:void(0);" onclick="reviewed({{$id}})" class='btn btn-sm btn-success tooltip-box'>
    <i class="text-white icon icon-sm cil-check"></i>
    <div class="tooltip text-white text-xs -top-full">
      <span>Reviewed</span>
    </div>
  </a>
  @endif
</div>