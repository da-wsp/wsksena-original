	<section id="main" class="column">
		<?php
			if (isset($Message)) {
				echo '<h4 class="',$Message['Class'],'">',$Message['Message'],'</h4>';
			}
		?>
		<article class="module width_full">
		<header><h3 class="tabs_involved">Список таблиц</h3>
		<ul class="tabs">
   			<li><a href="#tab1">Таблицы</a></li>
    		<li><a href="#tab2">Списки</a></li>
		</ul>
		</header>

		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   					<th></th> 
    				<th>Название таблицы</th> 
    				<th>Колонок</th>
    				<th>Записей</th> 
					<th>Действия</th>
				</tr> 
			</thead> 
			<tbody> 
				<?php
					foreach ($Tables as $key=>&$Table) {
						?>
						<tr> 
   							<td><?=$key+1?></td> 
    						<td><?=$Table['Name']?></td>
    						<td><?=$Table['Columns']?></td> 
    						<td><?=$Table['Count']?></td>
							<td>
								<input 
									onclick="location.href='<?=site_url("$Controller/create/list/$Table[Name]")?>'" 
									type="image" src="/admin/style/images/icn_categories.png" 
									title="Создать список"
								/>
							</td> 
						</tr> 
						<?php
					}
				?>
			</tbody> 
			</table>
			</div><!-- end of #tab1 -->
			
			<div id="tab2" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   					<th></th> 
    				<th>Название</th> 
    				<th>Таблица</th> 
    				<th>Действия</th>
				</tr> 
			</thead> 
			<tbody> 
				<?php
					foreach ($Lists as $List) {
				?>
					<tr> 
   						<td><?=$List['Id']?></td> 
    					<td><?=$List['Name']?></td> 
    					<td><b><?=$List['Tbl']?></b></td>
    					<td>
    						<input 
    							onclick="location.href='<?=site_url("$Controller/edit/list/$List[Id]")?>'"
    							type="image" 
    							src="/admin/style/images/icn_edit.png" 
    							title="Редактировать">
    						<input 
    							onclick="location.href='<?=site_url("$Controller/delete/list/$List[Id]")?>'"
    							type="image" 
    							src="/admin/style/images/icn_trash.png" 
    							title="Удалить">
    					</td>
					</tr> 
				<?php
					}
				?>
				
			</tbody> 
			</table>

			</div><!-- end of #tab2 -->
			
		</div><!-- end of .tab_container -->
		
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