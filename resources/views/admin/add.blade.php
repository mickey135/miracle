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
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>增加内容</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="">  
    {!!csrf_field()!!}
      <!-- leftside -->
      <div class="left" style="width:60%;float:left;">
            <div class="form-group">
              <div class="label">
                <label>标题：</label>
              </div>
              <div class="field">
                <input type="text" class="input w50" value="" name="title" data-validate="required:请输入标题" />
                <div class="tips"></div>
              </div>
            </div>
            <div class="form-group">
              <div class="label">
                <label>别名：</label>
              </div>
              <div class="field">
                <input type="text" class="input w50" value="" name="another_name"/>
                <div class="tips"></div>
              </div>
            </div>
            <div class="form-group">
              <div class="label">
                <label>年代：</label>
              </div>
              <div class="field">
                <input type="text" class="input w50" value="" name="time" data-validate="required:请输入年代如2017" />
                <div class="tips"></div>
              </div>
            </div>
              <div class="form-group">
                <div class="label">
                  <label>地区：</label>
                </div>
                <div class="field">
                      <select name="country" class="input w50">
                        @foreach($country as $v)
                          <option value="{{$v->country_id}}">{{$v->country}}</option>
                        @endforeach
                      </select>
                  <div class="tips"></div>
                </div>
              </div>
            <div class="form-group">
              <div class="label">
                <label>图片：</label>
              </div>
              <div class="field">
              <!-- style="display:none" -->
              <input type="file" id="btn_file" style="display:none">
                <input type="text" id="url1" name="img" class="input tips" style="width:25%; float:left;" />
<!--                 <input type="button" class="button bg-blue margin-left" id="image1" onclick="F_Open_dialog()" value="+ 浏览上传"  style="float:left;">
                <div class="tipss">图片尺寸：500*500</div> -->
              </div>
            </div>     
            
           <div class="form-group">
              <div class="label">
                <label>导演：</label>
              </div>
              <div class="field">
                <input type="text" class="input w50" value="" name="director" data-validate="required:请输入导演名" />
                <div class="tips"></div>
              </div>
            </div>
          <div class="form-group">
              <div class="label">
                <label>演员：</label>
              </div>
              <div class="field">
                <input type="text" class="input w50" value="" name="actor" 
                placeholder="请输入演员名用|隔开" data-validate="required:请输入演员名用|隔开" />               
              </div>
          </div>

      </div>
      <!-- rightside -->
      <div class="right" style="width:40%;float:left;">
        <div class="form-group">
          <h3><span>是否热门：</span></h3>
          <div class="field">
            <select name="is_hot" class="input w50">
              <option value="1">是</option>
              <option value="0">否</option>
            </select>
          </div>
        </div>
        <div class="form-group">
               <h3><span>电影类型</span></h3>
              <div class="field">
                  @foreach($type as $v)
                    <input type="checkbox" name="type[]" value="{{$v->type_id}}">{{$v->type}}</label>
                  @endforeach
              </div>
        </div>        
        <div class="form-group">
              <h3><span>剧情简介：</span></h3>
              <div class="field">
                <textarea class="input" name="intro" style=" height:90px;"></textarea>
                <div class="tips"></div>
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

      </div>

    </form>
  </div>
</div>

</body>
<script>
// var btn = document.getElementById('btn_file');
// var url1 = document.getElementById('url1');
// console.log(btn.name);
function F_Open_dialog() 
{ 
document.getElementById("btn_file").click(); 
}
</script> 
</html>