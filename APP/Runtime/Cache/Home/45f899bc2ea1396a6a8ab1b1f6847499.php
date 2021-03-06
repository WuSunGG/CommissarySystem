<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">-->
    <title>孙武的主页</title>
    <meta name="keywords" content="孙武，个人博客，孙武的主页，孙武个人主页，财大，免费VIP视频，贵州财经大学,作业提交系统" />
    <meta name="description" content="本网站是孙武的个人主页，提供学习使用" />
    <meta name="robots" content="all" />

    <link rel="shortcut icon" href="icon.png">
    <link rel="stylesheet" href="<?php echo (C("BOOTSTRAP_CSS_URL")); ?>bootstrap.css">
    <script src="<?php echo (C("BOOTSTRAP_JS_URL")); ?>jquery.min.js"></script>
    <script src="<?php echo (C("BOOTSTRAP_JS_URL")); ?>bootstrap.js"></script>
    <script src="<?php echo (C("HOME_JS_URL")); ?>sw.js"></script>
    <style>
        .my-title {
            float: left;
        }

        .s-head {
            font-size: 88px;
            padding: 10px;
        }

        .user-info {
            padding-left: 30px;
            margin: 10px;
            font-size: 15px;
            min-width: 354px;
        }

        .work-info {
            padding-left: 30px;
            margin: 10px;
            font-size: 16px;
        }

        .un-upload-span {
            display: block;
            padding: 5px;
            margin: 5px 10px;
            float: left;
            /*font-size: 18px;*/
            /*border: 1px solid blue;*/
        }

        .un-upload-div, .uploaded-div {
            border-top: none;
            min-width: 888px;
        }

        .work-nav {
            width: 100%;
            min-width: 888px;
            float: left;
            font-size: 18px;
        }

        .work-nav div {
            float: right;
        }

        .open-file-btn {
            font-size: 44px;
        }

        .file_info {
            padding-left: 20px;
            font-size: 20px;
        }

        #upFileBox {
            margin-top: 88px;
        }

        .user-info-div {
            min-width: 888px;
        }

        .vip_parse_box {
            min-width: 888px;
        }

        #footer {
            clear: both;
            font: 12px/24px Arial !important;
            margin: 0px auto;
            width: 100%;
            color: #333;
            text-align: center;
            padding-top: 0px;
            text-decoration: none;
            padding-bottom: 60px;
            background: #fff;
        }

        #footer .a2 {
            min-width: 1000px;
            margin: 0px auto;
            border-top: 1px solid #eee;
            text-align: center;
            color: #666;
            font: 12px/24px Arial !important;
            word-spacing: 6px;
            padding-top: 30px;
            background: #fff;
        }
    </style>
