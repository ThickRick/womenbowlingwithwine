$('#firstNameEdit').editable({
    type: 'text',
    title: 'Enter name',
    success: function(response, newValue) {
        userModel.set('firstNameEdit', newValue); //update backbone model
    }
});