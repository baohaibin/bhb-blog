@extends('layouts.admin')
@section('title', '文章管理')
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
                <li class="active">标签</li>
            </ol>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">标签</h1>
            </div>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body tabs">
                        <ul class="nav nav-pills">
                            <li class="active"><a href="#">标签列表</a></li>
                            <li><a href="{{ url('admin/tag/create') }}">新增标签</a></li>
                        </ul>
                        <div class="tab-content">
                            <table data-toggle="table" >
                            <thead>
                            <tr>
                                <th data-align="center">ID</th>
                                <th>标签名</th>
                                <th>关键字</th>
                                <th>描述</th>
                                <th>状态</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            @foreach($tagList as $tag)
                                <tr>
                                    <td>{{ $tag->id }}</td>
                                    <td>{{ $tag->name }}</td>
                                    <td>{{ $tag->keywords }}</td>
                                    <td>{{ $tag->description }}</td>
                                    <td>
                                        @if(is_null($tag->deleted_at))
                                            √
                                        @else
                                            ×
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/tag/edit', [$tag->id]) }}">编辑</a>
                                        |
                                        @if($tag->trashed())
                                            <a href="javascript:if(confirm('恢复?'))location.href='{{ url('admin/tag/restore', [$tag->id]) }}'">恢复</a>
                                            |
                                            <a href="javascript:if(confirm('彻底删除?'))location.href='{{ url('admin/tag/forceDelete', [$tag->id]) }}'">彻底删除</a>
                                        @else
                                            <a href="javascript:if(confirm('删除?'))location.href='{{ url('admin/tag/destroy', [$tag->id]) }}'">删除</a>
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
