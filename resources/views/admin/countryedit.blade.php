<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
<link rel="stylesheet" href="/css/admin/pintuer.css">
<link rel="stylesheet" href="/css/admin/admin.css">
<script src="/js/admin/jquery.js"></script>
<script src="/js/admin/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel margin-top">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>修改分类</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="">
    {!!csrf_field()!!}        
      <div class="form-group">
        <div class="label">
          <label>地区标题：</label>
        </div>

        <div class="field">
          <input type="text" class="input w50" name="title" value="{{$country->country}}" />
            @if(Session::has('msg'))
              <div class="tips">
                <p style="color:red;">{{ Session::get('msg')}}</p>
              </div>
            @endif
        </div>

      </div>        
      
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>
</body>
</html>