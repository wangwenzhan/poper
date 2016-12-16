<div id="actionbar" class="div_actionbar fc_footer">
    <div class="div_item_button" style="top: 0.5rem;left:1rem; color: white; " onclick="general_add('center','opcenter');" >增加</div>
</div><!-- actionbar -->
<div style="position: absolute; top:2.8rem;width:100%;bottom: 0rem; overflow-y: auto;">
<?php foreach($opcenters as $item){ ?>
    <div id="itemdiv_<?php echo $item['id']; ?>" class="div_actree" >
        <input class="fs_input" id="name_<?php echo $item['id']; ?>" style="position:relative;left:0.2rem;font-size: 1.2rem; width:12rem;border-width: 2px;border-color: beige;" type="text" value="<?php echo $item['name']; ?>" name="name_<?php echo $item['id']; ?>" placeholder="名称" />
        <input class="fs_input" id="code_<?php echo $item['id']; ?>" style="position:absolute;left:12.6rem;font-size: 1.2rem; width:6rem;border-width: 2px;border-color: beige;" type="text" value="<?php echo $item['code']; ?>" name="code_<?php echo $item['id']; ?>" placeholder="编码" />
        <input class="fs_input" id="memo_<?php echo $item['id']; ?>" style="position:absolute;left:19rem;font-size: 1.2rem; width:19rem;border-width: 2px;border-color: beige;" type="text" value="<?php echo $item['memo']; ?>" name="memo_<?php echo $item['id']; ?>" placeholder="备注信息" />
        <input class="fs_input" id="isvirtual_<?php echo $item['id']; ?>" style="position:absolute; left:39rem; top: 0.2rem;" type="checkbox" value="1" name="isvirtual_<?php echo $item['id']; ?>" <?php echo $item['isvirtual'] > 0 ? 'checked' : '' ; ?> />
            <label for="isvirtuale_<?php echo $item['id']; ?>" class="fs_label_s" style="position:absolute; left:40.5rem; top: 0.4rem;">虚体</label>
        <input class="fs_input" id="isactive_<?php echo $item['id']; ?>" style="position:absolute; left:44rem; top: 0.2rem;" type="checkbox" value="1" name="isactive_<?php echo $item['id']; ?>" <?php echo $item['isactive'] > 0 ? 'checked' : '' ; ?> />
            <label for="isactive_<?php echo $item['id']; ?>" class="fs_label_s" style="position:absolute; left:45.5rem; top: 0.4rem;">活动</label>
        <input class="fs_input" id="postcodeprefix_<?php echo $item['id']; ?>" style="position:absolute;left:48.6rem;font-size: 1.2rem; width:10rem;border-width: 2px;border-color: beige;" type="text" value="<?php echo $item['postcodeprefix']; ?>" name="postcodeprefix_<?php echo $item['id']; ?>" placeholder="本地邮编前缀" />

        <input class="fs_input" id="addressee_<?php echo $item['id']; ?>" style="position:absolute;top:2.5rem;left:0.2rem;font-size: 1.2rem; width:7rem;border-width: 2px;border-color: beige;" type="text" value="<?php echo $item['addressee']; ?>" name="addressee_<?php echo $item['id']; ?>" placeholder="收件人" />
        <input class="fs_input" id="postcode_<?php echo $item['id']; ?>" style="position:absolute;top:2.5rem;left:7.6rem;font-size: 1.2rem; width:4.3rem;border-width: 2px;border-color: beige;" type="text" value="<?php echo $item['postcode']; ?>" name="postcode_<?php echo $item['id']; ?>" placeholder="邮编" />
        <input class="fs_input" id="address_<?php echo $item['id']; ?>" style="position:absolute;top:2.5rem;left:12.6rem;font-size: 1.2rem; width:18.5rem;border-width: 2px;border-color: beige;" type="text" value="<?php echo $item['address']; ?>" name="address_<?php echo $item['id']; ?>" placeholder="地址" />
        <input class="fs_input" id="email_<?php echo $item['id']; ?>" style="position:absolute;top:2.5rem;left:31.6rem;font-size: 1.2rem; width:10rem;border-width: 2px;border-color: beige;" type="text" value="<?php echo $item['email']; ?>" name="email_<?php echo $item['id']; ?>" placeholder="EMAIL" />
        <input class="fs_input" id="tel_<?php echo $item['id']; ?>" style="position:absolute;top:2.5rem;left:42.1rem;font-size: 1.2rem; width:8rem;border-width: 2px;border-color: beige;" type="text" value="<?php echo $item['tel']; ?>" name="tel_<?php echo $item['id']; ?>" placeholder="座机" />
        <input class="fs_input" id="mobile_<?php echo $item['id']; ?>" style="position:absolute;top:2.5rem;left:50.6rem;font-size: 1.2rem; width:8rem;border-width: 2px;border-color: beige;" type="text" value="<?php echo $item['mobile']; ?>" name="mobile_<?php echo $item['id']; ?>" placeholder="手机" />

        <div class="div_item_button" style="top: 0.3rem;right:7rem; " onclick="
            var i = '<?php echo $item['id']; ?>';
            expand_height('itemdiv',i,'5rem');
            " >扩展</div>
        <div class="div_item_button" style="top: 0.3rem;right:4rem; " onclick="
            var i = '<?php echo $item['id']; ?>';
            opcenter_save(i);
            " >保存</div>
        <div class="div_item_button" style="top: 0.3rem;right:1rem; " onclick="
            var i = '<?php echo $item['id']; ?>';
            general_delete(i,'center','opcenter');
            " >删除</div>
   	</div>
<?php  } ?>
</div>
