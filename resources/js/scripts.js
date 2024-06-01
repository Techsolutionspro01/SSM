window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});

document.addEventListener("DOMContentLoaded", function() {
	const sidebar = document.querySelector('.layoutSidebar');
	const toggleIcon = document.getElementById('sidebarToggleIcon');
  
	toggleIcon.addEventListener('click', function() {
	  sidebar.classList.toggle('d-lg-block');
	  toggleIcon.classList.toggle('fa-times');
	  toggleIcon.classList.toggle('fa-filter');
	});
  });
  const toggleButtons = document.querySelectorAll('.toggle-btn');

    toggleButtons.forEach(button => {
      button.addEventListener('click', () => {
        button.classList.toggle('active');
      });
    });
  
    // toltip 
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})

// planner page
// calendar 

document.addEventListener("DOMContentLoaded", function() {
  const currentDate = new Date();
  let currentYear = currentDate.getFullYear();
  let currentMonth = currentDate.getMonth();

  const monthNames = ["January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"
  ];

  const weekDayNames = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

  const daysContainer = document.getElementById('days');
  const currentMonthSpan = document.getElementById('currentMonth');
  const currentYearSpan = document.getElementById('currentYear');
  const weekDaysContainer = document.getElementById('weekDays');

  function renderCalendar() {
    currentMonthSpan.textContent = monthNames[currentMonth];
    currentYearSpan.textContent = currentYear;

    // Clear previous days
    daysContainer.innerHTML = '';

    // Clear previous week day names
    weekDaysContainer.innerHTML = '';

    // Add week day names
    weekDayNames.forEach(dayName => {
      const dayListItem = document.createElement('li');
      dayListItem.textContent = dayName;
      weekDaysContainer.appendChild(dayListItem);
    });

    // Get the first day of the month
    const firstDayOfMonth = new Date(currentYear, currentMonth, 1).getDay();

    // Add empty cells for the days before the first day of the month
    for (let i = 0; i < firstDayOfMonth; i++) {
      const emptyCell = document.createElement('li');
      daysContainer.appendChild(emptyCell);
    }

    // Get the number of days in the month
    const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();

    // Add days of the month
    for (let day = 1; day <= daysInMonth; day++) {
      const dayCell = document.createElement('li');
      dayCell.textContent = day;
      const dayOfWeek = new Date(currentYear, currentMonth, day).getDay();
      dayCell.dataset.dayOfWeek = dayOfWeek; // Save day of week as data attribute
      if (day === currentDate.getDate() && currentYear === currentDate.getFullYear() && currentMonth === currentDate.getMonth()) {
        dayCell.classList.add('today');
      }
      daysContainer.appendChild(dayCell);
    }
  }

  renderCalendar();

  // Event listeners for changing month
  document.getElementById('prevMonth').addEventListener('click', function() {
    currentMonth--;
    if (currentMonth === -1) {
      currentMonth = 11;
      currentYear--;
    }
    renderCalendar();
  });

  document.getElementById('nextMonth').addEventListener('click', function() {
    currentMonth++;
    if (currentMonth === 12) {
      currentMonth = 0;
      currentYear++;
    }
    renderCalendar();
  });
});

// end calendar


// start search filter 
// Equivalent pure JavaScript code
document.addEventListener('DOMContentLoaded', function() {
  var panelCollapses = document.querySelectorAll('.panel-collapse');
  panelCollapses.forEach(function(panelCollapse) {
    panelCollapse.addEventListener('show.bs.collapse', function() {
      panelCollapses.forEach(function(otherPanelCollapse) {
        if (otherPanelCollapse !== panelCollapse) {
          otherPanelCollapse.classList.remove('show');
        }
      });
    });
  });
});

// end search filter 

// start at status when user click at p tag then checkbox work 
document.addEventListener('DOMContentLoaded', function () {
  const pTags = document.querySelectorAll('#collapseOne .panel-body p');

  pTags.forEach(function (pTag) {
    pTag.addEventListener('click', function () {
      const checkbox = this.querySelector('input[type="checkbox"]');
      checkbox.checked = !checkbox.checked;
    });
  });
});




