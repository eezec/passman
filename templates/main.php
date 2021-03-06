<?php
\OCP\Util::addStyle('passman', 'jstree-theme/style');
\OCP\Util::addscript('passman', 'jstree.min');

\OCP\Util::addscript('passman', 'ckeditor/ckeditor');

\OCP\Util::addscript('passman', 'tag-it.min');
\OCP\Util::addStyle('passman', 'jquery.tagit');
\OCP\Util::addStyle('passman', 'tagit.ui-zendesk');

\OCP\Util::addStyle('passman', 'simplePassMeter/simplePassMeter');
\OCP\Util::addscript('passman', 'jquery.simplePassMeter.min');

\OCP\Util::addscript('passman', 'encryption');
\OCP\Util::addscript('passman', 'jsStorage');

\OCP\Util::addscript('passman', 'importers/teampass');
\OCP\Util::addscript('passman', 'importers/keepass2');
\OCP\Util::addscript('passman', 'importers/lastpass');

\OCP\Util::addscript('passman', 'zeroClipboard/zeroClipboard');

\OCP\Util::addStyle('passman', 'ocPassman');
\OCP\Util::addscript('passman', 'date');
\OCP\Util::addscript('passman', 'scrollIntoView');
\OCP\Util::addscript('passman', 'ocPassman');

?>
<div id="app">
	<div id="app-navigation">
	 <div id="searchTagContainer">
	 	<input type="text" id="searchTags" />
	 <span>Related Tags</span>
	 </div>
	 <ul id="tagList">
	 	
	 </ul>
	  <div data-id="trashbin" class="nav-trashbin"><i class="icon-delete icon"></i><a href="#">Deleted passwords</a></div>
	 
	  <div id="app-settings">
			<div id="app-settings-header">
				<button class="settings-button" data-apps-slide-toggle="#app-settings-content"></button>
			</div>
			<div id="app-settings-content">
					<p class="settings link">Settings</p>
					<p class="import link">Import data</p>
					<div id="sessionTimeContainer" style="display: none;">
						<h2>Session time</h2>
						<em>Your session will expire in:<br /><span id="sessionExpire"></span></em>
					</div>
					<p><a href="#" class="lockSession link">Lock session</a></p>
			</div>
		</div>
  	</div>
	<div id="app-content">
		<div id="topContent">
					<button class="button " id="addItem" disabled="disabled">Create password</button>
					<button class="button" id="editItem" disabled="disabled">Edit item</button>
					<button class="button" id="deleteItem" disabled="disabled">Delete item</button>
					<button class="button" id="restoreItem" disabled="disabled">Restore item</button>
		</div>
		<div id="pwList">
			
		</div>
		<div id="infoContainer">
			<div class="loadingItem"><div><span class="icon-loading icon" style="height: 32px; width: 32px; margin-left: 10px;"></span></div></div>
			<table>
                <tbody><tr>
                    <td valign="top" class="td_title"><span class="ui-icon ui-icon-carat-1-e" style="float: left; margin-right: .3em;">&nbsp;</span>Label :</td>
                    <td>
                        <input type="hidden" id="hid_label" value="">
                        <div id="id_label" style="display:inline;"></div>
                    </td>
                </tr>
                <tr>
                    <td valign="top" class="td_title"><span class="ui-icon ui-icon-carat-1-e" style="float: left; margin-right: .3em;">&nbsp;</span>Description :</td>
                    <td>
                        <div id="id_desc" style="font-style:italic;display:inline;"></div><input type="hidden" id="hid_desc" value="">
                    </td>
                </tr>
                <tr>
                    <td valign="top" class="td_title"><span class="ui-icon ui-icon-carat-1-e" style="float: left; margin-right: .3em;">&nbsp;</span>Password :</td>
                    <td>
                        <div id="id_pw" style="float:left;"></div>
                        <input type="hidden" id="hid_pw" value="">
                    </td>
                </tr>
                <tr>
                    <td valign="top" class="td_title"><span class="ui-icon ui-icon-carat-1-e" style="float: left; margin-right: .3em;">&nbsp;</span>Expires :</td>
                    <td>
                        <div id="id_expires" style="display:inline;"></div>
                    </td>
                </tr>
                <tr>
                    <td valign="top" class="td_title"><span class="ui-icon ui-icon-carat-1-e" style="float: left; margin-right: .3em;">&nbsp;</span>Account :</td>
                    <td>
                        <div id="id_login" style="float:left;"></div>
                    </td>
                </tr>
                <tr>
                    <td valign="top" class="td_title"><span class="ui-icon ui-icon-carat-1-e" style="float: left; margin-right: .3em;">&nbsp;</span>Email :</td>
                    <td>
                        <div id="id_email" style="display:inline;"></div>
                    </td>
                </tr>
                <tr>
                    <td valign="top" class="td_title"><span class="ui-icon ui-icon-carat-1-e" style="float: left; margin-right: .3em;">&nbsp;</span>URL :</td>
                    <td>
                        <div id="id_url" style="display:inline;"></div>
                    </td>
                </tr>
                <tr>
                    <td valign="top" class="td_title"><span class="ui-icon ui-icon-carat-1-e" style="float:left; margin-right:.3em;">&nbsp;</span>Files &amp; Images :</td>
                    <td>
                        <div id="id_files" style="display:inline;font-size:11px;"></div>
                        <div id="dialog_files" style="display: none;">
							<img id="fileImg" /><br />
							<span id="downloadImage"></span>
                        </div>
                    </td>
                </tr>

                </tbody></table>
                <table id="customFieldsTable">
                	
                </table>
		</div>
	</div>
