<?php

function redfoot_startups_create() {
  
    $name = $_POST["name"];
    $description = $_POST['description'];
    $site = $_POST['site'];
    $email = $_POST['email'];
    $city = $_POST['city'];

    //insert
    if (isset($_POST['insert'])) {
        global $wpdb;
        $table_name = $wpdb->prefix . "startup";

        $wpdb->insert(
                $table_name, //table
                array('name' => $name, 'description' => $description, 'site'=>$site, 'email'=>$email, 'city'=>$city), //data
                array('%s', '%s', '%s', '%s', '%s') //data format			
        );
        $message.="Startup criada";
    }
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/redfoot_startups/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Adicionar nova Startup</h2>
        <?php if (isset($message)): ?><div class="updated"><p><?php echo $message; ?></p></div><?php endif; ?>
        <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
          <table class='wp-list-table widefat fixed'>
             
                <tr>
                    <th class="ss-th-width">Nome</th>
                    <td><input type="text" name="name" value="<?php echo $name; ?>" class="ss-field-width" /></td>
                </tr>
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
            </table>
            <input type='submit' name="insert" value='Salvar' class='button'>
        </form>
    </div>
    <?php
}