{if $error ne ""}
<p class="form-message error middle">{$error}<br /></p>
{elseif $message ne ""}
<p class="form-message success middle">{$message}<br /></p>
{/if}
<div id="main" class="middle">
    <div id="content-holder">
        <div class="content-title">
        	<h3>{$lang45}</h3>
        </div>                      
                                          
        <div id="content">
            <form id="form-settings" class="page" action="" method="post" enctype="multipart/form-data" name="formsettings">
                <div class="field profile-pic">
                    <h4>{$lang53}</h4>
                    <div class="wrap">
                        <div class="image-wrap">
                        	{insert name=get_member_profilepicture assign=profilepicture value=var USERID=$smarty.session.USERID}
                        	<img id="uploaded_img" src="{$membersprofilepicurl}/{$profilepicture}?{$smarty.now}" alt="avatar" />
                        </div>
                        <input class="file" type="file" name="gphoto"  />
                        <p class="info">{$lang54}</p>
                        <p class="remove-avatar"><label><input type="checkbox" name="remove_avatar" value="1"/>{$lang55}</label></p>
                    </div>
                </div>                
                
                <div class="field colors">
                    <h4>{$lang56}</h4>
                    <div class="wrap">
                        <div class="profile">                        
                        	<a id="color_display" class="color-picker" href="#" style="background-color:#;"><img class="mask" src="{$baseurl}/images/color-mask.png"/></a>                        
                        	<input id="color_picker" type="text" class="text color" style="color:#993366;" name="profile_color" maxlength="6" value="{$p.color1|stripslashes}" />
                        </div>
                    </div>
                    {literal}
                    <script type="text/javascript">
                    $('#color_display').click(function(){
                    $('#color_picker').trigger('focus');
                    });
                    $('#color_picker').change(function(){
                    $('#color_display').css('background-color',"#"+$('#color_picker').val());
                    });
                    </script>
                    {/literal}
                    <p class="info">{$lang57}</p>
                </div>
                <hr/>

                <div class="field">
                    <label><h4>{$lang59}</h4><input type="text" class="text tipped" name="fname" value="{$p.fullname|stripslashes}" maxlength="100" /></label>
                    <p class="info" style="visibility:hidden">{$lang60}</p>
                </div>
                
                <div class="field">
                    <label><h4>{$lang20}</h4><input type="text" class="text tipped" name="email" value="{$p.email|stripslashes}" maxlength="200"/></label>
                    <p class="info" style="visibility:hidden">{$lang61}</p>
                </div>
                <div class="field locale">
                    <h4>{$lang255}</h4>
                    <div class="wrap">
                        <div class="language">
                            <select name="language">
                                <option value="">{$lang64}</option>
								<option  value="vi" {if $p.mylang eq "vi"}selected{/if}>Tiếng Việt</option>
                                <option  value="en" {if $p.mylang eq "en"}selected{/if}>English</option>
                            </select>
                        </div>
                    </div>
                    <p class="info">{$lang66}</p>
                </div>
                <div class="field">
                    <label><h4>{$lang67} / {$lang68}</h4><input type="text" class="text tipped" name="details" value="{$p.description|stripslashes}" maxlength="120"/></label>
                    <p class="info" style="visibility:hidden">{$lang69}</p>
                </div>
                
                <div class="field">
                    <label><h4>{$lang70}</h4><input type="text" class="text tipped" name="website" value="{$p.website|stripslashes}" maxlength="200"/></label>
                    <p class="info" style="visibility:hidden">{$lang71}</p>
                </div>
                <hr />
                <div class="field password">
                    <h4>{$lang72}</h4>
                    <div class="wrap">
                        <div class="first">
                        	<input type="password" class="text tipped" name="new_password" maxlength="32"/>
                        </div>
                        <div class="second">
                        	<input type="password" class="text tipped" name="new_password_repeat" maxlength="32"/>
                        </div>
                    </div>
                    <div class="fix-password">
                    <p class="info" style="visibility:hidden">{$lang72}</p>
                    <p class="info last" style="visibility:hidden">{$lang73}</p>
                    </div>
                </div>
                <hr />
                <div class="field checkbox">
                    <h4>{$lang74}</h4>
                    <ul>                    
                        <li>
                        	<label><input type="checkbox" name="news" value="1" {if $p.news eq "1"}checked="checked"{/if}  />{$lang75}</label>
                        </li>
                    </ul>
                </div>
                <input type="hidden" name="subform" value="1" />
            </form>
            <div class="setting-actions">
            	<a class="deactivate" href="{$baseurl}/delete-account">{$lang76}</a>
                <ul class="buttons">
                	<li><a id="settings_submit" class="button" href="#" onClick="document.formsettings.submit();">{$lang77}</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{$baseurl}/js/jscolor.js"></script>
<div id="footer" class="middle">