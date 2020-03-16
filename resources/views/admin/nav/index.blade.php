@extends('layouts.admin')
@section('title','列表')
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
                <li class="active">导航</li>
            </ol>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">导航</h1>
            </div>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body tabs">
                        <ul class="nav nav-pills">
                            <li class="active"><a href="#">导航列表</a></li>
                            <li><a href="{{ url('admin/nav/create') }}">新增导航</a></li>
                        </ul>
                        <div class="tab-content">
                            <table data-toggle="table" >
                            <thead>
                            <tr>
                                <th data-align="center">ID</th>
                                <th>导航名</th>
                                <th>地址</th>
                                <th>状态</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            @foreach($navList as $nav)
                                <tr>
                                    <td>{{ $nav->id }}</td>
                                    <td>{{ $nav->name }}</td>
                                    <td>{{ $nav->url }}</td>
                                    <td>
                                        @if(is_null($nav->deleted_at))
                                            √
                                        @else
                                            ×
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/nav/edit', [$nav->id]) }}">编辑</a>
                                        |
                                        @if($nav->trashed())
                                            <a href="javascript:if(confirm('恢复?'))location.href='{{ url('admin/nav/restore', [$nav->id]) }}'">恢复</a>
                                            |
                                            <a href="javascript:if(confirm('彻底删除?'))location.href='{{ url('admin/nav/forceDelete', [$nav->id]) }}'">彻底删除</a>
                                        @else
                                            <a href="javascript:if(confirm('删除?'))location.href='{{ url('admin/nav/destroy', [$nav->id]) }}'">删除</a>
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
