// Function to update values
function updateValue(id) {
    const inputField = document.getElementById(id + '-input');
    const displayField = document.getElementById(id);
    const newValue = inputField.value;

    // Update the displayed value
    displayField.innerText = newValue;
}

// Form Handling for Add Service
document.getElementById('add-service-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    let serviceName = document.getElementById('service-name').value;
    let serviceCategory = document.getElementById('service-category').value;
    let servicePrice = document.getElementById('service-price').value;
    let serviceDescription = document.getElementById('service-description').value;

    // Log values for now
    console.log("Service Added: ", serviceName, serviceCategory, servicePrice, serviceDescription);

    // Reset form after submission
    document.getElementById('add-service-form').reset();
});

// Form Handling for Profile Update
document.getElementById('update-profile-form').addEventListener('submit', function(e) {
    e.preventDefault();

    let providerName = document.getElementById('provider-name').value;
    let providerContact = document.getElementById('provider-contact').value;
    let providerEmail = document.getElementById('provider-email').value;
    let providerPassword = document.getElementById('provider-password').value;

    // Log values for now
    console.log("Profile Updated: ", providerName, providerContact, providerEmail, providerPassword);

    // Reset form after submission
    document.getElementById('update-profile-form').reset();
});

// Call updateDashboard on page load
window.onload = function() {
    updateDashboard();
};


