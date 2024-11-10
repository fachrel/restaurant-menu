<div class="input-group">
    <span class="input-group-text">Rp.</span>
    <input type="text" id="priceInput" class="form-control" placeholder="Price" value="{{ $value ?? 0 }}">
    <span class="input-group-text">,-</span>
    <input type="hidden" id="priceValue" name="price" value="{{ $value ?? 0 }}">
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const input = document.getElementById('priceInput');
        const hiddenInput = document.getElementById('priceValue');

        // Get the raw value from the hidden input
        let rawValue = hiddenInput.value;

        // Format the value immediately when the page loads
        let formattedValue = new Intl.NumberFormat('id-ID').format(rawValue); // Format it for display
        input.value = formattedValue; // Set the formatted value to the input

        // Ensure the hidden input has the raw value for form submission
        hiddenInput.value = rawValue;

        // Add the input event listener to update formatting as the user types
        input.addEventListener('input', (e) => {
            let rawValue = e.target.value.replace(/\D/g, ''); // Remove non-numeric characters
            let formattedValue = new Intl.NumberFormat('id-ID').format(rawValue); // Format it for display
            e.target.value = formattedValue;

            hiddenInput.value = rawValue; // Update the hidden input with the raw value
        });
    });
</script>
