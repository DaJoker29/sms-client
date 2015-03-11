/* Callback after sign-in */
function signinCallback(authResult) {
    if(authResult.status.signed_in) {
        $('#sign-in-link').remove();
        fetch(authResult.access_token);
    } else {
        console.log('Sign in state: ' + authResult.error);
    }
}

/* Fetch Contact from Google Contacts API */
function fetch(token) {
    $.ajax({
        url: 'https://www.google.com/m8/feeds/contacts/default/full?access_token=' + token + '&alt=json&max-results=10000',
        dataType: 'jsonp',
        success: function(data) {
            build(data);
        }
    });
}

/* Builds Select Menu from fetched data */
function build(obj) {
    // Remove Old Number field
    $('#number-input').remove();

    // Set Variables
    var contacts = obj.feed.entry;
    var options = []; // Temporary Array to hold options while sorting

    // Create select element
    var select = document.createElement('select');
    select.id = 'number-select';
    select.name = 'number';
    select.className += " form-control";

    // Cycle through each contact adding them to temp array
    contacts.forEach(contactsLoop, options);
    options.sort(sortCallback);

    // Move sorted contacts to select element
    options.forEach(function(element, index){
        select.appendChild(element);
    });

    // Add Select Element to DOM
    $('label[for=number').next('div.col-sm-10').append(select);
}

// Sorting callback for option array
function sortCallback(a, b) {
    if(a.innerHTML < b.innerHTML)
        return -1;
    if(a.innerHTML > b.innerHTML)
        return 1;
    return 0;
}

/* Cycles through each contact */
function contactsLoop(element) {
    var name = element.title.$t;
    var number = element.gd$phoneNumber;

    // Skip contacts with no name or phone number
    if(name === "" || !number)
        return;

    // Cycle through each phone number
    number.forEach(numbersLoop, { 'contact': element, 'options': this});
}

/* Cycle through each phone number */
function numbersLoop(element) {
    var contact = this.contact;
    var options = this.options;

    // Create option
    var opt = document.createElement('option');
    opt.value = element.$t.replace(/[() -]|\*67|^1/g, '');
    opt.innerHTML = contact.title.$t + "&nbsp;&nbsp;&nbsp;&nbsp;" + opt.value.replace(/(\d{3})(\d{3})(\d{4})/, '($1) $2-$3');

    // Push to temporary array
    options.push(opt);
}