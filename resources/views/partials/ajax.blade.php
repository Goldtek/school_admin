<script>
$(document).ready(function(e){
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    
      // $('[data-toggle="tooltip"]').tooltip(); //tooltip
                $('[data-tooltip="true"]').tooltip();
    
    $('.Pix').click(function(e){
        $('.picturebox').slideToggle();
    }) 
    
    $('#btnresume').click(function(e){
        $('.uploadresume').slideToggle();
    });
    
   
   
});
    


    
   $(document).on('click', '.panel-heading span.clickable', function(e){
    var $this = $(this);
	if(!$this.hasClass('panel-collapsed')) {
		$this.parents('.panel').find('.panel-body').slideUp();
		$this.addClass('panel-collapsed');
		$this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
	} else {
		$this.parents('.panel').find('.panel-body').slideDown();
		$this.removeClass('panel-collapsed');
		$this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
	}
})
    </script>