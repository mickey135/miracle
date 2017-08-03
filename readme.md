## test test

本项目使用 PHP 框架 Laravel 5.1.33 进行开发。 项目依赖了部分云服务，如图片使用了七牛云储存。（目前必须，暂时没有加入本地存储图片的功能）

### 项目功能具有以下功能

分类管理
文章管理
标签管理
评论管理
导航管理
Redis 缓存
<!-- 好用的 Simplemde Markdown 编辑器 -->

## 项目概述

* 项目名称：MyPersimmon
* 项目运行地址：https://cong5.net/

[MyPersimmon](https://github.com/Cong5/myPersimmon) 基于Laravel 5.4 版本开发。

## 目前运行环境

- Nginx 1.8+
- PHP 5.6+
- MySQL 5.5+
- Redis 3.0+

## 部署/安装

需要在系统上安装了基本的PHP运行环境、PHP包管理工具composer、Nodejs进行前端资源打包

### 基础安装

#### 1. 克隆源代码

克隆源代码到本地：

    > git clone https://github.com/Cong5/myPersimmon.git

#### 2. 安装扩展包依赖

    > composer install

#### 4. 生成配置文件

    > cp .env.example .env
    >运行 php artisan key:generate

#### 5. 执行数据库迁移

```shell
php artisan migrate
```

#### 6. 填充初始数据

```shell
php artisan db:seed
```
#### 7. 在centos中修改文件夹权限
- chmod -R 777 bootstrap
- chmod -R 777 storage

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
