 // Function to keep the chat messages scrolled to the bottom
 function scrollToBottom() {
    const chatMessages = document.querySelector('.chat-messages');
    chatMessages.scrollTop = chatMessages.scrollHeight;
  }

  // Scroll to bottom on page load
  window.onload = scrollToBottom;


    scrollToBottom(); // Scroll to the bottom
    
    function toggleSidebar() {
    const sidebar = document.querySelector('.sidebar');
    sidebar.classList.toggle('open'); // Toggle the 'open' class to show/hide the sidebar
}




  // Function to check for new messages
  function checkForNewMessages() {
    fetch('check_new_messages.php').then(response => response.text()).then(data => {
        if (data === 'new_messages') {
          location.reload(); 
        }
      });
      
  }


  setInterval(checkForNewMessages, 500); // 500 milliseconds = 0.5 seconds


  function redirect(name) {
    console.log(name); 
    window.location.href = "index.php?chat_with=" + encodeURIComponent(name);
    
    
}

function redirectToEdit() {
    console.log("Redirecting to edit.php"); // Debugging log
      window.location.href = "edit.php";
}

