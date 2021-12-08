@extends('layouts.index')

  @section('title','Tambah Produk')

  @section('container')
    <div class="container">
        <div class="card show-card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6 mt-1">
                        <strong> Tambah Produk</strong>
                    </div>
                    <div class="col-6">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a class="btn btn-outline-light me-md-2" type="button" href="{{route('products.index')}}">Kembali</a>
                        </div>
                    </div>
                </div>    
            </div>
            <!-- CARD BODY -->
            <div class="card-body">
                <form method="post" action="{{route('products.store')}}" id="contactForm" enctype="multipart/form-data" class="row gy-2 gx-3 mt-3">
                    @csrf
                    <div class="col-sm-6 offset-sm-3">
                        <div class="mb-3">
                            <label for="nama" class="form-label  label-required">Nama Produk</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Masukkan Nama Produk" value="{{old('name')}}">
                            @error('name')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label  label-required">Harga</label>
                            <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" id="priceInput" placeholder="Masukkan Harga" value="{{old('price')}}">
                            @error('price')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="qty" class="form-label  label-required">Kuantiti</label>
                            <input type="number" class="form-control @error('qty') is-invalid @enderror" name="qty" id="exampleInputEmail1" placeholder="Masukkan Kuantiti" value="{{old('qty')}}">
                            @error('qty')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="note" class="form-label label-required">Keterangan</label>
                            <textarea class="form-control  @error('note') is-invalid @enderror" name="note" placeholder="Masukkan Keterangan">{{old('note')}}</textarea>
                            @error('note')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success" data-bs-toogle="modal" data-bs-target="#exampleModal">Simpan</button> 
                    </div>
                </form>
                <p class="fst-italic ms-3 mt-2 text-danger"><strong>Catatan :</strong> (*) Wajib Diisi</p>  
            </div>
        </div>
    </div>
    @endsection