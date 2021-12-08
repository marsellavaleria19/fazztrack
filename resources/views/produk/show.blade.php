
<div class="row g-0">
    <div class="col-sm-8 ms-3">
        <h5 class="title-detail-view">{{$product->nama_produk}}</h5>
        <table class="table table-borderless">
            <tr>
                <td>Nama Produk</td>
                <td>{{$product->nama_produk}}</td>
            </tr>
            <tr>
                <td>Harga</td> 
                <td>{{$product->harga}}</td>
            </tr>
            <tr>
                <td>Jumlah</td> 
                <td>{{$product->jumlah}}</td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td>{{$product->keterangan}}</td>
            </tr>
        </table>
    </div>
</div>    
