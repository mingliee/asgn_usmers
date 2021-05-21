(function($) {
  showSwal = function(type) {
    if (type === 'error-message') {
      swal({
        title: 'Error!',
        text: 'Error Occur',
        icon: 'error',
        button: {
          text: "Continue",
          value: true,
          visible: true,
          className: "btn btn-primary"
        }
      })

  } else if (type === 'success-message') {
    swal({
      title: 'Congratulations!',
      text: 'You entered the correct answer',
      icon: 'success',
      button: {
        text: "Continue",
        value: true,
        visible: true,
        className: "btn btn-primary"
      }
    })

  }
}

  showSwal = function(type,id,admin) {
    'use strict';
    //USER MANAGEMENT
    //REVOKE USER ACCESS
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
        content: {
          element: "input",
          attributes: {
            placeholder: "Reason...",
            type: "text",
            class: 'form-control'
          },
        },
        buttons: {
          cancel: {
            text: "Cancel",
            value: null,
            visible: true,
            className: "btn btn-danger",
            closeModal: true,
          },
          confirm: {
            text: "YES",
            value: true,
            visible: true,
            className: "btn btn-primary",
            closeModal: true,
            isConfirm:true,
          }
        }
      }).then((result) => {
        if (result===null) return false;

        if (result === "") {
          swal("Reason must be provided to continue!");
          return false
        }
        var data = { feedback: result };
		  	if (result){
		  		$.ajax({
			   		url: 'editUser.php?action=revoke',
			    	type: 'POST',
			       	data:{
                 userID:id,
                 action:'revoke',
                 reason:data,
                 admin:admin
              },
			       	dataType: 'json',
                success: function (response) {
                //alert('response: '+JSON.stringify(response));
                $(".user_status").html("R");
                $(".actionBtn").removeClass('btn-gradient-danger');
                $(".actionBtn").addClass('btn-gradient-success');
                $(".actionBtn").html('Grant Access');
                document.getElementById( "actionBtn" ).setAttribute( "onClick", "showSwal('grant','"+id+"','"+admin+"');" );
                swal("Done!", "", "success");
                },
                error: function (xhr, ajaxOptions, thrownError) {
                  alert('error: '+JSON.stringify(xhr));
                    swal("Error!", "Please try again", "error");
                }
			    })
/* 			    .done(function(response){
			     	swal('Deleted!', response.message, response.status);
			    })
			    .fail(function(err){
            alert('err: '+JSON.stringify(err));
			     	swal('Oops...', 'Something went wrong with ajax !', 'error');
			    }); */
		  	}
 
		})
    //USER MANAGEMENT
    //GRANT USER ACCESS
    } else if (type === 'grant') {
      swal({
        title: 'Are you sure?',
        text: "Grant user's access to post Ad.",
        icon: 'warning',
        showCancelButton: true,
        showLoaderOnConfirm: true,
        content: {
          element: "input",
          attributes: {
            placeholder: "Reason...",
            type: "text",
            class: 'form-control'
          },
        },
        buttons: {
          cancel: {
            text: "Cancel",
            value: null,
            visible: true,
            className: "btn btn-danger",
            closeModal: true,
          },
          confirm: {
            text: "YES",
            value: true,
            visible: true,
            className: "btn btn-primary",
            closeModal: true,
            isConfirm:true,
          }
        }
      }).then((result) => {
        if (result===null) return false;

        if (result === "") {
          swal("Reason must be provided to continue!");
          return false
        }
		  	if (result){
          var data = { feedback: result };
		  		$.ajax({
			   		url: 'editUser.php?action=grant',
			    	type: 'POST',
			       	data: {
                userID:id,
                action:'grant',
                reason:data,
                admin:admin
             },
			       	dataType: 'json',
               success: function (response) {
                //alert('response: '+JSON.stringify(response));
                $(".user_status").html("A");
                $(".actionBtn").removeClass('btn-gradient-success');
                $(".actionBtn").addClass('btn-gradient-danger');
                $(".actionBtn").html('Revoke Access');
                document.getElementById( "actionBtn" ).setAttribute( "onClick", "showSwal('revoke','"+id+"','"+admin+"');" );
                swal("Done!", "", "success");
                },
                error: function (response) {
                  alert('error: '+JSON.stringify(response));
                    swal("Error!", "Please try again", "error");
                }
			    })
		  	}
 
		})
    //ADS MANAGEMENT
    //DELETE AD
    } else if (type === 'delete') {
      swal({
        title: 'Are you sure?',
        // text: "Delete Ad.",
        icon: 'warning',
        showCancelButton: true,
/*         confirmButtonColor: '#3f51b5',
        cancelButtonColor: '#ff4081',
        confirmButtonText: 'Great ', */
        showLoaderOnConfirm: true,
        content: {
          element: "input",
          attributes: {
            placeholder: "Reason...",
            type: "text",
            class: 'form-control'
          },
        },
        buttons: {
          cancel: {
            text: "Cancel",
            value: null,
            visible: true,
            className: "btn btn-danger",
            closeModal: true,
          },
          confirm: {
            text: "YES",
            value: true,
            visible: true,
            className: "btn btn-primary",
            closeModal: true,
            isConfirm:true,
          }
        }
      }).then((result) => {
        if (result===null) return false;

        if (result === "") {
          swal("Reason must be provided to continue!");
          return false
        }
		  	if (result){
          var data = { feedback: result };
          //alert ('result: '+result);
		  		$.ajax({
			   		url: 'editAd.php?action=delete',
			    	type: 'POST',
			       	data:{
                 adsID:id,
                 action:'delete',
                 reason:data,
                 admin:admin
              },
			       	dataType: 'json',
                success: function (response) {
                //alert('response: '+JSON.stringify(response));
                $(".actionBtn").removeClass('btn-gradient-danger');
                $(".actionBtn").addClass('btn-gradient-success');
                $(".actionBtn").html('Recover Ad');
                document.getElementById( "actionBtn" ).setAttribute( "onClick", "showSwal('recover','"+id+"','"+admin+"');" );
                swal("Done!", "", "success");
                },
                error: function (xhr, ajaxOptions, thrownError) {
                  alert('error: '+JSON.stringify(xhr));
                    swal("Error!", "Please try again", "error");
                }
			    })
/* 			    .done(function(response){
			     	swal('Deleted!', response.message, response.status);
			    })
			    .fail(function(err){
            alert('err: '+JSON.stringify(err));
			     	swal('Oops...', 'Something went wrong with ajax !', 'error');
			    }); */
		  	}
 
		})
    //AD MANAGEMENT
    //RECOVER AD
    } else if (type === 'recover') {
      swal({
        title: 'Are you sure?',
        // text: "Recover Ad.",
        icon: 'warning',
        showCancelButton: true,
        showLoaderOnConfirm: true,
        content: {
          element: "input",
          attributes: {
            placeholder: "Reason...",
            type: "text",
            class: 'form-control'
          },
        },
        buttons: {
          cancel: {
            text: "Cancel",
            value: null,
            visible: true,
            className: "btn btn-danger",
            closeModal: true,
          },
          confirm: {
            text: "YES",
            value: true,
            visible: true,
            className: "btn btn-primary",
            closeModal: true,
            isConfirm:true,
          }
        }
      }).then((result) => {
        if (result===null) return false;

        if (result === "") {
          swal("Reason must be provided to continue!");
          return false
        }
		  	if (result){
          var data = { feedback: result };
          //alert ('result: '+result);
		  		$.ajax({
			   		url: 'editAd.php?action=recover',
			    	type: 'POST',
			       	data: {
                adsID:id,
                action:'recover',
                reason:data,
                admin:admin
             },
			       	dataType: 'json',
               success: function (response) {
                //alert('response: '+JSON.stringify(response));
                $(".actionBtn").removeClass('btn-gradient-success');
                $(".actionBtn").addClass('btn-gradient-danger');
                $(".actionBtn").html('Delete Ad');
                document.getElementById( "actionBtn" ).setAttribute( "onClick", "showSwal('delete','"+id+"','"+admin+"');" );
                swal("Done!", "", "success");
                },
                error: function (response) {
                  alert('error: '+JSON.stringify(response));
                    swal("Error!", "Please try again", "error");
                }
			    })
		  	}
 
		})
    } else if (type === 'basic') {
      swal({
        text: 'Any fool can use a computer',
        button: {
          text: "OK",
          value: true,
          visible: true,
          className: "btn btn-primary"
        }
      })

    } else if (type === 'title-and-text') {
      swal({
        title: 'Read the alert!',
        text: 'Click OK to close this alert',
        button: {
          text: "OK",
          value: true,
          visible: true,
          className: "btn btn-primary"
        }
      })

    } else if (type === 'success-message') {
      swal({
        title: 'Congratulations!',
        text: 'You entered the correct answer',
        icon: 'success',
        button: {
          text: "Continue",
          value: true,
          visible: true,
          className: "btn btn-primary"
        }
      })

    } else if (type === 'auto-close') {
      swal({
        title: 'Auto close alert!',
        text: 'I will close in 2 seconds.',
        timer: 2000,
        button: false
      }).then(
        function() {
          swal('Oops...', 'Something went wrong with ajax !', 'error');

        },
        // handling the promise rejection
        function(dismiss) {
          if (dismiss === 'timer') {
            console.log('I was closed by the timer')
          }
        }
      )
    } else if (type === 'warning-message-and-cancel') {
      swal({
        title: 'Are you sure?',
        text: "Revoke user's access to post Ad.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3f51b5',
        cancelButtonColor: '#ff4081',
        confirmButtonText: 'Great ',
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
            closeModal: true
          }
        }
      },
      )

    } else if (type === 'custom-html') {
      swal({
        content: {
          element: "input",
          attributes: {
            placeholder: "Type your password",
            type: "password",
            class: 'form-control'
          },
        },
        button: {
          text: "OK",
          value: true,
          visible: true,
          className: "btn btn-primary"
        }
      })
    }
  }


})(jQuery);