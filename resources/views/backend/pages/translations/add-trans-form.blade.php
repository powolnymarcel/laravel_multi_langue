<div class="row">
    <div class="col-sm-10" style="margin:0 0 0 40px;">
        {!! Form::open(['method' => 'post', 'url' => 'pages/config/addtranslation', 'class' => 'form-horizontal', 'files' => true]) !!}
        <div class="form-group">
            <label for="name">{{trans('back.language-name')}}</label>
            {!! Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter Language Name']) !!}
        </div>
        <div class="form-group">
            <label for="folder">{{trans('back.folder')}}</label>
            {!! Form::text('folder', '', ['class' => 'form-control', 'placeholder' => 'Enter Language File Name']) !!}
        </div>
        <div class="form-group">
            <label for="author">{{trans('back.author-name')}}</label>
            {!! Form::text('author', '', ['class' => 'form-control', 'placeholder' => 'Enter Author Name']) !!}
        </div>
        <div class="form-group">
            <label for="site_title">{{trans('back.site-title')}}</label>
            {!! Form::text('site_title', '', ['class' => 'form-control', 'placeholder' => 'Enter Site Title']) !!}
        </div>
        <div class="form-group">
            <label for="site_description">{{trans('back.site-description')}}</label>
            {!! Form::text('site_description', '', ['class' => 'form-control', 'placeholder' => 'Enter Site Description']) !!}
        </div>
        <div class="form-group">
            <label for="site_keywords">{{trans('back.site-keywords')}}</label>
            {!! Form::text('site_keywords', '', ['class' => 'form-control', 'placeholder' => 'Enter Site Keywords']) !!}

        </div>

        <div class="form-group">
            <label for="flag" class="control-label col-md-2 text-right">{{trans('back.language-flag')}}</label>
            <div class="col-sm-4">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail">
                        <img src="http://www.placehold.it/16x21/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail">

                    </div>
                    <div>
                        <span class="btn btn-primary btn-file">
                            <span class="fileinput-new">
                                {{trans('back.select-image')}}
                            </span>
                            <span class="fileinput-exists">
                                {{trans('back.change')}}
                            </span>
                            <input type="file" name="flag">
                        </span>
                        <a href="javascript:" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">{{trans('back.remove')}}</a>
                    </div>
                </div>
            </div>
        </div>

        {{--<div class="form-group">--}}
        {{--<label for="flag">Language Flag</label>--}}
        {{--<input type="file" name="flag">--}}
        {{--<p>Lütfen 16X16 imageler kullanınız !</p>--}}
        {{--</div>--}}

        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{trans('back.save-translation')}}</button>
            <button type="submit" class="btn btn-default">{{trans('back.reset')}}</button>
        </div>
        {!! Form::close() !!}
    </div>
</div>




