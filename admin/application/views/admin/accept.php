
	<section id="main" class="column">
		<article class="module width_full">
		<header><h3 class="tabs_involved">'<?=$Name?>'</h3>
		<ul class="tabs"><?php
				$i = 1;
				foreach ($Columns as $key=>&$Column) {
					echo '<li><a href="#tab',$i,'">',$key,'</a></li>';
					$i++;
				}
			?></ul>
		</header>
		<form method="post" action="<?=site_url("$Controller/create/submit/$Table")?>">
		<input type="hidden" name="name" value="<?=$Name?>" />
		<div class="tab_container">
			<?php
				$i = 1;
				foreach ($Columns as $key=>&$Column) {
			?>
			<input type="hidden" name="inputs[<?=$key?>]" value="<?=$Column['Input']?>" />
			<div id="tab<?=$i?>" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
					<th>Атрибут</th>
    				<th>Определение</th> 
    				<th><th>
				</tr> 
			</thead> 
			<tbody> 
				<tr>
					<td>
						Название поля:
					</td>
					<td><input name="names[<?=$key?>]" value="<?=$Column['Name']?>" /></td>
				</tr>
				<tr>
					<td>
						Поле: 
					</td>
					<td><i><?=$key?></i> <u><?=$Column['Type']?></u></td>
				</tr>
				<tr>
					<td>
						Пример ввода:
					</td>
					<td>
						<?php
								switch($Column['Input']) {
									case 'textarea':
										echo '<textarea>',$Column['Input'],'</textarea>';
									break;
									case 'select':
										echo '<select>';
											echo '<option value="true">',$Column['Input'];
										echo '</select>';
									break;
									case 'checkboxes':
										echo '<input type="checkbox" />1';
										echo '<input type="checkbox" />2';
									break;
									default:
										echo '<input type="',$Column['Input'],'" value="',$Column['Input'],'">';
									break;
								}
						?>
					</td>
				</tr>
				<tr>
					<td>
						Минимальное значение: 
					</td>
					<td>
						<?=in_array($Column['Input'],$Inputs['Min'])?
							'<input type="number" name="min['.$key.']" />'
							:'<input type="hidden" name="min['.$key.']" value="" />'?>
					</td>
				</tr>
				<tr>
					<td>
						Максимальное значение: 
					</td>
					<td>
						<?=in_array($Column['Input'],$Inputs['Max'])?
							'<input type="number" name="max['.$key.']" value="'
							.(is_numeric($Column['Type_Args'])?
								$Column['Type_Args']
								:null
							).'" />'
							:'<input type="hidden" name="max['.$key.']" value="" />'
						?>
					</td>
				</tr>
				<tr>
					<td>Шаг: </td>
					<td>
						<?=in_array($Column['Input'],$Inputs['Step'])?
							'<input type="number" name="step['.$key.']" />'
							:'<input type="hidden" name="step['.$key.']" value="" />'
						?>
					</td>
				</tr>
				<tr>
					<td>SET\ENUM</td>
					<td>
						<?=in_array($Column['Input'],$Inputs['Set'])?
							'<textarea name="setenum['.$key.']">'.$Column['Set'].'</textarea>'
							:'<input type="hidden" name="setenum['.$key.']" value="" />'
						?></td>
					<td>
				</tr>
				<tr>
					<td>SQL</td>
					<td>
						<?=in_array($Column['Input'],$Inputs['Sql'])?
							'<textarea name="sqlquery['.$key.']"></textarea>'
							:'<input type="hidden" name="sqlquery['.$key.']" value="" />'
						?>
					</td>
				</tr>
				<tr>
					<td>Регулярное выражение: </td>
					<td>
						<input name="regular[<?=$key?>]" />
					</td>
				</tr>
				<tr>
					<td>По умолчанию: </td>
					<td><input name="def[<?=$key?>]" value="<?=$Column['Default']?>" /></td>
				</tr>
				<tr>
					<td>Заполнено: </td>
					<td>
						<input 
							type="checkbox"
							name="required[<?=$key?>]" 
							<?=$Column['Required']?'checked readonly':null?>
						/>
					</td>
				</tr>
				<tr>
					<td>
						Отображать в списке:
					</td>
					<td>
						<input type="checkbox" name="showinlist[<?=$key?>]" value="true" checked>
					</td>
				</tr>
				<tr>
					<td>
						Отображать в форме:
					</td>
					<td>
						<input type="checkbox" name="showinform[<?=$key?>]" value="true" checked>
					</td>
				</tr>
			</tbody> 
			</table>
			</div><!-- end of #tab1 -->
			<?php
					$i++;
				}
			?>
			
		</div><!-- end of .tab_container -->
		<footer>
				<div class="submit_link">
					<!--<input type="checkbox" name="addform" />
					<img src="/style/images/icn_new_article.png" title="Форма добавления" />
					<input type="checkbox" name="editform" />
					<img src="/style/images/icn_edit.png" title="Форма редактирования" />-->
					<input type="checkbox" name="adding" value="true" checked>Добавление
					<input type="checkbox" name="editing" value="true" checked>Редактирование
					<input type="checkbox" name="deleting" value="true" checked>Удаление
					<input type="submit" value="Создать" class="alt_btn" />
				</div>
			</footer>
			
			</form>
		</article><!-- end of content manager article -->
		
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