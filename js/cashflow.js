// ADD ORDER MODAL 
document.querySelector('.add-cashflow-btn').addEventListener('click', function(e) {
   if (e.target.classList.contains('add-cashflow-btn')) {
      document.querySelector('.cashflow-modal').style.display = 'block';
   }
});


// ADD ORDER MODAL - CANCEL BUTTON
document.querySelector('.cashflow-modal').addEventListener('click', function(e) {
   if (e.target.classList.contains('cashflow-cancel-btn') || e.target.classList.contains('cashflow-modal')) {
      document.querySelector('.cashflow-modal').style.display = 'none';
   }
});

// DELETE ORDER MODAL 
document.querySelector('.delete-cashflow-btn').addEventListener('click', function(e) {
   if (e.target.classList.contains('delete-cashflow-btn')) {
      document.querySelector('.delete-modal').style.display = 'block';
   }
});


// DELETE ORDER MODAL - CANCEL BUTTON
document.querySelector('.delete-modal').addEventListener('click', function(e) {
   if (e.target.classList.contains('delete-cancel-btn') || e.target.classList.contains('delete-modal')) {
      document.querySelector('.delete-modal').style.display = 'none';
   }
});