<div class="col-sm-12">
    <h4>{{trans('back.manage-translation')}}</h4>
    <hr/>
    <ul class="nav nav-tabs">
        @foreach($data['files'] as $fl)
            @if($fl !='.' && $fl !='..' && $fl !='info.json')
                <li @if($data['file'] == $fl) class="active" @endif>
                    <a onclick="PomaModal(this.href, 'Edit Translation');return false;" href="{{url('pages/config/edittranslation?edit='.$data['lang'].'&file='.$fl)}}">{{$fl}}</a>
                </li>
            @endif
        @endforeach
    </ul>
</div>
<div class="row">
    <div class="col-sm-10" style="margin:0 0 0 40px;">
        {!! Form::open(['method' => 'post', 'url' => 'pages/config/savetranslation', 'class' => 'form-horizontal', 'files' => true]) !!}

        <div class="form-group">
            <label for="site_title">{{trans('back.site-title')}}</label>
            {!! Form::text('site_title', $cur_lang->site_title, ['class' => 'form-control', 'placeholder' => 'Enter Site Title']) !!}
        </div>
        <div class="form-group">
            <label for="site_description">{{trans('back.site-description')}}</label>
            {!! Form::text('site_description', $cur_lang->site_description, ['class' => 'form-control', 'placeholder' => 'Enter Site Description']) !!}
        </div>
        <div class="form-group">
            <label for="site_keywords">{{trans('back.site-keywords')}}</label>
            {!! Form::text('site_keywords', $cur_lang->site_keywords, ['class' => 'form-control', 'placeholder' => 'Enter Site Keywords']) !!}

        </div>

        <div class="form-group">
            <label for="flag" class="control-label col-md-2 text-right">{{trans('back.language-flag')}}</label>
            <div class="col-sm-4">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail">
                        @if($cur_lang->flag =='')
                            <img src="http://www.placehold.it/16x21/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
                        @else
                            <img src="{{url($cur_lang->flag)}}" alt="{{$cur_lang->name}}">
                        @endif

                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
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

        <div class="row">
            <div class="col-lg-12">
                {{--<h2>Contextual Classes</h2>--}}
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>{{trans('back.parse')}}</th>
                            <th>{{trans('back.translate')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data['stringLangs'] as $key => $val)
                            @if(!is_array($val))
                                <tr>
                                    <td>{{$key}}</td>
                                    <td><input type="text" name="{{$key}}" value="{{$val}}" class="form-control"></td>
                                </tr>
                            @else
                                @foreach($val as $k => $v)
                                    <tr>
                                        <td>{{$k}}</td>
                                        <td><input type="text" name="{{$k}}" value="{{$v}}" class="form-control"></td>
                                    </tr>
                                @endforeach
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{--<div class="form-group">--}}
        {{--<label for="flag">Language Flag</label>--}}
        {{--<input type="file" name="flag">--}}
        {{--<p>Lütfen 16X16 imageler kullanınız !</p>--}}
        {{--</div>--}}

        <div class="form-group">
            <input type="hidden" name="file" value="{{$data['file']}}">
            <input type="hidden" name="lang" value="{{$data['lang']}}">
            <button type="submit" class="btn btn-primary">{{trans('back.save-changes')}}</button>
        </div>
        {!! Form::close() !!}
    </div>
</div>




