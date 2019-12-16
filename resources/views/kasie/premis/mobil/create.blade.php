@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Formulir Premis .</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0">
                <div class="card-body">
                    <form action="{{route('kasie.simpan.data.type-premi.baru')}}" method="POST">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="card border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="code_premi"> Code Premi *</label>
                                                <input type="text" name="code_premi" id="code_premi" value="0212"
                                                    readonly class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name"> Jenis Paket *</label>
                                                <input type="text" name="name" id="name" value="{{old('name')}}"
                                                    class="form-control" placeholder="Jenis paket...">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="premi1">Wilayah I *</label>
                                                <input type="number" name="premi_1" id="premi1"
                                                    value="{{old('premi_1')}}" class="form-control" placeholder="Rp.">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="premi2"> Wilayah II *</label>
                                                <input type="number" name="premi_2" id="premi2"
                                                    value="{{old('premi_2')}}" class="form-control" placeholder="Rp.">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="premi3">Wilayah III *</label>
                                                <input type="number" name="premi_3" id="premi3"
                                                    value="{{old('premi_3')}}" class="form-control" placeholder="Rp.">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cost"> Cost Premi *</label>
                                                <input type="number" name="cost_premi" id="cost"
                                                    value="{{old('cost_premi')}}" class="form-control"
                                                    placeholder="Rp.">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="price"> Harga Kendaraan *</label>
                                                <input type="number" name="price" id="price" value="{{old('price')}}"
                                                    class="form-control">

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="description">Description *</label>
                                                <textarea name="description" id="description" rows="10"
                                                    class="form-control">

                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="email" value="{{auth()->user()->email}}" id="">
                                    <div class="mt-3 mb-3">
                                        <button type="submit" class="btn btn-outline-info">
                                            tambah jenis premi
                                        </button>
                                        <a href="{{route('home')}}" class="btn btn-outline-danger">
                                            cancel
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection