// ADD ORDER MODAL 
document.querySelector('.add-order-btn').addEventListener('click', function(e) {
   if (e.target.classList.contains('add-order-btn')) {
      document.querySelector('.orders-modal').style.display = 'block';
   }
});


// ADD ORDER MODAL - CANCEL BUTTON
document.querySelector('.orders-modal').addEventListener('click', function(e) {
   if (e.target.classList.contains('order-cancel-btn') || e.target.classList.contains('orders-modal')) {
      document.querySelector('.orders-modal').style.display = 'none';
   }
});

// DELETE ORDER MODAL 
document.querySelector('.delete-order-btn').addEventListener('click', function(e) {
   if (e.target.classList.contains('delete-order-btn')) {
      document.querySelector('.delete-modal').style.display = 'block';
   }
});


// DELETE ORDER MODAL - CANCEL BUTTON
document.querySelector('.delete-modal').addEventListener('click', function(e) {
   if (e.target.classList.contains('delete-cancel-btn') || e.target.classList.contains('delete-modal')) {
      document.querySelector('.delete-modal').style.display = 'none';
   }
});