</div>
<div id="editAddItemDialog" style="display: none;">
   <form method="post" name="new_item" id="editNewItem">
   	<input type="hidden" id="item_id" name="item_id" value=""/>
   	<input type="hidden" id="folderid" name="folderid" value=""/>
   	<input type="hidden" id="expire_time" name="expire_time" value=""/>
    <div id="item_tabs">
        <ul role="tablist">
            <li><a href="#tabs-01">Definition</a></li>
            <li><a href="#tabs-02">Password &amp; Visibility</a></li>
            <li><a href="#tabs-03">Files &amp; Images</a></li>
            <li><a href="#tabs-04">Custom fields</a></li>

        </ul>
        <div id="tabs-01">
            <label>Label : </label> 
            <input type="text" name="label" id="label" autocomplete="off"><br />
            <label>Description : </label>
            <span id="desc_span">
                <textarea rows="4" name="desc" id="desc"></textarea>
            </span>
            <br>
            <label for="item_login" class="label_cpm">Login (if needed) : </label>
            <input type="text" name="account" id="account" autocomplete="off">
            <label for="" class="label_cpm">Email : </label>
            <input type="text" name="email" id="email" autocomplete="off">
            <label for="" class="label_cpm">URL : </label>
            <input type="text" name="url" id="url" autocomplete="off">
            <label for="item_login" class="label_cpm">Tags : </label>
            <input type="text" name="tags" id="tags" autocomplete="off">
        </div>
        <div id="tabs-02">
          	<div>
                <label>Required complexity</label>
                <span id="complex_attendue">Not defined</span>
            </div>
            <label class="label_cpm">Password :</label>
            <input type="password" id="pw1" name="pw1" autocomplete="off">
            <label for="" class="label_cpm">Confirm :</label>
            <input type="password" name="pw2" id="pw2" autocomplete="off">
            <label for="" class="label_cpm">Override required complexity : </label>
            <input type="checkbox" id="override">
			<div id="pwTools">
                <span id="custom_pw">
                    <input type="checkbox" id="pw_numerics" checked="checked"><label for="pw_numerics">123</label>
                    <input type="checkbox" id="pw_maj" checked="checked"><label for="pw_maj">ABC</label>
                    <input type="checkbox" id="pw_symbols"><label for="pw_symbols">@#&amp;</label>
                    &nbsp;<label for="pw_size">Size : </label>
                    &nbsp;<span ><input type="number" size="2" id="pw_size" value="8" style="font-size:10px;" ></span>
                </span>
                <span class="icon-history icon" title="Generate password"></span>
                <span class="icon-paste icon" title="Copy password"></span>
                <span title="Mask/Display the password" class="icon icon-toggle"></span>
                <br /><div id="passwordStrengthDiv"></div>
            </div>
         </div>
        </form>
        <div id="tabs-03" >
                <form enctype="multipart/form-data" id="fileUploader">
				    <input name="uploadFile" type="file" id="fileInput" multiple="true"/>
					<h2>Files:</h2>
					<ul id="fileList">
						
					</ul>				  
				  
				</form>
        </div>
        <div id="tabs-04" >
                <h1>Add field</h1>
                <table style="width: 100%;" cellpadding="5">
                	<tr>
                		<td>
                			<input name="customFieldName" id="customFieldName" type="text" placeholder="Enter field name"/>
                		</td>
                		<td>
			                <input name="customFieldValue" id="customFieldValue" type="text" placeholder="Enter field value"/>
                		</td>
                		<td class="addCFieldRow"><span id="addCField" class="icon-add icon"></span></td>
                	</tr>
                </table>
                <h1>Existing fields</h1>
                <table id="existingFields" style="width: 100%;">
                	
                </table>
        </div>
    <button class="button cancel">Cancel</button>
    <button class="button save">Save</button>
    </div>
</div>
  
 <div id="tagSettingsDialog" style="display: none;">
 	<form id="tagSettings">
 	<input type="hidden" name="tag_id"  id="tag_id"/>
 	<label for="edit_folder_complexity" class="label_cpm">Label: </label><br />
 	<input type="text" name="tag_label" id="tag_label" /><br />
 	<label for="edit_folder_complexity" class="label_cpm">Required complexity: </label><br />
    <select id="min_pw_strength" name="min_pw_strength">
                <option value="">---</option><option value="0">Very weak</option><option value="25">Weak</option><option value="50">Medium</option><option value="60">Strong</option><option value="70">Very strong</option><option value="80">Heavy</option><option value="90">Very heavy</option>
    </select><br />
    <label for="renewal_period" class="label_cpm">Renewal period (days): </label><br />
    <input type="text" name="renewal_period" id="renewal_period" >
    </form>
 </div> 

<div id="encryptionKeyDialog" style="display: none;">
	<p>Enter your encryption key.<br />If this if the first time you use Passman, this key will be used for encryption your passwords</p>
	<input type="password" id="ecKey" style="width: 150px;" /><br />
	<input type="checkbox" id="ecRemember" name="ecRemember"/><label for="ecRemember">Remember this key for</label> 
	<select id="rememberTime">
		<option value="15">15 Minutes</option>
		<option value="15">30 Minutes</option>
		<option value="60">60 Minutes</option>
		<option value="180">3 Hours</option>
		<option value="480">8 Hours</option>
		<option value="1440">1 Day</option>
		<option value="10080">7 Days</option>
		<option value="43200">30 Days</option>
	</select>
	
</div>
<div id="notificationContainer">
	
</div>
  