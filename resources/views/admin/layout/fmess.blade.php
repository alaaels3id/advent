@if(Session::has('flash_message'))
    <script>
        swal({
          title: '{{ Session::get('flash_message') }}',
          text: 'I will close in 2 seconds.',
          timer: 2000,
          onOpen: () => {
            swal.showLoading()
          }
        }).then((result) => {
          if (
            // Read more about handling dismissals
            result.dismiss === swal.DismissReason.timer
          ) {
            console.log('I was closed by the timer')
          }
        })
    </script>  
@endif