@extends('layouts.index')

  @section('title','Data Produk')

  @section('container')
    <div class="container">
        <div class="card show-card">
        <div class="card-header">
            <div class="row">
                <div class="col-6 mt-1">
                    <strong> Data Produk</strong>
                </div>
                <div class="col-6">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a class="btn btn-outline-light me-md-2" type="button" href="{{route('products.create')}}">Tambah Data</a>
                        <form class="d-flex" action="{{url('products/search')}}" method="post">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control" aria-label="Text input search" placeholder="Cari" name="cari">
                                <button class="btn btn-outline-light btn-sm btn-search" type="submit" aria-expanded="false">
                                    <i class="fas fa-search"></i> 
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>    
        </div>
        <!-- CARD BODY -->
        <div class="card-body">
            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                        @forelse($products as $product)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$product->nama_produk}}</td>
                            <td>{{$product->harga}}</td>
                            <td>{{$product->jumlah}}</td>
                            <td>
                                <a href="{{route('products.edit',$product->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                <button type="button" class="btn btn-danger btn-sm btn-delete" onclick="deleteDataProduct(this)" data-id="{{$product->id}}.{{$product->nama_produk}}"><i class="fas fa-trash-alt"></i></button>
                                <a class="btn btn-secondary btn-sm" data-bs-toggle="modal" href="#showDataProduct" 
                                    data-remote="{{route('products.show',$product->id)}}" 
                                    data-toggle="modal"
                                    data-target="#showDataProduct"
                                    data-title="Detail Produk {{$product->nama_produk}}"
                                    class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                            </a> 
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center p-5">
                                Data tidak tersedia
                            </td>
                        </tr>
                        @endforelse
                         <!-- END TABLE -->
                </tbody>        
            </table>
        </div>
        </div>
    </div>
    @endsection