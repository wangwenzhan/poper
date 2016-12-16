<div style="position: absolute; top:0rem;width:100%;bottom: 0rem; overflow-y: auto;">
<?php foreach($sactree as $item){ ?>
    <div id="itemdiv_<?php echo $item['id']; ?>" class="div_actree" >
        <input class="fs_input" id="name_<?php echo $item['id']; ?>" style="position:relative;left:<?php echo $item['layer']+0.2; ?>rem;font-size: 1.2rem; width:12rem;border-width: 2px;border-color: beige;" type="text" value="<?php echo $item['name']; ?>" name="name_<?php echo $item['id']; ?>" placeholder="功能名称" />
        <input class="fs_input" id="action_<?php echo $item['id']; ?>" style="position:absolute;left:<?php echo $item['layer']+12.6; ?>rem;font-size: 1.2rem; width:12rem;border-width: 2px;border-color: beige;" type="text" value="<?php echo $item['action']; ?>" name="action_<?php echo $item['id']; ?>" placeholder="功能URL,如：center/index" />
        <input class="fs_input" id="formenu_<?php echo $item['id']; ?>" style="position:absolute; left:<?php echo $item['layer']+26; ?>rem; top: 0.2rem;" type="checkbox" value="1" name="formenu_<?php echo $item['id']; ?>" <?php echo $item['formenu'] > 0 ? 'checked' : '' ; ?> />
            <label for="formenu_<?php echo $item['id']; ?>" class="fs_label_s" style="position:absolute; left:<?php echo $item['layer']+27.5; ?>rem; top: 0.4rem;">菜单项</label>
        <input class="fs_input" id="forentry_<?php echo $item['id']; ?>" style="position:absolute; left:<?php echo $item['layer']+32; ?>rem; top: 0.2rem;" type="checkbox" value="1" name="forentry_<?php echo $item['id']; ?>" <?php echo $item['forentry'] > 0 ? 'checked' : '' ; ?> />
            <label for="forentry_<?php echo $item['id']; ?>" class="fs_label_s" style="position:absolute; left:<?php echo $item['layer']+33.5; ?>rem; top: 0.4rem;">入口项</label>
        <div class="div_item_button" style="top: 0.3rem;right:16rem; " onclick="
            var i = '<?php echo $item['id']; ?>';
            sactree_save(i);
            " >保存</div>
        <div class="div_item_button" style="top: 0.3rem;right:13rem; " onclick="
            var i = '<?php echo $item['id']; ?>';
            sactree_addson(i);
            " >加子</div>
        <div class="div_item_button" style="top: 0.3rem;right:10rem; " onclick="
            var i = '<?php echo $item['id']; ?>';
            sactree_addbrother(i);
            " >加弟</div>
        <div class="div_item_button" style="top: 0.3rem;right:7rem; " onclick="
            var i = '<?php echo $item['id']; ?>';
            sactree_move(i,'1');
            " >同上</div>
        <div class="div_item_button" style="top: 0.3rem;right:4rem; " onclick="
            var i = '<?php echo $item['id']; ?>';
            sactree_move(i,'0');
            " >跨上</div>
        <div class="div_item_button" style="top: 0.3rem;right:1rem; " onclick="
            var i = '<?php echo $item['id']; ?>';
            sactree_delete(i);
            " >删除</div>
   	</div>
<?php  } ?>
</div>
