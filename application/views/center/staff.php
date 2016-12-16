<div id="actionbar" class="div_actionbar fc_footer">
    <div class="div_item_button" style="top: 0.5rem;left:1rem; color: white; " onclick="general_add('center','staff');" >增加</div>
</div><!-- actionbar -->
<div style="position: absolute; top:2.8rem;width:100%;bottom: 0rem; overflow-y: auto;">
<?php foreach($staffs as $item){ ?>
    <div id="itemdiv_<?php echo $item['id']; ?>" class="div_actree" >
        <input class="fs_input" id="name_<?php echo $item['id']; ?>" style="position:relative;left:0.2rem;font-size: 1.2rem; width:10rem;border-width: 2px;border-color: beige;" type="text" value="<?php echo $item['name']; ?>" name="name_<?php echo $item['id']; ?>" placeholder="名称" />
        <input class="fs_input" id="accountno_<?php echo $item['id']; ?>" style="position:absolute;left:10.6rem;font-size: 1.2rem; width:7rem;border-width: 2px;border-color: beige;" type="text" value="<?php echo $item['accountno']; ?>" name="accountno_<?php echo $item['id']; ?>" placeholder="账号简码" />
        <input class="fs_input" id="email_<?php echo $item['id']; ?>" style="position:absolute;left:18rem;font-size: 1.2rem; width:17rem;border-width: 2px;border-color: beige;" type="text" value="<?php echo $item['email']; ?>" name="email_<?php echo $item['id']; ?>" placeholder="EMAIL" />
        <input class="fs_input" id="mobile_<?php echo $item['id']; ?>" style="position:absolute;left:35.6rem;font-size: 1.2rem; width:8rem;border-width: 2px;border-color: beige;" type="text" value="<?php echo $item['mobile']; ?>" name="mobile_<?php echo $item['id']; ?>" placeholder="手机号" />
        <input class="fs_input" id="isactive_<?php echo $item['id']; ?>" style="position:absolute; left:45rem; top: 0.2rem;" type="checkbox" value="1" name="isactive_<?php echo $item['id']; ?>" <?php echo $item['isactive'] > 0 ? 'checked' : '' ; ?> />
            <label for="isactive_<?php echo $item['id']; ?>" class="fs_label_s" style="position:absolute; left:46.5rem; top: 0.4rem;">活动</label>
        <div style="position: absolute; top: 0.1rem;left:50rem; width: 10.5rem;">
            <select id="opcenter_id_<?php echo $item['id']; ?>" name="opcenter_id_<?php echo $item['id']; ?>" style="position: absolute; width: 100%; left: 0.1rem; top: 0.1rem;">
                <option value="0" selected="selected" >未关联制作中心</option>
                <?php foreach($opcenters as $opcenter){ ?>
                <option value="<?php echo $opcenter['id']; ?>" <?php echo $item['opcenter_id'] == $opcenter['id'] ? 'selected="selected"' : ''; ?> ><?php echo $opcenter['name']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="div_item_button" style="top: 0.3rem;right:4rem; " onclick="
            var i = '<?php echo $item['id']; ?>';
            staff_save(i);
            " >保存</div>
        <div class="div_item_button" style="top: 0.3rem;right:1rem; " onclick="
            var i = '<?php echo $item['id']; ?>';
            general_delete(i,'center','staff');
            " >删除</div>
   	</div>
<?php  } ?>
</div>
