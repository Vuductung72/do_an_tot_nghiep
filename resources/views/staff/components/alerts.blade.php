@if ($success = session('success'))
    <script>
        Swal.fire(
            'Thành Công',
            '{{$success}}',
            'success',
        )
    </script>
@elseif ($warning = session('warning'))
    <script>    
        Swal.fire(
            'Cảnh báo',
            '{{$warning}}',
            'warning',
        )
    </script>
@elseif ($error = session('error'))
    <script>    
        Swal.fire(
            'Lỗi',
            '{{$error}}',
            'error',
        )
    </script>
@elseif ($info = session('info'))
    <script>    
        Swal.fire(
            'Chi tiết',
            '{{$info}}',
            'info',
        )
    </script>
@elseif ($delete = session('delete'))
    <script>    
        function actionDelete(event){
            event.preventDefault();
            let urlRequest = $(this).data('url');
            let that = $(this);

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                    type: 'GET',
                    url: urlRequest,
                    success: function (data) {
                        if (data.code == 200) {
                            that.parent().parent().remove();
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        }

                    },
                    error: function () {

                    }
                    });


            }
        })

        }
        $(function () {
        $(document).on('click', '.action_delete', actionDelete);
        });
    </script>
@endif


{{-- @pu
{{-- @push('scripts')
    <script>
        setTimeout(() => {
          $('#alerts').addClass("d-none")
        },4000);
    </script>
@endpush --}}
