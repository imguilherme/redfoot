<?php

function redfoot_startups_list() {
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/redfoot-startups/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Startups</h2>
        <div class="tablenav top">
            <div class="alignleft actions">
                <a href="<?php echo admin_url('admin.php?page=redfoot_startups_create'); ?>">Adicionar nova</a>
            </div>
            <br class="clear">
        </div>
        <?php
        global $wpdb;
        $table_name = $wpdb->prefix . "startup";

        $rows = $wpdb->get_results("SELECT id,name from $table_name");
        ?>
        <?php if(count($rows) > 0): ?>
        <table class='wp-list-table widefat fixed striped posts'>
            <tr>
                <th class="manage-column ss-list-width">ID</th>
                <th class="manage-column ss-list-width">Nome</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($rows as $row) { ?>
                <tr>
                    <td class="manage-column ss-list-width"><?php echo $row->id; ?></td>
                    <td class="manage-column ss-list-width"><?php echo $row->name; ?></td>
                    <td><a href="<?php echo admin_url('admin.php?page=redfoot_startups_update&id=' . $row->id); ?>">Atualizar</a></td>
                </tr>
            <?php } ?>
        </table>
        <?php else: ?>
                Nenhuma startup cadastrada
        <?php endif; ?>
    </div>
    <?php
}