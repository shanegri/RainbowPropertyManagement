<?php

echo '<hr><div class="text-center">';
	echo '<h3><small>I hereby make application for an apartment and certify that
	this information is correct. I authorize you to contact any
	references that I have listed. I also authorize you to obtain
	my consumer credit report from your credit reporting agency,
	which will appear as an inquiry on my file.</small></h3>';
	$Form->showInput('agreement');
echo '</div>';

echo '
<br>
<br>
<div class="text-center">
<h3><i><small>Please review before submitting. You will not be able to make changes after submission.</small></i></h3>
<button type="submit" name="submit">Submit</button>
</div> ';

 ?>
