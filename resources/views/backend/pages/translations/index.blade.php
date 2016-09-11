@extends('backend.master')
@section('content')
        <!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Translations page
            <small>Translations</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="{{url('/admin')}}">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i>  Add or manage translation page
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="col-sm-3">
            <a onclick="PomaModal(this.href, 'Add New Translation');return false;"
               href="{{url('/pages/config/addtranslation')}}"
               class="btn btn-primary"><i class="fa fa-plus-circle"> ADD</i>
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <h2>{{trans('back.translations-lists')}}</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                    <th>{{trans('back.no')}}</th>
                    <th>{{trans('back.name')}}</th>
                    <th>{{trans('back.flag')}}</th>
                    <th>{{trans('back.folder')}}</th>
                    <th>{{trans('back.actions')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach(SiteHelpers::languageOption() as $key => $lang)
                    <tr class="active">
                        <td>{{$key + 1 }}</td>
                        <td>{{$lang['name']}}</td>
                        <td><img src="{{url(language_flag($lang['folder']))}}" alt=""></td>
                        <td>{{$lang['folder']}}</td>
                        <td>
                            <a onclick="PomaModal(this.href, 'Edit Translation');return false;"
                               href="{{url('pages/config/edittranslation?edit='.$lang['folder'])}}"
                               class="btn btn-sm btn-primary"
                            >
                                {{trans('back.edit')}}
                            </a>
                            @if($lang['folder'] != 'en')
                                <?php
                                $deleteFolder = $lang['folder'];
                                echo "<a onclick='PomaConfirmDelete(\"/pages/config/removetranslation/$deleteFolder\")' href='javascript:' class='btn btn-sm btn-danger'>"; echo trans('back.delete');"</a>";
                                ?>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
<!-- /.row -->
@endsection

@section('css')
    <link rel="stylesheet" href="{{url('jasny-bootstrap/css/jasny-bootstrap.min.css')}}">
@endsection

@section('js')
    <script src="{{url('jasny-bootstrap/js/jasny-bootstrap.min.js')}}"></script>
@endsection

@section('scripts')
    @include('flash')

@stop