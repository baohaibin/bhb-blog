@extends('layouts.admin')
@section('title','新增分类')
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
                <li class="active">新增导航</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">导航分类</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body tabs">
                        <ul class="nav nav-pills">
                            <li><a href="{{ url('admin/nav/index') }}">导航列表</a></li>
                            <li class="active"><a href="#">新增导航</a></li>
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
                                <form role="form" action="{{ url('admin/nav/store') }}" method="post">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label>导航名</label>
                                        <input name="name" class="form-control" placeholder="分类名" value="{{ old('name') }}">
                                    </div>
                                    <div class="form-group">
                                        <label>地址</label>
                                        <input name="url" class="form-control" placeholder="导航地址" value="{{ old('url') }}">
                                    </div>
                                    <div class="form-group">
                                        <label>排序</label>
                                        <input name="sort" class="form-control" placeholder="排序" value="{{ old('sort') }}">
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
