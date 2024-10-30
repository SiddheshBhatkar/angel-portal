<div class="d-sm-flex justify-content-center justify-content-sm-between">
  <span class="text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="https://angel-portal.com" target="_blank">Angel-Portal</a> 2024</span>
</div>
 <!-- partial:partials/_footer.html -->
          
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('js/template.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="{{ asset('vendors/progressbar.js/progressbar.min.js') }}"></script>
    <script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <!-- End custom js for this page-->
    <!-- Flatpickr Js -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- Select 2 Plugin Js -->
    <script src="{{ asset('js/file-upload.js') }}"></script>
    <script src="{{ asset('vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('js/select2.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

    <script type="text/javascript">

        setTimeout(function(){
          $('#global_alert').fadeOut();
        },3000);

        /*flatpickr('#doj', {
          dateFormat: "Y-m-d",
        });*/

        flatpickr('#admission_date', {
          dateFormat: "Y-m-d",
          onChange:function() { return false; }
        });

        
    </script>
    

    <script type="text/javascript">

      $(document).ready(function(){

       $('.btn-weight-info').click(function(){
          $(this).css('color','#2b80ff');
        }); 

        $('.btn-weight-primary').click(function(){
          $(this).css('color','#f2125e');
        }); 

        $('.btn-weight-success').click(function(){
          $(this).css('color','#17c964');
        }); 

        $('.btn-weight-warning').click(function(){
          $(this).css('color','#ff8300');
        });
      });
    </script>
    <script type="text/javascript">

      function isNumber(evt,e) {
        evt = (evt) ? evt : window.event;
   
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }

        return true;
      }

      $('#order_kg').keyup(function(){

        this.value = this.value.replace(/[^0-9\.]/g,'');

        if(this.value > 15){
          $('#order_kg').val('');
        }

     });

      $('#hell_chg').keyup(function(){

        var price = $('#price').val();
        var tc    = $('#transport_chg').val();
        var hc    = $('#hell_chg').val();

        var total = parseInt(price) + parseInt(tc) + parseInt(hc);

        if(isNaN(total) == false){ 

          $('#purchase_total').attr('value',total+"/-");
        }else{

          $('#purchase_total').attr('value','0 /-');
        }

      });

      $('#price').keyup(function(){

        var price = $('#price').val();
        var tc    = $('#transport_chg').val();
        var hc    = $('#hell_chg').val();

        var total = parseInt(price) + parseInt(tc) + parseInt(hc);

        if(isNaN(total) == false){ 

          $('#purchase_total').attr('value',total+"/-");
        }else{

          $('#purchase_total').attr('value','0 /-');
        }

      });

      $('#transport_chg').keyup(function(){

        var price = $('#price').val();
        var tc    = $('#transport_chg').val();
        var hc    = $('#hell_chg').val();

        var total = parseInt(price) + parseInt(tc) + parseInt(hc);

        if(isNaN(total) == false){ 

          $('#purchase_total').attr('value',total+"/-");
        }else{

          $('#purchase_total').attr('value','0 /-');
        }

      });

      $('#hell_chg').keyup(function(){

        var price = $('#price').val();
        var tc    = $('#transport_chg').val();
        var hc    = $('#hell_chg').val();

        var total = parseInt(price) + parseInt(tc) + parseInt(hc);

        if(isNaN(total) == false){ 

          $('#purchase_total').attr('value',total+"/-");
        }else{

          $('#purchase_total').attr('value','0 /-');
        }

      });

    </script> 
    <script type="text/javascript">
          var totalAmount  = new Array();
          var totalWeight  = new Array();
          var cartProducts = new Array();
          var tableData    = new Array();

          var totalSum  = 0;
          var weightSum = 0;

          //200gm - Add To Bill

          $('.thd_btn').click(function(){

            var p_id = $(this).attr('name');


            $('#thd_btn_'+p_id).hide();
            $('#thd_btn_bold_'+p_id).show();

            $('#tfhd_btn_bold_'+p_id).hide();
            $('#tfhd_btn_'+p_id).show();

            $('#fhd_btn_bold_'+p_id).hide();
            $('#fhd_btn_'+p_id).show();

            $('#okg_btn_bold_'+p_id).hide();
            $('#okg_btn_'+p_id).show();
          });

          $('.thd_btn_bold').click(function(){

            var p_id = $(this).attr('name');


            $('#thd_btn_bold_'+p_id).hide();
            $('#thd_btn_'+p_id).show();

          });

          //250 gm - Add To Bill

          $('.tfhd_btn').click(function(){

            var p_id = $(this).attr('name');

            $('#tfhd_btn_'+p_id).hide();
            $('#tfhd_btn_bold_'+p_id).show();

            $('#thd_btn_bold_'+p_id).hide();
            $('#thd_btn_'+p_id).show();

            $('#fhd_btn_bold_'+p_id).hide();
            $('#fhd_btn_'+p_id).show();

            $('#okg_btn_bold_'+p_id).hide();
            $('#okg_btn_'+p_id).show();

          });

          $('.tfhd_btn_bold').click(function(){

            var p_id = $(this).attr('name');

            $('#tfhd_btn_bold_'+p_id).hide();
            $('#tfhd_btn_'+p_id).show();
          });

          //500gm - Add To Bill

          $('.fhd_btn').click(function(){

            var p_id = $(this).attr('name');

            $('#fhd_btn_'+p_id).hide();
            $('#fhd_btn_bold_'+p_id).show();

            $('#thd_btn_bold_'+p_id).hide();
            $('#thd_btn_'+p_id).show();

            $('#tfhd_btn_bold_'+p_id).hide();
            $('#tfhd_btn_'+p_id).show();

            $('#okg_btn_bold_'+p_id).hide();
            $('#okg_btn_'+p_id).show();
          });

          $('.fhd_btn_bold').click(function(){

            var p_id = $(this).attr('name');

            $('#fhd_btn_bold_'+p_id).hide();
            $('#fhd_btn_'+p_id).show();
          });

          //1kg - Add To Bill

          $('.okg_btn').click(function(){

            var p_id = $(this).attr('name');

            $('#okg_btn_'+p_id).hide();
            $('#okg_btn_bold_'+p_id).show();

            $('#thd_btn_bold_'+p_id).hide();
            $('#thd_btn_'+p_id).show();

            $('#tfhd_btn_bold_'+p_id).hide();
            $('#tfhd_btn_'+p_id).show();

            $('#fhd_btn_bold_'+p_id).hide();
            $('#fhd_btn_'+p_id).show();
          });

          $('.okg_btn_bold').click(function(){

            var p_id = $(this).attr('name');

            $('#okg_btn_bold_'+p_id).hide();
            $('#okg_btn_'+p_id).show();

          });
          
          $('.retail_section_btn').click(function(){

            var productID = $(this).attr('id');

            if($('#thd_btn_bold_'+productID).css('display') != 'none'){

              var prodName   = $('#thd_btn_bold_'+productID).attr('data-name');
              var prodWeight = $('#thd_btn_bold_'+productID).attr('data-weight');
              var prodPrice  = $('#thd_btn_bold_'+productID).attr('data-price');

              var newRowContent = "<tr><td style='display:none;'>"+productID+"</td><td>"+prodName+"</td><td>"+prodWeight+"</td><td>"+prodPrice+"</td><td><i class='fa fa-close removeProd' style='color:red;font-size:20px;'></i></td></tr>";
              
              $("#bill tbody").append(newRowContent);
              totalAmount.push(prodPrice);
              totalWeight.push(prodWeight);
              cartProducts.push(productID+'_'+prodName+'_'+prodWeight+'_'+prodPrice);
              
            }

            if($('#tfhd_btn_bold_'+productID).css('display') != 'none'){

              var prodName   = $('#tfhd_btn_bold_'+productID).attr('data-name');
              var prodWeight = $('#tfhd_btn_bold_'+productID).attr('data-weight');
              var prodPrice  = $('#tfhd_btn_bold_'+productID).attr('data-price');

              var newRowContent = "<tr><td style='display:none;'>"+productID+"</td><td>"+prodName+"</td><td>"+prodWeight+"</td><td>"+prodPrice+"</td><td><i class='fa fa-close removeProd' style='color:red;font-size:20px;'></i></td></tr>";

              $("#bill tbody").append(newRowContent);
              totalAmount.push(prodPrice);
              totalWeight.push(prodWeight);
              cartProducts.push(productID+'_'+prodName+'_'+prodWeight+'_'+prodPrice);
          
            }

            if($('#fhd_btn_bold_'+productID).css('display') != 'none'){

              var prodName   = $('#fhd_btn_bold_'+productID).attr('data-name');
              var prodWeight = $('#fhd_btn_bold_'+productID).attr('data-weight');
              var prodPrice  = $('#fhd_btn_bold_'+productID).attr('data-price');

              var newRowContent = "<tr><td style='display:none;'>"+productID+"</td><td>"+prodName+"</td><td>"+prodWeight+"</td><td>"+prodPrice+"</td><td><i class='fa fa-close removeProd' style='color:red;font-size:20px;'></i></td></tr>";

              $("#bill tbody").append(newRowContent);
              totalAmount.push(prodPrice);
              totalWeight.push(prodWeight);
              cartProducts.push(productID+'_'+prodName+'_'+prodWeight+'_'+prodPrice);
             
            }

            if($('#okg_btn_bold_'+productID).css('display') != 'none'){

              var prodName   = $('#okg_btn_bold_'+productID).attr('data-name');
              var prodWeight = $('#okg_btn_bold_'+productID).attr('data-weight');
              var prodPrice  = $('#okg_btn_bold_'+productID).attr('data-price');

              var newRowContent = "<tr><td style='display:none;'>"+productID+"</td><td>"+prodName+"</td><td>"+prodWeight+"</td><td>"+prodPrice+"</td><td><i class='fa fa-close removeProd' style='color:red;font-size:20px;'></i></td></tr>";

              $("#bill tbody").append(newRowContent);
              totalAmount.push(prodPrice);
              totalWeight.push(prodWeight);
              cartProducts.push(productID+'_'+prodName+'_'+prodWeight+'_'+prodPrice);
            }

          });

          $("#bill").on('click', '.removeProd', function () {
            
            $(this).closest('tr').remove();

            tableData = [];

            $('#bill tr').each(function (index, tr) {
              var cols = [];

              //get td of each row and insert it into cols array
              $(this).find('td').each(function (colIndex, c) {
                  cols.push(c.textContent);
              });

              //insert this cols(full rows data) array into tableData array
              
            
              tableData.push(cols);
            });

            console.log("tableData: ", tableData);
          });
    </script>
    <script type="text/javascript">

      function thdBtn(e){

          var p_id = $(e).attr('name');

          $('#thd_btn_'+p_id).hide();
          $('#thd_btn_bold_'+p_id).show();

          $('#tfhd_btn_bold_'+p_id).hide();
          $('#tfhd_btn_'+p_id).show();

          $('#fhd_btn_bold_'+p_id).hide();
          $('#fhd_btn_'+p_id).show();

          $('#okg_btn_bold_'+p_id).hide();
          $('#okg_btn_'+p_id).show();
      }

      function thdBtnBold(e){

        var p_id = $(e).attr('name');

        $('#thd_btn_bold_'+p_id).hide();
        $('#thd_btn_'+p_id).show();
      }

      function tfhdBtn(e){

        var p_id = $(e).attr('name');

        $('#tfhd_btn_'+p_id).hide();
        $('#tfhd_btn_bold_'+p_id).show();

        $('#thd_btn_bold_'+p_id).hide();
        $('#thd_btn_'+p_id).show();

        $('#fhd_btn_bold_'+p_id).hide();
        $('#fhd_btn_'+p_id).show();

        $('#okg_btn_bold_'+p_id).hide();
        $('#okg_btn_'+p_id).show();
      }

      function tfhdBtnBold(e){

        var p_id = $(e).attr('name');

        $('#tfhd_btn_bold_'+p_id).hide();
        $('#tfhd_btn_'+p_id).show();
      }

      function fhdBtn(e){

        var p_id = $(e).attr('name');

        $('#fhd_btn_'+p_id).hide();
        $('#fhd_btn_bold_'+p_id).show();

        $('#thd_btn_bold_'+p_id).hide();
        $('#thd_btn_'+p_id).show();

        $('#tfhd_btn_bold_'+p_id).hide();
        $('#tfhd_btn_'+p_id).show();

        $('#okg_btn_bold_'+p_id).hide();
        $('#okg_btn_'+p_id).show();
      }

      function fhdBtnBold(e){

        var p_id = $(e).attr('name');

        $('#fhd_btn_bold_'+p_id).hide();
        $('#fhd_btn_'+p_id).show();
      }

      function okgBtn(e){

        var p_id = $(e).attr('name');

        $('#okg_btn_'+p_id).hide();
        $('#okg_btn_bold_'+p_id).show();

        $('#thd_btn_bold_'+p_id).hide();
        $('#thd_btn_'+p_id).show();

        $('#tfhd_btn_bold_'+p_id).hide();
        $('#tfhd_btn_'+p_id).show();

        $('#fhd_btn_bold_'+p_id).hide();
        $('#fhd_btn_'+p_id).show();
      }

      function okgBtnBold(e){
          
        var p_id = $(e).attr('name');

        $('#okg_btn_bold_'+p_id).hide();
        $('#okg_btn_'+p_id).show();
      }

      function retailSectionBtn(e){

        var productID = $(e).attr('id');
     
        if($('#thd_btn_bold_'+productID).css('display') != 'none'){

          var prodName   = $('#thd_btn_bold_'+productID).attr('data-name');
          var prodWeight = $('#thd_btn_bold_'+productID).attr('data-weight');
          var prodPrice  = $('#thd_btn_bold_'+productID).attr('data-price');

          var newRowContent = "<tr><td style='display:none;'>"+productID+"</td><td>"+prodName+"</td><td>"+prodWeight+"</td><td>"+prodPrice+"</td><td><i class='fa fa-close' onclick='removeBillItem(this)' style='color:red;font-size:20px;'></i></td></tr>";
          
          $("#bill tbody").append(newRowContent);
          totalAmount.push(prodPrice);
          totalWeight.push(prodWeight);
          cartProducts.push(productID+'_'+prodName+'_'+prodWeight+'_'+prodPrice);
          
        }

        if($('#tfhd_btn_bold_'+productID).css('display') != 'none'){

          var prodName   = $('#tfhd_btn_bold_'+productID).attr('data-name');
          var prodWeight = $('#tfhd_btn_bold_'+productID).attr('data-weight');
          var prodPrice  = $('#tfhd_btn_bold_'+productID).attr('data-price');

          var newRowContent = "<tr><td style='display:none;'>"+productID+"</td><td>"+prodName+"</td><td>"+prodWeight+"</td><td>"+prodPrice+"</td><td><i class='fa fa-close' onclick='removeBillItem(this)' style='color:red;font-size:20px;'></i></td></tr>";

          $("#bill tbody").append(newRowContent);
          totalAmount.push(prodPrice);
          totalWeight.push(prodWeight);
          cartProducts.push(productID+'_'+prodName+'_'+prodWeight+'_'+prodPrice);
      
        }

        if($('#fhd_btn_bold_'+productID).css('display') != 'none'){

          var prodName   = $('#fhd_btn_bold_'+productID).attr('data-name');
          var prodWeight = $('#fhd_btn_bold_'+productID).attr('data-weight');
          var prodPrice  = $('#fhd_btn_bold_'+productID).attr('data-price');

          var newRowContent = "<tr><td style='display:none;'>"+productID+"</td><td>"+prodName+"</td><td>"+prodWeight+"</td><td>"+prodPrice+"</td><td><i class='fa fa-close' onclick='removeBillItem(this)' style='color:red;font-size:20px;'></i></td></tr>";

          $("#bill tbody").append(newRowContent);
          totalAmount.push(prodPrice);
          totalWeight.push(prodWeight);
          cartProducts.push(productID+'_'+prodName+'_'+prodWeight+'_'+prodPrice);
         
        }

        if($('#okg_btn_bold_'+productID).css('display') != 'none'){

          var prodName   = $('#okg_btn_bold_'+productID).attr('data-name');
          var prodWeight = $('#okg_btn_bold_'+productID).attr('data-weight');
          var prodPrice  = $('#okg_btn_bold_'+productID).attr('data-price');

          var newRowContent = "<tr><td style='display:none;'>"+productID+"</td><td>"+prodName+"</td><td>"+prodWeight+"</td><td>"+prodPrice+"</td><td><i class='fa fa-close' onclick='removeBillItem(this)' style='color:red;font-size:20px;'></i></td></tr>";

          $("#bill tbody").append(newRowContent);
          totalAmount.push(prodPrice);
          totalWeight.push(prodWeight);
          cartProducts.push(productID+'_'+prodName+'_'+prodWeight+'_'+prodPrice);
        }

      }

      function removeBillItem(e){

        $(e).closest('tr').remove();

        tableData = [];

        $('#bill tr').each(function (index, tr) {
          var cols = [];

          //get td of each row and insert it into cols array
          $(this).find('td').each(function (colIndex, c) {
              cols.push(c.textContent);
          });

          //insert this cols(full rows data) array into tableData array
          
        
          tableData.push(cols);
        });

        console.log("tableData: ", tableData);
      }

      $('#complete_billing').click(function(){

        $.each(totalAmount,function(){totalSum+=parseFloat(this) || 0;});

        $.each(totalWeight,function(){weightSum+=parseFloat(this) || 0;});

        $('#total_amount').val("₹ "+totalSum+"/-");

        $('#total_weight').val(weightSum+" Kg");

      });

       $('#complete_billing_edit').click(function(){

        var newTotalWeight = 0;
        var newTotalAmount = 0;

        if(tableData.length > 0){

          for($i=1;$i<tableData.length;$i++){
         
            var newTotalWeight = parseFloat(newTotalWeight) + parseFloat(tableData[$i][2]);
            var newTotalAmount = parseFloat(newTotalAmount) + parseFloat(tableData[$i][3]);
          }

          $('#total_amount').val("₹ "+newTotalAmount+"/-");

          $('#total_weight').val(newTotalWeight+" Kg");

        }else if(tableData.length == 0){

          var dbTotalAmount = parseFloat($('#db_total_amount').attr('value'));

          var dbTotalWeight = parseFloat($('#db_total_weight').attr('value'));

          $.each(totalAmount,function(){totalSum+=parseFloat(this) || 0;});

          $.each(totalWeight,function(){weightSum+=parseFloat(this) || 0;});

          var newTotalAmount = dbTotalAmount + totalSum;

          var newTotalWeight = dbTotalWeight + weightSum;

          $('#total_amount').val("₹ "+newTotalAmount+"/-");

          $('#total_weight').val(newTotalWeight+" Kg");

        }

      });

      $('#pause_bill').click(function(){

        var type           = $("input[name='order_type']:checked").val();
        var name           = $('#name').val();
        var mobile_no      = $('#mobile_no').val();
        var discount       = $('#discount').val();
        var amount         = $('#total_amount').val();
        var weight         = $('#total_weight').val();
        var branch_id      = $('#branch_id').val();
        var order_id       = $('#orderID').val();
        var billing_status = 'paused';
        var order_type     = 'retail';
        var removeData     = '';

        if(tableData.length > 0){

          var products = tableData;
          removeData   = "true";
        }else{

          var products = cartProducts;
          removeData   = "false";
        }


        if((name != '' && name != ' ' && name != null && typeof name != 'undefined') && (mobile_no != '' && mobile_no != ' ' && mobile_no != null && typeof mobile_no != 'undefined')){

          $.ajax({
            url:"", 
            type:'post',
            data:{'name':name,'contact':mobile_no,'type':type,'discount':discount,'amount':amount,'weight':weight,'products':products,'billing_status':billing_status,'order_type':order_type,'branch_id':branch_id,'order_id':order_id,'remove_data':removeData},
            success:function(res){
              
              if(res == 1){

                $('#billing_err').text('');
                $('#billing_err').removeClass();
                $('#billing_err').text('Order Confirmed!!');
                $('#billing_err').addClass('alert alert-success');

                $('#billing_err').show();

                setTimeout(function(){
                  $('#billing_err').hide();
                },3000);
              }else if(res == 0){

                $('#billing_err').text('');
                $('#billing_err').removeClass();
                $('#billing_err').text('Please fill mandatory fields [Ex. Name or Contact No.] !!!');
                $('#billing_err').addClass('alert alert-danger');

                $('#billing_err').show();

                setTimeout(function(){
                  $('#billing_err').hide();
                },3000);

              }else if(res == 2){

                $('#billing_err').text('');
                $('#billing_err').removeClass();
                $('#billing_err').text('Order Paused!!');
                $('#billing_err').addClass('alert alert-warning');

                $('#billing_err').show();

                setTimeout(function(){
                  $('#billing_err').hide();
                },3000);
              }
            }
          });

        }else{

          $('#billing_err').text('');
          $('#billing_err').removeClass();
          $('#billing_err').text('Please fill mandatory fields [Ex. Name or Contact No.] !!!');
          $('#billing_err').addClass('alert alert-danger');

          $('#billing_err').show();

          setTimeout(function(){
            $('#billing_err').hide();
          },3000);

        }

      });

      $('#save_bill').click(function(){

        var type            = $("input[name='order_type']:checked").val();
        var name            = $('#name').val();
        var mobile_no       = $('#mobile_no').val();
        var discount        = $('#discount').val();
        var amount          = $('#total_amount').val();
        var weight          = $('#total_weight').val();
        var orderID         = $('#orderID').val();
        var transfer_status = $('#transfer_status').val();
        var branch_id       = $('#branch_id').val();
        var billing_status  = 'completed';
        var order_type      = 'retail';
        var products        = cartProducts;

        if(tableData.length > 0){

          var products = tableData;
          removeData   = "true";
        }else{

          var products = cartProducts;
          removeData   = "false";
        }


        if((name != '' && name != ' ' && name != null && typeof name != 'undefined') && (mobile_no != '' && mobile_no != ' ' && mobile_no != null && typeof mobile_no != 'undefined')){

          $.ajax({
            url:"",
            type:'post',
            data:{'name':name,'contact':mobile_no,'type':type,'discount':discount,'amount':amount,'weight':weight,'products':products,'billing_status':billing_status,'order_type':order_type,'branch_id':branch_id,'transfer_status':transfer_status,'order_id':orderID,'remove_data':removeData},
            success:function(res){
              
              if(res == 1){

                $('#billing_err').text('');
                $('#billing_err').removeClass();
                $('#billing_err').text('Order Confirmed!!');
                $('#billing_err').addClass('alert alert-success');

                $('#billing_err').show();

                setTimeout(function(){
                  $('#billing_err').hide();
                },3000);

              }else if(res == 2){

                $('#billing_err').text('');
                $('#billing_err').removeClass();
                $('#billing_err').text('Order Saved!!');
                $('#billing_err').addClass('alert alert-success');

                $('#billing_err').show();

                setTimeout(function(){
                  $('#billing_err').hide();
                },3000);

              }else if(res == 0){

                $('#billing_err').text('');
                $('#billing_err').removeClass();
                $('#billing_err').text('Please fill mandatory fields [Ex. Name or Contact No.] !!!');
                $('#billing_err').addClass('alert alert-danger');

                $('#billing_err').show();

                setTimeout(function(){
                  $('#billing_err').hide();
                },3000);

              }
            }
          });
        }else{

          $('#billing_err').text('');
          $('#billing_err').removeClass();
          $('#billing_err').text('Please fill mandatory fields [Ex. Name or Contact No.] !!!');
          $('#billing_err').addClass('alert alert-danger');

          $('#billing_err').show();

          setTimeout(function(){
            $('#billing_err').hide();
          },3000);
        }

      });
    </script>
    <script type="text/javascript">
      
      $(document).ready(function(){

        $('#lalbaug_malvani_masala').click(function(){

           var masala = 'malvani';

           $.ajax({
            url:"",
            type:'POST',
            data:{'masala':masala},
            success:function(res){
              
              var count = res.length;
              var row = "";

              var totalWeight = 0;
              var totalPrice = 0;

              for(var i=0;i<count;i++){

                var price_per_weight = parseInt(res[i].rate_in_kg) /  parseInt(1000);

                var current_price = parseFloat(price_per_weight) * parseInt(res[i].weight);

                totalWeight = parseInt(totalWeight) + parseInt(res[i].weight);
                totalPrice  = parseInt(totalPrice) + parseInt(current_price);

                row+='<tr style="width:100%;"><td class="text-center">'+(parseInt(i) + parseInt(1))+'</td><td>'+res[i].ingredient_name+'</td><td><input type="text" class="form-control input-border" value="'+res[i].weight+'"/></td><td><input type="text" class="form-control input-border" value="'+current_price+'"/></td></tr>';

              }

              row+= '<tr><td></td><td colspan="1">एकूण वजन </td><td id="custom_total_weight">'+totalWeight+'</tr><tr><td></td><td colspan="1">एकूण रुपये </td><td id="custom_total_price">'+totalPrice+'</tr>';

              $('#lalbaug_custom_list').text('');
              $('#lalbaug_custom_list').append(row);
            }
           });
        });

        $('#lalbaug_agari_masala').click(function(){

           var masala = 'agari';

           $.ajax({
            url:"",
            type:'POST',
            data:{'masala':masala},
            success:function(res){
              
              var count = res.length;
              var row = "";

              var totalWeight = 0;
              var totalPrice = 0;

              for(var i=0;i<count;i++){

                var price_per_weight = parseInt(res[i].rate_in_kg) /  parseInt(1000);

                var current_price = parseFloat(price_per_weight) * parseInt(res[i].weight);

                totalWeight = parseInt(totalWeight) + parseInt(res[i].weight);
                totalPrice  = parseInt(totalPrice) + parseInt(current_price);

                row+='<tr style="width:100%;"><td class="text-center">'+(parseInt(i) + parseInt(1))+'</td><td>'+res[i].ingredient_name+'</td><td><input type="text" class="form-control input-border" value="'+res[i].weight+'"/></td><td><input type="text" class="form-control input-border" value="'+current_price+'"/></td></tr>';

              }

              row+= '<tr><td></td><td colspan="1">एकूण वजन </td><td id="custom_total_weight">'+totalWeight+'</tr><tr><td></td><td colspan="1">एकूण रुपये </td><td id="custom_total_price">'+totalPrice+'</tr>';

              $('#lalbaug_custom_list').text('');
              $('#lalbaug_custom_list').append(row);
            }
           });
        });

        $('#lalbaug_garam_masala').click(function(){

           var masala = 'garam';

           $.ajax({
            url:"",
            type:'POST',
            data:{'masala':masala},
            success:function(res){
              
              var count = res.length;
              var row = "";

              var totalWeight = 0;
              var totalPrice = 0;

              for(var i=0;i<count;i++){

                var price_per_weight = parseInt(res[i].rate_in_kg) /  parseInt(1000);

                var current_price = parseFloat(price_per_weight) * parseInt(res[i].weight);

                totalWeight = parseInt(totalWeight) + parseInt(res[i].weight);
                totalPrice  = parseInt(totalPrice) + parseInt(current_price);

                row+='<tr style="width:100%;"><td class="text-center">'+(parseInt(i) + parseInt(1))+'</td><td>'+res[i].ingredient_name+'</td><td><input type="text" class="form-control input-border" value="'+res[i].weight+'"/></td><td><input type="text" class="form-control input-border" value="'+current_price+'"/></td></tr>';

              }

              row+= '<tr><td></td><td colspan="1">एकूण वजन </td><td id="custom_total_weight">'+totalWeight+'</tr><tr><td></td><td colspan="1">एकूण रुपये </td><td id="custom_total_price">'+totalPrice+'</tr>';

              $('#lalbaug_custom_list').text('');
              $('#lalbaug_custom_list').append(row);
            }
           });
        });

        $('#lalbaug_nashik_masala').click(function(){

           var masala = 'nashik';

           $.ajax({
            url:"",
            type:'POST',
            data:{'masala':masala},
            success:function(res){
              
              var count = res.length;
              var row = "";

              var totalWeight = 0;
              var totalPrice = 0;

              for(var i=0;i<count;i++){

                var price_per_weight = parseInt(res[i].rate_in_kg) /  parseInt(1000);

                var current_price = parseFloat(price_per_weight) * parseInt(res[i].weight);

                totalWeight = parseInt(totalWeight) + parseInt(res[i].weight);
                totalPrice  = parseInt(totalPrice) + parseInt(current_price);

                row+='<tr style="width:100%;"><td class="text-center">'+(parseInt(i) + parseInt(1))+'</td><td>'+res[i].ingredient_name+'</td><td><input type="text" class="form-control input-border" value="'+res[i].weight+'"/></td><td><input type="text" class="form-control input-border" value="'+current_price+'"/></td></tr>';

              }

              row+= '<tr><td></td><td colspan="1">एकूण वजन </td><td id="custom_total_weight">'+totalWeight+'</tr><tr><td></td><td colspan="1">एकूण रुपये </td><td id="custom_total_price">'+totalPrice+'</tr>';

              $('#lalbaug_custom_list').text('');
              $('#lalbaug_custom_list').append(row);
            }
           });
        });

        $('#lalbaug_khandeshi_masala').click(function(){

           var masala = 'khandeshi';

           $.ajax({
            url:"",
            type:'POST',
            data:{'masala':masala},
            success:function(res){
              
              var count = res.length;
              var row = "";

              var totalWeight = 0;
              var totalPrice = 0;

              for(var i=0;i<count;i++){

                var price_per_weight = parseInt(res[i].rate_in_kg) /  parseInt(1000);

                var current_price = parseFloat(price_per_weight) * parseInt(res[i].weight);

                totalWeight = parseInt(totalWeight) + parseInt(res[i].weight);
                totalPrice  = parseInt(totalPrice) + parseInt(current_price);

                row+='<tr style="width:100%;"><td class="text-center">'+(parseInt(i) + parseInt(1))+'</td><td>'+res[i].ingredient_name+'</td><td><input type="text" class="form-control input-border" value="'+res[i].weight+'"/></td><td><input type="text" class="form-control input-border" value="'+current_price+'"/></td></tr>';

              }

              row+= '<tr><td></td><td colspan="1">एकूण वजन </td><td id="custom_total_weight">'+totalWeight+'</tr><tr><td></td><td colspan="1">एकूण रुपये </td><td id="custom_total_price">'+totalPrice+'</tr>';

              $('#lalbaug_custom_list').text('');
              $('#lalbaug_custom_list').append(row);
            }
           });
        });
          
        $('#save_custom_order').click(function(){

          var name       = $('#name').val();
          var mobile_no  = $('#mobile_no').val();
          var weight     = $('#custom_total_weight').text();
          var price      = $('#custom_total_price').text();
          var masala_id  = '1';
          var order_id   = $('#custom_order_id').val();
          var type       = $('input[name="custom_order_type"]:checked').attr('value');

          
          $.ajax({
            url:"",
            type:'POST',
            data:{'name':name,'mobile_no':mobile_no,'weight':weight,'price':price,'masala_id':masala_id,'order_id':order_id,'type':type},
            success:function(res){

              if(res == 1){

                $('#custom_order_message').text('');
                $('#custom_order_message').removeClass();
                $('#custom_order_message').text('Order Confirmed!!');
                $('#custom_order_message').addClass('alert alert-success');

                $('#custom_order_message').show();

                setTimeout(function(){
                  $('#custom_order_message').hide();
                },3000);

              }else if(res == 0){

                $('#custom_order_message').text('');
                $('#custom_order_message').removeClass();
                $('#custom_order_message').text('Error Occured!!');
                $('#custom_order_message').addClass('alert alert-success');

                $('#custom_order_message').show();

                setTimeout(function(){
                  $('#custom_order_message').hide();
                },3000);

              }
              
            }
          });
        });
      });
    </script>
  </body>
</html>