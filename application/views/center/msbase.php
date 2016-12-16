<div id="actionbar" class="div_actionbar fc_footer">
    <div class="div_item_button" style="top: 0.5rem;left:1rem; color: white; " onclick="general_add('center','msbase');" >增加</div>
</div><!-- actionbar -->
<div style="position: absolute; top:2.8rem;width:100%;bottom: 0rem; overflow-y: auto;">
<?php foreach($msbases as $item){ ?>
    <div id="itemdiv_<?php echo $item['id']; ?>" class="div_actree" >
        <input class="fs_input" id="name_<?php echo $item['id']; ?>" style="position:relative;left:0.2rem;font-size: 1.2rem; width:12rem;border-width: 2px;border-color: beige;" type="text" value="<?php echo $item['name']; ?>" name="name_<?php echo $item['id']; ?>" placeholder="名称" />
        <input class="fs_input" id="url_<?php echo $item['id']; ?>" style="position:absolute;left:12.6rem;font-size: 1.2rem; width:22rem;border-width: 2px;border-color: beige;" type="text" value="<?php echo $item['url']; ?>" name="url_<?php echo $item['id']; ?>" placeholder="URL,如：output100.belstar.com.cn" />
        <input class="fs_input" id="port_<?php echo $item['id']; ?>" style="position:absolute;left:35rem;font-size: 1.2rem; width:3rem;border-width: 2px;border-color: beige;" type="text" value="<?php echo $item['port']; ?>" name="port_<?php echo $item['id']; ?>" placeholder="端口,如：80；88" />
        <input class="fs_input" id="user_<?php echo $item['id']; ?>" style="position:absolute;left:38.6rem;font-size: 1.2rem; width:7rem;border-width: 2px;border-color: beige;" type="text" value="<?php echo $item['user']; ?>" name="user_<?php echo $item['id']; ?>" placeholder="账户名" />
        <input class="fs_input" id="pass_<?php echo $item['id']; ?>" style="position:absolute;left:46rem;font-size: 1.2rem; width:12rem;border-width: 2px;border-color: beige;" type="text" value="<?php echo $item['pass']; ?>" name="pass_<?php echo $item['id']; ?>" placeholder="账户密码" />
        <div class="div_item_button" style="top: 0.3rem;right:4rem; " onclick="
            var i = '<?php echo $item['id']; ?>';
            msbase_save(i);
            " >保存</div>
        <div class="div_item_button" style="top: 0.3rem;right:1rem; " onclick="
            var i = '<?php echo $item['id']; ?>';
            general_delete(i,'center','msbase');
            " >删除</div>
   	</div>
<?php  } ?>
</div>
