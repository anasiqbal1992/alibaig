/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

 $(document).on('click','.delete-product',function(){
       
        var id = $(this).attr('data-id');
        jQuery.confirm({
		title: 'Please Confirm',
                theme: 'black',
		content: 'Are you sure to Delete Menu item ?',
		animation: 'rotate',
		closeAnimation: 'rotateXR',
		icon: 'fa fa-check-square-o',
                
		confirmButton: 'Delete',
		cancelButton: 'Cancel',
		confirm: function () {
        $.ajax({
            headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
            type: "DELETE",
            url: 'delete_beverages/' + id,
            data: {
                      
                },
            success: function (data) {
               
                console.log(data);
                $("#product" + id).remove();
            },
            error: function (data) {
                
                console.log('Error:', data);
            }
        });
        }
    });
    });    
    
     jQuery(document).ready(function(){
             
     jQuery('.btn-cart').on('click',function(){
           fieldPrice = $(this).attr('price');
         fieldQty = $(this).attr('field');
          tPrice = $(this).attr('tprice');
         
        // Get its current value
        var price = parseInt($('input[id='+fieldPrice+']').val());
         var qty = parseInt($('input[id='+fieldQty+']').val());
          var tprice = parseInt($('input[id='+tPrice+']').val());
         
             var id = $(this).attr('data-id');
          $.ajax({
                headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          cache: false,
            url:'add_cart/'+id+'/'+price+'/'+qty+'/'+tprice,
                  data:{
                      
                  },
                   success: function (data) {
               
               console.log('ok');
                $('.count').load(' .count');
            },
            error: function (data) {
                
                console.log('Error:', data);
            }
         });
     });
});

jQuery(document).ready(function(){
    // This button will increment the value
    $('.delete-cart').click(function(){
      
        var id = $(this).attr('data-id');
        
        jQuery.confirm({
		title: 'Please Confirm',
                theme: 'black',
		content: 'Are you sure to Delete Menu item ?',
		animation: 'rotate',
		closeAnimation: 'rotateXR',
		icon: 'fa fa-check-square-o',
		confirmButton: 'Delete',
		cancelButton: 'Cancel',
		confirm: function () {
        $.ajax({
            headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          cache: false,
            type: "DELETE",
            url: 'delete_cart/' + id,
            data: {
                      
                },
            success: function (data) {
               
                console.log(data);
                
               location.reload();
                 
            },
            error: function (data) {
                
                console.log('Error:', data);
            }
        });
        }
    });
   });    
   }); 
   
   
   jQuery(document).ready(function(){
    // This button will increment the value
    $('.delete-cartOrder').click(function(){
        jQuery.confirm({
		title: 'Please Confirm',
                theme: 'black',
		content: 'Are you sure to Delete Menu item ?',
		animation: 'rotate',
		closeAnimation: 'rotateXR',
		icon: 'fa fa-check-square-o',
		confirmButton: 'Delete',
		cancelButton: 'Cancel',
		confirm: function () {
        $.ajax({
            headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          cache: false,
            type: "DELETE",
            url: 'delete-cartOrder/',
            data: {
                      
                },
            success: function (data) {
               
                console.log(data);
               location.reload();
                  
            },
            error: function (data) {
                
                console.log('Error:', data);
                 
            }
        });
        }
    });
   });    

    //Comment Delete
    $('.comment-delete').click(function(){

      var id = $(this).attr('data-id');

        jQuery.confirm({
    title: 'Please Confirm',
                theme: 'black',
    content: 'Are you sure to Delete Menu item ?',
    animation: 'rotate',
    closeAnimation: 'rotateXR',
    icon: 'fa fa-check-square-o',
    confirmButton: 'Delete',
    cancelButton: 'Cancel',
    confirm: function () {
        $.ajax({
            headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          cache: false,
            type: "DELETE",
            url: 'delete_comment/' + id,
            data: {
                      
                },
            success: function (data) {
               
                console.log(data);
               $("#comment" + id).remove();
               
                  
            },
            error: function (data) {
                
                console.log('Error:', data);
                 
            }
        });
        }
    });
   });    
   }); 
   