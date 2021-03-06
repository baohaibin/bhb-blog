@extends('layouts.admin')
@section('title', '文章管理')
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
                <li class="active">文章</li>
            </ol>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">文章</h1>
            </div>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body tabs">
                        <ul class="nav nav-pills">
                            <li class="active"><a href="#">文章列表</a></li>
                            <li><a href="{{ url('admin/article/create') }}">新增文章</a></li>
                        </ul>
                        <div class="tab-content">
                            <table data-toggle="table" >
                            <thead>
                            <tr>
                                <th data-align="center">ID</th>
                                <th>标题</th>
                                <th>分类</th>
                                <th>点击数</th>
                                <th>状态</th>
                                <th>创建时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            @foreach($articleList as $article)
                                <tr>
                                    <td>{{ $article->id }}</td>
                                    <td>{{ $article->title }}</td>
                                    <td>{{ $article->type->name }}</td>
                                    <td>{{ $article->click }}</td>
                                    <td>
                                        @if(is_null($article->deleted_at))
                                            √
                                        @else
                                            ×
                                        @endif
                                    </td>
                                    <td>{{ $article->created_at }}</td>
                                    <td>
                                        <a href="{{ url('admin/article/edit', [$article->id]) }}">编辑</a>
                                        |
                                        @if($article->trashed())
                                            <a href="javascript:if(confirm('恢复?'))location.href='{{ url('admin/article/restore', [$article->id]) }}'">恢复</a>
                                            |
                                            <a href="javascript:if(confirm('彻底删除?'))location.href='{{ url('admin/article/forceDelete', [$article->id]) }}'">彻底删除</a>
                                        @else
                                            <a href="javascript:if(confirm('删除?'))location.href='{{ url('admin/article/destroy', [$article->id]) }}'">删除</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                            {{$articleList -> links()}}
                        </div>
                    </div>
                </div>
            </div>
    </div><!--/.row-->
    </div>
@endsection
