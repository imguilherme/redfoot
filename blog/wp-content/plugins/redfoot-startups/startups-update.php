<?php

function redfoot_startups_update() {
    global $wpdb;
    $table_name = $wpdb->prefix . "startup";
    $id = $_GET["id"];
    $name = $_POST["name"];
    $description = $_POST['description'];
//update
    if (isset($_POST['update'])) {
        $wpdb->update(
                $table_name, //table
                array('name' => $name, 'description'=>$description), //data
                array('ID' => $id), //where
                array('%s'), //data format
                array('%s') //where format
        );
    }
//delete
    else if (isset($_POST['delete'])) {
        $wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id = %s", $id));
    } else {//selecting value to update	
        $schools = $wpdb->get_results($wpdb->prepare("SELECT id,name, description from $table_name where id=%s", $id));
        foreach ($schools as $s) {
            $name = $s->name;
        }
    }
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/redfoot_startups/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Startups</h2>

        <?php if ($_POST['delete']) { ?>
            <div class="updated"><p>Startup removida</p></div>
            <a href="<?php echo admin_url('admin.php?page=redfoot_startups_list') ?>">&laquo; Volte para a lista de startups</a>

        <?php } else if ($_POST['update']) { ?>
            <div class="updated"><p>Startup atualizada</p></div>
            <a href="<?php echo admin_url('admin.php?page=redfoot_startups_list') ?>">&laquo; Volte para a lista de startups</a>

        <?php } else { ?>
            <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                <table class='wp-list-table widefat fixed'>
                    <tr><th>Name</th><td><input type="text" name="name" value="<?php echo $name; ?>"/></td></tr>
                    
                         <tr>
                    <th class="ss-th-width">Site</th>
                    <td><input type="text" name="site" value="<?php echo $link; ?>" class="ss-field-width" /></td>
                </tr>

                <tr>
                    <th class="ss-th-width">Email</th>
                    <td><input type="text" name="email" value="<?php echo $link; ?>" class="ss-field-width" /></td>
                </tr>

                <tr>
                    <th class="ss-th-width">Cidade</th>
                    <td><input type="text" name="city" value="<?php echo $city; ?>" class="ss-field-width" /></td>
                </tr>
                
                <tr>
                    <th class="ss-th-width">Descrição</th>
                    <td><textarea  name="description" value="<?php echo $description; ?>" class="ss-field-width" ></textarea></td>
                </tr>
                </tr>
                </table>
                <input type='submit' name="update" value='Salvar' class='button'> &nbsp;&nbsp;
                <input type='submit' name="delete" value='Deletar' class='button' onclick="return confirm('Deseja realmente deletar esse elemento?')">
            </form>
        <?php } ?>

    </div>
    <?php
}