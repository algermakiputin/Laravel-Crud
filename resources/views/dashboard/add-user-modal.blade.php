<div class="modal fade" id="modal" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <form method="POST" action="{{ route('save-user') }}">
            <div class="modal-header">
               <h5 class="modal-title">New User</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               @csrf
               <div class="row">
                   <div class="col-md-6">
                       <fieldset>
                            <legend>Personal Information</legend>
                           <div class="form-group">
                              <input type="text" class="form-control" required="required" placeholder="First Name" name="first_name">
                           </div>
                           <div class="form-group">
                              <input type="text" class="form-control" required="required" placeholder="Last Name" name="last_name">
                           </div>
                           <div class="form-group">
                              <div class="form-check form-check-inline">
                                 <input class="form-check-input" checked="checked" required="required" type="radio" name="gender" id="inlineRadio1" value="Male">
                                 <label class="form-check-label" for="inlineRadio1">Male</label>
                              </div>
                           
                               <div class="form-check form-check-inline">
                                  <input class="form-check-input" required="required" type="radio" name="gender" id="inlineRadio2" value="Female">
                                  <label class="form-check-label" for="inlineRadio2">Female</label>
                               </div>
                           </div>
                           <div class="form-group">
                              <input type="date" class="form-control" name="birthdate" required="required">
                           </div>
                           <div class="form-group">
                              <select class="form-control" name="status" required="required">
                                 <option value="">Marital Status</option>
                                 <option value="Single">Single</option>
                                 <option value="Married">Married</option>
                              </select>
                           </div>
                       </fieldset>
                   </div>

                   <div class="col-md-6">
                       <fieldset>
                            <legend>Account Information</legend>
                           <div class="form-group">
                              <input type="text" required="required" class="form-control" placeholder="Account Name" name="account_name">
                           </div>
                           <div class="form-group">
                              <input type="email" required="required" class="form-control" placeholder="Email" name="email">
                           </div>
                           <div class="form-group">
                              <input type="password" 
                                required="required"  
                                class="form-control" 
                                placeholder="Password"
                                data-parsley-equalto="#password_confirmation" 
                                data-parsley-equalto-message="Password and Confirm Password must be the same"
                                name="password"
                                id="password">
                           </div>
                           <div class="form-group">
                              <input type="password" 
                                    id="password_confirmation" 
                                    class="form-control" 
                                    placeholder="Confirm Password" 
                                    name="password_confirmation"
                                    data-parsley-equalto="#password"
                                    data-parsley-equalto-message="Must be equal to password"
                                    required="required" 
                                    >
                           </div>
                       </fieldset>
                   </div>
               </div>
               
            </div>
            <div class="modal-footer">
               
               <button type="reset" class="btn btn-secondary">Reset</button>
               <button type="submit" class="btn btn-primary">Save</button>
            </div>
         </form>
      </div>
   </div>
</div>