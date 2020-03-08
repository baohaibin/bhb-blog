@extends('layouts.admin')
@section('title','分类列表')
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
                <li class="active">分类</li>
            </ol>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">分类</h1>
            </div>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body tabs">
                        <ul class="nav nav-pills">
                            <li class="active"><a href="#">分类列表</a></li>
                            <li><a href="{{ url('admin/type/create') }}">新增分类</a></li>
                        </ul>
                        <div class="tab-content">
                            <table data-toggle="table" >
                            <thead>
                            <tr>
                                <th data-align="center">ID</th>
                                <th>分类名</th>
                                <th>关键词</th>
                                <th>描述</th>
                                <th>状态</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            @foreach($typeList as $type)
                                <tr>
                                    <td>{{ $type->id }}</td>
                                    <td>{{ $type->name }}</td>
                                    <td>{{ $type->keywords }}</td>
                                    <td>{{ $type->description }}</td>
                                    <td>
                                        @if(is_null($type->deleted_at))
                                            √
                                        @else
                                            ×
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/type/edit', [$type->id]) }}">编辑</a>
                                        |
                                        @if($type->trashed())
                                            <a href="javascript:if(confirm('恢复?'))location.href='{{ url('admin/type/restore', [$type->id]) }}'">恢复</a>
                                            |
                                            <a href="javascript:if(confirm('彻底删除?'))location.href='{{ url('admin/type/forceDelete', [$type->id]) }}'">彻底删除</a>
                                        @else
                                            <a href="javascript:if(confirm('删除?'))location.href='{{ url('admin/type/destroy', [$type->id]) }}'">删除</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        </div>
                    </div>
                </div>
            </div>
    </div><!--/.row-->
    </div>
@endsection
