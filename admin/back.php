<?php 
if (type === 'revoke') {
      swal({
        title: 'Are you sure?',
        text: "Revoke user's access to post Ad.",
        icon: 'warning',
        showCancelButton: true,
/*         confirmButtonColor: '#3f51b5',
        cancelButtonColor: '#ff4081',
        confirmButtonText: 'Great ', */
        showLoaderOnConfirm: true,
        buttons: {
          cancel: {
            text: "Cancel",
            value: null,
            visible: true,
            className: "btn btn-danger",
            closeModal: true,
          },
          confirm: {
            text: "OK",
            value: true,
            visible: true,
            className: "btn btn-primary",
            closeModal: true,
            isConfirm:true,
          }
        },
/*         function(isConfirm){
          swal("DONE", "Your imaginary file is safe :)", "error");

          if (isConfirm) {
            swal("DONE", "Your imaginary file is safe :)", "error");
            // submitting the form when user press yes
          } else {
            swal("Cancelled", "Your imaginary file is safe :)", "error");
          }
        }, */
/*          preConfirm: function(){
            alert('Error');
          return new Promise(function(resolve){
            swal('Oops...', 'Something went wrong with ajax !', 'error');
            $.ajax({
              url: 'editUser.php',
              type: 'POST',           
              data: {
                userID: userID,
                action: 'revoke',
              },
           })
           .done(function(response){
            swal('Deleted!', response.message, response.status);
            // readProducts();
            })
            .fail(function(){
                swal('Oops...', 'Something went wrong with ajax !', 'error');
            });
            

            });
        } */
      })
      .then(willDelete => {
        if (willDelete) {
          alert('userID: '+userID);
          $.ajax({
            url: 'editUser.php',
            type: 'POST',           
            data: {
              userID: userID,
              action: 'revoke',
            },
         })
         .done(function(response){
          swal('Update Successfully!', '', 'success');
          // readProducts();
          })
          .fail(function(){
              swal('Oops...', 'Something went wrong with ajax !', 'error');
          });
          //swal("Deleted!", "Your imaginary file has been deleted!", "success");
        }
      })
      .catch(err => {
        if (err) {
          swal("Oh noes!", "The AJAX request failed!", "error");
        } else {
          swal.stopLoading();
          swal.close();
        }
      });

    } 

    ?>
