<?php if (isset($islogged) &&  $islogged): ?><?php endif; ?>
	
<!DOCTYPE html>



<div class="container">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="email" placeholder="Email">
    </div>
  <div class="form-group">
    <label for="inputTitle">Title</label>
    <input type="text" class="form-control" id="title">
  </div>
  <div class="form-group">
    <label for="date">Date</label>
    <input type="date" class="form-control" id="date" >
  </div>
  
	<div class="form-group">
		<label for="exampleFormControlTextarea3">Ticket content</label>
		<textarea class="form-control" id="ticketcontent" rows="2"></textarea>
	</div>
</div>
  <button type="submit" class="btn btn-primary" id="submitNewTicket">create</button>
 </div 