</head>
<body>
<div class="container" style="min-width: 918px;">
    <!--头部 用户处理部分-->
    <div class="head_container">
        <!--导航-->
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#inverseNavbar1">
                    <span class="sr-only"></span><span class="icon-bar"></span>
                    <span class="icon-bar"></span><span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="javascript:void(0)">
                    <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                </a>
            </div>
            <div class="collapse navbar-collapse" id="inverseNavbar1">
                <ul class="nav navbar-nav">
                    <li><a href='javascript:void(0)' onclick="show_upwork()">交作业</a></li>
                    <li><a href="javascript:void(0)" onclick="show_vipparse()">VIP解析</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <?php if(session('user_name') != ''): ?><!--用户已登陆-->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true"
                               aria-expanded="false">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span><?php echo (session('user_name')); ?><span
                                    class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#" data-toggle="modal" data-target="#modify">信息修改</a></li>
                                <!--<li><a href="#" data-toggle="modal" data-target="#modify-pwd">修改密码</a></li>-->
                                <li><a href="#" data-toggle="modal" data-target="#login">切换用户</a></li>
                                <li><a href="<?php echo U('User/logout');?>">退出系统</a></li>
                            </ul>
                        </li>
                        <?php else: ?>
                        <!--没有登陆-->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true"
                               aria-expanded="false">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>个人中心<span
                                    class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li><a id="loginTragger" href="#" data-toggle="modal" data-target="#login">登陆</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#register">注册</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#find-pwd">忘记密码</a></li>
                            </ul>
                        </li><?php endif; ?>


                </ul>
            </div>

            <script>
                /*注册表单获取*/
                function getRegisterPage() {
                    $.ajax({
                        url: "<?php echo U('User/register');?>",
//                        data: {"pics_id": pics_id},
                        //dataType:,
                        //type:,
                        success: function (msg) {
                            alert(msg);
                        }
                    });
                }
            </script>
        </nav>

        <!--登陆登陆-->
        <div class="login-div">
            <form action="<?php echo U('User/login');?>" method="post">
                <div id="login" class="modal fade   " tabindex="-1" role="dialog">
                    <div class="modal-dialog    " role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">用户登陆</h4>
                            </div>
                            <div class="modal-body">
                                <div id="login_username">
                                    <!--用户名-->
                                    <label class="sr-only" for="login_username_input">Input with help text</label>
                                    <input name="login_username" placeholder="学号/邮箱" type="text"
                                           id="login_username_input" class="form-control"
                                           aria-describedby="login_usernameHelpBlock">
                                    <span id="login_usernameHelpBlock" class="help-block">注册时所用的学号 邮箱</span>
                                </div>
                                <div id="login_pwd">
                                    <!--密码-->
                                    <label class="sr-only" for="login_pwd_input">Input with help text</label>
                                    <input name="login_pwd" placeholder="密码" type="password" id="login_pwd_input"
                                           class="form-control"
                                           aria-describedby="login_pwdhelpBlock">
                                    <span id="login_pwdhelpBlock" class="help-block">注册时所用的密码</span>
                                </div>


                            </div>
                            <div class="modal-footer">
                                <input style="width: 40%" type="submit" class="btn btn-primary" value="登陆">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!--登陆模块处理-->
            <script>
                function change_stat() {
                    inputStateSuccess("login_username");
                    inputStateError('login_pwd', "用户名或者密码错误");
                    verifyStateError('login_verify');

                }


            </script>
        </div>

        <!--注册处理-->
        <div class="register-div">
            <form id="register_form" action="<?php echo U('User/register');?>" method="post">
                <input type="hidden" name="type" value="register">
                <div id="register" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">用户注册</h4>
                            </div>
                            <div class="modal-body">
                                <div id="register-email">
                                    <!--邮箱-->
                                    <label class="sr-only" for="registerUsername">Input with help text</label>
                                    <input onchange="register_check_email(this);" name="register_email" placeholder="邮箱"
                                           type="text" id="registerUsername" class="form-control"
                                           aria-describedby="uregisterUsernameHelpBlock">
                                    <span id="registerUsernameHelpBlock" class="help-block">用于激活账号/找回密码 </span>
                                </div>
                                <div id="register-stu_num">
                                    <!--学号-->
                                    <label class="sr-only" for="registerNo">Input with help text</label>
                                    <input onchange="register_check_stu_num(this);" name="register_stu_no"
                                           placeholder="学号" type="text" id="registerNo" class="form-control"
                                           aria-describedby="registerNoHelpBlock">
                                    <span id="registerNoHelpBlock" class="help-block">用于作业自动命名  (如果填错或不填,提交作业将出错)</span>
                                </div>
                                <div id="register-name">
                                    <!--姓名-->
                                    <label class="sr-only" for="registerName">Input with help text</label>
                                    <input onchange="register_check_name(this)" name="register_name" placeholder="姓名"
                                           type="text" id="registerName" class="form-control"
                                           aria-describedby="registerNameHelpBlock">
                                    <span id="registerNameHelpBlock"
                                          class="help-block">用于作业自动命名  (如果填错或不填,提交作业将出错)</span>
                                </div>
                                <div id="register-pwd1">
                                    <!--密码-->
                                    <label class="sr-only" for="registerPwd1">Input with help text</label>
                                    <input onchange="register_check_pwd()" name="register_pwd1" placeholder="密码" type="password" id="registerPwd1"
                                           class="form-control"
                                           aria-describedby="registerPwd1HelpBlock">
                                    <span id="registerPwd1HelpBlock" class="help-block"> </span>
                                </div>
                                <div id="register-pwd2">
                                    <!--确认密码-->
                                    <label class="sr-only" for="registerPwd2">Input with help text</label>
                                    <input onchange="register_check_pwd()" name="register_pwd2" placeholder="确认密码"
                                           type="password" id="registerPwd2" class="form-control"
                                           aria-describedby="registerPwd2HelpBlock">
                                    <span id="registerPwd2HelpBlock" class="help-block"></span>
                                </div>

                                <!--验证码处理-->
                                <table>
                                    <tr>
                                        <td width="20%">
                                            <img height="35px"
                                                 onclick="this.src='/index.php/Home/User/verifyImg/rand/'+Math.random()"
                                                 src="<?php echo U('User/verifyImg');?>" alt="验证码,点击更换">
                                        </td>
                                        <td width="5%"></td>
                                        <td>
                                            <div id="register_verify">
                                                <label class="sr-only" for="register_verify_input">Input with help
                                                    text</label>
                                                <input onkeyup="register_check_verify(this)" name="register_verify"
                                                       placeholder="验证码" type="text" id="register_verify_input"
                                                       class="form-control" aria-describedby="register_verifyhelpBlock">
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <input style="width: 20%" type="reset" class="btn btn-default" value="重设表单">
                                <input style="width: 40%" type="submit" class="btn btn-primary" value="注册">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!--表单提交ajax处理-->
            <script>
                var f1 = false;

                /*注册检查邮箱*/
                function register_check_email(obj) {
                    var id = $(obj).parent().attr('id');
                    $(obj).focus(function () {
                        inputReset(id);
                    });
                    var email = $(obj).val();
                    $.ajax({
                        url: "<?php echo U('User/registerCheckEmail');?>",
                        data: {"email": email},
                        dataType: 'json',
                        type: 'get',
                        success: function (msg) {
                            if (msg.state == '1') {
                                /*邮箱可用*/
                                inputStateSuccess("register-email");
                                f1 = true;
                            } else {
                                /*邮箱不可用*/
                                inputStateError('register-email', msg.stateMsg);
                                f1 = false;
                            }
                        }
                    });
                }

                var f2 = false;

                /*注册检查学号*/
                function register_check_stu_num(obj) {

                    var email = $(obj).val();
                    var id = $(obj).parent().attr('id');
                    $(obj).focus(function () {
                        inputReset(id);
                    });
                    $.ajax({
                        url: "<?php echo U('User/registerCheckStuNum');?>",
                        data: {"email": email},
                        dataType: 'json',
                        type: 'get',
                        success: function (msg) {
                            if (msg.state == '1') {
                                /*可用*/
                                inputStateSuccess(id);
                                f2 = true;
                            } else {
                                /*不可用*/
                                inputStateError(id, msg.stateMsg);
                                f2 = false;
                            }
                        }
                    });
                }

                var f3 = false;

                /*检查姓名*/
                function register_check_name(obj) {
                    var id = $(obj).parent().attr('id');
                    $(obj).focus(function () {
                        inputReset(id);
                    });

                    var name = $(obj).val();
                    if (name.length >= 2) {
                        /*可用*/
                        inputStateSuccess(id);
                        f3 = true;
                    } else {
                        /*不可用*/
                        inputStateError(id, "姓名错误");
                        f3 = false;
                    }

                }


                var f4 = false;

                function register_check_pwd() {
                    var pwd1 = $("input[name='register_pwd1']").val();
                    var pwd2 = $("input[name='register_pwd2']").val();
                    if (pwd1 == pwd2) {
                        inputStateSuccess("register-pwd1");
                        inputStateSuccess("register-pwd2");
                        f4 = true;

                    } else {
                        inputStateError("register-pwd1", "两次输入的密码不一致");
                        inputStateError("register-pwd2", "两次输入的密码不一致");
                        f4 = false;
                    }
                }


                var f5 = false;

                /*注册检查验证码*/
                function register_check_verify(obj) {
                    var id = $(obj).parent().attr('id');
                    var val = $(obj).val();
                    if (val.length == 4) {
                        verifyReset(id);
                        $.ajax({
                            url: "<?php echo U('User/registerCheckVerify');?>",
                            data: {"verify": val},
                            dataType: 'json',
                            type: 'get',
                            success: function (msg) {
                                if (msg.state == '1') {
                                    /*可用*/
                                    verifyStateSuccess(id);
                                    f5 = true;
                                } else {
                                    /*不可用*/
                                    verifyStateError(id);
                                    f5 = false;
                                }
                            }
                        });
                    }
                }

                $("#register_form").submit(function (evt) {
                    if (!(f1 && f2 && f3 && f4 && f5)) {
                        evt.preventDefault();
                    }
                });
            </script>
        </div>

        <!--信息修改理模块-->
        <div class="modify-div">
            <form action="<?php echo U('User/modifyUserInfo');?>" method="post">
                <input type="hidden" name="stu_num" value="<?php echo (session('user_stu_num')); ?>">
                <div id="modify" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">用户信息修改</h4>
                            </div>
                            <div class="modal-body">
                                <div id="modify-username">
                                    <!--用户名-->
                                    <label class="" for="modifyUsername">邮箱:</label>
                                    <input name="email" value="<?php echo (session('user_email')); ?>" disabled placeholder="邮箱"
                                           type="text"
                                           id="modifyUsername" class="form-control"
                                           aria-describedby="umodifyUsernameHelpBlock">
                                    <span class="sr-only" id="modifyUsernameHelpBlock"
                                          class="help-block">用于激活账号/找回密码 </span>
                                </div>
                                <div id="modify-No">
                                    <!--学号-->
                                    <label for="modifyNo">学号:</label>
                                    <input disabled value="<?php echo (session('user_stu_num')); ?>" name="stu_no" placeholder="学号"
                                           type="text" id="modifyNo" class="form-control"
                                           aria-describedby="modifyNoHelpBlock">
                                    <span class="sr-only" id="modifyNoHelpBlock" class="help-block">用于作业自动命名  (如果填错或不填,提交作业将出错)</span>
                                </div>
                                <div id="modify-name">
                                    <!--姓名-->
                                    <label class="" for="modifyName">姓名:</label>
                                    <input value="<?php echo (session('user_name')); ?>" name="name" placeholder="姓名" type="text"
                                           id="modifyName" class="form-control"
                                           aria-describedby="modifyNameHelpBlock">
                                    <span class="sr-only" id="modifyNameHelpBlock" class="help-block">用于作业自动命名  (如果填错或不填,提交作业将出错)</span>
                                </div>

                                <br>
                            </div>
                            <div class="modal-footer">
                                <input style="width: 40%" type="submit" class="btn btn-primary" value="修改">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!--密码修改处理模块-->
        <div class="modify-pwd-div">
            <form action="/index.php/Home/UpWork/index.html" method="post">
                <input type="hidden" name="type" value="modify_pwd">
                <div id="modify-pwd" class="modal fade   " tabindex="-1" role="dialog">
                    <div class="modal-dialog    " role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">密码修改</h4>
                            </div>
                            <div class="modal-body">
                                <div id="modify_pwd_username">
                                    <!--旧密码-->
                                    <label class="sr-only" for="modify_pwd_username_input">Input with help text</label>
                                    <input name="old_pwd" placeholder="旧密码" type="text" id="modify_pwd_username_input"
                                           class="form-control"
                                           aria-describedby="modify_pwd_usernameHelpBlock">
                                    <span id="modify_pwd_usernameHelpBlock"
                                          class="help-block sr-only">注册时所用的学号 邮箱</span>
                                </div>
                                <br>
                                <div id="modify_pwd_pwd">
                                    <!--密码-->
                                    <label class="sr-only" for="modify_pwd_pwd_input">Input with help text</label>
                                    <input name="pwd1" placeholder="新密码" type="text" id="modify_pwd_pwd_input"
                                           class="form-control"
                                           aria-describedby="modify_pwd_pwdhelpBlock">
                                    <span id="modify_pwd_pwdhelpBlock" class="help-block sr-only">注册时所用的密码</span>
                                </div>
                                <br>
                                <div id="modify_pwd_pwd1">
                                    <!--密码-->
                                    <label class="sr-only" for="modify_pwd_pwd_input1">Input with help text</label>
                                    <input name="pwd2" placeholder="确认密码" type="text" id="modify_pwd_pwd_input1"
                                           class="form-control"
                                           aria-describedby="modify_pwd_pwdhelpBlock">
                                    <span id="modify_pwd_pwdhelpBlock1" class="help-block sr-only">注册时所用的密码</span>
                                </div>
                                <br>
                                <!--验证码处理-->
                                <table>
                                    <tr>
                                        <td width="20%"><img height="35px" src="<?php echo (C("HOME_IMG_URL")); ?>verify.png"
                                                             alt="验证码,点击更换"></td>
                                        <td>
                                            <div id="modify_pwd_verify">
                                                <label class="sr-only" for="modify_pwd_verify_input">Input with help
                                                    text</label>
                                                <input name="verify" placeholder="验证码" type="text"
                                                       id="modify_pwd_verify_input"
                                                       class="form-control"
                                                       aria-describedby="modify_pwd_verifyhelpBlock">
                                            </div>
                                        </td>
                                    </tr>
                                </table>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary">登陆</input>
                                <button onclick="change_stat()" type="button" class="btn btn-primary">change</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!--登陆模块处理-->
            <script>
                function change_stat() {
                    inputStateSuccess("modify_pwd_username");
                    inputStateError('modify_pwd_pwd', "用户名或者密码错误");
                    verifyStateError('modify_pwd_verify');

                }


            </script>
        </div>

        <!--密码找回处理模块-->
        <div class="find-pwd-div">
            <form id="find_form" action="<?php echo U('User/reset');?>" method="post">
                <input type="hidden" name="type" value="find_pwd">
                <div id="find-pwd" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">密码找回</h4>
                            </div>
                            <div class="modal-body">
                                <div id="find-pwd-username">
                                    <!--邮箱-->
                                    <label class="sr-only" for="find-pwdUsername">Input with help text</label>
                                    <input name="email" placeholder="邮箱" type="text" id="find-pwdUsername"
                                           class="form-control"
                                           aria-describedby="ufind-pwdUsernameHelpBlock">
                                    <span id="find-pwdUsernameHelpBlock" class="help-block">注册时所用的邮箱</span>
                                </div>
                                <div id="find-pwd-No">
                                    <!--学号-->
                                    <label class="sr-only" for="find-pwdNo">注册时的学号</label>
                                    <input name="stu_no" placeholder="学号" type="text" id="find-pwdNo"
                                           class="form-control"
                                           aria-describedby="find-pwdNoHelpBlock">
                                    <span id="find-pwdNoHelpBlock" class="help-block">注册时的学号</span>
                                </div>
                                <div id="find-pwd-pwd1">
                                    <!--密码-->
                                    <label class="sr-only" for="find-pwdPwd1">Input with help text</label>
                                    <input name="pwd1" placeholder="新密码" type="text" id="find-pwdPwd1"
                                           class="form-control"
                                           aria-describedby="find-pwdPwd1HelpBlock">
                                    <span id="find-pwdPwd1HelpBlock" class="help-block">新密码</span>
                                </div>
                                <div id="find-pwd-pwd2">
                                    <!--确认密码-->
                                    <label class="sr-only" for="find-pwdPwd2">Input with help text</label>
                                    <input onkeyup="checkFindPwd()" name="pwd2" placeholder="确认密码" type="text"
                                           id="find-pwdPwd2"
                                           class="form-control"
                                           aria-describedby="find-pwdPwd2HelpBlock">
                                    <span id="find-pwdPwd2HelpBlock" class="help-block">确认密码</span>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input style="width: 30%" type="reset" class="btn btn-default" value="重置表单">
                                <input style="width: 40%;" type="submit" class="btn btn-primary" value="提交">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <script>
                var find1 = false;

                function checkFindPwd() {
                    inputReset("find-pwd-pwd1");
                    inputReset("find-pwd-pwd2");
                    var p1 = $('#find-pwd-pwd1 input').val();
                    var p2 = $('#find-pwd-pwd2 input').val();
                    if (p1 == p2) {
                        find1 = true;
                        inputStateSuccess("find-pwd-pwd1");
                        inputStateSuccess("find-pwd-pwd2");
                    } else {
                        find1 = false;
                        inputStateError('find-pwd-pwd2', "两次输入密码不一致");
                        inputStateError('find-pwd-pwd1', "两次输入密码不一致");
                    }
                }

                $("#find_form").submit(function (evt) {
                    if (!find1) {
                        evt.preventDefault();
                    }
                });
            </script>
        </div>


    </div>

    <!--作业提交部分-->
    <div class="upwork_container">
        <!--用户信息框-->
        <div class="panel panel-default user-info-div">
            <div class="panel-body">
                <div class="my-title"><span class="glyphicon glyphicon-user s-head" aria-hidden="true"></span></div>
                <div class="my-title">
                    <div class="user-info">姓名 : <?php echo (session('user_name')); ?></div>
                    <div class="user-info">学号 : <?php echo (session('user_stu_num')); ?></div>
                    <div class="user-info">邮箱 : <?php echo (session('user_email')); ?></div>
                </div>
                <div class="my-title">
                    <div class="user-info">级别 : <?php echo ($userInfo['user_usertitle']); ?></div>
                    <div class="user-info">登陆 : <?php echo ($userInfo['user_login_times']); ?></div>
                    <div class="user-info">开车 : <?php echo ($userInfo['user_download_count']); ?></div>

                </div>
                <div class="my-title"></div>
            </div>
        </div>

        <!--作业信息框-->
        <div class="panel panel-default user-info-div">
            <div class="panel-body">
                <div class="my-title"><span class="glyphicon glyphicon-th-list s-head" aria-hidden="true"></span></div>
                <div class="my-title">
                    <div class="work-info">作业信息 : <?php echo ($workConsoleInfo["con_course"]); echo ($workConsoleInfo["con_course_type"]); ?></div>
                    <div class="work-info">作业要求 : <?php echo ($workConsoleInfo["con_request"]); ?></div>
                    <!--用户已登陆-->
                    <?php if(session('user_name') != ''): ?><div class="work-info">自动命名 : <?php echo ($fileSaveName); ?></div><?php endif; ?>
                </div>
            </div>
        </div>

        <!--切换框 提交按钮-->
        <ul class="nav nav-tabs work-nav">
            <li role="presentation" class="un-upload-li active" onclick="un_upload_div_click()"><a href="#">未交作业</a>
            </li>
            <li role="presentation" class="uploaded-li" onclick="uploaded_div_click()"><a href="#">已交作业</a></li>

            <div><img height="46px" onclick="checkIsLogin()" src="<?php echo (C("HOME_IMG_URL")); ?>up_homework.png"
                      alt="作业上传">
            </div>
        </ul>


        <!--处理已交作业和未交作业框-->
        <script>
            /*处理已交作业和未交作业框*/
            $(function () {
                $('.un-upload-div').show();
                $('.uploaded-div').hide();

            });

            function un_upload_div_click() {
                $('.un-upload-div').show();
                $('.un-upload-li').addClass('active');
                $('.uploaded-div').hide();
                $('.uploaded-li').removeClass('active');
            }

            function uploaded_div_click() {
                $('.un-upload-div').hide();
                $('.un-upload-li').removeClass('active');
                $('.uploaded-div').show();
                $('.uploaded-li').addClass('active');

            }


        </script>

        <!--未交作业-->
        <div class="panel panel-default un-upload-div">
            <div class="panel-body">
                <div style="height: 40px"></div>
                    <?php if(empty($unloadStudent)): ?><h3 class="text-center">作业已全部交齐</h3>
                    <?php else: ?>
                        <?php if(is_array($unloadStudent)): foreach($unloadStudent as $key=>$v): ?><span class="un-upload-span"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span><?php echo ($v["user_name"]); echo ($v["user_stu_num"]); ?></span><?php endforeach; endif; endif; ?>
            </div>
        </div>


        <!--已交作业-->
        <div class="panel panel-default uploaded-div">
            <div class="panel-body">
                <div style="height: 70px"></div>
                <table class="table">

                    <?php if(empty($hasUploadedInfo)): ?><h3 class="text-center">还没有作业提交</h3>
                        <?php else: ?>
                        <tr class="text-center">
                            <td>序号</td>
                            <td>用户</td>
                            <td>作业名称</td>
                            <td>上传日期</td>
                            <td>操作</td>
                        </tr>
                        <?php if(is_array($hasUploadedInfo)): foreach($hasUploadedInfo as $key=>$v): ?><tr class="text-center">
                                <td><?php echo ($v["work_id"]); ?></td>
                                <td><?php echo ($v["work_stu_num"]); ?></td>
                                <td><?php echo ($v["work_name"]); ?></td>
                                <td><?php echo (date("Y-m-d h:i:s",$v["work_add_date"])); ?></td>
                                <td>
                                    <!--<a href="<?php echo (substr($v["work_save_path"],1)); ?>"><span class="glyphicon glyphicon-save"-->
                                                                                      <!--aria-hidden="true"></span>下载</a>-->
                                    <a href="javascript:void(0)" onclick="downloadFile($(this).parent().parent())"><span class="glyphicon glyphicon-save"
                                                                                      aria-hidden="true"></span>下载</a>
                                </td>

                            </tr><?php endforeach; endif; endif; ?>

                </table>

            </div>

            <script>
                function downloadFile(obj) {
                    var workId=$(obj).find('td:first').html();
                    $.ajax({
                        url: "<?php echo U('UpWork/downloadFile');?>",
                        data: {"workId": workId},
                        dataType:"json",
                        type:'get',
                        success: function (msg) {
                            console.log(msg);
                            if(msg.status==0){
                                $('#downloadFileTools').attr('href',msg.downloadUrl);
                                $('#download').click();
                            }else if(msg.status==1){
                                $('#downloadMsgBox').html('用户尚未登陆!');
                                $('#download').click();
                            }else if(msg.status==2){
                                $('#downloadMsgBox').html('没有下载权限!');
                                $('#download').click();
                            }else if(msg.status==3){
                                $('#downloadMsgBox').html('意外错误!');
                                $('#download').click();
                            }
                        }
                    });
                }
            </script>
        </div>


        <!--提交作业框-->
        <div id="upFileBox" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
             aria-labelledby="myLargeModalLabel">
            <a id='upworkBox' data-toggle="modal" data-target=".bs-example-modal-lg" href=""></a>
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="gridSystemModalLabel">选择作业</h4>
                    </div>
                    <div class="modal-body">
                        <div id="info"></div>
                        <!--文件筐-->
                        <div class="file_box">
                        <span onclick="open_file()" class="glyphicon glyphicon-folder-open open-file-btn"
                              aria-hidden="true"></span>
                            <span class="file_info"><font color="red">点击左边文件按钮请选择作业</font></span>
                        </div>

                        <!--进度条-->
                        <div class="process_box">
                            <div class="progress">
                                <div id="proBar" class="progress-bar" role="progressbar" aria-valuenow="60"
                                     aria-valuemin="0"
                                     aria-valuemax="100" style="width: 20%;">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" id="submit_box">
                        <form id='frm' action="<?php echo U('UpWork/fileSave');?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="type" value="file">
                            <input id="upFile" type="file" name="upFile" style="display: none">
                            <input id="submit_btn" onclick="return window.confirm('你已经选择好文件,确认提交吗?');" type="submit"
                                   class="btn btn-primary" style="width: 100%">
                        </form>

                    </div>
                    <div id="btn_group2" class="modal-footer">
                        <button onclick="resetNowWindow()" style="width: 100%;" type="button" class="btn btn-primary"
                                data-dismiss="modal">关闭
                        </button>
                    </div>
                </div>
            </div>
        </div>


        <!--未登陆提示框-->
        <div class="unload-msg-div">
            <a id="unload" href="#" data-toggle="modal" data-target="#unloadMsg"></a>
            <div id="unloadMsg" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    id="unloadClose"
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="gridSystemModalLabel1">错误提示</h4>
                        </div>
                        <div class="modal-body">
                            <h3 class="text-center">尚未登陆系统,请先<a onclick="dealWithUnLogin()"
                                                                style="color: blue;text-decoration: solid;"
                                                                href="javascript:void(0)">登陆</a>
                            </h3>
                            <hr>
                        </div>

                    </div>
                </div>
            </div>
            <script>
                /*尚未登陆处理*/
                function dealWithUnLogin() {
                    $('#unloadClose').click();
                    $('#loginTragger').click();
                }
            </script>

        </div>

        <!--没有开启作业系统提示框-->
        <div class="unload-msg-div">
            <a id="offBox" href="#" data-toggle="modal" data-target="#off"></a>
            <div id="off" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    id="unloadClose122"
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="gridSystemModalLabel122">错误提示</h4>
                        </div>
                        <div class="modal-body">
                            <h3 class="text-center">
                                还没有开始收作业
                            </h3>
                            <hr>
                        </div>

                    </div>
                </div>
            </div>
            <script>
                /*尚未登陆处理*/
                function dealWithUnLogin() {
                    $('#unloadClose').click();
                    $('#loginTragger').click();
                }
            </script>

        </div>

        <!--下载提示框-->
        <div class="unload-msg-div">
            <a id="download" href="#" data-toggle="modal" data-target="#downloadMsg"></a>
            <div id="downloadMsg" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    id="unloadClose1"
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="gridSystemModalLabel11">下载提示</h4>
                        </div>
                        <div class="modal-body">
                            <h3 id="downloadMsgBox" class="text-center">获取作业成功---<a onclick="location.reload()"  target="_blank" id="downloadFileTools" href="#" >下载</a>
                            </h3>
                            <hr>
                        </div>

                    </div>
                </div>
            </div>
            <script>
                /*尚未登陆处理*/
                function dealWithUnLogin() {
                    $('#unloadClose').click();
                    $('#loginTragger').click();
                }
            </script>

        </div>


        <!--上传文件处理-->
        <script>
            /*检查是否登陆*/
            function checkIsLogin() {
                $.ajax({
                    url: "<?php echo U('User/checkIsLoginByAjax');?>",
                    //data: {"pics_id": pics_id},
                    dataType: 'json',
                    type: 'get',
                    success: function (msg) {
                        console.log(msg);
                        if (msg.state === 0) {
                            $('#unload').click();
                        } else if(msg.state==3){
                            $('#offBox').click();
                        } else{
                            $('#upworkBox').click();
                        }
                    }
                });
            }

            /*上传文件处理*/
            function open_file() {
                $('#upFile').click();
            }

            /**/
            $(function () {
                $('#upFile').change(function () {
                    console.log($('#upFile').val());
                    $('.file_info').html($('#upFile').val());
                });

            });

            /*进度条处理*/
            $(function () {
                $('.process_box').hide();
                $('#submit_btn').click(function () {
                    $(".file_box").hide();
                    $('.process_box').show();
                    $("#gridSystemModalLabel").html('文件上传进度');
                    $("#submit_box").hide();
                });
            });
        </script>

        <!--文件上传部分-->
        <script>

            function resetNowWindow() {
                location.reload();
            }

            $(function () {
                $("#btn_group2").hide();
                $('#frm').submit(function () {
                    var fd = new FormData($('#frm')['0']);

                    var xhr = new XMLHttpRequest();

                    xhr.onreadystatechange = function () {
                        if (xhr.readyState == 4) {
                            $("#info").html(xhr.responseText);
                        }
                    };
                    xhr.upload.onprogress = function (e) {
                        var load = e.loaded;
                        var total = e.total;
                        var per = Math.floor((load / total) * 100) + "%";
                        $("#proBar").width(per);
                        $("#proBar").html(per);
                        if (Math.floor((load / total) * 100) == 100) {
                            $("#info").html(xhr.responseText);
                            $(".process_box").hide();
                            $("#btn_group2").show();

                        }
                    };
                    xhr.open('post', "<?php echo U('UpWork/fileSave');?>");
                    xhr.send(fd);
                    return false;
                });
            });
        </script>
    </div>

    <!--VIP解析部分-->
    <div class="vip_parse_container">
        <div class="panel panel-default vip_parse_box">
            <div class="panel-body">
                <div class="mydiv" style='background:white;padding: 20px 0px 0px;min-width: 800px;'>
                    <div class="row">
                            <div class="col-md-12"></div>
                            <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <select id="vip_api" name="itype" class="form-control">
                                    <option  selected value="http://v.72du.com/api/?url=" >通用接口</option>
                                    <option value="http://api.baiyug.cn/vip/index.php?url=">接口1</option>
                                    <option value="http://api.662820.com/xnflv/index.php?url=">接口2</option>
                                    <option value="http://000o.cc/jx/ty.php?url=">接口3</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-addon">视频地址:</div>
                                    <input id="video_api" class="form-control" placeholder="复制视频地址开始播放" type="text" name="inputUrl"
                                           value="<?php echo ($inputUrl); ?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <!--<input type="submit" value="开始播放 " class="btn btn-primary">-->
                                <button onclick="play()" class="btn btn-primary">开始播放</button>
                                <script>
                                    function play() {
                                        var api=$('#vip_api option:selected').val();
                                        var video_api=$('#video_api').val();
                                        $('#api_play_url').attr('src',api+video_api);

                                    }
                                </script>
                            </div>

                            <div class="col-md-2">
                                <a class='btn btn-danger'
                                   href="http://v.youku.com/v_show/id_XMjcxMzY1ODY2MA==.html?spm=a2hzp.8253869.0.0&from=y1.7-2">教程视频</a>
                            </div>

                        <div class="row">
                            <div class="col-md-12"><br></div>
                            <div class="col-md-12 text-center">
                                <div>
                                    <iframe id="api_play_url" src="" width="97%" height="550px" frameborder="0px"
                                            scrolling="no"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--尾部-->
    <div class="footer_container">
        <br>
        <div id="footer">
            <div class="a2">
                <a href="<?php echo U('Admin/UpWorkConsole/showConsole');?>" target='_blank'>系统后台</a> |
                <a href="" target='_blank'>打包下载</a> |
                <a href="" target='_blank'>这里是天</a> |
                <a href="" target='_blank'>这里是地</a> |
                <a href="" target='_blank'>这是天堂</a> |
                <a href="" target='_blank'>这是地域</a> |
                <a href="" target='_blank'>这不是我</a> |
                <a href="" target='_blank'>这里是你</a> |
                <a href="" target='_blank'>这很奇怪</a> |
                <a href="" target='_blank'>关于我们</a>
                <br>
                <span>ThinkPHP3.2.3  MySql5.5  XAMPP5.6.7 Centos6.6 PHPstorm2017 SVN PHPMailer</span><br>
                <span> ©2017 孙武 QQ：<strong class="cDRed">1228746736</strong>&nbsp;备案/许可证编号为：黔ICP备17001679号</span>

            </div>
        </div>

    </div>

    <!--页面载入处理-->
    <script>
        $(function () {
            $('.vip_parse_container').hide();
        });

        function show_upwork() {
            $('.upwork_container').show();
            $('.vip_parse_container').hide();

        }

        function show_vipparse() {
            $('.upwork_container').hide();
            $('.vip_parse_container').show();
        }
    </script>

</div>
</body>
</html>