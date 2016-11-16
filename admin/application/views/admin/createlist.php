	<section id="main" class="column">
		<form method="post" action="<?=site_url("$Controller/create/accept/$Table")?>">
		<article class="module width_full">
		<header><h3 class="tabs_involved">`<?=$Table?>`</h3>
		<ul class="tabs">
   			<li><a href="#tab1">Поля</a></li>
		</ul>
		</header>

		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   					<th></th> 
    				<th>Поле</th> 
    				<th>Тип</th> 
					<th>Тип ввода</th>
					<th>Null</th>
					<th>По умолчанию</th>
					<th>Комментарий</th>
					<th>Required</th>
				</tr> 
			</thead> 
			<tbody> 
				<?php
					foreach ($Columns as $key=>&$Column) {
						?>
						<input 
							type="hidden" 
							name="default[<?=$Column['Field']?>]" 
							value="<?=$Column['Default']=='Null'?null:$Column['Default']?>" 
						/>
						<input 
							type="hidden" 
							name="types[<?=$Column['Field']?>]" 
							value="<?=$Column['Type']?>" 
						/>
						<input 
							type="hidden" 
							name="names[<?=$Column['Field']?>]" 
							value="<?=$Column['Comment']?>" 
						/>
						<input 
							type="hidden" 
							name="args[<?=$Column['Field']?>]" 
							value="<?=is_string($Column['Type_Args'])?$Column['Type_Args']:null?>" 
						/>
						<input 
							type="hidden" 
							name="set[<?=$Column['Field']?>]" 
							value="<?=is_array($Column['Type_Args'])?implode(':,',$Column['Type_Args']):null?>" 
						/>
						<tr> 
   							<td><input type="checkbox" checked name="check[<?=$Column['Field']?>]"></td> 
							<td>
								<?=!empty($Column['Key'])?"(<b>$Column[Key]</b>)<img src='/admin/style/images/key.png' />":null?>
								<i>
									<?=$Column['Field']?>
								</i>
							</td> 
							<td><u><?=$Column['Type']?></u></td>
							<td>
								<select name="input[<?=$Column['Field']?>]">
									<option value="text">Text
									<option value="textarea">Textarea
									<option value="wysiwyg">Wysiwyg
									<option value="checkbox">Checkbox
									<option value="checkboxes">Checkboxes
									<option value="select">Select
									<option value="file">File
									<option value="radio">Radio
									<option value="number">Number
									<option value="date">Date
									<option value="range">Range
									<option value="email">Email
									<option value="url">Url
									<option value="password">Password
									<option value="color">Color
									<option value="hidden">Hidden
								</select>
							</td>
							<td><?=$Column['Null']?></td>
							<td><i><?=$Column['Default']?></i></td>
							<td>&laquo;<?=$Column['Comment']?>&raquo;</td>
							<td><input 
									type="checkbox" 
									name="required[<?=$Column['Field']?>]" 
									<?=$Column['Null']!="YES"?'checked readonly':null?> 
								/>
							</td>
						</tr> 
						<?php
					}
				?>
			</tbody> 
			</table>
			</div><!-- end of #tab1 -->
		</div><!-- end of .tab_container -->
		<footer>
				<div class="submit_link">
					<!--<input type="checkbox" name="addform" />
					<img src="/style/images/icn_new_article.png" title="Форма добавления" />
					<input type="checkbox" name="editform" />
					<img src="/style/images/icn_edit.png" title="Форма редактирования" />-->
					<input name="name" placeholder="Название списка" required />
					<input type="submit" value="Далее" class="alt_btn" />
				</div>
			</footer>
		</article><!-- end of content manager article -->
		</form>
		<!--<article class="module width_quarter">
			<header><h3>Messages</h3></header>
			<div class="message_list">
				<div class="module_content">
					<div class="message"><p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor.</p>
					<p><strong>John Doe</strong></p></div>
					<div class="message"><p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor.</p>
					<p><strong>John Doe</strong></p></div>
					<div class="message"><p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor.</p>
					<p><strong>John Doe</strong></p></div>
					<div class="message"><p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor.</p>
					<p><strong>John Doe</strong></p></div>
					<div class="message"><p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor.</p>
					<p><strong>John Doe</strong></p></div>
				</div>
			</div>
			<footer>
				<form class="post_message">
					<input type="text" value="Message" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
					<input type="submit" class="btn_post_message" value=""/>
				</form>
			</footer>
		</article><!-- end of messages article -->
		
		<div class="clear"></div>
		<div class="spacer"></div>
	</section>


</body>