	<section id="main" class="column">
		<?php
			if (isset($Message)) {
				echo '<h4 class="',$Message['Class'],'">',$Message['Message'],'</h4>';
			}
		?>
		<article class="module width_full">
			<form method="post" action="?submit" enctype="multipart/form-data">
			<header><h3>Добавить новую запись</h3></header>
				<div class="module_content">
						<?php
							foreach ($Columns as $key=>&$Column) {
								if ($Column['ShowInForm']=='true') {
						?>
							<fieldset>
								<label><?=$Column['Name']?></label>
								<?php
									switch ($Column['Input']) {
										case 'select':
											echo '<select name="'.$Column['Field'].'" '.($Column['Required']=='true'?'required':null).'>';
												if (!empty($Column['SetEnum'])) {
													$data = explode(',',$Column['SetEnum']);

													foreach ($data as &$val) {
														$tmp = explode(':',$val);
														echo '<option value="'.$tmp[0].'">'.$tmp[1];
													}
												}
											echo '</select>';
											break;
										case 'checkboxes':
												$data = explode(',',$Column['SetEnum']);
												foreach ($data as &$val) {
													$tmp = explode(':',$val);
													echo '<input type="checkbox" name="'.$Column['Field'].'[]" value="'.$tmp[0].'">'.$tmp[1];
												}
											break;
										case 'radio':
												$data = explode(',',$Column['SetEnum']);
												foreach ($data as &$val) {
													$tmp = explode(':',$val);
													echo '<input '.($Column['Required']=='true'?'required':null).' type="radio" name="'.$Column['Field'].'" value="'.$tmp[0].'">'.$tmp[1];
												}
											break;
										case 'checkbox':
												$data = explode(':',$Column['SetEnum']);
												echo '<input type="checkbox" name="'.$Column['Field'].'" value="'.$data[0].'">'.$data[1];
											break;
										case 'number':
											echo '<input '.($Column['Required']?'required':null).' type="number"
												'.(!empty($Column['Max'])
													?'max="'.$Column['Max'].'"'
													:null).' '
												.(!empty($Column['Min'])
													?'min="'.$Column['Min'].'"'
													:null).' 
												'.(!empty($Column['Step'])
													?'step="'.$Column['Step'].'"'
													:null).' 
												'.(!empty($Column['Def'])
													?'value="'.$Column['Def'].'"'
													:null).'
											 />';
											break;
										case 'range':
											echo $Column['Min'].'<input type="range"
												'.(!empty($Column['Max'])
													?'max="'.$Column['Max'].'"'
													:null).' '
												.(!empty($Column['Min'])
													?'min="'.$Column['Min'].'"'
													:null).' 
												'.(!empty($Column['Step'])
													?'step="'.$Column['Step'].'"'
													:null).' 
												'.(!empty($Column['Def'])
													?'value="'.$Column['Def'].'"'
													:null).'
											 />'.$Column['Max'];
											break;
										case 'wysiwyg':
											echo 
											"<textarea name='".$Column['Field']."' id='area'
												".(!empty($Column['Max'])
													?"maxlength='$Column[Max]'"
													:null)." "
												.(!empty($Column['Min'])
													?"minlength='$Column[Min]'"
													:null
												)." "
												.(!empty($Column['Regular'])
													?"pattern='$Column[Regular]'"
													:null)."
												>$Column[Def]</textarea>";
											break;
										case 'textarea':
											echo 
											"<textarea ".($Column['Required']=='true'?'required':null)." name='".$Column['Field']."' rows='10' 
												".(!empty($Column['Max'])
													?"maxlength='$Column[Max]'"
													:null)." "
												.(!empty($Column['Min'])
													?"minlength='$Column[Min]'"
													:null
												)." "
												.(!empty($Column['Regular'])
													?"pattern='$Column[Regular]'"
													:null)."
												>$Column[Def]</textarea>";
											break;
										case 'text':
											echo 
											"<input ".($Column['Required']?'required':null)." type='text' name='".$Column['Field']."' 
												".(!empty($Column['Max'])
													?"maxlength='$Column[Max]'"
													:null)." "
												.(!empty($Column['Min'])
													?"minlength='$Column[Min]'"
													:null
												)." "
												.(!empty($Column['Regular'])
													?"pattern='$Column[Regular]'"
													:null)."
												value='$Column[Def]' 
											/>";
											break;
										case 'file':
											echo '<input '.($Column['Required']=='true'?'required':null).' type="file" name="'.$Column['Field'].'">';
											echo '<input type="hidden" name="'.$Column['Field'].'_Dir" value="'.$Column['Def'].'">';
											break;
										default:
											echo "<input ".($Column['Required']=='true'?'required':null)."
												name='$Column[Field]' 
												type='$Column[Input]' 
												value='".$Column['Def']."' 
												/>";
											break;
									}
								?>
							</fieldset>
						<?php
								}
							}
						?>
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Добавить запись" class="alt_btn">
				</div>
			</footer>
		</form>
		</article><!-- end of post new article -->
	</section>


</body>