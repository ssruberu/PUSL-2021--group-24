// script.js
function search() {
    const searchInput = document.getElementById('search-input').value;
    
    // You can implement your search functionality here
    // For demonstration purposes, let's assume we have an array of dummy data
    const dummyData = [
        { university: 'University A', hostel: 'Hostel X', distance: '0.5 miles' },
        { university: 'University A', hostel: 'Hostel Y', distance: '0.8 miles' },
        { university: 'University B', hostel: 'Hostel Z', distance: '1.2 miles' },
    ];

    const resultsContainer = document.getElementById('results');
    resultsContainer.innerHTML = '';

    const filteredResults = dummyData.filter(item => item.university.toLowerCase().includes(searchInput.toLowerCase()));
    
    if (filteredResults.length > 0) {
        filteredResults.forEach(result => {
            const resultElement = document.createElement('div');
            resultElement.innerHTML = `<p><strong>${result.hostel}</strong> - ${result.distance} from ${result.university}</p>`;
            resultsContainer.appendChild(resultElement);
        });
    } else {
        resultsContainer.innerHTML = '<p>No results found.</p>';
    }
}

document.getElementById('login-form').addEventListener('submit', function(event) {
  event.preventDefault();
  if (validateForm()) {
    // Add your login logic here
  }
});

document.getElementById('signup-btn').addEventListener('click', function() {
  // Add your signup logic here
});

function validateForm() {
  let email = document.getElementById('email').value;
  let password = document.getElementById('password').value;
  let emailError = document.getElementById('email-error');
  let passwordError = document.getElementById('password-error');
  let isValid = true;

  if (!email) {
    emailError.textContent = 'Email is required';
    isValid = false;
  } else {
    emailError.textContent = '';
  }

  if (!password) {
    passwordError.textContent = 'Password is required';
    isValid = false;
  } else {
    passwordError.textContent = '';
  }

  return isValid;
}