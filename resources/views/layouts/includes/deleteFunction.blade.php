<script>
  function delete_data(id){
    swal({
      title:'Are you sure?',
      dangerMode: true,
      // timer: 3000,
      buttons: {  cancel: { text: "Cancel",visible:true, value: null, className: "bg-light"},
                  confirm: { text: "Delete", value: true, className: "bg-primary"},
                },
      icon: "warning",
      text: 'Data will be deleted permanently!',
      className: "btn-danger",
      closeModal: true
    })
    .then((willDelete) => {
      if (willDelete) {
        jQuery("#delete_form-"+id ).submit();
      }
    });
  }


  function change_status(ele, id){
    let status = '0';
    if(jQuery(ele).prop("checked")){
      status = '1';
    }
    let url = jQuery(ele).data("route")+'/'+id;
    swal({
      title:'Are you sure?',
      text: "Status will be changed!",
      dangerMode: true,
      buttons: {  cancel: { text: "Cancel",visible:true, value: null, className: "bg-light"},
                  confirm: { text: "Change", value: true, className: "bg-primary"},
                },
      icon: "warning",
      className: "btn-warning",
      closeModal: true
    })
    .then((result) => {
      if (result) {
        jQuery.ajax({
          method: "POST",
          url: url,
          data: {_token: "{{csrf_token()}}", _method:'PUT', status: status},
        })
        .done(function (res) {
          if(res.success){
            swal({
            title: res.message,
            icon: "success",
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
          });
          }else{
            if(status == '1') jQuery(ele).prop("checked", false);
            else jQuery(ele).prop("checked", true);
          }
        })
        .fail(function (err) {
          console.log(err);
        });
      }else{
        if(status == '1') jQuery(ele).prop("checked", false);
        else jQuery(ele).prop("checked", true);
      }
    });
  }
</script>
