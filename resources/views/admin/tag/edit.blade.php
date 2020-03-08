@extends('layouts.admin')
@section('title','新增分类')
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
                <li class="active">更新标签</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">更新标签</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body tabs">
                        <ul class="nav nav-pills">
                            <li><a href="{{ url('admin/tag/index') }}">标签列表</a></li>
                            <li class="active"><a href="#">更新标签</a></li>
                        </ul>


                        <div class="tab-content">
                            <div class="col-md-12">
                                @if (count($errors) > 0)
                                    @foreach ($errors->all() as $error)
                                        <div class="alert bg-warning" role="alert">
                                            <span class="glyphicon glyphicon-warning-sign"></span>{{ $error }}<a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                                        </div>
                                    @endforeach
                                @endif
                                <form role="form" action="{{ url('admin/tag/update',[$tag->id]) }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label>标签名</label>
                                        <input name="name" class="form-control" placeholder="标签名" value="{{ $tag->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label>关键词</label>
                                        <input name="keywords" class="form-control" placeholder="英文逗号分割" value="{{ $tag->keywords }}">
                                    </div>
                                    <div class="form-group">
                                        <label>描述</label>
                                        <input name="description" class="form-control" placeholder="描述" value="{{ $tag->description }}">
                                    </div>
                                    <button type="submit" class="btn btn-primary">提交</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->
    </div>
@endsection
