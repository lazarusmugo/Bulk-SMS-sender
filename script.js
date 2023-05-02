const radioSingle = document.getElementById('single');
        const radioBulk = document.getElementById('bulk');
        const phoneInputs = document.getElementById('phone-inputs');
        const singleInput = document.getElementById('single-input');
        const addPhoneButton = document.getElementById('add-phone');

        
        // Hide phone number inputs when "Send to a Single Number" is selected
        radioSingle.addEventListener('click', () => {
            singleInput.style.display = 'block';
            phoneInputs.classList.remove('active');
        });


        // Show phone number inputs when "Send to Many Numbers" is selected
        radioBulk.addEventListener('click', () => {
            phoneInputs.classList.add('active');
            singleInput.style.display = 'none';
        });


        // Add another phone number input when "Add another phone number" button is clicked
        addPhoneButton.addEventListener('click', () => {
            const input = document.createElement('div');
            input.classList.add('phone-number-input');

            const phoneInput = document.createElement('input');
            phoneInput.type = 'text';
            phoneInput.name = 'phone_numbers[]';
            phoneInput.placeholder = 'Phone Number';

            const removeButton = document.createElement('button');

            removeButton.innerText = 'X';
            removeButton.addEventListener('click', () => {
                input.remove();
            });

            input.appendChild(phoneInput);
            input.appendChild(removeButton);
            phoneInputs.insertBefore(input, addPhoneButton);
        });


        // Remove phone number input when "X" button is clicked
        phoneInputs.addEventListener('click', (event) => {
            if (event.target.classList.contains('remove-phone')) {
                event.target.parentNode.remove();
            }
        });