// Function to show or hide form fields based on selected role
function toggleRoleForm() {
    var role = document.getElementById("role").value;
    var customerFields = document.getElementById("customer-fields");
    var serviceProviderFields = document.getElementById("service-provider-fields");

    // Show/hide fields based on role
    if (role === "customer") {
        customerFields.style.display = "block";
        serviceProviderFields.style.display = "none";
    } else {
        customerFields.style.display = "none";
        serviceProviderFields.style.display = "block";
    }
}

// Call toggleRoleForm when page loads to set default visibility
window.onload = toggleRoleForm;

