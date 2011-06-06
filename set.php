<?php if ( ! defined('BASEPATH')) exit('ERROR 404: Page not found');
class Set extends Model {
		
	function errorMsg($msg) {
		$msg = '<div class="errorMsg">'.$msg.'</div>';
		return $msg;
	}
	
	function successMsg($msg) {
		$msg = '<div class="successMsg">'.$msg.'</div>';
		return $msg;
	}
	
	function navigation($nav) {
		$data = array('navigation'	=> $nav
					  );
		$this->session->set_userdata($data);
		return $this;
	}
	
	function jquery() {
		$jquery = '<script type="text/javascript" src="'.base_url().'js/jquery-1.4.2.js"></script>';
		return $jquery;
	}
	
	
	function date_picker() {
		$html = '<link type="text/css" href="'.base_url().'js/themes/base/jquery.ui.all.css" rel="stylesheet" />
					<script type="text/javascript" src="'.base_url().'js/jquery-1.4.2.js"></script>
					<script type="text/javascript" src="'.base_url().'js/ui/jquery.ui.core.js"></script>
					<script type="text/javascript" src="'.base_url().'js/ui/jquery.ui.widget.js"></script>				
					<script type="text/javascript" src="'.base_url().'js/ui/jquery.ui.datepicker.js"></script>
					<script type="text/javascript">
					$(function() {
						$(\'#datepicker\').datepicker({
							showButtonPanel: true,
							dateFormat:	\'yy-mm-dd\'
						});
					});
					</script>
					<style type="text/css">
					.ui-datepicker { font-size:11px; }
					</style>';
		return $html;
	}
	
	function confirm_dialog() {
		
		$dlg = '';
		$s   = 10;
		if($this->uri->segment(3)=='withdraw_ewallet' || $this->uri->segment(3)=='view_ewallet') {
			for($i=1;$i<=$s;$i++) {
				$dlg .= ' var dlg = $("#dialog'.$i.'").dialog({
									  modal: true,
									  height: 300,
									  width: 700,
									  autoOpen: false
							});
			
							$("#opener'.$i.'").click(function() {
								$(\'#dialog'.$i.'\').dialog(\'open\');
								 $(\'#dialog'.$i.'\').dialog(\'option\', \'buttons\', { 
								"Ok": function() { $(this).dialog("close"); }
								 });
								return false;
							});
							dlg.parent().appendTo($("#frmWithdraw"));';
			}
		}
	
		$html = '<link type="text/css" href="'.base_url().'js/themes/base/jquery.ui.all.css" rel="stylesheet" />
				<script type="text/javascript" src="'.base_url().'js/jquery-1.4.2.js"></script>
				<script type="text/javascript" src="'.base_url().'js/external/jquery.bgiframe-2.1.1.js"></script>
				<script type="text/javascript" src="'.base_url().'js/ui/jquery.ui.core.js"></script>					
				<script type="text/javascript" src="'.base_url().'js/ui/jquery.ui.widget.js"></script>
				<script type="text/javascript" src="'.base_url().'js/ui/jquery.ui.mouse.js"></script>
				<script type="text/javascript" src="'.base_url().'js/ui/jquery.ui.button.js"></script>
				<script type="text/javascript" src="'.base_url().'js/ui/jquery.ui.draggable.js"></script>
				<script type="text/javascript" src="'.base_url().'js/ui/jquery.ui.position.js"></script>
				<script type="text/javascript" src="'.base_url().'js/ui/jquery.ui.dialog.js"></script>
				<script type="text/javascript">
				$(function(){
					    $("#confirmDelete").dialog({
								  modal: true,
								  height: 190,
								  width: 400,
								  autoOpen: false
						}); 
						
						'.$dlg.'
 
				  });
					
					function confirmDelete(name, urlid, msg) {
					  var delUrl = "'.site_url().'" + urlid;
					  $(\'#confirmDelete\').html(msg + ": \'" + name + "\'");
					  $(\'#confirmDelete\').dialog(\'option\', \'buttons\', { 
						"No": function() { $(this).dialog("close"); },
						"Yes": function() { window.location.href = delUrl; }  });
					  $(\'#confirmDelete\').dialog(\'open\');
					}												

				</script>';
		return $html;	
	}
	
		
    
	function pagination($base_url, $total_rows, $per_page, $cur_page){
		$this->load->library('paging');
		
		$config  =  array('base_url'		=> $base_url, 
						  'total_rows'  	=> $total_rows, 
						  'per_page'	 	=> $per_page, 
						  'cur_page'	 	=> $cur_page, 
						  'first_link'   	=> img(array('src'=>base_url().'images/start_off.gif' ,'border'=>0,'class'=>'paging_img')).'Start',
						  'next_link'		=> img(array('src'=>base_url().'images/next_off.gif','border'=>0,'class'=>'paging_img')).'Next',
						  'prev_link'		=> img(array('src'=>base_url().'images/previous_off.gif','border'=>0,'class'=>'paging_img')).'Previous',
						  'last_link'		=> img(array('src'=>base_url().'images/end_off.gif','border'=>0,'class'=>'paging_img')).'End',
						  'first_tag_open'	=> ' <span class="text_small"> ',
						  'first_tag_close'	=> ' </span> ',
						  'last_tag_open'	=> ' <span class="text_small"> ',
						  'last_tag_close'	=> ' </span> ',
						  'next_tag_open'	=> ' <span class="text_small"> ', 
						  'next_tag_close'	=> ' </span> ',
						  'prev_tag_open'	=> ' <span class="text_small"> ',
						  'prev_tag_close'	=> ' </span> ',
						  'dropdown_class'  => '',
		                  'link_class'      => 'text_small'
		                  );
		                 
		$this->paging->initialize($config);

		$pagination  = $this->paging->first_link();
		$pagination .= $this->paging->prev_link();
		$pagination .= " <span class=\"text_small\">".$this->paging->page_details()."</span> ";
		$pagination .= $this->paging->next_link();
		$pagination .= $this->paging->last_link();
		return $pagination;
	}

	function tabs() {
		$html = '<link type="text/css" href="'.base_url().'js/themes/base/jquery.ui.all.css" rel="stylesheet" />
				<script type="text/javascript" src="'.base_url().'js/jquery-1.4.2.js"></script>
				<script type="text/javascript" src="'.base_url().'js/external/jquery.bgiframe-2.1.1.js"></script>
				<script type="text/javascript" src="'.base_url().'js/ui/jquery.ui.core.js"></script>					
				<script type="text/javascript" src="'.base_url().'js/ui/jquery.ui.widget.js"></script>
				<script type="text/javascript" src="'.base_url().'js/ui/jquery.ui.mouse.js"></script>
				<script type="text/javascript" src="'.base_url().'js/ui/jquery.ui.button.js"></script>
				<script type="text/javascript" src="'.base_url().'js/ui/jquery.ui.draggable.js"></script>
				<script type="text/javascript" src="'.base_url().'js/ui/jquery.ui.position.js"></script>
				<script type="text/javascript" src="'.base_url().'js/ui/jquery.ui.tabs.js"></script>
				<script type="text/javascript">
				$(function(){
					    $(\'#tabs\').tabs(); 
				  });
																	

				</script>';
		return $html;	
	}
	
	function check_login() {
		if($this->session->userdata('admin_loggedin') || $this->session->userdata('loggedin')) {
			return true;
		} else {
			return false;
		} 
	}
}
?>