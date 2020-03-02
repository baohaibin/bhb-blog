@extends('layouts.admin')

@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
                <li class="active">新增文章</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">新增文章</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-12">
                            <form role="form" action="{{ url('admin/article/store') }}" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>标题</label>
                                    <input name="title" class="form-control" placeholder="标题" value="{{ old('title') }}">
                                </div>
                                <div class="form-group">
                                    <label>分类</label>
                                    <select name="type_id" class="form-control">
                                        <option value="1">Option 1</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>作者</label>
                                    <input name="author" class="form-control" placeholder="作者" value="{{ old('author') }}">
                                </div>
                                <div class="form-group">
                                    <label>关键词</label>
                                    <input name="keywords" class="form-control" placeholder="英文逗号分割" value="{{ old('keywords') }}">
                                </div>
                                <div class="form-group">
                                    <label>封面图</label>
                                    <input name="cover" type="file">
                                </div>
                                <div class="form-group">
                                    <label>描述</label>
                                    <textarea name="description" class="form-control" rows="5" placeholder="关于文章的描述">{{ old('description') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>内容</label>
                                    <div id="md-content">
                                    <textarea name="markdown">{{ old('markdown') }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>置顶</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="is_top" id="optionsRadios1" value="1">是
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="is_top" id="optionsRadios2" value="0" checked>否
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">提交</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->
    </div>
@endsection
@section('js')
    <link rel="stylesheet" href="/lib/editormd/css/editormd.css" />
    <script src="/lib/editormd/editormd.min.js"></script>
    <script>
        var testEditor;

        $(function() {
            // You can custom @link base url.
            editormd.urls.atLinkBase = "https://github.com/";

            testEditor = editormd("md-content", {
                autoFocus : false,
                width     : "100%",
                height    : 720,
                toc       : true,
                //atLink    : false,    // disable @link
                //emailLink : false,    // disable email address auto link
                todoList  : true,
                placeholder: "",
                toolbarAutoFixed: false,
                path      : '/lib/editormd/lib/',
                emoji: true,
                toolbarIcons : ['undo', 'redo', 'bold', 'del', 'italic', 'quote', 'uppercase', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'list-ul', 'list-ol', 'hr', 'link', 'reference-link', 'image', 'code', 'code-block', 'table', 'emoji', 'html-entities', 'watch', 'preview', 'search', 'fullscreen'],
                imageUpload: true,
                imageUploadURL : '{{ url('admin/article/uploadImage') }}',
            });
        });
    </script>
@endsection
