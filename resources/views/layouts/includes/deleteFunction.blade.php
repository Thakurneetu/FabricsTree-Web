<script>
  function delete_data(id){
    swal({
      title:'Are you sure?',
      dangerMode: true,
      // timer: 3000,
      buttons: {  cancel: { text: "Cancel",visible:true, value: null, className: "bg-light"},
                  confirm: { text: "Delete", value: true, className: "bg-warning"},
                },
      icon: "warning",
      text: 'Data will be deleted permanently!', 
      className: "btn-danger",
      closeModal: true
    })
    .then((willDelete) => {
      if (willDelete) {
        $("#delete_form-"+id ).submit();
      }
    });
  }
</script>