$(document).ready(function() {
    hideAllFields(); // Ukryj wszystkie pola po załadowaniu strony

    $('#stanowisko').change(function() {
        handleStandpointChange(this);
    });
});

function hideAllFields() {
    $('#testingSystems').hide();
    $('#reportingSystems').hide();
    $('#selenium').hide();
    $('#ide').hide();
    $('#languages').hide();
    $('#mysql').hide();
    $('#method').hide();
    $('#scrum').hide();
}

function handleStandpointChange(selectElement) {
    hideAllFields();

    var selectedValue = selectElement.value;

    if (selectedValue === 'tester') {
        $('#testingSystems').show();
        $('#reportingSystems').show();
        $('#selenium').show();
    } else if (selectedValue === 'developer') {
        $('#ide').show();
        $('#languages').show();
        $('#mysql').show();
    } else if (selectedValue === 'project_manager') {
        $('#reportingSystems').show();
        $('#method').show();
        $('#scrum').show();
    }
}