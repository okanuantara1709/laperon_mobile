	<!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url() ?>assets/js/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- panggil main.js -->
	<script src="<?php echo base_url() ?>assets/js/main.js"></script>
	<!-- <panggil datepicker> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.14.1/moment.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-range/2.2.0/moment-range.min.js"></script>   
    <script src="<?php echo base_url() ?>assets/js/plugin/datetimepicker/bootstrap-datetimepicker.min.js"></script>
	<!-- panggil select2 -->
	<script src="<?php echo base_url() ?>assets/js/plugin/select2/js/select2.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jspdf.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/html2canvas.min.js">
    </script>

    <script>
    $(document).ready(function(){
        $(".dropdown").click(function(){
            $(".dropdown-menu").slideToggle();
        });
    });
    </script>	
 
	<script>
	
	$(document).ready(function(){			
    	
    	//alert(tomorow);
		$(".date").datetimepicker({
			format:"DD/MM/YYYY"
		});

		$(".code_coa_js").click(function(){
			var coa = $(this).val();
			$(".cod_akun_addon").html(coa+".");

		});
	
		// (function() {
		//  var
		//   form = $('.box'),
		//   cache_width = form.width(),
		//   a4 = [595.28, 841.89]; // for a4 size paper width and height
		//  // a4 = [595.28, 841.89];
		 $('#create_pdf').on('click', function() {
		 	$('#create_pdf').css('display','none');	
		  $('body').scrollTop(0);
		  exportTwo()
		  $('#create_pdf').css('display','inline');
		 });
		//  //create pdf
		//  function createPDF() {
		//   getCanvas().then(function(canvas) {
		//    var
		//     img = canvas.toDataURL("image/png"),
		//     doc = new jsPDF({
		//      unit: 'px',
		//      format: 'a4'
		//     });
		//    doc.addImage(img, 'JPEG', 20, 20);
		//    var title = $(".box-header h3").text();
		//    doc.save(title+'.pdf');
		//    form.width(cache_width);
		//   });
		//  }

		//  // create canvas object
		//  function getCanvas() {
		//   form.width((a4[0] * 1.33333) - 80).css('max-width', 'none');
		//   return html2canvas(form, {
		//    imageTimeout: 2000,
		//    removeContainer: true
		//   });
		//  }

		// }());

		function exportOne(){
		    var pdf = new jsPDF('l','px'),
		        source = $('.box')[0];
		    
		    pdf.addHTML(
		          source, 0, 0, {
		              pagesplit: true
		          },
		          function(dispose){
		              pdf.save('test.pdf');
		          }
		      );
		}

		function exportTwo() {
		    var canvasToImage = function(canvas){
		        var img = new Image();
		        var dataURL = canvas.toDataURL('image/png');
		        img.src = dataURL;
		        return img;
		    };
		    var canvasShiftImage = function(oldCanvas,shiftAmt){
		        shiftAmt = parseInt(shiftAmt) || 0;
		        if(!shiftAmt){ return oldCanvas; }
		        
		        var newCanvas = document.createElement('canvas');
		        newCanvas.height = oldCanvas.height - shiftAmt;
		        newCanvas.width = oldCanvas.width;
		        var ctx = newCanvas.getContext('2d');
		        
		        var img = canvasToImage(oldCanvas);
		        ctx.drawImage(img,0, shiftAmt, img.width, img.height, 0, 0, img.width, img.height);
		        
		        return newCanvas;
		    };
		    
		    
		    var canvasToImageSuccess = function(canvas){
		        var pdf = new jsPDF('l','px'),
		            pdfInternals = pdf.internal,
		            pdfPageSize = pdfInternals.pageSize,
		            pdfScaleFactor = pdfInternals.scaleFactor,
		            pdfPageWidth = pdfPageSize.width,
		            pdfPageHeight = pdfPageSize.height,
		            totalPdfHeight = 0,
		            htmlPageHeight = canvas.height,
		            htmlScaleFactor = canvas.width / (pdfPageWidth * pdfScaleFactor),
		            safetyNet = 0;
		        
		        while(totalPdfHeight < htmlPageHeight && safetyNet < 15){
		            var newCanvas = canvasShiftImage(canvas, totalPdfHeight);
		            pdf.addImage(newCanvas, 'png', 0, 0, pdfPageWidth, 0, null, 'NONE');
		            
		            totalPdfHeight += (pdfPageHeight * pdfScaleFactor * htmlScaleFactor);
		            
		            if(totalPdfHeight < htmlPageHeight){
		                pdf.addPage();
		            }
		            safetyNet++;
		        }
		        
		        pdf.save('test.pdf');
		    };
		    
		    html2canvas($('.box')[0], {
		        onrendered: function(canvas){
		            canvasToImageSuccess(canvas);
		        }
		    });
		}

		// $(".transaksi_clone").find(".transaksi_list").clone().appendTo(".transaksi_group");
		// $(".selectbox").select2();	

	 //    $(".tambah").click(function(){	  
	 //  		 $(".selectbox").select2('destroy');  	
	 //    	$(".transaksi_clone").find(".transaksi_list").clone().appendTo(".transaksi_group");
	 //    	$(".selectbox").select2();
	 //    });
	        

	 //    $(document).on("click",".hapus-transaksi",function(){
	 //       $(this).closest(".transaksi_list").remove();
	 //    });
	});
	</script>
</body>
</html>