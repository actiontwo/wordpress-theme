<?php
// create custom plugin settings menu
add_action('admin_menu', 'director_create_menu');

function director_create_menu() {
//create new submenu
  add_submenu_page('themes.php', 'Theme Options', 'Theme Options', 'administrator', __FILE__, 'director_settings_page');

//call register settings function
  add_action('admin_init', 'director_register_settings');
}

function director_register_settings() {
//register our settings

  $arg = array(
    'Options' => 'options',
    'types' => 'types'
  );

  foreach ($arg as $items => $value) {
    register_setting('settings-group', $value);
  }
}

function director_settings_page() {
  ?> 
  <style> 
      table input,table textarea{
          width: 300px;
      }

      .popupAddCustom {
          display: none;
          background: rgba(0,0,0,0.6);
          position: fixed;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          z-index: 10000;
      }

      .popupAddCustom .popup_layer_1 {
          height: 100%;
          display: table;
          width: 100%;
      }
      .popupAddCustom .popup_layer_2 {
          display: table-cell;
          vertical-align: middle;
      }

      .popupAddCustom .popup_layer_3 {
          width: 400px;
          margin: 0 auto;
          background: #fff;
          position: relative;
      }
      .popupAddCustom span.cancel-popup {
          position: absolute;
          top: 0;
          right: 0;
          background: #000;
          color: #fff;
          font-weight: 800;
          padding: 2px 5px;
          cursor: pointer;
      }

      .popupAddCustom .content input {
          width: 100%;
      }

      .popupAddCustom .content table {
          width: 80%;
          margin: 0 auto;
      }

      .popupAddCustom .content td {
          padding: 5px 0;
      }

      .popupAddCustom .content {
          padding: 20px;
          text-align: center;
          box-shadow: 1px 1px 4px 0 rgba(0,0,0,0.5);
      }

      .popupAddCustom .content .btn-submit {
          background: #000;
          padding: 5px 30px;
          color: #fff;
          text-decoration: none;
          display: inline-block;
          margin-top: 20px;
          font-size: 19px;
          box-shadow: 1px 1px 2px 0 rgba(0,0,0,0.2);
      }
  </style>
  <div class="wrap">
      <h2>Theme Settings</h2>
      <form id="landingOptions" method="post" action="options.php">
          <?php
          settings_fields('settings-group');
          $options = get_option('options');
          var_dump($options);
          ?>
          <a href='javascript:void(0)' onclick="openPopup()">Add Custom</a>
          <table class="form-table">

              <?php
              foreach ($options as $key => $option) {
                echo '<tr valign = "top">';
                echo '<th>';
                if ($option['title']) {
                  echo $option['title'];
                } else {
                  echo 'No title';
                }
                echo ':</th>';
                echo '<td>';
                switch ($option['type']) {
                  case 'text' :
                    echo '<input class="' . $key . '" type = "text"   name="options[' . $key . '][value]" value = "' . $option['value'] . '" placeholder="" />';
                    echo '<input class="' . $key . '" type = "hidden" name="options[' . $key . '][type]"  value ="' . $option['type'] . '"/>';
                    echo '<input class="' . $key . '" type = "hidden" name="options[' . $key . '][title]" value = "' . $option['title'] . '"/>';
                    break;
                }
                echo '</td>';
                echo '</tr>';
              }
              ?>
          </table>
          <p class="submit">
              <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
          </p>
      </form>
      <div class='popupAddCustom'>
          <div class='popup_layer_1'>
              <div class='popup_layer_2'>
                  <div class='popup_layer_3'>
                      <span class='cancel-popup' onclick='jQuery(".popupAddCustom").hide()'>X</span>
                      <div class='content'>
                          <table>
                              <tr>
                                  <td><input name='title' type="text" value='' placeholder="Title"/></td>
                              </tr>
                              <tr>
                                  <td><input name='key' type="text" value='' placeholder="key"/></td>
                              </tr>
                              <tr>
                                  <td><input name='value' type="text" value='' placeholder="Value"/></td>
                              </tr>
                              <tr>
                                  <td>
                                      <label>Type : 
                                          <select name='type'>
                                              <option value='text'>Text</option>
                                          </select>
                                      </label>
                                  </td>
                              </tr>
                          </table>
                          <a href='javascript:void(0)' class='btn-submit'>Add</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <script>
        var openPopup = function () {
            var popup = jQuery('.popupAddCustom');
            popup.show();
        };
      </script>
  </div>
  <?php
}
