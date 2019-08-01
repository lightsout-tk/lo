<?php $status = isset($_GET['status']) ? $_GET['status'] : '';  
  if(!empty($status)) : 
?>
<div class="text-white bg-primary p-3">
    <span>
        <i class="icon-info s-18 mr-3"></i>
        <?php

        if($status == 'new'){
          esc_html_e('Your track will be published once approved by
          admin.','rekord');
        }elseif($status == 'updated'){
          esc_html_e('Track Updated','rekord');
        }
?>
    </span>
</div>
<?php endif; ?>