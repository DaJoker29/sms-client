function signinCallback(authResult) {
    if(authResult.status.signed_in) {
        document.querySelector('#sign-in-link').setAttribute('style', 'display: none;');
        fetch(authResult.access_token);
    } else {
        console.log('Sign in state: ' + authResult.error);
    }
}

function fetch(token) {
    $.ajax({
        url: 'https://www.google.com/m8/feeds/contacts/default/full?access_token=' + token + '&alt=json&max-results=10000',
        dataType: 'jsonp',
        success: function(data) {
            build(data);
            console.log(data);
        }
    });
}

function build(obj) {
    $('#number-input').remove();

    var select = document.createElement('select');
    select.id = 'number-select';
    select.name = 'number';
    select.className += " form-control";
    var contacts = obj.feed.entry;
    var array = [];

    contacts.forEach(function(element, index){
        var name = element.title.$t;
        var number = element.gd$phoneNumber;

        if(name === "" || !number)
            return;

        number.forEach(function(el) {
            var li = document.createElement('option');
            li.value = el.$t.replace(/[() -]|\*67|^1/g, '');
            li.textContent = element.title.$t + " -- " + li.value.replace(/(\d{3})(\d{3})(\d{4})/, '($1) $2-$3');
            array.push(li);
        });



    });

    array.sort(function(a, b) {
        if(a.textContent < b.textContent)
            return -1;
        if(a.textContent > b.textContent)
            return 1;
        return 0;
    });

    array.forEach(function(element, index){
        select.appendChild(element);
    });

    $('label[for=number').next('div.col-sm-10').append(select);
}

(function() {
    /* HTML5 feature test*/
    if( 'querySelector' in document && 'addEventListener' in window && 'localStorage' in window ) {
        // Load scripts here
    }
})();