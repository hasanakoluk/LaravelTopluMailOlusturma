@extends('masters')
@section('title')
    Mail Oluşturma  Toplu E-Mail Islemleri
@endsection

@section('css')

@endsection
@section('main')

    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Yeni Mail</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{route('index')}}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Yeni Mail</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <!--end breadcrumb-->
            <div class="row">
                <div class="col">
                    @if($errors->any())
                        @foreach($errors->all() as $hatalar)
                            <div class="alert alert-danger">{{$hatalar}}</div>
                        @endforeach
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                    <form action="{{route('mail-olustur-post')}}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <h6 class="mb-0 text-uppercase">Yeni Mail</h6>
                                <hr/>
                                <input class="form-control form-control-lg mb-3" type="text" name="baslik" placeholder="Mail Konusu" >
                                <textarea id="mytextarea" name="metin"></textarea>
                                <input class="form-control form-control-lg mb-3" type="text" name="tema" placeholder="Dip Not" >
                                <input class="btn btn-success btn-sm mb-3" type="submit" name="ilet" value="Yeni Mail Oluştur">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
    <!--end page wrapper -->

@endsection
@section('js')
    <script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js' referrerpolicy="origin">
    </script>
    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>
@endsection
