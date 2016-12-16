<div id="login" style="position: absolute; top: 2rem; left: 6rem; right: 6rem; height: 26rem; border-style: groove;border-width: 0.2rem;">
    <label class="fs_label" style="position:absolute; left:3rem;height:2rem;top:1rem;" for="accountno">帐号：</label>
    <div style="position:absolute; left:8rem; right: 4rem;top:1rem;">
        <input class="fs_input" id="accountno" style="width:100%;" placeholder="帐号或邮箱" type="text" value="" name="accountno" />
    </div>
    <label class="fs_label" style="position:absolute; left:3rem; top: 5rem; height:2rem;" for="password">密码：</label>
    <div style="position:absolute; left:8rem; right: 4rem;top: 5rem;">
        <input class="fs_input" id="password" style=" width:100%;" placeholder="6-20位数字和(或)字母" type="password" value="" name="password" />
    </div>
    <div class="div_button" style="position:absolute; top:8rem;">
        <input class="fs_label cpointer" id="fbbutton" style="position:absolute; width: 100%;" 
            type="button" value="登录" onclick="stafflogin(); "/>
    </div>
    <p class="fs_label fc_button" style="position:absolute; left:3rem; top: 9rem;" onclick="$('#resetpswd').css('visibility','visible');" >忘记(重置)密码</p>
    <div id="resetpswd" style="visibility: hidden; position: absolute; top: 12.5rem;left:1rem;right:1rem;height:10rem;">
        <div class="div_button" style="position:absolute; top:0rem;">
            <input class="fs_label cpointer" id="sendmail" style="position:absolute; width: 100%;" 
                name="sendmail" type="button" value="发送验证邮件"
                onclick="regstaff_sendemail();" />
        </div>
        <label class="fs_label" style="position:absolute; left:3rem; top: 3rem; height:2rem;" for="yzm">输入验证码：</label>
        <div style="position:absolute; left:13rem; right: 4rem;top: 3rem;">
            <input class="fs_input" id="yzm" style="width:100%;" type="text" value="" name="yzm" />
        </div>
        <label class="fs_label" style="position:absolute; left:3rem; top: 6.5rem; height:2rem;" for="newpassword">输入新密码：</label>
        <div style="position:absolute; left:13rem; right: 4rem;top: 6.5rem;">
            <input class="fs_input" id="newpassword" style="width:100%;" placeholder="6-20位数字和(或)字母" type="password" value="" name="newpassword" />
        </div>
        <div class="div_button" style="position:absolute; top:10rem;">
            <input class="fs_label cpointer" id="setpassword" style="position:absolute; width: 100%;" 
                name="setpswd" type="button" value="设置密码"
                onclick="regstaff_setpswd();" />
        </div>
    </div>
</div>
