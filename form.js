function showPlacesDropdown(provinceDropdownId, placeSelectId) {
    var provinceDropdown = document.getElementById(provinceDropdownId);
    var placeSelect = document.getElementById(placeSelectId);
    var selectedCity = provinceDropdown.value;

    // Clear the current options in the place dropdown
    placeSelect.innerHTML = '<option value="">Select a City</option>';

    // If a city is selected, populate the place dropdown with the places for that city
    if (selectedCity !== "") {
        var places = cityPlaces[selectedCity];
        for (var i = 0; i < places.length; i++) {
            var option = document.createElement("option");
            option.value = places[i];
            option.textContent = places[i];
            placeSelect.appendChild(option);
        }
    }
}




