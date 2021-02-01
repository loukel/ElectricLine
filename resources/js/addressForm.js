if (document.body.contains(document.getElementById('addresses'))) {
  addressesEl = document.getElementById('addresses');
  newAddressEl = document.getElementById('newAddress');
  newAddressElements = [document.getElementById('street'), document.getElementById('postcode'), document.getElementById('city')]

  showNewAddress = () => {
    newAddressEl.style.display = 'inherit';
    newAddressElements.map((element) => element.required = true);
  }

  // Onload check if the combo box is set to 'Add new' -> show new address
  if (addressesEl.value == -1) {
    showNewAddress();
  }

  // When the user changes the combo box, evaluate whether to show the new address form
  addressesEl.addEventListener('change', (e) => {
    if (e.target.value === '-1') {
      showNewAddress();
    } else {
      newAddressEl.style.display = 'none';
      newAddressElements.map((element) => element.required = false);
    }
  })
}
