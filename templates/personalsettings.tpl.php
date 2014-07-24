<?php

/**
* ownCloud importer app
*
* @author Xavier Beurois
* @copyright 2012 Xavier Beurois www.djazz-lab.net
* 
* This library is free software; you can redistribute it and/or
* modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
* License as published by the Free Software Foundation; either 
* version 3 of the License, or any later version.
* 
* This library is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU AFFERO GENERAL PUBLIC LICENSE for more details.
*  
* You should have received a copy of the GNU Lesser General Public 
* License along with this library.  If not, see <http://www.gnu.org/licenses/>.
* 
*/

OCP\Util::addStyle('importer', 'personalsettings');

?>

<form autocomplete="off" id="importer">
	<fieldset class="personalblock">
		<h2>Importer</h2>
		<input type="hidden" id="importer" name="importer" value="1" />
		<br />
		<div>
		Credentials:
		</div>
		<br />
		<?php foreach($_['pr_list'] as $p){ ?>
		<div class="importer_pr" id="importer_pr_<?php print($p['pr_id']); ?>">
			<div style="float:left;width:100px;margin-top:8px;margin-left:20px;">
				<label titl="<?php print($p['pr_desc']); ?>"><?php print($p['pr_name']); ?></label>
			</div>
			<input class="username" type="text" autocomplete="off" name="importer_pr_un_<?php print($p['pr_id']); ?>" id="importer_pr_un_<?php print($p['pr_id']); ?>" value="<?php print(!is_null($p['us_id'])?$p['us_username']:''); ?>" placeholder="Username" />

			<input class="password" autocomplete="off" type="password" name="importer_pr_pw_<?php print($p['pr_id']); ?>" id="importer_pr_pw_<?php print($p['pr_id']); ?>" value="<?php print(!is_null($p['us_id'])?$p['us_password']:''); ?>" placeholder="Password" data-typetoggle="#importer_pr_show_<?php print($p['pr_id']); ?>" />
			
			<input type="checkbox" id="importer_pr_show_<?php print($p['pr_id']); ?>" class="personal-show" /><label for="importer_pr_show_<?php print($p['pr_id']); ?>"></label>
			
			<input type="hidden" id="importer_pr_orig_<?php print($p['pr_id']); ?>" name="importer_pr_enc_<?php print($p['pr_id']); ?>"  placeholder="Encrypted" class="orig_enc_pw" value="<?php print(!is_null($p['us_id'])?$p['us_password']:''); ?>" />
			<input type="hidden" id="importer_pr_enc_<?php print($p['pr_id']); ?>" name="importer_pr_enc_<?php print($p['pr_id']); ?>"  placeholder="Encrypted" class="enc" value="1" />
			<?php print(!is_null($p['us_id'])?'<img class="importer-delete" src="' . OC_Helper::imagePath('importer', 'delete.png') . '" rel="' . $p['pr_id'] . '" title="'.$l->t('Clear').'" />':''); ?>
			<?php print(!array_key_exists($p['pr_id'], $_['errors'])?'':'<label class="error">'.$_['errors'][$p['pr_id']].'</label>')?>
		</div>
			<?php } ?>
		<br />
		Download folder:
		<input type="text" id="importer_download_folder" name="importer_download_folder" value="<?php print(!is_null($_['us_download_folder'])?$_['us_download_folder']:''); ?>" placeholder="/Data"/>
		<br />
		<br />
		<label id="importer_settings_submit" class="button">Save</label>&nbsp;<label id="importer_msg"></label>
	</fieldset>
		
</form>

<div id="oc_pw_dialog">
<label class="nowrap">Master password to decrypt stored provider passwords: </label><input type="password" id="importer_pw" />
</div>
