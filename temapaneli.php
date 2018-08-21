<?php
function wp_usluer_menu() {
	// Üstü Menü Özellikleri:
	    add_menu_page(__('Mini Blog','usluer'), __('Mini Blog','usluer'), 6, basename(__FILE__) , 'wp_usluer_admin', '');
	// Alt menü özellikleri:
		
}

add_action('admin_menu', 'wp_usluer_menu');

function new_menu() {
   	wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) );
}
$usluer_options = (
	array(
array(__('Mini Blog Ayarları','usluer'), array(	
		array('menu', 'yes', __('Üst Menü','usluer'),__('Eğer eveti seçerseniz logonun solunda menüler gözükür.','usluer'),'yesno'),
		array('twitterileti', 'yes', __('Twitter İleti','usluer'),__('Eğer eveti seçerseniz alt kısımda son twitter iletiniz gözükür.','usluer'),'yesno'),
		array('twitter', __('','usluer'), __('Twitter kullanıcı adı:','usluer'),__('Twitter kullanıcı adınızı giriniz.','usluer'),'text'),
		array('etiketler', 'yes', __('Etiketler','usluer'),__('Eğer eveti yazı etiketleri gözükür.','usluer'),'yesno'),
		array('analytics', __('','usluer'), __('Analytics kodunu:','usluer'),__('Analytics kodunu giriniz.','usluer'),'textarea'),
		)	
		),	
		));
foreach($usluer_options as $section) {
	foreach($section[1] as $option) {
		add_option($option[0], $option[1]);
	}
}
function wp_usluer_admin() {
	global $usluer_options;
	if ($_POST['save_usluer_options']) {
		foreach($usluer_options as $section) {
			foreach($section[1] as $option) {
				update_option($option[0],stripslashes($_POST[$option[0]]));
			}
		}
		/* Başarılı */
		echo '<div id="message" class="updated fade"><p><strong>'.__('Ayarlarınız Kaydedildi.','usluer').'</strong></p></div>';
	}
	?>
	<div class="wrap">
		<h2><?php _e('Mini Blog Ayarları', 'usluer'); ?></h2>
		<form method="post" action="admin.php?page=temapaneli.php" id="usluer_form">
			<?php
			foreach($usluer_options as $section) {
				echo '<h3>'.$section[0].'</h3><div class="usluer_section"><table cellspacing="0" cellpadding="0" class="form-table">';
				foreach($section[1] as $option) {
					echo '<tr valign="top">';
					echo '<th><label for="'.$option[0].'">'.$option[2].'</label></th><td>';
					if ($option[4]=='yesno') {
						$yes = '';
						$no = '';
						if (get_option($option[0])=='yes') $yes='selected="selected"'; else $no='selected="selected"';
						echo '<select name="'.$option[0].'">
							<option value="yes" '.$yes.'>'.__('Evet','usluer').'</option>
							<option value="no" '.$no.'>'.__('Hayır','usluer').'</option>
						</select>';
					} elseif ($option[4]=='textarea') {
						echo '<textarea id="'.$option[0].'" name="'.$option[0].'" cols="40" rows="4">'.get_option($option[0]).'</textarea>';
					} elseif ($option[4]=='select_options') {
						$selected = '';
						echo '<select name="'.$option[0].'">';
						$names = explode('|', $option[5]);
						$values = explode('|', $option[6]);
						$selected = get_option($option[0]);
						$loop = 0;
						if ($names) {
							foreach ($names as $name) {
								echo '<option value="'.$values[$loop].'" ';
								if ($selected==$values[$loop]) echo 'selected="selected"';
								echo '>'.$name.'</option>';
								$loop++;
							}
						}
						echo '</select>';
					} else {
						echo '<input type="text" id="'.$option[0].'" name="'.$option[0].'" size="50" value="'.get_option($option[0]).'" />';
					}
					if ($option[3]) echo '<br/><span class="setting-description">'.$option[3].'</span>';
					echo '</td></tr>';
				}
				echo '</table></div><br class="clear" />';
			}
			?>
			<p class="submit" style="text-align:right"><input type="submit" value="<?php _e('Kaydet', 'usluer'); ?>" name="save_usluer_options" /></p>
		</form>
	</div>
<?php } ?>