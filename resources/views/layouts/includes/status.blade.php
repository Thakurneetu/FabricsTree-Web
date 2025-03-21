<div class="form-check form-switch form-switch-xl">
  <input class="form-check-input" type="checkbox" id="customSwitch-{{$id}}" data-id="{{$id}}"
         name="activeSwitch" value="{{$status}}" {{$status == 1 ? "checked" : ""}}
         data-route="{{url()->current()}}" onchange="change_status(this, {{$id}})">
</div>