<?php if($this->session->flashdata('access') == 'ok'){?>onload="thanhcong()"<?php } ?>
<script language="JavaScript">
  function thanhcong(){
    $.toast({
      heading: 'Success',
      text: '<?php echo $this->session->flashdata('messenger'); ?>',
      showHideTransition: 'slide',
      icon: 'success',
      position: 'bottom-center',
      hideAfter: 5000
    })
  }
  function thatbai(){
    $.toast({
      heading: 'Failure',
      text: '<?php echo $this->session->flashdata('messenger'); ?>',
      showHideTransition: 'slide',
      icon: 'error',
      position: 'bottom-center',
      hideAfter: 5000
    })
  }
</script>
<script type="text/javascript">
 $(document).ready(function()
 { 
  $('.loader').hide();
});
</script>