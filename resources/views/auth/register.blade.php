{!!print_r($errors)!!}
<!DOCTYPE html>
<html lang="en">
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
    <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>管理员注册</strong></div>
	<div class="body-content">
		<form action="" method="post" class="form-x">
		{!!csrf_field()!!}
			<div class="left" style="width:60%;float:left;">
				<div class="form-group">
	              <div class="label">
	                <label>用户名：</label>
	              </div>
			    <div class="field">
	                <input type="text" class="input w50" value="" name="name" data-validate="required:请输入用户名" />
	                <div class="tips"></div>
	            </div>
	            </div>
	            <div class="form-group">
	              <div class="label">
	                <label>邮箱：</label>
	              </div>
	              <div class="field">
	                <input type="text" class="input w50" value="" name="email"/>
	                <div class="tips"></div>
	              </div>
	            </div>
	            <div class="form-group">
	              <div class="label">
	                <label>密码：</label>
	              </div>
	              <div class="field">
	                <input type="text" class="input w50" value="" name="password"/>
	                <div class="tips"></div>
	              </div>
	            </div>
	            <div class="form-group">
	              <div class="label">
	                <label>确认密码：</label>
	              </div>
	              <div class="field">
	                <input type="text" class="input w50" value="" name="password_confirmation"/>
	                <div class="tips"></div>
	              </div>
	            </div>
		        <div class="form-group">
		          <div class="label">
		            <label></label>
		          </div>
		          <div class="field">
		            <input type="submit" class="button bg-main icon-check-square-o" >
		          </div>
		        </div>
	        </div>
		</form>
	</div>
</div>
</body>
</html>