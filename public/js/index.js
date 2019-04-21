$(document).ready(function() {
 	var base_url = $("meta[name='base-url']").attr('content');
	var token = $("meta[name='csrf-token']").attr('content');
	(function() {
		
		var studentsDataTable;
		var dashboard = {
			init : function() {
				this.studentsDataTable();
				this.search();
				this.registerFormValidation();
			},
			studentsDataTable : function() {
				studentsDataTable = $("#students-table").DataTable({
					dom : 'tipr'
				});
			},
			search: function(){
				$("[name='search']").keyup(function(e) {
					studentsDataTable.search('');
					studentsDataTable.columns(0).search($(this).val()).draw();
				})
			},
			registerFormValidation : function() {
				$("form").parsley();
			}
		};

		var user = {
			init : function() {
				this.editUser();
				this.deleteConfirmation();

			},
			editUser : function() {
				$("body").on("click", '.edit',function(e) {
					var id = $(this).data('id');
					$.ajax({
						method : 'POST',
						url : base_url + '/user/get',
						data : {
							_token : token,
							id : id
						},
						success : function(data) {
							console.log(data);
							var form = $("#edit-modal form");
							form.find("[name=first_name]").val(data.person.first_name);
							form.find("[name=last_name]").val(data.person.last_name);
							form.find("[name=status]").val(data.person.marital_status);
							form.find("[name=birthdate]").val(data.person.birthdate);
							form.find("#"+data.person.gender+"").attr("checked", "checked");
							form.find("[name=account_name]").val(data.name);
							form.find("[name=email]").val(data.email);
							$("#edit-modal").modal('toggle');
						},
						error : function(data) {
							
						}
					});
					e.preventDefault();
				})
			},
			deleteConfirmation : function() {
				$("body").on('click', '.delete', function(e) {
					var modal = $("#delete-confirmation-modal")
					modal.find("[name=id]").val($(this).data('id'));
					modal.modal('toggle');
					e.preventDefault();
				})
				
			}
		}
		
		user.init();
		dashboard.init();
	})();

	$("#inputEmail").keyup(function(e) {
        $(this).removeClass('is-invalid');
    })
})