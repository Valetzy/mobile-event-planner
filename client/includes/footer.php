<script>
    // Function to update location input based on selected option
    function updateLocation(selectElement, locationInput) {
        selectElement.addEventListener('change', function () {
            // Get the selected option element
            const selectedOption = selectElement.options[selectElement.selectedIndex];

            // Get the address from the data-address attribute
            const address = selectedOption.getAttribute('data-address');

            // Set the value of the location input field to the address
            locationInput.value = address;
        });
    }

    // Get the select elements and corresponding address input fields
    const ceremonyNameSelect = document.getElementById('ceremony_name');
    const ceremonyLocationInput = document.getElementById('ceremony_location');
    const receptionNameSelect = document.getElementById('reception_name');
    const receptionLocationInput = document.getElementById('reception_location');

    // Update the ceremony and reception location inputs on change
    updateLocation(ceremonyNameSelect, ceremonyLocationInput);
    updateLocation(receptionNameSelect, receptionLocationInput);

</script>

<script>
    // Function to update contact input based on selected caterer
    function updateContact(selectElementcaterer, contactInput) {
        selectElementcaterer.addEventListener('change', function () {
            // Get the selected option element
            const selectedOption = selectElementcaterer.options[selectElementcaterer.selectedIndex];

            // Get the contact from the data-contact attribute
            const contact = selectedOption.getAttribute('data-contact');

            // Set the value of the contact input field to the contact number
            contactInput.value = contact;
        });
    }

    // Get the select elements and corresponding contact input fields
    const catererSelect = document.getElementById('caterer_name');
    const catererContactInput = document.getElementById('caterer_contact');

    // Update the caterer contact input on change
    updateContact(catererSelect, catererContactInput);
</script>

<script>
    // Ensure the script runs after the DOM is loaded
    document.addEventListener('DOMContentLoaded', function () {
        // Function to update contact input based on selected caterer
        function updateContact(selectElement, contactInput) {
            selectElement.addEventListener('change', function () {
                // Get the selected option element
                const selectedOption = selectElement.options[selectElement.selectedIndex];

                // Get the contact from the data-contact attribute
                const contact = selectedOption.getAttribute('data-contact');

                // If contact exists, set it, otherwise clear the input
                if (contact) {
                    contactInput.value = contact;
                } else {
                    contactInput.value = ''; // Clear the input if no contact data
                }
            });
        }

        // Get the select elements and corresponding contact input fields
        const catererSelect = document.getElementById('photo_video');
        const catererContactInput = document.getElementById('photo_video_contact');

        // Update the caterer contact input on change
        updateContact(catererSelect, catererContactInput);
    });
</script>