// end planner page 

// Analyzer page start 
const searchInput = document.getElementById('searchInput');
const filterButton = document.getElementById('filterButton');
const emailsList = document.getElementById('emailsList');

// Replace with your actual email data
// const emails = [
//   { sender: 'John Doe', subject: 'Meeting Reminder' },
//   { sender: 'Jane Smith', subject: 'Important Update' },
//   { sender: 'Support Team', subject: 'Your Ticket Resolved' },
//   { sender: 'Marketing', subject: 'New Promotion' },
// ];

// function displayEmails(filteredEmails) {
//   emailsList.innerHTML = '';
//   filteredEmails.forEach(email => {
//     const listItem = document.createElement('li');
//     listItem.classList.add('list-group-item');
//     listItem.innerHTML = `<b>${email.sender}</b> - ${email.subject}`;
//     emailsList.appendChild(listItem);
//   });
// }

// displayEmails(emails); // Initially display all emails

// filterButton.addEventListener('click', () => {
//   const searchTerm = searchInput.value.toLowerCase();
//   const filteredEmails = emails.filter(email => 
//     email.sender.toLowerCase().includes(searchTerm) ||
//     email.subject.toLowerCase().includes(searchTerm)
//   );
//   displayEmails(filteredEmails);
// });



// end Analyzer page 

// inbox page 
 // JavaScript code
 const messageInput = document.getElementById('message-input');
 const sendButton = document.getElementById('send-button');
 const chatMessages = document.getElementById('chat-messages');

 // Function to append a message to the chat
 function appendMessage(sender, text) {
     const messageDiv = document.createElement('div');
     messageDiv.classList.add('message');
     messageDiv.innerHTML = `
        <!-- <span class="sender">${sender}:</span> -->
         <span class="text">${text}</span>
     `;
     chatMessages.appendChild(messageDiv);
     chatMessages.scrollTop = chatMessages.scrollHeight;
 }

 // Dummy messages to initialize the chat
 const dummyMessages = [
     { sender: 'Bot', text: 'Welcome to the chat!' },
     { sender: 'User', text: 'Hi there!' },
     { sender: 'Bot', text: 'How can I help you?' },
     { sender: 'Bot', text: 'Leave your message' },
     { sender: 'Bot', text: 'Leave your message' }
 ];

 // Add dummy messages to the chat on page load
 window.addEventListener('load', () => {
     dummyMessages.forEach(message => {
         appendMessage(message.sender, message.text);
     });
 });

 // Event listener for sending a message
 sendButton.addEventListener('click', () => {
     const messageText = messageInput.value.trim();
     if (messageText !== '') {
         appendMessage('You', messageText);
         messageInput.value = '';
     }
 });



//  create post modal start

// show toggle visibility for laptop and mobile view 
document.addEventListener('DOMContentLoaded', function() {
  const toggleButtons = document.querySelectorAll('.toggle-btn');
  const postPreview = document.getElementById('post-preview');

  toggleButtons.forEach(button => {
    button.addEventListener('click', function() {
      // Remove active class from all buttons
      toggleButtons.forEach(btn => btn.classList.remove('active'));

      // Add active class to clicked button
      this.classList.add('active');

      // Show/Hide post preview and adjust size based on data-preview-size
      const targetId = this.dataset.previewTarget;
      const targetElement = document.getElementById(targetId);
      const previewSize = this.dataset.previewSize;

      // Toggle visibility class
      targetElement.classList.toggle('hidden');

      // Remove previous preview size class and add new one
      targetElement.classList.remove('preview-desktop', 'preview-mobile');
      targetElement.classList.add(`preview-${previewSize}`);
    });
  });
});


// show schudle side popup 
document.addEventListener('DOMContentLoaded', function () {
  const scheduleCheckbox = document.getElementById('schedule');
  const scheduleModal = new bootstrap.Modal(document.getElementById('scheduleModal'));

  scheduleCheckbox.addEventListener('change', function () {
      if (this.checked) {
          scheduleModal.show();
      } else {
          scheduleModal.hide();
      }
  });
});
