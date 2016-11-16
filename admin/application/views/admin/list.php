	<section id="main" class="column">
		<?php
			if (isset($Message)) {
				echo '<h4 class="',$Message['Class'],'">',$Message['Message'],'</h4>';
			}
		?>
		<article class="module width_full">
		<header><h3 class="tabs_involved"><?=$Name?></h3>
		<ul class="tabs">
   			<li><a href="#tab1">Все</a></li>
		</ul>
		</header>

		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
    				<?php
    					$i = 0;
    					$col = [];
    					foreach ($Columns as &$row) {
    						if ($row['ShowInList']=='true') {
    						?>
    							<th><?=$row['Name']?></th>
    						<?php
    							$col[$i] = $row['Field'];
    							$i++;
    						}
    					}
    				?>
    				<th>Действия</th>
				</tr> 
			</thead> 
			<tbody> 
				<?php
					$i = 0;
					foreach ($Roster as &$row) {
						?>
						<tr>
							<?php
								foreach ($col as &$field) {
									?>
										<td>
											<?=$row[$field]?>
										</td>
									<?php
								}
								?>
									<td>
										<?php
											if ($Editing == 'true') {
										?>
											<input 
    											onclick="location.href='<?=site_url("$Controller/edit/item/$Id/$row[Id]")?>'"
    											type="image" 
    											src="/admin/style/images/icn_edit.png" 
    											title="Редактировать">
    									<?php
    										}
    									?>
    									<?php
											if ($Deleting == 'true') {
										?>
    									<input 
    										onclick="location.href='<?=site_url("$Controller/delete/item/$Id/$row[Id]")?>'"
    										type="image" 
    										src="/admin/style/images/icn_trash.png" 
    										title="Удалить">
    									<?php
    										}
    									?>
									</td>
								<?php
							?>
						</tr>
						<?php
						$i++;
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
					<?php
						if ($Adding == 'true') {
							?>
							<input 
								onclick="location.href='<?=site_url("$Controller/add/item/$Id")?>'" 
								type="submit" 
								value="Добавить запись" 
								class="alt_btn" />
							<?php
						}
					?>
				</div>
			</footer>
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