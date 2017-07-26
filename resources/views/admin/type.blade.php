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
<div class="panel admin-panel">
  <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div>
  <div class="padding border-bottom">
    <button type="button" class="button border-yellow" onclick="window.location.href='#add'"><span class="icon-plus-square-o"></span> 添加分类</button>
  </div>
  <table class="table table-hover text-center">
    <tr>
      <th width="5%">ID</th>
      <th width="15%">类型</th>
      <th width="10%">电影数量</th>
      <th width="10%">操作</th>
    </tr>
    @foreach($type as $v)
    <tr>
      <td>{{$v->type_id}}</td>
      <td>{{$v->type}}</td>
      <td>{{$v->num}}</td>
      <td><div class="button-group"> <a class="button border-main" href="{{url('admin/catedit',['cat_id'=>$v->cat_id])}}"><span class="icon-edit"></span> 修改</a> <a class="button border-red" href="{{url('admin/catdel',['cat_id'=>$v->cat_id])}}" onclick="return del(1,2)"><span class="icon-trash-o"></span> 删除</a> </div></td>
    </tr>
   @endforeach
  </table>
</div>
<script type="text/javascript">
function del(id,mid){
  var r=confirm('确定要删除吗');
  if(r){
      alert('删除成功');
      return true;
  }else{
     alert('删除失败');
     return false;
  }
}
</script>
<div class="panel admin-panel margin-top">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>添加内容</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="">
    {!!csrf_field()!!}

<!--       <div class="form-group">
        <div class="label">
          <label>上级分类：</label>
        </div>
        <div class="field">
          <select name="pid" class="input w50">
            <option value="">请选择分类</option>
            <option value="">产品分类</option>
            <option value="">产品分类</option>
            <option value="">产品分类</option>
            <option value="">产品分类</option>
          </select>
          <div class="tips">不选择上级分类默认为一级分类</div>
        </div>
      </div> -->

      <div class="form-group">
        <div class="label">
          <label>分类标题：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="title" />
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