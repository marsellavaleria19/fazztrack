<script src="/js/jquery-3.5.1.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <link href="/css/component-chosen.css" rel="stylesheet">
    <script src="/js/chosen.jquery.js"></script>
    <script src="/vendor/sweetalert/sweetalert.all.js"></script>
    <script>
        jQuery(document).ready(function($){
            $('#showDataProduct').on('show.bs.modal',function(e){
                var button = $(e.relatedTarget);
                var modal = $(this);

                modal.find('.modal-body').load(button.data("remote"));
                modal.find('.modal-title').html(button.data("title"));
            });
        });
    </script>
     <div class="modal" id="showDataProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> 
                </div>
                <div class="modal-body">
                    <i class="fa fa-spinner fa-spin"></i>
                </div>
            </div>
        </div>
    </div>
    <script>
        function deleteDataProduct(e){
            let data = e.getAttribute('data-id');
            let split = data.split('.');
            let id = split['0'];
            let name = split['1'];

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Menghapus data "+id+"-"+name,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus',
                cancelButtonText : 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type:'POST',
                        url:'{{url("/products/delete")}}',
                        data:{
                            "_token": "{{ csrf_token() }}",
                            id:id,_method: "delete"
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success:function(data) {
                            if(data.success){
                                // console.log("sukses");
                                location.reload(true);
                            }    
                        }
                    });
                }
            });
        }
    </script>

