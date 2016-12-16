<div id="actionbar" class="div_actionbar fc_footer">
    <div class="div_item_button" style="top: 0.5rem;left:1rem; color: white; " onclick="general_add('center','customer');" >增加</div>
</div><!-- actionbar -->
<div style="position: absolute; top:2.8rem;width:100%;bottom: 0rem; overflow-y: auto;">
<?php foreach($customers as $item){ ?>
    <div id="itemdiv_<?php echo $item['id']; ?>" class="div_actree" >
        <input class="fs_input" id="name_<?php echo $item['id']; ?>" style="position:relative;left:0.2rem;font-size: 1.2rem; width:12rem;border-width: 2px;border-color: beige;" type="text" value="<?php echo $item['name']; ?>" name="name_<?php echo $item['id']; ?>" placeholder="名称" />
        <input class="fs_input" id="code_<?php echo $item['id']; ?>" style="position:absolute;left:12.6rem;font-size: 1.2rem; width:5rem;border-width: 2px;border-color: beige;" type="text" value="<?php echo $item['code']; ?>" name="code_<?php echo $item['id']; ?>" placeholder="编码" />
        <input class="fs_input" id="memo_<?php echo $item['id']; ?>" style="position:absolute;left:18rem;font-size: 1.2rem; width:20rem;border-width: 2px;border-color: beige;" type="text" value="<?php echo $item['memo']; ?>" name="memo_<?php echo $item['id']; ?>" placeholder="备注信息" />
        <input class="fs_input" id="scaleout_<?php echo $item['id']; ?>" style="position:absolute;left:38.6rem;font-size: 1.2rem; width:5rem;border-width: 2px;border-color: beige;" type="text" value="<?php echo $item['scaleout']; ?>" name="scaleout_<?php echo $item['id']; ?>" placeholder="扩展码" />
        <input class="fs_input" id="isactive_<?php echo $item['id']; ?>" style="position:absolute; left:45rem; top: 0.2rem;" type="checkbox" value="1" name="isactive_<?php echo $item['id']; ?>" <?php echo $item['isactive'] > 0 ? 'checked' : '' ; ?> />
            <label for="isactive_<?php echo $item['id']; ?>" class="fs_label_s" style="position:absolute; left:46.5rem; top: 0.4rem;">活动</label>
        <div style="position: absolute; top: 0.1rem;left:50rem; width: 9.5rem;">
            <select id="msbase_id_<?php echo $item['id']; ?>" name="msbase_id_<?php echo $item['id']; ?>" style="position: absolute; width: 100%; left: 0.1rem; top: 0.1rem;">
                <?php foreach($msbases as $msbase){ ?>
                <option value="<?php echo $msbase['id']; ?>" <?php echo $item['msbase_id'] == $msbase['id'] ? 'selected="selected"' : ''; ?> ><?php echo $msbase['name']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="div_item_button" style="top: 0.3rem;right:4rem; " onclick="
            var i = '<?php echo $item['id']; ?>';
            customer_save(i);
            " >保存</div>
        <div class="div_item_button" style="top: 0.3rem;right:1rem; " onclick="
            var i = '<?php echo $item['id']; ?>';
            general_delete(i,'center','customer');
            " >删除</div>
   	</div>
<?php  } ?>
</div>
